<?php class Adminorders_model extends CI_Model
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
            
        public function record_count() {
        return $this->db->count_all("orders");
        }    


    public function count_unpaidorders() {
         $this->db->where(array('client_paid' => 'unpaid'));
         return $this->db->count_all_results('orders'); 
        }   



    public function count_paidorders() {
         $this->db->where(array('client_paid' => 'paid', 'preferred_writer' => 0));
         
         return $this->db->count_all_results('orders'); 
        }   

   public function count_pendingorders() {
         $this->db->where("preferred_writer='0' AND (order_status='pending' OR order_status='onlyAvtorDoplata')");
         return $this->db->count_all_results('orders'); 
        }


   public function count_revisionorders() {
         $this->db->where(array('preferred_writer' > 0, 'order_status' => 'Revision'));
         return $this->db->count_all_results('orders'); 
        }
   public function count_completedorders() {
         $this->db->where(array('preferred_writer' > 0, 'order_status' => 'completed'));
         return $this->db->count_all_results('orders'); 
        }
   public function count_cancelledorders() {
         $this->db->where(array('preferred_writer' > 0, 'order_status' => 'cancelled'));
         return $this->db->count_all_results('orders'); 
        }

            public function count_unassignedorders() {
         $this->db->where(array('preferred_writer' => 0, 'order_status' => 'Openproject'));
         return $this->db->count_all_results('orders'); 
        }  
            public function count_orderrequests() {
                $this->db->distinct();
                $this->db->select('orderid');
         $this->db->where(array());
         return $this->db->count_all_results('project_requests'); 
        }  


            public function count_assignedorders() {
      $this->db->where(array('preferred_writer' > 0, 'order_status' => 'Assigned'));
         return $this->db->count_all_results('orders'); 
        }  
// 

 public function count_compl_orders() {
      $this->db->where(array('preferred_writer' > 0, 'order_status' => 'Completed'));
         return $this->db->count_all_results('orders'); 
        }  


// // 
// public function unassigned_orders() {      //$limit, $start
//         // $this->db->limit($limit, $start);
//         $this->db->order_by("orderid", "desc");
//         // $this->db->where(array('preferred_writer' => 0, 'order_status' => 'Openproject'));

//         if($this->session->userdata('admin_level') != 'super'){
//             // $this->db->where('manager_id', $this->session->userdata('writer_id'));
//             $this->db->where("order_status='Openproject' AND (manager_id='".$this->session->userdata('writer_id')."' OR manager_id='')");
//         } elseif($this->session->userdata('admin_level') === 'super') {
//              $this->db->where("order_status='Openproject'");
//         }


//         $query =   $this->db->get('orders'); 
//         if ($query->num_rows() > 0) {
//             foreach ($query->result() as $row) {
//                 $data[] = $row;
//             }
//            return $query->result_array();
//         }
//         return false;
//    }

public function assigned_orders() { //$limit, $start
                
        // $this->db->limit($limit, $start);
        $this->db->order_by("orderid", "desc");
        // $this->db->where(array('preferred_writer' > 0, 'order_status' => 'Assigned'));
        
        // if($this->session->userdata('admin_level') != 'super'){
        //     $this->db->where('manager_id', $this->session->userdata('writer_id'));
        // }
        if($this->session->userdata('admin_level') != 'super'){
            // $this->db->where('manager_id', $this->session->userdata('writer_id'));
            $this->db->where("order_status='Assigned' AND (manager_id='".$this->session->userdata('writer_id')."' OR manager_id='')");
        } elseif($this->session->userdata('admin_level') === 'super') {
             $this->db->where("order_status='Assigned'");
        }
        
        $query =   $this->db->get('orders'); 

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }




   //      public function fetch_latest_orders($limit, $start) {
                
   //      $this->db->limit($limit, $start);
   //       $this->db->order_by("orderid", "desc");
   //       $query = $this->db->get_where('orders', array());

   //      if ($query->num_rows() > 0) {
   //          foreach ($query->result() as $row) {
   //              $data[] = $row;
   //          }
   //         return $query->result_array();
   //      }
   //      return false;
   // }
   

   public function fetch_latest_orders() { //$limit, $start
                
        // $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->order_by("orderid", "desc");
        $assigned = array( 'Openproject', 'Revision', 'cancelled', 'Assigned', 'pending');
        if($this->session->userdata('admin_level') != 'super'){
            $this->db->where("manager_id='".$this->session->userdata('writer_id')."' OR  manager_id=''");
        }

          // $this->db->where_in ('order_status', $assigned);

          $query = $this->db->get('orders');

          $new_query = array();
        
        if ($query->num_rows() > 0) {
            // foreach ($query->result() as $row) {
            //     $data[] = $row;
            // }
        foreach ($query->result_array() as $qwe) {
            if($qwe['order_status'] != 'Archived' && $qwe['order_status'] != 'Completed' ){
                array_push($new_query, $qwe);
           }
        }
           return $new_query;

        }
        return false;
   }

   public function getThisManOrders($manId) {
                
         $this->db->select(array('orderid', 'preferred_writer', 'writer_name', 'customer', 'customer_name', 'sources', 'deadline', 'topic', 'subject'));
          $assigned = array('Completed');
          $this->db->where_in ('order_status', $assigned);
          $this->db->where ('manager_id', $manId);

          $query = $this->db->get('orders');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;

   }


     public function get_file_materials($orderid = FALSE)
        {

$this->db->order_by("upload_date", "desc");
$this->db->where(array('order_id' =>  $orderid, 'upload_type' =>  'material'));
   $query =   $this->db->get('order_files');  
     return $query->result_array(); 

        }


     public function get_file_check($orderid = FALSE)
        {

$this->db->order_by("upload_date", "desc");
$this->db->where(array('order_id' =>  $orderid, 'upload_type' =>  'check'));
   $query =   $this->db->get('order_files');  
     return $query->result_array(); 

        }

        
        public function get_file_essay($orderid = FALSE)
        {

            $this->db->order_by("upload_date", "desc");
$this->db->where(array('order_id' =>  $orderid, 'upload_type' =>  'essay'));
   $query =   $this->db->get('order_files');  
     return $query->result_array(); 


        }

         public function get_matsec($orderid = FALSE)
        {

            $this->db->order_by("upload_date", "desc");
$this->db->where(array('order_id' =>  $orderid, 'upload_type' =>  'mat_sec'));
   $query =   $this->db->get('order_files');  
     return $query->result_array(); 


        }

public function get_planfiles($orderid = FALSE){
    $this->db->order_by("upload_date", "desc");
    $this->db->where(array('order_id' =>  $orderid, 'upload_type' =>  'plan'));
    $query =   $this->db->get('order_files');  
    return $query->result_array(); 
 }

         public function get_unic($orderid = FALSE)
        {

            $this->db->order_by("upload_date", "desc");
$this->db->where(array('order_id' =>  $orderid, 'upload_type' =>  'unic'));
   $query =   $this->db->get('order_files');  
     return $query->result_array(); 


        }
   
           

        //     public function unpaid_orders()//$limit, $start
        //     {
        //  // $this->db->limit($limit, $start);
        //  $this->db->order_by("orderid", "desc");
        //  $this->db->order_by("date_posted", "desc");
        //  // $this->db->where(array('client_paid' => 'unpaid'));

        // // if($this->session->userdata('admin_level') != 'super'){
        // //     $this->db->where('manager_id', $this->session->userdata('writer_id'));
        // // }

        // if($this->session->userdata('admin_level') != 'super'){
        //     // $this->db->where('manager_id', $this->session->userdata('writer_id'));
        //     $this->db->where("client_paid='unpaid' AND (manager_id='".$this->session->userdata('writer_id')."' OR manager_id='')");
        // } elseif($this->session->userdata('admin_level') === 'super') {
        //      $this->db->where("client_paid='unpaid'");
        // }

        //  $query =   $this->db->get('orders'); 

        // if ($query->num_rows() > 0) {
        //     foreach ($query->result() as $row) {
        //         $data[] = $row;
        //     }
        //    return $query->result_array();
        // }
        // return false;

        //     }           

        //     public function paid_orders()//$limit, $start
        //     {
        //  // $this->db->limit($limit, $start);
        //  $this->db->order_by("orderid", "desc");
        //  // $this->db->where(array('client_paid' => 'paid')); //, 'preferred_writer' => 0

        // // if($this->session->userdata('admin_level') != 'super'){
        // //     $this->db->where('manager_id', $this->session->userdata('writer_id'));
        // // }

        // if($this->session->userdata('admin_level') != 'super'){
        //     // $this->db->where('manager_id', $this->session->userdata('writer_id'));
        //     $this->db->where("client_paid='paid' AND (manager_id='".$this->session->userdata('writer_id')."' OR manager_id='')");
        // } elseif($this->session->userdata('admin_level') === 'super') {
        //      $this->db->where("client_paid='paid'");
        // }

        //  $query =   $this->db->get('orders'); 

        // if ($query->num_rows() > 0) {
        //     foreach ($query->result() as $row) {
        //         $data[] = $row;
        //     }
        //    return $query->result_array();
        // }
        // return false;

        //     }
            
        public function pending_orders()//$limit, $start
            {
        // $this->db->limit($limit, $start);
        $this->db->order_by("orderid", "asc");
        // $this->db->where("order_status='pending' OR order_status='onlyAvtorDoplata'");

        // if($this->session->userdata('admin_level') != 'super'){
        //     $this->db->where('manager_id', $this->session->userdata('writer_id'));
        // }

        if($this->session->userdata('admin_level') != 'super'){
            // $this->db->where('manager_id', $this->session->userdata('writer_id'));
            $this->db->where("(order_status='pending' OR order_status='onlyAvtorDoplata') AND (manager_id='".$this->session->userdata('writer_id')."' OR manager_id='')");
        } elseif($this->session->userdata('admin_level') === 'super') {
             $this->db->where("order_status='pending' OR order_status='onlyAvtorDoplata'");
        }

        $query =   $this->db->get('orders'); 

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;

     }   



                     
        
         public function revision_orders()//$limit, $start
            {
                // $this->db->limit($limit, $start);
                $this->db->order_by("orderid", "desc");
                // $this->db->where(array('preferred_writer' > 0, 'order_status' => 'Revision'));

            // if($this->session->userdata('admin_level') != 'super'){
            //     $this->db->where('manager_id', $this->session->userdata('writer_id'));
            // }

        if($this->session->userdata('admin_level') != 'super'){
            // $this->db->where('manager_id', $this->session->userdata('writer_id'));
            $this->db->where("order_status='Revision' AND (manager_id='".$this->session->userdata('writer_id')."' OR manager_id='')");
        } elseif($this->session->userdata('admin_level') === 'super') {
             $this->db->where("order_status='Revision'");
        }

            $query =   $this->db->get('orders'); 

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;

            }

        
         public function dash_revision_orders(){
            $mngr_id = $this->session->userdata('writer_id');


         $this->db->order_by("orderid", "desc");

        if($this->session->userdata('admin_level') != 'super'){
            $this->db->where(array('order_status' => 'Revision', 'manager_id' => $mngr_id));
        } else {
            $this->db->where(array('order_status' => 'Revision'));
        }
         
         $query =   $this->db->get('orders'); 

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;

            }


         public function completed_orders()//$limit, $start
            {

            $this->db->order_by("orderid", "desc");

             if($this->session->userdata('admin_level') != 'super'){
                // $this->db->where('manager_id', $this->session->userdata('writer_id'));
                // $this->db->where("order_status='Completed' AND (manager_id='".$this->session->userdata('writer_id')."' OR manager_id='') AND (client_paid='paid_writer' OR client_paid='paid' OR client_paid='paid_client')  ");


                $this->db->where("order_status='Completed' AND (manager_id='".$this->session->userdata('writer_id')."' OR manager_id='') ");
            } elseif($this->session->userdata('admin_level') === 'super') {
                 // $this->db->where("order_status='Completed' AND (client_paid='paid_writer' OR client_paid='paid' OR client_paid='paid_client')");

                $this->db->where("order_status='Completed'");
            }

            $query =   $this->db->get('orders'); 

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;

            }


 public function archived_orders () { //$limit, $start
        // $this->db->limit($limit, $start);
        $this->db->order_by("orderid", "desc");
        // $this->db->where(array('preferred_writer' > 0, 'order_status' => 'Archived'));

        if($this->session->userdata('admin_level') != 'super'){
            // $this->db->where('manager_id', $this->session->userdata('writer_id'));
            $this->db->where("order_status='Archived' AND (manager_id='".$this->session->userdata('writer_id')."' OR manager_id='')");
        } elseif($this->session->userdata('admin_level') === 'super') {
             $this->db->where("order_status='Archived'");
        }

        $query =   $this->db->get('orders'); 

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;

}




         public function cancelled_orders()//$limit, $start
            {
        // $this->db->limit($limit, $start);
        $this->db->order_by("orderid", "desc");
        // $this->db->where(array('preferred_writer' > 0, 'order_status' => 'cancelled'));

        // if($this->session->userdata('admin_level') != 'super'){
        //     $this->db->where('manager_id', $this->session->userdata('writer_id'));
        // }
        if($this->session->userdata('admin_level') != 'super'){
            // $this->db->where('manager_id', $this->session->userdata('writer_id'));
            $this->db->where("order_status='cancelled' AND (manager_id='".$this->session->userdata('writer_id')."' OR manager_id='')");

        } elseif($this->session->userdata('admin_level') === 'super') {
             $this->db->where("order_status='cancelled'");
        }

        $query =   $this->db->get('orders'); 
        if ($query->num_rows() > 0) {
            // foreach ($query->result() as $row) {
            //     $data[] = $row;
            // }
           return $query->result_array();
        }
        return false;

            }


        public function order_requests() //$limit, $start
    {

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
          if($query2->num_rows() > 0){
            return $query2->result_array();            
          }
           return false;
        }
        return false;

    }


// ======================


        public function getReqIds()
    {
        // $this->db->limit($limit, $start);
        $this->db->select('orderid');
        $this->db->order_by("orderid", "asc");
        $query =   $this->db->get('project_requests'); 

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;

    }

// public function getReqSubjs($ids)
//     {
//         $subjArr  = array();
//         $selWhat = array('orderid', 'subject', 'sources', 'referencing_style');
//         $this->db->order_by("orderid", "desc");
//         // $this->db->order_by("orderid", "asc");
        
//         $this->db->select($selWhat);
//         $this->db->from('orders');
//         $this->db->where_in('orderid', $ids);
//         $query = $this->db->get();
//         array_push($subjArr, $query);


//         if ($query->num_rows() > 0) {
//             foreach ($query->result() as $row) {
//                 $data[] = $row;
//             }
//            return $query->result_array();
//         }
//         // return $subjArr;

// }

// =====================



            public function get_orders($orderid = FALSE)
            {
                    $this->db->set('msg_read', '1');
                    $this->db->where('orderid', $orderid);
                    $this->db->where('whom', 'manager');
                    $this->db->update('order_messages');

                if ($orderid === FALSE) {
                    
                    $query = $this->db->get_where('orders');
                    $this->db->order_by("date_posted", "desc");
                    return $query->result_array();
                }
                
                $query = $this->db->get_where('orders', array(
                    'orderid' => $orderid
                ));

                return $query->row_array();
            }
            


        public function allorder_requests()
            {
          
                $this->db->distinct();
                $this->db->group_by('orderid');
                $this->db->select("*");
                $this->db->from("project_requests");
                $query = $this->db->get();
                return $query->result_array();
                
            }  


        public function get_requests($orderid = FALSE)
            {

        $this->db->order_by("orderid", "desc");
        $this->db->where(array('orderid' => $orderid, ));
        $query =   $this->db->get('project_requests');  
        return $query->result_array(); 
                
            }
                        
            public function getwriter_requests($orderid = FALSE)
            {
        $writerid = $this->session->userdata('writer_id');
        $this->db->order_by("orderid", "desc");
        $this->db->where(array('orderid' => $orderid, 'writerid' => $writerid));
        $query =   $this->db->get('project_requests');  
        return $query->result_array(); 
                
            }
        
            
            public function myorders()
            {
                $writerid = $this->session->userdata('writer_id');
             $this->db->order_by("date_posted", "desc");
            $this->db->where(array('customer' => $writerid));
   $query =   $this->db->get('orders');  
     return $query->result_array(); 

            }
            
          
            
            public function get_skills($subject = FALSE)
            {
                if ($subject === FALSE) {
                    $query = $this->db->select('subject')->distinct()->get('writers');
                    return $query->result_array();
                }
                
                $query = $this->db->get_where('writers', array(
                    'subject' => $subject
                ));
                return $query->row_array();
            }
            
            public function create_order()
            {
                $this->load->helper('url');
                
                $customer     = $this->session->userdata('writer_id');
                $orderid      = random_string('numeric', 5);
                $date_posted  = date('Y/m/d H:i:s');
                $order_status = 'open-project';
                
                $data = array(
                    'topic' => $this->input->post('topic'),
                    'customer' => $customer,
                    'orderid' => $orderid,
                    'typeofservice' => $this->input->post('typeofservice'),
                    'subject' => $this->input->post('subject'),
                    'words' => $this->input->post('words'),
                    'instructions' => $this->input->post('instructions'),
                    'urgency' => $this->input->post('urgency'),
                    'amount' => $this->input->post('amount'),
                    'date_posted' => $date_posted,
                    'order_status' => $order_status,
                    'preferred_writer' => $this->input->post('preferred_writer')
                    
                );
                
                return $this->db->insert('orders', $data);
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
                
                // this code needs to be changed to autopick the pages and the number of words per page should should be controlled by the admin. 
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
            
            public function submit_order($data)
            {
                //students is table name here
                
                $this->db->insert('orders', $data);
            }
            
}