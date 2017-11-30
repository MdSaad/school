<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AllReport extends CI_Controller {

	const  Title	 = 'VMGPS-Admin Panel';
	
	static $model 	 = array('M_admin', 'M_crud', 'M_join','M_crud_ayenal', 'M_join_ayenal');
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
		$data['title'] = 'VMGPS&#65515;Student Basic Information';
		$data['alertMsg']	= $this->session->userdata('alertMsg');
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		
		$currYear 	= date('Y');
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
		
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, $order = 'sl_no', $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		//$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		$data['nationalityListInfo'] 	=  $this->M_crud->findAll('nationality_list_manage', $where, $orderBy, $serialized);
		$data['religionListInfo'] 		=  $this->M_crud->findAll('religion_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		
		if($authorType == "superadmin") {
			$stuBasicWhere = array('delete_status !=' => 'Yes');
		} else {	
			$stuBasicWhere = array('delete_status !=' => 'Yes', 'current_branch_id' => $authorBranchID);
		}
		
		
		$limit = 12;
		$data['stuBasicInfo'] 			=  $this->M_crud->findAllBasicInfo('stu_basic_info', $stuBasicWhere, $orderBy, 'desc', $onset, $limit);
	
			
		
		//$data['allOrderList']    = $this->M_order_info->findAllByCus($customer_id);
		$data['onset'] 			= $onset;
		$config['base_url'] 	= base_url('stuBasicInfo/index');
		$config['total_rows'] 	= $this->M_crud->countAllList('stu_basic_info', $stuBasicWhere);
		$config['uri_segment'] 	= 3;
		$config['per_page'] 	= 12;
		$config['num_links'] 	= 7;
		$config['first_link']	= FALSE;
		$config['last_link'] 	= FALSE;
		$config['prev_link']	= 'Previous';
		$config['next_link'] 	= 'Next';

		$this->pagination->initialize($config); 
		
		$this->session->set_userdata(array('alertMsg' => ''));
		$this->load->view('allReport/reportModule', $data);
	}
	
	
	public function dairyReport() {
	
		$data['title'] = 'VMGPS&#65515;Diary Report';
		$currYear 	= date('Y');
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo']  =  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo']  =  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		
		
		$data['sectionListInfo']  =  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['classListInfo'] 	  =  $this->M_crud->findAll('class_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 	  =  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 	  =  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		
		
		$this->load->view('diaryInfo/diaryReportPage', $data);
	}


	public function diaryReportAction()
	{
		$data['branch_id']			= $this->input->post('branch_id');
		$data['class_id']			= $this->input->post('class_id');
		$data['group_id']			= $this->input->post('group_id');
		$data['section_id']			= $this->input->post('section_id');
		$data['shift_id']			= $this->input->post('shift_id');
		$data['fromDate']			= $this->input->post('fromDate');
		$data['toDate']				= $this->input->post('toDate');
		$where = array();
		$where2 = array();
		$orderBy = 'id';
		$serialized = 'asc';
		$groupBy = 'date';

		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo']  =  $this->M_crud->findAll('branch_list_manage', $where2, $orderBy, $serialized);
		} else {
		$data['branchListInfo']  =  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		$whereClass               = array('id' => $data['class_id']);
		$data['classNameInfo'] 	  =  $this->M_crud->findById('class_list_manage', $whereClass);
		$data['sectionListInfo']  =  $this->M_crud->findAll('section_list_manage', $where2, $orderBy, $serialized);
		$data['classListInfo'] 	  =  $this->M_crud->findAll('class_list_manage', $where2, $orderBy, $serialized);
		$data['shiftListInfo'] 	  =  $this->M_crud->findAll('shift_list_manage', $where2, $orderBy, $serialized);
		$data['groupListInfo'] 	  =  $this->M_crud->findAll('group_list_manage', $where2, $orderBy, $serialized);
		


		if(!empty($data['fromDate']) || !empty($data['toDate'])){
			if(!empty($data['branch_id']) || !empty($data['class_id']) || !empty($data['group_id']) || !empty($data['section_id']) || !empty($data['shift_id']) || !empty($data['fromDate']) || !empty($data['toDate'])){

			    if(!empty($data['branch_id']))   $where['student_diary_information.branch_id']  = $data['branch_id'];
				if(!empty($data['class_id'])) 	 $where['student_diary_information.class_id']   = $data['class_id'];
				if(!empty($data['group_id'])) 	 $where['student_diary_information.group_id']   = $data['group_id'];
				if(!empty($data['section_id']))  $where['student_diary_information.section_id'] = $data['section_id'];
				if(!empty($data['shift_id'])) 	 $where['student_diary_information.shift_id']   = $data['shift_id'];
				if(!empty($data['fromDate']))    $where['student_diary_information.date >= '] 	= $data['fromDate'];
				if(!empty($data['toDate']))      $where['student_diary_information.date <= '] 	= $data['toDate'];
			
			   $data['diaryListData']  = $this->M_crud_ayenal->findAllDataInfo('student_diary_information', $where, $data['branch_id'], $data['class_id'],$data['group_id'], $data['section_id'],$data['shift_id'], $orderBy, $serialized, $groupBy);

			   

			 }  

		} 
		
		$this->load->view('diaryInfo/diaryReportResultPage', $data);
		
	}




	
	
	
	public function stuReport() {
	
		$data['title'] = 'VMGPS&#65515;Student Report';
		$data['alertMsg']	= $this->session->userdata('alertMsg');
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		
		$currYear 	= date('Y');
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
	
		
		$this->session->set_userdata(array('alertMsg' => ''));
		$this->load->view('allReport/stuReportSubModulePage', $data);
	}
	
	
	public function stuGeneralReport() {
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
		
		$this->load->view('allReport/stuGeneralReportPage', $data);
	}
	
	
	public function stuGeneralReportDetails()
	{
		 $stuCurrentID						= $this->input->post('stuCurrentID');
		 $currYear 	= date('Y');
		
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		$data['branch_name']   = $this->session->branchName;
		
		
		
		$data['branch_id']				= $this->input->post('branch_id');
		$data['class_id']				= $this->input->post('class_id');
		$data['group_id']				= $this->input->post('group_id');
		$data['section_id']				= $this->input->post('section_id');
		$data['class_roll']				= $this->input->post('class_roll');
		$year							= $this->input->post('year');
		
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
		
		if($data['class_roll'] < 10) {
			$data['class_roll'] = "0".$data['class_roll'];
		}
		
		
		$data['stuDetailsInformation']			= $this->input->post('stuDetailsInfo');
		$data['stuParentDetailsInformation']	= $this->input->post('stuParentDetailsInfo');
		$data['stuGuarDetailsInformation']		= $this->input->post('stuGuarDetailsInfo');
		
		if($stuCurrentID and $data['stuDetailsInformation'] != "") {
			
			$stuDetailsInfo  = $this->M_crud->findById('class_wise_info', $stuClassWhere);
			
			
			if(!empty($stuDetailsInfo)) {
			$data['stuDetailsInfo'] 				=  $this->M_join->findInfoByStuID('stu_basic_info', array('stu_basic_info.id' => $stuDetailsInfo->stu_auto_id));
			$data['stuDetailsInfo']->currClassInfo  = $this->M_join->findClassInfoFromMulti('class_wise_info', array('stu_auto_id' => $data['stuDetailsInfo']->id, 'year' => $data['year']), 'year', 'desc');
			}
		}
		
	
		
		if($data['stuDetailsInformation']  && $data['branch_id']  && $data['class_id'] && $data['group_id'] && $data['section_id'] && $data['class_roll'] && $data['year']) {
			$stuDetailsInfo  = $this->M_crud->findById('class_wise_info', array("branc_id" => $data['branch_id'], "class_id" => $data['class_id'], "class_group_id" => $data['group_id'], "class_section_id" => $data['section_id'], "class_roll" => $data['class_roll'], "year" => $data['year']));
			
			//print_r($stuDetailsInfo);
			if(!empty($stuDetailsInfo)) {
			$data['stuDetailsInfo'] 				=  $this->M_join->findInfoByStuID('stu_basic_info', array('stu_basic_info.id' => $stuDetailsInfo->stu_auto_id));
			$data['stuDetailsInfo']->currClassInfo  = $this->M_join->findClassInfoFromMulti('class_wise_info', array("stu_auto_id" => $data['stuDetailsInfo']->id), 'year', 'desc');
			}
		}
		
		
		if($stuCurrentID && $data['stuParentDetailsInformation']) {
			$findStuAutID					= $this->M_crud->findById('stu_basic_info', array('stu_current_id'=>$stuCurrentID));
			$data['stuParentsDetailsInfo'] 	= $this->M_crud->findById('stu_parents_info', array('stu_auto_id'=>$findStuAutID->id));
		}
		
		
		if($data['stuParentDetailsInformation'] && $data['branch_id'] && $data['class_id'] && $data['group_id'] && $data['section_id'] && $data['class_roll'] && $data['year']) {
			$stuParentsDetailsInfo  = $this->M_crud->findById('class_wise_info', array("branc_id" => $data['branch_id'], "class_id" => $data['class_id'], "class_group_id" => $data['group_id'], "class_section_id" => $data['section_id'], "class_roll" => $data['class_roll'], "year" => $data['year']));
			
			//print_r($stuDetailsInfo);
			if(!empty($stuParentsDetailsInfo)) {
			$data['stuParentsDetailsInfo'] 	= $this->M_crud->findById('stu_parents_info', array('stu_auto_id'=>$stuDetailsInfo->stu_auto_id));
			}
		}
		
		

		if($stuCurrentID && $data['stuGuarDetailsInformation']) {
			$findStuAutID					   = $this->M_crud->findById('stu_basic_info', array('stu_current_id'=>$stuCurrentID));
			$data['stuGuardianDetailsInfo']    = $this->M_crud->findById('stu_parents_info', array('stu_auto_id'=>$findStuAutID->id));
		}
		
		
		if($data['stuGuarDetailsInformation'] && $data['branch_id'] && $data['class_id'] && $data['group_id'] && $data['section_id'] && $data['class_roll'] && $data['year']) {
			$stuGuardianDetailsInfo  = $this->M_crud->findById('class_wise_info', array("branc_id" => $data['branch_id'], "class_id" => $data['class_id'], "class_group_id" => $data['group_id'], "class_section_id" => $data['section_id'], "class_roll" => $data['class_roll'], "year" => $data['year']));
			
			//print_r($stuDetailsInfo);
			if(!empty($stuGuardianDetailsInfo)) {
			$data['stuGuardianDetailsInfo'] 	= $this->M_crud->findById('stu_parents_info', array('stu_auto_id'=>$stuDetailsInfo->stu_auto_id));
			}
		}
		
		
		//$data['groupListInfo'] 			=  $this->M_crud->findByID('group_list_manage', $where, $orderBy, $serialized);
		
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		$this->load->view('studentInfo/stuGeneralReportResult', $data);
	}
	
	public function stuAdvanceReport(){
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
		$data['StuPhone']					= $this->input->post('StuPhone');
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
			}
		}
		
		
		
		
		
		if($data['branch_id']  && $data['class_id'] && ($data['allStuID'] != '' || $data['allStuName'] != '')) {
			 $data['totalStu']			 =	$this->M_crud->findTotal('class_wise_info', array("branc_id" => $data['branch_id'], "class_id" => $data['class_id'], "class_wise_info.year" => $data['year']));
			 
			 $data['allStuDetailsInfo']  = $this->M_join->findAllStuInfo('class_wise_info', array("branc_id" => $data['branch_id'], "class_id" => $data['class_id'], "class_wise_info.year" => $data['year']), 'class_wise_auto_id',  'asc');
			 
			
		} 
		
		
		
		
		$data['title']	   =  'Report ddgdg'; 
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		//$this->session->set_userdata(array('alertMsg' => 'Update Successfully'));
		//redirect('systemBasicInfo');
		
		$this->load->view('allReport/stuAdvancReportResult', $data);
	}


	public function stuEssentialReport(){
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		$data['title'] = 'VMGPS&#65515;Student Essential Report';
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
		
		$this->load->view('allReport/stuEssentialReportPage', $data);
	}

	public function stuEssentialReportView()
	{
	
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		$data['branch_name']   = $this->session->branchName;
		$data['title'] = "Student Essential Report";
		
			
		$stuCurrentID				    = $this->input->post('stuCurrentID');
		$currYear 	= date('Y');
		 
		$data['branch_id']				= $this->input->post('branch_id');
		$data['class_id']				= $this->input->post('class_id');
		$data['group_id']				= $this->input->post('group_id');
		$data['section_id']				= $this->input->post('section_id');
		$data['shift_id']				= $this->input->post('shift_id');
		$class_roll						= $this->input->post('class_roll');
		$data['year']					= $this->input->post('year');
		
		if($class_roll < 10) {
			$data['class_roll'] = "0".$class_roll;
		} else {
			$data['class_roll'] = $class_roll;
		}

		if(!empty($stuCurrentID)){
			$data['studentDetails'] = $this->M_join->findEssenStuInfo('class_wise_info', array('class_wise_info.stu_id' => $stuCurrentID));
		} else {
			if(!empty($data['branch_id']) || !empty($data['class_id']) || !empty($data['group_id']) || !empty($data['section_id']) || !empty($data['shift_id']) || !empty($data['class_roll']) || !empty($data['year'])){

				if(!empty($data['branch_id']))  $where['class_wise_info.branc_id']   		= $data['branch_id'];
				if(!empty($data['class_id']))  $where['class_wise_info.class_id']   		= $data['class_id'];
				if(!empty($data['group_id']))  $where['class_wise_info.class_group_id']   	= $data['group_id'];
				if(!empty($data['section_id']))  $where['class_wise_info.class_section_id'] = $data['section_id'];
				if(!empty($data['shift_id']))  $where['class_wise_info.class_shift_id']   	= $data['shift_id'];
				if(!empty($data['class_roll']))  $where['class_wise_info.class_roll']   	= $data['class_roll'];
				if(!empty($data['year']))  $where['class_wise_info.year']   				= $data['year'];

				$data['studentDetails'] = $this->M_join->findEssenStuInfo('class_wise_info', $where);

			}

		}

		$data['allRecevpaPerDetails'] = $this->M_crud->findAll('stu_essential_recived_info', array('stu_auto_id' => $data['studentDetails']->stu_auto_id), 'id', 'asc');
		$receivePaperArray = array();
		foreach($data['allRecevpaPerDetails'] as $v){
			$receivePaperArray[]   = $v->paper;
		}
		$data['receivePaperArray']  = $receivePaperArray;

		$data['allDelPaperDetails']   = $this->M_crud->findAll('stu_essential_delivery_info', array('stu_auto_id' => $data['studentDetails']->stu_auto_id), 'id', 'asc');

		$delPaperArray = array();
		foreach($data['allDelPaperDetails'] as $vd){
			$delPaperArray[]   = $vd->paper;
		}
		$data['delPaperArray']  = $delPaperArray;
         


		$this->load->view('allReport/stuEssentialReportViewPage', $data);

	}
	
	public function stuAdmissionReport() {
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
	
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		$data['title'] = 'VMGPS&#65515;Student Admission Report';
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
		
		
		$limit = 12;
		
		if($authorType == "superadmin") {
			$findByAuthoreWhere = array('stu_entry_date' => date('Y-m-d'), 'delete_status !=' =>'Yes');
		} else {	
			$findByAuthoreWhere = array('stu_entry_date' => date('Y-m-d'), 'delete_status !=' =>'Yes' , 'current_branch_id' => $authorBranchID);
		}
	
		$data['todayAdmittedStuInfo']   = $this->M_crud->findAllBasicInfo($table = 'stu_basic_info', $findByAuthoreWhere, $orderBy = 'id', $serialized = 'desc', $onset, $limit);
		
		$data['onset'] 			= $onset;
		$config['base_url'] 	= base_url('allReport/stuAdmissionReport');
		$config['total_rows'] 	= $this->M_crud->countAllList('stu_basic_info', $findByAuthoreWhere);
		$config['uri_segment'] 	= 3;
		$config['per_page'] 	= 12;
		$config['num_links'] 	= 7;
		$config['first_link']	= FALSE;
		$config['last_link'] 	= FALSE;
		$config['prev_link']	= 'Previous';
		$config['next_link'] 	= 'Next';

		$this->pagination->initialize($config); 
		
		
		$this->load->view('allReport/stuAdmissionReportPage', $data);
	
	}
	
	public function findAdmittedStuList() {

		$branch_id = $this->input->post('branch_id'); 
		$class_id = $this->input->post('class_id'); 
		$group_id = $this->input->post('group_id'); 
		$section_id = $this->input->post('section_id'); 
		$shift_id = $this->input->post('shift_id'); 
		$class_roll = $this->input->post('class_roll'); 
		$year 			= $this->input->post('year'); 
		$student_type 	= $this->input->post('student_type'); 
		if($class_roll < 10) {
			$class_roll = "0".$class_roll;
		}
		$data['class_roll']  = $class_roll;
		$data['class_id']  	 = $class_id;
		$fromDate = $this->input->post('fromDate'); 
		$toDate = $this->input->post('toDate'); 
		
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		$currYear = date('Y');
		$data['title'] = 'VMGPS&#65515;Student Admission Report';


		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where = array(), $orderBy = 'id', $serialized = 'asc');
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where = array('id' => $authorBranchID), $orderBy = 'id', $serialized = 'asc');
		}

		
		$branchInfo 					=  $this->M_crud->findById('branch_list_manage', array('id' => $branch_id));
		$data['branch_name']            = $branchInfo->branch_name;

		if(!empty($class_id))  	 $data['classInfo'] =  $this->M_crud->findById('class_list_manage', array('id' => $class_id));
		if(!empty($group_id))  	 $data['groupInfo'] =  $this->M_crud->findById('group_list_manage', array('id' => $group_id));
		if(!empty($shift_id))  	 $data['shiftInfo'] =  $this->M_crud->findById('shift_list_manage', array('id' => $shift_id));
		if(!empty($section_id))  $data['secInfo']   =  $this->M_crud->findById('section_list_manage', array('id' => $section_id));


        

        $where = array('stu_basic_info.delete_status !=' => "Yes");

        if(!empty($branch_id) || !empty($class_id) || !empty($group_id) || !empty($section_id) || !empty($shift_id) || !empty($class_roll) || !empty($fromDate) || !empty($toDate) || !empty($student_type) || !empty($year))
        {
           if(!empty($branch_id))	    $where['class_wise_info.branc_id']  		= $branch_id;
           if(!empty($class_id))	    $where['class_wise_info.class_id']  		= $class_id;
           if(!empty($group_id))	    $where['class_wise_info.class_group_id']  	= $group_id;
           if(!empty($section_id))	    $where['class_wise_info.class_section_id']  = $section_id;
           if(!empty($shift_id))	    $where['class_wise_info.class_shift_id']  	= $shift_id;

		   if($student_type !='all')	$where['class_wise_info.student_type']  	= $student_type;
		   if(!empty($year))	        $where['class_wise_info.year']  		    = $year;
           if(!empty($class_roll))	    $where['class_wise_info.class_roll']  		= $class_roll;
           if(!empty($fromDate))	    $where['class_wise_info.date >=']  			= $fromDate;
           if(!empty($toDate))	    	$where['class_wise_info.date <=']  			= $toDate;

           $data['findAdmittedStuInfo']	=  $this->M_join->findAllStuAdInfo($table = 'class_wise_info', $where, $groupBy = 'class_wise_info.class_id', $orderBy = 'class_wise_info.class_sl_no', $serialized = 'asc', $fromDate, $toDate, $group_id, $section_id, $shift_id,$year, $student_type, $class_roll);
           $data['branchTotal']        = $this->M_join->countAll('class_wise_info', $where);

        } else {

        	$data['allStu']	=  $this->M_join->findAllStuInfo($table = 'class_wise_info', $where = array('class_wise_info.year' => $currYear, 'delete_status !=' => "Yes"), $orderBy = 'class_wise_auto_id', $serialized = 'desc');

        }

	

	
		$this->load->view('allReport/stuAdmissionReportResultListPage', $data);
	
	}
	
	public function stuInfoLoad() {
		$stuID = $this->input->post('stuID'); 
			
		$data['stuDetailsInfo'] 		=  $this->M_join->findInfoByStuID('stu_basic_info', array('stu_current_id' => $stuID, 'delete_status !=' => 'Yes'));
		$data['stuDetailsInfo']->currClassInfo  = $this->M_join->findClassInfoFromMulti('class_wise_info', array('stu_id' => $stuID), 'year', 'desc');
		$this->load->view('allReport/stuInfoLoadPage', $data);
	}
	
	
	public function feeCollectionReport(){

			$table = '';
			$where = array();
			$orderBy = 'id';
			$serialized = 'asc';
			
			$authorID = $this->session->userid;
			$authorType = $this->session->usertype;
			$authorBranchID = $this->session->authorBranchID;
			
			$data['title'] = 'VMGPS&#65515;Fee Collection Report';
			
			$this->session->set_userdata(array('alertMsg' => ''));
			$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
			
			if($authorType == "superadmin" ) {
			$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
			} else {
			$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
			}
			
			$this->load->view('allReport/feeCollectionReportSubModulePage', $data);
	
	}
	
	public function feeCollectionEarningReport() {
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		$data['title'] = 'VMGPS&#65515;Fee Collection Earning Report';
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
		
		$this->load->view('allReport/feeCollectionEarningReport', $data);
	}
	
	public function feeCollectionEarningReportResult() {
		
	    $stuID = $this->input->post('stuID'); 
		$data['title'] = "Fee Collection Earning Report";
		
		$data['branch_id'] 	= $this->input->post('branch_id'); 
		$data['class_id'] 	= $this->input->post('class_id'); 
		$data['group_id'] 	= $this->input->post('group_id'); 
		$data['section_id'] = $this->input->post('section_id'); 
		$data['shift_id'] 	= $this->input->post('shift_id'); 
		$data['class_roll'] = $this->input->post('class_roll'); 
		$data['year'] 		= $this->input->post('year'); 
		if($data['class_roll'] < 10) {
			$data['class_roll'] = "0".$data['class_roll'];
		}
		//$fromDate = $this->input->post('fromDate'); 
		//$toDate = $this->input->post('toDate'); 
		
		$data['fromDate'] = $this->input->post('fromDate'); 
		$data['toDate'] = $this->input->post('toDate'); 
		
		if($stuID and $data['fromDate'] and $data['toDate']) {
			$stuWhere = array('stu_id' =>$stuID);
		}
		
		if($data['branch_id'] && $data['class_id'] && $data['group_id'] && $data['section_id'] && $data['shift_id'] &&  $data['class_roll'] and $data['fromDate'] and $data['toDate'] and $data['year']) {
			$stuWhere = array('branc_id' =>$data['branch_id'], 'class_id' =>$data['class_id'], 'class_group_id' =>$data['group_id'], 'class_section_id' =>$data['section_id'] , 'class_shift_id' =>$data['shift_id'], 'class_roll' => $data['class_roll'], 'class_wise_info.year' => $data['year']);
		}
		
		
		if(!empty($stuWhere)) {
		 	$data['stuDetailsInfo']  = $this->M_join->findStuInfoByIDClassWise('class_wise_info', $stuWhere);
			$data['stuPayDetailsInfo']  = $this->M_crud->findAllGroupByInvoice('stu_fee_head_paid_details_info', $where = array('fee_head_stu_auto_id' => $data['stuDetailsInfo']->stu_auto_id, 'submittedDate >=' =>$data['fromDate'], 'submittedDate <=' =>$data['toDate'], 'collection_approve_status' => "approve"), $groupBy='invoice_no', $orderBy = 'id', $serialized = 'desc');
			
			 $data['branch_name']  = $data['stuDetailsInfo']->branch_name;
		 }
	
		$this->load->view('allReport/feeCollectionEarningReportResultPage', $data);
	
	}

	public function receitNoWiseEarningReportResult($recetno) {
		$data['title'] 		= "Fee Collection Earning Report";
		$fullRecieptNo		= explode('-',$recetno);
		$data['recetno']    = $fullRecieptNo[1]; 
	    $studentDetais 		= $this->M_crud->findById('stu_fee_head_paid_details_info', array('reciept_no' => $recetno)); 	
		
		if(!empty($studentDetais)) {
		 	$data['stuDetailsInfo']  	= $this->M_join->findStuInfoByIDClassWise('class_wise_info', array('class_wise_info.stu_auto_id' => $studentDetais->fee_head_stu_auto_id, 'class_wise_info.year' => $studentDetais->fee_head_year));
			$data['stuPayDetailsInfo']  = $this->M_crud->findAll('stu_fee_head_paid_details_info', $where = array('reciept_no' => $recetno), $orderBy = 'id', $serialized = 'desc');
			
			 $data['branch_name']  = $data['stuDetailsInfo']->branch_name;
		 }
		
		 
	
		$this->load->view('allReport/receitNoWiseEarningReportResult', $data);
	
	}
	
	
	
	
	public function feeCollectionDuesReport(){
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		$data['title'] = 'VMGPS&#65515;Fee Collection Earning Report';
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
		
		$this->load->view('allReport/feeCollectionDuesReportPage', $data);
	}
	
	public function feeCollectionDuesResultReportPage(){
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where = array(), $orderBy = 'id', $serialized = 'asc');
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		
	    $stuID = $this->input->post('stuID'); 
		$data['title'] = "Fee Collection Earning Report";
		
		$data['branch_id'] = $this->input->post('branch_id'); 
		$data['class_id'] = $this->input->post('class_id'); 
		$data['group_id'] = $this->input->post('group_id'); 
		$data['section_id'] = $this->input->post('section_id'); 
		$data['shift_id'] = $this->input->post('shift_id'); 
		$data['class_roll'] = $this->input->post('class_roll'); 
		if($data['class_roll'] < 10) {
			$data['class_roll'] = "0".$data['class_roll'];
		}
		//$fromDate = $this->input->post('fromDate'); 
		//$toDate = $this->input->post('toDate'); 
		
		$data['year'] = $this->input->post('year'); 
		
		if($stuID and $data['year']) {
			$stuWhere = array('stu_id' =>$stuID);
		}
		
		if($data['branch_id'] && $data['class_id'] && $data['group_id'] && $data['section_id'] && $data['shift_id'] &&  $data['class_roll'] and $data['year']) {
			$stuWhere = array('branc_id' =>$data['branch_id'], 'class_id' =>$data['class_id'], 'class_group_id' =>$data['group_id'], 'class_section_id' =>$data['section_id'] , 'class_shift_id' =>$data['shift_id'], 'class_roll' => $data['class_roll'], 'class_wise_info.year' =>$data['year']);
		}
		
		
		if(!empty($stuWhere)) {
		 	$data['stuDetailsInfo']  	= $this->M_join->findStuInfoByIDClassWise('class_wise_info', $stuWhere, $orderBy = 'class_wise_auto_id', $serialized = 'desc');
			$data['stuPayDetailsInfo']  = $this->M_crud->findAll('stu_fee_collection_applicable_mode_list', $where = array('fee_coll_app_stu_auto_id' => $data['stuDetailsInfo']->stu_auto_id, 'fee_year' =>$data['year']), $orderBy = 'id', $serialized = 'asc');
			
			$data['branch_name']  = $data['stuDetailsInfo']->branch_name;
		 }
		
		 $this->load->view('allReport/feeCollectionDuesReportResultPage', $data);
	}


	public function resultReportModule() {
	
		$data['title'] = 'VMGPS&#65515;Result Report Module';
		$currYear 	= date('Y');
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo']  =  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo']  =  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		
		$this->load->view('allReport/resultReportModulePage', $data);
	}


	public function classWiseIndividualReport() {
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		$data['title'] = 'VMGPS&#65515;Result Report';
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
		$data['allXamListInfo'] 		=  $this->M_crud->findAll('all_exam_type_manage', array('year' => date('Y-m-d')), $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage',$where, $orderBy, $serialized);
		 
		$this->load->view('allReport/classWiseIndividualReportPage', $data);
	}






	public function classWiseIndividualReportAction(){
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where = array(), $orderBy = 'id', $serialized = 'asc');
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		
		$data['title'] = "Student Result Report";
		$data['branch_name']   = $this->session->branchName;
		
		$data['branch_id'] 		= $this->input->post('branch_id'); 
		$data['class_id'] 		= $this->input->post('class_id'); 
		$data['group_id'] 		= $this->input->post('group_id'); 
		$data['section_id'] 	= $this->input->post('section_id'); 
		$data['shift_id'] 		= $this->input->post('shift_id'); 
		$data['year'] 			= $this->input->post('year'); 
		$data['subject_id'] 	= $this->input->post('subject_id'); 
		$data['exam_type_id'] 	= $this->input->post('exam_type_id');

        $data['shiftInfo']				= $this->M_crud->findById('shift_list_manage', array('id'=>$data['shift_id']));
		$data['subjectInfo']			= $this->M_crud->findById('subject_manage', array('id'=>$data['subject_id']));

		$data['examTypeInfo'] 			=  $this->M_join->findByExamTypeName('exam_type_subjec_wise_total_marks', $where = array('branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'group_id' => $data['group_id'], 'exam_type_subjec_wise_total_marks.year' => $data['year'], 'subject_id' => $data['subject_id'],  'exam_type_id' => $data['exam_type_id']));


		if($data['class_id'] == '1' || $data['class_id'] == '2' || $data['class_id'] == '3' || $data['class_id'] == '4' || $data['class_id'] == '5' || $data['class_id'] == '13' || $data['class_id'] == '15' ||  $data['class_id'] == '16'){

				$data['stuPerResultInfo']  	= $this->M_join->findAllStuPercenTageResult('student_wise_subject_manage', $stuWhere = array('branch_id' =>$data['branch_id'], 'student_wise_subject_manage.subject_id' => $data['subject_id'], 'student_wise_subject_manage.class_id' =>$data['class_id'], 'group_id' =>$data['group_id'], 'section' =>$data['section_id'] , 'shift' =>$data['shift_id'], 'student_wise_subject_manage.year' => $data['year'],  'class_wise_info.year' => $data['year']), $orderBy = 'class_wise_info.class_roll', $serialized = 'asc', $data['exam_type_id']);	
		}else{
			
			   $data['stuResultInfo']  	= $this->M_join->findAllStuPercenTageResult('student_wise_subject_manage', $stuWhere = array('branch_id' =>$data['branch_id'], 'student_wise_subject_manage.subject_id' => $data['subject_id'], 'student_wise_subject_manage.class_id' =>$data['class_id'], 'group_id' =>$data['group_id'], 'section' =>$data['section_id'] , 'shift' =>$data['shift_id'], 'student_wise_subject_manage.year' => $data['year'], 'class_wise_info.year' => $data['year']), $orderBy = 'class_wise_info.class_roll', $serialized = 'asc', $data['exam_type_id']);	

			   
		}
		

		   $this->load->view('allReport/classWiseIndividualReportActionResultPage', $data);
	}






	public function classWiseResultReport() {
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		$data['title'] = 'VMGPS&#65515;Result Report';
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
		
		$this->load->view('allReport/classWiseResultReportPage', $data);
	}



	public function classWiseReportAction(){
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where = array(), $orderBy = 'id', $serialized = 'asc');
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		
		$data['title'] = "Student Result Report";
		$data['branch_name']   = $this->session->branchName;
		
		$data['branch_id'] 		= $this->input->post('branch_id'); 
		$data['class_id'] 		= $this->input->post('class_id'); 
		$data['group_id'] 		= $this->input->post('group_id'); 
		$data['section_id'] 	= $this->input->post('section_id'); 
		$data['shift_id'] 		= $this->input->post('shift_id'); 
		$data['year'] 			= $this->input->post('year'); 
		$data['subject_id'] 	= $this->input->post('subject_id'); 
		$data['exam_type_id'] 	= $this->input->post('exam_type_id');

        $data['shiftInfo']				= $this->M_crud->findById('shift_list_manage', array('id'=>$data['shift_id']));
		$data['subjectInfo']			= $this->M_crud->findById('subject_manage', array('id'=>$data['subject_id']));




		$fstCtyId 				= "1";
  	  	$fstMonthLyId 			= "2";
  	  	$secondCtyId 			= "3";
  	  	$secondMonthLyId 		= "4";
  	  	$halfYearlyId 			= "5";
  	  	


  	  	$data['examTypefstCtInfo'] 			=  $this->M_join->findByExamTypeName('exam_type_subjec_wise_total_marks', $where = array('branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'group_id' => $data['group_id'], 'section_id' => $data['section_id'], 'shift_id' => $data['shift_id'], 'exam_type_subjec_wise_total_marks.year' => $data['year'], 'subject_id' => $data['subject_id'],  'exam_type_id' => $fstCtyId));

    	$data['examTypefstMonthLyInfo'] 		=  $this->M_join->findByExamTypeName('exam_type_subjec_wise_total_marks', $where = array('branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'group_id' => $data['group_id'], 'section_id' => $data['section_id'], 'shift_id' => $data['shift_id'], 'exam_type_subjec_wise_total_marks.year' => $data['year'], 'subject_id' => $data['subject_id'],  'exam_type_id' => $fstMonthLyId));

    	$data['examTypeSecondCtInfo'] 			=  $this->M_join->findByExamTypeName('exam_type_subjec_wise_total_marks', $where = array('branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'group_id' => $data['group_id'], 'section_id' => $data['section_id'], 'shift_id' => $data['shift_id'], 'exam_type_subjec_wise_total_marks.year' => $data['year'], 'subject_id' => $data['subject_id'],  'exam_type_id' => $secondCtyId));

    	$data['examTypeSecondMonthLyInfo'] 		=  $this->M_join->findByExamTypeName('exam_type_subjec_wise_total_marks', $where = array('branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'group_id' => $data['group_id'], 'section_id' => $data['section_id'], 'shift_id' => $data['shift_id'], 'exam_type_subjec_wise_total_marks.year' => $data['year'], 'subject_id' => $data['subject_id'],  'exam_type_id' => $secondMonthLyId));

    	$data['examTypehalfMonthLyInfo'] 		=  $this->M_join->findByExamTypeName('exam_type_subjec_wise_total_marks', $where = array('branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'group_id' => $data['group_id'], 'section_id' => $data['section_id'], 'shift_id' => $data['shift_id'], 'exam_type_subjec_wise_total_marks.year' => $data['year'], 'subject_id' => $data['subject_id'],  'exam_type_id' => $halfYearlyId));

              
          	if($data['exam_type_id'] == '5'){
            	 $data['stuHalfYearlyResultInfo']  	= $this->M_join->findAllStuHalfYearlyResult('class_wise_info', $stuWhere = array('branc_id' =>$data['branch_id'], 'class_id' =>$data['class_id'], 'class_group_id' =>$data['group_id'], 'class_section_id' =>$data['section_id'] , 'class_shift_id' =>$data['shift_id'], 'class_wise_info.year' => $data['year']), $orderBy = 'class_roll', $serialized = 'asc', $data['subject_id'], $fstCtyId, $fstMonthLyId, $secondCtyId, $secondMonthLyId, $halfYearlyId);

          	
          	}else{

          		$thirdCtyId 			= "6";
          	  	$thirdMonthLyId 		= "7";
          	  	$fourthCtyId 			= "8";
          	  	$fourthMonthLyId 		= "9";
          	  	$annualId 				= $data['exam_type_id'];


          	  	$data['examTypeThirdCtInfo'] 			=  $this->M_join->findByExamTypeName('exam_type_subjec_wise_total_marks', $where = array('branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'group_id' => $data['group_id'], 'section_id' => $data['section_id'], 'shift_id' => $data['shift_id'], 'exam_type_subjec_wise_total_marks.year' => $data['year'], 'subject_id' => $data['subject_id'],  'exam_type_id' => $thirdCtyId));

		    	$data['examTypeThirdMonthLyInfo'] 		=  $this->M_join->findByExamTypeName('exam_type_subjec_wise_total_marks', $where = array('branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'group_id' => $data['group_id'], 'section_id' => $data['section_id'], 'shift_id' => $data['shift_id'], 'exam_type_subjec_wise_total_marks.year' => $data['year'], 'subject_id' => $data['subject_id'],  'exam_type_id' => $thirdMonthLyId));

		    	$data['examTypeFourthCtInfo'] 			=  $this->M_join->findByExamTypeName('exam_type_subjec_wise_total_marks', $where = array('branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'group_id' => $data['group_id'], 'section_id' => $data['section_id'], 'shift_id' => $data['shift_id'], 'exam_type_subjec_wise_total_marks.year' => $data['year'], 'subject_id' => $data['subject_id'],  'exam_type_id' => $fourthCtyId));

		    	$data['examTypeFourthMonthLyInfo'] 		=  $this->M_join->findByExamTypeName('exam_type_subjec_wise_total_marks', $where = array('branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'group_id' => $data['group_id'], 'section_id' => $data['section_id'], 'shift_id' => $data['shift_id'], 'exam_type_subjec_wise_total_marks.year' => $data['year'], 'subject_id' => $data['subject_id'],  'exam_type_id' => $fourthMonthLyId));

		    	$data['examTypeAnnualInfo'] 		=  $this->M_join->findByExamTypeName('exam_type_subjec_wise_total_marks', $where = array('branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'group_id' => $data['group_id'], 'section_id' => $data['section_id'], 'shift_id' => $data['shift_id'], 'exam_type_subjec_wise_total_marks.year' => $data['year'], 'subject_id' => $data['subject_id'],  'exam_type_id' => $annualId));


		    	 $data['stuAnnualResultInfo']  	= $this->M_join->findAllStuAnnualResult('class_wise_info', $stuWhere = array('branc_id' =>$data['branch_id'], 'class_id' =>$data['class_id'], 'class_group_id' =>$data['group_id'], 'class_section_id' =>$data['section_id'] , 'class_shift_id' =>$data['shift_id'], 'class_wise_info.year' => $data['year']), $orderBy = 'class_roll', $serialized = 'asc', $data['subject_id'], $fstCtyId, $fstMonthLyId, $secondCtyId, $secondMonthLyId, $halfYearlyId, $thirdCtyId, $thirdMonthLyId, $fourthCtyId, $fourthMonthLyId, $annualId);




          	}



		   $this->load->view('allReport/classWiseReportActionResultPage', $data);
	}


	public function studentWiseResultReport()
	{
		$data['title'] = 'VMGPS&#65515;Student Result Report';
		$currYear 	= date('Y');
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

		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, $order = 'sl_no', $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		$data['examListInfo'] 			=  $this->M_crud->findAll('all_exam_type_manage', $where, $orderBy, $serialized);

		$this->load->view('allReport/studentWiseResultReportPage', $data);
	}


	public function studentWiseReportAction(){
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where = array(), $orderBy = 'id', $serialized = 'asc');
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		
		$data['title'] = "Student Result Report";
		$data['branch_name']   = $this->session->branchName;
		
		$data['student_id'] 	= $this->input->post('student_id');
		$data['year'] 			= $this->input->post('year');  
		$data['branch_id'] 		= $this->input->post('branch_id'); 
		$data['class_id'] 		= $this->input->post('class_id'); 
		$data['group_id'] 		= $this->input->post('group_id'); 
		$data['section_id'] 	= $this->input->post('section_id'); 
		$data['shift_id'] 		= $this->input->post('shift_id'); 
		$data['class_roll']     = $this->input->post('class_roll'); 
		$data['ad_year']     	= $this->input->post('ad_year'); 
		
		$data['exam_type_id'] 	= $this->input->post('exam_type_id');

		$data['examName']  		= $this->M_crud->findById('all_exam_type_manage', array('id'=>$data['exam_type_id']));


			if(!empty($data['student_id'])){

				$data['studentDetails']    			= $this->M_join_ayenal->findIssuStudentInfo('class_wise_info', array('stu_id'=>$data['student_id'], 'year'=>$data['year']));  

				if($data['studentDetails']->class_id =='6' || $data['studentDetails']->class_id =='7' || $data['studentDetails']->class_id =='8' || $data['studentDetails']->class_id =='9' || $data['studentDetails']->class_id =='10' || $data['studentDetails']->class_id =='11' || $data['studentDetails']->class_id =='12'){

					$data['stuWiseResultInfo'] 	= $this->M_join->findStuWiseMonthlyResultInfo('student_wise_subject_manage', array('student_wise_subject_manage.branch_id'=>$data['studentDetails']->branc_id, 'student_wise_subject_manage.class_id'=>$data['studentDetails']->class_id, 'student_wise_subject_manage.group_id'=>$data['studentDetails']->class_group_id,'student_wise_subject_manage.year'=>$data['studentDetails']->year, 'student_id' => $data['studentDetails']->stu_auto_id), $data['studentDetails']->stu_auto_id, $data['exam_type_id']);
				}else{
                  $data['stuWiseResultInfo2'] 	= $this->M_join->findStuWiseMonthlyResultInfo222('student_wise_subject_manage', array('student_wise_subject_manage.branch_id'=>$data['studentDetails']->branc_id, 'student_wise_subject_manage.class_id'=>$data['studentDetails']->class_id, 'student_wise_subject_manage.group_id'=>$data['studentDetails']->class_group_id,'student_wise_subject_manage.year'=>$data['studentDetails']->year, 'student_id' => $data['studentDetails']->stu_auto_id), $data['studentDetails']->stu_auto_id, $data['exam_type_id']);

				}
				
				
            
			} else {

				if(!empty($data['branch_id']) || !empty($data['class_id']) || !empty($data['group_id']) || !empty($data['section_id']) || !empty($data['shift_id']) || !empty($data['class_roll']) || !empty($data['ad_year'])){

						if(!empty($data['branch_id']))   	$where2['branc_id']   		= $data['branch_id'];
						if(!empty($data['class_id']))   	$where2['class_id']   		= $data['class_id'];
						if(!empty($data['group_id']))   	$where2['class_group_id']   = $data['group_id'];
						if(!empty($data['section_id']))   	$where2['class_section_id'] = $data['section_id'];
						if(!empty($data['shift_id']))   	$where2['class_shift_id']   = $data['shift_id'];
						if(!empty($data['class_roll']))   	$where2['class_roll']   	= $data['class_roll'];
						if(!empty($data['ad_year']))   		$where2['year']   			= $data['ad_year'];

					}

				$data['studentDetails']    			= $this->M_join_ayenal->findIssuStudentInfo('class_wise_info', $where2);

				if($data['class_id'] =='6' || $data['class_id'] =='7' || $data['class_id'] =='8' || $data['class_id'] =='9' || $data['class_id'] =='10' || $data['class_id'] =='11' || $data['class_id'] =='12'){

				    $data['stuWiseResultInfo'] 	= $this->M_join->findStuWiseMonthlyResultInfo('student_wise_subject_manage', array('student_wise_subject_manage.branch_id'=>$data['studentDetails']->branc_id, 'student_wise_subject_manage.class_id'=>$data['studentDetails']->class_id, 'student_wise_subject_manage.group_id'=>$data['studentDetails']->class_group_id,'student_wise_subject_manage.year'=>$data['studentDetails']->year, 'student_id' => $data['studentDetails']->stu_auto_id), $data['studentDetails']->stu_auto_id, $data['exam_type_id']);	
            	
					
				}else{
                   $data['stuWiseResultInfo2'] 	= $this->M_join->findStuWiseMonthlyResultInfo222('student_wise_subject_manage', array('student_wise_subject_manage.branch_id'=>$data['studentDetails']->branc_id, 'student_wise_subject_manage.class_id'=>$data['studentDetails']->class_id, 'student_wise_subject_manage.group_id'=>$data['studentDetails']->class_group_id,'student_wise_subject_manage.year'=>$data['studentDetails']->year, 'student_id' => $data['studentDetails']->stu_auto_id), $data['studentDetails']->stu_auto_id, $data['exam_type_id']);
				}
			

			}




		    // position start 

		   $maxFailCount  = $this->M_crud_ayenal->findMax('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $data['studentDetails']->branc_id, 'student_exam_wise_full_result_info.class_id' => $data['studentDetails']->class_id, 'student_exam_wise_full_result_info.section_id' => $data['studentDetails']->class_section_id, 'student_exam_wise_full_result_info.year' => $data['studentDetails']->year, 'exam_id' => $data['exam_type_id']), 'fail_count');

		    $allStudentAerray = array();
	        $position = 1;


            if($data['exam_type_id'] != 5){
	            

			    for ($i=0; $i <= $maxFailCount->fail_count; $i++) { 

			   	    $query  = $this->M_crud_ayenal->findAll('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $data['studentDetails']->branc_id, 'student_exam_wise_full_result_info.class_id' => $data['studentDetails']->class_id, 'student_exam_wise_full_result_info.section_id' => $data['studentDetails']->class_section_id, 'student_exam_wise_full_result_info.year' => $data['studentDetails']->year, 'fail_count' => $i, 'exam_id' => $data['exam_type_id']), 'id', 'asc');
	                
	                $studentAerray = array();
			   	    foreach ($query as $value ) {
			   	    	 $studentAerray[$value->stu_auto_id] = $value->total_marks;
			   	    }

			   	    arsort($studentAerray);
	                
	                foreach ($studentAerray as $key => $pval ) {
			   	    	$allStudentAerray[$key] = $position;
			   	    	$position ++;
			   	    }

			    }


		    }else{

		    	for ($i=0; $i <= $maxFailCount->fail_count; $i++) { 

			   	    $query  = $this->M_crud_ayenal->findAllStuPositionData('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $data['studentDetails']->branc_id, 'student_exam_wise_full_result_info.class_id' => $data['studentDetails']->class_id, 'student_exam_wise_full_result_info.section_id' => $data['studentDetails']->class_section_id, 'student_exam_wise_full_result_info.year' => $data['studentDetails']->year, 'fail_count' => $i, 'exam_id' => $data['exam_type_id']), 'id', 'asc');
	                
	                $studentAerray = array();
			   	    foreach ($query as $value ) {
			   	    	 $studentAerray[$value->stu_auto_id] = $value->annualMarks->total_marks + $value->firstterm->total_marks 
			   	    	 + $value->secondterm->total_marks + $value->thirdterm->total_marks;
			   	    }

			   	    arsort($studentAerray);

	                foreach ($studentAerray as $key => $pval ) {
			   	    	$allStudentAerray[$key] = $position;
			   	    	$position ++;
			   	    }

			    }

		    }

		    if (array_key_exists($data['studentDetails']->stu_auto_id, $allStudentAerray)) {
				  $data['position'] = $allStudentAerray[$data['studentDetails']->stu_auto_id];
			} 


          

            // position end 





            
		   $this->load->view('allReport/studentWiseReportActionPage', $data);
		
	}



	public function studentWiseProgressReport()
	{
		$data['title'] = 'VMGPS&#65515;Student Result Report';
		$currYear 	= date('Y');
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

		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, $order = 'sl_no', $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		$data['examListInfo'] 			=  $this->M_crud->findAll('all_exam_type_manage', $where, $orderBy, $serialized);

		$this->load->view('allReport/studentWiseProgressReportPage', $data);
	}


	public function studentWiseProgressReportAction()
	{
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where = array(), $orderBy = 'id', $serialized = 'asc');
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		
		$data['title'] = "Student Result Report";
		$data['branch_name']   = $this->session->branchName;
		
		$data['student_id'] 	= $this->input->post('student_id');
		$data['year'] 			= $this->input->post('year');  
		$data['branch_id'] 		= $this->input->post('branch_id'); 
		$data['class_id'] 		= $this->input->post('class_id'); 
		$data['group_id'] 		= $this->input->post('group_id'); 
		$data['section_id'] 	= $this->input->post('section_id'); 
		$data['shift_id'] 		= $this->input->post('shift_id'); 
		$data['class_roll']     = $this->input->post('class_roll'); 
		$data['ad_year']     	= $this->input->post('ad_year'); 
		
		//$data['exam_type_id'] 	= $this->input->post('exam_type_id');

		


			if(!empty($data['student_id'])){

				$data['studentDetails']    			= $this->M_join_ayenal->findIssuStudentInfo('class_wise_info', array('stu_id'=>$data['student_id'], 'year'=>$data['year']));  

				if($data['studentDetails']->class_id =='6' || $data['studentDetails']->class_id =='7' || $data['studentDetails']->class_id =='8' || $data['studentDetails']->class_id =='9' || $data['studentDetails']->class_id =='10'){


					if($data['class_id'] == '8'){
			            	$annualXmId = '6';

		            } else if($data['class_id'] == '10'){
		                $annualXmId = '7';
		            } else {
		            	$annualXmId = '5';
		            }

					$data['stuWiseSixToTenResultInfo'] 	= $this->M_join->findStuWiseSixToTenCombineResultInfo('student_wise_subject_manage', array('student_wise_subject_manage.branch_id'=>$data['studentDetails']->branc_id, 'student_wise_subject_manage.class_id'=>$data['studentDetails']->class_id, 'student_wise_subject_manage.group_id'=>$data['studentDetails']->class_group_id,'student_wise_subject_manage.year'=>$data['studentDetails']->year, 'student_id' => $data['studentDetails']->stu_auto_id), $data['studentDetails']->stu_auto_id, $annualXmId);


				} else if($data['class_id'] =='11' || $data['class_id'] =='12') {

					if($data['class_id'] =='11'){
						 $data['stuWiseElevenResultInfo'] 	= $this->M_join->findStuWiseElevenCombineResultInfo('student_wise_subject_manage', array('student_wise_subject_manage.branch_id'=>$data['studentDetails']->branc_id, 'student_wise_subject_manage.class_id'=>$data['studentDetails']->class_id, 'student_wise_subject_manage.group_id'=>$data['studentDetails']->class_group_id,'student_wise_subject_manage.year'=>$data['studentDetails']->year, 'student_id' => $data['studentDetails']->stu_auto_id), $data['studentDetails']->stu_auto_id);
					}else{
					    $data['stuWiseTwlveResultInfo'] 	= $this->M_join->findStuWiseTwlveCombineResultInfo('student_wise_subject_manage', array('student_wise_subject_manage.branch_id'=>$data['studentDetails']->branc_id, 'student_wise_subject_manage.class_id'=>$data['studentDetails']->class_id, 'student_wise_subject_manage.group_id'=>$data['studentDetails']->class_group_id,'student_wise_subject_manage.year'=>$data['studentDetails']->year, 'student_id' => $data['studentDetails']->stu_auto_id), $data['studentDetails']->stu_auto_id);	
					}

				}else{
                    $data['stuWisePlayToFiveResultInfo'] 	= $this->M_join->findStuWisePlayToFiveCombineResultInfo('student_wise_subject_manage', array('student_wise_subject_manage.branch_id'=>$data['studentDetails']->branc_id, 'student_wise_subject_manage.class_id'=>$data['studentDetails']->class_id, 'student_wise_subject_manage.group_id'=>$data['studentDetails']->class_group_id,'student_wise_subject_manage.year'=>$data['studentDetails']->year, 'student_id' => $data['studentDetails']->stu_auto_id), $data['studentDetails']->stu_auto_id);


				}
				
            
			} else {

				if(!empty($data['branch_id']) || !empty($data['class_id']) || !empty($data['group_id']) || !empty($data['section_id']) || !empty($data['shift_id']) || !empty($data['class_roll']) || !empty($data['ad_year'])){

						if(!empty($data['branch_id']))   	$where2['branc_id']   		= $data['branch_id'];
						if(!empty($data['class_id']))   	$where2['class_id']   		= $data['class_id'];
						if(!empty($data['group_id']))   	$where2['class_group_id']   = $data['group_id'];
						if(!empty($data['section_id']))   	$where2['class_section_id'] = $data['section_id'];
						if(!empty($data['shift_id']))   	$where2['class_shift_id']   = $data['shift_id'];
						if(!empty($data['class_roll']))   	$where2['class_roll']   	= $data['class_roll'];
						if(!empty($data['ad_year']))   		$where2['year']   			= $data['ad_year'];

					}

				$data['studentDetails']    			= $this->M_join_ayenal->findIssuStudentInfo('class_wise_info', $where2);

				if($data['class_id'] =='6' || $data['class_id'] =='7' || $data['class_id'] =='8' || $data['class_id'] =='9' || $data['class_id'] =='10'){

						if($data['class_id'] == '8'){
			            	$annualXmId = '6';

			            } else if($data['class_id'] == '10'){
			                $annualXmId = '7';
			            } else {
			            	$annualXmId = '5';
			            }


				    $data['stuWiseSixToTenResultInfo'] 	= $this->M_join->findStuWiseSixToTenCombineResultInfo('student_wise_subject_manage', array('student_wise_subject_manage.branch_id'=>$data['studentDetails']->branc_id, 'student_wise_subject_manage.class_id'=>$data['studentDetails']->class_id, 'student_wise_subject_manage.group_id'=>$data['studentDetails']->class_group_id,'student_wise_subject_manage.year'=>$data['studentDetails']->year, 'student_id' => $data['studentDetails']->stu_auto_id), $data['studentDetails']->stu_auto_id, $annualXmId);	
            	
					
				} else if($data['class_id'] =='11' || $data['class_id'] =='12') {

					if($data['class_id'] =='11'){
						 $data['stuWiseElevenResultInfo'] 	= $this->M_join->findStuWiseElevenCombineResultInfo('student_wise_subject_manage', array('student_wise_subject_manage.branch_id'=>$data['studentDetails']->branc_id, 'student_wise_subject_manage.class_id'=>$data['studentDetails']->class_id, 'student_wise_subject_manage.group_id'=>$data['studentDetails']->class_group_id,'student_wise_subject_manage.year'=>$data['studentDetails']->year, 'student_id' => $data['studentDetails']->stu_auto_id), $data['studentDetails']->stu_auto_id);
					}else{
					    $data['stuWiseTwlveResultInfo'] 	= $this->M_join->findStuWiseTwlveCombineResultInfo('student_wise_subject_manage', array('student_wise_subject_manage.branch_id'=>$data['studentDetails']->branc_id, 'student_wise_subject_manage.class_id'=>$data['studentDetails']->class_id, 'student_wise_subject_manage.group_id'=>$data['studentDetails']->class_group_id,'student_wise_subject_manage.year'=>$data['studentDetails']->year, 'student_id' => $data['studentDetails']->stu_auto_id), $data['studentDetails']->stu_auto_id);	
					}

					

				} else {
					$data['stuWisePlayToFiveResultInfo'] 	= $this->M_join->findStuWisePlayToFiveCombineResultInfo('student_wise_subject_manage', array('student_wise_subject_manage.branch_id'=>$data['studentDetails']->branc_id, 'student_wise_subject_manage.class_id'=>$data['studentDetails']->class_id, 'student_wise_subject_manage.group_id'=>$data['studentDetails']->class_group_id,'student_wise_subject_manage.year'=>$data['studentDetails']->year, 'student_id' => $data['studentDetails']->stu_auto_id), $data['studentDetails']->stu_auto_id);

				}
			

			}


			// position start 



			$stuPosiWhere = array('class_wise_info.branc_id'=>$data['studentDetails']->branc_id, 'class_wise_info.class_id'=>$data['studentDetails']->class_id, 'class_wise_info.class_section_id'=>$data['studentDetails']->class_section_id,'class_wise_info.year'=>$data['studentDetails']->year);


            if($data['class_id'] =='6' || $data['class_id'] =='7' || $data['class_id'] =='8' || $data['class_id'] =='9' || $data['class_id'] =='10'){

				$allStuResultInfo  = $this->M_join->findAllStuSixToTenPositionMarks('class_wise_info', $stuPosiWhere, 'class_wise_info.class_roll', 'asc', $annualXmId);


				 $marksArray = array(); 
				 $failStatus = "";
				 $stuFailRoll    = "";
				 foreach($allStuResultInfo as $v) { 
					 $annualMarksTotal = 0;
					 $halfMarksTotal   = 0;
					 foreach ($v->subjectWiseMarksInfo as $vs){
						  $annualTotal   = $vs->annualSubjectMarks->multi_choose_mark + $vs->annualSubjectMarks->written_marks + $vs->annualSubjectMarks->practicle_marks;
						
						 $halfTotal 	= $vs->halfYearSubjectMarks->multi_choose_mark + $vs->halfYearSubjectMarks->written_marks + $vs->halfYearSubjectMarks->practicle_marks;
                        
						 $annualFmTotal = $vs->annualFmMarks->mcq_marks + $vs->annualFmMarks->creative_marks + $vs->annualFmMarks->practicle_marks;
						 $halfFmTotal   = $vs->halfYearFmMarks->mcq_marks + $vs->halfYearFmMarks->creative_marks + $vs->halfYearFmMarks->practicle_marks;

						  $annualPercentage = $annualTotal * 100/$annualFmTotal; 
						 
						 $halfPercentage   = $halfTotal * 100/$halfFmTotal;
						 $totalPercentage  = $annualPercentage + $halfPercentage; 
						 $passPercentage   = $totalPercentage/2;  
                         

                         if($passPercentage < 33 || $passPercentage ==0){
                             $stuFailRoll    = $v->class_roll;	
                         } 

						 $annualMarksTotal += $annualTotal;
						 $halfMarksTotal   += $halfTotal;
						 $positionTotal    = $annualMarksTotal + $halfMarksTotal;  

				     }


				     
				        if($stuFailRoll != $v->class_roll) 
						  $marksArray[$v->class_roll] = $positionTotal;



				    
				    $stuFailRoll     = "";

                    
				     
				}




			} else if($data['class_id'] =='11' || $data['class_id'] =='12') {

				if($data['class_id'] =='11'){

					$allStuElevenResultInfo  = $this->M_join->findAllStuElevenPositionMarks('class_wise_info', $stuPosiWhere, 'class_wise_info.class_roll', 'asc');


				    	$marksArray = array(); 
						foreach($allStuElevenResultInfo as $v) { 
							 $yearFinalMarksTotal = 0;
							 $firstTermTotal   = 0;
							 $secondTermTotal  = 0;
							
							 foreach ($v->subjectWiseMarksInfo as $vs){
								 $yearTotal = $vs->yearFinalSubjectMarks->multi_choose_mark + $vs->yearFinalSubjectMarks->written_marks + $vs->yearFinalSubjectMarks->practicle_marks;
								 $firstTotal = $vs->firstTermSubjectMarks->multi_choose_mark + $vs->firstTermSubjectMarks->written_marks + $vs->firstTermSubjectMarks->practicle_marks;
								 $secondTotal = $vs->secondTermSubjectMarks->multi_choose_mark + $vs->secondTermSubjectMarks->written_marks + $vs->secondTermSubjectMarks->practicle_marks;


								 $yearFinalMarksTotal 	+= $yearTotal;
								 $firstTermTotal 		+= $firstTotal;
								 $secondTermTotal 		+= $secondTotal;
								 
								 $positionTotal  = $yearFinalMarksTotal + $firstTermTotal + $secondTermTotal;  

								 
								$marksArray[$v->class_roll] = $positionTotal;
						     }
						}

                   
				} else {
					$allStuTwelveResultInfo  = $this->M_join->findAllStuTwlvePositionMarks('class_wise_info', $stuPosiWhere, 'class_wise_info.class_roll', 'asc');


				    	$marksArray = array(); 
						foreach($allStuTwelveResultInfo as $v) { 
							 $testMarksTotal = 0;
							 $preTestMarksTotal   = 0;
							
							 foreach ($v->subjectWiseMarksInfo as $vs){
								 $testTotal = $vs->testSubjectMarks->multi_choose_mark + $vs->testSubjectMarks->written_marks + $vs->testSubjectMarks->practicle_marks;
								 $preTestTotal = $vs->preTestSubjectMarks->multi_choose_mark + $vs->preTestSubjectMarks->written_marks + $vs->preTestSubjectMarks->practicle_marks;
								 

								 $testMarksTotal += $testTotal;
								 $preTestMarksTotal += $preTestMarksTotal;
								
								 
								 $positionTotal  = $testMarksTotal + $preTestMarksTotal;  

								 
								$marksArray[$v->class_roll] = $positionTotal;
						     }
						}

				}


		    } else {

		    	$allStuPlayToSixResultInfo  = $this->M_join->findAllStuPlayToFivePositionMarks('class_wise_info', $stuPosiWhere, 'class_wise_info.class_roll', 'asc');


		    	$marksArray = array(); 
				foreach($allStuPlayToSixResultInfo as $v) { 
					 $annualMarksTotal = 0;
					 $firstTermTotal   = 0;
					 $secondTermTotal  = 0;
					 $thirdTermTotal   = 0;
					 foreach ($v->subjectWiseMarksInfo as $vs){
						 $annualMarksTotal += $vs->annualSubjectMarks->obtained_marks;
						 $firstTermTotal += $vs->firstTermSubjectMarks->obtained_marks;
						 $secondTermTotal += $vs->secondTermSubjectMarks->obtained_marks;
						 $thirdTermTotal += $vs->thirdTermSubjectMarks->obtained_marks;
						 $positionTotal  = $annualMarksTotal + $firstTermTotal + $secondTermTotal + $thirdTermTotal;  

						 
						$marksArray[$v->class_roll] = $positionTotal;
				     }
				}




		    }
			
			arsort($marksArray);

			

			$position = 1;
			foreach($marksArray as $stId => $stMarks) {
				if($stId == $data['studentDetails']->class_roll) break;
				$position++;
			}

		    $data['position']   = $position;

			


		   $this->load->view('allReport/studentWiseProgressReportActionPage', $data);
		
	}




	public function classWiseAllStudentResultReport() {
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		
		$authorID 	= $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		$data['title'] 					= 'VMGPS&#65515;Result Report';
		$data['basisInfo'] 				=  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		$data['classListInfo'] 			=  $this->M_crud->findLimitClass('class_list_manage', $where, $order = 'sl_no', $serialized, $limitTo = '5', $limitFrom = '8');
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['nationalityListInfo'] 	=  $this->M_crud->findAll('nationality_list_manage', $where, $orderBy, $serialized);
		$data['religionListInfo'] 		=  $this->M_crud->findAll('religion_list_manage', $where, $orderBy, $serialized);
		$data['allXamListInfo'] 		=  $this->M_crud->findAll('all_exam_type_manage', array('year' => date('Y-m-d')), $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage',$where, $orderBy, $serialized);
		 
		$this->load->view('allReport/classWiseAllStudentResultReportPage', $data);
	}





	public function classWiseAllStudentResultReportAction()
	{



		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where = array(), $orderBy = 'id', $serialized = 'asc');
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		
		$data['title'] = "Student Result Report";
		$data['branch_name']    = $this->session->branchName;
		
		$data['year'] 			= $this->input->post('year');  
		$data['branch_id'] 		= $this->input->post('branch_id'); 
		$data['class_id'] 		= $this->input->post('class_id'); 
		$data['group_id'] 		= $this->input->post('group_id'); 
		$data['section_id']     = $this->input->post('section_id'); 
		$data['exam_type_id'] 	= $this->input->post('exam_type_id');

		$data['className']  	= $this->M_crud->findById('class_list_manage', array('id'=>$data['class_id']));
		$data['examName']  	    = $this->M_crud->findById('all_exam_type_manage', array('id'=>$data['exam_type_id']));

		$year                   = $data['year'];
		$branch_id              = $data['branch_id'];
		$class_id               = $data['class_id'];
		$group_id               = $data['group_id'];

		$subwhere 	    		= "(group_id ='$group_id' OR group_id ='all') AND class_id ='$class_id' AND branch_id = '$branch_id' AND year = '$year'";
		$data['allSubjectList'] = $this->M_crud->findAll('subject_manage', $subwhere, $orderBy = 'id', $serialized = 'asc');
			
			if(!empty($data['branch_id']) || !empty($data['class_id']) || !empty($data['group_id']) || !empty($data['section_id']) || !empty($data['year'])){

				if(!empty($data['branch_id']))   	$where2['class_wise_info.branc_id']   		= $data['branch_id'];
				if(!empty($data['class_id']))   	$where2['class_wise_info.class_id']   		= $data['class_id'];
				if(!empty($data['group_id']))   	$where2['class_wise_info.class_group_id']   = $data['group_id'];
				if(!empty($data['section_id']))   	$where2['class_wise_info.class_section_id'] = $data['section_id'];
				if(!empty($data['year']))   		$where2['class_wise_info.year']   			= $data['year'];
			}

			if($data['class_id'] == '8'){
            	$annualXmId = '6';

            } else if($data['class_id'] == '10'){
                $annualXmId = '7';
            } else {
            	$annualXmId = '5';
            }

            $data['annualXmId'] = $annualXmId;

			
			$data['stuWiseResultInfo'] 	    = $this->M_join->findStuWiseAnnualHalfResultInfo('class_wise_info', $where2, $annualXmId, 'class_roll', 'asc');




			
			// position start 

		   $maxFailCount  = $this->M_crud_ayenal->findMax('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $data['branch_id'], 'student_exam_wise_full_result_info.class_id' => $data['class_id'], 'student_exam_wise_full_result_info.section_id' => $data['section_id'], 'student_exam_wise_full_result_info.year' => $data['year'], 'exam_id' => $data['exam_type_id']), 'fail_count');

		    $allStudentAerray = array();
	        $position = 1;


            if($data['exam_type_id'] == 4){
	            

			    for ($i=0; $i <= $maxFailCount->fail_count; $i++) { 

			   	    $query  = $this->M_crud_ayenal->findAll('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $data['branch_id'], 'student_exam_wise_full_result_info.class_id' => $data['class_id'], 'student_exam_wise_full_result_info.section_id' => $data['section_id'], 'student_exam_wise_full_result_info.year' => $data['year'], 'fail_count' => $i, 'exam_id' => $data['exam_type_id']), 'id', 'asc');
	                
	                $studentAerray = array();
			   	    foreach ($query as $value ) {
			   	    	 $studentAerray[$value->stu_auto_id] = $value->total_marks;
			   	    }

			   	    arsort($studentAerray);
	                
	                foreach ($studentAerray as $key => $pval ) {
			   	    	$allStudentAerray[$key] = $position;
			   	    	$position ++;
			   	    }

			    }


		    }else{

		    	for ($i=0; $i <= $maxFailCount->fail_count; $i++) { 

			   	    $query  = $this->M_crud_ayenal->findAllSixStuPositionData('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $data['branch_id'], 'student_exam_wise_full_result_info.class_id' => $data['class_id'], 'student_exam_wise_full_result_info.section_id' => $data['section_id'], 'student_exam_wise_full_result_info.year' => $data['year'], 'fail_count' => $i, 'exam_id' => $data['exam_type_id']), 'id', 'asc');
	                
	                $studentAerray = array();
			   	    foreach ($query as $value ) {
			   	    	 $studentAerray[$value->stu_auto_id] = $value->annualMarks->total_marks + $value->halfYearly->total_marks;
			   	    }

			   	    arsort($studentAerray);

	                foreach ($studentAerray as $key => $pval ) {
			   	    	$allStudentAerray[$key] = $position;
			   	    	$position ++;
			   	    }

			    }

		    }




		    $data['allStudentAerray'] = $allStudentAerray;

            // position end 



		
			

		   $this->load->view('allReport/classWiseAllStudentResultReportActionResultPage', $data);
		
	}


	public function classWisePlayToFiveResultReport() 
	{
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		
		$authorID 	= $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		$data['title'] 					= 'VMGPS&#65515;Result Report';
		$data['basisInfo'] 				=  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		$data['classListInfo'] 			=  $this->M_crud->findLimitClass('class_list_manage', $where, $order = 'sl_no', $serialized, $limitTo = '8', $limitFrom = '0');
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['nationalityListInfo'] 	=  $this->M_crud->findAll('nationality_list_manage', $where, $orderBy, $serialized);
		$data['religionListInfo'] 		=  $this->M_crud->findAll('religion_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage',$where, $orderBy, $serialized);
		 
		$this->load->view('allReport/classWisePlayToFiveResultReportPage', $data);
	}


	public function classWisePlayToFiveResultReportAction(){



		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where = array(), $orderBy = 'id', $serialized = 'asc');
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		
		$data['title'] = "Student Result Report";
		$data['branch_name']    = $this->session->branchName;
		
		$data['year'] 			= $this->input->post('year');  
		$data['branch_id'] 		= $this->input->post('branch_id'); 
		$data['class_id'] 		= $this->input->post('class_id'); 
		$data['group_id'] 		= $this->input->post('group_id'); 
		$data['section_id']     = $this->input->post('section_id'); 
		$data['exam_type_id']   = $this->input->post('exam_type_id'); 
		
		$data['className']  	= $this->M_crud->findById('class_list_manage', array('id'=>$data['class_id']));
		$data['examName']  	    = $this->M_crud->findById('all_exam_type_manage', array('id'=>$data['exam_type_id']));
		$data['sectionName']  	= $this->M_crud->findById('section_list_manage', array('id'=>$data['section_id']));

		$year                   = $data['year'];
		$branch_id              = $data['branch_id'];
		$class_id               = $data['class_id'];
		$group_id               = $data['group_id'];

		$subwhere 	    		= "(group_id ='$group_id' OR group_id ='all') AND class_id ='$class_id' AND branch_id = '$branch_id' AND year = '$year'";
		$data['allSubjectList'] = $this->M_crud->findAll('subject_manage', $subwhere, $orderBy = 'id', $serialized = 'asc');
			
			if(!empty($data['branch_id']) || !empty($data['class_id']) || !empty($data['group_id']) || !empty($data['section_id']) || !empty($data['year'])){

					if(!empty($data['branch_id']))   	$where2['class_wise_info.branc_id']   		= $data['branch_id'];
					if(!empty($data['class_id']))   	$where2['class_wise_info.class_id']   		= $data['class_id'];
					if(!empty($data['group_id']))   	$where2['class_wise_info.class_group_id']   = $data['group_id'];
					if(!empty($data['section_id']))   	$where2['class_wise_info.class_section_id'] = $data['section_id'];
					if(!empty($data['year']))   		$where2['class_wise_info.year']   			= $data['year'];

			}

			
		   $data['stuWiseResultInfo'] 	    = $this->M_join->findAllStuInfoForResultBB('class_wise_info', $where2, 'class_roll', 'asc');
          

          // position start 

		   $maxFailCount  = $this->M_crud_ayenal->findMax('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $data['branch_id'], 'student_exam_wise_full_result_info.class_id' => $data['class_id'], 'student_exam_wise_full_result_info.section_id' => $data['section_id'], 'student_exam_wise_full_result_info.year' => $data['year'], 'exam_id' => $data['exam_type_id']), 'fail_count');

		    $allStudentAerray = array();
	        $position = 1;


            if($data['exam_type_id'] != 5){
	            

			    for ($i=0; $i <= $maxFailCount->fail_count; $i++) { 

			   	    $query  = $this->M_crud_ayenal->findAll('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $data['branch_id'], 'student_exam_wise_full_result_info.class_id' => $data['class_id'], 'student_exam_wise_full_result_info.section_id' => $data['section_id'], 'student_exam_wise_full_result_info.year' => $data['year'], 'fail_count' => $i, 'exam_id' => $data['exam_type_id']), 'id', 'asc');
	                
	                $studentAerray = array();
			   	    foreach ($query as $value ) {
			   	    	 $studentAerray[$value->stu_auto_id] = $value->total_marks;
			   	    }

			   	    arsort($studentAerray);
	                
	                foreach ($studentAerray as $key => $pval ) {
			   	    	$allStudentAerray[$key] = $position;
			   	    	$position ++;
			   	    }

			    }


		    }else{

		    	for ($i=0; $i <= $maxFailCount->fail_count; $i++) { 

			   	    $query  = $this->M_crud_ayenal->findAllStuPositionData('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $data['branch_id'], 'student_exam_wise_full_result_info.class_id' => $data['class_id'], 'student_exam_wise_full_result_info.section_id' => $data['section_id'], 'student_exam_wise_full_result_info.year' => $data['year'], 'fail_count' => $i, 'exam_id' => $data['exam_type_id']), 'id', 'asc');
	                
	                $studentAerray = array();
			   	    foreach ($query as $value ) {
			   	    	 $studentAerray[$value->stu_auto_id] = $value->annualMarks->total_marks + $value->firstterm->total_marks 
			   	    	 + $value->secondterm->total_marks + $value->thirdterm->total_marks;
			   	    }

			   	    arsort($studentAerray);

	                foreach ($studentAerray as $key => $pval ) {
			   	    	$allStudentAerray[$key] = $position;
			   	    	$position ++;
			   	    }

			    }

		    }


           //echo $maxFailCount->fail_count;

		    $data['allStudentAerray'] = $allStudentAerray;

            // position end 



		   $this->load->view('allReport/classWisePlayToFiveResultReportActionPage', $data);
		
	}

	public function classWiseElevenToTwelveResultReport() {
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		
		$authorID 	= $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		$data['title'] 					= 'VMGPS&#65515;Result Report';
		$data['basisInfo'] 				=  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		$data['classListInfo'] 			=  $this->M_crud->findLimitClass('class_list_manage', $where, $order = 'sl_no', $serialized, $limitTo = '2', $limitFrom = '13');
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['nationalityListInfo'] 	=  $this->M_crud->findAll('nationality_list_manage', $where, $orderBy, $serialized);
		$data['religionListInfo'] 		=  $this->M_crud->findAll('religion_list_manage', $where, $orderBy, $serialized);
		$data['allXamListInfo'] 		=  $this->M_crud->findAll('all_exam_type_manage', array('year' => date('Y-m-d')), $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage',$where, $orderBy, $serialized);
		 
		$this->load->view('allReport/classWiseElevenToTwelveResultReportPage', $data);
	}

	public function classWiseElevenToTwelveResultReportAction(){

		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where = array(), $orderBy = 'id', $serialized = 'asc');
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		
		$data['title'] = "Student Result Report";
		$data['branch_name']    = $this->session->branchName;
		
		$data['year'] 			= $this->input->post('year');  
		$data['branch_id'] 		= $this->input->post('branch_id'); 
		$data['class_id'] 		= $this->input->post('class_id'); 
		$data['group_id'] 		= $this->input->post('group_id'); 
		$data['exam_type_id'] 	= $this->input->post('exam_type_id'); 
		
		$data['className']  	= $this->M_crud->findById('class_list_manage', array('id'=>$data['class_id']));
		$data['examName']  	    = $this->M_crud->findById('all_exam_type_manage', array('id'=>$data['exam_type_id']));

		$year                   = $data['year'];
		$branch_id              = $data['branch_id'];
		$class_id               = $data['class_id'];
		$group_id               = $data['group_id'];

		$subwhere 	    		= "(group_id ='$group_id' OR group_id ='all') and class_id ='$class_id' and branch_id = '$branch_id'";
		$data['allSubjectList'] = $this->M_crud->findAll('subject_manage', $subwhere, $orderBy = 'id', $serialized = 'asc');
			
			if(!empty($data['branch_id']) || !empty($data['class_id']) || !empty($data['group_id']) || !empty($data['year'])){

				if(!empty($data['branch_id']))   	$where2['class_wise_info.branc_id']   		= $data['branch_id'];
				if(!empty($data['class_id']))   	$where2['class_wise_info.class_id']   		= $data['class_id'];
				if(!empty($data['group_id']))   	$where2['class_wise_info.class_group_id']   = $data['group_id'];
				if(!empty($data['year']))   		$where2['class_wise_info.year']   			= $data['year'];

			}


           // position start 

			$maxFailCount  = $this->M_crud_ayenal->findMax('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $data['branch_id'], 'student_exam_wise_full_result_info.class_id' => $data['class_id'], 'student_exam_wise_full_result_info.year' => $data['year'], 'exam_id' => $data['exam_type_id']), 'fail_count');

		    $allStudentAerray = array();
	        $position = 1;


        if($data['class_id'] == 11){

			  $data['stuWiseElevenResultInfo'] 	= $this->M_join->findAllStuInfoForResultBB('class_wise_info', $where2, 'class_roll', 'asc');

            if($data['exam_type_id'] != 10){
	            

			    for ($i=0; $i <= $maxFailCount->fail_count; $i++) { 

			   	    $query  = $this->M_crud_ayenal->findAll('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $data['branch_id'], 'student_exam_wise_full_result_info.class_id' => $data['class_id'], 'student_exam_wise_full_result_info.year' => $data['year'], 'fail_count' => $i, 'exam_id' => $data['exam_type_id']), 'id', 'asc');
	                
	                $studentAerray = array();
			   	    foreach ($query as $value ) {
			   	    	 $studentAerray[$value->stu_auto_id] = $value->total_marks;
			   	    }

			   	    arsort($studentAerray);
	                
	                foreach ($studentAerray as $key => $pval ) {
			   	    	$allStudentAerray[$key] = $position;
			   	    	$position ++;
			   	    }

			    }


		    }else{

		    	for ($i=0; $i <= $maxFailCount->fail_count; $i++) { 

			   	    $query  = $this->M_crud_ayenal->findAllEleStuPositionData('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $data['branch_id'], 'student_exam_wise_full_result_info.class_id' => $data['class_id'], 'student_exam_wise_full_result_info.year' => $data['year'], 'fail_count' => $i, 'exam_id' => $data['exam_type_id']), 'id', 'asc');
	                
	                $studentAerray = array();
			   	    foreach ($query as $value ) {
			   	    	 $studentAerray[$value->stu_auto_id] = $value->yearFinalMarks->total_marks + $value->firstTermMarks->total_marks + $value->secondTermMarks->total_marks;
			   	    }

			   	    arsort($studentAerray);

	                foreach ($studentAerray as $key => $pval ) {
			   	    	$allStudentAerray[$key] = $position;
			   	    	$position ++;
			   	    }

			    }

		    }






        }else{

			$data['stuWiseTwelveResultInfo'] 	= $this->M_join->findAllStuInfoForResultBB('class_wise_info', $where2, 'class_roll', 'asc');


			if($data['exam_type_id'] != 12){
	            

			    for ($i=0; $i <= $maxFailCount->fail_count; $i++) { 

			   	    $query  = $this->M_crud_ayenal->findAll('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $data['branch_id'], 'student_exam_wise_full_result_info.class_id' => $data['class_id'], 'student_exam_wise_full_result_info.year' => $data['year'], 'fail_count' => $i, 'exam_id' => $data['exam_type_id']), 'id', 'asc');
	                
	                $studentAerray = array();
			   	    foreach ($query as $value ) {
			   	    	 $studentAerray[$value->stu_auto_id] = $value->total_marks;
			   	    }

			   	    arsort($studentAerray);
	                
	                foreach ($studentAerray as $key => $pval ) {
			   	    	$allStudentAerray[$key] = $position;
			   	    	$position ++;
			   	    }

			    }


		    }else{

		    	for ($i=0; $i <= $maxFailCount->fail_count; $i++) { 

			   	    $query  = $this->M_crud_ayenal->findAllTwlStuPositionData('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $data['branch_id'], 'student_exam_wise_full_result_info.class_id' => $data['class_id'], 'student_exam_wise_full_result_info.year' => $data['year'], 'fail_count' => $i, 'exam_id' => $data['exam_type_id']), 'id', 'asc');
	                
	                $studentAerray = array();
			   	    foreach ($query as $value ) {
			   	    	 $studentAerray[$value->stu_auto_id] = $value->testMarks->total_marks + $value->preTestMarks->total_marks;
			   	    }

			   	    arsort($studentAerray);

	                foreach ($studentAerray as $key => $pval ) {
			   	    	$allStudentAerray[$key] = $position;
			   	    	$position ++;
			   	    }

			    }

		    }

        }


		   $data['allStudentAerray'] = $allStudentAerray;

           // position end 
			
		
			

		   $this->load->view('allReport/classWiseElevenToTwelveResultReportActionPage', $data);
		
	}



	
	
	public function resultReport() {
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		$data['title'] = 'VMGPS&#65515;Result Report';
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
		
		$this->load->view('allReport/resultReportPage', $data);
	}
	
	
	public function changeSubject() {
		$data['branch_id']		= $this->input->post('branch_id');
		$data['class_id']		= $this->input->post('class_id');
		$class_id               = $data['class_id'];
		$data['group_id']		= $this->input->post('group_id');
		$group_id               = $data['group_id'];
		$data['year']			= $this->input->post('year');

		$branch_id              = $data['branch_id'];
		$year               	= $data['year'];

		if(!empty($data['branch_id']) || !empty($data['class_id']) || !empty($group_id) || !empty($data['year'])){
			if(!empty($data['branch_id']))  $where['branch_id']   =  $data['branch_id'];
			if(!empty($data['class_id']))   $where['class_id']    =  $data['class_id'];
			if(!empty($data['year']))  		$where['year']        =  $data['year'];

			if($data['class_id'] == '9' || $data['class_id'] == '10' || $data['class_id'] == '11' || $data['class_id'] == '12'){
	           if(!empty($group_id))  			$where 	  			  =  "(group_id ='$group_id' OR group_id ='all') AND class_id ='$class_id' AND branch_id ='$branch_id' AND year = '$year'";
            } else {
               if(!empty($group_id))  			$where['group_id'] 	  =  $group_id;	
            }
			$subjectList 					=  $this->M_crud->findAll('subject_manage', $where , $order = 'id', $serialized = 'asc');

		}

		echo '<option value="" selected="selected" >Select Subject</option>';
		foreach($subjectList as $v) {
			echo '<option value="'.$v->id.'" selected="selected" >'.$v->subject_name.'</option>';
	    }
	
	}

	
	
	
	
	public function findExamType() {
		$data['branch_id'] = $this->input->post('branch_id'); 
		$data['class_id'] = $this->input->post('class_id'); 
		$data['group_id'] = $this->input->post('group_id'); 
		$data['section_id'] = $this->input->post('section_id'); 
		$data['shift_id'] = $this->input->post('shift_id'); 
		$data['year'] = $this->input->post('year'); 
		$data['subject_id'] = $this->input->post('subject_id'); 
		
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		$currYear = date('Y');
		
		$data['examTypeList']  = $this->M_join->findClasWiseExamTypeList('class_wise_exam_type_manage', $where = array('branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'class_wise_exam_type_manage.year' => $data['year']), $order = 'id', $serialized = 'asc');
		$this->load->view('allReport/findExamTypePage', $data);
	
	}
	
	
	public function findExamReportResult(){
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where = array(), $orderBy = 'id', $serialized = 'asc');
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		
	    $stuID = $this->input->post('stuID'); 
		$data['title'] = "Fee Collection Earning Report";
		
		$data['branch_id'] 	= $this->input->post('branch_id'); 
		$data['class_id'] 	= $this->input->post('class_id'); 
		$data['group_id'] 	= $this->input->post('group_id'); 
		$data['section_id'] = $this->input->post('section_id'); 
		$data['shift_id'] 	= $this->input->post('shift_id'); 
		$data['year'] 		= $this->input->post('year'); 
		$data['subject_id'] = $this->input->post('subject_id'); 
		$examTypeIDList = $this->input->post('examTypeID');
		$data['examTypeIDList'] = $this->input->post('examTypeID');
	    //print_r($examTypeIDList);
		//$where = "";
		
	    //$data['examTypeInfo'] 			=  $this->M_crud->findAll('exam_type_manage', $where = array(), $orderBy = 'id', $serialized = 'asc');
	    $data['examTypeInfo'] 			=  $this->M_crud->findAllTypeMarks('all_exam_type_manage', $where = array(), $orderBy = 'id', $serialized = 'asc', $data['branch_id'], $data['class_id'], $data['group_id'], $data['section_id'], $data['shift_id'], $data['year'], $data['subject_id']);

		$data['shiftInfo']				= $this->M_crud->findById('shift_list_manage', array('id'=>$data['shift_id']));
		$data['subjectInfo']			= $this->M_crud->findById('subject_manage', array('id'=>$data['subject_id']));
		//print_r($where);
		 	$data['stuDetailsInfo']  	= $this->M_join->findAllStuInfoForResult('class_wise_info', $stuWhere = array('branc_id' =>$data['branch_id'], 'class_id' =>$data['class_id'], 'class_group_id' =>$data['group_id'], 'class_section_id' =>$data['section_id'] , 'class_shift_id' =>$data['shift_id'], 'class_wise_info.year' => $data['year']), $orderBy = 'class_wise_auto_id', $serialized = 'desc', $data['subject_id'], $examTypeIDList);
			
			//print_r($data['stuDetailsInfo']);
			foreach($data['stuDetailsInfo']  as $v) {
			$data['branch_name']  = $v->branch_name;
		 	}
		 $this->load->view('allReport/findExamReportResultPage', $data);
	}


	public function feeCollectionClassWiseReport() {
		
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		$data['title'] = 'Fee Collection Class Wise Earning Report';
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage',  array(), $orderBy = 'id', $serialized = 'asc');
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage',  array(), $order = 'sl_no', $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage',  array(), $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage',  array(), $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage',  array(), $orderBy, $serialized);
		
		$this->load->view('allReport/feeCollectionClassWiseReport', $data);
	}

	public function feeCollectionClassWiseReportResult() {
		
		$data['title'] = "Fee Collection Earning Report";
		
		$data['branch_id'] 	= $this->input->post('branch_id'); 
		$data['class_id'] 	= $this->input->post('class_id'); 
		$data['group_id'] 	= $this->input->post('group_id'); 
		$data['section_id'] = $this->input->post('section_id'); 
		$data['shift_id'] 	= $this->input->post('shift_id'); 
		//$data['version'] 	= $this->input->post('version'); 
		
		$data['fromDate'] = $this->input->post('fromDate'); 
		$data['toDate'] = $this->input->post('toDate'); 
		
		$data['classWiseFeeCollection']  = $this->M_join->findAllClassWiseFeeCollection('stu_fee_head_paid_details_info', $where = array('fee_head_stu_branch_id' => $data['branch_id'], 'fee_head_stu_class_id' => $data['class_id'], 'fee_head_stu_group_id' => $data['group_id'], 'fee_head_stu_section_id' => $data['section_id'], 'fee_head_stu_shift_id' => $data['shift_id'],  'submittedDate >=' =>$data['fromDate'], 'submittedDate <=' =>$data['toDate'], 'collection_approve_status' => "approve"), $orderBy = 'id', $serialized = 'desc');
	
		$this->load->view('allReport/feeCollectionClassWiseReportResult', $data);
	
	}
	
	public function feeCollectionBranchWiseReport() {
		
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		$data['title'] = 'Fee Collection Branch Wise Earning Report';
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage',  array(), $orderBy = 'id', $serialized = 'asc');
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		$this->load->view('allReport/feeCollectionBranchWiseReport', $data);
	}
	
	public function feeCollectionBranchWiseReportResult() {
		
		$data['title'] = "Fee Collection Earning Report";
		
		$data['branch_id'] 	= $this->input->post('branch_id'); 
		$data['fromDate'] = $this->input->post('fromDate'); 
		$data['toDate'] = $this->input->post('toDate'); 
		$this->load->view('allReport/feeCollectionBranchWiseReportResult', $data);
	
	}



}

