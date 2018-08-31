<?php
class Users_model extends CI_Model {
	 
	/**
	 * Constructor 
	 *
	 */
	 
	function __Construct()
    {
        parent::__Construct();
    }
	
	
	// --------------------------------------------------------------------
		
	/**
	 * Get Users
	 *
	 * @access	private
	 * @param	array	conditions to fetch data
	 * @return	object	object with result set
	 */
	 function getUsers($conditions=array(),$fields='')
	 {
	 	
		parent::__construct(); 
		
		
		if(count($conditions)>0)		
	 		$this->db->where($conditions);
			
		$this->db->from('writers');

		$this->db->order_by("firstname", "asc");

		
		if($fields!='')
				$this->db->select($fields);
		else 		
	 		$this->db->select('id,writer_id,firstname,lastname,loggedin,email,profile_img,user_level');
		
		$result = $this->db->get();
		
		return $result;
		

      }//End of getUsers Function
	  
	  
	  
	  
	  
	  function getUser($conditions=array(),$fields='') {
	 	
		parent::__construct(); 
		
		
		if(count($conditions)>0)		
	 		$this->db->where($conditions);
			
		$this->db->from('writers');

		$this->db->order_by("writer_id", "asc");

		
		if($fields!='')
				$this->db->select($fields);
		else 		
	 		$this->db->select('id,writer_id,firstname,loggedin,email,lastname,profile_img,user_level');
		
		$result = $this->db->get();
 		
		$row = $result->row();
		
		return $row;
		

      }//End of getUsers Function
	 





			
	 
	  function getLoggedInUser() 
	  {

	 	$user = '';
            
			if($this->session->userdata('writer_id') !='') { 
				$condition = array('writer_id'=>$this->session->userdata('writer_id'));
				$fields    = 'writer_id,firstname,email,loggedin,lastname,profile_img';
				
				$query = $this->getUsers($condition,$fields);
				
				if($query->num_rows()>0)
				{
					$user = $query->row();				
				}
			}
			
		return $user;
	 }//End of getDecryptedString Function
	 
	 
	 // --------------------------------------------------------------------
	  
	  
	 function updateUser($updateKey=array(),$updateData=array())
	 {
	    $this->db->update('writers',$updateData,$updateKey);
	 }//End of editGroup Function 
	 
	//-----------------------------------------------------------------------------------
	 
	 
	 
	 function flash_message($type,$message)
	 {
	 	switch($type)
		{
			case 'success':
					$data = '<div class="message"><div class="alert alert-success">'.$message.'</div></div>';
					break;
			case 'error':
					$data = '<div class="message"><div class="alert alert-danger">'.$message.'</div></div>';
					break;		
		}
		return $data;
	 }//End of flash_message Function





 }