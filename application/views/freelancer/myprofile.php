<style>
    .checkbox-inline {
      word-break: break-all;
    }
    .fre-authen-register {
      width: 75%;
    }
    .cus_ch{
      min-height: 100px;
      max-height: 100px;
      font-size: 14px;
      padding: 5px;
      border: 1px solid #ccc;
      text-align: center;
      margin: 0
    }
    .cus_ch input[type="checkbox"] {
      width: 100%;
    }
    .checkboxarea{
      height: 300px;
      overflow-y: scroll;
      padding: 0 15px 0 15px;
    }
</style>         


         <div class="col-md-8">
            <div class="orders-profile loggedin ">
               <div class="row">
                  <div class="col-sm-12">
                     <h3>Пользователь: <?php echo $firstname; ?>  <?php echo $lastname; ?> (Ваш id: <?php echo $writer_id;?>)</h3>
                 <hr>
                     <p>Предметы: <?php echo $subject; ?></p>
                  </div>
               </div>
               <hr/>
               <div class="bio-info">
                <h5>Основная информация: </h5>
                  <p><?php echo $text; ?></p>
               </div>
               <hr/>
               <div class="with-nav-tabs panel-default">
                  <div class="panl-heading" id="myTab">
                     <ul class="nav nav-tabs nav-justified">
                        <!-- <li class="active"><a href="#profilephoto" data-toggle="tab">Фото профиля</a></li> -->
                        <!-- <li><a href="#editprofile" data-toggle="tab">Изменить профиль</a></li> -->
                        <!-- <li><a href="#deactivate" data-toggle="tab">Сменить статус</a></li> -->
                     </ul>
                  </div>
                  <div class="panel-body">
                     <div class="tab-content">
<!--                         <div class="tab-pane fade " id="profilephoto">
                           <div class="alert alert-info">
                              <?php // echo form_open_multipart('upload/do_upload');?>
                              <input type="file" name="userfile" size="20" /><br/>
                              <p> Вы можете загрузить .jpg, .gif, .png, .jpeg файл, но не больше 50kb</p>
                              <input type="hidden" name="writer_id" value="<?php // echo $writer_id; ?>" size="20" />
                              <input class="btn btn-primary" type="submit" value="загрузить" />
                              </form>
                              <?php // echo form_close();?>  
                           </div>
                        </div> -->
                        <div class="tab-pane fade in active" id="editprofile">
                          <h4 class="text-center">Изменить профиль</h4>
                           <div class='jsError'></div>
                           <?php echo form_open('writersed/profuseredit', array('class'=>'jsform'));?>
                         
                           <div class="form-group">
                              <label class="control-label col-sm-2" for="email">Имя</label>
                              <div class="col-sm-10">
                                 <input type="input" class="form-control" name="firstname" value = "<?php echo $firstname; ?>"/>
                              </div>
                             
                           </div>
                           <div class="form-group">
                              <label class="control-label col-sm-2" for="email">Фамилия</label>
                              <div class="col-sm-10">
                                 <input type="input" class="form-control" name="lastname" value = "<?php echo $lastname; ?>" />
                              </div>
                             
                           </div>
                           <!--<div class="form-group">
                              <label class="control-label col-sm-2" for="email">City</label>
                              <div class="col-sm-10">
                                 <input type="input" class="form-control" name="city" value = "<?php // echo $city; ?>"/>
                              </div>
                           </div>-->
                           <div class="form-group">
                              <label class="control-label col-sm-2" for="email">Телефон</label>
                              <div class="col-sm-10">
                                 <input type="input" class="form-control" name="primaryphone" value = "<?php echo $primaryphone; ?>"/>
                              </div>
                              <br/><br/>
                           </div>
                           <div class="form-group">
                              <label class="control-label col-sm-2" for="email">Информация:</label>
                              <div class="col-sm-10">
                                 <textarea name="text"><?php echo $text; ?></textarea>
                              </div>
                             
                           </div>
                           <div class="form-group">
                              <label class="control-label col-sm-2" for="email">Email</label>
                              <div class="col-sm-10">
                                 <input type="input" class="form-control" name="email" value = "<?php echo $email; ?>"/>
                              </div>

                              <div class="form-group">
                              <label class="control-label col-sm-2" for="email">Номер счета</label>
                              <div class="col-sm-10">
                                 <input type="input" class="form-control" name="nativelanguage" value = "<?php echo $nativelanguage; ?>"/>
                              </div>
                              </div>


    <div class=" h3 text-center control-label col-sm-12">Выбор предмета</div>
    <div class="fre-input-field">

<!--                      <pre>
                       <?php // print_r(explode(', ', $subject))?>
                     </pre>
 -->
<div class="fre-input-field">
      <div class="checkboxarea clearfix">
<!--         <pre>
          <?php // print_r(explode(', ', $subject)); ?>
        </pre> -->
        <?php foreach ($gas_my as $subject1) { ?>
                  
          <label for="sbj-<?php echo $subject1['id']; ?>" class="cus_ch col-sm-4">
            <input <?php if(in_array( $subject1['subject'], explode(', ', $subject))){echo 'checked';} ?> name="gas_my[]" id="sbj-<?php echo $subject1['id']; ?>" type="checkbox" value="<?php echo $subject1['subject']; ?>" /><?php echo $subject1['subject']; ?>
          </label>
        <?php } ?> 
      </div>
    </div>
  
    </div>
  
    </div>
        

               <p><input type='hidden' name='writer_id' value="<?php echo $writer_id; ?>"></p>
               <p><input class="btn btn-warning btn-xlg fullwidth" type='submit' onclick="alert('Вы успешно изменили свой профиль')" Value='Изменить профиль'></p>
               <?php echo form_close();?>                        
        </div>

      <!--   <div class="tab-pane fade" id="deactivate">
        <div class='request_order alert alert-success'>
         <?php echo form_open('writersed/mystatus_change');?>
         <div class='jsError'></div>
         <p> Если вы отключите свою учетную запись, вы не сможете получать новые уведомления о заказе, и вам не будет назначен какой-либо заказ</p>
         <h2> Текущий профиль: 

<?php $mystatus = $profile['mystatus'];

if ($mystatus == 0) {
    echo "Активный";
} else {
    echo "Неактивный";
}
?> 

 </h2>
                    <p><input type='hidden' name='writer_id' value="<?=$this->session->userdata('writer_id')?>"></p>
                    <p><input type='hidden' name='email' value="<?php echo $profile['email']; ?>"></p>
                    <p><input type='hidden' name='firstname' value="<?php echo $profile['firstname']; ?>"></p> -->


    <!-- <div class="form-group">
      <label class="control-label col-sm-3 text-right" for="pwd">Сменить статус профиля</label>
      <div class="col-sm-9">          
                  <select name='mystatus' class="form-control"  >
                   <option value=""> Выбрать (Активный/неактивный)</option>
                   <option value="0"> Активный профиль</option>
                   <option value="1"> Неактивный профиль</option>
                  </select><br />

      </div><br/>
    </div> 


                    <p> <input type='submit' class="btn btn-info" Value='Сменить статус'> </p>
                  <?php echo form_close();?>  -->
        </div>

                        </div>



                     </div>
                  </div>
               </div>
            </div>
         </div>

      <!-- </div>
</div>
</div>
</div> -->
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
   // $(document).ready(function() {
   //     $('form.jsform').on('submit',
   //       function(form){
   //         form.preventDefault();
   //         $.post('<?php // echo ci_site_url(); ?>writersed/profuseredit', $('form.jsform').serialize(), function(data){
   //           $('div.jsError').html(data);
   //           $('div.show').show();
   //           $('div.show').hide();
   //           location.reload();
   //         });
   //         });
   
   // });
</script> 
<script>
   $(document).ready(function() {
       $('form.fileupload').on('submit',
         function(form){
           form.preventDefault();
           $.post('<?php echo ci_site_url(); ?>upload/do_upload', $('form.fileupload').serialize(), function(data){
             $('div.jsError').html(data);
             $('div.show').show();
             $('div.show').hide();
             location.reload();
           });
           });
   
   });
</script>

