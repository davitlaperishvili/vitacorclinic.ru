<?php
namespace AIOSEO\Plugin\Pro\Api;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use AIOSEO\Plugin\Common\Models;
use AIOSEO\Plugin\Common\SearchStatistics\Api;
use AIOSEO\Plugin\Common\Api as CommonApi;
use AIOSEO\Plugin\Pro\Models\SearchStatistics as SearchStatisticsModels;

/**
 * Route class for the API.
 *
 * @since 4.3.0
 */
class SearchStatistics extends CommonApi\SearchStatistics {
	/**
	 * Returns SEO Statistics data.
	 *
	 * @since 4.3.0
	 *
	 * @param  \WP_REST_Request  $request The REST Request
	 * @return \WP_REST_Response          The response.
	 */
	public static function getSeoStatistics( $request ) {
		if ( ! aioseo()->license->hasCoreFeature( 'search-statistics', 'seo-statistics' ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Feature not available.'
			], 400 );
		}

		$params            = $request->get_params();
		$startDate         = ! empty( $params['startDate'] ) ? $params['startDate'] : '';
		$endDate           = ! empty( $params['endDate'] ) ? $params['endDate'] : '';
		$rolling           = ! empty( $params['rolling'] ) ? $params['rolling'] : '';
		$limit             = ! empty( $params['limit'] ) ? $params['limit'] : aioseo()->settings->tablePagination['searchStatisticsSeoStatistics'];
		$offset            = ! empty( $params['offset'] ) ? $params['offset'] : 0;
		$filter            = ! empty( $params['filter'] ) ? $params['filter'] : 'all';
		$searchTerm        = ! empty( $params['searchTerm'] ) ? sanitize_text_field( $params['searchTerm'] ) : '';
		$orderDir          = ! empty( $params['orderDir'] ) ? strtoupper( $params['orderDir'] ) : 'DESC';
		$orderBy           = ! empty( $params['orderBy'] ) ? aioseo()->helpers->toCamelCase( $params['orderBy'] ) : 'clicks';
		$additionalFilters = ! empty( $params['additionalFilters'] ) ? $params['additionalFilters'] : [];

		$postType = ! empty( $additionalFilters['postType'] ) ? $additionalFilters['postType'] : '';

		// If we're on the Top Losing/Top Winning pages, then we need to override the default ORDER BY/ORDER DIR.
		if ( 'all' !== $filter ) {
			if ( 'topLosing' === $filter ) {
				$orderBy  = 'decay';
				$orderDir = 'ASC';
			} elseif ( 'topWinning' === $filter ) {
				$orderBy  = 'decay';
				$orderDir = 'DESC';
			}
		}

		if ( empty( $startDate ) || empty( $endDate ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Invalid date range.'
			], 400 );
		}

		$postData = [];
		if ( $searchTerm || in_array( $orderBy, [ 'postTitle', 'lastUpdated' ], true ) ) {
			$postData = aioseo()->searchStatistics->stats->posts->getPostData( [ 'searchTerm' => $searchTerm ] );
		}

		// Set the date range and rolling value.
		aioseo()->searchStatistics->stats->setDateRange( $startDate, $endDate );
		if ( aioseo()->internalOptions->searchStatistics->rolling !== $rolling ) {
			aioseo()->internalOptions->searchStatistics->rolling = $rolling;
		}

		$cacheArgs = [
			aioseo()->searchStatistics->api->auth->getAuthedSite(),
			$startDate,
			$endDate,
			$limit,
			$offset,
			$filter,
			$searchTerm,
			$orderDir,
			$orderBy,
			$postType
		];

		$cacheHash  = sha1( implode( ',', $cacheArgs ) );
		$cachedData = aioseo()->core->cache->get( "aioseo_search_statistics_seo_statistics_{$cacheHash}" );
		if ( null !== $cachedData ) {
			$success    = false === $cachedData ? false : true;
			$statusCode = false === $cachedData ? 400 : 200;

			if ( $success ) {
				// Add post objects to rows.
				$cachedData = aioseo()->searchStatistics->stats->posts->addPostData( $cachedData, 'statistics' );

				// Add graph markers.
				$cachedData = aioseo()->searchStatistics->markers->addTimelineMarkers( $cachedData );

				// Add localized filters to paginated data.
				$cachedData['pages']['paginated']['filters']           = aioseo()->searchStatistics->stats->posts->getFilters( $filter, $searchTerm );
				$cachedData['pages']['paginated']['additionalFilters'] = aioseo()->searchStatistics->stats->posts->getAdditionalFilters();
			}

			return new \WP_REST_Response( [
				'success' => $success,
				'data'    => $cachedData,
				'range'   => aioseo()->searchStatistics->stats->getDateRange()
			], $statusCode );
		}

		$args = [
			'start'      => $startDate,
			'end'        => $endDate,
			'pagination' => [
				'limit'      => $limit,
				'offset'     => $offset,
				'filter'     => $filter,
				'searchTerm' => $searchTerm,
				'orderDir'   => $orderDir,
				'orderBy'    => $orderBy,
				'postData'   => $postData,
				'objects'    => ! empty( $postType ) ? aioseo()->searchStatistics->stats->posts->getPostObjectPaths( $postType ) : false
			]
		];

		$api      = new Api\Request( 'google-search-console/statistics/', $args, 'POST' );
		$response = $api->request();
		if ( is_wp_error( $response ) || ! empty( $response['error'] ) || empty( $response['data'] ) ) {
			aioseo()->core->cache->update( "aioseo_search_statistics_seo_statistics_{$cacheHash}", false, 60 );

			return new \WP_REST_Response( [
				'success' => false,
				'data'    => false,
				'range'   => aioseo()->searchStatistics->stats->getDateRange()
			], 400 );
		}

		$data = $response['data'];
		aioseo()->core->cache->update( "aioseo_search_statistics_seo_statistics_{$cacheHash}", $data, MONTH_IN_SECONDS );

		// Add post objects to rows.
		$data = aioseo()->searchStatistics->stats->posts->addPostData( $data, 'statistics' );

		// Add graph markers.
		$data = aioseo()->searchStatistics->markers->addTimelineMarkers( $data );

		// Add localized filters to paginated data.
		$data['pages']['paginated']['filters']           = aioseo()->searchStatistics->stats->posts->getFilters( $filter, $searchTerm );
		$data['pages']['paginated']['additionalFilters'] = aioseo()->searchStatistics->stats->posts->getAdditionalFilters();

		return new \WP_REST_Response( [
			'success' => true,
			'data'    => $data,
			'range'   => aioseo()->searchStatistics->stats->getDateRange()
		], 200 );
	}

	/**
	 * Returns pages by the given keyword.
	 *
	 * @since 4.3.0
	 *
	 * @param  \WP_REST_Request  $request The REST Request
	 * @return \WP_REST_Response          The response.
	 */
	public static function getPagesByKeywords( $request ) {
		if ( ! aioseo()->license->hasCoreFeature( 'search-statistics', 'keyword-rankings-pages' ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Feature not available.'
			], 400 );
		}

		$body       = $request->get_json_params();
		$startDate  = ! empty( $body['startDate'] ) ? $body['startDate'] : '';
		$endDate    = ! empty( $body['endDate'] ) ? $body['endDate'] : '';
		$keywords   = ! empty( $body['keywords'] ) ? $body['keywords'] : [];
		if ( empty( $keywords ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'No keywords were given.'
			], 400 );
		}

		aioseo()->searchStatistics->stats->setDateRange( $startDate, $endDate );

		$cacheHash  = sha1( implode( ',', $keywords ) );
		$cachedData = aioseo()->core->cache->get( "aioseo_search_statistics_page_keywords_{$cacheHash}" );
		if ( null !== $cachedData ) {
			$success    = false === $cachedData ? false : true;
			$statusCode = false === $cachedData ? 400 : 200;

			if ( $success ) {
				$cachedData = aioseo()->searchStatistics->stats->posts->addPostData( $cachedData, 'keywords' );
			}

			return new \WP_REST_Response( [
				'success' => $success,
				'data'    => $cachedData,
				'range'   => aioseo()->searchStatistics->stats->getDateRange()
			], $statusCode );
		}

		$args = [
			'start'    => $startDate,
			'end'      => $endDate,
			'keywords' => $keywords
		];

		$api      = new Api\Request( 'google-search-console/statistics/keyword/pages/', $args, 'POST' );
		$response = $api->request();
		if ( is_wp_error( $response ) || ! empty( $response['error'] ) || empty( $response['data'] ) ) {
			aioseo()->core->cache->update( "aioseo_search_statistics_page_keywords_{$cacheHash}", false, 60 );

			return new \WP_REST_Response( [
				'success' => false,
				'data'    => false,
				'range'   => aioseo()->searchStatistics->stats->getDateRange()
			], 400 );
		}

		aioseo()->core->cache->update( "aioseo_search_statistics_page_keywords_{$cacheHash}", $response['data'], MONTH_IN_SECONDS );

		$pagesWithObjects = aioseo()->searchStatistics->stats->posts->addPostData( $response['data'], 'keywords' );

		return new \WP_REST_Response( [
			'success' => true,
			'data'    => $pagesWithObjects
		], 200 );
	}

	/**
	 * Get Keywords data.
	 *
	 * @since 4.3.0
	 *
	 * @param  \WP_REST_Request  $request The REST Request
	 * @return \WP_REST_Response          The response.
	 */
	public static function getKeywords( $request ) {
		if ( ! aioseo()->license->hasCoreFeature( 'search-statistics', 'keyword-rankings' ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Feature not available.'
			], 400 );
		}

		$params     = $request->get_params();
		$startDate  = ! empty( $params['startDate'] ) ? $params['startDate'] : '';
		$endDate    = ! empty( $params['endDate'] ) ? $params['endDate'] : '';
		$rolling    = ! empty( $params['rolling'] ) ? $params['rolling'] : '';
		$limit      = ! empty( $params['limit'] ) ? $params['limit'] : aioseo()->settings->tablePagination['searchStatisticsKeywordRankings'];
		$offset     = ! empty( $params['offset'] ) ? $params['offset'] : 0;
		$filter     = ! empty( $params['filter'] ) ? $params['filter'] : 'all';
		$searchTerm = ! empty( $params['searchTerm'] ) ? sanitize_text_field( $params['searchTerm'] ) : '';
		$orderDir   = ! empty( $params['orderDir'] ) ? strtoupper( $params['orderDir'] ) : 'DESC';
		$orderBy    = ! empty( $params['orderBy'] ) ? aioseo()->helpers->toCamelCase( $params['orderBy'] ) : 'clicks';

		// If we're on the Top Losing/Top Winning pages, then we need to override the default ORDER BY/ORDER DIR.
		if ( 'all' !== $filter ) {
			if ( 'topLosing' === $filter ) {
				$orderBy  = 'decay';
				$orderDir = 'ASC';
			} elseif ( 'topWinning' === $filter ) {
				$orderBy  = 'decay';
				$orderDir = 'DESC';
			}
		}

		if ( empty( $startDate ) || empty( $endDate ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Invalid date range.'
			], 400 );
		}

		// Set the date range and rolling value.
		aioseo()->searchStatistics->stats->setDateRange( $startDate, $endDate );
		if ( aioseo()->internalOptions->searchStatistics->rolling !== $rolling ) {
			aioseo()->internalOptions->searchStatistics->rolling = $rolling;
		}

		$cacheArgs = [
			aioseo()->searchStatistics->api->auth->getAuthedSite(),
			$startDate,
			$endDate,
			$limit,
			$offset,
			$filter,
			$searchTerm,
			$orderDir,
			$orderBy
		];

		$cacheHash  = sha1( implode( ',', $cacheArgs ) );
		$cachedData = aioseo()->core->cache->get( "aioseo_search_statistics_keywords_{$cacheHash}" );
		if ( null !== $cachedData ) {
			$success    = false === $cachedData ? false : true;
			$statusCode = false === $cachedData ? 400 : 200;

			return new \WP_REST_Response( [
				'success' => $success,
				'data'    => $cachedData,
				'range'   => aioseo()->searchStatistics->stats->getDateRange()
			], $statusCode );
		}

		$args = [
			'start'      => $startDate,
			'end'        => $endDate,
			'pagination' => [
				'limit'      => $limit,
				'offset'     => $offset,
				'filter'     => $filter,
				'searchTerm' => $searchTerm,
				'orderDir'   => $orderDir,
				'orderBy'    => $orderBy
			]
		];

		$api      = new Api\Request( 'google-search-console/statistics/keywords/', $args, 'POST' );
		$response = $api->request();
		if ( is_wp_error( $response ) || ! empty( $response['error'] ) || empty( $response['data'] ) ) {
			aioseo()->core->cache->update( "aioseo_search_statistics_keywords_{$cacheHash}", false, 60 );

			return new \WP_REST_Response( [
				'success' => false,
				'data'    => false,
				'range'   => aioseo()->searchStatistics->stats->getDateRange()
			], 400 );
		}

		$data = $response['data'];

		// Add localized filters to paginated data.
		$data['paginated']['filters'] = aioseo()->searchStatistics->stats->keywords->getFilters( $filter, $searchTerm );

		aioseo()->core->cache->update( "aioseo_search_statistics_keywords_{$cacheHash}", $data, MONTH_IN_SECONDS );

		return new \WP_REST_Response( [
			'success' => true,
			'data'    => $data,
			'range'   => aioseo()->searchStatistics->stats->getDateRange()
		], 200 );
	}

	/**
	 * Get Content Rankings data.
	 *
	 * @since 4.3.6
	 *
	 * @param  \WP_REST_Request  $request The REST Request
	 * @return \WP_REST_Response          The response.
	 */
	public static function getContentRankings( $request ) {
		if ( ! aioseo()->license->hasCoreFeature( 'search-statistics', 'content-rankings' ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Feature not available.'
			], 400 );
		}

		$params            = $request->get_params();
		$limit             = ! empty( $params['limit'] ) ? $params['limit'] : aioseo()->settings->tablePagination['searchStatisticsKeywordRankings'];
		$offset            = ! empty( $params['offset'] ) ? $params['offset'] : 0;
		$searchTerm        = ! empty( $params['searchTerm'] ) ? sanitize_text_field( $params['searchTerm'] ) : '';
		$orderDir          = ! empty( $params['orderDir'] ) ? strtoupper( $params['orderDir'] ) : 'ASC';
		$orderBy           = ! empty( $params['orderBy'] ) ? aioseo()->helpers->toCamelCase( $params['orderBy'] ) : 'decay';
		$additionalFilters = ! empty( $params['additionalFilters'] ) ? $params['additionalFilters'] : [];

		$endDate    = ! empty( $params['endDate'] ) ? $params['endDate'] : '';
		$startDate  = date( 'Y-m-d', strtotime( $endDate . ' - 1 year' ) );

		$postType = ! empty( $additionalFilters['postType'] ) ? $additionalFilters['postType'] : '';

		$postData = [];
		if ( $searchTerm || in_array( $orderBy, [ 'postTitle', 'lastUpdated' ], true ) ) {
			$postData = aioseo()->searchStatistics->stats->posts->getPostData( [ 'searchTerm' => $searchTerm ] );
		}

		$cacheArgs = [
			aioseo()->searchStatistics->api->auth->getAuthedSite(),
			$startDate,
			$endDate,
			$limit,
			$offset,
			$searchTerm,
			$postType,
			$orderDir,
			$orderBy
		];

		$cacheHash  = sha1( implode( ',', $cacheArgs ) );
		$cachedData = aioseo()->core->cache->get( "aioseo_search_statistics_cont_rankings_{$cacheHash}" );
		if ( null !== $cachedData ) {
			$success    = false === $cachedData ? false : true;
			$statusCode = false === $cachedData ? 400 : 200;

			if ( $success ) {
				// Add post objects to rows.
				$cachedData = aioseo()->searchStatistics->stats->posts->addPostData( $cachedData, 'contentRankings' );

				$cachedData['paginated']['additionalFilters'] = aioseo()->searchStatistics->stats->posts->getAdditionalFilters();
			}

			return new \WP_REST_Response( [
				'success' => $success,
				'data'    => $cachedData,
				'range'   => aioseo()->searchStatistics->stats->getDateRange()
			], $statusCode );
		}

		$args = [
			'start'      => $startDate,
			'end'        => $endDate,
			'pagination' => [
				'limit'      => $limit,
				'offset'     => $offset,
				'searchTerm' => $searchTerm,
				'orderDir'   => $orderDir,
				'orderBy'    => $orderBy,
				'postData'   => $postData,
				'objects'    => aioseo()->searchStatistics->stats->posts->getPostObjectPaths( $postType )
			]
		];

		$api      = new Api\Request( 'google-search-console/statistics/content-rankings/', $args, 'POST' );
		$response = $api->request();
		if ( is_wp_error( $response ) || ! empty( $response['error'] ) || empty( $response['data'] ) ) {
			aioseo()->core->cache->update( "aioseo_search_statistics_cont_rankings_{$cacheHash}", false, 60 );

			return new \WP_REST_Response( [
				'success' => false,
				'data'    => false
			], 400 );
		}

		$data = $response['data'];

		aioseo()->core->cache->update( "aioseo_search_statistics_cont_rankings_{$cacheHash}", $data, MONTH_IN_SECONDS );

		// Add post objects to rows.
		$data = aioseo()->searchStatistics->stats->posts->addPostData( $data, 'contentRankings' );

		$data['paginated']['additionalFilters'] = aioseo()->searchStatistics->stats->posts->getAdditionalFilters();

		return new \WP_REST_Response( [
			'success' => true,
			'data'    => $data,
			'range'   => aioseo()->searchStatistics->stats->getDateRange()
		], 200 );
	}

	/**
	 * Get Page Speed data.
	 *
	 * @since 4.3.0
	 *
	 * @param  \WP_REST_Request  $request The REST Request
	 * @return \WP_REST_Response          The response.
	 */
	public static function getPageSpeed( $request ) {
		if ( ! aioseo()->license->hasCoreFeature( 'search-statistics', 'post-detail-page-speed' ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Feature not available.'
			], 400 );
		}

		$postId = $request->get_param( 'postId' );
		if ( empty( $postId ) || ! is_numeric( $postId ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Invalid post id.'
			], 400 );
		}

		$url = get_permalink( $postId );
		if ( empty( $url ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Invalid post id.'
			], 400 );
		}

		$force = boolval( $request->get_param( 'force' ) );
		$data  = aioseo()->searchStatistics->pageSpeed->getResults( $url, $force );

		return new \WP_REST_Response( [
			'success' => true,
			'data'    => $data
		], 200 );
	}

	/**
	 * Get SEO Analysis.
	 *
	 * @since 4.3.0
	 *
	 * @param  \WP_REST_Request  $request The REST Request
	 * @return \WP_REST_Response          The response.
	 */
	public static function getSeoAnalysis( $request ) {
		$postId = $request->get_param( 'postId' );
		if ( empty( $postId ) || ! is_numeric( $postId ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Invalid post id.'
			], 400 );
		}

		$url = get_permalink( $postId );
		if ( empty( $url ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Invalid post id.'
			], 400 );
		}

		$cacheKey = 'search_statistics_seo_analysis_' . $postId;
		$cache    = aioseo()->core->cache->get( $cacheKey );
		if ( null !== $cache ) {
			return new \WP_REST_Response( $cache, 200 );
		}

		$token      = aioseo()->internalOptions->internal->siteAnalysis->connectToken;
		$apiUrl     = defined( 'AIOSEO_ANALYZE_URL' ) ? AIOSEO_ANALYZE_URL : 'https://analyze.aioseo.com';
		$response   = aioseo()->helpers->wpRemotePost( $apiUrl . '/v1/analyze/', [
			'timeout' => 60,
			'headers' => [
				'X-AIOSEO-Key' => $token,
				'Content-Type' => 'application/json'
			],
			'body'    => wp_json_encode( [
				'url' => $url
			] ),
		] );

		$responseCode = wp_remote_retrieve_response_code( $response );
		$responseBody = json_decode( wp_remote_retrieve_body( $response ) );

		if ( 200 !== $responseCode || empty( $responseBody->success ) || ! empty( $responseBody->error ) ) {
			return new \WP_REST_Response( [
				'success'  => false,
				'response' => $responseBody
			], 400 );
		}

		aioseo()->core->cache->update( $cacheKey, $responseBody, WEEK_IN_SECONDS );

		return new \WP_REST_Response( [
			'success' => true,
			'data'    => $responseBody
		], 200 );
	}

	/**
	 * Get Inspection Result for the given paths.
	 *
	 * @since 4.5.0
	 *
	 * @param  \WP_REST_Request  $request The REST Request
	 * @return \WP_REST_Response          The response.
	 */
	public static function getInspectionResult( $request ) {
		$paths = $request->get_param( 'paths' );
		if ( empty( $paths ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Missing path list.'
			], 400 );
		}

		// First, check if we have existing objects for the given paths.
		$objects = aioseo()->core->db->start( 'aioseo_search_statistics_objects as asso' )
			->whereIn( 'asso.object_path_hash', array_map( 'sha1', array_unique( $paths ) ) )
			->run()
			->models( 'AIOSEO\\Plugin\\Pro\\Models\\SearchStatistics\\WpObject' );

		$objects = aioseo()->searchStatistics->helpers->setRowKey( $objects, 'object_path' );

		$pathsWithoutResult = [];
		$pathsWithResult    = array_map( '__return_false', array_flip( $paths ) );
		foreach ( $paths as $path ) {
			// If we don't find an object or the url inspection is invalid and needs to be refreshed, add it to the list of paths without a result.
			if ( empty( $objects[ $path ] ) || ! $objects[ $path ]->isUrlInspectionValid() ) {
				$pathsWithoutResult[] = $path;
				continue;
			}

			// If we find an object, check if it has a (valid) inspection result. This is important because sometimes Google can return invalid results.
			$result = $objects[ $path ]->inspection_result;
			if ( empty( $result ) ) {
				$pathsWithoutResult[] = $path;
				continue;
			}

			$pathsWithResult[ $path ] = $result;
		}

		$quotaExceeded = ! empty( aioseo()->core->cache->get( 'search_statistics_url_inspection_quota_exceeded' ) );
		if ( ! empty( $pathsWithoutResult ) && ! $quotaExceeded ) {
			$api      = new Api\Request( 'google-search-console/url-inspection/', [ 'paths' => $pathsWithoutResult ], 'GET' );
			$response = $api->request();

			// Check if the quota has been exceeded.
			if ( ! empty( $response['data']['data']['error']['status'] ) && 'RESOURCE_EXHAUSTED' === $response['data']['data']['error']['status'] ) {
				aioseo()->core->cache->update( 'search_statistics_url_inspection_quota_exceeded', true, \DAY_IN_SECONDS );

				return new \WP_REST_Response( [
					'success'       => true,
					'quotaExceeded' => true,
					'data'          => $pathsWithResult
				], 200 );
			}

			if ( ! is_wp_error( $response ) && ! empty( $response['data'] ) && empty( $response['error'] ) ) {
				$data = $response['data'];

				$objectsToInsert = [];
				foreach ( $data as $path => $result ) {
					$object = [
						'id'                     => isset( $objects[ $path ] ) ? (int) $objects[ $path ]->id : null,
						'object_path'            => $path,
						'inspection_result'      => $result,
						'inspection_result_date' => current_time( 'mysql' ),
						'indexed'                => ! empty( $result['indexStatusResult']['verdict'] ) && 'PASS' === $result['indexStatusResult']['verdict'] ? 1 : 0,
					];

					$pathsWithResult[ $path ] = $result;

					if ( ! empty( $object['id'] ) ) {
						SearchStatisticsModels\WpObject::update( $object );
					} else {
						$objectsToInsert[] = $object;
					}
				}

				SearchStatisticsModels\WpObject::bulkInsert( $objectsToInsert );
			}
		}

		return new \WP_REST_Response( [
			'success'       => true,
			'quotaExceeded' => $quotaExceeded,
			'data'          => $pathsWithResult
		], 200 );
	}

	/**
	 * Get Post details.
	 *
	 * @since 4.3.0
	 *
	 * @param  \WP_REST_Request  $request The REST Request
	 * @return \WP_REST_Response          The response.
	 */
	public static function getPostDetail( $request ) {
		if ( ! aioseo()->license->hasCoreFeature( 'search-statistics', 'post-detail' ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Feature not available.'
			], 400 );
		}

		$startDate = $request->get_param( 'startDate' );
		$endDate   = $request->get_param( 'endDate' );
		$postId    = $request->get_param( 'postId' );

		if ( empty( $startDate ) || empty( $endDate ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Invalid date range.'
			], 400 );
		}

		if ( empty( $postId ) || ! is_numeric( $postId ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Invalid post id.'
			], 400 );
		}

		aioseo()->searchStatistics->stats->setDateRange( $startDate, $endDate );

		$wpPost         = aioseo()->helpers->getPost( $postId );
		$postTypeObject = get_post_type_object( get_post_type( $postId ) );
		$post           = Models\Post::getPost( $wpPost->ID );
		$keyphrases     = Models\Post::getKeyphrasesDefaults( $post->keyphrases );
		$permalink      = get_permalink( $postId );
		$page           = aioseo()->searchStatistics->helpers->getPageSlug( $permalink );

		aioseo()->helpers->setWpQueryPost( $wpPost );
		$seoMeta = [
			'title'              => aioseo()->meta->title->getTitle(),
			'description'        => aioseo()->meta->description->getDescription(),
			'schema'             => implode( ', ', self::getSchemaGraphs( $wpPost ) ),
			'canonicalUrl'       => aioseo()->helpers->canonicalUrl(),
			'robots'             => aioseo()->meta->robots->meta(),
			'additionalKeywords' => wp_list_pluck( $keyphrases->additional, 'keyphrase' ),
		];
		aioseo()->helpers->restoreWpQuery();

		$wpObject = SearchStatisticsModels\WpObject::getObjectBy( 'path', $page );

		return new \WP_REST_Response( [
			'success' => true,
			'data'    => [
				'postTitle'        => aioseo()->helpers->decodeHtmlEntities( $wpPost->post_title ),
				'permalink'        => $permalink,
				'page'             => $page,
				'editLink'         => get_edit_post_link( $postId, '' ),
				'postType'         => aioseo()->helpers->getPostType( $postTypeObject ),
				'seoScores'        => [
					'headline'    => (int) aioseo()->standalone->headlineAnalyzer->getResult( get_the_title( $postId ) )['score'],
					'seoAnalysis' => false, // Will be loaded later.
					'truSeo'      => (int) $post->seo_score,
				],
				'inspectionResult' => ! empty( $wpObject ) ? $wpObject->inspection_result : null,
				'focusKeyword'     => $keyphrases->focus->keyphrase,
				'seoMeta'          => $seoMeta,
				'suggestedChanges' => self::getSuggestedChanges( $post ),
				'linkAssistant'    => (object) aioseo()->searchStatistics->helpers->getLinkAssistantData( $postId ),
				'redirects'        => (object) aioseo()->searchStatistics->helpers->getRedirectsData( $postId ),
			]
		], 200 );
	}

	/**
	 * Returns the statistics for the post detail page.
	 *
	 * @since 4.3.0
	 *
	 * @param  \WP_REST_Request  $request The REST Request
	 * @return \WP_REST_Response          The response.
	 */
	public static function getPostDetailSeoStatistics( $request ) {
		if ( ! aioseo()->license->hasCoreFeature( 'search-statistics', 'post-detail-seo-statistics' ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Feature not available.'
			], 400 );
		}

		$startDate = $request->get_param( 'startDate' );
		$endDate   = $request->get_param( 'endDate' );
		$postId    = $request->get_param( 'postId' );

		if ( empty( $startDate ) || empty( $endDate ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Invalid date range.'
			], 400 );
		}

		if ( empty( $postId ) || ! is_numeric( $postId ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Invalid post id.'
			], 400 );
		}

		aioseo()->searchStatistics->stats->setDateRange( $startDate, $endDate );

		$permalink = get_permalink( $postId );
		$page      = aioseo()->searchStatistics->helpers->getPageSlug( $permalink );

		$baseUrl = untrailingslashit( aioseo()->searchStatistics->api->auth->getAuthedSite() );
		$pageUrl = $baseUrl . $page;
		$args    = [
			'start' => $startDate,
			'end'   => $endDate,
			'page'  => $pageUrl
		];

		$cacheArgs = [
			$startDate,
			$endDate,
			$pageUrl
		];

		$cacheHash  = sha1( implode( ',', $cacheArgs ) );
		$cachedData = aioseo()->core->cache->get( "aioseo_search_statistics_page_stats_{$cacheHash}" );
		if ( null !== $cachedData ) {
			$success    = false === $cachedData ? false : true;
			$statusCode = false === $cachedData ? 400 : 200;

			if ( $success ) {
				// Add graph markers.
				$cachedData = aioseo()->searchStatistics->markers->addTimelineMarkers( $cachedData, $postId );
			}

			return new \WP_REST_Response( [
				'success' => $success,
				'data'    => $cachedData,
				'range'   => aioseo()->searchStatistics->stats->getDateRange()
			], $statusCode );
		}

		$api      = new Api\Request( 'google-search-console/statistics/page/', $args, 'POST' );
		$response = $api->request();
		if ( is_wp_error( $response ) || ! empty( $response['error'] ) || empty( $response['data'] ) ) {
			aioseo()->core->cache->update( "aioseo_search_statistics_page_stats_{$cacheHash}", false, 60 );

			return new \WP_REST_Response( [
				'success' => false,
				'data'    => false,
				'range'   => aioseo()->searchStatistics->stats->getDateRange()
			], 400 );
		}

		$data = $response['data'];
		aioseo()->core->cache->update( "aioseo_search_statistics_page_stats_{$cacheHash}", $response['data'], MONTH_IN_SECONDS );

		// Add graph markers.
		$data = aioseo()->searchStatistics->markers->addTimelineMarkers( $data, $postId );

		return new \WP_REST_Response( [
			'success' => true,
			'data'    => $data
		], 200 );
	}

	/**
	 * Returns the keywords for the post detail page.
	 *
	 * @since 4.3.0
	 *
	 * @param  \WP_REST_Request  $request The REST Request
	 * @return \WP_REST_Response          The response.
	 */
	public static function getPostDetailKeywords( $request ) {
		if ( ! aioseo()->license->hasCoreFeature( 'search-statistics', 'post-detail-keywords' ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Feature not available.'
			], 400 );
		}

		$params     = $request->get_params();
		$startDate  = ! empty( $params['startDate'] ) ? $params['startDate'] : '';
		$endDate    = ! empty( $params['endDate'] ) ? $params['endDate'] : '';
		$limit      = ! empty( $params['limit'] ) ? $params['limit'] : aioseo()->settings->tablePagination['searchStatisticsPostDetailKeywords'];
		$offset     = ! empty( $params['offset'] ) ? $params['offset'] : 0;
		$filter     = ! empty( $params['filter'] ) ? $params['filter'] : 'all';
		$searchTerm = ! empty( $params['searchTerm'] ) ? sanitize_text_field( $params['searchTerm'] ) : '';
		$orderDir   = ! empty( $params['orderDir'] ) ? strtoupper( $params['orderDir'] ) : 'DESC';
		$orderBy    = ! empty( $params['orderBy'] ) ? aioseo()->helpers->toCamelCase( $params['orderBy'] ) : 'clicks';
		$postId     = ! empty( $params['postId'] ) ? $params['postId'] : 0;

		// If we're on the Top Losing/Top Winning pages, then we need to override the default ORDER BY/ORDER DIR.
		if ( 'all' !== $filter ) {
			if ( 'topLosing' === $filter ) {
				$orderBy  = 'decay';
				$orderDir = 'ASC';
			} elseif ( 'topWinning' === $filter ) {
				$orderBy  = 'decay';
				$orderDir = 'DESC';
			}
		}

		if ( empty( $startDate ) || empty( $endDate ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Invalid date range.'
			], 400 );
		}

		if ( empty( $postId ) || ! is_numeric( $postId ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Invalid post id.'
			], 400 );
		}

		aioseo()->searchStatistics->stats->setDateRange( $startDate, $endDate );

		$permalink = get_permalink( $postId );
		$page      = aioseo()->searchStatistics->helpers->getPageSlug( $permalink );

		$baseUrl = untrailingslashit( aioseo()->searchStatistics->api->auth->getAuthedSite() );
		$pageUrl = $baseUrl . $page;

		$cacheArgs = [
			aioseo()->searchStatistics->api->auth->getAuthedSite(),
			$startDate,
			$endDate,
			$limit,
			$offset,
			$filter,
			$searchTerm,
			$orderDir,
			$orderBy,
			$postId
		];

		$cacheHash  = sha1( implode( ',', $cacheArgs ) );
		$cachedData = aioseo()->core->cache->get( "aioseo_search_statistics_page_kws_{$cacheHash}" );
		if ( null !== $cachedData ) {
			$success    = false === $cachedData ? false : true;
			$statusCode = false === $cachedData ? 400 : 200;

			return new \WP_REST_Response( [
				'success' => $success,
				'data'    => $cachedData,
				'range'   => aioseo()->searchStatistics->stats->getDateRange()
			], $statusCode );
		}

		$args = [
			'start'      => $startDate,
			'end'        => $endDate,
			'page'       => $pageUrl,
			'pagination' => [
				'limit'      => $limit,
				'offset'     => $offset,
				'filter'     => $filter,
				'searchTerm' => $searchTerm,
				'orderDir'   => $orderDir,
				'orderBy'    => $orderBy
			]
		];

		$api      = new Api\Request( 'google-search-console/statistics/page/keywords/', $args, 'POST' );
		$response = $api->request();
		if ( is_wp_error( $response ) || ! empty( $response['error'] ) || empty( $response['data'] ) ) {
			aioseo()->core->cache->update( "aioseo_search_statistics_page_kws_{$cacheHash}", false, 60 );

			return new \WP_REST_Response( [
				'success' => false,
				'data'    => false,
				'range'   => aioseo()->searchStatistics->stats->getDateRange()
			], 400 );
		}

		$data = $response['data'];

		// Add localized filters to paginated data.
		$data['paginated']['filters'] = aioseo()->searchStatistics->stats->keywords->getFilters( $filter, $searchTerm );

		aioseo()->core->cache->update( "aioseo_search_statistics_page_kws_{$cacheHash}", $data, MONTH_IN_SECONDS );

		return new \WP_REST_Response( [
			'success' => true,
			'data'    => $data
		], 200 );
	}

	/**
	 * Returns the focus keyword trend for the post detail page.
	 *
	 * @since 4.3.0
	 *
	 * @param  \WP_REST_Request  $request The REST Request
	 * @return \WP_REST_Response          The response.
	 */
	public static function getPostDetailFocusKeywordTrend( $request ) {
		if ( ! aioseo()->license->hasCoreFeature( 'search-statistics', 'post-detail-focus-keyword-trend' ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Feature not available.'
			], 400 );
		}

		$params       = $request->get_params();
		$startDate    = ! empty( $params['startDate'] ) ? $params['startDate'] : '';
		$endDate      = ! empty( $params['endDate'] ) ? $params['endDate'] : '';
		$postId       = ! empty( $params['postId'] ) ? $params['postId'] : 0;
		$focusKeyword = ! empty( $params['focusKeyword'] ) ? $params['focusKeyword'] : '';

		if ( empty( $startDate ) || empty( $endDate ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Invalid date range.'
			], 400 );
		}

		if ( empty( $postId ) || ! is_numeric( $postId ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Invalid post id.'
			], 400 );
		}

		if ( empty( $focusKeyword ) ) {
			return new \WP_REST_Response( [
				'success' => false,
				'message' => 'Invalid focus keyword.'
			], 400 );
		}

		aioseo()->searchStatistics->stats->setDateRange( $startDate, $endDate );

		$cacheArgs = [
			aioseo()->searchStatistics->api->auth->getAuthedSite(),
			$startDate,
			$endDate,
			$postId,
			$focusKeyword
		];

		$cacheHash  = sha1( implode( ',', $cacheArgs ) );
		$cachedData = aioseo()->core->cache->get( "aioseo_search_statistics_page_focus_kw_{$cacheHash}" );
		if ( null !== $cachedData ) {
			$success    = false === $cachedData ? false : true;
			$statusCode = false === $cachedData ? 400 : 200;

			return new \WP_REST_Response( [
				'success' => $success,
				'data'    => $cachedData
			], $statusCode );
		}

		$permalink = get_permalink( $postId );
		$page      = aioseo()->searchStatistics->helpers->getPageSlug( $permalink );

		$baseUrl = untrailingslashit( aioseo()->searchStatistics->api->auth->getAuthedSite() );
		$pageUrl = $baseUrl . $page;

		$args = [
			'start'        => $startDate,
			'end'          => $endDate,
			'page'         => $pageUrl,
			'focusKeyword' => $focusKeyword
		];

		$api      = new Api\Request( 'google-search-console/statistics/page/focus-keyword/', $args, 'POST' );
		$response = $api->request();
		if ( is_wp_error( $response ) || ! empty( $response['error'] ) || empty( $response['data'] ) ) {
			aioseo()->core->cache->update( "aioseo_search_statistics_page_focus_kw_{$cacheHash}", false, 60 );

			return new \WP_REST_Response( [
				'success' => false,
				'data'    => false
			], 400 );
		}

		aioseo()->core->cache->update( "aioseo_search_statistics_page_focus_kw_{$cacheHash}", $response['data'], MONTH_IN_SECONDS );

		return new \WP_REST_Response( [
			'success' => true,
			'data'    => $response['data']
		], 200 );
	}

	/**
	 * Returns a list of schema graphs for the current post.
	 *
	 * @since 4.3.0
	 *
	 * @param  \WP_Post      $post The post to get the schema graphs.
	 * @return array[string]       List of schema graph names.
	 */
	private static function getSchemaGraphs( $post ) {
		$schemaGraphs = [];
		$defaultGraph = aioseo()->schema->getDefaultPostGraph();
		if ( $defaultGraph ) {
			$schemaGraphs[] = $defaultGraph;
		}

		$userDefinedGraphs = [];
		$metaData          = aioseo()->meta->metaData->getMetaData( $post );
		if ( ! is_a( $post, 'WP_Post' ) || empty( $metaData->post_id ) ) {
			return $schemaGraphs;
		}

		$graphs = $metaData->schema->graphs;
		foreach ( $graphs as $graphData ) {
			$graphData = (object) $graphData;

			if (
				empty( $graphData->id ) ||
				empty( $graphData->graphName ) ||
				empty( $graphData->properties )
			) {
				continue;
			}

			// If the graph has a subtype, this is the place where we need to replace the main graph name with the one of the subtype.
			if ( ! empty( $graphData->properties->type ) ) {
				$graphData->graphName = $graphData->properties->type;
			}

			$userDefinedGraphs[] = $graphData->graphName;
		}

		$customGraphs = [];
		foreach ( $metaData->schema->customGraphs as $customGraphData ) {
			$customGraphData = (object) $customGraphData;
			if ( empty( $customGraphData->schema ) ) {
				continue;
			}

			$customSchema = json_decode( $customGraphData->schema, true );
			if ( ! empty( $customSchema ) ) {
				if ( isset( $customSchema['@graph'] ) && is_array( $customSchema['@graph'] ) ) {
					foreach ( $customSchema['@graph'] as $graph ) {
						if ( ! empty( $graph['@type'] ) ) {
							$userDefinedGraphs[] = $graph['@type'] . ' ' . __( '(Custom)', 'aioseo-pro' );
						}
					}
				} else {
					if ( ! empty( $customSchema['@type'] ) ) {
						$userDefinedGraphs[] = $customSchema['@type'] . ' ' . __( '(Custom)', 'aioseo-pro' );
					}
				}
			}
		}

		$blockGraphs = [];
		foreach ( $metaData->schema->blockGraphs as $blockGraphData ) {
			// If the type isn't set for whatever reason, then bail.
			if ( empty( $blockGraphData->type ) ) {
				continue;
			}

			$type = strtolower( $blockGraphData->type );
			switch ( $type ) {
				case 'aioseo/faq':
					$blockGraphs[] = 'FAQPage' . ' ' . __( '(Block)', 'aioseo-pro' );
					break;
				default:
					break;
			}
		}

		$schemaGraphs = array_merge( $schemaGraphs, $userDefinedGraphs, $customGraphs, $blockGraphs );

		sort( $schemaGraphs );

		return $schemaGraphs;
	}

	/**
	 * Get the suggested changes for the current post.
	 *
	 * @since 4.3.0
	 *
	 * @param  Models\Post $post The post to get the schema graphs.
	 * @return array             List of the suggested changes.
	 */
	private static function getSuggestedChanges( $post ) {
		$analysis         = Models\Post::getPageAnalysisDefaults( $post->page_analysis );
		$suggestedChanges = [];

		foreach ( $analysis->analysis as $analysis ) {
			foreach ( $analysis as $change => $score ) {
				if ( is_object( $score ) && 1 === $score->error ) {
					$suggestedChanges[] = self::getSuggestedChangeDescription( $change, $score->score );
				}
			}
		}

		return array_values( array_filter( $suggestedChanges ) );
	}

	/**
	 * Get the suggested changes description and tooltip.
	 *
	 * @since 4.3.0
	 *
	 * @param  string $change The change name.
	 * @param  int    $score  The score for the current change.
	 * @return array          An array with the description and whether or not to show a tooltip.
	 */
	private static function getSuggestedChangeDescription( $change, $score ) {
		// phpcs:disable Universal.Arrays.MixedArrayKeyTypes
		$keyphraseString = __( 'Focus Keyphrase', 'aioseo-pro' );
		$strings         = [
			'keyphraseInContent'        => [
				'3' => __( 'Your Focus Keyphrase was not found in your content.', 'aioseo-pro' )
			],
			'keyphraseInIntroduction'   => [
				'0' => __( 'No content added yet.', 'aioseo-pro' ),
				'3' => sprintf(
					// Translators: 1 - Focus Keyphrase or Keyphrase.
					__( 'Your %1$s does not appear in the first paragraph. Make sure the topic is clear immediately.', 'aioseo-pro' ),
					$keyphraseString
				)
			],
			'keyphraseInDescription'    => [
				'3' => sprintf(
					// Translators: 1 - Focus Keyphrase or Keyphrase.
					__( 'Your %1$s was not found in the meta description.', 'aioseo-pro' ),
					$keyphraseString
				)
			],
			'keyphraseInURL'            => [
				'1' => __( 'Focus Keyphrase not found in the URL.', 'aioseo-pro' )
			],
			'keyphraseLength'           => [
				'-999' => sprintf(
					// Translators: 1 - Focus Keyphrase or Keyphrase.
					__( 'No %1$s was set. Set a %1$s in order to calculate your SEO score.', 'aioseo-pro' ),
					$keyphraseString
				),
				'3'    => sprintf(
					// Translators: 1 - Focus Keyphrase or Keyphrase.
					__( 'The %1$s is too long. Try to make it shorter.', 'aioseo-pro' ),
					$keyphraseString
				),
				'6'    => sprintf(
					// Translators: 1 - Focus Keyphrase or Keyphrase.
					__( 'The %1$s is slightly long. Try to make it shorter.', 'aioseo-pro' ),
					$keyphraseString
				)
			],
			'metadescriptionLength'     => [
				'tooltip' => true,
				'1'       => __( 'No meta description has been specified. Search engines will display copy from the page instead. Make sure to write one!', 'aioseo-pro' ),
				'6'       => __( 'Your meta description may not display correctly in search results.', 'aioseo-pro' )
			],
			'lengthContent'             => [
				'6'   => __( 'The content is below the minimum of words. Add more content.', 'aioseo-pro' ),
				'3'   => __( 'The content is below the minimum of words. Add more content.', 'aioseo-pro' ),
				'-10' => __( 'This is far below the recommended minimum of words.', 'aioseo-pro' ),
				'-20' => __( 'This is far below the recommended minimum of words.', 'aioseo-pro' )
			],
			'isInternalLink'            => [
				'3' => __( 'There are not enough internal links in your content, try adding some more.', 'aioseo-pro' )
			],
			'isExternalLink'            => [
				'3' => __( 'No outbound links were found. Link out to external resources.', 'aioseo-pro' )
			],
			'keyphraseInTitle'          => [
				'3' => __( 'Your Focus keyphrase was not found in the SEO title.', 'aioseo-pro' )
			],
			'keyphraseInBeginningTitle' => [
				'3' => __( 'The Focus keyphrase doesn\'t appear at the beginning of the SEO title.', 'aioseo-pro' )
			],
			'titleLength'               => [
				'tooltip' => true,
				'1'       => __( 'No title has been specified. Make sure to write one!', 'aioseo-pro' ),
				'6'       => __( 'Your title may not display correctly in search results.', 'aioseo-pro' )
			],
			'contentHasAssets'          => [
				'1' => __( 'You are not using rich media like images or videos.', 'aioseo-pro' )
			],
			'paragraphLength'           => [
				'1' => __( 'At least one paragraph is long. Consider using short paragraphs.', 'aioseo-pro' )
			],
			'sentenceLength'            => [
				'tooltip' => true,
				'6'       => __( 'Some of your sentences are too long, try shortening them to improve readability.', 'aioseo-pro' )
			],
			'passiveVoice'              => [
				'tooltip' => true,
				'3'       => __( 'Try to use active counterparts on the sentences.', 'aioseo-pro' )
			],
			'transitionWords'           => [
				'tooltip' => true,
				'3'       => __( 'Use more transition words in your content.', 'aioseo-pro' ),
				'6'       => __( 'Use more transition words in your content.', 'aioseo-pro' )
			],
			'consecutiveSentences'      => [
				'tooltip' => true,
				'3'       => __( 'The text contains a high number of consecutive sentences starting with the same word. Try to mix things up!', 'aioseo-pro' )
			],
			'subheadingsDistribution'   => [
				'tooltip' => true,
				'6'       => __( 'Add subheadings to improve readability.', 'aioseo-pro' ),
				'3'       => __( 'Add subheadings to improve readability.', 'aioseo-pro' ),
				'2'       => __( 'You are not using any subheadings, although your text is rather long. Try and add some subheadings.', 'aioseo-pro' )
			],
			'calculateFleschReading'    => [
				'tooltip' => true,
				'6'       => __( 'Use less difficult words to improve readability', 'aioseo-pro' ),
				'3'       => __( 'Use less difficult words to improve readability', 'aioseo-pro' )
			],
		];
		// phpcs:enable Universal.Arrays.MixedArrayKeyTypes

		if ( ! isset( $strings[ $change ] ) || ! isset( $strings[ $change ][ $score ] ) ) {
			return [];
		}

		return [
			'text'    => $strings[ $change ][ $score ],
			'tooltip' => in_array( $change, array_keys( wp_list_filter( $strings, [ 'tooltip' => true ] ) ), true )
		];
	}
}