<?php

class Message_model extends CI_Model{

	public $message_rules = array(
		    'message' => array (
					'field' => 'message',
					'label' => 'message',
					'rules' => 'trim|required|xss_clean'
			)
		);
	
	public function __construct()
        {
                $this->load->database();
        }	
		
	public function conversation($user, $chatbuddy, $limit = 5){
        $this->db->where('from', $user);
        $this->db->where('to', $chatbuddy);
        $this->db->or_where('from', $chatbuddy);
        $this->db->where('to', $user);
        $this->db->order_by('id', 'desc');
        $messages = $this->db->get('ci_messages', $limit);

        $this->db->where('to', $user)->where('from',$chatbuddy)->update('ci_messages', array('is_read'=>'1'));
        return $messages->result();
	}
	
	
	
	
	
	public function thread_len($user, $chatbuddy){
        $this->db->where('from', $user);
        $this->db->where('to', $chatbuddy);
        $this->db->or_where('from', $chatbuddy);
        $this->db->where('to', $user);
        $this->db->order_by('id', 'desc');
        $messages = $this->db->count_all_results('ci_messages');
        return $messages;
	}

	public function latest_message($user, $last_seen){
		$message  =  $this->db->where('to', $user)
							  ->where('id  > ', $last_seen) // try with = mark  .... >>>>>>>>>>>>>>>>>>>>>>>>>>.
							  ->order_by('time', 'desc')
							  ->get('ci_messages', 1);

		if($message->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}

	public function new_messages($user, $last_seen){
		$messages  =  $this->db->where('to', $user)
							  ->where('id  > ', $last_seen)
							  ->order_by('time', 'asc')
							  ->get('ci_messages');

		return $messages->result();
	}
	
	
	

	public function unread($user){
		$messages  =  $this->db->where('to', $user)
							  ->where('is_read', '0')
							  ->order_by('time', 'asc')
							  ->get('ci_messages');

		return $messages->result();
	}
	
	
	
	
	public function mark_read(){
		$id = $this->input->post('id');
		$this->db->where('id', $id)->update('ci_messages', array('is_read'=>'1'));
	}
	
	
	
	

	public function unread_per_user($id, $from){
		$count  =  $this->db->where('to', $id)
							->where('from', $from)
							->where('is_read', '0')
							->count_all_results('ci_messages');
		return $count;
	}
	
	
	
	public function getMsg($conditions=array(),$fields='')
	 {
	 	
		parent::__construct(); 
		
		
		if(count($conditions)>0)		
	 		$this->db->where($conditions);
			
		$this->db->from('ci_messages');

		$this->db->order_by("ci_messages.id", "asc");

		
		if($fields!='')
				$this->db->select($fields);
		else 		
	 		$this->db->select('id,from,to,message,is_read,time');
		
		$result = $this->db->get();
 		
		$row = $result->row();
		
		return $row;
		

      }//End of getUsers Function
	  
	  
	  
	  
	  public function insertMessage($insertData=array())
	 {	
	 	parent::__construct(); 
	 	$res = $this->db->insert('ci_messages', $insertData);
		$insert_id = $this->db->insert_id();
   		$this->db->trans_complete();
		return $insert_id;
	 }//End of createUser Function
	 
	 
	 
	 
	  public function deleteMessage($messageIDStr,$userID) {
 		 
		 parent::__construct(); 
		 
  		if($messageIDStr != '' && $userID != '') {	
	 		
			$msgArr = explode(',',$messageIDStr);
			for($i=0; $i<count($msgArr)-1; $i++) {
				$msg_id = $msgArr[$i];
				$conditions = array(
						'id' 		=> $msg_id/*,
						'from' 		=> $userID*/
					);
				//print_r($conditions);
 				$this->db->where($conditions);
				$res = $this->db->delete('ci_messages');
			}
		}
  		   if($res) return true;
		   else return false;
 	 }
	 
	 
	 
	  public function updateStatus($userID,$updateData=array())
	 {	
	 	parent::__construct(); 
	 	$res = $this->db->update('writers',$updateData,array('writer_id'=>$userID));
		if($res) return true;
		   else return false;
	 } 
	  
	  
}