
   <?php  
        $block_index = get_sub_field('block_index'); 
        $promo = get_field("journal_promo", 'option')[$block_index - 1];
        $rowIndex = get_row_index();
    ?>
    <?php 
      if($promo){
        ?>
          <section class="journal_journal_promo" id="content<?php echo $rowIndex ?>">
            <div class="container">
              <div class="promo_wrap">
                <div class="promo_top">
                  <figure>
                    <img src="<?php echo $promo['image']['url'] ?>" alt="<?php echo $promo['image']['alt'] ?>">
                  </figure>
                  <div class="top_content">
                    <h3 class="promo_title"><?php echo $promo['promo_title'] ?></h3>
                    <div class="promo_short_desc"><?php echo $promo['promo_short_desc'] ?></div>
                  </div>
                </div>
                <div class="promo_bottom">
                  <div class="promo_desc"><?php echo $promo['desc'] ?></div>
                  <div class="promo_data">
                    <div class="price">
                      <div class="new"><?php echo $promo['price']['new'] ?></div>
                      <del class="old"><?php echo $promo['price']['old'] ?></del>
                    </div>
                    <div class="theme_button">
                      <a href="<?php echo $promo['button']['url'] ?>"><?php echo $promo['button']['title'] ?></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        <?php
      }
    ?>

