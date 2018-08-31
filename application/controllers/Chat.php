<?php 
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 require_once("Pre_loader.php");

 class Chat extends Pre_loader {
 //class Chat extends CI_Controller {

	//Global variable  
    public $outputData;		//Holds the output data for each view
	public $loggedInUser;
 	protected $smiley_url = 'application/assets/images/smileys';
	
 		
	public function index()
    {
		
		//$this->load->model('users_model');
		
		//Load the session library
		//$this->load->library('session');	
		
		$sessionUserID = $this->session->userdata('writer_id');
		if(!$sessionUserID) 
			redirect('home');
		
		//Get all users
		$this->outputData['favouriteUsers']	= $this->Users_model->getUsers();
		
		
		$fields='';
		$userdata  = $this->Users_model->getUser(array('writer_id'=>$sessionUserID),$fields); 
		$this->outputData['user_status'] = $userdata;
						
						
		 //$this->load->view('chat/userList',$this->outputData);
    }
	
	
	
	
	
	
// *******************************************************************************************************	
	
   public function chatheartbeat(){
	   
	    $this->load->model('Lastmsg_model');
		 $this->load->model('Users_model'); 
		
		
		$this->load->library('session'); 	
		$this->load->model('Message_model');
	    $new_exists = false;
		$user_id 	= $this->session->userdata('writer_id');
		$conditions =  array('user_id'=>$user_id);
		$fields='id,user_id,message_id';
		
		 $last_seen  = $this->Lastmsg_model->get_by($conditions,$fields);  //echo $this->db->last_query();
		 //print_r($last_seen);
		$last_seen  = empty($last_seen) ? 0 : $last_seen->message_id;
		
		$exists = $this->Message_model->latest_message($user_id, $last_seen);
		  //echo $last_seen;
		 // echo $this->db->last_query();
		if($exists){
			$new_exists = true;
		}
		// THIS WHOLE SECTION NEED A GOOD OVERHAUL TO CHANGE THE FUNCTIONALITY
	    if ($new_exists) {
	        $new_messages = $this->Message_model->unread($user_id);
			$thread = array();
			$senders = array();
			foreach ($new_messages as $message) {
				if(!isset($senders[$message->from])){
					$senders[$message->from]['count'] = 1; 
				}
				else{
					$senders[$message->from]['count'] += 1; 
				}
				$conditions =  array('writer_id'=>$message->from);
				$owner = $this->Users_model->getUser($conditions);
				//echo $this->db->last_query();
				$chat = array(
					'msg' 		=> $message->id,
					'sender' 	=> $message->from, 
					'recipient' => $message->to,
					'avatar' 	=> $owner->profile_img != '' ? $owner->profile_img : 'no-image.jpg',
					'body' 		=>  parse_smileys($message->message, $this->config->base_url().$this->smiley_url), 
					'time' 		=> date("Y, M j, g:i a", strtotime($message->time)),
					'type'		=> $message->from == $user_id ? 'out' : 'in',
					'name'		=> $message->from == $user_id ? 'You' : ucwords($owner->firstname)
					);
				array_push($thread, $chat);
			}

			$groups = array();
			foreach ($senders as $key=>$sender) {
				$sender = array('user'=> $key, 'count'=>$sender['count']);
				array_push($groups, $sender);
			}
			// END OF THE SECTION THAT NEEDS OVERHAUL DESIGN
			$user_id 	= $this->session->userdata('writer_id');
			$this->Lastmsg_model->update_lastSeen($user_id);
//echo $this->db->last_query();
			$response = array(
				'success' => true,
				'messages' => $thread,
				'senders' =>$groups
			);

			//add the header here
			header('Content-Type: application/json');
			echo json_encode( $response );
	    } 
	}






// ************************************************************************************

public function load_messages(){
		
		$this->load->model('Lastmsg_model');
		$this->load->model('Users_model');
		
		/*$this->load->library('session');	*/
		$this->load->model('Message_model');
		$this->load->helper('Smiley');
		
		//get paginated messages 
		$per_page = 5;
		$user 		= $this->session->userdata('writer_id');
		$buddy 		= $this->input->post('user');
		$limit 		= isset($_POST['limit']) ? $this->input->post('limit') : $per_page ;

		$messages 	= array_reverse($this->Message_model->conversation($user, $buddy, $limit));
		//echo $this->db->last_query();	
//print_r($messages);		
		$total 		= $this->Message_model->thread_len($user, $buddy);
//echo $this->db->last_query();	

		$thread = array();
		foreach ($messages as $message) {
			$conditions =  array('writer_id'=>$message->from);
			$owner = $this->Users_model->getUser($conditions);
			//print_r($owner );
			$chat = array(
				'msg' 		=> $message->id,
				'sender' 	=> $message->from, 
				'recipient' => $message->to,
				'avatar' 	=> $owner->profile_img != '' ? $owner->profile_img : 'no-image.jpg',
				'body' 		=>  parse_smileys($message->message, $this->config->base_url().$this->smiley_url),
				'time' 		=> date("Y, M j, g:i a", strtotime($message->time)),
				'type'		=> $message->from == $user ? 'out' : 'in',
				'name'		=> $message->from == $user ? 'You' : ucwords($owner->firstname)
				);
			array_push($thread, $chat);
		}

		$chatbuddy = $this->Users_model->getUser(array('writer_id'=>$buddy));

		$contact = array(
			'name'=>ucwords($chatbuddy->firstname.' '.$chatbuddy->lastname),
			'status'=>$chatbuddy->loggedin,
			'id'=>$chatbuddy->writer_id,
			'limit'=>$limit + $per_page,
			'more' => $total  <= $limit ? false : true, 
			'scroll'=> $limit > $per_page  ?  false : true,
			'remaining'=> $total - $limit
			);


		$response = array(
					'success' => true,
					'errors'  => '',
					'message' => '',
					'buddy'	  => $contact,
					'thread'  => $thread
					);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode( $response );
	}
	
	
	
	
	
	
	
	
	
	
	public function send_message(){
		
		$this->load->model('Lastmsg_model');
		$this->load->model('Users_model');
		
		 $this->load->library('session'); 
		$this->load->model('Message_model');
		$this->load->helper('smiley');
		
		$logged_user = $this->session->userdata('writer_id');
		$buddy 		= $this->input->post('user');
		$message 	= $this->input->post('message');
		if($message != '' && $buddy != '')
		{
			
			$insertData = array(
						'from' 		=> $logged_user,
						'to' 		=> $buddy,
						'message' 	=> $message/*,
						'message' 	=> $message,*/
					);
			
			 $msg_id = $this->Message_model->insertMessage($insertData);
			$msg = $this->Message_model->getMsg(array('id'=>$msg_id));



			$owner = $this->Users_model->getUser(array('writer_id'=>$logged_user));
 //echo $this->db->last_query();			
			// print_r($logged_user);
			 //
			 
			$chat = array(
				'msg' 		=> $msg->id,
				'sender' 	=> $msg->from, 
				'recipient' => $msg->to,
				 'avatar' 	=> $owner->profile_img != '' ? $owner->profile_img : 'no-image.jpg',
				 'body' 	 =>  parse_smileys($msg->message, $this->config->base_url().$this->smiley_url),
				'time' 		=> date("Y, M j, g:i a", strtotime($msg->time)),
				'type'		=> $msg->from == $logged_user ? 'out' : 'in',
				'name'		=> $msg->from == $logged_user ? 'You' : ucwords($owner->firstname)
				);

			$response = array(
				'success' => true,
				'message' => $chat 	  
				);
		}
		else{
			  $response = array(
				'success' => false,
				'message' => 'Empty fields exists'
				);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode( $response );
	}	
	
	
	
	
	
	 public function delete_messages(){
		
		$this->load->model('Lastmsg_model');
		//$this->load->model('users_model');
		$this->load->model('Message_model');
		//$this->load->library('session');	
		
		$this->load->helper('smiley');
		
		$userID = $this->session->userdata('writer_id');
 		$messageIDStr 	= trim($this->input->post('message'));
		if($messageIDStr != '' && $userID != '')
		{
			
 			 $result = $this->Message_model->deleteMessage($messageIDStr,$userID);
  			$response = array(
				'success' => true,
				'message' => 1  
				);
		}
		else{
			  $response = array(
				'success' => false,
				'message' => 0
				);
		}
		
		//echo $this->db->last_query();
		
		//add the header here
		header('Content-Type: application/json');
		echo json_encode( $response );
	}	
	


	
	
	
	
	public function mark_read(){
		$this->load->model('Lastmsg_model');
		//$this->load->model('users_model');
		$this->load->model('Message_model');
		//$this->load->library('session');	
		
		$this->load->helper('smiley');
		
		$this->Message_model->mark_read();
	}
	
	
	
	
	public function change_status(){
		
		$this->load->model('Message_model');
		//$this->load->library('session');	
		
		$userID = $this->session->userdata('writer_id');
		$status 	= $this->input->post('status');
		
		$updateData = array('loggedin'=>$status);
		$res = $this->Message_model->updateStatus($userID, $updateData);	
		if($res) {
			$response = array('success' => true, 'status'=> $status);
			//add the header here
			header('Content-Type: application/json');
			echo json_encode( $response );
		}
	}
	
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

