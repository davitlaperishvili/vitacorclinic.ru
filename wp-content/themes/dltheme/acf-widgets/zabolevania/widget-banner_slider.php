
   <?php  
        $banner_list = get_sub_field('banner_list'); 
        $rowIndex = get_row_index();
    ?>
    
    <section class="vrachi_banner_list">
        <div class="container">
          <div class="banners_slider swiper">
            <div class="swiper-wrapper">
              <?php 
                foreach($banner_list as $banner){
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
              <div class="swiper-pagination-banner_list"></div>
            </div>
          </div>
        </div>
    </section>

