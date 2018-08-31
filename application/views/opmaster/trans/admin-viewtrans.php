        <div class='panel panel-default col-lg-9'>
          <div class='panel-heading'>
            <i class='fa fa-beer fa fa-large'></i>
            <?php echo $txn_id; ?>
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
          <!-- Weather -->
          <div class="col-md-12">
            <div class="widget-container fluid-height">
              <div class="widget-content padded">
<table class="table table-striped">

                  <tbody>
                    <tr>
                      <td class="text-right">
                       Order #ID
                      </td>
                      <td>
                        <?php echo $product_id; ?>
                      </td>

                    </tr>
                    <tr>
                      <td class="text-right">
                        Transaction ID
                      </td>
                      <td>
                        <?php echo $txn_id; ?>
                      </td>

                    </tr>
                    <tr>
                      <td class="text-right">
                       Client #ID
                      </td>
                      <td>
                        <?php echo $user_id; ?>
                      </td>

                    </tr>
                    <tr>
                      <td class="text-right">
                        Payer's Email
                      </td>
                      <td>
                        <?php echo $payer_email; ?>
                      </td>

                    </tr>
                    <tr>
                      <td class="text-right">
                        Payment currency
                      </td>
                      <td>
                        <?php echo $currency_code; ?>
                      </td>

                    </tr>                    
                    <tr>
                      <td class="text-right">
                       Amount
                      </td>
                      <td>
                        <?php echo $payment_gross; ?>
                      </td>

                    </tr>                   
                     <tr>
                      <td class="text-right">
                       Payment Status
                      </td>
                      <td>
                        <?php echo $payment_status; ?>
                      </td>

                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
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
