        <div class='panel panel-default col-lg-9'>
          <div class='panel-heading'>
            <i class='fa fa-beer fa fa-large'></i>
            <?php echo $Title; ?>
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
              <div class="widget-content padded clearfix">
                <table class="table table-bordered table-striped" id="dataTable1">
                  <thead>
                    <th class="check-header hidden-xs">
                      <label><input id="checkAll" name="checkAll" type="checkbox"><span></span></label>
                    </th>
                    <th>
                      Trns #ID
                    </th>
                    <th>
                     Writer #ID
                    </th>
                    <th class="hidden-xs">
                     Full Name
                    </th>
                    <th class="hidden-xs">
                     Trns status
                    </th>                    
                    <th class="hidden-xs">
                     Trans amount
                    </th>                    
                    <th class="hidden-xs">
                     Trns date
                    </th>
                    <th></th>
                  </thead>



                  <tbody>

<?php foreach ($transactions as $transactions): ?>
                    <tr>
                      <td class="check hidden-xs">
                        <label><input name="optionsRadios1" type="checkbox" value="option1"><span></span></label>
                      </td>
                      <td>
                        #<?php echo $transactions['trns_id']; ?>
                      </td>                      
                      <td>
                        #<?php echo $transactions['writer_id']; ?>
                      </td>
                      <td>
                       <?php echo $transactions['trns_fullname']; ?> 
                      </td>
                      <td class="hidden-xs">
                        <?php echo $transactions['trns_status']; ?>
                      </td>
                      <td class="hidden-xs">
                        <?php echo $transactions['trans_amount']; ?>
                      </td>                      
                      <td class="hidden-xs">
                     <span class="label label-warning">  <?php echo $transactions['trns_date']; ?></span>
                      </td>
                      <td class="actions">
                        <div class="action-buttons">
                          <a class="table-actions" href="<?php echo ci_site_url('Adminfinance/view_payment/'.$transactions['trns_id']); ?>"><i class="fa fa-eye"></i></a>

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

    <!-- Footer -->
    <!-- Javascripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script><script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="http://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
  </body>
</html>
