<?php 
  //Template Name: Front Page
?>
<?php get_header(); ?>


  <div class="main_wraper dl_page">
    <section class="vrachi_banner_list">
    <?php 
        $front_banners = get_field("front_banners");
        $bannersPosition = $front_banners['show_before_promo'] ? "-1" : "2";
      ?>  
      
      <div class="container">
        <div class="banners_slider custom_banners_slider custom_swiper">
          <div class="swiper-wrapper">
            <?php 
              if($front_banners['banners']){
                foreach( $front_banners['banners'] as $banner ){
                  ?>
                    <div class="swiper-slide" style="order: <?php echo $bannersPosition ?>">
                      <figure>
                        <img src="<?php echo $banner['banner_image']['url'] ?>" alt="<?php echo $banner['banner_image']['alt'] ?>">
                      </figure>
                      <div class="banner_content">
                        <div class="banner_title"><?php echo $banner['banner_title'] ?></div>
                        <div class="banner_text"><?php echo $banner['banner_text'] ?></div>
                        <?php 
                          if($banner['banner_button']){
                            ?>
                            <div class="theme_button white">
                              <a href="<?php echo $banner['banner_button']['url'] ?>"><?php echo $banner['banner_button']['title'] ?></a>
                            </div>
                            <?php
                          }
                          if($banner['promo_date']){
                            ?>
                              <div class="promo_date"><?php echo $banner['promo_date'] ?></div>
                            <?php
                          }
                        ?>
                        
                      </div>
                    </div>
                  <?php
                }
              }
            ?>
            <?php 
              // параметры по умолчанию
              $promo_posts = get_posts( array(
                'numberposts' => -1,
                'post_type'   => 'promo',
                'suppress_filters' => true,
              ) );

              global $post;

              foreach( $promo_posts as $post ){
                setup_postdata( $post );
                $banner_title = get_post_meta(get_the_ID(), "banner_title", true);
                $banner_text = get_post_meta(get_the_ID(), "banner_text", true);
                $banner_image = get_post_meta(get_the_ID(), "banner_image", true);
                $banner_button = get_post_meta(get_the_ID(), "banner_button", true);
                $promo_date = get_post_meta(get_the_ID(), "promo_date", true);
                ?>
                  <div class="swiper-slide">
                    <figure>
                      <img src="<?php echo wp_get_attachment_url($banner_image) ?>" alt="<?php echo $banner_title ?>">
                    </figure>
                    <div class="banner_content">
                      <div class="banner_title"><?php echo $banner_title ?></div>
                      <div class="banner_text"><?php echo $banner_text ?></div>
                      <div class="theme_button white">
                        <a href="<?php the_permalink() ?>">Подробнее</a>
                      </div>
                      <div class="promo_date"><?php echo $promo_date ?></div>
                    </div>
                  </div>
                <?php
              }

              wp_reset_postdata(); // сброс
            ?>
          </div>
          <div class="swiper-pagination-banner_list"></div>
        </div>
      </div>
    </section>
    <section class="front_title">
      <div class="container">
        <h1 class="page_title"><?php echo get_field("page_title") ?></h1>
      </div>
    </section>
    <section class="what_doctor_can front_services" id="zabolevania">
      <?php 
        $front_our_services = get_field("front_our_services");
      ?>
      <div class="container">
        <h2 class="section_title front"><?php echo $front_our_services['section_title'] ?></h2>
        <div class="section_subtitle"><?php echo $front_our_services['section_subtitle'] ?></div>
        <div class="services_tabs">
          <?php 
            foreach($front_our_services['services_tabs'] as $key => $tabContent){
              ?>
                <div class="tab_item <?php echo $key == 0 ? "is-active" : "" ?>" data-tab="tab<?php echo $key ?>"><?php echo $tabContent['tab_title'] ?></div>
              <?php
            }
          ?>
        </div>
        <div class="section_list">
          <?php 
              // sorting array
            function abc($a,$b){
              $la = mb_substr($a,0,1,'utf-8');
              $lb = mb_substr($b,0,1,'utf-8');
              if(ord($la) > 122 && ord($lb) > 122){
                  return $a > $b ? 1 : -1;
              }
              if(ord($la) > 122 || ord($lb) > 122) {
                  return $a < $b ? 1 : -1;
              }
            }
            // push in associative array
            function array_push_assoc($array, $key, $value){
                $array[$key] = $value;
                return $array;
            }
            foreach($front_our_services['services_tabs'] as $key => $tabContent){

              ?>
                <div class="alfabet_list tab_content <?php echo $key == 0 ? "is-active" : "" ?> trans-all-4" data-content="tab<?php echo $key ?>Content">
                  
                  <?php 
                      
                      $servicesTitle = [];
                      //get all services title and permalink
                      foreach( $tabContent['tab_items'] as $tabItem ){
                          $tabTitle = $tabItem['item']['title'];
                          $tabUrl = $tabItem['item']['url'];
                          $servicesTitle = array_push_assoc($servicesTitle, $tabUrl, $tabTitle);
                      }
                    
                      // sort services 
                      uasort($servicesTitle, 'abc');
                      $firstChar;
                      $currentChar;

                      foreach($servicesTitle as $service){
                          $firstChar = mb_substr($service, 0, 1);
                          $currentChar = $currentChar.$firstChar;

                          // check if first character goes twice, if yes put firstChar to currentChar 
                          if(mb_strlen($currentChar) > 1 && $firstChar !== mb_substr($currentChar, 0, 1)){
                              $currentChar = $firstChar;
                          }

                          //
                          if( mb_strlen($currentChar) == 1){
                              $count = 0;
                              foreach($servicesTitle as $serviceCount){
                                  if($currentChar == mb_substr($serviceCount, 0, 1)){
                                      $count++;
                                  }
                              }
                              ?>
                                  <div class="alfabet_item">
                                      <div class="alfabet_title">
                                          <div class="letter"><?php echo $currentChar ?></div>
                                      </div>
                                      <div class="alfabet_services">
                                          <ul>
                                              <?php 
                                                  foreach($servicesTitle as $url => $serviceName){
                                                      if($currentChar == mb_substr($serviceName, 0, 1)){
                                                          ?>
                                                              <li>
                                                                  <a href="<?php echo $url ?>"><?php echo $serviceName ?></a>
                                                              </li>
                                                          <?php
                                                      }
                                                  }
                                              ?>
                                          </ul>
                                      </div>
                                  </div>
                              <?php
                          }else{
                              
                          }
                      }
                  ?>
                </div>
              <?php
            }
          ?>
        </div>
      </div>
    </section>
    <section class="front_banner">
      <?php 
        $front_banner = get_field("front_banner", "option");
      ?>
      <div class="container">
        <div class="banner_wrap">
          <div class="left">
            <div class="banner_title"><?php echo $front_banner['banner_title'] ?></div>
            <div class="banner_text"><?php echo $front_banner['banner_text'] ?></div>
            <div class="theme_button">
              <?php 
                if($front_banner['banner_button']['url'] == "#" || !$front_banner['banner_button']['url']){
                  ?>
                    <a href="<?php echo $front_banner['banner_button']['url'] ?>" class="pop1 btn btn-default btn-lg pum-trigger" style="cursor: pointer;"><?php echo $front_banner['banner_button']['title'] ?></a>
                  <?php
                }else{
                  ?>
                    <a href="<?php echo $front_banner['banner_button']['url'] ?>"><?php echo $front_banner['banner_button']['title'] ?></a>
                  <?php
                }
              ?>
            </div>
          </div>
          <figure>
            <img src="<?php echo $front_banner['banner_image']['url'] ?>" alt="<?php echo $front_banner['banner_image']['alt'] ?>">
          </figure>
        </div>
      </div>
    </section>
    <section class="front_why_us">
      <?php 
        $why_us = get_field("why_us");
      ?>
      <div class="container">
        <div class="section_header">
          <h2 class="section_title"><?php echo $why_us['section_title'] ?></h2>
          <div class="why_navigation">
            <div class="swiper-button-next arrow"></div>
            <div class="swiper-button-prev arrow"></div>
          </div>
        </div>
        <div class="section_wrap">
          <div class="section_slider custom_swiper">
            <div class="swiper-wrapper">
              <?php 
                foreach($why_us['slider_items'] as $item){
                  ?>
                    <div class="swiper-slide">
                      <div class="why_item">
                        <div class="why_title"><?php echo $item['slide_title'] ?></div>
                        <figure>
                          <img src="<?php echo $item['slide_image']['url'] ?>" width="300" height="475" alt="<?php echo $item['slide_image']['alt'] ?>">
                        </figure>
                      </div>
                    </div>
                  <?php
                }
              ?>
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="front_text_block">
      <div class="container">
        <?php 
          $front_text_block = get_field("front_text_block");
        ?>
        <h2 class="section_title front"><?php echo $front_text_block['section_title'] ?></h2>
        <div class="block_wrap">
          <div class="left">
            <div class="section_text"><?php echo $front_text_block['section_text'] ?></div>
            <div class="section_button">
              <a href="<?php echo $front_text_block['section_button']['url'] ?>"><?php echo $front_text_block['section_button']['title'] ?></a>
            </div>
          </div>
          <div class="right">
            <div class="right_wrap">
              <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="custom_swiper images_main">
                <div class="swiper-wrapper">
                  <?php 
                    foreach($front_text_block['section_images'] as $image ){
                      ?>
                        <div class="swiper-slide">
                          <img src="<?php echo $image['image']['url'] ?>" alt="<?php echo $image['image']['alt'] ?>"/>
                        </div>
                      <?php
                    }
                  ?>
                </div>
                <div class="images_navigation">
                  <div class="swiper-button-next arrow"></div>
                  <div class="swiper-button-prev arrow"></div>
                </div>
              </div>
              <div class="swiper-pagination-gallery"></div>
              <div thumbsSlider="" class="custom_swiper images_thumb">
                <div class="swiper-wrapper">
                  <?php 
                    foreach($front_text_block['section_images'] as $image ){
                      ?>
                        <div class="swiper-slide">
                          <img src="<?php echo $image['image']['url'] ?>" alt="<?php echo $image['image']['alt'] ?>"/>
                        </div>
                      <?php
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="reviews">
      <?php
        $reviews = get_field('reviews');
      ?>
      <div class="container">
        <div class="section_title front">
            <?php echo $reviews['reviews_text'] ?>
        </div>
        <div class="ratings-items ">
            <?php
              foreach ($reviews['review_items'] as $item) {
                ?>
                  <div class="rating-item rating-item--v2">
                    <div class="rating-value rating-value--v2"><?php echo $item['eval'] ?></div>
                    <div class="rating-stars rating--v2">
                      <?php
                        if ($item['stars']['url']) {
                          ?>
                            <img src="<?php echo $item['stars']['url'] ?>" alt="">
                          <?php
                        }
                      ?>
                    </div>
                    <div class="rating-item__img rating-item__img--v2">
                      <a href="<?php echo $item['review_url'] ?>" rel="noreferrer" title="" target="_blank">				
                        <img src="<?php echo $item['review_img']['url'] ?>" alt="<?php echo $item['review_img']['alt'] ?>">
                      </a>
                    </div>
                  </div>
                <?php
              }
            ?>
        </div>
      </div>
    </section>
    <!-- <section class="doctors_slider front_slider" id="vrachi">
      <?php 
        $front_doctors = get_field("front_doctors_section");
      ?>
      <div class="container">
        <div class="section_header">
          <h2 class="section_title front"><?php echo $front_doctors['section_title'] ?></h2>
          <div class="header_link">
            <a href="<?php echo $front_doctors['section_button']['url'] ?>"><?php echo $front_doctors['section_button']['title'] ?></a>
          </div>
        </div>
        <div class="section_subtitle"><?php echo $front_doctors['section_subtitle'] ?></div>
        <div class="doctors_slider_wrap custom_swiper">
          <div class="swiper-wrapper">
            <?php
              // параметры по умолчанию
            $doctorsPosts = $front_doctors["front_doctors"];

            foreach( $doctorsPosts as $postID ){
                $directions = get_post_meta($postID, "napravleniya", true);
                ?>
                  <div class="swiper-slide">
                      <div class="doctor_item">
                        <figure>
                          <a href="<?php echo get_the_permalink($postID) ?>"><?php echo get_the_post_thumbnail($postID) ?></a>
                        </figure>
                        <div class="doctor_name"><a href="<?php echo get_the_permalink($postID) ?>"><?php echo get_the_title($postID) ?></a></div>
                        <div class="doctor_direction"><?php echo get_post_meta($postID, "dolzhnost", true); ?></div>
                      </div>
                  </div>
                <?php
            }
            ?>
          </div>
        </div>
      </div>
    </section> -->
    <div class="body index" style="min-height: 445px;">
    <div class="body_media"></div>
    <div role="main" class="main banner-AUTO">
        <div id="content" class="">
            <div class="greyline row margin0 border-bottom main-doctors">
                <div class="maxwidth-theme">
                    <div class="col-md-12">
                        <div class="item-views front staff-items staff-type-1 table-type-block blocks">
                            <a class="show_all twosmallfont" href="<?php echo get_category_link( 81 ); ?>"><span>Все специалисты центра</span></a>
                            <h2>Лучшие врачи Москвы и МО</h2>
                            <div class="text_before_items">
                                <p>
                                    Попасть в команду «Витакор» могут только лучшие специалисты с многолетней практикой и доказанным опытом.<br />
                                    Наши врачи не только лечат. Они помогают сохранить здоровье и находят подход и к взрослым, и детям.
                                </p>
                            </div>
                            <div
                                class="flexslider unstyled row dark-nav view-control navigation-vcenter"
                                data-plugin-options='{"directionNav": true, "controlNav" :true, "animationLoop": true, "slideshow": false, "slideshowSpeed": 5000, "animationSpeed": 600, "counts": [3, 2, 1]}'
                            >
                                <ul class="slides items" data-slice="Y">
                                    <?php
		                            $featured_posts = get_field('slaider_best', 2);
		                            if( $featured_posts ): ?>
                                    <?php foreach( $featured_posts as $featured_post ):

				                            $permalink = get_permalink( $featured_post->ID ); $title = get_the_title( $featured_post->ID ); $doc_field = get_field( 'dolzhnost', $featured_post->ID ); ?>
                                    <li class="col-md-4 col-sm-6">
                                        <div class="item shadow1 clearfix">
                                            <div class="wrap">
                                                <div class="wrap">
                                                    <div class="image">
                                                        <div class="wrap">
                                                            <a href="<?php echo $permalink; ?>">
                                                                <img
                                                                    data-lazyload=""
                                                                    class="img-responsive"
                                                                    src="<?php echo get_the_post_thumbnail_url( $featured_post->ID, 'full' ); ?>"
                                                                    data-src="<?php echo get_the_post_thumbnail_url( $featured_post->ID, 'full' ); ?>"
                                                                    alt="<?php echo $title; ?>"
                                                                    title="<?php echo $title; ?>"
                                                                />
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

            <div class="greyline"></div>
        </div>
    </div>
</div>
    <section class="licenses">
      <?php 
        $nashi_liczenzii = get_field('nashi_liczenzii', 'option');
      ?>
      <div class="container">
        <h2 class="section_title front"><?php echo $nashi_liczenzii['block_title'] ?></h2>
        <div class="block_wrap">
          <div class="licenses_slider custom_swiper">
            <div class="swiper-wrapper">
              <?php 
                foreach($nashi_liczenzii['licenses_list'] as $license){
                  ?>
                    <div class="swiper-slide">
                      <figure>
                        <img src="<?php echo $license['license_image']['url'] ?>" alt="<?php echo $license['license_image']['alt'] ?>">
                      </figure>
                    </div>
                  <?php
                }
              ?>
            </div>
          </div>
          <div class="block_buttons">
            <div class="theme_button">
              <a href="https://vitacorclinic.ru/company/licenses/">Перейти в раздел лицензии</a>
            </div>
            <div class="theme_button white">
              <a href="https://vitacorclinic.ru/company/kontroliruyushchie-organizatsii/">Перейти в раздел Контролирующие организации</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="front_location">
      <div class="container">
        <div class="row margin0 border-bottom contacts_wrap">
          <div class="maxwidth-theme">
            <div class="col-md-12">
              <a class="show_all twosmallfont" href="/company/requisites/"><span>Все филиалы</span></a>
              <div class="title">
                <h2>Адрес клиники</h2>
                <div class="switcher-wrap">
                  <span class="show_map">На карте</span>
                  <div class="on-off-switch" style="width: 43px; height: 23px;">
                    <div class="on-off-switch-track" style="border-radius: 11.5px; border-width: 1px; width: 41px; height: 21px;">
                      <div style="position: absolute; height: 21px; width: 59px; left: -20px;">
                        <div class="on-off-switch-track-on" style="border-radius: 0px; border-width: 1px; width: 29.5px; height: 21px;">
                          <div class="track-on-gradient"></div>
                          <div class="on-off-switch-text on-off-switch-text-on" style="line-height: 21px; font-size: 9px; left: 11.5px; width: 20px;"></div>
                          <div class="on-off-switch-track-white" style="left: 2.875px; width: 37.25px; height: 11.5px; border-radius: 5.75px; top: 11.5px;"></div>
                        </div>
                        <div class="on-off-switch-track-off" style="overflow: hidden; left: 18px; border-radius: 0px; border-width: 1px; width: 43px; height: 21px;">
                          <div class="track-off-gradient"></div>
                          <div class="on-off-switch-text on-off-switch-text-off" style="line-height: 21px; font-size: 9px; left: 11.5px; width: 20px;"></div>
                          <div class="on-off-switch-track-white" style="left: 2.875px; width: 37.25px; height: 11.5px; border-radius: 5.75px; top: 11.5px;"></div>
                        </div>
                      </div>
                    </div>
                    <div class="on-off-switch-thumb" style="width: 23px; height: 23px; left: 0px;">
                      <div class="on-off-switch-thumb-shadow" style="border-radius: 11px; width: 21px; height: 21px; border-width: 1px;"></div>
                      <div class="on-off-switch-thumb-color on-off-switch-thumb-off" style="border-radius: 11px; width: 21px; height: 21px; left: 1px; top: 1px;"></div>
                    </div>
                  </div>
                  <span class="show_list">Списком</span>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="item-views front contacts table-type-block blocks item_views_right">
                <div class="unstyled row dark-nav view-control navigation-vcenter">
                  <div class="flex-viewport">
                    <ul class="slides items" data-slice="Y">
                      <li class="col-md-4 col-sm-6">
                        <div class="item shadow1 clearfix">
                          <div class="wrap">
                            <div class="title">МЦ "Витакор" г.Подольск, ул.Большая Серпуховская, д.33</div>
                            <div class="properties">
                              <div class="property schedule">
                                <div class="prop-title twosmallfont">Время работы</div>
                                <div class="value">
                                  <h4>
                                    <strong>
                                      <a href="tel:<?php echo $nomer_telefona; ?>"><?php echo $nomer_telefona; ?></a><br />
                                    </strong>
                                  </h4>
                                  <h4><?php the_field('rezhim_raboty');?></h4>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div id="main_map">
                    <script
                      type="text/javascript"
                      charset="utf-8"
                      async
                      src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Afd2721e1076aab12c048d66256d7b2d0aebc59e45f7c7950540081fc8a09d599&amp;width=100%&amp;height=100%&amp;lang=ru_RU&amp;scroll=false"
                    ></script>
                  </div>
                </div>
              </div>
              <script>
                jQuery(".on-off-switch").click(function () {
                  jQuery(this).toggleClass("switch_active");
                  jQuery(".item-views").toggleClass("item_views_right");
                });
              </script>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
      

<?php 
  get_footer();
?>