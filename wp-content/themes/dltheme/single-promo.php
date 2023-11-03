<?php get_header(); ?>
<main class="promos_page dl_page">
  <?php 
    $banner_title = get_post_meta(get_the_ID(), "banner_title", true);
    $banner_text = get_post_meta(get_the_ID(), "banner_text", true);
    $banner_image = get_post_meta(get_the_ID(), "banner_image", true);
    $banner_button = get_post_meta(get_the_ID(), "banner_button", true);
    $promo_date = get_post_meta(get_the_ID(), "promo_date", true);
    $promo_value = get_post_meta(get_the_ID(), "promo_value", true);
  ?>
  <section class="single_banner">
    <div class="single_banner_item ">
      <figure>
        <img src="<?php echo wp_get_attachment_url($banner_image) ?>" alt="<?php echo $banner_title ?>">
      </figure>
      <div class="banner_content">
        <div class="custom_labels">
          <div class="custom_label">Акция</div>
        </div>
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
      </div>
    </div>
  </section>
  <section class="promo_info">
    <div class="container">
      <div class="info_list">
        <div class="info_item">
          <figure>
            <img src="<?php echo get_template_directory_uri(); ?>/images/promo_date.png" alt="">
          </figure>
          <div class="info_content">
            <div class="info_title">Срок действия акции:</div>
            <div class="value"><?php echo $promo_date ?></div>
          </div>
        </div>
        <div class="info_item">
          <figure>
            <img src="<?php echo get_template_directory_uri(); ?>/images/promo_value.png" alt="">
          </figure>
          <div class="info_content">
            <div class="info_title">Ваша выгода:</div>
            <div class="value"><?php echo $promo_value ?></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="promo_content">
    <div class="container">
      <?php 
        if( have_rows("promo_content") ):

            // Loop through rows.
            while ( have_rows("promo_content") ) : the_row();
        
                // Case: Paragraph layout.
                if( get_row_layout() == 'texr' ):
                    ?>
                      <div class="section_text"><?php echo get_sub_field('promo_desc'); ?></div>
                    <?php
                
                elseif( get_row_layout() == 'promo_price_list' ):
                  $block_title = get_sub_field('block_title'); 
                  $block_subtitle = get_sub_field('block_subtitle'); 
                  $prices = get_sub_field('prices'); 
                  ?>
                    <section class="vrachi_price">
                      <div class="container">
                        <h2 class="section_title"><?php echo $block_title ?></h2>
                        <div class="price_table">
                          <div class="table_title"><?php echo $block_subtitle ?></div>
                          
                          <table>
                            <thead>
                              <tr>
                                <th>Наименование услуги</th>
                                <th>Цена</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                                foreach($prices as $price){
                                  ?>
                                    <tr class="<?php echo $price['is_promo_price'] ? "promo" : "" ?>">
                                      <td><?php echo $price['service_name'] ?> <?php echo $price['is_promo_price'] ? "<span>Акция</span>" : "" ?></td>
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

                endif;
            endwhile;
        
        else :
        endif;
      ?>
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
</main>
<?php get_footer();?>