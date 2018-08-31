         <div class="col-md-8">
            <div class="orders-profile loggedin ">
               <div class="row">
                  <div class="ititle">
                     <h4>Мой профиль: #ID: <?php echo $writer_id; ?> </h4>
                  </div>
                  <hr/>
                  <div class="col-sm-4">

<?php if(!empty($profile_img)): ?>
 <!-- <img class="img-responsive" src="<?=base_url()?><?php echo $uploads; ?>/profiles/<?php echo $writer_id; ?>/<?php echo $profile_img; ?>" alt="image" /> -->
 <img class="img-responsive" src="<?=base_url()?><?php echo $this->config->item('uploads'); ?>/profiles/<?php echo $writer_id; ?>/<?php echo $this->session->userdata('profile_img'); ?>" alt="image" />
<?php endif; ?>
<?php if(empty($profile_img)): ?>
<img class="img-responsive" src="<?=base_url()?>asset/img/profile.png" alt="image2" />
<?php endif; ?>


                  </div>
                  <div class="col-sm-8">
                     <h3><?php echo $firstname; ?> <?php echo $lastname; ?></h3>
                     <!--<p>Location: <?php echo $city; ?>, <?php echo $country; ?></p>-->
                  </div>
               </div>
               <hr/>

               <div class="with-nav-tabs panel-default">
                  <div class="panl-heading" id="myTab">
                     <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#profilephoto" data-toggle="tab">Фото профиля</a></li>
                        <li><a href="#editprofile" data-toggle="tab">Изменить профиль</a></li>
                     </ul>
                  </div>
                  <div class="panel-body">
                     <div class="tab-content">
                        <div class="tab-pane fade in active" id="profilephoto">
                           <div class="alert alert-info">
                              <?php echo form_open_multipart('upload/do_upload');?>
                              <input type="file" name="userfile" size="20" /><br/>
                              <p> Вы можете загрузить .jpg, .gif, .png, .jpeg файлы, не больше 50kb</p>
                              <input type="hidden" name="writer_id" value="<?php echo $writer_id; ?>" size="20" />
                              <input class="btn btn-primary" type="submit" value="Загрузить" />
                              </form>
                              <?php echo form_close();?>  
                           </div>
                        </div>
                        <div class="tab-pane fade" id="editprofile">
                           <div class='jsError'></div>
                           <?php echo form_open('writersed/profuseredit');?>

                            <div class="form-group">
                              <label class="control-label col-sm-2" for="email">Имя</label>
                              <div class="col-sm-10">
                            <input type="input" class="form-control" name="firstname" value = "<?php echo $firstname.' '.$lastname; ?>" readonly/>
                              </div>
                             
                           </div>
                            <!--<div class="form-group">
                             <label class="control-label col-sm-2" for="email">City</label>
                              <div class="col-sm-10">
                                 <input type="input" class="form-control" name="city" value = "<?php echo $city; ?>"/>
                              </div>
                              
                           </div>-->
                           <div class="form-group">
                              <label class="control-label col-sm-2" for="email">Телефон</label>
                              <div class="col-sm-10">
                                 <input type="input" class="form-control" name="primaryphone" value = "<?php echo $primaryphone; ?>"/>
                              </div>
                             
                           </div>

                           <div class="form-group">
                              <label class="control-label col-sm-2" for="email">Email</label>
                              <div class="col-sm-10">
                                 <input type="input" class="form-control" name="email" value = "<?php echo $email; ?>"/>
                              </div>
                            
                           </div>
                           <p><input type='hidden' name='writer_id' value="<?php echo $writer_id; ?>"></p>
                           <p><input class="btn btn-warning btn-xlg fullwidth" type='submit' Value='Обновить профиль'></p>
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
<!--/ work-shop-->
<script>
   $('#myTab a').click(function(e) {
     e.preventDefault();
     $(this).tab('show');
   });
   
   // store the currently selected tab in the hash value
   $("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
     var id = $(e.target).attr("href").substr(1);
     window.location.hash = id;
   });
   
   // on load of the page: switch to the currently selected tab
   var hash = window.location.hash;
   $('#myTab a[href="' + hash + '"]').tab('show');
</script>
<script>
   $(document).ready(function() {
       $('form.jsform').on('submit',
         function(form){
           form.preventDefault();
           $.post('<?php echo ci_site_url(); ?>writersed/profuseredit', $('form.jsform').serialize(), function(data){
             $('div.jsError').html(data);
             $('div.show').show();
             $('div.show').hide();
             location.reload();
           });
           });
   
   });
</script>
