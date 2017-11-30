<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LibraryReport extends CI_Controller {

	const  Title	 = 'VMGPS-Admin Panel';
	
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
		$data['title'] = 'VMGPS&#65515;Library Report';
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

		$this->load->view('library/libraryReportModulePage', $data);
	}



	public function storedReport()
	{
		$data['title'] = 'VMGPS&#65515;Stored Book Report';
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

		$data['bookTypeListInfo'] 		=  $this->M_crud->findAll('book_type', $where, 'id', $serialized);
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, $order = 'sl_no', $serialized);

		$this->load->view('library/storedReportPage', $data);
	}

	public function stockBookReportAction()
	{
		$data['title'] = 'VMGPS&#65515;Stored Book Report';
		$currYear 	= date('Y');
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

		$data['entry_from']			= $this->input->post('entry_from');
		$data['entry_to']			= $this->input->post('entry_to');
		$data['language']			= $this->input->post('language');
		$data['book_type_id']		= $this->input->post('book_type_id');
		$data['class_id']			= $this->input->post('class_id');
		$data['subject_id']			= $this->input->post('subject_id');

		if(!empty($data['language']) || !empty($data['book_type_id']) || !empty($data['class_id']) || !empty($data['subject_id']) || !empty($data['entry_from']) || !empty($data['entry_to'])){

            if(!empty($data['language']))    			$where2['library_book_create.language']  		= $data['language'];
			if(!empty($data['book_type_id']))    		$where2['library_book_create.book_type_id']  	= $data['book_type_id'];
			if(!empty($data['class_id']))    			$where2['library_book_create.class_id']  		= $data['class_id'];
			if(!empty($data['subject_id']))    			$where2['library_book_create.subject_id']  		= $data['subject_id'];
			if(!empty($data['entry_from']))    			$where2['library_book_create.entry_date >=']  		= $data['entry_from'];
			if(!empty($data['entry_to']))    			$where2['library_book_create.subject_id <=']  		= $data['entry_to'];

			$data['bookStoreDetails']   = $this->M_crud_ayenal->findAll('library_book_create', $where2, $orderBy, $serialized); 
		}


		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		$data['subjectListInfo'] 		=  $this->M_crud_ayenal->findAll('library_subject_manage', array('class_id' => $data['class_id']), $orderBy, $serialized);	
		$data['bookTypeListInfo'] 		=  $this->M_crud->findAll('book_type', $where, 'id', $serialized);
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, $order = 'sl_no', $serialized);


		$this->load->view('library/stockBookReportActionPage', $data);
	}


	public function issueBookReport()
	{
		$data['title'] = 'VMGPS&#65515;Issue Book Report';
		$currYear 	= date('Y');
		$table = '';
		$where2 = array();
		$orderBy = 'id';
		$serialized = 'asc';
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where2, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		$data['bookTypeListInfo'] 		=  $this->M_crud->findAll('book_type', $where2, 'id', $serialized);
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where2, $order = 'sl_no', $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where2, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where2, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where2, $orderBy, $serialized);


		$this->load->view('library/issueBookReportPage', $data);
	}

	public function languageWiseBookReportAction()
	{

		$data['issue_from']			= $this->input->post('issue_from');
		$data['issue_to']			= $this->input->post('issue_to');
		$data['language']			= $this->input->post('language');
		$data['book_type_id']		= $this->input->post('book_type_id');
		$data['class_id']			= $this->input->post('class_id');
		$data['subject_id']			= $this->input->post('subject_id');

		if(!empty($data['language']) || !empty($data['book_type_id']) || !empty($data['class_id']) || !empty($data['subject_id']) || !empty($data['issue_from']) || !empty($data['issue_to'])){

            if(!empty($data['language']))    			$where2['book_issue_info.issue_language']  		= $data['language'];
			if(!empty($data['book_type_id']))    		$where2['book_issue_info.issue_book_type_id']  	= $data['book_type_id'];
			if(!empty($data['class_id']))    			$where2['book_issue_info.issue_class_id']  		= $data['class_id'];
			if(!empty($data['subject_id']))    			$where2['book_issue_info.subject_id']  			= $data['subject_id'];
			if(!empty($data['issue_from']))    			$where2['book_issue_info.issue_date >=']  		= $data['issue_from'];
			if(!empty($data['issue_to']))    			$where2['book_issue_info.issue_date <=']  		= $data['issue_to'];

			$data['bookIssueDetails']   = $this->M_join_ayenal->findAllIssueBoook('book_issue_info', $where2, 'book_issue_info.id', 'desc'); 
		}


		$this->load->view('library/languageWiseBookReportActionPage', $data);
	}



	public function studentWiseBookIssueReportAction()
	{
		
		$data['issue_from_stu']		= $this->input->post('issue_from_stu');
		$data['issue_to_stu']		= $this->input->post('issue_to_stu');
		$data['student_id']			= $this->input->post('student_id');
		$data['branc_id']			= $this->input->post('branc_id');
		$data['class_section_id']	= $this->input->post('class_section_id');
		$data['class_id']			= $this->input->post('class_id');
		$data['class_shift_id']		= $this->input->post('class_shift_id');
		$data['class_group_id']		= $this->input->post('class_group_id');
		$data['class_roll']			= $this->input->post('class_roll');

		if(!empty($data['student_id'])){
			if(!empty($data['student_id']))    			$where2['book_issue_info.student_id']  		= $data['student_id'];
			if(!empty($data['issue_from_stu']))    		$where2['book_issue_info.issue_date >=']  	= $data['issue_from_stu'];
			if(!empty($data['issue_to_stu']))    		$where2['book_issue_info.issue_date <=']  	= $data['issue_to_stu'];

			$data['stuBookIssueDetails']   			= $this->M_join_ayenal->findAllIssueBoook('book_issue_info', $where2, 'book_issue_info.id', 'desc'); 
			$data['studentDetails']      			= $this->M_join_ayenal->findIssuStudentInfo('class_wise_info', array('class_wise_info.stu_id' => $data['student_id'])); 

		} else {

			if(!empty($data['branc_id']) || !empty($data['class_section_id']) || !empty($data['class_id']) || !empty($data['class_shift_id']) || !empty($data['issue_from_stu']) || !empty($data['issue_to_stu'])){

	            if(!empty($data['branc_id']))    			$where2['book_issue_info.branch_id']  		= $data['branc_id'];
				if(!empty($data['class_section_id']))    	$where2['book_issue_info.section_id']  		= $data['class_section_id'];
				if(!empty($data['class_id']))    			$where2['book_issue_info.class_id']  		= $data['class_id'];
				if(!empty($data['class_shift_id']))    		$where2['book_issue_info.shift_id']  		= $data['class_shift_id'];
				if(!empty($data['class_group_id']))    		$where2['book_issue_info.group_id']  		= $data['class_group_id'];
				if(!empty($data['class_roll']))    			$where2['book_issue_info.class_roll']  		= $data['class_roll'];
				if(!empty($data['issue_from_stu']))    		$where2['book_issue_info.issue_date >=']  	= $data['issue_from_stu'];
				if(!empty($data['issue_to_stu']))    		$where2['book_issue_info.issue_date <=']  	= $data['issue_to_stu'];

				$data['stuBookIssueDetails']   = $this->M_join_ayenal->findAllIssueBoook('book_issue_info', $where2, 'book_issue_info.id', 'desc'); 
				$data['studentDetails']        = $this->M_join_ayenal->findIssuStudentInfo('class_wise_info', array('class_wise_info.branc_id' => $data['branc_id'], 'class_wise_info.class_section_id' => $data['class_section_id'], 'class_wise_info.class_group_id' => $data['class_group_id'], 'class_wise_info.class_shift_id' => $data['class_shift_id'], 'class_wise_info.class_roll' => $data['class_roll'], 'class_wise_info.class_id' => $data['class_id'] )); 
			}
		} 

		 $this->load->view('library/languageWiseBookReportActionPage', $data);
	}


	public function expiredBookIssueReport()
	{
		$data['title'] = 'VMGPS&#65515;Expired Issue Book Report';
		$currYear 	= date('Y');
		$table = '';
		$where2 = array();
		$orderBy = 'id';
		$serialized = 'asc';
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where2, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		$data['bookTypeListInfo'] 		=  $this->M_crud->findAll('book_type', $where2, 'id', $serialized);
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where2, $order = 'sl_no', $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where2, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where2, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where2, $orderBy, $serialized);


		$this->load->view('library/expiredBookIssueReportPage', $data);
	}


	public function languageWiseExpireBookReportAction()
	{

		$currentDate                = date('Y-m-d');
		$data['language']			= $this->input->post('language');
		$data['book_type_id']		= $this->input->post('book_type_id');
		$data['class_id']			= $this->input->post('class_id');
		$data['subject_id']			= $this->input->post('subject_id');

		if(!empty($data['language']) || !empty($data['book_type_id']) || !empty($data['class_id']) || !empty($data['subject_id'])){

            if(!empty($data['language']))    			$where2['book_issue_info.issue_language']  		= $data['language'];
			if(!empty($data['book_type_id']))    		$where2['book_issue_info.issue_book_type_id']  	= $data['book_type_id'];
			if(!empty($data['class_id']))    			$where2['book_issue_info.issue_class_id']  		= $data['class_id'];
			if(!empty($data['subject_id']))    			$where2['book_issue_info.subject_id']  			= $data['subject_id'];
			if(!empty($currentDate))    				$where2['book_issue_info.valid_till_date <']  	= $currentDate;
			

			$data['bookExpireDetails']   = $this->M_crud_ayenal->findAll('book_issue_info', $where2, 'id', 'desc'); 
		}


		$this->load->view('library/languageWiseExpireBookReportActionPage', $data);
	}


    public function studentWiseExpireBookIssueReportAction()
	{
		
		$data['student_id']			= $this->input->post('student_id');
		$data['branc_id']			= $this->input->post('branc_id');
		$data['class_section_id']	= $this->input->post('class_section_id');
		$data['class_id']			= $this->input->post('class_id');
		$data['class_shift_id']		= $this->input->post('class_shift_id');
		$data['class_group_id']		= $this->input->post('class_group_id');
		$data['class_roll']			= $this->input->post('class_roll');
		$currentDate                = date('Y-m-d');

		if(!empty($data['student_id'])){
			if(!empty($data['student_id']))    			$where2['book_issue_info.student_id']  			= $data['student_id'];
			if(!empty($currentDate))    				$where2['book_issue_info.valid_till_date <']  	= $currentDate;

			$data['stuWisebookExpireDetails']   	= $this->M_crud_ayenal->findAll('book_issue_info', $where2, 'id', 'desc'); 
			$data['studentDetails']      			= $this->M_join_ayenal->findIssuStudentInfo('class_wise_info', array('class_wise_info.stu_id' => $data['student_id'])); 

		} else {

			if(!empty($data['branc_id']) || !empty($data['class_section_id']) || !empty($data['class_id']) || !empty($data['class_shift_id'])){

	            if(!empty($data['branc_id']))    			$where2['book_issue_info.branch_id']  		= $data['branc_id'];
				if(!empty($data['class_section_id']))    	$where2['book_issue_info.section_id']  		= $data['class_section_id'];
				if(!empty($data['class_id']))    			$where2['book_issue_info.class_id']  		= $data['class_id'];
				if(!empty($data['class_shift_id']))    		$where2['book_issue_info.shift_id']  		= $data['class_shift_id'];
				if(!empty($data['class_group_id']))    		$where2['book_issue_info.group_id']  		= $data['class_group_id'];
				if(!empty($data['class_roll']))    			$where2['book_issue_info.class_roll']  		= $data['class_roll'];
				if(!empty($currentDate))    				$where2['book_issue_info.valid_till_date <']  	= $currentDate;

				$data['stuWisebookExpireDetails']   	= $this->M_crud_ayenal->findAll('book_issue_info', $where2, 'id', 'desc');  
				$data['studentDetails']        = $this->M_join_ayenal->findIssuStudentInfo('class_wise_info', array('class_wise_info.branc_id' => $data['branc_id'], 'class_wise_info.class_section_id' => $data['class_section_id'], 'class_wise_info.class_group_id' => $data['class_group_id'], 'class_wise_info.class_shift_id' => $data['class_shift_id'], 'class_wise_info.class_roll' => $data['class_roll'], 'class_wise_info.class_id' => $data['class_id'] )); 
			}
		} 

		 $this->load->view('library/languageWiseExpireBookReportActionPage', $data);
	}






	

	
	 
	 
	 
	 
	
	
	

}


