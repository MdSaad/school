<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LivechatLogin extends CI_Controller {

	const  Title	 = 'VMGPS-Admin Panel';
	
	static $model 	 = array('M_admin', 'M_crud_ayenal', 'M_join_ayenal','M_crud', 'M_join');
	static $helper   = array('url', 'chatauthentication');

	
	public function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->model(self::$model);
		$this->load->helper('url');
		$this->load->helper(self::$helper);
		$this->load->library('session');
		$this->load->library('email');
	}
	
	
	public function index()
	{
		$data['msg']		= $this->session->userdata('msg');
		$data['title'] 		= 'VMGPS&#65515;ChatLogin Panel';
		$this->session->set_userdata(array('msg' => ""));
		$this->load->view('chatLoginPage', $data);
	}

	public function registration()
	{
		
		$data['title'] 		= 'VMGPS&#65515;ChatRegistration';
		$this->load->view('liveChat/registrationPage', $data);
	}

	
	public function registrationAction()
	{	
		
		$data['full_name'] 		= $this->input->post('full_name');
		$data['user_type'] 		= $this->input->post('user_type');
		$data['user_name'] 		= $this->input->post('user_name');
		$data['password'] 		= $this->input->post('password');
		$data['email'] 			= $this->input->post('email');
		$data['gender'] 		= $this->input->post('gender');
		$data['user_status'] 	= $this->input->post('user_status');
		$image		 			= $this->input->post('user_photo');
	
		if(!empty($image)){
			$data['image'] = $image;	
		}
		
	    $this->db->insert('all_chat_user_registration', $data); 
		
	}

	public function chkUserName()
	{	
		
		$user_name 		= $this->input->post('user_name');
        $insertChk      = $this->M_crud_ayenal->findById('all_chat_user_registration', array('user_name' => $user_name));

        if(!empty($insertChk)){
        	echo "1";
        } else {
          echo "0";	
        }

	}
		
	
	public function authenticate()
	{
		chatLoginUser();
	}
	
	public function logout() {

		if( isActiveUser() ) {
	       $userId  		 = getUserName();
		   $userDetails      = $this->M_crud_ayenal->findById('all_chat_user_registration', array('user_name' => $userId));
		   $data['online_status']  = "";
	       $this->M_crud_ayenal->update('all_chat_user_registration', $data, array('id' => $userDetails->id));
	    }	
		chatLogoutUser();
	}

}


