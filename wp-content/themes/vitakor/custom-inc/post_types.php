<?php

// Events post type
function vrachi_post_type(){
	register_post_type('vrachi', [
		'label'  => null,
		'labels' => [
			'name'				=> 'Врачи',
			'singular_name'		=> 'Врачи',
			'add_new'			=> 'Добавить Врача',
			'add_new_item'		=> 'Добавить Врача',
			'edit_item'			=> 'Редактировать Врача',
			'new_item'			=> 'New Врачи',
			'view_item'			=> 'Watch Врачи',
			'search_items'		=> 'Search Врачи',
			'not_found'			=> 'Not found',
		],
		'description'		=> 'Post for Врачи',
		'public'			=> true,
		'show_in_menu'		=> true,
		'show_in_rest'		=> true,
		'rest_base'			=> true,
		'menu_position'		=> true,
		'menu_icon'			=> 'dashicons-megaphone',
		'hierarchical'		=> true,
		'supports'			=> ['title', 'thumbnail', 'editor'],
		'taxonomies'		=> [],
		'has_archive'		=> true,
		'rewrite'			=> true,
		'query_var'			=> true,
	]);
}
add_action('init', 'vrachi_post_type');

function staff_post_type() {
	register_post_type( 'staff', [
		'label'               => null,
		'labels'              => [
			'name'          => 'Специалисты',
			'singular_name' => 'Специалисты',
			'add_new'       => 'Добавить Специалиста',
			'add_new_item'  => 'Добавить Специалиста',
			'edit_item'     => 'Редактировать Специалиста',
			'new_item'      => 'New Специалисты',
			'view_item'     => 'Watch Специалисты',
			'search_items'  => 'Search Специалисты',
			'not_found'     => 'Not found',
		],
		'description'         => 'Post for Специалисты',
		'public'              => true,
		'show_in_menu'        => true,
		'show_in_rest'        => true,
		'rest_base'           => true,
		'menu_position'       => true,
		'menu_icon'           => 'dashicons-groups',
		'hierarchical'        => true,
		'supports'            => [ 'title', 'thumbnail', 'editor' ],
		'taxonomies'          => [ 'rubriki' ],
		'has_archive'         => true,
		'rewrite'             => [ 'slug' => 'staff', 'with_front' => false ],
		'query_var'           => true,
		'ep_mask'             => EP_PERMALINK | EP_PAGES,
	] );

	// Now register the taxonomy
	register_taxonomy( 'rubriki', [ 'staff' ], [
		"label"              => 'Рубрики',
		'hierarchical'       => true,
    'public'                => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'show_admin_column'  => true,
		'query_var'          => true,
		'rewrite'            => true,
	] );
}
add_action( 'init', 'staff_post_type' );

// Filter the post type link to include the taxonomy term in the URL
add_filter( 'post_type_link', 'replace_post_link', 1, 3 );
function replace_post_link( $link, $post = 0 ) {
	if ( $post->post_type == 'staff' ) {
		$terms = wp_get_object_terms( $post->ID, 'rubriki' );
		if ( $terms ) {
			$link = str_replace( '%rubriki%', $terms[0]->slug, $link );
		} else {
			$link = str_replace( '%rubriki%/', '', $link );
		}
	}
	return $link;
}

function zabolevania_post_type(){
	register_post_type('zabolevania', [
		'label'  => null,
		'labels' => [
			'name'				=> 'Заболевания',
			'singular_name'		=> 'Заболевание',
			'add_new'			=> 'Добавить Заболевания',
			'add_new_item'		=> 'Добавить Заболевания',
			'edit_item'			=> 'Редактировать Заболевания',
			'new_item'			=> 'New Заболевания',
			'view_item'			=> 'Watch Заболевания',
			'search_items'		=> 'Search Заболевания',
			'not_found'			=> 'Not found',
		],
		'description'		=> 'Post for Заболевания',
		'public'			=> true,
		'show_in_menu'		=> true,
		'show_in_rest'		=> true,
		'rest_base'			=> true,
		'menu_position'		=> true,
		'menu_icon'			=> 'dashicons-megaphone',
		'hierarchical'		=> true,
		'supports'			=> ['title', 'thumbnail', 'editor'],
		'taxonomies'		=> [],
		'has_archive'		=> true,
		'rewrite'			=> true,
		'query_var'			=> true,
	]);
}
add_action('init', 'zabolevania_post_type');

function uslugi_post_type(){
	register_post_type('services', [
		'label'  => null,
		'labels' => [
			'name'				=> 'Услуги',
			'singular_name'		=> 'Услуга',
			'add_new'			=> 'Добавить Услуги',
			'add_new_item'		=> 'Добавить Услуги',
			'edit_item'			=> 'Редактировать Услуги',
			'new_item'			=> 'New Услуги',
			'view_item'			=> 'Watch Услуги',
			'search_items'		=> 'Search Услуги',
			'not_found'			=> 'Not found',
		],
		'description'		=> 'Post for Услуги',
		'public'			=> true,
		'show_in_menu'		=> true,
		'show_in_rest'		=> true,
		'rest_base'			=> true,
		'menu_position'		=> true,
		'menu_icon'			=> 'dashicons-megaphone',
		'hierarchical'		=> true,
		'supports'			=> ['title', 'thumbnail', 'editor'],
		'taxonomies'          => [ 'kategorii' ],
		'has_archive'         => 'services',
		'rewrite'             => ['slug' => 'services', 'with_front' => false],
		'query_var'			=> true,
	]);
  // Now register the taxonomy
	register_taxonomy( 'kategorii', [ 'services' ], [
		"label"              => 'Категории',
		'hierarchical'       => true,
    'public'                => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'show_admin_column'  => true,
		'query_var'          => true,
    'has_archive' => true,
		// 'rewrite'            => ['slug' => 'services', 'with_front' => true]
		// 'rewrite'            => false
	] );
}
add_action('init', 'uslugi_post_type');

// Filter the post type link to include the taxonomy term in the URL
// add_filter( 'post_type_link', 'replace_post_link_uslugi_test', 1, 3 );
// function replace_post_link_uslugi_test( $link, $post = 0 ) {
// 	if ( $post->post_type == 'services' ) {
// 		$terms = wp_get_object_terms( $post->ID, 'kategorii' );
//     $taxonomy_name = 'kategorii';
//     if ($terms) {
//       $taxonomy_slug = $terms[0]->slug;
//       $link = str_replace($taxonomy_name, '/', $link);

//       // Get the position of the first occurrence of "vzrosloe-otdelenie"
//       $pos = strpos($link, $taxonomy_slug);
//       // echo "hey djnvcaso nvpau nvopa nbovnsdofnv on ndfnbojsdnob nfbn odfnbj";
//       if ($pos !== false) {
//           // Check if there is a second occurrence of "vzrosloe-otdelenie"
//           if (strpos($link, $taxonomy_slug, $pos + 1) !== false) {
//               // Remove the second occurrence by replacing it with an empty string
//               $link = str_replace($taxonomy_slug, '', $link);
//           }
//       }
//     } else {
//         $link = str_replace('/%' . $taxonomy_name . '%/', '/', $link);
//     }
// 	}
    
// 	return $link;
// }
function flush_rewrite_rules_once() {
  flush_rewrite_rules();
}
add_action('init', 'flush_rewrite_rules_once');
function custom_rewrite_rule() {
  add_rewrite_rule(
      'services$',
      'index.php?post_type=services',
      'top'
  );
}
add_action('init', 'custom_rewrite_rule');

function promo_post_type(){
	register_post_type('promo', [
		'label'  => null,
		'labels' => [
			'name'				=> 'Акции',
			'singular_name'		=> 'Акция',
			'add_new'			=> 'Добавить Акцию',
			'add_new_item'		=> 'Добавить Акцию',
			'edit_item'			=> 'Редактировать Акцию',
			'new_item'			=> 'New Акции',
			'view_item'			=> 'Watch Акции',
			'search_items'		=> 'Search Акции',
			'not_found'			=> 'Not found',
		],
		'description'		=> 'Post for Акции',
		'public'			=> true,
		'show_in_menu'		=> true,
		'show_in_rest'		=> true,
		'rest_base'			=> true,
		'menu_position'		=> true,
		'menu_icon'			=> 'dashicons-megaphone',
		'hierarchical'		=> true,
		'supports'			=> ['title', 'thumbnail', 'editor'],
		'taxonomies'		=> [],
		'has_archive'		=> true,
		'rewrite'			=> true,
		'query_var'			=> true,
	]);
  register_taxonomy( 'rubriki-akcii', [ 'promo' ], [
		"label"              => 'Категории',
		'hierarchical'       => true,
    'public'                => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'show_admin_column'  => true,
		'query_var'          => true,
    'has_archive' => true,
		// 'rewrite'            => ['slug' => 'services', 'with_front' => true]
		// 'rewrite'            => false
	] );
}
add_action('init', 'promo_post_type');