        <div class='panel panel-default col-lg-9'>
          <div class='panel-heading'>
            <i class='fa fa-user-circle-o fa fa-large'></i>
<?php echo $writer_id;?> || <?php echo $firstname;?> <?php echo $lastname;?>
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
          <!-- Weather -->
          <div class="col-md-3">
            <div class="widget-container fluid-height">
              <div class="widget-content padded">
               <div class="heading">

              </div>

          <!-- <div class="admin-profile-photo">      <img class="img-responsive" src="<?php echo base_url()?><?php echo $upload; ?>/profiles/<?php echo $writer_id; ?>/<?php echo $profile_img;?>" alt="image" /></div> 
                                 <hr/>

-->
              </div>
            </div>
          </div>
          <!-- end Weather --><!-- Bar Graph -->
          <div class="col-md-9">
            <div class="widget-container small">
              <div class="heading">
                

                  <ul class="nav nav-pills pull-right">
                     <li class="active"><a href="#tab1default" data-toggle="tab">Статус заказчика</a></li>
                     <li><a href="#tab2default" data-toggle="tab">Редактировать</a></li>
                     <li><a href="#tab3default" data-toggle="tab">Сменить пароль</a></li>
                  </ul>
               

              </div>
              <div class="widget-content padded main">
                 <div class="tab-content">
                     <div class="row tab-pane fade active in main" id="tab1default">
                 <p> Детали по заказчику </p>
                   <table class="table table-striped">
                   <tbody>

                   <tr>
                    <td class="text-right col-md-5">Имя:</td>
                    <td class="text-left"><?php echo $firstname;?></td>
                  </tr>
                   <tr>
                     <td class="text-right ">Фамилия:</td>
                    <td class="text-left "><?php echo $lastname;?></td>
                  </tr>
                  <tr>
                    <td class="text-right ">Email:</td>
                    <td class="text-left "><?php echo $email;?></td>
                  </tr>                  

                  <!-- <tr>
                    <td class="text-right">Academic level:</td>
                    <td class="text-left"><?php echo $academiclevel;?></td>
                  </tr>
                 <tr>
                    <td class="text-right">Gender:</td>
                    <td class="text-left"><?php echo $gender;?></td>
                  </tr>
                  <tr>
                    <td class="text-right">Country, City:</td>
                    <td class="text-left"><?php echo $country;?>, <?php echo $city;?></td>
                  </tr>-->
                  <tr>
                     <td class="text-right">Телефон:</td>
                    <td class="text-left"><?php echo $primaryphone;?></td>
                  </tr>
                   <!--<tr>
                    <td class="text-right">Native Language</td>
                    <td class="text-left"><?php echo $nativelanguage;?></td>
                  </tr>
                   <tr>
                    <td class="text-right">Proficient in (citation):</td>
                    <td class="text-left"><?php echo $citation;?> </td>
                  </tr>-->

                  </tbody>
                </table> 
                   </div>

                     <div class="row tab-pane fade" id="tab2default">
<?php echo validation_errors(); ?>
   <?php echo form_open('Adminclients/edit_client'); ?>

    <div class="form-group">
      <label class="control-label col-md-3 text-right" for="email">ID заказчика</label>
      <div class="col-md-7">
        <input type="text" name="writer_id" class="form-control" value="<?php echo $writer_id;?>" readonly>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 text-right" for="email">Имя</label>
      <div class="col-md-7">
        <input type="text" name="firstname" class="form-control" value="<?php echo $firstname;?>">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 text-right" for="email">Фамилия</label>
      <div class="col-md-7">
        <input type="text" name="lastname" class="form-control" value="<?php echo $lastname;?>">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 text-right" for="email">Email</label>
      <div class="col-md-7">
        <input type="text" name="email" class="form-control" value="<?php echo $email;?>">
      </div>
    </div>
<!--
        <div class="form-group">
      <label class="control-label col-md-3 text-right" for="gender">Gender</label>
      <div class="col-md-7">          
<select id='gender' name='gender'  class="form-control"  >
<option value="<?php echo $gender;?>">Current: <?php echo $gender;?> </option>
<option value="Male"> Male </option>
<option value="Female"> Female </option>
 </select>
      </div>
    </div>



    <div class="form-group">
      <label class="control-label col-md-3 text-right" for="email">Academic Level</label>
      <div class="col-md-7">
        <input type="text" name="academiclevel" class="form-control" value="<?php echo $academiclevel;?>">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 text-right" for="email">Телефон</label>
      <div class="col-md-7">
        <input type="text" name="primaryphone" class="form-control" value="<?php echo $primaryphone;?>">
      </div>
    </div>-->
<!--
    <div class="form-group">
      <label class="control-label col-md-3 text-right" for="email">country</label>
      <div class="col-md-7">
        <input type="text" name="country" class="form-control" value="<?php echo $country;?>">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 text-right" for="email">City</label>
      <div class="col-md-7">
        <input type="text" name="city" class="form-control" value="<?php echo $city;?>">
      </div>-->
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit"  class="btn btn-info fullwidth" name="submit" value="Редактировать" />
      </div>
    </div>  
<?php echo form_close();?> 
                     </div>

                     <div class="row tab-pane fade" id="tab3default">
<?php echo validation_errors(); ?>
   <?php echo form_open('Adminclients/edit_password_client'); ?>


    <div class="form-group">
      <label class="control-label col-md-3 text-right" for="email">Email(login)</label>
      <div class="col-sm-7">
        <input type="text" name="password" class="form-control" value="<?php echo $email;?>" readonly>
      </div>
    </div>    

    <div class="form-group">
      <label class="control-label col-md-3 text-right" for="email">Пароль</label>
      <div class="col-sm-7">
        <input type="text" name="password" class="form-control" value="">
      </div>
    </div>

<input type="hidden" name="writer_id" class="form-control" value="<?php echo $writer_id;?>" readonly>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit"  class="btn btn-info fullwidth" name="submit" value="Редактировать" />
      </div>
    </div>  
<?php echo form_close();?>

                     </div>


                  </div>

              </div>
 
            </div>

          </div>




          <!-- End Bar Graph -->
        </div>


        </div>
 </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <!-- Javascripts -->
<!--     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script> -->
<!--     <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="http://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script> -->
    <!-- Google Analytics -->
  </body>
</html>


            <script>
$(document).ready(function(){
    $('#myorders').dataTable();
});
</script>