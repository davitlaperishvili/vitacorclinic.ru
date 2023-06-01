<?php get_header(); ?>
<?php
$currentTax = get_queried_object();
?>
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
                  <h1 id="pagetitle"><?php echo $currentTax->label ?></h1>
              </div>
          </div>
      </div>
  </section>
  <?php 
      $alpaServices = get_posts( array(
          'numberposts' => -1,
          'post_type'   => 'vrachi',
          'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
      ) );
      $servicesTitle = [];
      //get all services title and permalink
      foreach( $alpaServices as $post ){
          setup_postdata( $post );
          $title = get_the_title();
          $servicesTitle = array_push_assoc($servicesTitle, get_the_permalink(), get_the_title());
      }
      
      wp_reset_postdata(); // сброс
      function abc($a,$b){
        $la = mb_substr($a,0,1,'utf-8');
        $lb = mb_substr($b,0,1,'utf-8');
        if(ord($la) > 122 && ord($lb) > 122){
            return $a > $b ? 1 : -1;
        }
        if(ord($la) > 122 || ord($lb) > 122) {
            return $a < $b ? 1 : -1;
        }
    
      }
      // push in associative array
      function array_push_assoc($array, $key, $value){
        $array[$key] = $value;
        return $array;
      }


    

    
      // sort services 
      uasort($servicesTitle, 'abc');
    ?>
  <div class="main_wraper">
  <div class="sidebar_container">
      <div class="container">
        <aside class="sidebar ready_sidebar">
          <?php get_sidebar(); ?>
        </aside>
        <div class="main_content">
          <div class="vrachi_archive_banner">
            <figure>
              <img src="<?php echo get_field('vrachi_archive_banner', 'option')['url']; ?>" alt="<?php echo get_field('vrachi_archive_banner', 'option')['alt']; ?>">
            </figure>
            <div class="buttons">
              <div class="theme_button">
                <a href="#" class="pop1 pum-trigger">Записаться на прием</a>
              </div>
              
              <div class="theme_button">
                <a href="/zabolevania" class="">Справочник заболеваний</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <section class="what_doctor_can" id="zabolevania">
    <div class="container">
      <div class="section_list">
        <div class="alfabet_list trans-all-4">
            <div class="alfabet_item filter-is-active text_filter">
              <div class="alfabet_services">
                  <ul>
                      
                  </ul>
              </div>
            </div>
          <?php 
              // sorting array
              

              $firstChar;
              $currentChar;
              foreach($servicesTitle as $service){
                  $firstChar = mb_substr($service, 0, 1);
                  $currentChar = $currentChar.$firstChar;

                  // check if first character goes twice, if yes put firstChar to currentChar 
                  if(mb_strlen($currentChar) > 1 && $firstChar !== mb_substr($currentChar, 0, 1)){
                      $currentChar = $firstChar;
                  }

                  //
                  if( mb_strlen($currentChar) == 1){
                      $count = 0;
                      foreach($servicesTitle as $serviceCount){
                          if($currentChar == mb_substr($serviceCount, 0, 1)){
                              $count++;
                          }
                      }
                      ?>
                          <div class="alfabet_item">
                              <div class="alfabet_title">
                                  <div class="letter"><?php echo $currentChar ?></div>
                              </div>
                              <div class="alfabet_services">
                                  <ul>
                                      <?php 
                                          foreach($servicesTitle as $url => $serviceName){
                                              if($currentChar == mb_substr($serviceName, 0, 1)){
                                                  ?>
                                                      <li>
                                                          <a href="<?php echo $url ?>"><?php echo $serviceName ?></a>
                                                      </li>
                                                  <?php
                                              }
                                          }
                                      ?>
                                  </ul>
                              </div>
                          </div>
                      <?php
                  }else{
                      
                  }
              }
          ?>
        </div>
      </div>
    </div>
  </section>
  <section class="search_doctor">
    <div class="container">
      <h2 class="section_title">Поиск специалиста</h2>
      <div class="doctor_search_form">
        <form action="" onsubmit="return false;">
          <div class="form_items">
            <div class="form_item">
              <input type="text" placeholder="Поиск по ФИО" class="doctor_filter_item" name="name">
            </div>
            <div class="form_item">
              <select name="type" id="" class="selectori doctor_filter_select doctor_filter_item" data-placeholder="Выберите тип специалиста">
                <option value="">Выберите тип специалиста</option>
                <option value="adult">Взрослые</option>
                <option value="kids">Дети</option>
              </select>
            </div>
            <div class="form_item">
              <?php 
                $services = get_posts( array(
                  'numberposts' => -1,
                  'post_type'   => 'vrachi',
                  'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
              ) );
              ?>
              <select name="direction" id="" class="selectori doctor_filter_select doctor_filter_item" data-placeholder="Выберите направление">
                <option value="">Выберите направление</option>
                  <?php 
                    foreach( $services as $post ){
                      setup_postdata( $post );
                      ?>
                        <option value="<?php echo get_the_ID() ?>"><?php the_title() ?></option>
                      <?php
                    }
                    
                    wp_reset_postdata(); // сброс
                  ?>
              </select>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <section class="doctors_slider filter_doctors" id="vrachi">
      <div class="container">
        <div class="doctors_list">
        <?php
              // параметры по умолчанию
              $doctorsPosts = get_posts( array(
                'numberposts' => -1,
                'post_type'   => 'staff',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ) );

            foreach( $doctorsPosts as $post ){
              $directionID = get_post_meta(get_the_ID(), "napravleniya", true);
              $tipSpecialista = get_post_meta(get_the_ID(), "tip_speczialista", true);
              $idList = "";
              if($directionID){
                foreach($directionID as $key => $id){
                  if($key == 0){
                    $idList = $id;
                  }else{
                    
                    $idList = $id. "," . $idList;
                  }
                }
              }else{
                $idList = "none";
              }
                setup_postdata( $post );
                ?>
                  <div class="doctor_item" data-direction="<?php echo $idList ?>" data-type="<?php echo $tipSpecialista[0]; echo $tipSpecialista[1] ?>">
                    <figure>
                      <a href="<?php the_permalink() ?>"><?php the_post_thumbnail() ?></a>
                    </figure>
                    <div class="doctor_name"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></div>
                    <div class="doctor_direction"><?php echo get_post_meta(get_the_ID(), "dolzhnost", true); ?></div>
                    <div class="theme_button mobile_only">
                      <a href="#" class="pop1 pum-trigger" style="cursor: pointer;">Запись онлайн</a>
                    </div>
                  </div>
                <?php
            }
            
            wp_reset_postdata(); // сброс
            ?>
            <div class="no_result">Не удалось найти специалиста</div>
        </div>
      </div>
    </section>
  </div>
</main>
<?php get_footer();?>