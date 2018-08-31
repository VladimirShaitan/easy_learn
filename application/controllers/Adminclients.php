<?php
class Adminclients extends CI_Controller
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

                public function new_client ()
        {

                
                $this->load->helper('form');
                $this->load->library('form_validation');
                $data['students'] = $this->Siteconfigs_model->get_country_customers();
                $data['subject']  = $this->clients_model->get_subject();
                $data['title']    = 'Add new client';
                
                $this->form_validation->set_rules('firstname', 'firstname', 'required');
                $this->form_validation->set_rules('lastname', 'lastname', 'required');
                $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[writers.email]');
                $this->form_validation->set_rules('password', 'password', 'trim|required');
                $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
                
                $data['max_writerid']       = $this->Siteconfigs_model->max_writerid();
                $client_id = $data['max_writerid']['writer_id']+1;

                if ($this->form_validation->run() === TRUE) {
                        
                        $user_level  = 'client';
                        $profile_img = 'placeholder.png';
                        
                        $data = array(
                                'firstname' => $this->input->post('firstname'),
                                'lastname' => $this->input->post('lastname'),
                                'email' => $this->input->post('email'),
                                'password' => md5($this->input->post('password')),
                                'user_level' => $user_level,
                                'writer_id' => $client_id,
                                'profile_img' => $profile_img
                                
                        );
                        $this->clients_model->customer_register($data);
                        
                        
                        // set the variables that will be sent when email is sent
                        $useremail     = $this->input->post('email');
                        $userfirstname = $this->input->post('firstname');
                        $userlastname  = $this->input->post('lastname');
                        $clientuserid  = $client_id;
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
                        
                        $this->email->subject("New customer " . $clientuserid . " registered on your site");
                        $this->email->message($str1);
                        
                        if ($this->email->send()) {
                                //Success email Sent
                                //echo $this->email->print_debugger();
                        } else {
                                //Email Failed To Send
                                // echo $this->email->print_debugger();
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
                        
                        $this->email->subject("Вы успешно зарегистрировались на сайте " . $siteurl);
                        $this->email->message($str2);
                        
                        if ($this->email->send()) {
                                //Success email Sent
                                //echo $this->email->print_debugger();
                        } else {
                                //Email Failed To Send
                                // echo $this->email->print_debugger();
                        }
                                                
                        redirect('Adminclients/view_client/'.$client_id);
                } else {
                        
               //$this->load->view('opmaster/template/iheader', $data);
              $this->load->view('opmaster/template/header');
                $this->load->view('opmaster/template/admin-sideclients');
                $this->load->view('opmaster/clients/admin-addclient', $data);

                        
                }
        }

        public function false_clients() {
                $writers['Title']   = 'Заблокированные Заказчики';
                $config                = array();
                $config["base_url"]    = base_url() . "Adminclients/false_clients";
                $config["total_rows"]  = $this->Adminusers_model->count_falseclients();
                $config["per_page"]    = 20;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $clients["writers"] = $this->Adminusers_model->false_clients($config["per_page"], $page);
                $clients["links"]   = $this->pagination->create_links();
                
                $this->load->view('opmaster/template/header', $clients);
                $this->load->view('opmaster/template/admin-sideclients'); 
                $this->load->view('opmaster/clients/admin-clients');
        }

       public function active_clients() {
                $writers['Title']   = 'Активные заказчики';
                $config                = array();
                $config["base_url"]    = base_url() . "Adminclients/active_clients";
                $config["total_rows"]  = $this->Adminusers_model->count_activeclients();
                $config["per_page"]    = 20;
                $config["uri_segment"] = 3;
                
                // $writers["writers"] = $this->Adminusers_model->active_writers();


                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $clients["writers"] = $this->Adminusers_model->active_clients($config["per_page"], $page);
                $clients["links"]   = $this->pagination->create_links();

                
                $this->load->view('opmaster/template/header', $clients);
                $this->load->view('opmaster/template/admin-sideclients'); 
                $this->load->view('opmaster/clients/admin-clients');
        }

        public function clients()
        {
                $writers['Title']   = 'All Writers';
                $config                = array();
                $config["base_url"]    = base_url() . "Adminclients/clients";
                $config["total_rows"]  = $this->Adminusers_model->count_clients();
                $config["per_page"]    = 20;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $writers["writers"] = $this->Adminusers_model->all_clients($config["per_page"], $page);
                $writers["links"]   = $this->pagination->create_links();
                
                $this->load->view('opmaster/template/header', $writers);
                $this->load->view('opmaster/template/admin-sideclients');
                $this->load->view('opmaster/clients/admin-clients');
        }


        public function view_client($writer_id = NULL)
        {
                
                $data['upload_folder'] = $this->Siteconfigs_model->upload_folder(1);
                 $data['upload']         = $data['upload_folder']['upload'];
                $data['news_item'] = $this->Adminusers_model->get_students($writer_id);
                
                if (empty($data['news_item'])) {
                        $this->index();
                }
                
                $data['firstname']      = $data['news_item']['firstname'];
                $data['text']           = $data['news_item']['text'];
                $data['writer_id']      = $data['news_item']['writer_id'];
                $data['id']             = $data['news_item']['id'];
                $data['lastname']       = $data['news_item']['lastname'];
                $data['gender']         = $data['news_item']['gender'];
                $data['city']           = $data['news_item']['city'];
                $data['country']        = $data['news_item']['country'];
                $data['subject']        = $data['news_item']['subject'];
                $data['email']          = $data['news_item']['email'];
                $data['password']       = $data['news_item']['password'];
                $data['primaryphone']   = $data['news_item']['primaryphone'];
                $data['profile_img']    = $data['news_item']['profile_img'];
                $data['subject']        = $data['news_item']['subject'];
                $data['academiclevel']  = $data['news_item']['academiclevel'];
                $data['citation']       = $data['news_item']['citation'];
                $data['writer_status']  = $data['news_item']['writer_status'];
                $data['nativelanguage'] = $data['news_item']['nativelanguage'];
                $data['availability']   = $data['news_item']['availability'];
                
                $data['order_rating'] = $this->Messages_model->writer_rating($writer_id);
                 $data['writers_accounts'] = $this->Financial_model->writers_accounts($writer_id);
                $this->load->view('opmaster/template/header');
                $this->load->view('opmaster/template/admin-sideclients');
                $this->load->view('opmaster/clients/admin-viewclient', $data);
             
        }

       public function edit_client($writer_id = NULL)
        {
                
                $this->form_validation->set_rules('writer_id', 'writer_id', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $writer_id          = $this->input->post('writer_id');
                       
                        $data = array(
                                'firstname' => $this->input->post('firstname'),
                                'lastname' => $this->input->post('lastname'),
                                'email' => $this->input->post('email'),
                                'primaryphone' => $this->input->post('primaryphone'),
                                'subject' => $this->input->post('subject'),
                                'academiclevel' => $this->input->post('academiclevel'),
                                'gender' => $this->input->post('gender'),
                                'country' => $this->input->post('country'),
                                'city' => $this->input->post('city'),
                        );
                        
                        $this->Adminusers_model->edit_user($writer_id, $data);
                        redirect('Adminclients/view_client/'.$this->input->post('writer_id'));
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        } 

        public function edit_password_client($writer_id = NULL)
        {
                
                $this->form_validation->set_rules('writer_id', 'writer_id', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $writer_id          = $this->input->post('writer_id');
                        $data = array(
                                'password' => md5($this->input->post('password')),
                        );
                        
                        $this->Adminusers_model->edit_user($writer_id, $data);
                        redirect('Adminclients/view_client/'.$this->input->post('writer_id'));
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
         


}