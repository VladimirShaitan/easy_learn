<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
        
        public function __construct()
        {
                parent::__construct();
                $this->load->model('students_model');
                $this->load->model('Orders_model');
                $this->load->model('User_model');
                $this->load->helper('url_helper');
                $this->config->load('twitter_config');
				$this->load->library('facebook');
                $this->load->library(array(
                        'form_validation',
                        'session'
                ));                
        }

        public function index(){
            if(1){
                redirect('home/home');
            }
        }
        
        public function home()
        {
                // this is the home page of this site. When logged out. 
                if (!$this->session->userdata('writer_id')) {
                $this->load->library('pagination');
                $config                = array();
                $config["base_url"]    = base_url() . "skills/topwriters";
                $config["total_rows"]  = $this->students_model->cget_writers();
                $config["per_page"]    = 4;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["topwriters"] = $this->students_model->getwriters($config["per_page"], $page);
                $data["links"]   = $this->pagination->create_links();
                $data['lastten'] = $this->Orders_model->lastten();

                     $data['title']   = 'Students List';
                        $this->load->view('template/header');
                        $this->load->view('pages/home', $data);
                        $this->load->view('template/footer');
                        
                } else {
                     redirect('user/myaccount');
                }
        }
                    
        public function howitworks (){
           $this->load->view('template/header');
            $this->load->view('pages/how-it-works');
           $this->load->view('template/footer');
        }

        public function latestorders (){
            $this->load->view('template/header');
            $this->load->view('pages/latest-orders');
            $this->load->view('template/footer');
        }

        public function aboutus (){
            $this->load->view('template/header');
            $this->load->view('pages/about-us');
            $this->load->view('template/footer');
        }



        public function signup()
        {
                if (!$this->session->userdata('firstname')) {


        //             // Tweeter needs this for authentication ofseesion variables 

        // $userData = array();
        
        // //Include the twitter oauth php libraries
        // include_once APPPATH."libraries/twitter/twitteroauth.php";
        
        // //Twitter API Configuration
        // $consumerKey = $this->config->item('consumerKey');
        // $consumerSecret = $this->config->item('consumerSecret');
        // $oauthCallback = $this->config->item('oauthCallback');
        
        // //Get existing token and token secret from session
        // $sessToken = $this->session->userdata('token');
        // $sessTokenSecret = $this->session->userdata('token_secret');
        
        // //Get status and user info from session
        // $sessStatus = $this->session->userdata('status');
        // $sessUserData = $this->session->userdata('userData');
        
        // if(isset($sessStatus) && $sessStatus == 'verified'){
        //     //Connect and get latest tweets
        //     $connection = new TwitterOAuth($consumerKey, $consumerSecret, $sessUserData['accessToken']['oauth_token'], $sessUserData['accessToken']['oauth_token_secret']); 
        //     $data['tweets'] = $connection->get('statuses/user_timeline', array('screen_name' => $sessUserData['username'], 'count' => 5));

        //     //User info from session
        //     $userData = $sessUserData;
        // }elseif(isset($_REQUEST['oauth_token']) && $sessToken == $_REQUEST['oauth_token']){
        //     //Successful response returns oauth_token, oauth_token_secret, user_id, and screen_name
        //     $connection = new TwitterOAuth($consumerKey, $consumerSecret, $sessToken, $sessTokenSecret); //print_r($connection);die;
        //     $accessToken = $connection->getAccessToken($_REQUEST['oauth_verifier']);
        //     if($connection->http_code == '200'){
        //         //Get user profile info
        //         $userInfo = $connection->get('account/verify_credentials');

        //         //Preparing data for database insertion
        //         $name = explode(" ",$userInfo->name);
        //         $first_name = isset($name[0])?$name[0]:'';
        //         $last_name = isset($name[1])?$name[1]:'';
        //         $userData = array(
        //             'oauth_provider' => 'twitter',
        //             'oauth_uid' => $userInfo->id,
        //             'username' => $userInfo->screen_name,
        //             'first_name' => $first_name,
        //             'last_name' => $last_name,
        //             'locale' => $userInfo->lang,
        //             'profile_url' => 'https://twitter.com/'.$userInfo->screen_name,
        //             'picture_url' => $userInfo->profile_image_url
        //         );
                
        //         //Insert or update user data
        //         $userID = $this->user->checkUser($userData);
                
        //         //Store status and user profile info into session
        //         $userData['accessToken'] = $accessToken;
        //         $this->session->set_userdata('status','verified');
        //         $this->session->set_userdata('userData',$userData);
                
        //         //Get latest tweets
        //         $data['tweets'] = $connection->get('statuses/user_timeline', array('screen_name' => $userInfo->screen_name, 'count' => 5));
        //     }else{
        //         $data['error_msg'] = 'Some problem occurred, please try again later!';
        //     }
        // }else{
        //     //unset token and token secret from session
        //     $this->session->unset_userdata('token');
        //     $this->session->unset_userdata('token_secret');
            
        //     //Fresh authentication
        //     $connection = new TwitterOAuth($consumerKey, $consumerSecret);
        //     $requestToken = $connection->getRequestToken($oauthCallback);
            
        //     //Received token info from twitter
        //     $this->session->set_userdata('token',$requestToken['oauth_token']);
        //     $this->session->set_userdata('token_secret',$requestToken['oauth_token_secret']);
            
        //     //Any value other than 200 is failure, so continue only if http code is 200
        //     if($connection->http_code == '200'){
        //         //redirect user to twitter
        //         $twitterUrl = $connection->getAuthorizeURL($requestToken['oauth_token']);
        //         $data['oauthURL'] = $twitterUrl;
        //     }else{
        //         $data['oauthURL'] = base_url().'twritter';
        //         $data['error_msg'] = 'Error connecting to twitter! try again later!';
        //     }
        // }
        // $data['userData'] = $userData;


                    // end of twitter authentication
                        $this->load->view('template/header');
                        $this->load->view('pages/signup'); //$data
                        $this->load->view('template/footer');
                } else {
                    redirect('user/myaccount');
                }
        }
                     
        public function sitemap()
        {
                $this->load->library('pagination');
                $orders['Title']    = 'Orders';
                $config                = array();
                $config["base_url"]    = base_url() . "home/sitemap";
                $config["total_rows"]  = $this->Orders_model->count_sitemap();
                $config["per_page"]    = 15000;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["orders"] = $this->Orders_model->sitemap($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                
             $this->load->view('sitemap', $orders);

        }                    
        
        public function qsitemap()
        {
                $this->load->library('pagination');
                $orders['Title']    = 'Questions';
                $config                = array();
                $config["base_url"]    = base_url() . "home/sitemap";
                $config["total_rows"]  = $this->Orders_model->qcount_sitemap();
                $config["per_page"]    = 15000;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["orders"] = $this->Orders_model->question_sitemap($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                
             $this->load->view('sitemap', $orders);

        }
        
        public function qsitemap1()
        {
                $this->load->library('pagination');
                $orders['Title']    = 'Questions';
                $config                = array();
                $config["base_url"]    = base_url() . "home/sitemap";
                $config["total_rows"]  = $this->Orders_model->qcount_sitemap1();
                $config["per_page"]    = 15000;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["orders"] = $this->Orders_model->question_sitemap1($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                
             $this->load->view('sitemap', $orders);

        }        
        public function qsitemap2()
        {
                $this->load->library('pagination');
                $orders['Title']    = 'Questions';
                $config                = array();
                $config["base_url"]    = base_url() . "home/sitemap";
                $config["total_rows"]  = $this->Orders_model->qcount_sitemap2();
                $config["per_page"]    = 15000;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["orders"] = $this->Orders_model->question_sitemap2($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                
             $this->load->view('sitemap', $orders);

        }        
        public function qsitemap3()
        {
                $this->load->library('pagination');
                $orders['Title']    = 'Questions';
                $config                = array();
                $config["base_url"]    = base_url() . "home/sitemap";
                $config["total_rows"]  = $this->Orders_model->qcount_sitemap3();
                $config["per_page"]    = 15000;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["orders"] = $this->Orders_model->question_sitemap3($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                
             $this->load->view('sitemap', $orders);

        }        
        public function qsitemap4()
        {
                $this->load->library('pagination');
                $orders['Title']    = 'Questions';
                $config                = array();
                $config["base_url"]    = base_url() . "home/sitemap";
                $config["total_rows"]  = $this->Orders_model->qcount_sitemap4();
                $config["per_page"]    = 15000;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["orders"] = $this->Orders_model->question_sitemap4($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                
             $this->load->view('sitemap', $orders);

        }        
        public function qsitemap5()
        {
                $this->load->library('pagination');
                $orders['Title']    = 'Questions';
                $config                = array();
                $config["base_url"]    = base_url() . "home/sitemap";
                $config["total_rows"]  = $this->Orders_model->qcount_sitemap5();
                $config["per_page"]    = 15000;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["orders"] = $this->Orders_model->question_sitemap5($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                
             $this->load->view('sitemap', $orders);

        }        
        public function qsitemap6()
        {
                $this->load->library('pagination');
                $orders['Title']    = 'Questions';
                $config                = array();
                $config["base_url"]    = base_url() . "home/sitemap";
                $config["total_rows"]  = $this->Orders_model->qcount_sitemap6();
                $config["per_page"]    = 15000;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["orders"] = $this->Orders_model->question_sitemap6($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                
             $this->load->view('sitemap', $orders);

        }        
        public function qsitemap7()
        {
                $this->load->library('pagination');
                $orders['Title']    = 'Questions';
                $config                = array();
                $config["base_url"]    = base_url() . "home/sitemap";
                $config["total_rows"]  = $this->Orders_model->qcount_sitemap7();
                $config["per_page"]    = 15000;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["orders"] = $this->Orders_model->question_sitemap7($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                
             $this->load->view('sitemap', $orders);

        }        
        public function qsitemap8()
        {
                $this->load->library('pagination');
                $orders['Title']    = 'Questions';
                $config                = array();
                $config["base_url"]    = base_url() . "home/sitemap";
                $config["total_rows"]  = $this->Orders_model->qcount_sitemap8();
                $config["per_page"]    = 15000;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["orders"] = $this->Orders_model->question_sitemap8($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                
             $this->load->view('sitemap', $orders);

        }        
        public function qsitemap9()
        {
                $this->load->library('pagination');
                $orders['Title']    = 'Questions';
                $config                = array();
                $config["base_url"]    = base_url() . "home/sitemap";
                $config["total_rows"]  = $this->Orders_model->qcount_sitemap9();
                $config["per_page"]    = 15000;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["orders"] = $this->Orders_model->question_sitemap9($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                
             $this->load->view('sitemap', $orders);

        }


        
}
