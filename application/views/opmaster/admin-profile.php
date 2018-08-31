      <div id='content'>
        <div class='panel panel-default'>
          <div class='panel-heading'>
            <i class='fa fa-beer fa fa-large'></i>
            Профиль менеджера
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
          <div class="col-md-4">
            <div class="widget-container fluid-height">
              <div class="widget-content padded">

  <img class="span3" src="<?php echo base_url()?><?php echo $upload; ?>/profiles/<?php echo $writer_id; ?>/<?php echo $profile_img;?>" alt="image" />


              </div>
            </div>
          </div>
          <!-- end Weather --><!-- Bar Graph -->
          <div class="col-md-8">
            <div class="widget-container small">
              <div class="heading">
                

                  <ul class="nav nav-pills pull-right">
                     <li class="active"><a href="#tab1default" data-toggle="tab">Статус автора</a></li>
                     <li><a href="#tab2default" data-toggle="tab">Редактировать автора</a></li>
                     <li><a href="#tab3default" data-toggle="tab">Сменить пароль</a></li>
                  </ul>
               

              </div>
              <div class="widget-content padded main">




                  <div class="tab-content">
                     <div class="tab-pane fade active in main" id="tab1default">

                                 <table class="table table-striped">
                   <tbody>

                   <tr>
                    <td class="text-right">Имя:</td>
                    <td class="text-left"><?php echo $profile['firstname']; ?></td>
                  </tr>
                  <tr>
                    <td class="text-right">Фамилия:</td>
                    <td class="text-left"><?php echo $profile['lastname']; ?></td>
                  </tr>

                  <tr>
                    <td class="text-right">Email:</td>
                    <td class="text-left"><?php echo $profile['email']; ?></td>
                  </tr>                  

                  </tbody>
                </table> 
                   </div>

                     <div class="tab-pane fade" id="tab2default">
<?php echo validation_errors(); ?>
   <?php echo form_open('Opmaster/edit_admin'); ?>


    <div class="form-group">
      <label class="control-label col-md-3 text-right" for="email">ID менеджера</label>
      <div class="col-sm-8">
        <input type="text" name="writer_id" class="form-control" value="<?php echo $profile['writer_id']; ?>" readonly>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 text-right" for="email">Имя</label>
      <div class="col-sm-8">
        <input type="text" name="firstname" class="form-control" value="<?php echo $profile['firstname']; ?>">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 text-right" for="email">Фамилия</label>
      <div class="col-sm-8">
        <input type="text" name="lastname" class="form-control" value="<?php echo $profile['lastname']; ?>">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 text-right" for="email">Email</label>
      <div class="col-sm-8">
        <input type="text" name="email" class="form-control" value="<?php echo $profile['email']; ?>">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 text-right" for="email"></label>
      <div class="col-sm-8">
          <input type="submit"  class="btn btn-danger form-control" name="submit" value="Edit user" />
      </div>
    </div>

  
<?php echo form_close();?> 
                     </div>

                     <div class="tab-pane fade" id="tab3default">
<?php echo validation_errors(); ?>
   <?php echo form_open('Opmaster/edit_password_admin'); ?>





    <div class="form-group">
      <label class="control-label col-md-3 text-right" for="email">Email(логин)</label>
      <div class="col-sm-8">
        <input type="text" name="password" class="form-control" value="<?php echo $profile['email']; ?>" readonly>
      </div>
    </div>    

    <div class="form-group">
      <label class="control-label col-md-3 text-right" for="email">Пароль</label>
      <div class="col-sm-8">
        <input type="text" name="password" class="form-control" value="">
      </div>
    </div>

                 <div class="form-group">
            <label class="control-label col-md-2"></label>
            <div class="col-md-7">
        <input type="hidden" name="writer_id" class="form-control" value="<?php echo $writer_id; ?>" readonly>
        <input type="submit"  class="btn btn-info fullwidth" name="submit" value="Сменить пароль" />
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
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script> -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="http://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
  </body>
</html>
