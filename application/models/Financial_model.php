<?php
class Financial_model extends CI_Model
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
        
        public function writer_balance()
        {
                $tt = $this->session->userdata('writer_id');
                $this->db->select("*");
                $this->db->from("orders");
                $this->db->where('preferred_writer', $tt); // this check if the order is assigend to this user
                $this->db->where('order_status', 'completed'); // checks if sttaus is completed
                $this->db->where('writerpaid', 'unpaid'); // checks if sttaus is cancelled
                $query   = $this->db->get();
                // return $query->result_array();
                $results = $query->result();
                if ($query->num_rows() > 0) {
                        $results = $query->result();
                }
                return $results;
                
                
        }
        
        public function unpaid_sum()
        {
                $tt    = $this->session->userdata('writer_id');
                $query = $this->db->select_sum('writerpay', 'Amount');
                $this->db->where('preferred_writer', $tt); // this check if the order is assigend to this user
                $this->db->where('order_status', 'completed'); // checks if sttaus is completed
                // $this->db->where('writerpaid', 'unpaid'); // checks if sttaus is cancelled
                $query  = $this->db->get('orders');
                $result = $query->result();
                $amount = $result[0]->Amount;
                return $amount;
                
        }
        
        public function pending_sum()
        {
                $tt    = $this->session->userdata('writer_id');
                $query = $this->db->select_sum('amount', 'Amount');
                $this->db->where('preferred_writer', $tt); // this check if the order is assigend to this user
                $this->db->where('order_status', 'pending'); // checks if sttaus is completed
                $this->db->where('writerpaid', 'unpaid'); // checks if sttaus is cancelled
                $query = $this->db->get('orders');
                
                if ($query->num_rows() > 0) {
                        $result = $query->result();
                        $amount = $result[0]->Amount;
                }
                return $amount;
                
        }
        
        function search_transactions()
        {
                $match = $this->input->post('search');
                $this->db->like('trns_id', $match);
                $this->db->or_like('writer_id', $match);
                $this->db->or_like('trns_fullname', $match);
                $this->db->or_like('paid_details', $match);
                $this->db->or_like('payment_details', $match);
                $query = $this->db->get('transactions');
                return $query->result();
        }
        
        public function total_paid()
        {
                $tt    = $this->session->userdata('writer_id');
                $query = $this->db->select_sum('amount', 'Amount');
                $this->db->where('preferred_writer', $tt); // this check if the order is assigend to this user
                //$this->db->where('order_status', 'completed'); // checks if status is completed
                $this->db->where('writerpaid', 'paid'); // checks if sttaus is cancelled
                $query = $this->db->get('orders');
                
                if ($query->num_rows() > 0) {
                        $result = $query->result();
                        $amount = $result[0]->Amount;
                }
                return $amount;
                
        }
        
        public function order_request($data)
        {
                //students is table name here
                
                $this->db->insert('transactions', $data);
        }
        
        public function editwriterpay($id, $writerid, $data)
        {
                //students is table name here
                $this->db->where('id', $id);
                $this->db->where('writerid', $writerid);
                $this->db->update('writers_accounts', $data);
        }


        public function deletewriterpay($id, $writerid)
        {
                //students is table name here
                $this->db->where('id', $id);
                $this->db->where('writerid', $writerid);
                $this->db->delete('writers_accounts');
        }        

        
        public function pending_withdrawals()
        {
                $tt = $this->session->userdata('writer_id');
                $this->db->select("*");
                $this->db->from("transactions");
                $this->db->where('writer_id', $tt); // this check if the order is assigend to this user
                $this->db->where('trns_type', 'withdrawal'); // checks if sttaus is completed
                $this->db->where('trns_status', 'pending'); // checks if sttaus is cancelled
                $query        = $this->db->get();
                // return $query->result_array();
                $transactions = $query->result();
                if ($query->num_rows() > 0) {
                        $transactions = $query->result();
                }
                return $transactions;
                
        }
        
        
        public function completed_withdrawals()
        {
                $tt = $this->session->userdata('writer_id');
                $this->db->select("*");
                $this->db->from("transactions");
                $this->db->where('writer_id', $tt); // this check if the order is assigend to this user
                $this->db->where('trns_type', 'withdrawal'); // checks if sttaus is completed
                $this->db->where('trns_status', 'completed'); // checks if sttaus is cancelled
                $this->db->order_by("trns_date", "desc");
                $query        = $this->db->get();
                // return $query->result_array();
                $transactions = $query->result();
                if ($query->num_rows() > 0) {
                        $transactions = $query->result();
                }
                return $transactions;
                
        }
        
        public function writers_accounts($writer_id = FALSE)
        {
                //$tt = $this->session->userdata('writer_id');
                $this->db->select("*");
                $this->db->from("writers_accounts");
                $this->db->where('writerid', $writer_id);
                $query = $this->db->get();
                return $query->result_array();
                
        }
        public function order_payments()
        {
                $this->db->select("*");
                $this->db->from("payments");
                $this->db->order_by("payment_id", "desc");
                $query = $this->db->get();
                return $query->result_array();
                
        }
        
        public function total_withdrawals()
        {
                $tt    = $this->session->userdata('writer_id');
                $query = $this->db->select_sum('trans_amount', 'withdrawals');
                $this->db->where('writer_id', $tt); // this check if the order is assigend to this user
                $this->db->where('trns_type', 'withdrawal'); // checks if sttaus is completed
                $query  = $this->db->get('transactions');
                $result = $query->result();
                
                if ($query->num_rows() > 0) {
                        $withdrawals = $result[0]->withdrawals;
                }
                return $withdrawals;
                
        }
        
        
        public function withdrawal_requests()
        {
                
                $this->db->select("*");
                $this->db->from("transactions");
                $this->db->where('trns_type', 'withdrawal'); // checks if sttaus is completed
                $this->db->where('trns_status', 'pending'); // checks if sttaus is cancelled
                $query        = $this->db->get();
                return $query->result_array();
                
        }
        
        
        public function withdrawals()
        {
                
                $this->db->select("*");
                $this->db->from("transactions");
                $this->db->where('trns_type', 'withdrawal'); // checks if sttaus is completed
                $this->db->where('trns_status', 'completed'); // checks if sttaus is cancelled
                $query        = $this->db->get();
                return $query->result_array();
                
                
        }
        
        public function deposits()
        {
                
                $this->db->select("*");
                $this->db->from("transactions");
                $this->db->where('trns_type', 'deposit'); // checks if sttaus is completed
                $this->db->where('trns_status', 'completed'); // checks if sttaus is cancelled
                $query        = $this->db->get();
                return $query->result_array();
                
        }
        
        public function pending_deposits()
        {
                
                $this->db->select("*");
                $this->db->from("transactions");
                $this->db->where('trns_type', 'deposit'); // checks if sttaus is completed
                $this->db->where('trns_status', 'pending'); // checks if sttaus is cancelled
                $query        = $this->db->get();
                // return $query->result_array();
                $transactions = $query->result();
                if ($query->num_rows() > 0) {
                        $transactions = $query->result();
                }
                return $transactions;
                
        }
        
        public function add_payment($data)
        {
                //students is table name here
                $this->db->insert('writers_accounts', $data);
        }
        
        
        public function view_trans($trns_id = FALSE)
        {
                
                $this->db->select("*");
                $this->db->from("transactions");
                $this->db->where('trns_id', $trns_id);
                $query = $this->db->get();
                return $query->result_array();
        }


        public function get_orderpayment($txn_id = FALSE)
        {
                
                if ($txn_id === FALSE) {
                        
                        $query = $this->db->get_where('payments');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('payments', array(
                        'txn_id' => $txn_id
                ));
                return $query->row_array();
        }
        
        

        public function get_transaction($trns_id = FALSE)
        {
                
                if ($trns_id === FALSE) {
                        
                        $query = $this->db->get_where('transactions');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('transactions', array(
                        'trns_id' => $trns_id
                ));
                return $query->row_array();
        }
        
        
        
        
        public function view_order_payment($txn_id = FALSE)
        {
                
                $this->db->select("*");
                $this->db->from("payments");
                $this->db->where('txn_id', $txn_id);
                $query = $this->db->get();
                return $query->result_array();
        }
        
        
        public function trans_update($trns_id, $data)
        {
                //students is table name here
                $this->db->where('trns_id', $trns_id);
                $this->db->update('transactions', $data);
        }
        
        
        public function accepted_payout()
        {
                $this->db->select("*");
                $this->db->from("accepted_payout");
                $query = $this->db->get();
                return $query->result_array();
        }
        
        
        
}