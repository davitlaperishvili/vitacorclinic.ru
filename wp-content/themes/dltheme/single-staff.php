<?php get_header(); ?>

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
                        <h1 id="pagetitle"><?php single_post_title(); ?></h1>
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
                        <div class="detail staff">
                            <article class="detail_wrap">
                                <div class="top_block clearfix">
                                    <div class="detailimage">
                                        <img data-lazyload class="img-responsive lazyloaded" title="<?php single_post_title(); ?>" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php single_post_title(); ?>">
                                    </div>
                                    <div class="top_right_block clearfix">									
										
                                        <div class="top_desc pull-right">
                                            <div class="button">
                                                <span class="pop1 btn btn-default btn-lg">Запись онлайн</span>
                                            </div>
                                            <div class="text">Запишитесь на прием к доктору в удобное для вас время</div>
                                        </div>
                                        <div class="properties">
                                            <?php
                                                $dolzhnost = get_field('dolzhnost');
                                                $kategoriya = get_field('kvalifikaczionnaya_kategoriya');
                                                $stazh = get_field('stazh_raboty');
												$pricedoctor = get_field('pricedoctor');
                                            ?>
                                            <?php if($dolzhnost): ?>
                                                <div class="property">
                                                    <div class="title-prop twosmallfont">Должность</div>
                                                    <div><?php the_field('dolzhnost');?></div>
                                                </div>
	                                        <?php endif; ?>

	                                        <?php if($kategoriya): ?>
                                                <div class="property">
                                                    <div class="title-prop twosmallfont">Квалификационная категория</div>
                                                    <div class=""><?php the_field('kvalifikaczionnaya_kategoriya');?></div>
                                                </div>
	                                        <?php endif; ?>

	                                        <?php if($stazh): ?>
                                                <div class="property">
                                                    <div class="title-prop twosmallfont">Стаж работы по специальности</div>
                                                    <div class=""><?php the_field('stazh_raboty');?></div>
                                                </div>
	                                        <?php endif; ?>
											
                                            <?php if($pricedoctor): ?>
                                                <div class="property">
                                                    <div class="title-prop twosmallfont">Стоимость приёма:</div>
                                                    <div><?php the_field('pricedoctor');?></div>
                                                </div>
	                                        <?php endif; ?>														

                                        </div>
                                    </div>
                                </div>
                            </article>

                            <div class="post-content">
                                <div class="tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a class="shadow1" href="#desc" data-toggle="tab">О враче</a></li>
                                        <li><a class="shadow1 reviews-tab" href="#reviews" data-toggle="tab">Отзывы</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="desc">
                                            <div class="title-tab-heading item-border shadow1 visible-xs">О враче<span class="btn btn-default white arrow-open open"></span></div>
                                            <div class="toggle-block">
                                                <!--div class="properties">
                                                    <div class="property  activity">
                                                        <div class="title-prop twosmallfont">Направление деятельности</div>
                                                        <div class="value"><?php the_field('napravlenie_deyatelnosti')?></div>
                                                    </div>
                                                </div-->
                                               <div class="text"><?php the_field('md_description');?></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane reviews-tab" id="reviews">
                                            <div class="title-tab-heading item-border shadow1 visible-xs">Отзывы<span class="btn btn-default white arrow-open"></span></div>
                                            <div class="toggle-block js-load-reviews"></div>
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

<?php get_footer(); ?>