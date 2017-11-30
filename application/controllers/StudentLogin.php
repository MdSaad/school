<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentLogin extends CI_Controller {

	const  Title	 = 'VMGPS-Admin Panel';
	
	static $model 	 = array('M_admin', 'M_crud');
	static $helper   = array('url', 'stuauthentication');

	
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
		$data['msg']   = $this->session->userdata('msg');
		$data['title'] = 'VMGPS&#65515;Student Login Panel';
		$this->session->set_userdata(array('msg' => ""));
		$this->load->view('studentLoginPage', $data);
	}
	
	public function authenticate()
	{
		stuLoginUser();
	}
	
	public function logout() {
		stuLogoutUser();
	}

}


