
   <?php  
        $title = get_sub_field('title'); 
        $rowIndex = get_row_index();
    ?>
    
    <section class="journal_table_of_content" id="content<?php echo $rowIndex ?>">
        <div class="container">
          <div class="block_title"><?php echo $title ?></div>
          <div class="table_of_content_wrap" id="page_table_of_content"></div>
        </div>
    </section>

