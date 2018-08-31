      <!-- Content -->
      <div id='content'>
        <div class='panel panel-default'>
          <div class='panel-heading'>
            <i class='fa fa-star fa fa-large'></i>
           Быстрые ссылки
            <div class='panel-tools'>
              <div class='btn-group'>
                <a class='btn' href='#'>
                  <i class='icon-refresh'></i>
                 Добро пожаловать!
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

<?php        

// customer my orders        

        $count_orderrequests = 0;  
        $this->db->order_by("orderid", "desc");
        $this->db->distinct();
        $this->db->group_by('orderid');
        $query =   $this->db->get('project_requests'); 
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {$data[] = $row;}
          //get orgers
          $res_arr = array();
          foreach ($query->result_array() as $res) {
              array_push($res_arr, $res['orderid']);
          }
          $this->db->order_by('last_ord_req', 'desc');
          $this->db->where_in('orderid', $res_arr);
          if($this->session->userdata('admin_level') != 'super'){
            $this->db->where("order_status='Openproject' AND (manager_id='".$this->session->userdata('writer_id')."' OR manager_id='')");
          } elseif($this->session->userdata('admin_level') === 'super') {
                $this->db->where('order_status', 'Openproject');
          }
          $query2 = $this->db->get('orders');
          $arr1 = array();
          if($query2->num_rows() > 0){
            foreach ($query2->result_array() as $ord_req) {
              array_push($arr1, $ord_req);
            }
            $count_orderrequests = count($arr1);           
          }
        }

//allorders

   $count_unassignedorders = 0; 
        $this->db->select(array('order_status', 'orderid'));
        $this->db->order_by("orderid", "desc");
          $assigned = array( 'Openproject', 'Revision', 'cancelled', 'Assigned', 'pending');
          if($this->session->userdata('admin_level') != 'super'){
              $this->db->where("manager_id='".$this->session->userdata('writer_id')."' OR  manager_id=''");
          }
          $query = $this->db->get('orders');
          $new_query = array();
        if ($query->num_rows() > 0) {
          foreach ($query->result_array() as $qwe) {
              if($qwe['order_status'] != 'Archived' && $qwe['order_status'] != 'Completed' ){
                  array_push($new_query, $qwe);
             }
          }
           $count_unassignedorders = count($new_query);
        }
//na vipolnenii
        
        $count_assignedorders = 0;
        if($this->session->userdata('admin_level') != 'super'){
            $this->db->where("order_status='Assigned' AND (manager_id='".$this->session->userdata('writer_id')."' OR manager_id='')");
        } elseif($this->session->userdata('admin_level') === 'super') {
             $this->db->where("order_status='Assigned'");
        }
        
        $query =   $this->db->get('orders'); 

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           $count_assignedorders = count($query->result_array());
        }




// client paid
        $this->db->where(array('preferred_writer' => 0, 'order_status' => 'pending'));
         $count_pendingorders = $this->db->count_all_results('orders'); 




// customer my orders
         $this->db->where(array('user_level' => 'writer', 'writer_status' => 'false'));
         $count_falsewriters = $this->db->count_all_results('writers'); 

         $this->db->where(array('user_level' => 'writer', 'writer_status' => 'Active'));
         $count_activewriters = $this->db->count_all_results('writers'); 

         $this->db->where(array('user_level' => 'writer', 'writer_status' => 'Suspended'));
         $count_suspendedwriters =  $this->db->count_all_results('writers'); 

         $this->db->where(array('user_level' => 'writer', 'writer_status' => 'Deactivated'));
         $count_deactivatedwriters = $this->db->count_all_results('writers'); 

?>


<div class="col-md-6">
<div class="row">
 

  <div class="col-md-3 text-center"><a href="<?php echo ci_site_url(); ?>Adminorders/order_requests"><i class="fa fa-3x">(<?php echo $count_orderrequests; ?>)</i><h5>Оцененные заказы</h5></a></div>

  <div class="col-md-3 text-center"><a href="<?php echo ci_site_url(); ?>Adminorders/iorders"><i class="fa fa-3x">(<?php echo $count_unassignedorders; ?>)</i><h5>Все заказы</h5></a></div>

  <div class="col-md-3 text-center"><a href="<?php echo ci_site_url(); ?>Adminorders/assigned_orders"><i class="fa fa-3x">(<?php echo $count_assignedorders; ?>)</i><h5>На выполнении</h5></a></div>


</div> 
<hr>
<div class="row">
  <div class="col-md-3 text-center"><a href="<?php echo ci_site_url(); ?>Adminwriters/false_writers"><i class="fa fa-3x">(<?php echo $count_falsewriters; ?>)</i><h5>Заблокированные авторы </h5></a></div>

  <div class="col-md-3 text-center"><a href="<?php echo ci_site_url(); ?>Adminwriters/active_writers"><i class="fa fa-3x">(<?php echo $count_activewriters-1; ?>)</i><h5>Активные авторы </h5></a></div>


</div>


          </div>

            <div class="col-md-6">
                <div class="widget-container fluid-height">
                  <div class="panel-heading">
                    <i class="fa fa-book"></i>Заказы, на доработке
                  </div>
                  <div class="widget-content padded text-center">
            <table class="table">
               <thead>
                  <tr>
                     <th>ID заказа</th>
                     <th>Tема</th>
                    <th>Срок</th> 
                     <th>Обьем</th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
 <!--         <pre>
           <?php // print_r($this->session->userdata('admin_level')); ?>
         </pre>  -->      
<?php if (is_array ($pending_orders)): ?>
<?php foreach ($pending_orders as $pendingorders): ?>
                  <tr>
                     <td>
                      <a href="<?php echo ci_site_url() . 'Adminorders/view_order/' .$pendingorders['orderid']; ?>">
                        #<?php echo $pendingorders['orderid']; ?>
                        </a>
                     </td>
                     <td>
                        <?php echo stripslashes($pendingorders['topic']); ?>
                     </td>
                     <td>
                                          
               <?php
$datetime1 = new DateTime(date('Y-m-d H:i:s'));
$datetime2 = new DateTime($pendingorders['deadline']);

if($datetime1 >= $datetime2){
  echo "Срок вышел";
}

if($datetime1 <= $datetime2){
$interval = $datetime1->diff($datetime2);
$elapsed = $interval->format('%a дней %h часов %i минут');
echo $elapsed;
}

?>
                     </td> 
                      <td> <?php echo $pendingorders['words']; ?></td>
          

                  </tr>
                  <?php endforeach; ?>
                  <?php endif; ?> 
               </tbody>
            </table>
                  </div>
                </div>
        </div>

        </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script><script src="https://lab2023.github.io/hierapolis/assets/javascripts/application-985b892b.js" type="text/javascript"></script>
    <!-- Google Analytics -->
  </body>
</html>
