<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('chatLoginUser')) 
{
	function chatLoginUser()
	{
		$_CI = &get_instance();
		
		$UserName		 = $_CI->input->post('userid');
		$UserPass		 = $_CI->input->post('password');
		$type		 	 = $_CI->input->post('type');
		
		$UserDetails	 = $_CI->M_crud_ayenal->findById('all_chat_user_registration', array('user_name' => $UserName));
		
		 if( !empty($UserDetails) && $UserDetails->password == $UserPass && $UserDetails->user_type == $type && $UserDetails->user_status == 'active'){
		    setUserData($UserName, $UserDetails->user_type);	 // TO SET DATA IN SESSION FIELD	
	          $data['online_status']  = "active";
		      $_CI->M_crud_ayenal->update('all_chat_user_registration', $data, array('id' => $UserDetails->id));
			  redirect('liveChat'); 
		 
		} else {
		    $_CI->session->set_userdata(array('msg' => "You Are Not Valid User"));
			redirect('livechatLogin', $data);
		}
	}
}

// TO SET DATA IN UserName SESSION FIELD
if ( ! function_exists('setUserData'))
{
	function setUserData($UserName,$userType)
	{
		$_CI = &get_instance();
		$userData	= array(
			'UserId'    	=> $UserName,
			'userType'    	=> $userType
		);
		$_CI->session->set_userdata($userData);
	}
}


if ( ! function_exists('getUserName'))
{
	function getUserName()
	{
		$_CI = &get_instance();
		return $_CI->session->userdata('UserId');
	}
}

if ( ! function_exists('getUserType'))
{
	function getUserType()
	{
		$_CI = &get_instance();
		return $_CI->session->userdata('userType');
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
			redirect('livechatLogin');	
		} else {
			return true;	
		}
	}
}


if ( ! function_exists('chatLogoutUser'))
{
	function chatLogoutUser()
	{
		invalidUserData();
		if(!isActiveUser()){
			redirect('livechatLogin');
		}
	}
}


