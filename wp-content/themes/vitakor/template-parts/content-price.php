<div role="main" class="main banner-AUTO">
    <section class="page-top maxwidth-theme ">
        <div class="row">
            <div class="col-md-12">
				<?php if(function_exists('bcn_display'))
				{
					bcn_display();
				}?>
                <div class="page-top-main">
                    <h1 id="pagetitle"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </section>
    <div id="content" class="container">
        <div class="row">
            <div class="maxwidth-theme">
                <div class="col-md-12 col-sm-12">
                    <div class="accordion">
	                    <?php
	                    if( have_rows('czeny_na_uslugi', 'options') ):
		                    while( have_rows('czeny_na_uslugi', 'options') ) : the_row();
			                    $parent_title = get_sub_field('glavnaya_kategoriya', 'option'); ?>
                                <h2><?php echo $parent_title; ?></h2>

                                <div class="accordion-hide main-body">
	                                <?php if( have_rows('podkategorii', 'option') ):
		                                while( have_rows('podkategorii', 'option') ) : the_row();
			                                $child_title = get_sub_field('nazvanie_kategorii', 'options'); ?>
                                            <h3><?php echo $child_title; ?></h3>

			                                <?php if( have_rows('uslugi', 'option') ): ?>
                                                <div class="accordion-hide">
                                                    <div class="price-head">
                                                        <span>Наименование услуги</span>
                                                        <span>Цена (руб.)</span>
                                                    </div>
					                                <?php while( have_rows('uslugi', 'option') ) : the_row();
						                                $child_title4 = get_sub_field('nazvanie', 'options');
						                                $child_title5 = get_sub_field('czena', 'options');
                                                        ?>


                                                           <div class="service-row">
                                                               <span><?php echo $child_title4; ?></span>
                                                               <span><?php echo $child_title5; ?></span>
                                                           </div>

					                                <?php endwhile; ?>
                                                </div>
			                                <?php endif; ?>


				                                <?php if( have_rows('nazvanie_dochernej_podkategorii', 'option') ): ?>
                                                <div class="accordion-hide with-childrens">
					                                <?php while( have_rows('nazvanie_dochernej_podkategorii', 'option') ) : the_row();
						                                $child_title2 = get_sub_field('nazvanie_podkategorii_2', 'options'); ?>
                                                        <h4><?php echo $child_title2; ?></h4>

						                                <?php if( have_rows('uslugi_2', 'option') ): ?>
                                                            <div class="accordion-hide">
                                                                <div class="price-head">
                                                                    <span>Наименование услуги</span>
                                                                    <span>Цена (руб.)</span>
                                                                </div>
								                                <?php while( have_rows('uslugi_2', 'option') ) : the_row();
									                                $child_title4 = get_sub_field('nazvanie_2', 'options');
									                                $child_title5 = get_sub_field('czena_2', 'options');
									                                ?>

                                                                    <div class="service-row">
                                                                        <span><?php echo $child_title4; ?></span>
                                                                        <span><?php echo $child_title5; ?></span>
                                                                    </div>

								                                <?php endwhile; ?>
                                                            </div>
						                                <?php endif; ?>

					                                <?php endwhile; ?>
                                                </div>
				                                <?php endif; ?>


		                                <?php endwhile;
	                                endif; ?>
                                </div>

		                    <?php endwhile;
	                    endif;
	                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
