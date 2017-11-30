<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StuBasicInfo extends CI_Controller {

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
		$this->load->library('pagination');
		isAuthenticate();
	}
	
	
	public function index($onset = 0)
	{
		$data['title'] = 'VMGPS&#65515;Student Basic Information';
		$data['alertMsg']	= $this->session->userdata('alertMsg');
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, $orderBy, $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		$data['nationalityListInfo'] 	=  $this->M_crud->findAll('nationality_list_manage', $where, $orderBy, $serialized);
		$data['religionListInfo'] 		=  $this->M_crud->findAll('religion_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		
		
		$limit = 12;
		$data['stuBasicInfo'] 			=  $this->M_crud->findAllBasicInfo('stu_basic_info', $where, $orderBy, 'desc', $onset, $limit);
		
			
		//$data['allOrderList']    = $this->M_order_info->findAllByCus($customer_id);
		$data['onset'] 			= $onset;
		$config['base_url'] 	= base_url('stuBasicInfo/index');
		$config['total_rows'] 	= $this->M_crud->countAllList('stu_basic_info', array());
		$config['uri_segment'] 	= 3;
		$config['per_page'] 	= 12;
		$config['num_links'] 	= 7;
		$config['first_link']	= FALSE;
		$config['last_link'] 	= FALSE;
		$config['prev_link']	= 'Previous';
		$config['next_link'] 	= 'Next';

		$this->pagination->initialize($config); 
		
		$this->session->set_userdata(array('alertMsg' => ''));
		$this->load->view('studentInfo/stuBasicInfoPage', $data);
	}
	
	
	public function stuBasicInfoStore()
	{
		$updateId						= $this->input->post('update_id');
		
		$table = '';
		$where = array('id' => $updateId);
		$orderBy = 'id';
			
		$data['stu_full_name']			= $this->input->post('stu_full_name');
		$data['stu_birth_date']			= $this->input->post('stu_birth_date');
		$data['stu_sex']				= $this->input->post('stu_sex');
		$data['stu_blood_group']		= $this->input->post('stu_blood_group');
		$data['stu_remarkabe_sign']		= $this->input->post('stu_remarkabe_sign');
		$data['stu_mail_adrs']			= $this->input->post('stu_mail_adrs');
		$data['stu_mobile']				= $this->input->post('stu_mobile');
		$data['stu_passport']			= $this->input->post('stu_passport');
		$data['stu_nid']				= $this->input->post('stu_nid');
		$data['stu_social_scr_no']		= $this->input->post('stu_social_scr_no');
		$data['stu_type']				= $this->input->post('stu_type');
		$data['stu_photo']				= $this->input->post('stu_photo');
		$data['stu_nationality_id']		= $this->input->post('stu_nationality_id');
		$data['stu_religion_id']		= $this->input->post('stu_religion_id');
		$data['stu_status']				= $this->input->post('stu_status');
		$data['stu_last_school']		= $this->input->post('stu_last_school');
		$data['stu_entry_date']			= $this->input->post('stu_entry_date');
		
		
		
		$data2['class_id']					= $this->input->post('class_id');
		$data2['class_roll']				= $this->input->post('class_roll');
		$data2['class_section_id']			= $this->input->post('class_section_id');
		$data2['class_group_id']			= $this->input->post('class_group_id');
		$data2['class_shift_id']			= $this->input->post('class_shift_id');
		$data2['branc_id']					= $this->input->post('branc_id');
		$data2['date']						= date("Y-m-d");
		$data2['year']						= date("Y");
		
		$findBranchCode						= $this->M_crud->findById('branch_list_manage', array('id'=>$data2['branc_id']));
		$findClassCode						= $this->M_crud->findById('class_list_manage', 	array('id'=>$data2['class_id']));
		
		$findShiftCode						= $this->M_crud->findById('shift_list_manage', 	array('id'=>$data2['class_shift_id']));
		
		$expectedClassCode = $findClassCode->class_code;
		if($expectedClassCode == "13") {
			$classCode = "PL";
		} else if($expectedClassCode == "14") {
			$classCode = "NU";
		} else if($expectedClassCode == "14") {
			$classCode = "K1";
		} else if($expectedClassCode == "14") {
			$classCode = "K2";
		} else if($expectedClassCode == "14") {
			$classCode = "K3";
		} else {
			$classCode = $findClassCode->class_code;
		}
		$findGroupCode						= $this->M_crud->findById('group_list_manage',  array('id'=>$data2['class_group_id']));
		$findSectionCode					= $this->M_crud->findById('section_list_manage', array('id'=>$data2['class_section_id']));
		
		$LastTwoDigitYear = substr((string)$data2['year'],-2); 
		
		if(!empty($data2['class_group_id'])) {
		$data['stu_current_id']				= $findBranchCode->branch_code.$classCode.$findGroupCode->group_code.$findSectionCode->section_code.$findShiftCode->id.$LastTwoDigitYear.$data['stu_sex'].$data2['class_roll'];
		} else {
		$data['stu_current_id']				= $findBranchCode->branch_code.$findClassCode->class_code."1".$findSectionCode->section_code.$findShiftCode->id.$LastTwoDigitYear.$data['stu_sex'].$data2['class_roll'];
		}
		
		$this->db->insert('stu_basic_info', $data); 
		
		$findLastID =  $this->M_crud->findMax('stu_basic_info', $noneWhere = array(), $fieldName = 'id');
		
		$data2['stu_id']					= $data['stu_current_id'];
		$data2['stu_auto_id']				= $findLastID->id;
		$this->db->insert('class_wise_info', $data2); 
		
		$this->session->set_userdata(array('alertMsg' => 'New Student Added Successfully'));
		redirect('stuBasicInfo');
	}
	
	
	

}


