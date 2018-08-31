<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Opmessages extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                 $this->load->model('students_model');
                $this->load->model('Messages_model');
                $this->load->library(array('form_validation','session'));
                $this->load->helper(array('url','html','form'));
                if ($this->session->userdata('writer_level') != 'admin') {
                        redirect('user/myaccount');
                }
        }

        public function index(){
            // This is the inbox

            $data['messages'] = $this->Messages_model->get_msg_inbox();
            $this->load->view('opmaster/template/iheader');
            $this->load->view('opmaster/messages/messages', $data);
             $this->load->view('opmaster/template/ifooter');

        }
       
        public function compose(){
             $data['writers'] = $this->students_model->get_writers();
             $data['clients'] = $this->students_model->get_clients();
            $this->load->view('opmaster/template/header');
            $this->load->view('opmaster/template/sidebar');
            $this->load->view('opmaster/messages/compose', $data);
             $this->load->view('opmaster/template/footer');
        }
       
        public function outbox(){
             $data['messages'] = $this->Messages_model->get_msg_outbox();
            $this->load->view('opmaster/template/header');
            $this->load->view('opmaster/template/sidebar');
            $this->load->view('opmaster/messages/messages', $data);
             $this->load->view('opmaster/template/footer');
        }

       
        public function submission($orderid = NULL){
                $this->form_validation->set_rules('order_status', 'order_status', 'required');
            if($this->form_validation->run() === TRUE){
                        $orderid = $this->input->post('orderid');
                        $order_status = $this->input->post('order_status');

                   $data = array(
                    'order_status'=> $this->input->post('order_status'),
                    );

                   $this->Ordersed_model->order_update($orderid,$data);
                echo "Writer Status successfully set to ".$order_status ;
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }
//письмо оплата

public function oplata_zakaza($orderid = NULL)
        {
                $this->form_validation->set_rules('oplata', 'oplata', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $orderid      = $this->input->post('orderid');
                        $oplata       = $this->input->post('oplata');
                        
                        $data = array(
                                'oplata' => $this->input->post('oplata')
                        );
                        
                        $this->Ordersed_model->oplata_update($orderid, $data);
                        echo "Согласованная цена за заказ";
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
//письмо оплата
        // this is the method that helps in requesting orders from the writer's end. only a writer can request an order        
        public function order_request(){

            $this->form_validation->set_rules('orderid', 'orderid', 'required');
            if($this->form_validation->run() === TRUE){
                        $orderid = $this->input->post('orderid');
                        $order_status = $this->input->post('order_status');
                         $request_date = date('Y/m/d H:i:s');
                         $writerid = $this->session->userdata('writer_id');
                          $date_posted = date('Y/m/d H:i:s');

                   $data = array(
                    'orderid'=> $this->input->post('orderid'),
                    'senderid'=> $this->input->post('senderid'),
                    'date_posted'=> $date_posted,
                    'sender_name'=> $this->input->post('sender_name'),
                    'message_body'=> $this->input->post('message_body'),
                    
                    );

                   $this->Messages_model->post_message($data);
                echo "Message sucessfully posted";

            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }

        // This is the method reposible for assigning orders to writers. it is accessed from 1) when customer assigns an order to writer or order/view/orderid (only for customers' my orders). IT is accessed when admin assign an order from Master/order_requests and also from  master/view_order/orderid. This method is called three times. 
        public function assign_writer($orderid = NULL){

                $this->form_validation->set_rules('preferred_writer', 'preferred_writer', 'required');
            if($this->form_validation->run() === TRUE){
                        $orderid = $this->input->post('orderid');
                        $preferred_writer = $this->input->post('preferred_writer');
                        $order_status = 'Assigned';

                   $data = array(
                    'preferred_writer'=> $this->input->post('preferred_writer'),
                    'writer_name'=> $this->input->post('writer_name'),
                    'order_status'=> $order_status,
                    );

                   $this->Ordersed_model->order_update($orderid,$data);
                echo "Вам успешно назначен этот заказ ".$preferred_writer ;
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }

                // This method is being used twice, by editing customer's details and also editing writer's details.        
        public function orderadminedit($orderid = NULL){
                $this->form_validation->set_rules('subject', 'subject', 'required');
                $this->form_validation->set_rules('topic', 'topic', 'required');
                $this->form_validation->set_rules('words', 'words', 'required');
                $this->form_validation->set_rules('instructions', 'instructions', '');
                $this->form_validation->set_rules('urgency', 'urgency', 'required');
                $this->form_validation->set_rules('amount', 'amount', 'required|numeric');
                if($this->form_validation->run() === TRUE){
                        $orderid = $this->input->post('orderid');
                        $writer_status = $this->input->post('writer_status');

                   $data = array(
                    'subject'=> $this->input->post('subject'),
                    'topic'=> $this->input->post('topic'),
                    'words'=> $this->input->post('words'),
                    'instructions'=> $this->input->post('instructions'),
                    'urgency'=> $this->input->post('urgency'),
                    'amount'=> $this->input->post('amount'),
                    );

                   $this->Ordersed_model->order_update($orderid,$data);
                        echo "Order status sucessfully updated" ;
                } else {
                        echo "<div class='error'>".validation_errors()."</div>";
                }
        }


        // this is the method that helps in requesting orders from the writer's end. only a writer can request an order        
        public function message_submit(){

            $this->form_validation->set_rules('senderid', 'senderid', 'required');
            $this->form_validation->set_rules('msg_title', 'msg_title', 'required');
            $this->form_validation->set_rules('sender_name', 'sender_name', 'required');
            $this->form_validation->set_rules('msg_body', 'msg_body', 'required');
            if($this->form_validation->run() === TRUE){
                         $msg_date = date('Y/m/d H:i:s');
                         $msg_id = random_string('numeric', 9);
                         $msg_type = 'message';

                   $data = array(
                    'senderid'=> $this->input->post('senderid'),
                    'sender_name'=> $this->input->post('sender_name'),
                    'receiverid'=> $this->input->post('receiverid'),
                    //'receiver_name'=> $this->input->post('receiver_name'),
                    'msg_title'=> $this->input->post('msg_title'),
                    'msg_body'=> $this->input->post('msg_body'),
                    'msg_date'=> $msg_date,
                    'msg_type'=> $msg_type,
                    'msg_id'=> $msg_id,
                    
                    );

                   $this->Messages_model->message_submit($data);
               echo "Сообщение успешно отправлено";


            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }

        public function message_reply(){

            $this->form_validation->set_rules('senderid', 'senderid', 'required');
            $this->form_validation->set_rules('msg_title', 'msg_title', 'required');
            $this->form_validation->set_rules('sender_name', 'sender_name', 'required');
            $this->form_validation->set_rules('msg_body', 'msg_body', 'required');
            if($this->form_validation->run() === TRUE){
                         $msg_date = date('Y/m/d H:i:s');
                         $msg_type = 'reply';
                         

                   $data = array(
                    'senderid'=> $this->input->post('senderid'),
                    'sender_name'=> $this->input->post('sender_name'),
                    'receiverid'=> $this->input->post('receiverid'),
                    'receiver_name'=> $this->input->post('receiver_name'),
                    'msg_title'=> $this->input->post('msg_title'),
                    'msg_body'=> $this->input->post('msg_body'),
                    'msg_date'=> $msg_date,
                    'msg_type'=> $msg_type,
                    'msg_id'=> $this->input->post('msg_id'),
                    
                    );

                   $this->Messages_model->message_submit($data);
               echo "Сообщение успешно отправлено";


            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }


        public function read($msg_id = NULL){
            $data['messages'] = $this->Messages_model->read_msg($msg_id);
            $data['replies'] = $this->Messages_model->get_msg_replies($msg_id);
             $this->load->view('opmaster/template/header');
             $this->load->view('opmaster/template/sidebar');
            $this->load->view('opmaster/messages/view', $data);
             $this->load->view('opmaster/template/footer');

        }     



}