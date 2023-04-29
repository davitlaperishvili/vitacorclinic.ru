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
								'menu' => 'clinic_menu',
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
								if($currentTax->term_id == 10):
									?>

                                    <div class="tab-pane">
                                        <div class="row sid items">
											<?php
											$query = new WP_Query( 'cat=10&nopaging=1' );
											if( $query->have_posts() ){
												while( $query->have_posts() ){
													$query->the_post();
													?>
													<hr />   
														<div class="text">
															<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
															<?php the_content(); ?>
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
