<?php 
  //Template Name: Front Page
?>
<?php get_header(); ?>
  <div class="main_wraper dl_page">
    <section class="vrachi_banner_list">
      <div class="container">
        <div class="banners_slider custom_banners_slider custom_swiper">
          <div class="swiper-wrapper">
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
                        <?php 
                          if($banner_button['url'] == "#" || !$banner_button['url']){
                            ?>
                              <a href="<?php echo $banner_button['url'] ?>" class="pop1 btn btn-default btn-lg pum-trigger" style="cursor: pointer;"><?php echo $banner_button['title'] ?></a>
                            <?php
                          }else{
                            ?>
                              <a href="<?php echo $banner_button['url'] ?>"><?php echo $banner_button['title'] ?></a>
                            <?php
                          }
                        ?>
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
    <section class="what_doctor_can front_services" id="zabolevania">
      <?php 
        $front_our_services = get_field("front_our_services");
      ?>
      <div class="container">
        <div class="services_tabs">
          <?php 
            foreach($front_our_services['services_tabs'] as $key => $tabContent){
              ?>
                <div class="tab_item"><?php echo $tabContent['tab_title'] ?></div>
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
                <div class="alfabet_list tab_content trans-all-4" tab-content="tab<?php echo $key ?>Content">
                  
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
    <section class="doctors_slider" id="vrachi">
      <div class="container">
        <h2 class="section_title"><?php echo $fieldsGroup['doctors_section_title'] ?></h2>
        <div class="doctors_slider_wrap custom_swiper">
          <div class="swiper-wrapper">
            <?php
              // параметры по умолчанию
              $doctorsPosts = get_posts( array(
                'numberposts' => -1,
                'category'    => 0,
                'orderby'     => 'date',
                'order'       => 'DESC',
                'include'     => array(),
                'exclude'     => array(),
                'meta_key'    => '',
                'meta_value'  =>'',
                'post_type'   => 'staff',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ) );

            foreach( $doctorsPosts as $post ){
                setup_postdata( $post );
                $directions = get_post_meta(get_the_ID(), "napravleniya", true);
                if($directions && in_array(strval($pageID), $directions)){
                  ?>
                    <div class="swiper-slide">
                        <div class="doctor_item">
                          <figure>
                            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail() ?></a>
                          </figure>
                          <div class="doctor_name"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></div>
                          <div class="doctor_direction"><?php echo get_post_meta(get_the_ID(), "dolzhnost", true); ?></div>
                        </div>
                    </div>
                  <?php
                }
            }
            
            wp_reset_postdata(); // сброс
            ?>
          </div>
        </div>
      </div>
    </section>
    <?php 
      $nashi_liczenzii = get_field('nashi_liczenzii', 'option');
    ?>
    <section class="licenses">
      <div class="container">
        <h2 class="section_title"><?php echo $nashi_liczenzii['block_title'] ?></h2>
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
                  <span class="show_list">Списком</span>
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