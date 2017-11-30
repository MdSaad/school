<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin extends CI_Controller {

	const  Title	 = 'VMGPS-Admin Panel';
	
	static $model 	 = array('M_admin', 'M_crud');
	static $helper   = array('url', 'authentication');

	
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
		$data['msg']		= '';
		$data['title'] = 'VMGPS&#65515;Login Panel';
		$this->load->view('loginPage', $data);
	}
	
	public function authenticate()
	{
		loginUser();
	}
	
	public function logout() {
		logoutUser();
	}

}


