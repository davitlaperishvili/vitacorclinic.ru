<div class="body index" style="min-height: 445px;">
    <div class="body_media"></div>
    <div role="main" class="main banner-AUTO">
        <div id="content" class="container">
            <div class="row margin0">
                <div class="banners-big front hidden_narrow">
                    <div class="maxwidth-banner">
                        <div class="flexslider unstyled dark-nav flexslider-init flexslider-control-nav flexslider-direction-nav"
                             data-plugin-options='{"directionNav": true, "customDirection": ".nav-carousel a", "controlNav": true, "slideshow": true, "animation": "slide", "direction": "horizontal", "slideshowSpeed": 5000, "animationSpeed": 600, "animationLoop": 1}'>
                            <div class="maxwidth-theme">
                                <div class="col-md-12">
                                    <div class="nav-carousel">
                                        <ul class="flex-direction-nav opacity1">
                                            <li class="flex-nav-prev">
                                                <a href="javascript:void(0)" class="flex-prev"><span>Prev</span></a>
                                            </li>
                                            <li class="flex-nav-next">
                                                <a href="javascript:void(0)" class="flex-next"><span>Next</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
	                        <?php if( have_rows('slajder') ): ?>
                                <ul class="slides items" style="width: 1200%; transition-duration: 0s; transform: translate3d(-7635px, 0px, 0px);">
			                        <?php while( have_rows('slajder') ): the_row();
				                        $title = get_sub_field('zagolovok');
				                        $text = get_sub_field('tekst');
				                        $price = get_sub_field('czena');
				                        $image = get_sub_field('izobrazhenie');
				                        $class = get_sub_field('class');
										$blink = get_sub_field('slidlink');
										$nomer_telefona = get_field( 'nomer_telefona', 2 );
				                        ?>
                                        <li data-lazyload="" class="item light shown lazyloaded" style="background: url('<?php echo $image; ?>') center center no-repeat; background-size: cover;">
                                            <div class="banner-text1-<?php echo $class;?>">
	                                            <b><?php echo $title;?></b>
                                            </div>
                                            <div class="banner-text2-<?php echo $class;?>">
	                                            <?php echo $text;?>
                                            </div>
                                            <div class="banner-text3-<?php echo $class;?>">
	                                            <?php echo $price;?>
                                            </div>
											<a class="bannermore" href="<?php echo $blink;?>">Подробнее</a>
                                        </li>
			                        <?php endwhile; ?>
                                </ul>
	                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ajax_reload_sections">
                <div class="row margin0 border-bottom">
                    <div class="maxwidth-theme">
                        <div class="col-md-12">
							<h1 style="
    text-align: center;
">Медицинский Центр Витакор</h1>
                            <div class="item-views front sections blocks">
                                <a class="show_all twosmallfont" href="<?php echo get_category_link( 5 ); ?>"><span>Все услуги</span></a>
                                <h2>Здоровье для всей семьи</h2>
                                <div class="text_before_items">
						        <p>
                                        У нас вы можете пройти медицинское обследование, получить консультацию терапевта
                                        или узкого специалиста – кардиолога, гастроэнеролога, стоматолога.&nbsp;
                                        Запишитесь на прием&nbsp;– онлайн или по телефону.
                                    </p>
                                </div>
                                <div class="items row ">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="item shadow1 clearfix " style="height: 234px;">
                                            <div class="image">
                                                <div class="wrap">
			                                        <?php
                                                        $category_name = get_cat_name( 6 );
                                                        $category_link = get_category_link( 6 );
                                                        $image = get_field('izobrazhenie_kategorii', 'category_6');
			                                        ?>
                                                    <a href="<?php echo $category_link; ?>">
                                                        <img class="img-responsive lazyloaded" src="<?php echo $image; ?>" data-src="<?php echo $image; ?>" alt="<?php echo $category_name?>">
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="info">
                                                <div class="title">
                                                    <a href="<?php echo $category_link; ?>" class="dark-color"><?php echo $category_name?></a>
                                                </div>
                                                <div class="text childs with-clear clearfix">
                                                    <ul>
	                                                    <?php
	                                                    $terms= get_terms( array(
		                                                    'taxonomy' => 'category',
		                                                    'child_of' => 6,
		                                                    'orderby' => 'count',
		                                                    'hierarchical' => 1,
		                                                    'hide_empty' => 0,
		                                                    'number' => 8
	                                                    ) );
	                                                    $catsCount = get_categories(['hide_empty' => 0, 'child_of' => 6]);
//	                                                    $cats = get_categories(['hide_empty' => 0, 'child_of' => 6, 'orderby' => 'count', 'number' => 8]);
                                                        $totalCount = count($catsCount) - 8;

	                                                    foreach ($terms as $cat) {
		                                                    $name = $cat->name;
		                                                    $cat_id = $cat->term_id;
                                                            $cat_link = get_term_link($cat_id);
		                                                    $output .= "<li><a href='$cat_link'><span>$name</span><span class='separator'>—</span></a></li>";
	                                                    }
	                                                    echo $output;
	                                                    ?>
                                                    </ul>
                                                    <?php
                                                    $category_link = get_category_link( 6 );
                                                    ?>
                                                    <div class="more twosmallfont"><a href="<?php echo $category_link; ?>"> + Еще <?php echo $totalCount; ?></a></div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <!--children-->
                                    <div class="col-md-6 col-sm-6">
                                        <div class="item shadow1 clearfix " style="height: 234px;">
                                            <div class="image">
                                                <div class="wrap">
			                                        <?php
			                                        $category_name1 = get_cat_name( 7 );
			                                        $category_link1 = get_category_link( 7 );
			                                        $image = get_field('izobrazhenie_kategorii', 'category_7');
			                                        ?>
                                                    <a href="<?php echo $category_link1; ?>">
                                                        <img class="img-responsive lazyloaded" src="<?php echo $image; ?>" data-src="<?php echo $image; ?>" alt="<?php echo $category_name?>">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="title">
                                                    <a href="<?php echo $category_link1; ?>" class="dark-color"><?php echo $category_name1; ?></a>
                                                </div>
                                                <div class="text childs with-clear clearfix">
                                                    <ul>
				                                        <?php
				                                        $terms2= get_terms( array(
					                                        'taxonomy' => 'category',
					                                        'child_of' => 7,
					                                        'hide_empty' => false,
				                                        ) );

				                                        foreach ($terms2 as $cat_child) {
					                                        $name = $cat_child->name;
					                                        $cat_id = $cat_child->term_id;
					                                        $cat_link = get_term_link($cat_id);
					                                        $output2 .= "<li><a href='$cat_link'><span>$name</span><span class='separator'>—</span></a></li>";
				                                        }
				                                        echo $output2;
				                                        ?>
                                                    </ul>
			                                        <?php
			                                        $category_link = get_category_link( 7 );
			                                        ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<!--                                    stoma-->
                                    <div class="col-md-6 col-sm-6">
                                        <div class="item shadow1 clearfix " style="height: 202px;">
                                            <div class="image">
                                                <div class="wrap">
			                                        <?php
			                                        $category_name = get_cat_name( 8 );
			                                        $category_link = get_category_link( 8 );
			                                        $image = get_field('izobrazhenie_kategorii', 'category_8');
			                                        ?>
                                                    <a href="<?php echo $category_link; ?>">
                                                        <img class="img-responsive lazyloaded" src="<?php echo $image; ?>" data-src="<?php echo $image; ?>" alt="<?php echo $category_name?>">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="title">
                                                    <a href="https://vitacorclinic.ru/stomatologiya/" class="dark-color">Стоматология</a>
                                                </div>
                                                <div class="text childs with-clear clearfix">
                                                    <ul>
				                                        <?php
				                                        $terms2= get_terms( array(
					                                        'taxonomy' => 'category',
					                                        'child_of' => 8,
					                                        'hide_empty' => false,
					                                        'orderby' => false,
				                                        ) );

				                                        foreach ($terms2 as $cat_child) {
					                                        $name = $cat_child->name;
					                                        $cat_id = $cat_child->term_id;
					                                        $cat_link = get_term_link($cat_id);
					                                        $output3 .= "<li><a href='$cat_link'><span>$name</span><span class='separator'>—</span></a></li>";
				                                        }
				                                        echo $output3;
				                                        ?>
                                                    </ul>
			                                        <?php
			                                        $category_link = get_category_link( 7 );
			                                        ?>
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
            <div class="greyline row margin0 border-bottom main-doctors">
                <div class="maxwidth-theme">
                    <div class="col-md-12">
                        <div class="item-views front staff-items staff-type-1 table-type-block blocks">
                            <a class="show_all twosmallfont" href="<?php echo get_category_link( 81 ); ?>"><span>Все специалисты центра</span></a>
                            <h2>Лучшие врачи Москвы и МО</h2>
                            <div class="text_before_items">
                        <p>
                                    Попасть в команду «Витакор» могут только лучшие специалисты с многолетней практикой
                                    и доказанным опытом.<br>
                                    Наши врачи не только лечат. Они помогают сохранить здоровье и находят подход и к
                                    взрослым, и детям.
                                </p>
					</div>
                            <div class="flexslider unstyled row dark-nav view-control navigation-vcenter"
                                 data-plugin-options='{"directionNav": true, "controlNav" :true, "animationLoop": true, "slideshow": false, "slideshowSpeed": 5000, "animationSpeed": 600, "counts": [3, 2, 1]}'>

                                <ul class="slides items" data-slice="Y">

		                            <?php
		                            $featured_posts = get_field('slaider_best');
		                            if( $featured_posts ): ?>
			                            <?php foreach( $featured_posts as $featured_post ):

				                            $permalink = get_permalink( $featured_post->ID );
				                            $title = get_the_title( $featured_post->ID );
				                            $doc_field = get_field( 'dolzhnost', $featured_post->ID );

				                            ?>
                                            <li class="col-md-4 col-sm-6">
                                                <div class="item shadow1 clearfix">
                                                    <div class="wrap">
                                                        <div class="wrap">
                                                            <div class="image">
                                                                <div class="wrap">
                                                                    <a href="<?php echo $permalink; ?>">
                                                                        <img data-lazyload=""
                                                                             class="img-responsive"
                                                                             src="<?php echo get_the_post_thumbnail_url( $featured_post->ID, 'full' ); ?>"
                                                                             data-src="<?php echo get_the_post_thumbnail_url( $featured_post->ID, 'full' ); ?>"
                                                                             alt="<?php echo $title; ?>"
                                                                             title="<?php echo $title; ?>">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="body-info">
                                                                <div class="top-block-wrapper">
                                                                    <div class="title">
                                                                        <a href="<?php echo $permalink; ?>">
												                            <?php echo $title; ?>
                                                                        </a>
                                                                    </div>
                                                                    <div class="post twosmallfont">
											                            <?php
											                            if ($doc_field):
												                            echo $doc_field;
											                            endif;
											                            ?>
                                                                    </div>
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
                                            </li>
			                            <?php endforeach; ?>

		                            <?php endif; ?>

                                </ul>
                                <ol class="flex-control-nav flex-control-paging" style="z-index: 2;">
                                    <li><a href="#" class="flex-active">1</a></li>
                                    <li><a href="#">2</a></li>
                                </ol>
                                <ul class="flex-direction-nav opacity1">
                                    <li class="flex-nav-prev"><a class="flex-prev" href="#">Назад</a></li>
                                    <li class="flex-nav-next"><a class="flex-next" href="#">Вперед</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row margin0 company-block border-bottom">
                <div class="maxwidth-theme">
                    <div class="col-md-12">
                        <div class="item-views front blocks list-type-block">
                            <div class="info">
                                <div class="row">
                                    <div class="body-info">
                                        <h2>О клинике</h2>
                                        <div class="preview-text">Клиника «Витакор» – это частный медицинский центр для
                                            всей семьи. Есть детское и взрослое направление, отделение диагностики,
                                            собственная операционная.<br>
                                            <br>
                                            У нас наблюдаются целыми семьями, начиная с планирования и ведения
                                            беременности. Прием ведут врачи с богатой практикой и узкие специалисты.&nbsp;
                                        </div>
                                    </div>
                                    <div class="image">
                                        <img data-lazyload="" class="img-responsive lazyloaded"
                                                            src=/wp-content/uploads/2023/03/vitakor-1-1.png"
                                                            data-src="/wp-content/uploads/2023/03/vitakor-1-1.png"
                                                            alt="О клинике" title="О клинике">
                                    </div>
                                </div>
                                <a class="show_all twosmallfont" href="/company/"><span>Подробности</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin0 border-bottom contacts_wrap">
                <div class="maxwidth-theme">
                    <div class="col-md-12">
                        <a class="show_all twosmallfont" href="/company/requisites/"><span>Все филиалы</span></a>
                        <div class="title">
                            <h2>Адрес клиники</h2>
                            <div class="switcher-wrap">
                                <span class="show_list">Списком</span>
<div class="on-off-switch" style="width:43px;height:23px"><div class="on-off-switch-track" style="border-radius:11.5px;border-width:1px;width:41px;height:21px"><div style="position: absolute; height: 21px; width: 59px; left: -20px;"><div class="on-off-switch-track-on" style="border-radius:0px;border-width:1px;width:29.5px;height:21px"><div class="track-on-gradient"></div><div class="on-off-switch-text on-off-switch-text-on" style="line-height: 21px; font-size: 9px; left: 11.5px; width: 20px;"></div><div class="on-off-switch-track-white" style="left: 2.875px; width: 37.25px; height: 11.5px; border-radius: 5.75px; top: 11.5px;"></div></div><div class="on-off-switch-track-off" style="overflow:hidden;left:18px;border-radius:0px;border-width:1px;width:43px;height:21px"><div class="track-off-gradient"></div><div class="on-off-switch-text on-off-switch-text-off" style="line-height: 21px; font-size: 9px; left: 11.5px; width: 20px;"></div><div class="on-off-switch-track-white" style="left: 2.875px; width: 37.25px; height: 11.5px; border-radius: 5.75px; top: 11.5px;"></div></div></div></div><div class="on-off-switch-thumb" style="width: 23px; height: 23px; left: 0px;"><div class="on-off-switch-thumb-shadow" style="border-radius:11px;width:21px;height:21px;border-width:1px;"></div><div class="on-off-switch-thumb-color on-off-switch-thumb-off" style="border-radius:11px;width:21px;height:21px;left:1px;top:1px"></div></div>
</div>
                                <span class="show_map">На карте</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="item-views front contacts table-type-block blocks">
                            <div class="unstyled row dark-nav view-control navigation-vcenter">

                                <div class="flex-viewport">
                                    <ul class="slides items" data-slice="Y">
                                        <li class="col-md-4 col-sm-6">
                                            <div class="item shadow1 clearfix">
                                                <div class="wrap">
                                                    <div class="title">МЦ "Витакор" г.Подольск,
                                                        ул.Большая Серпуховская, д.33
                                                    </div>
                                                    <div class="properties">
                                                        <div class="property schedule">
                                                            <div class="prop-title twosmallfont">Время работы</div>
                                                            <div class="value"><h4><strong><a href="tel:<?php echo $nomer_telefona; ?>"><?php echo $nomer_telefona; ?></a><br>
                                                                    </strong></h4>
                                                                <h4><?php the_field('rezhim_raboty');?></h4></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div id="main_map">
                                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Afd2721e1076aab12c048d66256d7b2d0aebc59e45f7c7950540081fc8a09d599&amp;width=100%&amp;height=100%&amp;lang=ru_RU&amp;scroll=false"></script>
                                </div>
                            </div>
                        </div>
<script>
jQuery(".on-off-switch").click(function(){
    jQuery(this).toggleClass( "switch_active" );
    jQuery('.item-views').toggleClass( "item_views_right" );
});
</script>
                    </div>
                </div>
            </div>


            <div class="greyline">
            </div>
        </div>
    </div>
</div>
