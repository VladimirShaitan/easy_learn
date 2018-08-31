<?php
class Ordersed_model extends CI_Model
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
        
        public function student_update($sno, $data)
        {
                //students is table name here
                $this->db->where('orderid', $sno);
                $this->db->update('orders', $data);
        }
        

        public function checkIfShown($orderid, $writerid)
        {
                $this->db->select('showorder');
                $this->db->from('project_requests');
                $this->db->where('orderid', $orderid);
                $this->db->where('writerid', $writerid);
                $query = $this->db->get();
               if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $query->result_array();
               }
            return false;

        }
        
        public function getWrData($id){
            $this->db->select(array('firstname', 'lastname', 'email'));
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

        // This method id called by two functions. When updating writer's profile from administra (controller Master method profadminedit and method submission (for setting writer's astatus as active, deactivated, suspended or fasle. This will also be called when a writer is updating his or her profile. 
        
        //this method is used by 1) updating writer's profile, 2) updating customer's profile,
        public function writer_update($writer_id, $data)
        {
                //students is table name here
                $this->db->where('writer_id', $writer_id);
                $this->db->update('writers', $data);
        }
        
        public function del_viev_bid($orderid, $data)
        {
                //students is table name here
                $this->db->where('orderid', $orderid);
                $this->db->update('project_requests', $data);
        }   
        public function del_viev_file($order_id, $data)
        {
                //students is table name here
                $this->db->where('order_id', $order_id);
                $this->db->update('order_files', $data);
        }  
         public function del_viev_mess($orderid, $data)
        {
                //students is table name here
                $this->db->where('orderid', $orderid);
                $this->db->update('order_messages', $data);
        }  
        
        
        //this method is used by 1) updating order details by admin in the method master/view, 2) assigning order to writer
        public function order_update($orderid, $data)
        {
                //students is table name here
                $this->db->where('orderid', $orderid);
                $this->db->update('orders', $data);
                
                
        }
        public function writer_accept($orderid, $data){

            if($data['writer_accept_order'] === 'true'){
                $this->db->where('orderid', $orderid);
                $this->db->update('orders', $data);
            } else {
                $data_to_open = array(
                    'preferred_writer' => 0,
                    'order_status' => 'Openproject',
                    'writer_name' => ' '
                );
                $this->db->where('orderid', $orderid);
                $this->db->update('orders', $data_to_open);
            }

        }

        // --------------
                public function ajax_order_plan()
        {
             $writer_id = $this->session->userdata('writer_id');
             $this->db->select(array('orderid', 'date_posted'));
             $this->db->order_by("orderid", "asc");
             $query = $this->db->get_where('orders', array('preferred_writer' => $writer_id,'yesno' => 'true'));

            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
               return $query->result_array();
            }
            return false;
                
                
        }


        public function ajax_order_fine()
        {
             $writer_id = $this->session->userdata('writer_id');
             $this->db->select(array('orderid', 'date_posted'));
             $this->db->order_by("orderid", "asc");
             $this->db->where_not_in('fine', '');
             $query = $this->db->get_where('orders', array('preferred_writer' => $writer_id));

            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
               return $query->result_array();
            }
            return false;
                
                
        }
        // --------------



// forma
        public function order_wr_update($orderid, $writer_id, $data, $sh_order)
        {
                //Put this writer bid
                $this->db->where('orderid', $orderid);
                $this->db->where('writerid', $writer_id);
                $this->db->update('project_requests', $data);

                // $kill_notice = array(
                //     'mngr_neworder' => '',
                //     'mngr_new_order_files' => '',
                //     'mngr_new_order_bid' => '',
                //     'mngr_newuser' => '',
                //     'mngr_wait_accept' => '',
                //     'mngr_new_order_mes' => ''
                // );
                // $this->db->set($kill_notice);
                // $this->db->update('writers');
                
                if($sh_order === 'true'){
                        // get all bids of this writer and put them in 1 array
                        $this->db->select('orderid');
                        $this->db->where('writerid', $writer_id);
                        $this->db->where('orderid', $orderid);
                        $this->db->from('project_requests');
                        $newBidMes = $this->db->get();  
                        if ($newBidMes->num_rows() > 0) {
                            $newBidMes = $newBidMes->result_array();
                        } else {
                            $newBidMes = false;
                        }  
                        $myBiddedOrders = array();
                        foreach ($newBidMes as $bid) {
                            foreach ($bid as $bid2) {
                                array_push($myBiddedOrders, $bid2);
                            }
                        }

                        // return $writer_id;

                        //get order id's from myBiddedOrders array where writer != to our writer and where bid is confirmed. Also put them in 1 array.
                        $this->db->select(array('orderid'));
                        $this->db->where_in('orderid', $myBiddedOrders);
                        $this->db->where('writerid!=', $writer_id);
                        // $this->db->where('showorder', 'true');
                        $this->db->distinct();
                        $this->db->from('project_requests');
                        $oub = $this->db->get() ;
                        $otherUserBids = array();

                        if ($oub->num_rows() > 0) {
                            $oub = $oub->result_array();
                            foreach ($oub as $bid) {
                                foreach ($bid as $bid2) {
                                    array_push($otherUserBids, $bid2);
                                }
                            }
                        } else {
                            $oub = false;
                        }


                        // return $otherUserBids;

                        //get writer id's from myBiddedOrders array where writer != to our writer and where bid is confirmed. Also put them in 1 array
                        $this->db->select(array('writerid'));
                        $this->db->where_in('orderid', $myBiddedOrders);
                        $this->db->where('writerid!=', $writer_id);
                        // $this->db->where('showorder', 'true');
                        $this->db->distinct();
                        $this->db->from('project_requests');
                        $w_ids = $this->db->get() ;
                        $writer_ids = array();
                        foreach ($w_ids->result_array() as $id) {
                            foreach ($id as $id) {
                                array_push($writer_ids, $id);
                            }
                        }

                        // return $writer_ids;

                        // return $otherUserBids;

                        // put order id's to db as a string

                        // if(!empty($otherUserBids)){
                        //     $otherUserBids = ', ' . implode(', ', $otherUserBids);
                        // } else {
                        //     // $otherUserBids = ', ' . implode(', ', $otherUserBids);
                        //     return false;
                        // }  

                        if(empty($otherUserBids)){
                            return false;
                        }  
                        // return $otherUserBids;
                        // $this->db->set('oth_bids_notice', $otherUserBids);


                       $this->db->set('oth_bids_notice', "CONCAT(oth_bids_notice,', ','".$otherUserBids[0]."')", FALSE);
                        $this->db->where_in('writer_id', $writer_ids);
                        $this->db->update('writers');

                 }       


                // check if oth_bids_notice is empty or not
                // $this->db->select('oth_bids_notice');
                // $this->db->where('writer_id', $writer_id);
                // $notices = $this->db->get('writers');
                // foreach ($notices->result_array() as $notice) {
                //     foreach ($notice as $notice2) {
                //         $noticeVal = $notice2;
                //     }
                // }



                // $newArr = array($otherUserBids, $writer_ids);
                    // return $newArr;
                    // return 'empty';


                // } else {
                //     $newIds = array();
                //     foreach ($oub as $newOrdId) {
                //         foreach ($newOrdId as $newOrdId2) {
                //             array_push($newIds, $newOrdId2);
                //         }
                //     }
                //     $this->db->select('orderid');
                //     $this->db->from('project_requests');
                //     $this->db->where('writerid!=', $writer_id);
                //     $this->db->where_in('orderid', $newIds);
                //     $this->db->get();

                //     $otherUserBids = ', ' . implode(', ', $newOrdId2); 

                //     // $nar = array($otherUserBids, $newIds);

                //     // return $nar;
                // }


                
        }

//forma     
// refuse
        public function refuse_writer_req($orderid, $writerid)
        {

                //students is table name here
                $this->db->where('orderid', $orderid);
                $this->db->where('writerid', $writerid);
                $this->db->delete('project_requests');
                
                
        }

//refuse      

         public function oplata_update($orderid, $data)
        {
                //students is table name here
                $this->db->where('orderid', $orderid);
                $this->db->update('orders', $data);
                
                
        }
      
// manager fine
         public function manager_fine($writer_id, $data)
        {
                //students is table name here
                $this->db->where('writer_id', $writer_id);
                $this->db->update('writers', $data);
                
                
        }
// manager fine

// writer_level
         public function writer_level_change($writer_id, $data)
        {
                //students is table name here
                $this->db->where('writer_id', $writer_id);
                $this->db->update('writers', $data);
                
                
        }
// writer_level

        public function order_request($data)
        {
                //students is table name here
                
                $this->db->insert('project_requests', $data);

                $this->db->set('last_ord_req', $data['request_date']);
                $this->db->where('orderid', $data['orderid']);
                $this->db->update('orders');
        }
        
 // order request update
 
         public function order_request_update($orderid, $writerid, $data)
        {
                $this->db->where('orderid', $orderid);
                $this->db->where('writerid', $writerid);
                $this->db->update('project_requests', $data);


                
                $this->db->set('last_ord_req', $data['request_date']);
                $this->db->where('orderid', $data['orderid']);
                $this->db->update('orders');
        }
 // order request update


        
        public function delete_request($orderid)
        {
                //students is table name here
                $this->db->where('orderid', $orderid);
                $this->db->delete('project_requests');
                
        }        
        public function delete_file($order_id, $tmp_name)
        {
                $this->db->where('order_id', $order_id);
                $this->db->where('tmp_name', $tmp_name);
                $this->db->delete('order_files');
                
        }    

        public function subm_download($file_id, $trig)
        {
                $this->db->set(array('submited' => $trig, 'viewed_client' => 'false') );
                $this->db->where('id', $file_id);
                $this->db->update('order_files');
                
        }        

        public function delete_order_files($order_id)
        {

                $this->db->where('order_id', $order_id);
                $this->db->delete('order_files');
                
        }
        public function delete_order($order_id)
        {

                $this->db->where('orderid', $order_id);
                $this->db->delete(array('orders', 'project_requests'));
                
        }        
        public function delete_order_messages($order_id)
        {

                $this->db->where('orderid', $order_id);
                $this->db->delete('order_messages');
                
        }


        public function mngrDeleteNotice($id, $colName){

                // print_r($id);
                // return false;
                $this->db->select($colName);
                $this->db->from('writers');
                $this->db->where_in('writer_id', $this->session->userdata('writer_id'));
                $q = $this->db->get();

                $prof_order = array();

                foreach ($q->result_array() as $q1) {
                  foreach ($q1 as $q2) {
                      array_push($prof_order, $q2);
                  }
                }

              if(!empty($prof_order[0])){
                  $prof_order = explode (", ", substr ($prof_order[0], 2));
              } else {unset($prof_order);}
              $pon = array();
              foreach ($prof_order as $ponOld) {
                if($ponOld != $id){
                  array_push($pon, $ponOld);
                }
              }
                // print_r($pon);


                $pon = ', ' . implode(', ', $pon);
                if($pon === ', '){
                    $this->db->set($colName, '');
                    $this->db->where('writer_id', $this->session->userdata('writer_id'));
                    $this->db->update('writers');
                } else {
                  $this->db->set($colName, $pon);
                  $this->db->where('writer_id', $this->session->userdata('writer_id'));
                  $this->db->update('writers');
                }
        }


        public function del_writer_accept_notice($orderid, $mngr_id){
            $mngr_ids = array($mngr_id, '2562');
            foreach ($mngr_ids as $id) {

                $this->db->select('mngr_wait_accept');
                $this->db->where_in('writer_id', $id);
                $mngr_notices = $this->db->get('writers');
                $arr_ord = array();
               

                foreach ($mngr_notices->result_array() as $q1) {
                  foreach ($q1 as $q2) {
                      $arr_ord = explode (", ", substr ($q2, 2));
                  }
                }

                // echo '<pre>';
                // print_r($arr_ord);
                // echo '</pre>';
                // return false;

                $pon = array();
                foreach ($arr_ord as $ponOld) {
                    if($ponOld != $orderid){
                      array_push($pon, $ponOld);
                    }
                }



                $pon = ', ' . implode(', ', $pon);



                if($pon === ', '){
                    $this->db->set('mngr_wait_accept', '');
                    $this->db->where('writer_id', $id);
                    $this->db->update('writers');
                } else {
                  $this->db->set('mngr_wait_accept', $pon);
                  $this->db->where('writer_id', $id);
                  $this->db->update('writers');
                }

            }
        
        }




}
