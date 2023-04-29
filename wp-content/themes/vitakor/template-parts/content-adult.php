<?php
$currentTax = get_queried_object();
?>

<div class="col-md-9 col-sm-12 col-xs-12 content-md">
    <div class="detail services">
        <div class="detail_wrap services">
            <div class="tabs">
                <div class="tab-content">
                    <div class="tab-pane active" id="desc">
                        <!--<div class="title-tab-heading item-border shadow1 visible-xs">
                            Описание
                            <span class="btn btn-default white arrow-open open"></span>
                        </div>-->
                        <div class="toggle-block1">
                            <div class="introtext">
                                <p><?php echo $currentTax -> description?></p>

	                            <?php
                                    $featured_posts = get_field('vrachi_v_kategorii');
                                    if( $featured_posts ):
	                            ?>
                                    <div class="wraps">
                                        <h4>Специалисты</h4>
                                        <div class="item-views staff-items staff-type-2 table-type-block linked">
                                            <div class="flexslider unstyled row dark-nav view-control navigation-vcenter flexslider-init flexslider-control-nav flexslider-direction-nav" data-plugin-options='{"directionNav": true, "controlNav" :true, "animationLoop": true, "slideshow": false, "slideshowSpeed": 5000, "animationSpeed": 600, "counts": [3, 2, 1]}'>
                                                <ul class="slides items" data-slice="Y">
			                                        <?php foreach( $featured_posts as $post ):

				                                        // Setup this post for WP functions (variable must be named $post).
				                                        setup_postdata($post);?>
                                                        <li class="col-md-4 col-sm-6" data-thumb-alt>
                                                            <div class="item shadow1 clearfix">
                                                                <div class="wrap">
                                                                    <div class="image">
                                                                        <div class="wrap">
                                                                            <a href="<?php the_permalink(); ?>">
                                                                                <img src="<?php echo get_the_post_thumbnail( $post->ID, 'large'); ?>" alt="photo">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="body-info">
                                                                        <div class="top-block-wrapper">
                                                                            <div class="title">
                                                                                <a href="<?php the_permalink(); ?>">
											                                        <?php the_title(); ?>
                                                                                </a>
                                                                            </div>
                                                                            <div class="post twosmallfont">
										                                        <?php the_field( 'dolzhnost', $post->ID); ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="bottom-block" style="">
                                                                            <hr>
                                                                            <div class="wrap">
                                                                                <div class="button text-right no_address">
                                                                                    <span class="pop1 btn btn-default">Запись онлайн</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
			                                        <?php endforeach; ?>
                                                </ul>
                                            </div>
                                                <?php
                                                wp_reset_postdata();
                                                 ?>
                                        </div>
                                    </div>

                                <?php endif; ?>

                            </div>
                            <div class="content">
	                            <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div></div>
    <div style="clear:both"></div>
</div>
