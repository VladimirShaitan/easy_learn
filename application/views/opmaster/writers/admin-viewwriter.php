<?php
if($this->session->userdata('admin_level') != 'super'){
  if($this->session->userdata('writer_level') === $writer_level && $this->session->userdata('writer_id') != $writer_id){
      redirect(ci_site_url().'opmaster/dashboard');
  } 
}
?>
<!-- <pre>
  <?php //  print_r($this->session->userdata()); ?>
</pre> -->
          
        <div class='panel panel-default col-lg-9'>
          <div class='panel-heading'>
            <i class='fa fa-circle fa fa-large'></i>
           Детали по профилю || 

      <?php 
        if($this->session->userdata('writer_id') != $writer_id){
          if($who === 'client'){
             echo 'Заказчик #'.$writer_id; 
          } else {
            echo 'Автор #'.$writer_id; 
          } 
        } elseif($this->session->userdata('writer_id') === $writer_id && $this->session->userdata('admin_level') != 'super') {
          echo 'Менеджер #'.$writer_id; 
        } elseif($this->session->userdata('writer_id') === $writer_id && $this->session->userdata('admin_level') === 'super') {
          echo 'Админ #'.$writer_id; 
        } 
      ?>  
            <div class='panel-tools'>
              <div class='btn-group'>
                <a class='btn' href='#'>
                  <i class='icon-refresh'></i>
                  Статус профиля || 
                  <?php if($writer_status==='False'){ 
                    echo "Заблокирован";
                  } else{
                    echo "Активный";
                  } ?>

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


<?php if($writer_id != '2562' && $this->session->userdata('admin_level') === 'super') { ?>          

          <!-- Weather -->
          <div class="col-md-3">
            <div class="widget-container fluid-height">
              <div class="widget-content padded">
               <div class="heading">
              </div>

                                 <hr/>
       <?php echo form_open('Adminwriters/change_status');?>

                  <p>В данный момент: 
        <?php if($writer_status==='False'){ 
          echo "Заблокирован";
        } else{
          echo "Активный";
        } ?> </p>


                      <div class="form-group">
      <div class="col-md-12">
    <select class="form-control" name='writer_status' class="input_text" >
                   <option value="">Выберите статус</option>
                   <option value="False"> Заблокирован</option>
                   <option value="Active"> Активный</option>
               <!--     <option value="Suspended"> В ожидании</option>
                   <option value="Deactivated"> Деактивирован</option> -->
    </select>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-12">

                    <input type='hidden' name='writer_id' value="<?php echo $writer_id;?>">
                   <input type='hidden' name='email' value="<?php echo $email;?>">
                   <input type='hidden' name='firstname' value="<?php echo $firstname;?>">
                   <input type='submit' class="btn btn-success" Value='Сменить статус'>
      </div>
    </div>

                  <?php echo form_close();?>

              </div>
            </div>
          </div>

<?php } ?>


          <!-- end Weather --><!-- Bar Graph -->
          <div class="<?php if($writer_id != '2562'  && $this->session->userdata('admin_level') === 'super') {echo 'col-md-9';} else {echo 'col-sm-12';} ?>">
            <div class="widget-container small">
              <div class="heading">
                  <ul class="nav nav-pills pull-right">
                     <li class="active"><a href="#tab1default" data-toggle="tab">Статус</a></li>
            <?php if($writer_id != '2562'  && $this->session->userdata('admin_level') === 'super'){ ?>
                     <li><a href="#tab2default" data-toggle="tab">Редактировать</a></li>
                     <li><a href="#tab3default" data-toggle="tab">Сменить пароль</a></li>
            <?php } ?>
                  </ul>
               

              </div>
              <div class="widget-content padded main">




                  <div class="tab-content">
                     <div class="row tab-pane fade active in main" id="tab1default">
                      <h3>Детали по профилю</h3>
                      <table class="table table-striped">
                   <tbody>

                   <tr>
                    <td class="text-right col-md-3">Имя:</td>
                    <td class="text-left col-md-6"><?php echo $firstname;?></td>
                  </tr>
                   <tr>
                     <td class="text-right col-md-3">Фамилия:</td>
                    <td class="text-left"><?php echo $lastname;?></td>
                  </tr>
                  <tr>
                    <td class="text-right ">Email:</td>
                    <td class="text-left "><?php echo $email;?></td>
                  </tr>                  
                  <tr>
                     <td class="text-right">Статус:</td>
                    <td class="text-left alert-warning">
                      <?php if($writer_status==='False'){ 
          echo "Заблокирован";
        } else{
          echo "Активный";
        } ?>
                    </td>
                  </tr>                  
                  <tr>
                     <td class="text-right">Телефон:</td>
                    <td class="text-left"><?php echo $primaryphone;?></td>
                  </tr>
                 <?php if($who != 'client'){ ?> 
                   <tr>
                    <td class="text-right">Номер счета:</td>
                    <td class="text-left"><?php echo $nativelanguage;?></td>
                  </tr>
                <?php } ?>
                  </tbody>
                </table> 

                <?php if($who != 'client'){ ?>
                <p> Предметы: <?php echo $subject;?></p>
              <?php } ?>
                
                <p> Информация: <?php echo $text;?> </p>
                   </div>
<?php if($writer_id != '2562'  && $this->session->userdata('admin_level') === 'super') { ?>
      <div class="row tab-pane fade" id="tab2default">
      <?php echo validation_errors(); ?>
         <?php echo form_open('Adminwriters/edit_writer'); ?>




          <div class="form-group">
            <label class="control-label col-md-3 text-right" for="email">ID</label>
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
<?php if($who != 'client') { ?>
          <div class="form-group">
            <label class="control-label col-md-3 text-right" for="email">Предмет</label>
            <div class="col-md-7">
              <input type="text" name="subject" class="form-control" value="<?php echo $subject;?>">
            </div>
          </div>
<?php } ?>

          <div class="form-group">
            <label class="control-label col-md-3 text-right" for="email">Телефон</label>
            <div class="col-md-7">
              <input type="text" name="primaryphone" class="form-control" value="<?php echo $primaryphone;?>">
            </div>
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
         <?php echo form_open('Adminwriters/edit_password_writer'); ?>


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

<?php } ?>





                  </div>

              </div>
</div></div>

<?php if($writer_level === 'admin') { ?>
<div class="row">
<div class="col-sm-12">              
 <div class="widget-container fluid-height">
 <div class="main widget-content padded">

<?php
function mysort($a, $b) {
    return strtotime($b['deadline']) - strtotime($a['deadline']);
}
if($orders){  usort($orders, 'mysort'); ?>

  <table id="myorders" class="display table">
              <div class="header-section text-center">
              <h3>Мои заказы</h3>
            <hr>
          </div>


    <thead>
      <tr>
        <th class="text-center">#ID заказа</th>
        <th class="text-center">Автор</th>
        <th class="text-center">Заказчик</th>
        <th class="text-center" style="background: rgba(0, 126, 0, 0.50); color: black">Бюджет заказчика</th>
        <th class="text-center" style="background: rgba(26, 188, 156, 0.50); color: black">Дата сдачи</th>
        <th class="text-center">Тема</th>
        <th class="text-center">Предмет</th>
      </tr>
    </thead>
    <tbody>
<!--     <pre>
      <?php // print_r($orders); ?>
    </pre> -->



<?php if (is_array ($orders)): ?>
<?php foreach ($orders as $orders): ?>
                    <tr>
                      <td>
                        <a href="<?php echo ci_site_url('Adminorders/view_order/'.$orders['orderid']); ?>">#<?php echo $orders['orderid']; ?> </a>
                      </td>
                        <td class="hidden-xs text-center">
                          <a href="<?php echo ci_site_url() . 'Adminwriters/view_writer/' . $orders['preferred_writer']; ?>">
                              <?php echo $orders['writer_name']; ?>
                          </a>
                       </td>
                      
                       <td class="hidden-xs text-center">
                        <a href="<?php echo ci_site_url() . 'Adminwriters/view_writer/' . $orders['customer']; ?>">
                          <?php echo $orders['customer_name']; ?>
                        </a>
                      </td>
                       <td class="hidden-xs text-center" style="background: green; color: white">
                          <?php echo $orders['sources']; ?> грн.
                      </td>
                       <td class="hidden-xs text-center" style="background: #1abc9c; color: white">
                      <?php // echo $orders['deadline']; ?>
                      <?php
                        $yearDP = substr($orders['deadline'], 0, 4); 
                        $monthDP = substr($orders['deadline'], 5, 2);
                        $dayDP = substr($orders['deadline'], 8, 2);
                        $timeDP = substr($orders['deadline'], 10)
                      ?>
                      <?php echo $dayDP.'.'.$monthDP.'.'.$yearDP.' '.$timeDP; ?>
                      </td>
                      <td class="hidden-xs text-center">
                        <?php echo $orders['topic']; ?>
                      </td>
                            
                     <td class="hidden-xs text-center">
                       <?php echo $orders['subject']; ?>
                      </td> 
                    </tr>
          <?php endforeach; ?> 
          <?php endif; ?> 


    </tbody>
  </table>
<?php } else {
  echo '<div class="vMngrorders">Пока завершенных заказов нету </div>';
}  ?>

        </div>
        </div>
                </div>
        </div>
<?php  } ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="https://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
  </body>
</html>


            <script>
// $(document).ready(function(){
//     $('#myorders').dataTable();
// });
</script>