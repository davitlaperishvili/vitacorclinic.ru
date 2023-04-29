
   <?php  
        $heroTitle = get_sub_field('hero_title'); 
        $heroSubTitle = get_sub_field('hero_subtitle'); 
        $heroLicense = get_sub_field('hero_license'); 
        $heroImage = get_sub_field('hero_image'); 
        $heroBg = get_sub_field('hero_background_image'); 
        $hero_first_button_text = get_sub_field('hero_first_button_text');
        $hero_first_button_url = get_sub_field('hero_first_button_url');
        $hero_second_button_text = get_sub_field('hero_second_button_text');
        $hero_second_button_url = get_sub_field('hero_second_button_url');
        $rowIndex = get_row_index();
    ?>
    
    <section class="hero" id="content<?php echo $rowIndex ?>">
    
        <figure>
            <img src="<?php echo $heroBg['url'] ?>" alt="<?php echo $heroBg['alt'] ?>">
        </figure>
        <div class="container">
            <div class="hero_content">
                <div class="hero_left">
                    <div class="subtitle"><?php echo $heroSubTitle ?></div>
                    <h1 class="page_title"><?php echo $heroTitle ?></h1>
                    <div class="license"><?php echo $heroLicense ?></div>
                    <div class="hero_buttons">
                        <div class="theme_button">
                            <a href="<?php echo $hero_first_button_url ?>"><?php echo $hero_first_button_text ?></a>
                        </div>
                        <div class="theme_button white">
                            <a href="<?php echo $hero_second_button_url ?>"><?php echo $hero_second_button_text ?></a>
                        </div>
                    </div>
                </div>
                <div class="hero_right">
                    <figure>
                        <img src="<?php echo $heroImage['url'] ?>" alt="<?php echo $heroImage['alt'] ?>">
                    </figure>
                </div>
            </div>
        </div>
    </section>

