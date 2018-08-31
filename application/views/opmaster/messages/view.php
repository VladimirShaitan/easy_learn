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
                  Все заказы
                </small>
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

 <div class='jsError'></div>
<div class="col-sm-12">  
<?php foreach ($messages as $messages): ?>
<h3>Message |  <?php echo $messages['msg_title']; ?></h3>


                        <ul class="media-list">
                           <li class="media media-replied">
                              <div class="pull-left pfotimg">
                                 <img class="profile-fot0" src="<?php echo base_url()?>assets/images/placeholder.jpg" alt="image" />
                              </div>
                              <div class="media-body">
                                 <div class="well well-lg">
                                    <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span> <?php echo $messages['sender_name']; ?></h4>
                                    <ul class="media-date text-uppercase reviews list-inline">
                                       <p>Date Posted: <?php echo $messages['msg_date']; ?> </p>
                                    </ul>
                                    <p class="media-comment">
                                       <?php echo $messages['msg_body']; ?>
                                    </p>
                                 </div>
                              </div>
                           </li>
                        </ul>
 <?php endforeach; ?>
<hr/>
<h4>Ответ</h4>
<hr/>

<?php foreach ($replies as $replies): ?>


                        <ul class="media-list">
                           <li class="media media-replied">
                              <div class="pull-left pfotimg">
                                 <img class="profile-foto" src="<?php echo base_url()?>assets/images/placeholder.jpg" alt="image" />
                              </div>
                              <div class="media-body">
                                 <div class="well well-lg">
                                    <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span> <?php echo $replies['senderid']; ?></h4>
                                    <ul class="media-date text-uppercase reviews list-inline">
                                       <p>Дата Отправки: <?php echo $replies['msg_date']; ?> </p>
                                    </ul>
                                    <p class="media-comment">
                                       <?php echo $replies['msg_body']; ?>
                                    </p>
                                 </div>
                              </div>
                           </li>
                        </ul>
 <?php endforeach; ?>


<p>Reply</p>

                        <?php echo form_open('Messages/message_submit', array('class'=>'jsform'));?>
                        <div class='jsError'></div>

        <div class="form-group">
      <label class="control-label col-sm-2" for="email">Reply</label>
      <div class="col-sm-10">
        <textarea class="form-control" rows="5" name="msg_body"></textarea>
      </div><br/><br/>
    </div><br/>
    <input type='hidden' class="form-control" name='receiverid' value="<?php echo $messages['receiverid']; ?>" readonly>
    <input type='hidden' class="form-control" name='msg_title' value="<?php echo $messages['msg_title']; ?>" readonly>
    <input type='hidden' class="form-control" name='msg_id' value="<?php echo $messages['msg_id']; ?>" readonly>
<input type='hidden' class="form-control" name='receiver_name' value="<?php echo $messages['receiver_name']; ?>" readonly>
      <input type="hidden" class="form-control" name='senderid' value = "<?php echo $this->session->userdata('writer_id')?>" readonly/>
<input type="hidden" class="form-control" name='sender_name' value = "<?php echo $this->session->userdata('firstname')?> <?php echo $this->session->userdata('lastname')?>" readonly />
 
                           <button class="btn btn-success btn-circle text-uppercase" type="submit" id="submitComment"><span class="glyphicon glyphicon-send"></span> Сообщение</button>
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
           $.post('<?php echo site_url(); ?>/Messages/message_reply', $('form.jsform').serialize(), function(data){
             $('div.jsError').html(data);
             $('div.show').show();
             $('div.show').hide();
           });
           });
   
   });
</script>



