<?php get_header(); ?>
<?php 
  $pageID = get_the_ID();
  $fieldsGroup = get_field("zabolevania_fileds_group");
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

?>
<?php 
  $who_works = get_field("who_works");
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
        <aside class="sidebar ready_sidebar">
          <?php get_sidebar(); ?>
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