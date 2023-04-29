<?php
/**
 * D.L functions and definitions
 *
 * @package D.L
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

$dl_inc_dir = get_template_directory() . '/inc';

// Array of files to include
$dl_includes = array(
	'/setup.php',
	'/widgets.php',
	'/enqueue.php',
	'/menus.php',
	'/options-page.php'
);

// Include files
foreach($dl_includes as $file){
	require_once $dl_inc_dir . $file;
}
add_filter( 'paginate_links', function($link){

    //Remove link page/1/ from the first element and prev element
    
    if(is_paged()){
        $link= str_replace('page/1/', '', $link);
    }

    return $link;
} );