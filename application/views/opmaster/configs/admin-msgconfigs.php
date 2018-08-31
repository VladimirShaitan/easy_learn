      <div id='content'>
        <div class='panel panel-default'>
          <div class='panel-heading'>
            <i class='fa fa-cog fa fa-large'></i>
            Конфигурация сообщений
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
          <div class="col-lg-12">
            <ul class="breadcrumb">
              <li>
                <a href="#"></a><i class="fa fa-home"></i>
              </li>
              <!-- <li>
                <a href="#">UI</a>
              </li> -->
              <li class="active">
                Конфигурация сообщений
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <div class="row">
              <div class="col-lg-12">
                <div class="widget-container">
                <!--   <div class="heading">
                    <i class="fa fa-spinner"></i>Индикаторы
                  </div> -->
                  <div class="widget-content padded">
<table class="table">
<thead>
<th>ID</th>
<th>Письмо</th>
<th>Изменить</th>



</thead>

                   <tbody>

                   <?php foreach ($messages as $messages): ?>
                   <tr>
                    <td><?php echo $messages['id'];?></td>
                    <td>
                      <?php // echo $messages['msg_id'];?>
                        <?php 
                        if($messages['msg_id'] === 'new_writer_registers'){
                          echo 'Зарегистрирован новый Автор';
                        } elseif($messages['msg_id'] === 'new_client_registers'){
                          echo 'Зарегистрирован новый Заказчик';
                        } elseif($messages['msg_id'] === 'new_order_placed'){
                          echo 'Новый заказ';
                        } elseif($messages['msg_id'] === 'new_order_paid'){
                          echo 'Изменен статус заказа';
                        } elseif($messages['msg_id'] === 'writer_status_changed'){
                          echo 'Изменен статус пользователя';
                        } elseif($messages['msg_id'] === 'order_marked_aspaid'){
                          echo 'Оплата заказа';
                        } elseif($messages['msg_id'] === 'writer_bids'){
                          echo 'Ставки по заказам';
                        } elseif($messages['msg_id'] === 'order_assigned_towriter'){
                          echo 'Заказ передан в работу';
                        } elseif($messages['msg_id'] === 'order_status_changed'){
                          echo 'Статус/Оплата/Доработка';
                        } elseif($messages['msg_id'] === 'file_uploaded'){
                          echo 'Файл загружен';
                        } elseif($messages['msg_id'] === 'msg_toadmin_byclient' || $messages['msg_id'] === 'msg_toadmin_bywriter' || $messages['msg_id'] === 'msg_towriter_byadmin' || $messages['msg_id'] === 'new_message_received' || $messages['msg_id'] === 'message_template'){
                          echo '-- Не изменять --';
                        } elseif($messages['msg_id'] === 'msg_toclient_byadmin'){
                          echo 'Новое сообщение';
                        } elseif($messages['msg_id'] === 'message_under_order'){
                          echo 'Новое сообщение по заказу';
                        } elseif($messages['msg_id'] === 'message_toall_writers'){
                          echo 'Доплата по заказу Автор';
                        } elseif($messages['msg_id'] === 'order_rated_byclient'){
                          echo 'Доплата по заказу Заказчик';
                        } elseif($messages['msg_id'] === 'writer_deactivates'){
                          echo 'Аккаунт отключен';
                        } elseif($messages['msg_id'] === 'order_reassigned'){
                          echo 'Заказ переназначен';
                        } elseif($messages['msg_id'] === 'message_oplata'){
                          echo 'Стоимость работы / Штраф';
                        } elseif($messages['msg_id'] === 'message_plan'){
                          echo 'План';
                        } elseif($messages['msg_id'] === 'message_order_complete'){
                          echo 'Заказ готов/Оплачен автору';
                        } 

                        ?> 





                      </td>


                    <td><a href="<?php echo ci_site_url('Siteconfigs/view_message/'.$messages['msg_id']); ?>"> изменить</a>
                    </td>
                  </tr>
                                   
                  <?php endforeach; ?>  

                  </tbody>
                </table> 
                  </div>
                </div>
              </div>
            </div>



          </div>
          <div class="col-md-8">


            <div class="row">
              <div class="col-lg-12">
                <div class="widget-container fluid-height">
                 <!--  <div class="heading">
                    <i class="fa fa-book"></i>Нумерация
                  </div> -->
                  <div class="widget-content padded text-center">
                  <p> Настроить сообщения, отправленные заказчикам, авторам или менеджеру </p>
<h1> Нажмите на письмо слева, чтобы изменить сообщение. </h1>
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
    <!-- Footer -->
    <!-- Javascripts -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script> -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="http://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
  </body>
</html>
