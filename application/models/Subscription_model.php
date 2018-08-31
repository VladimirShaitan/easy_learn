<?php
class Subscription_model extends CI_Model
{
        
        public function __construct()
        {
                $this->load->helper('string');
                $this->load->database();
        }
        
        
        public function document_accessed($data)
        {
                //students is table name here
                
                $this->db->insert('essay_document_access', $data);
        }
        
        
        public function check_document_accessed($alias = FALSE)
        {

                $accessor_id = $this->session->userdata('writer_id');
                $this->db->select("*");
                $this->db->from("essay_document_access");
                $this->db->where('access_alias', $alias);
                $this->db->where('accessor_id', $accessor_id);
                $query = $this->db->get();
                return $query->row_array();
        }
        
        
        public function count_accessed()
        {
         $accessor_id = $this->session->userdata('writer_id');
        $this->db->where(array('accessor_id' => $accessor_id));
         return $this->db->count_all_results('essay_document_access'); 
        }
        
        
        
        public function check_if_subscribed($subscriber_id = FALSE)
        {
                
        $current_date = date('Y-m-d');  
$this->db->where(array('subscriber_id' =>  $subscriber_id, 'subscription_end_date >' => $current_date));
   $query =   $this->db->get('essay_subscribers');  
     return $query->row_array(); 

        }
        
        
        
        public function delete_old_views($subscriber_id)
        {
                
                $current_date = date('Y-m-d');
                $this->db->where('access_date !=', $current_date);
                $this->db->where('accessor_id', $subscriber_id);
                $this->db->delete('essay_document_access');
                
        }
        
        
        public function get_profile()
        {
                
                $writer_id = $this->session->userdata('writer_id');
                $this->db->select("*");
                $this->db->from("writers");
                $this->db->where('writer_id', $writer_id);
                $query = $this->db->get();
                return $query->result_array();
        }
        
        
        
        public function deduct_credit($data)
        {
                
                $this->db->set('subscription_amount', 'subscription_amount-1');
                $this->db->where('id', $id);
                $this->db->update('reseller', $data);
        }
        
        public function words_perpage($id = FALSE)
        {
                
                $query = $this->db->get_where('configs', array(
                        'id' => $id
                ));
                return $query->row_array();
        }
        
        
        
        public function update_subscriber_balance($data)
        {
                //students is table name here
                
                $subscriber_id = $this->session->userdata('writer_id');
                $this->db->where('subscriber_id', $subscriber_id);
                $this->db->update('essay_subscribers', $data);
        }
        
        
        
        public function create_subscription($data)
        {
                //students is table name here
                
                $this->db->insert('essay_document_access', $data);
        }
        
        public function buy_essay($data)
        {
                //students is table name here
                
                $this->db->insert('transactions', $data);
        }
        
        
        
}