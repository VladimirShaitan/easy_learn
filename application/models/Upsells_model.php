<?php
class Upsells_model extends CI_Model
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

        public function activate_upsell($data)
        {
                //students is table name here
                
                $this->db->insert('ops_upsellused', $data);
        }
        
        public function price_update($orderid, $data)
        {
                //students is table name here
                $this->db->where('orderid', $orderid);
                $this->db->update('orders', $data);
                
                
        }

        public function upsell_activated($orderid = FALSE)
        {
                $this->db->select("*");
                $this->db->from("ops_upsellused");
                $this->db->where('orderid', $orderid);
                $query = $this->db->get();
                return $query->result_array();
        }

        public function remove_upsell($orderid, $upsell_name)
        {
                                
                //students is table name here
                $this->db->where('upsell_name', $upsell_name);
                $this->db->where('orderid', $orderid);
                $this->db->delete('ops_upsellused');
                
        }
}