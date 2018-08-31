        <div class='panel panel-default col-lg-9'>
          <div class='panel-heading'>
            <i class='fa fa-cog fa fa-large'></i>
           Настройки конфигурации
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
                                <?php foreach ($smtp_configs as $smtp_configs): ?>
            <div class="row">
              <div class="col-lg-12">

                <div class="widget-container fluid-height">
                  <div class="heading tabs">
                    <i class="fa fa-sitemap"></i>Настройки  <?php echo $smtp_configs['id'];?> 
                    <ul class="nav nav-tabs pull-right" data-tabs="tabs" id="tabs">
                      <li class="active">
                        <a data-toggle="tab" href="#Smtp<?php echo $smtp_configs['id'];?>"><i class="fa fa-comments"></i><span> Настройки</span></a>
                      </li>
                      <li>
                        <a data-toggle="tab" href="#Smtpedit<?php echo $smtp_configs['id'];?>"><i class="fa fa-user"></i><span> Изменить настройки</span></a>
                      </li>

                    </ul>
                  </div>
              
                  <div class="tab-content padded col-md-12 main" id="my-tab-content">
                    <div class="tab-pane active" id="Smtp<?php echo $smtp_configs['id'];?>">

<table class="table">

                   <tbody>
                   
                   <tr>
                    <td>smtp host</td>
                    <td><?php echo $smtp_configs['smtp_host'];?></td>
                  </tr>                  
                   <tr>
                    <td>Sender User</td>
                    <td><?php echo $smtp_configs['smtp_user'];?></td>
                  </tr>
                  <tr>
                    <td>Sender Name</td>
                    <td><?php echo $smtp_configs['smtp_name'];?></td>
                  </tr> 
                 <tr>
                    <td>Email Password</td>
                    <td><?php echo $smtp_configs['smtp_pass'];?></td>
                  </tr>                   
                  <tr>
                    <td>Smtp Port</td>
                    <td><?php echo $smtp_configs['smtp_port'];?></td>
                  </tr>                   
                   <tr>
                    <td>Protocol</td>
                    <td><?php echo $smtp_configs['protocol'];?></td>
                  </tr>                     
                  <tr>
                    <td>Admin email</td>
                    <td><?php echo $smtp_configs['admin_email'];?></td>
                  </tr>                      
                   
                  </tbody>
                </table> 
                      
                    </div>
                    <div class="tab-pane" id="Smtpedit<?php echo $smtp_configs['id'];?>">

          <?php echo form_open('Siteconfigs/edit_smtp_configs'.'/'.$smtp_configs['id']);?>

<div class="form-group">
<label class="col-sm-3 control-label text-right text-right"> Smtp host  </label>
<div class="col-sm-7">
<input class="form-control" value="<?php echo $smtp_configs['smtp_host'];?>"   name='smtp_host' type="text">
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label text-right "> Sender User  </label>
<div class="col-sm-7">
<input class="form-control" value="<?php echo $smtp_configs['smtp_user'];?>"   name='smtp_user' type="text">
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label text-right"> Sender Name</label>
<div class="col-sm-7">
<input class="form-control" name='smtp_name' placeholder="smtp_password" type="text" value="<?php echo $smtp_configs['smtp_name'];?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label text-right"> Smtp password </label>
<div class="col-sm-7">
<input class="form-control" name='smtp_pass' placeholder="smtp_pass" type="text" value="<?php echo $smtp_configs['smtp_pass'];?>">
</div>
</div>


<div class="form-group">
<label class="col-sm-3 control-label text-right"> Smtp port</label>
<div class="col-sm-7">
<input class="form-control" name='smtp_port' placeholder="smtp_port" type="text" value="<?php echo $smtp_configs['smtp_port'];?>">
</div>
</div>


<div class="form-group">
<label class="col-sm-3 control-label text-right"> protocol </label>
<div class="col-sm-7">
<input class="form-control" name='protocol' placeholder="protocol" type="text" value="<?php echo $smtp_configs['protocol'];?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label text-right"> Admin email </label>
<div class="col-sm-7">
<input class="form-control" name='admin_email' placeholder="admin_email" type="text" value="<?php echo $smtp_configs['admin_email'];?>">

</div>
</div>
          <div class="form-group">
            <label class="control-label col-md-3"></label>
            <div class="col-md-7">
              <input class="form-control" type='submit' Value='Edit Configurations'>
            </div>
          </div>




           <?php echo form_close();?>
                      
                    </div>

                  </div>



                </div>


              </div>
            </div>
<?php endforeach; ?> 

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


