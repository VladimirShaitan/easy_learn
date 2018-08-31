          <div class="col-md-10">
            <div class="widget-container fluid-height">
              <div class="widget-content padded">
<hr/>

             <div class="heading">
               <ul class="nav nav-pills pull-left"> <h3> </h3></ul>
                  <ul class="nav nav-pills pull-right">
                     <li class="active"><a href="#details" data-toggle="tab">Отправить email</a></li>
                     <?php if($this->session->userdata('admin_level') === 'super') { ?>
                      <li><a href="#edit" data-toggle="tab">Изменить email</a></li>
                    <?php } ?>
                  </ul>
              </div>
              <div class="widget-content padded main">
                  <div class="tab-content">
                     <div class="tab-pane fade active in main" id="details">

<?php echo form_open_multipart('adminmsg/mailto_clients'); ?>

                                <form class="form-horizontal">

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <select name='emailee' class="form-control" required>
                                                <option value=""> Выбрать </option>
                                                    <option value="all"> Все заказчики </option>
                                                    <?php foreach ($writers as $writers) { ?>
                                                    <option value="<?php echo $writers['email']; ?>">
                                                  
                                                        <?php echo $writers[ 'firstname']; ?>
                                                        <?php echo $writers[ 'lastname']; ?> (<?php echo $writers[ 'email']; ?>)
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <!-- /controls -->
                                        </div>
                                        <!-- /form-group -->

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="text" required class="form-control" id="firstname" name="emailheader" placeholder="Заголовок письма">
                                            </div>
                                            <!-- /controls -->
                                        </div>
                                        <!-- /form-group -->

                                        <div class="form-group">
                                       
                                   <div class="col-md-12">
               <textarea class="ckeditor form-control" required  name="message"></textarea>
                                            </div>
                                            <!-- /controls -->
                                        </div>
                                        <!-- /form-group -->

                                       <div class="form-group">
                                          
                                         <div class="col-md-12">
                                             <input type="submit" class="btn btn-info fullwidth" name="submit" value="Отправить" />
                                             </div>
                                        </div>
                                        <!-- /form-actions -->

                                </form>
 <?php echo form_close();?> 


                   </div>
 <?php if($this->session->userdata('admin_level') === 'super') { ?>
                     <div class="tab-pane fade" id="edit">
                  <?php echo form_open('Siteconfigs/editmail_toclient');?>
   <div class="col-md-12">
         <textarea class="ckeditor form-control" name="msg_body_client"><?php echo str_replace('\"','"',$msg_body_client);?></textarea>
         <input type="hidden" class="form-control" name="msg_id" value = "<?php echo $msg_id;?>"/>


                  <div class="form-group">
            <label class="control-label col-md-1"></label>
            <div class="col-md-11">
              <input class="form-control btn btn-danger"  type='submit' Value='редактировать Email'>
            </div>
          </div>
</div>
                  <?php echo form_close();?>

                     </div>
<?php } ?>

                 </div>

              </div>


 





              </div>
            </div>
          </div>
 </div>
        </div>
      </div>
    </div>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="https://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>

  </body>
</html>
