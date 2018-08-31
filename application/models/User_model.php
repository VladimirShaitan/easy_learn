<?php
class User_model extends CI_Model
{
        
        function __construct()
        {
                parent::__construct();
                $this->load->database();
        }
        
        function processLogin($email = NULL, $password)
        {
                //this check if the user is registered as a writer and then selects data from there
                $this->db->select("id,email,firstname,writer_id,lastname,text,primaryphone,profile_img, password,city,country,user_level,writer_status,writer_level,admin_level,subject,loggedin");
                $whereCondition = $array = array(
                        'email' => $email,
                        'PASSWORD' => $password
                );
                $this->db->where($whereCondition);
                $this->db->from('writers');
                $query = $this->db->get();
                return $query;
        }
        
        public function loggedin($email, $data)
        {
                //students is table name here
                $this->db->where('email', $email);
                $this->db->update('writers', $data);
                
                
        }
        public function check_card($data){
            $this->db->where('nativelanguage', $data['nativelanguage']);
            $this->db->where('user_level', 'writer');
            $this->db->where('writer_level!=', 'admin');
            $query = $this->db->count_all_results('writers');
            echo json_encode($query);
        }


        public function check_user_by_email($data){
            $this->db->where('email', $data['email']);
            $this->db->where('user_level!=', 'client');
            // $this->db->where('writer_level!=', 'admin');
            $query = $this->db->count_all_results('writers');
            echo json_encode($query);
        }


        public function checkUser($data = array()){
                $this->db->select("*");
                $this->db->from('writers');
                $this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
                $prevQuery = $this->db->get();
                $prevCheck = $prevQuery->num_rows();
                
                if($prevCheck > 0){
                        $prevResult = $prevQuery->row_array();
                        $data['modified'] = date("Y-m-d H:i:s");
                        $update = $this->db->update($this->tableName,$data,array('id'=>$prevResult['id']));
                        $userID = $prevResult['id'];
                }else{
                        $data['created'] = date("Y-m-d H:i:s");
                        $data['modified'] = date("Y-m-d H:i:s");
                        $insert = $this->db->insert($this->tableName,$data);
                        $userID = $this->db->insert_id();
                }

                return $userID?$userID:FALSE;
    }



        public function completed_orders($preferred_writer = FALSE)
        {
                
                $this->db->select("*");
                $this->db->from("orders");
                $this->db->where('preferred_writer', $preferred_writer);  
                $this->db->where('order_status', 'Completed');  
                $query = $this->db->get();
                return $query->result_array();
        }


        public function get_writer($writerid = FALSE)
        {
                
                if ($writerid === FALSE) {
                        
                        $query = $this->db->get_where('writers');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('writers', array(
                        'writer_id' => $writerid
                ));
                return $query->row_array();
        }

        public function admin_profile($writerid = FALSE)
        {
                $writerid = $this->session->userdata('writer_id');
                
                if ($writerid === FALSE) {
                        
                        $query = $this->db->get_where('writers');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('writers', array(
                        'writer_id' => $writerid
                ));
                return $query->row_array();
        }

        public function my_profile($writerid = FALSE)
        {
               
                
                if ($writerid === FALSE) {
                        
                        $query = $this->db->get_where('writers');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('writers', array(
                        'writer_id' => $writerid
                ));
                return $query->row_array();
        }
///



            public function gas_my($writerid = FALSE)
        {
               $this->db->select("*");
                $this->db->from("subject");
                $this->db->order_by("id", "asc");
                 $query = $this->db->get();
                return $query->result_array();
        }

        /////



        

        public function writer_samples($writerid = FALSE)
        {
                $this->db->select("*");
                $this->db->from("opskill_writersamples");
                $this->db->where('writerid', $writerid);
                $this->db->order_by("upload_date", "desc");
                $query = $this->db->get();
                return $query->result_array();
        }


        public function upload_sample($data)
        {
                //students is table name here
                
                $this->db->insert('opskill_writersamples', $data);
        }

        
        public function get_profile($writer_id = FALSE)
        {
                
                $writer_id = $this->session->userdata('writer_id');
                $this->db->select("*");
                $this->db->from("writers");
                $this->db->where('writer_id', $writer_id);
                $query = $this->db->get();
                return $query->result_array();
        }
        
        public function get_useremail($email = FALSE)
        {
                
                $query = $this->db->get_where('writers', array(
                        'email' => $email
                ));
                return $query->row_array();
        }
        
        public function temp_key($data)
        {
                //students is table name here
                
                $this->db->insert('password_reset', $data);
        }
        
        public function newpassword($temp_key = FALSE)
        {
                
                $this->db->select("*");
                $this->db->from("password_reset");
                $this->db->where('temp_key', $temp_key);
                $query = $this->db->get();
                return $query->result_array();
        }
       
        public function temp_key_ver($temp_key = FALSE)
        {
                
                if ($temp_key === FALSE) {
                        
                        $query = $this->db->get_where('password_reset');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('password_reset', array(
                        'temp_key' => $temp_key
                ));
                return $query->row_array();
        }  


        public function passwordupdate($email, $data)
        {
                //students is table name here
                $this->db->where('email', $email);
                $this->db->update('writers', $data);
        }
        
        public function delete_key($email)
        {
                
                //students is table name here
                $this->db->where('email', $email);
                $this->db->delete('password_reset');
                
        }
}
