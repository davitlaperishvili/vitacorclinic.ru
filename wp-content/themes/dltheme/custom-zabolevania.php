<?php get_header(); ?>
<main class="directions_page dl_page">
  <section class="page-top maxwidth-theme ">
      <div class="row">
          <div class="col-md-12">
              <div class="breadcrumb" id="navigation">
      <?php if(function_exists('bcn_display'))
      {
        bcn_display();
      }?>
              </div>
              <div class="page-top-main">
                  <h1 id="pagetitle"><?php the_title() ?></h1>
              </div>
          </div>
      </div>
  </section>
  <div class="main_wraper">
      <section class="text_block">
        <div class="container">
          
        </div>
      </section>

  </div>
</main>
<?php get_footer();?>