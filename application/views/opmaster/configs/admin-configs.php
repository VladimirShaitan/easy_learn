    <!--     <div class='panel panel-default col-lg-9'>
          <div class='panel-heading'>
            <i class='fa fa-beer fa fa-large'></i>
Site configs 
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
            <div class="row">
              <div class="col-lg-12">
                <div class="widget-container fluid-height">
                  <div class="heading tabs">
                    <ul class="nav nav-tabs pull-right" data-tabs="tabs" id="tabs">
                      <li class="active">
                        <a data-toggle="tab" href="#configs1"><i class="fa fa-comments"></i><span></span> Configuration details</a>
                      </li>
                      <li>
                        <a data-toggle="tab" href="#configs2"><i class="fa fa-user"></i><span> Edit basic configs</span></a>
                      </li>
                    </ul>
                  </div>
                  <?php echo validation_errors(); ?>
                  <div class="tab-content padded col-md-12 main" id="my-tab-content">
                    <div class="tab-pane active" id="configs1">
                  <table class="table">

                   <tbody>
                   <?php foreach ($configs as $configs): ?>
                   <tr>
                    <td>WriterPay (fraction)</td>
                    <td><?php echo $configs['writerpay'];?></td>
                  </tr>
                  <tr>
                    <td>PayPal</td>
                    <td><?php echo $configs['paypal'];?></td>
                  </tr> 
                 <tr>
                    <td>Words per page</td>
                    <td><?php echo $configs['wordsperpage'];?></td>
                  </tr>  
                  <tr>
                    <td>Customer Enter Own prices</td>
                    <td><?php echo $configs['client_own_price'];?></td>
                  </tr> 
                   <tr>
                    <td>Time to Writer</td>
                    <td><?php echo $configs['time_difference'];?> or(*) total time</td>
                  </tr>                      
                  <?php endforeach; ?>  
                  </tbody>
                </table>
                      
                    </div>
                    <div class="tab-pane" id="configs2">

           <?php echo form_open('Siteconfigs/edit_config', array('class'=>'edit_config'));?>

<div class="form-group">
<label class="control-label col-md-3 text-right"> Writerpay  </label>
<div class="col-md-7">
<input class="form-control" value="<?php echo $configs['writerpay'];?>"   name='writerpay' type="text">
(The % of total amount)
</div>
</div>

<div class="form-group">
<label class="control-label col-md-3 text-right"> PayPal Email</label>
<div class="col-sm-7">
<input class="form-control" name='paypal' placeholder="PayPal" type="text" value="<?php echo $configs['paypal'];?>">
(The Paypal that receives money from cleints)
</div>
</div>

<div class="form-group">
<label class="control-label col-md-3 text-right"> Words per page</label>
<div class="col-sm-7">
<input class="form-control" name='wordsperpage' placeholder="wordsperpage" type="text" value="<?php echo $configs['wordsperpage'];?>">
(The number of words per page)
</div>
</div>

<div class="form-group">
<label class="control-label col-md-3 text-right"> Customer Enter Own price</label>
<div class="col-sm-7">
            <select name='client_own_price' class="form-control"  >
               <option name='enabled' value="<?php echo $configs['client_own_price'];?>">SET TO: [<?php echo $configs['client_own_price'];?>]</option>
               <option name='YES' value="YES"> YES</option>
               <option name='NO' value="NO"> NO</option>
            </select>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-3 text-right"> Writer time  </label>
<div class="col-md-7">
<input class="form-control" value="<?php echo $configs['time_difference'];?>"   name='time_difference' type="text">
(should be a decimal eg 0.3 means 30%, 0.75 measn 75%)
</div>
</div>

          <div class="form-group">
            <label class="control-label col-md-3 text-right"></label>
            <div class="col-md-7">
            <input type='submit' class="form-control" Value='Edit Configurations'>

            </div>
          </div>

           <?php echo form_close();?>
                      
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   Footer 
     Javascripts -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
 -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="http://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
  </body>
</html>


