        <div class='panel panel-default col-lg-9'>
          <div class='panel-heading'>
            <i class='fa fa-beer fa fa-large'></i>
            Upsells configurations
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
            <ul class="breadcrumb">
              <li>
                <a href="#"></a><i class="fa fa-home"></i>
              </li>
              <li>
                <a href="#">UI</a>
              </li>
              <li class="active">
                Upsells configurations
              </li>
            </ul>
          </div>
          <div class="col-md-7">
            <div class="row">
              <div class="col-lg-12">
                <div class="widget-container">
                  <div class="widget-content padded">
<table class="table">
<thead>
<th>ID</th>
<th>Upsell Value</th>
<th>Upsell Name</th>
<th>Upsell Activated</th>



</thead>

                   <tbody>

                   <?php foreach ($upsells as $upsells): ?>
                   <tr>
                    <td><?php echo $upsells['id'];?></td>
                    <td><?php echo $upsells['upsell_value'];?></td>
                    <td><?php echo $upsells['upsell_name'];?></td>
                    <td>

                        
                    <?php if($upsells['upsell_activated'] == 0){ ?>
                    <?php echo form_open('Siteconfigs/enable_upsell/'.$upsells['id']);?>
<input type="hidden" name="id" value="<?php echo $upsells['id'];?>">
<input type="hidden" name="upsell_activated" value=1>
<input type='submit' class="btn btn-success" Value='Enable'>
<?php echo form_close();?> 
                    <?php }?>


                    <?php if($upsells['upsell_activated'] == 1){ ?>
                    <?php echo form_open('Siteconfigs/enable_upsell/'.$upsells['id']);?>
<input type="hidden" name="id" value="<?php echo $upsells['id'];?>">
<input type="hidden" name="upsell_activated" value='0'>
<input type='submit' class="btn btn-danger" Value='Disable'>
<?php echo form_close();?> 
                    <?php }?>   



                    </td>
                    <td>

<?php echo form_open('Siteconfigs/delete_upsell/'.$upsells['id'], array('class'=>'delet_subject'));?>
<input type="hidden" name="id" value="<?php echo $upsells['id'];?>">
<input type='submit' class="btn btn-info" Value='Delete'>
<?php echo form_close();?> 
                    </td>
                  </tr>
                                   
                  <?php endforeach; ?>  
                   <?php echo form_close();?>
                  </tbody>
                </table> 
                  </div>
                </div>
              </div>
            </div>



          </div>
          <div class="col-md-5">


            <div class="row">
              <div class="col-lg-12">
                <div class="widget-container fluid-height">
                  <div class="widget-content padded text-center">
                  <?php echo form_open('Siteconfigs/add_upsell', array('class'=>'jsform'));?>
                  <div class='jsError'></div>
                    <p> You can Easily edit upsell </p> 




                                        <div class="form-group">                                         
                                            <label class="control-label  col-md-3" for="upsell">Add upsell (price)</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" id="upsell_value" name='upsell_value' value="1">
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        
                                        <div class="form-group">                                         
                                            <label class="control-label  col-md-3" for="upsellname">Upsell Name</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" id="upsell_name" name='upsell_name' placeholder="Subject">
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
          <div class="form-group">
            <label class="control-label col-md-3"></label>
            <div class="col-md-7">
              <input class="form-control" type='submit' Value='Add New Upsell'>
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
      </div>
    </div>
    <!-- Footer -->
    <!-- Javascripts -->
<!--     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script> -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="http://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
  </body>
</html>
