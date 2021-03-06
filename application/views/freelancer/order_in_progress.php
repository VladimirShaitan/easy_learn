<div class="col-md-8">
  <div class="orders-profile loggedin">
  <h3>Заказы на выполнении </h3>
  <table class="display table" > 
    <hr>
    <table id="myorders" class="table">
    <thead style="display: none">
      <tr>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php if (is_array ($orders)): ?>
<!--         <pre>
          <?php // print_r($orders); ?>
        </pre> -->

        <?php foreach ($orders as $orders):?>        
       <tr>
        <td style="vertical-align: middle">
          <a href="<?php echo ci_site_url('order/view/'.$orders['orderid']); ?>">
            Заказ #<?php echo $orders['orderid']; ?>
          </a>
          </br>

          <?php if($orders['order_status']==='Openproject'){ 
            echo "Открытый проект";} 
            elseif ($orders['order_status']==='Revision'){
            echo "На доработке";
          } elseif ($orders['order_status']==='Completed'){
            echo "Завершенный";
          } elseif($orders['order_status']==='Archived') {
            echo "В архиве";
          } elseif($orders['order_status'] === 'pending'){
            echo 'Ожидает подтверждения менеджером';
          } else {
            echo 'На выполнении';
          } ?>
        </td>

        <td class="text-left">
          <div class="topic-order">
            <a href="<?php echo ci_site_url('order/view/'.$orders['orderid']); ?>">
              Тема: <?php echo stripslashes($orders['topic']); ?>
            </a>
          </div>
          <p>
            <span class="tb_cell_ord">Объем:</span> <?php echo $orders['words']; ?> Стр. 
            <br>
            <span class="tb_cell_ord">Предмет:</span> <?php echo $orders['subject']; ?> <br>
            <span class="tb_cell_ord">Тип:</span> <?php echo $orders['referencing_style']; ?> 
          </p>
        </td>
       </tr>
      <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
  </table>
</div>
</div>

<script>
$('#myorders').dataTable({
    sDom: "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
    ordering: false,
});
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
  $(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script> -->