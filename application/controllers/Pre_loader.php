<?php

class Pre_loader extends CI_Controller {

    //public $outputData;		//Holds the output data for each view
	public $outputData = array();	
	public $loggedInUser;
 	protected $smiley_url = 'application/assets/images/smileys';
	
	public $login_user;
    protected $access_type = "";
    protected $allowed_members = array();

    function __construct() {
        parent::__construct();
		//$this->lang->load('admin/default', 'english');
		
        //Load the session library
		$this->load->library('session');
		 $this->load->model('Users_model');
		 $this->load->model('User_model');
		$this->load->model('Auth_model');
		$this->load->helper('users');
		
		//check user's login status, if not logged in redirect to signin page
        $sessionUserID = $this->session->userdata('writer_id');
		 //if(!$sessionUserID) 
		 //redirect('user/login'); 


//$currntContllr = $this->router->fetch_class();

//if(isset($currntContllr) && $currntContllrusers

        //initialize login users required information
        //$this->login_user = $this->Users_model->get_access_info($login_user_id);
		
		//Get all users
		//$this->outputData['favouriteUsers']	= $this->users_model->getUsers();
		
		
				
		$usersAlldata  = $this->Users_model->getUsers(); 
		//$this->outputData['users_all'] = $usersAlldata;
		
		$fields='loggedin';
		$userdata  = $this->Users_model->getUser(array('writer_id'=>$sessionUserID),$fields); 
		//$this->outputData['user_status'] = $userdata;
		
		$outputData = array(
			'users_all' => $usersAlldata,
			'user_status' => $userdata
		);
		
		 //$this->load->view('chat/commonchat',$outputData);
		
        //initialize login users access permissions
        /*if ($this->login_user->user_type) {
            $permissions = unserialize($this->login_user->permissions);
            $this->login_user->permissions = is_array($permissions) ? $permissions : array();
        } else {
            $this->login_user->permissions = array();
        }*/
    }

    
}