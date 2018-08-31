<div class="col-md-8 border-right ">
  <div class="main orders-profile loggedin">
  <h3>Мои заказы</h3>
  <hr/>
  <table id="myorders" class="table">
    <!-- settings -->
    <thead style="display: none;">
      <tr>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <!-- settings -->
    <tbody>
      <?php foreach ($orders as $orders): ?>
      <tr>
        <td style="vertical-align: middle;">
          <a href="<?php echo ci_site_url('order/view/'.$orders['orderid']); ?>">
            Заказ #<?php echo $orders['orderid']; ?>
          </a>
          <br/>
          <?php if($orders['client_paid']==='unpaid'){
            echo "Неоплачен";
          } elseif ($orders['client_paid']==='paid' || $orders['client_paid']==='paid_client' || $orders['client_paid']==='paid_writer'){
            echo "Оплачен";
          } elseif($orders['client_paid'] === 'half') {
            echo "Оплачена половина";
          } ?> | 


<?php // echo $orders['order_status']; ?>

          <?php if($orders['order_status']==='Completed' || $orders['order_status'] === 'onlyAvtorDoplata' || $orders['order_status']==='pending'){ 
            echo "Завершенный";
          } elseif ($orders['order_status']==='Revision'){
            echo "На доработке";
          } elseif ($orders['order_status']==='Assigned'){
            echo "На выполнении";
          } elseif ($orders['order_status']==='Cancelled'){
            echo "Половина работы";
          }  elseif ($orders['order_status']==='Archived'){
            echo "Архив";
          } else {
            echo "Открытый проект";
          } ?>
        </td>

        <td class="text-left" >
          <div class="text-left topic-order">
            <a href="<?php echo ci_site_url('order/view/'.$orders['orderid']); ?>">
             Тема: <?php echo stripslashes($orders['topic']); ?>
            </a>
          </div>
          <p>
              <span class="tb_cell_ord">Объем:</span> <?php echo $orders['words']; ?> Стр.
              <br>
              <span class="tb_cell_ord">Дата сдачи:</span> <?php echo $orders['urgency']; ?>
              <br>
            </p>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  </div>
</div>
<script>
$('#myorders').dataTable({
    sDom: "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
    ordering: false,
});


setTimeout(function(){
  $('.history').animate({
      scrollTop: $("#ancBot").offset().top
  }, 100);

}, 500);
</script>
<script>
  setLinks();
  function dcl(str) {return document.getElementsByClassName(str)}
  function dgi(str) {return document.getElementById(str)}

  console.log(dgi('myorders_paginate').querySelectorAll('a'));

  function setLinks(){
    // dgi('myorders_paginate').querySelectorAll('a').href = window.location.href + '#myorders_length';
    for (var i = 0; i <=  dgi('myorders_paginate').querySelectorAll('a').length-1; i++) {
      dgi('myorders_paginate').querySelectorAll('a')[i].href = window.location.href + '#myorders_length';
    }
  }

  dgi('myorders_paginate').addEventListener('click', function(e){

    if(e.target.nodeName === 'A'){
        setLinks();

         var curLink = window.location.href.split('#')[0];
         setTimeout(function(){
          window.history.replaceState({}, window.location.href, curLink.split('/')[curLink.split('/').length-1]);
         },100)
          
    }
  });
</script>


<!-- <script type="text/javascript">
//   $(document).ready(function() {
//     $('#example').DataTable( {
//         "order": [[ 3, "desc" ]]
//     } );
// } );
</script> -->