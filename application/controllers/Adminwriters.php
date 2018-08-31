<?php
class Adminwriters extends CI_Controller
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

        public function writers()
        {
                $writers['Title']   = 'All Writers';
                $config                = array();
                $config["base_url"]    = base_url() . "Adminwriters/writers";
                $config["total_rows"]  = $this->Adminusers_model->count_allwriters();
                $config["per_page"]    = 15;
                $config["uri_segment"] = 3;
                
                // $writers["writers"] = $this->Adminusers_model->all_writers(); 

                $this->pagination->initialize($config);
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                // $writers["writers"] = $this->Adminusers_model->all_clients($config["per_page"], $page);
                $writers["writers"] = $this->Adminusers_model->all_writers($config["per_page"], $page);
                $writers["links"]   = $this->pagination->create_links();
                
                $this->load->view('opmaster/template/header', $writers);
                $this->load->view('opmaster/template/admin-sidewriters'); 
                $this->load->view('opmaster/writers/admin-writers');
        }


        public function active_writers()
        {
                $writers['Title']   = 'All Writers';
                $config                = array();
                $config["base_url"]    = base_url() . "Adminwriters/active_writers";
                $config["total_rows"]  = $this->Adminusers_model->count_activewriters();
                $config["per_page"]    = 20;
                $config["uri_segment"] = 3;
                
                // $writers["writers"] = $this->Adminusers_model->active_writers();


                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $writers["writers"] = $this->Adminusers_model->active_writers($config["per_page"], $page);
                $writers["links"]   = $this->pagination->create_links();

                
                $this->load->view('opmaster/template/header', $writers);
                $this->load->view('opmaster/template/admin-sidewriters'); 
                $this->load->view('opmaster/writers/admin-writers');
        }

        public function check_online_adm(){
            $online_writers = $this->Adminusers_model->check_online_adm();
            if($online_writers){
                echo json_encode($online_writers);
             }
        }


        public function check_online_adm_cli()
        {
                    $online_writers = $this->Adminusers_model->check_online_adm_cli();
                if($online_writers){
                    echo json_encode($online_writers);
                }
                
        }
        

        public function false_writers()
        {
                $writers['Title']   = 'All Writers';
                $config                = array();
                $config["base_url"]    = base_url() . "Adminwriters/false_writers";
                // $config["total_rows"]  = $this->Adminusers_model->count_falsewriters();
                $config["per_page"]    = 20;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $writers["writers"] = $this->Adminusers_model->false_writers($config["per_page"], $page);
                $writers["links"]   = $this->pagination->create_links();
                
                $this->load->view('opmaster/template/header', $writers);
                $this->load->view('opmaster/template/admin-sidewriters'); 
                $this->load->view('opmaster/writers/admin-writers');
        }



        public function suspended_writers()
        {
                $writers['Title']   = 'All Writers';
                $config                = array();
                $config["base_url"]    = base_url() . "Adminwriters/false_writers";
                $config["total_rows"]  = $this->Adminusers_model->count_suspendedwriters();
                $config["per_page"]    = 20;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $writers["writers"] = $this->Adminusers_model->suspended_writers($config["per_page"], $page);
                $writers["links"]   = $this->pagination->create_links();
                
                $this->load->view('opmaster/template/header', $writers);
                $this->load->view('opmaster/template/admin-sidewriters'); 
                $this->load->view('opmaster/writers/admin-writers');
        }

        public function deactivated_writers()
        {
                $writers['Title']   = 'All Writers';
                $config                = array();
                $config["base_url"]    = base_url() . "Adminwriters/false_writers";
                $config["total_rows"]  = $this->Adminusers_model->count_deactivatedwriters();
                $config["per_page"]    = 20;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $writers["writers"] = $this->Adminusers_model->deactivated_writers($config["per_page"], $page);
                $writers["links"]   = $this->pagination->create_links();
                
                $this->load->view('opmaster/template/header', $writers);
                $this->load->view('opmaster/template/admin-sidewriters'); 
                $this->load->view('opmaster/writers/admin-writers');
        }





        public function view_writer($writer_id = NULL)
        {

                    $data['upload_folder'] = $this->Siteconfigs_model->upload_folder(1);
                    $data['upload']         = $data['upload_folder']['upload'];
                    $data['news_item'] = $this->Adminusers_model->get_students($writer_id);
                    
                    if (empty($data['news_item'])) {
                            // $this->index();
                             redirect(ci_site_url().'Adminwriters/writers');
                    }
                    $data['orders']  = $this->Adminorders_model->getThisManOrders($writer_id);
                    
                    $data['firstname']      = $data['news_item']['firstname'];
                    $data['writer_level']   = $data['news_item']['writer_level'];
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
                    $data['who']            = $data['news_item']['user_level'];
                    
                    $data['order_rating'] = $this->Messages_model->writer_rating($writer_id);
                     $data['writers_accounts'] = $this->Financial_model->writers_accounts($writer_id);
                    $this->load->view('opmaster/template/header', $data);
                    if($data['who'] === 'client'){
                        $this->load->view('opmaster/template/admin-sideclients');
                    } else {
                        $this->load->view('opmaster/template/admin-sidewriters');
                    }

                    $this->load->view('opmaster/writers/admin-viewwriter', $data);
                
             
        }

                public function new_writer()
        {
                
                
                $this->load->helper('form');
                $this->load->library('form_validation');
                $data['country'] = $this->Siteconfigs_model->get_country_writers();
                $data['states']  = $this->Siteconfigs_model->get_usa_states();
                $data['subject'] = $this->students_model->get_subject();
                $data['title']   = 'Editor Sign up';
                
                $this->form_validation->set_rules('firstname', 'firstname', 'required');
                $this->form_validation->set_rules('text', 'Text', 'required');
                $this->form_validation->set_rules('lastname', 'lastname', 'required');
                $this->form_validation->set_rules('gender', 'gender', 'required');
                $this->form_validation->set_rules('city', 'city', 'required');
                $this->form_validation->set_rules('streetaddress', 'streetaddress', 'required');
                $this->form_validation->set_rules('zip', 'zip', 'required');
                $this->form_validation->set_rules('country', 'country', 'required');
                $this->form_validation->set_rules('state', 'state', 'required');
                $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[writers.email]');
                $this->form_validation->set_rules('password', 'password', 'trim|required');
                $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
                $this->form_validation->set_rules('primaryphone', 'primaryphone', 'required');
                $this->form_validation->set_rules('nativelanguage', 'nativelanguage', 'required');
                $this->form_validation->set_rules('academiclevel', 'academiclevel', '');
                
                $data['max_writerid']       = $this->Siteconfigs_model->max_writerid();
                $writer_id = $data['max_writerid']['writer_id']+1;


                if ($this->form_validation->run() === TRUE) {
                        $this->load->helper('url');
                        
                        $slug          = url_title($this->input->post('firstname'), 'dash', TRUE);
                        $writer_status = 'FALSE';
                        $user_level    = 'writer';
                        $profile_img   = 'placeholder.png';
                        $subjecta      = $this->input->post('subject');
                        $subject       = implode(', ', $subjecta);                        

                        $citationa      = $this->input->post('citation');
                        $citation       = implode(', ', $citationa);
                        
                        $data = array(
                                'firstname' => $this->input->post('firstname'),
                                'slug' => $slug,
                                'lastname' => $this->input->post('lastname'),
                                // 'gender' => $this->input->post('gender'),
                                'text' => $this->input->post('text'),
                                'country' => $this->input->post('country'),
                                'zip' => $this->input->post('zip'),
                                'streetaddress' => $this->input->post('streetaddress'),
                                'state' => $this->input->post('state'),
                                'city' => $this->input->post('city'),
                                'email' => $this->input->post('email'),
                                'password' => md5($this->input->post('password')),
                                'primaryphone' => $this->input->post('primaryphone'),
                                // 'availability' => $this->input->post('availability'),
                                'citation' => $citation,
                                'nativelanguage' => $this->input->post('nativelanguage'),
                                'academiclevel' => $this->input->post('academiclevel'),
                                'subject' => $subject,
                                'writer_status' => $writer_status,
                                'user_level' => $user_level,
                                'writer_id' => $writer_id,
                                'profile_img' => $profile_img
                                
                        );
                        
                        $this->students_model->freelancer_register($data);
                        $this->User_model->delete_key($this->input->post('email'));
                        
                        
                        // the variables to be used in emails when sendign to admin and writer
                        $useremail     = $this->input->post('email');
                        $userfirstname = $this->input->post('firstname');
                        $userlastname  = $this->input->post('lastname');
                        $usercountry   = $this->input->post('country');
                        $userwriterid  = $writer_id;
                        $siteurl       = base_url();
                        $userpassword  = $this->input->post('password');
                        
                        // get the email details here and eval so that the codes can be read. 
                        $data['msg']     = $this->Siteconfigs_model->msg_config('new_writer_registers');
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
                        
                        $this->email->subject("Новый автор" . $userwriterid . " заерегистрировался на сайте");
                        $this->email->message($str1);
                        
                        if ($this->email->send()) {
                                //Success email Sent
                                //echo $this->email->print_debugger();
                        } else {
                                //Email Failed To Send
                                // echo $this->email->print_debugger();
                        }
                        
                        //send email to user to confirm posted sucessfully 
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
                        
                        $this->email->from($smtp_user, $smtp_name);
                        $this->email->to($this->input->post('email'));
                        
                        $this->email->subject("Вы успешно зарегистрировались на " . $siteurl);
                        $this->email->message($str2);
                        
                        if ($this->email->send()) {
                                //Success email Sent
                                //echo $this->email->print_debugger();
                        } else {
                                //Email Failed To Send
                                // echo $this->email->print_debugger();
                        }
                        
                         redirect('Adminwriters/view_writer/'. $writer_id);
                } else {
                $this->load->view('opmaster/template/header');
                $this->load->view('opmaster/template/admin-sidewriters');
                $this->load->view('opmaster/writers/admin-addwriter', $data);
                        
                }
        }
        
                 public function edit_writer($writer_id = NULL)
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
                        redirect('Adminwriters/view_writer/'.$this->input->post('writer_id'));
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        } 


        public function edit_password_writer($writer_id = NULL)
        {
                
                $this->form_validation->set_rules('writer_id', 'writer_id', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $writer_id          = $this->input->post('writer_id');
                        $data = array(
                                'password' => md5($this->input->post('password')),
                        );
                        
                        $this->Adminusers_model->edit_user($writer_id, $data);
                        redirect('Adminwriters/view_writer/'.$this->input->post('writer_id'));
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }

                public function change_status($writer_id = NULL)
        {
                $email     = $this->input->post('email');
                $firstname = $this->input->post('firstname');
                $this->form_validation->set_rules('writer_status', 'writer_status', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $writer_id     = $this->input->post('writer_id');
                        $writer_status = $this->input->post('writer_status');
                        
                        $data = array(
                                'writer_status' => $this->input->post('writer_status')
                        );
                        
                        $this->Ordersed_model->writer_update($writer_id, $data);

                        
                        // defin ethe varibales 
                        $useremail         = $this->input->post('email');
                        $userfirstname     = $this->input->post('firstname');
                        $userwriter_id     = $this->input->post('writer_id');
                        $userwriter_status = $this->input->post('writer_status');
                        $accStatus = 'Включен';
                        if($userwriter_status === "False"){
                            $accStatus = "Отключен";
                        } 
                        // get the email details here and eval so that the codes can be read. 
                        $data['msg']       = $this->Siteconfigs_model->msg_config('writer_status_changed');
                        $msg_body_admin    = $data['msg']['msg_body_admin'];
                        $msg_body_writer   = $data['msg']['msg_body_writer'];
                        
                        //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                        $msg_body_admin  = str_replace('"', "'", $msg_body_admin);
                        $msg_body_writer = str_replace('"', "'", $msg_body_writer);
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str1 = \"$msg_body_admin\";");
                        //echo $str1; 
                        
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str2 = \"$msg_body_writer\";");
                        //echo $str2; 
                        
                        
                        
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
                        
                        //send email to admin to notify of status change
                        $this->email->from($smtp_user, $smtp_name);
                        $this->email->to($admin_email);
                        
                        $this->email->newSubject("Автор " . $userwriter_id . ' был успешно обновлен до ' . $userwriter_status);
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
                        
                        // send message to writer to notify of accoutn status change
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
                        
                        $this->email->from($smtp_user, $smtp_name);
                        $this->email->to($this->input->post('email'));

                        $this->email->newSubject("Ваш аккаунт был " . $accStatus);
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
                         redirect('Adminwriters/view_writer/'.$this->input->post('writer_id'));
                        
                        
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
                
                
        }    

// ==================
        public function mngrDeleteNotice(){
            $id = $this->input->post('id');
            $colName = $this->input->post('colName');
            $this->Ordersed_model->mngrDeleteNotice($id, $colName);      
        }
        
        public function del_viev_mes(){        
            $orderid = $this->input->post('orderid');
            $data = array(
                    'viewed' => 'true'
            );
            $this->Ordersed_model->order_update($orderid, $data); 
        }  

        public function del_viev_usr(){ 
            $writer_id = $this->input->post('writer_id');
            $data = array(
                    'viewed' => 'true'
            );
            $this->Ordersed_model->writer_update($writer_id, $data);
        } 

      public function del_viev_bid(){ 
            $orderid = $this->input->post('orderid');
            $data = array(
                    'viewed' => 'true'
            );
            $this->Ordersed_model->del_viev_bid($orderid, $data);
        }  

    public function del_viev_file(){ 
        $order_id = $this->input->post('order_id');
        $data = array(
                'viewed' => 'true'
        );
        $this->Ordersed_model->del_viev_file($order_id, $data);
    } 

        public function del_viev_mess(){ 
            $orderid = $this->input->post('orderid');
            $data = array(
                    'viewed' => 'true'
            );
            $this->Ordersed_model->del_viev_mess($orderid, $data);                
        } 
// ===============

}