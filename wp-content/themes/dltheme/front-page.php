<?php 
    //Template Name: Front Page
?>
<?php get_header(); ?>

<main class="home_page">
    <?php 
        if( have_rows('homepage') ):

            // Loop through rows.
            while ( have_rows('homepage') ) : the_row();
        
                // Case: Paragraph layout.
                if( get_row_layout() == 'hero' ):
                    include(TEMPLATEPATH.'/acf-widgets/widget-hero.php');
                
                elseif( get_row_layout() == 'hero_inside' ):
                    include(TEMPLATEPATH.'/acf-widgets/widget-hero_inside.php');

                endif;
            endwhile;
        
        else :
        endif;
    ?>
</main>

<?php get_footer(); ?>