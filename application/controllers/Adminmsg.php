<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Adminmsg extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                 $this->load->model('students_model');
                 $this->load->model('Adminusers_model');
                 $this->load->model('Siteconfigs_model');
                 $this->load->model('Msgconfig_model');
                $this->load->model('Messages_model');
                $this->load->library(array('form_validation','session'));
                $this->load->helper(array('url','html','form'));


                
                if ($this->session->userdata('writer_level') != 'admin') {
                        redirect('user/myaccount');
                }

        }

        public function index(){
            // This is the inbox
            $data['writers'] = $this->Adminusers_model->get_activewriters();
            $data['messages'] = $this->Messages_model->get_msg_inbox();
            $this->load->view('opmaster/template/header');
            $this->load->view('opmaster/messages/index', $data);


        }
        public function msg_clients(){

            // $data['msg_config'] = $this->Msgconfig_model->get_messages('message_template');
            // $data['msg_body_admin'] = $data['msg_config']['msg_body_admin'];
            $data['writers'] = $this->Adminusers_model->get_clients_new('client');
           // $data['messages'] = $this->Messages_model->get_msg_inbox();
            $this->load->view('opmaster/template/header');
            $this->load->view('opmaster/template/admin-sidemsg');
            $this->load->view('opmaster/messages/admin-msgclients', $data);
        }

        public function mail_clients(){

            $data['msg_config'] = $this->Msgconfig_model->get_messages('message_template');
            $data['msg_body_client'] = $data['msg_config']['msg_body_client'];
            $data['msg_id'] = $data['msg_config']['msg_id'];
            $data['writers'] = $this->Adminusers_model->get_clients();
            $data['messages'] = $this->Messages_model->get_msg_inbox();
            $this->load->view('opmaster/template/header');
            $this->load->view('opmaster/template/admin-sidemsg');
            $this->load->view('opmaster/messages/admin-mailclients', $data);
        }


        public function msg_writers(){
            // This is the inbox
            // $data['writers'] = $this->Adminusers_model->get_activewriters();
            // $data['messages'] = $this->Messages_model->get_msg_inbox();
            $data['writers'] = $this->Adminusers_model->get_clients_new('writer');
            $this->load->view('opmaster/template/header');
             $this->load->view('opmaster/template/admin-sidemsg');
            $this->load->view('opmaster/messages/admin-msgwriters', $data);

        }

        public function mail_writers(){

            $data['msg_config'] = $this->Msgconfig_model->get_messages('message_template');
            $data['msg_body_writer'] = $data['msg_config']['msg_body_writer'];
            $data['msg_id'] = $data['msg_config']['msg_id'];
            $data['writers'] = $this->Adminusers_model->get_activewriters();
            $data['messages'] = $this->Messages_model->get_msg_inbox();
            $this->load->view('opmaster/template/header');
             $this->load->view('opmaster/template/admin-sidemsg');
            $this->load->view('opmaster/messages/admin-mailwriters', $data);

        }



 public function email_writers (){
        
        $this->form_validation->set_rules('emailee', 'emailee', 'required');
        $this->form_validation->set_rules('message', 'message', 'required');
        $this->form_validation->set_rules('emailheader', 'emailheader', 'required');
        if ($this->form_validation->run() === TRUE) {

$data['getdtls'] = $this->Messages_model->receiver_email($this->input->post('emailee'));
$receiverid = $data['getdtls']['writer_id'];
$receiver_name = $data['getdtls']['firstname'].' '.$data['getdtls']['lastname'];

           $msg_id = random_string('numeric', 9);
                        $data = array(
                                'senderid' => $this->session->userdata('writer_id'),
                                'sender_name' => $this->session->userdata('firstname').' '.$this->session->userdata('lastname'),
                                'receiverid' => $receiverid,
                                'receiver_name' => $receiver_name,
                                'msg_title' => $this->input->post('emailheader'),
                                'msg_body' => $this->input->post('message'),
                                'msg_date' => date('Y/m/d H:i:s'),
                                'msg_type' => 'message',
                                'msg_id' => $msg_id,
                            
                        );
                        
                        $this->Messages_model->message_submit($data);
                        


                    $receiver_name        = $receiver_name;
                    $msg_id    = $msg_id;
                  $ordernow     = base_url() . 'project/create/';
                  $loginurl     = base_url() . 'user/login/';
                  $sitename     = $this->config->item('sitename');


                    $data['msg']     = $this->Siteconfigs_model->msg_config('new_message_received');
                     $msg_body_writer = $data['msg']['msg_body_writer'];


                      //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                                $msg_body_writer = str_replace('"', "'", $msg_body_writer);


                                // This evals so that the variables in the codes are read
                                eval("\$str2 = \"$msg_body_writer\";");
                                //echo $str2; 
                                

                                   //send email to admin
                         $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('writeemail'));
                                $smtp_port               = $configs['smtp_configs']['smtp_port'];
                                $smtp_host               = $configs['smtp_configs']['smtp_host'];
                                $smtp_user               = $configs['smtp_configs']['smtp_user'];
                                $smtp_name               = $configs['smtp_configs']['smtp_name'];
                                $smtp_pass               = $configs['smtp_configs']['smtp_pass'];
                                $admin_email             = $configs['smtp_configs']['admin_email'];
                                $protocol                = $configs['smtp_configs']['protocol'];
                                $config                  = Array(
                                        'protocol' => $protocol,
                                        'smtp_host' => $smtp_host,
                                        'smtp_port' => $smtp_port,
                                        'smtp_user' => $smtp_user,
                                        'smtp_pass' => $smtp_pass,
                                        'mailtype' => 'html'
                                );
                                $this->load->library('email', $config);
                                $this->email->set_newline("\r\n");
            
                                // send message to client
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($this->input->post('emailee'));
                                
                                $this->email->subject($receiver_name.', '.'New Message #'.  $msg_id . 'received');
                                $this->email->message($str2);
                                
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                }                                
                 
                }
                               redirect('adminmsg/msg_successful');

        }

 public function email_clients (){
        
        $this->form_validation->set_rules('emailee', 'emailee', 'required');
        $this->form_validation->set_rules('message', 'message', 'required');
        $this->form_validation->set_rules('emailheader', 'emailheader', 'required');
        if ($this->form_validation->run() === TRUE) {

$data['getdtls'] = $this->Messages_model->receiver_email($this->input->post('emailee'));
$receiverid = $data['getdtls']['writer_id'];
$receiver_name = $data['getdtls']['firstname'].' '.$data['getdtls']['lastname'];

           $msg_id = random_string('numeric', 9);
                        $data = array(
                                'senderid' => $this->session->userdata('writer_id'),
                                'sender_name' => $this->session->userdata('firstname').' '.$this->session->userdata('lastname'),
                                'receiverid' => $receiverid,
                                'receiver_name' => $receiver_name,
                                'msg_title' => $this->input->post('emailheader'),
                                'msg_body' => $this->input->post('message'),
                                'msg_date' => date('Y/m/d H:i:s'),
                                'msg_type' => 'message',
                                'msg_id' => $msg_id,
                            
                        );
                        
                        $this->Messages_model->message_submit($data);
                        


                    $receiver_name        = $receiver_name;
                    $msg_id    = $msg_id;
                  $ordernow     = base_url() . 'project/create/';
                  $loginurl     = base_url() . 'user/login/';
                  $sitename     = $this->config->item('sitename');


                    $data['msg']     = $this->Siteconfigs_model->msg_config('new_message_received');
                     $msg_body_client = $data['msg']['msg_body_client'];


                      //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                                $msg_body_client = str_replace('"', "'", $msg_body_client);


                                // This evals so that the variables in the codes are read
                                eval("\$str3 = \"$msg_body_client\";");
                                //echo $str2; 
                                

                                   //send email to admin
                         $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('custemail'));
                                $smtp_port               = $configs['smtp_configs']['smtp_port'];
                                $smtp_host               = $configs['smtp_configs']['smtp_host'];
                                $smtp_user               = $configs['smtp_configs']['smtp_user'];
                                $smtp_name               = $configs['smtp_configs']['smtp_name'];
                                $smtp_pass               = $configs['smtp_configs']['smtp_pass'];
                                $admin_email             = $configs['smtp_configs']['admin_email'];
                                $protocol                = $configs['smtp_configs']['protocol'];
                                $config                  = Array(
                                        'protocol' => $protocol,
                                        'smtp_host' => $smtp_host,
                                        'smtp_port' => $smtp_port,
                                        'smtp_user' => $smtp_user,
                                        'smtp_pass' => $smtp_pass,
                                        'mailtype' => 'html'
                                );
                                $this->load->library('email', $config);
                                $this->email->set_newline("\r\n");
            
                                // send message to client
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($this->input->post('emailee'));
                                
                                $this->email->subject($receiver_name.', '.'New Message #'.  $msg_id . 'received');
                                $this->email->message($str3);
                                
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                }                                
                 
                }
                               redirect('adminmsg/msg_successful');

        }





        public function mailto_writers (){
        
        $this->form_validation->set_rules('emailee', 'emailee', 'required');
        $this->form_validation->set_rules('message', 'message', 'required');
        $this->form_validation->set_rules('emailheader', 'emailheader', 'required');
        if ($this->form_validation->run() === TRUE) {



                                //send email to admin

            $data['msg_config'] = $this->Msgconfig_model->get_messages('email_template');
            $data['msg_body_writer'] = $data['msg_config']['msg_body_writer'];

            if($this->input->post('emailee') != "all"){ 

                $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('writeemail'));
                                $smtp_port               = $configs['smtp_configs']['smtp_port'];
                                $smtp_host               = $configs['smtp_configs']['smtp_host'];
                                $smtp_user               = $configs['smtp_configs']['smtp_user'];
                                $smtp_name               = $configs['smtp_configs']['smtp_name'];
                                $smtp_pass               = $configs['smtp_configs']['smtp_pass'];
                                $admin_email             = $configs['smtp_configs']['admin_email'];
                                $protocol                = $configs['smtp_configs']['protocol'];
                                $config                  = Array(
                                        'protocol' => $protocol,
                                        'smtp_host' => $smtp_host,
                                        'smtp_port' => $smtp_port,
                                        'smtp_user' => $smtp_user,
                                        'smtp_pass' => $smtp_pass,
                                        'mailtype' => 'html'
                                );
                                $this->load->library('email', $config);
                                $this->email->set_newline("\r\n");
            

                                // send message to client
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($this->input->post('emailee'));
                                
                                $this->email->newSubject($this->input->post('emailheader'));
                                $this->email->message($this->input->post('message'));
                                if(!empty($this->input->post('emailee'))){
                                    if ($this->email->send()) {
                                            //Success email Sent
                                            //echo $this->email->print_debugger();
                                    } else {
                                            //Email Failed To Send
                                            // echo $this->email->print_debugger();
                                    }
                                }




            } else { //if all are messaged

                                $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('writeemail'));
                                $smtp_port               = $configs['smtp_configs']['smtp_port'];
                                $smtp_host               = $configs['smtp_configs']['smtp_host'];
                                $smtp_user               = $configs['smtp_configs']['smtp_user'];
                                $smtp_name               = $configs['smtp_configs']['smtp_name'];
                                $smtp_pass               = $configs['smtp_configs']['smtp_pass'];
                                $admin_email             = $configs['smtp_configs']['admin_email'];
                                $protocol                = $configs['smtp_configs']['protocol'];
                                $config                  = Array(
                                        'protocol' => $protocol,
                                        'smtp_host' => $smtp_host,
                                        'smtp_port' => $smtp_port,
                                        'smtp_user' => $smtp_user,
                                        'smtp_pass' => $smtp_pass,
                                        'mailtype' => 'html'
                                );
                                $this->load->library('email', $config);
                                $this->email->set_newline("\r\n");


                            $get_writers= $this->Adminusers_model->get_activewriters();

                                foreach ($get_writers as $writers){


                                 $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($writers['email']);
                                
                                $this->email->newSubject($writers['firstname'].', '.$this->input->post('emailheader'));
                                $this->email->message($this->input->post('message'));
                                if(!empty($writers['email'])){   
                                    if ($this->email->send()) {
                                            //Success email Sent
                                            //echo $this->email->print_debugger();
                                    } else {
                                            //Email Failed To Send
                                            // echo $this->email->print_debugger();
                                    }
                                }

                             } //ends for each


            } //end eslse
        
                                
                 
                }
                                redirect('adminmsg/msg_successful');

        }

         public function mailto_clients (){
            


        $this->form_validation->set_rules('emailee', 'emailee', 'required');
        $this->form_validation->set_rules('message', 'message', 'required');
        $this->form_validation->set_rules('emailheader', 'emailheader', 'required');
        if ($this->form_validation->run() === TRUE) {



            $data['msg_config'] = $this->Msgconfig_model->get_messages('email_template');
            $data['msg_body_client'] = $data['msg_config']['msg_body_client'];


            if($this->input->post('emailee') != "all"){ 

                                //send email to admin
                         $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('custemail'));
                                $smtp_port               = $configs['smtp_configs']['smtp_port'];
                                $smtp_host               = $configs['smtp_configs']['smtp_host'];
                                $smtp_user               = $configs['smtp_configs']['smtp_user'];
                                $smtp_name               = $configs['smtp_configs']['smtp_name'];
                                $smtp_pass               = $configs['smtp_configs']['smtp_pass'];
                                $admin_email             = $configs['smtp_configs']['admin_email'];
                                $protocol                = $configs['smtp_configs']['protocol'];
                                $config                  = Array(
                                        'protocol' => $protocol,
                                        'smtp_host' => $smtp_host,
                                        'smtp_port' => $smtp_port,
                                        'smtp_user' => $smtp_user,
                                        'smtp_pass' => $smtp_pass,
                                        'mailtype' => 'html'
                                );
                                $this->load->library('email', $config);
                                $this->email->set_newline("\r\n");
            


                                // send message to client
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($this->input->post('emailee'));
                                
                                $this->email->newSubject($this->input->post('emailheader'));
                                $this->email->message($this->input->post('message'));
                                if(!empty($this->input->post('emailee'))){
                                    if ($this->email->send()) {
                                            //Success email Sent
                                            //echo $this->email->print_debugger();
                                    } else {
                                            //Email Failed To Send
                                            // echo $this->email->print_debugger();
                                    }
                                }




            } else { //if all are messaged


                                //send email to admin
                         $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('custemail'));
                                $smtp_port               = $configs['smtp_configs']['smtp_port'];
                                $smtp_host               = $configs['smtp_configs']['smtp_host'];
                                $smtp_user               = $configs['smtp_configs']['smtp_user'];
                                $smtp_name               = $configs['smtp_configs']['smtp_name'];
                                $smtp_pass               = $configs['smtp_configs']['smtp_pass'];
                                $admin_email             = $configs['smtp_configs']['admin_email'];
                                $protocol                = $configs['smtp_configs']['protocol'];
                                $config                  = Array(
                                        'protocol' => $protocol,
                                        'smtp_host' => $smtp_host,
                                        'smtp_port' => $smtp_port,
                                        'smtp_user' => $smtp_user,
                                        'smtp_pass' => $smtp_pass,
                                        'mailtype' => 'html'
                                );
                                $this->load->library('email', $config);
                                $this->email->set_newline("\r\n");
            

                            $get_writers= $this->Adminusers_model->get_clients();

                                foreach ($get_writers as $writers){


                                 $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($writers['email']);
                                
                                $this->email->newSubject($writers['firstname'].', '.$this->input->post('emailheader'));
                                $this->email->message($this->input->post('message'));
                                if(!empty($writers['email'])){   
                                    if ($this->email->send()) {
                                            //Success email Sent
                                            //echo $this->email->print_debugger();
                                    } else {
                                            //Email Failed To Send
                                            // echo $this->email->print_debugger();
                                    }
                                }

                             } //ends for each


            } //end eslse
        
                                
                 
                }
                             redirect('adminmsg/msg_successful');

        }

        public function inbox(){
             $data['unread'] = $this->Messages_model->admin_msg_unread($this->session->userdata('writer_id'));
             // $data['inbox'] = $this->Messages_model->admin_msg_inbox();
             $data['no_sup_user'] = $this->Messages_model->no_sup_user();
             $data['my_users'] = $this->Messages_model->get_my_sup_users($this->session->userdata('writer_id'));

             $this->load->view('opmaster/template/header');
              $this->load->view('opmaster/template/admin-sidemsg');
            $this->load->view('opmaster/messages/admininbox', $data);

        }
        public function msg_successful(){
             $this->load->view('opmaster/template/header');
              $this->load->view('opmaster/template/admin-sidemsg');
            $this->load->view('opmaster/messages/admin-msgsent');

        }
        public function compose(){
             $data['writers'] = $this->students_model->get_writers();
             $data['clients'] = $this->students_model->get_clients();
            $this->load->view('opmaster/messages/compose', $data);

        }
       
        public function outbox(){
             $data['outbox'] = $this->Messages_model->admin_msg_outbox();
            $this->load->view('opmaster/template/header');
             $this->load->view('opmaster/template/admin-sidemsg');
            $this->load->view('opmaster/messages/adminoutbox', $data);
        }


        // public function read($msg_id = NULL)
        // {
        //         $data['messages'] = $this->Messages_model->read_msg($msg_id);
        //         $data['receiverid'] = $data['messages']['receiverid'];
        //         $data['senderid'] = $data['messages']['senderid'];
        //         $data['msg_body'] = $data['messages']['msg_body'];
        //         // $data['replies']  = $this->Messages_model->get_msg_replies($msg_id);
        //         $data['sup_history'] = $this->Messages_model->getSupHistory($data['receiverid'], $data['senderid']);
        //         $this->load->view('opmaster/template/header');
        //         $this->load->view('opmaster/template/admin-sidemsg');
        //         $this->load->view('opmaster/messages/admin-viewmsg', $data);   


        //        $userid = $this->session->userdata('writer_id');

        //        if(1){

        //                 $data = array(
        //                         'msg_read' => 1,
                                
        //                 );

        //                 // update to mark it as unread due to this reply
        //               $this->Messages_model->mark_unread_admin($msg_id, $data);
        //         }            
        // }


        public function sup_chat($client_id)
        {
                $data['messages'] = $this->Messages_model->sup_chat_page($client_id);
                $data['client'] = $this->Messages_model->getUsrInfoSup($client_id);
                $this->load->view('opmaster/template/header');
                $this->load->view('opmaster/template/admin-sidemsg');
                $this->load->view('opmaster/messages/admin-viewmsg', $data);               
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
                echo "Статус изменен ".$order_status ;
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
                $this->form_validation->set_rules('instructions', 'instructions', 'required');
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
                        echo "Статус заказа успешно обновлен" ;
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

        public function message_reply()
        {
                
                $this->form_validation->set_rules('msg_title', 'msg_title', 'required');
                $this->form_validation->set_rules('msg_body', 'Message body', 'required');
                $this->form_validation->set_rules('msg_id', 'msg_id', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $msg_date = date('Y/m/d H:i:s');
                        $msg_type = 'reply';
                
                $data['msgdtls'] = $this->Messages_model->check_receiver($this->input->post('msg_id'));
                $msg_receiverid = $data['msgdtls']['receiverid'];
                $msg_receiver_name = $data['msgdtls']['receiver_name'];
                $msg_senderid = $data['msgdtls']['senderid'];
                $msg_sender_name = $data['msgdtls']['sender_name'];
                $senderid = $this->session->userdata('writer_id');

            //if the person replying is not the receiver, then its its outbox
                
            if($msg_senderid == $senderid){

                    $data = array(
                    'senderid' => $msg_senderid,
                    'sender_name' => $msg_sender_name,
                    'receiverid' => $msg_receiverid,
                    'receiver_name' => $msg_receiver_name,
                    'msg_title' => $this->input->post('msg_title'),
                    'msg_body' => $this->input->post('msg_body'),
                    'msg_date' => $msg_date,
                    'msg_type' => $msg_type,
                    'msg_id' => $this->input->post('msg_id'),                         
                );
           $this->Messages_model->message_submit($data);

             $receiver_name        = $data['msgdtls']['receiver_name'];
                    $msg_id    = $this->input->post('msg_id');
                  $ordernow     = base_url() . 'project/create/';
                  $loginurl     = base_url() . 'user/login/';
                  $sitename     = $this->config->item('sitename');


                    $data['msg']     = $this->Siteconfigs_model->msg_config('new_message_received');
                     $msg_body_admin = $data['msg']['msg_body_admin'];


                      //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                                $msg_body_admin = str_replace('"', "'", $msg_body_admin);


                                // This evals so that the variables in the codes are read
                                eval("\$str1 = \"$msg_body_admin\";");
                                //echo $str2; 
                                

                                   //send email to admin
                         $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('custemail'));
                                $smtp_port               = $configs['smtp_configs']['smtp_port'];
                                $smtp_host               = $configs['smtp_configs']['smtp_host'];
                                $smtp_user               = $configs['smtp_configs']['smtp_user'];
                                $smtp_name               = $configs['smtp_configs']['smtp_name'];
                                $smtp_pass               = $configs['smtp_configs']['smtp_pass'];
                                $admin_email             = $configs['smtp_configs']['admin_email'];
                                $protocol                = $configs['smtp_configs']['protocol'];
                                $config                  = Array(
                                        'protocol' => $protocol,
                                        'smtp_host' => $smtp_host,
                                        'smtp_port' => $smtp_port,
                                        'smtp_user' => $smtp_user,
                                        'smtp_pass' => $smtp_pass,
                                        'mailtype' => 'html'
                                );
                                $this->load->library('email', $config);
                                $this->email->set_newline("\r\n");
            
                                // send message to client
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($this->input->post('emailee'));
                                
                                $this->email->subject($receiver_name.', '.'Новое сообщение №'.  $msg_id . 'получено');
                                $this->email->message($str1);
                                
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                } 

            }

            // this means the message is in inbox
            if($msg_senderid != $senderid){

            $data = array(
                    'senderid' => $senderid,
                    'sender_name' => $msg_receiver_name,
                    'receiverid' => $msg_senderid,
                    'receiver_name' =>  $msg_sender_name,
                    'msg_title' => $this->input->post('msg_title'),
                    'msg_body' => $this->input->post('msg_body'),
                    'msg_date' => $msg_date,
                    'msg_type' => $msg_type,
                    'msg_id' => $this->input->post('msg_id'),                         
                );
           $this->Messages_model->message_submit($data);
                  
                  $receiver_name        = $data['msgdtls']['receiver_name'];
                    $msg_id    = $this->input->post('msg_id');
                  $ordernow     = base_url() . 'project/create/';
                  $loginurl     = base_url() . 'user/login/';
                  $sitename     = $this->config->item('sitename');


                    $data['msg']     = $this->Siteconfigs_model->msg_config('new_message_received');
                     $msg_body_admin = $data['msg']['msg_body_admin'];


                      //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                                $msg_body_admin = str_replace('"', "'", $msg_body_admin);


                                // This evals so that the variables in the codes are read
                                eval("\$str1 = \"$msg_body_admin\";");
                                //echo $str2; 
                                

                                   //send email to admin
                         $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('custemail'));
                                $smtp_port               = $configs['smtp_configs']['smtp_port'];
                                $smtp_host               = $configs['smtp_configs']['smtp_host'];
                                $smtp_user               = $configs['smtp_configs']['smtp_user'];
                                $smtp_name               = $configs['smtp_configs']['smtp_name'];
                                $smtp_pass               = $configs['smtp_configs']['smtp_pass'];
                                $admin_email             = $configs['smtp_configs']['admin_email'];
                                $protocol                = $configs['smtp_configs']['protocol'];
                                $config                  = Array(
                                        'protocol' => $protocol,
                                        'smtp_host' => $smtp_host,
                                        'smtp_port' => $smtp_port,
                                        'smtp_user' => $smtp_user,
                                        'smtp_pass' => $smtp_pass,
                                        'mailtype' => 'html'
                                );
                                $this->load->library('email', $config);
                                $this->email->set_newline("\r\n");
            
                                // send message to client
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($this->input->post('emailee'));
                                
                                $this->email->subject($receiver_name.', '.'Новоe сообщение №'.  $msg_id . 'получено');
                                $this->email->message($str1);
                                
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                } 
      
        }




                        redirect('Adminmsg/read/'.$this->input->post('msg_id'));
                        
                        
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }

}
