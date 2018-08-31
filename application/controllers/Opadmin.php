<?php
if (!defined('BASEPATH'))
        exit('No direct script access allowed');

class Opadmin extends CI_Controller
{
        
        public function __construct()
        {
                parent::__construct();
                $this->load->model('User_model');
                $this->load->model('Messages_model');
                $this->load->model('Orders_model');
                $this->load->model('Siteconfigs_model');
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
            if(1){
                redirect('opadmin/login');
            }
        }
        
        public function login()
        {


                // check if user is logged in it renders profile page else when user is not logged in it renders log in form. The check is by the firstname of the user in session 
                if (!$this->session->userdata('firstname')) {
                        $this->load->view('opmaster/admin-login');
                } else {
                        redirect('opmaster');
                }
                
        }
        
        
        public function password_reset()
        {

                $this->load->view('templates/header');
                $this->load->view('user/resetpassword');
                $this->load->view('templates/footer');
                
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
                        redirect('opadmin/login');
                        //  $this->load->view('templates/right_sidebar');

                } else {
                        if ($query) {
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
                                        'profile_img' => $query[0]->profile_img
                                );
                                
                                // When one sucessfully logs in he is directed to myaccount page. This is loacted in views/myaccount
                                $this->session->set_userdata($user);
                       $email    = $this->input->post('email');
                       $data = array(
                                'loggedin' => "YES"
                        );
                        // session_write_close();
                        $this->User_model->loggedin($email, $data);

                                redirect('opmaster/dashboard');
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