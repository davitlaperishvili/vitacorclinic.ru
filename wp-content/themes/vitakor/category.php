<?php get_header();
$currentTax = get_queried_object();
$taxId = $currentTax->term_id;


    if (cat_is_ancestor_of(5, $taxId) || is_category('services')) :
	    get_template_part( 'custom-cats/category', 'services' );
    elseif (cat_is_ancestor_of(81, $taxId) || is_category(81)) :
	    get_template_part( 'custom-cats/category', 'staff' );
    elseif (cat_is_ancestor_of(10, $taxId) || is_category(10)) :
	    get_template_part( 'custom-cats/category', 'news' );
    endif;

get_footer();