
   <?php  
        $block_title = get_sub_field('block_title'); 
        $faq_list = get_sub_field('faq_list'); 
        $rowIndex = get_row_index();
    ?>
    
    
    <section class="faq">
        <div class="container">
          <h2 class="section_title"><?php echo $block_title ?></h2>
          <div class="faq_list">
            <?php
              foreach($faq_list as $faq) {
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

