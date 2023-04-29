<?php
$currentTax = get_queried_object();
$adultSub = cat_is_ancestor_of(6, $currentTax);
$kidSub = cat_is_ancestor_of(7, $currentTax);
$stomaSub = cat_is_ancestor_of(8, $currentTax);
?>

<div class="body">
    <div role="main" class="main banner-AUTO">
        <section class="page-top maxwidth-theme">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb" id="navigation">
						<?php if(function_exists('bcn_display'))
						{
							bcn_display();
						}?>
                    </div>
                    <div class="page-top-main">
                        <h1 id="pagetitle"><?php single_cat_title(); ?></h1>
                    </div>
                </div>
            </div>
        </section>
        <div id="content" class="container">
            <div class="row">
                <div class="maxwidth-theme">
                    <div class="col-md-12 col-sm-12 col-xs-12 content-md">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 hidden-xs hidden-sm left-menu-md">
                                <aside class="sidebar">
									<?php get_sidebar(); ?>
                                </aside>
                                <div class="sidearea">
									<?php if($adultSub || $kidSub || $stomaSub):?>
                                        <div class="ask_a_question_wrapper">
                                            <div class="ask_a_question nonfixed" style="top: 0px;">
                                                <div class="inner">
                                                    <div class="text-block">Наши администраторы ответят на любой интересующий вопрос по услуге
                                                    </div>
                                                </div>
                                                <div class="outer">
                                                    <span><span class="pop3 btn btn-default btn-lg"><span>Задать вопрос</span></span></span>
                                                </div>
                                            </div>
                                        </div>
									<?php endif; ?>
                                    <div style="padding:0 0 0 25px;">
                                        <i>Современная медицина без страха и боли. «Витакор» – на страже здоровья и долголетия!</i>
                                    </div>
                                </div>
                            </div>
							<?php if($adultSub || $kidSub || $stomaSub):
								include(dirname( __DIR__, 1 ) . '/template-parts/content-adult.php');
							else: ?>
                                <div class="col-md-9 col-sm-12 col-xs-12 content-md services">
									<?php
									$upper = get_field('verhnee_opisanie_kategorii');
									if ($upper):
										?>
                                        <div class="text_before_items">
											<?php echo $upper; ?>
                                        </div>
									<?php endif; ?>

                                    <div class="item-views list sections blocks">
                                        <div class="items-sections row">
											<?php
											$termList = get_queried_object();
											$parentid = $termList -> term_id;
											$isParent = $termList -> parent;

											$args = array(
												'taxonomy'    => 'category',
												'hide_empty'    => false,
												'parent' => $parentid
											);
											$terms = get_terms( $args );
											foreach ( $terms as $term ): ?>
												<?php $descr = $term -> description; ?>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="item_wrap item-border shadow1">
                                                        <div class="item clearfix wti">
                                                            <div class="info">
                                                                <div class="title">
																	<?php
																	printf(
																		'<a href="%s" class="dark-color">%s</a>',
																		esc_url( get_term_link( $term ) ),
																		esc_html( $term->name )
																	)
																	?>
                                                                </div>
																<?php if($descr): ?>
                                                                    <div class="previewtext">
																		<?php echo $descr; ?>
                                                                    </div>
																<?php endif; ?>
																<?php if($isParent == 0): ?>
                                                                    <div class="text childs">
                                                                        <div class="hidden-block">
																			<?php
																			$sub_args = array(
																				'taxonomy'    => 'category',
																				'hide_empty'    => false,
																				'parent' => $term ->term_id
																			);
																			$sub_terms = get_terms( $sub_args );
																			?>
                                                                            <ul class="clearfix">
																				<?php foreach ( $sub_terms as $sub_term ): ?>
                                                                                    <li>
																						<?php
																						printf(
																							'<a href="%s"><span>%s</span></a>',
																							esc_url( get_term_link( $sub_term ) ),
																							esc_html( $sub_term->name )
																						)
																						?>
                                                                                    </li>
																				<?php endforeach; ?>
                                                                            </ul>
                                                                        </div>
                                                                        <span class="rolldown twosmallfont" data-trigger="opener" data-open_text="Свернуть раздел" data-close_text="Развернуть раздел">
                                                                    <span class="btn btn-default white arrow-open sm"></span>
                                                                    <span class="text">Развернуть раздел</span>
                                                                </span>
                                                                    </div>
																<?php endif; ?>
                                                            </div>
															<?php
															printf(
																'<a href="%s" class="btn btn-default white arrow">%s</a>',
																esc_url( get_term_link( $term ) ),
																esc_html('')
															)
															?>
                                                        </div>
                                                    </div>
                                                </div>
											<?php endforeach; ?>
                                        </div>
                                    </div>

                                </div>
							<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>