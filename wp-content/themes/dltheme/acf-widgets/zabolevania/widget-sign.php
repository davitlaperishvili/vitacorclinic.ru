
   <?php  
         
        $show_block = get_sub_field('show_block'); 
        $rowIndex = get_row_index();
    ?>
    <?php 
      if($show_block){
        ?>
        <section class="zabolevanie_sign_in" id="content<?php echo $rowIndex ?>">
            <div class="container">
                <div class="sign_in_form">
                  <h2 class="form_title">Записаться на приём</h2>
                  <div class="subtitle">заболевание - <?php the_title() ?></div>
                  <div role="form" class="wpcf7" id="wpcf7-f1521-o4" lang="ru-RU" dir="ltr">
                    <div class="screen-reader-response">
                        <p role="status" aria-live="polite" aria-atomic="true"></p>
                        <ul></ul>
                    </div>
                    <form action="/zabolevania/vaginit/#wpcf7-f1521-o4" method="post" class="wpcf7-form init" novalidate="novalidate" data-status="init">
                        <div style="display: none;">
                          <input type="hidden" name="_wpcf7" value="1521">
                          <input type="hidden" name="_wpcf7_version" value="5.6">
                          <input type="hidden" name="_wpcf7_locale" value="ru_RU">
                          <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f1521-o4">
                          <input type="hidden" name="_wpcf7_container_post" value="0">
                          <input type="hidden" name="_wpcf7_posted_data_hash" value="">
                          <input type="hidden" name="_wpcf7_recaptcha_response" value="03AL8dmw_jGJSiCKUTKT1kNNpBxlwknJghXddeHmcEw_dyKOUcxSHa8n4zswBcGvozCT_TucVH9Z-RrOB1AKNTWsMA16Bga66b9DvvChUXALviDIdE_M8ebASB86hVHhoazhRnsxqnTz8-4uIC74iphF_-DW4R2CyDG1z1JBPaDLdVzTER5i9fq4sd59YtOIP8J-84lHKPEuXt7IKcN0o_L3Orz_-qwZsH-Vp_6ZGReRqfF_aUxooR6X2ysf_5mvqMVFxDoVMV1uu1EFJyYAygkdKWI6YNzgpRaiUiruRpCZv7LZgDh1tKbwEFvXyNKd8cDBhehsTs7urvHP0_DlFPQEnUsgnF_O-6ITbK6zKAaprfclWiaQOiqKkkiMx0LT39B4Kp-b4fqqEWmYx9jmSfynvvLQW-UhkxrA8AUSuKLUSoXv-20HRsWj6r5RNqHNAS_cwG1dRWaY6Sr_Q9lPf8B59gxR3tsDoPAnOTFmC2BoNciXcqvJYj1PKjJDwzCa2Tsy9lKPYjwvW8R2EblVJeheirSVTcASHfZs0F3omc28Q0_C25tWTaNK0">
                        </div>
                        <div class="form_items">
                          <div class="form_row row1">
                              <div class="form_item">
                                <span class="wpcf7-form-control-wrap" data-name="your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Ваше имя*"></span>
                              </div>
                              <div class="form_item">
                                <span class="wpcf7-form-control-wrap" data-name="your-phone"><input type="text" name="your-phone" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Телефон*"></span>
                              </div>
                              <div class="form_item">
                                <span class="wpcf7-form-control-wrap" data-name="your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email" aria-invalid="false" placeholder="E-mail"></span>
                              </div>
                          </div>
                          <div class="form_row row2">
                              <div class="form_item">
                                <span class="wpcf7-form-control-wrap" data-name="your-direction">
                                    <select name="your-direction" class="wpcf7-form-control wpcf7-select select2" aria-invalid="false">
                                    <?php

                                      foreach( $alpaServices as $post2 ){
                                          setup_postdata( $post2 );
                                          $selected = get_the_title($post2->ID) == get_the_title() ? "selected" : "";
                                          ?>
                                              <option <?php echo $selected ?> value="<?php echo get_the_title($post2->ID)?>"><?php echo get_the_title($post2->ID)?></option>
                                            <?php
                                      }

                                      wp_reset_postdata(); // сброс
                                      ?>
                                    </select>
                                </span>
                              </div>
                              <div class="form_submit">
                                <button class="gilaki" type="submit"><svg width="32" height="37" viewBox="0 0 32 37" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.28 3.76933H10.624C10.9062 2.68538 11.5932 1.72057 12.5711 1.03503C13.549 0.349493 14.7589 -0.0155447 16 0.000507693C18.56 0.000507693 20.864 1.55012 21.376 3.76933H30.72C31.488 3.76933 32 4.34326 32 4.87893V35.8713C31.9944 36.1724 31.8571 36.4594 31.6176 36.6706C31.3782 36.8817 31.0558 37 30.72 37H1.28C0.947788 37.0002 0.628517 36.8845 0.38966 36.6774C0.150804 36.4704 0.0110737 36.1881 0 35.8904L0 4.89806C0.00559688 4.59696 0.14292 4.30988 0.382363 4.09874C0.621806 3.88759 0.944187 3.76929 1.28 3.76933ZM9.216 5.98853V8.53297H22.912V5.98853H20.224C19.328 5.98853 18.816 5.54852 18.944 4.76414C18.944 3.32931 17.664 2.21971 16 2.21971C14.336 2.21971 13.056 3.32931 13.056 4.76414C13.056 5.43373 12.544 5.98853 11.776 5.98853H9.216ZM25.472 5.98853V10.7713H6.656V5.98853H2.56V34.7808H29.44V5.98853H25.472Z" fill="white"/>
<path d="M8.25806 18.1582C6.58065 18.1582 6.58065 16 8.25806 16H23.7419C25.4194 16 25.4194 18.1582 23.7419 18.1582H8.25806ZM8.25806 24.1448C6.58065 24.1448 6.58065 21.9678 8.25806 21.9678H23.7419C25.4194 21.9678 25.4194 24.1448 23.7419 24.1448H8.25806ZM8.25806 30C6.58065 30 6.58065 27.8231 8.25806 27.8231H23.7419C25.4194 27.8231 25.4194 30 23.7419 30H8.25806Z" fill="white"/>
</svg>
Записаться на приём</button>
                              </div>
                          </div>
                          <div class="form_row row3">
                              <div class="text">Нажимая на кнопку отправить, я даю <a href="#">согласие на обработку персональных данных</a></div>
                          </div>
                        </div>
                        <input type="hidden" class="wpcf7-pum" value="{&quot;closepopup&quot;:false,&quot;closedelay&quot;:0,&quot;openpopup&quot;:false,&quot;openpopup_id&quot;:0}">
                        <div class="wpcf7-response-output" aria-hidden="true"></div>
                    </form>
                  </div>
                </div>
            </div>
        </section>
        <?php
      }
    ?>

