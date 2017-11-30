<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('stuLoginUser')) 
{
	function stuLoginUser()
	{
		$_CI = &get_instance();
		
		$UserName		 = $_CI->input->post('userid');
		$UserPass		 = $_CI->input->post('password');
		
		
		$UserDetails	  = $_CI->M_crud->findById('stu_registration', array('student_id' => $UserName));
		//$UserFullDetails  = $_CI->M_crud->findById('stu_registration', array('student_id' => $UserName));
		
		 if( !empty($UserDetails) && $UserDetails->password == $UserPass && $UserDetails->status == 'Active'){
		    setUserData($UserName, $UserDetails->stu_auto_id);	 // TO SET DATA IN SESSION FIELD	
			  redirect('studentHome'); 
		 
		} else {
		    $_CI->session->set_userdata(array('msg' => "You Are Not Valid User"));
			redirect('studentLogin', $data);
		}
	}
}

// TO SET DATA IN UserName SESSION FIELD
if ( ! function_exists('setUserData'))
{
	function setUserData($UserName,$userAutoId)
	{
		$_CI = &get_instance();
		$userData	= array(
			'UserName'    	=> $UserName,
			'userAutoId'    	=> $userAutoId
		);
		$_CI->session->set_userdata($userData);
	}
}


if ( ! function_exists('getUserName'))
{
	function getUserName()
	{
		$_CI = &get_instance();
		return $_CI->session->userdata('UserName');
		return $_CI->session->userdata('userAutoId');
	}
}




if ( ! function_exists('invalidUserData'))
{
	function invalidUserData()
	{
		setUserData(NULL, NULL);
	}
}


if ( ! function_exists('isActiveUser'))
{
	function isActiveUser()
	{
		return getUserName() != NULL;
	}
}

if ( ! function_exists('isAuthenticate'))
{
	function isAuthenticate()
	{
		if(!isActiveUser()) {
			redirect('studentLogin');	
		} else {
			return true;	
		}
	}
}


if ( ! function_exists('stuLogoutUser'))
{
	function stuLogoutUser()
	{
		invalidUserData();
		if(!isActiveUser()){
			redirect('studentLogin');
		}
	}
}


