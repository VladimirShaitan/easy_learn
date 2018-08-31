<?php if(empty($orderid)) { ?>
    <div class="text-center">
      <h2>Этого заказа больше не существует или он был удален</h2>
      <a href="/in/order/clientmyorders" style="background: green;color: white;padding: 10px 20px;margin-top: 19px;display: inline-block;">К моим закзам</a>
    </div>
<? } elseif($this->session->userdata('writer_id') === $customer && $this->session->userdata('user_level') != 'client'){ ?>

    <div class="text-center">
      <h2>Эта страница доступна только для заказчика</h2>
      <a href="/in/order/clientmyorders" style="background: green;color: white;padding: 10px 20px;margin-top: 19px;display: inline-block;">К моим закзам</a>
    </div>

<?php } else { ?>
<script>
function chatScrollFunc(){
    var top;
      if (window.location.href.indexOf("#manager") > -1 || window.location.href.indexOf("#admin") > -1) 
        {
            $('#tabManagertSc').tab('show');

        } else if(window.location.href.indexOf("#avtor") > -1){ 
            $('#tabAvtorSc').tab('show');
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

<div class="col-md-8">
 <!-- <pre><?php // echo ci_site_url(); ?></pre> -->

  <div class="orders-profile loggedin">

   <span id="thxOrd"></span>
<script>
  (function(){
  if(window.location.href.indexOf("#neworder") > -1){
    var tpl = '<div class="ord_create_suc_mes">Спасибо, Ваш заказ принят на оценку</div>';
    var curLink = window.location.href.split('#')[0];
    document.getElementById('thxOrd').innerHTML = tpl;
  
   setTimeout(function(){
    window.history.replaceState({}, window.location.href, curLink.split('/')[curLink.split('/').length-1]);
   },100)


  }
})()
</script>

  <div class="main">
    <div class="row">
      <div class='jsError'></div>
      <div class="col-sm-6">
          <h2>Заказ: # <?php echo $orderid;?></h2>
      </div>    
      <hr/>

<div class="row">
  <div class="col-md-12">
  <div class="with-nav-tabs panel-default">
      <div class="panl-heading">
          <ul class="nav nav-tabs nav-justified">
              <li class="active"><a href="#instructions" data-toggle="tab">Инструкции</a></li>
              <?php if($order_status != 'Openproject' && $preferred_writer != '0') { ?>
                <li><a href="#messagesClient" id="tabAvtorSc" data-toggle="tab">Сообщения Автору</a></li>
              <?php } ?>
                <li><a href="#messagesManager" id="tabManagertSc" data-toggle="tab">Сообщения Менеджеру</a></li>
          </ul>
      </div>
      <div class="panel-body">
        <div class="tab-content">
          <div class="tab-pane fade in active" id="instructions">
            <table class="table">
              <tbody>
                <tr>
                  <td class="text-right col-sm-4"><strong>Предмет: </strong></td>
                  <td class="text-left">
                    <?php echo $subject;?>
                  </td>
                </tr>
                <tr>
                  <td class="text-right col-sm-4"><strong>Статус заказа:</strong></td>
                  <td class="text-left">
                    <?php 
                    if($client_paid==='unpaid'){ 
                      echo "Неоплачен";
                    } elseif ($client_paid==='paid' || $client_paid==='paid_client' || $client_paid==='paid_writer'){
                      echo "Оплачен";
                    } else {
                      echo "Оплачена половина";
                    } 
                      echo ' || ' ; 
                  ?>

                    <?php if($order_status ==='Openproject'){ 
                      echo "Открытый проект";} 
                      elseif ($order_status==='Revision'){
                      echo "На доработке";
                    } elseif ($order_status==='Completed' || $order_status==='pending' || $order_status==='onlyAvtorDoplata'){
                      echo "Завершенный";
                    } elseif($order_status === 'Archived'){
                      echo 'В архиве';
                    } elseif ($order_status === 'Assigned'){
                      echo "На выполнении";
                    } elseif ($order_status==='Cancelled'){
                       echo "Половина работы";
                    }  ?>

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
                  <td class="text-right col-sm-4"><strong>Бюджет:</strong></td>
                  <td class="text-left"><?php echo $sources;?> грн.</td>
              </tr>
              <tr>
                  <td class="text-right col-sm-4">
                    <strong>Согласованная цена:</strong>
                  </td>
                  <td class="text-left">
                    <?php if($oplata != '') { ?>
                      <span style="background: #109e10; color: white; padding: 5px;">
                       <?php echo $oplata; ?> грн.
                      </span>
                      <?php  } else { ?>
                        <span style="background: #d9534f; color: white; padding: 5px;">Цена пока не согласованна
                        </span>
                      <?php } ?>

                      <!-- квитанция -->


      <div class="kvitantsia">
        <!-- <h5>Квитанции</h5> -->
        <div>
          <?php foreach ($order_check as $order_check_single): ?>
            <div class="file_cus_holder clearfix">
              <div class="text-center col-sm-6">
                  <?php echo $order_check_single['file_name']; ?> <br>    
                  <?php // echo $order_check_single['upload_type']; ?>
              </div>
              <div class="text-center col-sm-6">
                  <?php echo form_open('filedownload/download/'.$order_check_single['tmp_name'], array('class'=>'jddform'));?>
                    <input type="hidden" name="path" value="<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_check_single['tmp_name']; ?>">
                    <input type='hidden' name='filename' value="<?php echo mb_convert_encoding($order_check_single['tmp_name'], 'UTF-8'); ?>">
                    <input type='hidden' name='orderid' value="<?php echo $orderid;?>">

                    <!-- <input type="submit" name="submit" value="Скачать" class="download_btn"> -->
                    <button type="submit" name="submit" class="download_btn"><i class="fa fa-download"></i></button>
                  <?php echo form_close();?>
              </div>
            </div>
          <?php endforeach; ?>
         </div>
         <?php echo form_open_multipart('Order/upload_file'); ?>
            <div id="uploadFileContainerCH"></div>
            <div id="submitCH" style="display: none;">
                <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
                <input type="hidden" name="alias" value="<?php echo $alias; ?>">
                <input type="hidden" name="upload_type" value="check">
                <input type="hidden" name="name_type" value="check">
                <input type="hidden" name="order_period" value="<?php echo $order_period; ?>">
                <input type="submit" name="submit" value="Отправить" class="btn-primary">
            </div>
            <button id="ADDFILE_CH" class="btn-sm btn-block btn-warning">
              Добавить квитанцию об оплате
            </button>
          <?php echo form_close(); ?>
      </div>

                      <!-- квитанция -->


                    </td>
              </tr>
              <tr>
                  <td class="text-right col-sm-4"><strong>Срок:</strong></td>
                  <td class="text-left">
                    <?php
                        $datetime1 = new DateTime(date('Y-m-d H:i:s'));
                        $datetime2 = new DateTime($deadline);
                        if($datetime1 >= $datetime2){
                          echo $urgency  . " | Срок вышел";
                        }
                      if($datetime1 <= $datetime2){
                      $interval = $datetime1->diff($datetime2);
                      $elapsed = $interval->format('%a дней %h часов %i минут');
                      echo  $urgency . ' | ' . $elapsed;
                    } ?>
                  </td>
              </tr>
              <?php if(!empty($doplata)) { ?>
              <tr>
                <td class="text-right col-sm-4"><b>Доплата по заказу</b></td>
                <td class="text-left"><?php echo $doplata; ?> грн. <b><?php if($doplata_status != 'false'){echo '<span style="background: #109e10; color: white; padding: 5px;">Оплачено</span>';}else{echo '<span style="background: red; color: white; padding: 5px;">Не оплачено</span>';} ?></b> </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
      <!-- order details -->

      <!-- payment -->


<?php if($this->session->userdata('user_level')!='writer'){ ?>
<?php if($oplata != '' && ($client_paid === 'unpaid' || $client_paid === 'half') || $doplata_status==='false') { ?>
   
  <h3>Оплата</h3>
  <h5>Обратите вниманиe что оплата производится через <img width="150px" src="https://legko-v-uchebe.com/wp-content/uploads/2018/06/PrivatBank-corporate-logo-latina.png"></h5>
  <div style="padding: 10px 0 15px; border: 2px dashed; border-left: none; border-right: none" class="text-center clearfix" id="payWrap">

  <?php if($oplata != '' && ($client_paid === 'unpaid' || $client_paid === 'half') ) { ?> 
      <form id="pay" <?php if($client_paid === 'half') {?>style="display: none" <?php } ?>method="POST" class="col-sm-4" accept-charset="utf-8">
        <div class="form-group child">
          <input class="input-field" type="hidden" name="amount" value="
          <?php echo $oplata; ?>">
          <input type="hidden" name="liq_orderid" value="<?php echo $orderid; ?>">
          <input type="hidden" name="sum_part" value="full">
        </div>
        <button id="payAll" class="btn-info">Оплатить всю работу</button>
      </form>
    
      <form id="payha" method="POST" class="col-sm-4 <?php if($client_paid === 'half') {?>col-sm-6<?php } ?>" accept-charset="utf-8">
        <div class="form-group child">
          <input class="input-field" type="hidden" name="amount" value="
          <?php echo $oplata/2; ?>">
          <input type="hidden" name="liq_orderid" value="<?php echo $orderid; ?>">
          <input type="hidden" name="sum_part" value="<?php if($client_paid === 'half') {echo 'rest';} else{echo 'half';}?>">
        </div>
        <button id="payHalf" class="btn-info"><?php if($client_paid === 'half') {?>Оплатить вторую часть<?php } else { ?> Оплатить половину<?php } ?></button>
      </form>
<?php } ?>

<?php if($doplata_status === 'false'){ ?>
        <form id="payDopl" method="POST" class="col-sm-4" accept-charset="utf-8">
        <div class="form-group child">
          <input class="input-field" type="hidden" name="amount" value="<?php echo $doplata; ?>">
          <input type="hidden" name="liq_orderid" value="<?php echo $orderid; ?>">
          <input type="hidden" name="sum_part" value="doplata">
        </div>
        <button id="payDopl" class="btn-info">Доплата по заказу (Оплатить)</button>
      </form>
<?php }?>


      </div>
  <script>
    function payMe(btnTrigId){ 
      $(btnTrigId).on('click',
      function(form){
      var ftar = form.target.parentElement;
      ftar.onsubmit = () => {return false};
       $.post('<?php echo ci_site_url(); ?>Order/payMe', $(ftar).serialize()) 
         .done(function(data){
          console.log(data);
          document.getElementById('payWrap').innerHTML = data;
          // $(btnTrigId).innerHTML = data;
       });

      });
  } 
  payMe('#payAll');
  payMe('#payHalf');
  payMe('#payDopl');
  </script>

  <div id="shitti">
    
  </div>

<?php } ?>

<?php } ?>

<!-- payment -->


     <?php if($instructions != '') { ?>     
          <h4>Детали по заказу </h4>
          <hr/>
          <div class="project-list-desc">
            <p>
              <?php echo stripslashes($instructions);?>
            </p>
          </div>
          <hr/>
     <?php } ?> 
<!-- <pre><?php // echo  $_SERVER['DOCUMENT_ROOT']; ?></pre> -->
<div class="files_sep_cl">
  Файлы по заказу
</div>
<!-- Files -->
  <div class="row">
<!-- materials to order start -->
      <div class="col-md-4">
        <h5>Материалы по заказу</h5>
        <div>
          <?php foreach ($order_files as $order_files_single): ?>
            <div class="file_cus_holder">
              <div class="text-center">
                  <?php echo $order_files_single['file_name']; ?> <br>    
                  <?php // echo $order_files_single['upload_type']; ?>
              </div>
              <div class="text-center">
                  <?php echo form_open('filedownload/download/'.$order_files_single['tmp_name'], array('class'=>'jddform'));?>
                    <input type="hidden" name="path" value="<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_files_single['tmp_name']; ?>">
                    <input type='hidden' name='filename' value="<?php echo mb_convert_encoding($order_files_single['tmp_name'], 'UTF-8'); ?>">
                    <input type='hidden' name='orderid' value="<?php echo $orderid;?>">

                    <input type="submit" name="submit" value="Скачать" class="download_btn">
                  <?php echo form_close();?>
              </div>
            </div>
          <?php endforeach; ?>
         </div>
         <?php echo form_open_multipart('Order/upload_file'); ?>
            <div id="uploadFileContainer2"></div>
            <div id="submit" style="display: none;">
                <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
                <input type="hidden" name="alias" value="<?php echo $alias; ?>">
                <input type="hidden" name="upload_type" value="material">
                <input type="hidden" name="name_type" value="material">
                <input type="hidden" name="order_period" value="<?php echo $order_period; ?>">
                <input type="submit" name="submit" value="Отправить" class="btn-primary">
            </div>
            <button id="ADDFILE2" class="btn-sm btn-block btn-warning">
              Прикрепить файл
            </button>
          <?php echo form_close(); ?>
      </div>
<!-- plan files start -->
  <div class="col-md-4">
    <h5>План</h5>
      <div>
      <?php foreach ($order_plan as $order_plan_single): ?>
        <?php if($order_plan_single['submited'] === 'true') { ?>
        <div style="box-shadow: 0 0px 3px 0px;; padding: 5px; margin-bottom: 5px ">
          <div style="text-align: center;">
              <?php echo $order_plan_single['file_name']; ?> <br> 
              [<?php echo $order_plan_single['upload_date']; ?>]
          </div>
          <div style="text-align: center">
              <?php echo form_open('filedownload/download/'.$order_plan_single['tmp_name'], array('class'=>'jddform'));?>
              <input type="hidden" name="path" value="<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_plan_single['tmp_name']; ?>">
              <input type='hidden' name='filename' value="<?php echo $order_plan_single['tmp_name']; ?>">
              <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
              <input style="margin: 0 auto; padding: 5px 10px;" type="submit" name="submit" value="Скачать" class="btn-warning">
              <?php echo form_close();?>
          </div>
        </div>
        <?php } else { ?>
        <div class="sbmFile">Файл будет доступен для скачивания после проверки менеджером</div>
        <?php } ?>
      <?php endforeach; ?>
          <?php echo form_open_multipart('Order/upload_file'); ?>
        <div id="uploadFileContainer1"></div>
        <div id="submit_plan" style="display: none;">
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
      <!-- plan buttons start-->

      <?php if($plan === 'need_to_choose') { ?>

          <?php echo form_open('Messages/clientPlanSubmit', array('class'=>'jsform'));?>
             <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
             <input type="hidden" name="writer_id" value="<?php echo $preferred_writer;?>">
             <input type="hidden" name="client_name" value="<?php echo $customer_name; ?>">
             <input type="submit" name="submit" style="width: 100%; padding: 4px; margin-top: 10px; background: #109e10;" value="Утвердить план" class="btn-warning">
          <?php echo form_close();?>

           <?php echo form_open('Messages/clientPlanDontNeedToSubmit', array('class'=>'jsform'));?>
             <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
             <input type="hidden" name="writer_id" value="<?php echo $preferred_writer;?>">
             <input type="hidden" name="client_name" value="<?php echo $customer_name; ?>">
             <input type="submit" name="submit" style="width: 100%; padding: 4px; background: red;" value="Утверждать не нужно" class="btn-warning">
            <?php echo form_close();?>

      <?php } ?>


      <?php if($plan === 'false') { ?>
        <div style="text-align: center; margin: 10px 0;">
          <div style="background: #109e10; color: white; display: inline-block; padding: 5px; width: 100%">
              На выполнении
          </div>
        </div> 
      <?php } elseif($plan === 'dont_need') { ?>
          <div style="text-align: center; margin: 10px 0;">
            <div style="background: red; color: white; display: inline-block; padding: 5px; width: 100%">
                План утверждать не нужно
            </div>
          </div> 
        <?php } elseif ($plan === 'various') { ?>
         <div style="text-align: center; margin: 10px 0;">
            <div style="background: #109e10; color: white; display: inline-block; padding: 5px; width: 100%">
                 Вот и план работы  на утверждение у научного руководителя. Обратите внимание по его утверждению напишите нам  в чат по заказу.
            </div>
          </div> 
        <?php } elseif($plan === 'true') { ?>
          <div style="text-align: center; margin: 10px 0;">
            <div style="background: #109e10; color: white; display: inline-block; padding: 5px; width: 100%">
                 Выполнен, и утвержден у преподавателя
            </div>
          </div>
        <?php } ?>
<!-- plan buttons end -->
      </div>
  </div>
  <!-- plan files end -->
<!-- half order files start -->                                            
  <div class="col-md-4">
      <h5>Половина работы</h5>
      <?php if($client_paid == 'half' || $client_paid == 'paid' || $client_paid == 'paid_client'){ ?>
      <div>
        <?php foreach ($order_second as $order_second_single): ?>
          <?php if($order_second_single['submited'] === 'true') { ?>
          <div style="box-shadow: 0 0px 3px 0px;; padding: 5px; margin-bottom: 5px ">
            <div style="text-align: center;">
                <?php echo $order_second_single['file_name']; ?> <br> 
                [<?php echo $order_second_single['upload_date']; ?>]
            </div>
            <div style="text-align: center">
                <?php echo form_open('filedownload/download/'.$order_second_single['tmp_name'], array('class'=>'jddform'));?>
                <input type="hidden" name="path" value="<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_second_single['tmp_name']; ?>">
                <input type='hidden' name='filename' value="<?php echo $order_second_single['tmp_name']; ?>">
                <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
                <input style="margin: 0 auto; padding: 5px 10px;" type="submit" name="submit" value="Скачать" class="btn-warning">
                <?php echo form_close();?>
            </div>
          </div>
          <?php } else { ?>
            <div class="sbmFile">Файл будет доступен для скачивания после проверки менеджером</div>
            <?php } ?>
          <?php endforeach; ?>
      </div>
    <?php } else { ?>
    <div>
      Файл будет доступен для скачивания после выполнения автором
    </div>
  <?php } ?>
  </div>
<!-- half order files end --> 

  </div>
  <!-- complete order files start --> 
<div class="row clearfix">
  <div class="col-md-4">
      <h5>Завершенный заказ</h5>
      <?php if($client_paid == 'paid' || $client_paid == 'paid_client') { ?>
        <div>
          <?php foreach ($order_essays as $order_essays_single): ?>
            <?php if($order_essays_single['submited'] === 'true') { ?>
            <div style="box-shadow: 0 0px 3px 0px;; padding: 5px; margin-bottom: 5px ">
              <div style="text-align: center;">
                  <?php echo $order_essays_single['file_name']; ?> <br> 
                  [<?php echo $order_essays_single['upload_date']; ?>]
              </div>
              <div style="text-align: center">
                  <?php echo form_open('filedownload/download/'.$order_essays_single['tmp_name'], array('class'=>'jddform'));?>
                  <input type="hidden" name="path" value="<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_essays_single['tmp_name']; ?>">
                  <input type='hidden' name='filename' value="<?php echo $order_essays_single['tmp_name']; ?>">
                  <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
                  <input style="margin: 0 auto; padding: 5px 10px;" type="submit" name="submit" value="Скачать" class="btn-warning">
                  <?php echo form_close();?>
              </div>
            </div>
              <?php } else { ?>
            <div class="sbmFile">Файл будет доступен для скачивания после проверки менеджером</div>
            <?php } ?>
          <?php endforeach; ?>
        </div>
    <?php  } else { ?>
    <div>
      Файл будет доступен для скачивания после выполнения автором 
    </div>
    <?php } ?>
  </div>

<!-- complete order files end --> 

  <!-- unic order files start --> 

  <div class="col-md-4">
      <h5>Проверка на уникальность</h5>
      <?php if($client_paid == 'paid' || $client_paid == 'paid_client') { ?>
        <div>
          <?php foreach ($order_unic as $order_unic_single): ?>
            <?php if($order_unic_single['submited'] === 'true') { ?>
            <div style="box-shadow: 0 0px 3px 0px;; padding: 5px; margin-bottom: 5px ">
              <div style="text-align: center;">
                  <?php echo $order_unic_single['file_name']; ?> <br> 
                  [<?php echo $order_unic_single['upload_date']; ?>]
              </div>
              <div style="text-align: center">
                  <?php echo form_open('filedownload/download/'.$order_unic_single['tmp_name'], array('class'=>'jddform'));?>
                  <input type="hidden" name="path" value="<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_unic_single['tmp_name']; ?>">
                  <input type='hidden' name='filename' value="<?php echo $order_unic_single['tmp_name']; ?>">
                  <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
                  <input style="margin: 0 auto; padding: 5px 10px;" type="submit" name="submit" value="Скачать" class="btn-warning">
                  <?php echo form_close();?>
              </div>
            </div>
              <?php } else { ?>
            <div class="sbmFile">Файл будет доступен для скачивания после проверки менеджером</div>
            <?php } ?>
          <?php endforeach; ?>
        </div>
    <?php  } else { ?>
    <div>
      Файл будет доступен для скачивания после выполнения автором 
    </div>
    <?php } ?>
  </div>
  </div>


<!-- Files -->
</div>

<?php if($order_status != 'Openproject' && $preferred_writer != '0') { ?>
<div class="tab-pane fade" id="messagesClient">


  <div class="row clearfix">
    <h3 class="pull-left">Сообщения Автору</h3>
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

<?php if($messages['from_who'] === 'avtor' && $messages['whom'] === 'zakaz') { ?>
  <div class="history_msg_wrapper zak iSend">
    <h2>Заказчику <span class="fr_adm_mes mng_mes">от Автора</span></h2>
    <ul class="media-list">
      <li class="media media-replied">
        <div class="media-body">
          <div class="well well-lg">
            <ul class="media-date text-uppercase reviews list-inline">
              <li>
                Дата:
                <?php
                   $yearC = substr($messages['date_posted'], 0, 4); 
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
<?php } elseif($messages['from_who'] === 'zakaz' && $messages['whom'] === 'avtor') { ?>
  <div class="history_msg_wrapper zak myMes">
      <h2>Автору <span class="fr_adm_mes mng_mes">от Заказчика</span></h2>
      <ul class="media-list">
        <li class="media media-replied">
          <div class="media-body">
            <div class="well well-lg">
               <ul class="media-date text-uppercase reviews list-inline">
                  <li>
                    Дата: <?php // echo $messages['date_posted']; ?>
                    <?php
                      $yearC = substr($messages['date_posted'], 0, 4); 
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
<div id="avtor"></div>
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
    <input type='hidden' name='receiverid' value="<?php echo $preferred_writer;?>">
    <input type='hidden' name='senderid' value="<?=$this->session->userdata('writer_id')?>">
    <input type='hidden' name='sender_email' value="<?=$this->session->userdata('email')?>">
    <input type='hidden' name='sender_name' value="<?=$this->session->userdata('firstname')?> <?=$this->session->userdata('lastname')?>">
    <input type="hidden" name="ch_reciever" value="avtor">
    <input type="hidden" name="user_level" value="Автора">
    <input type='hidden' name='from_who' value="zakaz">
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
  </div>
  </form>
<!-- Send message form start -->

</div>
</div>
<?php } ?>

<!-- messages to manager -->
<div class="tab-pane fade" id="messagesManager">
  <h3 class="pull-left">Сообщения менеджеру</h3>
    <form class="pull-right" onsubmit="return false">
      <input type="hidden" name="orderid" value="<?php echo $orderid;?>">
      <input type="hidden" name="chatHistory" value="zakaz">
      <!-- <button type="submit" style="margin-top: 10px" id="mngr_cl_history" class="btn btn-danger btn-sm">Вся история сообщений</button> -->
    </form>
  <hr style="border: 1px dashed #bfbfbf;" />
  <div class="row">                  
                                           
<div class="his_wrap">
<div class="refWrapperManager">
  <div id="refresh_mngr_chat">
      <div class="his_wrap" id="his_wr_to_manager">
<!--         <pre>
          <?php // print_r($mes_manager_client); ?>
        </pre> -->
      <?php foreach (array_reverse($mes_manager_client) as $messages){ ?>
      <?php if( ($messages['from_who'] === 'manager' || $messages['from_who'] === 'admin') && $messages['whom'] === 'zakaz'){ ?>
        <div class="history_msg_wrapper man ">
          <h2>Заказчику
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
                        Дата: <?php // echo $messages['date_posted']; ?> 
                          <?php
                           $yearC = substr($messages['date_posted'], 0, 4); 
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
      <?php } elseif($messages['from_who'] === 'zakaz' && $messages['whom'] === 'manager') { ?>
      <div class="history_msg_wrapper man me">
        <h2>Менеджеру <span class="fr_adm_mes mng_mes">от Заказчика</span></h2>  
        <ul class="media-list">
         <li class="media media-replied">
            <div class="media-body">
              <div class="well well-lg">
                 <ul class="media-date text-uppercase reviews list-inline">
                    <li>
                    Дата: <?php // echo $messages['date_posted']; ?> 
                    <?php
                     $yearC = substr($messages['date_posted'], 0, 4); 
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
    <input type='hidden' name='from_who' value="zakaz">
    <div class="row">
      <label for="email" class="col-sm-2 control-label">Сообщение</label>
      <div class="col-sm-12">
        <textarea class="form-control" rows="5" name="message_body" id="massage_body_manager"></textarea>
      </div>
    </div>
    <br/>
    <div class="row file_chat_btns_wrapper" style="padding: 0 15px;">
    <button class="btn btn-success btn-circle pull-left sendMesToMngr" type="submit" id="submitComment"><span class="fa fa-send"></span> Отправить</button>
    
    <select style="float: left;" name="file_send" id="fileSelection">
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
            <?php if($order_plan_file['submited'] === 'true') { ?>
              <option data-tmpname="<?php echo $order_plan_file['tmp_name']; ?>"><?php echo $order_plan_file['file_name']; ?></option>  
            <?php } else { ?>
              <option disabled>Файл пока недоступен</option>
            <?php } ?>
          <?php } ?>
        </optgroup>
        <?php } ?>

      <?php if(!empty($order_second)) { ?>
       <?php if($client_paid == 'half' || $client_paid == 'paid' || $client_paid == 'paid_client') { ?>
        <optgroup label="Половина работы">
          <?php foreach ($order_second as $order_second_file) { ?>
            <?php if($order_second_file['submited'] === 'true') { ?>
            <option data-tmpname="<?php echo $order_second_file['tmp_name']; ?>"><?php echo $order_second_file['file_name']; ?></option> 
            <?php } else { ?>
              <option disabled>Файл пока недоступен</option>
            <?php } ?> 
          <?php } ?>
        </optgroup>
        <?php } ?>
       <?php } ?>

       <?php if(!empty($order_essays)) { ?>
       <?php if($client_paid == 'paid' || $client_paid == 'paid_client') { ?>
        <optgroup label="Вся работа">
          <?php foreach ($order_essays as $order_essays_file) { ?>
            <?php if($order_essays_file['submited'] === 'true') { ?>
            <option data-tmpname="<?php echo $order_essays_file['tmp_name']; ?>"><?php echo $order_essays_file['file_name']; ?></option>  
            <?php } else { ?>
              <option disabled>Файл пока недоступен</option>
            <?php } ?>
          <?php } ?>
        </optgroup>
        <?php } ?>
        <?php } ?>
        <!--         
        <optgroup label="Проверка на уникальновсть">
          <?php // foreach ($order_unic as $order_unic_file) { ?>
            <option data-tmpname="<?php // echo $order_unic_file['tmp_name']; ?>"><?php // echo $order_unic_file['file_name']; ?></option>  
          <?php // } ?>
        </optgroup>
        -->

    </select>
    <input type="hidden" name="file_template" id="file_template_holder" value="">

    <a tabindex="0" data-trigger="hover", role="button" data-toggle="popover" data-trigger="focus" title="Файлы" data-content="Чтобы прикрепить файл к переписке, его необходимо сначала загрузить в заказ, сделать это можно во вкладке 'Инструкции по заказу'" data-placement="top"><i class="fa fa-question-circle"></i></a>
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
        fileSelOpt[i].setAttribute('selected', 'selected')
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
<!-- messages to manager -->





</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<script type="text/javascript">
    jQuery(document).ready(function($) {
      // ADDFILE_CH
      function addFinp(id, contSel, subBtn, hide_x, hide_addinp){

        $(document).on('click', id, function(event) {
            event.preventDefault();
            $(subBtn).css("display", "block")
            addFileInput(contSel, hide_x, id, hide_addinp);
        });


      }


       function addFileInput(cont, hide, el_th, hide_addinp) {
            var html = '';
            html += '<div class="alert alert-info">';
            if(hide){
              html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>';
            }
            if(hide_addinp){
              $(el_th).hide();
            }
            html += '<input type="file" name="multipleFiles[]">';
            html += '</div>';

            $(cont).append(html);
        }
 
        addFinp('button#ADDFILE_CH', 'div#uploadFileContainerCH', 'div#submitCH', false, true);
        addFinp('button#ADDFILE2', 'div#uploadFileContainer2', 'div#submit', true, false);
         addFinp('button#ADDFILE1', 'div#uploadFileContainer1', 'div#submit_plan', true, false);
        //uploadFileContainerCH


    });
</script>

<script>
    $(document).ready(function() {
        $('form.writer_complete').on('submit',
            function(form) {
                form.preventDefault();
                $.post('<?php echo ci_site_url(); ?>Ordersed/writer_complete', $('form.writer_complete').serialize(), function(data) {
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
    $(document).ready(function() {
        $(".request_order").hide();
        $("#request_order").click(function() {
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


<script>
    $(document).ready(function() {
        $(".creditcard").hide();
        $("#hide").click(function() {
            $(".creditcard").hide();
        });
        $("#show").click(function() {
            $(".creditcard").show();
        });
    });
</script>

<!-- <script type="text/javascript" src="https://js.stripe.com/v2/"></script> -->

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
    case 'writer': wh = 'Автору'; cls = 'myMes'; break;
    case 'client': wh = 'Заказчику'; cls = 'iSend'; break;
    case 'manager': wh = 'Менеджеру'; cls = 'myMes'; break;
  }

  // console.log(chatHistory);


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
  // console.log(document.querySelector(chatHistory+' .his_wrap'));
  document.querySelector(chatHistory+' .his_wrap').appendChild(div);
}







function ajax_send_message(btnSend, mesBody, refBlockId, refBlockWrapClName){
    $(btnSend).on('click',
      function(form){
      // console.log(refBlockId);
      let messageBody = document.getElementById(mesBody).value;
      var ftar = form.target.parentElement.parentElement.parentElement;

       $.post('<?php echo ci_site_url(); ?>Messages/post_message_ajax', $(ftar).serialize(), function(data){
          data = JSON.parse(data);

            var fileTpl = '';
            if(ftar.querySelector('#file_template_holder') != undefined){
             fileTpl = ftar.querySelector('#file_template_holder').value;
            }
            // console.log(fileTpl);

            switch (refBlockId){
              case '#refresh_zak_chat': from_who = 'writer'; break;
              case '#refresh_mngr_chat': from_who = 'manager'; break;
            }
            

            addYourMessage(mesBody, '<?php echo $this->session->userdata('user_level'); ?>', data[1], refBlockId, from_who, fileTpl);
            //mesBody, user_level, mesDate, chatHistory, whom, fileTpl



            if(data[0] === 'true'){
              // $(refBlockId).load(window.location.href + " " + refBlockId);
              document.getElementById(mesBody).value = '';
              $(refBlockWrapClName).scrollTop($(refBlockId).height()+ 120);
            } else {
              alert('Необходимо ввести текст сообщения');
            }

            document.getElementById('fileSelection').querySelector('option:first-child').setAttribute('selected', 'selected');
            document.getElementById('file_template_holder').value = '';

       });


      });

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
        document.getElementById('history_cl_wr_modal').innerHTML = '';
        console.log(data);
        putHistory(data)
        $('#myModal').modal();
     });

    });
}


getMesHistory('button#cl_wr_history');
getMesHistory('button#mngr_cl_history');

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
      createMes(obj[key].message_body, obj[key].date_posted, '', 'Мне');
    } else if(obj[key].whom === 'manager'){
      createMes(obj[key].message_body, obj[key].date_posted, 'meSend', 'Менеджеру');
    } else {
      createMes(obj[key].message_body, obj[key].date_posted, 'meSend', 'Автору');
    }
  }
}
</script>
<?php } ?>
<script>
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