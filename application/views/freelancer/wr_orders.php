          <div class="col-md-8">

            <div class="orders-profile loggedin">
 <h3>Мои заказы</h3>
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

<?php 
function cmp($a, $b) 
{
    if ($a["last_ord_req"] == $b["last_ord_req"]) {
        return 0;
    }
    return (strtotime($a["last_ord_req"]) < strtotime($b["last_ord_req"])) ? -1 : 1;
}
usort($orders, "cmp");
// print_r($orders);
$orders = array_reverse($orders);
?>

     <?php foreach ($orders as $orders):?>        
       <tr>
        <td>

<a href="<?php echo ci_site_url('order/view/'.$orders['orderid']); ?>">Заказ #<?php echo $orders['orderid']; ?></a>
          </br>
          <?php // echo $orders['order_status']; ?>
          <?php if($orders['order_status']==='Openproject'){ 
            echo "Открытый проект";} 
            elseif ($orders['order_status']==='Revision'){
            echo "На доработке";
          } elseif ($orders['order_status']==='Completed'){
            echo "Завершенный";
          } elseif($orders['order_status']==='Archived') {
            echo "В архиве";
          } elseif($orders['order_status'] === 'pending' || $orders['order_status'] === "onlyAvtorDoplata" ){
            echo 'Неоплаченный';
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
            <span class="tb_cell_ord">Тип:</span> <?php echo $orders['referencing_style']; ?>  <br>
            <!-- <span class="tb_cell_ord">Последняя ставка:</span>  <?php // echo $orders['last_ord_req']; ?> -->
          </p>


        </td>

      </tr>
<?php endforeach; ?>
<?php endif; ?>
    </tbody>
  </table>

<p><div class="pagination pull-right"><?php echo $links; ?></div></p>

            </div>
          </div>
        </div>
</div>
</div>
</div>

<script>
// $('#myorders').dataTable({
//     sDom: "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
//     //sPaginationType: "bootstrap",

//     order: [
//         [0, 'asc']
//     ],

//     aoColumnDefs: [{
//         bSortable: false,
//         aTargets: [0]
//     }]
// });
</script>



<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>