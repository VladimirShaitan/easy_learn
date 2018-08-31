      <div id='content'>
        <div class='panel panel-default'>
          <div class='panel-heading'>
            <i class='fa fa-beer fa fa-large'></i>
            Hierapolis Rocks!
            <div class='panel-tools'>
              <div class='btn-group'>
                <a class='btn' href='#'>
                  <i class='icon-refresh'></i>
                  <!-- Refresh statics -->
                </a>
                <a class='btn' data-toggle='toolbar-tooltip' href='#' title='Toggle'>
                  <i class='icon-chevron-down'></i>
                </a>
              </div>
            </div>
          </div>
          <div class='panel-body'>
<div class="page-content">
            <div class="ace-settings-container" id="ace-settings-container">
              <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                <i class="ace-icon fa fa-cog bigger-130"></i>
              </div>

              <div class="ace-settings-box clearfix" id="ace-settings-box">
                <div class="pull-left width-50">
                  <div class="ace-settings-item">
                    <div class="pull-left">
                      <select id="skin-colorpicker" class="hide">
                        <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                        <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                        <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                        <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                      </select>
                    </div>
                    <span>&nbsp; Choose Skin</span>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
                    <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
                    <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
                    <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
                    <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
                    <label class="lbl" for="ace-settings-add-container">
                      Inside
                      <b>.container</b>
                    </label>
                  </div>
                </div><!-- /.pull-left -->

                <div class="pull-left width-50">
                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
                    <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
                    <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
                    <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                  </div>
                </div><!-- /.pull-left -->
              </div><!-- /.ace-settings-box -->
            </div><!-- /.ace-settings-container -->

            <div class="page-header">
              <h1>
                Заказы
                <small>
                  <i class="ace-icon fa fa-angle-double-right"></i>
                  Вск заказы
                </small>
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

<div class="col-sm-12">  
<div class='jsError'></div>

<h3>Сообщение менеджеру [<?php echo $msg_config['msg_id'];?>] </h3>

   <div class="tabbable">

      <div class="tab-content">
<?php echo form_open('Siteconfigs/editmsg_toadmin', array('class'=>'editmsg_toadmin'));?>
                  <div class='jsError'></div>  
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Письмо</label>
      <div class="col-sm-10">
      <input type="hidden" class="form-control" name="msg_id" value = "<?php echo $msg_config['msg_id'];?>"/>
        <textarea class="form-control"  name="msg_body_admin"><?php echo $msg_config['msg_body_admin'];?></textarea><br/>
      </div><br/><br/>
    </div>

                    <p><input class="btn btn-danger"  type='submit' Value='редактировать Email'></p>
                    <br/><hr/>
                  <?php echo form_close();?>
         </div>
      </div>
   </div>

   <h3>Message to customer [<?php echo $msg_config['msg_id'];?>] </h3>

   <div class="tabbable">

      <div class="tab-content">
         <div id="msg_toclient" class="tab-pane fade active in">

                  <?php echo form_open('Siteconfigs/editmsg_toclient', array('class'=>'editmsg_toclient'));?>
                  <div class='jsError'></div>    
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Message Body</label>
      <div class="col-sm-10">
        <textarea class="form-control"  name="msg_body_client"><?php echo $msg_config['msg_body_client'];?></textarea><br/>
         <input type="hidden" class="form-control" name="msg_id" value = "<?php echo $msg_config['msg_id'];?>"/>
      </div><br/><br/>
    </div>

                    <p><input class="btn btn-danger"  type='submit' Value='Сохранить'></p>
                    <br/><hr/>
                  <?php echo form_close();?>

         </div>
      </div>
   </div>






   <h3>Message to Writer [<?php echo $msg_config['msg_id'];?>] </h3>
   <div class="tabbable">

      <div class="tab-content">
         <div id="msg_towriter" class="tab-pane fade active in">
<?php echo form_open('Siteconfigs/editmsg_towriter', array('class'=>'editmsg_towriter'));?>
                  <div class='jsError'></div>

    
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Message Body</label>
      <div class="col-sm-10">
              <input type="hidden" class="form-control" name="msg_id" value = "<?php echo $msg_config['msg_id'];?>"/>
        <textarea class="form-control"  name="msg_body_writer"><?php echo $msg_config['msg_body_writer'];?></textarea><br/>
      </div><br/><br/>
    </div>

                    <p><input class="btn btn-danger"  type='submit' Value='Сохранить'></p>
                    <br/><hr/>
                  <?php echo form_close();?>

         </div>

      </div>
   </div>



</div>






                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->


<script>

$(document).ready(function() {
    $('form.editmsg_toadmin').on('submit',
      function(form){
        form.preventDefault();
        $.post('<?php echo site_url(); ?>/Siteconfigs/editmsg_toadmin', $('form.editmsg_toadmin').serialize(), function(data){
          $('div.jsError').html(data);
          $('div.show').show();
          $('div.show').hide();
           location.reload();
        });
        });

});
</script>



<script>

$(document).ready(function() {
    $('form.editmsg_toclient').on('submit',
      function(form){
        form.preventDefault();
        $.post('<?php echo site_url(); ?>/Siteconfigs/editmsg_toclient', $('form.editmsg_toclient').serialize(), function(data){
          $('div.jsError').html(data);
          $('div.show').show();
          $('div.show').hide();
           location.reload();
        });
        });

});
</script>



<script>

$(document).ready(function() {
    $('form.editmsg_towriter').on('submit',
      function(form){
        form.preventDefault();
        $.post('<?php echo site_url(); ?>/Siteconfigs/editmsg_towriter', $('form.editmsg_towriter').serialize(), function(data){
          $('div.jsError').html(data);
          $('div.show').show();
          $('div.show').hide();
           location.reload();
        });
        });

});
</script>

