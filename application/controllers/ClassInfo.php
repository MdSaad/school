<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassInfo extends CI_Controller {

	const  Title	 = 'VMGPS-Admin Panel';
	
	static $model 	 = array('M_admin', 'M_crud','M_crud_ayenal');
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
		$data['title'] = 'SACS&#65515;System Settings';
		$data['alertMsg']	= $this->session->userdata('alertMsg');
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		$this->session->set_userdata(array('alertMsg' => ''));
		$this->load->view('basicInfo/basicInfoPage', $data);
	}
	
	
	public function classInfoStore()
	{
		$updateId						= $this->input->post('update_id');
		
		$table = 'class_list_manage';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		$classMaxCode =  $this->M_crud->findMax($table, $where, $fieldName = 'class_code');
		if(!empty($classMaxCode->class_code)) {
			$class_code = $classMaxCode->class_code+1;
		} else {
			$class_code = 1;
		}
		 
		 if($class_code < 10) {
			$class_code = "0".$class_code;
		}

		if(!empty($updateId)){
			$data['class_name']			   = $this->input->post('class_name');
			$this->db->update($table, $data, array('id' => $updateId)); 
			$data2['lastID']                 = $updateId;

		} else {
            $data['class_code']				= $class_code;
			$data['class_name']				= $this->input->post('class_name');
			$data['class_status']				= "Active";
		    $data2['lastID'] = $this->M_crud_ayenal->save($table, $data); 

		}
		
			
		
		$data2['classListInfo'] =  $this->M_crud->findAll($table, $where, $orderBy = 'sl_no', $serialized);
		$this->load->view('classInfo/classList', $data2);
		 
	}
	
	
	
	
	public function sectionInfoStore()
	{
		$updateId						= $this->input->post('update_id');
		
		$table = 'section_list_manage';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		$sectionMaxCode =  $this->M_crud->findMax($table, $where, $fieldName = 'section_code');
		if(!empty($sectionMaxCode->section_code)) {
			$section_code = $sectionMaxCode->section_code+1;
		} else {
			$section_code = 1;
		}

		if(!empty($updateId)){
			$data['section_name']			= $this->input->post('section_name');
			$this->db->update($table, $data, array('id' => $updateId)); 
			$data2['lastID']                = $updateId;

		} else {
            $data['section_code']			= $section_code;
			$data['section_name']			= $this->input->post('section_name');
			$data['section_status']			= "Active";
		    $data2['lastID'] = $this->M_crud_ayenal->save($table, $data); 

		}

		
		$data2['sectionListInfo'] =  $this->M_crud->findAll($table, $where, $orderBy, $serialized);
		$this->load->view('classInfo/sectionList', $data2);
		 
	}
	
	
	
	public function shiftInfoStore()
	{
		$updateId						= $this->input->post('update_id');
		
		$table = 'shift_list_manage';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';

		if(!empty($updateId)){
			$data['shift_name']			= $this->input->post('shift_name');
			$this->db->update($table, $data, array('id' => $updateId)); 
			$data2['lastID']                = $updateId;

		} else {
			$data['shift_name']			= $this->input->post('shift_name');
		    $data2['lastID'] = $this->M_crud_ayenal->save($table, $data); 

		}
		
		$data2['shiftListInfo'] =  $this->M_crud->findAll($table, $where, $orderBy, $serialized);
		$this->load->view('classInfo/shiftList', $data2);
		 
	}
	
	
	public function branchInfoStore()
	{
		$updateId						= $this->input->post('update_id');
		
		$table = 'branch_list_manage';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		$branchMaxCode =  $this->M_crud->findMax($table, $where, $fieldName = 'branch_code');
		if(!empty($branchMaxCode->branch_code)) {
			$branch_code = $branchMaxCode->branch_code+1;
		} else {
			$branch_code = 1;
		}
		 
		 if($branch_code < 10) {
			$branch_code = "0".$branch_code;
		}
		
		if(!empty($updateId)){
			$data['branch_name']			= $this->input->post('branch_name');
			$this->db->update($table, $data, array('id' => $updateId)); 
			$data2['lastID'] = $updateId;

		} else {

			$data['branch_code']			= $branch_code;
			$data['branch_name']			= $this->input->post('branch_name');
			$data['branch_status']			= "Active";
			$data2['lastID'] = $this->M_crud_ayenal->save($table, $data); 
		   

		}
			
		
		$data2['branchListInfo'] =  $this->M_crud->findAll($table, $where, $orderBy, $serialized);
		$this->load->view('classInfo/branchList', $data2);
		 
	}
	
	
  public function nationalityInfoStore()
	{
		$updateId						= $this->input->post('update_id');
		
		$table = 'nationality_list_manage';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		

		if(!empty($updateId)){
			$data['nationality_name']	  = $this->input->post('nationality_name');
			$this->db->update($table, $data, array('id' => $updateId)); 
			$data2['lastID'] = $updateId;

		} else {

		
			$data['nationality_name']	    = $this->input->post('nationality_name');
			$data['nationality_status']		= "Active";
			$data2['lastID'] = $this->M_crud_ayenal->save($table, $data); 
		   

		}
		
		$data2['nationalityListInfo'] =  $this->M_crud->findAll($table, $where, $orderBy, $serialized);
		$this->load->view('classInfo/nationalityhList', $data2);
		 
	}
	
	
	 public function religionInfoStore()
	{
		$updateId						= $this->input->post('update_id');
		
		$table = 'religion_list_manage';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';

		if(!empty($updateId)){
			$data['religion_name']			= $this->input->post('religion_name');
			$this->db->update($table, $data, array('id' => $updateId)); 
			$data2['lastID'] = $updateId;

		} else {

		
			$data['religion_name']			= $this->input->post('religion_name');
		    $data['religion_status']		= "Active";
			$data2['lastID'] = $this->M_crud_ayenal->save($table, $data); 
		   

		}
		
		$data2['religionListInfo'] =  $this->M_crud->findAll($table, $where, $orderBy, $serialized);
		$this->load->view('classInfo/religionList', $data2);
		 
	}
	
	
   public function groupInfoStore()
	{
		$updateId					= $this->input->post('update_id');
		
		$table = 'group_list_manage';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		$zero = 0;
		
		$groupMaxCode =  $this->M_crud->findMax($table, $where, $fieldName = 'group_code');
		if(!empty($groupMaxCode->group_code)) {
			$group_code = $groupMaxCode->group_code+1;
		} else {
			$group_code = 1;
		}
		 
		 if($group_code < 10) {
			$group_code = "0".$group_code;
		}
		

		if(!empty($updateId)){

			$data['group_name']			= $this->input->post('group_name');
			$this->db->update($table, $data, array('id' => $updateId)); 
			$data2['lastID'] = $updateId;

		} else {

			$data['group_code']			= $group_code;
			$data['group_name']			= $this->input->post('group_name');
			$data['group_status']			= "Active";
			$data2['lastID'] = $this->M_crud_ayenal->save($table, $data); 

		}
			
		
		$data2['groupListInfo'] =  $this->M_crud->findAll($table, $where, $orderBy, $serialized);
		$this->load->view('classInfo/groupList', $data2);
		 
	}
	
	
	public function generateClassRoll()
	{
		$currentYear				= date("Y");
		$branc_id					= $this->input->post('branc_id');
		$class_id					= $this->input->post('class_id');
		$class_group_id				= $this->input->post('class_group_id');
		$class_section_id			= $this->input->post('class_section_id');
		$class_shift_id				= $this->input->post('class_shift_id');
		
		
		$table = 'class_wise_info';
		if(!empty($class_group_id)) {
			$where = array('branc_id' => $branc_id, 'class_id' => $class_id, 'class_group_id' => $class_group_id, 'class_section_id' => $class_section_id, 'class_shift_id' => $class_shift_id, 'year'=>$currentYear);
		} else {
			$where = array('branc_id' => $branc_id, 'class_id' => $class_id, 'class_section_id' => $class_section_id, 'class_shift_id' => $class_shift_id, 'year'=>$currentYear);
		}
		$maxRoll =  $this->M_crud->findMax($table, $where, $fieldName = 'class_roll');
		/*if(empty($maxRoll->class_roll)) {
		   if($class_section_id =='3')
			  $expectedRoll =	array('expectedRoll' => 51);
			else
			  $expectedRoll =	array('expectedRoll' => 1);	
		} else {*/
			$expectedRoll = array('expectedRoll' => $maxRoll->class_roll+1);
		//}
		
		
		if($expectedRoll['expectedRoll'] < 10) {
			$expectedRoll = array('expectedRoll' => "0".$expectedRoll['expectedRoll']);
		}
		
		echo json_encode($expectedRoll);
		 
	}

}


