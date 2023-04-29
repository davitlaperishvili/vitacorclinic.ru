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
                        <h1 id="pagetitle"><?php single_cat_title(); ?></h1>
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
								if($currentTax->term_id == 81):
									?>
                                    <div class="tab-pane">
                                        <h4>Руководители</h4>
                                        <div class="row sid items">
											<?php
											$query = new WP_Query( 'cat=67&nopaging=1' );
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
											$query = new WP_Query( 'cat=68&nopaging=1' );
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
											$query = new WP_Query( 'cat=69&nopaging=1' );
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
											$query = new WP_Query( 'cat=70&nopaging=1' );
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
								<?php
								if($currentTax->term_id == 67):
									?>
                                    <div class="tab-pane">
                                        <div class="row sid items">
											<?php
											$query = new WP_Query( 'cat=67&nopaging=1' );
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
								<?php if($currentTax->term_id == 68):
									?>
                                    <div class="tab-pane">
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
											$query = new WP_Query( 'cat=68&nopaging=1' );
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
								<?php if($currentTax->term_id == 69):
									?>
                                    <div class="tab-pane">
                                        <div class="row sid items">
											<?php
											$query = new WP_Query( 'cat=69&nopaging=1' );
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
								<?php if($currentTax->term_id == 70):
									?>
                                    <div class="tab-pane">
                                        <div class="row sid items">
											<?php
											$query = new WP_Query( 'cat=70&nopaging=1' );
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
