<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DiaryReport extends CI_Controller {

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
		
	}


	

	public function index() {
	
		$data['title'] = 'VMGPS&#65515;Diary Report';
		$currYear 	= date('Y');
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';

		$data['branchListInfo']   =  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		$data['sectionListInfo']  =  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['classListInfo'] 	  =  $this->M_crud->findAll('class_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 	  =  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 	  =  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		
		
		$this->load->view('diaryInfo/diaryWebReportPage', $data);
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

		
		$whereClass               = array('id' => $data['class_id']);
		$data['classNameInfo'] 	  =  $this->M_crud->findById('class_list_manage', $whereClass);
		$data['branchListInfo']  =  $this->M_crud->findAll('branch_list_manage', $where2, $orderBy, $serialized);
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
		
		$this->load->view('diaryInfo/diaryWebReportResultPage', $data);
		
	}









	

}


