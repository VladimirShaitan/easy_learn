        <div class='panel panel-default col-lg-9'>
          <div class='panel-heading'>
            <i class='fa fa-beer fa fa-large'></i>
Countries and currency configurations
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
                
              </li>
            </ul>
          </div>

          <div class="col-md-6">
            <div class="row">
              <div class="col-lg-12">
                <div class="widget-container fluid-height">
                  <div class="heading">
                    <i class="fa fa-spinner"></i>Enable/Disable All countries in Writer Register form
                  </div>
                  <div class="widget-content padded">
<?php echo form_open('Siteconfigs/writer_allcountries');?>
          <div class="form-group">
            <div class="col-md-7">
                  <select name='writer_enable' class="form-control" >
                   <option value=""> Choose Option</option>
                   <option value=0> Disable ALL</option>
                   <option value=1> Enable All</option>
                  </select>
            </div>
            <div class="col-md-5">
                    <input type='submit' class="btn btn-success" Value='Enable/Disable All'>
            </div>

          </div>
<?php echo form_close();?>   
                  
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="row">
              <div class="col-lg-12">
                <div class="widget-container fluid-height">
                  <div class="heading">
                    <i class="fa fa-spinner"></i>Enable/Disable All countries in Customer Register form
                  </div>
                  <div class="widget-content padded">
<?php echo form_open('Siteconfigs/customer_allcountries');?>

          <div class="form-group">
            <div class="col-md-7">
                  <select name='customer_enable' class="form-control" >
                   <option value=""> Choose Option</option>
                   <option value=0> Disable ALL</option>
                   <option value=1> Enable All</option>
                  </select>
            </div>
            <div class="col-md-5">
                    <input type='submit' class="btn btn-success" Value='Enable/Disable All'>
            </div>

          </div>


<?php echo form_close();?>
                    
                   
                  </div>
                </div>
              </div>
            </div>
          </div>

          <hr/>
          --
          <div class="col-md-12">
            <div class="row">
              <div class="col-lg-12">
                <div class="widget-container fluid-height">
                  <div class="widget-content padded">
<table class="table table-bordered table-striped" id="dataTable1">
<thead>
<th>ID</th>
<th>Country Name</th>
<th>Phonecode</th>
<th>Currency Name</th>
<th>CurrencyCode</th>
<th>Currency Exchange</th>
<th>Customer Enabled</th>
<th>Writer Enabled</th>
<th>Accepted Currency</th>


</thead>

                   <tbody>
                   <?php foreach ($countries as $countries): ?>
                   <tr>
                    <td><?php echo $countries['id'];?></td>
                    <td><?php echo $countries['CountryName'];?></td>
                    <td><?php echo $countries['Phonecode'];?></td>
                    <td><?php echo $countries['CurrencyName'];?></td>
                    <td><?php echo $countries['countryCode'];?></td>
                    <td><?php echo $countries['currencyxchange'];?></td>
                    <td>
                      
                    <?php if($countries['customer_enable'] == 0){ ?>
                    <?php echo form_open('Siteconfigs/enable_country_customer/'.$countries['id'], array('class'=>'country_enable'));?>
<input type="hidden" name="id" value="<?php echo $countries['id'];?>">
<input type="hidden" name="customer_enable" value=1>
<input type='submit' class="btn btn-success" Value='Enable'>
<?php echo form_close();?> 
                    <?php }?>


                    <?php if($countries['customer_enable'] == 1){ ?>
                    <?php echo form_open('Siteconfigs/enable_country_customer/'.$countries['id'], array('class'=>'country_enable'));?>
<input type="hidden" name="id" value="<?php echo $countries['id'];?>">
<input type="hidden" name="customer_enable" value=0>
<input type='submit' class="btn btn-danger" Value='Disable'>
<?php echo form_close();?> 
                    <?php }?>   


                    </td>
                    <td>
                      
                    <?php if($countries['writer_enable'] == 0){ ?>
                    <?php echo form_open('Siteconfigs/enable_country_writer/'.$countries['id'], array('class'=>'enable_country'));?>
<input type="hidden" name="id" value="<?php echo $countries['id'];?>">
<input type="hidden" name="writer_enable" value=1>
<input type='submit' class="btn btn-success" Value='Enable'>
<?php echo form_close();?> 
                    <?php }?>


                    <?php if($countries['writer_enable'] == 1){ ?>
                    <?php echo form_open('Siteconfigs/enable_country_writer/'.$countries['id'], array('class'=>'enable_country'));?>
<input type="hidden" name="id" value="<?php echo $countries['id'];?>">
<input type="hidden" name="writer_enable" value=0>
<input type='submit' class="btn btn-danger" Value='Disable'>
<?php echo form_close();?> 
                    <?php }?>   

                    </td>
                    <td>




                    <?php if($countries['accepted_currency'] == 0){ ?>
                    <?php echo form_open('Siteconfigs/enable_currency/'.$countries['id'], array('class'=>'enable_country'));?>
<input type="hidden" name="id" value="<?php echo $countries['id'];?>">
<input type="hidden" name="accepted_currency" value=1>
<input type='submit' class="btn btn-success" Value='Enable'>
<?php echo form_close();?> 
                    <?php }?>


                    <?php if($countries['accepted_currency'] == 1){ ?>
                    <?php echo form_open('Siteconfigs/enable_currency/'.$countries['id'], array('class'=>'enable_country'));?>
<input type="hidden" name="id" value="<?php echo $countries['id'];?>">
<input type="hidden" name="accepted_currency" value=0>
<input type='submit' class="btn btn-danger" Value='Disable'>
<?php echo form_close();?> 
                    <?php }?> 





                    </td>
                  </tr>
                                    
                  <?php endforeach; ?>  
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
      </div>
    </div>
    <!-- Footer -->
    <!-- Javascripts --><!-- 
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script> -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="http://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
  </body>
</html>
