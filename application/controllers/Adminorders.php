<?php
class Adminorders extends CI_Controller
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
                $this->load->library('session');
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



        public function new_order()
        {


                
                if (!empty($_SERVER['HTTP_REFERER'])) {
                        $url = $_SERVER['HTTP_REFERER'];
                        
                        $url = explode('/', $url);
                        $url = array_filter($url);
                        $url = array_merge($url, array());
                        $url = preg_replace('/\?.*/', '', $url);
                        
                        
                        if (!empty($url[5]) && $url[5] > 0 && $url[3] == 'writers') {
                                $preferred_writer = $url[5];
                                $order_status     = 'Assigned';
                        } else {
                                $preferred_writer = '';
                                $order_status     = 'Openproject';
                        }
                        
                }
                
                if (empty($_SERVER['HTTP_REFERER'])) {
                        
                        $preferred_writer = '';
                        $order_status     = 'Openproject';
                }
                
                 // $data['max_orderid']       = $this->Orders_model->max_orderid();
                       // $max_orderid = $data['max_orderid']['orderid']+1;
                // the order page has been restricted tologged in memebrs only. they have to log in to make an order.. The sessions are stored as writer_id. 
                if ($this->session->userdata('writer_id')) {
                        $this->load->helper('form');
                        $this->load->library('form_validation');
                        // $data['subject']           = $this->Orders_model->get_subject();
                        // $data['pages'] = $this->Orders_model->get_pages(); we replaced the pages by foreach, php
                        // $data['urgency']           = $this->Orders_model->get_urgency();
                        // $data['configs']           = $this->Siteconfigs_model->configs();
                        // $data['academic_level']    = $this->Siteconfigs_model->academic_level();
                        // $data['referencing_style'] = $this->Siteconfigs_model->referencing_style();
                        // $data['writers']           = $this->Adminusers_model->get_activewriters();
                        // $data['type_service']      = $this->Siteconfigs_model->type_service();
                        // $data['profile']           = $this->User_model->get_profile();
                        // $data['title']             = 'Create Order';
                        // $data['preferred_writer']  = $preferred_writer;
                        //$data['order_status']      = $order_status;
                        $data['order_status']      = $this->Orders_model->orders_table_custom_req();
                        $this->form_validation->set_rules('topic', 'topic', 'required');
                        $this->form_validation->set_rules('subject', 'subject', 'required');
                        $this->form_validation->set_rules('words', 'words', 'required');
                        $this->form_validation->set_rules('instructions', 'instructions', '');
                        $this->form_validation->set_rules('urgency', 'urgency', 'required');
                        $this->form_validation->set_rules('amount', 'amount', '');
                      //  $this->form_validation->set_rules('customer_email', 'customer_email', 'required');
                        
                        
                        if ($this->form_validation->run() === FALSE) {
                            // echo '<pre>';
                            // print_r($data);
                            // echo '</pre>';
                  $this->load->view('opmaster/template/header');       
                  $this->load->view('opmaster/template/admin-sideorders');       
                  $this->load->view('opmaster/orders/admin-grafik', $data);          

                        
                                
                        } else {
                                
                                
                                
                                $inputpage            = $this->input->post('words');
                                $data['select_words'] = $this->Siteconfigs_model->select_words(1);
                                $wordsperpage         = $data['select_words']['wordsperpage'];
                                $words                = $wordsperpage * $inputpage;
                                
                                
                                $academic_level         = $this->input->post('academic_level');
                                $data['academic_level'] = $this->Siteconfigs_model->getacademic_level($academic_level);
                                $academic_level         = $data['academic_level']['academic_level'];
                                
                                $urgency         = $this->input->post('urgency');
                                $data['urgency'] = $this->Siteconfigs_model->geturgency($urgency);
                                $urgency         = $data['urgency']['urgency'];
                                $duration        = $data['urgency']['duration'];
                                $time1           = $urgency . " " . $duration;
                                
                                //$this->load->helper('url');    
                                $customer     = $this->session->userdata('writer_id');
                                $date_posted  = date('Y-m-d H:i:s');
                                $client_paid  = 'paid'; // This is default NO since any incoming orders are not paid yet. Once they make an order is when they can pay for the order. Process->Order made->pay order. 
                                $writerpaid   = 'unpaid';
                                $amount       = $this->input->post('amount');
                                $writeramount = $this->input->post('writeramount');
                                $writerpay1 = $this->input->post('writerpay1');

                                if(empty($writerpay1)){
                                $writerpay    = $amount * $writeramount; // This will be controlled by the admin, will create a table for it to store this value.                                         
                                }


                                if(!empty($writerpay1)){
                                $writerpay    = $this->input->post('writerpay1'); // This will be controlled by the admin, will create a table for it to store this value.                                         
                                }
  

                                //$urgency = $this->input->post('urgency');
                                $deadline     = date('Y-m-d H:i:s', strtotime($time1, strtotime($date_posted)));
                                $title        = $this->input->post('topic');
                                $alias        = preg_replace("/[^\w]/", "-", $title);
                                $alias        = str_replace('----', '-', $alias); // Replaces all spaces with hyphens.
                                $alias        = str_replace('---', '-', $alias); // Replaces all spaces with hyphens.
                                $alias        = str_replace('--', '-', $alias); // Replaces all spaces with hyphens.
                                $alias        = $max_orderid.'-'.$alias . '.html'; // Replaces all spaces with hyphens.
                                
                                //making field pick proper values from pvalues
                                $order_period = date('Y') . '' . date('M');
                                $instructions = $this->input->post('instructions');
                                $clean_string = preg_replace('/[^\x00-\x7F]+/','',$instructions);


                                $data['orderrequests'] = $this->Orders_model->mypending_requests();

                                if ($order_period) {
                                        $data = array(
                                                'topic' => $this->input->post('topic'),
                                                'customer' => $customer,
                                                'subject' => $this->input->post('subject'),
                                                'words' => $words,
                                                'instructions' => $clean_string,
                                                'urgency' => $this->input->post('urgency'),
                                                'amount' => $this->input->post('amount'),
                                                'date_posted' => $date_posted,
                                                'order_status' => $this->input->post('order_status'),
                                                'referencing_style' => $this->input->post('referencing_style'),
                                                'customer_email' => $this->input->post('customer_email'),
                                                'academic_level' => $academic_level,
                                                'sources' => $this->input->post('sources'),
                                                'client_paid' => $client_paid,
                                                'writerpaid' => $writerpaid,
                                                'writerpay' => $writerpay,
                                                'deadline' => $deadline,
                                                'order_period' => $order_period,
                                                'project_type' => 'project',
                                                'alias' => $alias,
                                                'preferred_writer' => $this->input->post('preferred_writer'),
                                                'trackingid' => $this->input->post('trackingid'),
                                                'customer_name' => $this->input->post('customer_name'),
                                                'plan' => $plan,
                                                'yesno' => $yesno
                                                
                                        );
                                        
                                        $this->Orders_model->create_order($data);
                                        
                                }
                                

                                if ($this->input->post('submit') && !empty($_FILES['multipleFiles'])) {
                                        
                                        // count the number of files uploades
                                        $number_of_files = count($_FILES['multipleFiles']['name']);
                                        
                                        //store global files to local variable
                                        
                                        $files        = $_FILES;
                                        $orderfile    = $this->input->post('orderid');
                                        $order_period = date('Y') . '' . date('M');

                                        $dif          = $this->config->item('uploads').'/' . $order_period . '/' . $max_orderid;
                                        // make sure the folder exists else create 
                                        if (!is_dir($dif)) {
                                                mkdir($dif, 0777, true);
                                        }
                                        
                                        // upload files one by one
                                        
                                        for ($i = 0; $i < $number_of_files; $i++) {
                                                $_FILES['multipleFiles']['name']     = $files['multipleFiles']['name'][$i];
                                                $_FILES['multipleFiles']['type']     = $files['multipleFiles']['type'][$i];
                                                $_FILES['multipleFiles']['tmp_name'] = $files['multipleFiles']['tmp_name'][$i];
                                                $_FILES['multipleFiles']['error']    = $files['multipleFiles']['error'][$i];
                                                $_FILES['multipleFiles']['size']     = $files['multipleFiles']['size'][$i];

                                $fname         = $files['multipleFiles']['name'][$i];
                                $file_name = pathinfo($fname, PATHINFO_FILENAME);
                                $ext = pathinfo($fname, PATHINFO_EXTENSION);

                                $newfile_name= preg_replace('/[^\w]/', '_', $file_name);
                                                
                                                $config['upload_path']   = $dif;
                                                $config['allowed_types'] = 'pdf|doc|dot|docx|docm|dotx|dotm|docb|xls|xlsx|xlt|xlm|xlsm|xltx|xltm|csv|txt|rtf|htm|html|zip|mp3|mp4|wma|mpg|flv|avi|jpg|jpeg|png|gif|pptx|pptm|ppt|pot|potx|potm|ppam|ppsx|ppsm|sldx|sldm|accdb|accde|accdt|accdr|';
                                                $config['max_size']      = '233232';
                                                $config['max_width']     = '232323';
                                                $config['max_height']    = '243233';
                                                $config['file_name']    = $newfile_name.'.'.$ext;
                                                $config['overwrite']     = TRUE;
                                                $config['remove_spaces'] = TRUE;
                                                
                                                // $this->load-library('upload', $config);
                                                $this->upload->initialize($config);
                                                
                                                if (!$this->upload->do_upload('multipleFiles')) {
                                                        $error = array(
                                                                'error' => $this->upload->display_errors()
                                                        );
                                                } else {
                                                        $data = array(
                                                                'upload_data' => $this->upload->data()
                                                        );
                                                        //  $this->Orders_model->order_files($data);
                                                }
                                                
                                                //print_r($this->upload->data());
                                        }
                                        
                                        
                                        
                                        for ($i = 0; $i < $number_of_files; $i++) {
                                                $fname         = $files['multipleFiles']['name'][$i];
                                                $file_name     = str_replace(' ', '_', $fname);
                                                $uploader_name = $this->session->userdata('firstname');
                                                $this->session->userdata('lastname');
                                                
                                                //////////// do some work here to enter content into database for materials and essays. stopepd here
                                                
                                                $orderfile    =  $max_orderid;
                                                $order_period = date('Y') . '' . date('M');
                                                //$filename = base_url().''.$dif.'/'.$file_name;// or /var/www/html/file.docx

                                                $filename     = $this->config->item('uploads').'/' . $order_period . '/' . $orderfile . '/' . $file_name; // or /var/www/html/file.docx


                                $fname         = $files['multipleFiles']['name'][$i];
                                $file_name = pathinfo($fname, PATHINFO_FILENAME);
                                $ext = pathinfo($fname, PATHINFO_EXTENSION);

                                $newfile_name= preg_replace('/[^\w]/', '_', $file_name);

                                $dbfile_name  = $newfile_name.'.'.$ext;

                                                $data = array(
                                                        'file_name' => $files['multipleFiles']['name'][$i],
                                                        'file_size' => $files['multipleFiles']['size'][$i],
                                                        'tmp_name' => $dbfile_name,
                                                        'file_type' => $files['multipleFiles']['type'][$i],
                                                        'upload_date' => date('Y-m-d H:i:s'),
                                                        'order_id' =>  $max_orderid,
                                                        'upload_type' => $this->input->post('upload_type'),
                                                        'alias' => $alias,
                                                      //  'answer_content' => nl2br($content),
                                                        'uploader_name' => $uploader_name,
                                                        'uploaded_by' => $this->session->userdata('writer_id')
                                                        
                                                );
                                                $this->Orders_model->order_files($data);
                                                
                                        }
                                }
                                
                                
                                $siteurl             = base_url();
                                $orderdirectlink     = base_url() . 'order/view/' . $this->input->post('orderid');
                                $ordertopic          = $this->input->post('topic');
                                $orderclient         = $this->session->userdata('writer_id');
                                $orderorderid        = $max_orderid;
                                $ordersubject        = $this->input->post('subject');
                                $orderwords          = $words;
                                $orderinstructions   = $this->input->post('instructions');
                                $orderurgency        = $this->input->post('urgency');
                                $orderamount         = $this->input->post('amount');
                                $orderorder_status   = $this->input->post('order_status');
                                $orderreferencing    = $this->input->post('referencing_style');
                                $ordercustomer_email = $this->input->post('customer_email');
                                $orderacademic_level = $academic_level;
                                $ordersources        = $this->input->post('sources');
                                $orderclient_paid    = $client_paid;
                                $orderwriterpay      = $writerpay;
                                $orderdeadline       = $deadline;
                                $ordercustomer_name  = $this->input->post('customer_name');
                                
                                // get the email details here and eval so that the codes can be read. 
                                $data['msg']     = $this->Siteconfigs_model->msg_config('new_order_placed');
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
                                
                                //send email to admin to notify of new project
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($admin_email);
                                
                                $this->email->newSubject("Ваш заказ №" .  $max_orderid . 'был успешно размещен');
                                $this->email->message($str1);
                                
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                }
                                
                                
                                // send message to client
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
                                $this->email->to($this->session->userdata('email'));
                                
                                $this->email->newSubject("Ваш заказ №" .  $max_orderid . ' успешно принят');
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


                                $get_writers= $this->Adminusers_model->get_activewriters();

                                foreach ($get_writers as $writers){


                                 $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($writers['email']);
                                
                                $this->email->newSubject("Новый заказ №" . $max_orderid . 'был успешно размещен!');
                                $this->email->message($str3);
                                
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                }

                             }
                                
                                redirect('Adminorders/view_order/' .  $max_orderid);
                                
                        }
                }
                
                else {
                        $this->load->view('templates/header');
                        $this->load->view('login');
                        $this->load->view('templates/footer');
                }
        }
        
               public function newuser_order()
        {
                
                if (!empty($_SERVER['HTTP_REFERER'])) {
                        $url = $_SERVER['HTTP_REFERER'];
                        
                        $url = explode('/', $url);
                        $url = array_filter($url);
                        $url = array_merge($url, array());
                        $url = preg_replace('/\?.*/', '', $url);
                        
                        
                        if (!empty($url[5]) && $url[5] > 0 && $url[3] == 'writers') {
                                $preferred_writer = $url[5];
                                $order_status     = 'Assigned';
                        } else {
                                $preferred_writer = '';
                                $order_status     = 'Openproject';
                        }
                        
                }
                
                if (empty($_SERVER['HTTP_REFERER'])) {
                        
                        $preferred_writer = '';
                        $order_status     = 'Openproject';
                }

                         $data['max_orderid']       = $this->Orders_model->max_orderid();
                       $max_orderid = $data['max_orderid']['orderid']+1;  
                // the order page has been restricted tologged in memebrs only. they have to log in to make an order.. The sessions are stored as writer_id. 
                if ($this->session->userdata('writer_id')) {
                        $this->load->helper('form');
                        $this->load->library('form_validation');
                        $data['subject']           = $this->Orders_model->get_subject();
                        $data['max_orderid']       = $this->Orders_model->max_orderid();
                        // $data['pages'] = $this->Orders_model->get_pages(); we replaced the pages by foreach, php
                        $data['urgency']           = $this->Orders_model->get_urgency();
                        $data['configs']           = $this->Siteconfigs_model->configs();
                        $data['academic_level']    = $this->Siteconfigs_model->academic_level();
                        $data['referencing_style'] = $this->Siteconfigs_model->referencing_style();
                         $data['allclients'] = $this->Adminusers_model->get_clients();
                          $data['writers'] = $this->Adminusers_model->get_activewriters();
                        $data['type_service']      = $this->Siteconfigs_model->type_service();
                        $data['profile']           = $this->User_model->get_profile();
                        $data['title']             = 'Create Order';
                        $data['preferred_writer']  = $preferred_writer;
                        $data['order_status']      = $order_status;
                        $this->form_validation->set_rules('topic', 'topic', 'required');
                        $this->form_validation->set_rules('subject', 'subject', 'required');
                        $this->form_validation->set_rules('words', 'words', 'required');
                        $this->form_validation->set_rules('instructions', 'instructions', '');
                        $this->form_validation->set_rules('customer', 'customer', 'required');
                        $this->form_validation->set_rules('urgency', 'urgency', 'required');
                        $this->form_validation->set_rules('amount', 'amount', '');
                        
                        
                        if ($this->form_validation->run() === FALSE) {
                                $this->load->view('opmaster/template/header', $data);
                                $this->load->view('opmaster/template/admin-sideorders');  
                                $this->load->view('opmaster/orders/admin-addorderclient', $data);          

                                
                        } else {
                                
                                $inputpage            = $this->input->post('words');
                                $data['select_words'] = $this->Siteconfigs_model->select_words(1);
                                $wordsperpage         = $data['select_words']['wordsperpage'];
                                $words                = $wordsperpage * $inputpage;
                                
                                
                                $academic_level         = $this->input->post('academic_level');
                                $data['academic_level'] = $this->Siteconfigs_model->getacademic_level($academic_level);
                                $academic_level         = $data['academic_level']['academic_level'];
                                
                                $urgency         = $this->input->post('urgency');
                                $data['urgency'] = $this->Siteconfigs_model->geturgency($urgency);
                                $urgency         = $data['urgency']['urgency'];
                                $duration        = $data['urgency']['duration'];
                                $time1           = $urgency . " " . $duration;
                                
                                //$this->load->helper('url');    
                                $customer     = $this->input->post('customer');
                                $data['news_item'] = $this->Adminusers_model->get_clients($customer);
                                $customer_email = $data['news_item']['email'];
                                $customer_name = $data['news_item']['firstname'].' '.$data['news_item']['firstname'];



                                $date_posted  = date('Y-m-d H:i:s');
                                $client_paid  = 'paid'; // This is default NO since any incoming orders are not paid yet. Once they make an order is when they can pay for the order. Process->Order made->pay order. 
                                $writerpaid   = 'unpaid';
                                $amount       = $this->input->post('amount');
                                $writeramount = $this->input->post('writeramount');
                                $writerpay1 = $this->input->post('writeramount');



                                if(empty($writerpay1)){
                                $writerpay    = $amount * $writeramount; // This will be controlled by the admin, will create a table for it to store this value.                                         
                                }
                                if(!empty($writerpay1)){
                                $writerpay    = $this->input->post('writerpay1'); // This will be controlled by the admin, will create a table for it to store this value.                                         
                                }
  
                                //$urgency = $this->input->post('urgency');
                                $deadline     = date('Y-m-d H:i:s', strtotime($time1, strtotime($date_posted)));
                                $title        = $this->input->post('topic');
                                $alias        = preg_replace("/[^\w]/", "-", $title);
                                $alias        = str_replace('----', '-', $alias); // Replaces all spaces with hyphens.
                                $alias        = str_replace('---', '-', $alias); // Replaces all spaces with hyphens.
                                $alias        = str_replace('--', '-', $alias); // Replaces all spaces with hyphens.
                                $alias        = $max_orderid.'-'.$alias . '.html'; // Replaces all spaces with hyphens.
                                
                                //making field pick proper values from pvalues
                                $order_period = date('Y') . '' . date('M');
                                if ($order_period) {
                                        $data = array(
                                                'topic' => $this->input->post('topic'),
                                                'customer' => $customer,
                                                'orderid' => $max_orderid,
                                                'subject' => $this->input->post('subject'),
                                                'words' => $words,
                                                'instructions' => $this->input->post('instructions'),
                                                'urgency' => $this->input->post('urgency'),
                                                'amount' => $this->input->post('amount'),
                                                'date_posted' => $date_posted,
                                                'order_status' => $this->input->post('order_status'),
                                                'referencing_style' => $this->input->post('referencing_style'),
                                                'customer_email' => $customer_email,
                                                'academic_level' => $academic_level,
                                                'sources' => $this->input->post('sources'),
                                                'client_paid' => $client_paid,
                                                'writerpaid' => $writerpaid,
                                                'writerpay' => $writerpay,
                                                'deadline' => $deadline,
                                                'order_period' => $order_period,
                                                'project_type' => 'project',
                                                'alias' => $alias,
                                                'preferred_writer' => $this->input->post('preferred_writer'),
                                                'customer_name' => $customer_name
                                                
                                        );
                                        
                                        $this->Orders_model->create_order($data);
                                        
                                }
                                
                  
                                if ($this->input->post('submit') && !empty($_FILES['multipleFiles'])) {
                                        
                                        // count the number of files uploades
                                        $number_of_files = count($_FILES['multipleFiles']['name']);
                                        
                                        //store global files to local variable
                                        
                                        $files        = $_FILES;
                                        $orderfile    = $max_orderid;
                                        $order_period = date('Y') . '' . date('M');
                                        $dif          =  $this->config->item('uploads').'/' . $order_period . '/' . $orderfile;
                                        // make sure the folder exists else create 
                                        if (!is_dir($dif)) {
                                                mkdir($dif, 0777, true);
                                        }
                                        
                                        // upload files one by one
                                        
                                        for ($i = 0; $i < $number_of_files; $i++) {
                                                $_FILES['multipleFiles']['name']     = $files['multipleFiles']['name'][$i];
                                                $_FILES['multipleFiles']['type']     = $files['multipleFiles']['type'][$i];
                                                $_FILES['multipleFiles']['tmp_name'] = $files['multipleFiles']['tmp_name'][$i];
                                                $_FILES['multipleFiles']['error']    = $files['multipleFiles']['error'][$i];
                                                $_FILES['multipleFiles']['size']     = $files['multipleFiles']['size'][$i];

                                $fname         = $files['multipleFiles']['name'][$i];
                                $file_name = pathinfo($fname, PATHINFO_FILENAME);
                                $ext = pathinfo($fname, PATHINFO_EXTENSION);

                                $newfile_name= preg_replace('/[^\w]/', '_', $file_name);
                                                
                                                $config['upload_path']   = $dif;
                                                $config['allowed_types'] = 'pdf|doc|dot|docx|docm|dotx|dotm|docb|xls|xlsx|xlt|xlm|xlsm|xltx|xltm|csv|txt|rtf|htm|html|zip|mp3|mp4|wma|mpg|flv|avi|jpg|jpeg|png|gif|pptx|pptm|ppt|pot|potx|potm|ppam|ppsx|ppsm|sldx|sldm|accdb|accde|accdt|accdr|';
                                                $config['max_size']      = '233232';
                                                $config['max_width']     = '232323';
                                                $config['file_name']    = $newfile_name.'.'.$ext;
                                                $config['max_height']    = '243233';
                                                $config['overwrite']     = TRUE;
                                                $config['remove_spaces'] = TRUE;
                                                
                                                // $this->load-library('upload', $config);
                                                $this->upload->initialize($config);
                                                
                                                if (!$this->upload->do_upload('multipleFiles')) {
                                                        $error = array(
                                                                'error' => $this->upload->display_errors()
                                                        );
                                                } else {
                                                        $data = array(
                                                                'upload_data' => $this->upload->data()
                                                        );
                                                        //  $this->Orders_model->order_files($data);
                                                }
                                                
                                                //print_r($this->upload->data());
                                        }
                                        
                                        
                                        
                                        for ($i = 0; $i < $number_of_files; $i++) {
                                                $fname         = $files['multipleFiles']['name'][$i];
                                                $file_name     = str_replace(' ', '_', $fname);
                                                $uploader_name = $this->session->userdata('firstname');
                                                $this->session->userdata('lastname');

                                                
                                                $orderfile    = $max_orderid;
                                                $order_period = date('Y') . '' . date('M');
                                                //$filename = base_url().''.$dif.'/'.$file_name;// or /var/www/html/file.docx
                                                $filename     = $this->config->item('uploads').'/' . $order_period . '/' . $orderfile . '/' . $file_name; // or /var/www/html/file.docx

                                $fname         = $files['multipleFiles']['name'][$i];
                                $file_name = pathinfo($fname, PATHINFO_FILENAME);
                                $ext = pathinfo($fname, PATHINFO_EXTENSION);

                                $newfile_name= preg_replace('/[^\w]/', '_', $file_name);

                                $dbfile_name  = $newfile_name.'.'.$ext;

                                                $data = array(
                                                        'file_name' => $files['multipleFiles']['name'][$i],
                                                        'file_size' => $files['multipleFiles']['size'][$i],
                                                        'tmp_name' => $dbfile_name,
                                                        'file_type' => $files['multipleFiles']['type'][$i],
                                                        'upload_date' => date('Y-m-d H:i:s'),
                                                        'order_id' => $max_orderid,
                                                        'upload_type' => $this->input->post('upload_type'),
                                                        'alias' => $alias,
                                                      //  'answer_content' => nl2br($content),
                                                        'uploader_name' => $uploader_name,
                                                        'uploaded_by' => $this->session->userdata('writer_id')
                                                        
                                                );
                                                $this->Orders_model->order_files($data);
                                                
                                        }
                                }
                                
                                
                                $siteurl             = base_url();
                                $orderdirectlink     = base_url() . 'order/view/' . $this->input->post('orderid');
                                $ordertopic          = $this->input->post('topic');
                                $orderclient         = $this->session->userdata('writer_id');
                                $orderorderid        = $max_orderid;
                                $ordersubject        = $this->input->post('subject');
                                $orderwords          = $words;
                                $orderinstructions   = $this->input->post('instructions');
                                $orderurgency        = $this->input->post('urgency');
                                $orderamount         = $this->input->post('amount');
                                $orderorder_status   = $this->input->post('order_status');
                                $orderreferencing    = $this->input->post('referencing_style');
                                $ordercustomer_email = $this->input->post('customer_email');
                                $orderacademic_level = $academic_level;
                                $ordersources        = $this->input->post('sources');
                                $orderclient_paid    = $client_paid;
                                $orderwriterpay      = $writerpay;
                                $orderdeadline       = $deadline;
                                $ordercustomer_name  = $this->input->post('customer_name');
                                
                                // get the email details here and eval so that the codes can be read. 
                                $data['msg']     = $this->Siteconfigs_model->msg_config('new_order_placed');
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
                                
                                //send email to admin to notify of new project
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($admin_email);
                                
                                $this->email->newSubject("Новый заказ №" . $max_orderid . ' успешно размещен');
                                $this->email->message($str1);
                                
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                }
                                
                                
                                // send message to client
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
                                $this->email->to($customer_email);
                                
                                $this->email->newSubject("Ваш заказ №" . $max_orderid . 'успешно принят');
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

                                $get_writers= $this->Adminusers_model->get_activewriters();

                                foreach ($get_writers as $writers){


                                 $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($writers['email']);
                                
                                $this->email->newSubject("Новый заказ №" . $max_orderid . ' был успешно размещен!');
                                $this->email->message($str3);
                                
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                }

                                }

                                
                                
                                redirect('Adminorders/view_order/' . $max_orderid);
                                
                        }
                }
                
                else {
                    $this->load->view('templates/header');
                    $this->load->view('login');
                    $this->load->view('templates/footer');
                }
        }
        
        public function iorders() {
            $orders['Title']       = 'Orders';
            $config                = array();
            $config["base_url"]    = base_url() . "opmaster/iorders";
            $config["total_rows"]  = $this->Adminorders_model->record_count();
            // $config["per_page"]    = 20;
            // $config["uri_segment"] = 3;
            // $this->pagination->initialize($config);
            $orders['profile'] = $this->User_model->get_profile();
            // $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $orders["orders"]  = $this->Adminorders_model->fetch_latest_orders();
            // $config["per_page"], $page
            // $orders["links"]   = $this->pagination->create_links();
            $this->load->view('opmaster/template/header', $orders);
            $this->load->view('opmaster/template/admin-sideorders');   
            $this->load->view('opmaster/orders/admin-allorders');
        }

        public function superAdmin() {
            $writers['Title']   = 'All Writers';
            $config                = array();
            $config["base_url"]    = base_url() . "Adminorders/superAdmin";
            $config["total_rows"]  = $this->Adminusers_model->count_allwriters();
            // $config["per_page"]    = 20;
            // $config["uri_segment"] = 3;
            
            $this->pagination->initialize($config);
            $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $writers["writers"] = $this->Adminusers_model->all_managers();
            //$config["per_page"], $page
            $writers["links"]   = $this->pagination->create_links();
            
            $this->load->view('opmaster/template/header', $writers);
            $this->load->view('opmaster/template/admin-sidewriters'); 
            $this->load->view('opmaster/orders/admin-superadmin');
        }

        // ============


        public function assigned_orders() {
            $orders['Title']    = 'Unassigned Orders';
            $config                = array();
            $config["base_url"]    = base_url() . "Adminorders/assigned_orders";
            $config["total_rows"]  = $this->Adminorders_model->count_assignedorders();
            // $config["per_page"]    = 20;
            // $config["uri_segment"] = 3;
            // $this->pagination->initialize($config);
            $orders['profile'] = $this->User_model->get_profile();
            // $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $orders["orders"] = $this->Adminorders_model->assigned_orders();
            // $config["per_page"], $page
            // $orders["links"]   = $this->pagination->create_links();
            $this->load->view('opmaster/template/header', $orders);
            $this->load->view('opmaster/template/admin-sideorders');   
            $this->load->view('opmaster/orders/admin-navupolnenii');
        }  



        // public function unassigned_orders()
        // {
        //     $orders['Title']    = 'Unassigned Orders';
        //     $config                = array();
        //     $config["base_url"]    = base_url() . "Adminorders/unassigned_orders";
        //     $config["total_rows"]  = $this->Adminorders_model->count_unassignedorders();
        //     // $config["per_page"]    = 20;
        //     // $config["uri_segment"] = 3;
            
        //     // $this->pagination->initialize($config);
        //     $orders['profile'] = $this->User_model->get_profile();
        //     // $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //     $orders["orders"] = $this->Adminorders_model->unassigned_orders();
        //     //$config["per_page"], $page
        //     // $orders["links"]   = $this->pagination->create_links();
            
        //     $this->load->view('opmaster/template/header', $orders);
        //     $this->load->view('opmaster/template/admin-sideorders');   
        //     $this->load->view('opmaster/orders/unassigned_orders');
        // }    
               
        // public function unpaid_orders() {
        //     $orders['Title']    = 'Unassigned Orders';
        //     $config                = array();
        //     $config["base_url"]    = base_url() . "Adminorders/unpaid_orders";
        //     $config["total_rows"]  = $this->Adminorders_model->count_unpaidorders();
        //     // $config["per_page"]    = 20;
        //     // $config["uri_segment"] = 3;
            
        //     // $this->pagination->initialize($config);
        //     $orders['profile'] = $this->User_model->get_profile();
        //     // $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //     $orders["orders"] = $this->Adminorders_model->unpaid_orders();
        //     //$config["per_page"], $page
        //     // $orders["links"]   = $this->pagination->create_links();
        //     $this->load->view('opmaster/template/header', $orders);
        //     $this->load->view('opmaster/template/admin-sideorders');   
        //     $this->load->view('opmaster/orders/unpaid_orders');
        // }    


        // public function paid_orders() {
        //     $orders['Title']    = 'Paid Orders';
        //     $config                = array();
        //     $config["base_url"]    = base_url() . "Adminorders/paid_orders";
        //     $config["total_rows"]  = $this->Adminorders_model->count_paidorders();
        //     // $config["per_page"]    = 20;
        //     // $config["uri_segment"] = 3;
            
        //     // $this->pagination->initialize($config);
        //     $orders['profile'] = $this->User_model->get_profile();
        //     // $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //     $orders["orders"] = $this->Adminorders_model->paid_orders(); 
        //     //$config["per_page"], $page
        //     // $orders["links"]   = $this->pagination->create_links();
            
        //     $this->load->view('opmaster/template/header', $orders);
        //     $this->load->view('opmaster/template/admin-sideorders');   
        //     $this->load->view('opmaster/orders/paid_orders');
        // }  



        public function pending_orders() {
            $orders['Title']       = 'Pending Orders';
            $config                = array();
            $config["base_url"]    = base_url() . "Adminorders/pending_orders";
            $config["total_rows"]  = $this->Adminorders_model->count_pendingorders();
            // $config["per_page"]    = 20;
            // $config["uri_segment"] = 3;
            
            // $this->pagination->initialize($config);
            $orders['profile'] = $this->User_model->get_profile();
            // $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $orders["orders"] = $this->Adminorders_model->pending_orders();
            //$config["per_page"], $page
            // $orders["links"]   = $this->pagination->create_links();
            
            $this->load->view('opmaster/template/header', $orders);
            $this->load->view('opmaster/template/admin-sideorders');   
            $this->load->view('opmaster/orders/admin-naoplatu');
        }
        
        public function revision_orders() {
            $orders['Title']    = 'Pending Orders';
            $config                = array();
            $config["base_url"]    = base_url() . "Adminorders/revision_orders";
            $config["total_rows"]  = $this->Adminorders_model->count_revisionorders();
            // $config["per_page"]    = 20;
            // $config["uri_segment"] = 3;
            
            // $this->pagination->initialize($config);
            $orders['profile'] = $this->User_model->get_profile();
            // $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $orders["orders"] = $this->Adminorders_model->revision_orders();//$config["per_page"], $page
            // $orders["links"]   = $this->pagination->create_links();
            
            $this->load->view('opmaster/template/header', $orders);
            $this->load->view('opmaster/template/admin-sideorders');   
            $this->load->view('opmaster/orders/revision_orders');
        }        

        public function completed_orders() {
            $orders['Title']    = 'Pending Orders';
            $config                = array();
            $config["base_url"]    = base_url() . "Adminorders/completed_orders";
            $config["total_rows"]  = $this->Adminorders_model->count_completedorders();
            // $config["per_page"]    = 20;
            // $config["uri_segment"] = 3;
            
            // $this->pagination->initialize($config);
            $orders['profile'] = $this->User_model->get_profile();
            // $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $orders["orders"] = $this->Adminorders_model->completed_orders();//$config["per_page"], $page
            // $orders["links"]   = $this->pagination->create_links();
            
            $this->load->view('opmaster/template/header', $orders);
            $this->load->view('opmaster/template/admin-sideorders');   
            $this->load->view('opmaster/orders/completed_orders');
        }


        public function archived_orders() {
            $orders['Title']    = 'Pending Orders';
            $config                = array();
            $config["base_url"]    = base_url() . "Adminorders/archived_orders";
            $config["total_rows"]  = $this->Adminorders_model->count_completedorders();
            // $config["per_page"]    = 20;
            // $config["uri_segment"] = 3;
            // $this->pagination->initialize($config);
            $orders['profile'] = $this->User_model->get_profile();
            // $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $orders["orders"] = $this->Adminorders_model->archived_orders(); //$config["per_page"], $page
            // $orders["links"]   = $this->pagination->create_links();
            $this->load->view('opmaster/template/header', $orders);
            $this->load->view('opmaster/template/admin-sideorders');   
            $this->load->view('opmaster/orders/archived_orders');
        }



        public function cancelled_orders() {
            $orders['Title']    = 'Pending Orders';
            $config = array();
            $config["base_url"]    = base_url() . "Adminorders/cancelled_orders";
            $config["total_rows"]  = $this->Adminorders_model->count_cancelledorders();
            // $config["per_page"]    = 20;
            // $config["uri_segment"] = 3;
            // $this->pagination->initialize($config);
            $orders['profile'] = $this->User_model->get_profile();
            // $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $orders["orders"] = $this->Adminorders_model->cancelled_orders();
            //$config["per_page"], $page
            // $orders["links"]   = $this->pagination->create_links();
            $this->load->view('opmaster/template/header', $orders);
            $this->load->view('opmaster/template/admin-sideorders');   
            $this->load->view('opmaster/orders/half_work');
        }

        public function order_requests() {
            $orders['Title']    = 'Pending Orders';
            $config                = array();
            $config["base_url"]    = base_url() . "Adminorders/order_requests";
            $config["total_rows"]  = $this->Adminorders_model->count_orderrequests();
            // $config["per_page"]    = 20;
            // $config["uri_segment"] = 3;
            // $this->pagination->initialize($config);
            $orders['profile'] = $this->User_model->get_profile();
            // $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $orders["orders"] = $this->Adminorders_model->order_requests();
            //$config["per_page"], $page
            // $orders["links"]   = $this->pagination->create_links();
            $this->load->view('opmaster/template/header', $orders);
            $this->load->view('opmaster/template/admin-sideorders');   
            $this->load->view('opmaster/orders/admin-orderbids');
        }

        
        public function view_order($orderid = NULL) {
            $data['data']        = $this->Adminorders_model->get_requests($orderid);
            $data['upload']         = $this->config->item('uploads');
            $data['news_item']   = $this->Adminorders_model->get_orders($orderid);
            $data['orderid']          = $data['news_item']['orderid'];
            // $data['writer_email']   = $this->Siteconfigs_model->get_writer_email_new($data['orderid']);
            $data['country']     = $this->students_model->get_country();
            $data['subject']     = $this->students_model->get_subject($orderid);
            // $data['writer_email'] = $this->Adminorders_model->get_requests()
            //$data['writers']     = $this->students_model->get_writers();
            $data['order_files'] = $this->Adminorders_model->get_file_materials($orderid);
            $data['order_files_check'] = $this->Adminorders_model->get_file_check($orderid);
            $data['order_matsec'] = $this->Adminorders_model->get_matsec($orderid);
            $data['order_plan'] = $this->Adminorders_model->get_planfiles($orderid);
            $data['order_fessay'] = $this->Adminorders_model->get_file_essay($orderid);
            $data['order_unic'] = $this->Adminorders_model->get_unic($orderid);
            $orders['num_order_files'] = count($data['order_files']);

            $data['messages']     = $this->Messages_model->get_messages($orderid);
            $data['mes_man_client']     = $this->Messages_model->get_mes_cl_wr($orderid, 999999, 'avtor');
            $data['mes_man_avtor']      = $this->Messages_model->get_mes_cl_wr($orderid, 999999, 'zakaz');
            
            $data['topic']            = $data['news_item']['topic'];
            $data['words']            = $data['news_item']['words'];
            $data['urgency']          = $data['news_item']['urgency'];
            $data['amount']           = $data['news_item']['amount'];
            $data['writerpay']        = $data['news_item']['writerpay'];
            $data['instructions']     = $data['news_item']['instructions'];
            $data['typeofservice']    = $data['news_item']['typeofservice'];
            $data['academic_level']    = $data['news_item']['academic_level'];
            $data['order_status']     = $data['news_item']['order_status'];
            $data['date_posted']      = $data['news_item']['date_posted'];
            $data['subject']          = $data['news_item']['subject'];
            $data['sources']          = $data['news_item']['sources'];
            $data['customer_email']   = $data['news_item']['customer_email'];
            $data['deadline_writers']   = $data['news_item']['deadline_writers'];
            $data['deadline']         = $data['news_item']['deadline'];
            $data['preferred_writer'] = $data['news_item']['preferred_writer'];
            $data['order_period']     = $data['news_item']['order_period'];
            $data['writer_name']      = $data['news_item']['writer_name'];
            $data['referencing_style']      = $data['news_item']['referencing_style'];
            $data['customer']         = $data['news_item']['customer'];
            $data['customer_email']   = $data['news_item']['customer_email'];
            $data['order_rating']   = $data['news_item']['order_rating'];
            $data['customer_name']    = $data['news_item']['customer_name'];
            $data['client_paid']      = $data['news_item']['client_paid'];
            $data['alias']            = $data['news_item']['alias'];
            $data['trackingid']            = $data['news_item']['trackingid'];
            $data['pages']            = $data['words'] / 275;
            $data['plan']            = $data['news_item']['plan'];
            $data['half_work']            = $data['news_item']['half_work'];
            $data['all_work']            = $data['news_item']['all_work'];
            $data['yesno']              = $data['news_item']['yesno'];
            $data['manager_id']              = $data['news_item']['manager_id'];
            $data['oplata']    =$data['news_item']['oplata'];
            $data['avans']    =$data['news_item']['avans'];
            $data['fine']    =$data['news_item']['fine'];
            $data['doplata']    =$data['news_item']['doplata'];
            $data['doplata_status']    =$data['news_item']['doplata_status'];
            $data['avtorDoplata']    =$data['news_item']['avtor_doplata'];
            $data['dorabotka']    =$data['news_item']['dorabotka'];
            $data['data_oplatu']    =$data['news_item']['data_oplatu'];
            $data['order_rating'] = $this->Messages_model->get_ratings($orderid);
            $data['writers']  = $this->Adminusers_model->get_activewriters();
            $orders['orders'] = $this->Adminorders_model->get_requests($orderid);
            $this->load->view('opmaster/template/header', $data);
            $this->load->view('opmaster/template/admin-sideorders');
            $this->load->view('opmaster/orders/admin-vieworder');
        }
        
        public function delete_order($orderid = NULL) {
            $this->form_validation->set_rules('orderid', 'orderid', 'required');
            if ($this->form_validation->run() === TRUE) {
                $red_url = parse_url($_SERVER['HTTP_REFERER'])['scheme'].'://'.parse_url($_SERVER['HTTP_REFERER'])['host'].parse_url($_SERVER['HTTP_REFERER'])['path'];

                $order_id          = $this->input->post('orderid');
                $tmp_name          = $this->input->post('tmp_name');
                $path = $this->input->post('path');
                $data = array(
                    'order_id' => $this->input->post('order_id'),      
                );
                $this->Ordersed_model->delete_request($orderid);
                $this->Ordersed_model->delete_order_files($order_id);
                $this->Ordersed_model->delete_order($order_id);
                $this->Ordersed_model->delete_order_messages($order_id);
                if (is_dir($path)){
                 $path = $this->input->post('path');
                    $this->load->helper("file"); // load the helper
                    delete_files($path, true); // delete all files/folders
                    rmdir($path);                    
                }
                
                    if($red_url  === ci_site_url().'Adminorders/archived_orders'){
                        redirect($red_url);
                    } else {
                        redirect('Adminorders/iorders');
                    }


            } else {
                echo "<div class='error'>" . validation_errors() . "</div>";
            }
        }

        public function delete_file() {
         $this->form_validation->set_rules('orderid', 'orderid', 'required');
            if ($this->form_validation->run() === TRUE) {
                $order_id          = $this->input->post('orderid');
                $tmp_name          = $this->input->post('tmp_name');
                $path = $this->input->post('path');
                $this->Ordersed_model->delete_file($order_id, $tmp_name);
                if (file_exists($path)){
                    $path = $this->input->post('path');
                    unlink($path);                    
                }
                redirect('Adminorders/view_order/'.$order_id);
            } else {
                echo "<div class='error'>" . validation_errors() . "</div>";
            }
        }

        public function subm_download() {
            $file_id = $this->input->post('file_id');
            $order_id = $this->input->post('orderid');
            $order_part = $this->input->post('order_part');
            $this->Ordersed_model->subm_download($file_id, 'true');

            $customer_email =  $this->input->post('customer_email');
            $filename = $this->input->post('file_name');

            // email sending start
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
                $this->email->from($smtp_user, $smtp_name);
                $this->email->to($customer_email);

            if($order_part === 'full'){
                $data['msg']     = $this->Siteconfigs_model->msg_config('message_order_complete');
                $msg_body_client = $data['msg']['msg_body_client'];
                $msg_body_client = str_replace('"', "'", $msg_body_client);
                eval("\$fullCl = \"$msg_body_client\";");
                $this->email->newSubject("Работа по вашему заказу №" . $order_id . " завершена");
                $this->email->message($fullCl);
                if(!empty($this->input->post('customer_email'))){$this->email->send();}

            } elseif($order_part === 'plan'){
                $data['msg']     = $this->Siteconfigs_model->msg_config('message_plan');
                $msg_body_client = $data['msg']['msg_body_client'];
                $msg_body_client = str_replace('"', "'", $msg_body_client);
                eval("\$plCl = \"$msg_body_client\";");
                $this->email->newSubject("Утверждение плана по заказу номер №" . $order_id);
                $this->email->message($plCl);
                if(!empty($this->input->post('customer_email'))){$this->email->send();}  
            }  elseif($order_part === 'matsec'){
                $data['msg']     = $this->Siteconfigs_model->msg_config('order_status_changed');
                $msg_body_client = $data['msg']['msg_body_client'];
                $msg_body_client = str_replace('"', "'", $msg_body_client);
                eval("\$halfCl = \"$msg_body_client\";");
                $this->email->newSubject("Половина работы по заказу №" . $order_id);
                $this->email->message($halfCl);
                if(!empty($this->input->post('customer_email'))){$this->email->send();}    
            }  elseif($order_part === 'unic'){
                $data['msg']     = $this->Siteconfigs_model->msg_config('file_uploaded');
                $msg_body_client = $data['msg']['msg_body_client'];
                $this->email->newSubject("Новый файл, загруженный для заказа №" . $this->input->post('orderid'). ' ['. $filename . ' ]');
                $this->email->message($msg_body_client);
                $this->email->send();
            }

            redirect('Adminorders/view_order/'.$order_id);
        }

        public function unsubm_download() {
            $file_id = $this->input->post('file_id');
            $order_id = $this->input->post('orderid');
            $this->Ordersed_model->subm_download($file_id, 'false');
            redirect('Adminorders/view_order/'.$order_id);
        }

        public function orderadminedit($orderid = NULL) {
            //$this->form_validation->set_rules('subject', 'subject', 'required');
            $this->form_validation->set_rules('topic', 'topic', 'required');
           // $this->form_validation->set_rules('words', 'words', 'required');
            $this->form_validation->set_rules('instructions', 'instructions', '');
            $this->form_validation->set_rules('amount', 'amount', '');
            if ($this->form_validation->run() === TRUE) {
                    $orderid       = $this->input->post('orderid');
                    $writer_status = $this->input->post('writer_status');
                    $data = array(
                        'subject' => $this->input->post('subject'),
                        'topic' => $this->input->post('topic'),
                        'words' => $this->input->post('words'),
                        'instructions' => $this->input->post('instructions'),
                        'urgency' => $this->input->post('urgency_ch'),
                        'amount' => $this->input->post('amount')
                    );
                    $this->Ordersed_model->order_update($orderid, $data);
                    redirect('Adminorders/view_order/'.$orderid );
            } else {
                echo "<div class='error'>" . validation_errors() . "</div>";
            }
        }


        public function delete_order_rating($id = NULL){
           $this->form_validation->set_rules('id', 'id', 'required');
            if($this->form_validation->run() === TRUE){
                   $this->Messages_model->delete_order_rating($id);
                redirect('Adminorders/view_order/'.$this->input->post('orderid'));
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }


    public function order_rating_admin() {
        $this->form_validation->set_rules('orderid', 'orderid', 'required');
        if ($this->form_validation->run() === TRUE) {
            $date        = date('Y/m/d H:i:s');
            $date_posted = date('Y/m/d H:i:s');
            
            $data = array(
                'orderid' => $this->input->post('orderid'),
                'clientid' => $this->input->post('clientid'),
                'date' => $date_posted,
                'customer_name' => $this->input->post('customer_name'),
                'rating' => $this->input->post('rating'),
                'comment' => $this->input->post('comment'),
                'amount' => $this->input->post('amount'),
                'topic' => $this->input->post('topic'),
                'writerid' => $this->input->post('writerid'),
                'subject' => $this->input->post('subject')
            );
            
            $this->Messages_model->order_rating($data);
            redirect('Adminorders/view_order/'.$this->input->post('orderid'));
                
        } else {
            echo "<div class='error'>" . validation_errors() . "</div>";
        }
    }


// Дедлайны 
        public function sendLine($orderid = NULL) {
            $orderid  = $this->input->post('orderid');
            $work1 = $this->input->post('work1');
            $work2 = $this->input->post('work2');
            $work3 = $this->input->post('work3');
            $plan = $this->input->post('work4');
            $preferred_writer = $this->input->post('preferred_writer');
            $pref_writer_email = $this->Siteconfigs_model->get_writer_email_new($preferred_writer);
            $dorabotka = $this->input->post('dorabotka');
            $data_oplatu = $this->input->post('data_oplatu');
            $writer_name =  $this->input->post('writer_name');
            $client_name =  $this->input->post('clientName');

            $wrMesPlanReady = 'true';

            if($plan === 'true'){
                $wrMesPlanReady = 'false';
            }

            $data = array(
                    'plan' => $this->input->post('work1'),
                    'half_work' => $this->input->post('work2'),
                    'all_work' => $this->input->post('work3'),
                    'yesno' => $this->input->post('work4'),
                    'dorabotka' => $this->input->post('dorabotka'),
                    'data_oplatu' => $this->input->post('data_oplatu'),
                    'wr_view_plan' => $wrMesPlanReady
            );
            
            $this->Ordersed_model->order_update($orderid, $data);

            // get the email details here and eval so that the codes can be read. 
            $data['msg']     = $this->Siteconfigs_model->msg_config('message_plan');
            // $msg_body_admin  = $data['msg']['msg_body_admin'];
            // $msg_body_client = $data['msg']['msg_body_client'];
            $msg_body_writer = $data['msg']['msg_body_writer'];
            
            //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
            // $msg_body_admin  = str_replace('"', "'", $msg_body_admin);
            // $msg_body_client = str_replace('"', "'", $msg_body_client);
            $msg_body_writer = str_replace('"', "'", $msg_body_writer);
            
            // This evals so that the variables in the codes are read
            // eval("\$str1 = \"$msg_body_admin\";");
            //echo $str1; 
            
            
            // This evals so that the variables in the codes are read
            // eval("\$str2 = \"$msg_body_client\";");
            //echo $str2; 

            // This evals so that the variables in the codes are read
            eval("\$str3 = \"$msg_body_writer\";");
            //echo $str3; 

     //        if($plan === 'various'){              
     //        $useremail   =  $this->input->post('clientEmail');
     //        //send email to client
     // $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('custemail'));
     //        $smtp_port               = $configs['smtp_configs']['smtp_port'];
     //        $smtp_host               = $configs['smtp_configs']['smtp_host'];
     //        $smtp_user               = $configs['smtp_configs']['smtp_user'];
     //        $smtp_name               = $configs['smtp_configs']['smtp_name'];
     //        $smtp_pass               = $configs['smtp_configs']['smtp_pass'];
     //        $admin_email             = $configs['smtp_configs']['admin_email'];
     //        $protocol                = $configs['smtp_configs']['protocol'];
     //        $config                  = Array(
     //                'protocol' => $protocol,
     //                'smtp_host' => $smtp_host,
     //                'smtp_port' => $smtp_port,
     //                'smtp_user' => $smtp_user,
     //                'smtp_pass' => $smtp_pass,
     //                'mailtype' => 'html'
     //        );

            
     //        $this->load->library('email', $config);
     //        $this->email->set_newline("\r\n");

     //        $this->email->from($smtp_user, $smtp_name);
     //        $this->email->to($useremail);

     //        $this->email->newSubject("Утверждение плана по заказу номер #" . $orderid);
     //        $this->email->message($str1);
     //        if(!empty($useremail)){
     //            if ($this->email->send()) {
     //                    //Success email Sent
     //                    //echo $this->email->print_debugger();
     //            } else {
     //                    //Email Failed To Send
     //                    // echo $this->email->print_debugger();
     //            }
     //        }      

     //        } else

            if($plan === 'true') {  // writer email plan
            $useremail   =  $pref_writer_email;

            //send email to writer
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
            $this->email->to($useremail);

            $this->email->newSubject("Утверждение плана по заказу номер №" . $orderid);
            $this->email->message($str3);
            if(!empty($useremail)){
                if ($this->email->send()) {
                        //Success email Sent
                        //echo $this->email->print_debugger();
                } else {
                        //Email Failed To Send
                        // echo $this->email->print_debugger();
                }
            }

            }

            redirect('Adminorders/view_order/' . $this->input->post('orderid'));
    }            

// oplata doplata
    public function sendOplata($orderid = NULL) {
        $orderid     = $this->input->post('orderid');
        $clientName  = $this->input->post('clienName');
        $clienEmail  = $this->input->post('clienEmail');
        $writer_email = '';
        $writer_name  = '';
        $wr_id       = $this->input->post('preferred_writer');
        if($wr_id != '0'){
           $writer_email = $this->Siteconfigs_model->get_writer_email_new($wr_id);
           $writer_name  = implode(" ", $this->Siteconfigs_model->get_writer_name_new($wr_id));
        }
        $oplata      = $this->input->post('oplata'); 
        $avans       = $this->input->post('avans');
        $fine        = $this->input->post('fine');
        $doplata     = $this->input->post('doplata');
        $order_price_info   =  $this->Siteconfigs_model->get_order_price_fine($orderid);
        // $prevStatusTemp = $this->Siteconfigs_model->get_order_price_fine($orderid);
        $prevStatus = $order_price_info['fine_wr_message'];
        $oldOplata = $order_price_info['oplata'];
        $oldFine = $order_price_info['fine'];
        $fineWrMes = 'true';
        $avtor_doplata = $this->input->post('avtorDoplata');

        if($prevStatus != 'false' && $fine != $oldFine){
            $fineWrMes = 'false';
        } elseif($prevStatus != 'false' && $fine === $oldFine){
            $fineWrMes = 'true';
        } elseif ($prevStatus === 'false') {
            $fineWrMes = 'false';
        }

        $doplata_status = '';
        $oldDolata = $order_price_info['doplata'];
        $oldDoplStatus = $order_price_info['doplata_status'];
        
        if($doplata != $oldDolata || $oldDoplStatus === 'false'){
            $doplata_status = 'false';
        }

        if($doplata === '0' || $doplata === ''){
            $doplata_status = 'true';     
        }

        $data = array(
            'oplata' => $this->input->post('oplata'),
            'avans' => $this->input->post('avans'),
            'fine' => $this->input->post('fine'),
            'doplata' => $this->input->post('doplata'),
            'fine_wr_message' => $fineWrMes,
            'avtor_doplata' => $avtor_doplata,
            'doplata_status'=> $doplata_status,
            'writerpay' => $this->input->post('writerpay') 
        );

        $this->Ordersed_model->oplata_update($orderid, $data);
         
        // get the email details here and eval so that the codes can be read. 
        $data['msg']     = $this->Siteconfigs_model->msg_config('message_oplata');
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
        //echo $str2; 
                    
//send email to client
        if($oplata != ''){  
            if($oplata != $oldOplata){ 
                 $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('custemail'));
                        $smtp_port    = $configs['smtp_configs']['smtp_port'];
                        $smtp_host    = $configs['smtp_configs']['smtp_host'];
                        $smtp_user    = $configs['smtp_configs']['smtp_user'];
                        $smtp_name    = $configs['smtp_configs']['smtp_name'];
                        $smtp_pass    = $configs['smtp_configs']['smtp_pass'];
                        $admin_email  = $configs['smtp_configs']['admin_email'];
                        $protocol     = $configs['smtp_configs']['protocol'];
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
                        // print_r($smtp_user);
                        $this->email->from($smtp_user, $smtp_name);
                        $this->email->to($clienEmail);

                        $this->email->charset = 'UTF-8';
                        $this->email->newSubject("Утверждена цена на заказ номер №" . $orderid);
                        $this->email->message($str2);
                        if(!empty($clienEmail)){
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
                //send email to writer (fine)
                if($fine != '' && (isset($wr_id) || $wr_id != '0')){  
                    if($fine != $oldFine){ 
                         $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('custemail'));
                                $smtp_port = $configs['smtp_configs']['smtp_port'];
                                $smtp_host = $configs['smtp_configs']['smtp_host'];
                                $smtp_user = $configs['smtp_configs']['smtp_user'];
                                $smtp_name = $configs['smtp_configs']['smtp_name'];
                                $smtp_pass = $configs['smtp_configs']['smtp_pass'];
                                $admin_email = $configs['smtp_configs']['admin_email'];
                                $protocol = $configs['smtp_configs']['protocol'];
                                $config = Array(
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
                                $this->email->to($writer_email);

                                $this->email->charset = 'UTF-8';
                                $this->email->newSubject("По заказу №" . $orderid . ' начислен штраф');
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
                       }     
                }
                redirect('Adminorders/view_order/'.$this->input->post('orderid'));
    }

        public function manager_fine() {
            $writer_id = $this->input->post('manager_id');
            $manager_fine = $this->input->post('manager_fine');

            $data = array(
                    'manager_fine' => $manager_fine
            );

            $this->Ordersed_model->manager_fine($writer_id, $data);
            redirect('Adminorders/superAdmin');
        }


    public function change_writer_level(){
            $writer_id = $this->input->post('writer_id');
            $writer_level = $this->input->post('writer_level');
            if($writer_level === 'client'){
                $data = array(
                    'user_level' => $writer_level,
                    'writer_level' => 'writer',
                    'subject'   => '',
                    'nativelanguage' => '',
                 );
            } else {
               $data = array(
                        'user_level'   => 'writer',
                        'writer_level' => $writer_level,
                        'subject'   => ''
                );
            }
            $this->Ordersed_model->writer_level_change($writer_id, $data);
            // redirect('Adminwriters/writers');
        }

        // 


public function changepay($orderid = NULL) {
    $this->form_validation->set_rules('client_paid', 'client_paid', 'required');
    if ($this->form_validation->run() === TRUE) {
            $orderid     = $this->input->post('orderid');
            $client_paid = $this->input->post('client_paid');
            $from = $this->input->post('from');
            $changepayWrMes = '';

            if($client_paid === 'paid_writer' || $client_paid === 'paid'){
                $changepayWrMes = 'false';
            }
            $data = array(
                    'client_paid' => $this->input->post('client_paid'),
                    'paid_writer_mes' => $changepayWrMes
            );
            
            $this->Ordersed_model->order_update($orderid, $data);
           // echo "You have successfully marked order " . $client_paid;
            
            
            // define the varibales to be passed in the email.                    
            $useremail        = $this->input->post('customer_email');
            $orderclient_paid = $this->input->post('client_paid');
            $orderid          = $this->input->post('orderid');
            $wr_id = $this->input->post('preferred_writer');
            $writer_email     = '';
            $writer_name      = '';
            $old_paid = $this->input->post('old_paid');
            if($wr_id){
                $writer_email = $this->Siteconfigs_model->get_writer_email_new($wr_id);
                // $writer_name = implode(" ", $this->Siteconfigs_model->get_writer_name_new($wr_id));
            } 

            $data['msg']     = $this->Siteconfigs_model->msg_config('order_marked_aspaid');

            $msg_body_admin  = $data['msg']['msg_body_admin'];
            $msg_body_admin  = str_replace('"', "'", $msg_body_admin);
            eval("\$str1 = \"$msg_body_admin\";");

            if( 
                ($client_paid == 'half' && $old_paid != 'half') || 
                ($client_paid == 'paid_client' && $old_paid != 'paid_client' && $old_paid != 'paid' ) || 
                ($client_paid == 'paid' && $old_paid != 'paid_client' && $old_paid != 'paid')
            ) {  
                $cp = '';
                if($client_paid === 'half'){
                    $cp = 'половины работы';
                }  else {
                    $cp = 'всей работы';
                }
                $msg_body_client = $data['msg']['msg_body_client'];
                $msg_body_client = str_replace('"', "'", $msg_body_client);
                eval("\$str2 = \"$msg_body_client\";");
            }

            if($wr_id){
            if( ($client_paid === 'paid_writer' && $old_paid != 'paid_writer' && $old_paid != 'paid') ||($client_paid === 'paid' && $old_paid != 'paid_writer' && $old_paid != 'paid')) {
                    $msg_body_writer = $data['msg']['msg_body_writer'];
                    $msg_body_writer = str_replace('"', "'", $msg_body_writer);
                    eval("\$str3 = \"$msg_body_writer\";");
                }
           }

            // if(1){
            //Админу                       
                $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('custemail'));
                $smtp_port = $configs['smtp_configs']['smtp_port'];
                $smtp_host = $configs['smtp_configs']['smtp_host'];
                $smtp_user = $configs['smtp_configs']['smtp_user'];
                $smtp_name = $configs['smtp_configs']['smtp_name'];
                $smtp_pass = $configs['smtp_configs']['smtp_pass'];
                $admin_email = $configs['smtp_configs']['admin_email'];
                $protocol = $configs['smtp_configs']['protocol'];
                $config = Array(
                        'protocol' => $protocol,
                        'smtp_host' => $smtp_host,
                        'smtp_port' => $smtp_port,
                        'smtp_user' => $smtp_user,
                        'smtp_pass' => $smtp_pass,
                        'mailtype' => 'html'
                );
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                //send email to admin to notify
                $user_email = $this->session->userdata('email');
                $this->email->from($smtp_user, $smtp_name);
                $this->email->to($admin_email);
                
                $this->email->newSubject("Заказ №" . $this->input->post('orderid') . ' отмечен как ' . $orderclient_paid);
                $this->email->message($str1);
                if(!empty($admin_email)){
                    if ($this->email->send()) {
                            //Success email Sent
                            // echo $this->email->print_debugger();
                    } else {
                            //Email Failed To Send
                            // echo $this->email->print_debugger();
                    }
                }
            //Админу

            // Заказчику
            if( 
                ($client_paid == 'half' && $old_paid != 'half') || 
                ($client_paid == 'paid_client' && $old_paid != 'paid_client' && $old_paid != 'paid' ) || 
                ($client_paid == 'paid' && $old_paid != 'paid_client' && $old_paid != 'paid')
            ) {   
              
  

             $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('custemail'));
                    $smtp_port = $configs['smtp_configs']['smtp_port'];
                    $smtp_host = $configs['smtp_configs']['smtp_host'];
                    $smtp_user = $configs['smtp_configs']['smtp_user'];
                    $smtp_name = $configs['smtp_configs']['smtp_name'];
                    $smtp_pass = $configs['smtp_configs']['smtp_pass'];
                    $admin_email = $configs['smtp_configs']['admin_email'];
                    $protocol = $configs['smtp_configs']['protocol'];
                    $config = Array(
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
                    $this->email->to($useremail);
                    
                    $this->email->newSubject("Спасибо за оплату. Заказ №".$orderid);
                    $this->email->message($str2);
                    if(!empty($useremail)){
                        if ($this->email->send()) {
                                //Success email Sent
                                //echo $this->email->print_debugger();
                        } else {
                                //Email Failed To Send
                                // echo $this->email->print_debugger();
                        }
                    }    
            } 
            // Заказчику


            //Автору
            if($wr_id){      

                // if($client_paid == 'paid_writer' || $client_paid == 'paid'){
                if( 
                    ($client_paid === 'paid_writer' && $old_paid != 'paid_writer' && $old_paid != 'paid') ||
                    ($client_paid === 'paid' && $old_paid != 'paid_writer' && $old_paid != 'paid')
                     ) {
                 $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('custemail'));
                        $smtp_port = $configs['smtp_configs']['smtp_port'];
                        $smtp_host = $configs['smtp_configs']['smtp_host'];
                        $smtp_user = $configs['smtp_configs']['smtp_user'];
                        $smtp_name = $configs['smtp_configs']['smtp_name'];
                        $smtp_pass = $configs['smtp_configs']['smtp_pass'];
                        $admin_email = $configs['smtp_configs']['admin_email'];
                        $protocol = $configs['smtp_configs']['protocol'];
                        $config = Array(
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
                        $this->email->to($writer_email);
                        
                        $this->email->newSubject("Вам был оплачен заказ  №" . $orderid);
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
                    }   

                }
                //Автору

                    
            if($from === 'orderPage'){
                    redirect('Adminorders/view_order/' . $this->input->post('orderid'));
                } else{
                    redirect('Adminorders/pending_orders');
                }
                    
            } else {
                    echo "<div class='error'>" . validation_errors() . "</div>";
            }
 }

public function changestatus($orderid = NULL)
        {
                $this->form_validation->set_rules('order_status', 'order_status', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $orderid      = $this->input->post('orderid');
                        $order_status = $this->input->post('order_status');
                        $wr_viev_rev = '';
                        $wr_acc_ord = '';
                        // $oldStatus = $this->input->post('oldStatus');
                        $order_st = $this->input->post('order_status');

                        // if($oldStatus === 'Revision'){
                        //     $order_st = 'onlyAvtorDoplata';
                        // } else {
                        //     $order_st = $this->input->post('order_status');
                        // }
                        
                        if($order_status === 'Revision'){
                            $wr_viev_rev = 'false';
                            $wr_acc_ord = 'false';
                        }
                        $data = array(
                                'order_status' => $order_st,
                                'wr_view_rev'  => $wr_viev_rev,
                                'writer_accept_order' => $wr_acc_ord
                        );
                        $from = $this->input->post('from');
                        $this->Ordersed_model->order_update($orderid, $data);
                        if($order_status === 'Revision'){
                            $this->Orders_model->mngrNewNotice('mngr_wait_accept', $orderid, 1);
                        }
                        // echo "Writer Status successfully set to " . $order_status;
                        
                        $customeremail    = $this->input->post('customer_email');
                        $orderid          = $this->input->post('orderid');
                        $order_status     = $this->input->post('order_status');
                        $customer_name    = $this->input->post('customer_name');
                        $preferred_writer = $this->input->post('preferred_writer');
                        
                        // get the email details here and eval so that the codes can be read. 
                       if($order_status == 'Cancelled'){
                            $data['msg']     = $this->Siteconfigs_model->msg_config('order_status_changed');
                       } elseif($order_status == 'Completed'){
                            $data['msg']     = $this->Siteconfigs_model->msg_config('message_order_complete');
                       } elseif($order_status == 'Revision'){
                            $data['msg']     = $this->Siteconfigs_model->msg_config('order_status_changed');
                       } else{
                            $data['msg']     = $this->Siteconfigs_model->msg_config('new_order_paid');
                       }

                        $msg_body_admin  = $data['msg']['msg_body_admin'];
                        $msg_body_client = $data['msg']['msg_body_client'];

                   if($order_status == 'Revision'){
                        if ($preferred_writer != 0) {
                        // $writer_name      = implode(" ", $this->Siteconfigs_model->get_writer_name_new($preferred_writer));

                        $msg_body_writer = $data['msg']['msg_body_writer'];
                        $msg_body_writer = str_replace('"', "'", $msg_body_writer);
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str3 = \"$msg_body_writer\";");
                        //echo $str3;                       
                     }
                 }   
                        //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                        $msg_body_admin  = str_replace('"', "'", $msg_body_admin);
                        $msg_body_client = str_replace('"', "'", $msg_body_client);
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str1 = \"$msg_body_admin\";");
                        //echo $str1; 
                        
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str2 = \"$msg_body_client\";");
                        //echo $str2;                       
                        
                        
                        //send email to admin
                        $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('adminemail'));
                        $smtp_port   = $configs['smtp_configs']['smtp_port'];
                        $smtp_host   = $configs['smtp_configs']['smtp_host'];
                        $smtp_user   = $configs['smtp_configs']['smtp_user'];
                        $smtp_name   = $configs['smtp_configs']['smtp_name'];
                        $smtp_pass   = $configs['smtp_configs']['smtp_pass'];
                        $admin_email = $configs['smtp_configs']['admin_email'];
                        $protocol    = $configs['smtp_configs']['protocol'];
                        $config  = Array(
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
                        
                        $this->email->newSubject("Половина работы по заказу №" . $orderid);
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
                        //send email to customer
                        
                        // $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('custemail'));
                        // $smtp_port   = $configs['smtp_configs']['smtp_port'];
                        // $smtp_host   = $configs['smtp_configs']['smtp_host'];
                        // $smtp_user   = $configs['smtp_configs']['smtp_user'];
                        // $smtp_name   = $configs['smtp_configs']['smtp_name'];
                        // $smtp_pass   = $configs['smtp_configs']['smtp_pass'];
                        // $admin_email = $configs['smtp_configs']['admin_email'];
                        // $protocol    = $configs['smtp_configs']['protocol'];
                        // $config  = Array(
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
                        // if($order_status == 'Cancelled'){
                        //     $this->email->newSubject("Половина работы по заказу #" . $orderid);
                        //     $this->email->message($str2);
                        //     if(!empty($this->input->post('customer_email'))){
                        //         if ($this->email->send()) {
                        //             //Success email Sent
                        //             //echo $this->email->print_debugger();
                        //         } else {
                        //             //Email Failed To Send
                        //             // echo $this->email->print_debugger();
                        //         }
                        //     }    
                        // } 
                        // elseif($order_status == 'Completed'){
                        //     $this->email->newSubject("Работа по вашему заказу #" . $orderid . " завершена");
                        //     $this->email->message($str2);
                            
                        //     if(!empty($this->input->post('customer_email'))){
                        //         if ($this->email->send()) {
                        //             //Success email Sent
                        //             //echo $this->email->print_debugger();
                        //         } else {
                        //             //Email Failed To Send
                        //             // echo $this->email->print_debugger();
                        //         }
                        //     }

                        // }

                        

                       $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('writeemail'));
                        $smtp_port   = $configs['smtp_configs']['smtp_port'];
                        $smtp_host   = $configs['smtp_configs']['smtp_host'];
                        $smtp_user   = $configs['smtp_configs']['smtp_user'];
                        $smtp_name   = $configs['smtp_configs']['smtp_name'];
                        $smtp_pass   = $configs['smtp_configs']['smtp_pass'];
                        $admin_email = $configs['smtp_configs']['admin_email'];
                        $protocol = $configs['smtp_configs']['protocol'];
                        $config = Array(
                                'protocol' => $protocol,
                                'smtp_host' => $smtp_host,
                                'smtp_port' => $smtp_port,
                                'smtp_user' => $smtp_user,
                                'smtp_pass' => $smtp_pass,
                                'mailtype' => 'html'
                        );
                        $this->load->library('email', $config);
                        $this->email->set_newline("\r\n");
                        
                        if($order_status == 'Revision'){
                        //send email to writer
                        if ($preferred_writer != 0) {
                                // get the email of a given username from database

                                $data['get_writer_email'] = $this->Siteconfigs_model->get_writer_email($preferred_writer);
                                $writer_email             = $data['get_writer_email']['email'];
                                
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($writer_email);
                                
                                $this->email->newSubject("Заказ №" . $this->input->post('orderid') . ' возвращен на доработку');
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
                        }
                    }

                if($from === 'orderPage'){
                        redirect('Adminorders/view_order/' . $this->input->post('orderid'));
                    } elseif($from === 'assignedOrders'){
                        redirect('Adminorders/assigned_orders');
                    } else {
                        redirect('Adminorders/pending_orders');
                }
      
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }  

   // ============
   public function oplata_table($orderid = NULL) {
            $orderid      = $this->input->post('orderid');
            $data = array(
                'order_status' => 'Completed',
                'client_paid' => 'paid'
            );

            $from = $this->input->post('from');
            $this->Ordersed_model->order_update($orderid, $data);
            // echo "Writer Status successfully set to " . $order_status;
            
            $customeremail    = $this->input->post('customer_email');
            $orderid          = $this->input->post('orderid');
            $order_status     = $this->input->post('order_status');
            $customer_name    = $this->input->post('customer_name');
            $preferred_writer = $this->input->post('preferred_writer');
            $writer_name      = implode(" ", $this->Siteconfigs_model->get_writer_name_new($preferred_writer));
            
            
            // get the email details here and eval so that the codes can be read. 

            $data['msg']     = $this->Siteconfigs_model->msg_config('message_order_complete');
            $msg_body_writer = $data['msg']['msg_body_writer'];
            
            //this replaces all the double quotes with single quotes since when 
            $msg_body_writer = str_replace('"', "'", $msg_body_writer);
            
            // This evals so that the variables in the codes are read
            eval("\$str3 = \"$msg_body_writer\";");
            //echo $str3;                                   

           $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('writeemail'));
            $smtp_port   = $configs['smtp_configs']['smtp_port'];
            $smtp_host   = $configs['smtp_configs']['smtp_host'];
            $smtp_user   = $configs['smtp_configs']['smtp_user'];
            $smtp_name   = $configs['smtp_configs']['smtp_name'];
            $smtp_pass   = $configs['smtp_configs']['smtp_pass'];
            $admin_email = $configs['smtp_configs']['admin_email'];
            $protocol  = $configs['smtp_configs']['protocol'];
            $config    = Array(
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
            $writer_email = $data['get_writer_email']['email'];
            
            $this->email->from($smtp_user, $smtp_name);
            $this->email->to($writer_email);
            
            $this->email->newSubject("Вам оплачен заказ №".$orderid);
            $this->email->message($str3);
            if ($this->email->send()) {
                    //Success email Sent
                    //echo $this->email->print_debugger();
            } else {
                    //Email Failed To Send
                    // echo $this->email->print_debugger();
            }
                    
            

        redirect('Adminorders/pending_orders');
} 
   // ============     

                public function assign_writer($orderid = NULL)
        {

                $this->form_validation->set_rules('preferred_writer', 'preferred_writer', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $orderid          = $this->input->post('orderid');
                        $preferred_writer = $this->input->post('preferred_writer');
                        $previous_writer  = $this->input->post('previous_writer');
                        $order_status     = 'Assigned';
                        $customer_name    = $this->input->post('customer_name');
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
                                $smtp_port   = $configs['smtp_configs']['smtp_port'];
                                $smtp_host   = $configs['smtp_configs']['smtp_host'];
                                $smtp_user   = $configs['smtp_configs']['smtp_user'];
                                $smtp_name   = $configs['smtp_configs']['smtp_name'];
                                $smtp_pass   = $configs['smtp_configs']['smtp_pass'];
                                $admin_email = $configs['smtp_configs']['admin_email'];
                                $protocol    = $configs['smtp_configs']['protocol'];
                                $config  = Array(
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
                                
                                $this->email->newSubject("Заказ №" . $orderid . ' назначен ' . $this->input->post('writer_name'));
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
                    // if(!$previous_writer){
                    //     $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('custemail'));
                    //     $smtp_port   = $configs['smtp_configs']['smtp_port'];
                    //     $smtp_host   = $configs['smtp_configs']['smtp_host'];
                    //     $smtp_user   = $configs['smtp_configs']['smtp_user'];
                    //     $smtp_name   = $configs['smtp_configs']['smtp_name'];
                    //     $smtp_pass   = $configs['smtp_configs']['smtp_pass'];
                    //     $admin_email = $configs['smtp_configs']['admin_email'];
                    //     $protocol    = $configs['smtp_configs']['protocol'];
                    //     $config      = Array(
                    //             'protocol' => $protocol,
                    //             'smtp_host' => $smtp_host,
                    //             'smtp_port' => $smtp_port,
                    //             'smtp_user' => $smtp_user,
                    //             'smtp_pass' => $smtp_pass,
                    //             'mailtype' => 'html'
                    //     );
                    //     $this->load->library('email', $config);
                    //     $this->email->set_newline("\r\n");

                    //     $this->email->from($smtp_user, $smtp_name);
                    //     $this->email->to($this->input->post('customer_email'));
                        
                    //     $this->email->newSubject("Ваш заказ #" . $orderid . ' был назначен на выполнение');
                    //     $this->email->message($str2);
                        
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
                                $smtp_port = $configs['smtp_configs']['smtp_port'];
                                $smtp_host = $configs['smtp_configs']['smtp_host'];
                                $smtp_user = $configs['smtp_configs']['smtp_user'];
                                $smtp_name = $configs['smtp_configs']['smtp_name'];
                                $smtp_pass = $configs['smtp_configs']['smtp_pass'];
                                $admin_email = $configs['smtp_configs']['admin_email'];
                                $protocol = $configs['smtp_configs']['protocol'];
                                $config = Array(
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
                                
                                $this->email->newSubject("Поздравляем, заказ №" . $this->input->post('orderid') . ' был назначен Вам');
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
                                
                                $this->email->newSubject("Заказ #" . $this->input->post('orderid') . ' был переназначен');
                                $this->email->message($str4);

                                if(!empty($writer_email) && $writer_email != $previous_writer){    
                                    if(!empty($previous_writer)){
                                        if ($this->email->send()) {
                                                //Success email Sent
                                                //echo $this->email->print_debugger();
                                        } else {
                                                //Email Failed To Send
                                                // echo $this->email->print_debugger();
                                        }
                                    }    
                                }


                  redirect('Adminorders/view_order/'.$orderid );
                        
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
                                'order_status' => $this->input->post('order_status'),
                                'writer_name' => ' '

                        );
                        
                        $this->Ordersed_model->order_update($orderid, $data);
                        //  $this->Ordersed_model->delete_request($orderid);
                       // echo "You have successfully assigned this order";
                        redirect('Adminorders/view_order/'.$orderid );
                                
                              
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
        

                public function adminsprep(){
                $search = $this->input->post('search'); 
                $str = trim($search);
                $searchw = str_replace(' ', '--', $str);
                                
               $this->session->set_flashdata('search',$search);
               $this->session->set_flashdata('urlparam',$searchw);
               redirect('Adminorders/search/'.$searchw); 

        }


                public function search($searchw){
                     $orders['Title']    = 'Search results';
                $urlparam = $this->uri->segment(3);
             $search = str_replace('--', ' ', $urlparam);

             if($urlparam){
                 $orders['urlparam'] = $search;
             } else {
                $orders['urlparam'] = '';
             }
                $orders['orders'] = $this->Orders_model->vsearch($search);
                $this->load->view('opmaster/template/header', $orders);
                $this->load->view('opmaster/template/admin-sideorders');   
                $this->load->view('opmaster/orders/admin-searchresults');
        }

       public function upload_file()
        {

        
                $data['title']          = '';
               // $data['uploaded_files'] = directory_map('uploads/');

                if ($this->input->post('submit') && !empty($_FILES['multipleFiles']['name'][0])) {
                        
                        // count the number of files uploades
                        $number_of_files = count($_FILES['multipleFiles']['name']);
                        
                        $files        = $_FILES;
                        $orderfile    = $this->input->post('orderid');
                        $order_period    = $this->input->post('order_period');
                        $dif          = $this->config->item('uploads').'/' . $order_period . '/' . $orderfile;
                        // make sure the folder exists else create 
                        if (!is_dir($dif)) {
                                mkdir($dif, 0777, true);
                        }
                        

                        for ($i = 0; $i < $number_of_files; $i++) {

                                $files['multipleFiles']['name'][$i] =  preg_replace('/ /', '_', $files['multipleFiles']['name'][$i]);

                                $_FILES['multipleFiles']['name']     = $files['multipleFiles']['name'][$i];

                                $fname         = $files['multipleFiles']['name'][$i];
                                $file_name = pathinfo($fname, PATHINFO_FILENAME);
                                $ext = pathinfo($fname, PATHINFO_EXTENSION);

                                $newfile_name=   $fname;

                                $_FILES['multipleFiles']['type']     = $files['multipleFiles']['type'][$i];
                                $_FILES['multipleFiles']['tmp_name'] = $files['multipleFiles']['tmp_name'][$i];
                                $_FILES['multipleFiles']['error']    = $files['multipleFiles']['error'][$i];
                                $_FILES['multipleFiles']['size']     = $files['multipleFiles']['size'][$i];
                                
                                $config['upload_path']   = $dif;
                                $config['allowed_types'] = 'pdf|doc|dot|docx|docm|dotx|dotm|docb|xls|xlsx|xlt|xlm|xlsm|xltx|xltm|csv|txt|rtf|htm|html|zip|mp3|mp4|wma|mpg|flv|avi|jpg|jpeg|png|gif|pptx|pptm|ppt|pot|potx|potm|ppam|ppsx|ppsm|sldx|sldm|accdb|accde|accdt|accdr|';
                                $config['max_size']      = '233232';
                                $config['max_width']     = '232323';
                                $config['max_height']    = '243233';
                                $config['file_name']    = $newfile_name;
                                $config['eoverwrite']     = TRUE;
                                $config['remove_spaces'] = TRUE;
                                
                                // $this->load-library('upload', $config);
                                $this->upload->initialize($config);
                                
                                if (!$this->upload->do_upload('multipleFiles')) {
                                        $error = array(
                                                'error' => $this->upload->display_errors()
                                        );
                                } else {
                                        $data = array(
                                                'upload_data' => $this->upload->data()
                                        );
                                        //  $this->Orders_model->order_files($data);
                                }
                                
                                //print_r($this->upload->data());
                        }
                        
                        //
                        for ($i = 0; $i < $number_of_files; $i++) {
                          $_FILES['multipleFiles']['name']     = $files['multipleFiles']['name'][$i];

                                $fname         = $files['multipleFiles']['name'][$i];
                                $file_name = pathinfo($fname, PATHINFO_FILENAME);
                                $ext = pathinfo($fname, PATHINFO_EXTENSION);

                                $newfile_name=    $fname ;


                                $dbfile_name  = $newfile_name;


                                $uploader_name = $this->session->userdata('firstname');
                                $this->session->userdata('lastname');
                                
                                //////////// do some work here to enter content into database for materials and essays. stopepd here
                                $order_period = $this->config->item('order_period');
                                $orderfile    = $this->input->post('orderid');
                                $dif          = $this->config->item('uploads').'/' . $order_period . '/' . $orderfile;
                                //$filename = base_url().''.$dif.'/'.$file_name;// or /var/www/html/file.docx
                                $filename     = $this->config->item('uploads').'/' . $order_period . '/' . $orderfile . '/' . $file_name; // or /var/www/html/file.docx
                                
                                $ext = pathinfo($filename, PATHINFO_EXTENSION);

                                
                                $data = array(
                                    'file_name' => $files['multipleFiles']['name'][$i],
                                    'file_size' => $files['multipleFiles']['size'][$i],
                                    'tmp_name' => $dbfile_name,
                                    'file_type' => $files['multipleFiles']['type'][$i],
                                    'upload_date' => date('d.m.Y H:i:s'),
                                    'order_id' => $this->input->post('orderid'),
                                    'upload_type' => $this->input->post('upload_type'),
                                    'alias' => $this->input->post('alias'),
                                    'uploader_name' => $uploader_name,
                                    'uploaded_by' => $this->session->userdata('writer_id')    
                                );
                                $this->Orders_model->order_files($data);
                        }
                        
                        for ($i = 0; $i < $number_of_files; $i++) {
                                //send email to admin
                                $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('adminemail'));
                                $smtp_port = $configs['smtp_configs']['smtp_port'];
                                $smtp_host = $configs['smtp_configs']['smtp_host'];
                                $smtp_user = $configs['smtp_configs']['smtp_user'];
                                $smtp_name = $configs['smtp_configs']['smtp_name'];
                                $smtp_pass = $configs['smtp_configs']['smtp_pass'];
                                $admin_email = $configs['smtp_configs']['admin_email'];
                                $protocol = $configs['smtp_configs']['protocol'];
                                $config = Array(
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
                                
                                
                                $orderid          = $this->input->post('orderid');
                                $preferred_writer = $this->input->post('preferred_writer');
                                $filename         = $files['multipleFiles']['name'][$i];
                                $uploader_name    = $this->session->userdata('firstname');
                                
                                // get the email details here and eval so that the codes can be read. 
                                $data['msg']     = $this->Siteconfigs_model->msg_config('file_uploaded');
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



                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($admin_email);
                                
                                $this->email->newSubject("Новый файл загружен по заказу №" . $this->input->post('orderid') . '[' . $filename . ']');
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
                                $smtp_port = $configs['smtp_configs']['smtp_port'];
                                $smtp_host = $configs['smtp_configs']['smtp_host'];
                                $smtp_user = $configs['smtp_configs']['smtp_user'];
                                $smtp_name = $configs['smtp_configs']['smtp_name'];
                                $smtp_pass = $configs['smtp_configs']['smtp_pass'];
                                $admin_email = $configs['smtp_configs']['admin_email'];
                                $protocol = $configs['smtp_configs']['protocol'];
                                $config = Array(
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

                                $fname         = $files['multipleFiles']['name'][$i];
                                $file_name = pathinfo($fname, PATHINFO_FILENAME);
                                $ext = pathinfo($fname, PATHINFO_EXTENSION);
                                $file_name     = str_replace(' ', '_', $file_name);
                                $file_name     = str_replace('.', '_', $file_name);
                                $file_name     = str_replace("'", "", $file_name);
                                $file_name     = str_replace("&", "", $file_name);
                                $file_name     = str_replace("$", "", $file_name);

                                $file_name  = $file_name.'.'.$ext;

                        $orderid    = $this->input->post('orderid');      
                        $pathhere = realpath(APPPATH.$this->config->item('uploads').'/').'/'.$order_period.'/'.$orderid.'/'.$file_name;
                               //$this->email->attach($path_to_thefile);
                               $this->email->attach($pathhere);
                                
                                $this->email->newSubject("Новый файл загружен по заказу №" . $this->input->post('orderid') . '[' . $files['multipleFiles']['name'][$i] . ']');
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
                                $smtp_port = $configs['smtp_configs']['smtp_port'];
                                $smtp_host = $configs['smtp_configs']['smtp_host'];
                                $smtp_user = $configs['smtp_configs']['smtp_user'];
                                $smtp_name = $configs['smtp_configs']['smtp_name'];
                                $smtp_pass = $configs['smtp_configs']['smtp_pass'];
                                $admin_email = $configs['smtp_configs']['admin_email'];
                                $protocol = $configs['smtp_configs']['protocol'];
                                $config = Array(
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
                                $data['get_writer_email'] = $this->Siteconfigs_model->get_writer_email($this->input->post('preferred_writer'));
                                $writer_email             = $data['get_writer_email']['email'];
                                
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($writer_email);
                                
                                $this->email->newSubject("Новый файл загружен по заказу №" . $this->input->post('orderid') . '[' . $files['multipleFiles']['name'][$i] . ']');
                                $this->email->message($str3);
                                
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                }
                        }
                        
                        $error = array(
                                'error' => $this->upload->display_errors()
                        );
                        if ($error) {
                                $url = $_SERVER['HTTP_REFERER'];
                                redirect($url);
                        }
                        
                        
                } else {
                       redirect('adminorders/view_order/'.$this->input->post('orderid'));
                }
                  

        }
}