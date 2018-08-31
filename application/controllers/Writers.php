<?php
class Writers extends CI_Controller
{
        
        public function __construct()
        {
                parent::__construct();
                $this->load->model('students_model');
                $this->load->model('Messages_model');
                $this->load->model('Siteconfigs_model');
                $this->load->model('User_model');
                $this->load->model('Orders_model');
                $this->load->helper('url_helper');
                $this->load->library('session');
                
        }
        
        public function index()
        {
                
                $data['writers'] = $this->students_model->get_writers();
                $data['title']   = 'Students List';
                $this->load->view('template/header', $data);
                $this->load->view('pages/top-writers', $data);
                $this->load->view('template/footer');
        }
        
        public function view($writer_id = NULL)
        {

            
                $writerid = $writer_id;

                $data['news_item']    = $this->students_model->get_students($writer_id);
                $data['order_rating'] = $this->Messages_model->writer_rating($writer_id);
                $data['writerpay']    = $this->Messages_model->average_ratings($writer_id);
                if (empty($data['news_item'])) {
                        $this->index();
                }
                
                $data['firstname']    = $data['news_item']['firstname'];
                $data['writer_id']    = $data['news_item']['writer_id'];
                $data['text']         = $data['news_item']['text'];
                $data['id']           = $data['news_item']['id'];
                $data['lastname']     = $data['news_item']['lastname'];
                $data['gender']       = $data['news_item']['gender'];
                $data['city']         = $data['news_item']['city'];
                $data['country']      = $data['news_item']['country'];
                $data['subject']      = $data['news_item']['subject'];
                $data['email']        = $data['news_item']['email'];
                $data['password']     = $data['news_item']['password'];
                $data['primaryphone'] = $data['news_item']['primaryphone'];
                $data['availability'] = $data['news_item']['availability'];
                $data['profile_img']  = $data['news_item']['profile_img'];
                
                
                $this->load->view('template/header');
                $this->load->view('pages/view-writer', $data);
                $this->load->view('template/footer');
        }
        
        public function university($abbname = NULL)
        {
                $university['uni'] = $this->students_model->get_universities($abbname);
                
                if (empty($university['uni'])) {
                        $this->index();
                }
                
                $university['id']       = $university['uni']['id'];
                $university['abbname']  = $university['uni']['abbname'];
                $university['uni_name'] = $university['uni']['uni_name'];
                
                $this->load->view('templates/header', $university);
                $this->load->view('Students/university', $university);
                $this->load->view('templates/footer');
        }
        
        public function subject($subject = NULL)
        {
                $subject['subject'] = $this->students_model->get_subject($subject);
                
                if (empty($subject['subject'])) {
                        $this->index();
                }
                
                $subject['subject'] = $subject['subject']['subject'];
        }
        
        public function check_card(){
            $card = $this->input->post('nativelanguage');
            $data = array (
                'nativelanguage' => $card,
            );
            $isExist = $this->User_model->check_card($data);
            echo $isExist;
        }


        public function check_user_by_email(){
            $email = $this->input->post('email');
            $data = array ('email' => $email);
            $isExist = $this->User_model->check_user_by_email($data);
            echo $isExist;
        }
        //  This is for writer's registration. 
public function writer_register($temp_key = NULL)
{
        
        $data['verify_temp_key'] = $this->User_model->temp_key_ver($temp_key);
        $data['email']           = $data['verify_temp_key']['email'];
        $data['temp_key']        = $data['verify_temp_key']['temp_key'];
        $data['title']           = 'Customer Sign up';
        
        $ver_temp_key = $data['verify_temp_key']['temp_key'];
        
        if (empty($ver_temp_key)) {
                redirect("home/signup");
        }
                        
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['country'] = $this->Siteconfigs_model->get_country_writers();
        $data['states']  = $this->Siteconfigs_model->get_usa_states();
        $data['subject'] = $this->students_model->get_subject();
        $data['title']   = 'Editor Sign up';
        

        $data['max_writerid']       = $this->Siteconfigs_model->max_writerid();
        $max_writerid = $data['max_writerid']['writer_id']+1;
        $this->form_validation->set_rules('firstname', 'firstname', 'required');
        $this->form_validation->set_rules('text', 'О себе', '');
        $this->form_validation->set_rules('lastname', 'lastname', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[writers.email]');
        $this->form_validation->set_rules('password', '"пароль"', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('cpassword', '"подтверждение пароля"', 'required|matches[password]');
        $this->form_validation->set_rules('primaryphone', '"телефон"', 'required');
        $this->form_validation->set_rules('nativelanguage', '"номер счета"', 'required');
        $this->form_validation->set_rules('academiclevel', 'academiclevel', '');
        
        if ($this->form_validation->run() === TRUE) {
                $this->load->helper('url');
                
                $slug = url_title($this->input->post('firstname'), 'dash', TRUE);
                $writer_status = 'Active';
                $user_level = 'writer';
                $subjecta = $this->input->post('subject');
                $subject  = implode(', ', $subjecta);                        
                $citationa = $this->input->post('citation');
                $citation = implode(', ', $citationa);
                
                $data = array(
                        'firstname' => $this->input->post('firstname'),
                        'slug' => $slug,
                        'lastname' => $this->input->post('lastname'),
                        'text' => $this->input->post('text'),
                        'email' => $this->input->post('email'),
                        'password' => md5($this->input->post('password')),
                        'primaryphone' => $this->input->post('primaryphone'),
                        'citation' => $citation,
                        'nativelanguage' => $this->input->post('nativelanguage'),
                        'academiclevel' => $this->input->post('academiclevel'),
                        'subject' => $subject,
                        'writer_status' => $writer_status,
                        'user_level' => $user_level,
                        'writer_id' => $max_writerid,
                        'viewed' => 'false'    
                );
                
                $this->students_model->freelancer_register($data);
                $this->User_model->delete_key($this->input->post('email'));
                $this->Orders_model->mngrNewUserNotice();
                
                
                // the variables to be used in emails when sendign to admin and writer
                $useremail     = $this->input->post('email');
                $userfirstname = $this->input->post('firstname');
                $userlastname  = $this->input->post('lastname');
              /*  $usercountry   = $this->input->post('country');*/
                $userwriterid  = $max_writerid;
                $siteurl       = ci_site_url();
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
                
                $this->email->newSubject("Новый автор" . $userwriterid . " зарегистрировался на сайте");
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
                
                $this->email->newSubject("Вы успешно зарегистрировались ");
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

                redirect('/writers/signinuser');
        } else {
                $this->load->view('template/header', $data);
                $this->load->view('freelancer/writer-register');
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
                                        'admin_level' => $query[0]->admin_level,
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