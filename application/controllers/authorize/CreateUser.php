<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CreateUser extends CI_Controller {

	const  Title	 = 'SMSC-Admin Panel';
	
	static $model 	 = array('M_admin', 'M_crud', 'M_join');
	static $helper   = array('url', 'authentication');

	
	public function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->model(self::$model);
		$this->load->helper('url');
		$this->load->helper(self::$helper);
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('pagination');
		isAuthenticate();
	}
	
	
	public function index($onset = 0)
	{
		$data['title'] = 'SMSC&#65515;System Settings';
		$data['alertMsg']	= $this->session->userdata('alertMsg');
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		//$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		$data['designationListInfo'] 		=  $this->M_crud->findAll('designation_list', $where, 'dAutoId', $serialized);
		
		$limit = 12;
		$data['userInfo'] 			=  $this->M_crud->findAllAuthorInfo('superadmin', array('delete_status' =>""), 'id', 'desc', $onset, $limit);
		
			
		//$data['allOrderList']    = $this->M_order_info->findAllByCus($customer_id);
		$data['onset'] 			= $onset;
		$config['base_url'] 	= base_url('authorize/createUser/index');
		$config['total_rows'] 	= $this->M_crud->countAllList('superadmin', array());
		$config['uri_segment'] 	= 4;
		$config['per_page'] 	= 12;
		$config['num_links'] 	= 7;
		$config['first_link']	= FALSE;
		$config['last_link'] 	= FALSE;
		$config['prev_link']	= 'Previous';
		$config['next_link'] 	= 'Next';

		$this->pagination->initialize($config); 
		
		$this->session->set_userdata(array('alertMsg' => ''));
		
		$this->load->view('createUser/userInfoPage', $data);
	}
	
	
	
	 public function designationInfoStore()
	{
		$updateId					= $this->input->post('update_id');
		
		$table = 'designation_list';
		$where = array();
		$orderBy = 'dAutoId';
		$serialized = 'asc';
		$zero = 0;
		
		
		$data['designationName']			= $this->input->post('designationName');
		$this->db->insert($table, $data); 
		
		$data2['designationListInfo'] =  $this->M_crud->findAll($table, $where, $orderBy, $serialized);
		$this->load->view('createUser/designationList', $data2);
		 
	}
	
	
	
	 public function adminUserInfoStore()
	{
		$updateId					= $this->input->post('update_id');
		
		$table = 'superadmin';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		$zero = 0;
		
		
		$data['user_name']				= $this->input->post('user_name');
		$data['password']				= $this->input->post('password');
		$data['type']					= $this->input->post('type');
		$data['user_branch_id']			= $this->input->post('user_branch_id');
		$data['user_full_name']			= $this->input->post('user_full_name');
		$data['status']					= $this->input->post('status');
		$data['designation_id']			= $this->input->post('designation_id');
		
		$module							= $this->input->post('module');
		
		//print_r($module);
		if(!empty($updateId)) {
			$this->db->update('superadmin', $data, array('id' => $updateId));
			$this->db->delete('user_accesable_module', array('user_id' => $updateId)); 
			foreach($module as $i => $v) {
			$data2['user_id']	= $updateId;
			$data2['module_name']	= $v;
			$this->db->insert('user_accesable_module', $data2);
			} 
			  
			$this->session->set_userdata(array('alertMsg' => 'Update Successfully'));  
			
		} else {
			$this->db->insert($table, $data); 
			$findLastInsertID =  $this->M_crud->findLastInsert('user_accesable_module', $where = array());
			foreach($module as $i => $v) {
			$data2['user_id']	= $findLastInsertID;
			$data2['module_name']	= $v;
			$this->db->insert('user_accesable_module', $data2); 
			$this->session->set_userdata(array('alertMsg' => 'New Author Added Successfully'));
		  }
		}
		
		
		 
	}

	public function adminUserEditInfo()
	{
		$adminAutoID	= $this->input->post('id');
		$table = 'superadmin';
		$where = array('superadmin.id' => $adminAutoID);
		$orderBy = 'id';
		$serialized = 'asc';
		$findAuthorInfoByID =  $this->M_join->findAuthorInfoByID($table, $where);
		$findAuthorInfoByID->moduleAccessInfo = $this->M_crud->findAll('user_accesable_module', array("user_id" => $adminAutoID), 'id', 'asc');
		echo json_encode($findAuthorInfoByID);
	}
	
	public function chkAuthorExist() {
		$user_name	= $this->input->post('user_name');
		
		$chkAuthorExist	= $this->M_crud->findById($table = 'superadmin',$where = array('user_name' =>$user_name ));
		
		if($chkAuthorExist) {
			echo 0;
		} else {
			echo 1;
		}
	}	
	
	public function chkModuleAccessPermission() {
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		$moduleName	= $this->input->post('moduleName');
		$chkModuleAccessPermission	= $this->M_crud->findById($table = 'user_accesable_module',$where = array('user_id' =>$authorID, 'module_name' => $moduleName ));
		
		if($chkModuleAccessPermission || $authorType == "superadmin") {
			echo 1;
		} else {
			echo 0;
		}
	
	}
	
	
	public function changePassword()
	{
		$data['title'] = 'SMSC&#65515;Change Password';
		$data['alertMsg']	= $this->session->userdata('alertMsg');
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		//$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		$data['designationListInfo'] 		=  $this->M_crud->findAll('designation_list', $where, 'dAutoId', $serialized);
			
		$this->session->set_userdata(array('alertMsg' => ''));
		
		$this->load->view('createUser/changePassword', $data);
	}
	
	public function verifyAuthorPassword() {
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$current_password	= $this->input->post('current_password');
		
		$verifyAuthorPassword	= $this->M_crud->findById($table = 'superadmin',$where = array('id' =>$authorID , 'type' =>$authorType));
		
		if($verifyAuthorPassword->password == $current_password) {
			echo 1;
		} else {
			echo 0;
		}
	}
	
	
	public function changePasswordAction()
	{
		$data['password']					= $this->input->post('new_password');
		
		$table = 'superadmin';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		$zero = 0;
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$current_password	= $this->input->post('current_password');
		
		$verifyAuthorPassword	= $this->M_crud->findById($table = 'superadmin',$where = array('id' =>$authorID , 'type' =>$authorType));
		
		if($verifyAuthorPassword->password == $current_password) {
			echo 1;
			$this->db->update('superadmin', $data, array('id' => $authorID));
			$this->session->set_userdata(array('alertMsg' => 'Password Change Successfully'));
		} else {
			  echo 0;
		}
		
		
	}
	
	public function changeProfileAction()
	{
		$data['user_name']					= $this->input->post('user_name');
		
		$table = 'superadmin';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
			$authorID = $this->session->userid;
			$authorType = $this->session->usertype;
		
			$this->db->update('superadmin', $data, array('id' => $authorID));
			$this->session->set_userdata(array('alertMsg' => 'Login Name Change Successfully'));
			redirect('authorize/createUser/changePassword');
		
		
	}
	
	
}


