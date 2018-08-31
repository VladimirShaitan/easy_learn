<?php
class Msgconfig_Model extends CI_Model
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
            
      
            public function msg_config()
            {
   
                $query = $this->db->get_where('msg_config', array(
                    'msg_id' => 'one'
                ));
                return $query->row_array();
            }
            
            
            public function get_messages($msg_id = FALSE)
            {
                
                if ($msg_id === FALSE) {
                    
                    $query = $this->db->get_where('msg_config');
                    return $query->result_array();
                }
                
                $query = $this->db->get_where('msg_config', array(
                    'msg_id' => $msg_id
                ));
                return $query->row_array();
            }    
    
    
}