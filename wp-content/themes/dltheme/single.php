<?php get_header(); ?>

<?php 
  $postID = get_the_ID(); 
?>
<main class="blog_post_page dl_page">

  <section class="page-top maxwidth-theme small_mb">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb" id="navigation">
          <?php if(function_exists('bcn_display'))
          {
            bcn_display();
          }?>
        </div>
      </div>
    </div>
  </section>

  <section class="single_post_content">
    <div class="container">
      <div class="post_header">
        <h1 id="pagetitle"><?php the_title() ?></h1>
        <?php 
          if(get_the_excerpt()){
            ?>
              <div class="ecxerpt"><?php the_excerpt() ?></div>
            <?php
          }
        ?>
      </div>
      <div class="post_wrap">
        <div class="post_content">
          
        </div>
        <aside>
          <div class="contact_form_widget">
            <div class="form_wrap">
              <div class="form_title">Запишитесь на приём в ВИТАКОР</div>
              <div class="form_items">
                <div class="form_item">
                  <input type="text" placeholder="+7 999 999-99-99">
                </div>
                <div class="form_item form_submit">
                  <button type="submit" class="gilaki">Записаться</button>
                </div>
              </div>
              <div class="note">Нажимая на кнопку вы даёте согласие на обработку данных</div>
            </div>
          </div>
        </aside>
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