<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('loginUser')) 
{
	function loginUser()
	{
		$_CI = &get_instance();
		
		$userid		 	 = $_CI->input->post('userid');
		$UserPass		 = $_CI->input->post('password');
		$type		 	 = $_CI->input->post('type');
		
		
		$UserDetails	 = $_CI->M_admin->findByUserName('superadmin',$userid);
		$UserBranchDetails	 = $_CI->M_crud->findById($table = 'branch_list_manage',$where = array('id' =>$UserDetails->user_branch_id));
		
		if( !empty($UserDetails) && $UserDetails->password == $UserPass && $UserDetails->status == "Active"){
			setUserData($UserDetails->id, $UserDetails->type, $UserDetails->user_branch_id, $UserDetails->user_full_name, $UserDetails->user_name, $UserBranchDetails->branch_name, $UserBranchDetails->address);	 // TO SET DATA IN SESSION FIELD	
			if($UserDetails->type == $type) {
				if($type =='adminStaff'){
				   redirect('feeCollectionApproveHome'); 
				}else{
				   redirect('adminHome'); 	
				}
			} else {
				$data['msg']   = 'Sorry Your Domain Type is Wrong';
				$data['title'] = 'SMSC&#65515;Login Panel';
				$_CI->load->view('loginPage', $data);
			}
		 
		} else {
			$data['msg']   = 'You Are Not Valid User';
			$data['title'] = 'SMSC&#65515;Login Panel';
			$_CI->load->view('loginPage', $data);
		}
	}
}

// TO SET DATA IN UserName SESSION FIELD
if ( ! function_exists('setUserData'))
{
	function setUserData($userid, $admin_type ,$authorBranchID, $authorName, $loginName, $branchName, $autohorBranchAddress)
	{
		$_CI = &get_instance();
		$userData	= array(
			'userid'    	=> $userid, 'usertype'  => $admin_type, 'authorBranchID'  => $authorBranchID, 'authorName'  => $authorName, 'loginName'  => $loginName, 'branchName' =>$branchName, 'autohorBranchAddress' => $autohorBranchAddress
		);
		$_CI->session->set_userdata($userData);
	}
}


if ( ! function_exists('getUserName'))
{
	function getUserName()
	{
		$_CI = &get_instance();
		return $_CI->session->userdata('userid');
		return $_CI->session->userdata('authorName');
		return $_CI->session->userdata('usertype');
		return $_CI->session->userdata('authorBranchID');
		return $_CI->session->userdata('loginName');
		return $_CI->session->userdata('branchName');
	}
}


if ( ! function_exists('invalidUserData'))
{
	function invalidUserData()
	{
		setUserData(NULL,NULL,NULL, NULL,NULL, NULL);
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
			redirect('adminLogin');	
		} else {
			return true;	
		}
	}
}


if ( ! function_exists('logoutUser'))
{
	function logoutUser()
	{
		invalidUserData();
		if(!isActiveUser()){
			redirect('adminLogin');
		}
	}
}



if ( ! function_exists('branchList'))
{
	function branchList()
	{
		$_CI = &get_instance();
		$authorID = $_CI->session->userid;
		$authorType = $_CI->session->usertype;
		$authorBranchID = $_CI->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$info =  $_CI->M_crud->findAll('branch_list_manage', array(), 'id', 'asc');
		} else {
		$info  =  $_CI->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID),  'id', 'asc');
		}
		
		$response	='<option value="" selected="selected">Select Campus</option>';
		foreach($info as $v) {
			$response	.='<option value="'.$v->id.'">'.$v->branch_name.'</option>';
		}
		return $response;
	}
}

if ( ! function_exists('classList'))
{
	function classList()
	{
		$_CI = &get_instance();
		$info 			=  $_CI->M_crud->findAll('class_list_manage', $where = array(), $order = 'sl_no', $serialized = 'asc');
		$response	='<option value="" selected="selected">Select Class</option>';
		foreach($info as $v) {
			$response	.='<option value="'.$v->id.'">'.$v->class_name.'</option>';
		}
		return $response;
	}
}

if ( ! function_exists('groupList'))
{
	function groupList()
	{
		$_CI = &get_instance();
		$info 			=  $_CI->M_crud->findAll('group_list_manage', $where = array(), $orderBy = 'id' , 'asc');
		$response	='<option value="" selected="selected">Select Group</option>';
		foreach($info as $v) {
			$response	.='<option value="'.$v->id.'">'.$v->group_name.'</option>';
		}
		return $response;
	}
}

if ( ! function_exists('sectionList'))
{
	function sectionList()
	{
		$_CI = &get_instance();
		$info 			=  $_CI->M_crud->findAll('section_list_manage', $where = array(), $orderBy = 'id' , 'asc');
		$response	='<option value="" selected="selected">Select Section</option>';
		foreach($info as $v) {
			$response	.='<option value="'.$v->id.'">'.$v->section_name.'</option>';
		}
		return $response;
	}
}

if ( ! function_exists('shiftList'))
{
	function shiftList()
	{
		$_CI = &get_instance();
		$info 			=  $_CI->M_crud->findAll('shift_list_manage', $where = array(), $orderBy = 'id' , 'asc');
		$response	='<option value="" selected="selected">Select Shift</option>';
		foreach($info as $v) {
			$response	.='<option value="'.$v->id.'">'.$v->shift_name.'</option>';
		}
		return $response;
	}
}

if ( ! function_exists('rollList'))
{
	function rollList()
	{
		
		$response	='<option value="" selected="selected">Select Roll</option>';
		for($i=1; $i<=150; $i++) {
			$response	.='<option value="'.$i.'">'.sprintf("%02d",$i).'</option>';
		}
		return $response;
	}
}

if ( ! function_exists('examList'))
{
	function examList()
	{
		$_CI = &get_instance();
		$info 			=  $_CI->M_crud->findAll('all_exam_type_manage', $where = array(), $orderBy = 'id' , 'asc');
		$response	='<option value="" selected="selected">Select Exam</option>';
		foreach($info as $v) {
			$response	.='<option value="'.$v->id.'">'.$v->exam_type_name.'</option>';
		}
		return $response;
	}
}


if ( ! function_exists('genderList'))
{
	function genderList()
	{
		$_CI = &get_instance();
		$response	='<option value="" selected="selected">Select Gender</option>
					 <option value="M" >Male</option>
					 <option value="F" >Female</option>';
			
		return $response;
	}
}

// ------------------------------------------------------------------------
/* End of file authentication_helper.php */
/* Location: ./application/helpers/authentication_helper.php */