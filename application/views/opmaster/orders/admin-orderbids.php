        <div class='panel panel-default  col-lg-9'>
          <div class='panel-heading'>
            <i class='fa fa-id-card-o fa fa-large'></i>
            Оцененные заказы
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

        <div class="row">
          <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
              <div class="heading">
              </div>
              <div class="widget-content padded clearfix">
                <table class="table table-bordered table-striped" id="dataTable1">
                  <thead>
                    
                    <th>
                      ID заказа
                    </th>
                     <th>
                      Срок выполнения
                    </th>
                    <th>
                      Tема
                    </th>
                    <th class="hidden-xs">
                      Предмет
                    </th>
                     <th class="hidden-xs">
                     Тип работы
                    </th>                    
                    <th class="hidden-xs">
                     Бюджет заказчика
                    </th>
 <!--                    <th class="hidden-xs">
                      Поледняя ставка
                    </th> -->
                    
                  </thead>



                  <tbody>
<?php if (is_array ($orders)): ?>

<?php 
function cmp($a, $b) 
{
    if ($a["last_ord_req"] == $b["last_ord_req"]) {
        return 0;
    }
    return (strtotime($a["last_ord_req"]) < strtotime($b["last_ord_req"])) ? -1 : 1;
}
usort($orders, "cmp");
// print_r($orders);
$orders = array_reverse($orders);
?>


<?php foreach ($orders as $orders): ?>

                    <tr>
                      <td>
                       <a class="table-actions" href="<?php echo ci_site_url('Adminorders/view_order/'.$orders['orderid']); ?>"> #<?php echo $orders['orderid']; ?></a>
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
                      <td>
                        <a class="table-actions" href="<?php echo ci_site_url('Adminorders/view_order/'.$orders['orderid']); ?>"><?php echo stripslashes($orders['topic']); ?></a>
                      </td>
                       <td class="hidden-xs">
                       <?php  echo $orders['subject']; ?>
                      </td> 
                                       
                      <td class="hidden-xs">
                      <?php echo $orders['referencing_style'];?>
                      </td>
                  <td class="hidden-xs">
                       <?php echo $orders['sources']; ?> грн.
                      </td>
                      <!-- <td><?php // echo $orders['last_ord_req']; ?></td>  -->
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
<!--     <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="http://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script> -->
    <!-- Google Analytics -->
  </body>
</html>
