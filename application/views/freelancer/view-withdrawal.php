<div class="fre-perfect-freelancer">

        <div class="fre-page-section section-archive-project">
            <div class="container-fluid">

        <div class="row">

          <div class="col-md-12">

<div class="col-md-4">
            <?php        

$writer_id = $this->session->userdata('writer_id');

 // count all open projects 
$this->db->where(array('preferred_writer' => 0));
$openprojects = $this->db->count_all_results('orders');             

// writer assigned
$this->db->where(array('preferred_writer' => $writer_id,'order_status' => 'Assigned'));
$writer_assigned = $this->db->count_all_results('orders');  

// order uplaoded pending
$this->db->where(array('preferred_writer' => $writer_id,'order_status' => 'pending'));
$writer_pending = $this->db->count_all_results('orders'); 

// completed orders
$this->db->where(array('preferred_writer' => $writer_id,'order_status' => 'completed'));
$writer_completed = $this->db->count_all_results('orders');  


// revision orders
$this->db->where(array('preferred_writer' => $writer_id,'order_status' => 'revision'));
$writer_revision = $this->db->count_all_results('orders');  

// canceleld orders
$this->db->where(array('preferred_writer' => $writer_id,'order_status' => 'cancelled'));
$writer_cancelled = $this->db->count_all_results('orders');    

?>
           <div class="orders-profile loggedin text-center">
<div class="row">

<table>
  <tr>
<td class="col-sm-6">
<?php if($this->session->userdata('profile_img')): ?>
<img class="freelance-avatar" src="<?=base_url()?><?php echo $this->config->item('uploads'); ?>/profiles/<?php echo $writer_id; ?>/<?php echo $this->session->userdata('profile_img'); ?>" alt="image1" height="120px" width="120px"/>
<?php endif; ?>
<?php if(!$this->session->userdata('profile_img')): ?>
<img class="freelance-avatar" src="<?=base_url()?>asset/img/profile.png" alt="image2"  height="120px" width="120px"/>
<?php endif; ?>
</td>
<td class="col-sm-6">
<strong>Welcome back, </strong><br/>
<h4><?php echo $this->session->userdata('firstname'); ?> <?php echo $this->session->userdata('lastname'); ?> </h4>
<a href="<?php echo ci_site_url(); ?>user/myprofile" type="button" class="btn btn-success">View Profile</a>
</td>

</tr>
</table>

</div>
<hr/>
<div class="row ">
<div class="col-md-6">
User #ID: <?php echo $writer_id; ?> and registered as <?php echo$this->session->userdata('user_level'); ?> 
</div>
<div class="col-md-6"><i class="fa fa-power-off"></i> &nbsp; <a href="<?php echo ci_site_url(); ?>user/logout">Выйти </a></div><hr/> 
</div>
          </div>



        <div class="orders-profile loggedin">
          <h4> Разделы </h4>
<ul>
      
      <div><i class="fa fa-th"></i> &nbsp; <a href="<?php echo ci_site_url(); ?>order/openorders">Все заказы (<?php echo $openprojects ; ?>) </a></div><hr/>
      <div><i class="fa fa-th"></i> &nbsp; <a href="<?php echo ci_site_url(); ?>order/writer_assigned">Открытые заказы (<?php echo $writer_assigned ; ?>) </a></div><hr/>
     <div><i class="fa fa-flash"></i> &nbsp; <a href="<?php echo ci_site_url(); ?>order/writer_pending">Ожидание редактирования (<?php echo $writer_pending ; ?>)</a></div><hr/>
     <div><i class="fa fa-th"></i> &nbsp; <a href="<?php echo ci_site_url(); ?>order/writer_completed">Завершенные заказы (<?php echo $writer_completed ; ?>) </a></div><hr/>
     <div><i class="fa fa-th"></i> &nbsp; <a href="<?php echo ci_site_url(); ?>order/writer_revision">На пересмотре(<?php echo $writer_revision ; ?>)  </a></div><hr/>
    <div><i class="fa fa-save"></i> &nbsp; <a href="<?php echo ci_site_url(); ?>order/writer_cancelled">Отмененные заказы (<?php echo $writer_cancelled ; ?>) </a></div><hr/>
</ul>
    
        </div>
        <div class="orders-profile loggedin">
          <h4> Financial </h4>
<ul>
      
      <div><i class="fa fa-th"></i> &nbsp; <a href="<?php echo ci_site_url(); ?>financial">Financial (Account Balance)</a></div><hr/>
      <div><i class="fa fa-th"></i> &nbsp; <a href="<?php echo ci_site_url(); ?>financial/payment_history">Payment History </a></div><hr/>
     <div><i class="fa fa-flash"></i> &nbsp; <a href="<?php echo ci_site_url(); ?>financial/myaccounts">My Accounts </a></div><hr/>
</ul>
    
        </div>


          </div>
          <div class="col-md-8 border-right">
                  <div class="row ">
            <div class="orders-profile loggedin ">
<div class="row">
   <?php foreach ($transaction as $transaction): ?>
<h4>Transaction Details |  <?php echo $transaction['trns_id']; ?></h4>


                        <ul class="media-list">
                           <li class="media media-replied">


<div class="media-body">
                                 <div class="main-inner-sidebar">

                                 <table class="table table-striped">
                           <tbody>
                              <tr>
                                 <td class="text-right col-sm-4">Transaction Type:</td>
                                 <td class="text-left col-sm-8">
                                    <?php echo $transaction['trns_type']; ?> 
                                 </td>
                              </tr>
                                                            <tr>
                                 <td class="text-right">Transaction date:</td>
                                 <td class="text-left">
                                    <?php echo $transaction['trns_date']; ?>  
                                 </td>
                              </tr>
                                                            <tr>
                                 <td class="text-right">Transaction Status:</td>
                                 <td class="text-left">
                                     <?php echo $transaction['trns_status']; ?>
                                 </td>
                              </tr>
                                                            <tr>
                                 <td class="text-right">Transactor Details:</td>
                                 <td class="text-left">
                                    <?php echo $transaction['writer_id']; ?>
                                 </td>
                              </tr>

                                                                                          <tr>
                                 <td class="text-right">Transactor ID:</td>
                                 <td class="text-left">
                                   <?php echo $transaction['trns_fullname']; ?> [<?php echo $transaction['writer_id']; ?>]
                                 </td>
                              </tr>


                                                                                          <tr>
                                 <td class="text-right">Amount:</td>
                                 <td class="text-left">
                                    <?php echo $transaction['trans_amount']; ?>
                                 </td>
                              </tr>



                                                                                          <tr>
                                 <td class="text-right">Payment Details</td>
                                 <td class="text-left">
                                    <?php echo $transaction['payment_details']; ?>
                                 </td>
                              </tr>


                                                                                          <tr>
                                 <td class="text-right">Paid Details</td>
                                 <td class="text-left">
                                    <?php $paid_details =$transaction['paid_details']; echo $transaction['paid_details']; ?>
                                 </td>
                              </tr>

                                                                                          <tr>
                                 <td class="text-right">Completed/Cancelled Date</td>
                                 <td class="text-left">
                                    <?php echo $transaction['action_date']; ?>
                                 </td>
                              </tr>
                              </tbody>
                              </table>
                                   
                                 </div> <?php endforeach; ?>
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

