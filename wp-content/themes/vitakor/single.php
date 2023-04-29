<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vitakor
 */

get_header();
?>

<?php
while ( have_posts() ) :
	the_post();
	$cat = get_the_category();

    if($cat[0]->parent == 81): get_template_part( 'custom-single/single', 'specialists' );
	else: get_template_part( 'template-parts/content', get_post_type() );
    endif;
	the_post_navigation(
		array(
			'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Назад:', 'vitakor' ) . '</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Вперед:', 'vitakor' ) . '</span> <span class="nav-title">%title</span>',
		)
	);

endwhile; // End of the loop.
?>

<?php
get_footer();
