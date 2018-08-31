  <?php if($this->session->userdata('admin_level') != 'super'){
    redirect('/opmaster/dashboard');
  }; ?>


       <div class='panel panel-default col-lg-9'>
          <div class='panel-heading'>
            <i class='fa fa-id-card-o fa fa-large'></i>
            Супер админ
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
        <!-- DataTables Example -->

        <div class="row">
          <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
              <div class="heading">
                <div class="pull-right"> 

                 </div>
              </div>
              <div class="widget-content padded clearfix">


                                  <table class="table table-bordered table-striped" id="dataTable1">
                  <thead>

                    <th>
                      #ID
                    </th>
                    <th>
                     Имя
                    </th>
                 
<!--                     <th class="hidden-xs">
                     Телефон
                    </th> -->
                    <th class="hidden-xs">
                      Статус
                    </th>
                     <th class="hidden-xs">
                      Штраф (грн.)
                    </th>
                   <th class="hidden-xs">
                      Уровень пользователя
                    </th>

                  </thead>



                  <tbody id="table_author">
<?php if (is_array ($writers)): ?>
<?php foreach ($writers as $writers): ?>
                    <tr id="uid-<?php echo $writers['writer_id']; ?>">
                      <td>
                       <a class="table-actions" href="<?php echo ci_site_url('Adminwriters/view_writer/'.$writers['writer_id']); ?>"> #<?php echo $writers['writer_id']; ?></a>
                      </td>
                      <td>
                       <?php echo $writers['firstname']; ?> <?php echo $writers['lastname']; ?>
                      </td>
<!--                       <td class="hidden-xs">
                     <span class="label label-warning">  <?php // echo $writers['primaryphone']; ?></span>
                      </td> -->
                      <td class="hidden-xs">

       <form onsubmit="return false" class="clearfix">
      <div class="col-md-6">
    <select class="form-control" style="width: 109px; padding: 0; font-size: 12px" name='writer_status' class="input_text" >
                   <option value="False" <?php if($writers['writer_status']==='False'){ echo 'selected'; } ?>> Заблокирован</option>
                   <option value="Active" <?php if($writers['writer_status']==='Active'){ echo 'selected'; } ?>> Активный</option>
    </select>
      </div>


      <div class="col-md-1">

                   <input type='hidden' name='writer_id' value="<?php echo $writers['writer_id']; ?>">
                   <input type='hidden' name='email' value="<?php echo $writers['email']; ?>">
                   <input type='hidden' name='firstname' value="<?php echo $writers['firstname']; ?>">
                   <button type='submit' class="ic_b btn btn-success change_status"></button>
      </div>
</form>
       
                        <!-- </span> -->
                      </td>
                       <td class="hidden-xs">

 <form onsubmit="return false" class="clearfix">

        <input type="hidden" name="manager_id" value="<?php echo $writers['writer_id'];?>">

        <input type="text" class="form-control" style="width: 100px; float: left; margin-right: 10px;" name="manager_fine" value="<?php echo $writers['manager_fine'];?>">
        <button type='submit' class="ic_b btn btn-success manager_fine"></button>
  </form>             



                      </td>
                      <td>
<!-- ===============    -->
                              <form onsubmit="return false" class="clearfix">
                                    <div class="col-md-6">
                                  <select class="form-control" style="width: 109px; padding: 0; font-size: 12px" name='writer_level' class="input_text" >
<option value="writer" <?php if($writers['user_level']==='writer' && ($writers['writer_level']==='writer' || $writers['writer_level']==='') ){ echo 'selected'; } ?>> Автор</option>

<option value="admin" <?php if( ($writers['user_level']==='writer' || $writers['user_level']==='client') && $writers['writer_level']==='admin'){ echo 'selected'; } ?>> Менеджер</option>
<option value="client" <?php if($writers['user_level']==='client' && ($writers['writer_level']==='writer' || $writers['writer_level']==='')){ echo 'selected'; } ?>> Заказчик</option>
                                                 
                                  </select>
                                    </div>


                                    <div class="col-md-1">

                                                 <input type='hidden' name='writer_id' value="<?php echo $writers['writer_id']; ?>">
                                                 <button type='submit' class="ic_b btn btn-success change_writer_level">
                                                </button>
                                    </div>
                              </form>
<!-- =============== -->
                      </td>
                    </tr>


          <?php endforeach; ?>      
          <?php endif; ?>      
                  </tbody>
                </table>

<script type="text/javascript">
  $(document).ready(function() {
       $('button.change_status').on('click',
         function(form){
          console.log($(form).serialize());
          var ftar = form.target.parentElement.parentElement;
          console.log(ftar);
           ftar.onsubmit = () => {return false};
           $.post('<?php echo ci_site_url(); ?>Adminwriters/change_status', $(ftar).serialize(), function(data){
            showSuperAdminToast('Вы успешно изменили статус менеджера');
           });

           });

          $('button.manager_fine').on('click',
         function(form){
          console.log($(form).serialize());
          var ftar = form.target.parentElement;
          console.log(ftar);
           ftar.onsubmit = () => {return false};
           $.post('<?php echo ci_site_url(); ?>Adminorders/manager_fine', $(ftar).serialize(), function(data){
              showSuperAdminToast('Поле штраф успешно изменено');
           });

           });

        $('button.change_writer_level').on('click',
         function(form){
          console.log($(form).serialize());
          var ftar = form.target.parentElement.parentElement;
          console.log(ftar);
           ftar.onsubmit = () => {return false};
           $.post('<?php echo ci_site_url(); ?>Adminorders/change_writer_level', $(ftar).serialize(), function(data){
            showSuperAdminToast('Вы успешно изменили уровень пользователя');
           });

           });
   });

</script>                    




                    <!-- <p><div class="pagination pull-right"><?php // echo $links; ?></div></p> -->

              </div>
            </div>
          </div>
        </div>
        <!-- end DataTables Example -->
      </div>
    </div>

    
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->

<!--     <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="https://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script> -->
  </body>
</html>
