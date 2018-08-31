<?php
if (!defined('BASEPATH'))
        exit('No direct script access allowed');
class Product extends CI_Model
{
        
        
        public function __construct()
        {
                $this->load->database();
        }
        
        //get and return product rows
        public function getRows($orderid = '')
        {
                $this->db->select('*');
                $this->db->from('orders');
                if ($orderid) {
                        $this->db->where('orderid', $orderid);
                        $query  = $this->db->get();
                        $result = $query->row_array();
                } else {
                        $this->db->order_by('id', 'asc');
                        $query  = $this->db->get();
                        $result = $query->result_array();
                }
                return !empty($result) ? $result : false;
        }
        //insert transaction data
        public function insertTransaction($data = array())
        {
                $insert = $this->db->insert('payments', $data);
                return $insert ? true : false;
        }
        
        public function update_order($data, $orderid)
        {
                //students is table name here
                $this->db->where('orderid', $orderid);
                $this->db->update('orders', $data);
        }
}
