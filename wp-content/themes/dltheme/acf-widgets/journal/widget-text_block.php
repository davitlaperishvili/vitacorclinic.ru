
   <?php  
        $text = get_sub_field('text'); 
        $rowIndex = get_row_index();
    ?>
    
    <section class="journal_text_block" id="content<?php echo $rowIndex ?>">
      <div class="journal_text"><?php echo $text ?></div>
    </section>

