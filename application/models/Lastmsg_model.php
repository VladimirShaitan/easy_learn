<?php

class Lastmsg_model extends CI_Model{

	public $_table = 'ci_last_seen';

	//public $belongs_to = array( 'user' => array('model'=>'Users_model'));

	public function update_lastSeen($user_id)
	{
		$last_msg = $this->db->where('to', $user_id)->order_by('time', 'desc')->get('ci_messages', 1)->row();
		$msg = !empty($last_msg) ? $last_msg->id : 0;

		$record = $this->get_by(array('user_id'=>$user_id));
		$details = array('user_id' => $user_id,'message_id' => $msg);
		if(empty($record))
		{
			$this->insertLast($details);
		}else{
			$updateKey=array('id'=>$record->id);
			$this->updateLast($updateKey, $details);
		}
	}
	
	
	
	
	 public function get_by($conditions=array(),$fields='')
     {
        parent::__construct(); 
		
		
		if(count($conditions)>0)		
	 		$this->db->where($conditions);
			
		$this->db->from('ci_last_seen');

		$this->db->order_by("ci_last_seen.id", "asc");

		
		if($fields!='')
				$this->db->select($fields);
		else 		
	 		$this->db->select('id,user_id,message_id');
		
		$result = $this->db->get();
		
		$row = $result->row();
		
         return $row;
    }
	
	
	
	 function insertLast($insertData=array())
	 {	
	 	parent::__construct(); 
	 	$res = $this->db->insert('ci_last_seen', $insertData);
		$insert_id = $this->db->insert_id();
   		$this->db->trans_complete();
		return $insert_id;
	 }
	 
	 
	 
	 
       function updateLast($updateKey=array(),$updateData=array()) {
	 	
			parent::__construct(); 
			
			$updateID = $this->db->update('ci_last_seen',$updateData,$updateKey);
 		  	if($updateID) return true;
		  	else return false;
 		

       } 
	
	
}