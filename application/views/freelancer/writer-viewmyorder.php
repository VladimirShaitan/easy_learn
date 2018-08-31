<script>


function chatScrollFunc(){
    var top;
      if (window.location.href.indexOf("#manager") > -1 || window.location.href.indexOf("#admin") > -1) 
        {
            $('#tabManagertSc').tab('show');
        } else if(window.location.href.indexOf("#zakaz") > -1){
            $('#tabZakazSc').tab('show');
        }    
    }
$(document).ready(function(){ 
  chatScrollFunc();
  $('a.ordMesLinkPush').on('click', function(e){
      chatScrollFunc();
  });
});
</script>          

<div class="col-md-8">
    <div class="orders-profile loggedin">
<div class="main">
      <div class="row">
         <div class='jsError'></div> 
         <div class="col-sm-6">
            <h2>Заказ: #<?php echo $orderid;?> </h2>
         </div>
         <div class="col-sm-6 text-right">
          <?php if($accepted != 'false') { ?>

            <h5>Вам назначен этот заказ</h5>

     <?php if($order_status != "pending" && $order_status != 'onlyAvtorDoplata') { ?>
        <?php if(!empty($order_second) && !empty($order_essays) && !empty($order_unic)) { ?>

          <?php if($plan === 'dont_need' || ($plan != 'dont_need' && !empty($order_plan)) ) { ?>

              <?php if($order_status != 'Archived') {?>
                <button id="request_order" type="button" class="btn btn-info">
                   Отметить как выполненный 
                </button>
              <?php } else { ?>
                <span class="suc_word">Заказ в архиве</span>
              <?php } ?>

            <?php } elseif($plan != 'dont_need' && empty($order_plan)) { ?>
            <div class="text-center danger" style="background: #ff4040; color: white; padding: 6px 0; line-height: 12px; box-shadow: 0 0 7px 0px rgba(0, 0, 0, 0.4);">
                Для завершения заказа, необходимо привязать все части работы
            </div>
           <?php } ?>

        <?php } else { ?>
              <div class="text-center danger" style="background: #ff4040; color: white; padding: 6px 0; line-height: 12px; box-shadow: 0 0 7px 0px rgba(0, 0, 0, 0.4);">
                Для завершения заказа, необходимо привязать все части работы
              </div>
            <?php } ?>
      <?php } else { ?>
            <span class="suc_word">Заказ отмечен как выполненный</span>
      <?php } ?>

          <?php } else { ?>
            <div class="wr_accept_wrapper clearfix">
              <p class="text-center">Ознакомтесь пожалуйста с заказом и приймите или откажитесь от него </p>
              <?php echo form_open('Ordersed/writer_accept', array('class'=>'text-center col-sm-6'));?>
              <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
              <input type="hidden" name="wr_accept" value="true">
              <input type="hidden" name="manager_id" value="<?php echo $manager_id; ?>">
              <input type="submit" class="btn-success" value="Принять">
              <?php echo form_close();?>
              <?php echo form_open('Ordersed/writer_accept', array('class'=>'text-center col-sm-6'));?>
              <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
              <input type="hidden" name="wr_accept" value="false">
              <input type="submit" class="btn-danger" value="Отказаться">
              <?php echo form_close();?>
            <?php } ?>
          </div>
         </div>
      </div>
<?php if($order_status != "pending"){ ?>
    <div class='request_order writer_ord_compl_block alert alert-success'>
          <p> Если вы уверены что правильно выполнили этот заказ и все файлы загружены, нажмите "Готовый заказ". И заказ будет отправлен нашим редакторам для ознакомления перед его завершением. </p>
          <?php echo form_open('Ordersed/writer_complete', array('class'=>'writer_complete text-center'));?>
            <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
            <input type='hidden' name='order_status' value="pending">
            <input type='hidden' name="client_paid" value="<?php echo $client_paid; ?>">
            <input type="hidden" name="order_status_now" value="<?php echo $order_status; ?>">
            <input type="hidden" name="doplata" value="<?php if($avtor_doplata === '0' || empty($avtor_doplata)){echo 'false';}else{echo 'true';}?>">
            <input type='submit' class="btn btn-info" style="margin: 10px 0" Value='Готовый заказ'>
          <?php echo form_close();?> 

    </div>
 <?php } ?>     
<hr/>

      <div class="row">
         <div class="col-md-12">
            <div class="with-nav-tabs panel-default">
               <div class="panl-heading">
                  <ul class="nav nav-tabs nav-justified">
                     <li class="active">
                      <a href="#instructions" data-toggle="tab">Инструкции по заказу</a>
                    </li>
                    <li><a href="#schedule" data-toggle="tab">График сдачи заказа</a></li>
                    <?php if($accepted != 'false') {?>
                    <li><a href="#messages" id="tabZakazSc" data-toggle="tab">Сообщения заказчику</a></li>
                  <?php } ?>
                    <li>
                      <a href="#managerMessages" id="tabManagertSc" data-toggle="tab">Сообщения менеджеру</a>
                    </li>
                  </ul>
               </div>
               <div class="panel-body">
                  <div class="tab-content">
                     <div class="tab-pane fade in active" id="instructions">
                        <table class="table">
                           <tbody>
                             
                              <tr>
                                 <td class="text-right col-sm-4"><strong>Предмет: </strong></td>
                                 <td class="text-left"><?php echo $subject;?></td>
                              </tr>
                              <tr>
                                <td class="text-right col-sm-4"><strong>План</strong></td>
                                <td class="text-left"><?php
                                    if($plan === 'dont_need'){
                                      echo ' Утверждать не нужно';
                                    } elseif($plan === 'false'){
                                      echo ' На выполнении';
                                    } elseif($plan === 'various'){
                                      echo ' Выполнен, но не утвержден';
                                    } elseif($plan === 'true'){
                                      echo ' Выполнен, и утвержден';
                                    } elseif($plan === 'need_to_choose'){
                                      echo ' На рассмотрении у заказчика';
                                    }
                                 ?></td>
                              </tr>
                              <tr>
                                 <td class="text-right col-sm-4"><strong>Статус заказа:</strong></td>
                                 <td class="text-left"> 

                                    <?php

                                //if($order_status != 'pending' && $order_status != 'onlyAvtorDoplata'){


                                    // if($client_paid==='unpaid'){ 
                                    //   echo "Неоплачен ";
                                    // } elseif ($client_paid==='paid' || $client_paid==='paid_client' || $client_paid==='paid_writer'){
                                    //   echo "Оплачен";
                                    // } else {
                                    //   echo "Оплачена половина";
                                    // } 
                                    // echo ' || ';


                                //}

                                    if($order_status ==='Openproject'){ 
                                      echo "Открытый проект";
                                    } elseif ($order_status==='Revision'){
                                      echo "На доработке";
                                    } elseif ($order_status==='Completed'){
                                      echo "Завершенный";
                                    } elseif($order_status === 'Archived'){
                                      echo 'В архиве';
                                    } elseif($order_status === 'pending') {
                                      echo 'На рассмотрении у менеджера';
                                    } elseif($order_status=== 'onlyAvtorDoplata'){
                                      echo 'На доплату автору';
                                    } else {
                                      echo "На выполнении";
                                    } 

                                    ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="text-right col-sm-4"><strong>Тема:</strong></td>
                                 <td class="text-left"><?php echo stripslashes($topic);?></td>
                              </tr>
                              <tr>
                                 <td class="text-right col-sm-4"><strong>Объем работы:</strong></td>
                                 <td class="text-left"><?php echo $words;?> Стр.</td>
                              </tr>
                               <tr>
                               <td class="text-right col-sm-4"><strong>Тип работы:</strong></td>
                               <td class="text-left"><?php echo $referencing_style;?></td>
                               </tr>
                               <tr>
                                 <td class="text-right col-sm-4"><strong>Срок:</strong></td>
                                <td class="text-left">

<?php
$datetime1 = new DateTime(date('Y-m-d H:i:s'));
$datetime2 = new DateTime($all_work);

if($datetime1 >= $datetime2){
  echo  $all_work . " | Срок вышел";
}

if($datetime1 <= $datetime2){
$interval = $datetime1->diff($datetime2);
$elapsed = $interval->format('%a дн. %h ч. %i м.');
echo $all_work . ' | ' . $elapsed;
}

?>

                                 </td>
                              </tr>
                               <tr>
                                 <td class="text-right col-sm-4"><strong>Сумма:</strong></td>
                                 <td class="text-left"><?php echo ''.$writerpay;?> грн.</td>
                              </tr> 
                              <?php if($avtor_doplata != 0 || !empty($avtor_doplata)) {?>
                              <tr>
                                 <td class="text-right col-sm-4"><strong>Доплата по заказу:</strong></td>
                                 <td class="text-left"><?php echo ''.$avtor_doplata;?> грн.</td>
                              </tr> 
                              <?php } ?>
                              <?php if($fine != 0 || !empty($fine)) {?>
                               <tr>
                                 <td class="text-right col-sm-4"><strong>Штраф:</strong></td>
                                 <td class="text-left"><?php if($fine != '') {echo ''.$fine.' грн.';} else{echo 'Штрафа нету';}?></td>
                               </tr> 
                             <?php } ?>

                           </tbody>
                        </table>
<h4>Детали по заказу</h4>
<hr style="border: 1px dashed #bfbfbf;" />

<?php echo stripslashes($instructions); ?>
<hr style="border: 1px dashed #bfbfbf;" />

<div class="row">
<!-- customer files for writer to download -->
  <div class="col-md-6">
  <h5 class="cus_wr_files_heading">Материалы по заказу</h5>
    <div>
     <?php foreach ($order_files as $order_file): ?>
        <div class="row cus_wr_files">
          <!-- file view -->
          <div class="col-sm-8"> 
            № <?php echo $order_file['order_id']; ?><br/>
            <?php echo $order_file['file_name']; ?><br/>
            <?php echo $order_file['upload_date']; ?><br/>
          </div>
          <!-- file download btn -->
          <div class="col-sm-4 "> 
            <?php echo form_open('Filedownload/download/'.$order_file['tmp_name'], array('class'=>'jddform'));?>
              <input type="hidden" name="path" value="<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_file['tmp_name']; ?>">
                <input type='hidden' name='filename' value="<?php echo $order_file['tmp_name']; ?>">
                <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
                <button type="submit" name="submit" class="btn-warning">
                  <i class="fa fa-download"></i>
                </button>
            <?php echo form_close();?> 
          </div>
        </div>
     <?php endforeach; ?>  
    </div>
  </div>
 <!-- customer files for writer to download end--> 
<?php if($accepted != 'false') { ?> 
<div class="col-md-6">
   <h5 class="cus_wr_files_heading">Части работы</h5>
<!-- plan downloading for writer start-->
<div class="file_wrapper">
  <h5>План работы</h5>
    <div>
      <?php foreach ($order_plan as $order_plan_single): ?>
        <div class="clearfix alredy_downloaded">
          <div class="col-sm-8">
            № <?php echo $order_plan_single['order_id']; ?><br/>
            <?php echo $order_plan_single['file_name']; ?><br/>
            <?php echo $order_plan_single['upload_date']; ?><br/>
          </div>
          <div class="col-sm-4"> 
            <?php echo form_open('Filedownload/download/'.$order_plan_single['tmp_name'], array('class'=>'jddform'));?>
              <input type="hidden" name="path" value="<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_plan_single['tmp_name']; ?>">
              <input type='hidden' name='filename' value="<?php echo $order_plan_single['tmp_name']; ?>">
              <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
              <button type="submit" name="submit" class="btn-warning">
                  <i class="fa fa-download"></i>
              </button>
            <?php echo form_close();?> 
          </div>
        </div>
      <?php endforeach; ?>  
    </div>
    <?php echo form_open_multipart('Order/upload_file'); ?>
        <div id="uploadFileContainer1"></div>
        <div id="submit1" style="display: none;">
          <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
          <input type="hidden" name="alias" value="<?php echo $alias; ?>">
          <input type="hidden" name="upload_type" value="plan">
          <input type="hidden" name="name_type" value="plan">
          <input type="hidden" name="order_period" value="<?php echo $order_period; ?>">
          <input type="submit" name="submit" value="Загрузить файл в заказ" class="btn-primary">
        </div>
        <button id="ADDFILE1" class="btn-sm btn-block btn-info">
          Добавить файл в план работы
        </button>
      <?php echo form_close(); ?>
</div>      
<!-- plan downloading for writer end-->


<!-- second part of order start -->
<div class="file_wrapper">
    <h5>Половина работы</h5>
    <div>
     <?php foreach ($order_second as $order_second_single): ?>
        <div class="clearfix alredy_downloaded">
          <div class="col-sm-8">
            № <?php echo $order_second_single['order_id']; ?><br/>
            <?php echo $order_second_single['file_name']; ?><br/>
            <?php echo $order_second_single['upload_date']; ?><br/>
          </div>
          <div class="col-sm-4"> 
          <?php echo form_open('Filedownload/download/'.$order_second_single['tmp_name'], array('class'=>'jddform'));?>
              <input type="hidden" name="path" value="<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_second_single['tmp_name']; ?>">
              <input type='hidden' name='filename' value="<?php echo $order_second_single['tmp_name']; ?>">
              <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
              <button type="submit" name="submit" class="btn-warning">
                  <i class="fa fa-download"></i>
              </button>
           <?php echo form_close();?> 
          </div>
        </div>
      <?php endforeach; ?>  
    </div>
  <?php echo form_open_multipart('Order/upload_file'); ?>
    <div id="uploadFileContainer2"></div>
    <div id="submit2" style="display: none;">
      <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
      <input type="hidden" name="alias" value="<?php echo $alias; ?>">
      <input type="hidden" name="upload_type" value="mat_sec">
      <input type="hidden" name="name_type" value="polovina">
      <input type="hidden" name="order_period" value="<?php echo $order_period; ?>">
      <input type="submit" name="submit" value="Загрузить файл в заказ" class="btn-primary">
    </div>
      <button id="ADDFILE2" class="btn-sm btn-block btn-info">
        Добавить файл в половину работы
      </button>
 <?php echo form_close(); ?>   
</div>                           
 <!-- second part of order end -->

 <!-- complete order file start -->
<div class="file_wrapper">
  <h5>Вся работа</h5>
  <div>
    <?php foreach ($order_essays as $order_essays_single): ?>
      <div class="clearfix alredy_downloaded">
        <div class="col-sm-8">
          № <?php echo $order_essays_single['order_id']; ?><br/>
          <?php echo $order_essays_single['file_name']; ?><br/>
          <?php echo $order_essays_single['upload_date']; ?><br/>
        </div>
        <div class="col-sm-4"> 
          <?php echo form_open('Filedownload/download/'.$order_essays_single['tmp_name'], array('class'=>'jddform'));?>
            <input type="hidden" name="path" value="<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_essays_single['tmp_name']; ?>">
            <input type='hidden' name='filename' value="<?php echo $order_essays_single['tmp_name']; ?>">
            <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
            <button type="submit" name="submit" class="btn-warning">
              <i class="fa fa-download"></i>
            </button>
          <?php echo form_close();?> 
        </div>
      </div>
     <?php endforeach; ?>  
  </div>
  <?php echo form_open_multipart('Order/upload_file'); ?>
      <div id="uploadFileContainer3"></div>
      <div id="submit3" style="display: none;">
        <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
        <input type="hidden" name="alias" value="<?php echo $alias; ?>">
        <input type="hidden" name="upload_type" value="essay">
        <input type="hidden" name="name_type" value="vsia_rabota">
        <input type="hidden" name="order_period" value="<?php echo $order_period; ?>">
        <input type="submit" name="submit" value="Загрузить файл в заказ" class="btn-primary">
      </div>
      <button id="ADDFILE3" class="btn-sm btn-block btn-info">
        Добавить файл в весь заказ
      </button>
  <?php echo form_close(); ?>
</div>
 <!-- complete order file start -->

 <!-- check unic file start -->
<div class="file_wrapper">
  <h5>Проверка на уникальновсть</h5>
  <div>
    <?php foreach ($order_unic as $order_unic_single): ?>
    <div class="clearfix alredy_downloaded">
      <div class="col-sm-8"> 
        № <?php echo $order_unic_single['order_id']; ?><br/>
        <?php echo $order_unic_single['file_name']; ?><br/>
        <?php echo $order_unic_single['upload_date']; ?><br/>
      </div>
      <div class="col-sm-4"> 
        <?php echo form_open('Filedownload/download/'.$order_unic_single['tmp_name'], array('class'=>'jddform'));?>
            <input type="hidden" name="path" value="<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period; ?>/<?php echo $orderid;?>/<?php echo $order_unic_single['tmp_name']; ?>">
            <input type='hidden' name='filename' value="<?php echo $order_unic_single['tmp_name']; ?>">
            <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
            <button type="submit" name="submit" class="btn-warning">
              <i class="fa fa-download"></i>
            </button>
        <?php echo form_close();?> 
      </div>
    </div>
    <?php endforeach; ?>  
  </div>
  <?php echo form_open_multipart('Order/upload_file'); ?>
    <div id="uploadFileContainer4"></div>
    <div id="submit4" style="display: none;">
      <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
      <input type="hidden" name="alias" value="<?php echo $alias; ?>">
      <input type="hidden" name="upload_type" value="unic">
      <input type="hidden" name="name_type" value="unic">
      <input type="hidden" name="order_period" value="<?php echo $order_period; ?>">
      <input type="submit" name="submit" value="Загрузить файл в заказ" class="btn-primary">
    </div>
    <button id="ADDFILE4" class="btn-sm btn-block btn-info">
    Добавить файл в проверку на уникальность
    </button>
  <?php echo form_close(); ?>
</div>
<!-- check unic file end -->



</div>
<?php } ?>
</div>

</div> 
<!-- ===========Сообщения заказчику============== -->

<div class="tab-pane fade" id="messages">

  <div class="row clearfix">
    <h3 class="pull-left">Сообщения заказчику</h3>
    <form class="pull-right" onsubmit="return false">
      <input type="hidden" name="orderid" value="<?php echo $orderid;?>">
      <input type="hidden" name="chatHistory" value="client">
      <!-- <button type="submit" style="margin-top: 10px" id="cl_wr_history" class="btn btn-danger btn-sm">Вся история сообщений</button> -->
    </form>
  </div>  




  <hr style="border: 1px dashed #bfbfbf;" />
  <div class="row" >
                       
<div class="refWrapper">
<div id="refresh_zak_chat">
<!-- history in messages form start-->
<div class="his_wrap" id="his_wr_to_client">
<?php foreach (array_reverse($mes_cl_wr) as $messages){ ?>

<?php if($messages['from_who'] === 'zakaz' && $messages['whom'] === 'avtor') { ?>
  <div class="history_msg_wrapper zak iSend">
    <h2>Автору <span class="fr_adm_mes mng_mes">от Заказчика</span></h2>
    <ul class="media-list">
      <li class="media media-replied">
        <div class="media-body">
          <div class="well well-lg">
            <ul class="media-date text-uppercase reviews list-inline">
              <li>
                Дата: 
                <?php $yearC = substr($messages['date_posted'], 0, 4); 
                 $monthC = substr($messages['date_posted'], 5, 2);
                 $dayC = substr($messages['date_posted'], 8, 2);
                 $timeC = substr($messages['date_posted'], 10)
                ?>
                <?php echo $dayC.'.'.$monthC.'.'.$yearC.' '.$timeC; ?>
              </li>
            </ul>
            <p class="media-comment"><?php echo str_replace('\\', '', $messages['message_body']); ?></p>
          </div>
        </div>
      </li>
    </ul>
  </div>
<?php } elseif($messages['from_who'] === 'avtor' && $messages['whom'] === 'zakaz') { ?>
  <div class="history_msg_wrapper zak myMes">
      <h2>Заказчику <span class="fr_adm_mes mng_mes">от Автора</span></h2>
      <ul class="media-list">
        <li class="media media-replied">
          <div class="media-body">
            <div class="well well-lg">
               <ul class="media-date text-uppercase reviews list-inline">
                  <li>
                    Дата: 
               <?php $yearC = substr($messages['date_posted'], 0, 4); 
                     $monthC = substr($messages['date_posted'], 5, 2);
                     $dayC = substr($messages['date_posted'], 8, 2);
                     $timeC = substr($messages['date_posted'], 10)
                    ?>
                    <?php echo $dayC.'.'.$monthC.'.'.$yearC.' '.$timeC; ?>    
                  </li>
               </ul>
                <p class="media-comment"><?php echo str_replace('\\', '', $messages['message_body']); ?></p>
            </div>
          </div>
        </li>
      </ul>
   </div>
  <?php } ?>

<?php } ?>
<div id="zakaz"></div>
</div>
<!-- history in messages form end-->

</div>
</div>
<hr>

<!-- Send message form start -->
<div class='jsError'></div>
<form onsubmit="return false" class="clearfix">
<div class="form-group">
    <div class="txt_danger text-center"> 
      Только сообщения, связанные с этим заказом. Не публикуйте свою личную информацию
    </div>

    <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
    <input type='hidden' name='clientid' value="<?php echo $customer;?>">
    <input type='hidden' name='customer_email' value="<?php echo $customer_email;?>">
    <input type='hidden' name='preferred_writer' value="<?php echo $preferred_writer;?>">
    <input type='hidden' name='receiverid' value="<?php echo $customer;?>">
    <input type='hidden' name='senderid' value="<?=$this->session->userdata('writer_id')?>">
    <input type='hidden' name='sender_email' value="<?=$this->session->userdata('email')?>">
    <input type='hidden' name='sender_name' value="<?=$this->session->userdata('firstname')?> <?=$this->session->userdata('lastname')?>">
    <input type="hidden" name="ch_reciever" value="zakaz">
    <input type="hidden" name="user_level" value="Автора">
    <input type='hidden' name='from_who' value="avtor">
    <div class="row">
      <div class="col-sm-12">
        <textarea class="form-control" required="" placeholder="Сообщение" id="messageBody" rows="5" name="message_body"></textarea>
      </div>
    </div>
    <br/>
    <div class="row" style="padding: 0 15px;">
    <input type="hidden" name="file_template" value="">
    <button class="btn btn-success btn-circle pull-left send_message_to_client" type="submit" id="submitComment"> Отправить</button>
    </div>
  </form>
<!-- Send message form start -->

    </div>
  </div>
</div>


<!-- Сообщения менеджеру -->



<div class="tab-pane fade" id="managerMessages">
  <h3 class="pull-left">Сообщения менеджеру</h3>
    <form class="pull-right" onsubmit="return false">
      <input type="hidden" name="orderid" value="<?php echo $orderid;?>">
      <input type="hidden" name="chatHistory" value="manager">
      <!-- <button type="submit" style="margin-top: 10px" id="mngr_wr_history" class="btn btn-danger btn-sm">Вся история сообщений</button> -->
    </form>
  <hr style="border: 1px dashed #bfbfbf;" />
  <div class="row">                  
                                           
<div class="his_wrap">

<div class="refWrapperManager">
  <div id="refresh_mngr_chat">
      <div class="his_wrap" id="his_wr_to_manager">

      <?php foreach (array_reverse($mes_manager_wr) as $messages){ ?>
      <?php if(($messages['from_who'] === 'manager' || $messages['from_who'] === 'admin') && $messages['whom'] === 'avtor'){ ?>
        <div class="history_msg_wrapper man">
          <h2>Автору
            <?php if($messages['senderid'] === '2562') { ?>
              <span class="fr_adm_mes adm_mes">от Администратора</span>
            <?php } else { ?>
                <span class="fr_adm_mes mng_mes">от Менеджера</span>
            <?php } ?>
          </h2>  
            <ul class="media-list">
              <li class="media media-replied">
                <div class="media-body">
                  <div class="well well-lg">
                    <ul class="media-date text-uppercase reviews list-inline">
                      <li>
                        Дата:  
                        <?php $yearC = substr($messages['date_posted'], 0, 4); 
                         $monthC = substr($messages['date_posted'], 5, 2);
                         $dayC = substr($messages['date_posted'], 8, 2);
                         $timeC = substr($messages['date_posted'], 10)
                        ?>
                        <?php echo $dayC.'.'.$monthC.'.'.$yearC.' '.$timeC; ?>
                      </li>
                    </ul>
                    <p class="media-comment"><?php echo str_replace('\\', '', $messages['message_body']); ?></p>
                  </div>
                </div>
             </li>
            </ul>
        </div> 
      <?php } elseif($messages['from_who'] === 'avtor' && ($messages['whom'] === 'manager' || $messages['whom'] === 'admin') ) { ?>

      <div class="history_msg_wrapper man me">
        <h2>Менеджеру <span class="fr_adm_mes mng_mes">от Автора</span></h2>  
        <ul class="media-list">
         <li class="media media-replied">
            <div class="media-body">
              <div class="well well-lg">
                 <ul class="media-date text-uppercase reviews list-inline">
                    <li>
                     Дата:
                      <?php $yearC = substr($messages['date_posted'], 0, 4); 
                       $monthC = substr($messages['date_posted'], 5, 2);
                       $dayC = substr($messages['date_posted'], 8, 2);
                       $timeC = substr($messages['date_posted'], 10)
                      ?>
                      <?php echo $dayC.'.'.$monthC.'.'.$yearC.' '.$timeC; ?>
                    </li>
                </ul>
                <p class="media-comment">
                  <?php echo str_replace('\\', '', $messages['message_body']); ?>
                </p>
              </div>
            </div>
          </li>
        </ul>
      </div>

      <?php } ?>

      <?php } ?>
      <div id="manager"></div>
    </div>
  </div>
</div>

</div>
  <hr>
<div class='jsError'></div>
<form onsubmit="return false" class="clearfix">
<div class="form-group">

    <p class="txt_danger text-center""> 
      Только сообщения, связанные с этим заказом. Не публикуйте свою личную информацию
    </p>

    <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
    <input type='hidden' name='clientid' value="<?php echo $customer;?>">
    <input type='hidden' name='customer_email' value="<?php echo $customer_email;?>">
    <input type='hidden' name='preferred_writer' value="<?php echo $preferred_writer;?>">
    <input type='hidden' name='receiverid' value="<?php echo $manager_id; ?>">
    <input type='hidden' name='senderid' value="<?=$this->session->userdata('writer_id')?>">
    <input type='hidden' name='sender_email' value="<?=$this->session->userdata('email')?>">
    <input type='hidden' name='sender_name' value="<?=$this->session->userdata('firstname')?> <?=$this->session->userdata('lastname')?>">
    <input type="hidden" name="ch_reciever" value="manager">
    <input type="hidden" name="user_level" value="Автора">
    <input type='hidden' name='from_who' value="avtor">
    <div class="row">
      <label for="email" class="col-sm-2 control-label">Сообщение</label>
      <div class="col-sm-12">
        <textarea class="form-control" rows="5" name="message_body" id="massage_body_manager"></textarea>
      </div>
    </div>
    <br/>
    <div class="row file_chat_btns_wrapper" style="padding: 0 15px;">
    <button class="btn btn-success btn-circle pull-left sendMesToMngr" type="submit" id="submitComment"><span class="fa fa-send"></span> Отправить</button>
    <?php if($accepted != 'false'){ ?>
    <select name="file_send" id="fileSelection">
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
          <?php } ?>
        </optgroup>
        <?php } ?>
    </select>

    <input type="hidden" name="file_template" id="file_template_holder" value="">
        <a tabindex="0" data-trigger="hover", role="button" data-toggle="popover" data-trigger="focus" title="Файлы" data-content="Чтобы прикрепить файл к переписке, его необходимо сначала загрузить в заказ, сделать это можно во вкладке 'Инструкции по заказу'" data-placement="top"><i class="fa fa-question-circle"></i></a>
      <?php } ?>  
    </div>
    </div>
</form>  
<script type="text/javascript">
  function createFileTmplate(tmp_name, orderid){
    let path = '<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period; ?>/'+ orderid +'/'+tmp_name; 
    template = '<div>'+ tmp_name +'</div>';
    template += '<form action="https://legko-v-uchebe.com/in/Filedownload/download/'+ tmp_name +'" class="jddform" method="post" accept-charset="utf-8">';
    template += '<input type="hidden" name="path" value="'+ path +'">'
    template += '<input type="hidden" name="filename" value="'+ tmp_name +'">';
    template += '<input type="hidden" name="orderid" value="'+ orderid +'">';
    template += '<button type="submit" name="submit" class="btn-warning">';
    template += '<i class="fa fa-download"></i>';
    template += '</button></form>'
    document.getElementById('file_template_holder').value = template;
  }

  let fileSel = document.getElementById('fileSelection');
  let fileSelOpt = fileSel.querySelectorAll('option');
  fileSel.addEventListener('change', function(){
    for(let k = 0; k <= fileSelOpt.length-1; k++){
      fileSelOpt[k].removeAttribute('selected');
    }
    for(let i = 0; i <= fileSelOpt.length-1; i++){
      if(fileSelOpt[i].selected){
        if(fileSelOpt[i].value != 'false'){
          createFileTmplate(fileSelOpt[i].getAttribute('data-tmpname'), <?php echo $orderid; ?>)
        } else {
          document.getElementById('file_template_holder').value = '';
          return false
        }
      }
    }
  })

</script>

  </div>
</div>


<!-- =========================== -->

<div class="tab-pane fade" id="schedule">
                        <table class="table">
                           <tbody>
                               <tr>
                                 <td class="text-right col-sm-4"><strong>План:</strong></td>
                                 <td class="text-left"> <?php echo $plan_age;?> </td>
                              </tr> 
                              <tr>
                                 <td class="text-right col-sm-4"><strong>Половина работы: </strong></td>
                                 <td class="text-left"><?php echo $half_work;?></td>
                              </tr>
                              <tr>
                                 <td class="text-right col-sm-4"><strong>Вся работа: </strong></td>
                                 <td class="text-left"><?php echo $all_work; ?></td>
                              </tr>
                              <tr>
                                 <td class="text-right col-sm-4"><strong>Доработка до: </strong></td>
                                 <td class="text-left"><?php echo $dorabotka;?></td>
                              </tr>
                            </tbody>
                          </table>
                          </div>                                     
                         
                        
<hr style="border: 1px dashed #bfbfbf;" />
                     
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
</div>
</div>


    <script>
   $(document).ready(function() {
       $('form.assign_writer').on('submit',
         function(form){
           form.preventDefault();
           $.post('<?php echo ci_site_url(); ?>Ordersed/assign_writer', $('form.assign_writer').serialize(), function(data){
             $('div.jsError').html(data);
             $('div.show').show();
             $('div.show').hide();
           });
           });
   
   });
</script>   

<script type="text/javascript">
   jQuery(document).ready(function($){
       function doAddSmth(btnId, blockId, idEl){
            $(document).on('click', btnId, function(event) {
               event.preventDefault();
               $(blockId).css("display", "block")
               addFileInput(idEl);
            });
       }
        function addFileInput(idEl) {
           var html ='';
           html +='<div class="alert alert-info">';
           html +='<button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>';
           html +='<input type="file" name="multipleFiles[]">';
           html +='</div>';
           $(idEl).append(html);
        }

        for(var i = 1; i <= 4; i++){
          doAddSmth(("button#ADDFILE"+i), ("div#submit"+i),("div#uploadFileContainer"+i));
        }
   });
   
</script>

<script>

$(document).ready(function() {
    $('form.writer_complete').on('submit',
      function(form){
        form.preventDefault();
        $.post('<?php echo ci_site_url(); ?>Ordersed/writer_complete', $('form.writer_complete').serialize(), function(data){
          $('div.jsError').html(data);
          $('div.show').show();
          $('div.show').hide();
          location.reload();
        });
        });

});
</script>

<!-- This script is responsibe for revealing the request button once request this order is clicked.  -->
<script>
$(document).ready(function(){
   $(".request_order").hide();
    $("#request_order").click(function(){
        $(".request_order").show();
    });

});
</script>

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
<script type="text/javascript">

function dgi(id){return document.getElementById(id);}

function addYourMessage(mesBody, user_level, mesDate, chatHistory, whom, fileTpl){
  var html, usr_lvl, whom, cls, mB, wh;

  switch(user_level){
    case 'writer': usr_lvl = 'от автора'; break;
    case 'client': usr_lvl = 'от заказчика'; break;
    case 'manager': usr_lvl = 'от менеджера'; break;
    case 'admin': usr_lvl = 'от администратора'; break;
  }

  switch(whom){
    case 'writer': wh = 'Автору'; cls = 'iSend'; break;
    case 'client': wh = 'Заказчику'; cls = 'myMes'; break;
    case 'manager': wh = 'Менеджеру'; cls = 'myMes'; break;
  }

  console.log(chatHistory);


  if(dgi(mesBody)!=null){mB = dgi(mesBody).value} else{mB = mesBody}


  html =  '<h2>'+wh+' <span class="fr_adm_mes mng_mes">'+usr_lvl+'</span></h2>'
  html +=  '<ul class="media-list">'
  html +=   '<li class="media media-replied">'
  html +=      '<div class="media-body">'
  html +=        '<div class="well well-lg">'
  html +=          '<ul class="media-date text-uppercase reviews list-inline">'
  html +=            '<li>Дата: '+mesDate+'</li>'
  html +=          '</ul>'
  html +=          '<p class="media-comment">'+repl(mB + fileTpl)+'</p>'
  html +=        '</div>'
  html +=      '</div>'
  html +=     '</li>'
  html +=   '</ul>'


  var div = document.createElement('div');
  div.className = 'history_msg_wrapper zak '+ cls;
  div.innerHTML = html;
  console.log(document.querySelector(chatHistory+' .his_wrap'));
  document.querySelector(chatHistory+' .his_wrap').appendChild(div);
}



function ajax_send_message(btnSend, mesBody, refBlockId, refBlockWrapClName){
    $(btnSend).on('click',
      function(form){
      let messageBody = dgi(mesBody).value;
      var ftar = form.target.parentElement.parentElement.parentElement;
      // console.log(ftar.);

      var from_who;
       $.post('<?php echo ci_site_url(); ?>Messages/post_message_ajax', $(ftar).serialize(), function(data){
          data = JSON.parse(data);
          var fileTpl = '';
          if(ftar.querySelector('#file_template_holder') != undefined){
           fileTpl = ftar.querySelector('#file_template_holder').value;
          }


            switch (refBlockId){
              case '#refresh_zak_chat': from_who = 'client'; break;
              case '#refresh_mngr_chat': from_who = 'manager'; break;
            }
            console.log(fileTpl);
            addYourMessage(mesBody, '<?php echo $this->session->userdata('user_level'); ?>', data[1], refBlockId, from_who, fileTpl);



            if(data[0] === 'true'){
              // $(refBlockId).load(window.location.href + " " + refBlockId);
              dgi(mesBody).value = '';
              $(refBlockWrapClName).scrollTop($(refBlockId).height()+ 120);
            } else {
              alert('Необходимо ввести текст сообщения');
            }

            dgi('fileSelection').querySelector('option:first-child').setAttribute('selected', 'selected');
            dgi('file_template_holder').value = '';

       });

      }
      );

    // setInterval(function(){ 
    //   $(refBlockId).load(window.location.href + " " + refBlockId); 
    // }, 10000);
}

ajax_send_message('button.send_message_to_client', 'messageBody', '#refresh_zak_chat', '.refWrapper');
ajax_send_message('button.sendMesToMngr', 'massage_body_manager', '#refresh_mngr_chat', '.refWrapperManager');


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
</script>

<!-- Modal messages history -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header his">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Полная история сообщений по заказу</h4>
      </div>
      <div id="history_cl_wr_modal" class="modal-body">
      </div>

    </div>
  </div>
</div>
<!-- Modal history -->

<script>
function getMesHistory(btnHistory){ 
    $(btnHistory).on('click',
    function(form){
    var ftar = form.target.parentElement;

    ftar.onsubmit = () => {return false};

     $.post('<?php echo ci_site_url(); ?>Messages/mes_cl_wr_history', $(ftar).serialize()) 
       .done(function(data){
        data = JSON.parse(data);
        dgi('history_cl_wr_modal').innerHTML = '';
        console.log(data);
        putHistory(data)
        $('#myModal').modal();
     });

    });
}


getMesHistory('button#cl_wr_history');
getMesHistory('button#mngr_wr_history');

  function createMes(mesBody, mesDate, clName, title) {
  let day = mesDate.substring(10, 8)+'.';
  let month = mesDate.substring(7, 5)+'.';
  let year =  mesDate.substring(0, 4)+' ';
  let hour = mesDate.substring(11);
  let verdate = day+month+year+hour;


  let toClient = '';
  console.log(mesBody.replace('\\"', ""));
  toClient +='<div class="history_msg_wrapper zak '+ clName +'">';
  toClient +=  '<h2>'+ title +'</h2>';
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
      createMes(obj[key].message_body, obj[key].date_posted, '', 'Заказчику');
    } else if(obj[key].whom === 'manager'){
      createMes(obj[key].message_body, obj[key].date_posted, '', 'Менеджеру');
    } else {
      createMes(obj[key].message_body, obj[key].date_posted, 'meSend', 'Мне');
    }
  }
}



(function(){
  var tabs = document.querySelectorAll('.panl-heading .nav li a');
  var tabsHolder = document.querySelector('.panl-heading .nav');

  tabsHolder.addEventListener('click', function(e){
      window.history.replaceState({}, window.location.href, '<?php echo $orderid; ?>#'+e.target.href.split('#')[1]);
  })  

    if(window.location.href.indexOf("#") > -1){
      $('a[href="#'+window.location.href.split("#")[1] +'"]').tab('show');
    }


})()
</script>



