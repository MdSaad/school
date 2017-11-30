<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StuGeneralReport extends CI_Controller { 

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
		
		$this->load->view('studentInfo/stuGeneralInfoPage', $data);
	}
	
	
	public function stuGeneralReportDetails()
	{
		 $stuCurrentID						= $this->input->post('stuCurrentID');
		 $currYear 	= date('Y');
		
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		
		
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
		$data['stuEssentialInformation']		= $this->input->post('stuEssentialInfo');
		$data['stuParentDetailsInformation']	= $this->input->post('stuParentDetailsInfo');
		$data['stuGuarDetailsInformation']		= $this->input->post('stuGuarDetailsInfo');
		
		if($stuCurrentID and $data['stuDetailsInformation'] != "") {
			
			$stuDetailsInfo  = $this->M_crud->findById('class_wise_info', $stuClassWhere);
			
			
			
			//$data['stuDetailsInfo'] 		=  $this->M_join->findInfoByStuID('stu_basic_info', array('stu_current_id' => $stuCurrentID));
			
			if(!empty($stuDetailsInfo)) {
			$data['stuDetailsInfo'] 				=  $this->M_join->findInfoByStuID('stu_basic_info', array('stu_basic_info.id' => $stuDetailsInfo->stu_auto_id));
			$data['stuDetailsInfo']->currClassInfo  = $this->M_join->findClassInfoFromMulti('class_wise_info', array('stu_auto_id' => $data['stuDetailsInfo']->id, 'year' => $data['year']), 'year', 'desc');
			}
		}
		
		//print_r($data['stuDetailsInfo']->currClassInfo);
		//echo $data['stuDetailsInfo']->id;
		
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
		//$this->session->set_userdata(array('alertMsg' => 'Update Successfully'));
		//redirect('systemBasicInfo');
		$this->load->view('studentInfo/stuGeneralReportResult', $data);
	}

}


