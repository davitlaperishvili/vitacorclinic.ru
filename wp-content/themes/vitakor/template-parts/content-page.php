<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vitakor
 */

?>


<div class="body">
    <div role="main" class="main banner-AUTO">
        <section class="page-top maxwidth-theme">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb" id="navigation">
						<?php if(function_exists('bcn_display'))
						{
							bcn_display();
						}?>
                    </div>
                    <div class="page-top-main">
                        <header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header><!-- .entry-header -->		
                    </div>
                </div>
            </div>
        </section>
        <div id="content" class="container">
            <div class="row">
                <div class="maxwidth-theme">
                    <div class="col-md-12 col-sm-12 col-xs-12 content-md">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 hidden-xs hidden-sm left-menu-md">
								<aside class="sidebar">
									<?php
									$menuParameters = array(
										'menu' => 'clinic_menu',
										'container' => false,
										'menu_id'         => '',
										'menu_class'      => 'nav nav-list side-menu',
									);
									wp_nav_menu($menuParameters);
									?>
								</aside>
                                <div class="sidearea">
                                        <div class="ask_a_question_wrapper">
                                            <div class="ask_a_question nonfixed" style="top: 0px;">
                                                <div class="inner">
                                                    <div class="text-block">Наши администраторы ответят на любой интересующий вопрос по услуге
                                                    </div>
                                                </div>
                                                <div class="outer">
                                                    <span><span class="pop1 btn btn-default btn-lg"><span>Задать вопрос</span></span></span>
                                                </div>
                                            </div>
                                        </div>
                                    <div style="padding:0 0 0 25px;">
                                        <i>Современная медицина без страха и боли. «Витакор» – на страже здоровья и долголетия!</i>
                                    </div>
                                </div>
                            </div>

                                <div class="col-md-9 col-sm-12 col-xs-12 content-md services">
									
                                    <div class="item-views list sections blocks">
                                        <div class="items-sections row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="item_wrap item-border shadow1">
                                                        <div class="item clearfix wti">
                                                            <div class="info">
																<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
													
                                                            </div>
	<?php vitakor_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vitakor' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->															
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'vitakor' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
