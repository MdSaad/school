<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AttendenceReport extends CI_Controller {

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
	
	
	public function index()
	{
		$data['title'] = 'VMGPS&#65515;Student Basic Information';
		
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
		
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, $orderBy, $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		
		$this->load->view('attendenceInfo/attendenceSubModule', $data);
	}



	public function dailyAttendenceReport()
	{

		$data['title'] = 'VMGPS&#65515;Student Daily Attendence Report';
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
		
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, 'sl_no', $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		
		$this->load->view('attendenceInfo/dailyAttendenceReportPage', $data);

	}




	public function dailyAttendenceReportAction()
	{
		$data['title'] = 'VMGPS&#65515;Student Attendence Report';
		
		$currYear 	= date('Y');
		$table = '';
		$where = array();
		$orderBy = 'id';
		$searchOrderBy = 'attendence_information.id';
		$serialized = 'asc';
		$groupBy = 'student_auto_id';
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

		$data['branch_id']				= $this->input->get('branch_id');
		$data['class_id']				= $this->input->get('class_id');
		$data['group_id']				= $this->input->get('group_id');
		$data['section_id']				= $this->input->get('section_id');
		$data['shift_id']				= $this->input->get('shift_id');
		$data['report_type']			= $this->input->get('report_type');
		$year					        = $this->input->get('year');
		$data['stuCurrentID']			= trim($this->input->get('stuCurrentID'));
		$data['attendenceDate']		    = $this->input->get('attendenceDate');

		 if(!empty($data['attendenceDate'])){
            $data['attnDate'] = $data['attendenceDate'];


		 } else {
		 	$data['attnDate']  = date('Y-m-d');
		 }


		 $pieces    = explode("-", $data['attnDate']);
		 $findYear  = $pieces[0]; 

		 if(!empty($year))
		 	$data['year'] = $year;
		 else
		 	$data['year'] = $findYear;

		 
       

        if(!empty($data['stuCurrentID'])){
        	$data['studentDetails']  = $this->M_join->findClassInfoFromMulti('class_wise_info', array('class_wise_info.stu_id' => $data['stuCurrentID']), 'class_wise_info.class_wise_auto_id', 'asc'); 
            $data['stuAttendenceResult']   = $this->M_crud_ayenal->findById('attendence_information', array('date' => $data['attnDate'], 'student_auto_id' => $data['studentDetails']->stu_auto_id));
            
        }else{
        	
        	$where2 = array();
        	if(!empty($data['branch_id']) || !empty($data['class_id']) || !empty($data['group_id']) || !empty($data['shift_id']) || !empty($data['section_id'])  || !empty($data['year'] )){
        		if(!empty($data['branch_id']))   $where2['class_wise_info.branc_id']  		 = $data['branch_id'];
        		if(!empty($data['class_id']))    $where2['class_wise_info.class_id']   		 = $data['class_id'];
        		if(!empty($data['group_id']))    $where2['class_wise_info.class_group_id']   = $data['group_id'];
        		if(!empty($data['section_id']))  $where2['class_wise_info.class_section_id'] = $data['section_id'];
			    if(!empty($data['shift_id'])) 	 $where2['class_wise_info.class_shift_id'] 	 = $data['shift_id'];
        		if(!empty($data['year']))        $where2['class_wise_info.year']  			 = $data['year'];
        	}

        	$data['dailyAttendenceData']  = $this->M_crud_ayenal->findAllGroup('class_wise_info', $where2, 'class_wise_info.branc_id', 'asc', $groupBy = 'branc_id'); 
        }


		
		if($authorType == "superadmin" ) {
		   $data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		   $data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, 'sl_no', $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		
		$this->load->view('attendenceInfo/dailyAttendenceReportActionPage', $data);
	}



    public function dailyAttnSummaryReport()
	{

		$data['title'] = 'VMGPS&#65515;Student Daily Attendence Report';
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
		
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, 'sl_no', $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		
		$this->load->view('attendenceInfo/dailyAttnSummaryReportPage', $data);

	}



	public function dailyAtnSummaryReportAction()
	{
		$data['title'] = 'VMGPS&#65515;Student Daily Summary Attendence Report';
		
		$currYear 	= date('Y');
		$table = '';
		$where = array();
		$orderBy = 'id';
		$searchOrderBy = 'attendence_information.id';
		$serialized = 'asc';
		$groupBy = 'student_auto_id';

		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

		$data['branch_id']				= $this->input->get('branch_id');
		$data['class_id']				= $this->input->get('class_id');
		$data['group_id']				= $this->input->get('group_id');
		$data['shift_id']				= $this->input->get('shift_id');
		$year							= $this->input->get('year');

		$data['attendenceDate']		    = $this->input->get('attendenceDate');

		 if(!empty($data['attendenceDate'])){
            $data['attnDate'] = $data['attendenceDate'];

		 } else {
		 	$data['attnDate']  = date('Y-m-d');
		 }


		 $pieces    = explode("-", $data['attnDate']);
		 $findYear  = $pieces[0]; 

		 if(!empty($year))
		 	$data['year'] = $year;
		 else
		 	$data['year'] = $findYear;





		 
    	
    	$where2 = array();
    	if(!empty($data['branch_id']) || !empty($data['class_id']) || !empty($data['group_id']) || !empty($data['shift_id']) || !empty($data['section_id'])  || !empty($data['year'] )){

    		if(!empty($data['branch_id']))   $where2['class_wise_info.branc_id']  		 = $data['branch_id'];
    		if(!empty($data['class_id']))    $where2['class_wise_info.class_id']   		 = $data['class_id'];
    		if(!empty($data['group_id']))    $where2['class_wise_info.class_group_id']   = $data['group_id'];
		    if(!empty($data['shift_id'])) 	 $where2['class_wise_info.class_shift_id'] 	 = $data['shift_id'];
    		if(!empty($data['year']))        $where2['class_wise_info.year']  			 = $data['year'];
    	}


    	$data['dailyAttendenceData']    = $this->M_crud_ayenal->findAllGroup('class_wise_info', $where2, 'class_wise_info.branc_id', 'asc', $groupBy = 'branc_id'); 

		
		if($authorType == "superadmin" ) {
		   $data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		   $data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, 'sl_no', $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		
		$this->load->view('attendenceInfo/dailyAtnSummaryReportActionPage', $data);
	}




	public function dateRangeAttnReport()
	{

		$data['title'] = 'VMGPS&#65515;Student Date Range Attendence Report';
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
		
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, 'sl_no', $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		
		$this->load->view('attendenceInfo/dateRangeAttnReportPage', $data);

	}



	public function dateRangeAttenReportAction()
	{
		$data['title'] = 'VMGPS&#65515;Student Date Range Attendence Report';
		
		$currYear 	= date('Y');
		$table = '';
		$where = array();
		$orderBy = 'id';
		$searchOrderBy = 'attendence_information.id';
		$serialized = 'asc';
		$groupBy = 'student_auto_id';
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

		$data['branch_id']				= $this->input->get('branch_id');
		$data['class_id']				= $this->input->get('class_id');
		$data['group_id']				= $this->input->get('group_id');
		$data['section_id']				= $this->input->get('section_id');
		$data['shift_id']				= $this->input->get('shift_id');
		$data['report_type']			= $this->input->get('report_type');
		$year					        = $this->input->get('year');
		$data['stuCurrentID']			= trim($this->input->get('stuCurrentID'));
		$data['fromDate']		        = $this->input->get('fromDate');
		$data['toDate']		      		= $this->input->get('toDate');



		 $pieces    = explode("-", $data['fromDate']);
		 $findYear  = $pieces[0]; 

		 if(!empty($year))
		 	$data['year'] = $year;
		 else
		 	$data['year'] = $findYear;

		 
       

        if(!empty($data['stuCurrentID'])){
        	$data['studentDetails']  = $this->M_join->findClassInfoFromMulti('class_wise_info', array('class_wise_info.stu_id' => $data['stuCurrentID']), 'class_wise_info.class_wise_auto_id', 'asc'); 
           
            
        }else{
        	
        	$where2 = array();
        	if(!empty($data['branch_id']) || !empty($data['class_id']) || !empty($data['group_id']) || !empty($data['shift_id']) || !empty($data['section_id'])  || !empty($data['year'] )){
        		if(!empty($data['branch_id']))   $where2['class_wise_info.branc_id']  		 = $data['branch_id'];
        		if(!empty($data['class_id']))    $where2['class_wise_info.class_id']   		 = $data['class_id'];
        		if(!empty($data['group_id']))    $where2['class_wise_info.class_group_id']   = $data['group_id'];
        		if(!empty($data['section_id']))  $where2['class_wise_info.class_section_id'] = $data['section_id'];
			    if(!empty($data['shift_id'])) 	 $where2['class_wise_info.class_shift_id'] 	 = $data['shift_id'];
        		if(!empty($data['year']))        $where2['class_wise_info.year']  			 = $data['year'];
        	}

        	$data['dateRangeAttendenceData']  = $this->M_crud_ayenal->findAllGroup('class_wise_info', $where2, 'class_wise_info.branc_id', 'asc', $groupBy = 'branc_id'); 
        }




		
		if($authorType == "superadmin" ) {
		   $data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		   $data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, 'sl_no', $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		
		$this->load->view('attendenceInfo/dateRangeAttenReportActionPage', $data);
	}





	

}


