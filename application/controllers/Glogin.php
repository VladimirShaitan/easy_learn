<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Glogin extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model("books_model");
        $this->load->model('Siteconfigs_model');
        $this->config->load('google_config');
        $this->load->library('facebook');
       $this->load->helper('url');
    $this->load->model('User_model');
    $this->load->model('clients_model');
    }

    public function index(){
       $this->load->view("books/goo");

    }



function glogin()
    {
            // Fill CLIENT ID, CLIENT SECRET ID, REDIRECT URI from Google Developer Console
        $client_id = $this->config->item('client_id');
        $client_secret = $this->config->item('client_secret');
        $redirect_uri = base_url('glogin/gcallback');

        //Create Client Request to access Google API
        $client = new Google_Client();
        $client->setApplicationName("Opskill");
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->addScope("email");
        $client->addScope("profile");

        //Send Client Request
        $objOAuthService = new Google_Service_Oauth2($client);
        
        $authUrl = $client->createAuthUrl();
        
        header('Location: '.$authUrl);
    }

    function gcallback()
    {

            // Fill CLIENT ID, CLIENT SECRET ID, REDIRECT URI from Google Developer Console
        $client_id = $this->config->item('client_id');
        $client_secret = $this->config->item('client_secret');
        $redirect_uri = base_url('glogin/gcallback');

    //Create Client Request to access Google API
    $client = new Google_Client();
    $client->setApplicationName("Opskill");
    $client->setClientId($client_id);
    $client->setClientSecret($client_secret);
    $client->setRedirectUri($redirect_uri);
    $client->addScope("email");
    $client->addScope("profile");

    //Send Client Request
    $service = new Google_Service_Oauth2($client);

    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    
    // User information retrieval starts..............................

    $user = $service->userinfo->get(); //get user info 

    echo "</br> User ID :".$user->id; 
    echo "</br> First Name :".$user->given_name;
    echo "</br> Family Name :".$user->family_name;
    echo "</br> Gender :".$user->gender;
    echo "</br> User Email :".$user->email;
    echo "</br> User Email :".$user->locale;
    echo "</br> User Link :".$user->link;    
    echo "</br><img src='$user->picture' height='200' width='200' > ";




    /************ start google registration ************/
                              $data['client_email'] = $this->Siteconfigs_model->get_user_client($user->email);
                                $client_email         = $data['client_email']['email'];
                                $fbpassword         = $data['client_email']['password'];

                                if($client_email){
                            
                              $loginemail         = $user->email;
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
                                'firstname' => $user->given_name,
                                'lastname' => $user->family_name,
                                'email' => $user->email,
                               // 'gender' => $user->gender,
                                'loggedin' => 1,
                                'password' => $fbpassword,
                               // 'primaryphone' => $this->input->post('primaryphone'),
                                //'country' => $user['location'],
                                'user_level' => 'client',
                                'writer_id' => $max_writerid,
                                
                                
                        );
                        $this->clients_model->customer_register($data);
                        
                        
                        // set the variables that will be sent when email is sent
                        $useremail     = $user->email;
                        $userfirstname = $user->given_name;
                        $userlastname  = $user->family_name;
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
                        
                        $this->email->subject("Новый заказчик " . $clientuserid . " зарегистрировался на сайте");
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
                        
                        $this->email->subject("Вы успешно зарегистрировались на сайте " . $siteurl);
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



    /************* end of google log in ****************/
       
    }

    public function facebook(){
        redirect($this->facebook->login_url());
    }


}
?>