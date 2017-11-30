<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diary extends CI_Controller {

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
		$data['title'] = 'VMGPS&#65515;Student Diary Managment';
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

		$this->load->view('diaryInfo/diaryModulePage', $data);
	}

	public function diaryInput() {
	
		$currYear 	= date('Y');
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
		
		$data['title'] = 'VMGPS&#65515;Student Diary Managment';
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		$data['teacherListInfo'] 		=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		
		$this->load->view('diaryInfo/diaryInputPage', $data);
	
	}
	
	
	public function diaryDataInputAction()
	{
		$data['branch_id']			= $this->input->post('branch_id');
		$data['class_id']			= $this->input->post('class_id');
		$data['group_id']			= $this->input->post('group_id');
		$data['section_id']			= $this->input->post('section_id');
		$data['shift_id']			= $this->input->post('shift_id');
		$data['year']				= $this->input->post('year');
		$data['teacher_id']			= $this->input->post('teacher_id');
		$data['subject_id']			= $this->input->post('subject_id');
		$data['date']				= $this->input->post('date');
		$data['remarks']			= $this->input->post('remarks');
		$diary_content1				= $this->input->post('diary_content1');
		$diary_content2				= $this->input->post('diary_content2');
		$diary_content3				= $this->input->post('diary_content3');
		$diary_content4				= $this->input->post('diary_content4');
		$diary_content5				= $this->input->post('diary_content5');
		$data['diary_content']		= $diary_content1."</br>".$diary_content2."</br>".$diary_content3."</br>".$diary_content4."</br>".$diary_content5;
		
		$table = 'student_diary_information';
		$where = array('branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'group_id' => $data['group_id'], 'section_id' => $data['section_id'], 'shift_id' => $data['shift_id'], 'year' => $data['year'], 'teacher_id' => $data['teacher_id'], 'subject_id' => $data['subject_id'], 'date' => $data['date']);

		 $chkData   = $this->M_crud_ayenal->chkInsert($table, $where);
		
		if(!empty($chkData)){
		   $data2['remarks']			= $data['remarks'];
		   $data2['diary_content']		= $data['diary_content'];
		   $this->M_crud_ayenal->update($table, $data2, $where); 
		} else {
		   $this->db->insert($table, $data); 
		}
		
		
		
	}
	
	
	
	
	
	public function teacherStore()
	{
		$tea_edit_id				= $this->input->post('tea_edit_id');
		$data['branch_id']			= $this->input->post('branch_id_tea');
		$data['class_id']			= $this->input->post('class_id_tea');
		$data['group_id']			= $this->input->post('group_id_tea');
		$data['section_id']			= $this->input->post('section_id_tea');
		$data['shift_id']			= $this->input->post('shift_id_tea');
		$data['year']				= $this->input->post('year_tea');
		$data['teacher_name']		= $this->input->post('teacher_name');
		
		$table = 'teacher_information';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';

		if(!empty($tea_edit_id)){
			   if($data['teacher_name'] !=''){
				$this->M_crud_ayenal->update('teacher_information', $data, array('id' => $tea_edit_id));
			   }
			}else{
				if($data['teacher_name'] !=''){
				   $lastId      =  $this->M_crud_ayenal->save($table, $data); 
				}
			}

	    
		
			if(!empty($data['branch_id']) || !empty($data['class_id']) || !empty($data['group_id']) || !empty($data['section_id']) || !empty($data['shift_id']) || !empty($data['year'])) {
				if(!empty($data['branch_id'])) 			$where['teacher_information.branch_id'] 	= $data['branch_id'];
				if(!empty($data['class_id'])) 			$where['teacher_information.class_id'] 		= $data['class_id'];
				if(!empty($data['group_id'])) 			$where['teacher_information.group_id'] 		= $data['group_id'];
				if(!empty($data['section_id'])) 		$where['teacher_information.section_id'] 	= $data['section_id'];
				if(!empty($data['shift_id'])) 			$where['teacher_information.shift_id'] 		= $data['shift_id'];
				if(!empty($data['year'])) 			    $where['teacher_information.year'] 			= $data['year'];
				
				$teacherList   = $this->M_crud_ayenal->findAll('teacher_information', $where, $orderBy, $serialized);	
                if($tea_edit_id){
					echo '<option value="">Select Teacher</option>';
					foreach($teacherList as $v) {
					if($tea_edit_id == $v->id){
					  echo '<option value="'.$v->id.'" data-teacher-name="'.$v->teacher_name.'" selected>'.$v->teacher_name.'</option>';
				    }else{
					  echo '<option value="'.$v->id.'" data-teacher-name="'.$v->teacher_name.'">'.$v->teacher_name.'</option>';
				    }
				   }
				}else{

					echo '<option value="">Select Teacher</option>';
					foreach($teacherList as $v) {
					if($lastId == $v->id){
					  echo '<option value="'.$v->id.'" data-teacher-name="'.$v->teacher_name.'" selected>'.$v->teacher_name.'</option>';
				    }else{
					  echo '<option value="'.$v->id.'" data-teacher-name="'.$v->teacher_name.'">'.$v->teacher_name.'</option>';
				    }
				   }

				}

			}
				
		
		
	}
	
	
	
	public function subjectStore()
	{
		$sub_edit_id			    = $this->input->post('sub_edit_id');
		$data['branch_id']			= $this->input->post('branch_id_sub');
		$data['class_id']			= $this->input->post('class_id_sub');
		$data['group_id']			= $this->input->post('group_id_sub');
		$data['section_id']			= $this->input->post('section_id_sub');
		$data['shift_id']			= $this->input->post('shift_id_sub');
		$data['year']				= $this->input->post('year_sub');
		$data['year']				= $this->input->post('year_sub');
		$data['teacher_id']			= $this->input->post('teacher_id_sub');
		$data['subject_name']		= $this->input->post('subject_name');
		
		$table = 'subject_manage';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';

		   if(!empty($sub_edit_id)){
			   if($data['subject_name'] !=''){
				$this->M_crud_ayenal->update('subject_manage', $data, array('id' => $sub_edit_id));
			   }
			}else{
				if($data['subject_name'] !=''){
				   $lastId      =  $this->M_crud_ayenal->save($table, $data); 
				}
			}
		
		
		
		
		if(!empty($data['branch_id']) || !empty($data['class_id']) || !empty($data['group_id']) || !empty($data['section_id']) || !empty($data['shift_id']) || !empty($data['year'])) {
			if(!empty($data['branch_id'])) 			$where['subject_manage.branch_id'] = $data['branch_id'];
			if(!empty($data['class_id'])) 			$where['subject_manage.class_id'] = $data['class_id'];
			if(!empty($data['group_id'])) 			$where['subject_manage.group_id'] = $data['group_id'];
			if(!empty($data['section_id'])) 		$where['subject_manage.section_id'] = $data['section_id'];
			if(!empty($data['shift_id'])) 			$where['subject_manage.shift_id'] = $data['shift_id'];
			if(!empty($data['year'])) 				$where['subject_manage.year'] = $data['year'];
			
			   $subjectList =  $this->M_crud->findAll($table, $where, $orderBy, $serialized);


				
				if($sub_edit_id){
					echo '<option value="">Select Teacher</option>';
					foreach($subjectList as $v) {
					if($sub_edit_id == $v->id){
					  echo '<option value="'.$v->id.'" data-subject-name="'.$v->subject_name.'" selected>'.$v->subject_name.'</option>';
				    }else{
					  echo '<option value="'.$v->id.'" data-subject-name="'.$v->subject_name.'">'.$v->subject_name.'</option>';
				    }
				   }
				}else{

					echo '<option value="">Select Teacher</option>';
					foreach($subjectList as $v) {
					if($lastId == $v->id){
					  echo '<option value="'.$v->id.'" data-subject-name="'.$v->subject_name.'" selected>'.$v->subject_name.'</option>';
				    }else{
					  echo '<option value="'.$v->id.'" data-subject-name="'.$v->subject_name.'">'.$v->subject_name.'</option>';
				    }
				   }

				}


				
			
		}
		
		
	}
	
	
	
	
	 public function teacherList()
	 {
		$branch_id 	   = $this->input->post('branch_id');
		$class_id 	   = $this->input->post('class_id');
		$group_id 	   = $this->input->post('group_id');
		$section_id    = $this->input->post('section_id');
		$shift_id 	   = $this->input->post('shift_id');
		$year 	   	   = $this->input->post('year');
		
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		if(!empty($branch_id) || !empty($class_id) || !empty($group_id) || !empty($section_id) || !empty($shift_id) || !empty($year)) {
			if(!empty($branch_id)) 			$where['teacher_information.branch_id'] 	= $branch_id;
			if(!empty($class_id)) 			$where['teacher_information.class_id'] 		= $class_id;
			if(!empty($group_id)) 			$where['teacher_information.group_id'] 		= $group_id;
			if(!empty($section_id)) 		$where['teacher_information.section_id'] 	= $section_id;
			if(!empty($shift_id)) 			$where['teacher_information.shift_id'] 		= $shift_id;
			if(!empty($year)) 			    $where['teacher_information.year'] 			= $year;
			
			$teacherList   = $this->M_crud_ayenal->findAll('teacher_information', $where, $orderBy, $serialized);				
	
			echo '<option value="">Select Teacher</option>';
			foreach($teacherList as $v) {
				echo '<option value="'.$v->id.'" data-teacher-name="'.$v->teacher_name.'">'.$v->teacher_name.'</option>';
			}
			
		}
		
		
	 }
	 
	 
	 
	 
	 
	 public function subjectList()
	 {
		$branch_id 	   = $this->input->post('branch_id');
		$class_id 	   = $this->input->post('class_id');
		$group_id 	   = $this->input->post('group_id');
		$section_id    = $this->input->post('section_id');
		$shift_id 	   = $this->input->post('shift_id');
		$year 	   	   = $this->input->post('year');
		
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		if(!empty($branch_id) || !empty($class_id) || !empty($group_id) || !empty($section_id) || !empty($shift_id) || !empty($year) || !empty($teacher_id)) {
			if(!empty($branch_id)) 			$where['subject_manage.branch_id'] = $branch_id;
			if(!empty($class_id)) 			$where['subject_manage.class_id'] = $class_id;
			if(!empty($group_id)) 			$where['subject_manage.group_id'] = $group_id;
			if(!empty($section_id)) 		$where['subject_manage.section_id'] = $section_id;
			if(!empty($shift_id)) 			$where['subject_manage.shift_id'] = $shift_id;
			if(!empty($year)) 				$where['subject_manage.year'] = $year;
			
			$subjectList   = $this->M_crud_ayenal->findAll('subject_manage', $where, $orderBy, $serialized);				
	
			echo '<option value="">Select Subject</option>';
			foreach($subjectList as $v) {
				echo '<option value="'.$v->id.'" data-subject-name="'.$v->subject_name.'">'.$v->subject_name.'</option>';
			}
			
		}
		
		
	 }
	 
	 
	 
	 
	 
	 
	 
	
	
	

}


