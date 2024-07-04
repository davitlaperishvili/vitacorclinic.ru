<?php get_header(); ?>
<?php 
  $currentTax = get_queried_object();
?>
<main class="blog_page dl_page">
  <section class="page-top maxwidth-theme small_mb">
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
  <div class="text_filter">
    <div class="container">
      <div class="text_field">
          <form class="form_item">
            <input type="text" name="textField" placeholder="Поиск статьи">
            <button type="submit" class="gilaki"><i class="ri-search-line"></i></button>
          </form>
      </div>
    </div>
  </div>
  <section class="journal_taxonomy">
    <div class="container">
      <?php 
        $terms = get_terms( array(
            'taxonomy' => "type",
            'hide_empty' => true,
        ));
      ?>
      <div class="category_list">
        <ul>
          <li><a href="/journal/">Все</a></li>
          <?php 
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
              foreach ( $terms as $term ) {
                $term_link = get_term_link( $term );
                $activeClass = $term->term_id == $currentTax->term_id ? "is-active": "";
                if ( ! is_wp_error( $term_link ) ) {
                    echo '<li class="'.$activeClass.'"><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
                }
              }
            }
          ?>
        </ul>
      </div>
    </div>
  </section>
  <section class="blog_page">
    <div class="container">
      <div class="content">
        <?php 
            $terms = get_the_terms( $post->ID, 'kategorii' ); 
        ?>
        <div class="blog_posts_listing">
            <!-- Blog Post -->
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array('post_type' => 'journal', 'posts_per_page' => 9, 'paged' => $paged,
            'tax_query' => array(
              array(
                  'taxonomy' => 'type',
                  'field' => 'term_id',
                  'terms' => $currentTax->term_id,
              )
              ), );
            $post_type_data = new WP_Query($args);
            set_query_var('page',$paged);
            while ($post_type_data->have_posts()):
            $post_type_data->the_post();
            global $more;
                $more = 0; ?>
                <?php 
                  $terms = get_the_terms( $post_id, "type" );
                ?>
                <article class="blog_post">
                    <div class="read_more">
                        <a href="<?php the_permalink(); ?>"></a>
                    </div>
                    <figure>
                      <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail() ?></a>
                    </figure>
                    <div class="article_content">
                      <div class="post-categories">
                        <?php 
                          echo '<ul>';
                          foreach ( $terms as $term ) {
                              $term_link = get_term_link( $term );
                              if ( ! is_wp_error( $term_link ) ) {
                                  echo '<li><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
                              }
                          }
                          echo '</ul>';
                        ?>
                      </div>
                      <div class="post_content">
                        <div class="date">
                          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.5 10.5C10.5 10.6989 10.421 10.8897 10.2803 11.0303C10.1397 11.171 9.94891 11.25 9.75 11.25C9.55109 11.25 9.36032 11.171 9.21967 11.0303C9.07902 10.8897 9 10.6989 9 10.5C9 10.3011 9.07902 10.1103 9.21967 9.96967C9.36032 9.82902 9.55109 9.75 9.75 9.75C9.94891 9.75 10.1397 9.82902 10.2803 9.96967C10.421 10.1103 10.5 10.3011 10.5 10.5ZM5.25 13.5C5.44891 13.5 5.63968 13.421 5.78033 13.2803C5.92098 13.1397 6 12.9489 6 12.75C6 12.5511 5.92098 12.3603 5.78033 12.2197C5.63968 12.079 5.44891 12 5.25 12C5.05109 12 4.86032 12.079 4.71967 12.2197C4.57902 12.3603 4.5 12.5511 4.5 12.75C4.5 12.9489 4.57902 13.1397 4.71967 13.2803C4.86032 13.421 5.05109 13.5 5.25 13.5ZM6 15C6 15.1989 5.92098 15.3897 5.78033 15.5303C5.63968 15.671 5.44891 15.75 5.25 15.75C5.05109 15.75 4.86032 15.671 4.71967 15.5303C4.57902 15.3897 4.5 15.1989 4.5 15C4.5 14.8011 4.57902 14.6103 4.71967 14.4697C4.86032 14.329 5.05109 14.25 5.25 14.25C5.44891 14.25 5.63968 14.329 5.78033 14.4697C5.92098 14.6103 6 14.8011 6 15ZM7.5 13.5C7.69891 13.5 7.88968 13.421 8.03033 13.2803C8.17098 13.1397 8.25 12.9489 8.25 12.75C8.25 12.5511 8.17098 12.3603 8.03033 12.2197C7.88968 12.079 7.69891 12 7.5 12C7.30109 12 7.11032 12.079 6.96967 12.2197C6.82902 12.3603 6.75 12.5511 6.75 12.75C6.75 12.9489 6.82902 13.1397 6.96967 13.2803C7.11032 13.421 7.30109 13.5 7.5 13.5ZM8.25 15C8.25 15.1989 8.17098 15.3897 8.03033 15.5303C7.88968 15.671 7.69891 15.75 7.5 15.75C7.30109 15.75 7.11032 15.671 6.96967 15.5303C6.82902 15.3897 6.75 15.1989 6.75 15C6.75 14.8011 6.82902 14.6103 6.96967 14.4697C7.11032 14.329 7.30109 14.25 7.5 14.25C7.69891 14.25 7.88968 14.329 8.03033 14.4697C8.17098 14.6103 8.25 14.8011 8.25 15ZM9.75 13.5C9.94891 13.5 10.1397 13.421 10.2803 13.2803C10.421 13.1397 10.5 12.9489 10.5 12.75C10.5 12.5511 10.421 12.3603 10.2803 12.2197C10.1397 12.079 9.94891 12 9.75 12C9.55109 12 9.36032 12.079 9.21967 12.2197C9.07902 12.3603 9 12.5511 9 12.75C9 12.9489 9.07902 13.1397 9.21967 13.2803C9.36032 13.421 9.55109 13.5 9.75 13.5ZM10.5 15C10.5 15.1989 10.421 15.3897 10.2803 15.5303C10.1397 15.671 9.94891 15.75 9.75 15.75C9.55109 15.75 9.36032 15.671 9.21967 15.5303C9.07902 15.3897 9 15.1989 9 15C9 14.8011 9.07902 14.6103 9.21967 14.4697C9.36032 14.329 9.55109 14.25 9.75 14.25C9.94891 14.25 10.1397 14.329 10.2803 14.4697C10.421 14.6103 10.5 14.8011 10.5 15ZM12 13.5C12.1989 13.5 12.3897 13.421 12.5303 13.2803C12.671 13.1397 12.75 12.9489 12.75 12.75C12.75 12.5511 12.671 12.3603 12.5303 12.2197C12.3897 12.079 12.1989 12 12 12C11.8011 12 11.6103 12.079 11.4697 12.2197C11.329 12.3603 11.25 12.5511 11.25 12.75C11.25 12.9489 11.329 13.1397 11.4697 13.2803C11.6103 13.421 11.8011 13.5 12 13.5ZM12.75 15C12.75 15.1989 12.671 15.3897 12.5303 15.5303C12.3897 15.671 12.1989 15.75 12 15.75C11.8011 15.75 11.6103 15.671 11.4697 15.5303C11.329 15.3897 11.25 15.1989 11.25 15C11.25 14.8011 11.329 14.6103 11.4697 14.4697C11.6103 14.329 11.8011 14.25 12 14.25C12.1989 14.25 12.3897 14.329 12.5303 14.4697C12.671 14.6103 12.75 14.8011 12.75 15ZM14.25 13.5C14.4489 13.5 14.6397 13.421 14.7803 13.2803C14.921 13.1397 15 12.9489 15 12.75C15 12.5511 14.921 12.3603 14.7803 12.2197C14.6397 12.079 14.4489 12 14.25 12C14.0511 12 13.8603 12.079 13.7197 12.2197C13.579 12.3603 13.5 12.5511 13.5 12.75C13.5 12.9489 13.579 13.1397 13.7197 13.2803C13.8603 13.421 14.0511 13.5 14.25 13.5ZM12.75 10.5C12.75 10.6989 12.671 10.8897 12.5303 11.0303C12.3897 11.171 12.1989 11.25 12 11.25C11.8011 11.25 11.6103 11.171 11.4697 11.0303C11.329 10.8897 11.25 10.6989 11.25 10.5C11.25 10.3011 11.329 10.1103 11.4697 9.96967C11.6103 9.82902 11.8011 9.75 12 9.75C12.1989 9.75 12.3897 9.82902 12.5303 9.96967C12.671 10.1103 12.75 10.3011 12.75 10.5ZM14.25 11.25C14.4489 11.25 14.6397 11.171 14.7803 11.0303C14.921 10.8897 15 10.6989 15 10.5C15 10.3011 14.921 10.1103 14.7803 9.96967C14.6397 9.82902 14.4489 9.75 14.25 9.75C14.0511 9.75 13.8603 9.82902 13.7197 9.96967C13.579 10.1103 13.5 10.3011 13.5 10.5C13.5 10.6989 13.579 10.8897 13.7197 11.0303C13.8603 11.171 14.0511 11.25 14.25 11.25Z" fill="#828282"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.5 0C4.69891 0 4.88968 0.0790175 5.03033 0.21967C5.17098 0.360322 5.25 0.551088 5.25 0.75V2.25H14.25V0.75C14.25 0.551088 14.329 0.360322 14.4697 0.21967C14.6103 0.0790175 14.8011 0 15 0C15.1989 0 15.3897 0.0790175 15.5303 0.21967C15.671 0.360322 15.75 0.551088 15.75 0.75V2.25H16.5C17.2956 2.25 18.0587 2.56607 18.6213 3.12868C19.1839 3.69129 19.5 4.45435 19.5 5.25V16.5C19.5 17.2956 19.1839 18.0587 18.6213 18.6213C18.0587 19.1839 17.2956 19.5 16.5 19.5H3C2.20435 19.5 1.44129 19.1839 0.87868 18.6213C0.316071 18.0587 0 17.2956 0 16.5V5.25C0 4.45435 0.316071 3.69129 0.87868 3.12868C1.44129 2.56607 2.20435 2.25 3 2.25H3.75V0.75C3.75 0.551088 3.82902 0.360322 3.96967 0.21967C4.11032 0.0790175 4.30109 0 4.5 0ZM18 9C18 8.60218 17.842 8.22064 17.5607 7.93934C17.2794 7.65804 16.8978 7.5 16.5 7.5H3C2.60218 7.5 2.22064 7.65804 1.93934 7.93934C1.65804 8.22064 1.5 8.60218 1.5 9V16.5C1.5 16.8978 1.65804 17.2794 1.93934 17.5607C2.22064 17.842 2.60218 18 3 18H16.5C16.8978 18 17.2794 17.842 17.5607 17.5607C17.842 17.2794 18 16.8978 18 16.5V9Z" fill="#828282"/>
                          </svg>
                          <span><?php echo get_the_date(); ?></span>
                        </div>
                        <div class="blog_title"><?php the_title(); ?></div>
                      </div>
                    </div>
                </article>
            <?php endwhile; ?>
            <!-- //Blog Post// -->
        </div>  
        <div class="pagination">
            <?php 
                echo paginate_links( array(
                    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                    'total'        => $post_type_data->max_num_pages,
                    'current'      => max( 1, get_query_var( 'paged' ) ),
                    'format'       => '',
                    'show_all'     => false,
                    'type'         => 'list',
                    'end_size'     => null,
                    'mid_size'     => 1,
                    'prev_next'    => false,
                    'prev_text'    => __('«'),
                    'next_text'    => __('»'),
                    'add_args'     => false,
                    'add_fragment' => '',
                ) );
            ?>
        </div>
      </div>
    </div>
  </section> 
  <section class="dl_contact_form">
    <div class="container">
      <div class="form_wrap">
        <div class="form_top">
          <div class="form_title">Остались вопросы?</div>
          <div class="form_subtitle">Оставьте заявку и мы свяжемся с вами!</div>
        </div>
        <div class="form_items">
          <div class="form_item grid-6">
            <input type="text" placeholder="Имя">
          </div>
          <div class="form_item grid-6">
            <input type="text" placeholder="+7 999 999-99-99">
          </div>
          <div class="form_item grid-12">
            <textarea name="" placeholder="Ваш вопрос"></textarea>
          </div>
          <div class="form_item form_submit grid-12">
            <button type="submit" class="gilaki">Оставить заявку</button>
          </div>
        </div>
        <div class="note">Нажимая на кнопку, вы соглашаетесь с <a href="#">политикой конфиденциальности</a></div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>