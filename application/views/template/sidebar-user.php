<?php if(empty($this->session->userdata('writer_id'))){
        redirect(ci_site_url().'user/login');
}?> 
<?php if($this->session->userdata('writer_level') === 'admin'){
        redirect(ci_site_url().'opmaster/dashboard');
}?> 
<?php 

$this->db->select('writer_status');
$this->db->where('writer_id', $this->session->userdata('writer_id'));
$wr_stat = $this->db->get('writers')->result_array()[0]['writer_status'];

$cur_url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if($wr_stat === 'False'){
  if($cur_url != ('https://'.$_SERVER['HTTP_HOST'].'/in/messages/messages')){
    redirect('/messages/messages#blocked');
  }
} 
?>
<?php 
$receiverid = $this->session->userdata('writer_id'); 
// $this->db->distinct();
$this->db->select('senderid');
$this->db->where('receiverid="'.$receiverid.'" AND msg_read="0"');
$newMes = $this->db->get('messages');
if ($newMes->num_rows() > 0) {
    foreach ($newMes->result() as $row) {
        $data[] = $row;
    }
    $newMes = $newMes->result_array();
    $number_of_mes = array();
    foreach ($newMes as $key1) {
      foreach ($key1 as $key2) {
        array_push($number_of_mes, $key2);
      }
    }
    $nom = count($number_of_mes);
} else {
  $nom = 0;
}
?>    

<?php 
if($this->session->userdata('writer_id') != null){


$writer_id = $this->session->userdata('writer_id');

if($this->session->userdata('user_level') === 'writer')
{


//order files start

    $this->db->select('wr_files_notice');
    $this->db->from('writers');
    $this->db->where_in('writer_id', $writer_id);
    $qf = $this->db->get();
    $filesOrderId = array();
    foreach ($qf->result_array() as $q1) {
        foreach ($q1 as $q2) {
            array_push($filesOrderId, $q2);
        }
    }
    if(!empty($filesOrderId[0])){
        $filesOrderId = explode (", ", substr ($filesOrderId[0], 2));
        $filesOrderId = array_unique($filesOrderId);
    } else {unset($filesOrderId);}

//order files end




        $this->db->select('prof_ord_notices');
        $this->db->from('writers');
        $this->db->where_in('writer_id', $writer_id);
        $q = $this->db->get();
        $prof_order = array();
        foreach ($q->result_array() as $q1) {
            foreach ($q1 as $q2) {
                array_push($prof_order, $q2);
            }
        }
        // print_r(substr ($prof_order[0], 2));
        if(!empty($prof_order[0])){
            $prof_order = explode (", ", substr ($prof_order[0], 2));
        } else {unset($prof_order);}


        $this->db->select('oth_bids_notice');
        $this->db->from('writers');
        $this->db->where_in('writer_id', $writer_id);
        $bidQuery = $this->db->get();
        $bid_order = array();
        foreach ($bidQuery->result_array() as $bidQuery1) {
            foreach ($bidQuery1 as $bidQuery2) {
                array_push($bid_order, $bidQuery2);
            }
        }
        if(!empty($bid_order[0])){
            $bid_order = explode (", ", substr ($bid_order[0], 2));
        } else {
          unset($bid_order);
        }


// else
function setNotice($rowName, $w_id, $fromCell, $whereWr){
    $dbvar = new Siteconfigs_model();
    $dbvar->db->select('orderid');
    $dbvar->db->from($fromCell);
    $dbvar->db->where($rowName, 'false');
    $dbvar->db->where($whereWr, $w_id);
    $dbvar->db->distinct();
    $noticeResponse = $dbvar->db->get();
    $ordIdsArray  = array();
    if ($noticeResponse->num_rows() > 0) {
      foreach ($noticeResponse->result_array() as $responce) {
            foreach ($responce as $arguments) {
             array_push($ordIdsArray, $arguments);
            }  
        }
        return $ordIdsArray;
    } else {return false;}
}
$ordersTodo = setNotice('view_todo_ord', $writer_id, 'orders', 'preferred_writer');
$revOrdMes = setNotice('wr_view_rev', $writer_id, 'orders', 'preferred_writer');
$planInfoMes = setNotice('wr_view_plan', $writer_id, 'orders', 'preferred_writer');
$paidInfoMes = setNotice('paid_writer_mes', $writer_id, 'orders', 'preferred_writer');



$fineInfoMes = setNotice('fine_wr_message', $writer_id, 'orders', 'preferred_writer');
// $allNewMes = setNotice('viewed_writer', $writer_id, 'order_messages', 'receiverid');

    $this->db->select(array('orders.orderid', 'order_messages.from_who'));
    $this->db->from('order_messages');
    $this->db->distinct();
    $this->db->where("order_messages.viewed_writer='false' AND (order_messages.from_who='manager' OR order_messages.from_who='zakaz' OR order_messages.from_who='admin')");
    $this->db->where('preferred_writer', $this->session->userdata('writer_id'));
    $this->db->join('orders', 'orders.orderid = order_messages.orderid');
    $allNewMes = $this->db->get()->result_array();



} else {

// chat new messages
    $this->db->select(array('orders.orderid', 'order_messages.from_who'));
    $this->db->from('order_messages');
    $this->db->distinct();
    $this->db->where("order_messages.viewed_client='false' AND (order_messages.from_who='manager' OR order_messages.from_who='avtor' OR order_messages.from_who='admin')");
    $this->db->where('customer', $this->session->userdata('writer_id'));
    $this->db->join('orders', 'orders.orderid = order_messages.orderid');
    $newMesClShow = $this->db->get()->result_array();

    $this->db->select('orderid');
    $this->db->from('orders');
    $this->db->where('customer', $this->session->userdata('writer_id'));
    $resp = $this->db->get()->result_array();
    $orderidsCl = array();
    
    foreach ($resp as $resnew) {
        foreach ($resnew as $resnew1) {
         array_push($orderidsCl, $resnew1);
        }  
    }

//      print_r($orderidsCl);
if(!empty($orderidsCl)){
    $this->db->distinct();
    $this->db->select(array('order_id'));
    $this->db->from('order_files');
    $this->db->where_in('order_id', $orderidsCl);
    $this->db->where("viewed_client='false' AND (client_paid='half' OR client_paid='paid' OR client_paid='paid_client') AND submited='true'");
    $this->db->join('orders', 'orders.orderid = order_files.order_id');
    $newFileCl = $this->db->get();
    $newFileClShow = array();
    if ($newFileCl->num_rows() > 0) {
      foreach ($newFileCl->result_array() as $file) {
            foreach ($file as $file1) {
             array_push($newFileClShow, $file1);
            }  
        }
    } else {$newFileClShow = false;}

    }
  }
} ?>

<div>
<?php if($this->session->userdata('writer_id') != null){ ?>    
      <div id="mWrpWr" style="padding: 0" class="massgeWrapper container clearfix">

<?php if($this->session->userdata('user_level') === 'writer') { ?>        
        <!-- //new order -->
      <div class="col-sm-4">  
        <div data-id="orders_neworder" class="neworders row" >
        <p class="not_zag">Новые заказы:</p>
          <span class="put_here">
          <?php if (isset($prof_order)) { ?>
             <?php foreach ($prof_order as $neworder) { ?>
               <span class="mesOrdWrap">  
                <a href="<?php echo ci_site_url('/order/view/'.$neworder); ?>"><?php echo $neworder; ?></a>
                <form onsubmit="return false" style="display: inline">
                  <sup class="remNewOrderMes" style="font-size: 13px; color: red; cursor: pointer">x</sup>,
                  <input type="hidden" name="orderid" value="<?php echo $neworder; ?>">
                </form>  
                </span>
              <?php } ?>
            <?php } ?>
           </span> 
          </div>  
          <!-- //newWriter -->
        <div data-id="orders_revord" class="neworders row">
        <p class="not_zag">Заказы на доработку:</p>
           <span class="put_here">
        <?php if (is_array ($revOrdMes)) { ?>
           <?php foreach ($revOrdMes as $order) { ?>
           <!-- <pre><?php // print_r($order); ?></pre> -->
            <span class="mesOrdWrap">  
              <a href="<?php echo ci_site_url('order/view/'.$order); ?>"><?php echo $order; ?></a>

              <form onsubmit="return false" style="display: inline">
                <sup class="remViewRevOrd" style="font-size: 13px; color: red; cursor: pointer">x</sup>,
                <input type="hidden" name="orderid" value="<?php echo $order; ?>">
              </form>  
            </span>
            <?php } ?>
          <?php } ?>
          </span>  
          </div>  
     <div data-id="orders_fine" class="neworders row">
        <p class="not_zag">Штрафы по заказам:</p>
        <span class="put_here">
          <?php if (is_array ($fineInfoMes)) { ?>
           <?php foreach ($fineInfoMes as $fine_order) { ?>
           <span class="mesOrdWrap">  
              <a href="<?php echo ci_site_url('order/view/'.$fine_order); ?>"><?php echo $fine_order; ?></a>

              <form onsubmit="return false" style="display: inline">
                <sup class="remViewOrdFine" style="font-size: 13px; color: red; cursor: pointer">x</sup>,
                <input type="hidden" name="orderid" value="<?php echo $fine_order; ?>">
              </form>  
            </span>  
            <?php } ?>
           <?php } ?>
        </span>
     </div> 
</div>
<div class="col-sm-4 text-center midneword_wrap">
<!-- // order bid or refreshed bid -->
        <div data-id="orders_todo" class="neworders row">
        <p class="not_zag">Заказы на выполнение:</p>
        <span class="put_here">
          <?php if (is_array ($ordersTodo)) { ?>
             <?php foreach ($ordersTodo as $todo_order) { ?>
             <span class="mesOrdWrap">  
              <a href="<?php echo ci_site_url('order/view/'.$todo_order); ?>"><?php echo $todo_order; ?></a>

              <form onsubmit="return false" style="display: inline">
                <sup class="remViewTodoOrd" style="font-size: 13px; color: red; cursor: pointer">x</sup>,
                <input type="hidden" name="orderid" value="<?php echo $todo_order; ?>">
              </form>  
              </span>  
              <?php } ?>
            <?php } ?>
          </span>
        </div> 


        <div data-id="orders_auctsion" class="neworders row midneword" >
        <p class="not_zag">Ставки по заказам:</p>
        <span class="put_here">
          <?php if (isset($bid_order)) { ?>
             <?php foreach ($bid_order as $bid_order_sing) { ?>
             <span class="mesOrdWrap">  
                <a href="<?php echo ci_site_url('order/view/'. $bid_order_sing); ?>"><?php echo $bid_order_sing; ?></a>

                <form onsubmit="return false" style="display: inline">
                  <sup class="remViewBid" style="font-size: 13px; color: red; cursor: pointer">x</sup>,
                  <input type="hidden" name="orderid" value="<?php echo $bid_order_sing; ?>">
                </form>  

              </span>  
              <?php } ?>
            <?php } ?>
          </span>
        </div>  

<!-- // plan information -->
        <div data-id="plan_info" class="neworders row midneword" >
        <p class="not_zag">План подтвержден:</p>
        <span class="put_here">
        <?php if (is_array ($planInfoMes)) { ?>
           <?php foreach ($planInfoMes as $plan) { ?>
           <span class="mesOrdWrap">  
              <a href="<?php echo ci_site_url('order/view/'.$plan); ?>"><?php echo $plan; ?></a>

              <form onsubmit="return false" style="display: inline">
                <sup class="remViewPlan" style="font-size: 13px; color: red; cursor: pointer">x</sup>,
                <input type="hidden" name="orderid" value="<?php echo $plan; ?>">
              </form>  

            </span>  
            <?php } ?>
          <?php } ?>
         </span> 
        </div>  
</div>
<div class="col-sm-4 text-right"> 
<!-- chat new messages -->
        <div data-id="orders_chat" class="neworders row " >
        <p class="not_zag">Сообщения по заказам:</p>
        <span class="put_here">
        <?php if (is_array ($allNewMes)) { ?>
           <?php foreach ($allNewMes as $allNewMesSingle) { ?>
           <span class="mesOrdWrap">  
              <a class="ordMesLinkPush" href="<?php echo ci_site_url('order/view/'.$allNewMesSingle['orderid'].'#'.$allNewMesSingle['from_who']); ?>"><?php echo $allNewMesSingle['orderid']; ?>
                
              <span data-toggle="tooltip" data-placement="left" <?php if($allNewMesSingle['from_who'] === 'manager') { echo 'title="От Менеджера"';} elseif($allNewMesSingle['from_who'] === 'admin') {echo 'title="От Администратора"';} else {echo 'title="От Заказчика"';}?> class="mes_who_top_push">
                  <?php if($allNewMesSingle['from_who'] === 'manager') {
                    echo "М";
                  } elseif ($allNewMesSingle['from_who'] === 'admin') {
                    echo 'Адм';
                  } else {
                    echo "З";
                  } ?>
              </span>
              </a>

              <form onsubmit="return false" style="display: inline">
                &nbsp;
                <sup class="remViewChat" style="font-size: 13px; color: red; cursor: pointer">x</sup>,
                <input type="hidden" name="orderid" value="<?php echo $allNewMesSingle['orderid']; ?>">
              </form>  

            </span>  
            <?php } ?>
          <?php } ?>
          </span>
          </div>  
          <!-- paid orders -->
        <div data-id="orders_paid" class="neworders row" >
        <p class="not_zag">Оплата по заказам:</p>
        <span class="put_here">
        <?php if (is_array ($paidInfoMes)) { ?>
           <?php foreach ($paidInfoMes as $paidInfo) { ?>
           <span class="mesOrdWrap">  
              <a href="<?php echo ci_site_url('order/view/'.$paidInfo); ?>"><?php echo $paidInfo; ?></a>

              <form onsubmit="return false" style="display: inline">
                <sup class="remPaidInfoMes" style="font-size: 13px; color: red; cursor: pointer">x</sup>,
                <input type="hidden" name="orderid" value="<?php echo $paidInfo; ?>">
              </form>  

            </span>  
            <?php } ?>
          </span>  
          <?php } ?>
        </div> 


        <div data-id="orders_wr_file" class="neworders row" >
        <p class="not_zag">Файлы по заказам:</p>
        <span class="put_here">
        <?php if (isset($filesOrderId)) { ?>
           <?php foreach ($filesOrderId as $file) { ?>
           <span class="mesOrdWrap">  
              <a href="<?php echo ci_site_url('order/view/'.$file); ?>"><?php echo $file; ?></a>

              <form onsubmit="return false" style="display: inline">
                <sup class="remViewWrFiles" style="font-size: 13px; color: red; cursor: pointer">x</sup>,
                <input type="hidden" name="orderid" value="<?php echo $file; ?>">
              </form>  

            </span>  
            <?php } ?>
          </span>  
          <?php } ?>
        </div> 
</div>
<?php } else { ?>
<!-- client messagex -->
<?php if(!empty($orderidsCl)){ ?>
      <div class="col-sm-12">  
        <div data-id="orders_mesCl" class="neworders row">
        <p class="not_zag">Сообщения по заказам:</p>
        <span class="put_here">
        <?php if (is_array ($newMesClShow)) { ?>
           <?php foreach ($newMesClShow as $order) { ?>
           <!-- <pre><?php // print_r($order); ?></pre> -->
           <span class="mesOrdWrap">  
              <a class="ordMesLinkPush" href="<?php echo ci_site_url('order/view/'.$order['orderid'].'#'.$order['from_who']); ?>">
                <?php echo $order['orderid']; ?>
                
                <span data-toggle="tooltip" data-placement="top" <?php if($order['from_who'] === 'manager') { echo 'title="От Менеджера"';} else {echo 'title="От Автора"';}?> class="mes_who_top_push">
                  <?php if($order['from_who'] === 'manager') {
                    echo "М";
                  } elseif ($order['from_who'] === 'admin') {
                    echo "Адм";
                  } else {
                    echo "А";
                  } ?>
                </span>

                </a>

              <form onsubmit="return false" style="display: inline">
                <sup class="remViewMesCl" style="font-size: 13px; color: red; cursor: pointer">x</sup>,
                <input type="hidden" name="orderid" value="<?php echo $order['orderid']; ?>">
              </form>  
            </span>  
            <?php } ?>
          <?php } ?>
          </span>
          </div>  

     <div data-id="orders_file" class="neworders row">
        <p class="not_zag">Файлы по заказам:</p>
        <span class="put_here">
        <?php if (is_array ($newFileClShow)) { ?>
           <?php foreach ($newFileClShow as $file_order) { ?>
           <span class="mesOrdWrap">  
              <a href="<?php echo ci_site_url('order/view/'.$file_order); ?>"><?php echo $file_order; ?></a>

              <form onsubmit="return false" style="display: inline">
                <sup class="remViewOrdFile" style="font-size: 13px; color: red; cursor: pointer">x</sup>,
                <input type="hidden" name="orderid" value="<?php echo $file_order; ?>">
              </form>  
            </span>  
            <?php } ?>
          <?php } ?>
          </span>
          </div> 
</div>
<?php } ?>


<?php } ?>

      </div>


<script type="text/javascript">

    $(document).ready(function() {


        function toRem(nodeToRemove){
          nodeToRemove.remove();
        }

      function ajRemMessage(clName, CtrlFunc){
        $('#mWrpWr').on('click', clName, function(form){
              var ftar = form.target.parentElement;
              // console.log($(ftar).serialize());
              console.log(ftar);

                 if(oldNotice != undefined){
                  var noticeBlockKey = form.target.parentElement.parentElement.parentElement.parentElement.getAttribute('data-id');
                  var noticeValue;

                  if(noticeBlockKey != 'orders_chat' && noticeBlockKey != 'orders_mesCl'){
                    noticeValue = form.target.parentElement.querySelector('input[type=hidden]').value;  
                  } else {
                    var fh = form.target.parentElement.parentElement.querySelector('a.ordMesLinkPush span.mes_who_top_push').innerText;
                    if(fh === 'М'){
                      noticeValue = form.target.parentElement.querySelector('input[type=hidden]').value + ':manager';
                    } else if(fh === 'А'){
                      noticeValue = form.target.parentElement.querySelector('input[type=hidden]').value + ':avtor';
                    } else if(fh === 'Адм'){
                      noticeValue = form.target.parentElement.querySelector('input[type=hidden]').value + ':admin';
                    } else {
                      noticeValue = form.target.parentElement.querySelector('input[type=hidden]').value + ':zakaz'
                    }
                  }
                  console.log(oldNotice[noticeBlockKey]);
                  tempArr = oldNotice[noticeBlockKey].split(', ').slice(1);

                  tempArr.splice(tempArr.indexOf(noticeValue), tempArr.indexOf(noticeValue)+1);

                  oldNotice[noticeBlockKey] = ', '+tempArr.join(', ');
                  // console.log(oldNotice[noticeBlockKey]);
                  if(oldNotice[noticeBlockKey] === ', '){
                    oldNotice[noticeBlockKey] = '';
                  }
                  console.log(oldNotice[noticeBlockKey]);

                  // toRem(form.target.parentElement.parentElement);
                  // return false;
                }

               $.post('<?php echo ci_site_url(); ?>Order/'+ CtrlFunc, $(ftar).serialize(), function(data){
                toRem(form.target.parentElement.parentElement);
                console.log(clName, CtrlFunc)
                // return false;
               });

        });
      }
 <?php if($this->session->userdata('user_level') === 'writer') { ?>       
      ajRemMessage('sup.remNewOrderMes', 'del_prof_ord');
      ajRemMessage('sup.remViewRevOrd', 'del_viev_rev_ord_massage');
      ajRemMessage('sup.remViewTodoOrd', 'del_viev_todo_ord_massage');
      ajRemMessage('sup.remViewPlan', 'del_viev_plan_massage');
      ajRemMessage('sup.remViewBid', 'del_bid_ord');
      ajRemMessage('sup.remViewChat', 'del_writer_new_message');
      ajRemMessage('sup.remPaidInfoMes', 'del_writer_paid_mes');
      ajRemMessage('sup.remViewOrdFine', 'del_writer_fine_mes');
      ajRemMessage('sup.remViewWrFiles', 'del_writer_file_mes');
<?php } else { ?>
    ajRemMessage('sup.remViewMesCl', 'del_client_new_message');
    ajRemMessage('sup.remViewOrdFile', 'del_client_file_message');

<?php } ?>

});
</script>

<?php } ?>
</div>

<!-- ///////// -->




<?php if ($this->session->userdata('user_level') == 'client'): ?>
<div class="fre-perfect-freelancer">

        <div class="fre-page-section section-archive-project">
            <div class="container-fluid">

        <div class="row">

          <div class="col-md-12">

        <div class="row">

                    <div class="col-md-4">

            <div class="orders-profile loggedin text-center">
<div class="row">

<table>
  <tr>

<td class="ops-sm-6">

<?php if($this->session->userdata('profile_img')): ?>
<img class="freelance-avatar" src="<?=base_url()?><?php echo $this->config->item('uploads'); ?>/profiles/<?php echo $this->session->userdata('writer_id'); ?>/<?php echo $this->session->userdata('profile_img'); ?>" alt="image1" height="120px" width="120px"/>
<?php endif; ?>
<?php if(!$this->session->userdata('profile_img')): ?>
<img class="freelance-avatar" src="<?=base_url()?>opasset/img/profile.png" alt="image2"  height="120px" width="120px"/>
<?php endif; ?>
</td>
<td class="ops-sm-6">
<strong>Добро пожаловать, </strong><br/>
<h4 style="padding-left: 0px"><?php echo $this->session->userdata('firstname'); ?>  </h4>
<a href="<?php echo ci_site_url(); ?>user/myprofile" type="button" class="btn btn-success">Мой профиль</a>
</td>

</tr>
</table>

</div>
<hr/>
<div class="row">
 <?php 
$receiverid = $this->session->userdata('writer_id'); 
$this->db->where(array('receiverid' => $receiverid, 'msg_read' =>0 ));
$unreadmessages = $this->db->count_all_results('messages');  

?>

  <div class="col-md-4"><a href="<?php echo ci_site_url(); ?>"><i class="fa fa-bars "> На главную</i>  </a></div>
<div class="col-md-4" ><div><a id="lan" href="<?php echo ci_site_url(); ?>messages/messages"><span><?php echo $nom; ?></span> Тех. поддержка</a></div>
</div> 

<div class="col-md-4"><a href="<?php echo ci_site_url(); ?>user/logout"><i class="fa fa-power-off "> Выйти из аккаунта</i>  </a></div>

<hr/>
</div>
          </div>
<div class="orders-profile loggedin">
<?php         

$this->db->select('orderid');
$this->db->where('customer', $this->session->userdata('writer_id'));
$this->db->where_in('order_status', array('Openproject'));
$clientmyorders = $this->db->count_all_results('orders');
// client_unpaid
$this->db->where(array('customer' => $writer_id, 'client_paid' => 'unpaid'));
$client_unpaid = $this->db->count_all_results('orders'); 

// client Assigned
$this->db->where("customer='".$writer_id."' AND (order_status='Assigned' OR order_status='Cancelled')");
$client_assigned = $this->db->count_all_results('orders');  



// Uplaod pending
$this->db->where(array('customer' => $writer_id, 'preferred_writer' > 0, 'order_status' => 'pending'));
$client_pending = $this->db->count_all_results('orders');  

// completed orders
//$this->db->where(array('customer' => $writer_id,  'preferred_writer' > 0,'order_status' => 'completed'));
$this->db->where("customer='".$writer_id."' AND (order_status='completed' OR order_status='Archived' OR order_status='onlyAvtorDoplata' OR order_status='pending' )");
$client_completed = $this->db->count_all_results('orders');    

// Revision orders
$this->db->where(array('customer' => $writer_id,  'preferred_writer' > 0,'order_status' => 'revision'));
$client_revision = $this->db->count_all_results('orders');    

?>

<div class="row">
<a class="btn btn-danger col-md-12" href="<?php echo ci_site_url(); ?>order/create"> Заказать работу </a>
</div></br>
<h3> Разделы </h3><hr/>
<ul>
      <div><span class="fa fa-bars"></span> &nbsp; <a href="<?php echo ci_site_url(); ?>order/clientmyorders">Мои заказы (<?php echo $clientmyorders ; ?>) </a></div><hr/>
    <!--  <div><span class="fa fa-flash"></span> &nbsp; <a href="<?php // echo ci_site_url(); ?>order/client_unpaid">Неоплаченные заказы (<?php // echo $client_unpaid ; ?>)</a></div><hr/> -->
     <div><span class="fa fa-paperclip"></span> &nbsp; <a href="<?php echo ci_site_url(); ?>order/client_assigned">Заказы на выполнении (<?php echo $client_assigned ; ?>) </a></div><hr/>
    <!-- <div><span class="fa fa-download"></span> &nbsp; <a href="<?php // echo ci_site_url(); ?>order/client_pending">Заказы на оценке (<?php echo $client_pending ; ?>)</a></div><hr/> -->
    <div><span class="fa fa-check"></span> &nbsp; <a href="<?php echo ci_site_url(); ?>order/client_completed">Завершенные заказы (<?php echo $client_completed; ?>)</a></div><hr/>
    <div><span class="fa fa-tags"></span> &nbsp; <a href="<?php echo ci_site_url(); ?>order/client_revision">Заказы на доработке (<?php echo $client_revision; ?>) </a></div><hr/>
    <div><span class="fa fa-tags"></span> &nbsp; <a href="https://legko-v-uchebe.com/otzyvy/">Отзывы</a></div><hr/>
    

</ul>

</div>



          </div>
<?php endif; ?>



<?php if ($this->session->userdata('user_level') == 'writer'): ?>


<div class="fre-perfect-freelancer">

        <div class="fre-page-section section-archive-project">
            <div class="container">

        <div class="row">
<div class="col-md-4">




<?php
$writer_id = $this->session->userdata('writer_id');


$wr_ordersOpn = $this->db->select('orderid');
$wr_ordersOpn = $this->db->where('writerid', $writer_id);
// $wr_ordersOpn = $this->db->where("writerid='".$writer_id."' AND customer!='".$writer_id."'");
$wr_ordersOpn = $this->db->get('project_requests');
$idsNoOrdOpn = array();
if ($wr_ordersOpn->num_rows() > 0) {
  foreach($wr_ordersOpn->result_array() as $ord){
    foreach ($ord as $ord1) {
      array_push($idsNoOrdOpn, $ord1);
    }
  }
}
// $this->db->where(array('order_status' => 'Openproject'));
$this->db->where("order_status='Openproject' AND customer!='".$writer_id."'");
if(!empty($idsNoOrdOpn)){
  $this->db->where_not_in('orderid', $idsNoOrdOpn);
}
$openprojects = $this->db->count_all_results('orders');             

// writer assigned
$this->db->where(array('preferred_writer' => $writer_id,'order_status' => 'Assigned'));
$this->db->where("preferred_writer='".$writer_id."' AND order_status='Assigned' AND customer!='".$writer_id."'");
$writer_assigned = $this->db->count_all_results('orders');  

// order uplaoded pending

$this->db->where("preferred_writer='".$writer_id."' AND (client_paid='paid' OR client_paid='paid_writer') AND order_status='Completed' AND customer!='".$writer_id."' ");

$writer_pending = $this->db->count_all_results('orders'); 

// completed orders

$this->db->where("preferred_writer='".$writer_id."' AND (order_status='completed' OR order_status='pending' OR  order_status='onlyAvtorDoplata')  AND customer!='".$writer_id."' AND (client_paid!='paid' AND client_paid!='paid_writer') ");



$writer_completed = $this->db->count_all_results('orders');  

// revision orders
$this->db->where("preferred_writer='".$writer_id."' AND order_status='revision' AND customer!='".$writer_id."' ");
$writer_revision = $this->db->count_all_results('orders');  

// профильные
$subj = $this->db->select('subject')->where('writer_id', $writer_id)->get('writers');
        if ($subj->num_rows() > 0) {
        foreach ($subj->result() as $row) {

        $subj = explode(', ', $row->subject);
            }
           
        }
     
      $assigned = array('Openproject');
        $this->db->where_in ('order_status', $assigned);
        $this->db->where_in ('subject', $subj);
        $this->db->where("customer!='".$writer_id."'");

if(!empty($idsNoOrdOpn)){
  $writer_profile = $this->db->where_not_in('orderid', $idsNoOrdOpn);
}       
$writer_profile = $this->db->count_all_results('orders');   

// Оцененные заказы
$this->db->select('orderid');
$this->db->where(array('writerid' => $writer_id));
$queryPR = $this->db->get('project_requests');
if ($queryPR->num_rows() > 0) {
  $res_arrPR = array();
  foreach ($queryPR->result_array() as $resPR) {
      array_push($res_arrPR, $resPR['orderid']);
  }
  $this->db->where_in('orderid', $res_arrPR);
  $this->db->where('order_status', 'Openproject');
  $writer_requests = $this->db->count_all_results('orders');
} else {
  $writer_requests = 0;
}
// Оцененные заказы


?>
<div class="orders-profile loggedin text-center">
<div class="row">

<table>
  <tr>

<td class="ops-sm-6">

<?php if($this->session->userdata('profile_img')): ?>
<img class="freelance-avatar" src="<?=base_url()?><?php echo $this->config->item('uploads'); ?>/profiles/<?php echo $writer_id; ?>/<?php echo $this->session->userdata('profile_img'); ?>" alt="image1" height="120px" width="120px"/>
<?php endif; ?>
<?php if(!$this->session->userdata('profile_img')): ?>
<img class="freelance-avatar" src="<?=base_url()?>opasset/img/profile.png" alt="image2"  height="120px" width="120px"/>
<?php endif; ?>
</td>
<td class="ops-sm-6">
<strong>Добро пожаловать, </strong><br/>
<h4 style="padding-left: 0px"><?php echo $this->session->userdata('firstname'); ?> </h4>
<a href="<?php echo ci_site_url(); ?>user/myprofile" type="button" class="btn btn-success">Мой профиль</a>
</td>

</tr>
</table>

</div>
<hr/>
<div class="row">
<div class="col-md-4"><a href="<?php echo ci_site_url(); ?>"><i class="fa fa-bars"> На главную</i>  </a></div>
<div class="col-md-4">
<div><a id="lan" href="<?php echo ci_site_url(); ?>messages/messages"><span ><?php echo $nom; ?></span> Тех. поддержка</a></div>
</div> 
<div class="col-md-4"><a href="<?php echo ci_site_url(); ?>user/logout"><i class="fa fa-power-off"> Выйти из аккаунта</i>  </a></div>

<hr/>
</div>
          </div>


<?php
 if ($this->session->userdata('writer_status') == 'Active') { ?>
        <div class="orders-profile loggedin">
          <h4> Разделы </h4>
<ul>
      <div><i class="fa fa-folder-open"></i> &nbsp; <a href="<?php echo ci_site_url(); ?>order/openorders">Найти заказы (<?php echo $openprojects ; ?>)</a></div><hr/>


      <div>
        <i class="fa fa-edit"></i> &nbsp;
         <a href="<?php echo ci_site_url(); ?>order/writer_profile">Заказы на оценку (<?php echo $writer_profile; ?>)</a>
       </div><hr/>
       <div><i class="fa fa-thumb-tack"></i> &nbsp; <a href="<?php echo ci_site_url(); ?>order/writer_requests">Оцененные заказы(<?php echo $writer_requests ; ?>)</a></div><hr/>
     <div><i class="fa fa-address-book"></i> &nbsp; <a href="<?php echo ci_site_url(); ?>order/writer_assigned">Заказы на выполнении(<?php echo $writer_assigned ; ?>)</a></div><hr/>
      <div><i class="fa fa-check"></i> &nbsp; <a href="<?php echo ci_site_url(); ?>order/writer_completed">Неоплаченные (<?php echo $writer_completed; ?>)</a></div><hr/>
     <div><i class="fa fa-credit-card"></i> &nbsp; <a href="<?php echo ci_site_url(); ?>order/writer_pending">Оплаченные заказы (<?php echo $writer_pending ; ?>)</a></div><hr/>
     <div><i class="fa fa-flash"></i> &nbsp; <a href="<?php echo ci_site_url(); ?>order/writer_revision">На доработке (<?php echo $writer_revision ; ?>)</a></div><hr/>
    
</ul>
    
        </div> <?php  }

?>
         <div class="orders-profile loggedin">
     <div><i class="fa fa-bank"></i> &nbsp; <a href="https://legko-v-uchebe.com/usloviya/" target="_blank">Условия работы </a></div><hr/>
    
        </div>


          </div>
<?php endif; ?>
<script type="text/javascript">
var oldNotice;
var techChat, orderChat;

var topNoticeBlock = document.getElementById('mWrpWr');
function createNoticeTemplate(id, supClass){
  var html;
  if(supClass != 'remViewChat' && supClass != 'remViewMesCl') {
    html = '<span class="mesOrdWrap">';  
    html += '<a href="<?php echo ci_site_url('/order/view/'); ?>'+id+'">'+id+'</a>&nbsp;';
    html +=   '<form onsubmit="return false" style="display: inline">';
    html +=     '<sup class="'+supClass+'" style="font-size: 13px; color: red; cursor: pointer">x</sup>,';
    html +=       '<input type="hidden" name="orderid" value="'+id+'">';
    html +=     '</form>';
    html += '</span>&nbsp;';
  } else {
    var split_id = id.split(':');
    var fh = 'З';
    var ttip = 'От Заказчика';
    if(split_id[1] === 'manager'){
      fh = 'M';
      ttip = 'От Менеджера';
    } else if(split_id[1] === 'avtor'){
      fh = 'А';
      ttip = 'От Автора';
    } else if(split_id[1] === 'admin'){
      fh = 'Адм';
      ttip = 'От Администратора';
    }

    console.log(split_id);
    html = '<span class="mesOrdWrap">';
    html += '<a class="ordMesLinkPush" href="<?php echo ci_site_url('order/view/'); ?>'+split_id[0]+'#'+split_id[1]+'">'+split_id[0];
    html += '&nbsp<span data-toggle="tooltip" data-placement="left" title="'+ttip+'" class="mes_who_top_push">';
    html += fh;
    html +='</span>';
    html +='</a>';
    html +='<form onsubmit="return false" style="display: inline">&nbsp';
    html +='<sup class="'+supClass+'" style="font-size: 13px; color: red; cursor: pointer">x</sup>,';
    html +='<input type="hidden" name="orderid" value="'+split_id[0]+'">';
    html +='</form>'; 
    html +='</span>';


  }  

    return html;
}
function putNoticeTemplate(ids, key) {
  var supClass = '';
  // if(key === 'oth_bids_notice'){}
  switch (key) {
    case 'orders_revord': supClass = 'remViewRevOrd'; break;
    case 'orders_todo': supClass = 'remViewTodoOrd'; break;
    case 'orders_auctsion': supClass = 'remViewBid'; break;
    case 'plan_info': supClass = 'remViewPlan'; break; 
    case 'orders_chat': supClass = 'remViewChat'; break;  
    case 'orders_paid': supClass = 'remPaidInfoMes'; break;
    case 'orders_fine': supClass = 'remViewOrdFine'; break; 
    case 'orders_neworder': supClass = 'remNewOrderMes'; break;    
    case 'orders_mesCl': supClass = 'remViewMesCl'; break;
    case 'orders_file': supClass = 'remViewOrdFile'; break;  
    case 'orders_wr_file': supClass = 'remViewWrFiles'; break;  
  }
  var tpl = '';
  var id = ids.split(', ').slice(1);
  for(var i = 0; i <= id.length-1; i++){
    tpl += createNoticeTemplate(id[i], supClass)
  }
  console.log("div[data-id="+key+"] span.put_here");
  topNoticeBlock.querySelector('div[data-id='+key+'] span.put_here').innerHTML = tpl;

}  
function putTechMessage(content){
  var fh;
  if(!techChat){techChat = 0} 
  for(var i = 0; i <= content.length-1; i++){
    if(content[i]['senderid'] === '2562'){
      fh = 'admin';
    } else {fh = 'manager';}

    if(techChat < content[i]['id']){
        addYourMessage(content[i]['msg_title'], content[i]['msg_body'], fh, content[i]['msg_date'], content[i]['id'], 'manager', 'adm_mes', '<?php echo $this->session->userdata('user_level'); ?>');
        // oldNotice['newTechMessages'] = content[i]['id'];
      }
  }
  techChat = content[content.length-1]['id'];
}
function putChatMessage(content){
  var fh, chatHistory, whom;
  if(!orderChat){orderChat = 0}
    iter:for(var i = 0; i <= content.length-1; i++){

      if(orderChat < content[i]['id']){

        sw:switch (content[i]['from_who']){
          case 'zakaz': fh = 'client'; chatHistory = '#refresh_zak_chat'; break sw; 
          case 'manager' : fh = 'manager'; chatHistory = '#refresh_mngr_chat'; break sw;
          case 'admin' : fh = 'admin';  chatHistory = '#refresh_mngr_chat'; break sw;
          case 'avtor' : fh = 'writer'; chatHistory = '#refresh_zak_chat'; break sw;
        }
        sw2:switch(content[i]['whom']){
          case 'zakaz' : whom = 'client'; break sw2;
          case 'manager' : whom = 'manager'; break sw2;
          case 'admin' : whom = 'admin'; break sw2;
          case 'avtor' : whom = 'writer'; break sw2;            
        }

        addYourMessage(content[i]['message_body'], fh, content[i]['approval'], chatHistory, whom, '');

        fh = chatHistory = whom = '';
      }

    }
    orderChat = content[content.length-1]['id'];
    // console.log(orderChat);

}

randNum();
        function randNum() {
           var wr_id = '' + <?php echo $this->session->userdata['writer_id']; ?>;
           var dt = Math.floor(Date.now() / 1000);
           var sendCont = 'date_now='+dt+'&writer_id=' + wr_id+'&url='+ window.location.href;
           // console.log(sendCont);
            $.post('<?php  echo ci_site_url(); ?>writersed/check_online', sendCont, function(data){
                data = JSON.parse(data);
                if(oldNotice === undefined){
                  // console.log(oldNotice);
                  oldNotice = data;
                  console.log(oldNotice);
                  return false;
                }
                for(key in data){
                  if(data[key] != oldNotice[key]){
                    if(key === 'nom'){
                      document.getElementById('lan').querySelector('span').innerHTML = data[key];
                    } else if(key === 'newTechMessages'){
                      putTechMessage(data[key]);
                    } else if(key === 'wr_cl_order_chat'){
                      putChatMessage(data[key])
                    } else {
                      // console.log('+');
                      putNoticeTemplate(data[key], key);
                    }


                  }               
                }
                oldNotice = data;
              }
            );
           

        }

        setInterval(randNum, 20000);


/*    setInterval(function(){ 
      // $('#lan').load(window.location.href + " #lan");
      // $('#mWrpWr').load(window.location.href + " #mWrpWr"); 
    }, 10000);*/
$(function () {
  $('[data-toggle="popover"]').popover()
})
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>