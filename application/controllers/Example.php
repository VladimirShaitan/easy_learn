<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Example extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// Load library and url helper
		$this->load->library('facebook');
		$this->load->helper('url');
		$this->load->model('User_model');
		$this->load->model('Siteconfigs_model');
		$this->load->model('clients_model');
	}

	// ------------------------------------------------------------------------

	/**
	 * Index page
	 */
	public function index()
	{
		$this->load->view('examples/start');
	}

	// ------------------------------------------------------------------------

	/**
	 * Web redirect login example page
	 */
	public function web_login()
	{
		$data['user'] = array();

		// Check if user is logged in
		if ($this->facebook->is_authenticated())
		{
			// User logged in, get user details
			$user = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,location');
			if (!isset($user['error']))
			{
				$data['user'] = $user;

			

                              $data['client_email'] = $this->Siteconfigs_model->get_user_client($user['email']);
                                $client_email         = $data['client_email']['email'];
                                $fbpassword         = $data['client_email']['password'];



                                if($client_email){
                            
                            	$loginemail         = $user['email'];
                               $loginpassword     = $fbpassword;
                                
                                $this->session->set_flashdata('email',$loginemail);
                                $this->session->set_flashdata('pass',$loginpassword);
                                redirect('example/signin');


                                }


                                if(!$client_email){

//******** stand of registraion **********/

                   $data['max_writerid']       = $this->Siteconfigs_model->max_writerid();
                      $max_writerid = $data['max_writerid']['writer_id']+1;       
                      $fbpassword = md5('qwerty');

                        $data = array(
                                'firstname' => $user['first_name'],
                                'lastname' => $user['last_name'],
                                'email' => $user['email'],
                                'loggedin' => 1,
                                'password' => $fbpassword,
                               // 'primaryphone' => $this->input->post('primaryphone'),
                                //'country' => $user['location'],
                                'user_level' => 'client',
                                'writer_id' => $max_writerid,
                                
                                
                        );
                        $this->clients_model->customer_register($data);
                        
                        
                        // set the variables that will be sent when email is sent
                        $useremail     = $user['email'];
                        $userfirstname = $user['first_name'];
                        $userlastname  = $user['last_name'];
                        $clientuserid  = $max_writerid;
                        $siteurl       = base_url();
                        $userpassword  = 'qwerty';
                        
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
                        $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->data['emailn']);
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
                        
                        $this->email->subject("New customer " . $clientuserid . " registerred on your site");
                        $this->email->message($str1);
                        
                        if ($this->email->send()) {
                                //Success email Sent
                                //echo $this->email->print_debugger();
                        } else {
                                //Email Failed To Send
                                // echo $this->email->print_debugger();
                        }
                        
                        //send email to user to confirm posted sucessfully 
                        
                        
                        
                        $this->email->from($smtp_user, $smtp_name);
                        $this->email->to($this->input->post('email'));
                        
                        $this->email->subject("You have successfully registered with " . $siteurl);
                        $this->email->message($str2);
                        
                        if ($this->email->send()) {
                                //Success email Sent
                                //echo $this->email->print_debugger();
                        } else {
                                //Email Failed To Send
                                // echo $this->email->print_debugger();
                        }
                        
                            	$loginemail         = $user['email'];
                               $loginpassword     = $fbpassword;
                                
                                $this->session->set_flashdata('email',$loginemail);
                                $this->session->set_flashdata('pass',$loginpassword);
                                redirect('example/signin');

///********** end of registration and log *******/

                                }


			}


		}

		// display view
		$this->load->view('template/header');
		$this->load->view('pages/signup', $data);
		 $this->load->view('template/footer');    
	}

         function signin()
        {

                

                $email    = trim($this->session->flashdata('email'));
                $password = trim($this->session->flashdata('pass'));
               // $password = md5($this->session->flashdata('pass'));
                
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

	// ------------------------------------------------------------------------

	/**
	 * JS SDK login example
	 */
	public function js_login()
	{
		// Load view
		$this->load->view('examples/js');
	}

	// ------------------------------------------------------------------------

	/**
	 * AJAX request method for positing to facebook feed
	 */
	public function post()
	{
		header('Content-Type: application/json');

		$result = $this->facebook->request(
			'post',
			'/me/feed',
			['message' => $this->input->post('message')]
		);

		echo json_encode($result);
	}

	// ------------------------------------------------------------------------

	/**
	 * Logout for web redirect example
	 *
	 * @return  [type]  [description]
	 */
	public function logout()
	{
		$this->facebook->destroy_session();
		redirect('example/web_login', redirect);
	}



        
}
