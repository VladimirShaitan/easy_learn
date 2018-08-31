<?php
class Messages_model extends CI_Model
{
        
        public function __construct()
        {
                $this->load->database();
                $this->load->helper('string');
                $this->load->library(array(
                        'form_validation',
                        'session'
                ));
        }
        

        public function delete_message($id)
        {
                
                //students is table name here
                $this->db->where('id', $id);
                $this->db->delete('order_messages');
                
        }    

        public function deleteTechMessage($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('messages');    
        }   

        public function suc_dop_customer($orderid){
            $this->db->set('doplata_status', 'true');
            $this->db->where('orderid', $orderid);
            $this->db->update('orders');
        }   

        public function delete_order_rating($id)
        {
                
                //students is table name here
                $this->db->where('id', $id);
                $this->db->delete('writer_ratings');
                
        }

        public function mark_unread($msg_body, $data)
        {
                //students is table name here
                $this->db->where('msg_body', $msg_body);
              //  $this->db->where('msg_body', 'msg_body');
                $this->db->update('messages', $data);
        }
        
        public function mark_asread_user($msg_id,$data)
        {
                //students is table name here
            $receiverid = $this->session->userdata('writer_id');
                $this->db->where('msg_id', $msg_id);
                $this->db->where('receiverid', $receiverid);
                $this->db->update('messages', $data);
        }

        public function mark_unread_admin($msg_id,$data)
        {
                //students is table name here
                $receiverid = $this->session->userdata('writer_id');
                $this->db->where('msg_id', $msg_id);
                $this->db->where('receiverid', $receiverid);
                $this->db->update('messages', $data);
        }

        public function sup_mes_readed($client_id){
            $this->db->set('msg_read', '1');
            $this->db->where('senderid', $client_id);
            $this->db->update();
        }
        
        public function student_update($sno, $data)
        {
                //students is table name here
                $this->db->where('orderid', $sno);
                $this->db->update('orders', $data);
        }
        
        public function get_messages($orderid = FALSE)
        {
                $this->db->select("*");
                $this->db->from("order_messages");
                $this->db->where('orderid', $orderid);
                $query = $this->db->get();
                return $query->result_array();
        }

        public function get_mes_cl_wr($orderid = FALSE, $limit = FALSE, $notFrom)
        {
            $this->db->select(array('whom', 'from_who', 'message_body', 'date_posted', 'sender_name', 'id', 'senderid'));
            $this->db->order_by('id', 'desc');
            $this->db->limit($limit);
            $this->db->from("order_messages");
            $queryStr = "orderid='".$orderid."' AND whom!='". $notFrom ."' AND whom!='admin'  AND from_who!='". $notFrom ."'  ";
            //AND from_who!='admin'
            $this->db->where($queryStr);
            $query = $this->db->get();
            return $query->result_array();
        }

// --------------
        public function ajax_get_messages($writer_id)
        {
                $this->db->select(array('orderid', 'date_posted'));
                $this->db->from("order_messages");
                $this->db->where('receiverid', $writer_id);
                $query = $this->db->get();
                return $query->result_array();
        }


        // public function ajax_get_messages_admin()
        // {

        //        $this->db->select(array('orderid', 'date_posted'));
        //         $this->db->from("order_messages");

        //         $query = $this->db->get();
        //         return $query->result_array();



        // }




        public function ajax_get_messages_admin() {

    $this->db->select(array('orderid'));
    $this->db->from("order_messages");
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        $query = $query->result_array();

// ==========

         $queryTemp = array();
         foreach ($query as $ordId) {
            foreach ($ordId as $ordIdNext) {
              array_push($queryTemp, $ordIdNext);
           } 
         }

        $this->db->select(array('orderid'));
        $this->db->where_in('orderid', $queryTemp);

        if($this->session->userdata('admin_level') != 'super'){
          $this->db->where('manager_id', $this->session->userdata('writer_id'));
        }

        
        $newFileMans = $this->db->get('orders'); 


                $newFileMansTemp = array();
                foreach ($newFileMans->result_array() as $ordIdN) {
                    foreach ($ordIdN as $ordIdNextN) {
                      array_push($newFileMansTemp, $ordIdNextN);
                   } 
                 }

                $this->db->select(array('orderid', 'date_posted'));
                $this->db->where_in('orderid', $newFileMansTemp);
                $this->db->distinct();
                $newMesMansTemp = $this->db->get('order_messages');
                // print_r($newMesMansTemp->result_array());
                return $newMesMansTemp->result_array();

    } else {
      return false;
    }    


}
// --------------   
// --------------        


 
         public function admin_msg_inbox()
        {
            $receiverid = $this->session->userdata('writer_id');
            $this->db->order_by('id', 'desc');
            // $this->db->where(array('msg_type' =>  'message', 'receiverid' =>  $receiverid, 'msg_read' =>1));
            $this->db->where("msg_type='message' AND receiverid='".$receiverid."' OR receiverid='0' AND msg_read='1'");
            $query =   $this->db->get('messages');  
            return $query->result_array(); 

        }  
         public function admin_msg_unread($sup_mngr_id)
        {


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

            $this->db->distinct();
            $this->db->select(array('writer_id', 'msg_read'));
            $this->db->from('writers');
            if($this->session->userdata('admin_level') != 'super'){
                $this->db->where("receiverid='".$sup_mngr_id."' AND msg_read='0' OR receiverid='0' AND msg_read='0'");
            } else {
                $this->db->where_not_in('senderid', $man_ids);
                $this->db->where("msg_read='0'");
            }

            $this->db->join('messages', 'messages.senderid = writers.writer_id');
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $query->result_array();
            }
            return false;
        



        } 




                 public function admin_msg_outbox()
        {
$senderid = $this->session->userdata('writer_id');
                $this->db->order_by('msg_date', 'desc');
$this->db->where(array('msg_type' =>  'message', 'senderid' =>  $senderid));
   $query =   $this->db->get('messages');  
     return $query->result_array(); 

        }     
        
        public function get_msg_outbox()
        {
$senderid = $this->session->userdata('writer_id');
                $this->db->order_by('id', 'desc');
$this->db->where(array('senderid' =>  $senderid, 'msg_type' =>  'message'));
   $query =   $this->db->get('messages');  
     return $query->result_array(); 

        }


        public function getZakAvt()
        {
                $this->db->select("*");
                $this->db->from("order_messages");
                $this->db->where(array('from_who' =>  'zakaz', 'whom' =>  'avtor'));
                $query = $this->db->get();
                return $query->result_array();
        }
        

        
        public function get_msg_inbox()
        {
            $receiverid = $this->session->userdata('writer_id');
            $this->db->order_by('msg_date', 'desc');
            $this->db->where(array('receiverid' =>  $receiverid, 'msg_type' =>  'message', 'msg_read' =>1 ));
            $query =   $this->db->get('messages');  
            return $query->result_array(); 
        }

        public function getSupportMessages() {
            $this->db->set('msg_read', '1');
            $this->db->where('receiverid', $this->session->userdata('writer_id'));
            $this->db->update('messages');

            $senderid = $this->session->userdata('writer_id');
            $this->db->order_by('msg_date', 'desc');
            $this->db->where("senderid='".$senderid."' OR receiverid='".$senderid."'");
            $query =   $this->db->get('messages');  
            return $query->result_array();
        }
                
        public function get_msg_newinbox()
        {

$receiverid = $this->session->userdata('writer_id');
                $this->db->order_by('id', 'desc');
$this->db->where(array('receiverid' =>  $receiverid, 'msg_read' =>0));
   $query =   $this->db->get('messages');  
     return $query->result_array(); 
        }
        
        
        
        // This method id called by two functions. When updating writer's profile from administra (controller Master method profadminedit and method submission (for setting writer's astatus as active, deactivated, suspended or fasle. This will also be called when a writer is updating his or her profile. 
        
        //this method is used by 1) updating writer's profile, 2) updating customer's profile,
        public function writer_update($writer_id, $data)
        {
                //students is table name here
                $this->db->where('writer_id', $writer_id);
                $this->db->update('writers', $data);
        }
        
        
        //this method is used by 1) updating order details by admin in the method master/view, 2) assigning order to writer
        public function order_update($orderid, $data)
        {
                //students is table name here
                $this->db->where('orderid', $orderid);
                $this->db->update('orders', $data);
        }
        public function oplata_update($orderid, $data)
        {
                //students is table name here
                $this->db->where('orderid', $orderid);
                $this->db->update('orders', $data);
        }
        
        
        public function order_request($data)
        {
                //students is table name here
                
                $this->db->insert('project_requests', $data);
        }
        
        public function post_message($data)
        {
                //students is table name here
                
                $this->db->insert('order_messages', $data);
        }

        public function post_message_ajax($data, $limit)
        {
            $num_rows1 = $this->db->query('SELECT * FROM order_messages')->num_rows();
            $this->db->insert('order_messages', $data);
            $id = $this->db->insert_id();
            $num_rows2 = $this->db->query('SELECT * FROM order_messages')->num_rows();
            if($num_rows1 < $num_rows2){
                $arr = array('true', $id);
                return $arr;

            } else {
                $arr = array('no connection', $id);
                return $arr;
            }
        }
        
        public function message_submit($data)
        {          
                $this->db->insert('messages', $data);
                return $this->db->insert_id();
        }
        public function getSupManagerId($id){
            $this->db->select('sup_manager');
            $this->db->where('writer_id', $id);
            $query = $this->db->get('writers');
            return $query->row_array();

        }
        public function mes_sup_submit($data){
            $this->db->set('msg_read', '1');
            $this->db->where('senderid', $data['receiverid']);
            $this->db->update('messages');
 
            if($this->session->userdata('writer_id') != '2562') {
                $sup_mngr = array('sup_manager' => $this->session->userdata('writer_id'));
                $this->db->where('writer_id', $data['receiverid']);
                $this->db->update('writers', $sup_mngr);
            }    
                //students is table name here
                $this->db->insert('messages', $data);


        }


        public function getUsrInfoSup($id){
            $this->db->select(array('writer_id','firstname', 'lastname', 'email', 'user_level'));
            $this->db->from('writers');
            $this->db->where('writer_id', $id);
            $query = $this->db->get();
            return $query->row_array();
        }

         public function read_msg($msg_id = FALSE)
        {
                
                if ($msg_id === FALSE) {
                        
                        $query = $this->db->get_where('messages');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('messages', array(
                        'msg_id' => $msg_id
                ));
                return $query->row_array();
        }  


         public function sup_chat_page($client_id)
        {
                $this->db->select('*');
                $this->db->from('messages');
                $this->db->where('receiverid="'.$client_id.'" OR senderid="'.$client_id.'"');
                $query = $this->db->get();
                return $query->result_array();
        }

        
        public function getSupHistory($res, $send){
            $this->db->select('*');
            $this->db->from('messages');
            $this->db->where("receiverid='".$res."' OR receiverid='".$send."' AND senderid='".$res."' OR senderid='".$send."'");
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
               return $query->result_array();
            }
            return false;

        }

        public function get_msg_replies($msg_id = FALSE)
        {
                
                $this->db->select("*");
                $this->db->from("messages");
                $this->db->where('msg_id', $msg_id);
                $this->db->where('msg_type', 'reply');
                $query = $this->db->get();
                return $query->result_array();
        }
        
        
        public function order_rating($data)
        {
                //students is table name here
                
                $this->db->insert('writer_ratings', $data);
        }
        
        public function get_ratings($orderid = FALSE)
        {
                $this->db->select("*");
                $this->db->from("writer_ratings");
                $this->db->where('orderid', $orderid);
                $query = $this->db->get();
                return $query->result_array();
        }
        
        public function writer_rating($writer_id = FALSE)
        {
                $this->db->select("*");
                $this->db->from("writer_ratings");
                $this->db->where('writerid', $writer_id);
                $query = $this->db->get();
                return $query->result_array();
        }
        
        
        public function average_ratings($writer_id = FALSE)
        {
                $query = $this->db->select_avg('rating', 'Amount');
                $this->db->where('writerid', $writer_id);
                $query  = $this->db->get('writer_ratings');
                $result = $query->result();
                $amount = $result[0]->Amount;
                return $amount;
                
        }        
        

        
        public function myaverage_ratings()
        {
                $tt    = $this->session->userdata('writer_id');
                $query = $this->db->select_avg('rating', 'Amount');
                $this->db->where('writerid', $tt);
                $query  = $this->db->get('writer_ratings');
                $result = $query->result();
                $amount = $result[0]->Amount;
                return $amount;
                
        }


    public function active_writers()
    {
        $this->db->select("*");
        $this->db->from("writers");
        $this->db->where('user_level', 'writer');
        $this->db->where('writer_status', 'Active');
        $query = $this->db->get();
        return $query->result_array();
    }


             public function get_user_name($writer_id)
        {
                              
                $query = $this->db->get_where('writers', array(
                        'writer_id' => $writer_id
                ));
                return $query->row_array();
        }  

        public function check_receiver($msg_id)
        {
                              
                $query = $this->db->get_where('messages', array('msg_type' => 'message',
                        'msg_id' => $msg_id
                ));
                return $query->row_array();
        }   
        
        public function check_receiver_new($receiverid){
                              
                $query = $this->db->get_where('messages', array('msg_type' => 'message',
                        'receiverid' => $receiverid
                ));
                return $query->row_array();
        }   
        public function receiver_email($email)
        {      
                $query = $this->db->get_where('writers', array('email' => $email));
                return $query->row_array();
        } 

        public function get_my_sup_users($sup_mngr_id){
            $this->db->select(array('writer_id', 'firstname', 'lastname'));
             $this->db->order_by('last_tech_message', 'DESC');
            $this->db->from('writers');

            $this->db->where('sup_manager', $sup_mngr_id);
            
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $query->result_array();
            }
            return false;
        } 


        public function getOnlineUser($id){
            $this->db->select('online');
            $this->db->from('writers');
            $this->db->where('writer_id', $id);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $query->row_array();
            }
            return false;
        }

        public function getOrderMngrjustId($id){
            $this->db->select('manager_id');
            $this->db->from('orders');
            $this->db->where('orderid', $id);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $query->row_array();
            }
            return false;
        }


        public function getOrderMngrJustEmail($id){
            $this->db->select('email');
            $this->db->from('writers');
            $this->db->where('writer_id', $id);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $query->row_array();
            }
            return false;
        }


        public function no_sup_user(){
            $usrIdsArr = array();
            $noSupUsers = array();


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




            $this->db->distinct();
            $this->db->select('senderid');

            if($this->session->userdata('admin_level') != 'super'){
                $this->db->where(array('receiverid' => '0', 'msg_read' => '0'));
            } else {
                $this->db->where_not_in('senderid', $man_ids);
                $this->db->where("msg_read='0'");
            }

            $no_sup_usr = $this->db->get('messages');
            if ($no_sup_usr->num_rows() > 0) {

                $no_sup_usr = $no_sup_usr->result_array();
                foreach ($no_sup_usr as $key1) {
                    foreach ($key1 as $key2) {
                        array_push($usrIdsArr, $key2);
                    }
                }
              $this->db->select(array('writer_id', 'firstname', 'lastname'));
              $this->db->order_by('last_tech_message', 'DESC');
              $this->db->from('writers');
              $this->db->where_in('writer_id', $usrIdsArr);
              $no_sup_mngr_usr_data = $this->db->get();
              if ($no_sup_mngr_usr_data->num_rows() > 0) {
                $no_sup_mngr_usr_data = $no_sup_mngr_usr_data->result_array();

                return $no_sup_mngr_usr_data;

              }
              return false;
            }
            return false;
        }


}
 