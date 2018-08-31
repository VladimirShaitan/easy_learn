<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Twitter extends CI_Controller
{
    function __construct() {
		parent::__construct();
		//Load user model
		$this->load->model('clients_model');
		$this->load->model('Siteconfigs_model');
		$this->config->load('twitter_config');
    }
    
    public function index(){
		$userData = array();
		
		//Include the twitter oauth php libraries
		include_once APPPATH."libraries/twitter/twitteroauth.php";
		
		//Twitter API Configuration
		$consumerKey = $this->config->item('consumerKey');
		$consumerSecret = $this->config->item('consumerSecret');
		$oauthCallback = $this->config->item('oauthCallback');

		echo $this->config->item('consumerKey');
		
		//Get existing token and token secret from session
		$sessToken = $this->session->userdata('token');
		$sessTokenSecret = $this->session->userdata('token_secret');
	
	//echo $this->session->userdata('token');
		//Get status and user info from session
		$sessStatus = $this->session->userdata('status');
		$sessUserData = $this->session->userdata('userData');
		
		if(isset($sessStatus) && $sessStatus == 'verified'){
			//Connect and get latest tweets
			$connection = new TwitterOAuth($consumerKey, $consumerSecret, $sessUserData['accessToken']['oauth_token'], $sessUserData['accessToken']['oauth_token_secret']); 
			$data['tweets'] = $connection->get('statuses/user_timeline', array('screen_name' => $sessUserData['username'], 'count' => 5));

			//User info from session
			$userData = $sessUserData;
		}elseif(isset($_REQUEST['oauth_token']) && $sessToken == $_REQUEST['oauth_token']){
			//Successful response returns oauth_token, oauth_token_secret, user_id, and screen_name
			$connection = new TwitterOAuth($consumerKey, $consumerSecret, $sessToken, $sessTokenSecret); //print_r($connection);die;
			$accessToken = $connection->getAccessToken($_REQUEST['oauth_verifier']);
			if($connection->http_code == '200'){
				//Get user profile info
				$params = array('include_email' => 'true', 'include_entities' => 'true', 'skip_status' => 'true');
				$userInfo = $connection->get('account/verify_credentials', $params);
				          echo $userInfo->tw_user_name;

                   $data['max_writerid']       = $this->Siteconfigs_model->max_writerid();
                      $max_writerid = $data['max_writerid']['writer_id']+1;       
                      $fbpassword = md5('qwerty');
				//Preparing data for database insertion
         // echo $userInfo->email;


          $data['client_email'] = $this->Siteconfigs_model->get_user_client($userInfo->email);
                                $client_email         = $data['client_email']['email'];
                                $fbpassword         = $data['client_email']['password'];

                                if($client_email){
                            
                              $loginemail         = $client_email;
                               $loginpassword     = $fbpassword;
                                
                                $this->session->set_flashdata('email',$loginemail);
                                $this->session->set_flashdata('pass',$loginpassword);
                                redirect('example/signin');


                                }

if(!$client_email){
$fbpassword = md5('qwerty');
				$name = explode(" ",$userInfo->name);
				$first_name = isset($name[0])?$name[0]:'';
				$last_name = isset($name[1])?$name[1]:'';
				$userData = array(
					'firstname' => $first_name,
					'lastname' => $last_name,
					'email' => $userInfo->email,
					'loggedin' => 1,
					 'password' => $fbpassword,
					 'user_level' => 'client',
                    'writer_id' => $max_writerid,
				);
				

				//Insert or update user data
				 $this->clients_model->customer_register($userData);

				 // set the variables that will be sent when email is sent
                        $useremail     = $userInfo->email;
                        $userfirstname = $first_name;
                        $userlastname  = $last_name;
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
                        
                              $loginemail         = $userInfo->email;
                               $loginpassword     = $fbpassword;
                                
                                $this->session->set_flashdata('email',$loginemail);
                                $this->session->set_flashdata('pass',$loginpassword);
                                redirect('example/signin');

				
				//Store status and user profile info into session
				$userData['accessToken'] = $accessToken;
				$this->session->set_userdata('status','verified');
				$this->session->set_userdata('userData',$userData);
				
				//Get latest tweets
				$data['tweets'] = $connection->get('statuses/user_timeline', array('screen_name' => $userInfo->screen_name, 'count' => 5));
			} 
			}else{
				$data['error_msg'] = 'Some problem occurred, please try again later!';
			}

		}else{
			//unset token and token secret from session
			$this->session->unset_userdata('token');
			$this->session->unset_userdata('token_secret');
			
			//Fresh authentication
			$connection = new TwitterOAuth($consumerKey, $consumerSecret);
			$requestToken = $connection->getRequestToken($oauthCallback);
			
			//Received token info from twitter
			$this->session->set_userdata('token',$requestToken['oauth_token']);
			$this->session->set_userdata('token_secret',$requestToken['oauth_token_secret']);
			
			//Any value other than 200 is failure, so continue only if http code is 200
			if($connection->http_code == '200'){
				//redirect user to twitter
				$twitterUrl = $connection->getAuthorizeURL($requestToken['oauth_token']);
				$data['oauthURL'] = $twitterUrl;
			}else{
				$twitterUrl = $connection->getAuthorizeURL($requestToken['oauth_token']);
				$data['oauthURL'] = $twitterUrl;
			}
        }

		$data['userData'] = $userData;
		$this->load->view('user_authentication/index',$data);

    }

    public function twit(){
    	redirect($connection->getAuthorizeURL($requestToken['oauth_token']));
    }

	public function logout() {
		$this->session->unset_userdata('token');
		$this->session->unset_userdata('token_secret');
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('userData');
        $this->session->sess_destroy();
		redirect('/user_authentication');
    }
}
