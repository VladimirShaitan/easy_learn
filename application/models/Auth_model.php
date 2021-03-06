<?php

class Auth_model extends CI_Model {
	 
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
	 function setUserSession($row=NULL)
	 {
	 	
		 //print_r($row); exit();ci_users.

		$values = array(
		'writer_id'=>$row->writer_id,
		'logged_in'=>TRUE,
		'email'=>$row->email,
		'profile_img'=>$row->profile_img,
		'loggedin'=>$row->loggedin,
		'firstname'=>$row->firstname,
		'lastname'=>$row->lastname
		);
		$this->session->set_userdata($values);
		//print_r($this->session->all_userdata()); exit();
	 }//End of setUserSession Function
	 
	 
	 
	 
	  function setUserCookie($name='',$value ='',$expire = '',$domain='',$path = '/',$prefix ='')
	 {
	 		 $cookie = array(
                   'name'   =>$name,
                   'value'  => $value,
                   'expire' => $expire,
                   'domain' => $domain,
                   'path'   => $path,
                   'prefix' => $prefix,
               );
			   set_cookie($cookie); 
	 }//End of setUserCookie Function	

		
		
	 function getUserCookie($name='')
	 {
		 $val=get_cookie($name,TRUE); 
		return $val;
	 }//End of getUserCookie Function		
	 
 
	  function clearUserCookie($name=array())
	 {
	 	foreach($name as $val)
		{
			delete_cookie($val);
		}	
	 }//End of clearSession Function*/
	 

	// --------------------------------------------------------------------
		
	/**
	 * clearUserSession
	 *
	 * @access	private
	 * @param	array	conditions to fetch data
	 * @return	object	object with result set
	 */
	 function clearUserSession()
	 {
	 	$array_items = array(
		'writer_id' => '',
		'logged_in'=>'',
		'email'=> '',
		'profile_img'=> '',
		'firstname'=> '',
		'lastname'=> '',
		'loggedin'=> '');

 				
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();  // sh
		
		
	 }//End of clearSession Function
	 
}
// End Auth_model Class
   
/* End of file Auth_model.php */ 
/* Location: ./app/models/Auth_model.php */