<?php

// if($this->session->userdata('admin_level') != 'super'){
//       redirect(ci_site_url().'opmaster/dashboard');
//}
?>      
       <div class='panel panel-default col-lg-9'>
          <div class='panel-heading'>
            <i class='fa fa-id-card-o fa fa-large'></i>
            Управление заказами
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
      <div class="widget-content padded clearfix">
        
        <div class="col-sm-3 p_clientPaidDesc">- Оплачен заказчиком</div>
        <div class="col-sm-3 p_halfDesc">- Оплачена половина</div>

        <table class="table table-bordered table-striped t_allord" >
          <thead>
            <th>
              ID заказа
            </th>
            <th>
              Дата создания
            </th>
            <th>
              Дата сдачи
            </th>
            <th>
              Тема
            </th>
            <th class="hidden-xs">
             Предмет
            </th>  
            <th class="hidden-xs">
           Тип работы
            </th> 
            <th class="hidden-xs">
             Оплата Автору
            </th>
            <th class="hidden-xs">
            ID автора
            </th>
<!--            <th>
             Дата оплаты автору
           </th> -->
           <?php if($this->session->userdata('admin_level') === 'super') { ?>
           <th>Отв. менеджер</th>
         <?php } ?>
          </thead>

          <tbody>
<?php if (is_array ($orders)): ?>
<?php foreach ($orders as $orders): ?>
            <tr class="<?php if($orders['client_paid'] === 'half'){ echo 'p_half';} elseif($orders['client_paid'] === 'paid_client'){echo 'p_paidClient';} ?>">
              <td>
                <a href="<?php echo ci_site_url('Adminorders/view_order/'.$orders['orderid']); ?>">#<?php echo $orders['orderid']; ?> </a>
              </td>
              <td>
                <?php
                   $yearDP = substr($orders['date_posted'], 0, 4); 
                   $monthDP = substr($orders['date_posted'], 5, 2);
                   $dayDP = substr($orders['date_posted'], 8, 2);
                   $timeDP = substr($orders['date_posted'], 10)
                  ?>
                  <?php echo $dayDP.'.'.$monthDP.'.'.$yearDP.' '.$timeDP; ?>

              </td>
              <td class="hidden-xs" width="150">
                 <?php
                   $yearC = substr($orders['deadline'], 0, 4); 
                   $monthC = substr($orders['deadline'], 5, 2);
                   $dayC = substr($orders['deadline'], 8, 2);
                   $timeC = substr($orders['deadline'], 10)
                  ?>
                  <?php echo $dayC.'.'.$monthC.'.'.$yearC.' '.$timeC; ?>
              </td>
              <td class="hidden-xs">
               <a href="<?php echo ci_site_url('Adminorders/view_order/'.$orders['orderid']); ?>"><?php echo stripslashes ($orders['topic']); ?> </a>
              </td>                      
              <td class="hidden-xs">
               <?php  echo $orders['subject']; ?>
              </td> 
               <td class="hidden-xs">
                <?php echo $orders['referencing_style']; ?>
               </td> 
              <td class="hidden-xs">
                <?php if(!empty($orders['data_oplatu'])){
                  echo $orders['data_oplatu'];
                } else {echo '--';} ?>
                <br>
                <?php if($orders['writerpay'] != '0'){

                 //echo $orders['writerpay'].' грн'; 
                  if($orders['client_paid'] != 'paid_writer' && $orders['client_paid'] != 'paid' && $orders['order_status'] != 'onlyAvtorDoplata') {
                    echo $orders['writerpay']+$orders['avtor_doplata']-$orders['fine'] .' грн';
                  } else {
                    echo $orders['avtor_doplata'] .' грн';
                  } 

                } else {echo '--';} ?>
               </td>
              <td class="hidden-xs">
                <?php if($orders['preferred_writer'] != '0') { ?>
                  <a href="<?php echo ci_site_url().'Adminwriters/view_writer/'.$orders['preferred_writer'];?>"><?php echo $orders['preferred_writer']; ?></a>
                <?php } else { ?>
                  --
                <?php } ?>
               </td>
<!--                <td>

                </td> -->

                <?php if($this->session->userdata('admin_level') === 'super') { ?>
                <td>
                <?php if(!empty($orders['manager_id'])) { ?>
                  <a href="<?php echo ci_site_url().'Adminwriters/view_writer/'.$orders['manager_id'] ?>"><?php echo $orders['manager_id']; ?></a>
                <?php } else {echo '--';} ?>
                </td>
              <?php } ?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="https://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
  </body>
</html>
