<?php get_header(); ?>
<?php
  $promo_posts = get_posts( array(
    'numberposts' => -1,
    'post_type'   => 'promo',
    'suppress_filters' => true,
  ) );

  // promo Directions
  $allPromoDirections = Array();
  foreach($promo_posts as $promo){
    $promo_dirs = get_post_meta($promo->ID, "promo_direction", true);
    foreach($promo_dirs as $id ){
      array_push($allPromoDirections, $id);
    }
  }
  $uniquePromoDirections = array_unique($allPromoDirections);

?>
<main class="promos_page dl_page">
  <section class="vrachi_banner_list">
    <div class="container">
      <div class="banners_slider custom_banners_slider custom_swiper">
        <div class="swiper-wrapper">
          <?php 
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
          ?>
        </div>
        <div class="swiper-pagination-banner_list"></div>
      </div>
    </div>
  </section>
  <section class="promo_list">
    <div class="container">
      <div class="section_wrap">
        <div class="promo_tabs_wrap">
          <div class="tabs">
            <div class="promo_tab is-active" data-tab="all">Все акции</div>
            <?php 
              foreach($uniquePromoDirections as $serviceID ){
                ?>
                  <div class="promo_tab" data-tab="<?php echo $serviceID ?>"><?php echo get_the_title($serviceID) ?></div>
                <?php
              }
            ?>
          </div>
          <div class="all_promo">Всего <span><?php echo count($promo_posts) ?></span> акций</div>
        </div>
        <div class="promo_list_wrap">
          <div class="promos">
            <?php 
              foreach( $promo_posts as $post ){
                setup_postdata( $post );
                $banner_title = get_post_meta(get_the_ID(), "banner_title", true);
                $banner_image = get_post_meta(get_the_ID(), "banner_image", true);
                $banner_button = get_post_meta(get_the_ID(), "banner_button", true);
                $promo_date = get_post_meta(get_the_ID(), "promo_date", true);
                $promo_direction = get_post_meta(get_the_ID(), "promo_direction", true);
                $directionStr = Array();
                $directionIDStr = Array();
                foreach($promo_direction as $dir ){
                  array_push($directionStr, get_the_title($dir));
                  array_push($directionIDStr, $dir);
                }
                ?>
                  <div class="promo_item is-active" data-content="<?php echo join(",",$directionIDStr) ?>">
                    <figure>
                      <img src="<?php echo wp_get_attachment_url($banner_image) ?>" alt="<?php echo $banner_title ?>">
                    </figure>
                    <div class="promo_content">
                      <div class="promo_title"><?php echo $banner_title ?></div>
                      <div class="promo_direction"><span>Акция по направлению:</span> <?php echo join(", ",$directionStr) ?></div>
                      <div class="promo_buttons">
                        <div class="buttons_wrap">
                          <div class="theme_button">
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
                          <div class="text_link">
                            <a href="<?php the_permalink() ?>">Подробнее</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="promo_date"><?php echo $promo_date ?></div>
                  </div>
                <?php
              }
            ?>
          </div>
        </div>
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
</main>
<?php get_footer();?>