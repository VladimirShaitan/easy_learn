<?php
class Adminfinance extends CI_Controller
{
        
        public function __construct()
        {
                parent::__construct();
                $this->load->model('Adminorders_model');
                $this->load->model('Adminusers_model');
                $this->load->model('Ordersed_model');
                $this->load->model('Messages_model');
                $this->load->model('Orders_model');
                $this->load->model('Financial_model');
                $this->load->model('User_model');
                $this->load->model('Users_model');
                $this->load->model('Siteconfigs_model');
                $this->load->model('clients_model');
                $this->load->model('students_model');
                $this->load->helper('url_helper');
                $this->load->library('upload');
                $this->load->library(array(
                        'form_validation',
                        'session'
                ));
                
                $this->load->library('pagination');
                $this->load->helper(array(
                        'url',
                        'html',
                        'form'
                ));

                
                if ($this->session->userdata('writer_level') != 'admin') {
                        redirect('user/myaccount');
                }

                                
        }
        public function index()
        {
                
               redirect('opmaster/login');
        }
        
        public function withdrawals()
        {
                $data['Title']          = 'All withdrawals';
                $data['writers']        = $this->Adminusers_model->get_students();
                $orders['transactions'] = $this->Financial_model->withdrawals();
                $this->load->view('opmaster/template/header', $data);
                $this->load->view('opmaster/template/admin-sidefinancial');
                $this->load->view('opmaster/trans/admin-payments', $orders);
        }


        public function withdrawal_requests()
        {
                $data['Title']          = 'Withdrawal Requests';
                $data['writers']        = $this->Adminusers_model->get_students();
                $orders['transactions'] = $this->Financial_model->withdrawal_requests();
                $this->load->view('opmaster/template/header', $data);
                 $this->load->view('opmaster/template/admin-sidefinancial');
                $this->load->view('opmaster/trans/admin-payments', $orders);
 
        }

        public function order_payments()
        {
                $data['Title']            = 'Order Payments';
                $orders['transactions'] = $this->Financial_model->order_payments();
                $this->load->view('opmaster/template/header', $data);
                 $this->load->view('opmaster/template/admin-sidefinancial');
                $this->load->view('opmaster/trans/admin-orderpayments', $orders);
        }

        public function deposits()
        {
                $data['Title']          = 'All Deposits';
                $data['writers']        = $this->Adminusers_model->get_students();
                $orders['transactions'] = $this->Financial_model->deposits();
                $this->load->view('opmaster/template/header', $data);
                $this->load->view('opmaster/template/admin-sidefinancial');
                $this->load->view('opmaster/trans/admin-payments', $orders);
        }


        public function view_trans($trns_id = NULL){
            $data['transaction'] = $this->Financial_model->get_orderpayment($trns_id);


                $data['payment_id']          = $data['transaction']['payment_id'];
                $data['user_id']          = $data['transaction']['user_id'];
                $data['product_id']          = $data['transaction']['product_id'];
                $data['txn_id']          = $data['transaction']['txn_id'];
                $data['payment_gross']          = $data['transaction']['payment_gross'];
                $data['currency_code']          = $data['transaction']['currency_code'];
                $data['payer_email']          = $data['transaction']['payer_email'];
                $data['payment_status']          = $data['transaction']['payment_status'];


             $this->load->view('opmaster/template/header');
              $this->load->view('opmaster/template/admin-sidefinancial');
            $this->load->view('opmaster/trans/admin-viewtrans', $data);


        }    
        public function view_payment($trns_id = NULL){
            $data['transaction'] = $this->Financial_model->get_transaction($trns_id);

                $data['trns_id']          = $data['transaction']['trns_id'];
                $data['trns_type']          = $data['transaction']['trns_type'];
                $data['trns_date']          = $data['transaction']['trns_date'];
                $data['trns_status']          = $data['transaction']['trns_status'];
                $data['writer_id']          = $data['transaction']['writer_id'];
                $data['trns_fullname']          = $data['transaction']['trns_fullname'];
                $data['trans_amount']          = $data['transaction']['trans_amount'];
                $data['payment_details']          = $data['transaction']['payment_details'];
                $data['paid_details']          = $data['transaction']['paid_details'];
                $data['action_date']          = $data['transaction']['action_date'];
             $this->load->view('opmaster/template/header');
             $this->load->view('opmaster/template/admin-sidefinancial');
            $this->load->view('opmaster/trans/admin-viewpayment', $data);

        }     


}