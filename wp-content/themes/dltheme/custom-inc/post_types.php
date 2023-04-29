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