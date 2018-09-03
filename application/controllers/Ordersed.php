<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordersed extends CI_Controller
{
        
        public function __construct()
        {
                parent::__construct();
                $this->load->model('students_model');
                $this->load->model('Ordersed_model');
                $this->load->model('Orders_model');
                $this->load->model('Siteconfigs_model');
                $this->load->model('Adminusers_model');
                $this->load->library(array(
                        'form_validation',
                        'session'
                ));
                $this->load->helper(array(
                        'url',
                        'html',
                        'form'
                ));
                
        }
        
        public function index()
        {
                $this->load->view('form');
        }
        
        
        public function form()
        {
                $this->load->view('master/template/header');
                $this->load->view('master/template/left_sidebar');
                $this->load->view('form');
                $this->load->view('master/template/footer');
                
        }
        public function writer_complete($orderid = NULL)
        {
                $this->form_validation->set_rules('order_status', 'order_status', 'required');
                if ($this->form_validation->run() === TRUE) {

                    $orderid      = $this->input->post('orderid');
                    $order_status = $this->input->post('order_status');
                    $order_status_now = $this->input->post('order_status_now');
                    $order_st_my = ''; 
                    $doplata_avtor = $this->input->post('doplata');
                    $client_paid = $this->input->post('client_paid');

                    if($order_status_now === 'Revision' ){
                        if($doplata_avtor === 'true'){
                           $order_st_my = 'onlyAvtorDoplata';
                           $client_paid = 'paid_client';
                        } else {
                            $order_st_my = 'pending';
                        }
                    } else {
                        // if($doplata_avtor === 'true'){
                        //     $order_st_my = 'onlyAvtorDoplata';
                        // } else {
                            $order_st_my = $this->input->post('order_status');  
                        // }
                    }
                    $data = array(
                        'order_status' => $order_st_my,
                        'data_oplatu' => date('d.m.Y', strtotime("+30 days")),
                        'client_paid' => $client_paid
                    );
                    
                    $this->Ordersed_model->order_update($orderid, $data);
                    // echo "Writer Status successfully set to " . $order_status;
                    
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
        
        public function submission($orderid = NULL)
        {
                $this->form_validation->set_rules('order_status', 'order_status', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $orderid      = $this->input->post('orderid');
                        $order_status = $this->input->post('order_status');
                        
                        $data = array(
                                'order_status' => $this->input->post('order_status')
                        );
                        
                        $this->Ordersed_model->order_update($orderid, $data);
                        // echo "Writer Status successfully set to " . $order_status;
                        
                        $customeremail    = $this->input->post('customer_email');
                        $orderid          = $this->input->post('orderid');
                        $order_status     = $this->input->post('order_status');
                        $customer_name    = $this->input->post('customer_name');
                        $preferred_writer = $this->input->post('preferred_writer');
                        
                        
                        // get the email details here and eval so that the codes can be read. 
                        $data['msg']     = $this->Siteconfigs_model->msg_config('order_status_changed');
                        $msg_body_admin  = $data['msg']['msg_body_admin'];
                        $msg_body_client = $data['msg']['msg_body_client'];
                        $msg_body_writer = $data['msg']['msg_body_writer'];
                        
                        //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                        $msg_body_admin  = str_replace('"', "'", $msg_body_admin);
                        $msg_body_client = str_replace('"', "'", $msg_body_client);
                        $msg_body_writer = str_replace('"', "'", $msg_body_writer);
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str1 = \"$msg_body_admin\";");
                        //echo $str1; 
                        
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str2 = \"$msg_body_client\";");
                        //echo $str2;                       
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str3 = \"$msg_body_writer\";");
                        //echo $str3;                       
                        
                        
                        //send email to admin
                        $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('adminemail'));
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
                        
                        //Add file directory if you need to attach a file
                        //$this->email->attach($file_dir_name);
                        
                        //send email to admin
                        $this->email->from($smtp_user, $smtp_name);
                        $this->email->to($admin_email);
                        
                        $this->email->subject("Заказ №" . $orderid . ' отмечен как  ' . $this->input->post('order_status'));
                        $this->email->message($str1);
                        
                        if ($this->email->send()) {
                                //Success email Sent
                                //echo $this->email->print_debugger();
                        } else {
                                //Email Failed To Send
                                // echo $this->email->print_debugger();
                        }
                        
                        //send email to customer
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
                        
                        $this->email->from($smtp_user, $smtp_name);
                        $this->email->to($this->input->post('customer_email'));
                        
                        $this->email->subject("Ваш заказ №" . $orderid . ' был отмечен' . $this->input->post('order_status'));
                        $this->email->message($str2);
                        
                        if ($this->email->send()) {
                                //Success email Sent
                                //echo $this->email->print_debugger();
                        } else {
                                //Email Failed To Send
                                // echo $this->email->print_debugger();
                        }
                        

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
                        
                        
                        //send email to writer
                        if ($preferred_writer !== 0) {
                                // get the email of a given username from database

                                $data['get_writer_email'] = $this->Siteconfigs_model->get_writer_email($this->input->post('preferred_writer'));
                                $writer_email             = $data['get_writer_email']['email'];
                                
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($writer_email);
                                
                                $this->email->subject("Order №" . $this->input->post('orderid') . ' marked as/for' . $this->input->post('order_status'));
                                $this->email->message($str3);
                                
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                }
                                
                        }
                        redirect('opmaster/view_order/' . $this->input->post('orderid'));
                        
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }        


// письмо оплата
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
                        // echo "Writer Status successfully set to " . $order_status;
                        
                        $customeremail    = $this->input->post('customer_email');
                        $orderid          = $this->input->post('orderid');
                        $oplata           = $this->input->post('oplata');
                        $customer_name    = $this->input->post('customer_name');
                        $preferred_writer = $this->input->post('preferred_writer');
                        
                        
                        // get the email details here and eval so that the codes can be read. 
                        $data['msg']     = $this->Siteconfigs_model->msg_config('new_order_paid');
                        $msg_body_admin  = $data['msg']['msg_body_admin'];
                        $msg_body_client = $data['msg']['msg_body_client'];
                        $msg_body_writer = $data['msg']['msg_body_writer'];
                        
                        //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                        $msg_body_admin  = str_replace('"', "'", $msg_body_admin);
                        $msg_body_client = str_replace('"', "'", $msg_body_client);
                        $msg_body_writer = str_replace('"', "'", $msg_body_writer);
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str1 = \"$msg_body_admin\";");
                        //echo $str1; 
                        
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str2 = \"$msg_body_client\";");
                        //echo $str2;                       
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str3 = \"$msg_body_writer\";");
                        //echo $str3;                       
                        
                        
                        //send email to admin
                        $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('adminemail'));
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
                        
                        //Add file directory if you need to attach a file
                        //$this->email->attach($file_dir_name);
                        
                        //send email to admin
                        $this->email->from($smtp_user, $smtp_name);
                        $this->email->to($admin_email);
                        
                        $this->email->subject("Заказ №" . $orderid . '. Согласованная цена за заказ  ' . $this->input->post('oplata'));
                        $this->email->message($str1);
                        
                        if ($this->email->send()) {
                               // Success email Sent
                                echo $this->email->print_debugger();
                        } else {
                                //Email Failed To Send
                                 echo $this->email->print_debugger();
                        }
                        
                        //send email to customer
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
                        
                        $this->email->from($smtp_user, $smtp_name);
                        $this->email->to($this->input->post('customer_email'));
                        
                        $this->email->subject("Ваш заказ №" . $orderid . '. Согласованная цена за заказ' . $this->input->post('oplata'));
                        $this->email->message($str2);
                        
                        if ($this->email->send()) {
                                //Success email Sent
                                echo $this->email->print_debugger();
                        } else {
                                //Email Failed To Send
                                 echo $this->email->print_debugger();
                        }
                        

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
                        
                        
                        redirect('opmaster/view_order/' . $this->input->post('orderid'));
                        
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }        

// письмо оплата 



        
        public function client_complete($orderid = NULL)
        {
                $this->form_validation->set_rules('order_status', 'order_status', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $orderid      = $this->input->post('orderid');
                        $order_status = $this->input->post('order_status');
                        
                        $data = array(
                                'order_status' => $this->input->post('order_status')
                        );
                        
                        $this->Ordersed_model->order_update($orderid, $data);
                        // echo "Writer Status successfully set to " . $order_status;
                        
                        $customeremail    = $this->input->post('customer_email');
                        $orderid          = $this->input->post('orderid');
                        $order_status     = $this->input->post('order_status');
                        $customer_name    = $this->input->post('customer_name');
                        $preferred_writer = $this->input->post('preferred_writer');
                        
                        
                        // get the email details here and eval so that the codes can be read. 
                        $data['msg']     = $this->Siteconfigs_model->msg_config('order_status_changed');
                        $msg_body_admin  = $data['msg']['msg_body_admin'];
                        $msg_body_client = $data['msg']['msg_body_client'];
                        $msg_body_writer = $data['msg']['msg_body_writer'];
                        
                        //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                        $msg_body_admin  = str_replace('"', "'", $msg_body_admin);
                        $msg_body_client = str_replace('"', "'", $msg_body_client);
                        $msg_body_writer = str_replace('"', "'", $msg_body_writer);
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str1 = \"$msg_body_admin\";");
                        //echo $str1; 
                        
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str2 = \"$msg_body_client\";");
                        //echo $str2;                       
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str3 = \"$msg_body_writer\";");
                        //echo $str3;                       
                        
                        
                        //send email to admin
                 $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('adminemail'));
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
                        
                        //Add file directory if you need to attach a file
                        //$this->email->attach($file_dir_name);
                        
                        //send email to admin
                        $this->email->from($smtp_user, $smtp_name);
                        $this->email->to($admin_email);
                        
                        $this->email->subject("Заказ №" . $orderid . ' был отмечен  ' . $this->input->post('order_status'));
                        $this->email->message($str1);
                        
                        if ($this->email->send()) {
                                //Success email Sent
                                //echo $this->email->print_debugger();
                        } else {
                                //Email Failed To Send
                                // echo $this->email->print_debugger();
                        }
                        
                        //send email to customer
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


                        $this->email->from($smtp_user, $smtp_name);
                        $this->email->to($this->input->post('customer_email'));
                        
                        $this->email->subject("Ваш заказ №" . $orderid . ' был отмечен' . $this->input->post('order_status'));
                        $this->email->message($str2);
                        
                        if ($this->email->send()) {
                                //Success email Sent
                                //echo $this->email->print_debugger();
                        } else {
                                //Email Failed To Send
                                // echo $this->email->print_debugger();
                        }
                        

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

                        
                        //send email to writer
                        if ($preferred_writer !== 0) {

                                // get the email of a given username from database

                                $data['get_writer_email'] = $this->Siteconfigs_model->get_writer_email($this->input->post('preferred_writer'));
                                $writer_email             = $data['get_writer_email']['email'];
                                
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($writer_email);
                                
                                $this->email->subject("Заказ №" . $this->input->post('orderid') . ' отмечен как' . $this->input->post('order_status'));
                                $this->email->message($str3);
                                
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                }
                                
                        }
                        redirect('order/view/' . $this->input->post('orderid'));
                        
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
        
        
        // this is the method that helps in requesting orders from the writer's end. only a writer can request an order        
        public function order_request()
        {
                
                $this->form_validation->set_rules('orderid', 'orderid', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $request_date = date('d.m.Y H:i:s');
                        $writerid = $this->input->post('writerid');
                        $writer_email = $this->Orders_model->gwe($writerid)[0]['email'];
                        // print_r($writer_email);
                        // return false;


                        $data = array(
                                'orderid' => $this->input->post('orderid'),
                                'clientid' => $this->input->post('clientid'),
                                'writerid' => $this->input->post('writerid'),
                                'topic' => $this->input->post('topic'),
                                'deadline' => $this->input->post('deadline'),
                                'words' => $this->input->post('words'),
                                'clientemail' => $this->input->post('clientemail'),
                                'clientname' => $this->input->post('clientname'),
                                'writer_email' => $writer_email,
                                'request_date' => $request_date,
                                'writername' => $this->input->post('writername'),
                                'sum' => $this->input->post('sum'),
                                'date' => $this->input->post('date'),
                                'subject' => $this->input->post('subject'),
                                'referencing_style' => $this->input->post('referencing_style'),
                                'sources' => $this->input->post('sources'),
                                'viewed' => 'false'
                                
                        );
                        
                        $this->Ordersed_model->order_request($data);
                        $this->Orders_model->mngrNewNotice('mngr_new_order_bid', $this->input->post('orderid'));
                        //  echo "Writer Status successfully applied for this project";
                        
                        // define the varibales to be passed in the email.  
                        
                        $requestorderid      = $this->input->post('orderid');
                        $requestclientid     = $this->input->post('clientid');
                        $requestwriterid     = $this->input->post('writerid');
                        $requestclientemail  = $this->input->post('clientemail');
                        $requestclientname   = $this->input->post('clientname');
                        $requestwriter_email = $writer_email;
                        $requestrequest_date = $request_date;
                        $requestwritername   = $this->input->post('writername');
                        $requestwritersum    = $this->input->post('writersum');
                        $requestwriterdate   = $this->input->post('writerdate');
                        $newBid = 'сделана';
                        
                        $siteurl         = base_url();
                        // get the email details here and eval so that the codes can be read. 
                        $data['msg']     = $this->Siteconfigs_model->msg_config('writer_bids');
                        $msg_body_admin  = $data['msg']['msg_body_admin'];
                        $msg_body_client = $data['msg']['msg_body_client'];
                        $msg_body_writer = $data['msg']['msg_body_writer'];
                        
                        //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                        $msg_body_admin  = str_replace('"', "'", $msg_body_admin);
                        $msg_body_client = str_replace('"', "'", $msg_body_client);
                        $msg_body_writer = str_replace('"', "'", $msg_body_writer);
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str1 = \"$msg_body_admin\";");
                        //echo $str1; 
                        
                        
                        //send email to admin
              $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('adminemail'));
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
                        
                        //Add file directory if you need to attach a file
                        //$this->email->attach($file_dir_name);
                        
                        //send email to admin
                        $this->email->from($smtp_user, $smtp_name);
                        $this->email->to($admin_email);
                        
                        $this->email->newSubject('Пользователь '. $this->input->post('writername') . "  оставил ставку на заказ  №" . $this->input->post('orderid'));
                        $this->email->message($str1);
                        if(!empty($admin_email)){
                            if ($this->email->send()) {
                                    //Success email Sent
                                    //echo $this->email->print_debugger();
                            } else {
                                    //Email Failed To Send
                                    // echo $this->email->print_debugger();
                            }
                        }    
                                               
                        redirect('order/view/'.$this->input->post('orderid'));
                        
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
        
//ref
  public function refuse_the_order($orderid = NULL)
        {
                        $writerid         = $this->input->post('writerid');
                        $orderid          = $this->input->post('orderid');
                       
                        // $data = array(
                        //         'preferred_writer' => 0,
                        //         'order_status' => $this->input->post('order_status')
                        // );
                        
                        $this->Ordersed_model->refuse_writer_req($orderid, $writerid) ;
                        redirect('/order/view/'.$orderid );
                                
                              

        }      
// order request update
public function order_request_update()
        {
                
                        $orderid = $this->input->post('orderid');
                        $writerid = $this->input->post('writerid');
                        $request_date = date('d.m.Y H:i:s');
                        $writer_email = $this->Orders_model->gwe($writerid)[0]['email'];
                        // print_r($writer_email);
                        // return false;


                        $data = array(
                                'orderid' => $this->input->post('orderid'),
                                'clientid' => $this->input->post('clientid'),
                                'writerid' => $this->input->post('writerid'),
                                'topic' => $this->input->post('topic'),
                                'deadline' => $this->input->post('deadline'),
                                'words' => $this->input->post('words'),
                                'clientemail' => $this->input->post('clientemail'),
                                'clientname' => $this->input->post('clientname'),
                                'writer_email' => $writer_email,
                                'request_date' => $request_date,
                                'writername' => $this->input->post('writername'),
                                'sum' => $this->input->post('sum'),
                                'date' => $this->input->post('date'),
                                'viewed' => 'false',
                                'showorder' => ''
                                
                        );
                        
                        $this->Ordersed_model->order_request_update($orderid, $writerid, $data);
                        $this->Orders_model->mngrNewNotice('mngr_new_order_bid', $this->input->post('orderid'));
                        //  echo "Writer Status successfully applied for this project";
                        
                        // define the varibales to be passed in the email.  
                        
                        $requestorderid      = $this->input->post('orderid');
                        $requestclientid     = $this->input->post('clientid');
                        $requestwriterid     = $this->input->post('writerid');
                        $requestclientemail  = $this->input->post('clientemail');
                        $requestclientname   = $this->input->post('clientname');
                        $requestwriter_email = $writer_email;
                        $requestrequest_date = $request_date;
                        $requestwritername   = $this->input->post('writername');
                        $requestwritersum    = $this->input->post('writersum');
                        $requestwriterdate   = $this->input->post('writerdate');
                        $newBid = 'изменена';

                        $shown = $this->Ordersed_model->checkIfShown($orderid, $writerid);

                        $siteurl         = base_url();
                        // get the email details here and eval so that the codes can be read. 
                        $data['msg']     = $this->Siteconfigs_model->msg_config('writer_bids');
                        $msg_body_admin  = $data['msg']['msg_body_admin'];
                        $msg_body_client = $data['msg']['msg_body_client'];
                        $msg_body_writer = $data['msg']['msg_body_writer'];
                        
                        //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                        $msg_body_admin  = str_replace('"', "'", $msg_body_admin);
                        $msg_body_client = str_replace('"', "'", $msg_body_client);
                        $msg_body_writer = str_replace('"', "'", $msg_body_writer);
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str1 = \"$msg_body_admin\";");
                        //echo $str1; 
                        
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str2 = \"$msg_body_client\";");
                        //echo $str2; 
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str3 = \"$msg_body_writer\";");
                        //echo $str3; 
                        
                        
                        //send email to admin
              $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('adminemail'));
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
                        
                        //Add file directory if you need to attach a file
                        //$this->email->attach($file_dir_name);
                        
                        //send email to admin
                        $this->email->from($smtp_user, $smtp_name);
                        $this->email->to($admin_email);
                        
                        $this->email->newSubject($this->input->post('writername') . " оставил ставку по заказу №" . $this->input->post('orderid'));
                        $this->email->message($str1);
                        if(!empty($admin_email)){
                            if ($this->email->send()) {
                                    //Success email Sent
                                    //echo $this->email->print_debugger();
                            } else {
                                    //Email Failed To Send
                                    // echo $this->email->print_debugger();
                            }
                        }    
                        
                        
if($shown === 'true'){
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

                        $get_writers= $this->Adminusers_model->my_req_get_writers($requestorderid);
                        foreach ($get_writers as $writers){
                            if($writers['writerid'] == $requestwriterid){
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($writer_email);
                        
                                $this->email->newSubject($requestwritername . ", Вы запросили заказ №" . $this->input->post('orderid'));
                                $this->email->message($str3);
                            }else{
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($writers['writer_email']);
                        
                                $this->email->newSubject("По заказу №" . $this->input->post('orderid') . "
                                    была оставлена ставка");
                                $this->email->message($str2);    // use client body message template                            
                            }
                            if(!empty($writer_email)){
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                }
                            }    

                        }
}
                        //send email to writer                        
                        redirect('order/view/'.$this->input->post('orderid'));
                        

        }

public function writer_accept(){
    $orderid = $this->input->post('orderid');
    $wr_accept = $this->input->post('wr_accept');
    $data = array(
        'writer_accept_order' => $wr_accept
    );
    $this->Ordersed_model->writer_accept($orderid, $data);
    if($wr_accept === 'true'){
    $this->Ordersed_model->del_writer_accept_notice($orderid, $this->input->post('manager_id'));
    }
    redirect('/order/view/'.$orderid );    
}
// order request update
    public function assign_writer($orderid = NULL)
        {

                $this->form_validation->set_rules('preferred_writer', 'preferred_writer', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $orderid          = $this->input->post('orderid');
                        $preferred_writer = $this->input->post('preferred_writer');
                        $previous_writer = $this->input->post('previous_writer');
                        $order_status     = 'Assigned';
                        $customer_name     = $this->input->post('customer_name');
                        $half_work         = $this->input->post('half_work');
                        $writer_name = $this->input->post('writer_name');
                        $topic = $this->input->post('topic');
                        $referencing_style = $this->input->post('referencing_style');
                        $words = $this->input->post('words');
                        $instructions = $this->input->post('instructions');
                        $half_work = $this->input->post('half_work');  
                        $all_work = $this->input->post('all_work');
                        $plan = $this->input->post('plan');  
                        $plan_status = $this->input->post('plan_status');
                        $gived_to_writer = date('d.m.Y H:i:s');

                        if($plan_status == 'false' && $plan != ''){
                            $plan = 'План:' . $this->input->post('plan');
                        } else {
                            $plan = '';
                        }

                        $data = array(
                                'preferred_writer' => $preferred_writer,
                                'writer_name' => $writer_name,
                                'order_status' => $order_status,
                                'manager_id' => $this->input->post('manager_id'),
                                'view_todo_ord' => 'false',
                                'writer_accept_order' => 'false',
                                'gived_to_writer' => $gived_to_writer
                        );
                        
                        $this->Ordersed_model->order_update($orderid, $data);
                        $this->Orders_model->mngrNewNotice('mngr_wait_accept', $orderid, 1);
                        // $this->Ordersed_model->delete_request($orderid);
                        //  $this->Ordersed_model->delete_request($orderid);

                                          
                                $siteurl         = base_url();
                                // get the email details here and eval so that the codes can be read. 
                                $data['msg']     = $this->Siteconfigs_model->msg_config('order_assigned_towriter');
                                $data['msg_writer']     = $this->Siteconfigs_model->msg_config('order_reassigned');

                                $msg_body_admin  = $data['msg']['msg_body_admin'];
                                $msg_body_client = $data['msg']['msg_body_client'];
                                $msg_body_writer = $data['msg']['msg_body_writer'];

                                // to writer for re-assigned
                                $msg_previous_writer = $data['msg_writer']['msg_body_writer'];
                                
                                //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                                $msg_body_admin  = str_replace('"', "'", $msg_body_admin);
                                $msg_body_client = str_replace('"', "'", $msg_body_client);
                                $msg_body_writer = str_replace('"', "'", $msg_body_writer);
                                $msg_previous_writer = str_replace('"', "'", $msg_previous_writer);
                                
                                // This evals so that the variables in the codes are read
                                eval("\$str1 = \"$msg_body_admin\";");
                                //echo $str1; 
                                
                                
                                // This evals so that the variables in the codes are read
                                eval("\$str2 = \"$msg_body_client\";");
                                //echo $str2; 
                                
                                // This evals so that the variables in the codes are read
                                eval("\$str3 = \"$msg_body_writer\";");
                                //echo $str3;                        
                                                                
                                // This evals so that the variables in the codes are read
                                eval("\$str4 = \"$msg_previous_writer\";");
                                //echo $str4;                        
                                
                                
                                //send email to admin
                 $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('adminemail'));
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
                                
                                //Add file directory if you need to attach a file
                                //$this->email->attach($file_dir_name);
                                
                                //send email to admin
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($smtp_user);
                                
                                $this->email->subject("Заказ №" . $orderid . ' назначен ' . $this->input->post('writer_name'));
                                $this->email->message($str1);
                                if(!empty($smtp_user)){
                                    if ($this->email->send()) {
                                            //Success email Sent
                                            //echo $this->email->print_debugger();
                                    } else {
                                            //Email Failed To Send
                                            // echo $this->email->print_debugger();
                                    }
                                }
                                //send email to customer

                                //   $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('custemail'));
                                // $smtp_port               = $configs['smtp_configs']['smtp_port'];
                                // $smtp_host               = $configs['smtp_configs']['smtp_host'];
                                // $smtp_user               = $configs['smtp_configs']['smtp_user'];
                                // $smtp_name               = $configs['smtp_configs']['smtp_name'];
                                // $smtp_pass               = $configs['smtp_configs']['smtp_pass'];
                                // $admin_email             = $configs['smtp_configs']['admin_email'];
                                // $protocol                = $configs['smtp_configs']['protocol'];
                                // $config                  = Array(
                                //         'protocol' => $protocol,
                                //         'smtp_host' => $smtp_host,
                                //         'smtp_port' => $smtp_port,
                                //         'smtp_user' => $smtp_user,
                                //         'smtp_pass' => $smtp_pass,
                                //         'mailtype' => 'html'
                                // );
                                // $this->load->library('email', $config);
                                // $this->email->set_newline("\r\n");

                                // $this->email->from($smtp_user, $smtp_name);
                                // $this->email->to($this->input->post('customer_email'));
                                
                                // $this->email->newSubject("Ваш заказ #" . $orderid . ' был назначен на выполнение');
                                // $this->email->message($str2);
                                // if(!empty($this->input->post('customer_email'))){
                                //     if ($this->email->send()) {
                                //             //Success email Sent
                                //             //echo $this->email->print_debugger();
                                //     } else {
                                //             //Email Failed To Send
                                //             // echo $this->email->print_debugger();
                                //     }
                                // }
                                
                                //send email to writer
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
                                
                                
                                // get the email of a given username from database
                                $data['get_writer_email'] = $this->Siteconfigs_model->get_writer_email($preferred_writer);
                                $writer_email             = $data['get_writer_email']['email'];
                                
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($writer_email);
                                
                                $this->email->subject("Поздравляем, заказ №" . $this->input->post('orderid') . ' был назначен Вам');
                                $this->email->message($str3);
                                if(!empty($writer_email)){
                                    if ($this->email->send()) {
                                            //Success email Sent
                                            //echo $this->email->print_debugger();
                                    } else {
                                            //Email Failed To Send
                                            // echo $this->email->print_debugger();
                                    }
                                }


                                // send email to previous writer that order has been re-assigned
                                $data['get_writer_email'] = $this->Siteconfigs_model->get_writer_email($previous_writer);
                                $previous_writer             = $data['get_writer_email']['email'];
                                
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($previous_writer);
                                
                                $this->email->subject("Заказ №" . $this->input->post('orderid') . ' был переназначен');
                                $this->email->message($str4);
                                if(!empty($previous_writer)){
                                    if ($this->email->send()) {
                                            //Success email Sent
                                            //echo $this->email->print_debugger();
                                    } else {
                                            //Email Failed To Send
                                            // echo $this->email->print_debugger();
                                    }
                                }



                  redirect('Adminorders/view_order/'.$orderid );
                        
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }   

// forma
public function aupp_writer_info($orderid = NULL)
        {

                        $request_date = date('Y/m/d H:i:s');
                        $orderid           = $this->input->post('orderid');
                        $showorder          =  $this->input->post('showWriter');
                        $writerid           = $this->input->post('writerid');
                        $sh_order           = $this->input->post('showWriter-'.$writerid);
                        // print_r($this->input->post('showWriter-'.$writerid));

                            
                        $data = array(
                                'showorder' => $this->input->post('showWriter-' . $writerid)
                        );
                        
                       $svar = $this->Ordersed_model->order_wr_update($orderid, $writerid ,$data, $sh_order);

                        // $req[] = 'Upload images';
                        print_r($svar);  


                        $requestorderid      = $this->input->post('orderid');
                        // $requestclientid     = $this->input->post('clientid');
                        $requestwriterid     = $this->input->post('writerid');
                        $requestclientemail  = $this->input->post('customer_email');
                        $requestclientname   = $this->input->post('customer_name');
                        $requestwriter_email = $this->input->post('writer_email');
                        $requestrequest_date = $request_date;
                        $requestwritername   = $this->input->post('writer_name');
                        $requestwritersum    = $this->input->post('sum');
                        // $requestwriterdate   = $this->input->post('writerdate');
                        $newBid = 'сделана';
                        
                        $siteurl         = base_url();
                        // get the email details here and eval so that the codes can be read. 
                        $data['msg']     = $this->Siteconfigs_model->msg_config('writer_bids');
                        $msg_body_client = $data['msg']['msg_body_client'];
                        $msg_body_writer = $data['msg']['msg_body_writer'];
                        
                        //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                        $msg_body_client = str_replace('"', "'", $msg_body_client);
                        $msg_body_writer = str_replace('"', "'", $msg_body_writer);
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str2 = \"$msg_body_client\";");
                        //echo $str2; 
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str3 = \"$msg_body_writer\";");
                        //echo $str3; 
                        
                        
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

                        $get_writers= $this->Adminusers_model->my_req_get_writers($requestorderid);
                        print_r($get_writers);
                        foreach ($get_writers as $writers){

                            // if($writers['writerid'] == $requestwriterid){
                                // $this->email->from($smtp_user, $smtp_name);
                                // $this->email->to($this->input->post('writer_email'));
                        
                                // $this->email->newSubject($requestwritername . ", Вы запросили заказ #" . $this->input->post('orderid'));
                                // $this->email->message($str3);
                                // if(!empty($this->input->post('writer_email'))){
                                //     if ($this->email->send()) {
                                //             //Success email Sent
                                //             //echo $this->email->print_debugger();
                                //     } else {
                                //             //Email Failed To Send
                                //             // echo $this->email->print_debugger();
                                //     }
                                // }   
                            // } else {
                               if($writers['writerid'] != $requestwriterid) { 
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($writers['writer_email']);
                        
                                $this->email->newSubject("По заказу №" . $this->input->post('orderid') . "
                                    была оставлена ставка");
                                $this->email->message($str2);    
                                // use client body message template                            
                                    if(!empty($writers['writer_email'])){
                                        if ($this->email->send()) {
                                                //Success email Sent
                                                //echo $this->email->print_debugger();
                                        } else {
                                                //Email Failed To Send
                                                // echo $this->email->print_debugger();
                                        }
                                    }   
                                }
                            // }


                        }
        }       
// forma


         public function client_assign_writer($orderid = NULL)
        {
                
                $this->form_validation->set_rules('preferred_writer', 'preferred_writer', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $orderid          = $this->input->post('orderid');
                        $preferred_writer = $this->input->post('preferred_writer');
                        $previous_writer = $this->input->post('previous_writer');
                        $order_status     = 'Assigned';
                        $customer_name     = 'Customer';
                        
                        $data = array(
                                'preferred_writer' => $this->input->post('preferred_writer'),
                                'writer_name' => $this->input->post('writer_name'),
                                'order_status' => $order_status
                        );
                        
                        $this->Ordersed_model->order_update($orderid, $data);
                        $this->Ordersed_model->delete_request($orderid);
                        //  $this->Ordersed_model->delete_request($orderid);

                        
                                
                                $siteurl         = base_url();
                                // get the email details here and eval so that the codes can be read. 
                                $data['msg']     = $this->Siteconfigs_model->msg_config('order_assigned_towriter');
                                $data['msg_writer']     = $this->Siteconfigs_model->msg_config('order_reassigned');

                                $msg_body_admin  = $data['msg']['msg_body_admin'];
                                $msg_body_client = $data['msg']['msg_body_client'];
                                $msg_body_writer = $data['msg']['msg_body_writer'];

                                // to writer for re-assigned
                                $msg_previous_writer = $data['msg_writer']['msg_body_writer'];
                                
                                //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                                $msg_body_admin  = str_replace('"', "'", $msg_body_admin);
                                $msg_body_client = str_replace('"', "'", $msg_body_client);
                                $msg_body_writer = str_replace('"', "'", $msg_body_writer);
                                $msg_previous_writer = str_replace('"', "'", $msg_previous_writer);
                                
                                // This evals so that the variables in the codes are read
                                eval("\$str1 = \"$msg_body_admin\";");
                                //echo $str1; 
                                
                                
                                // This evals so that the variables in the codes are read
                                eval("\$str2 = \"$msg_body_client\";");
                                //echo $str2; 
                                
                                // This evals so that the variables in the codes are read
                                eval("\$str3 = \"$msg_body_writer\";");
                                //echo $str3;                        
                                                                
                                // This evals so that the variables in the codes are read
                                eval("\$str4 = \"$msg_previous_writer\";");
                                //echo $str4;                        
                                
                                
                                //send email to admin
                    $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('adminemail'));
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
                                
                                //Add file directory if you need to attach a file
                                //$this->email->attach($file_dir_name);
                                
                                //send email to admin
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($smtp_user);
                                
                                $this->email->subject("Заказ №" . $orderid . ' был назначен Вам ' . $this->input->post('writer_name'));
                                $this->email->message($str1);
                                
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                }
                                
                                //send email to customer
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
                                
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($this->input->post('customer_email'));
                                
                                $this->email->subject("Ваш заказ №" . $orderid . ' был назначен ' . $this->input->post('writer_name'));
                                $this->email->message($str2);
                                
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                }
                                
                                
                                //send email to writer
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
                                
                                // get the email of a given username from database
                                $data['get_writer_email'] = $this->Siteconfigs_model->get_writer_email($preferred_writer);
                                $writer_email             = $data['get_writer_email']['email'];
                                
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($writer_email);
                                
                                $this->email->subject("Поздравляем, заказ №" . $this->input->post('orderid') . ' был назначен Вам');
                                $this->email->message($str3);
                                
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                }



                                // send email to previous writer that order has been re-assigned
                                $data['get_writer_email'] = $this->Siteconfigs_model->get_writer_email($previous_writer);
                                $previous_writer             = $data['get_writer_email']['email'];
                                
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($previous_writer);
                                
                                $this->email->subject("Заказ №" . $this->input->post('orderid') . ' был переназначен');
                                $this->email->message($str4);
                                
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                }




                  redirect('order/view/'.$orderid );
                        
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
       
       public function returntoopen($orderid = NULL)
        {
                
                $this->form_validation->set_rules('orderid', 'orderid', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $orderid          = $this->input->post('orderid');
                       
                        $data = array(
                                'preferred_writer' => 0,
                                'order_status' => $this->input->post('order_status')
                        );
                        
                        $this->Ordersed_model->order_update($orderid, $data);
                        //  $this->Ordersed_model->delete_request($orderid);
                       // echo "You have successfully assigned this order";
                        redirect('opmaster/view_order/'.$orderid );
                                
                              
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
        
        
        public function delete_request($orderid = NULL)
        {
                
                $this->form_validation->set_rules('orderid', 'orderid', 'required');
                if ($this->form_validation->run() === TRUE) {
                        
                        $this->Ordersed_model->delete_request($orderid);
                      //  echo "You have successfully deleted " . $id;
                        redirect('Siteconfigs');
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
        
        
        // This method is being used twice, by editing customer's details and also editing writer's details.        
        public function orderadminedit($orderid = NULL)
        {
                //$this->form_validation->set_rules('subject', 'subject', 'required');
                $this->form_validation->set_rules('topic', 'topic', 'required');
               // $this->form_validation->set_rules('words', 'words', 'required');
                $this->form_validation->set_rules('instructions', 'instructions', '');
                $this->form_validation->set_rules('amount', 'amount', 'required|numeric');
                if ($this->form_validation->run() === TRUE) {
                        $orderid       = $this->input->post('orderid');
                        $writer_status = $this->input->post('writer_status');
                        
                        $data = array(
                                'subject' => $this->input->post('subject'),
                                'topic' => $this->input->post('topic'),
                                'words' => $this->input->post('words'),
                                'instructions' => $this->input->post('instructions'),
                                'writerpay' => $this->input->post('writerpay'),
                                'amount' => $this->input->post('amount')
                        );
                        
                        $this->Ordersed_model->order_update($orderid, $data);
                        redirect('opmaster/view_order/'.$orderid );
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }        
        // This method is being used twice, by editing customer's details and also editing writer's details.        
        public function adminessayedit($orderid = NULL)
        {

                $this->form_validation->set_rules('topic', 'topic', 'required');
                //$this->form_validation->set_rules('words', 'words', 'required');
                $this->form_validation->set_rules('instructions', 'instructions', '');
                $this->form_validation->set_rules('amount', 'amount', 'required|numeric');
                if ($this->form_validation->run() === TRUE) {
                        $orderid       = $this->input->post('orderid');
                       // $writer_status = $this->input->post('writer_status');
                        
                        $data = array(
                                'subject' => $this->input->post('subject'),
                                'topic' => $this->input->post('topic'),
                                'words' => $this->input->post('words'),
                                'instructions' => $this->input->post('instructions'),
                                'amount' => $this->input->post('amount')
                        );
                        
                        $this->Ordersed_model->order_update($orderid, $data);
                        redirect('opmaster/view_order/'.$orderid );
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
        
        public function editmyorder($orderid = NULL)
        {
                $this->form_validation->set_rules('subject', 'subject', 'required');
                $this->form_validation->set_rules('topic', 'topic', 'required');
                $this->form_validation->set_rules('words', 'words', 'required');
                $this->form_validation->set_rules('instructions', 'instructions', '');
                if ($this->form_validation->run() === TRUE) {
                        $orderid       = $this->input->post('orderid');
                        $writer_status = $this->input->post('writer_status');
                        
                        $data = array(
                                'subject' => $this->input->post('subject'),
                                'topic' => $this->input->post('topic'),
                                'words' => $this->input->post('words'),
                                'instructions' => $this->input->post('instructions')
                        );
                        
                        $this->Ordersed_model->order_update($orderid, $data);
                        echo "Order status sucessfully updated";
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
        
        public function add_time($orderid = NULL)
        {
                
                $this->form_validation->set_rules('subject', 'subject', 'required');
                $this->form_validation->set_rules('topic', 'topic', 'required');
                $this->form_validation->set_rules('words', 'words', 'required');
                $this->form_validation->set_rules('instructions', 'instructions', '');
                if ($this->form_validation->run() === TRUE) {
                        $date_posted = date('Y-m-d H:i:s');
                        $urgency     = $this->input->post('urgency');
                        $deadline    = date('Y-m-d H:i:s', strtotime($urgency, strtotime($date_posted)));
                        
                        $data = array(
                                'deadline' => $deadline
                                
                        );
                        
                        $this->Ordersed_model->order_update($orderid, $data);
                        echo "Order status sucessfully updated";
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
                
        }
        
}