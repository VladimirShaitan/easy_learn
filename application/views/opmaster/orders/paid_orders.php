       <div class='panel panel-default col-lg-9'>
          <div class='panel-heading'>
            <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
            Оплаченные заказы
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
                <div class="pull-right"> 

                 </div>
              </div>
              <div class="widget-content padded clearfix">
                <table class="table table-bordered table-striped" >
                  <thead>
                    <th>
                      ID заказа
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
                     Оплата за работу
                    </th>
                    <th class="hidden-xs">
                    ID автора
                    </th>
                   
                  </thead>

                  <tbody>
<?php if (is_array ($orders)): ?>
<?php foreach ($orders as $orders): ?>
                    <tr>
                      <td>
                        <a href="<?php echo ci_site_url('Adminorders/view_order/'.$orders['orderid']); ?>">#<?php echo $orders['orderid']; ?> </a>
                      </td>
                      <td class="hidden-xs" width="150">
                      <?php // echo $orders['deadline']; ?>
                         <?php
                           $yearC = substr($orders['deadline'], 0, 4); 
                           $monthC = substr($orders['deadline'], 5, 2);
                           $dayC = substr($orders['deadline'], 8, 2);
                           $timeC = substr($orders['deadline'], 10)
                          ?>
                          <?php echo $dayC.'.'.$monthC.'.'.$yearC.' '.$timeC; ?>
                      </td>
                      <td class="hidden-xs">
                       <a href="<?php echo ci_site_url('Adminorders/view_order/'.$orders['orderid']); ?>"><?php echo $orders['topic']; ?> </a>
                      </td>
                            
                     <td class="hidden-xs">
                       <?php echo $orders['subject']; ?>
                      </td> 
                       <td class="hidden-xs">
                        <?php echo $orders['referencing_style']; ?>
                       </td>
                      <td class="hidden-xs">
                        <?php echo $orders['writerpay']; ?>
                       </td>
                      <td class="hidden-xs">
                        <?php echo $orders['preferred_writer']; ?>
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
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="http://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
  </body>
</html>
