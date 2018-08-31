<?php
class Students_model extends CI_Model
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

        public function count_writers() {
            $this->db->where('user_level', 'writer');
        return $this->db->count_all("writers");
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
        

        public function getwriters($limit, $start) {
                
        $this->db->limit($limit, $start);
         $this->db->order_by("writer_id", "asc");
         $this->db->limit(4);
          $query = $this->db->get_where('writers', array('user_level' => 'writer','writer_status' => 'Active' ));

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
   }


        public function get_writers()
        {
                $this->db->select("*");
                $this->db->from("writers");
                $this->db->where('user_level', 'writer');
               $this->db->where('writer_status', 'Active');
                $query = $this->db->get();

      if ($query->num_rows() > 0) {
           return $query->result_array();
        }
        return false;


        }


        public function cget_writers (){
                $this->db->where('user_level', 'writer');
               $this->db->where('writer_status', 'Active');
                 $this->db->from("writers");
               return $this->db->count_all_results();

        }



        public function get_clients()
        {
                $this->db->select("*");
                $this->db->from("writers");
                $this->db->where('user_level', 'client');
                //$this->db->where('writer_status', 'Active');
                $query = $this->db->get();
                return $query->result_array();
        }
        
        public function get_admins()
        {

$this->db->where(array('writer_level' =>  'admin'));
   $query =   $this->db->get('writers');  
     return $query->result_array(); 

        }
        
        public function get_category()
        {
                
                $this->db->select(DISTINCT("*"));
                $this->db->from("writers");
                $this->db->where('user_level', 'writer');
                $this->db->where('writer_status', 'Active');
                $this->db->distinct();
                $query = $this->db->get();
                
                return $query->result_array();
        }
        
        
        public function get_subjects()
        {
                
                $this->db->select("*");
                $this->db->from("subject");
                $query = $this->db->get();
                return $query->result_array();
        }



        public function get_skills ($subject = FALSE){

                        $this->db->select("*");
                        $this->db->from("writers");
                       $this->db->where('user_level', 'writer');
                       $this->db->where('writer_status', 'Active');
                        $this->db->like('subject', $subject);
                        $query = $this->db->get();
                        return $query->result_array();
        }


        public function fetch_top_writers($limit, $start) {
                
        $this->db->limit($limit, $start);
         $this->db->order_by("id", "desc");
                        $query = $this->db->get_where('writers', array());

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }


        public function num_active_writers()
        {
                $this->db->select("*");
                $this->db->from("writers");
                $this->db->where('user_level', 'writer'); // this check if the order is assigend to this user
                $this->db->where('writer_status', 'Active'); // checks if sttaus is completed
                $query   = $this->db->get();
                // return $query->result_array();
                $results = $query->result();
                if ($query->num_rows() > 0) {
                        $results = $query->result();
                }
                return $results;
                
                
        }



        public function fetch_writers() {

                                    $this->db->select("*");
                        $this->db->from("writers");
                       $this->db->where('user_level', 'writer');
                       $this->db->where('writer_status', 'Active');
                        $query = $this->db->get();
                        return $query->result_array();

   }


        public function list_skills (){

                        $this->db->select("*");
                        $this->db->from("writers");
                        $this->db->where('user_level', 'writer');
                        $this->db->where('writer_status', 'Active');
                        $query = $this->db->get();
                        return $query->result_array();

        }
        
        public function freelancer_register($data)
        {
                //students is table name here
                
                $this->db->insert('writers', $data);
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
        
        public function search_skills()
        {
                $match = $this->input->post('search');
                $this->db->like('subject', $match);
                //  $this->db->where('user_level', 'writer');
                // $this->db->where('writer_status', 'Active');
                $query = $this->db->get('writers');
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
        

                function skill_search()
        {
                $match = $this->input->post('search');
                $this->db->like('subject', $match);
                $query = $this->db->get('writers');
                return $query->result_array();
        }
        
}