<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CertificateTranscript extends CI_Controller {

	const  Title	 = 'VMGPS-Certificate Transcript';
	
	static $model 	 = array('M_admin', 'M_crud_ayenal', 'M_join_ayenal','M_crud', 'M_join');
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
	
	
	public function index()
	{
		$data['title'] = 'VMGPS&#65515;Certificate Transcript';
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

		$this->load->view('certificate/certificateModulePage', $data);
	}


    public function stuIdcard()
	{
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		$data['title'] = 'VMGPS&#65515;Student Id card ';
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

		$this->load->view('certificate/stuIdcardPage', $data);
	}

	public function stuIdCardView()
	{
		$data['title'] = "Student id view";
		$table = '';
		$where = array();
		$orderBy = 'id';
		$orderBy2 = 'class_wise_info.class_roll';
		$serialized = 'asc';
		$data['currentYear']    = date('Y');

		$data['stuID']				= $this->input->post('stuID');
		$data['branch_id']	    	= $this->input->post('branch_id');
		$data['class_id']			= $this->input->post('class_id');
		$data['group_id']			= $this->input->post('group_id');
		$data['section_id']			= $this->input->post('section_id');
		$data['shift_id']			= $this->input->post('shift_id');
		$data['class_roll']			= $this->input->post('class_roll');
		if($data['class_roll'] < 10) {
			$data['class_roll'] = "0".$data['class_roll'];
		}

		if(!empty($data['stuID'])){
			 $data['student']          ="one";
			 $data['studentIdDetails'] = $this->M_join->findClassWiseId('class_wise_info', array('class_wise_info.stu_id' => $data['stuID']), $orderBy2, $serialized);			

		} else {
			if(!empty($data['branch_id']) || !empty($data['class_id'])  || !empty($data['group_id']) || !empty($data['section_id']) || !empty($data['shift_id']) || !empty($data['class_roll'])){
				if(!empty($data['branch_id']))  	$where2['class_wise_info.branc_id']    			=  $data['branch_id'];
				if(!empty($data['class_id']))   	$where2['class_wise_info.class_id']    			=  $data['class_id'];
				if(!empty($data['group_id']))   	$where2['class_wise_info.class_group_id']    	=  $data['group_id'];
				if(!empty($data['section_id']))   	$where2['class_wise_info.class_section_id']   	=  $data['section_id'];
				if(!empty($data['shift_id']))   	$where2['class_wise_info.class_shift_id']    	=  $data['shift_id'];
				if(!empty($data['class_roll']))   	$where2['class_wise_info.class_roll']    		=  $data['class_roll'];

				$data['student']          ="many";
			    $data['studentIdDetails'] = $this->M_join->findClassWiseAllId('class_wise_info', $where2, $orderBy2, $serialized);		
			}
		}
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		$branchDetails        = $this->M_crud->findById('branch_list_manage', array('id' => $authorBranchID));
        $data['branch_name']  = $branchDetails->branch_name;
		$this->load->view('certificate/stuIdCardViewPage', $data);
	}





	public function certificate()
	{
		$data['title'] = 'VMGPS&#65515;Certificate Transcript';
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

		$this->load->view('certificate/certificatePage', $data);
	}


	public function stuCertificateView()
	{
		$data['title'] = "Student Certificate view";
		$table = '';
		$where = array();
		$orderBy = 'id';
		$orderBy2 = 'class_wise_info.class_roll';
		$serialized = 'asc';

		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

		$data['stuID']				= $this->input->post('stuID');
		$data['certificate']	    = $this->input->post('certificate');

		$data['certificateInfo'] = $this->M_join->findClassWiseId('class_wise_info', array('class_wise_info.stu_id' => $data['stuID']), $orderBy2, $serialized);	


		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		$branchDetails        = $this->M_crud->findById('branch_list_manage', array('id' => $authorBranchID));
        $data['branch_name']  = $branchDetails->branch_name;

		$this->load->view('certificate/stuCertificateViewPage', $data);
	}



	

	
	 
	 
	 
	 
	
	
	

}


