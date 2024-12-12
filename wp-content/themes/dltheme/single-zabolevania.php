<?php get_header(); ?>
<?php 
  $pageID = get_the_ID();
  $fieldsGroup = get_field("zabolevania_fileds_group");
  $who_works = get_field("who_works");

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
$promo_posts = get_posts( array(
  'numberposts' => -1,
  'post_type'   => 'promo',
  'suppress_filters' => true,
) );

$dirPromo = Array();
foreach($promo_posts as $promo ){
  $promo_direction = get_post_meta($promo->ID, "promo_direction", true);
  $directionIDStr = Array();
  if($promo_direction){
    foreach($promo_direction as $dir ){
      if(in_array($dir, $who_works) && !in_array($promo->ID, $dirPromo)){
        array_push($dirPromo, $promo->ID);
      }
    }
  }
}
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
              <div class="who_works">
                <div class="who_works_wrap">
                  <span class="inc">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <mask id="mask0_1_13" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="30" height="30">
                      <path d="M15 28.3337C16.7513 28.3359 18.4857 27.9921 20.1037 27.3219C21.7217 26.6517 23.1913 25.6683 24.428 24.4283C25.668 23.1916 26.6513 21.722 27.3215 20.1041C27.9917 18.4861 28.3356 16.7516 28.3333 15.0003C28.3355 13.2491 27.9917 11.5146 27.3215 9.89662C26.6513 8.27865 25.6679 6.80907 24.428 5.57234C23.1913 4.33235 21.7217 3.349 20.1037 2.67879C18.4857 2.00858 16.7513 1.66473 15 1.667C13.2487 1.66477 11.5142 2.00864 9.89626 2.67884C8.27829 3.34905 6.80871 4.33238 5.57197 5.57234C4.33202 6.80907 3.34869 8.27865 2.67848 9.89662C2.00827 11.5146 1.6644 13.2491 1.66664 15.0003C1.66437 16.7516 2.00822 18.4861 2.67843 20.1041C3.34864 21.722 4.33199 23.1916 5.57197 24.4283C6.80871 25.6683 8.27829 26.6516 9.89626 27.3218C11.5142 27.992 13.2487 28.3359 15 28.3337Z" fill="white" stroke="white" stroke-width="2.66667" stroke-linejoin="round"/>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M14.9999 23.6673C15.4419 23.6673 15.8659 23.4917 16.1784 23.1792C16.491 22.8666 16.6666 22.4427 16.6666 22.0007C16.6666 21.5586 16.491 21.1347 16.1784 20.8221C15.8659 20.5096 15.4419 20.334 14.9999 20.334C14.5579 20.334 14.134 20.5096 13.8214 20.8221C13.5088 21.1347 13.3333 21.5586 13.3333 22.0007C13.3333 22.4427 13.5088 22.8666 13.8214 23.1792C14.134 23.4917 14.5579 23.6673 14.9999 23.6673Z" fill="black"/>
                      <path d="M15 7V17.6667" stroke="black" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                      </mask>
                      <g mask="url(#mask0_1_13)">
                      <path d="M-1 -1H31V31H-1V-1Z" fill="#5AD2C8"/>
                      </g>
                    </svg>
                  </span>
                  <span class="text">Лечением данного заболевания занимается</span>
                  <?php 
                    foreach($who_works as $key => $direction ){
                      $comma = $key == (count($who_works) - 1) ? "" : ",";
                      ?>
                        <a href="<?php echo get_the_permalink($direction) ?>"><?php echo get_the_title($direction); echo $comma ?></a>
                      <?php
                    }
                  ?>
                </div>
              </div>
          </div>
      </div>
  </section>
  <div class="main_wraper">
    <div class="sidebar_container">
      <div class="container">
        <aside>
          <div class="diseases_list">
          <?php 
              $alpaServices = get_posts( array(
                  'numberposts' => -1,
                  'post_type'   => 'zabolevania',
                  'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
              ) );
            ?>
            <ul>
              <?php

                foreach( $alpaServices as $post ){
                    setup_postdata( $post );
                    $kto_lechit = get_post_meta(get_the_ID(), "who_works", true);
                    if(count(array_intersect($who_works, $kto_lechit)) > 0){
                      ?>
                        <li>
                          <a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title()?> </a>
                        </li>
                      <?php
                    }
                    
                }
                
                wp_reset_postdata(); // сброс
              ?>
            </ul>
          </div>
          <div class="question_form">
            <figure>
              <img src="<?php echo get_template_directory_uri(); ?>/images/letter.png" alt="letter">
            </figure>
            <div class="desc">Наши администраторы ответят на любой интересующий вопрос по услуге</div>
            <div class="theme_button">
              <a href="#" class="pop1 btn btn-default btn-lg pum-trigger">Задать вопрос</a>
            </div>
          </div>
        </aside>
        <div class="main_content">
          <div class="custom_table_of_content" id="tableOfContent">
              <div class="content_list">
                <ul></ul>
              </div>
          </div>
          <section class="text_block">
              <div class="section_text diseases"><?php the_content() ?></div>
          </section>
        </div>
      </div>
    </div>

    <?php 
      if(count($dirPromo) > 0){
        ?>
          <section class="vrachi_banner_list">
              <div class="container">
                <div class="banners_slider custom_banners_slider custom_swiper">
                  <div class="swiper-wrapper">
                    <?php 
                      foreach($dirPromo as $bannerID){
                        $banner_title = get_post_meta($bannerID, "banner_title", true);
                        $banner_text = get_post_meta($bannerID, "banner_text", true);
                        $banner_image = get_post_meta($bannerID, "banner_image", true);
                        $promo_date = get_post_meta($bannerID, "promo_date", true);
                        ?>
                          <div class="swiper-slide">
                            <figure>
                              <img src="<?php echo wp_get_attachment_url($banner_image) ?>" alt="<?php echo $banner_title ?>">
                            </figure>
                            <div class="banner_content">
                              <div class="banner_title"><?php echo $banner_title ?></div>
                              <div class="banner_text"><?php echo $banner_text ?></div>
                              <div class="theme_button white">
                                <a href="<?php echo get_the_permalink($bannerID) ?>">Подробнее</a>
                              </div>
                              <div class="promo_date"><?php echo $promo_date ?></div>
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
    <?php 
        if( have_rows('zabolevaniya') ):

            // Loop through rows.
            while ( have_rows('zabolevaniya') ) : the_row();
        
                // Case: Paragraph layout.
                
                if( get_row_layout() == 'zabolevaniya_price_list' ):
                    include(TEMPLATEPATH.'/acf-widgets/zabolevania/widget-price_list.php');
                    
                elseif( get_row_layout() == 'text_block' ):
                    include(TEMPLATEPATH.'/acf-widgets/zabolevania/widget-text_block.php');

                elseif( get_row_layout() == 'vrachi_faq' ):
                  include(TEMPLATEPATH.'/acf-widgets/zabolevania/widget-faq.php');

                elseif( get_row_layout() == 'sign_in' ):
                  include(TEMPLATEPATH.'/acf-widgets/zabolevania/widget-sign.php');
                endif;
            endwhile;
        
        else :
        endif;
    ?>

    <section class="post_author_section">
      <?php
        $postAuthor = get_field("post_author");
      ?>
      <div class="container">
        <div class="post_author_wrap">
          <figure>
            <?php echo get_the_post_thumbnail($postAuthor) ?>
          </figure>
          <div class="author_info">
            <div class="title">Автор статьи</div>
            <div class="name"><?php echo get_the_title($postAuthor) ?></div>
            <div class="spec"><?php echo get_post_meta($postAuthor, "dolzhnost", false)[0] ?></div>
            <div class="years">Стаж работы: <?php echo get_post_meta($postAuthor, "stazh_raboty", false)[0] ?></div>
          </div>
        </div>
      </div>
    </section>
    <section class="doctors_slider">
      <div class="container">
        <h2 class="section_title"><?php echo $fieldsGroup['doctors_section_title'] ?></h2>
        <div class="doctors_slider_wrap custom_swiper">
          <div class="swiper-wrapper">
            <?php
            $doctorsCounter = [];
              // параметры по умолчанию
              

            foreach( $doctorsPosts as $post ){
                setup_postdata( $post );
                $directions = get_post_meta(get_the_ID(), "napravleniya", true);
                foreach($who_works as $workerID) {
                  if(!in_array(get_the_ID(), $doctorsCounter)){
                    if($directions && in_array(strval($workerID), $directions)){
                      array_push($doctorsCounter, get_the_ID());
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