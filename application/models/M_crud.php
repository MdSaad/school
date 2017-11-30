<?php

	class M_crud extends CI_Model {
	
		const TABLE	= '';
	
		public function __construct()
		{
			parent::__construct();
		}
		
		public function findAllSumResult($table, $where, $monthlyExamId, $orderBy, $serialized, $groupBy)
		{
			$this->db->select('stu_auto_id, SUM(obtained_marks) AS total', FALSE);
			$this->db->from($table);
			$this->db->where($where);
			$this->db->or_where("exam_type_id",$monthlyExamId);
			$this->db->group_by($groupBy);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}

		public function findAllHalfYearlySumResult($table, $where, $fstMonthLyId, $secondCtyId, $secondMonthLyId, $halfYearlyId, $orderBy, $serialized, $groupBy)
		{
			$this->db->select('stu_auto_id, SUM(obtained_marks) AS total', FALSE);
			$this->db->from($table);
			$this->db->where($where);
			$this->db->or_where("exam_type_id",$fstMonthLyId);
			$this->db->or_where("exam_type_id",$secondCtyId);
			$this->db->or_where("exam_type_id",$secondMonthLyId);
			$this->db->or_where("exam_type_id",$halfYearlyId);
			$this->db->group_by($groupBy);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}


        public function findAllAnnualSumResult($table, $where, $fstMonthLyId, $secondCtyId, $secondMonthLyId, $halfYearlyId,$thirdCtyId, $thirdMonthLyId, $fourthCtyId, $fourthMonthLyId, $annualId, $orderBy, $serialized, $groupBy)
		{
			$this->db->select('stu_auto_id, SUM(obtained_marks) AS total', FALSE);
			$this->db->from($table);
			$this->db->where($where);
			$this->db->or_where("exam_type_id",$fstMonthLyId);
			$this->db->or_where("exam_type_id",$secondCtyId);
			$this->db->or_where("exam_type_id",$secondMonthLyId);
			$this->db->or_where("exam_type_id",$halfYearlyId);
			$this->db->or_where("exam_type_id",$thirdCtyId);
			$this->db->or_where("exam_type_id",$thirdMonthLyId);
			$this->db->or_where("exam_type_id",$fourthCtyId);
			$this->db->or_where("exam_type_id",$fourthMonthLyId);
			$this->db->or_where("exam_type_id",$annualId);
			$this->db->group_by($groupBy);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
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
 
		public function findToEightClass($table, $where, $orderBy, $serialized, $limit)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$this->db->limit($limit, 0);
			$query = $this->db->get();
			return $query->result();
		}


        public function findNineToTwelveClass($table, $where, $orderBy, $serialized, $limit)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$this->db->limit($limit, 11);
			$query = $this->db->get();
			return $query->result();
		}

		public function findLimitClass($table, $where, $orderBy, $serialized, $limitTo, $limitFrom)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$this->db->limit($limitTo, $limitFrom);
			$query = $this->db->get();
			return $query->result();
		}



		public function findLastThreeRepNo($table, $where,$groupBy, $orderBy, $serialized, $limit)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->group_by($groupBy); 		
			$this->db->order_by($orderBy, $serialized);
			$this->db->limit($limit, 0);
			$query = $this->db->get();
			return $query->result();
		}

		public function findAllGroupByInvoice($table, $where, $groupBy, $orderBy, $serialized)
		{
			$this->db->select('*');
			$this->db->select_sum('fee_head_mode_pay_amount');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->group_by($groupBy); 		
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}


		public function findAllSubjectWithMarks($table, $where, $exam_type_id,$year,$orderBy, $serialized, $group_id)
		{
		    $subjectList = $this->findAll($table, $where, $orderBy, $serialized);
		    foreach($subjectList as $allsubject){
		    	if($allsubject->group_id == 'all')
		    		$subGroup = $group_id;
		    	else
		    		$subGroup = $allsubject->group_id;
		    	$allsubject->subjectMarks = $this->findById('exam_type_subjec_wise_total_marks', array('exam_type_id' => $exam_type_id, 'group_id' => $subGroup, 'class_id' => $allsubject->class_id,  'subject_id' => $allsubject->id, 'year' => $year));
		    	
		    }

		    return $subjectList;
			
		}




		public function findStudentWiseResultInfo($table, $where, $stu_auto_id, $exam_type_id){
			$List 		= $this->findAll($table, $where, 'id', 'asc');
			foreach($List as $model) 
			{
			 
			  
			   $examWiseObtainMarksInfo  = $this->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->id, 'exam_type_id' =>$exam_type_id));              
				$examWiseMarksInfo  = $this->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->id, 'exam_type_id' =>$exam_type_id));

			  if(!empty($examWiseMarksInfo->total_marks))    			$model->examWiseMarks   		= $examWiseMarksInfo->total_marks;
			  if(!empty($examWiseObtainMarksInfo->obtained_marks))    	$model->examWiseObtain   		= $examWiseObtainMarksInfo->obtained_marks;
			 
			}

			return $List;
		}

      // monthly exam result
		public function findStuWiseMonthlyResultInfo($table, $where, $stu_auto_id, $ctExamId, $monthlyExamId){
			$List 		= $this->findAll($table, $where, 'id', 'asc');
			foreach($List as $model) 
			{
			   $examWiseCtObtainMarksInfo  			= $this->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->id, 'exam_type_id' =>$ctExamId));

				$examWiseCtMarksInfo  				= $this->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->id, 'exam_type_id' =>$ctExamId));

				$examWiseMonthlyObtainMarksInfo  	= $this->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->id, 'exam_type_id' =>$monthlyExamId));

				$examWiseMonthlyMarksInfo  			= $this->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->id, 'exam_type_id' =>$monthlyExamId));
				
			  if(!empty($examWiseCtMarksInfo->total_marks))    				$model->examWiseCtMarks   		= $examWiseCtMarksInfo->total_marks;
			  if(!empty($examWiseCtObtainMarksInfo->obtained_marks))    	$model->examWiseCtObtain   		= $examWiseCtObtainMarksInfo->obtained_marks;
			  if(!empty($examWiseMonthlyMarksInfo->total_marks))    		$model->examWiseMonthlyMarks   	= $examWiseMonthlyMarksInfo->total_marks;
			  if(!empty($examWiseMonthlyObtainMarksInfo->obtained_marks))   $model->examWiseMonthlyObtain   = $examWiseMonthlyObtainMarksInfo->obtained_marks;
			 
			}

			return $List;
		}



        // Half yearly exam result
		public function findStuWiseHalfYearlyResultInfo($table, $where, $stu_auto_id, $fstCtyId, $fstMonthLyId, $secondCtyId, $secondMonthLyId, $halfYearlyId){
			$List 		= $this->findAll($table, $where, 'id', 'asc');
			foreach($List as $model) 
			{

			 // first city start
			    $examWisefstCtObtainMarksInfo  			= $this->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->id, 'exam_type_id' =>$fstCtyId));

				$examWisefstCtMarksInfo  				= $this->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->id, 'exam_type_id' =>$fstCtyId));

				$examWiseFstMonthlyObtainMarksInfo  	= $this->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->id, 'exam_type_id' =>$fstMonthLyId));

				$examWiseFstMonthlyMarksInfo  			= $this->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->id, 'exam_type_id' =>$fstMonthLyId));



              // second city start
			    $examWiseSeconCtObtainMarksInfo  		= $this->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->id, 'exam_type_id' =>$secondCtyId));

				$examWiseSeconCtMarksInfo  				= $this->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->id, 'exam_type_id' =>$secondCtyId));

				$examWiseSeconMonthlyObtainMarksInfo  	= $this->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->id, 'exam_type_id' =>$secondMonthLyId));

				$examWiseSeconMonthlyMarksInfo  		= $this->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->id, 'exam_type_id' =>$secondMonthLyId));


				// half yearly  start

				$examWiseHalfYearlyObtainMarksInfo  	= $this->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->id, 'exam_type_id' =>$halfYearlyId));

				$examWiseHalfYearlyMarksInfo  		    = $this->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->id, 'exam_type_id' =>$halfYearlyId));

		      // first city start
				
			  if(!empty($examWisefstCtMarksInfo->total_marks))    					$model->examWisefstCtMarks   		   = $examWisefstCtMarksInfo->total_marks;
			  if(!empty($examWisefstCtObtainMarksInfo->obtained_marks))    			$model->examWisefstCtObtain   		   = $examWisefstCtObtainMarksInfo->obtained_marks;
			  if(!empty($examWiseFstMonthlyMarksInfo->total_marks))    				$model->examWisefstMonthlyMarks   	   = $examWiseFstMonthlyMarksInfo->total_marks;
			  if(!empty($examWiseFstMonthlyObtainMarksInfo->obtained_marks))   		$model->examWisefstMonthlyObtain   	   = $examWiseFstMonthlyObtainMarksInfo->obtained_marks;


             // second city start
			  if(!empty($examWiseSeconCtMarksInfo->total_marks))    				$model->examWiseSecondCtMarks   		= $examWiseSeconCtMarksInfo->total_marks;
			  if(!empty($examWiseSeconCtObtainMarksInfo->obtained_marks))    		$model->examWiseSecondCtObtain   		= $examWiseSeconCtObtainMarksInfo->obtained_marks;
			  if(!empty($examWiseSeconMonthlyMarksInfo->total_marks))    			$model->examWiseSecondMonthlyMarks   	= $examWiseSeconMonthlyMarksInfo->total_marks;
			  if(!empty($examWiseSeconMonthlyObtainMarksInfo->obtained_marks))   	$model->examWiseSecondMonthlyObtain   	= $examWiseSeconMonthlyObtainMarksInfo->obtained_marks;


			   // half yearly start
			   if(!empty($examWiseHalfYearlyMarksInfo->total_marks))    			$model->examWiseHalfYearlyMarks   		= $examWiseHalfYearlyMarksInfo->total_marks;
			   if(!empty($examWiseHalfYearlyObtainMarksInfo->obtained_marks))       $model->examWiseHalfYearlyObtain   		= $examWiseHalfYearlyObtainMarksInfo->obtained_marks;
			 
			}

			return $List;
		}



		// Annual exam result


		public function findStuWiseAnnualResultInfo($table, $where, $stu_auto_id, $fstCtyId, $fstMonthLyId, $secondCtyId, $secondMonthLyId, $halfYearlyId, $thirdCtyId, $thirdMonthLyId, $fourthCtyId, $fourthMonthLyId, $annualId){
			$List 		= $this->findAll($table, $where, 'id', 'asc');
			foreach($List as $model) 
			{

			 // first monthly start
			    $examWisefstCtObtainMarksInfo  			= $this->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->id, 'exam_type_id' =>$fstCtyId));

				$examWisefstCtMarksInfo  				= $this->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->id, 'exam_type_id' =>$fstCtyId));

				$examWiseFstMonthlyObtainMarksInfo  	= $this->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->id, 'exam_type_id' =>$fstMonthLyId));

				$examWiseFstMonthlyMarksInfo  			= $this->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->id, 'exam_type_id' =>$fstMonthLyId));



              // second monthly start
			    $examWiseSeconCtObtainMarksInfo  		= $this->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->id, 'exam_type_id' =>$secondCtyId));

				$examWiseSeconCtMarksInfo  				= $this->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->id, 'exam_type_id' =>$secondCtyId));

				$examWiseSeconMonthlyObtainMarksInfo  	= $this->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->id, 'exam_type_id' =>$secondMonthLyId));

				$examWiseSeconMonthlyMarksInfo  		= $this->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->id, 'exam_type_id' =>$secondMonthLyId));


				// half yearly  start

				$examWiseHalfYearlyObtainMarksInfo  	= $this->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->id, 'exam_type_id' =>$halfYearlyId));

				$examWiseHalfYearlyMarksInfo  		    = $this->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->id, 'exam_type_id' =>$halfYearlyId));

				// third monthly start
			    $examWiseThirdCtObtainMarksInfo  		= $this->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->id, 'exam_type_id' =>$thirdCtyId));

				$examWiseThirdCtMarksInfo  				= $this->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->id, 'exam_type_id' =>$thirdCtyId));

				$examWiseThirdMonthlyObtainMarksInfo  	= $this->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->id, 'exam_type_id' =>$thirdMonthLyId));

				$examWiseThirdMonthlyMarksInfo  		= $this->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->id, 'exam_type_id' =>$thirdMonthLyId));

				// fourth monthly start
			    $examWiseFourthCtObtainMarksInfo  		= $this->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->id, 'exam_type_id' =>$fourthCtyId));

				$examWiseFourthCtMarksInfo  			= $this->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->id, 'exam_type_id' =>$fourthCtyId));

				$examWiseFourthMonthlyObtainMarksInfo  	= $this->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->id, 'exam_type_id' =>$fourthMonthLyId));

				$examWiseFourthMonthlyMarksInfo  		= $this->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->id, 'exam_type_id' =>$fourthMonthLyId));

				// Annual  start

				$examWiseAnnualObtainMarksInfo  		= $this->findById('obtained_subject_marks', array('stu_auto_id' =>$stu_auto_id,'subject_id' =>$model->id, 'exam_type_id' =>$annualId));

				$examWiseAnnualMarksInfo  		    	= $this->findById('exam_type_subjec_wise_total_marks', array('subject_id' =>$model->id, 'exam_type_id' =>$annualId));




		      // first monthly start
			  if(!empty($examWisefstCtMarksInfo->total_marks))    					$model->examWisefstCtMarks   		   = $examWisefstCtMarksInfo->total_marks;
			  if(!empty($examWisefstCtObtainMarksInfo->obtained_marks))    			$model->examWisefstCtObtain   		   = $examWisefstCtObtainMarksInfo->obtained_marks;
			  if(!empty($examWiseFstMonthlyMarksInfo->total_marks))    				$model->examWisefstMonthlyMarks   	   = $examWiseFstMonthlyMarksInfo->total_marks;
			  if(!empty($examWiseFstMonthlyObtainMarksInfo->obtained_marks))   		$model->examWisefstMonthlyObtain   	   = $examWiseFstMonthlyObtainMarksInfo->obtained_marks;


              // second monthly start
			  if(!empty($examWiseSeconCtMarksInfo->total_marks))    				$model->examWiseSecondCtMarks   		= $examWiseSeconCtMarksInfo->total_marks;
			  if(!empty($examWiseSeconCtObtainMarksInfo->obtained_marks))    		$model->examWiseSecondCtObtain   		= $examWiseSeconCtObtainMarksInfo->obtained_marks;
			  if(!empty($examWiseSeconMonthlyMarksInfo->total_marks))    			$model->examWiseSecondMonthlyMarks   	= $examWiseSeconMonthlyMarksInfo->total_marks;
			  if(!empty($examWiseSeconMonthlyObtainMarksInfo->obtained_marks))   	$model->examWiseSecondMonthlyObtain   	= $examWiseSeconMonthlyObtainMarksInfo->obtained_marks;


			  // half yearly start
			  if(!empty($examWiseHalfYearlyMarksInfo->total_marks))    				$model->examWiseHalfYearlyMarks   		= $examWiseHalfYearlyMarksInfo->total_marks;
			  if(!empty($examWiseHalfYearlyObtainMarksInfo->obtained_marks))        $model->examWiseHalfYearlyObtain   		= $examWiseHalfYearlyObtainMarksInfo->obtained_marks;

			  // third monthly start
			  if(!empty($examWiseThirdCtMarksInfo->total_marks))    				$model->examWiseThirdCtMarks   			= $examWiseThirdCtMarksInfo->total_marks;
			  if(!empty($examWiseThirdCtObtainMarksInfo->obtained_marks))    		$model->examWiseThirdCtObtain   		= $examWiseThirdCtObtainMarksInfo->obtained_marks;
			  if(!empty($examWiseThirdMonthlyMarksInfo->total_marks))    			$model->examWiseThirdMonthlyMarks   	= $examWiseThirdMonthlyMarksInfo->total_marks;
			  if(!empty($examWiseThirdMonthlyObtainMarksInfo->obtained_marks))   	$model->examWiseThirdMonthlyObtain   	= $examWiseThirdMonthlyObtainMarksInfo->obtained_marks;

			  // fourth monthly start
			  if(!empty($examWiseFourthCtMarksInfo->total_marks))    				$model->examWiseFourthCtMarks   		= $examWiseFourthCtMarksInfo->total_marks;
			  if(!empty($examWiseFourthCtObtainMarksInfo->obtained_marks))    		$model->examWiseFourthCtObtain   		= $examWiseFourthCtObtainMarksInfo->obtained_marks;
			  if(!empty($examWiseFourthMonthlyMarksInfo->total_marks))    			$model->examWiseFourthMonthlyMarks   	= $examWiseFourthMonthlyMarksInfo->total_marks;
			  if(!empty($examWiseFourthMonthlyObtainMarksInfo->obtained_marks))   	$model->examWiseFourthMonthlyObtain   	= $examWiseFourthMonthlyObtainMarksInfo->obtained_marks;

			  // Annual start
			  if(!empty($examWiseAnnualMarksInfo->total_marks))    					$model->examWiseAnnualMarks   			= $examWiseAnnualMarksInfo->total_marks;
			  if(!empty($examWiseAnnualObtainMarksInfo->obtained_marks))        	$model->examWiseAnnualObtain   			= $examWiseAnnualObtainMarksInfo->obtained_marks;



			 
			}

			return $List;
		}
		
		



		public function findAllTypeMarks($table, $where, $orderBy, $serialized, $branch_id, $class_id, $group_id, $section_id, $shift_id, $year, $subject_id)
		{
			
			$List 		= $this->findAll($table, $where, $orderBy, $serialized);
			
			//$stuDetailsInfo  = $this->M_crud->findById('class_wise_info', $stuClassWhere);
			
			foreach($List as $model)
			{
				$model->typeWiseMarks  = $this->findById('exam_type_subjec_wise_total_marks', array("exam_type_id" => $model->id, "branch_id" => $branch_id, "class_id" => $class_id, "group_id" => $group_id, "section_id" => $section_id, "year" => $year, "shift_id" => $shift_id, "subject_id" => $subject_id));
			
			}
			return $List;
		}
		
		
		
		public function findAllOrWhere($table, $where, $orderBy, $serialized)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->or_where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		
		public function findABasicInfo($table, $orderBy)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by($orderBy, 'desc');
			$this->db->limit(1, 0); 
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
		
		
		
		
		public function findAllForPagination($table, $where, $orderBy, $serialized, $onset, $limit)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$this->db->limit($limit, $onset);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function countAllList($table, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);			
			return $this->db->count_all_results();
		}
		
		
		//This is Student Basic Info//
		public function findAllBasicInfo($table, $where, $orderBy, $serialized, $onset, $limit)
		{
			
			$List 		= $this->findAllForPagination($table, $where, $orderBy, $serialized, $onset, $limit);
			
			//$stuDetailsInfo  = $this->M_crud->findById('class_wise_info', $stuClassWhere);
			
			foreach($List as $model)
			{
				$model->currClassInfo  = $this->M_join->findClassInfoFromMulti('class_wise_info', array("stu_auto_id" => $model->id), 'year', 'desc');
			
			}
			return $List;
		}
		
		
		
		public function findAllAuthorInfo($table, $where, $orderBy, $serialized, $onset, $limit)
		{
			$List 		= $this->M_join->fidnAuthorInoByID($table, $where, $orderBy, $serialized, $onset, $limit);
			
			foreach($List as $model)
			{
				$model->moduleAccessInfo  = $this->findAll('user_accesable_module', array("user_id" => $model->id), 'id', 'asc');
			
			}
			return $List;
		}
		
		
		public function findLastInsert($table, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			return $this->db->insert_id();
		}
		
		public function findTotal($table, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$query = $this->db->get();			
			return $query->num_rows();
		}
		
		
		public function findStuListForFeeCollApplicable($table, $where, $orderBy, $serialized)
		{
		
			$List 		= $this->M_join->findAllStuInfo($table, $where, $orderBy, $serialized);
			foreach($List as $model)
			{
				$model->collectionApplicableStuInfo  = $this->M_crud->findAll('stu_fee_collection_applicable_mode_list', array('fee_coll_app_stu_auto_id' => $model->stu_auto_id, 'fee_year' => $where['class_wise_info.year']), $orderBy = 'id', $seriaLized = 'asc');
			
			}
			return $List;
		}
		
		
		
		public function findAllGroupID($table, $where, $orderBy, $serialized, $groupBy)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$this->db->group_by($groupBy); 
			$query = $this->db->get();
			return $query->result();
		}
		
		public function sendMessageProcessBB($receiver_phone, $message, $reciver_name, $humanType, $module_name = "")
		{
			$length	= strlen($receiver_phone);
			if($length == 10) {
				$mobile	= '880'.$receiver_phone;
			} else if($length == 11){
				$mobile	= '88'.$receiver_phone;
			} else {
				$mobile	= $receiver_phone;
			}
			
			
			$soapClient = new SoapClient("https://api2.onnorokomsms.com/sendsms.asmx?wsdl");
			$paramArray = array(
			'userName'=>"01677543665",
			'userPassword'=>"96831",
			'mobileNumber'=> $mobile,
			'smsText'=>$message,
			'type'=>"TEXT",
			'maskName'=> "Medhakunja",
			'campaignName'=>'Medhakunja',
			);
			$value = $soapClient->__call("OneToOne", array($paramArray));
			
			$response	= explode("||", $value->OneToOneResult);
			//print_r($response);
			$responseCode	= $response[0];
			if($responseCode == 1900) {
					$returnMessage	= array('message' => "Message Send Successfully");
					$data['send_status']		= "Success ";
					$feedback					= 1;
			} else {
					$returnMessage	= array('message' => "Message Send Failed");
					$data['send_status']		= "Failed ";
					$feedback					= 0;
			}
			
			$data['message']			= $message;
			$data['reciver_name']		= $reciver_name;
			$data['human_type']			= $humanType;
			$data['reciever_phone_no']	= $mobile;
			$data['module_name']		= $module_name;
			$data['message_date']		= date('Y-m-d');
			$data['date_time']			= date('Y-m-d H:i:s');
			$this->db->insert('message', $data);
			return $feedback;
		}
		
		
		public function sendMessageProcess($receiver_phone, $message, $reciver_name, $humanType, $module_name = "")
		{
			$length	= strlen($receiver_phone);
			if($length == 10) {
				$mobile	= '880'.$receiver_phone;
			} else if($length == 11){
				$mobile	= '88'.$receiver_phone;
			} else {
				$mobile	= $receiver_phone;
			}
			
			$postUrl = "http://193.105.74.159/api/sendsms/xml";
      
			$xmlString =
			"<SMS>
			 <authentification>
			 <username>SAWEBSOFT</username>
			 <password>E6lQqr8M</password>
			 </authentification>
			 <message>
			 <sender>Medhakunja</sender>
			 <text>".$message."</text>
			 </message>
			 <recipients>
			 <gsm>".$mobile."</gsm>
			 </recipients>
			 </SMS>";    
		  
		   $fields = "XML=" . urlencode($xmlString); 
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $postUrl);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields); 
		
			$response = curl_exec($ch);
			
			$responseBody = json_decode($response);
			curl_close($ch);
   
			$data['message']			= $message;
			$data['reciver_name']		= $reciver_name;
			$data['human_type']			= $humanType;
			$data['reciever_phone_no']	= $mobile;
			$data['module_name']		= $module_name;
			$data['send_status']		= "";
			$data['message_date']		= date('Y-m-d');
			$data['date_time']			= date('Y-m-d H:i:s');
			$this->db->insert('message', $data);
			
			return $response;
		}
		
		public function calCulateSum($table, $where, $sumField)
		  {
		   $this->db->select_sum($sumField);
		   $this->db->from($table);
		   $this->db->where($where);
		   $query = $this->db->get();
		   return $query->row()->$sumField;
		  }
		  
		 public function findAllGroupByLimit($table, $where,  $orderBy, $serialized, $groupBy, $limit)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->group_by($groupBy);
			$this->db->limit($limit, 0);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}
 

			
	}
?>