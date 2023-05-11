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
  <div class="main_wraper">
    <?php 
      $alpaServices = get_posts( array(
          'numberposts' => -1,
          'post_type'   => 'zabolevania',
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
    ?>
    <section class="what_doctor_can" id="zabolevania">
      <div class="container">
        <h2 class="section_title"><?php echo $fieldsGroup['directions_title'] ?></h2>
        <div class="section_text"><?php echo $fieldsGroup['tekst_bloka_chto_lechit_vrach'] ?></div>
        <div class="section_list">
          <div class="alfabet_list trans-all-4">
            <?php 
                // sorting array
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
    <section class="text_block">
      <div class="container">
          <div class="section_text">Hellooo</div>
      </div>
    </section>

  </div>
</main>
<?php get_footer();?>