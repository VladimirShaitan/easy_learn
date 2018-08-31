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
                <!-- <i class="fa fa-table"></i><?php echo $Title; ?> -->
              </div>
              <div class="widget-content padded clearfix">
                <table class="table table-bordered table-striped" id="dataTable1">
                  <thead>
                    <th class="check-header hidden-xs">
                      <label><input id="checkAll" name="checkAll" type="checkbox"><span></span></label>
                    </th>
                    <th>
                      ID Заказа
                    </th>
                    <th>
                      Тема
                    </th>
                    <th class="hidden-xs">
                      Customer
                    </th>
                    <th class="hidden-xs">
                     Выполнить да
                    </th>                    
                    <th class="hidden-xs">
                    Сумма
                    </th>
                    <th class="hidden-xs">
                      Статус
                    </th>
                    <th></th>
                  </thead>



                  <tbody>

<?php foreach ($orders as $orders): ?>
                    <tr>
                      <td class="check hidden-xs">
                        <label><input name="optionsRadios1" type="checkbox" value="option1"><span></span></label>
                      </td>
                      <td>
                        #<?php echo $orders['orderid']; ?>
                      </td>
                      <td>
                       <?php echo $orders['topic']; ?>
                      </td>
                      <td class="hidden-xs">
                        <?php echo $orders['customer_name']; ?>
                      </td>
                      <td class="hidden-xs">
<span class="label label-warning">


               <?php
$datetime1 = new DateTime(date('Y-m-d H:i:s'));
$datetime2 = new DateTime($orders['deadline']);

if($datetime1 >= $datetime2){
  echo "Срок вышел";
}

if($datetime1 <= $datetime2){
$interval = $datetime1->diff($datetime2);
$elapsed = $interval->format('%a дней %h часов %i минут');
echo $elapsed;
}

?>
</span>
                      </td>                      
                      <td class="hidden-xs">
                       <?php echo $orders['currency'].' '.$orders['amount']; ?>
                      </td>
                      <td class="hidden-xs">
                        <span class="label label-success"><?php echo $orders['order_status']; ?></span>
                      </td>
                      <td class="actions">
                        <div class="action-buttons">
                          <a class="table-actions" href="<?php echo ci_site_url('Adminorders/view_order/'.$orders['orderid']); ?>"><i class="fa fa-eye"></i></a>

                        </div>
                      </td>
                    </tr>
          <?php endforeach; ?>            
                  </tbody>
                </table>
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
