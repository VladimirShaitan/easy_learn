<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller
{
        
        public function __construct()
        {
                parent::__construct();
                $this->load->model('Orders_model');
                $this->load->model('clients_model');
                $this->load->model('User_model');
                $this->load->model('Siteconfigs_model');
                $this->load->helper('url_helper');
                $this->load->helper('url');
                $this->load->library(array(
                        'form_validation',
                        'session'
                ));
                $this->load->helper('directory');
                $this->load->library('upload');

                if ($this->session->userdata('writer_id')) {
                        redirect('order/create');
                }

        }
        
        public function index(){
            if(1){
                redirect('project/create');
            }
        }
        
public function create() {

    if ($this->session->userdata('writer_id')) {
            redirect('order/create');
    }

    $data['countries'] = $this->Siteconfigs_model->get_country_customers();

    
   if ($this->input->post('writer_id')) {
        $data['order_status']     = 'Assigned';
        $preferred_writer = $this->input->post('writer_id');
        $data['preferred_writer'] = $this->input->post('writer_id');
    }
    
    if (!$this->input->post('writer_id')) {
            
            $preferred_writer = '';
            $data['preferred_writer'] = '';
            $data['order_status']     = 'Openproject';
    }
    

    // they can made na order if not logged in
    if (1) {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['subject']           = $this->Orders_model->get_subject();
            $data['max_orderid']       = $this->Orders_model->max_orderid();
            $data['urgency']           = $this->Orders_model->get_urgency();
            $data['configs']           = $this->Siteconfigs_model->configs();
            $data['ops_coupon']        = $this->Siteconfigs_model->ops_coupon();
            $data['academic_level']    = $this->Siteconfigs_model->academic_level();
            $data['currency']          = $this->Siteconfigs_model->get_accepted_currency();
            $data['referencing_style'] = $this->Siteconfigs_model->referencing_style();
            $data['profile']           = $this->User_model->get_profile();
            $data['title']             = 'Create Order';
            
            $this->form_validation->set_rules('topic', 'topic', 'required');
            $this->form_validation->set_rules('subject', 'subject', 'required');
            $this->form_validation->set_rules('words', 'words', 'required');
           // $this->form_validation->set_rules('instructions', 'instructions', 'required');
            $this->form_validation->set_rules('urgency', 'urgency', 'required');
            $this->form_validation->set_rules('amount', 'amount', 'required');
           // $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[writers.email]');
            $this->form_validation->set_rules('password', 'password', 'required');
            
                    $data['coupon'] = $this->Siteconfigs_model->coupon(1);
                    $data['coupon_value'] = $data['coupon']['coupon_value'];
                    $data['coupon_name'] = $data['coupon']['coupon_name'];
            
            
            if (!$this->input->post('words') || $this->form_validation->run() === FALSE ) {
                    $this->load->view('template/header', $data);
                    
                    
                    $data['customer_price'] = $this->Siteconfigs_model->customer_own_price(1);
                    $customer_price         = $data['customer_price']['client_own_price'];
                    if ($customer_price == 'YES') {
                            $this->load->view('pages/unpriced-loggedout');
                    }
                    if ($customer_price == 'NO') {
                            $this->load->view('pages/order-priced-loggedout');
                    }

                    $this->load->view('template/sidebar');
                    $this->load->view('template/footer');
                    
            } else {
                    
                    
                    $inputpage            = $this->input->post('words');
                    $data['select_words'] = $this->Siteconfigs_model->select_words(1);
                    $wordsperpage         = $data['select_words']['wordsperpage'];
                    $time_difference      = $data['select_words']['time_difference'];
                    $words                = $inputpage;
                    
                    $urgency         = $this->input->post('urgency');
                    $data['urgency'] = $this->Siteconfigs_model->geturgency($urgency);
                    $urgency         = $data['urgency']['urgency'];
                    $urgency_writers = $data['urgency']['urgency']*$time_difference;
                    $duration        = $data['urgency']['duration'];
                    $time1           = $urgency. "". $duration;
                    
                    $date_posted     = date('Y-m-d H:i:s');
                    $time_writer     = round($urgency_writers). " ". $duration;
                    
                    //$this->load->helper('url');    



           $data['max_orderid']       = $this->Orders_model->max_orderid();
           $max_orderid = $data['max_orderid']['orderid']+1;


          $data['max_writerid']       = $this->Siteconfigs_model->max_writerid();
          $max_writerid = $data['max_writerid']['writer_id']+1;


$deadline_writers     = date('Y-m-d H:i:s', strtotime($time_writer, strtotime($date_posted)));
                    //$urgency = $this->input->post('urgency');
$deadline     = date('Y-m-d H:i:s', strtotime($time1, strtotime($date_posted)));
                    $title        = $this->input->post('topic');
                    $alias        = preg_replace("/[^\w]/", "-", $title);
                    $alias        = str_replace('----', '-', $alias); // Replaces all spaces with hyphens.
                    $alias        = str_replace('---', '-', $alias); // Replaces all spaces with hyphens.
                    $alias        = str_replace('--', '-', $alias); // Replaces all spaces with hyphens.
                    $alias        = $max_orderid.'-'.$alias . '.html'; // Replaces all spaces with hyphens.
                    
                    //making field pick proper values from pvalues
                    $order_period =  $this->config->item('order_period');
                  


                    // check if user is registered do not register him

                  $data['client_email'] = $this->Siteconfigs_model->get_user_client($this->input->post('email'));
                    $client_email         = $data['client_email']['email'];
                    $writer_id         = $data['client_email']['writer_id'];

                    // begin the registration of a user




            if (!$client_email) {
                            $user_level  = 'client';

                            $data = array(
                                'firstname' => $this->input->post('firstname'),
                                'lastname' => $this->input->post('lastname'),
                                'country' => $this->input->post('country'),
                                'email' => $this->input->post('email'),
                                'password' => md5($this->input->post('password')),
                                'country' => $this->input->post('country'),
                                'primaryphone' => $this->input->post('primaryphone'),
                                'user_level' => $user_level,
                                'writer_id' => $max_writerid,
                                'viewed' => 'false',
                                'writer_status' => 'Active'
                            );
            $this->clients_model->customer_register($data); 
            $this->Orders_model->mngrNewUserNotice();

            
            $useremail     = $this->input->post('email');
            $userfirstname = $this->input->post('firstname');
            $userlastname  = $this->input->post('lastname');
            $clientuserid  = $max_writerid;
            $siteurl       = base_url();
            $userpassword  = $this->input->post('password');
            
            // get the email details here and eval so that the codes can be read. 
            $data['msg']     = $this->Siteconfigs_model->msg_config('new_client_registers');
            $msg_body_admin  = $data['msg']['msg_body_admin'];
            $msg_body_client = $data['msg']['msg_body_client'];
            
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
            
            $this->email->newSubject("Новый заказчик " . $clientuserid . " зарегистрировался на сайте");
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
            //send email to user to confirm posted sucessfully 
            
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
            $this->email->to($this->input->post('email'));
            
            $this->email->newSubject("Вы успешно зарегистрировались на " . $siteurl);
            $this->email->message($str2);
            if(!empty($this->input->post('email'))){
                if ($this->email->send()) {
                        //Success email Sent
                        //echo $this->email->print_debugger();
                } else {
                        //Email Failed To Send
                        // echo $this->email->print_debugger();
                }
            }    
    } //  end of user creation suppose details do not exist 
                    


                    $inputpage            = $this->input->post('words');
                    $data['select_words'] = $this->Siteconfigs_model->select_words(1);
                    $wordsperpage         = $data['select_words']['wordsperpage'];
                    $time_difference      = $data['select_words']['time_difference'];
                    $words                = $inputpage;
                                            
                    $pvalue         = $this->input->post('urgency');
                    $date_posted     = date('Y-m-d H:i:s');
                    $data['urgency'] = $this->Siteconfigs_model->geturgency($pvalue);
                    $urgency         = $data['urgency']['urgency'];
                    $urgency_writers = $data['urgency']['urgency']*$time_difference;
                    $duration        = $data['urgency']['duration'];
                   // $time1           = $urgency. " ". $duration;
                    $time1 = $pvalue;
                    $time_writer     = round($urgency_writers). " ". $duration;
                    $name_type = 'material';
                    $deadline     = date('Y-m-d H:i:s', strtotime($time1, strtotime($date_posted)));
                    $deadline_writers     = date('Y-m-d H:i:s', strtotime($time_writer, strtotime($date_posted)));

            $data['client_email'] = $this->Siteconfigs_model->get_user_client($this->input->post('email'));
            $client_email         = $data['client_email']['email'];
            $writer_id         = $data['client_email']['writer_id'];
            $customer_name      = $data['client_email']['firstname'].' '.$data['client_email']['lastname'];

                      $instructions = $this->input->post('instructions');
                    $clean_instruction = strip_tags($instructions,'<table><p><td><th><tr/><em><strong><h1><h2><h3><h4><h5><h6><i>');

                    if (true) {
                            $data = array(
                                'topic' => $this->input->post('topic'),
                                'customer' => $writer_id,
                                'subject' => preg_replace("/[0-9]/", "", $this->input->post('subject')),
                                 'academic_level' => preg_replace("/[0-9]/", "", $this->input->post('academic_level')),
                                'words' => $words,
                                'instructions' => $clean_instruction,
                                 'currency' => preg_replace("/[^a-z-]/i", "", $this->input->post('currency')),
                                'amount' => $this->input->post('amount'),
                                'date_posted' => date('Y-m-d H:i:s'),
                                'urgency' => $time1,
                                'order_status' => $this->input->post('order_status'),
                                'referencing_style' => $this->input->post('referencing_style'),
                                'customer_email' => $this->input->post('email'),
                                
                                'sources' => $this->input->post('sources'),
                                'client_paid' => 'unpaid',
                                'writerpaid' => 'unpaid',
                                'writerpay' => $this->input->post('usdamount')*$this->input->post('writeramount'),
                                'deadline' => $deadline,
                                'deadline_writers' => $deadline_writers,
                                'order_period' => $this->config->item('order_period'),
                                'project_type' => 'project',
                                'preferred_writer' => $this->input->post('preferred_writer'),
                                'alias' => $alias,
                                'customer_name' => $customer_name,
                                'viewed' => 'false',
                                'view_todo_ord' => 'false',
                                'yesno' => 'need_to_choose'
                            );
                            
                            $this->Orders_model->create_order($data);
                            
                    }
                    

                    // print_r($_FILES['multipleFiles']['name'][0]);
                    // if($_FILES['multipleFiles']['name'][0] === ''){
                    //     echo "string";
                    // }
                    // return false;
                        // echo '<pre>';
                        // print_r($_FILES['multipleFiles']);
                        // echo '</pre>';
                        //$this->input->post('submit') && 
                    if (!empty($_FILES['multipleFiles'])) {

                        if($_FILES['multipleFiles']['name'][0] != ''){
                            // count the number of files uploades
                            $number_of_files = count($_FILES['multipleFiles']['name']);
                            //store global files to local variable
                            
                            $files        = $_FILES;
                            $orderfile    = $this->input->post('orderid');
                            $order_period = $this->config->item('order_period');

                            $dif          = $this->config->item('uploads').'/' . $order_period . '/' . $max_orderid;
                            // make sure the folder exists else create 
                            if (!is_dir($dif)) {
                                    mkdir($dif, 0777, true);
                            }
                            
                            // upload files one by one
                            
                        for ($i = 0; $i < $number_of_files; $i++) {
                            if(!empty($files['multipleFiles']['name'][$i])) {

                            $_FILES['multipleFiles']['name']     = $files['multipleFiles']['name'][$i];
                            $_FILES['multipleFiles']['type']     = $files['multipleFiles']['type'][$i];
                            $_FILES['multipleFiles']['tmp_name'] = $files['multipleFiles']['tmp_name'][$i];
                            $_FILES['multipleFiles']['error']    = $files['multipleFiles']['error'][$i];
                            $_FILES['multipleFiles']['size']     = $files['multipleFiles']['size'][$i];

                            $fname = $files['multipleFiles']['name'][$i];
                            $file_name = pathinfo($fname, PATHINFO_FILENAME);
                            $ext = pathinfo($fname, PATHINFO_EXTENSION);

                            // $newfile_name= preg_replace('/[^\w]/', '_', $file_name);
                            $newfile_name[$i] =   $name_type.'_'.rand(0, 100).'_'.$i.'.'.$ext;                
                            $config['upload_path']   = $dif;
                            $config['allowed_types'] = 'pdf|doc|dot|docx|docm|dotx|dotm|docb|xls|xlsx|xlt|xlm|xlsm|xltx|xltm|csv|txt|rtf|htm|html|zip|mp3|mp4|wma|mpg|flv|avi|jpg|jpeg|png|gif|pptx|pptm|ppt|pot|potx|potm|ppam|ppsx|ppsm|sldx|sldm|accdb|accde|accdt|accdr|csv|rar|';
                            $config['max_size']      = '233232';
                            $config['max_width']     = '232323';
                            $config['max_height']    = '243233';
                            $config['file_name']    = $newfile_name[$i];
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
                        }
            
            
            
            for ($i = 0; $i < $number_of_files; $i++) {
             if(!empty($files['multipleFiles']['name'][$i])) {

            $fname = $files['multipleFiles']['name'][$i];
            $file_name     = str_replace(' ', '_', $fname);
            $uploader_name = $this->session->userdata('lastname');
                    
                     $fname = $files['multipleFiles']['name'][$i];
                    $file_name = pathinfo($fname, PATHINFO_FILENAME);
                    $ext = pathinfo($fname, PATHINFO_EXTENSION);

                    // $newfile_name= preg_replace('/[^\w]/', '_', $file_name);

                    $dbfile_name  = $newfile_name[$i];
                                    
                                    $orderfile    =  $max_orderid;
                                    $order_period = date('Y') . '' . date('M');
                                    
                                    $data = array(
                                            'file_name' => $files['multipleFiles']['name'][$i],
                                            'file_size' => $files['multipleFiles']['size'][$i],
                                            'tmp_name' =>  $dbfile_name,
                                            'file_type' => $files['multipleFiles']['type'][$i],
                                            'upload_date' => date('d.m.Y H:i:s'),
                                            'order_id' => $max_orderid,
                                            'upload_type' => $this->input->post('upload_type'),
                                            'alias' => $alias,
                                            //'answer_content' => nl2br($content),
                                           //e 'uploader_name' => $uploader_name,
                                            'uploaded_by' => '44343'
                                            
                                    );
                                    $this->Orders_model->order_files($data);
                                  

                                  }  
                            }
                    }
                }
                    
                    


                    $data['max_orderid']       = $this->Orders_model->max_orderid();
                    $max_orderid = $data['max_orderid']['orderid'];


         if (!$client_email){
                    $loginemail =$this->input->post('email');
                    $loginpassword =$this->input->post('password');
                    $this->session->set_flashdata('email',$loginemail);
                    $this->session->set_flashdata('pass',$loginpassword);
                    $this->session->set_flashdata('orderid',$max_orderid);
                    redirect('project/signin');
             }


         if ($client_email){


            $data['client_email'] = $this->Siteconfigs_model->get_user_client($this->input->post('email'));
                    $loginemail         = $data['client_email']['email'];
                    $loginpassword     = $data['client_email']['password'];
                    //$writer_id         = $data['client_email']['writer_id'];

                    $this->session->set_flashdata('email',$loginemail);
                    $this->session->set_flashdata('pass',$loginpassword);
                    $this->session->set_flashdata('orderid',$max_orderid);
                    redirect('project/signinuser');
             }


                    
            }
    }
    
    else {
            $this->load->view('templates/header');
            $this->load->view('project/create');
            $this->load->view('templates/footer');
    }
    
    
                
        }



         function signin()
        {

                
                $orderid    = $this->session->flashdata('orderid');
                $email    = trim($this->session->flashdata('email'));
                $password = trim($this->session->flashdata('pass'));
                $password = md5($this->session->flashdata('pass'));
                
                $query = $this->User_model->processLogin($email, $password);

                        if ($query) {
                        
                       $email    = $this->input->post('email');
                       $data = array(
                                'loggedin' => 1//"YES"
                        );
                        
                        $this->User_model->loggedin($email, $data);
                        
                        
                                $query = $query->result();
                                $user  = array(
                                        'text' => $query[0]->text,
                                        'email' => $query[0]->email,
                                        'writer_level' => $query[0]->writer_level,
                                        'firstname' => $query[0]->firstname,
                                        'lastname' => $query[0]->lastname,
                                        'city' => $query[0]->city,
                                        'country' => $query[0]->country,
                                        'subject' => $query[0]->subject,
                                        'user_level' => $query[0]->user_level,
                                        'writer_id' => $query[0]->writer_id,
                                        'primaryphone' => $query[0]->primaryphone,
                                        'password' => $query[0]->password,
                                        'writer_status' => $query[0]->writer_status,
                                        'profile_img' => $query[0]->profile_img,
                                        'loggedin' =>  $query[0]->loggedin
                                );
                                
                                // When one sucessfully logs in he is directed to myaccount page. This is loacted in views/myaccount
                       $this->session->set_userdata($user);
                        

                                redirect('order/view/'.$orderid);
                        }
        }

        
        function signinuser()
        {

                
                $orderid    = $this->session->flashdata('orderid');
                $email    = trim($this->session->flashdata('email'));
                $password = trim($this->session->flashdata('pass'));
                $password = $this->session->flashdata('pass');
                
                $query = $this->User_model->processLogin($email, $password);

                        if ($query) {
                        
                       $email    = $this->input->post('email');
                       $data = array(
                                'loggedin' => 1//"YES"
                        );
                        
                        $this->User_model->loggedin($email, $data);
                        
                        
                                $query = $query->result();
                                $user  = array(
                                        'text' => $query[0]->text,
                                        'email' => $query[0]->email,
                                        'writer_level' => $query[0]->writer_level,
                                        'firstname' => $query[0]->firstname,
                                        'lastname' => $query[0]->lastname,
                                        'city' => $query[0]->city,
                                        'country' => $query[0]->country,
                                        'subject' => $query[0]->subject,
                                        'user_level' => $query[0]->user_level,
                                        'writer_id' => $query[0]->writer_id,
                                        'primaryphone' => $query[0]->primaryphone,
                                        'password' => $query[0]->password,
                                        'writer_status' => $query[0]->writer_status,
                                        'profile_img' => $query[0]->profile_img,
                                        'loggedin' =>  $query[0]->loggedin
                                );
                                
                                // When one sucessfully logs in he is directed to myaccount page. This is loacted in views/myaccount
                       $this->session->set_userdata($user);
                        

                                redirect('order/view/'.$orderid.'#neworder');
                        }
        }
        
        
}