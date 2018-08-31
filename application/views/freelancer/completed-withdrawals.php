          <div class="col-md-8">
            <div class="orders-profile loggedin ">
<hr/>
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>График</title>
   <style>
   table {
    table-layout: fixed; /* Фиксированная ширина ячеек */
    width: 100%; /* Ширина таблицы */
    
   }
table th, table td {padding: 5px;}
table th p {margin: 0;}
   .col1 { width: 160px; }
   .coln { width: 60px; }
   .alik {
    padding: 5px;
    margin: 1px 1px;
    color: black;
    display: block;
    float: left;
}
p.marker span {
    color: white;
    font-weight: bold;
    font-size: 16px;
    padding: 11px;
    white-space: nowrap;
    margin: 2px;
    display: block;
    float: left;
}
  </style>
 </head>
 <body>
  <table border="2" >
   <caption><h2><p style="color:#2F4F4F" >График выполения заказов</p></h2></caption>
 <caption><h6><span style="background: #32CD32">Половина работы</span> <span style="background: #FF6347" >Полностью работа</span>   <span style="background: #40E0D0">На доработке</span> <span style="background: #FFCC00" >План не выполнен</span>
 <span style="background: #EA8DF7" >План выполнен, но не утверджен</span> </caption></h6>
 <?php setlocale(LC_ALL, 'ru_RU.UTF-8'); ?>
   <tr>
    <th></th>
    <th><p style="color:#ff0000">Срок вышел</p></th>
    <th><p style="color:#FFA500">Сегодня </br><?php echo date( "d.m.y" );?></p> </th>
    <th><p style="color:#008000">Завтра </br><?php $d = strtotime("+1 day"); echo date("d.m.y", $d);?></p></th>
    <th><p style="color:#0000CD"><?php  $d = strtotime("+2 day");echo strftime("%a</br> %d.%m.%y", $d);?></p></th>
    <th><p style="color:#0000CD"><?php  $d = strtotime("+3 day");echo strftime("%a </br>%d.%m.%y", $d);?></p></th>
    <th><p style="color:#0000CD"><?php  $d = strtotime("+4 day");echo strftime("%a </br>%d.%m.%y", $d);?></p></th>
    <th><p style="color:#0000CD"><?php  $d = strtotime("+5 day");echo strftime("%a </br> %d.%m.%y", $d);?></p></th>
    <th><p style="color:#0000CD"><?php  $d = strtotime("+6 day");echo strftime("%a </br> %d.%m.%y", $d);?></p></th>
   </tr>
   <tr><td><p style="color:#0000CD">0.00-8.59</p></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
   <tr><td><p style="color:#0000CD">9.00-12.59</p></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
   <tr><td><p style="color:#0000CD">13.00-16.59</p></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
   <tr><td><p style="color:#0000CD">17.00-19.59</p></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
   <tr><td><p style="color:#0000CD">20.00-23.59</p></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>

  </table>
 </body>
</html>


<div id='grafik' style="border: 1px solid black; display: none;">

 <?php
// echo substr($order_status[0]['plan'], 11, 16)[0] ; 
   ?> 
   <?php foreach( $order_status as $orders ){ ?>

  <?php if($orders['plan'] != '' && ($orders['yesno'] === 'false' || $orders['yesno'] === 'various')) { ?>
      <a class="alik" style="<?php if($orders['yesno'] === 'false'){ echo 'background: #D53032; color: white'; } else{echo 'background: #42AAFF';} ?>"  href="/in/Adminorders/view_order/<?php echo $orders['orderid']; ?>" data-deadline-plan="<?php echo substr($orders['plan'], 0, 10) ?>" data-time-plan="<?php echo substr($orders['plan'], 11, 16) ?>" data-plan-status="<?php echo $orders['yesno'] ?>" data-order-status="<?php echo $orders['order_status']?>"><?php echo $orders['orderid']; ?></a>
  <?php } ?> 

<?php if($orders['half_work'] != '') { ?>
     <a class="alik" style="background: #32CD32" href="/in/Adminorders/view_order/<?php echo $orders['orderid']; ?>" data-deadline-half="<?php echo substr($orders['half_work'], 0, 10) ?>" data-time-half="<?php echo substr($orders['half_work'], 11, 16) ?>" data-order-status="<?php echo $orders['order_status']?>"><?php echo $orders['orderid']; ?></a>
 <?php } ?>
     
  <?php if($orders['all_work'] != '') { ?>
     <a class="alik" style="background: #FFCC00" href="/in/Adminorders/view_order/<?php echo $orders['orderid']; ?>" data-deadline-all="<?php echo substr($orders['all_work'], 0, 10) ?>" data-time-all="<?php echo substr($orders['all_work'], 11, 16) ?>" data-order-status="<?php echo $orders['order_status']?>"><?php echo $orders['orderid']; ?></a>
  <?php } ?>

    <?php if($orders['dorabotka'] != '') { ?>
        <a class="alik" style="background: #EA8DF7" href="/in/Adminorders/view_order/<?php echo $orders['orderid']; ?>" data-deadline-dor="<?php echo substr($orders['dorabotka'], 0, 10) ?>" data-time-dor="<?php echo substr($orders['dorabotka'], 11, 16) ?>" data-order-status="<?php echo $orders['order_status']?>"><?php echo $orders['orderid']; ?></a>
    <?php } ?>
   <?php } ?>
      
    </div>
    <table class="display table"> 
              <div class="header-section text-center">
            <hr>
             <table id="myorders" class="table">
          </div>
    <thead>
      <tr>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>

      <?php if (is_array ($orders)): ?>
     <?php foreach ($orders as $orders):?>        
       <tr>
        <td>

<a href="<?php echo ci_site_url('order/view/'.$orders['orderid']); ?>">Заказ #<?php echo $orders['orderid']; ?></a>
          <br/>
           Оплата за заказ <?php echo $orders['writerpay']; ?> грн,
          <br/>
          <!-- <?php echo $orders['client_paid']; ?> | --> 
          <?php if($orders['order_status']==='Openproject'){ 
          echo "Открытый проект";} 
          elseif ($orders['order_status']==='Revision'){
          echo "На доработке";
        } 
        elseif ($orders['order_status']==='Completed'){
          echo "Завершенный";
        }else {
          echo "На выполнении";
        } ?>

        </td>

        <td class="text-left">


<div class="topic-order"><a href="<?php echo ci_site_url('order/view/'.$orders['orderid']); ?>">Тема: <?php echo $orders['topic']; ?></a></div>

<p><br/><br/><?php echo $orders['words'] / 275; ?> Стр, <?php echo $orders['subject']; ?>, <?php echo $orders['referencing_style'];?> 


<!-- <?php echo $orders['words']; ?> --> 
<!-- <?php
$datetime1 = new DateTime(date('Y-m-d H:i:s'));
$datetime2 = new DateTime($orders['deadline']);

if($datetime1 >= $datetime2){
  echo "Срок вышел";
}

if($datetime1 <= $datetime2){
$interval = $datetime1->diff($datetime2);
$elapsed = $interval->format('%a дней %h часов %i минут');
echo 'Осталось времени: '.$elapsed;
}

?> -->


</p>


        </td>

      </tr>
<?php endforeach; ?>
<?php endif; ?>
    </tbody>
  </table>