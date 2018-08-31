<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financial extends CI_Controller {
	        public function __construct()
        {
                parent::__construct();
                $this->load->model('Financial_model');
                $this->load->model('Ordersed_model');
                $this->load->model('Orders_model');
                $this->load->model('Adminorders_model');
                $this->load->model('User_model');
                $this->load->model('Adminusers_model');
                $this->load->helper('url_helper');
                $this->load->helper(array(
                        'url',
                        'html',
                        'form'
                ));
                $this->load->library(array('form_validation','session'));
                $this->load->helper('directory');
                $this->load->library('upload');
                 if(!$this->session->userdata('writer_id')){
                    redirect('/user/index');
                }
                
        }

        public function index()
        {
            if(1){
               redirect('financial/finance');             
            }


        }
        public function finance()

        {

            $orders['orders'] = $this->Orders_model->pending_orders();
            $writer_id = $this->session->userdata('writer_id');
            $orders['writers_accounts'] = $this->Financial_model->writers_accounts($writer_id);
             $orders['profile'] = $this->User_model->get_profile();
            $loggedin = $this->session->userdata('writer_id');
            $orders['results'] = $this->Financial_model->writer_balance();
            $orders['transactions'] = $this->Financial_model->pending_withdrawals();
            $orders['withdrawals'] = $this->Financial_model->total_withdrawals();
            $orders['writerpay'] =  $this->Financial_model->unpaid_sum();
            $orders['pending_amount'] =  $this->Financial_model->pending_sum();
            $orders['total_paid'] =  $this->Financial_model->total_paid();
             $orders['numrows'] = count($orders['results']);
                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');

           if($this->session->userdata('user_level') !== 'client'){
                $this->load->view('freelancer/financial', $orders);
            }
            if($this->session->userdata('user_level') == 'client'){
                            $this->load->view('freelancer/financial', $orders);
            }

                $this->load->view('template/footer');

        }

        // this is the method that helps in requesting orders from the writer's end. only a writer can request an order        
        public function payment_request(){
            $this->form_validation->set_rules('account_balance', 'account_balance', 'required');
            $this->form_validation->set_rules('payment_details', 'payment_details', 'required');
            $this->form_validation->set_rules('trans_amount', 'trans_amount', 'required|numeric|greater_than[10]|less_than[account_balance]|less_than['.$this->input->post('account_balance').']');
            if($this->form_validation->run() === TRUE){
                        $trns_type = 'withdrawal';
                        $trns_status = 'pending';
                        $trns_id = random_string('numeric', 9);
                         $trns_date = date('Y/m/d H:i:s');
                         $writer_id = $this->session->userdata('writer_id');

                   $data = array(
                    'trns_id'=> $trns_id,
                    'trns_type'=> $trns_type,
                    'trns_status'=> $trns_status,
                    'trns_date'=> $trns_date,
                    'trns_status'=> $trns_status,
                    'writer_id'=> $writer_id,
                    'trns_fullname'=> $this->input->post('trns_fullname'),
                    'payment_details'=> $this->input->post('payment_details'),
                    'trans_amount'=> $this->input->post('trans_amount'),
                    
                    );

                   $this->Financial_model->order_request($data);
                echo "Writer Status successfully applied for this project";
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }



        public function payment_history()

        {
            $orders['profile'] = $this->User_model->get_profile();
            $loggedin = $this->session->userdata('writer_id');
            $orders['results'] = $this->Financial_model->writer_balance();
            $orders['transactions'] = $this->Financial_model->completed_withdrawals();
            $orders['withdrawals'] = $this->Financial_model->total_withdrawals();
            $orders['amount'] =  $this->Financial_model->unpaid_sum();
            $orders['pending_amount'] =  $this->Financial_model->pending_sum();
            $orders['total_paid'] =  $this->Financial_model->total_paid();

                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');
                $this->load->view('freelancer/completed-withdrawals', $orders);
                $this->load->view('template/footer');

        }


        public function myaccounts()

        {
                
                $writer_id = $this->session->userdata('writer_id');
                $orders['profile'] = $this->User_model->get_profile();
                $orders['writers_accounts'] = $this->Financial_model->writers_accounts($writer_id);
                $orders['accepted_payout'] = $this->Financial_model->accepted_payout();
                $orders['title'] = 'Students List';
                $this->load->view('template/header', $orders);
                $this->load->view('template/sidebar-user');
                $this->load->view('freelancer/myaccounts', $orders);
                $this->load->view('template/footer');
        }

                public function add_payment(){

            $this->form_validation->set_rules('payment_method', 'payment_method', 'required');
            $this->form_validation->set_rules('writer_name', 'writer_name', 'required');
            $this->form_validation->set_rules('writerid', 'writerid', 'required');
            $this->form_validation->set_rules('payment_details', 'payment_details', 'required');
            if($this->form_validation->run() === TRUE){
                   $data = array(
                    'payment_method'=> $this->input->post('payment_method'),
                    'writerid'=> $this->input->post('writerid'),
                    'writer_name'=> $this->input->post('writer_name'),
                    'payment_details'=> $this->input->post('payment_details'),                    
                    );

                   $this->Financial_model->add_payment($data);
                   redirect ("financial/myaccounts");
           } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
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
            $this->load->view('opmaster/trans/admin-viewpayment', $data);

        }     



        public function view_transaction($trns_id = NULL){
            $orders['profile'] = $this->User_model->get_profile();
            $orders['transaction'] = $this->Financial_model->view_trans($trns_id);
                $this->load->view('template/header', $orders);
                $this->load->view('freelancer/view-withdrawal', $orders);
                $this->load->view('template/footer');

        }     


        public function trans_update($trns_id = NULL){
                $this->form_validation->set_rules('trns_id', 'trns_id', 'required');
                $this->form_validation->set_rules('trns_status', 'trns_status', 'required');
                $this->form_validation->set_rules('paid_details', 'paid_details', 'required');
            if($this->form_validation->run() === TRUE){
                        $trns_id = $this->input->post('trns_id');
                     $data = array(
                    'trns_status'=> $this->input->post('trns_status'),
                    'paid_details'=> $this->input->post('paid_details'),
                    'action_date'=> date('Y-m-d H:i:s'),
                    );

                   $this->Financial_model->trans_update($trns_id,$data);
                redirect("financial/view_payment/".$this->input->post('trns_id'));
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }


 

}