
   <?php  
        $block_title = get_sub_field('block_title'); 
        $block_subtitle = get_sub_field('block_subtitle'); 
        $prices = get_sub_field('prices'); 
        $rowIndex = get_row_index();
    ?>
    
    <section class="vrachi_price">
        <div class="container">
          <h2 class="section_title"><?php echo $block_title ?></h2>
          <div class="price_table">
            <div class="table_title"><?php echo $block_subtitle ?></div>
            
            <table>
              <thead>
                <tr>
                  <th>Наименование услуги</th>
                  <th>Цена</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  foreach($prices as $price){
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

