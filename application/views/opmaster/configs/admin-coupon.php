       <div class='panel panel-default col-lg-9'>
          <div class='panel-heading'>
            <i class='fa fa-beer fa fa-large'></i>
            Coupon Code  
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
                        <a data-toggle="tab" href="#tab1"><i class="fa fa-comments"></i><span> Coupons </span></a>
                      </li>
                      <li>
                        <a data-toggle="tab" href="#tab2"><i class="fa fa-user"></i><span> Edit Coupon </span></a>
                      </li>

                    </ul>
                  </div>
                  <div class="tab-content padded col-md-12 main" id="my-tab-content">
<?php foreach ($ops_coupon as $coupon): ?>
<?php endforeach; ?>  
                  <?php echo form_open('Siteconfigs/edit_coupon');?>
                    <h3> You can Easily edit coupon code </h3> 
                    <h3>Current code: <?php echo $coupon['coupon_value'];?><?php echo $coupon['coupon_name'];?></h3>
<div class='jsError'></div>


<div class="form-group">
<label class="col-sm-3 control-label text-right text-right "> Percentage (%)</label>
<div class="col-sm-7">
<input class="form-control" value="<?php echo $coupon['coupon_value'];?>"   name='coupon_value' type="text">
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label text-right text-right"> Other Code (after)</label>
<div class="col-sm-7">
<input class="form-control" value="<?php echo $coupon['coupon_name'];?>" name='coupon_name' placeholder="Subject" type="text">
<input type="hidden" value="<?php echo $coupon['id'];?>" name='coupon_id' placeholder="id" type="text">
</div>
</div>

          <div class="form-group">
            <label class="control-label col-md-3"></label>
            <div class="col-md-7">
            <input type='submit' class="form-control" Value='Edit Coupon Code'>

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
    <!-- Footer -->
    <!-- Javascripts -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script> -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="http://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
  </body>
</html>


