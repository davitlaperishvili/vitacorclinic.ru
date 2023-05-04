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
			'singular_name'		=> 'Заболевания',
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