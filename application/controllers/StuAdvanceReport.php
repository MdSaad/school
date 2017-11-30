<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StuAdvanceReport extends CI_Controller { 

	const  Title	 = 'VMGPS-Admin Panel';
	
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
		isAuthenticate();
		
		

	}
	
	
	public function index()
	{
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		$data['title'] = 'VMGPS&#65515;Student General Report';
		$data['alertMsg']	= $this->session->userdata('alertMsg');
		
		$this->session->set_userdata(array('alertMsg' => ''));
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, $order = 'sl_no', $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['nationalityListInfo'] 	=  $this->M_crud->findAll('nationality_list_manage', $where, $orderBy, $serialized);
		$data['religionListInfo'] 		=  $this->M_crud->findAll('religion_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		
		$this->load->view('allReport/stuAdvanceReportPage', $data);
	}
	
	
	
	public function stuAdvanceReportDetails()
	{
	
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
			
		$stuCurrentID						= $this->input->post('stuCurrentID');
		$currYear 	= date('Y');
		 
		$data['branch_id']				= $this->input->post('branch_id');
		$data['class_id']				= $this->input->post('class_id');
		$data['group_id']				= $this->input->post('group_id');
		$data['section_id']				= $this->input->post('section_id');
		$data['class_roll']				= $this->input->post('class_roll');
		$data['year']					= $this->input->post('year');
		
		if($data['class_roll'] < 10) {
			$data['class_roll'] = "0".$data['class_roll'];
		}
		
		
		$data['allStuID']						= $this->input->post('allStuID');
		$data['allStuName']						= $this->input->post('allStuName');
		$data['allStuPhone']					= $this->input->post('allStuPhone');
		$data['allStuEmail']					= $this->input->post('allStuEmail');
		$data['allStuPrntsPresAdrs']			= $this->input->post('allStuPrntsPresAdrs');
		$data['allStuPrntsPersAdrs']			= $this->input->post('allStuPrntsPersAdrs');
		$data['allStuGrdnsPresAdrs']			= $this->input->post('allStuGrdnsPresAdrs');
		$data['allStuGrdnsPhone']				= $this->input->post('allStuGrdnsPhone');
		$data['allStuGrdnsEmail']				= $this->input->post('allStuGrdnsEmail');
		
		
		$data['StuID']						= $this->input->post('StuID');
		$data['StuName']					= $this->input->post('StuName');
		$data['StuPhone']				= $this->input->post('StuPhone');
		$data['StuEmail']					= $this->input->post('StuEmail');
		$data['StuPrntsPresAdrs']			= $this->input->post('StuPrntsPresAdrs');
		$data['StuPrntsPersAdrs']			= $this->input->post('StuPrntsPersAdrs');
		$data['StuGrdnsPresAdrs']			= $this->input->post('StuGrdnsPresAdrs');
		$data['StuGrdnsPhone']				= $this->input->post('StuGrdnsPhone');
		$data['StuGrdnsEmail']				= $this->input->post('StuGrdnsEmail');
		
		
		
		if(!empty($year)){
			$data['year']				= $this->input->post('year');
		} else {
			$data['year']				= $currYear;
		}
		
		
		if($authorType == "superadmin") {
			$stuClassWhere = array('stu_id' => $stuCurrentID, 'year' => $data['year']);
		} else {	
			$stuClassWhere = array('stu_id' => $stuCurrentID, 'branc_id' => $authorBranchID, 'year' =>$data['year']);
		}
		
		if($stuCurrentID and $data['StuID']!= "" || $data['StuName'] != "" || $data['StuPhone'] != "" || $data['StuEmail'] != "") {
			$stuDetailsInfo  = $this->M_crud->findById('class_wise_info', $stuClassWhere);
			
			$data['stuDetailsInfo'] 		=  $this->M_join->findInfoByStuID('stu_basic_info', array('stu_current_id' => $stuCurrentID, 'delete_status !=' => 'Yes'));
			if(!empty($data['stuDetailsInfo'])) {
			$data['stuDetailsInfo']->currClassInfo  = $this->M_join->findClassInfoFromMulti('class_wise_info', array('stu_auto_id' => $data['stuDetailsInfo']->id, 'year' => $data['year']), 'year', 'desc');
			 $data['branch_name'] =  $data['stuDetailsInfo']->currClassInfo->branch_name;
			}
		}
		
		
		
		
		
		if($data['branch_id']  && $data['class_id'] && ($data['allStuID'] != '' || $data['allStuName'] != '')) {
			 $data['totalStu']			 =	$this->M_crud->findTotal('class_wise_info', array("branc_id" => $data['branch_id'], "class_id" => $data['class_id'], "class_wise_info.year" => $data['year']));
			 
			 $data['allStuDetailsInfo']  = $this->M_join->findAllStuInfo('class_wise_info', array("branc_id" => $data['branch_id'], "class_id" => $data['class_id'], "class_wise_info.year" => $data['year']), 'class_wise_auto_id',  'asc');
			 foreach($data['allStuDetailsInfo'] as $v) {
			 $data['branch_name'] =  $v->branch_name;
			 }
			
		} 
		
		
		
		
		$data['title']	   =  'Report'; 
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		//$this->session->set_userdata(array('alertMsg' => 'Update Successfully'));
		//redirect('systemBasicInfo');
		
		$this->load->view('allReport/stuAdvancReportResult', $data);
	}

}


