<?php get_header(); ?>
<?php 
  $pageID = get_the_ID();
  $fieldsGroup = get_field("vrachi_fileds_group");
?>
<main class="directions_page dl_page">
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
  <?php 
    $alpaServices = get_posts( array(
        'numberposts' => -1,
        'post_type'   => 'zabolevania',
        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
    ) );
    $vrachiPosts = get_posts( array(
      'numberposts' => -1,
      'post_type'   => 'vrachi',
      'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
  ) );
  ?>
  <div class="main_wraper">
    <div class="sidebar_container">
      <div class="container">
        <aside>
          <div class="diseases_list">
            <ul>
              <!-- <?php 
              foreach( $alpaServices as $post1 ){
                  setup_postdata( $post1 );
                  $workers1 = get_field("who_works", $post1->ID);
                  if($workers1 && in_array(strval($pageID), $workers1)){
                    ?>
                      <li>
                        <a href="<?php echo get_the_permalink($post1->ID) ?>"><?php echo get_the_title($post1->ID) ?></a>
                      </li>
                    <?php
                  }
              }
              ?> -->
              <?php 
                foreach( $vrachiPosts as $post1 ){
                    setup_postdata( $post1 );
                    if($pageID !== $post1->ID){
                      ?>
                        <li>
                          <a href="<?php echo get_the_permalink($post1->ID) ?>"><?php echo get_the_title($post1->ID) ?></a>
                        </li>
                      <?php
                    }
                }
              ?>
            </ul>
          </div>
        </aside>
        <div class="main_content">
          <?php  
              $vrachi_banner = get_field('vrachi_banner'); 
          ?>
          <section class="vrachi_banner">
              <div class="banner_main">
                <figure>
                    <img src="<?php echo $vrachi_banner['banner_image']['url'] ?>" alt="<?php echo $vrachi_banner['banner_image']['alt'] ?>">
                </figure>
                <div class="banner_content">
                    <h2 class="banner_title"><?php echo $vrachi_banner['banner_title'] ?></h2>
                    <div class="banner_buttons">
                      <div class="theme_button">
                        <a href="#" class="pop1 btn btn-default btn-lg pum-trigger">Записаться</a>
                      </div>
                      <div class="banner_prices">
                        <?php
                          if($vrachi_banner['price_first']){
                            ?>
                              <div class="price_item">
                                <div class="title">Первичный прием:</div>
                                <div class="value"><?php echo $vrachi_banner['price_first']?></div>
                              </div>
                            <?php
                          }
                        ?>
                        <?php
                          if($vrachi_banner['price_second']){
                            ?>
                              <div class="price_item">
                                <div class="title">Повторный прием:</div>
                                <div class="value"><?php echo $vrachi_banner['price_second']?></div>
                              </div>
                            <?php
                          }
                        ?>
                      </div>
                    </div>
                </div>
              </div>
              <div class="banner_nav">
                <nav>
                  <ul>
                    <li>
                      <a href="#uslugi">Услуги</a>
                    </li>
                    <li>
                      <a href="#zabolevania">Заболевания</a>
                    </li>
                    <li>
                      <a href="#ceni">Цены</a>
                    </li>
                    <li>
                      <a href="#vrachi">Врачи</a>
                    </li> 
                  </ul>
                </nav>
              </div>
          </section>
          <?php 
            $servicesPosts = get_posts( array(
              'numberposts' => -1, 
              'post_type'   => 'services',
              'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ) );
          ?>
          <?php 
            if(count($servicesPosts) != 0) {
              ?>
                
                <section class="services" id="uslugi">
                    <h2 class="block_title">Услуги</h2>
                    <div class="services_list">
                      <div class="service_list_item">
                        <ul>
                          <?php
                            // параметры по умолчанию
                            

                          foreach( $servicesPosts as $post ){
                              setup_postdata( $post );
                              $servicesDirections = get_post_meta(get_the_ID(), "napravleniya", true);
                              if($servicesDirections && in_array(strval($pageID), $servicesDirections)){
                                ?>
                                  <li>
                                    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                                  </li>
                                <?php
                              }
                          }
                          wp_reset_postdata(); // сброс
                          ?>
                        </ul>
                      </div>
                    </div>
                </section>
              <?php
            }
          ?>
          <script>
            const services = document.querySelectorAll(".services .service_list_item ul li");
            if(services.length === 0) {
              document.querySelector(".services").remove()
            }
          </script>
        </div>
      </div>
    </div>

    <?php  
        $banner_list = get_field('vrachi_banner_slider'); 
    ?>
    <?php 
      if($banner_list){
        ?>
          <section class="vrachi_banner_list">
              <div class="container">
                <div class="banners_slider custom_banners_slider custom_swiper">
                  <div class="swiper-wrapper">
                    <?php 
                      foreach($banner_list['banner_list'] as $banner){
                        ?>
                          <div class="swiper-slide">
                            <figure>
                              <img src="<?php echo $banner['banner_image']['url'] ?>" alt="<?php echo $banner['banner_image']['alt'] ?>">
                            </figure>
                            <div class="banner_content">
                              <div class="banner_title"><?php echo $banner['banner_title'] ?></div>
                              <div class="banner_text"><?php echo $banner['banner_text'] ?></div>
                              <div class="theme_button white">
                              <?php 
                                if($banner['banner_button_url'] == "#" || !$banner['banner_button_url']){
                                  ?>
                                    <a href="<?php echo $banner['banner_button_url'] ?>" class="pop1 btn btn-default btn-lg pum-trigger" style="cursor: pointer;"><?php echo $banner['banner_button_text'] ?></a>
                                  <?php
                                }else{
                                    ?>
                                      <a href="<?php echo $banner['banner_button_url'] ?>"><?php echo $banner['banner_button_text'] ?></a>
                                    <?php
                                  }
                                ?>
                              </div>
                            </div>
                          </div>
                        <?php
                      }
                    ?>
                  </div>
                  <div class="swiper-pagination-banner_list"></div>
                </div>
              </div>
          </section>
        <?php
      }
    ?>
    
    <section class="what_doctor_can" id="zabolevania">
      <div class="container">
        <h2 class="section_title"><?php echo $fieldsGroup['directions_title'] ?></h2>
        <div class="section_text"><?php echo $fieldsGroup['tekst_bloka_chto_lechit_vrach'] ?></div>
        <div class="section_list">
          <div class="alfabet_list trans-all-4">
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


                

                $servicesTitle = [];
                //get all services title and permalink
                foreach( $alpaServices as $post ){
                    setup_postdata( $post );
                    $title = get_the_title();
                    $workers = get_post_meta(get_the_ID(), "who_works", true);
                    if($workers && in_array(strval($pageID), $workers)){
                      $servicesTitle = array_push_assoc($servicesTitle, get_the_permalink(), get_the_title());
                    }
                }
                
                wp_reset_postdata(); // сброс
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
        </div>
      </div>
    </section>

    <?php  
        $vrachi_price_list = get_field('vrachi_price_list'); 
    ?>
    <section class="vrachi_price" id="ceni">
        <div class="container">
          <h2 class="section_title"><?php echo $vrachi_price_list['block_title'] ?></h2>
          <div class="price_table">
            <div class="table_title"><?php echo $vrachi_price_list['block_subtitle'] ?></div>
            
            <table>
              <thead>
                <tr>
                  <th>Наименование услуги</th>
                  <th>Цена</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  foreach($vrachi_price_list['prices'] as $price){
                    ?>
                      <tr>
                        <td><?php echo $price['service_name'] ?></td>
                        <td><?php echo $price['price'] ?></td>
                      </tr>
                    <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
    </section>

    <?php  
        $text_block = get_field('text_block'); 
    ?>
    <section class="text_block">
        <div class="container">
          <div class="section_text"> <?php echo $text_block['text'] ?></div>
        </div>
    </section>

   <?php  
        $vrachi_faq = get_field('vrachi_faq'); 
    ?>
    <section class="faq">
        <div class="container">
          <h2 class="section_title"><?php echo $vrachi_faq['block_title'] ?></h2>
          <div class="faq_list">
            <?php
              foreach($vrachi_faq['faq_list'] as $faq) {
                ?>
                  <div class="faq_item">
                    <div class="faq_question">
                      <span><?php echo $faq['question'] ?> </span>
                      <i class="ri-arrow-down-s-fill"></i>
                    </div>
                    <div class="faq_answer"><?php echo $faq['answer'] ?></div>
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
  </div>
</main>

<?php get_footer(); ?>