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
          <div class="question_form">
            <figure>
              <img src="<?php echo get_template_directory_uri(); ?>/images/letter.png" alt="letter">
            </figure>
            <div class="desc">Наши администраторы ответят на любой интересующий вопрос по услуге</div>
            <div class="theme_button">
              <a href="#">Задать вопрос</a>
            </div>
          </div>
        </aside>
        <div class="main_content">
          <section class="text_block">
              <div class="section_text"><?php the_content() ?></div>
          </section>
        </div>
      </div>
    </div>


    <?php 
        if( have_rows('zabolevaniya') ):

            // Loop through rows.
            while ( have_rows('zabolevaniya') ) : the_row();
        
                // Case: Paragraph layout.
                if( get_row_layout() == 'zabolevaniya_banner_slider' ):
                    include(TEMPLATEPATH.'/acf-widgets/zabolevania/widget-banner_slider.php');
                
                elseif( get_row_layout() == 'zabolevaniya_price_list' ):
                    include(TEMPLATEPATH.'/acf-widgets/zabolevania/widget-price_list.php');
                    
                elseif( get_row_layout() == 'text_block' ):
                    include(TEMPLATEPATH.'/acf-widgets/zabolevania/widget-text_block.php');

                elseif( get_row_layout() == 'vrachi_faq' ):
                  include(TEMPLATEPATH.'/acf-widgets/zabolevania/widget-faq.php');
                endif;
            endwhile;
        
        else :
        endif;
    ?>


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