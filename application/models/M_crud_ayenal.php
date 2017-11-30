<?php

	class M_crud_ayenal extends CI_Model {
	
		const TABLE	= '';
	
		public function __construct()
		{
			parent::__construct();
		}


		public function save($table, $data)
		{
			$this->db->insert($table, $data); 
			return $this->db->insert_id(); 
		}

		public function countAll($table, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);			
			return $this->db->count_all_results();
		}
		
		
		public function findAll($table, $where, $orderBy, $serialized)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}

		public function findAllPosiSubjectMarks($table, $where, $examId, $orderBy, $serialized, $stu_auto_id)

		{

			
			$List 		= $this->findAll($table, $where, $orderBy, $serialized);
			foreach($List as $model)
			{

				$model->subjectMarks = $this->findById('obtained_subject_marks', array('subject_id' => $model->subject_id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => $examId));
				$model->subjectFmMarks = $this->findById('exam_type_subjec_wise_total_marks', array('subject_id' => $model->subject_id, 'exam_type_id' => $examId));
				
			}
			return $List;
		}

		public function findAllSixToTenPosiSubjectMarks($table, $where, $annualXmId, $orderBy, $serialized, $stu_auto_id)
		{
			
			$List 		= $this->findAll($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

				$model->annualSubjectMarks = $this->findById('obtained_subject_marks', array('subject_id' => $model->subject_id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => $annualXmId));
				$model->halfYearSubjectMarks = $this->findById('obtained_subject_marks', array('subject_id' => $model->subject_id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => 4));
				$model->annualFmMarks = $this->M_crud->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->subject_id, 'exam_type_id' => $annualXmId));

				$model->halfYearFmMarks = $this->M_crud->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->subject_id, 'exam_type_id' => 4));
			
			}
			return $List;
		}


		public function findAllPlayToFivePosiSubjectMarks($table, $where, $orderBy, $serialized, $stu_auto_id)
		{
			
			$List 		= $this->findAll($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

				$model->annualSubjectMarks = $this->findById('obtained_subject_marks', array('subject_id' => $model->subject_id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => 5));
				
				$model->firstTermSubjectMarks = $this->findById('obtained_subject_marks', array('subject_id' => $model->subject_id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => 1));
				$model->secondTermSubjectMarks = $this->findById('obtained_subject_marks', array('subject_id' => $model->subject_id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => 2));
				$model->thirdTermSubjectMarks = $this->findById('obtained_subject_marks', array('subject_id' => $model->subject_id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => 3));
				
			
			}
			return $List;
		}



		public function findAllElevenPosiSubjectMarks($table, $where, $orderBy, $serialized, $stu_auto_id)
		{
			
			$List 		= $this->findAll($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

				$model->yearFinalSubjectMarks = $this->findById('obtained_subject_marks', array('subject_id' => $model->subject_id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => 10));
				
				$model->firstTermSubjectMarks = $this->findById('obtained_subject_marks', array('subject_id' => $model->subject_id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => 8));
				$model->secondTermSubjectMarks = $this->findById('obtained_subject_marks', array('subject_id' => $model->subject_id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => 9));
				
			
			}
			return $List;
		}



		public function findAllTwlvePosiSubjectMarks($table, $where, $orderBy, $serialized, $stu_auto_id)
		{
			
			$List 		= $this->findAll($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

				$model->testSubjectMarks = $this->findById('obtained_subject_marks', array('subject_id' => $model->subject_id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => 12));
				
				$model->preTestSubjectMarks = $this->findById('obtained_subject_marks', array('subject_id' => $model->subject_id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => 11));
				
			
			}
			return $List;
		}
		


		
		

		
		public function findAllSubjectMarks($table, $where, $annualXmId, $orderBy, $serialized, $stu_auto_id)
		{

			$List 		= $this->findAll($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

				$model->subjectMarks 	  = $this->findById('obtained_subject_marks', array('subject_id' => $model->id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => $annualXmId));
				$model->finalObMarksMarks = $this->findById('exam_type_subjec_wise_total_marks', array('subject_id' => $model->id, 'exam_type_id' => $annualXmId));

				$model->halfYear  	 	  = $this->findById('obtained_subject_marks', array('subject_id' => $model->id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => "4"));
			
			}
			
			return $List;
		}


		public function findAllPlayToFiveSubjectMarks($table, $where, $orderBy, $serialized, $stu_auto_id)
		{
			
			$List 		= $this->findAll($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

				$model->subjectMarks  	 = $this->findById('obtained_subject_marks', array('subject_id' => $model->id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => "5"));
				$model->firstterm  	 = $this->findById('obtained_subject_marks', array('subject_id' => $model->id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => "1"));
				$model->secondterm  	 = $this->findById('obtained_subject_marks', array('subject_id' => $model->id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => "2"));
				$model->thirdterm  	 = $this->findById('obtained_subject_marks', array('subject_id' => $model->id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => "3"));
			
			}
			return $List;
		}

		public function findAllStuPositionData($table, $where, $orderBy, $serialized)
		{
			
			$List 		= $this->findAll($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

				$model->annualMarks  = $this->findById('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $model->branch_id, 'student_exam_wise_full_result_info.class_id' => $model->class_id, 'student_exam_wise_full_result_info.section_id' => $model->section_id, 'student_exam_wise_full_result_info.year' => $model->year, 'fail_count' => $model->fail_count, 'exam_id' => $model->exam_id, 'stu_auto_id' => $model->stu_auto_id));



				$model->firstterm  	 = $this->findById('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $model->branch_id, 'student_exam_wise_full_result_info.class_id' => $model->class_id, 'student_exam_wise_full_result_info.section_id' => $model->section_id, 'student_exam_wise_full_result_info.year' => $model->year, 'exam_id' => '1', 'stu_auto_id' => $model->stu_auto_id));

				$model->secondterm  	 = $this->findById('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $model->branch_id, 'student_exam_wise_full_result_info.class_id' => $model->class_id, 'student_exam_wise_full_result_info.section_id' => $model->section_id, 'student_exam_wise_full_result_info.year' => $model->year, 'exam_id' => '2', 'stu_auto_id' => $model->stu_auto_id));

				$model->thirdterm  	 = $this->findById('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $model->branch_id, 'student_exam_wise_full_result_info.class_id' => $model->class_id, 'student_exam_wise_full_result_info.section_id' => $model->section_id, 'student_exam_wise_full_result_info.year' => $model->year, 'exam_id' => '3', 'stu_auto_id' => $model->stu_auto_id));
			
			}
			return $List;
		}

		public function findAllSixStuPositionData($table, $where, $orderBy, $serialized)
		{
			
			$List 		= $this->findAll($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

				$model->annualMarks  = $this->findById('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $model->branch_id, 'student_exam_wise_full_result_info.class_id' => $model->class_id, 'student_exam_wise_full_result_info.section_id' => $model->section_id, 'student_exam_wise_full_result_info.year' => $model->year, 'fail_count' => $model->fail_count, 'exam_id' => $model->exam_id, 'stu_auto_id' => $model->stu_auto_id));



				$model->halfYearly  	 = $this->findById('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $model->branch_id, 'student_exam_wise_full_result_info.class_id' => $model->class_id, 'student_exam_wise_full_result_info.section_id' => $model->section_id, 'student_exam_wise_full_result_info.year' => $model->year, 'exam_id' => '4', 'stu_auto_id' => $model->stu_auto_id));

				
			
			}
			return $List;
		}

		public function findAllEleStuPositionData($table, $where, $orderBy, $serialized)
		{
			
			$List 		= $this->findAll($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

				$model->yearFinalMarks  = $this->findById('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $model->branch_id, 'student_exam_wise_full_result_info.class_id' => $model->class_id, 'student_exam_wise_full_result_info.year' => $model->year, 'fail_count' => $model->fail_count, 'exam_id' => $model->exam_id, 'stu_auto_id' => $model->stu_auto_id));



				$model->firstTermMarks  	 = $this->findById('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $model->branch_id, 'student_exam_wise_full_result_info.class_id' => $model->class_id, 'student_exam_wise_full_result_info.year' => $model->year, 'exam_id' => '8', 'stu_auto_id' => $model->stu_auto_id));

				$model->secondTermMarks  	 = $this->findById('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $model->branch_id, 'student_exam_wise_full_result_info.class_id' => $model->class_id, 'student_exam_wise_full_result_info.year' => $model->year, 'exam_id' => '9', 'stu_auto_id' => $model->stu_auto_id));

				
			
			}
			return $List;
		}


		public function findAllTwlStuPositionData($table, $where, $orderBy, $serialized)
		{
			
			$List 		= $this->findAll($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

				$model->testMarks  = $this->findById('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $model->branch_id, 'student_exam_wise_full_result_info.class_id' => $model->class_id, 'student_exam_wise_full_result_info.year' => $model->year, 'fail_count' => $model->fail_count, 'exam_id' => $model->exam_id, 'stu_auto_id' => $model->stu_auto_id));


				$model->preTestMarks  	 = $this->findById('student_exam_wise_full_result_info', array('student_exam_wise_full_result_info.branch_id' => $model->branch_id, 'student_exam_wise_full_result_info.class_id' => $model->class_id, 'student_exam_wise_full_result_info.year' => $model->year, 'exam_id' => '11', 'stu_auto_id' => $model->stu_auto_id));

				
			
			}
			return $List;
		}




		public function findAllElevenSubjectMarks($table, $where, $orderBy, $serialized, $stu_auto_id)
		{
			
			$List 		= $this->findAll($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

				$model->subjectMarks  	 = $this->findById('obtained_subject_marks', array('subject_id' => $model->id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => "10"));
				$model->firstterm  	 = $this->findById('obtained_subject_marks', array('subject_id' => $model->id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => "8"));
				$model->secondterm  	 = $this->findById('obtained_subject_marks', array('subject_id' => $model->id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => "9"));
				
			
			}
			return $List;
		}


		public function findAllTwleveSubjectMarks($table, $where, $orderBy, $serialized, $stu_auto_id)
		{
			
			$List 		= $this->findAll($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

				$model->subjectMarks  	 = $this->findById('obtained_subject_marks', array('subject_id' => $model->id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => "12"));
				$model->preTest  	 = $this->findById('obtained_subject_marks', array('subject_id' => $model->id, 'stu_auto_id' =>$stu_auto_id, 'exam_type_id' => "11"));
				
				
			
			}
			return $List;
		}


		



		public function findAllStuWiseInfo($table, $where, $orderBy, $serialized, $fromDate, $toDate, $lastAttenanceDate)
		{
			
			$List 		= $this->findAll($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

				$model->countAllCustom  	 = $this->countAll('holyday_setup', array("month_year" => $model->month_year, 'holyday_date >=' =>$fromDate, 'holyday_date <=' =>$toDate, 'holyday_date <=' => $lastAttenanceDate));
			
			}
			return $List;
		}


		public function findAllEmpWiseInfo($table, $where, $orderBy, $serialized, $fromDate, $toDate, $lastAttenanceDate)
		{
			
			$List 		= $this->findAll($table, $where, 'month_year', 'asc');
			
			foreach($List as $model)
			{

				$model->countAlMin  		 = $this->findAllEmpHoursMin('employee_in_out_count', array("emp_id" => $model->employee_auto_id, "month_year" => $model->month_year, 'atten_day >=' =>$fromDate, 'atten_day <=' =>$toDate), 'total_min');
				$model->countAlHours  		 = $this->findAllEmpHoursMin('employee_in_out_count', array("emp_id" => $model->employee_auto_id, "month_year" => $model->month_year, 'atten_day >=' =>$fromDate, 'atten_day <=' =>$toDate), 'total_hours');
				$model->countAllCustom  	 = $this->countAll('emp_holyday_setup', array("month_year" => $model->month_year, 'holyday_date >=' =>$fromDate, 'holyday_date <=' =>$toDate, 'holyday_date <=' => $lastAttenanceDate));
				$model->countAlLeave  		 = $this->findAllEmpHoursMin('emp_day_to_day_leave_manage_details', array("emp_id" => $model->employee_auto_id, "month_year" => $model->month_year, 'leave_date >=' =>$fromDate, 'leave_date <=' =>$toDate, 'leave_date <=' => $lastAttenanceDate), 'count_leave');

			
			}
			return $List;
		}


		public function findAllGroup($table, $where, $orderBy, $serialized, $groupBy)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->group_by($groupBy);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}

		public function findAllHolyDayInfo($table, $where, $orderBy, $serialized, $groupBy, $fromDate, $toDate)
		{
			
			$List 		= $this->findAllGroup($table, $where, $orderBy, $serialized, $groupBy);
			
			foreach($List as $model)
			{

				$model->countAllCustom  	 = $this->countAll('holyday_setup', array("month_year" => $model->month_year, 'holyday_date >=' =>$fromDate, 'holyday_date <=' =>$toDate));
			
			}
			return $List;
		}



		//This is Student Basic Info//
		public function findAllDataInfo($table, $where, $branch_id, $class_id, $group_id, $section_id, $shift_id,  $orderBy, $serialized, $groupBy)
		{
			
			$List 		= $this->findAllGroup($table, $where, $orderBy, $serialized, $groupBy);
			
			foreach($List as $model)
			{
				$model->allSubDiary  = $this->M_join_ayenal->findClassInfoFromMulti($table, array("date" => $model->date, "student_diary_information.branch_id" => $branch_id, "student_diary_information.class_id" => $class_id, "student_diary_information.group_id" => $group_id,"student_diary_information.section_id" => $section_id, "student_diary_information.shift_id" => $shift_id), $orderBy, $serialized);
			
			}
			return $List;
		}
		
		
		
		

		public function chkInsert($table, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by("id","desc");
			$query = $this->db->get();
			return $query->row();
		}

		public function findAllStudentPresentInfo($table, $where = array())
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by("id","asc");
			$query = $this->db->get();
			return $query->row();
		}
		
		
		public function findById($table,$where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}


		
		
		public function findMax($table,$where, $fieldName)
		{
			$this->db->select_max($fieldName);
			$this->db->where($where);
			$result = $this->db->get($table); 
			return $result->row();
		}

		public function findMaxdate($table,$where)
		{
			$this->db->select('max(date) as date');
			$this->db->from($table);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row()->date;
		}
		
		
		

		public function update($table, $data, $where)
		{
			$this->db->update($table, $data, $where);        
		}

		public function destroy($table, $where)
		{
			$this->db->delete($table, $where);        
		}


        public function findAllEmpHoursMin($table, $where, $sumField)
		{
			$this->db->select_sum($sumField);
			$this->db->from($table);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row()->$sumField;
		}
		


		 public function findAllEmpWiseLeaveInfo($table, $where, $fromDate, $toDate, $orderBy, $serialized)
		{
			
			$List 		= $this->M_join_ayenal->findEmpAllLeave($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{
				
				$model->countAllLeave  		 = $this->findAllEmpHoursMin('emp_day_to_day_leave_manage_details', array("emp_id" => $model->emp_id, "leave_type_id" => $model->leave_type_id, 'leave_date >=' =>$fromDate, 'leave_date <=' =>$toDate), 'count_leave');
				
			}
			return $List;
		}


		// Live Chat Start

		
		
		public function countAllMsg($table, $sendTo, $sendFrom)
		{
			$this->db->select('*');
			$this->db->from($table);
			$where ="(send_to =$sendTo AND send_from=$sendFrom) OR (send_to =$sendFrom AND send_from=$sendTo)";
			$this->db->where($where);
			return $this->db->count_all_results();
		}

		public function findAllLoginUser($table, $id)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where_not_in('all_chat_user_registration.id', $id);
			$this->db->where('all_chat_user_registration.online_status', "active");
			$this->db->order_by("id", "asc"); 
			$query = $this->db->get();
			return $query->result();
		}

		
		

		public function countAllActiveUser($table, $activeUserId)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where_not_in('id', $activeUserId);	
			$this->db->where('online_status', "active");	
			return $this->db->count_all_results();
		}	

       
		public function findAllOldMsg($table, $sendTo, $sendFrom)
		{
			$this->db->select('*');
			$this->db->from($table);
			$where ="(send_to =$sendTo AND send_from=$sendFrom) OR (send_to =$sendFrom AND send_from=$sendTo)";
			$this->db->where($where);
			$this->db->order_by("id", "desc");
			$this->db->limit(200, 20);
			$query = $this->db->get();
			return $query->result();
		}	

		public function findAllSearchLiveUser($table, $user, $skipUser)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->like('all_chat_user_registration.full_name', $user);
			$this->db->where_not_in('all_chat_user_registration.full_name', $skipUser);
			$this->db->order_by("id", "asc"); 
			$query = $this->db->get();
			return $query->result();
		}


		public function calCulateSum($table, $where, $sumField)
		{
			$this->db->select_sum($sumField);
			$this->db->from($table);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row()->$sumField;
		}


		public function findAllAttnInfo($table, $where, $orderBy, $serialized, $attnDate)
		{
			
			$List 		= $this->M_join->findAllAttnStuInfo($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{

				$model->attnInfo  	 = $this->findById('attendence_information', array('date' => $attnDate, 'student_auto_id' => $model->stu_auto_id));
			
			}
			return $List;
		}


		public function findAllStudentNotIn($table, $skipUser,$where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->where_not_in('class_wise_info.stu_auto_id', $skipUser);
			$query = $this->db->get();
			return $query->result();
		}
	}
?>