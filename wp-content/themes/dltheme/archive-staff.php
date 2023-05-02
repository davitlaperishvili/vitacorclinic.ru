<?php get_header(); ?>
<?php
$currentTax = get_queried_object();
?>
<div class="body">
    <div role="main" class="main banner-AUTO">
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
                        <h1 id="pagetitle"><?php echo $currentTax->label ?></h1>
                    </div>
                </div>
            </div>
        </section>
        <div id="content" class="container">
            <div class="row">
                <div class="maxwidth-theme">
                    <div class="col-md-3 col-sm-3 hidden-xs hidden-sm left-menu-md">
                        <aside class="sidebar">
							<?php
							$menuParameters = array(
								'menu' => 'specialist_aside',
								'container' => false,
								'menu_id'         => '',
								'menu_class'      => 'nav nav-list side-menu',
							);
							wp_nav_menu($menuParameters);
							?>
                        </aside>
                    </div>
                    <div class="col-md-9 col-sm-12 col-xs-12 content-md">
                        <div class="item-views list staff-items staff-type-1 table-type-block blocks image_left staff">
                            <div class="group-content">
								<?php
								if($currentTax->name == "staff"):
									?>
                                    <div class="tab-pane">
                                        <h4>Руководители</h4>
                                        <div class="row sid items">
											<?php
                      $args = array(
                        'post_type' => 'staff', // replace with your custom post type name
                        'tax_query' => array(
                          array(
                            'taxonomy' => 'rubriki', // replace with your custom taxonomy name
                            'field' => 'term_id',
                            'terms' => 94, // replace with your custom taxonomy ID
                          ),
                        ),
                      );
											$query = new WP_Query( $args );
											if( $query->have_posts() ){
												while( $query->have_posts() ){
													$query->the_post();
													?>
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="item shadow1 clearfix">
                                                            <div class="wrap">
                                                                <div class="wrap">
                                                                    <div class="image">
                                                                        <div class="wrap">
                                                                            <a href="<?php the_permalink(); ?>">
                                                                                <img data-lazyload class="img-responsive lazyloaded" src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php the_title(); ?>">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="body-info">
                                                                        <div class="top-block-wrapper">
                                                                            <div class="title">
                                                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                                            </div>
                                                                            <div class="post twosmallfont"><?php the_field('dolzhnost'); ?></div>
                                                                        </div>
                                                                        <div class="bottom-block">
                                                                            <div class="wrap">
                                                                                <div class="button text-right no_address">
                                                                                    <span class="pop1 btn btn-default">Запись онлайн</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
													<?php
												}
												wp_reset_postdata();
											}
											else
												echo 'Записей нет.';
											?>
                                        </div>
                                    </div>
                                    <div class="tab-pane">
                                        <h4>Терапевты, узкие специалисты, детские врачи</h4>
										<?php
										$content = category_description(68);
										if($content):
											?>
                                            <div class="text_before_items">
												<?php echo strip_tags($content); ?>
                                            </div>
										<?php endif; ?>

                                        <div class="row sid items">
											<?php
                      $args2 = array(
                        'post_type' => 'staff', // replace with your custom post type name
                        'tax_query' => array(
                          array(
                            'taxonomy' => 'rubriki', // replace with your custom taxonomy name
                            'field' => 'term_id',
                            'terms' => 95, // replace with your custom taxonomy ID
                          ),
                        ),
                      );
											$query = new WP_Query( $args2 );
											if( $query->have_posts() ){
												while( $query->have_posts() ){
													$query->the_post();
													?>
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="item shadow1 clearfix">
                                                            <div class="wrap">
                                                                <div class="wrap">
                                                                    <div class="image">
                                                                        <div class="wrap">
                                                                            <a href="<?php the_permalink(); ?>">
                                                                                <img data-lazyload class="img-responsive lazyloaded" src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php the_title(); ?>">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="body-info">
                                                                        <div class="top-block-wrapper">
                                                                            <div class="title">
                                                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                                            </div>
                                                                            <div class="post twosmallfont"><?php the_field('dolzhnost'); ?></div>
                                                                        </div>
                                                                        <div class="bottom-block">
                                                                            <div class="wrap">
                                                                                <div class="button text-right no_address">
                                                                                    <span class="pop1 btn btn-default">Запись онлайн</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
													<?php
												}
												wp_reset_postdata();
											}
											else
												echo 'Записей нет.';
											?>
                                        </div>
                                    </div>
                                    <div class="tab-pane">
                                        <h4>Процедурный кабинет</h4>

                                        <div class="row sid items">
											<?php
                      $args3 = array(
                        'post_type' => 'staff', // replace with your custom post type name
                        'tax_query' => array(
                          array(
                            'taxonomy' => 'rubriki', // replace with your custom taxonomy name
                            'field' => 'term_id',
                            'terms' => 93, // replace with your custom taxonomy ID
                          ),
                        ),
                      );
											$query = new WP_Query( $args3 );
											if( $query->have_posts() ){
												while( $query->have_posts() ){
													$query->the_post();
													?>
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="item shadow1 clearfix">
                                                            <div class="wrap">
                                                                <div class="wrap">
                                                                    <div class="image">
                                                                        <div class="wrap">
                                                                            <a href="<?php the_permalink(); ?>">
                                                                                <img data-lazyload class="img-responsive lazyloaded" src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php the_title(); ?>">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="body-info">
                                                                        <div class="top-block-wrapper">
                                                                            <div class="title">
                                                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                                            </div>
                                                                            <div class="post twosmallfont"><?php the_field('dolzhnost'); ?></div>
                                                                        </div>
                                                                        <div class="bottom-block">
                                                                            <div class="wrap">
                                                                                <div class="button text-right no_address">
                                                                                    <span class="pop1 btn btn-default">Запись онлайн</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
													<?php
												}
												wp_reset_postdata();
											}
											else
												echo 'Записей нет.';
											?>
                                        </div>
                                    </div>
                                    <div class="tab-pane">
                                        <h4>Административный отдел</h4>
                                        <div class="row sid items">
											<?php
                      $args4 = array(
                        'post_type' => 'staff', // replace with your custom post type name
                        'tax_query' => array(
                          array(
                            'taxonomy' => 'rubriki', // replace with your custom taxonomy name
                            'field' => 'term_id',
                            'terms' => 92, // replace with your custom taxonomy ID
                          ),
                        ),
                      );
											$query = new WP_Query( $args4 );
											if( $query->have_posts() ){
												while( $query->have_posts() ){
													$query->the_post();
													?>
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="item shadow1 clearfix">
                                                            <div class="wrap">
                                                                <div class="wrap">
                                                                    <div class="image">
                                                                        <div class="wrap">
                                                                            <a href="<?php the_permalink(); ?>">
                                                                                <img data-lazyload class="img-responsive lazyloaded" src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php the_title(); ?>">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="body-info">
                                                                        <div class="top-block-wrapper">
                                                                            <div class="title">
                                                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                                            </div>
                                                                            <div class="post twosmallfont"><?php the_field('dolzhnost'); ?></div>
                                                                        </div>
                                                                        <div class="bottom-block">
                                                                            <div class="wrap">
                                                                                <div class="button text-right no_address">
                                                                                    <span class="pop1 btn btn-default">Запись онлайн</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
													<?php
												}
												wp_reset_postdata();
											}
											else
												echo 'Записей нет.';
											?>
                                        </div>
                                    </div>
								<?php endif; ?>
                            </div>
                            <div class="pagination_nav"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>