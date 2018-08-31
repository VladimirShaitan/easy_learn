<?php
class Adminusers_model extends CI_Model
{
    
    public function __construct()
    {
        $this->load->helper('string');
        $this->load->database();
    }
    
    public function get_students($writer_id = FALSE)
    {
        if ($writer_id === FALSE) {

           $this->db->where(array('user_level' => 'writer'));
            $query =   $this->db->get('writers');  
            return $query->result_array(); 

        }
        
        $query = $this->db->get_where('writers', array(
            'writer_id' => $writer_id
        ));
        return $query->row_array();
    }
        
    public function get_activewriters()
    {
            $this->db->where(array('user_level' => 'writer', 'writer_status' => 'Active', 'writer_level!=' => 'admin' ,'admin_level!=' => 'super' ));
            $query =   $this->db->get('writers'); 

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
    }
  // -----
public function my_subj_get_writers($ordersubject)
    {
      if(!empty($ordersubject)){
           $this->db->where(array('user_level' => 'writer', 'writer_status' => 'Active', ));
           $this->db->like('subject', $ordersubject);
           $query =   $this->db->get('writers'); 

          if ($query->num_rows() > 0) {
              foreach ($query->result() as $row) {
                  $data[] = $row;
              }
             return $query->result_array();
          }
        }
        return false;
    }
  // -----  

// -----
public function my_req_get_writers($requestorderid)
    {
             $this->db->select('writerid, writer_email');
             $this->db->where(array('orderid' => $requestorderid,));
             $query =   $this->db->get('project_requests'); 

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
    }
// -----  



   public function count_allwriters() {
        $this->db->where(array('user_level' => 'writer'));
        $this->db->where('admin_level !=', 'super');
        $this->db->where('writer_level !=', 'admin');
         return $this->db->count_all_results('writers'); 
        }


public function all_writers($limit, $start) { //$limit, $start
                
        $this->db->limit($limit, $start);
        $this->db->where(array('user_level' => 'writer'));
        $this->db->where('admin_level !=', 'super');
        $this->db->where('writer_level !=', 'admin');
        $query =   $this->db->get('writers'); 

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }

   public function all_managers() { //$limit, $start
                
        // $this->db->limit($limit, $start);
        $this->db->where(array('writer_level' => 'admin'));
        $this->db->where('admin_level !=', 'super');
        $query =   $this->db->get('writers'); 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }
// ---------

public function ajax_all_writers() {
        $qq = "user_level='writer' OR user_level='client'";
        $this->db->select('writer_id');
        $this->db->from('writers');
        $this->db->where($qq);
        $this->db->order_by("writer_id", "asc");
        $query = $this->db->get(); 

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }

        return false;
   }

// ---------
      public function count_falsewriters() {
         $this->db->where(array('user_level' => 'writer', 'writer_status' => 'false'));
         return $this->db->count_all_results('writers'); 
        }

        public function count_falseclients() {
         $this->db->where(array('user_level' => 'client', 'writer_status' => 'false'));
         return $this->db->count_all_results('writers'); 
        }

public function false_writers($limit, $start) { //
                
        $this->db->limit($limit, $start);
        $this->db->where(array('user_level' => 'writer', 'writer_status' => 'false' ));
        $query = $this->db->get('writers'); 

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }


public function false_clients($limit, $start) { //
                
        $this->db->limit($limit, $start);
        $this->db->where(array('user_level' => 'client', 'writer_status' => 'false' ));
        $query = $this->db->get('writers'); 

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }

    public function active_clients($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->from("writers");
        $this->db->where('user_level', 'client');
        $this->db->where('writer_status', 'Active');
        $query = $this->db->get();
        return $query->result_array();
    }

      public function count_activewriters() {
         $this->db->where(array('user_level' => 'writer', 'writer_status' => 'Active'));
         return $this->db->count_all_results('writers'); 
        }

      public function count_activeclients() {
         $this->db->where(array('user_level' => 'client', 'writer_status' => 'Active'));
         return $this->db->count_all_results('writers'); 
        }




public function active_writers($limit, $start) { //$limit, $start
                
        $this->db->limit($limit, $start);
        $this->db->where(array('user_level' => 'writer', 'writer_status' => 'Active' ));
        $query =   $this->db->get('writers'); 

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }


public function check_online_adm() {
                
        $this->db->select('writer_id, online');
        $this->db->where(array('user_level' => 'writer', 'writer_status' => 'Active' ));
         $query =  $this->db->get('writers');

         if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;

   }

  public function check_online_adm_cli() {
                
        $this->db->select('writer_id, online');
        $this->db->where(array('user_level' => 'client'));
         $query =  $this->db->get('writers');

         if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;

   } 


      public function count_suspendedwriters() {
         $this->db->where(array('user_level' => 'writer', 'writer_status' => 'Suspended'));
         return $this->db->count_all_results('writers'); 
        }
    
    public function suspended_writers($limit, $start) {
                
        $this->db->limit($limit, $start);
             $this->db->where(array('user_level' => 'writer', 'writer_status' => 'Suspended' ));
   $query =   $this->db->get('writers'); 

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }

          public function count_deactivatedwriters() {
         $this->db->where(array('user_level' => 'writer', 'writer_status' => 'Deactivated'));
         return $this->db->count_all_results('writers'); 
        }




        public function deactivated_writers($limit, $start) {
                
        $this->db->limit($limit, $start);
             $this->db->where(array('user_level' => 'writer', 'writer_status' => 'Deactivated' ));
   $query =   $this->db->get('writers'); 

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }

      public function count_clients() {
         $this->db->where(array('user_level' => 'client'));
         return $this->db->count_all_results('writers'); 
        }

public function all_clients($limit, $start) {
                
        $this->db->limit($limit, $start);
             $this->db->where(array('user_level' => 'client'));
   $query =   $this->db->get('writers'); 

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }
    
    public function get_clients($writer_id = FALSE)
    {
        if ($writer_id === FALSE) {

  $this->db->where(array('user_level' => 'client'));
   $query =   $this->db->get('writers');  
     return $query->result_array(); 

        }
        
        $query = $this->db->get_where('writers', array(
            'writer_id' => $writer_id
        ));
        return $query->row_array();
    }
    public function get_clients_new($user_level){
            $this->db->select(array('writer_id', 'firstname', 'lastname'));
            
            // if($this->session->userdata('admin_level') === 'super'){
              $this->db->order_by('last_tech_message', 'DESC');
            // }

            $this->db->where(array('user_level' => $user_level));
            $query =   $this->db->get('writers');  
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $query->result_array();
            }
            return false;
    }
    
    public function get_skills($subject = FALSE)
    {
        if ($subject === FALSE) {
            
            $query = $this->db->get_where('writers');
            return $query->result_array();
        }


          $this->db->where(array('subject' =>  $subject));
   $query =   $this->db->get('writers');  
     return $query->result_array(); 

    }
    
    public function writer_register()
    {
        $this->load->helper('url');
        
        $slug          = url_title($this->input->post('firstname'), 'dash', TRUE);
        $writer_status = 'FALSE';
        $user_level    = 'writer';
        $writer_id     = random_string('numeric', 5);
        
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

            public function edit_user($writer_id, $data)
        {
                //students is table name here
                $this->db->where('writer_id', $writer_id);
                $this->db->update('writers', $data);
        }
        
    
}