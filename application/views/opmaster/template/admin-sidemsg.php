<div id='content'>
  <div class='panel panel-default'>
    <div class='panel-heading'>
      <i class='fa fa-envelope-open fa fa-large'></i>
      Сообщения менеджера
      <div class='panel-tools'>
        <div class='btn-group'>
          <a class='btn' href='#'>
            <i class='icon-refresh'></i>
            
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
    <!-- Weather -->
    <div class="col-md-2">
      <div class="widget-container small">

        <div class="widget-content padded">
          <div class="bar-chart-widget">
    <div class="row">
<?php 


$receiverid = $this->session->userdata('writer_id');   
$this->db->where(array('receiverid' => $receiverid, 'msg_read' =>0));
$newemails = $this->db->count_all_results('messages');  


$this->db->where(array('msg_type' => 'message', 'senderid' => $receiverid));
$sentmails = $this->db->count_all_results('messages');  

// $this->db->distinct();

if($this->session->userdata('admin_level') === 'super'){

    $this->db->select('writer_id');
    $this->db->from('writers');
    $this->db->where('writer_level', 'admin');
    $managers = $this->db->get()->result_array();
    $man_ids = array();

    foreach ($managers as $m) {
        foreach ($m as $m1) {
            array_push($man_ids, $m1);
        }
    }
}

            
$this->db->select('senderid');
     if($this->session->userdata('admin_level') != 'super'){
      $this->db->where('msg_type="message" AND (receiverid="0" OR receiverid="'.$this->session->userdata('writer_id').'") AND msg_read="0"');
    } else {
        $this->db->where_not_in('senderid', $man_ids);
        $this->db->where("msg_read='0'");
    }



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
 
           <div class="col-md-10 form-group"><a class="menu-admin btn-block btn-success text-left" href="<?php echo ci_site_url(); ?>adminmsg/inbox">Входящие <span id="badge_id" class='badge'><?php echo $nom; ?></span></a></div>
      <div class="col-md-10 form-group"><a class="menu-admin btn-block btn-success" href="<?php echo ci_site_url(); ?>adminmsg/msg_clients">Сообщения заказчикам</a></div>
      <div class="col-md-10 form-group"><a class="menu-admin btn-block btn-success" href="<?php echo ci_site_url(); ?>adminmsg/msg_writers">Сообщения авторам</a></div> 
      <div class="col-md-10 form-group"><a class="menu-admin btn-block btn-success" href="<?php echo ci_site_url(); ?>adminmsg/mail_clients">Email заказчикам</a></div>
      <div class="col-md-10 form-group"><a class="menu-admin btn-block btn-success" href="<?php echo ci_site_url(); ?>adminmsg/mail_writers">Email авторам</a></div>
    </div>
          </div>
        </div>
      </div>
    </div>