      <div id='content'>
        <div class='panel panel-default'>
          <div class='panel-heading'>
            <i class='fa fa-beer fa fa-large'></i>
            <!-- Запросы заказов -->
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
                Orders
                <small>
                  <i class="ace-icon fa fa-angle-double-right"></i>
                  All Orders
                </small>
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

 <div class='jsError'></div>
<div class="col-sm-6">  
<h4> Message Writers </h4>

                        <?php echo form_open('Messages/message_submit', array('class'=>'jsform'));?>
                        <div class='jsError'></div>

         <div class="form-group">
      <label class="control-label col-sm-2" for="email">Reciever ID</label>
      <div class="col-sm-10">
            <select name='receiverid' type='hidden'  class="form-control"  >
                     <?php foreach ($writers as $writers) { ?>
               <option type='hidden' class="form-control" value="<?php echo $writers['writer_id']; ?>">
                 <?php echo $writers['writer_id']; ?>  <?php echo $writers['firstname']; ?> <?php echo $writers['lastname']; ?>  |<?php echo $writers['writer_status']; ?>|
               </option>
               <?php } 
                  ?>
            </select>
      </div><br/><br/>
    </div>

        <div class="form-group">
      <label class="control-label col-sm-2" for="email">Message Title</label>
      <div class="col-sm-10">
       <input type='input'  class="form-control" name='msg_title' value="">
      </div><br/><br/>
    </div>


        <div class="form-group">
      <label class="control-label col-sm-2" for="email">Message</label>
      <div class="col-sm-10">
        <textarea class="form-control" rows="5" name="msg_body"></textarea>
      </div><br/><br/>
    </div><br/>
      <input type="hidden" class="form-control" name='senderid' value = "<?php echo $this->session->userdata('writer_id')?>" />
<input type="hidden" class="form-control" name='sender_name' value = "<?php echo $this->session->userdata('firstname')?> <?php echo $this->session->userdata('lastname')?>" />
 
                           <button class="btn btn-success btn-circle text-uppercase" type="submit" id="submitComment"><span class="glyphicon glyphicon-send"></span> Post Message</button>
                        <?php echo form_close();?>  
</div>




<div class="col-sm-6">  
<h4> Message Clients </h4>


                        <?php echo form_open('Messages/message_submit', array('class'=>'cjsform'));?>
                        

         <div class="form-group">
      <label class="control-label col-sm-2" for="email">Reciever ID</label>
      <div class="col-sm-10">
            <select name='receiverid' type='hidden'  class="form-control"  >
                     <?php foreach ($clients as $clients) { ?>
               <option type='hidden' class="form-control" value="<?php echo $clients['writer_id']; ?>">
                 <?php echo $clients['writer_id']; ?>  <?php echo $clients['firstname']; ?> <?php echo $clients['lastname']; ?>  |<?php echo $clients['writer_status']; ?>|
               </option>
               <?php } 
                  ?>
            </select>
      </div><br/><br/>
    </div>

        <div class="form-group">
      <label class="control-label col-sm-2" for="email">Message Title</label>
      <div class="col-sm-10">
       <input type='input'  class="form-control" name='msg_title' value="">
      </div><br/><br/>
    </div>


        <div class="form-group">
      <label class="control-label col-sm-2" for="email">Message</label>
      <div class="col-sm-10">
        <textarea class="form-control" rows="5" name="msg_body"></textarea>
      </div><br/><br/>
    </div><br/>
      <input type="hidden" class="form-control" name='senderid' value = "<?php echo $this->session->userdata('writer_id')?>" />
<input type="hidden" class="form-control" name='sender_name' value = "<?php echo $this->session->userdata('firstname')?> <?php echo $this->session->userdata('lastname')?>" />
 
                           <button class="btn btn-success btn-circle text-uppercase" type="submit" id="submitComment"><span class="glyphicon glyphicon-send"></span> Post Message</button>
                        <?php echo form_close();?>  

</div> 





                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->



<script>
   $(document).ready(function() {
       $('form.jsform').on('submit',
         function(form){
           form.preventDefault();
           $.post('<?php echo site_url(); ?>/Opmessages/message_submit', $('form.jsform').serialize(), function(data){
             $('div.jsError').html(data);
             $('div.show').show();
             $('div.show').hide();
           });
           });
   
   });
</script>


<script>
   $(document).ready(function() {
       $('form.cjsform').on('submit',
         function(form){
           form.preventDefault();
           $.post('<?php echo site_url(); ?>/Opmessages/message_submit', $('form.cjsform').serialize(), function(data){
             $('div.jsError').html(data);
             $('div.show').show();
             $('div.show').hide();
           });
           });
   
   });
</script>