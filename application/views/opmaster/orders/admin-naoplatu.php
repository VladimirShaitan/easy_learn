       <div class='panel panel-default col-lg-9'>
          <div class='panel-heading'>
            <i class="fa fa-money" aria-hidden="true"></i>
            Заказы на оплату <span class="mw">Авторам</span>
            <div class='panel-tools'>
              <div class='btn-group'>
                <a class='btn' href='#'>
                  <i class='icon-refresh'></i>
                
                </a>
                <a class='btn' data-toggle='toolbar-tooltip' href='#' title='Toggle'>
                  <i class='icon-chevron-down'></i>
                </a>
              </div>
            </div>
          </div>
          <div class='panel-body'>

      <div class="container-fluid main-content">
        <!-- DataTables Example -->

        <div class="row">
          <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
              <div class="heading">
              <!--   <i class="fa fa-table"></i><?php echo $Title; ?> -->
                <div class="pull-right"> 

              <!-- <form action="<?php echo site_url(); ?>Adminorders/adminsprep" method="post" id="workshop-newsletter-form">
                    <input name="search" class="" placeholder="Поиск заказа" type="text">
                    <input class="cta-2-form-submit-btn" value="Поиск ответа" type="submit">
                </form> -->

                 </div>
              </div>
<!--               <pre>
              <?php // print_r($orders); ?>
              </pre> -->
              <div class="widget-content padded clearfix">
                <table class="table table-bordered table-striped" >
                  <thead>
                    <th>
                      ID заказа
                    </th>
                    <th style="background: green; color: white">
                      Дата оплаты
                    </th>
                    <th class="hidden-xs">
                     Предмет
                    </th>  
                    <th class="hidden-xs">
                   Тип работы
                    </th> 
                    <th class="hidden-xs" style="background: green; color: white">
                     Оплата за работу
                    </th>
                    <th class="hidden-xs">
                    ID автора
                    </th>
                    <th>Действие</th>
                  </thead>

                  <tbody>
<?php
  function mysort($a, $b) {
      return strtotime($b['data_oplatu']) - strtotime($a['data_oplatu']);
  }
  if (is_array($orders)){usort($orders, 'mysort');} 
?>
<?php if (is_array ($orders)): ?>
<?php foreach (array_reverse($orders) as $orders): ?>
                    <tr>
                      <td>
                        <a href="<?php echo ci_site_url('Adminorders/view_order/'.$orders['orderid']); ?>">#<?php echo $orders['orderid']; ?> </a>
                      </td>
                      <td class="hidden-xs" >
                       <span class="mw"><?php echo $orders['data_oplatu']; ?></span>

                      </td>  
                     <td class="hidden-xs">
                       <?php echo $orders['subject'];?>
                      </td> 
                       <td class="hidden-xs">
                        <?php echo $orders['referencing_style'];?>
                       </td>
                      <td class="hidden-xs" style="width: 150px">
                        
                      <?php
                          // if($orders['writerpay'] === '0' || $orders['writerpay'] === ''){
                          //   echo '<span class="mwr">Не указана сумма</span>';
                          // } else {
                          //   if($orders['order_status'] != 'onlyAvtorDoplata'){
                          //   echo '<span class="mw">' . ($orders['writerpay']+$orders['avtor_doplata']) . 'грн.</span><br>Полная оплата';
                          //   } else {
                          //     echo '<span class="mw">' . $orders['avtor_doplata'] . 'грн.</span><br>Доплата';
                          //   }
                          // }
                      ?>
                      <span class="mw">
                          <?php if($orders['writerpay'] != '0'){

                           //echo $orders['writerpay'].' грн'; 
                            if($orders['client_paid'] != 'paid_writer' && $orders['client_paid'] != 'paid'  && $orders['order_status'] != 'onlyAvtorDoplata') {
                              echo $orders['writerpay']+$orders['avtor_doplata']-$orders['fine'] .' грн';
                            } else {
                              echo $orders['avtor_doplata'] .' грн';
                            } 

                          } else {echo '--';} ?>
                        </span>
                        
                       </td>
                      <td class="hidden-xs">
                          <a target="_blank" href="<?php echo ci_site_url('Adminwriters/view_writer/'. $orders['preferred_writer']); ?>">
                            <?php echo $orders['preferred_writer']; ?>
                          </a>
                       </td>
      
                        <td style="padding-bottom:10px ">

                        <?php echo form_open('Adminorders/changestatus', array('class'=>'jsform clearfix'));?>
                        <div class="form-group" style="margin: 0">
                          <div class="col-md-3">
                            <input type="hidden" name="order_status" value="Revision">
                                <input type='hidden' name='orderid' value="<?php echo $orders['orderid']; ?>">
                                <input type='hidden' name='customer_name' value="<?php echo $orders['customer_name'];?>">
                                  <input type='hidden' name='customer_email' value="<?php echo $orders['customer_email'];?>">
                                  <input type='hidden' name='preferred_writer' value="<?php echo $orders['preferred_writer'];?>">
                                  <button style="font-size: 12px;" type='submit' class="btn btn-success">На доработку</button>
                          </div>
                        </div>
                      <?php echo form_close();?> 

<!-- ================== -->

<?php echo form_open('Adminorders/oplata_table', array('class'=>'clearfix'));?>

           <div class="form-group" style="margin: 0">
            <div class="col-md-4">
                    <input type="hidden" name='client_paid' value="paid" />
                    <input type="hidden" name="from" value="naOplatuPage">
                    <input type="hidden" name="order_status" value="Revision">
                    <input type='hidden' name='orderid' value="<?php echo $orders['orderid']; ?>">
                    <input type='hidden' name='customer_email' value="<?php echo $orders['customer_email']; ?>">
                    <input type='hidden' name='preferred_writer' value="<?php echo $orders['preferred_writer']; ?>">
                    <button style="font-size: 12px;" type="submit" class="btn btn-danger">В завершенные</button>
            </div>
          </div>
 
<?php echo form_close();?>

<!-- ================== -->

                        </td>
                    </tr>
          <?php endforeach; ?> 
          <?php endif; ?>            
                  </tbody>
                </table>
                    <!-- <p><div class="pagination pull-right"><?php // echo $links; ?></div></p> -->

              </div>
            </div>
          </div>
        </div>
        <!-- end DataTables Example -->
      </div>
    </div>

    
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <!-- Javascripts -->
<!--     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script> -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="http://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
  </body>
</html>
