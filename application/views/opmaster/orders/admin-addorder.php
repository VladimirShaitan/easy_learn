 <div class='panel panel-default col-sm-9'>
      <div class='panel-heading'>
          <i class='fa fa-calendar fa fa-large'></i>
            График выполения заказов

</div>

   <style>
   table {
    table-layout: fixed; /* Фиксированная ширина ячеек */
   }
   .col1 { width: 160px; }
   .coln { width: 60px; }
   .alik {
    padding: 10px;
    margin: 3px 3px;
    color: black;
    display: block;
    float: left;
}
.panel.panel-default{padding: 0}
.marker span {
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
 <h5><div class="marker clearfix"><span style="background: #32CD32">Половина работы</span> <span style="background: #D53032" >План не выполнен</span>   <span style="background: #FFCC00" >Полностью работа</span>   <span style="background: #EA8DF7">На доработке</span> <span style="background: #42AAFF" >План выполнен, но не утверджен</span></div> </h5>
  <table border="2" >

 <?php setlocale(LC_ALL, 'ru_RU.UTF-8'); ?>
   <tr id="tablehead">
    <th></th>
    <th><p style="color:#ff0000">Срок<br> вышел</p></th>
    <th><p style="color:#FFA500">Сегодня </br><?php $d = strtotime("+0 day"); echo strftime("<span class='datetable' data-order='3'>%d.%m.%Y</span>", $d);?></p> </th>
    <th><p style="color:#008000">Завтра </br><?php $d = strtotime("+1 day"); echo strftime("<span class='datetable' data-order='4'>%d.%m.%Y</span>", $d);?></p></th>
    <th><p style="color:#0000CD"><?php  $d = strtotime("+2 day");echo strftime("%a</br><span class='datetable' data-order='5'>%d.%m.%Y</span>", $d);?></p></th>
    <th><p style="color:#0000CD"><?php  $d = strtotime("+3 day");echo strftime("%a </br><span class='datetable' data-order='6'>%d.%m.%Y</span>", $d);?></p></th>
    <th><p style="color:#0000CD"><?php  $d = strtotime("+4 day");echo strftime("%a </br><span class='datetable' data-order='7'>%d.%m.%Y</span>", $d);?></p></th>
    <th><p style="color:#0000CD"><?php  $d = strtotime("+5 day");echo strftime("%a </br> <span class='datetable' data-order='8'>%d.%m.%Y</span>", $d);?></p></th>
    <th><p style="color:#0000CD"><?php  $d = strtotime("+6 day");echo strftime("%a </br> <span class='datetable' data-order='9'>%d.%m.%Y</span>", $d);?></p></th>
   </tr>
<tr class="trow" data-time-from="0000" data-time-to="0859" data-time-order='0'>
    <td>
        <p class="timetable" style="color:#0000CD">0.00-8.59</p>
    </td>
    <td id="prosr"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
<tr class="trow" data-time-from="0900" data-time-to="1259" data-time-order='1'>
    <td>
        <p class="timetable" style="color:#0000CD">9.00-12.59</p>
    </td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
<tr class="trow" data-time-from="1300" data-time-to="1659" data-time-order='2'>
    <td>
        <p class="timetable" style="color:#0000CD">13.00-16.59</p>
    </td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
<tr class="trow" data-time-from="1700" data-time-to="1959" data-time-order='3'>
    <td>
        <p class="timetable" style="color:#0000CD">17.00-19.59</p>
    </td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
<tr class="trow" data-time-from="2000" data-time-to="2359" data-time-order='4'> 
    <td>
        <p class="timetable"  style="color:#0000CD">20.00-23.59</p>
    </td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>

  </table>
  </div>
</div>

<div id='grafik' style="border: 1px solid black; display: none;">
 <?php
// echo substr($order_status[0]['plan'], 11, 16)[0] ; 
   ?> 
   <?php foreach( $order_status as $orders ){ ?>
    <?php if($orders['order_status'] != 'Revision') { ?>

      <?php if($orders['plan'] != '' && ($orders['yesno'] === 'false' || $orders['yesno'] === 'various')) { ?>
          <a class="alik" style="<?php if($orders['yesno'] === 'false'){ echo 'background: #D53032; color: white'; } else{echo 'background: #42AAFF';} ?>"  href="/in/Adminorders/view_order/<?php echo $orders['orderid']; ?>" data-deadline-plan="<?php echo substr($orders['plan'], 0, 10) ?>" data-time-plan="<?php echo substr($orders['plan'], 11, 16) ?>" data-plan-status="<?php echo $orders['yesno'] ?>" data-order-status="<?php echo $orders['order_status']?>"><?php echo $orders['orderid']; ?></a>
      <?php } ?> 

    <?php if($orders['half_work'] != '') { ?>
         <a class="alik" style="background: #32CD32" href="/in/Adminorders/view_order/<?php echo $orders['orderid']; ?>" data-deadline-half="<?php echo substr($orders['half_work'], 0, 10) ?>" data-time-half="<?php echo substr($orders['half_work'], 11, 16) ?>" data-order-status="<?php echo $orders['order_status']?>"><?php echo $orders['orderid']; ?></a>
     <?php } ?>
         
      <?php if($orders['all_work'] != '') { ?>
         <a class="alik" style="background: #FFCC00" href="/in/Adminorders/view_order/<?php echo $orders['orderid']; ?>" data-deadline-all="<?php echo substr($orders['all_work'], 0, 10) ?>" data-time-all="<?php echo substr($orders['all_work'], 11, 16) ?>" data-order-status="<?php echo $orders['order_status']?>"><?php echo $orders['orderid']; ?></a>
      <?php } ?>
    <?php } ?>


      <?php if($orders['dorabotka'] != '') { ?>
          <a class="alik" style="background: #EA8DF7" href="/in/Adminorders/view_order/<?php echo $orders['orderid']; ?>" data-deadline-dor="<?php echo substr($orders['dorabotka'], 0, 10) ?>" data-time-dor="<?php echo substr($orders['dorabotka'], 11, 16) ?>" data-order-status="<?php echo $orders['order_status']?>"><?php echo $orders['orderid']; ?></a>
      <?php } ?>
   <?php } ?>
      
    </div>

    <script> 
      // var kill = 0;
      let date = document.getElementsByClassName('datetable');
      let time = document.getElementsByClassName('timetable');
      let alinks = document.getElementsByClassName('alik');
      let trow = document.getElementsByClassName('trow');
    const cut = (elem) => {
        let tr_date = "";
    if(elem != null){
        for(let i = 0; i <= elem.length-1; i++){if(elem[i] != '.'){tr_date += elem[i]}}
      }
        let tempDate = tr_date.substring(0, 2);
        let tempDate2 = tr_date.substring(2, 4);
        let tempDate3 = tr_date.substring(4, tr_date.length);
//        console.log(tempDate2 + tempDate + tempDate3)
        tr_date = tempDate2 + tempDate + tempDate3;
        return Number(tr_date);
    }
    const cutTime = (elem2) => {
        let tr_time = "";

        if(elem2 != null){
            for(let i = 0; i <= elem2.length-1; i++){if(elem2[i] != ':'){tr_time += elem2[i]}}
        }
        return Number(tr_time);
    }
    const ga = (elem3, attr) => {
      return elem3.getAttribute(attr);
    }


    //console.log(date,time,alinks,trow);


    for(let i = 0; i <= alinks.length-1; i++){

        
        
      for(let d = 0; d <= date.length-1; d++){
        if( cut(ga(alinks[i], 'data-deadline-plan')) === cut(date[d].innerText) || cut(ga(alinks[i], 'data-deadline-half'))  === cut(date[d].innerText) || cut(ga(alinks[i], 'data-deadline-all'))  === cut(date[d].innerText) || cut(ga(alinks[i], 'data-deadline-dor'))  === cut(date[d].innerText) ){
          

          // var links = [];
          // links.push(alinks[i].toString());
          var v = alinks[i]
          // console.log(v);
          // kill++;
          // console.log(kill);

          // console.log(links);
          
          // console.log(cut(date[d].innerText), cut(ga(alinks[i], 'data-deadline-dor')), alinks[i]);

          for(let t = 0; t <= trow.length-1;t++){

            // console.log(cut(date[d].innerText), cut(ga(alinks[i], 'data-deadline-dor')), alinks[i]);

             if((cutTime(ga(v, 'data-time-plan')) || cutTime(ga(v, 'data-time-half')) || cutTime(ga(v, 'data-time-all')) || cutTime(ga(v, 'data-time-dor'))) >= cutTime(ga(trow[t], 'data-time-from')) && (cutTime(ga(v, 'data-time-plan')) || cutTime(ga(v, 'data-time-half')) || cutTime(ga(v, 'data-time-all')) || cutTime(ga(v, 'data-time-dor'))) <= cutTime(ga(trow[t], 'data-time-to'))){

              // console.log(cut(date[d].innerText), cut(ga(alinks[i], 'data-deadline-dor')), alinks[i]);
              console.log('-----------------');
              // console.log(cutTime(ga(trow[t], 'data-time-to')), cutTime(ga(alinks[i], 'data-time-dor')), alinks[i]);
                // if(cut(ga(alinks[i], 'data-deadline-dor')) || cut(ga(alinks[i], 'data-deadline-plan')) ||  cut(ga(alinks[i], 'data-deadline-half')) || cut(ga(alinks[i], 'data-deadline-all')) === cut(date[d].innerText) ) {

                  trow[t].querySelector('td:nth-child('+date[d].getAttribute('data-order')+')').appendChild(v);

                // }

              
             } 
          }  
      }  else if((cut(ga(alinks[i], 'data-deadline-plan')) || cut(ga(alinks[i], 'data-deadline-half')) || cut(ga(alinks[i], 'data-deadline-all')) || cut(ga(alinks[i], 'data-deadline-dor'))) < cut(date[0].innerText)){
                  document.getElementById('prosr').appendChild(alinks[i]);
                  // console.log('1 step else ok!');
      } 
    }
        
        // break;
        
  }
  </script>
