         <div class='panel panel-default col-lg-9'>
          <div class='panel-heading'>
            <i class='fa fa-circle fa fa-large'></i>
           Управление авторами
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
                <!-- <i class="fa fa-table"></i><?php echo $Title; ?> -->
              </div>
              <div class="widget-content padded clearfix">
                <table class="table table-bordered table-striped" id="dataTable1">
                  <thead>
                   <!--  <th class="check-header hidden-xs">
                      <label><input id="checkAll" name="checkAll" type="checkbox"><span></span></label>
                    </th> -->
                    <th>
                      #ID
                    </th>
                    <th>
                     Имя
                    </th>
                    <!--<th class="hidden-xs">
                      Country
                    </th>
                    <th class="hidden-xs">
                     Email
                    </th> -->                   
                    <th class="hidden-xs">
                     Телефон
                    </th>
                    <th class="hidden-xs">
                      Статус
                    </th>
                    <th class="hidden-xs">
                    Авторизация
                  </th>
                     <th class="hidden-xs">
                      Онлайн
                    </th>

<?php if($this->session->userdata['admin_level'] === 'super') { ?>
                  <th>Уровень пользователя</th>
<?php } ?>
                  </thead>



                  <tbody id="table_author">
<?php if (is_array ($writers)): ?>
<?php foreach ($writers as $writers): ?>
  <?php if($writers['writer_id'] != '2562') { ?>
                    <tr id="uid-<?php echo $writers['writer_id']; ?>">
                      <td>
                        <a class="table-actions" href="<?php echo ci_site_url('Adminwriters/view_writer/'.$writers['writer_id']); ?>">#<?php echo $writers['writer_id']; ?></a>
                      </td>
                      <td>
                       <?php echo $writers['firstname']; ?> <?php echo $writers['lastname']; ?>
                      </td>
                      <td class="hidden-xs">
                     <span class="label label-warning">  <?php echo $writers['primaryphone']; ?></span>
                      </td>
                      <td class="hidden-xs">


<!-- ================ -->
<?php if($this->session->userdata['admin_level'] === 'super') { ?>

       
<form onsubmit="return false" class="clearfix">
      <div class="col-md-9" style="padding: 0">
    <select class="form-control" name='writer_status' style="padding: 0; font-size: 12px; border-radius: 0;" >
                   <option value="False" <?php if($writers['writer_status'] === 'False'){echo 'selected';} ?>> Заблокирован</option>
                   <option value="Active" <?php if($writers['writer_status'] === 'Active'){echo 'selected';} ?>> Активный</option>

    </select>
      </div>



      <div class="col-md-1" style="padding: 0">

                    <input type='hidden' name='writer_id' value="<?php echo $writers['writer_id'];?>">
                   <input type='hidden' name='email' value="<?php echo $writers['email'];?>">
                   <input type='hidden' name='firstname' value="<?php echo $writers['firstname'];?>">
                   <button type='submit' class=" ic_b btn btn-success change_status_writer">
                   </button>
    </div>

</form>

<?php } else { ?>
                        <span class="label label-success">
                        <?php if($writers['writer_status']==='False'){ 
                          echo "Заблокирован";
                        } elseif($writers['writer_status'] === 'Active') {
                        echo "Активный";
                          } ?>
<?php } ?>

<!-- ================ -->
                        </span>
                      </td>
                       <td class="hidden-xs">
                                                <?php if ( $writers['online'] != '') {
                            echo date("d.m.Y H:i:s", (int)$writers['online']);
                          }?>
                      </td>
                      <td class="ust-<?php echo $writers['writer_id']; ?> hidden-xs"> 
                          <?php if ( time() - $writers['online'] > 240 ) {
                            echo 'Оффлайн';
                            // echo '<br>';
                            // print_r( time() -  $writers['online']); 
                            // echo '<br>';
                            // print_r(time());
                          } else {
                            echo 'Онлайн';
                            // print_r(time() - $writers['online']);
                          } ?>
                       </td>

<!-- ======== -->
<?php if($this->session->userdata['admin_level'] === 'super') { ?>

                      <td class="actions">
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
                      </td>
<?php } ?>
<!-- ======== -->
                    </tr>
               <?php } ?>     
          <?php endforeach; ?>      
          <?php endif; ?>      
                  </tbody>
                </table>
   


<script>
          let oldVova;

//check_online_adm();
 // check_online_adm();
        function check_online_adm() {

          let newVova;
          let UId;
           
          $.post('<?php  echo ci_site_url(); ?>Adminwriters/check_online_adm', function(data){
              
            if(oldVova === undefined){
               oldVova = JSON.parse(data);
               console.log(oldVova);
               return;
            }
              newVova = JSON.parse(data);
              // console.log(console.log());
              var statf = 'Оффлайн';
              var statn = 'Онлайн';
          oldVova.forEach(function(oitem, i){
            newVova.forEach(function(nitem, j){
              if(newVova[j].writer_id === oldVova[i].writer_id){
                  let ust = document.getElementsByClassName('ust-' + oldVova[i].writer_id)[0];
                if (newVova[j].online === oldVova[i].online){
                  if(ust != null && ust != undefined && ust.innerText != statf){
                      ust.innerHTML = statf;
                  }
                } else {
                  if(ust != null && ust != undefined && ust.innerText != statn){
                      ust.innerHTML = statn;
                  }
                }
              } else {}
            })
          })
          oldVova = newVova;
            });
           

        }

        setInterval(check_online_adm, 20000);




$(document).ready(function() {
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

     $('button.change_status_writer').on('click',
         function(form){
          console.log($(form).serialize());
          var ftar = form.target.parentElement.parentElement;
          console.log(ftar);
           ftar.onsubmit = () => {return false};
           $.post('<?php echo ci_site_url(); ?>Adminwriters/change_status', $(ftar).serialize(), function(data){
            showSuperAdminToast('Вы успешно изменили статус автора');
           });

           });

   });
</script>


                <p><div class="pagination pull-right"><?php echo $links; ?></div></p>
  <script>       
        var last = document.querySelector('.pagination  a:last-child');
        var first = document.querySelector('.pagination  a:first-child');
        if(last != null && last.innerHTML === 'Last ›'){
          last.innerHTML = '&nbsp;&nbsp;К последней&nbsp;>';
        }
        if(first != null && first.innerHTML === '‹ First' ){
          first.innerHTML = '<&nbsp;К первой&nbsp;&nbsp;';
        }
  </script>
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

  </body>
</html>
