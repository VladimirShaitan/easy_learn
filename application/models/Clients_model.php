<?php
class Clients_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
                $this->load->helper('string');
        }

        public function get_clients($id = FALSE)
        {
        if ($id === FALSE)
        {

                $query = $this->db->get_where('clients');
                return $query->result_array();
        }

        $query = $this->db->get_where('clients', array('id' => $id));
        return $query->row_array();
       }

        public function get_skills($subject = FALSE)
        {
        if ($subject === FALSE)
        {
                $query =  $this->db->select('subject')->distinct()->get('writers');
                return $query->result_array();
        }

        $query = $this->db->get_where('clients', array('subject' => $subject));
        return $query->row_array();
       }


        public function get_universities ($abbname = FALSE){

        if ($abbname === FALSE)
        {
                $query = $this->db->get('universities');
                return $query->result_array();
        }

        $query = $this->db->get_where('universities', array('abbname' => $abbname));
        return $query->row_array();

        }

        public function get_country ($countryname = FALSE){

        if ($countryname === FALSE)
        {
                $query = $this->db->get('country');
                return $query->result_array();
        }

        $query = $this->db->get_where('country', array('name' => $countryname));
        return $query->row_array();

        }
        
        public function get_subject ($subject = FALSE){

        if ($subject === FALSE)
        {
                $query = $this->db->get('subject');
                return $query->result_array();
        }

        $query = $this->db->get_where('subject', array('subject' => $subject));
        return $query->row_array();

        }


        
        public function customer_register($data)
        {
                //students is table name here
                
                $this->db->insert('writers', $data);
        }
        
      
}