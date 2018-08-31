<?php
//redirect(ci_site_url().'opmaster/dashboard');
if($order_status != 'Openproject' || $order_status != 'Archived'){
  if($this->session->userdata('admin_level') != 'super'){
    if($this->session->userdata('writer_id') != $manager_id && $manager_id != ''){
         ?>
        <script type="text/javascript">
          alert('Этот заказ уже на выполнении, вы будете перенаправлены на страницу поиска заказов');
          window.location.href = 'https://legko-v-uchebe.com/in/Adminorders/iorders';
        </script>
<?php 
    } 
  }
}

if(empty($orderid)){ ?>
  <script type="text/javascript">
    alert('К сожалению этого заказа больше не существует или он был удален, вы будете перенаправлены на страницу поиска заказов');
    window.location.href = 'https://legko-v-uchebe.com/in/Adminorders/iorders';
  </script>
<?php } ?>  
<script>


  function chatScrollFunc(){
        if (window.location.href.indexOf("#zakaz") > -1) {
              // console.log("zakaz");
              $('#tabClientSc').tab('show');
              setTimeout(
                function(){
                    window.history.replaceState({}, "<?php  echo ci_site_url(); ?>", ''+<?php echo $orderid; ?>)   
                }, 1500
                )

          } else if(window.location.href.indexOf("#avtor") > -1){
              // console.log("avtor"); 
              $('#tabAvtorSc').tab('show');
              setTimeout(
                function(){
                    window.history.replaceState({}, "<?php echo ci_site_url(); ?>", ''+<?php echo $orderid; ?>)   
                }, 1500
                )
          } else if(window.location.href.indexOf("#z_a") > -1 || window.location.href.indexOf("#a_z") > -1){
              // console.log("avtor"); 
              // $('#tabAvtorSc').tab('show');
              dgi('cl_wr_man_history').click();
              setTimeout(
                function(){
                    window.history.replaceState({}, "<?php echo ci_site_url(); ?>", ''+<?php echo $orderid; ?>)   
                }, 1500
                )
          }  

      }
$(document).ready(function(){ 
  chatScrollFunc();
  $('a.ordMesLinkPush').on('click', function(e){
      chatScrollFunc();
      // $(e.target).trigger( "click" );
  });
});
</script>
<script>
  var date = new Date();
  date.setDate(date.getDate());
</script>
          <div class='panel panel-default col-lg-9'>

          <div class='panel-heading'>
            <i class='fa fa-star fa fa-large'></i>
           #<?php echo $orderid;?> / <?php echo stripslashes($topic); ?>
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
          <div class="col-md-8">
     <div class="row">
          <!-- Weather -->
          <div class="col-md-12">
            <div class="widget-container fluid-height">
              <div class="widget-content padded">

            <?php if(!empty($data)) { ?>    
              <div class="heading">
               <p>Запросы проекта </p>
              </div>
            <table class="table">
               <thead>
                  <tr>
                     <th>ID автора</th>
                     <th>Дата выполнения</th>
                     <th>Сумма</th>
                     <th>Отображение ставки </th>
                     <th>Назначить автора</th>
                  </tr>
               </thead>
               <tbody>
                  <div class='jsError'></div>
                  
                  <?php foreach ($data as $data){ ?>

                <form class="assign_writer" method="post" onsubmit="return false" accept-charset="utf-8">
                  <tr>
                     <td>
                        <div class="orderid">#<?php echo $data['writerid']; ?></div>
                     </td>
                     <td>  <?php echo $data['date']; ?> </td>
                     <td> <?php echo $data['sum']; ?></td>
                     <!--<td>   <?php // echo $data['request_date']; ?> </td>-->

                     <td><input type='checkbox' <?php if($data['showorder'] === 'true'){echo 'checked';} ?> name="showWriter-<?php echo $data['writerid'];?>" value="true" /></td>
                     <td>
                    
                    <button class="ref_writer btn btn-warning"></button>
                    <button type='submit'  class="subm_writer btn btn-success"></button>
                     </td> 
                      <p>
                    <input type='hidden' name='orderid' value="<?php echo $data['orderid']; ?>">
                    <input type='hidden' name='preferred_writer' value="<?php echo $data['writerid']; ?>">
                     <input type='hidden' name='sum' value="<?php echo $data['sum']; ?>">
                    <input type='hidden' name='writerid' value="<?php echo $data['writerid'];?>">
                    <input type='hidden' name='writer_name' value="#<?php echo $data['writerid'];?>: <?php echo $data['writername']; ?>">
                    <input type='hidden' name='writer_email' value="<?php  echo $data['writer_email'];?>">
                    <input type="hidden" name="customer_name" value="<?php echo $customer_name;?>">
                    <input type="hidden" name="customer_email" value="<?php echo $customer_email;?>">
                    <input type="hidden" name='half_work' value="<?php if($half_work == ''){echo 'Примерно 1 неделя';} else{echo $half_work;} ;?>"  class="form-control" />
                    <input type="hidden" name="topic" value="<?php echo $topic;?>">
                    <input type="hidden" name="referencing_style" value="<?php echo $referencing_style;?>">
                    <input type="hidden" name="words" value="<?php echo $words;?>">
                    <input type="hidden" name="instructions" value="<?php echo $instructions;?>">
                    <input type="hidden" name="half_work" value="<?php echo $half_work;?>"> 
                    <input type="hidden" name="all_work" value="<?php echo $all_work;?>"> 
                    <input type="hidden" name="plan" value="<?php echo $plan;?>">
                    <input type="hidden" name="plan_status" value="<?php echo $yesno;?>">
                    <input type="hidden" name="manager_id" value="<?php echo $this->session->userdata('writer_id'); ?>">
                     </p>
                  </tr>
                </form>
                  <?php }  ?>

               </tbody>
            </table>
          <?php } ?>

<script>

$(document).ready(function() {
       $('button.subm_writer').on('click',
         function(form){
          console.log($(ftar).serialize());
          var ftar = form.target.parentElement.parentElement.previousSibling.previousSibling;
           ftar.onsubmit = () => {return false};
           $.post('<?php echo ci_site_url(); ?>Ordersed/assign_writer', $(ftar).serialize(), function(data){
            alert('Вы успешно назначили исполнителя'); location.reload();
           });
           });
   
   });



$(document).ready(function() {
       $('button.ref_writer').on('click',
         function(form){
          var ftar = form.target.parentElement.parentElement.previousSibling.previousSibling;
          console.log(ftar);
          //ftar.onsubmit = () => {return false};
          $.post('<?php echo ci_site_url(); ?>Ordersed/aupp_writer_info', $(ftar).serialize(), function(data){showStickySuccessToast('Вы успешно изменили статус ставки автора');
          });

          // success: showStickySuccessToast('Вы успешно изменили статус ставки автора');
           });
   
   });     
</script> 

      </div>
      </div>
      </div>
      </div>
 
            <div class="widget-container fluid-height">
              <div class="widget-content padded">

      <div class="tabbable">
               <div class="heading row">

                <i class="pull-right">

      <ul class="nav nav-pills">
         <li class="active">
            <a data-toggle="tab" href="#home" aria-expanded="true">
            <i class="green ace-icon fa fa-home bigger-120"></i>
            Детали 
            </a>
         </li>

         <li class="">
            <a data-toggle="tab" href="#editorder" aria-expanded="false">
            <i class="green ace-icon fa fa-edit bigger-120"></i>
            Изменить
            </a>
         </li>

         <li class="">
            <a data-toggle="tab" href="#rateorder" aria-expanded="false">
                        <i class="green ace-icon fa fa-credit-card bigger-120"></i>
           Оплата 
            </a>
         </li>
      </ul>

                </i>
              </div>



      <div class="tab-content">
      <div id="home" class="tab-pane fade active in main"> 



                   <table class="table table-condensed ">
                   <tbody>
                  <tr>
                    <td class="col-md-4 text-right" >Имя заказчика :</td>
                    <td>
                      <a href="<?php echo ci_site_url() . 'Adminwriters/view_writer/' . $customer; ?>">
                        <?php echo $customer_name;?></td>
                      </a>
                  </tr>                  
                  <tr>
                    <td class="col-md-4 text-right" >Email заказчика:</td>
                    <td>
                    <a href="mailto:<?php echo $customer_email;?>">
                      <?php echo $customer_email;?>
                     </a>   
                    </td>
                  </tr>
                  <tr>
                    <td class="col-md-4 text-right" >Tема:</td>
                    <td ><?php echo stripslashes($topic) ;?></td>
                  </tr>
                     <tr>
                    <td class="text-right">Предмет:</td>
                    <td ><?php echo $subject;?></td>
                  </tr>                  </tr>
                     <tr>
                    <td class="text-right">Статус заказа:</td>
                    <td>

                    <?php 
                    // if($order_status==='Openproject'){ 
                    //   echo "Открытый проект";
                    // } elseif ($order_status==='Revision'){
                    //   echo "На доработке";
                    // } elseif ($order_status==='Completed'){
                    //   echo "Завершенный";
                    // } elseif ($order_status==='Archived'){
                    //   echo "В архиве";
                    // } elseif ($order_status==='Cancelled'){
                    //   echo "Половина работы";
                    // } elseif ($order_status==='pending'){
                    //   echo "На оплату";
                    // } else {
                    //   echo "На выполнении";
                    // } 
                    ?>



                    <?php if($order_status === 'Completed'){ 
                      echo "Завершенный";
                    }  elseif ($order_status === 'Revision'){
                      echo "На доработке";
                    } elseif ($order_status === 'Assigned'){
                      echo "На выполнении";
                    }
                    elseif ($order_status === 'Openproject'){
                      echo "Открытый проект";
                    }
                    elseif ($order_status === 'pending'){
                      echo "На оплату Автору";
                    }
                    elseif ($order_status === 'onlyAvtorDoplata'){
                      echo "На доплату Автору";
                    }
                    elseif ($order_status === 'Cancelled'){
                      echo "Половина работы";
                    } else {
                      echo "В архиве";
                    } ?> 

                    || 
                    

               <?php 
                if($client_paid==='unpaid'){ 
                  echo "Неоплачен";
                } elseif($client_paid==='half') {
                   echo "Оплачена половина";
                } elseif ($client_paid==='paid_client'){
                   echo "Оплачен Заказчиком";
                } elseif ($client_paid==='paid_writer'){
                   echo "Оплачен автору";
                } elseif ($client_paid==='paid'){
                   echo "Оплачен полностью (всем)";
                } ?>  

                    </td>
                  </tr>
                  <?php if(!empty($preferred_writer)) { ?>
                   <tr>
                    <td class="text-right">Назначенный автор:</td>
                    <td class="text-left">
                      <a href="<?php echo ci_site_url() . 'Adminwriters/view_writer/' . $preferred_writer; ?>">
                        <?php echo $writer_name; ?>
                      </a>
                    </td>
                  </tr>
                <?php }?>
                    <tr>
                    <td class="text-right">Объем работы:</td>
                    <td class="text-left"><?php echo $words;?> Стр</td>
                  </tr>
                     <tr>
                    <td class="text-right">Дата заказа:</td>
                    <td class="text-left"> 
                      <?php echo $urgency;?>     
                  <tr>
                    <td class="text-right">Тип работы:</td>
                    <td class="text-left"><?php echo $referencing_style;?></td>
                  </tr>
                  <tr>
                    <td class="text-right">Бюджет заказчика:</td>
                    <td class="text-left"><?php echo $sources;?> грн.</td>
                  </tr>  
                  <?php if(!empty($oplata)) { ?>                  
                  <tr>
                    <td class="text-right" >Бюджет, согласованный с заказчиком:</td>
                    <td><?php echo $oplata;?> грн.</td>
                  </tr>
                <?php } ?>
                  <?php if(!empty($doplata)) {?>
                  <tr >
                    <td class="text-right" >Доплата от Заказчика:</td>
                    <td id="dopl_zak_ref"><?php echo $doplata;?> грн. <b><?php if($doplata_status != 'false'){echo '<span style="background: #109e10; color: white; padding: 5px;"><span  >Оплачено<span></span>';}else{echo '<span style="background: red; color: white; padding: 5px;"><span>Не оплачено</span></span>';} ?></b></td>
                  </tr>
                <?php } ?>

                   <tr>
                    <td class="text-right">Сумма автору:</td>
                    <td class="text-left"><?php echo ''.$writerpay;?> грн.</td>
                  </tr>
                 <?php if(!empty($avtorDoplata)) {?>
                  <tr>
                    <td class="text-right" >Доплата Автору:</td>
                    <td><?php echo $avtorDoplata;?> грн.</td>
                  </tr>
                <?php } ?>
                <?php if(!empty($fine)){?>
                <tr>
                  <td class="text-right">Штраф Автору</td>
                  <td><?php echo $fine;?> грн.</td>
                </tr>
              <?php } ?>
                  <?php if($this->session->userdata('admin_level') === 'super'){ ?>
                    <?php if(!empty($manager_id)) { ?>
                  <tr>
                    <td class="text-right">Ответственный менеджер:</td>
                    <td class="text-left">
                      <a href="<?php echo ci_site_url(); ?>Adminwriters/view_writer/<?php echo $manager_id; ?>"><?php echo $manager_id; ?></a>
                    </td>
                  </tr>
                  <?php } ?>
                <?php } ?>

                  </tbody>
                </table> 

              <div class="heading"  style="background: #1abc9c; color: white; padding: 4px; text-align: center; font-size: 18px;" tabindex="0" data-trigger="hover" ,="" role="button" data-toggle="popover" title="" data-content="Сюда выводится бюджет согласованный с заказчиком плюс доплата от заказчика, если она указана. Внимание сумма изменяется в зависимости от статуса оплаты заказа." data-placement="top" data-original-title="Конечная сумма по заказу">
                <span id="it_dopl">
                Итоговая сумма по заказу: 
                <?php
                //  if($order_status != 'Revision'){ 
                //   echo $oplata+$doplata;
                // } else {
                //   echo $doplata;
                // } 
                ?> 

                <?php if($doplata_status === 'false'){
                  if($client_paid === 'paid' || $client_paid === 'paid_client' || $client_paid === 'paid_writer'){
                    echo $doplata;
                  } elseif($client_paid === 'half') {
                    echo ($oplata/2)+$doplata;
                  } elseif($client_paid === 'unpaid'){
                    echo $oplata+$doplata;
                  }

                } else {
                  if($client_paid === 'half'){
                    echo $oplata/2;
                  } elseif($client_paid === 'unpaid'){
                    echo $oplata;
                  } elseif($client_paid === 'paid' || $client_paid === 'paid_client' || $client_paid === 'paid_writer'){
                    echo '0';
                  } 

                } ?> грн.



                </span>
              </div>
              <div class="heading" style="background: #f0ad4e; color: white; padding: 4px; text-align: center; font-size: 18px;" tabindex="0" data-trigger="hover" ,="" role="button" data-toggle="popover" title="" data-content="Сюда выводится Сумма Оплаты автору плюс доплата, если она указана" data-placement="bottom" data-original-title="Конечная оплата Автору">
                Итоговая оплата Автору: 
                <?php 
              //   if($order_status != 'Revision'){
              //    echo $writerpay+$avtorDoplata;
              //  } else {
              //   echo $writerpay;
              // } 
              ?> 

              <?php if($client_paid != 'paid_writer' && $client_paid != 'paid' && $order_status != 'onlyAvtorDoplata') {
                echo $writerpay+$avtorDoplata-$fine;
              } else {
                echo $avtorDoplata;
              } ?>
<!-- if($order_status === 'onlyAvtorDoplata') -->






              грн.
              </div>


<?php echo stripcslashes($instructions) ;?>
<hr style="border-top: dotted 3px;" />

        <!-- Order files -->
        <div class="row">
 
            <div class="widget-container clearfix" id="ord_file_weapper">
  <!-- Квитанции -->
<?php if(!empty($order_files_check)){ ?>
<div class="col-sm-12">
<div class="">
<div class="heading">
<h4> <i class="fa fa-paperclip"></i>Квитанции</h4>
</div>
  <div class="text">
    <table class="table ">
      <?php foreach ($order_files_check as $ofc): ?>
      <tr>
        <td> 
          № <?php echo $ofc['order_id']; ?>
          <?php echo $ofc['file_name']; ?>
          <?php echo $ofc['upload_date']; ?>
          <?php echo $ofc['uploader_name']; ?> 
          [<?php echo $ofc['uploaded_by']; ?>]

          <div class="row">

            <div class="col-md-2">
            <?php echo form_open('filedownload/download/'.$ofc['tmp_name'], array('class'=>'jddform'));?>
              <input type="hidden" name="path" value="<?php echo $upload; ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $ofc['tmp_name']; ?>">
              <input type='hidden' name='tmp_name' value="<?php echo $ofc['tmp_name']; ?>">
              <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
              <!-- <input type="submit" name="submit" value="Загрузить" class=""> -->
              <button type="submit" name="submit"><i class="fa fa-download"></i></button>
            <?php echo form_close();?> 
            </div>

            <div class="col-md-2">
              <?php echo form_open('Adminorders/delete_file');?>
              <input type="hidden" name="path" value="<?php echo $upload; ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $ofc['tmp_name']; ?>">
              <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
              <input type="hidden" name="tmp_name" value="<?php echo $ofc['tmp_name']; ?>">
              <!-- <input type='submit' class="" Value='Удалить'> -->
              <button type="submit" name="submit"><i class="fa fa-trash"></i></button>
              <?php echo form_close();?> 
            </div>

          </div>

        </td>
      </tr>

<?php endforeach; ?>  

          </table>
  </div>
</div>
<div style="border-bottom: 2px solid black; "></div>
</div>

<?php } ?>
<!-- Квитанции -->
<div class="col-md-6">
<div class="heading">
<h4> <i class="fa fa-paperclip"></i> Материалы по заказу</h4>
</div>
  <div class="text">
    <table class="table ">
      <?php foreach ($order_files as $order_files_single): ?>
      <tr>
        <td> 
          № <?php echo $order_files_single['order_id']; ?>
        <?php echo $order_files_single['file_name']; ?>
        <?php echo $order_files_single['upload_date']; ?>
        <?php echo $order_files_single['uploader_name']; ?>
        [<?php echo $order_files_single['uploaded_by']; ?>]

          <div class="row">

            <div class="col-md-2">
            <?php echo form_open('filedownload/download/'.$order_files_single['tmp_name'], array('class'=>'jddform'));?>
              <input type="hidden" name="path" value="<?php echo $upload; ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_files_single['tmp_name']; ?>">
              <input type='hidden' name='tmp_name' value="<?php echo $order_files_single['tmp_name']; ?>">
              <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
              <!-- <input type="submit" name="submit" value="Загрузить" class=""> -->
              <button type="submit" name="submit"><i class="fa fa-download"></i></button>
            <?php echo form_close();?> 
            </div>

            <div class="col-md-2">
              <?php echo form_open('Adminorders/delete_file');?>
              <input type="hidden" name="path" value="<?php echo $upload; ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_files_single['tmp_name']; ?>">
              <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
              <input type="hidden" name="tmp_name" value="<?php echo $order_files_single['tmp_name']; ?>">
              <!-- <input type='submit' class="" Value='Удалить'> -->
              <button type="submit" name="submit"><i class="fa fa-trash"></i></button>
              <?php echo form_close();?> 
            </div>

          </div>

        </td>
      </tr>

<?php endforeach; ?>  

          </table>

           <?php echo form_open_multipart('Order/upload_file'); ?>
          
          <button id="ADDFILE1" class="btn btn-lg btn-block btn-success"> добавить</button>
          <div id="uploadFileContainer1"></div>
      <div id="submit1" style="display: none;">
          <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
          <input type="hidden" name="alias" value="<?php echo $alias; ?>">
          <input type="hidden" name="customer_email" value="<?php echo $customer_email; ?>">
          <input type="hidden" name="order_period" value="<?php echo $order_period; ?>">
          <input type="hidden" name="preferred_writer" value="<?php echo $preferred_writer; ?>">
          <input type="hidden" name="name_type" value="material">
          <input type="submit" name="submit" value="отправить" class="btn btn-primary">
      </div>
    <?php echo form_close(); ?>
  </div>
</div>
<!-- ============= -->

<div class="col-md-6">
      <div class="heading">
        <h4>
          <i class="fa fa-paperclip"></i>
           План по заказу
        </h4>
      </div>
      <div class="text">
        <table class="table">
          <?php foreach ($order_plan as $order_plan_single): ?>
            <tr>
              <td> 
                  № <?php echo $order_plan_single['order_id']; ?>
                  <?php echo $order_plan_single['file_name']; ?>
                  <?php echo $order_plan_single['upload_date']; ?>
                  <?php echo $order_plan_single['uploader_name']; ?>
                  [<?php echo $order_plan_single['uploaded_by']; ?>]

                  <div class="row">
                    <div class="col-md-2">
                        <?php echo form_open('filedownload/download/'.$order_plan_single['tmp_name'], array('class'=>'jddform'));?>
                        <input type="hidden" name="path" value="<?php echo $upload; ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_plan_single['tmp_name']; ?>">
                        <input type='hidden' name='tmp_name' value="<?php echo $order_plan_single['tmp_name']; ?>">
                        <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
                        <!-- <input type="submit" name="submit" value="Загрузить" class=""> -->
                        <button type="submit" name="submit"><i class="fa fa-download"></i></button>
                        <?php echo form_close();?> 
                    </div>
                    <div class="col-md-2">
                      <?php echo form_open('Adminorders/delete_file');?>
                      <input type="hidden" name="path" value="<?php echo $upload; ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_plan_single['tmp_name']; ?>">
                      <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
                      <input type="hidden" name="tmp_name" value="<?php echo $order_plan_single['tmp_name']; ?>">
                      <!-- <input type='submit' class="" Value='Удалить'> -->
                      <button type='submit'><i class="fa fa-trash"></i></button>
                      <?php echo form_close();?> 
                    </div>
             <div class="col-md-8">
              <?php if($order_plan_single['submited'] != 'true') { ?>
                <?php echo form_open('Adminorders/subm_download');?>
                <input type="hidden" name="file_id" value="<?php echo $order_plan_single['id'];?>">
                <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
                <input type="hidden" name="customer_email" value="<?php echo $customer_email;?>">
                <input type="hidden" name="file_name" value="<?php echo $order_plan_single['file_name']; ?>">
                <input type="hidden" name="order_part" value="plan">
                <input type='submit' class="btn-success" Value='Разрешить скачивание'>
                <?php echo form_close();?> 
              <?php } else { ?>
                <?php echo form_open('Adminorders/unsubm_download');?>
                  <input type="hidden" name="file_id" value="<?php echo $order_plan_single['id'];?>">
                  <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
                  <input type='submit' class="btn-danger" Value='Запретить скачивание'>
                <?php echo form_close();?> 
              <?php } ?>
            </div>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>  
          </table>

           <?php echo form_open_multipart('Order/upload_file'); ?>      
                <button id="ADDFILE5" class="btn btn-lg btn-block btn-success"> добавить</button>
                <div id="uploadFileContainer5"></div>
                <div id="submit5" style="display: none;">
                  <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
                  <input type="hidden" name="alias" value="<?php echo $alias; ?>">
                  <input type="hidden" name="customer_email" value="<?php echo $customer_email; ?>">
                  <input type="hidden" name="order_period" value="<?php echo $order_period; ?>">
                  <input type="hidden" name="preferred_writer" value="<?php echo $preferred_writer; ?>">
                  <input type="hidden" name="name_type" value="plan">
                  <input type="submit" name="submit" value="отправить" class="btn btn-primary">
                </div>
                <?php echo form_close(); ?>
        </div>
</div>



<!-- ============= -->

<div class="col-md-6">
              <div class="heading">
               <h4> <i class="fa fa-folder-open-o"></i> Половина работы</h4>
              </div>
                <div class="text">
      <table class="table col-md-6">
   <?php foreach ($order_matsec as $order_matsec_single): ?>
 <tr>
<td>№ <?php echo $order_matsec_single['order_id']; ?>
  <?php echo $order_matsec_single['file_name']; ?>
  <?php echo $order_matsec_single['upload_date']; ?>
  <?php echo $order_matsec_single['uploader_name']; ?> 
  [<?php echo $order_matsec_single['uploaded_by']; ?>]

<div class="row">
<div class="col-md-2">
<?php echo form_open('filedownload/download/'.$order_matsec_single['tmp_name'], array('class'=>'jddform'));?>
<input type="hidden" name="path" value="<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_matsec_single['tmp_name']; ?>">
<input type='hidden' name='filename' value="<?php echo $order_matsec_single['tmp_name']; ?>">
<input type='hidden' name='orderid' value="<?php echo $orderid;?>">
<!-- <input type="submit" name="submit" value="Загрузить" class=""> -->
<button type="submit" name="submit"><i class="fa fa-download"></i></button>
 <?php echo form_close();?> 

</div>

<div class="col-md-2">
<?php echo form_open('Adminorders/delete_file');?>
<input type="hidden" name="path" value="<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_matsec_single['tmp_name']; ?>">
<input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
<input type="hidden" name="tmp_name" value="<?php echo $order_matsec_single['tmp_name']; ?>">
<!-- <input type='submit' class="" Value='Удалить'> -->
<button type='submit'><i class="fa fa-trash"></i></button>
<?php echo form_close();?> 

  </div>
            <div class="col-md-8">
              <?php if($order_matsec_single['submited'] != 'true') { ?>
                <?php echo form_open('Adminorders/subm_download');?>
                <input type="hidden" name="file_id" value="<?php echo $order_matsec_single['id'];?>">
                <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
                <input type="hidden" name="customer_email" value="<?php echo $customer_email;?>">
                <input type="hidden" name="file_name" value="<?php echo $order_matsec_single['file_name']; ?>">
                <input type="hidden" name="order_part" value="matsec">
                <input type='submit' class="btn-success" Value='Разрешить скачивание'>
                <?php echo form_close();?> 
              <?php } else { ?>
                <?php echo form_open('Adminorders/unsubm_download');?>
                  <input type="hidden" name="file_id" value="<?php echo $order_matsec_single['id'];?>">
                  <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
                  <input type='submit' class="btn-danger" Value='Запретить скачивание'>
                <?php echo form_close();?> 
              <?php } ?>
            </div>

</div>  
</td>
</tr>
 <?php endforeach; ?>  
 
                        </table>

                         <?php echo form_open_multipart('Order/upload_file'); ?>
                        
                        <button id="ADDFILE2" class="btn btn-lg btn-block btn-success"> добавить</button>
                        <div id="uploadFileContainer2"></div>
                        <div id="submit2" style="display: none;">
                        <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
                        <input type="hidden" name="alias" value="<?php echo $alias; ?>">
                        <input type="hidden" name="customer_email" value="<?php echo $customer_email; ?>">
                        <input type="hidden" name="order_period" value="<?php echo $order_period; ?>">
                        <input type="hidden" name="preferred_writer" value="<?php echo $preferred_writer; ?>">
                        <input type="hidden" name="name_type" value="polovina"> 
                        <input type="submit" name="submit" value="отправить" class="btn btn-primary">
                        </div>
                        <?php echo form_close(); ?>
                </div>
              </div>



              
              <div class="col-md-6">
              <div class="heading">
               <h4> <i class="fa fa-folder-open"></i> Работа полностью</h4>
              </div>
                <div class="text">
      <table class="table col-md-6">
   <?php foreach ($order_fessay as $order_fessay_single): ?>
 <tr>
<td>№ <?php echo $order_fessay_single['order_id']; ?>
  <?php echo $order_fessay_single['file_name']; ?>
  <?php echo $order_fessay_single['upload_date']; ?>
  <?php echo $order_fessay_single['uploader_name']; ?> [<?php echo $order_fessay_single['uploaded_by']; ?>]
<div class="row">
<div class="col-md-2">
<?php echo form_open('filedownload/download/'.$order_fessay_single['tmp_name'], array('class'=>'jddform'));?>
<input type="hidden" name="path" value="<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_fessay_single['tmp_name']; ?>">
<input type='hidden' name='filename' value="<?php echo $order_fessay_single['tmp_name']; ?>">
<input type='hidden' name='orderid' value="<?php echo $orderid;?>">
<!-- <input type="submit" name="submit" value="Загрузить" class=""> -->
<button type="submit" name="submit"><i class="fa fa-download"></i></button>
 <?php echo form_close();?> 

</div>

<div class="col-md-2">
<?php echo form_open('Adminorders/delete_file');?>
<input type="hidden" name="path" value="<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_fessay_single['tmp_name']; ?>">
<input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
<input type="hidden" name="tmp_name" value="<?php echo $order_fessay_single['tmp_name']; ?>">
<!-- <input type='submit' class="" Value='Удалить'> -->
<button type='submit'><i class="fa fa-trash"></i></button>
<?php echo form_close();?> 

  </div>
              <div class="col-md-8">
              <?php if($order_fessay_single['submited'] != 'true') { ?>
                <?php echo form_open('Adminorders/subm_download');?>
                <input type="hidden" name="file_id" value="<?php echo $order_fessay_single['id'];?>">
                <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
                <input type="hidden" name="customer_email" value="<?php echo $customer_email;?>">
                <input type="hidden" name="file_name" value="<?php echo $order_fessay_single['file_name']; ?>">
                <input type="hidden" name="order_part" value="full">
                <input type='submit' class="btn-success" Value='Разрешить скачивание'>
                <?php echo form_close();?> 
              <?php } else { ?>
                <?php echo form_open('Adminorders/unsubm_download');?>
                  <input type="hidden" name="file_id" value="<?php echo $order_fessay_single['id'];?>">
                  <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
                  <input type='submit' class="btn-danger" Value='Запретить скачивание'>
                <?php echo form_close();?> 
              <?php } ?>
            </div>

</div>  
</td>
</tr>
 <?php endforeach; ?>  
 
                        </table>

                         <?php echo form_open_multipart('Order/upload_file'); ?>
                        
                        <button id="ADDFILE3" class="btn btn-lg btn-block btn-success"> добавить</button>
                        <div id="uploadFileContainer3"></div>
                        <div id="submit3" style="display: none;">
                        <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
                        <input type="hidden" name="alias" value="<?php echo $alias; ?>">
                        <input type="hidden" name="customer_email" value="<?php echo $customer_email; ?>">
                        <input type="hidden" name="order_period" value="<?php echo $order_period; ?>">
                        <input type="hidden" name="preferred_writer" value="<?php echo $preferred_writer; ?>">
                        <input type="hidden" name="name_type" value="vsia_rabota">
                        <input type="submit" name="submit" value="отправить" class="btn btn-primary">
                        </div>
                        <?php echo form_close(); ?>
                </div>
              </div>

<!--  -->
              <div class="col-md-6">
              <div class="heading">
               <h4> <i class="fa fa-check-circle-o"></i> Проверка на плагиат</h4>
              </div>
                <div class="text">
      <table class="table col-md-6">
   <?php foreach ($order_unic as $order_unic_single): ?>
 <tr>
<td>№ <?php echo $order_unic_single['order_id']; ?>
  <?php echo $order_unic_single['file_name']; ?>
  <?php echo $order_unic_single['upload_date']; ?>
  <?php echo $order_unic_single['uploader_name']; ?> [<?php echo $order_unic_single['uploaded_by']; ?>]
<div class="row">
<div class="col-md-2">
<?php echo form_open('filedownload/download/'.$order_unic_single['tmp_name'], array('class'=>'jddform'));?>
<input type="hidden" name="path" value="<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_unic_single['tmp_name']; ?>">
<input type='hidden' name='filename' value="<?php echo $order_unic_single['tmp_name']; ?>">
<input type='hidden' name='orderid' value="<?php echo $orderid;?>">
<!-- <input type="submit" name="submit" value="Загрузить" class=""> -->
<button type="submit" name="submit"><i class="fa fa-download"></i></button>
 <?php echo form_close();?> 

</div>

<div class="col-md-2">
<?php echo form_open('Adminorders/delete_file');?>
<input type="hidden" name="path" value="<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_unic_single['tmp_name']; ?>">
<input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
<input type="hidden" name="tmp_name" value="<?php echo $order_unic_single['tmp_name']; ?>">
<!-- <input type='submit' class="" Value='Удалить'> -->
<button type='submit'><i class="fa fa-trash"></i></button>
<?php echo form_close();?> 

  </div>



<div class="col-md-8">
  <?php if($order_unic_single['submited'] != 'true') { ?>
    <?php echo form_open('Adminorders/subm_download');?>
    <input type="hidden" name="file_id" value="<?php echo $order_unic_single['id'];?>">
    <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
    <input type="hidden" name="customer_email" value="<?php echo $customer_email;?>">
    <input type="hidden" name="file_name" value="<?php echo $order_unic_single['file_name']; ?>">
    <input type="hidden" name="order_part" value="unic">
    <input type='submit' class="btn-success" Value='Разрешить скачивание'>
    <?php echo form_close();?> 
  <?php } else { ?>
    <?php echo form_open('Adminorders/unsubm_download');?>
      <input type="hidden" name="file_id" value="<?php echo $order_unic_single['id'];?>">
      <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
      <input type='submit' class="btn-danger" Value='Запретить скачивание'>
    <?php echo form_close();?> 
  <?php } ?>
</div>



</div>  
</td>
</tr>
 <?php endforeach; ?>  
 
                        </table>

                         <?php echo form_open_multipart('Order/upload_file'); ?>
                        
                        <button id="ADDFILE4" class="btn btn-lg btn-block btn-success"> добавить</button>
                        <div id="uploadFileContainer4"></div>
                        <div id="submit4" style="display: none;">
                        <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
                        <input type="hidden" name="alias" value="<?php echo $alias; ?>">
                        <input type="hidden" name="customer_email" value="<?php echo $customer_email; ?>">
                        <input type="hidden" name="order_period" value="<?php echo $order_period; ?>">
                        <input type="hidden" name="preferred_writer" value="<?php echo $preferred_writer; ?>">
                        <input type="hidden" name="name_type" value="unic">
                        <input type="submit" name="submit" value="отправить" class="btn btn-primary">
                        </div>
                        <?php echo form_close(); ?>
                </div>
              </div>
      

            </div>

        </div>

                             
      </div>
      <div id="editorder" class="tab-pane fade main"> 
<?php echo form_open('Adminorders/orderadminedit', array('class'=>'orederadminedit'));?>

          <div class="form-group">
            <label class="control-label col-md-3 text-right">ID заказа:</label>
            <div class="col-md-9">
              <?php echo $orderid;?>
            </div>
          </div> 
          <div class="form-group">
            <label class="control-label col-md-3 text-right">Предмет:</label>
            <div class="col-md-9">
              <input class="form-control" name="subject" value="<?php echo $subject;?>" placeholder="Text" name="email" type="text">
            </div>
          </div>           
          <div class="form-group">
            <label class="control-label col-md-3 text-right">Tема:</label>
            <div class="col-md-9">
              <input class="form-control" name="topic" value="<?php echo stripslashes($topic); ?>" placeholder="Tема" name="email" type="text">
            </div>
          </div>           
          <div class="form-group">
            <label class="control-label col-md-3 text-right">Объем работы*:</label>
            <div class="col-md-9">
              <input class="form-control" name="words" required value="<?php echo $words;?>" placeholder="Объем работы" name="email" type="text">
            </div>
          </div> 
          <div class="form-group">
           <label class="control-label col-md-3 text-right">Дата заказа</label>
            

            <div class="col-md-9" id="dt_urgency"> 


              <div class="input-group date" id="datetimeurg">
                    <input type="text" value="<?php echo $urgency;?>" name="urgency_ch" readonly="" placeholder="Дата заказа" autocomplete="off" value="" class="form-control">
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
            <script type="text/javascript">
              $(function () {
                  $('#datetimeurg').datetimepicker({
                    format:'dd.mm.yyyy hh:ii',
                    pickerPosition: "bottom-left",
                    language: 'ru',
                    startDate: date,
                    weekStart: 1
                  });
              });
              calTrig('datetimeurg');
          </script>

            </div>
          </div>         
          <div class="form-group">
            <label class="control-label col-md-3 text-right">Детали заказа</label>
            <div class="col-md-9">
              <textarea class="form-control" id="editor1" name="instructions" ><?php echo stripslashes($instructions); ?></textarea>
            </div>
          </div>                              
          <div class="form-group">
            <label class="control-label col-md-3 text-right"></label>
            <div class="col-md-9">
          <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
          <input type='submit' class="btn btn-warning" Value='Изменить заказ'>
            </div>
          </div> 
            <?php echo form_close();?> 



      </div>
      <div id="rateorder" class="tab-pane fade main"> 

<div>
  
  <?php echo form_open('Adminorders/sendOplata', array('class'=>'jsform'));?>
                        <div class='jsError'></div>
                         <div class="control-group">
           
                     <div class="tab-content">
      <div id="home" class="tab-pane fade active in main"> 


<input type="hidden" name="orderid" value="<?php echo $orderid;?>">
<input type="hidden" name="clienName" value="<?php echo $customer_name;?>">
<input type="hidden" name="clienEmail" value="<?php echo $customer_email;?>">
<input type="hidden" name="preferred_writer" value="<?php echo $preferred_writer;?>">
<table class="table table-condensed ">
 <tbody>
    <tr>
      <td class="col-md-4 text-right">Бюджет заказчика:</td>
      <td><?php echo $sources;?> грн.</td>
      <td></td>
    </tr>                  
    <tr>
      <td class="col-md-4 text-right" >Бюджет, согласованный с заказчиком:</td>
      <td ><input type="text" name="oplata" value="<?php echo $oplata;?>"> грн.</td>
      <td></td>
    </tr>
     <tr>
      <td class="col-md-4 text-right" >Сумма, оплаченная по заказу:</td>
      <td ><input type="text" name="avans" placeholder="Аванс" value="<?php echo $avans;?>"> грн.</td>
      <td></td>
    </tr>
  <?php if($this->session->userdata('admin_level') === 'super'){ ?>
    <tr>
      <td class="col-md-4 text-right" >Штраф:</td>
      <td>
        <input type="text" <?php if($preferred_writer == 0) echo 'disabled' ;?> name="fine" value="<?php echo $fine;?>"> грн.
      </td>
      <td></td>
    </tr>
  <?php } ?>
    <tr>
      <td class="col-md-4 text-right" >Доплата по Заказчику:</td>
      <td>
        <input type="text" name="doplata" value="<?php echo $doplata;?>"> грн.
      </td>
      <td></td>
    </tr>
    <tr>
      <td class="col-md-4 text-right" >Доплата по Автору:</td>
      <td>
        <input type="text" name="avtorDoplata" value="<?php echo $avtorDoplata;?>"> грн.
      </td>
      <td></td>
    </tr>
    <tr>
      <td class="col-md-4 text-right" >Сумма автору</td>
      <td><input type="text" name="writerpay" value="<?php echo $writerpay;?>" /></td>
      <td></td>
    </tr>
    
  </tbody>
</table>
                <div class="load_sum">
                  <button class="btn btn-lg btn-block btn-info">Сохранить суммы</button>
                </div>
              </div>
            </div>      
           <hr/>
        </div>
<?php echo form_close();?>
</div>




      </div>
      </div>
      </div>


              </div>
            </div>
          </div>
          <!-- end Weather --><!-- Bar Graph -->
          <div class="col-md-4">
<?php if(!empty($doplata) || !empty($avtorDoplata)) { ?>
<div style="padding: 5px; border: 2px dashed red; margin-bottom: 10px; box-shadow: 0 0 13px;">
  <table class="table table-condensed text-center">
    <tbody>
      <?php if(!empty($doplata)) { ?>
      <tr class="zak_dop_notice_form"><td colspan="2">Заказчик - Доплата (уведомления)</td></tr>
      <tr class="zak_dop_notice_form">
        <td>
          <form>
          <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
          <input type="hidden" name="clientEmail" value="<?php echo $customer_email;?>">
          <input type="hidden" name="sum" value="<?php echo $doplata; ?> грн.">
          <input type="hidden" name="cl_name" value="<?php echo $customer_name;?>">
          <input type="hidden" name="trig" value="notice">
          <button type="button" id="noticeCus" style="white-space: inherit;" class="btn btn-info">Уведомить о необходимости доплаты</button>
        </form>
      </td>
      <td>
        <form>
          <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
          <input type="hidden" name="clientEmail" value="<?php echo $customer_email;?>">
          <input type="hidden" name="sum" value="<?php echo $doplata; ?> грн.">
          <input type="hidden" name="cl_name" value="<?php echo $customer_name;?>">
          <input type="hidden" name="trig" value="congrats">
          <button type="button" id="congrateCus" style="white-space: inherit;" class="btn btn-success">Уведомить об успешной доплате</button>
        </form>
      </td>
      </tr>
    <?php } ?>
  <?php if(!empty($preferred_writer)) { ?>
    <?php if(!empty($avtorDoplata)) { ?>
      <tr>
        <td colspan="2" class="text-center">Автор - Доплата (уведомления)</td>
      </tr>
      <tr>
        <td>
          <form>
          <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
          <input type="hidden" name="prefWriter" value="<?php echo $preferred_writer; ?>">
          <input type="hidden" name="sum" value="<?php echo $avtorDoplata; ?> грн.">
          <input type="hidden" name="trig" value="notice">
          <button type="button" id="noticeWr" style="white-space: inherit;" class="btn btn-info">Доплата начислена</button>
        </form>
      </td>
      <td>
        <form>
          <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
          <input type="hidden" name="prefWriter" value="<?php echo $preferred_writer; ?>">
          <input type="hidden" name="sum" value="<?php echo $avtorDoplata; ?> грн.">
          <input type="hidden" name="trig" value="congrats">
          <button type="button" id="congrateWr" style="white-space: inherit;" class="btn btn-success">Доплата произведена</button>
        </form>
      </td>
      </tr>
    <?php } ?>
  <?php } ?>
    </tbody>
  </table>
</div>

<script type="text/javascript">


function noticeDoplataCustomer(btnSend, phpFunc, ref){
  $(btnSend).on('click',
      function(form){
      var ftar = form.target.parentElement;
      // console.log($(ftar).serialize());
       $.post('<?php echo ci_site_url(); ?>Messages/'+phpFunc, $(ftar).serialize(), function(data){
            // data = JSON.parse(data);
            // alert('Вы успешно уведомили пользователя');
            showStickySuccessToast('Вы успешно уведомили пользователя');
            // console.log(data);
            if(ref){
              $('#dopl_zak_ref').load(window.location.href + " #dopl_zak_ref" );
              $('#it_dopl').load(window.location.href + " #it_dopl" );
              
            }
       });

   });
}
noticeDoplataCustomer('#noticeCus', 'customerDoplataNotice');
noticeDoplataCustomer('#congrateCus', 'customerDoplataNotice', true);

noticeDoplataCustomer('#noticeWr', 'writerDoplataNotice');
noticeDoplataCustomer('#congrateWr', 'writerDoplataNotice');

</script>
<?php } ?>

            <div class="widget-container main">
              <div class="heading">

              </div>


          <div class="widget-contentd padded">
                  <?php echo form_open('Adminorders/changepay');?>

<div class='panel-heading'> Статус Оплаты: 
  
  <?php if($client_paid==='unpaid'){ 
              echo "Неоплачен";
            } elseif($client_paid==='half') {
              echo "Оплачена половина";
          } elseif ($client_paid==='paid_client'){
              echo "Оплачен Заказчиком";
          } elseif ($client_paid==='paid_writer'){
              echo "Оплачен автору";
          } elseif ($client_paid==='paid'){
              echo "<br>
                <span style='padding: 5px; background: #1abc9c; color: white;'>
                   Оплачен полностью (всем)
                </span>";
          }  ?>
</div>

   
             <div class="form-group">
            <div class="col-md-8">
              <select name='client_paid' class="form-control">
                   <option value=""> Выбрать </option>
                   <option value="unpaid">Неоплачен</option>
                   <option value="half">Оплачена половина</option>
                   <option value="paid_client">Оплачен Заказчиком</option>
                   <option value="paid_writer" <?php if(!$preferred_writer) { echo 'disabled';} ?>> Оплачен Автору</option>
                   <option value="paid" <?php if(!$preferred_writer) { echo 'disabled';} ?>> Оплачен полностью (всем)</option>
              </select>
            </div>
            <div class="col-md-4">
                    <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
                    <input type='hidden' name='customer_email' value="<?php echo $customer_email;?>">
                    <input type='hidden' name='preferred_writer' value="<?php echo $preferred_writer;?>">
                    <input type="hidden" name="from" value="orderPage">
                    <input type="hidden" name="old_paid" value="<?php echo $client_paid; ?>">
                    <input type='submit' class="btn btn-warning" Value='изменить'>
            </div>
          </div>
 
 <!-- /control-group -->
<?php echo form_close();?> 
          </div> <!-- /widget-content -->
<br/>
              <div class="widget-contentd padded">
             <div class='panel-heading'> Статус выполнения:
         <?php if($order_status === 'Completed'){ 
          echo "Завершенный";
         }  elseif ($order_status === 'Revision'){
          echo "На доработке";
        } elseif ($order_status === 'Assigned'){
          echo "На выполнении";
        }
        elseif ($order_status === 'Openproject'){
          echo "Открытый проект";
        }
        elseif ($order_status === 'pending'){
          echo "На оплату Автору";
        }
        elseif ($order_status === 'onlyAvtorDoplata'){
          echo "На доплату Автору";
        }
        elseif ($order_status === 'Cancelled'){
          echo "Половина работы";
        } else {
          echo "В архиве";
        } ?>
          
        </div>
                  <?php echo form_open('Adminorders/changestatus', array('class'=>'jsform'));?>
            <div class="form-group"> 
            <div class="col-md-8">
              <select name='order_status' class="form-control asdas">
                   <option value=""> Выбрать </option>
                   <option  value="Completed"> Завершенный</option>

                   <?php // if($client_paid != 'paid_writer' && $client_paid != 'paid' && $client_paid != "paid_client") {echo 'disabled';}?>
                   <option value="Revision"> На доработке</option>
                    <option value="Cancelled" <?php if(!$preferred_writer) { echo 'disabled';} ?> >Половина работы</option>
                   <option value="Archived">Архив</option>
              </select>

            </div>
            <div class="col-md-3">
                    <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
                    <input type='hidden' name='customer_name' value="<?php echo $customer_name;?>">
                    <input type='hidden' name='customer_email' value="<?php echo $customer_email;?>">
                    <input type='hidden' name='preferred_writer' value="<?php echo $preferred_writer;?>">
                    <input type="hidden" name="from" value="orderPage">
                    <!-- <input type="hidden" name="oldStatus" value="<?php // echo $order_status; ?>"> -->
                    <input type='submit' class="btn btn-danger" Value='изменить'>
            </div>
          </div>

                  <?php echo form_close();?> 
          </div>
<br/>

<div class="widget-contentd padded">
               <div class='panel-heading'>Назначен: <?php echo $writer_name;?></div>
                  <?php echo form_open('Adminorders/assign_writer');?>
            
            <div class="form-group">
            <div class="col-md-8">
              <select name='preferred_writer' id="prwr" class="form-control">
                <option value=""> Выбрать </option>
              <?php foreach ($writers as $writers) { ?>
                  <option <?php if($writers['writer_id'] === $customer){echo 'disabled';} ?> value="<?php echo $writers['writer_id']; ?>">
                   #<?php echo $writers['writer_id']; ?>: <?php echo $writers['firstname']; ?> <?php echo $writers['lastname']; ?>
                  </option>
                  <?php } 
                  ?>
              </select>
            </div>
            <div class="col-md-4">
                    <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
                    <input type='hidden' name='order_status' value="Назначенный">
                    <input type='hidden' name='customer_email' value="<?php echo $customer_email;?>">
                    <input type='hidden' name='customer_name' value="<?php echo $customer_name;?>">
                    <input type="hidden" name='half_work' value="<?php if($half_work == ''){echo 'Примерно 1 неделя';} else{echo $half_work;} ;?>"  class="form-control" />
                    <input type='hidden' name='previous_writer' value="<?php echo $preferred_writer;?>">
                    <input type="hidden" name="topic" value="<?php echo $topic;?>">
                    <input type="hidden" name="referencing_style" value="<?php echo $referencing_style;?>">
                    <input type="hidden" name="words" value="<?php echo $words;?>">
                    <input type="hidden" name="instructions" value="<?php echo $instructions;?>">
                    <input type="hidden" name="half_work" value="<?php echo $half_work;?>"> 
                    <input type="hidden" name="all_work" value="<?php echo $all_work;?>"> 
                    <input type="hidden" name="plan" value="<?php echo $plan;?>">
                    <input type="hidden" name="plan_status" value="<?php echo $yesno;?>">
                    <input type="hidden" name="writer_name" id="prwrhid" value="">
                    <input type="hidden" name="manager_id" value="<?php echo $this->session->userdata('writer_id'); ?>">
                    <input type='submit' class="btn btn-warning"  Value='Назначить'>
            </div>
          </div>
<script type="text/javascript">
  var a = document.getElementById('prwr').querySelectorAll('option');
  document.getElementById('prwr').onchange = function(){
    for(var i = 1; i <= a.length-1; i++){
      if(a[i].selected){
         document.getElementById('prwrhid').value = a[i].innerText;
      }
    }
  }
</script>
                  <?php echo form_close();?> 

 </div> 
<?php if($preferred_writer || $order_status === 'Archived') {  ?>
  <hr/>
  <div class="return">
      <button id="showreturn" class="btn btn-lg btn-block btn-info">
        Вернуть к открытым</br> заказам
      </button>
  </div>
  <div class="returntoopen">
        <h4>
         Если вы подтвердите, заказ будет возвращен в список доступных для авторов заказов.
        </h4>
        <?php echo form_open('Adminorders/returntoopen');?>
          <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
          <input type='hidden' name='order_status' value="Openproject">
          <input type='submit' class="btn btn-warning"  Value='Вернуть'>
        <?php echo form_close();?> 
       <button id="hidereturn" class="btn btn-lg btn-block btn-info">Не возвращать</button>
  </div> 
<hr/>
<?php } ?>
<?php if($order_status === "Archived") { ?>
     <div class="delete">
      <button id="show" class="btn btn-lg btn-block btn-info">Удалить этот заказ</button>
     </div>
    <div class="delete_order">
      <p>Если вы уверены, что хотите удалить этот заказ, нажмите «Подтвердить».</p>
      <?php echo form_open('Adminorders/delete_order/'. $orderid);?>

        <input type="hidden" name="path" value="uploads/<?php echo $order_period;?>/<?php echo $orderid;?>/">
        <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
        <input type='submit' class="btn btn-danger" Value='Подтвердить'>
        <hr/>
      <?php echo form_close();?> 
      <button id="hide" class="btn btn-info">Не удалять</button>
    </div>
<?php } ?>

</br>
</hr>
<!--  проба  -->
<?php if($order_status != "Archived") { ?>
<br>
<h3>График сдачи заказов</h3>
 <?php echo form_open('Adminorders/sendLine', array('class'=>'jsform'));?>
<div style="border-top: 2px dotted black; height: 10px "></div>
План
<select name='work4' style="margin-top: 5px" class="form-control">
                <option value=""> Выбрать </option>
                <!-- <option <?php // if($yesno === 'need_to_choose'){echo 'selected';} ?> value="need_to_choose">На рассмотрении у заказчика</option> -->
                <option <?php if($yesno === 'dont_need'){echo 'selected';} ?> value="dont_need"> Утверждать не нужно</option>
                <option <?php if($yesno === 'false'){echo 'selected';} ?> value="false"> На выполнении</option> <!-- Не выполнен -->
                <option <?php if($yesno === 'various'){echo 'selected';} ?> value="various"> Выполнен, но не утвержден</option>
                <option <?php if($yesno === 'true'){echo 'selected';} ?> value="true">Выполнен и утвержден </option>

</select>
<br>
          <div style="border-bottom: 2px dotted black; height: 10px "></div>
          <br>


            <label>План работы</label><br>
            План: <?php if($yesno === 'true'){echo '<span style="padding: 5px; background: #1abc9c; color: white;"> Выполнен и утвержден  </span>';} elseif($yesno === 'various') {echo '<span style="padding: 5px; background: #f0ad4e; color: white;">  Выполнен, но не утвержден </span>';} elseif($yesno === 'dont_need') {echo '<span style="padding: 5px; background: #1abc9c; color: white;">Утверждать не нужно</span>';}elseif ($yesno === 'need_to_choose') {echo '<span style="padding: 5px; background: #d9534f; color: white;">На рассмотрении у заказчика</span>';} else{echo '<span style="padding: 5px; background: #d9534f; color: white;">  На выполнении</span>';} ?>
           <p><div class='input-group date' id='datetimepicker2'>
                    <input type="text" name='work1' readonly placeholder="План работы" autocomplete="off" value="<?php echo $plan;?>"  class="form-control" />
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div> </p>
                     
          <script type="text/javascript">
              $(function () {
                  $('#datetimepicker2').datetimepicker({
                    format:'dd.mm.yyyy hh:ii',
                    pickerPosition: "bottom-left",
                    language: 'ru',
                    startDate: date,
                    weekStart: 1
                  });
              });
              calTrig('datetimepicker2');
          </script>


        <label>Половина работы</label>
         <p><div class='input-group date' id='datetimepicker22'>
                  <input type="text" name='work2' readonly placeholder="Половина работы" autocomplete="off" value="<?php echo $half_work;?>"  class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div> </p>
                 <script type="text/javascript">
            $(function () {
                $('#datetimepicker22').datetimepicker({
                  format:'dd.mm.yyyy hh:ii',
                  pickerPosition: "bottom-left",
                  language: 'ru',
                  startDate: date,
                  weekStart: 1
                });
            });
             calTrig('datetimepicker22');
        </script>

        <label>Работа полностью</label>
         <p><div class='input-group date' id='datetimepicker23'>
                  <input type="text" name='work3' readonly placeholder="Работа полностью" autocomplete="off" value="<?php echo $all_work;?>"   class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div> </p>
                <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
                 <script type="text/javascript">
            $(function () {
                $('#datetimepicker23').datetimepicker({
                  format:'dd.mm.yyyy hh:ii',
                  pickerPosition: "bottom-left",
                  language: 'ru',
                  startDate: date,
                  weekStart: 1
                });
            });
            calTrig('datetimepicker23');
        </script>
<!-- проба  -->
<?php } ?>
<?php if($order_status === "Revision") { ?>
      <label>Дата доработки</label>
         <p><div class='input-group date' id='datetimepicker24'>
                  <input type="text" readonly placeholder="Дата доработки" name='dorabotka' value="<?php echo $dorabotka;?>"   class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div> </p>
                <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
                 <script type="text/javascript">
            $(function () {
                $('#datetimepicker24').datetimepicker({
                  format:'dd.mm.yyyy hh:ii',
                  pickerPosition: "bottom-left",
                  language: 'ru',
                  startDate: date,
                  weekStart: 1
                });
            });
                calTrig('datetimepicker24');
        </script>
      <?php } ?>

<?php if($order_status === "pending") { ?>
      <label>Дата оплаты</label>
         <p><div class='input-group date' id='datetimepicker4'>
                  <input type="text" name='data_oplatu' readonly value="<?php echo $data_oplatu;?>"   class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div> </p>
                <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
                 <script type="text/javascript">
            $(function () {
                $('#datetimepicker4').datetimepicker({
                  format:'dd.mm.yyyy hh:ii',
                  pickerPosition: "bottom-left",
                  language: 'ru',
                  startDate: date,
                  weekStart: 1
                });
            });
            calTrig('datetimepicker4');
        </script>
      <?php } ?>

<input type="hidden" name="clientEmail" value="<?php echo $customer_email;?>">
<input type="hidden" name="clientName" value="<?php echo $customer_name;?>">
<input type="hidden" name="writer_name" value="<?php echo $writer_name;?>">
<input type="hidden" name="preferred_writer" value="<?php echo $preferred_writer;?>">
 <div class="load"><button class="btn btn-lg btn-block btn-info">Сохранить</button></div>
 <?php echo form_close();?> 

              </div> 
            </div>
          </div> 

          <!-- End Bar Graph -->
          <hr style="border-top: dotted 3px;" />
          <h3 style = "text-align: center; color: #f0ad4e;">Чат по заказу</h3>


<div class="panl-heading">

  <!-- Nav tabs -->
<?php
if($this->session->userdata('admin_level') === 'super'){$fh_message = 'admin';} else {$fh_message = 'manager';}
?>  
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#clientChat" id="tabClientSc" aria-controls="clientChat" role="tab" data-toggle="tab">Чат с Заказчиком</a></li>
<?php if($preferred_writer != '0') { ?>
    <li role="presentation"><a href="#avtorChat" id="tabAvtorSc" aria-controls="avtorChat" role="tab" data-toggle="tab">Чат с Автором</a></li>
<?php } ?>
    <li role="presentation" class="dropdown"> 
      <a href="#" class="dropdown-toggle" id="myTabDrop1" data-toggle="dropdown" aria-controls="myTabDrop1-contents" aria-expanded="true">
        История сообщений <span class="caret"></span>
      </a>
        <ul class="dropdown-menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents"> 
<!--           <li>
            <form onsubmit="return false">
              <input type="hidden" name="orderid" value="<?php // echo $orderid;?>">
              <input type="hidden" name="chatHistory" value="zakaz">
              <button type="submit" style="margin-top: 10px" id="cl_wr_history">С Заказчиком</button>
            </form>
          </li> -->
<?php if($preferred_writer != '0') { ?>
<!--            <li>
             <form onsubmit="return false">
                <input type="hidden" name="orderid" value="<?php // echo $orderid;?>">
                <input type="hidden" name="chatHistory" value="manager">
                <button type="submit" style="margin-top: 10px" id="mngr_cl_history" >С Автором</button>
              </form>
           </li> -->
          <li>
            <form onsubmit="return false">
              <input type="hidden" name="orderid" value="<?php echo $orderid;?>">
              <input type="hidden" name="chatHistory" value="client">
              <button type="submit" style="margin-top: 10px" id="cl_wr_man_history" >между Автром и Заказчиком</button>
            </form>
           </li>
<?php } ?>
        </ul>
      </li>
  </ul>

  <!-- Чат с заказчиком -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="clientChat">
      <h3>Чат с заказчиком 
        <a tabindex="0" data-trigger="hover" ,="" role="button" data-toggle="popover" title="" data-content="Если ЗАКАЗЧИК находится не в системе (Оффлайн), ему на почту придет уведомление о новом сообщении" data-placement="top" data-original-title="Заметка"><i class="fa fa-question-circle"></i></a>
      </h3>
      <div class="refWrapper">
        <div id="refresh">
        <div class="his_adm_wrapper">
            <?php foreach (array_reverse($mes_man_client) as $messages): ?>
              <?php if($messages['from_who'] === 'zakaz' && ($messages['whom'] === 'manager' || $messages['whom'] === 'admin') ){ ?>
                <div class=" client_mngr_message">
                  <h3>
                    от Заказчика <span class="fr_adm_mes mng_mes">менеджеру</span>
                    <?php if($this->session->userdata('admin_level') === 'super'){ ?>
                      <form class="mid-<?php echo $messages['id'];?>" onclick="return false">
                          <input type="hidden" name="id" value="<?php  echo $messages['id'];?>">
                          <input type="hidden" name="orderid" value="<?php  echo $orderid;?>">
                          <button type='submit' class="delMes btn btn-danger"></button>
                          <!-- <span class="spLoader"><i class="fa fa-spinner"></i></span> -->
                      </form>
                    <?php } ?>
                  </h3>
                  <h5 class="media-heading reviews">
                    <span class="fa fa-share-alt"></span>
                    <!-- <?php // echo $messages['sender_name']; ?>  ||  -->
                    Дата: <?php
                           $yearC = substr($messages['date_posted'], 0, 4); 
                           $monthC = substr($messages['date_posted'], 5, 2);
                           $dayC = substr($messages['date_posted'], 8, 2);
                           $timeC = substr($messages['date_posted'], 10)
                          ?>
                          <?php echo $dayC.'.'.$monthC.'.'.$yearC.' '.$timeC; ?>
                  </h5>

                  <p class="medi-comment">
                    <?php echo str_replace('\\', '', $messages['message_body']); ?>
                  </p>
                </div>

              <?php } elseif(($messages['from_who'] === 'manager' || $messages['from_who'] === 'admin') && $messages['whom'] === 'zakaz'){ ?> 
                  <div class="mngr_message">
                    <h3>
                      Заказчику
                      <?php if($messages['senderid'] === '2562') { ?>
                        <span class="fr_adm_mes adm_mes">от Администратора</span>
                      <?php } else { ?>
                        <span class="fr_adm_mes mng_mes">от Менеджера</span>
                      <?php } ?>
                      <?php if($this->session->userdata('admin_level') === 'super'){ ?>
                          <form class="mid-<?php echo $messages['id'];?>" onclick="return false">
                            <input type="hidden" name="id" value="<?php echo $messages['id'];?>">
                            <input type="hidden" name="orderid" value="<?php echo $orderid;?>">
                            <!-- <span class="spLoader"><i class="fa fa-spinner"></i></span> -->
                            <button type='submit' class="delMes btn btn-danger"></button>
                          </form>
                        <?php } ?>
                    </h3>
                    <h5 class="media-heading reviews">
                        <span class="fa fa-share-alt"></span>
                        <!-- <?php // echo $messages['sender_name']; ?>  ||  -->
                        Дата: 
                         <?php
                           $yearC = substr($messages['date_posted'], 0, 4); 
                           $monthC = substr($messages['date_posted'], 5, 2);
                           $dayC = substr($messages['date_posted'], 8, 2);
                           $timeC = substr($messages['date_posted'], 10)
                          ?>
                          <?php echo $dayC.'.'.$monthC.'.'.$yearC.' '.$timeC; ?>
                    </h5>
<!--                     <i class="fa fa-pencil-square"></i>
                    <form class="mid-<?php // echo $messages['id'];?>" onclick="return false">
                       <input type="hidden" name="id" value="<?php // echo $messages['id'];?>">
                       <button type='submit' class="edit btn btn-danger">сохранить</button>
                    </form> -->
                    <p class="medi-comment">
                       <?php echo str_replace('\\', '', $messages['message_body']); ?>
                    </p>
                  </div>
              <?php } ?>


            <?php endforeach; ?>
            <div id="zakaz"></div>
          </div>
        </div>
      </div>
      <hr style="border-top: dotted 3px;" />
      
      <form class="clearfix" onclick="return false">
          <div class='jsError'></div>
          <div class="form-group">
             <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
             <input type='hidden' name='clientid' value="<?php echo $customer;?>">
             <input type='hidden' name='customer_email' value="<?php echo $customer_email;?>">
             <input type='hidden' name='preferred_writer' value="<?php echo $preferred_writer;?>">
             <input type='hidden' name='senderid' value="<?php echo $this->session->userdata('writer_id')?>">
             <input type='hidden' name='receiverid' value="<?php echo $customer;?>">
             <input type='hidden' name='user_level' value="<?php echo $this->session->userdata['writer_level']?>">
             <input type="hidden" name="writer_name" value="<?php echo $writer_name;?>">
             <input type='hidden' name='sender_email' value="<?php echo $this->session->userdata('email')?>">
             <input type='hidden' name='sender_name' value="<?php echo $this->session->userdata('firstname')?> <?php echo $this->session->userdata('lastname')?>">
             <input type='hidden' name='from_who' value="<?php echo $fh_message; ?>">
             <input type="hidden" name="ch_reciever" value="zakaz">
           <div class="form-group">
              <label class="control-label col-md-12 text-right" for="password2"></label>
              <div class="col-md-12">
                <textarea  cols="105" rows="5" name="message_body" placeholder="Сообщение" id="messageBodyClient"></textarea>
              </div>
           </div>
              <div class="col-md-12">
                <button class="send_message_to_client btn btn-success" type="submit">Отправить</button>

          <!-- file -->

          <select name="file_send" id="fileSelectionClient" class="btn btn-warning">
             <option value="false">Выберите файл</option>
             <?php if(!empty($order_files)) { ?>
             <optgroup label="Материалы по заказу">
                <?php foreach ($order_files as $cl_materials) { ?>
                  <option data-tmpname="<?php echo $cl_materials['tmp_name']; ?>"><?php echo $cl_materials['file_name']; ?></option>  
                <?php } ?>
              </optgroup>
              <?php } ?>
              <?php if(!empty($order_plan)) { ?>
              <optgroup label="План работы">
                <?php foreach ($order_plan as $order_plan_file) { ?>
                  <option data-tmpname="<?php echo $order_plan_file['tmp_name']; ?>"><?php echo $order_plan_file['file_name']; ?></option>  
                <?php } ?>
              </optgroup>
              <?php } ?>
              <?php if(!empty($order_second)) { ?>
              <optgroup label="Половина работы">
                <?php foreach ($order_second as $order_second_file) { ?>
                  <option data-tmpname="<?php echo $order_second_file['tmp_name']; ?>"><?php echo $order_second_file['file_name']; ?></option>  
                <?php } ?>
              </optgroup>
              <?php  } ?>

              <?php if(!empty($order_fessay)) { ?>
              <optgroup label="Вся работа">
                <?php foreach ($order_fessay as $order_essays_file) { ?>
                  <option data-tmpname="<?php echo $order_essays_file['tmp_name']; ?>"><?php echo $order_essays_file['file_name']; ?></option>  
                <?php } ?>
              </optgroup>
              <?php  } ?>

              <?php if(!empty($order_unic)) { ?>
              <optgroup label="Проверка на уникальновсть">
                <?php foreach ($order_unic as $order_unic_file) { ?>
                  <option data-tmpname="<?php echo $order_unic_file['tmp_name']; ?>"><?php echo $order_unic_file['file_name']; ?></option>  
                <?php  } ?>
              </optgroup>
              <?php } ?>
          </select>

          <input type="hidden" name="file_template" id="file_template_holder_client" value="">
          <a tabindex="0" data-trigger="hover" role="button" data-toggle="popover" title="" data-content="Чтобы отправить сообщение с прикрепленным файлом, ФАЙЛ необходимо прикрепить к заказу (Это можно сделать выше)" data-placement="top" data-original-title="Прикрепление файлов" style="font-size: 20px"><i class="fa fa-question-circle"></i></a>
          <!-- file -->
              </div>

        </div>
      </form> 
    </div>
      <!-- Чат с автором -->
<?php if($preferred_writer != '0') { ?>
    <div role="tabpanel" class="tab-pane" id="avtorChat">
      <h3>Чат с Автором
        <a tabindex="0" data-trigger="hover" role="button" data-toggle="popover" title="" data-content="Если АВТОР находится не в системе (Оффлайн), ему на почту придет уведомление о новом сообщении" data-placement="top" data-original-title="Заметка"><i class="fa fa-question-circle"></i></a>
            </h3>
      <div class="refWrapperAvtor">
        <div id="refreshAvtor">
        <div class="his_adm_wrapper">
            <?php foreach (array_reverse($mes_man_avtor) as $messages): ?>
              <?php if($messages['from_who'] === 'avtor' && ($messages['whom'] === 'manager' || $messages['whom'] === 'admin') ){ ?>
                <div class="client_mngr_message">
                  <h3>
                    От Автора  <span class="fr_adm_mes mng_mes">менеджеру</span>
                    <?php if($this->session->userdata('admin_level') === 'super'){ ?>
                      <form class="mid-<?php echo $messages['id'];?>" onclick="return false">
                        <input type="hidden" name="id" value="<?php  echo $messages['id'];?>">
                        <input type="hidden" name="orderid" value="<?php  echo $orderid;?>">
                        <button type='submit' class="delMes btn btn-danger"></button>
                        <!-- <span class="spLoader"><i class="fa fa-spinner"></i></span> -->
                      </form>
                    <?php } ?>
                  </h3>
                  <h5 class="media-heading reviews">
                    <span class="fa fa-share-alt"></span>
                    <!-- <?php // echo $messages['sender_name']; ?>  || -->
                    Дата: 
                      <?php
                           $yearC = substr($messages['date_posted'], 0, 4); 
                           $monthC = substr($messages['date_posted'], 5, 2);
                           $dayC = substr($messages['date_posted'], 8, 2);
                           $timeC = substr($messages['date_posted'], 10);
                      ?>
                      <?php echo $dayC.'.'.$monthC.'.'.$yearC.' '.$timeC; ?>
                  </h5>

                  <p class="medi-comment">
                    <?php echo str_replace('\\', '', $messages['message_body']); ?>
                  </p>
                </div>

              <?php } elseif( ($messages['from_who'] === 'manager' || $messages['from_who'] === 'admin') && $messages['whom'] === 'avtor'){ ?> 
                  <div class="mngr_message">
                    <h3>
                      Автору
                      <?php if($messages['senderid'] === '2562') { ?>
                        <span class="fr_adm_mes adm_mes">от Администратора</span>
                      <?php } else { ?>
                        <span class="fr_adm_mes mng_mes">от Менеджера</span>
                      <?php } ?>
                      <?php if($this->session->userdata('admin_level') === 'super'){ ?>
                        <form class="mid-<?php echo $messages['id'];?>" onclick="return false">
                            <input type="hidden" name="id" value="<?php echo $messages['id'];?>">
                            <input type="hidden" name="orderid" value="<?php echo $orderid;?>">
                            <!-- <span class="spLoader"><i class="fa fa-spinner"></i></span> -->
                            <button type='submit' class="delMes btn btn-danger"></button>
                        </form>
                      <?php } ?>
                    </h3>
                    <h5 class="media-heading reviews">
                        <span class="fa fa-share-alt"></span>
                        <!-- <?php // echo $messages['sender_name']; ?>  || -->
                        Дата:  
                        <?php
                           $yearC = substr($messages['date_posted'], 0, 4); 
                           $monthC = substr($messages['date_posted'], 5, 2);
                           $dayC = substr($messages['date_posted'], 8, 2);
                           $timeC = substr($messages['date_posted'], 10)
                          ?>
                        <?php echo $dayC.'.'.$monthC.'.'.$yearC.' '.$timeC; ?> 
                    </h5>

                    <p class="medi-comment">
                       <?php echo str_replace('\\', '', $messages['message_body']); ?>
                    </p>
                  </div>
              <?php } ?>
            <?php endforeach; ?>
            <div id="avtor" id="avtChatHistScBot"></div>
          </div>
        </div>
      </div>
      <hr style="border-top: dotted 3px;" />
      
      <form class="clearfix" onclick="return false">
          <div class='jsError'></div>
          <div class="form-group">
             <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
             <input type='hidden' name='clientid' value="<?php echo $customer;?>">
             <input type='hidden' name='customer_email' value="<?php echo $customer_email;?>">
             <input type='hidden' name='preferred_writer' value="<?php echo $preferred_writer;?>">
             <input type='hidden' name='senderid' value="<?php echo $this->session->userdata('writer_id')?>">
             <input type='hidden' name='receiverid' value="<?php echo $preferred_writer;?>">
             <input type='hidden' name='user_level' value="<?php echo $this->session->userdata['writer_level']?>">
             <input type="hidden" name="writer_name" value="<?php echo $writer_name;?>">
             <input type='hidden' name='sender_email' value="<?php echo $this->session->userdata('email')?>">
             <input type='hidden' name='sender_name' value="<?php echo $this->session->userdata('firstname')?> <?php echo $this->session->userdata('lastname')?>">
             <input type='hidden' name='from_who' value="<?php echo $fh_message; ?>">
             <input type="hidden" name="ch_reciever" value="avtor">
           <div class="form-group">
              <label class="control-label col-md-12 text-right" for="password2"></label>
              <div class="col-md-12">
                <textarea  cols="105" rows="5" name="message_body" placeholder="Сообщение" id="messageBodyAvtor"></textarea>
              </div>
           </div>
              <div class="col-md-12">
                <button class="send_message_to_avtor btn btn-success" type="submit">Отправить</button>

          <!-- file -->
          <select name="file_send" id="fileSelectionAvtor" class="btn btn-warning">
             <option value="false">Выберите файл</option>
             <?php if(!empty($order_files)) { ?>
             <optgroup label="Материалы по заказу">
                <?php foreach ($order_files as $cl_materials) { ?>
                  <option data-tmpname="<?php echo $cl_materials['tmp_name']; ?>"><?php echo $cl_materials['file_name']; ?></option>  
                <?php } ?>
              </optgroup>
              <?php } ?>  
              <?php if(!empty($order_plan)) { ?>
              <optgroup label="План работы">
                <?php foreach ($order_plan as $order_plan_file) { ?>
                  <option data-tmpname="<?php echo $order_plan_file['tmp_name']; ?>"><?php echo $order_plan_file['file_name']; ?></option>  
                <?php } ?>
              </optgroup>
              <?php } ?>
              <?php if(!empty($order_second)) { ?>
              <optgroup label="Половина работы">
                <?php foreach ($order_second as $order_second_file) { ?>
                  <option data-tmpname="<?php echo $order_second_file['tmp_name']; ?>"><?php echo $order_second_file['file_name']; ?></option>  
                <?php } ?>
              </optgroup>
              <?php } ?>
              <?php if(!empty($order_essays)) { ?>  
              <optgroup label="Вся работа">
                <?php foreach ($order_essays as $order_essays_file) { ?>
                  <option data-tmpname="<?php echo $order_essays_file['tmp_name']; ?>"><?php echo $order_essays_file['file_name']; ?></option>  
                <?php } ?>
              </optgroup>
              <?php } ?>

               <?php if(!empty($order_unic)) { ?>       
              <optgroup label="Проверка на уникальновсть">
                <?php foreach ($order_unic as $order_unic_file) { ?>
                  <option data-tmpname="<?php echo $order_unic_file['tmp_name']; ?>"><?php echo $order_unic_file['file_name']; ?></option>  
                <?php  } ?>
              </optgroup>
              <?php } ?>
          </select>
          <input type="hidden" name="file_template" id="file_template_holder_avtor" value="">
          <a tabindex="0" data-trigger="hover" role="button" data-toggle="popover" title="" data-content="Чтобы отправить сообщение с прикрепленным файлом, ФАЙЛ необходимо прикрепить к заказу (Это можно сделать выше)" data-placement="top" data-original-title="Прикрепление файлов" style="font-size: 20px"><i class="fa fa-question-circle"></i></a>
          <!-- file -->
          </div>

        </div>
      </form> 
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

<!-- Modal messages history -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header his">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</button>  
        <h4>Полная история сообщений по заказу</h4>
      </div>
      <div id="history_cl_wr_modal" class="modal-body">
      </div>

    </div>
  </div>
</div>
<!-- Modal history -->


  </body>
</html>


<script type="text/javascript">
function dgi(id){return document.getElementById(id);}

function addYourMessage(mesBody, user_level, mesDate, chatHistory, whom, fileTpl, mesId){
  var html, usr_lvl, whom, cls, mB, wh;

  switch(user_level){
    case 'writer': usr_lvl = 'от автора'; break;
    case 'client': usr_lvl = 'от заказчика'; break;
    case 'manager': usr_lvl = 'от менеджера'; break;
    case 'admin': usr_lvl = 'от администратора'; break;
  }

  switch(whom){
    case 'writer': wh = 'Автору'; cls = 'mngr_message'; break;
    case 'client': wh = 'Заказчику'; cls = 'mngr_message'; break;
    case 'manager': wh = 'Менеджеру'; cls = 'client_mngr_message'; break;
    case 'admin': wh = 'Администратору'; cls = 'client_mngr_message'; break;
  }

  // console.log(chatHistory);


  if(dgi(mesBody)!=null){mB = dgi(mesBody).value} else{mB = mesBody}


  html = '<h3>'+wh;
  html += '&nbsp;<span class="fr_adm_mes adm_mes">'+usr_lvl+'</span>&nbsp;';
  <?php if($this->session->userdata('admin_level') === 'super') { ?>
    html += '<form class="mid-'+mesId+'" onclick="return false">';
    html += '<input type="hidden" name="id" value="'+mesId+'">';
    html += '<input type="hidden" name="orderid" value="<?php echo $orderid; ?>">';
    html += '<button type="submit" class="delMes btn btn-danger"></button>';
    html += '</form>';
  <?php } ?>
  html += '</h3>';
  html += '<h5 class="media-heading reviews"><span class="fa fa-share-alt"></span> Дата: '+mesDate+'</h5>';
  html += '<p class="medi-comment">'+repl(mB+fileTpl)+'</p>';


  var div = document.createElement('div');
  div.className = cls;
  div.innerHTML = html;
  // console.log(document.querySelector(chatHistory+' .his_adm_wrapper'));
  document.querySelector(chatHistory+' .his_adm_wrapper').appendChild(div);
}


function ajax_send_message(btnSend, mesBody, refBlockId, refBlockWrapClName, fileWhom, fInp){
    $(btnSend).on('click',
      function(form){
      
      let messageBody = document.getElementById(mesBody).value;
      var ftar = form.target.parentElement.parentElement.parentElement;
      // console.log(ftar);
       $.post('<?php echo ci_site_url(); ?>Messages/post_message_ajax', $(ftar).serialize(), function(data){
          data = JSON.parse(data);

          var fileTpl = '', fh = '<?php echo $this->session->userdata('admin_level'); ?>';
          fileTpl = ftar.querySelector('#'+fInp).value;
          console.log(fileTpl);
          switch (refBlockId){
            case '#refresh': from_who = 'client'; break;
            case '#refreshAvtor': from_who = 'writer'; break;
          }
          switch(fh){
            case 'super': fh = 'admin'; break;
            default : fh = 'manager'; break;
          }

          addYourMessage(mesBody, fh, data[1], refBlockId, from_who, fileTpl, data[2]);
          //mesBody, user_level, mesDate, chatHistory, whom, fileTpl, name, mesId


            if(data[0] === 'true'){
              document.getElementById(mesBody).value = '';
              $(refBlockWrapClName).scrollTop($(refBlockId).height()+ 120);
            } else {
              alert('Необходимо ввести текст сообщения');
            }
           document.getElementById(fileWhom).querySelector('option:first-child').setAttribute('selected', 'selected');
           document.getElementById(fInp).value = '';
       });


      });

    // setInterval(function(){ 
    //   $(refBlockId).load(window.location.href + " " + refBlockId); 
    // }, 10000);
}


ajax_send_message('button.send_message_to_client', 'messageBodyClient', '#refresh', '.refWrapper', 'fileSelectionClient', 'file_template_holder_client');
putForm('fileSelectionClient', 'file_template_holder_client');
<?php if($preferred_writer != '0') { ?>
ajax_send_message('button.send_message_to_avtor', 'messageBodyAvtor', '#refreshAvtor', '.refWrapperAvtor', 'fileSelectionAvtor', 'file_template_holder_avtor');
putForm('fileSelectionAvtor', 'file_template_holder_avtor');
<?php } ?>



function repl(str){
  let a = '';
  for(let i = 0; i <= str.length-1; i++){
    if(str[i] === '\\'){
      a += ''
    } else {
      a+= str[i];
    }
  }
  return a;
}



  function createFileTmplate(tmp_name, orderid, hidInpId){
    let path = '<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period; ?>/'+ orderid +'/'+tmp_name; 
    template = '<div>'+ tmp_name +'</div>';
    template += '<form action="https://legko-v-uchebe.com/in/Filedownload/download/'+ tmp_name +'" class="jddform" method="post" accept-charset="utf-8">';
    template += '<input type="hidden" name="path" value="'+ path +'">'
    template += '<input type="hidden" name="filename" value="'+ tmp_name +'">';
    template += '<input type="hidden" name="orderid" value="'+ orderid +'">';
    template += '<button type="submit" name="submit" class="btn-warning">';
    template += '<i class="fa fa-download"></i>';
    template += '</button></form>'
    document.getElementById(hidInpId).value = template;
  }

function putForm(section, hidInpId){
  let fileSel = document.getElementById(section);
  let fileSelOpt = fileSel.querySelectorAll('option');
  fileSel.addEventListener('change', function(){
    for(let k = 0; k <= fileSelOpt.length-1; k++){
      fileSelOpt[k].removeAttribute('selected');
    }
    for(let i = 0; i <= fileSelOpt.length-1; i++){
      if(fileSelOpt[i].selected){
        fileSelOpt[i].setAttribute('selected', 'selected')
        if(fileSelOpt[i].value != 'false'){
          createFileTmplate(fileSelOpt[i].getAttribute('data-tmpname'), <?php echo $orderid; ?>, hidInpId)
        } else {
          document.getElementById(hidInpId).value = '';
          return false
        }
      }
    }
  })
}


// ----------------



function getMesHistory(btnHistory){ 
    $(btnHistory).on('click',
    function(form){
    var ftar = form.target.parentElement;
    ftar.onsubmit = () => {return false};
    var ancModal = document.createElement('div');
    ancModal.id = 'ancModal';

     $.post('<?php echo ci_site_url(); ?>Messages/mes_cl_wr_history', $(ftar).serialize()) 
       .done(function(data){
        data = JSON.parse(data);
        dgi('history_cl_wr_modal').innerHTML = '';
        // console.log($(ftar).serialize());
        putHistory(data);

        dgi('history_cl_wr_modal').appendChild(ancModal);
        $('#myModal').modal();

        setTimeout(function(){
          $('#history_cl_wr_modal').animate({
              scrollTop: $("#ancModal").offset().top
          }, 100);

        }, 500);
        // 

     });

    });
}


  getMesHistory('button#cl_wr_history');
<?php if($preferred_writer != '0') { ?>
getMesHistory('button#mngr_cl_history');
  getMesHistory('button#cl_wr_man_history');
<?php } ?>
  function createMes(mesBody, mesDate, id, clName, title) {
    let day = mesDate.substring(10, 8)+'.';
    let month = mesDate.substring(7, 5)+'.';
    let year =  mesDate.substring(0, 4)+' ';
    let hour = mesDate.substring(11);
    let verdate = day+month+year+hour;


  let toClient = '';
  // console.log(mesBody.replace('\\"', ""));
  toClient +='<div class="history_msg_wrapper zak '+ clName +'">';
  toClient +=  '<h2>'+ title;
  <?php if($this->session->userdata('admin_level') === 'super'){ ?>
    toClient += '<form class="mid-'+id+'" onclick="return false">';
    toClient +=  '<input type="hidden" name="id" value="'+id+'">';
    toClient +=  '<input type="hidden" name="orderid" value="<?php echo $orderid;?>">';
    // toClient +=  '<span class="spLoader"><i class="fa fa-spinner"></i></span>';
    toClient +=  '<button type="submit" class="delMes btn btn-danger"></button>';
    toClient +=  '</form>';
  <?php } ?>
  toClient +=   '</h2>'
  toClient +=  '<ul class="media-list">';
  toClient +=    '<li class="media media-replied">';
  toClient +=      '<div class="media-body">';
  toClient +=       '<div class="well well-lg">';
  toClient +=         '<ul class="media-date text-uppercase reviews list-inline">';
  toClient +=           '<li>Дата: '+ verdate +'</li>';
  toClient +=         '</ul>';
  toClient +=        '<p class="media-comment">'+ repl(mesBody) +'</p>';
  toClient +=          '</div>';
  toClient +=        '</div>';
  toClient +=      '</li>';
  toClient +=    '</ul>';
  toClient += '</div>';
  let spNode = document.createElement('span');
  spNode.innerHTML = toClient; 
  document.getElementById('history_cl_wr_modal').appendChild(spNode);
}

function putHistory(obj){
  for(key in obj){
    if(obj[key].whom === 'zakaz'){
      if(obj[key].from_who === 'avtor'){
        createMes(obj[key].message_body, obj[key].date_posted, obj[key].id,'theySend', 'Заказчику');
      } else{
        createMes(obj[key].message_body, obj[key].date_posted, obj[key].id,'iSend', 'Заказчику');
      }
    } else if(obj[key].whom === 'manager'){
      createMes(obj[key].message_body, obj[key].date_posted, obj[key].id,'theySend', 'Мне');
    } else if(obj[key].whom === 'avtor') {
      createMes(obj[key].message_body, obj[key].date_posted, obj[key].id,'iSend', 'Автору');
    }
  }
}
// -----------------
// delete message

function deleteMessage(trashFormSubm, refBlockId, callFunc){ 
    $(trashFormSubm).on('click',
    function(form){
    var ftar = form.target.parentElement;
    // console.log($(form.target.parentElement).attr('class'));
    // $('.'+ftar.className + ' .spLoader i').css('opacity', '1');
    // $('.'+ftar.className + ' .spLoader i').css('width', 'auto');
    ftar.onsubmit = () => {return false};
     $.post('<?php echo ci_site_url(); ?>Messages/delete_message', $(ftar).serialize()) 
       .done(function(data){
        data = JSON.parse(data);
        if(!callFunc){
          $(refBlockId).load(window.location.href + " " + refBlockId);
        } else if(callFunc && ftar.parentElement.parentElement != null) {
          // console.log();
          let els = document.querySelectorAll('.'+$(form.target.parentElement).attr('class'));
          console.log(els);
          // console.log();
          for(let i = 0; i <= els.length-1; i++){
            els[i].parentElement.parentElement.remove();
          }

           ftar.parentElement.parentElement.remove();
        }

     });

    });
}
deleteMessage('.refWrapper', '#refresh')
<?php if($preferred_writer != '0') { ?>
deleteMessage('.refWrapperAvtor', '#refreshAvtor')
<?php } ?>
deleteMessage('#history_cl_wr_modal', '', true)
</script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
      function addFinp(fileType, filePart, uplCont){
          var html = '';
          html += '<div class="alert alert-info">';
          html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>';
          html += '<strong> Загрузить </strong>';
          html += '<input type="file" name="multipleFiles[]">';
          html += '<input type="hidden" name="upload_type" value="'+fileType+'">';
          html += '<input type="hidden" name="name_type" value="'+filePart+'">';
          html += '</div>';
          $(uplCont).append(html);
      }
      function evAddFileInp(trig, block, fileType, filePart, uplCont){
        $('#ord_file_weapper').on('click', trig, function(event) {
            event.preventDefault();
            $(block).css("display", "block")
            addFinp(fileType, filePart, uplCont);
        });
      }
     evAddFileInp('button#ADDFILE1', 'div#submit1', 'material', 'material', 'div#uploadFileContainer1');
     evAddFileInp('button#ADDFILE_CH', 'div#submit_ch', 'check', 'check', 'div#uploadFileContainer6');
     evAddFileInp('button#ADDFILE2', 'div#submit2', 'mat_sec', 'polovina', 'div#uploadFileContainer2');
     evAddFileInp('button#ADDFILE3', 'div#submit3', 'essay', 'vsia_rabota', 'div#uploadFileContainer3');
     evAddFileInp('button#ADDFILE4', 'div#submit4', 'unic', 'unic', 'div#uploadFileContainer4');
     evAddFileInp('button#ADDFILE5', 'div#submit5', 'plan', 'plan', 'div#uploadFileContainer5');
    });
</script>

<script>
$(document).ready(function(){
     $(".delete_order").hide();
    $("#hide").click(function(){
        $(".delete_order").hide();
        $(".delete").show();
    });
    $("#show").click(function(){
        $(".delete_order").show();
        $(".delete").hide();
    });
});
</script>

<script>
$(document).ready(function(){
     $(".returntoopen").hide();
    $("#hidereturn").click(function(){
        $(".returntoopen").hide();
        $(".hidereturn").show();
    });
    $("#showreturn").click(function(){
        $(".returntoopen").show();
        $(".hidereturn").hide();
    });
});
</script>


<script>
  (function(){
  var tabs = document.querySelectorAll('.panl-heading .nav li a');
  var tabsHolder = document.querySelector('.panl-heading .nav');

  tabsHolder.addEventListener('click', function(e){
      if(e.target.nodeName === 'A'){
        sessionStorage.setItem('<?php echo $orderid; ?>', '<?php echo $orderid; ?>#'+e.target.href.split('#')[1]);
      }
  })  
    if(sessionStorage.getItem('<?php echo $orderid; ?>') != null){
      $('a[href="#'+sessionStorage.getItem('<?php echo $orderid; ?>').split('#')[1] +'"]').tab('show');
    } 
})()
</script>