<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
	// ------------------------------------------------------------------------
 
	function getUsersListHelper()
	{
		$ci=& get_instance();
        $ci->load->database(); 

        $sql = "select * from writers order by id"; 
        $query = $ci->db->query($sql);
		 $result = $query->result();
		//echo $ci->db->last_query();		
        return $query;
		
		
		/*$CI 	=& get_instance();
		$mod 	= $CI->load->model('users_model');
		//$conditions = array('mt_user_details.userID'=>$userId);
		$result = $CI->users_model->getUsers();
		if($result->num_rows()>0)
		{
			$data = $result;	
		} else {
			$data = '';
		}
		return $data;	*/
	}
	
 	
 ?>