
   <?php  
        $heroTitle = get_sub_field('hero_title'); 
        $heroText = get_sub_field('hero_text'); 
        $heroImage = get_sub_field('hero_image'); 
        $rowIndex = get_row_index();
    ?>
    
    <section class="hero_inside" id="content<?php echo $rowIndex ?>">
        <div class="container">
            <div class="hero_content">
                <div class="hero_left">
                    <h1 class="page_title"><?php echo $heroTitle ?></h1>
                    <?php
                        if($heroText){
                            ?>
                                <div class="hero_text"><?php echo $heroText ?></div>
                            <?php
                        }
                    ?>
                </div>
                <div class="hero_right">
                    <figure>
                        <img src="<?php echo $heroImage['url'] ?>" alt="<?php echo $heroImage['alt'] ?>">
                    </figure>
                </div>
            </div>
        </div>
    </section>

