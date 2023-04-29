<?php

// Register menus
function register_custom_nav_menu(){
	register_nav_menu('header_menu', 'Header Menu');
}
add_action('after_setup_theme', 'register_custom_nav_menu');