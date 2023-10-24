
   <?php  
        $banner_title = get_sub_field('banner_title'); 
        $price_first = get_sub_field('price_first'); 
        $price_second = get_sub_field('price_second'); 
        $banner_image = get_sub_field('banner_image'); 
        $rowIndex = get_row_index();
    ?>
    
    <section class="vrachi_banner" id="content<?php echo $rowIndex ?>">
    
        <figure>
            <img src="<?php echo $banner_image['url'] ?>" alt="<?php echo $banner_image['alt'] ?>">
        </figure>
        <div class="container">
            
        </div>
    </section>

