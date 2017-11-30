<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResultSubModule extends CI_Controller {

	const  Title	 = 'VMGPS-Admin Panel';
	
	static $model 	 = array('M_admin', 'M_crud', 'M_join', 'M_join_ayenal','M_crud_ayenal');
	static $helper   = array('url', 'authentication');

	
	public function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->model(self::$model);
		$this->load->helper(self::$helper);
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('pagination');
		isAuthenticate();
	}
	
	
	public function index()
	{
		$data['title'] = 'VMGPS&#65515;Result Management System';
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
		$data['nationalityListInfo'] 	=  $this->M_crud->findAll('nationality_list_manage', $where, $orderBy, $serialized);
		$data['religionListInfo'] 		=  $this->M_crud->findAll('religion_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		
		
		$this->load->view('resultManage/resultModulePage', $data);
		  
	}
	
	public function examSystem() 
	{
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
		
		$data['title'] = 'VMGPS&#65515;Exam System Manage';
		
		$this->load->view('resultManage/examSystemPage', $data);
	}


	public function marksInputSystem() 
	{
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
		
		$data['title'] = 'VMGPS&#65515;Exam System Manage';
		
		$this->load->view('resultManage/marksInputSystemPage', $data);
	}
	
	
	public function subjectManage() 
	{
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
		
		$data['allSubjectInfo']			=  $this->M_join_ayenal->findAllSubject('subject_manage', array(), $orderBy, 'desc');
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, 'sl_no', $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		$data['teacherListInfo'] 		=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		$data['title'] 					= 'VMGPS&#65515;Subject Manage';
		$data['alertData']				= $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ""));

		
		$this->load->view('resultManage/subjectManagePage', $data);
	}


    
	public function subjectStore()
 	{
		$update_id  			= $this->input->post('update_id');
		$data['branch_id']  	= $this->input->post('branch_id');
		$data['group_id']  		= $this->input->post('group_id');
		$data['teacher_id']  	= $this->input->post('teacher_id');
		$data['class_id']  		= $this->input->post('class_id');
		$data['subject_name']  	= $this->input->post('subject_name');
		$data['subject_type']  	= $this->input->post('subject_type');
		$data['subject_code']  	= $this->input->post('subject_code');
		$data['year']  			= $this->input->post('year');

		if(!empty($update_id)){
		  if($data['subject_name'] !=''){
              $this->M_crud_ayenal->update('subject_manage', $data, array('id' => $update_id));
              $this->session->set_userdata(array('success' => "Subject Update Successfully"));
           }
		} else {
		   if($data['subject_name'] !=""){
		   	  $this->db->insert('subject_manage', $data); 
		   	  $this->session->set_userdata(array('success' => "Subject Added Successfully"));
            }
          
		}
		
		redirect('resultSubModule/subjectManage');


	}

	public function subjectDelete($id)
	{	
		$where     = array('id' => $id);
		$this->M_crud_ayenal->destroy('subject_manage', $where);
		$this->session->set_userdata(array('success' => "Subject Delete Successfully"));
		redirect ('resultSubModule/subjectManage');
	}

	public function subjectEditInfo()
	{
		$id 			= $this->input->post('id');	
		$where2     	= array('id' => $id);	
		$subEditInfo 	= $this->M_crud_ayenal->findById('subject_manage', $where2);
		if(!empty($subEditInfo->branch_id) || !empty($subEditInfo->class_id) || !empty($subEditInfo->group_id) || !empty($subEditInfo->year)){

			if(!empty($subEditInfo->branch_id))     $where['branch_id']  	= $subEditInfo->branch_id;
			if(!empty($subEditInfo->class_id))      $where['class_id']  	= $subEditInfo->class_id;
			if(!empty($subEditInfo->year))     		$where['year']  		= $subEditInfo->year;

		}


		$subEditInfo->allTeacherList =  $this->M_crud_ayenal->findAll('teacher_information', $where, 'id', 'desc');	
				
		echo json_encode($subEditInfo);
	}

	public function searchWiseSubjectData()
	{
		$class_id_search  	= $this->input->post('class_id_search');
		$branch_id_search  	= $this->input->post('branch_id_search');
		$group_id_search  	= $this->input->post('group_id_search');
		$year_search  		= $this->input->post('year_search');

		if(!empty($class_id_search) || !empty($branch_id_search) || !empty($group_id_search) || !empty($year_search)){

			if(!empty($class_id_search))      $where['class_id']  	= $class_id_search;
			if(!empty($branch_id_search))     $where['branch_id']  	= $branch_id_search;
			if(!empty($year_search))     	  $where['year']  		= $year_search; 
			
			if(!empty($group_id_search)){
				if($group_id_search =='all')       $where['group_id']   = "all";
				else  							   $where['group_id']   = $group_id_search;                                    
			}

			$data['allSubjectInfo']          = $this->M_join_ayenal->findAllSubject('subject_manage', $where, 'id', 'desc');

			$this->load->view('resultManage/searchWiseSubjectDataPage', $data);
	


		}

	}


	public function stuWiseSubject() 
	{
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
		
		$data['allSubjectInfo']			=  $this->M_join_ayenal->findAllSubject('subject_manage', array(), $orderBy, 'desc');
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, 'sl_no', $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		$data['teacherListInfo'] 		=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		$data['title'] 					= 'VMGPS&#65515;Subject Manage';
		$data['alertData']				= $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ""));

		
		$this->load->view('resultManage/stuWiseSubjectPage', $data);
	}




	public function stuWiseSubInitialize() 
	{
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


		$data['branch_id']  			= $this->input->post('branch_id');
		$data['class_id']  				= $this->input->post('class_id');
		$data['year2']  				= $this->input->post('year');
		$group_id  						= $this->input->post('group_id');
		$data['group_id']  				= $group_id;
		$branch_id  				    = $data['branch_id'];
		$year  				            = $data['year2'];
		$class_id                       = $data['class_id'];





		$data['studentList']            = $this->M_join->findSubWiseAllStu('class_wise_info', array('branc_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'year' => $data['year2'], 'class_group_id' => $data['group_id']), 'class_roll', $serialized);

		if(!empty($data['branch_id']) || !empty($data['class_id']) || !empty($group_id) || !empty($data['year2'])){
			if(!empty($data['branch_id']))  $where2['branch_id']   =  $data['branch_id'];
			if(!empty($data['class_id']))   $where2['class_id']    =  $data['class_id'];
			if(!empty($data['year2']))  		$where2['year']    =  $data['year2'];
			if($data['class_id'] == '9' || $data['class_id'] == '10' || $data['class_id'] == '11' || $data['class_id'] == '12'){
	           if(!empty($group_id))  			$where2 	  			  =  "(group_id ='$group_id' OR group_id ='all') AND class_id ='$class_id' AND branch_id ='$branch_id' AND year ='$year'";
            } else {
               if(!empty($group_id))  			$where2['group_id'] 	  =  $group_id;	
            }
			
			
			$data['subjectList'] 	    =  $this->M_crud->findAll('subject_manage', $where2 , $order = 'id', $serialized = 'asc');
			
		}
		

		
		$data['allSubjectInfo']			=  $this->M_join_ayenal->findAllSubject('subject_manage', array(), $orderBy, 'desc');
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, 'sl_no', $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		$data['teacherListInfo'] 		=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		$data['title'] 					= 'VMGPS&#65515;Subject Manage';
		$data['alertData']				= $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ""));
		
		$this->load->view('resultManage/stuWiseSubInitializePage', $data);
	}


	

	


	public function studentWiseSubjectInsert()
	{	
		
		$student_id 		= $this->input->post('student_id');
		$subjectDataList 	= $this->input->post('subject_id');
		$year 				= $this->input->post('year');
		
        
		if(!empty($subjectDataList)){
			foreach($subjectDataList as $k => $value) {
				if($subjectDataList[$k]){	
				   $studentDetails     		= $this->M_crud->findById('class_wise_info', array('stu_auto_id' => $student_id[$k], 'year' => $year));
				   $subjectDetails     		= $this->M_crud->findById('subject_manage', array('id' => $subjectDataList[$k]));
	               $data['branch_id']      	= $studentDetails->branc_id;
	               $data['class_id']      	= $studentDetails->class_id;
	               $data['group_id']      	= $studentDetails->class_group_id;
	               $data['shift']      		= $studentDetails->class_shift_id;
	               $data['section']      	= $studentDetails->class_section_id;
	               $data['year']      		= $studentDetails->year;
	               $data['student_id']      = $student_id[$k];
	               $data['subject_id']      = $subjectDataList[$k];
	               $data['stu_subject_type']  = $subjectDetails->subject_type;
				   $this->db->insert('student_wise_subject_manage', $data); 
				}
			}
		}

		$this->session->set_userdata(array('success' => "Subject Insert Successfull"));
		redirect('resultSubModule/stuWiseSubject');


	}

	public function subjectReset()
	{
	   $data['stuId']    		= $this->input->post('stuId');
	   $data['year']    		= $this->input->post('year');
	   $data['studentDetails']  = $this->M_join->findClassWiseId('class_wise_info', array('class_wise_info.stu_auto_id' => $data['stuId'], 'class_wise_info.year' => $data['year']), 'class_wise_auto_id', 'asc'); 
	   $group_id    = $data['studentDetails']->class_group_id;
	   $class_id    = $data['studentDetails']->class_id; 
	   $branch_id   = $data['studentDetails']->branc_id;
	   $year  	    = $data['year']; 

	   if(!empty($data['studentDetails']->branc_id) || !empty($class_id) || !empty($group_id) || !empty($data['studentDetails']->year)){
			if(!empty($data['studentDetails']->branc_id))  $where2['branch_id']   =  $data['studentDetails']->branc_id;
			if(!empty($class_id))  						   $where2['class_id']    =  $class_id;
			if(!empty($data['studentDetails']->year))  	   $where2['year']        =  $data['studentDetails']->year;

			if($class_id == '9' || $class_id == '10' || $class_id == '11' || $class_id == '12'){
	           if(!empty($group_id))  			$where2 	  			  =  "(group_id ='$group_id' OR group_id ='all') AND class_id ='$class_id' AND branch_id = '$branch_id' AND year = '$year'";
            } else {
               if(!empty($group_id))  			$where2['group_id'] 	  =  $group_id;	
            }

			$data['subjectList'] 			=  $this->M_crud->findAll('subject_manage', $where2 , $order = 'id', $serialized = 'asc');

		}

	  	$stuTakenSub     = $this->M_crud->findAll('student_wise_subject_manage', array('student_id' => $data['stuId'], 'year' => $data['year']), 'id', 'asc');

	       	$takenSubjectArray = array();
			foreach($stuTakenSub as $v){ 
	            if(!empty($v->subject_id)) $takenSubjectArray[]   = $v->subject_id;
			}

			$data['takenSubjectArray']  = $takenSubjectArray;

		



	   $this->load->view('resultManage/subjectResetPage', $data);	
	}


	public function optionalSubjectReset()
	{
	   $data['stuId']    		= $this->input->post('stuId');
	   $data['studentDetails']  = $this->M_join->findClassWiseId('class_wise_info', array('class_wise_info.stu_auto_id' => $data['stuId']), 'class_wise_auto_id', 'asc'); 
	   $group_id  = $data['studentDetails']->class_group_id;

	   if(!empty($data['studentDetails']->branc_id) || !empty($data['studentDetails']->class_id) || !empty($data['studentDetails']->class_group_id) || !empty($data['studentDetails']->year)){
			if(!empty($data['studentDetails']->branc_id))  		$where2['branch_id']   =  $data['studentDetails']->branc_id;
			if(!empty($data['studentDetails']->class_id)) 	 	$where2['class_id']    =  $data['studentDetails']->class_id;
			if(!empty($data['studentDetails']->year))  	   		$where2['year']        =  $data['studentDetails']->year;
			if(!empty($data['studentDetails']->class_group_id)) $where2['group_id']    = $data['studentDetails']->class_group_id;
			
			$data['subjectList'] 			=  $this->M_crud->findAll('subject_manage', $where2 , $order = 'id', $serialized = 'asc');

		}
		


	  	$stuTakenSub     = $this->M_crud->findAll('student_wise_subject_manage', array('student_id' => $data['stuId']), 'id', 'asc');

	       	$takenSubjectArray = array();
			foreach($stuTakenSub as $v){ 
	            if(!empty($v->subject_id)) $takenSubjectArray[]   = $v->subject_id;
			}

			$data['takenSubjectArray']  = $takenSubjectArray;



	   $this->load->view('resultManage/optionalSubjectResetPage', $data);	
	}		

	public function resetSubjectAction()
	{	
		
		$student_id 		= $this->input->post('stuId');
		$year 				= $this->input->post('year');
		$subjectDataList 	= $this->input->post('subject_id2');
		$studentDetails     = $this->M_crud->findById('class_wise_info', array('stu_auto_id' => $student_id, 'year' => $year));
		$previusSub         = $this->M_crud->findAll('student_wise_subject_manage', array('student_id' => $student_id, 'year' => $year), 'id', 'desc');
		foreach($previusSub as $sub) {
            $data2['taken_id']      	= $sub->id;
            $data2['pre_subject_id']    = $sub->subject_id;
            $data2['student_id']      	= $sub->student_id;
            $data2['year']      	    = $sub->year;
			$this->db->insert('student_old_taken_subject', $data2);  
		}

		$this->db->delete('student_wise_subject_manage', array('student_id' =>$student_id, 'year' => $year)); 
	
		foreach($subjectDataList as $subId) {
			if($subId){	
			   $subjectDetails     		= $this->M_crud->findById('subject_manage', array('id' => $subId));
               $data['branch_id']      	= $studentDetails->branc_id;
               $data['class_id']      	= $studentDetails->class_id;
               $data['group_id']      	= $studentDetails->class_group_id;
               $data['shift']      		= $studentDetails->class_shift_id;
	           $data['section']      	= $studentDetails->class_section_id;
               $data['year']      		= $year;
               $data['student_id']      = $student_id;
               $data['subject_id']      = $subId;
               $data['stu_subject_type']  = $subjectDetails->subject_type;

			   $this->db->delete('student_old_taken_subject', array('pre_subject_id' =>$subId, 'student_id' =>$student_id, 'year' => $year)); 
			   $this->db->insert('student_wise_subject_manage', $data); 
			}
		}

		
	}


    public function optionalResetSubjectAction()
	{	
		
		$student_id 		= $this->input->post('stuId');
		$subjectDataList 	= $this->input->post('subject_id2');
		$studentDetails     = $this->M_crud->findById('class_wise_info', array('stu_auto_id' => $student_id));
		
		$this->db->delete('student_wise_subject_manage', array('student_id' =>$student_id)); 
	
		foreach($subjectDataList as $subId) {
			if($subId){	
               $data['branch_id']      	= $studentDetails->branc_id;
               $data['class_id']      	= $studentDetails->class_id;
               $data['group_id']      	= $studentDetails->class_group_id;
               $data['shift']      		= $studentDetails->class_shift_id;
	           $data['section']      	= $studentDetails->class_section_id;
               $data['year']      		= $studentDetails->year;
               $data['student_id']      = $student_id;
               $data['subject_id']      = $subId;

			   $this->db->insert('student_wise_subject_manage', $data); 
			}
		}

		
	}




	public function allExamTypeManage()
	{
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
		
		
		if($authorType == "superadmin" ) {
		$examTypeWhere = array();
		} else {
		$examTypeWhere = array('branch_id'=>$authorBranchID);
		}
		
		$data['title'] 					= 'VMGPS&#65515;All Exam Type Manage';
		$data['allExamListInfo'] 		=  $this->M_crud->findAll('all_exam_type_manage', $where, $orderBy, $serialized);
		$data['alertData']				= $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ""));
		
		$this->load->view('resultManage/allExamTypeManagePage', $data);
	}

	public function allExamTypeInfoStore() 
	{
		$update_id  				= $this->input->post('id');
		$data['exam_type_name']  	= $this->input->post('exam_type_name');
		$data['year']  				= $this->input->post('year');
		$data['status']  			= "Active";

		if(!empty($update_id)){
		  if($data['exam_type_name'] !=''){
              $this->M_crud_ayenal->update('all_exam_type_manage', $data, array('id' => $update_id));
              $this->session->set_userdata(array('success' => "Exam Type Update Successfully"));
           }
		} else {
		   if($data['exam_type_name'] !=""){
		   	  $this->db->insert('all_exam_type_manage', $data); 
		   	  $this->session->set_userdata(array('success' => "Exam Type Added Successfully"));
            }
          
		}
		
		redirect('resultSubModule/allExamTypeManage');


	}

	public function allExamTypeEditInfo()
	{
		$id 				= $this->input->post('id');	
		$examTypeEditInfo 	= $this->M_crud_ayenal->findById('all_exam_type_manage', array('id' => $id));
		echo json_encode($examTypeEditInfo);
	}

	



	
	
	
	public function examMarksManage() 
	{
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
		$data['nationalityListInfo'] 	=  $this->M_crud->findAll('nationality_list_manage', $where, $orderBy, $serialized);
		$data['religionListInfo'] 		=  $this->M_crud->findAll('religion_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);

		$data['title'] = 'VMGPS&#65515;Exam Marks Manage';
		
		$this->load->view('resultManage/examMarksManagePage', $data);
	}


	
	public function examTypeManage($onset = 0) 
	{
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
		$data['allExamListInfo'] 		=  $this->M_crud->findAll('all_exam_type_manage', $where, $orderBy, $serialized);
		$data['nationalityListInfo'] 	=  $this->M_crud->findAll('nationality_list_manage', $where, $orderBy, $serialized);
		$data['religionListInfo'] 		=  $this->M_crud->findAll('religion_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		
		if($authorType == "superadmin" ) {
		$examTypeWhere = array();
		} else {
		$examTypeWhere = array('branch_id'=>$authorBranchID);
		}
		
		$limit = 12;
		$data['examTypeList'] 	=  $this->M_join->findExamTypeList('class_wise_exam_type_manage', $examTypeWhere, $orderBy, $serialized = "desc", $onset, $limit);
		$data['onset'] 			= $onset;
		$config['base_url'] 	= base_url('resultSubModule/examTypeManage');
		$config['total_rows'] 	= $this->M_crud->countAllList('class_wise_exam_type_manage', $examTypeWhere);
		$config['uri_segment'] 	= 3;
		$config['per_page'] 	= 12;
		$config['num_links'] 	= 7;
		$config['first_link']	= FALSE;
		$config['last_link'] 	= FALSE;
		$config['prev_link']	= 'Previous';
		$config['next_link'] 	= 'Next';

		$this->pagination->initialize($config); 
		
		$data['title'] = 'VMGPS&#65515;Exam Type Manage';
		
		$this->load->view('resultManage/examTypeManagePage', $data);
	}
	
	
	public function edit()
	{
	  $id = $this->input->post("id");
	  $examInfo		= $this->M_crud->findById($table = 'class_wise_exam_type_manage',$where = array('id' => $id));
	  echo json_encode($examInfo);
	
	}
	
	
	
	public function examTypeInfoStore($onset = 0) 
	{
		
		$currYear 	= date('Y');
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		$id = $this->input->post('id');
		
		$data['branch_id']				= $this->input->post('branch_id');
		$data['class_id']				= $this->input->post('class_id');
		$data['exam_type_id']			= $this->input->post('exam_type_id');
		$data['year']					= $this->input->post('year');
		$data['status']					= "Active";
		if(!empty($id)){
		$this->db->update('class_wise_exam_type_manage', $data, array('id' => $id));
		}else{
		$this->db->insert('class_wise_exam_type_manage', $data); 
		}
		
		
		
		if($authorType == "superadmin" ) {
			$examTypeWhere = array();
			} else {
			$examTypeWhere = array('branch_id'=>$authorBranchID);
			}
		$limit = 12;
		$data['examTypeList'] 	=  $this->M_join->findExamTypeList('class_wise_exam_type_manage', $examTypeWhere, $orderBy, $serialized = "desc", $onset, $limit);
		$data['onset'] 			= $onset;
		$config['base_url'] 	= base_url('resultSubModule/examTypeManage');
		$config['total_rows'] 	= $this->M_crud->countAllList('class_wise_exam_type_manage', $examTypeWhere);
		$config['uri_segment'] 	= 3;
		$config['per_page'] 	= 12;
		$config['num_links'] 	= 7;
		$config['first_link']	= FALSE;
		$config['last_link'] 	= FALSE;
		$config['prev_link']	= 'Previous';
		$config['next_link'] 	= 'Next';

		$this->pagination->initialize($config); 
		$this->load->view('resultManage/examTypeManageListPage', $data);
	}
	
	public function changeExamType() 
	{
		$branch_id	= $this->input->post('branch_id');
		$class_id	= $this->input->post('class_id');
		$year	= $this->input->post('year');
		
		$examTypeList 			=  $this->M_join->findClasWiseExamTypeList('class_wise_exam_type_manage', $where = array('branch_id' => $branch_id, 'class_id' => $class_id, 'class_wise_exam_type_manage.year' => $year), $order = 'id', $serialized = 'desc');
		echo '<option value="" selected="selected" >Select Exam Type*</option>';
		foreach($examTypeList as $v) {
		echo '<option value="'.$v->exam_type_id.'" selected="selected" >'.$v->exam_type_name.'</option>';
	     }
	}


	
	public function initialSubject() {
		$data['branch_id']		= $this->input->post('branch_id');
		$data['class_id']		= $this->input->post('class_id');
		$class_id               = $data['class_id'];
		$group_id				= $this->input->post('group_id');
		$data['group_id']		= $group_id;
		$data['year']			= $this->input->post('year');
		$data['exam_type_id']	= $this->input->post('exam_type_id');

		$branch_id  			= $data['branch_id'];
		$year  					= $data['year'];

		if(!empty($data['branch_id']) || !empty($data['class_id']) || !empty($data['group_id']) || !empty($data['year'])){
			if(!empty($data['branch_id']))  $where['branch_id']   =  $data['branch_id'];
			if(!empty($data['class_id']))   $where['class_id']    =  $data['class_id'];
			if(!empty($data['year']))  		$where['year']        =  $data['year'];

			if($data['class_id'] == '9' || $data['class_id'] == '10' || $data['class_id'] == '11' || $data['class_id'] == '12'){
	           if(!empty($group_id))  			$where 	  			  =  "(group_id ='$group_id' OR group_id ='all') AND class_id ='$class_id' AND branch_id = '$branch_id' AND year = '$year'";
            } else {
               if(!empty($group_id))  			$where['group_id'] 	  =  $group_id;	
            }
           
           

			$data['subjectList'] 			=  $this->M_crud->findAllSubjectWithMarks('subject_manage', $where , $data['exam_type_id'],$data['year'], $order = 'id', $serialized = 'asc', $group_id);
			



		}

		
		   $this->load->view('resultManage/initialSubjectListPage', $data);
        
		
	
	}


	
	
	public function subwiseExamMarkStore() 
	{
		$data['branch_id']		= $this->input->post('branch_id');
		$data['class_id']		= $this->input->post('class_id');
		$data['group_id']		= $this->input->post('group_id');
		$data['year']			= $this->input->post('year');
		$data['exam_type_id']	= $this->input->post('exam_type_id');
		
		$subject_id			= $this->input->post('subject_id');
		$total_marks		= $this->input->post('total_marks');
		$mcq_marks			= $this->input->post('mcq_marks');
		$creative_marks		= $this->input->post('creative_marks');
		$practicle_marks	= $this->input->post('practicle_marks');

		if($data['class_id'] =='6' || $data['class_id'] =='7' || $data['class_id'] =='8' || $data['class_id'] =='9' || $data['class_id'] =='10' || $data['class_id'] =='11' || $data['class_id'] =='12'){


			foreach($subject_id as $k=>$v) { 
				$data['subject_id']			= $subject_id[$k];
				$data['mcq_marks']			= $mcq_marks[$k];
				$data['creative_marks']		= $creative_marks[$k];
				$data['practicle_marks']	= $practicle_marks[$k];
                $data['total_marks']		= $mcq_marks[$k] + $creative_marks[$k] + $practicle_marks[$k];


				$chkInsert  = $this->M_crud->findById('exam_type_subjec_wise_total_marks', array('exam_type_id' => $data['exam_type_id'], 'subject_id' => $subject_id[$k], 'year' => $data['year'], 'branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'group_id' => $data['group_id']));

				if(!empty($chkInsert)){
					
					if(!empty($data['mcq_marks']) || !empty($data['creative_marks']) || !empty($data['practicle_marks'])){
						
					  $this->db->update('exam_type_subjec_wise_total_marks', $data, array('exam_type_id' => $data['exam_type_id'], 'subject_id' => $subject_id[$k], 'year' => $data['year'], 'branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'group_id' => $data['group_id'])); 
		            } 

				} else {
					if(!empty($data['mcq_marks']) || !empty($data['creative_marks']) || !empty($data['practicle_marks'])){
					  $this->db->insert('exam_type_subjec_wise_total_marks', $data); 
		            }
				}
		            
			}
		
			
		} else {

			foreach($subject_id as $k=>$v) { 
				$data['subject_id']		= $subject_id[$k];
				$data['total_marks']	= $total_marks[$k];
				$chkInsert  = $this->M_crud->findById('exam_type_subjec_wise_total_marks', array('exam_type_id' => $data['exam_type_id'], 'subject_id' => $subject_id[$k], 'year' => $data['year'], 'branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'group_id' => $data['group_id']));

				if(!empty($chkInsert)){
					if(!empty($data['total_marks'])){
					  $this->db->update('exam_type_subjec_wise_total_marks', $data, array('exam_type_id' => $data['exam_type_id'], 'subject_id' => $subject_id[$k], 'year' => $data['year'], 'branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'group_id' => $data['group_id'])); 
		            } 

				} else {
					if(!empty($data['total_marks'])){
					  $this->db->insert('exam_type_subjec_wise_total_marks', $data); 
		            }
				}
		            
			}

			

		}
		
	}
	


	
	public function examMarksInputSystem() 
	{
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
		
		
		$data['title'] = 'VMGPS&#65515;Marks Input Manage';
		
		$this->load->view('resultManage/examMarksInputSystemPage', $data);
	}

	public function nineTotewlveExamMarksInputSystem() 
	{
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
		
		$data['classListInfo'] 			=  $this->M_crud->findNineToTwelveClass('class_list_manage', $where, $order = 'sl_no', $serialized, $limit = '4');
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		//$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		$data['nationalityListInfo'] 	=  $this->M_crud->findAll('nationality_list_manage', $where, $orderBy, $serialized);
		$data['religionListInfo'] 		=  $this->M_crud->findAll('religion_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', array('id !=' => "30"), $orderBy, $serialized);
		
		
		$data['title'] = 'VMGPS&#65515;Marks Input Manage';
		
		$this->load->view('resultManage/nineTotewlveExamMarksInputSystemPage', $data);
	}
	
	
	
	public function changSubjectList() 
	{
		$branch_id	= $this->input->post('branch_id');
		$class_id	= $this->input->post('class_id');
		$group_id	= $this->input->post('group_id');
		$year	    = $this->input->post('year');
		
		$subjectList 			=  $this->M_crud->findAll('subject_manage', $where = array('branch_id' => $branch_id, 'class_id' => $class_id, 'group_id' => $group_id, 'year' => $year), $order = 'id', $serialized = 'desc');
		
		echo '<option value="" selected="selected" >Select Subject</option>';
		foreach($subjectList as $v) {
			echo '<option value="'.$v->id.'" selected="selected" >'.$v->subject_name.'</option>';
	    }
	}


	public function studentWiseSubjectList() {
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
	           if(!empty($group_id))  			$where 	  	  =  "(group_id ='$group_id' OR group_id ='all') AND class_id ='$class_id' AND branch_id ='$branch_id' AND year = '$year'";
            } else {
               if(!empty($group_id))  			$where['group_id'] =  $group_id;	
            }
			$subjectList 					=  $this->M_crud->findAll('subject_manage', $where , $order = 'id', $serialized = 'asc');

		}

		echo '<option value="" selected="selected" >Select Subject</option>';
		foreach($subjectList as $v) {
			echo '<option value="'.$v->id.'" selected="selected" >'.$v->subject_name.'</option>';
	    }
	
	
	}

	public function initialMarksInput() 
	{
		 $data['branch_id']		= $this->input->post('branch_id');
		 $data['class_id']		= $this->input->post('class_id');
		 $data['group_id']		= $this->input->post('group_id');
		 $data['section_id']		= $this->input->post('section_id');
		 $data['shift_id']		= $this->input->post('shift_id');
		$data['year']			= $this->input->post('year');
		$data['exam_type_id']	= $this->input->post('exam_type_id');
		 $data['subject_id']	    = $this->input->post('subject_id');
		
		$data['examInfo'] 			= $this->M_crud->findById($table = 'all_exam_type_manage',$where = array('id' => $data['exam_type_id']));
		$data['totalMarksInfo'] 	= $this->M_crud->findById($table = 'exam_type_subjec_wise_total_marks',$where = array('exam_type_id' => $data['exam_type_id'],'class_id' => $data['class_id'], 'group_id' => $data['group_id'], 'subject_id' => $data['subject_id']));
		
		$data['stuList'] 		=  $this->M_join->findAllStuForMarksInfo($table = 'student_wise_subject_manage', $where = array('student_wise_subject_manage.branch_id' => $data['branch_id'], 'student_wise_subject_manage.class_id' => $data['class_id'],'student_wise_subject_manage.group_id' => $data['group_id'],'student_wise_subject_manage.section' => $data['section_id'],'student_wise_subject_manage.shift' => $data['shift_id'], 'student_wise_subject_manage.year' => $data['year'], 'student_wise_subject_manage.subject_id' => $data['subject_id'], 'class_wise_info.year' => $data['year']), $orderBy = 'class_wise_info.class_roll', $serialized = 'asc', $obtainMarksWhere = array('exam_type_id' =>$data['exam_type_id'], 'subject_id' =>$data['subject_id']));
		

        if($data['class_id'] =='6' || $data['class_id'] =='7' || $data['class_id'] =='8' || $data['class_id'] =='9' || $data['class_id'] =='10' || $data['class_id'] =='11' || $data['class_id'] =='12'){
		  $this->load->view('resultManage/sixToTenInitialMarksInputPage', $data);
        }else{
		  $this->load->view('resultManage/initialMarksInputPage', $data);
        }

	}
	
	

	public function nineToTwlInitialMarksInput() 
	{
		$data['branch_id']		= $this->input->post('branch_id');
		$data['class_id']		= $this->input->post('class_id');
		$data['group_id']		= $this->input->post('group_id');
		$data['section_id']		= $this->input->post('section_id');
		$data['shift_id']		= $this->input->post('shift_id');
		$data['year']			= $this->input->post('year');
		$data['exam_type_id']	= $this->input->post('exam_type_id');
		$data['subject_id']	    = $this->input->post('subject_id');
		
		$data['examInfo'] 			= $this->M_crud->findById($table = 'all_exam_type_manage',$where = array('id' => $data['exam_type_id']));
		$data['totalMarksInfo'] 	= $this->M_crud->findById($table = 'exam_type_subjec_wise_total_marks',$where = array('exam_type_id' => $data['exam_type_id'], 'subject_id' => $data['subject_id']));
		
		$data['stuList'] 		=  $this->M_join->findAllStuForMarksInfo($table = 'student_wise_subject_manage', $where = array('student_wise_subject_manage.branch_id' => $data['branch_id'], 'student_wise_subject_manage.class_id' => $data['class_id'],'student_wise_subject_manage.group_id' => $data['group_id'],'student_wise_subject_manage.section' => $data['section_id'],'student_wise_subject_manage.shift' => $data['shift_id'], 'student_wise_subject_manage.year' => $data['year'], 'student_wise_subject_manage.subject_id' => $data['subject_id'], 'class_wise_info.year' => $data['year']), $orderBy = 'student_wise_subject_manage.id', $serialized = 'asc', $obtainMarksWhere = array('exam_type_id' =>$data['exam_type_id'], 'subject_id' =>$data['subject_id']));
		
		$this->load->view('resultManage/nineToTwlInitialMarksInputPage', $data);
	}
    

    // six to twelve Final submit 

	/*public function marksInputStore() 
	{
		$data['branch_id']		= $this->input->post('branch_id');
		$data['class_id']		= $this->input->post('class_id');
		$data['group_id']		= $this->input->post('group_id');
		$data['section_id']		= $this->input->post('section_id');
		$data['shift_id']		= $this->input->post('shift_id');
		$data['year']			= $this->input->post('year');
		$data['exam_type_id']	= $this->input->post('exam_type_id');
		$data['subject_id']	    = $this->input->post('subject_id');
		$data['date_time']	    = date("Y-m-d H:i:s");

		$totalMarksInfo 	= $this->M_crud->findById($table = 'exam_type_subjec_wise_total_marks',$where = array('exam_type_id' => $data['exam_type_id'], 'subject_id' => $data['subject_id']));
		
		$submit_status  		= $this->input->post('submit_status');
		$existSubmit_status   	= $this->input->post('existSubmit_status');
		
		if(!empty($submit_status)) {
			$data['submit_status']   = $submit_status;
		} else {
			$data['submit_status']   = "Normal";
		}
		
		$data['submit_status'];
		$stu_auto_id_list    	= $this->input->post('stu_auto_id');
		$multi_choose_mark_list = $this->input->post('multi_choose_mark');
		$written_marks_list     = $this->input->post('written_marks');
		$practicle_marks_list   = $this->input->post('practicle_marks');
		$updateId    			= $this->input->post('updateId');
		
		foreach($stu_auto_id_list as $k=>$v) {
				$data['stu_auto_id']		= $stu_auto_id_list[$k];
				if(!empty($totalMarksInfo->mcq_marks)) 
				  $data['multi_choose_mark'] = $multi_choose_mark_list[$k];
				if(!empty($totalMarksInfo->creative_marks)) 
				   $data['written_marks']	= $written_marks_list[$k];
				if(!empty($totalMarksInfo->practicle_marks)) 
				  $data['practicle_marks']	= $practicle_marks_list[$k];
				
				if($existSubmit_status == "Empty") {
					$this->db->insert('obtained_subject_marks', $data); 
				} else {
					$this->db->update('obtained_subject_marks', $data, array('id' => $updateId[$k])); 
				}	
		}
			
		if($data['submit_status'] == "Final") {	
		echo '<div class="alert alert-block alert-success " id="">
			<button class="close" data-dismiss="alert" type="button">
			<i class="ace-icon fa fa-times"></i>
			</button>
			<strong class="green">
			<i class="ace-icon fa fa-check-square-o"></i>
			
			</strong>
			<span class="alrtText">Finaly Mark Input Submitted Successfully. Try Again Click "Again Initialize"</span>
			</div>';
		} else {
			echo '<div class="alert alert-block alert-success " id="">
			<button class="close" data-dismiss="alert" type="button">
			<i class="ace-icon fa fa-times"></i>
			</button>
			<strong class="green">
			<i class="ace-icon fa fa-check-square-o"></i>
			
			</strong>
			<span class="alrtText">Mark Input Submitted Successfully. Try Again Click "Again Initialize"</span>
			</div>';
		
		}
	}
*/
	
	public function sitToTenMarksInputStore() 
	{
		$data['branch_id']		= $this->input->post('branch_id');
		$data['class_id']		= $this->input->post('class_id');
		$data['group_id']		= $this->input->post('group_id');
		$data['section_id']		= $this->input->post('section_id');
	    $data['shift_id']		= $this->input->post('shift_id');
		$data['year']			= $this->input->post('year');
		$data['exam_type_id']	= $this->input->post('exam_type_id');
		$data['subject_id']	    = $this->input->post('subject_id');
		$data['date_time']	    = date("Y-m-d H:i:s");

		$dataAll['branch_id']  = $data['branch_id'];
		$dataAll['class_id']   = $data['class_id'];
		$dataAll['shift_id']   = $data['shift_id'];
		$dataAll['section_id'] = $data['section_id'];
		$dataAll['group_id']   = $data['group_id'];
		$dataAll['year']       = $data['year'];
		$dataAll['exam_id']    = $data['exam_type_id'];

		$totalMarksInfo 	= $this->M_crud->findById($table = 'exam_type_subjec_wise_total_marks',$where = array('exam_type_id' => $data['exam_type_id'], 'subject_id' => $data['subject_id']));

		$totalFmMarks           = $totalMarksInfo->mcq_marks +  $totalMarksInfo->creative_marks + $totalMarksInfo->practicle_marks;
		
		$submit_status  		= $this->input->post('submit_status');
		$existSubmit_status   	= $this->input->post('existSubmit_status');
		
		if(!empty($submit_status)) {
			$data['submit_status']   = $submit_status;
		} else {
			$data['submit_status']   = "Normal";
		}
		
		$data['submit_status'];
		$stu_auto_id_list    	= $this->input->post('stu_auto_id');
		$multi_choose_mark_list = $this->input->post('multi_choose_mark');
		$written_marks_list     = $this->input->post('written_marks');
		$practicle_marks_list   = $this->input->post('practicle_marks');
		$updateId    			= $this->input->post('updateId');
		      

		    $totalObtainMmarks = 0;
			foreach($stu_auto_id_list as $k=>$v) {
				$data['stu_auto_id']		= $stu_auto_id_list[$k];
				$dataAll['stu_auto_id']    = $data['stu_auto_id'];
				if(!empty($totalMarksInfo->mcq_marks)){
				   	$data['multi_choose_mark']	= $multi_choose_mark_list[$k];
				   	$totalObtainMmarks  += $multi_choose_mark_list[$k];
				}
				
				if(!empty($totalMarksInfo->creative_marks)){
                    $data['written_marks']		= $written_marks_list[$k];
                    $totalObtainMmarks  += $written_marks_list[$k];
				}
			
					
				if(!empty($totalMarksInfo->practicle_marks)){
                    $data['practicle_marks']	= $practicle_marks_list[$k];
                    $totalObtainMmarks  += $practicle_marks_list[$k];
				}

                $presentPercentage = $totalObtainMmarks * 100/$totalFmMarks;

                if($presentPercentage > 33){
                	$newPercentage = 'pass';
                }else{
                	$newPercentage = 'fail';
                }

                $obTainMarksStatus 	= $this->M_crud->findById($table = 'obtained_subject_marks',$where = array('exam_type_id' => $data['exam_type_id'], 'stu_auto_id' => $data['stu_auto_id'], 'branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'shift_id' => $data['shift_id'], 'section_id' => $data['section_id'], 'group_id' => $data['group_id'], 'year' => $data['year'], 'subject_id' => $data['subject_id'])); 
                


				if($existSubmit_status == "Empty") {
					$lastId = $this->M_crud_ayenal->save('obtained_subject_marks', $data);
				} else {
					$lastId =  $updateId[$k];
					$this->db->update('obtained_subject_marks', $data, array('id' => $updateId[$k])); 
				}	



                // al student marks calculat start 
    
				


                $stuTotalInfoChk 	= $this->M_crud->findById($table = 'student_exam_wise_full_result_info', $where = array('exam_id' => $data['exam_type_id'], 'stu_auto_id' => $data['stu_auto_id'], 'branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'shift_id' => $data['shift_id'], 'section_id' => $data['section_id'], 'group_id' => $data['group_id'], 'year' => $data['year'])); 

                

                if(!empty($obTainMarksStatus)){
                	if($obTainMarksStatus->stu_total_maks_status =='exists' ){
                		 $previousObmarks = $obTainMarksStatus->multi_choose_mark + $obTainMarksStatus->written_marks + $obTainMarksStatus->practicle_marks; 
                		$previousPercentage = $previousObmarks * 100/ $totalFmMarks;

                		if($previousPercentage > 33){
                			$oldPercentage = 'pass';
                		}else{
                			$oldPercentage = 'fail';
                		}

                		if($oldPercentage != $newPercentage){

                            if($newPercentage =='pass'){
                                $dataAll['fail_count']   = $stuTotalInfoChk->fail_count - 1;
                            }else{
                                $dataAll['fail_count']   = $stuTotalInfoChk->fail_count + 1;  
                            }
                		}else{
                		    $dataAll['fail_count']   	= $stuTotalInfoChk->fail_count;
                		}

                		if($stuTotalInfoChk){
                			 $alResultTotal  			= $stuTotalInfoChk->total_marks - $previousObmarks;
                		    $dataAll['total_marks'] 	= $alResultTotal + $totalObtainMmarks;                		    
                		}

                		$this->db->update('student_exam_wise_full_result_info', $dataAll, array('exam_id' => $data['exam_type_id'], 'stu_auto_id' => $data['stu_auto_id'], 'branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'shift_id' => $data['shift_id'], 'section_id' => $data['section_id'], 'group_id' => $data['group_id'], 'year' => $data['year']));    

                	//update query 

                	}else{

                        if(!empty($stuTotalInfoChk)){
                           
                            if($presentPercentage<33){
		               		   $dataAll['fail_count']   = $stuTotalInfoChk->fail_count + 1;    
						   	}else{
			                   $dataAll['fail_count']   = $stuTotalInfoChk->fail_count;    
						   	}

						    $dataAll['total_marks']  = $stuTotalInfoChk->total_marks + $totalObtainMmarks;
		                  	
		                  	$this->db->update('student_exam_wise_full_result_info', $dataAll, array('exam_id' => $data['exam_type_id'], 'stu_auto_id' => $data['stu_auto_id'], 'branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'shift_id' => $data['shift_id'], 'section_id' => $data['section_id'], 'group_id' => $data['group_id'], 'year' => $data['year']));  

	                    }else{

	                    	if($presentPercentage<33){
		               		    $dataAll['fail_count']   = 1;   
		               		    
						   	}else{
			                    $dataAll['fail_count']   = 0;    
						   	}

	                         $dataAll['total_marks']  = $totalObtainMmarks;


	                        $this->db->insert('student_exam_wise_full_result_info', $dataAll); 

	                    }
	                        
	                        
                	}

              

                	
                } else {

                	if(!empty($stuTotalInfoChk)){
                           
                        if($presentPercentage<33){
	               		   $dataAll['fail_count']   = $stuTotalInfoChk->fail_count + 1;    
					   	}else{
		                   $dataAll['fail_count']   = $stuTotalInfoChk->fail_count;    
					   	}

					    $dataAll['total_marks']  = $stuTotalInfoChk->total_marks + $totalObtainMmarks;
	                  	
	                  	$this->db->update('student_exam_wise_full_result_info', $dataAll, array('exam_id' => $data['exam_type_id'], 'stu_auto_id' => $data['stu_auto_id'], 'branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'shift_id' => $data['shift_id'], 'section_id' => $data['section_id'], 'group_id' => $data['group_id'], 'year' => $data['year']));  

                    }else{

                    	if($presentPercentage<33){
	               		    $dataAll['fail_count']   = 1;   
	               		    
					   	}else{
		                    $dataAll['fail_count']   = 0;    
					   	}

                         $dataAll['total_marks']  = $totalObtainMmarks;


                        $this->db->insert('student_exam_wise_full_result_info', $dataAll); 

                    }

                }


                $data2['stu_total_maks_status']	= 'exists';
	            $this->db->update('obtained_subject_marks', $data2, array('id' => $lastId)); 



                // al student marks calculat end 

				$totalObtainMmarks = 0;
		}
			
		if($data['submit_status'] == "Final") {	
		echo '<div class="alert alert-block alert-success " id="">
			<button class="close" data-dismiss="alert" type="button">
			<i class="ace-icon fa fa-times"></i>
			</button>
			<strong class="green">
			<i class="ace-icon fa fa-check-square-o"></i>
			
			</strong>
			<span class="alrtText">Finaly Mark Input Submitted Successfully. Try Again Click "Again Initialize"</span>
			</div>';
		} else {
			echo '<div class="alert alert-block alert-success " id="">
			<button class="close" data-dismiss="alert" type="button">
			<i class="ace-icon fa fa-times"></i>
			</button>
			<strong class="green">
			<i class="ace-icon fa fa-check-square-o"></i>
			
			</strong>
			<span class="alrtText">Mark Input Submitted Successfully. Try Again Click "Again Initialize"</span>
			</div>';
		
		}
	}

    
    // play to five final

	/*public function playToFiveFinalStore() 
	{
		$data['branch_id']		= $this->input->post('branch_id');
		$data['class_id']		= $this->input->post('class_id');
		$data['group_id']		= $this->input->post('group_id');
		$data['section_id']		= $this->input->post('section_id');
		$data['shift_id']		= $this->input->post('shift_id');
		$data['year']			= $this->input->post('year');
		$data['exam_type_id']	= $this->input->post('exam_type_id');
		$data['subject_id']	    = $this->input->post('subject_id');
		$data['date_time']	    = date("Y-m-d H:i:s");
		
		$submit_status  		= $this->input->post('submit_status');
		$existSubmit_status   	= $this->input->post('existSubmit_status');
		
		if(!empty($submit_status)) {
			$data['submit_status']   = $submit_status;
		} else {
			$data['submit_status']   = "Normal";
		}
		
		$data['submit_status'];
		$stu_auto_id_list    	= $this->input->post('stu_auto_id');
		$obtained_marks_list    = $this->input->post('obtained_marks');
		$updateId    			= $this->input->post('updateId');
		
		foreach($stu_auto_id_list as $k=>$v) {
				$data['stu_auto_id']		= $stu_auto_id_list[$k];
				$data['obtained_marks']		= $obtained_marks_list[$k];
				
				
				if($existSubmit_status == "Empty") {
					$this->db->insert('obtained_subject_marks', $data); 
				} else {
					$this->db->update('obtained_subject_marks', $data, array('id' => $updateId[$k])); 
				}	
		}
			
		if($data['submit_status'] == "Final") {	
		echo '<div class="alert alert-block alert-success " id="">
			<button class="close" data-dismiss="alert" type="button">
			<i class="ace-icon fa fa-times"></i>
			</button>
			<strong class="green">
			<i class="ace-icon fa fa-check-square-o"></i>
			
			</strong>
			<span class="alrtText">Finaly Mark Input Submitted Successfully. Try Again Click "Again Initialize"</span>
			</div>';
		} else {
			echo '<div class="alert alert-block alert-success " id="">
			<button class="close" data-dismiss="alert" type="button">
			<i class="ace-icon fa fa-times"></i>
			</button>
			<strong class="green">
			<i class="ace-icon fa fa-check-square-o"></i>
			
			</strong>
			<span class="alrtText">Mark Input Submitted Successfully. Try Again Click "Again Initialize"</span>
			</div>';
		
		}
	}


*/



	public function playToFiveMarksInputStore() 
	{
		$data['branch_id']		= $this->input->post('branch_id');
		$data['class_id']		= $this->input->post('class_id');
		$data['group_id']		= $this->input->post('group_id');
		$data['section_id']		= $this->input->post('section_id');
		$data['shift_id']		= $this->input->post('shift_id');
		$data['year']			= $this->input->post('year');
		$data['exam_type_id']	= $this->input->post('exam_type_id');
		$data['subject_id']	    = $this->input->post('subject_id');
		$data['date_time']	    = date("Y-m-d H:i:s");

		$dataAll['branch_id']  = $data['branch_id'];
		$dataAll['class_id']   = $data['class_id'];
		$dataAll['shift_id']   = $data['shift_id'];
		$dataAll['section_id'] = $data['section_id'];
		$dataAll['group_id']   = $data['group_id'];
		$dataAll['year']       = $data['year'];
		$dataAll['exam_id']    = $data['exam_type_id'];



		$totalMarksInfo 	= $this->M_crud->findById($table = 'exam_type_subjec_wise_total_marks',$where = array('exam_type_id' => $data['exam_type_id'], 'subject_id' => $data['subject_id']));

		$totalFmMarks           = $totalMarksInfo->total_marks;


		
		$submit_status  		= $this->input->post('submit_status');
		$existSubmit_status   	= $this->input->post('existSubmit_status');
		
		if(!empty($submit_status)) {
			$data['submit_status']   = $submit_status;
		} else {
			$data['submit_status']   = "Normal";
		}
		
		$data['submit_status'];
		$stu_auto_id_list    	= $this->input->post('stu_auto_id');
		$obtained_marks_list    = $this->input->post('obtained_marks');
		$updateId    			= $this->input->post('updateId');
		$totalObtainMmarks = 0;
		foreach($stu_auto_id_list as $k=>$v) {
				$data['stu_auto_id']	= $stu_auto_id_list[$k];
				$dataAll['stu_auto_id'] = $data['stu_auto_id'];
				$data['obtained_marks']	= $obtained_marks_list[$k];

				$totalObtainMmarks  += $obtained_marks_list[$k];


				$presentPercentage = $totalObtainMmarks * 100/$totalFmMarks;

                if($presentPercentage > 33){
                	$newPercentage = 'pass';
                }else{
                	$newPercentage = 'fail';
                }

                $obTainMarksStatus 	= $this->M_crud->findById($table = 'obtained_subject_marks',$where = array('exam_type_id' => $data['exam_type_id'], 'stu_auto_id' => $data['stu_auto_id'], 'branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'shift_id' => $data['shift_id'], 'section_id' => $data['section_id'], 'group_id' => $data['group_id'], 'year' => $data['year'], 'subject_id' => $data['subject_id'])); 
                


				if($existSubmit_status == "Empty") {
					$lastId = $this->M_crud_ayenal->save('obtained_subject_marks', $data);
				} else {
					$lastId =  $updateId[$k];
					$this->db->update('obtained_subject_marks', $data, array('id' => $updateId[$k])); 
				}


				// al student marks calculat start 
    
				


                $stuTotalInfoChk 	= $this->M_crud->findById($table = 'student_exam_wise_full_result_info', $where = array('exam_id' => $data['exam_type_id'], 'stu_auto_id' => $data['stu_auto_id'], 'branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'shift_id' => $data['shift_id'], 'section_id' => $data['section_id'], 'group_id' => $data['group_id'], 'year' => $data['year'])); 

                

                if(!empty($obTainMarksStatus)){
                	if($obTainMarksStatus->stu_total_maks_status =='exists' ){
                		 $previousObmarks = $obTainMarksStatus->obtained_marks; 
                		 $previousPercentage = $previousObmarks * 100/ $totalFmMarks;

                		if($previousPercentage > 33){
                			$oldPercentage = 'pass';
                		}else{
                			$oldPercentage = 'fail';
                		}

                		if($oldPercentage != $newPercentage){

                            if($newPercentage =='pass'){
                                $dataAll['fail_count']   = $stuTotalInfoChk->fail_count - 1;
                            }else{
                                $dataAll['fail_count']   = $stuTotalInfoChk->fail_count + 1;  
                            }
                		}else{
                		    $dataAll['fail_count']   	= $stuTotalInfoChk->fail_count;
                		}

                		if($stuTotalInfoChk){
                			 $alResultTotal  			= $stuTotalInfoChk->total_marks - $previousObmarks;
                		    $dataAll['total_marks'] 	= $alResultTotal + $totalObtainMmarks;                		    
                		}

                		$this->db->update('student_exam_wise_full_result_info', $dataAll, array('exam_id' => $data['exam_type_id'], 'stu_auto_id' => $data['stu_auto_id'], 'branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'shift_id' => $data['shift_id'], 'section_id' => $data['section_id'], 'group_id' => $data['group_id'], 'year' => $data['year']));    

                		//update query 
                	}else{

                        if(!empty($stuTotalInfoChk)){
                           
                            if($presentPercentage<33){
		               		   $dataAll['fail_count']   = $stuTotalInfoChk->fail_count + 1;    
						   	}else{
			                   $dataAll['fail_count']   = $stuTotalInfoChk->fail_count;    
						   	}

						    $dataAll['total_marks']  = $stuTotalInfoChk->total_marks + $totalObtainMmarks;
		                  	
		                  	$this->db->update('student_exam_wise_full_result_info', $dataAll, array('exam_id' => $data['exam_type_id'], 'stu_auto_id' => $data['stu_auto_id'], 'branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'shift_id' => $data['shift_id'], 'section_id' => $data['section_id'], 'group_id' => $data['group_id'], 'year' => $data['year']));  

	                    }else{

	                    	if($presentPercentage<33){
		               		    $dataAll['fail_count']   = 1;   
		               		    
						   	}else{
			                    $dataAll['fail_count']   = 0;    
						   	}

	                         $dataAll['total_marks']  = $totalObtainMmarks;


	                        $this->db->insert('student_exam_wise_full_result_info', $dataAll); 

	                    }
	                        
	                        
                	}

                 

                	
                } else {

                	if(!empty($stuTotalInfoChk)){
                           
                        if($presentPercentage<33){
	               		   $dataAll['fail_count']   = $stuTotalInfoChk->fail_count + 1;    
					   	}else{
		                   $dataAll['fail_count']   = $stuTotalInfoChk->fail_count;    
					   	}

					    $dataAll['total_marks']  = $stuTotalInfoChk->total_marks + $totalObtainMmarks;
	                  	
	                  	$this->db->update('student_exam_wise_full_result_info', $dataAll, array('exam_id' => $data['exam_type_id'], 'stu_auto_id' => $data['stu_auto_id'], 'branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'shift_id' => $data['shift_id'], 'section_id' => $data['section_id'], 'group_id' => $data['group_id'], 'year' => $data['year']));  

                    }else{

                    	if($presentPercentage<33){
	               		    $dataAll['fail_count']   = 1;   
	               		    
					   	}else{
		                    $dataAll['fail_count']   = 0;    
					   	}

                         $dataAll['total_marks']  = $totalObtainMmarks;


                        $this->db->insert('student_exam_wise_full_result_info', $dataAll); 

                    }

                }


                $data2['stu_total_maks_status']	= 'exists';
	            $this->db->update('obtained_subject_marks', $data2, array('id' => $lastId)); 




                // al student marks calculat end 

				$totalObtainMmarks = 0;



		}
			
		if($data['submit_status'] == "Final") {	
		echo '<div class="alert alert-block alert-success " id="">
			<button class="close" data-dismiss="alert" type="button">
			<i class="ace-icon fa fa-times"></i>
			</button>
			<strong class="green">
			<i class="ace-icon fa fa-check-square-o"></i>
			
			</strong>
			<span class="alrtText">Finaly Mark Input Submitted Successfully. Try Again Click "Again Initialize"</span>
			</div>';
		} else {
			echo '<div class="alert alert-block alert-success " id="">
			<button class="close" data-dismiss="alert" type="button">
			<i class="ace-icon fa fa-times"></i>
			</button>
			<strong class="green">
			<i class="ace-icon fa fa-check-square-o"></i>
			
			</strong>
			<span class="alrtText">Mark Input Submitted Successfully. Try Again Click "Again Initialize"</span>
			</div>';
		
		}
	}


}


