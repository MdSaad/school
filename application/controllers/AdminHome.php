<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminHome extends CI_Controller {

	const  Title	 = 'VMGPS&#65515;Admin Panel';
	
	static $model 	 = array('M_crud');
	static $helper   = array('url', 'authentication');

	
	public function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->model(self::$model);
		$this->load->helper('url');
		$this->load->helper(self::$helper);
		$this->load->library('session');
		$this->load->library('email');
		isAuthenticate();
	}
	
	
	public function index()
	{
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where = array(), $orderBy = 'id', $serialized = 'desc');
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy = 'id', $serialized = 'desc');
		}
		$data['findAccessModule'] =  $this->M_crud->findAll('user_accesable_module', $where = array('user_id' =>$authorID), 'id' , 'asc');
		
		//print_r($data['findAccessModule']);
		$data['authorType'] = $this->session->usertype;
		
		$data['title'] = self::Title;
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		$this->load->view('common/dashboard', $data);
	}
}
