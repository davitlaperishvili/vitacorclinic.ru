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
                  <h1 id="pagetitle"><?php single_post_title(); ?></h1>
              </div>
          </div>
      </div>
  </section>
  <div class="main_wraper">
    <div class="sidebar_container">
      <div class="container">
        <aside>
          <div class="diseases_list">
            <ul>
              <li>
                <a href="">Вагинит</a>
              </li>
              <li>
                <a href="">Вагиноз</a>
              </li>
              <li>
                <a href="">Вагинизм</a>
              </li>
              <li>
                <a href="">Вирус папилломы человека (ВПЧ)</a>
              </li>
              <li>
                <a href="">Внематочная беременность</a>
              </li>
              <li>
                <a href="">Вульвит</a>
              </li>
              <li>
                <a href="">Гиперплазия эндометрия</a>
              </li>
            </ul>
          </div>
        </aside>
        <div class="main_content">
          <?php  
              $vrachi_banner = get_field('vrachi_banner'); 
          ?>
          <section class="vrachi_banner">
              <div class="banner_main">
                <figure>
                    <img src="<?php echo $vrachi_banner['banner_image']['url'] ?>" alt="<?php echo $vrachi_banner['banner_image']['alt'] ?>">
                </figure>
                <div class="banner_content">
                    <h2 class="banner_title"><?php echo $vrachi_banner['banner_title'] ?></h2>
                    <div class="banner_buttons">
                      <div class="theme_button">
                        <a href="#">Записаться</a>
                      </div>
                      <div class="banner_prices">
                        <?php
                          if($vrachi_banner['price_first']){
                            ?>
                              <div class="price_item">
                                <div class="title">Первичный прием:</div>
                                <div class="value"><?php echo $vrachi_banner['price_first']?></div>
                              </div>
                            <?php
                          }
                        ?>
                        <?php
                          if($vrachi_banner['price_second']){
                            ?>
                              <div class="price_item">
                                <div class="title">Повторный прием:</div>
                                <div class="value"><?php echo $vrachi_banner['price_second']?></div>
                              </div>
                            <?php
                          }
                        ?>
                      </div>
                    </div>
                </div>
              </div>
              <div class="banner_nav">
                <nav>
                  <ul>
                    <li>
                      <a href="">Услуги</a>
                    </li>
                    <li>
                      <a href="">Заболевания</a>
                    </li>
                    <li>
                      <a href="">Цены</a>
                    </li>
                    <li>
                      <a href="">Врачи</a>
                    </li> 
                  </ul>
                </nav>
              </div>
          </section>
          <section class="services">
              <h2 class="block_title">Услуги</h2>
              <div class="services_list">
                <div class="service_list_item">
                  <div class="list_title">Ведение беременности</div>
                  <ul>
                    <li>
                      <a href="">Подготовка к беременности</a>
                    </li>
                    <li>
                      <a href="">Пренатальный скрининг Astraiа</a>
                    </li>
                    <li>
                      <a href="">Программы ведения беременности отдельно по триместрам</a>
                    </li>
                    <li>
                      <a href="">Психологическая помощь беременным женщинам</a>
                    </li>
                    <li>
                      <a href="">Психологическая помощь беременным женщинам</a>
                    </li>
                  </ul>
                </div>
                <div class="service_list_item">
                  <div class="list_title">Ведение беременности</div>
                  <ul>
                    <li>
                      <a href="">Подготовка к беременности</a>
                    </li>
                    <li>
                      <a href="">Пренатальный скрининг Astraiа</a>
                    </li>
                    <li>
                      <a href="">Программы ведения беременности отдельно по триместрам</a>
                    </li>
                    <li>
                      <a href="">Психологическая помощь беременным женщинам</a>
                    </li>
                    <li>
                      <a href="">Психологическая помощь беременным женщинам</a>
                    </li>
                  </ul>
                </div>
                <div class="service_list_item">
                  <div class="list_title">Ведение беременности</div>
                  <ul>
                    <li>
                      <a href="">Подготовка к беременности</a>
                    </li>
                    <li>
                      <a href="">Пренатальный скрининг Astraiа</a>
                    </li>
                    <li>
                      <a href="">Программы ведения беременности отдельно по триместрам</a>
                    </li>
                    <li>
                      <a href="">Психологическая помощь беременным женщинам</a>
                    </li>
                    <li>
                      <a href="">Психологическая помощь беременным женщинам</a>
                    </li>
                  </ul>
                </div>
                <div class="service_list_item">
                  <div class="list_title">Ведение беременности</div>
                  <ul>
                    <li>
                      <a href="">Подготовка к беременности</a>
                    </li>
                    <li>
                      <a href="">Пренатальный скрининг Astraiа</a>
                    </li>
                    <li>
                      <a href="">Программы ведения беременности отдельно по триместрам</a>
                    </li>
                    <li>
                      <a href="">Психологическая помощь беременным женщинам</a>
                    </li>
                    <li>
                      <a href="">Психологическая помощь беременным женщинам</a>
                    </li>
                  </ul>
                </div>
              </div>
          </section>
        </div>
      </div>
    </div>

    <?php  
        $banner_list = get_field('vrachi_banner_slider'); 
    ?>
    <section class="vrachi_banner_list">
        <div class="container">
          <div class="banners_slider swiper">
            <div class="swiper-wrappr">
              <?php 
                foreach($banner_list['banner_list'] as $banner){
                  ?>
                    <div class="swiper-slide">
                      <figure>
                        <img src="<?php echo $banner['banner_image']['url'] ?>" alt="<?php echo $banner['banner_image']['alt'] ?>">
                      </figure>
                      <div class="banner_content">
                        <div class="banner_title"><?php echo $banner['banner_title'] ?></div>
                        <div class="banner_text"><?php echo $banner['banner_text'] ?></div>
                        <div class="theme_button white">
                          <a href="<?php echo $banner['banner_button_url'] ?>"><?php echo $banner['banner_button_text'] ?></a>
                        </div>
                      </div>
                    </div>
                  <?php
                }
              ?>
            </div>
          </div>
        </div>
    </section>

    <?php  
        $vrachi_price_list = get_field('vrachi_price_list'); 
    ?>
    <section class="vrachi_price">
        <div class="container">
          <h2 class="section_title"><?php echo $vrachi_price_list['block_title'] ?></h2>
          <div class="price_table">
            <div class="table_title"><?php echo $vrachi_price_list['block_subtitle'] ?></div>
            
            <table>
              <thead>
                <tr>
                  <th>Наименование услуги</th>
                  <th>Цена</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  foreach($vrachi_price_list['prices'] as $price){
                    ?>
                      <tr>
                        <td><?php echo $price['service_name'] ?></td>
                        <td><?php echo $price['price'] ?></td>
                      </tr>
                    <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
    </section>

    <?php  
        $text_block = get_field('text_block'); 
    ?>
    <section class="text_block">
        <div class="container">
          <div class="section_text"><?php echo $text_block['text'] ?></div>
        </div>
    </section>

   <?php  
        $vrachi_faq = get_field('vrachi_faq'); 
    ?>
    <section class="faq">
        <div class="container">
          <h2 class="section_title"><?php echo $vrachi_faq['block_title'] ?></h2>
          <div class="faq_list">
            <?php
              foreach($vrachi_faq['faq_list'] as $faq) {
                ?>
                  <div class="faq_item">
                    <div class="faq_question"><?php echo $faq['question'] ?></div>
                    <div class="faq_answer"><?php echo $faq['answer'] ?></div>
                  </div>
                <?php 
              }
            ?>
          </div>
        </div>
    </section>
  </div>
</main>

<?php get_footer(); ?>