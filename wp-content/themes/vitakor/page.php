<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vitakor
 */

get_header();
?>

    <div role="main" class="main banner-AUTO">

		<?php
		while ( have_posts() ) :
			the_post();

        if (is_page(2)): get_template_part( 'template-parts/content', 'main' );
        elseif (is_page(354)): get_template_part( 'template-parts/content', 'price' );
        elseif (is_page(366)): get_template_part( 'template-parts/content', 'stoma' );
		elseif (is_page(375)): get_template_part( 'template-parts/content', 'stoma-dop' );
		elseif (is_page(385)): get_template_part( 'template-parts/content', 'stoma-dop' );
		elseif (is_page(382)): get_template_part( 'template-parts/content', 'stoma-dop' );
		elseif (is_page(373)): get_template_part( 'template-parts/content', 'stoma-dop' );
		elseif (is_page(377)): get_template_part( 'template-parts/content', 'stoma-dop' );
		elseif (is_page(379)): get_template_part( 'template-parts/content', 'stoma-dop' );
		elseif (is_page(389)): get_template_part( 'template-parts/content', 'stoma-dop' );
		else: get_template_part( 'template-parts/content', 'page' );
        endif;
		endwhile; // End of the loop.
		?>

	</div><!-- #main -->

<?php
get_footer();
