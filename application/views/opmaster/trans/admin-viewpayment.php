        <div class='panel panel-default  col-lg-9'>
          <div class='panel-heading'>
            <i class='fa fa-beer fa fa-large'></i>
            <?php echo $trns_id; ?>
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
          <div class="col-md-7">
            <div class="widget-container fluid-height">
              <div class="widget-content padded">

<table class="table table-striped">

                  <tbody>
                    <tr>
                      <td class="col-md-4 text-right">
                      Transaction #ID
                      </td>
                      <td>
                        <?php echo $trns_id; ?>
                      </td>

                    </tr>
                    <tr>
                      <td class="text-right">
                        Transaction type
                      </td>
                      <td>
                        <?php echo $trns_type; ?>
                      </td>

                    </tr>
                    <tr>
                      <td class="text-right">
                       Transaction Date
                      </td>
                      <td>
                        <?php echo $trns_date; ?>
                      </td>

                    </tr>
                    <tr>
                      <td class="text-right">
                        Transaction status
                      </td>
                      <td>
                        <?php echo $trns_status; ?>
                      </td>

                    </tr>
                    <tr>
                      <td class="text-right">
                       Writer ID
                      </td>
                      <td>
                        <?php echo $writer_id; ?>
                      </td>

                    </tr>                    
                    <tr>
                      <td class="text-right">
                       Transactor's name
                      </td>
                      <td>
                        <?php echo $trns_fullname; ?>
                      </td>

                    </tr>                   
                     <tr>
                      <td class="text-right">
                       Transaction Amount
                      </td>
                      <td>
                        <?php echo $trans_amount; ?>
                      </td>

                    </tr>                     
                    <tr>
                      <td class="text-right">
                       Payment Details
                      </td>
                      <td>
                        <?php echo $payment_details; ?>
                      </td>

                    </tr>                    
                    <tr>
                      <td class="text-right">
                       Paid details
                      </td>
                      <td>
                        <?php echo $paid_details; ?>
                      </td>

                    </tr>                    
                    <tr>
                      <td class="text-right">
                       Date Payment was made
                      </td>
                      <td>
                        <?php echo $action_date; ?>
                      </td>

                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- end Weather --><!-- Bar Graph -->
          <div class="col-md-5">
            <div class="widget-container small">
              <div class="widget-content padded main">

               <div class="tabbable">

                  <ul class="nav nav-pills">
                     <li class="active">
                     <a href="#tab1default" data-toggle="tab" aria-expanded="true">Complete trans</a></li>
                    

                     <li><a href="#tab2default" data-toggle="tab" aria-expanded="false">Cancel trans</a>
                     </li>

                  </ul>


                  <div class="tab-content">
                     <div class="tab-pane fade active in" id="tab1default">
                    <?php if($paid_details == '') { ?>
                  <?php echo form_open('Financial/trans_update', array('class'=>'trans_update'));?>
                  <p> If you have sent the money, you can enter details and complete </p>
    <div class="form-group">
      <label class="control-label col-sm-12" for="email">Payment details</label>
      <div class="col-sm-12">
        <textarea class="form-control" name="paid_details"></textarea><br/>
      </div><br/>
    </div><br/>

                    <p><input type='hidden' name='trns_id' value="<?php echo $transaction['trns_id'];?>"></p>
                    <p><input type='hidden' name='trns_status' value="completed"></p>
                    <p><input type='submit' class="btn btn-info" Value='Complete Transaction'></p>
                  <?php echo form_close();?> 
                  <?php } ?>

                  <?php if($paid_details !== '') { ?>
                  <p> Congratulations! you completed this trasnaction already </p>
                  <?php } ?>

                   </div>

                     <div class="tab-pane fade" id="tab2default">
                  <?php echo form_open('Financial/trans_update', array('class'=>'trans_update2'));?>
                  <p> Set the reason you are cancelling this order. When cancelled, money returns to writer's account</p>
    <div class="form-group">
      <label class="control-label col-sm-12" for="email">Payment details</label>
      <div class="col-sm-12">
        <textarea class=" form-control" name="paid_details"></textarea><br/>
      </div><br/>
    </div><br/>

                    <p><input type='hidden' name='trns_id' value="<?php echo $transaction['trns_id'];?>"></p>
                    <p><input type='hidden' name='trns_status' value="cancelled"></p>
                    <p><input type='submit' class="btn btn-info" Value='Cancel Transaction'></p>
                  <?php echo form_close();?>

                     </div>



                  </div>

            </div> 


              </div>
            </div>
          </div>
          <!-- End Bar Graph -->
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
