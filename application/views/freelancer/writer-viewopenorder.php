<?php if(empty($orderid)) { ?>
    <div class="text-center">
        <h2>Этого заказа больше не существует или он был удален</h2>
        <a href="/in/order/openorders" style="background: green;color: white;padding: 10px 20px;margin-top: 19px;display: inline-block;">Вернуться к поиску</a>
    </div>
  <?php } elseif(!empty($orderid) && $pref_writer != '0') {  ?>
    <div class="text-center">
        <h2>Этот заказ уже на выполнении</h2>
        <a href="/in/order/openorders" style="background: green;color: white;padding: 10px 20px;margin-top: 19px;display: inline-block;">Вернуться к поиску</a>
    </div>
 <?php } elseif(!empty($orderid) && ($pref_writer === $this->session->userdata('orderid') || $pref_writer === '0') ) { ?>
<style type="text/css">
  span.hide_pr {
    background: #cc1111fc;
    padding: 3px 5px;
    color: white;
}
</style>

<div class="col-md-8">
    <div class="orders-profile loggedin">


        <div class="main">
            <div class="row">
                <div class='jsError'></div>
                <div class="col-sm-6">
                    <h2 style="margin: 0;padding: 0;">Заказ: #
                        <?php echo $orderid;?> </h2>
                </div>
                <div class="col-sm-6">
                    <?php foreach ($data as $data): ?>
                    <?php $writerid = $data['writerid'];     ?>
                    <?php endforeach; ?>

                    <?php if(isset($writerid) && $writerid == $this->session->userdata('writer_id') ){ ?>
                    <h2 style="color:#006400;margin: 0;color: #006400;padding: 0;
    text-align: right;"> <i class="fa fa-ok"></i> Ставка принята </h2>
                    <?php } ?>

         <?php if($pref_writer === '0') { ?> 
                    <?php if(!isset($writerid)){ ?>
                        <h2 style="margin: 0;padding: 0;">
                            <button id="request_order" type="button" class="btn btn-info pull-right">
                                <i class="fa fa-cloud-upload"></i> Разместить заявку на этот заказ</button>
                            </h2>
                    <?php } else { ?>
                        <h2 style="margin: 0;padding: 0;">
                            <button id="change_price" type="button" class="btn btn-info pull-right">
                                <i class="fa fa-pencil"></i> Изменить заявку на этот заказ</button>
                        </h2>
                    <?php  } ?>
        <?php  } ?>            
<!--  -->


                </div>
            </div>

<!-- <pre>
    <?php // print_r($this->session->userdata()); ?>
</pre> -->
            <div class='request_order alert alert-success' style="display: none">
                <?php echo form_open('Ordersed/order_request', array('class'=>'jsform', 'id' => 'req'));?>
                <div class='jsError'></div>
                <p> Если  вы уверены, что можете выполнить этот заказ вовремя, введите сумму, дату и время выполнения</p>
                <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
                <input type='hidden' name='clientid' value="<?php echo $customer;?>">
                <input type='hidden' name='clientemail' value="<?php echo $customer_email;?>">
                <input type='hidden' name='words' value="<?php echo $words;?>">
                <input type='hidden' name='deadline' value="<?php echo $deadline;?>">
                <input type='hidden' name='clientname' value="<?php echo $customer_name;?>">
                <input type='hidden' name='topic' value="<?php echo $topic;?>">

                <input type='hidden' name='writerid' value="<?=$this->session->userdata('writer_id')?>">
                <input type='hidden' name='writername' value="<?=$this->session->userdata('firstname')?> <?=$this->session->userdata('lastname')?>">
                <input type="hidden" name="subject" value="<?php echo $subject;?>">
                <input type="hidden" name="referencing_style" value="<?php echo $referencing_style;?>">
                <input type="hidden" name="sources" value="<?php echo $sources;?>">
                <p> 
                    <div>
                        <span style="display: none" class="err text-danger">*Заполните поле</span>
                        <input type="text" name='sum' id="sum_rob" style="width: 100%" autocomplete="off" placeholder="Оценка работы - Только цифры"> 
                    </div>
                </p>
                <p>
                    <div>
                        <span style="display: none" class="err text-danger">*Заполните поле</span>
                        <div class='input-group date' id='datetimepicker2'>
                            <input type="text" name='date' autocomplete="off" readonly required placeholder="Дата и время выполнения"  class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            
                        </div>
                    </div>
                </p>

                <script>
                    var date = new Date();
                    date.setDate(date.getDate());
                    $(function() {
                        $('#datetimepicker2').datetimepicker({
                            format:'dd.mm.yyyy hh:ii',
                            pickerPosition: "bottom-left",
                            language: 'ru',
                            startDate: date,
                            weekStart: 1
                        });
                    });
                    calTrig('datetimepicker2');

                   
                    document.getElementById('req').onsubmit = function(){
                        var reqFoqrm = document.getElementById('req');
                        var inpsReq = reqFoqrm.querySelectorAll('input[type=text]');
                        // console.log(inpsReq);
                        for (var reqC = 0; reqC <=  inpsReq.length-1; reqC++){
                            if(inpsReq[reqC].value === ''){
                                inpsReq[reqC].style.borderColor = 'red';
                                inpsReq[reqC].parentElement.parentElement.querySelector('span.err').style.display = 'block';
                                return false;
                                break;
                            }
                        }
                        $(".request_order").hide();
                        $("#request_order").hide();
                        alert('Ставка обрабатывается');
                    }
                </script>
                <br>
                <input type='submit' id="gz" class="btn btn-info" Value='Подать заявку'>
                 </p>

                <?php echo form_close();?>
            </div>

<!-- change price  -->
            <div class='change_price alert alert-success' style="display: none">
                <?php echo form_open('Ordersed/order_request_update', array('class'=>'jsform', 'id' => 'reqUp'));?>
                <div class='jsError'></div>
                <p> Если  вы уверены, что можете выполнить этот заказ вовремя, введите сумму, дату и время выполнения</p>
                <p><input type='hidden' name='orderid' value="<?php echo $orderid;?>"></p>
                <p><input type='hidden' name='clientid' value="<?php echo $customer;?>"></p>
                <p><input type='hidden' name='clientemail' value="<?php echo $customer_email;?>"></p>
                <p><input type='hidden' name='words' value="<?php echo $words;?>"></p>
                <p><input type='hidden' name='deadline' value="<?php echo $deadline;?>"></p>
                <p><input type='hidden' name='clientname' value="<?php echo $customer_name;?>"></p>
                <p><input type='hidden' name='topic' value="<?php echo $topic;?>"></p>
                <p><input type='hidden' name='writerid' value="<?=$this->session->userdata('writer_id')?>"></p>
                <p><input type='hidden' name='writername' value="<?=$this->session->userdata('firstname')?> <?=$this->session->userdata('lastname')?>"></p>
                <p> 
                     <span style="display: none" class="err text-danger">*Заполните поле</span>
                    <div>
                        <input type="text" name='sum' id="sum_rob2" style="width: 100%" autocomplete="off" placeholder="Оценка работы - Только цифры"> 
                    </div>
                </p>
                <p> 
                    <div>
                        <span style="display: none" class="err text-danger">*Заполните поле</span>
                        <div class='input-group date' id='datetimepicker9'>
                            <input type="text" name='date' required readonly autocomplete="off" placeholder="Дата и время выполнения" class="form-control" />
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </p>

                <script>
                    var date = new Date();
                    date.setDate(date.getDate());
                    $(function() {
                        $('#datetimepicker9').datetimepicker({
                            format:'dd.mm.yyyy hh:ii',
                            pickerPosition: "bottom-left",
                            language: 'ru',
                            startDate: date,
                            weekStart: 1
                        });
                    });
                    calTrig('datetimepicker9');

                    document.getElementById('reqUp').onsubmit = function(){
                        var reqFoqrm = document.getElementById('reqUp');
                        var inpsReq = reqFoqrm.querySelectorAll('input[type=text]');
                        for (var reqC = 0; reqC <=  inpsReq.length-1; reqC++){
                            if(inpsReq[reqC].value === ''){
                                inpsReq[reqC].style.borderColor = 'red';
                                inpsReq[reqC].parentElement.parentElement.querySelector('span.err').style.display = 'block';
                                return false;
                                break;
                            }
                        }
                        $(".change_price").hide();
                        $("#change_price").hide();
                        alert('Ставка обрабатывается'); 
                    }
                </script>
                <br>
                <input type='submit' class="btn btn-info gzT" Value='Изменить заявку' >
                 </p>

                <?php echo form_close();?>

                <?php echo form_open('Ordersed/refuse_the_order', array('class'=>'jsform'));?>
                    <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
                    <input type='hidden' name='writerid' value="<?=$this->session->userdata('writer_id')?>">
                    <input type='submit' class="btn btn-danger gzT" Value='Отказаться от заказа'>
                <?php echo form_close();?>
            </div>

<!-- change price  -->





            <hr/>


            <div class="row">
                <div class="col-md-12">
                    <div class="with-nav-tabs panel-default">
                        <div class="panl-heading">
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="instructions">



                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="text-right col-sm-4"><strong>Тема:</strong></td>
                                                <td class="text-left">
                                                    <?php echo stripslashes($topic);?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right col-sm-4"><strong>Предмет: </strong></td>
                                                <td class="text-left">
                                                    <?php echo $subject;?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right col-sm-4">
                                                    <strong>План: </strong>
                                                </td>
                                                <td class="text-left">
                                                <?php
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
                                                 ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right col-sm-4"><strong>Статус заказа:</strong></td>
                                                <td class="text-left">
                                            <?php 
                                              // if($client_paid==='unpaid'){ 
                                              //   echo "Неоплачен ";
                                              // } elseif ($client_paid==='paid' || $client_paid==='paid_client' || $client_paid==='paid_writer'){
                                              //   echo "Оплачен";
                                              // } else {
                                              //   echo "Оплачена половина";
                                              // } 
                                              // echo ' || ';
                                             ?>
                                                    <?php echo "Открытый проект";?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right col-sm-4"><strong>Объем работы:</strong></td>
                                                <td class="text-left">
                                                    <!-- <?php // echo $pages;?> Стр ( -->
                                                    <?php echo $words;?> Стр</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right col-sm-4"><strong>Тип работ:</strong></td>
                                                <td class="text-left">
                                                    <?php echo $referencing_style;?>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                 <td class="text-right col-sm-4"><strong>Бюджет:</strong></td>
                                 <td class="text-left"><?php // echo $sources;?> </td>
                              </tr> -->
                                            <tr>
                                                <td class="text-right col-sm-4"><strong>Срок:</strong></td>
                                                <td class="text-left alert alert-danger">

<?php
$datetime1 = new DateTime(date('Y-m-d H:i:s'));
$datetime2 = new DateTime($deadline);

if($datetime1 >= $datetime2){
  echo $urgency . " | Срок вышел";
}

if($datetime1 <= $datetime2){
$interval = $datetime1->diff($datetime2);
$elapsed = $interval->format('%a дней %h часов %i минут');
echo $urgency . ' | ' . $elapsed ;
}

?>

                                                </td>
                                            </tr>
                                            <!-- <tr>
                                 <td class="text-right col-sm-4"><strong>Сумма:</strong></td>
                                 <td class="text-left"><?php // echo ''.$writerpay;?></td>
                              </tr> -->

                                        </tbody>
                                    </table>
                                    <h4>Детали заказа </h4>
                                    <hr style="border: 1px dashed #bfbfbf;" />
                                    <?php echo stripslashes($instructions);?>
                                    <hr style="border: 1px dashed #bfbfbf;" />

                                    <div class="row">
                                        <div class="col-md-6 border-right">
                                            <h5>Материалы по заказу</h5>
                                            <table class="table ">

                                                <?php foreach ($order_files as $order_files): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $order_files['file_name']; ?><br/>
                                                        <?php echo $order_files['upload_date']; ?><br/>
                                                        <!--   <?php//  echo $order_files['uploader_name']; ?> -->
                                                    </td>

                                                    <td>
                                                        <?php echo form_open('Filedownload/download/'.$order_files['tmp_name']);?>
                                                        <input type="hidden" name="path" value="<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_files['tmp_name']; ?>">
                                                        <input type='hidden' name='filename' value="<?php echo $order_files['tmp_name']; ?>">
                                                        <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
                                                        <input type="submit" name="submit" value="Скачать" class="btn-file">
                                                        <?php echo form_close();?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </table>


                                        </div>
                                        <div class="col-md-6">

                                            <table class="table ">

                                                <?php foreach ($order_essays as $order_essays): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $order_essays['file_name']; ?><br/>
                                                        <?php echo $order_essays['upload_date']; ?><br/>
                                                        <!--   <?php // echo $order_essays['uploader_name']; ?> -->
                                                    </td>

                                                    <td>
                                                        <?php echo form_open('Filedownload/download/'.$order_essays['tmp_name'], array('class'=>'jddform'));?>
                                                        <input type="hidden" name="path" value="<?php echo $this->config->item('uploads'); ?>/<?php echo $order_period;?>/<?php echo $orderid;?>/<?php echo $order_essays['tmp_name']; ?>">
                                                        <input type='hidden' name='filename' value="<?php echo $order_essays['tmp_name']; ?>">
                                                        <input type='hidden' name='orderid' value="<?php echo $orderid;?>">
                                                        <input type="submit" name="submit" value="Скачать" class="btn-warning">
                                                        <?php echo form_close();?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </table>




                                        </div>
                                    </div>


<div class="row">
                                      <!-- запросы -->
<h3 class="text-center">Ставки</h3>
<table>
  <thead>
    <td>ID Автора</td>
    <td>Срок</td>
    <td>Цена</td>
  </thead>
  <tbody>
    <?php foreach($auction as $auction) { ?>
<?php if($this->session->userdata['writer_id'] === $auction['writerid']){ ?>
      <tr>
        <td><?php echo $auction['writerid']; ?></td>
        <td><?php echo $auction['date']; ?></td>
        <td>
            <?php echo '<span style="background: green; color: white; padding: 2px 6px; border-radius: 10px;">'. $auction['sum'] . ' грн. - Ваша ставка</span>'; ?> 
        </td>
      </tr>
<?php } else { if($auction['showorder'] != '') { ?>
        <tr>
            <td><?php echo $auction['writerid']; ?></td>
            <td><?php echo $auction['date']; ?></td>
        
            <td><?php echo $auction['sum'] . ' грн. '; ?> </td>
        </tr>
        <?php } ?>
    <?php } ?>
<?php } ?>
  </tbody>
</table>

<!-- $this->session->userdata['writer_id'] -->
                                    <!-- запросы -->

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
</div>
</div>


<!-- This script is responsibe for revealing the request button once request this order is clicked.  -->
<script>
    $(document).ready(function() {
        // $(".request_order").hide();
        $("#request_order").click(function() {
            $(".request_order").show();
        });

        $("#change_price").click(function() {
            $(".change_price").show();
            
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
// (function(){
function unicNumber(id) {    
  let butget = document.getElementById(id);
  butget.addEventListener('blur', 
    function (){
        let butgetSimb = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        let trueNumb = '';
        for(let i = 0; i < butget.value.length; i++){
            if(butgetSimb.includes(butget.value[i])){
              trueNumb += butget.value[i].toString();
            }
        }
            butget.value = trueNumb;
      }
  );
  
}
unicNumber('sum_rob');
if(document.getElementById('sum_rob2') != null){unicNumber('sum_rob2');}

  // function doTelBut(){
  //   let trueNumb = '';
  //   for(let i = 0; i < butget.value.length; i++){
  //       if(butgetSimb.includes(butget.value[i])){
  //         trueNumb += butget.value[i].toString();
  //       }
  //   }
  //       butget.value = trueNumb;
  // }
// })()
</script>

<?php } ?>