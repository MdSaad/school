<?php

	class M_join extends CI_Model {
	
		const TABLE	= '';
	
		public function __construct()
		{
			parent::__construct();
		}
		
		
		public function findAllPromoteData($table, $where, $orderBy, $serialized)
		{
			$this->db->select('class_wise_info.*,stu_basic_info.*');
			$this->db->from($table);
			$this->db->join('stu_basic_info', 'class_wise_info.stu_auto_id = stu_basic_info.id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}

		public function findAllPromoteStudentInfo($table, $where, $orderBy, $serialized, $promotionWhere)
		{

		    $List 		= $this->findAllPromoteData($table, $where, $orderBy, $serialized);
		    foreach($List as $model)
			{
			   $whereStu = array('class_wise_info.stu_auto_id' => $model->id);
			   $chkWhere = $promotionWhere + $whereStu; 
               $model->chkPromotionData = $this->M_crud_ayenal->findById('class_wise_info', $chkWhere); 
			}
			return $List; 
		}
		
		
		
			
			
		public function findClassInfoFromMulti($table, $where, $orderBy, $serialized)
		{
			$this->db->select('class_wise_info.*, class_list_manage.*, class_list_manage.*, section_list_manage.*, group_list_manage.*, shift_list_manage.*, branch_list_manage.*');
			$this->db->from($table);
			$this->db->join('class_list_manage', 'class_wise_info.class_id 				= class_list_manage.id', 'left');
			$this->db->join('section_list_manage', 'class_wise_info.class_section_id 	= section_list_manage.id', 'left');
			$this->db->join('group_list_manage', 'class_wise_info.class_group_id  		= group_list_manage.id', 'left');
			$this->db->join('shift_list_manage', 'class_wise_info.class_shift_id  		= shift_list_manage.id', 'left');
			$this->db->join('branch_list_manage', 'class_wise_info.branc_id 	  		= branch_list_manage.id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->row();
		}
		
		
		public function findInfoByStuID($table, $where)
		{
			$this->db->select('stu_basic_info.*, nationality_list_manage.nationality_name, religion_list_manage.religion_name, stu_parents_info.*');
			$this->db->from('stu_basic_info');
			$this->db->join('nationality_list_manage', 'stu_basic_info.stu_nationality_id 		= nationality_list_manage.id', 'left');
			$this->db->join('religion_list_manage', 'stu_basic_info.stu_religion_id 			= religion_list_manage.id', 'left');
			$this->db->join('stu_parents_info', 'stu_basic_info.id 								= stu_parents_info.stu_auto_id', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}
		
		public function findAllParentsInfo($table, $where, $orderBy, $serialized, $onset, $limit)
		{
			
			$this->db->select('stu_parents_info.*, stu_basic_info.*');
			$this->db->join('stu_basic_info', 'stu_parents_info.stu_auto_id  = stu_basic_info.id', 'left');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$this->db->limit($limit, $onset);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function fidnAuthorInoByID($table, $where, $orderBy, $serialized, $onset, $limit)
		{
			
			$this->db->select('superadmin.*, designation_list.designationName, branch_list_manage.branch_name');
			$this->db->join('designation_list', 'superadmin.designation_id  = designation_list.dAutoId', 'left');
			$this->db->join('branch_list_manage', 'superadmin.user_branch_id  = branch_list_manage.id', 'left');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$this->db->limit($limit, $onset);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function findAuthorInfoByID($table, $where)
		{
			
			$this->db->select('superadmin.*, designation_list.designationName, branch_list_manage.branch_name');
			$this->db->join('designation_list', 'superadmin.designation_id  = designation_list.dAutoId', 'left');
			$this->db->join('branch_list_manage', 'superadmin.user_branch_id  = branch_list_manage.id', 'left');
			$this->db->from($table);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}
		
		
		
		public function findAllStuInfo($table, $where, $orderBy, $serialized)
		{
			$this->db->select('class_wise_info.*, stu_basic_info.*, branch_list_manage.branch_name, class_list_manage.class_name, stu_parents_info.f_name, f_pre_adrs, f_per_adrs, f_occupation, f_occupation_adrs, f_yearly_income, f_mobile, f_email, f_passport_no, f_nid, f_driving_licence, m_name, m_pre_adrs, m_per_adrs, m_occupation, m_occupation_adrs, m_yearly_income, m_mobile, m_email, m_passport_no, m_nid, m_driving_licence, g_name, g_pre_adrs, g_per_adrs, g_occupation, g_occupation_adrs, g_yearly_income, g_mobile, g_email, g_passport_no, g_nid, date_time, group_list_manage.group_name, section_list_manage.section_name');
			$this->db->from('class_wise_info');
			$this->db->join('stu_basic_info', 'class_wise_info.stu_auto_id = stu_basic_info.id', 'left');
			$this->db->join('branch_list_manage', 'class_wise_info.branc_id = branch_list_manage.id', 'left');
			$this->db->join('class_list_manage', 'class_wise_info.class_id = class_list_manage.id', 'left');
			$this->db->join('stu_parents_info', 'class_wise_info.stu_auto_id = stu_parents_info.stu_auto_id', 'left');
			$this->db->join('group_list_manage', 'class_wise_info.class_group_id = group_list_manage.id', 'left');
			$this->db->join('section_list_manage', 'class_wise_info.class_section_id = section_list_manage.id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}




		public function findAllStuPositionMarks($table, $where, $orderBy, $serialized, $exam_type_id) {
			$List 		= $this->findAllStuInfo($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

			    $model->subjectWiseMarksInfo  = $this->M_crud_ayenal->findAllPosiSubjectMarks('student_wise_subject_manage', array('student_id' => $model->stu_auto_id, 'year' => $model->year), $exam_type_id, 'id','asc', $model->stu_auto_id);
			  
			}

			return $List;
		}


		public function findAllStuSixToTenPositionMarks($table, $where, $orderBy, $serialized, $annualXmId) {
			$List 		= $this->findAllStuInfo($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

			    $model->subjectWiseMarksInfo  = $this->M_crud_ayenal->findAllSixToTenPosiSubjectMarks('student_wise_subject_manage', array('student_id' => $model->stu_auto_id, 'year' => $model->year), $annualXmId, 'id','asc', $model->stu_auto_id);
			  
			}

			return $List;
		}



		public function findAllStuPlayToFivePositionMarks($table, $where, $orderBy, $serialized) {
			$List 		= $this->findAllStuInfo($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

			    $model->subjectWiseMarksInfo  = $this->M_crud_ayenal->findAllPlayToFivePosiSubjectMarks('student_wise_subject_manage', array('student_id' => $model->stu_auto_id, 'year' => $model->year), 'id','asc', $model->stu_auto_id);
			  
			}

			return $List;
		}



		public function findAllStuElevenPositionMarks($table, $where, $orderBy, $serialized) {
			$List 		= $this->findAllStuInfo($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

			    $model->subjectWiseMarksInfo  = $this->M_crud_ayenal->findAllElevenPosiSubjectMarks('student_wise_subject_manage', array('student_id' => $model->stu_auto_id, 'year' => $model->year), 'id','asc', $model->stu_auto_id);
			  
			}

			return $List;
		}



		public function findAllStuTwlvePositionMarks($table, $where, $orderBy, $serialized) {
			$List 		= $this->findAllStuInfo($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

			    $model->subjectWiseMarksInfo  = $this->M_crud_ayenal->findAllTwlvePosiSubjectMarks('student_wise_subject_manage', array('student_id' => $model->stu_auto_id, 'year' => $model->year), 'id','asc', $model->stu_auto_id);
			  
			}

			return $List;
		}






		public function countAll($table, $where)
		{
			$this->db->select('class_wise_info.*, stu_basic_info.*, branch_list_manage.branch_name, class_list_manage.class_name, stu_parents_info.f_name, f_pre_adrs, f_per_adrs, f_occupation, f_occupation_adrs, f_yearly_income, f_mobile, f_email, f_passport_no, f_nid, f_driving_licence, m_name, m_pre_adrs, m_per_adrs, m_occupation, m_occupation_adrs, m_yearly_income, m_mobile, m_email, m_passport_no, m_nid, m_driving_licence, g_name, g_pre_adrs, g_per_adrs, g_occupation, g_occupation_adrs, g_yearly_income, g_mobile, g_email, g_passport_no, g_nid, date_time, group_list_manage.group_name, section_list_manage.section_name');
			$this->db->from('class_wise_info');
			$this->db->join('stu_basic_info', 'class_wise_info.stu_auto_id = stu_basic_info.id', 'left');
			$this->db->join('branch_list_manage', 'class_wise_info.branc_id = branch_list_manage.id', 'left');
			$this->db->join('class_list_manage', 'class_wise_info.class_id = class_list_manage.id', 'left');
			$this->db->join('stu_parents_info', 'class_wise_info.stu_auto_id = stu_parents_info.stu_auto_id', 'left');
			$this->db->join('group_list_manage', 'class_wise_info.class_group_id = group_list_manage.id', 'left');
			$this->db->join('section_list_manage', 'class_wise_info.class_section_id = section_list_manage.id', 'left');
			$this->db->where($where);			
			return $this->db->count_all_results();
		}
		
		
		public function findStuInfoByIDClassWise($table, $where)
		{
			$this->db->select('class_wise_info.*, stu_basic_info.*, branch_list_manage.branch_name, class_list_manage.class_name, stu_parents_info.f_name, f_pre_adrs, f_per_adrs, f_occupation, f_occupation_adrs, f_yearly_income, f_mobile, f_email, f_passport_no, f_nid, f_driving_licence, m_name, m_pre_adrs, m_per_adrs, m_occupation, m_occupation_adrs, m_yearly_income, m_mobile, m_email, m_passport_no, m_nid, m_driving_licence, g_name, g_pre_adrs, g_per_adrs, g_occupation, g_occupation_adrs, g_yearly_income, g_mobile, g_email, g_passport_no, g_nid, date_time,father_photo,mother_photo,guardian_photo, group_list_manage.group_name, section_list_manage.section_name,shift_list_manage.shift_name');
			$this->db->from('class_wise_info');
			$this->db->join('stu_basic_info', 'class_wise_info.stu_auto_id = stu_basic_info.id', 'left');
			$this->db->join('branch_list_manage', 'class_wise_info.branc_id = branch_list_manage.id', 'left');
			$this->db->join('class_list_manage', 'class_wise_info.class_id = class_list_manage.id', 'left');
			$this->db->join('stu_parents_info', 'class_wise_info.stu_auto_id = stu_parents_info.stu_auto_id', 'left');
			$this->db->join('group_list_manage', 'class_wise_info.class_group_id = group_list_manage.id', 'left');
			$this->db->join('section_list_manage', 'class_wise_info.class_section_id = section_list_manage.id', 'left');
			$this->db->join('shift_list_manage', 'class_wise_info.class_shift_id = shift_list_manage.id', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}
		public function findAllGroupByClassInfo($table, $where, $groupBy, $orderBy, $serialized)
		{
			$this->db->select('class_wise_info.*,stu_basic_info.*, class_list_manage.class_name');
			$this->db->from('class_wise_info');
			$this->db->join('class_list_manage', 'class_wise_info.class_id = class_list_manage.id', 'left');
			$this->db->join('stu_basic_info', 'class_wise_info.stu_auto_id = stu_basic_info.id', 'left');
			$this->db->group_by($groupBy);
			$this->db->order_by($orderBy, $serialized);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}

		public function findAllClassWiseInfo($table, $where, $groupBy, $orderBy, $serialized)
		{
			$this->db->select('class_wise_info.*, stu_basic_info.stu_full_name, branch_list_manage.branch_name, class_list_manage.class_name,group_list_manage.group_name, section_list_manage.section_name');
			$this->db->from('class_wise_info');
			$this->db->join('stu_basic_info', 'class_wise_info.stu_auto_id = stu_basic_info.id', 'left');
			$this->db->join('branch_list_manage', 'class_wise_info.branc_id = branch_list_manage.id', 'left');
			$this->db->join('class_list_manage', 'class_wise_info.class_id = class_list_manage.id', 'left');
			$this->db->join('group_list_manage', 'class_wise_info.class_group_id = group_list_manage.id', 'left');
			$this->db->join('section_list_manage', 'class_wise_info.class_section_id = section_list_manage.id', 'left');
			$this->db->group_by($groupBy);
			$this->db->order_by($orderBy, $serialized);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		

		

		public function findAllStuAdInfo($table, $where, $groupBy, $orderBy, $serialized, $fromDate, $toDate, $group_id, $section_id, $shift_id, $year, $student_type, $class_roll)
		{
			
			$List 		= $this->findAllGroupByClassInfo($table, $where, $groupBy, $orderBy, $serialized);
			
			foreach($List as $model)
			{

				 $whereStu = array('class_wise_info.branc_id' => $model->branc_id,  'class_wise_info.class_id' => $model->class_id,'stu_basic_info.delete_status !=' => "Yes", 'class_wise_info.year' => $year);


				if(!empty($group_id) || !empty($section_id) || !empty($shift_id) || !empty($class_roll) || !empty($fromDate) || !empty($toDate) || !empty($student_type))
                {

		           if(!empty($group_id))	    $whereStu['class_wise_info.class_group_id']  	= $group_id;
		           if(!empty($section_id))	    $whereStu['class_wise_info.class_section_id']   = $section_id;
		           if(!empty($shift_id))	    $whereStu['class_wise_info.class_shift_id']  	= $shift_id;
		           if(!empty($class_roll))	    $whereStu['class_wise_info.class_roll']  		= $class_roll;
		           if($student_type !='all')	$whereStu['class_wise_info.student_type']  	    = $student_type;
		           if(!empty($fromDate))	    $whereStu['class_wise_info.date >=']  			= $fromDate;
		           if(!empty($toDate))	    	$whereStu['class_wise_info.date <=']  			= $toDate;

				} 

				$model->findAllstu  	 = $this->findAllStuInfo($table, $whereStu, 'class_wise_info.class_roll', 'asc');
			
			}
			return $List;
		}
		
		
		public function findSubmittedHeadInfo($table, $where, $orderBy, $serialized)
		{
			$this->db->select('temp_paid_fee_head_details.*, stu_fee_collection_applicable_mode_list.applicable_mode_name');
			$this->db->join('stu_fee_collection_applicable_mode_list', 'temp_paid_fee_head_details.fee_head_id  = stu_fee_collection_applicable_mode_list.id', 'left');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function findFeeCollectionClassWise($table, $where, $orderBy, $serialized) {
				$List 		= $this->M_crud->findAll($table = 'class_list_manage', $classWhere = array(), $orderBy = 'sl_no', $serialized = 'asc');
				foreach($List as $model)
				{
					$model->classWiseCollection  = $this->M_crud->findAll('stu_fee_head_paid_details_info', array('fee_head_stu_branch_id' => $where['fee_head_stu_branch_id'],'fee_head_stu_class_id' => $model->id, 'submittedDate >=' => $where['fromDate'], 'submittedDate <=' => $where['toDate']), $orderBy = 'id', $seriaLized = 'desc');
				
				}
				return $List;
		}
		
		
		
		
		public function findFeeCollectionDuesClassWise($table, $where, $orderBy, $serialized) {
			$List 		= $this->M_crud->findAll($table = 'class_list_manage', $classWhere = array(), $orderBy = 'sl_no', $serialized = 'asc');
			foreach($List as $model)
			{
				$model->classWiseCollection  = $this->M_crud->findAll('stu_fee_collection_applicable_mode_list', array('fee_branch_id' => $where['branch_id'],'fee_class_id' => $model->id, 'fee_year' => $where['year']), $orderBy = 'id', $seriaLized = 'desc');
			
			}
			return $List;
		}
		
		
		public function findExamTypeList($table, $where, $orderBy, $serialized, $limit, $onset)
		{
			$this->db->select('class_wise_exam_type_manage.*,all_exam_type_manage.exam_type_name, branch_list_manage.branch_name, class_list_manage.class_name');
			$this->db->join('all_exam_type_manage', 'class_wise_exam_type_manage.exam_type_id  = all_exam_type_manage.id', 'left');
			$this->db->join('branch_list_manage', 'class_wise_exam_type_manage.branch_id  = branch_list_manage.id', 'left');
			$this->db->join('class_list_manage', 'class_wise_exam_type_manage.class_id  = class_list_manage.id', 'left');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$this->db->limit($limit, $onset);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function alreadyNormalyEntryMarks($table, $where, $orderBy, $serialized)
		{
			$this->db->select('obtained_subject_marks.*, stu_basic_info.*, class_wise_info.stu_auto_id,class_roll');
			$this->db->from('obtained_subject_marks');
			$this->db->join('stu_basic_info', 'obtained_subject_marks.stu_auto_id = stu_basic_info.id', 'left');
			$this->db->join('class_wise_info', 'obtained_subject_marks.stu_auto_id = class_wise_info.stu_auto_id', 'left');
			//$this->db->join('religion_list_manage', 'class_wise_info.stu_religion_id 			= religion_list_manage.id', 'left');
			//$this->db->join('stu_parents_info', 'class_wise_info.id 								= stu_parents_info.stu_auto_id', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function findStuMarksInfoBB($table, $where, $orderBy, $serialized, $obtainMarksWhere)
		{
			$this->db->select('class_wise_info.*, stu_basic_info.*, obtained_subject_marks.obtained_marks');
			$this->db->from('class_wise_info');
			$this->db->join('stu_basic_info', 'class_wise_info.stu_auto_id = stu_basic_info.id', 'left');
			$this->db->join('obtained_subject_marks', 'class_wise_info.stu_auto_id = obtained_subject_marks.stu_auto_id', 'left');
			$this->db->where($where);
			$this->db->where($obtainMarksWhere);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function findStuMarksInfo($table, $where, $orderBy, $serialized, $obtainMarksWhere) {
			$List 		= $this->M_join->findAllStuInfo($table, $where, $orderBy, $serialized);
			foreach($List as $model)
			{
				$model->obtainMark  = $this->M_crud->findById('obtained_subject_marks', array('stu_auto_id' =>$model->stu_auto_id, 'exam_type_id' => $obtainMarksWhere['exam_type_id'], 'subject_id' =>$obtainMarksWhere['subject_id']));
			
			}
			return $List;
		}


       public function findAllNineToTwlStu($table, $where, $orderBy, $serialized)
		{
			$this->db->select('student_wise_subject_manage.*,class_wise_info.*, stu_basic_info.*');
			$this->db->from($table);
			$this->db->join('class_wise_info', 'student_wise_subject_manage.student_id = class_wise_info.stu_auto_id', 'left');
			$this->db->join('stu_basic_info', 'student_wise_subject_manage.student_id = stu_basic_info.id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}

		

		

		public function findAllStuForMarksInfo($table, $where, $orderBy, $serialized, $obtainMarksWhere) {
			$List 		= $this->M_join->findAllNineToTwlStu($table, $where, $orderBy, $serialized);
			foreach($List as $model)
			{
				$model->obtainMark  = $this->M_crud->findById('obtained_subject_marks', array('stu_auto_id' =>$model->stu_auto_id, 'exam_type_id' => $obtainMarksWhere['exam_type_id'], 'subject_id' =>$obtainMarksWhere['subject_id']));
			
			}
			return $List;
		}
		
		
		
		
		
		public function findAllStuInfoForResultBB($table, $where, $orderBy, $serialized)
		{
			$this->db->select('class_wise_info.*, stu_basic_info.*, branch_list_manage.branch_name, class_list_manage.class_name, group_list_manage.group_name, section_list_manage.section_name');
			$this->db->from('class_wise_info');
			$this->db->join('stu_basic_info', 'class_wise_info.stu_auto_id = stu_basic_info.id', 'left');
			$this->db->join('branch_list_manage', 'class_wise_info.branc_id = branch_list_manage.id', 'left');
			$this->db->join('class_list_manage', 'class_wise_info.class_id = class_list_manage.id', 'left');
			$this->db->join('group_list_manage', 'class_wise_info.class_group_id = group_list_manage.id', 'left');
			$this->db->join('section_list_manage', 'class_wise_info.class_section_id = section_list_manage.id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function findAllStuInfoForResult($table, $where, $orderBy, $serialized, $subject_id, $examTypeIDList) {
			$List 		= $this->M_join->findAllStuInfo($table, $where, $orderBy, $serialized);
			foreach($List as $model)
			{
			  $examListArray  = array();
			  $examListMarks  = array();
			  foreach($examTypeIDList as $k => $v){
				$examListValue  = $this->findByExamId('obtained_subject_marks', array('stu_auto_id' =>$model->stu_auto_id,'subject_id' =>$subject_id, 'exam_type_id' =>$examTypeIDList[$k]));
				if(!empty($examListValue->exam_type_name)) $examListArray[] = $examListValue->exam_type_name;
				if(!empty($examListValue->obtained_marks)) $examListMarks[] = $examListValue->obtained_marks;
				if(empty($examListValue->obtained_marks)) $examListMarks[] = "No_Entry";
			}
			$model->examMarksWiseTypeName  	= $examListArray;
			$model->examWiseMarks   		= $examListMarks;
			
			
			 
			}
			return $List;
		}


		public function findAllStuIndividualResult($table, $where, $orderBy, $serialized, $subject_id, $exam_type_id) {
			$List 		= $this->M_join->findAllStuInfo($table, $where, $orderBy, $serialized);
			foreach($List as $model)
			{
			 
			   $examWiseMarksInfo  = $this->findByExamId('obtained_subject_marks', array('stu_auto_id' =>$model->stu_auto_id,'subject_id' =>$subject_id, 'exam_type_id' =>$exam_type_id));
				
			  if(!empty($examWiseMarksInfo->obtained_marks))    	$model->examWiseMarks   		= $examWiseMarksInfo->obtained_marks;
			  if(!empty($examWiseMarksInfo->multi_choose_mark))    	$model->multi_choose_mark   	= $examWiseMarksInfo->multi_choose_mark;
			  if(!empty($examWiseMarksInfo->written_marks))    		$model->written_marks   		= $examWiseMarksInfo->written_marks;
			 
			}

			return $List;
		}

		public function findAllStuPercenTageResult($table, $where, $orderBy, $serialized, $exam_type_id) {
			$List 		= $this->M_join->findAllSubjectStuInfo2($table, $where, $orderBy, $serialized);
			foreach($List as $model)
			{
			 
			   $examWiseMarksInfo  = $this->findByExamId('obtained_subject_marks', array('stu_auto_id' =>$model->student_id,'subject_id' =>$model->subject_id, 'exam_type_id' =>$exam_type_id));

			  if(!empty($examWiseMarksInfo->obtained_marks))    	   $model->examMarksInfo   		= $examWiseMarksInfo->obtained_marks;
			  if(!empty($examWiseMarksInfo->multi_choose_mark))    	   $model->mcqMarksInfo   		= $examWiseMarksInfo->multi_choose_mark;
			  if(!empty($examWiseMarksInfo->written_marks))    	   	   $model->creativeMarksInfo   	= $examWiseMarksInfo->written_marks;
			  if(!empty($examWiseMarksInfo->practicle_marks))    	   $model->practicleMarksInfo   = $examWiseMarksInfo->practicle_marks;
			 
			}

			return $List;
		}



		public function findStuWiseMonthlyResultInfo($table, $where, $stu_auto_id, $exam_type_id){
			$List 		= $this->findAllSubjectInfo($table, $where, 'id', 'asc');
			foreach($List as $model) 
			{
			  
			   $examWiseMarksInfo  		= $this->M_crud->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->subject_id, 'exam_type_id' =>$exam_type_id));
			   

				$examWiseFmMarksInfo  	= $this->M_crud->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->subject_id, 'exam_type_id' =>$exam_type_id));


			  if(!empty($examWiseMarksInfo->multi_choose_mark))    	 $model->examWiseMcqObtain   = $examWiseMarksInfo->multi_choose_mark;
			  if(!empty($examWiseMarksInfo->written_marks))        	 $model->examWiseCreaObtain  = $examWiseMarksInfo->written_marks;
			  if(!empty($examWiseMarksInfo->practicle_marks))    	 $model->examWisePracObtain  = $examWiseMarksInfo->practicle_marks;


			  if(!empty($examWiseFmMarksInfo->mcq_marks))    	 	 $model->examWiseMcqFmMarks   = $examWiseFmMarksInfo->mcq_marks;
			  if(!empty($examWiseFmMarksInfo->creative_marks))   	 $model->examWiseCreaFmMarks  = $examWiseFmMarksInfo->creative_marks;
			  if(!empty($examWiseFmMarksInfo->practicle_marks))  	 $model->examWisePracFmMarks  = $examWiseFmMarksInfo->practicle_marks;

			 
			}
			return $List;
		}
         


       
        // combine result report 

		public function findStuWiseSixToTenCombineResultInfo($table, $where, $stu_auto_id, $annualXmId){
			$List 		= $this->findAllSubjectInfo($table, $where, 'id', 'asc');
			foreach($List as $model) 
			{

			  // annual xm result start
			  
			   $examWiseAnnualObMarksInfo  		= $this->M_crud->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->subject_id, 'exam_type_id' =>$annualXmId));
			   

				$examWiseAnnualFmMarksInfo  	= $this->M_crud->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->subject_id, 'exam_type_id' =>$annualXmId));


			  if(!empty($examWiseAnnualObMarksInfo->multi_choose_mark))    	 $model->examWiseAnnualMcqObtain   = $examWiseAnnualObMarksInfo->multi_choose_mark;
			  if(!empty($examWiseAnnualObMarksInfo->written_marks))        	 $model->examWiseAnnualCreaObtain  = $examWiseAnnualObMarksInfo->written_marks;
			  if(!empty($examWiseAnnualObMarksInfo->practicle_marks))    	 $model->examWiseAnnualPracObtain  = $examWiseAnnualObMarksInfo->practicle_marks;


			  if(!empty($examWiseAnnualFmMarksInfo->mcq_marks))    	 	 $model->examWiseMcqAnnualFmMarks   = $examWiseAnnualFmMarksInfo->mcq_marks;
			  if(!empty($examWiseAnnualFmMarksInfo->creative_marks))   	 $model->examWiseCreaAnnualFmMarks  = $examWiseAnnualFmMarksInfo->creative_marks;
			  if(!empty($examWiseAnnualFmMarksInfo->practicle_marks))  	 $model->examWisePracAnnualFmMarks  = $examWiseAnnualFmMarksInfo->practicle_marks;

			  // Half yearly xm result start 


			  $examWiseHalfYearObMarksInfo  		= $this->M_crud->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->subject_id, 'exam_type_id' =>4));
			   

				$examWiseHalfYearFmMarksInfo  	= $this->M_crud->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->subject_id, 'exam_type_id' =>4));


			  if(!empty($examWiseHalfYearObMarksInfo->multi_choose_mark))    	 $model->examWiseHalfMcqObtain   = $examWiseHalfYearObMarksInfo->multi_choose_mark;
			  if(!empty($examWiseHalfYearObMarksInfo->written_marks))        	 $model->examWiseHalfCreaObtain  = $examWiseHalfYearObMarksInfo->written_marks;
			  if(!empty($examWiseHalfYearObMarksInfo->practicle_marks))    	 $model->examWiseHalfPracObtain  = $examWiseHalfYearObMarksInfo->practicle_marks;


			  if(!empty($examWiseHalfYearFmMarksInfo->mcq_marks))    	 	 $model->examWiseMcqHalfFmMarks   = $examWiseHalfYearFmMarksInfo->mcq_marks;
			  if(!empty($examWiseHalfYearFmMarksInfo->creative_marks))   	 $model->examWiseCreaHalfFmMarks  = $examWiseHalfYearFmMarksInfo->creative_marks;
			  if(!empty($examWiseHalfYearFmMarksInfo->practicle_marks))  	 $model->examWisePracHalfFmMarks  = $examWiseHalfYearFmMarksInfo->practicle_marks;

			 
			}
			return $List;
		}





		public function findStuWisePlayToFiveCombineResultInfo($table, $where, $stu_auto_id){
			$List 		= $this->findAllSubjectInfo($table, $where, 'id', 'asc');
			foreach($List as $model) 
			{

			  // annual xm result start
			  
			   $model->examWiseAnnualObMarksInfo  		= $this->M_crud->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->subject_id, 'exam_type_id' => 5));
			   

				$model->examWiseAnnualFmMarksInfo  	= $this->M_crud->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->subject_id, 'exam_type_id' => 5));
			  

			  // First Term result start 


			    $model->examWiseFirstTermObMarksInfo  		= $this->M_crud->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->subject_id, 'exam_type_id' =>1));
			   

				$model->examWiseFirstTermFmMarksInfo  	= $this->M_crud->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->subject_id, 'exam_type_id' =>1));


				 // Second Term result start 


			    $model->examWiseSecondTermObMarksInfo  		= $this->M_crud->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->subject_id, 'exam_type_id' =>2));
			   

				$model->examWiseSecondTermFmMarksInfo  	= $this->M_crud->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->subject_id, 'exam_type_id' =>2));


				// Third Term result start 


			    $model->examWiseThirdTermObMarksInfo  		= $this->M_crud->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->subject_id, 'exam_type_id' =>3));
			   

				$model->examWiseThirdTermFmMarksInfo  	= $this->M_crud->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->subject_id, 'exam_type_id' =>3));

			 
			}

			return $List;
		}



		public function findStuWiseElevenCombineResultInfo($table, $where, $stu_auto_id){
			$List 		= $this->findAllSubjectInfo($table, $where, 'id', 'asc');
			foreach($List as $model) 
			{

			  // Year final result start
			  
			   $model->examWiseYearFinalObMarksInfo   = $this->M_crud->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->subject_id, 'exam_type_id' => 10));
			   

				$model->examWiseYearFinalFmMarksInfo  	= $this->M_crud->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->subject_id, 'exam_type_id' => 10));
			  

			  // First Term result start 


			    $model->examWiseFirstTermObMarksInfo  		= $this->M_crud->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->subject_id, 'exam_type_id' =>8));
			   

				$model->examWiseFirstTermFmMarksInfo  	= $this->M_crud->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->subject_id, 'exam_type_id' =>8));


				// Second Term result start 


			    $model->examWiseSecondTermObMarksInfo  		= $this->M_crud->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->subject_id, 'exam_type_id' =>9));
			   

				$model->examWiseSecondTermFmMarksInfo  	= $this->M_crud->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->subject_id, 'exam_type_id' =>9));


				

			 
			}

			return $List;
		}


		public function findStuWiseTwlveCombineResultInfo($table, $where, $stu_auto_id){
			$List 		= $this->findAllSubjectInfo($table, $where, 'id', 'asc');
			foreach($List as $model) 
			{

			  // Test result start
			   $model->examWiseTestObMarksInfo   = $this->M_crud->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->subject_id, 'exam_type_id' => 12));
			   

				$model->examWiseTestFmMarksInfo  	= $this->M_crud->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->subject_id, 'exam_type_id' => 12));
			  

			  // Pre-test result start 

			    $model->examWisePreTestObMarksInfo     = $this->M_crud->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->subject_id, 'exam_type_id' =>11));
			   

				$model->examWisePreTestFmMarksInfo  	= $this->M_crud->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->subject_id, 'exam_type_id' =>11));



			 
			}

			return $List;
		}











		// student combine report end 




		public function findStuWiseMonthlyResultInfo222($table, $where, $stu_auto_id, $exam_type_id){
			$List 		= $this->findAllSubjectInfo($table, $where, 'id', 'asc');
			foreach($List as $model) 
			{
			  
			   $examWiseMarksInfo  		= $this->M_crud->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->subject_id, 'exam_type_id' =>$exam_type_id));
			   

				$examWiseFmMarksInfo  	= $this->M_crud->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->subject_id, 'exam_type_id' =>$exam_type_id));


			  if(!empty($examWiseMarksInfo->obtained_marks))    	 $model->examWiseObtainMarks   = $examWiseMarksInfo->obtained_marks;

			  if(!empty($examWiseFmMarksInfo->total_marks))    	 	 $model->examWiseFmMarks   = $examWiseFmMarksInfo->total_marks;
			  

			 
			}

			return $List;
		}


		public function findStuWiseAnnualHalfResultInfo($table, $where, $annualXmId, $orderBy, $serialized) {
			$List 		= $this->M_join->findAllStuInfoForResultBB($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

			   $where2 	    = "(group_id ='$model->class_group_id' OR group_id ='all') AND branch_id = '$model->branc_id' AND class_id ='$model->class_id' AND year ='$model->year'";
			   $model->subjectWiseMarksInfo  = $this->M_crud_ayenal->findAllSubjectMarks('subject_manage', $where2, $annualXmId, 'id','asc', $model->stu_auto_id);
			  
			}

			return $List;
		}


		public function findStuWisePlayToFiveResultInfo($table, $where, $orderBy, $serialized) {
			$List 		= $this->M_join->findAllStuInfoForResultBB($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

			   $where2 	    = "(group_id ='$model->class_group_id' OR group_id ='all') and class_id ='$model->class_id' and year ='$model->year'";
			   $model->subjectWiseMarksInfo  = $this->M_crud_ayenal->findAllPlayToFiveSubjectMarks('subject_manage', $where2, 'id','asc', $model->stu_auto_id);
			  
			}

			return $List;
		}


		public function findStuWiseElevenResultInfo($table, $where, $orderBy, $serialized) {
			$List 		= $this->M_join->findAllStuInfoForResultBB($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

			   $where2 	    = "(group_id ='$model->class_group_id' OR group_id ='all') and class_id ='$model->class_id'";
			   $model->subjectWiseMarksInfo  = $this->M_crud_ayenal->findAllElevenSubjectMarks('subject_manage', $where2, 'id','asc', $model->stu_auto_id);
			  
			}

			return $List;
		}

		public function findStuWiseTwelveResultInfo($table, $where, $orderBy, $serialized) {
			$List 		= $this->M_join->findAllStuInfoForResultBB($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

			   $where2 	    = "(group_id ='$model->class_group_id' OR group_id ='all') and class_id ='$model->class_id'";
			   $model->subjectWiseMarksInfo  = $this->M_crud_ayenal->findAllTwleveSubjectMarks('subject_manage', $where2, 'id','asc', $model->stu_auto_id);
			  
			}

			return $List;
		}




		public function findAllSubjectInfo($table, $where, $orderBy, $serialized)
		{
			$this->db->select('student_wise_subject_manage.*,subject_manage.subject_name, subject_type, subject_code');
			$this->db->from($table);
			$this->db->join('subject_manage', 'student_wise_subject_manage.subject_id = subject_manage.id', 'left');
			$this->db->order_by($orderBy, $serialized);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}






		public function findAllSubjectStuInfo($table, $where, $orderBy, $groupBy, $serialized)
		{
			$this->db->select('student_wise_subject_manage.*, stu_basic_info.*,class_wise_info.*, branch_list_manage.branch_name, class_list_manage.class_name, group_list_manage.group_name, section_list_manage.section_name');
			$this->db->from('student_wise_subject_manage');
			$this->db->join('stu_basic_info', 'student_wise_subject_manage.student_id = stu_basic_info.id', 'left');
			$this->db->join('class_wise_info', 'student_wise_subject_manage.student_id = class_wise_info.stu_auto_id', 'left');
			$this->db->join('branch_list_manage', 'student_wise_subject_manage.branch_id = branch_list_manage.id', 'left');
			$this->db->join('class_list_manage', 'student_wise_subject_manage.class_id = class_list_manage.id', 'left');
			$this->db->join('group_list_manage', 'student_wise_subject_manage.group_id = group_list_manage.id', 'left');
			$this->db->join('section_list_manage', 'student_wise_subject_manage.section = section_list_manage.id', 'left');
			$this->db->where($where);
			$this->db->group_by($groupBy);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}

		public function findAllSubjectStuInfo2($table, $where, $orderBy, $serialized)
		{
			$this->db->select('student_wise_subject_manage.*, stu_basic_info.*,class_wise_info.*, branch_list_manage.branch_name, class_list_manage.class_name, group_list_manage.group_name, section_list_manage.section_name');
			$this->db->from('student_wise_subject_manage');
			$this->db->join('stu_basic_info', 'student_wise_subject_manage.student_id = stu_basic_info.id', 'left');
			$this->db->join('class_wise_info', 'student_wise_subject_manage.student_id = class_wise_info.stu_auto_id', 'left');
			$this->db->join('branch_list_manage', 'student_wise_subject_manage.branch_id = branch_list_manage.id', 'left');
			$this->db->join('class_list_manage', 'student_wise_subject_manage.class_id = class_list_manage.id', 'left');
			$this->db->join('group_list_manage', 'student_wise_subject_manage.group_id = group_list_manage.id', 'left');
			$this->db->join('section_list_manage', 'student_wise_subject_manage.section = section_list_manage.id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}



		public function findAllStuHalfYearlyResult($table, $where, $orderBy, $serialized, $subject_id, $fstCtyId, $fstMonthLyId, $secondCtyId, $secondMonthLyId, $halfYearlyId) {
			$List 		= $this->M_join->findAllStuInfo($table, $where, $orderBy, $serialized);
			foreach($List as $model)
			{
			 
			   $examWisefstCtMarksInfo  		= $this->findByExamId('obtained_subject_marks', array('stu_auto_id' =>$model->stu_auto_id,'subject_id' =>$subject_id, 'exam_type_id' =>$fstCtyId));
			   $examWisefstMonthlyMarksInfo  	= $this->findByExamId('obtained_subject_marks', array('stu_auto_id' =>$model->stu_auto_id,'subject_id' =>$subject_id, 'exam_type_id' =>$fstMonthLyId));
			   $examWisesecondCtMarksInfo  		= $this->findByExamId('obtained_subject_marks', array('stu_auto_id' =>$model->stu_auto_id,'subject_id' =>$subject_id, 'exam_type_id' =>$secondCtyId));
			   $examWisesecondMonthlyMarksInfo  = $this->findByExamId('obtained_subject_marks', array('stu_auto_id' =>$model->stu_auto_id,'subject_id' =>$subject_id, 'exam_type_id' =>$secondMonthLyId));
			   $examWiseHalfMarksInfo  			= $this->findByExamId('obtained_subject_marks', array('stu_auto_id' =>$model->stu_auto_id,'subject_id' =>$subject_id, 'exam_type_id' =>$halfYearlyId));
				
			  if(!empty($examWisefstCtMarksInfo->obtained_marks))    	  $model->ctfstExamMarksInfo   		= $examWisefstCtMarksInfo->obtained_marks;
			  if(!empty($examWisefstMonthlyMarksInfo->obtained_marks))    $model->fstmonthlyExamMarksInfo   = $examWisefstMonthlyMarksInfo->obtained_marks;
			  if(!empty($examWisesecondCtMarksInfo->obtained_marks))      $model->secondctExamMarksInfo   	= $examWisesecondCtMarksInfo->obtained_marks;
			  if(!empty($examWisesecondMonthlyMarksInfo->obtained_marks)) $model->secondmonthlyExamMarksInfo  = $examWisesecondMonthlyMarksInfo->obtained_marks;
			  if(!empty($examWiseHalfMarksInfo->obtained_marks))    	  $model->halfyearlyExamMarksInfo   = $examWiseHalfMarksInfo->obtained_marks;
			 
			 
			}

			return $List;
		}




		public function findAllStuAnnualResult($table, $where, $orderBy, $serialized, $subject_id, $fstCtyId, $fstMonthLyId, $secondCtyId, $secondMonthLyId, $halfYearlyId, $thirdCtyId, $thirdMonthLyId, $fourthCtyId, $fourthMonthLyId, $annualId) {
			$List 		= $this->M_join->findAllStuInfo($table, $where, $orderBy, $serialized);
			foreach($List as $model)
			{

			  // start halfyearly
			   $examWisefstCtMarksInfo  		= $this->findByExamId('obtained_subject_marks', array('stu_auto_id' =>$model->stu_auto_id,'subject_id' =>$subject_id, 'exam_type_id' =>$fstCtyId));
			   $examWisefstMonthlyMarksInfo  	= $this->findByExamId('obtained_subject_marks', array('stu_auto_id' =>$model->stu_auto_id,'subject_id' =>$subject_id, 'exam_type_id' =>$fstMonthLyId));
			   $examWisesecondCtMarksInfo  		= $this->findByExamId('obtained_subject_marks', array('stu_auto_id' =>$model->stu_auto_id,'subject_id' =>$subject_id, 'exam_type_id' =>$secondCtyId));
			   $examWisesecondMonthlyMarksInfo  = $this->findByExamId('obtained_subject_marks', array('stu_auto_id' =>$model->stu_auto_id,'subject_id' =>$subject_id, 'exam_type_id' =>$secondMonthLyId));
			   $examWiseHalfMarksInfo  			= $this->findByExamId('obtained_subject_marks', array('stu_auto_id' =>$model->stu_auto_id,'subject_id' =>$subject_id, 'exam_type_id' =>$halfYearlyId));
				
            
              // start Annual

			   $examWiseThirdCtMarksInfo  		= $this->findByExamId('obtained_subject_marks', array('stu_auto_id' =>$model->stu_auto_id,'subject_id' =>$subject_id, 'exam_type_id' =>$thirdCtyId));
			   $examWiseThirdMonthlyMarksInfo  	= $this->findByExamId('obtained_subject_marks', array('stu_auto_id' =>$model->stu_auto_id,'subject_id' =>$subject_id, 'exam_type_id' =>$thirdMonthLyId));
			   $examWiseFourthCtMarksInfo  		= $this->findByExamId('obtained_subject_marks', array('stu_auto_id' =>$model->stu_auto_id,'subject_id' =>$subject_id, 'exam_type_id' =>$fourthCtyId));
			   $examWiseFourthMonthlyMarksInfo  = $this->findByExamId('obtained_subject_marks', array('stu_auto_id' =>$model->stu_auto_id,'subject_id' =>$subject_id, 'exam_type_id' =>$fourthMonthLyId));
			   $examWiseAnnualMarksInfo  		= $this->findByExamId('obtained_subject_marks', array('stu_auto_id' =>$model->stu_auto_id,'subject_id' =>$subject_id, 'exam_type_id' =>$annualId));


               // assign Halfyearly Result
			  if(!empty($examWisefstCtMarksInfo->obtained_marks))    	  $model->ctfstExamMarksInfo   		= $examWisefstCtMarksInfo->obtained_marks;
			  if(!empty($examWisefstMonthlyMarksInfo->obtained_marks))    $model->fstmonthlyExamMarksInfo   = $examWisefstMonthlyMarksInfo->obtained_marks;
			  if(!empty($examWisesecondCtMarksInfo->obtained_marks))      $model->secondctExamMarksInfo   	= $examWisesecondCtMarksInfo->obtained_marks;
			  if(!empty($examWisesecondMonthlyMarksInfo->obtained_marks)) $model->secondmonthlyExamMarksInfo  = $examWisesecondMonthlyMarksInfo->obtained_marks;
			  if(!empty($examWiseHalfMarksInfo->obtained_marks))    	  $model->halfyearlyExamMarksInfo   = $examWiseHalfMarksInfo->obtained_marks;

			  // assign Annual Result


			  if(!empty($examWiseThirdCtMarksInfo->obtained_marks))    	  	$model->ctThirdExamMarksInfo   		= $examWiseThirdCtMarksInfo->obtained_marks;
			  if(!empty($examWiseThirdMonthlyMarksInfo->obtained_marks))    $model->thirdmonthlyExamMarksInfo   = $examWiseThirdMonthlyMarksInfo->obtained_marks;
			  if(!empty($examWiseFourthCtMarksInfo->obtained_marks))      	$model->fourthctExamMarksInfo   	= $examWiseFourthCtMarksInfo->obtained_marks;
			  if(!empty($examWiseFourthMonthlyMarksInfo->obtained_marks)) 	$model->fourthmonthlyExamMarksInfo  = $examWiseFourthMonthlyMarksInfo->obtained_marks;
			  if(!empty($examWiseAnnualMarksInfo->obtained_marks))    	  	$model->annualExamMarksInfo   		= $examWiseAnnualMarksInfo->obtained_marks;
			 
			 
			}

			return $List;
		}

		
		
		
		
		public function findByExamId($table, $where)
		{
			
			$this->db->select('obtained_subject_marks.*, all_exam_type_manage.exam_type_name');
			$this->db->join('all_exam_type_manage', 'obtained_subject_marks.exam_type_id  = all_exam_type_manage.id', 'left');
			$this->db->from($table);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}
		
		
		
		public function findExistObtainMarkExamType($table, $where, $orderBy, $serialized)
		{
			$this->db->select('obtained_subject_marks.*, class_wise_exam_type_manage.exam_type_name');
			$this->db->from('obtained_subject_marks');
			$this->db->join('class_wise_exam_type_manage', 'obtained_subject_marks.exam_type_id = class_wise_exam_type_manage.id', 'left');
			$this->db->where($where);
			$this->db->group_by('exam_type_id'); 
			$query = $this->db->get();
			return $query->result();
		}
		


		public function findClasWiseExamTypeList($table, $where, $orderBy, $serialized)
		{
			$this->db->select('class_wise_exam_type_manage.*,all_exam_type_manage.exam_type_name');
			$this->db->join('all_exam_type_manage', 'class_wise_exam_type_manage.exam_type_id  = all_exam_type_manage.id', 'left');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}
		

		public function findByExamTypeName($table, $where)
		{
			
			$this->db->select('exam_type_subjec_wise_total_marks.*, all_exam_type_manage.exam_type_name');
			$this->db->join('all_exam_type_manage', 'exam_type_subjec_wise_total_marks.exam_type_id  = all_exam_type_manage.id', 'left');
			$this->db->from($table);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}


		public function findEssenStuInfo($table, $where)
		{
			$this->db->select('class_wise_info.*, stu_basic_info.*, branch_list_manage.branch_name, class_list_manage.class_name,group_list_manage.group_name, shift_list_manage.shift_name, section_list_manage.section_name,');
			$this->db->from('class_wise_info');
			$this->db->join('stu_basic_info', 'class_wise_info.stu_auto_id = stu_basic_info.id', 'left');
			$this->db->join('branch_list_manage', 'class_wise_info.branc_id = branch_list_manage.id', 'left');
			$this->db->join('class_list_manage', 'class_wise_info.class_id = class_list_manage.id', 'left');
			$this->db->join('shift_list_manage', 'class_wise_info.class_shift_id = shift_list_manage.id', 'left');
			$this->db->join('group_list_manage', 'class_wise_info.class_group_id = group_list_manage.id', 'left');
			$this->db->join('section_list_manage', 'class_wise_info.class_section_id = section_list_manage.id', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}





		public function findAllUnapprove($table, $where, $groupBy, $orderBy, $serialized)
		{
			$this->db->select('stu_fee_head_paid_details_info.*,class_wise_info.stu_id');
			$this->db->from('stu_fee_head_paid_details_info');
			$this->db->join('class_wise_info', 'stu_fee_head_paid_details_info.fee_head_stu_auto_id = class_wise_info.stu_auto_id', 'left');
			$this->db->group_by($groupBy);
			$this->db->order_by($orderBy, $serialized);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}



		public function findClassWiseId($table, $where, $orderBy, $serialized)
		{
			$this->db->select('class_wise_info.*, class_list_manage.*, group_list_manage.*, stu_basic_info.*, stu_parents_info.*');
			$this->db->from($table);
			$this->db->join('class_list_manage', 'class_wise_info.class_id 				= class_list_manage.id', 'left');
			$this->db->join('stu_basic_info', 'class_wise_info.stu_auto_id 				= stu_basic_info.id', 'left');
			$this->db->join('group_list_manage', 'class_wise_info.class_group_id  		= group_list_manage.id', 'left');
			$this->db->join('stu_parents_info', 'class_wise_info.stu_auto_id  		    = stu_parents_info.stu_auto_id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->row();
		}



		public function findClassWiseAllId($table, $where, $orderBy, $serialized)
		{
			$this->db->select('class_wise_info.*, class_list_manage.*, group_list_manage.*, stu_basic_info.*');
			$this->db->from($table);
			$this->db->join('class_list_manage', 'class_wise_info.class_id 				= class_list_manage.id', 'left');
			$this->db->join('stu_basic_info', 'class_wise_info.stu_auto_id 				= stu_basic_info.id', 'left');
			$this->db->join('group_list_manage', 'class_wise_info.class_group_id  		= group_list_manage.id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}

		public function findSubWiseAllStu($table, $where, $orderBy, $serialized)
		{
			$allStu  = $this->findClassWiseAllId($table, $where, $orderBy, $serialized);
			foreach($allStu as $v){
				$initSubject  = $this->M_crud->findAll('student_wise_subject_manage', array('student_id' => $v->stu_auto_id, 'year' => $v->year), 'id', 'asc');

				if(!empty($initSubject)){
					$initSubjectArray = array();
					 foreach($initSubject as $vs){ 
                        if(!empty($vs->subject_id)) $initSubjectArray[]   = $vs->subject_id;
					 }

                  if(!empty($initSubjectArray))   $v->initSubjectList = $initSubjectArray; 
                  
				}
			}

			return $allStu;
		}
		
		public function findAllClassWiseFeeCollection($table, $where, $orderBy, $serialized){
			
			$List 		= $this->findClassWiseFeeCollGroupID($table, $where, $orderBy, $serialized, $groupBy = 'fee_head_stu_auto_id');
			foreach($List as $model) 
			{
			  
			   $model->paidTotal  		= $this->M_crud->calCulateSum('stu_fee_head_paid_details_info', array('fee_head_stu_auto_id' =>$model->fee_head_stu_auto_id, 'fee_head_stu_branch_id' => $where['fee_head_stu_branch_id'], 'fee_head_stu_class_id' => $where['fee_head_stu_class_id'], 'fee_head_stu_group_id' => $where['fee_head_stu_group_id'], 'fee_head_stu_section_id' => $where['fee_head_stu_section_id'], 'fee_head_stu_shift_id' => $where['fee_head_stu_shift_id'],  'submittedDate >=' =>$where['submittedDate >='], 'submittedDate <=' =>$where['submittedDate <='], 'collection_approve_status' => "approve"), 'fee_head_mode_pay_amount');
			 
			}
			return $List;
		}
		
		public function findClassWiseFeeCollGroupID($table, $where, $orderBy, $serialized, $groupBy)
		{
			$this->db->select('stu_fee_head_paid_details_info.*, stu_basic_info.stu_current_id,stu_full_name');
			$this->db->from($table);
			$this->db->join('stu_basic_info', 'stu_fee_head_paid_details_info.fee_head_stu_auto_id = stu_basic_info.id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$this->db->group_by($groupBy); 
			$query = $this->db->get();
			return $query->result();
		}
		
		
		
		
		// atndence join info
		public function findAllAttnStuInfo($table, $where, $orderBy, $serialized)
		{
			$this->db->select('class_wise_info.*, stu_basic_info.*, branch_list_manage.branch_name, class_list_manage.class_name, group_list_manage.group_name, section_list_manage.section_name');
			$this->db->from('class_wise_info');
			$this->db->join('stu_basic_info', 'class_wise_info.stu_auto_id = stu_basic_info.id', 'left');
			$this->db->join('branch_list_manage', 'class_wise_info.branc_id = branch_list_manage.id', 'left');
			$this->db->join('class_list_manage', 'class_wise_info.class_id = class_list_manage.id', 'left');
			$this->db->join('group_list_manage', 'class_wise_info.class_group_id = group_list_manage.id', 'left');
			$this->db->join('section_list_manage', 'class_wise_info.class_section_id = section_list_manage.id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}







		
		
		
	}
?>