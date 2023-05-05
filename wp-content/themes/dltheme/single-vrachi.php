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
  <div class="main_wraper">
    <div class="sidebar_container">
      <div class="container">
        <aside>
          <div class="diseases_list">
            <ul>
              <li>
                <a href="">Вагинит</a>
              </li>
              <li>
                <a href="">Вагиноз</a>
              </li>
              <li>
                <a href="">Вагинизм</a>
              </li>
              <li>
                <a href="">Вирус папилломы человека (ВПЧ)</a>
              </li>
              <li>
                <a href="">Внематочная беременность</a>
              </li>
              <li>
                <a href="">Вульвит</a>
              </li>
              <li>
                <a href="">Гиперплазия эндометрия</a>
              </li>
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
                        <a href="#">Записаться</a>
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
                      <a href="">Услуги</a>
                    </li>
                    <li>
                      <a href="">Заболевания</a>
                    </li>
                    <li>
                      <a href="">Цены</a>
                    </li>
                    <li>
                      <a href="">Врачи</a>
                    </li> 
                  </ul>
                </nav>
              </div>
          </section>
          <section class="services">
              <h2 class="block_title">Услуги</h2>
              <div class="services_list">
                <div class="service_list_item">
                  <ul>
                    <?php
                      // параметры по умолчанию
                      $servicesPosts = get_posts( array(
                        'numberposts' => -1,
                        'category'    => 5,
                        'post_type'   => 'post',
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ) );

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
                          <a href="<?php echo $banner['banner_button_url'] ?>"><?php echo $banner['banner_button_text'] ?></a>
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
    
    <section class="what_doctor_can">
      <div class="container">
        <h2 class="section_title">Что лечит гинеколог</h2>
        <div class="section_text">В нашей клинике принимают высококвалифицированные врачи-гинекологи, имеющие большой опыт лечения заболеваний женской репродуктивной сферы: воспалительных и гормональных заболеваний, половых инфекций, патологий внутренних органов, возрастных изменений в женском организме и многих других.</div>
        <div class="section_list"></div>
      </div>
    </section>

    <?php  
        $vrachi_price_list = get_field('vrachi_price_list'); 
    ?>
    <section class="vrachi_price">
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
          <div class="section_text"><?php echo $text_block['text'] ?></div>
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

    <section class="doctors_slider">
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
                            <?php the_post_thumbnail() ?>
                          </figure>
                          <div class="doctor_name"><?php the_title() ?></div>
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
              <a href="#">Перейти в раздел лицензии</a>
            </div>
            <div class="theme_button white">
              <a href="#">Перейти в раздел Контролирующие организации</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>

<?php get_footer(); ?>