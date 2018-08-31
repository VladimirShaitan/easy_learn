<?php
class Clients extends CI_Controller
{
        
        public function __construct()
        {
                parent::__construct();
                $this->load->model('clients_model');
                $this->load->library('session');
                $this->load->model('Siteconfigs_model');
                $this->load->model('User_model');
                $this->load->model('Orders_model');
                $this->load->library(array(
                        'form_validation',
                        'session'
                ));
                $this->load->helper('url_helper');
                
        }
        
        public function index()
        {

                redirect("user/myaccount");
                
        }
               
        
        public function client_register($temp_key = NULL)
        {
                
                $data['verify_temp_key'] = $this->User_model->temp_key_ver($temp_key);
                $data['email']           = $data['verify_temp_key']['email'];
                $email           = $data['verify_temp_key']['email'];
                $data['temp_key']        = $data['verify_temp_key']['temp_key'];
               
                $ver_temp_key = $data['verify_temp_key']['temp_key'];
                
                if (empty($ver_temp_key)) {
                        redirect("home/signup");
                }
                                
                
                $this->load->helper('form');
                $this->load->library('form_validation');
                $data['students'] = $this->Siteconfigs_model->get_country_customers();
                $data['max_writerid']       = $this->Siteconfigs_model->max_writerid();
                $max_writerid = $data['max_writerid']['writer_id']+1;
                $this->form_validation->set_rules('firstname', 'firstname', 'required');
                $this->form_validation->set_rules('lastname', 'lastname', 'required');
                $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[writers.email]');
                $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]');
                $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
                
                
                if ($this->form_validation->run() === TRUE) {
                        
                        $user_level  = 'client';
                        $data = array(
                                'firstname' => $this->input->post('firstname'),
                                'lastname' => $this->input->post('lastname'),
                                'email' => trim($this->input->post('email')),
                                'password' => md5($this->input->post('password')),
                                'primaryphone' => $this->input->post('primaryphone'),
                                'country' => $this->input->post('country'),
                                'user_level' => 'client',
                                'writer_id' => $max_writerid,
                                'viewed' => 'false',
                                'writer_status' => 'Active'                               
                        );
                        $this->clients_model->customer_register($data);
                        $this->User_model->delete_key($email);
                        $this->Orders_model->mngrNewUserNotice();
                        
                        // set the variables that will be sent when email is sent
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
                        

                        //send email to admin to notify of new project
                        $this->email->from($smtp_user, $smtp_name);
                        $this->email->to($admin_email);
                        
                        $this->email->newSubject("Новый заказчик " . $clientuserid . " зарегистрирован на сайте");
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

                        $loginemail         = trim($this->input->post('email'));
                        $loginpassword     = md5($this->input->post('password'));

                        $this->session->set_flashdata('email',$loginemail);
                        $this->session->set_flashdata('pass',$loginpassword);
                       redirect('/clients/signinuser');

                } else {
                        
                        $this->load->view('template/header', $data);
                        $this->load->view('customer/client-register');
                        $this->load->view('template/footer');
                        
                }
        }
        

        function signinuser()
        {

                $email    = $this->session->flashdata('email');
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
                        

                                redirect('user/myaccount');
                        }
        }
        
        
}