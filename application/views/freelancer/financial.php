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
     <?php foreach ($orders as $orders):
    //if ($orders['order_status'] !=='Assigned') { 

      ?>        
       <tr>
        <td>

<a href="<?php echo ci_site_url('order/view/'.$orders['orderid']); ?>">Заказ #<?php echo $orders['orderid']; ?></a>
          <br/>
          <!-- <?php echo $orders['currency'].' '.$orders['writerpay']; ?> -->
          <br/>
          <?php echo $orders['client_paid']; ?> | <?php echo $orders['order_status'];  ?>

        </td>

        <td class="text-left">


<div class="topic-order"><a href="<?php echo ci_site_url('order/view/'.$orders['orderid']); ?>"><?php echo $orders['topic']; ?></a></div>

<p><br/><br/><?php echo $orders['words']; ?> Слов, <?php echo $orders['subject']; ?>,


<!-- <?php echo $orders['words']; ?> --> 
<?php
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

?>


</p>


        </td>

      </tr>
           <?php 
           //} 
           endforeach; ?>
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
$('#myorders').dataTable({
    sDom: "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
    //sPaginationType: "bootstrap",

    order: [
        [0, 'desc']
    ],

    aoColumnDefs: [{
        bSortable: false,
        aTargets: [0]
    }]
});
</script>



<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>

         <!--  <div class="col-md-8">
            <div class="orders-profile loggedin ">



<div class="row">
  <div class="col-sm-6"><h1><?php $Amount = $writerpay; $balance = $Amount - $withdrawals; echo 'Account Balance $'. $balance; ?> </h1></div>
  <div class="col-sm-6 text-right"><br/><button id="request_order" class="btn btn-success"><i class="fa fa-cog"></i> Withdraw Funds</button></div>
</div>

              <div class='request_order main-inner-sidebar alert alert-success'>
                  <?php echo form_open('Financial/payment_request', array('class'=>'jsform'));?>
                  <div class='jsError'></div>

                    <h4> You can Withdraw maximum <?php echo '$'.$balance;?> and min $10</h4><br/>
        <div class="form-group">
      <label class="control-label col-sm-2" for="email">Paid to</label>
      <div class="col-sm-10">
            <select name='payment_details' type='hidden'  class="form-control"  >
                     <?php foreach ($writers_accounts as $writers_accounts) { ?>
               <option type='input' class="form-control" value="<?php echo $writers_accounts['payment_method']; ?>||<?php echo $writers_accounts['payment_details']; ?>">
                  <?php echo $writers_accounts['payment_method']; ?> 
               </option>
               <?php } 
                  ?>
            </select>
      </div><br/>
    </div>
                      <div class="form-group">
      <label class="control-label col-sm-2" for="email">Amount</label>
      <div class="col-sm-10">
        <input type='input' name='trans_amount' class="form-control" placeholder="Enter Amount">
      </div><br/>
    </div>

                    <p><input type='hidden' name='account_balance' value="<?php echo $balance;?>"></p>
                    <p><input type='hidden' name='trns_fullname' value="<?=$this->session->userdata('firstname')?> <?=$this->session->userdata('lastname')?>"></p>
                    <p><input class="btn btn-danger" type='submit' Value='Request Payment'></p>
                  <hr/>
                  <?php echo form_close();?>   
              </div>
<div class="row">
<h4> Withdrawal Requests </h4><hr/>
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>trns id</th>
        <th>trns status</th>
        <th>trans amount</th>
        <th>trns date</th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>

    <?php foreach ($transactions as $row): ?>
      <tr>
        <td><?php echo $row->trns_id; ?></td>
        <td><?php echo $row->trns_status; ?></td>
        <td><?php echo ' '.$row->trans_amount; ?></td>
        <td><?php echo $row->trns_date; ?></td>
        <td><a href="<?php echo ci_site_url('Financial/view_transaction/'.$row->trns_id); ?>">  view details</a></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
<div class="row">
<p> Orders Pending Editing</p><hr/>
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>OrderID</th>
        <th>Topic</th>
        <th>Words</th>
        <th>amount</th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>

    <?php foreach ($orders as $orders): ?>
            <tr>
        <td><?php echo $orders['orderid']; ?></td>
        <td><?php echo $orders['topic']; ?></td>
        <td><?php echo $orders['words']; ?></td>
        <td><?php echo $orders['urgency']; ?></td>
        <td><a href="<?php echo ci_site_url('order/view/'.$row->orderid); ?>">View</a></td>
      </tr>
    <?php endforeach; ?>
        </tbody>
  </table>
 <?php echo 'Results returned '. $numrows; ?><br/>
</div>






            </div>
          </div> 

         

        </div>

</div>
</div>
</div>
<script>

$(document).ready(function() {
    $('form.jsform').on('submit',
      function(form){
        form.preventDefault();
        $.post('<?php echo ci_site_url(); ?>/Financial/payment_request', $('form.jsform').serialize(), function(data){
          $('div.jsError').html(data);
          $('div.show').show();
          $('div.show').hide();
           location.reload();
        });
        });

});
</script>

This script is responsibe for revealing the request button once request this order is clicked.  
<script>
$(document).ready(function(){
   $(".request_order").hide();
    $("#request_order").click(function(){
        $(".request_order").show();
    });

});
</script> -->