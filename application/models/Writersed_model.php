<?php
class Writersed_model extends CI_Model
{
        
        public function __construct()
        {
                $this->load->helper('string');
                $this->load->database();
        }
        
        public function get_students($writer_id = FALSE)
        {
                if ($writer_id === FALSE) {
                        
                        $query = $this->db->get_where('writers');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('writers', array(
                        'writer_id' => $writer_id
                ));
                return $query->row_array();
        }
        
        public function get_skills($subject = FALSE)
        {
                if ($subject === FALSE) {
                        $this->db->select("*");
                        $this->db->from("writers");
                        $this->db->where('user_level', 'writer');
                        $query = $this->db->get();
                        return $query->result_array();
                }
                $this->db->select("*");
                $this->db->from("writers");
                $this->db->where('user_level', 'writer');
                // $this->db->where('subject', $subject);
                $query = $this->db->get();
                return $query->result_array();
        }
        
        
        public function student_update($sno, $data)
        {
                //students is table name here
                $this->load->database();
                $this->db->where('orderid', $sno);
                $this->db->update('orders', $data);
        }
        public function writer_register()
        {
                $this->load->helper('url');
                
                $slug          = url_title($this->input->post('firstname'), 'dash', TRUE);
                $writer_status = 'FALSE';
                $user_level    = 'writer';
                $writer_id     = random_string('numeric', 8);
                
                $data = array(
                        'firstname' => $this->input->post('firstname'),
                        'slug' => $slug,
                        'lastname' => $this->input->post('lastname'),
                        'gender' => $this->input->post('gender'),
                        'text' => $this->input->post('text'),
                        'country' => $this->input->post('country'),
                        'city' => $this->input->post('city'),
                        'email' => $this->input->post('email'),
                        'password' => $this->input->post('password'),
                        'primaryphone' => $this->input->post('primaryphone'),
                        'availability' => $this->input->post('availability'),
                        'citation' => $this->input->post('citation'),
                        'nativelanguage' => $this->input->post('nativelanguage'),
                        'academiclevel' => $this->input->post('academiclevel'),
                        'subject' => $this->input->post('subject'),
                        'writer_status' => $writer_status,
                        'user_level' => $user_level,
                        'writer_id' => $writer_id
                        
                );
                
                return $this->db->insert('writers', $data);
        }
        
        public function get_universities($abbname = FALSE)
        {
                
                if ($abbname === FALSE) {
                        $query = $this->db->get('universities');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('universities', array(
                        'abbname' => $abbname
                ));
                return $query->row_array();
                
        }
        
        public function get_country($countryname = FALSE)
        {
                
                if ($countryname === FALSE) {
                        $query = $this->db->get('country');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('country', array(
                        'name' => $countryname
                ));
                return $query->row_array();
                
        }
        
        public function get_pages()
        {
                
                $query = $this->db->get('pages');
                return $query->result_array();
        }
        
        public function get_urgency()
        {
                
                $query = $this->db->get('urgency');
                return $query->result_array();
        }
        
        public function get_subject($subject = FALSE)
        {
                
                if ($subject === FALSE) {
                        $query = $this->db->get('subject');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('subject', array(
                        'subject' => $subject
                ));
                return $query->row_array();
                
        }

        public function writer_update($writer_id, $data)
        {
                //students is table name here
                $this->db->where('writer_id', $writer_id);
                $this->db->update('writers', $data);
        }

//notice_checker
public function createSuperNotice_v($colName, $manager_id){

  $this->db->select($colName);
  $this->db->from('writers');
  $this->db->where('writer_id', $manager_id);
  $mngr_notices = $this->db->get();
  if($mngr_notices->num_rows() > 0){
    return $mngr_notices->row_array();
  } else {
    return false;
  } 
}     
public function techMesManCount_v($manager_id){

    if($this->session->userdata('admin_level') === 'super'){

        $this->db->select('writer_id');
        $this->db->where('writer_level', 'admin');
        $managers = $this->db->get('writers')->result_array();
        $man_ids = array();

        foreach ($managers as $m) {
            foreach ($m as $m1) {
                array_push($man_ids, $m1);
            }
        }
    }

    if($this->session->userdata('admin_level') != 'super'){
    $this->db->where('msg_type="message" AND (receiverid="0" OR receiverid="'.$manager_id.'") AND msg_read="0"');
    } else {
        $this->db->where_not_in('senderid', $man_ids);
        $this->db->where("msg_read='0'");
    } 
    $newMes = $this->db->count_all_results('messages');
    return $newMes;

}

public function techMesMan_v($manager_id, $user_id, $msgDate){

    $this->db->select(array('id', 'msg_date', 'msg_title', 'msg_body', 'senderid'));
    // $this->db->where('msg_type="message" AND (receiverid="0" OR receiverid="'.$manager_id.'") AND senderid="'.$user_id.'" AND msg_read="0"');


    // $this->db->where('senderid', $user_id);
    // $this->db->where('msg_date>', $msgDate);
//(senderid="'.$manager_id.'" OR senderid="2562") AND
    $this->db->where('(senderid="'.$user_id.'" AND msg_date>"'.$msgDate.'") OR (  msg_date>"'.$msgDate.'" AND receiverid="'.$user_id.'")  ');    

    $newMes = $this->db->get('messages');

    // $this->db->set('msg_read', '1');



    // return $newMes;
    if($newMes->num_rows() > 0){
        // $tmp_arr = array();
        // $newMes = $newMes->result_array();
        // foreach ($newMes as $nm) {
        //     array_push($tmp_arr, $nm['id']);
        // }
        // $this->db->set('msg_read', '1');
        // $this->db->where_in('id', $tmp_arr);
        // $this->db->update('messages');
        return $newMes->result_array();

    } else {return '';}

}    
//проверка онлайн
    public function check_online($writer_id, $data){
                //students is table name here
                $this->db->where('writer_id', $writer_id);
                $this->db->update('writers', $data);
        }   
//проверка онлайн
    public function getOrdBidNotice_v($writer_id){
        $this->db->select(array('prof_ord_notices', 'oth_bids_notice', 'wr_files_notice'));
        $this->db->from('writers');
        $this->db->where('writer_id', $writer_id);


        $q = $this->db->get();
        if($q->num_rows() > 0){
           return $q->row_array(); 
        }  
        return false;
    }

    public function getWriterNotice_v($writer_id, $rowName){
        $this->db->select('orderid');
        $this->db->from('orders');
        $this->db->where($rowName, 'false');
        $this->db->where('preferred_writer', $writer_id);
        $this->db->distinct();
        $noticeResponse = $this->db->get();
        if ($noticeResponse->num_rows() > 0) {
          $ordIdsArray  = array();
          foreach ($noticeResponse->result_array() as $responce) {
                foreach ($responce as $arguments) {
                 array_push($ordIdsArray, $arguments);

                }  
            }
            return ', '.implode(", ", $ordIdsArray);
        } else {return '';}

    }

    // public function getWriterFileNotice_v($writer_id){
    //   $this->db->select('orderid');
    //   $this->db->where('writerid', $writer_id);
    //   $pr_recuests = $this->db->get('project_requests')->result_array();

    //   $this->db->select('orderid');
    //   $this->db->where('preferred_writer', $writer_id);
    //   $pref_writer = $this->db->get('orders')->result_array();

    //   $filesAvtor = array();

    //   foreach ($pr_recuests as $pr1) {
    //       array_push($filesAvtor, $pr1['orderid']);      
    //   }
    //   foreach ($pref_writer as $pw1) {
    //       array_push($filesAvtor, $pw1['orderid']);      
    //   }
    //   $filesAvtor = array_unique($filesAvtor);

    //   $this->db->distinct();
    //   $this->db->select('order_id');
    //   $this->db->where('answer_content', '');
    //   $this->db->where_in('order_id', $filesAvtor);
    //   $filesOrderId = $this->db->get('order_files');

    //     if ($filesOrderId->num_rows() > 0) {
    //       $arr = array();
    //       foreach ($filesOrderId->result_array() as $foi) {
    //         // foreach ($foi as $foi1) {
    //             array_push($arr, $foi['order_id']);
    //         // } 
    //       }
    //          return ', '.implode(", ", $arr);
    //      } else {
    //         return '';
    //      }


    // }

    public function getOrdersMessages_v($writer_id){
        $this->db->select(array('orders.orderid', 'order_messages.from_who'));
        $this->db->from('order_messages');
        $this->db->distinct();
        $this->db->where("order_messages.viewed_writer='false' AND (order_messages.from_who='manager' OR order_messages.from_who='zakaz' OR order_messages.from_who='admin')");
        $this->db->where('preferred_writer', $writer_id);
        $this->db->join('orders', 'orders.orderid = order_messages.orderid');
        $allNewMes = $this->db->get();
        if($allNewMes->num_rows() > 0){
            return $allNewMes->result_array();
        }
        return false;

    }


    public function getClNoticeMessages_v($writer_id){
        $this->db->select(array('orders.orderid', 'order_messages.from_who'));
        $this->db->from('order_messages');
        $this->db->distinct();
        $this->db->where("order_messages.viewed_client='false' AND (order_messages.from_who='manager' OR order_messages.from_who='avtor' OR order_messages.from_who='admin')");
        $this->db->where('customer', $writer_id);
        $this->db->join('orders', 'orders.orderid = order_messages.orderid');
        $newMesClShow = $this->db->get();
        // ->result_array();
        if($newMesClShow->num_rows() > 0){
            return $newMesClShow->result_array();
        }
        return false;
    }



    public function countThechSupportMessages($writer_id){
        // $this->db->distinct();
        $this->db->select('senderid');
        $this->db->where('receiverid="'.$writer_id.'" AND msg_read="0"');
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
            return count($number_of_mes);
        } else {
          return '0';
        }
    }


    public function unreadTechMessages($writer_id){
        $this->db->select(array('id', 'msg_date', 'msg_title', 'msg_body', 'senderid'));
        $this->db->where('receiverid="'.$writer_id.'" AND msg_read="0"');
        $newMes = $this->db->get('messages');
        if ($newMes->num_rows() > 0) {
            return $newMes->result_array();
        } else {
          return false;
        }
    }


    public function cl_wr_order_chat_v($writer_id, $orderid){
        $this->db->select(array('id', 'approval', 'message_body', 'senderid', 'from_who', 'whom'));
        $this->db->where('receiverid="'.$writer_id.'" AND orderid="'.$orderid.'" AND msg_read="0"');
        $newMes = $this->db->get('order_messages');
        // $arr = array('wr_id' => $writer_id, 'orderid' =>  $orderid);
        // return $arr;
        if ($newMes->num_rows() > 0) {
            return $newMes->result_array();
        } else {
          return 'empty';
        }
    }

    public function mngr_usr_order_chat_v($orderid){
        $this->db->select(array('id', 'approval', 'message_body', 'senderid', 'from_who', 'whom'));
        $this->db->where('orderid="'.$orderid.'" AND whom="manager" AND msg_read="0"');
        $newMes = $this->db->get('order_messages');
        if ($newMes->num_rows() > 0) {
            return $newMes->result_array();
        } else {
          return '';
        }
    }


    // public function get_order_chats_v($orderid){
    //     $this->db->select(array('id', 'approval', 'message_body', 'senderid', 'from_who', 'whom'));
    //     $this->db->where('orderid="'.$orderid.'" AND whom="'.$this->session->usedata('user_level').'" AND msg_read="0"');
    //     $newMes = $this->db->get('order_messages');
    //     if ($newMes->num_rows() > 0) {
    //         return $newMes->result_array();
    //     } else {
    //       return false;
    //     }
    // }


    public function getOrderBidNotice_v($writer_id){
        $this->db->select('oth_bids_notice');
        $this->db->from('writers');
        $this->db->where_in('writer_id', $writer_id);
        $bidQuery = $this->db->get();
        return $bidQuery->row_array();
    }

    public function getFileNotice_v($writer_id){
        $this->db->select('orderid');
        $this->db->from('orders');
        $this->db->where('customer', $writer_id);
        $resp = $this->db->get()->result_array();
        $orderidsCl = array();
        
        foreach ($resp as $resnew) {
            foreach ($resnew as $resnew1) {
             array_push($orderidsCl, $resnew1);
            }  
        }

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
                return $newFileClShow;
            } else {
                return false;
            }

        } else {
            return false;
        }

    }




    
        
}