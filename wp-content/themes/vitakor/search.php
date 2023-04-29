<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package vitakor
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>
<div class="search-page">
	<section class="page-top maxwidth-theme ">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb" id="navigation">
					<?php if(function_exists('bcn_display'))
					{
						bcn_display();
					}?>
                </div>
                <div class="page-top-main">
                    <h1 id="pagetitle"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Результат поиска: %s', 'vitakor' ), '<span>' . get_search_query() . '</span>' );
					?></h1>
                </div>
            </div>
        </div>
    

<div id="content" class="container">
            <div class="row">
            	<div class="col-md-12">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
?>
				<hr />
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<ul class="path">
<?php 
$links = array_map( function ( $category ) {
	return sprintf(
		'<a href="%s" class="link link_text">%s</a>', // Шаблон вывода ссылки
		esc_url( get_category_link( $category ) ), // Ссылка на рубрику
		esc_html( $category->name ) // Название рубрики
	);
}, get_the_category() );

echo implode( ', ', $links );
?>
					</ul>
					<div class="text">
						<?php the_excerpt(); ?>
					</div>
<?php
			endwhile;

			the_posts_navigation();
?>
</div>
</div>
</div>
</div>
</section>
<style>
#secondary{
	display: none !important;
}
</style>
<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
