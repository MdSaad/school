<?php

	class M_join_ayenal extends CI_Model {
	
		const TABLE	= '';
	
		public function __construct()
		{
			parent::__construct();
		}
			
			
		public function findAllSubject($table, $where, $orderBy, $serialized)
		{
			$this->db->select('subject_manage.*, branch_list_manage.branch_name,class_list_manage.class_name');
			$this->db->from($table);
			$this->db->join('branch_list_manage', 'subject_manage.branch_id= branch_list_manage.id', 'left');
			$this->db->join('class_list_manage', 'subject_manage.class_id= class_list_manage.id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}

		
		public function findAllIssueBoook($table, $where, $orderBy, $serialized)
		{
			$this->db->select('book_issue_info.*, book_type.book_type_name,class_list_manage.class_name, library_subject_manage.library_subject_name');
			$this->db->from($table);
			$this->db->join('book_type', 'book_issue_info.issue_book_type_id = book_type.id', 'left');
			$this->db->join('class_list_manage', 'book_issue_info.issue_class_id = class_list_manage.id', 'left');
			$this->db->join('library_subject_manage', 'book_issue_info.subject_id = library_subject_manage.id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}

		public function findAllStudentBookIssue($table, $where, $orderBy, $serialized)
		{
			$this->db->select('book_issue_info.*,library_book_create.book_id,library_book_create.book_name as bookName');
			$this->db->from($table);
			$this->db->join('library_book_create', 'book_issue_info.book_auto_id= library_book_create.id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}


		public function findClassInfoFromMulti($table, $where, $orderBy, $serialized)
		{
			$this->db->select('student_diary_information.*, subject_manage.subject_name');
			$this->db->from($table);
			$this->db->join('subject_manage', 'student_diary_information.subject_id= subject_manage.id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}

		public function findOneEmpDetails($table, $where)
		{
			$this->db->select('salary_and_allowance_information.*, employee_basic_information.employee_full_name,initiate_joining_date, designition_list_manage.designition_name');
			$this->db->from($table);
			$this->db->join('employee_basic_information', 'salary_and_allowance_information.employee_id= employee_basic_information.	employee_id', 'left');
			$this->db->join('designition_list_manage', 'salary_and_allowance_information.designition_id= designition_list_manage.id', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}


		public function findAllEmpSalaryDetails($table, $where,$orderBy, $serialized)
		{
			$this->db->select('salary_and_allowance_information.*,designition_list_manage.designition_name,employee_basic_information.employee_full_name,employee_basic_information.id as empAutoId, initiate_joining_date');
			$this->db->from($table);
			$this->db->join('designition_list_manage', 'salary_and_allowance_information.designition_id= designition_list_manage.id', 'left');
			$this->db->join('employee_basic_information', 'salary_and_allowance_information.employee_id= employee_basic_information.employee_id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}


		public function employeeSalarySheet($table, $where,$orderBy, $serialized, $monthYear)
		{
			
			$List 		= $this->findAllEmpSalaryDetails($table, $where,$orderBy, $serialized);
			
			foreach($List as $model)
			{
				 $attenInfo     	   = $this->M_crud_ayenal->findById('employee_attendence_information', array('employee_auto_id' =>$model->empAutoId, 'month_year' => $monthYear));

				if(!empty($attenInfo)) $model->day1 = $attenInfo->day1;
				if(!empty($attenInfo)) $model->day2 = $attenInfo->day2;
				if(!empty($attenInfo)) $model->day3 = $attenInfo->day3;
				if(!empty($attenInfo)) $model->day4 = $attenInfo->day4;
				if(!empty($attenInfo)) $model->day5 = $attenInfo->day5;
				if(!empty($attenInfo)) $model->day6 = $attenInfo->day6;
				if(!empty($attenInfo)) $model->day7 = $attenInfo->day7;
				if(!empty($attenInfo)) $model->day8 = $attenInfo->day8;
				if(!empty($attenInfo)) $model->day9 = $attenInfo->day9;
				if(!empty($attenInfo)) $model->day10 = $attenInfo->day10;
				if(!empty($attenInfo)) $model->day11 = $attenInfo->day11;
				if(!empty($attenInfo)) $model->day12 = $attenInfo->day12;
				if(!empty($attenInfo)) $model->day13 = $attenInfo->day13;
				if(!empty($attenInfo)) $model->day14 = $attenInfo->day14;
				if(!empty($attenInfo)) $model->day15 = $attenInfo->day15;
				if(!empty($attenInfo)) $model->day16 = $attenInfo->day16;
				if(!empty($attenInfo)) $model->day17 = $attenInfo->day17;
				if(!empty($attenInfo)) $model->day18 = $attenInfo->day18;
				if(!empty($attenInfo)) $model->day19 = $attenInfo->day19;
				if(!empty($attenInfo)) $model->day20 = $attenInfo->day20;
				if(!empty($attenInfo)) $model->day21 = $attenInfo->day21;
				if(!empty($attenInfo)) $model->day22 = $attenInfo->day22;
				if(!empty($attenInfo)) $model->day23 = $attenInfo->day23;
				if(!empty($attenInfo)) $model->day24 = $attenInfo->day24;
				if(!empty($attenInfo)) $model->day25 = $attenInfo->day25;
				if(!empty($attenInfo)) $model->day26 = $attenInfo->day26;
				if(!empty($attenInfo)) $model->day27 = $attenInfo->day27;
				if(!empty($attenInfo)) $model->day28 = $attenInfo->day28;
				if(!empty($attenInfo)) $model->day29 = $attenInfo->day29;
				if(!empty($attenInfo)) $model->day30 = $attenInfo->day30;
				if(!empty($attenInfo)) $model->day31 = $attenInfo->day31;

				 $model->countAllCustom        		= $this->M_crud_ayenal->countAll('emp_holyday_setup', array('branch_id' =>$model->branch_id, 'month_year' => $monthYear));
				 $model->countAllLeave         		= $this->M_crud_ayenal->countAll('emp_day_to_day_leave_manage_details', array('emp_id' =>$model->empAutoId, 'month_year' => $monthYear));
				 $model->bankAccountName            = $this->M_crud_ayenal->findById('employee_essential_information', array('emp_auto_id' =>$model->empAutoId));
				 /*benifit satart*/

				 $model->toatlExtraDutyPayment      = $this->M_crud_ayenal->findAllEmpHoursMin('emp_salary_benifit_manage', array('emp_id' =>$model->employee_id, 'month_year' => $monthYear, 'benifit_name' => "exDuty"), 'benifit_amount');
				 $model->toatlHeadship         		= $this->M_crud_ayenal->findAllEmpHoursMin('emp_salary_benifit_manage', array('emp_id' =>$model->employee_id, 'month_year' => $monthYear, 'benifit_name' => "header"), 'benifit_amount');
				 $model->toatlArrear         		= $this->M_crud_ayenal->findAllEmpHoursMin('emp_salary_benifit_manage', array('emp_id' =>$model->employee_id, 'month_year' => $monthYear, 'benifit_name' => "arrear"), 'benifit_amount');
				 $model->toatlOther         		= $this->M_crud_ayenal->findAllEmpHoursMin('emp_salary_benifit_manage', array('emp_id' =>$model->employee_id, 'month_year' => $monthYear, 'benifit_name' => "other"), 'benifit_amount');

				 /*benifit end*/

				 /*Deduction satart*/
				    $totalAbsenAmount                     = $this->M_crud_ayenal->findAll('month_wise_deduction_amount', array('emp_id' =>$model->employee_id,'payable_month' => $monthYear, 'deduction_reason' => "Absent"), 'id', 'desc');
			         $toatlAbsent  = 0;
					foreach($totalAbsenAmount as $va){
					 	if(!empty($va->monthly_payable_amount)) $toatlAbsent = $toatlAbsent + $va->monthly_payable_amount;
					 	$upAbdata['deduction_paid_amount']     = $va->monthly_payable_amount;
					 	$upAbdata['due_amount']      		   = 0;
					 	
					 	$this->db->update('month_wise_deduction_amount', $upAbdata, array('id' => $va->id,'deduction_reason' => "Absent",'payable_month' => $monthYear)); 
					 				     
					}

					$model->toatlAbsent            = $toatlAbsent;


				 

				 $totalTaxAmount                     = $this->M_crud_ayenal->findAll('month_wise_deduction_amount', array('emp_id' =>$model->employee_id,'payable_month' => $monthYear, 'deduction_reason' => "Tax"), 'id', 'desc');
			         $totalTax  = 0;
					foreach($totalTaxAmount as $vt){
					 	if(!empty($vt->monthly_payable_amount)) $totalTax = $totalTax + $vt->monthly_payable_amount;
					 	$upTaxdata['deduction_paid_amount']     = $vt->monthly_payable_amount;
					 	$upTaxdata['due_amount']      			= 0;
					 	
					 	$this->db->update('month_wise_deduction_amount', $upTaxdata, array('id' => $vt->id,'deduction_reason' => "Tax",'payable_month' => $monthYear)); 					 				     
					  
					}

					$model->toatlTax            = $totalTax;


				 

				   $totalRevenueAmount                     = $this->M_crud_ayenal->findAll('month_wise_deduction_amount', array('emp_id' =>$model->employee_id,'payable_month' => $monthYear, 'deduction_reason' => "Revenue Stamps"), 'id', 'desc');
			         $toatlRevenue  = 0;
					foreach($totalRevenueAmount as $vr){
					 	if(!empty($vr->monthly_payable_amount)) $toatlRevenue = $toatlRevenue + $vr->monthly_payable_amount;
					 	$upRedata['deduction_paid_amount']     = $vr->monthly_payable_amount;
					 	$upRedata['due_amount']      		   = 0;
					 	
					 	$this->db->update('month_wise_deduction_amount', $upRedata, array('id' => $vr->id,'deduction_reason' => "Revenue Stamps",'payable_month' => $monthYear)); 
					 
					}

					$model->toatlRevenue            = $toatlRevenue;


				    $totalAdvanceAmount             = $this->M_crud_ayenal->findAll('month_wise_deduction_amount', array('emp_id' =>$model->employee_id,'payable_month' => $monthYear, 'deduction_reason' => "Loan/Advance"), 'id', 'desc');
			         $toatlAdvance  = 0;
					foreach($totalAdvanceAmount as $vad){
					 	if(!empty($vad->monthly_payable_amount)) $toatlAdvance = $toatlAdvance + $vad->monthly_payable_amount;
					 	$upAddata['deduction_paid_amount']     = $vad->monthly_payable_amount;
					 	$upAddata['due_amount']      		   = 0;
					 	
					 	$this->db->update('month_wise_deduction_amount', $upAddata, array('id' => $vad->id,'deduction_reason' => "Loan/Advance",'payable_month' => $monthYear)); 
					 				     
					}


				$model->toatlAdvance          = $toatlAdvance;
				
				$totalOtherAmount             = $this->M_crud_ayenal->findAll('month_wise_deduction_amount', array('emp_id' =>$model->employee_id,'payable_month' => $monthYear, 'deduction_reason' => "other"), 'id', 'desc');
			         $toatlother  = 0;
					foreach($totalOtherAmount as $vot){
					 	if(!empty($vot->monthly_payable_amount)) $toatlother = $toatlother + $vot->monthly_payable_amount;
					 	$upOtdata['deduction_paid_amount']     = $vot->monthly_payable_amount;
					 	$upOtdata['due_amount']      		   = 0;
					 	
					 	$this->db->update('month_wise_deduction_amount', $upOtdata, array('id' => $vot->id,'deduction_reason' => "other",'payable_month' => $monthYear)); 
					 				     
					}

					$model->toatlother            = $toatlother;


				 /*Deduction end*/
				
			}
			return $List;
		}
		

		public function findAllSearchData($table, $where, $groupBy, $orderBy, $serialized)
		{
			$this->db->select('attendence_information.*, stu_basic_info.stu_full_name, class_wise_info.stu_id,class_roll');
			$this->db->from($table);
			$this->db->join('stu_basic_info', 'attendence_information.student_auto_id= stu_basic_info.id', 'left');
			$this->db->join('class_wise_info', 'attendence_information.student_auto_id= class_wise_info.stu_auto_id', 'left');
			$this->db->where($where);
			$this->db->group_by($groupBy);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}


		public function findAllStuAttnData($table, $where, $groupBy, $orderBy, $serialized, $fromMonthYear, $toMonthYear,$fromDate, $toDate, $lastAttenanceDate)
		{
			
			$List 		= $this->findAllSearchData($table, $where, $groupBy, $orderBy, $serialized);
			
			foreach($List as $model)
			{
				$model->stuWiseAllData  = $this->M_crud_ayenal->findAllStuWiseInfo($table, array("student_auto_id" => $model->student_auto_id, "month_year >=" => $fromMonthYear, "month_year <=" => $toMonthYear), 'month_year', 'asc', $fromDate, $toDate, $lastAttenanceDate);
				
			}
			return $List;
		}
		


        public function findAllEmpAttnData($table, $where, $groupBy, $orderBy, $serialized)
		{
			$this->db->select('employee_attendence_information.*, employee_basic_information.employee_full_name, employee_basic_information.employee_id');
			$this->db->from($table);
			$this->db->join('employee_basic_information', 'employee_attendence_information.employee_auto_id= employee_basic_information.id', 'left');
			$this->db->where($where);
			$this->db->group_by($groupBy);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}


		

		public function findAllEmpSearchAttnData($table, $where, $groupBy, $orderBy, $serialized, $fromMonthYear, $toMonthYear, $fromDate, $toDate, $lastAttenanceDate)
		{
			
			$List 		= $this->findAllEmpAttnData($table, $where, $groupBy, $orderBy, $serialized);
			
			foreach($List as $model)
			{
				$model->empWiseAllData  = $this->M_crud_ayenal->findAllEmpWiseInfo($table, array("employee_auto_id" => $model->employee_auto_id, "month_year >=" => $fromMonthYear, "month_year <=" => $toMonthYear), $orderBy, $serialized, $fromDate, $toDate, $lastAttenanceDate);
			
			}
			return $List;
		}
		


		

		public function findAllStudentInfo($table, $where, $orderBy, $serialized)
		{
			$this->db->select('class_wise_info.*, stu_basic_info.stu_full_name');
			$this->db->from($table);
			$this->db->join('stu_basic_info', 'class_wise_info.stu_auto_id= stu_basic_info.id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}

		public function findByStudentId($table, $where)
		{
			$this->db->select('class_wise_info.*, stu_basic_info.stu_full_name, branch_list_manage.branch_name');
			$this->db->from($table);
			$this->db->join('stu_basic_info', 'class_wise_info.stu_auto_id= stu_basic_info.id', 'left');
			$this->db->join('branch_list_manage', 'class_wise_info.branc_id= branch_list_manage.id', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}

		

		//This is Student Basic Info//
		public function findAllAttendenceInfo($table, $where, $monthYear, $branch_id, $orderBy, $serialized)
		{
			
			$List 		= $this->findAllStudentInfo($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{
				$attenInfo  = $this->M_crud_ayenal->findAllStudentPresentInfo('attendence_information', array("student_auto_id" => $model->stu_auto_id, "month_year" => $monthYear));

				
				if(!empty($attenInfo)) $model->day1 = $attenInfo->day1;
				if(!empty($attenInfo)) $model->day2 = $attenInfo->day2;
				if(!empty($attenInfo)) $model->day3 = $attenInfo->day3;
				if(!empty($attenInfo)) $model->day4 = $attenInfo->day4;
				if(!empty($attenInfo)) $model->day5 = $attenInfo->day5;
				if(!empty($attenInfo)) $model->day6 = $attenInfo->day6;
				if(!empty($attenInfo)) $model->day7 = $attenInfo->day7;
				if(!empty($attenInfo)) $model->day8 = $attenInfo->day8;
				if(!empty($attenInfo)) $model->day9 = $attenInfo->day9;
				if(!empty($attenInfo)) $model->day10 = $attenInfo->day10;
				if(!empty($attenInfo)) $model->day11 = $attenInfo->day11;
				if(!empty($attenInfo)) $model->day12 = $attenInfo->day12;
				if(!empty($attenInfo)) $model->day13 = $attenInfo->day13;
				if(!empty($attenInfo)) $model->day14 = $attenInfo->day14;
				if(!empty($attenInfo)) $model->day15 = $attenInfo->day15;
				if(!empty($attenInfo)) $model->day16 = $attenInfo->day16;
				if(!empty($attenInfo)) $model->day17 = $attenInfo->day17;
				if(!empty($attenInfo)) $model->day18 = $attenInfo->day18;
				if(!empty($attenInfo)) $model->day19 = $attenInfo->day19;
				if(!empty($attenInfo)) $model->day20 = $attenInfo->day20;
				if(!empty($attenInfo)) $model->day21 = $attenInfo->day21;
				if(!empty($attenInfo)) $model->day22 = $attenInfo->day22;
				if(!empty($attenInfo)) $model->day23 = $attenInfo->day23;
				if(!empty($attenInfo)) $model->day24 = $attenInfo->day24;
				if(!empty($attenInfo)) $model->day25 = $attenInfo->day25;
				if(!empty($attenInfo)) $model->day26 = $attenInfo->day26;
				if(!empty($attenInfo)) $model->day27 = $attenInfo->day27;
				if(!empty($attenInfo)) $model->day28 = $attenInfo->day28;
				if(!empty($attenInfo)) $model->day29 = $attenInfo->day29;
				if(!empty($attenInfo)) $model->day30 = $attenInfo->day30;
				if(!empty($attenInfo)) $model->day31 = $attenInfo->day31;

			}
			return $List;
		}



       //Find All Employee Attn Info//
		public function findAllEmpAttendenceInfo($table, $where, $monthYear, $branch_id, $orderBy, $serialized)
		{
			
			$List 		= $this->M_crud_ayenal->findAll($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{
				$attenInfo  = $this->M_crud_ayenal->findAllStudentPresentInfo('employee_attendence_information', array("employee_auto_id" => $model->id, "month_year" => $monthYear));

				
				if(!empty($attenInfo)) $model->day1 = $attenInfo->day1;
				if(!empty($attenInfo)) $model->day2 = $attenInfo->day2;
				if(!empty($attenInfo)) $model->day3 = $attenInfo->day3;
				if(!empty($attenInfo)) $model->day4 = $attenInfo->day4;
				if(!empty($attenInfo)) $model->day5 = $attenInfo->day5;
				if(!empty($attenInfo)) $model->day6 = $attenInfo->day6;
				if(!empty($attenInfo)) $model->day7 = $attenInfo->day7;
				if(!empty($attenInfo)) $model->day8 = $attenInfo->day8;
				if(!empty($attenInfo)) $model->day9 = $attenInfo->day9;
				if(!empty($attenInfo)) $model->day10 = $attenInfo->day10;
				if(!empty($attenInfo)) $model->day11 = $attenInfo->day11;
				if(!empty($attenInfo)) $model->day12 = $attenInfo->day12;
				if(!empty($attenInfo)) $model->day13 = $attenInfo->day13;
				if(!empty($attenInfo)) $model->day14 = $attenInfo->day14;
				if(!empty($attenInfo)) $model->day15 = $attenInfo->day15;
				if(!empty($attenInfo)) $model->day16 = $attenInfo->day16;
				if(!empty($attenInfo)) $model->day17 = $attenInfo->day17;
				if(!empty($attenInfo)) $model->day18 = $attenInfo->day18;
				if(!empty($attenInfo)) $model->day19 = $attenInfo->day19;
				if(!empty($attenInfo)) $model->day20 = $attenInfo->day20;
				if(!empty($attenInfo)) $model->day21 = $attenInfo->day21;
				if(!empty($attenInfo)) $model->day22 = $attenInfo->day22;
				if(!empty($attenInfo)) $model->day23 = $attenInfo->day23;
				if(!empty($attenInfo)) $model->day24 = $attenInfo->day24;
				if(!empty($attenInfo)) $model->day25 = $attenInfo->day25;
				if(!empty($attenInfo)) $model->day26 = $attenInfo->day26;
				if(!empty($attenInfo)) $model->day27 = $attenInfo->day27;
				if(!empty($attenInfo)) $model->day28 = $attenInfo->day28;
				if(!empty($attenInfo)) $model->day29 = $attenInfo->day29;
				if(!empty($attenInfo)) $model->day30 = $attenInfo->day30;
				if(!empty($attenInfo)) $model->day31 = $attenInfo->day31;
				$model->empLeaveInfo  = $this->M_crud_ayenal->findAll('emp_day_to_day_leave_manage_details', array("emp_id" => $model->id, "month_year" => $monthYear), 'id', 'asc');

			}
			return $List;
		}





		public function findAllEmpData($table, $where, $orderBy, $serialized)
		{
			$this->db->select('employee_basic_information.*, department_list_manage.department_name, designition_list_manage.designition_name, emp_branch_manage.branch_name, domain_list_manage.domain_name, zone_list_manage.zone_name, nationality_list_manage.nationality_name, religion_list_manage.religion_name, birth_place_list_manage.place_name, initiate_job_type.job_type_name');
			$this->db->from($table);
			$this->db->join('department_list_manage', 'employee_basic_information.department_id= department_list_manage.id', 'left');
			$this->db->join('designition_list_manage', 'employee_basic_information.designition_id= designition_list_manage.id', 'left');
			$this->db->join('emp_branch_manage', 'employee_basic_information.branch_id= emp_branch_manage.id', 'left');
			$this->db->join('domain_list_manage', 'employee_basic_information.domain_id= domain_list_manage.id', 'left');
			$this->db->join('zone_list_manage', 'employee_basic_information.zone_id= zone_list_manage.id', 'left');
			$this->db->join('nationality_list_manage', 'employee_basic_information.nationality= nationality_list_manage.id', 'left');
			$this->db->join('religion_list_manage', 'employee_basic_information.religion= religion_list_manage.id', 'left');
			$this->db->join('birth_place_list_manage', 'employee_basic_information.place_of_birth= birth_place_list_manage.id', 'left');
			$this->db->join('initiate_job_type', 'employee_basic_information.initiate_job_type= initiate_job_type.id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}


		public function findEmpSallaryCreateInfo($table, $where, $orderBy, $serialized, $monthYear)
		{
			
			$List 		= $this->findAllEmpData($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{
				$model->salaryDetails  = $this->M_crud_ayenal->findById('salary_and_allowance_information', array("employee_id" => $model->employee_id, "sallary_month" => $monthYear));
				$model->empPreSlaryDetails  = $this->M_crud_ayenal->findById('salary_and_allowance_information', array("employee_id" => $model->employee_id));
			}
			return $List;
		}

		public function findEmpBasicData($table, $where)
		{
			$this->db->select('employee_basic_information.*, department_list_manage.department_name, designition_list_manage.designition_name, emp_branch_manage.branch_name, domain_list_manage.domain_name, zone_list_manage.zone_name, nationality_list_manage.nationality_name, religion_list_manage.religion_name, birth_place_list_manage.place_name, initiate_job_type.job_type_name');
			$this->db->from($table);
			$this->db->join('department_list_manage', 'employee_basic_information.department_id= department_list_manage.id', 'left');
			$this->db->join('designition_list_manage', 'employee_basic_information.designition_id= designition_list_manage.id', 'left');
			$this->db->join('emp_branch_manage', 'employee_basic_information.branch_id= emp_branch_manage.id', 'left');
			$this->db->join('domain_list_manage', 'employee_basic_information.domain_id= domain_list_manage.id', 'left');
			$this->db->join('zone_list_manage', 'employee_basic_information.zone_id= zone_list_manage.id', 'left');
			$this->db->join('nationality_list_manage', 'employee_basic_information.nationality= nationality_list_manage.id', 'left');
			$this->db->join('religion_list_manage', 'employee_basic_information.religion= religion_list_manage.id', 'left');
			$this->db->join('birth_place_list_manage', 'employee_basic_information.place_of_birth= birth_place_list_manage.id', 'left');
			$this->db->join('initiate_job_type', 'employee_basic_information.initiate_job_type= initiate_job_type.id', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}

		public function findByEmpId($table, $where)
		{
			$this->db->select('employee_basic_information.*, designition_list_manage.designition_name, emp_branch_manage.branch_name, domain_list_manage.domain_name');
			$this->db->from($table);
			$this->db->join('designition_list_manage', 'employee_basic_information.designition_id= designition_list_manage.id', 'left');
			$this->db->join('emp_branch_manage', 'employee_basic_information.branch_id= emp_branch_manage.id', 'left');
			$this->db->join('domain_list_manage', 'employee_basic_information.domain_id= domain_list_manage.id', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}


		public function findAllEssentialData($table, $where)
		{
			$this->db->select('employee_essential_information.*, bank_list_manage.bank_name, bank_branch_list_manage.branch_name');
			$this->db->from($table);
			$this->db->join('bank_list_manage', 'employee_essential_information.bank_id= bank_list_manage.id', 'left');
			$this->db->join('bank_branch_list_manage', 'employee_essential_information.bank_branch_id= bank_branch_list_manage.id', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}


		public function findEmpAllLeave($table, $where, $orderBy, $serialized)
		{
			$this->db->select('emp_leave_manage.*, leave_type_manage.leave_type');
			$this->db->from($table);
			$this->db->join('leave_type_manage', 'emp_leave_manage.leave_type_id = leave_type_manage.id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function findEmpLeaveInfo($table, $where, $orderBy, $serialized)
		{
			
			$List 		= $this->findEmpAllLeave($table, $where, $orderBy, $serialized);
			
			foreach($List as $model)
			{
				$model->leaveDetails  = $this->M_crud_ayenal->findAll('emp_leave_manage_details', array("leave_type_id" => $model->leave_type_id, "emp_id" => $model->emp_id), 'id', 'asc');
			}
			return $List;
		}



		public function findAllHolydayInfo($table, $where, $orderBy, $serialized)
		{
			$this->db->select('holyday_setup.*, branch_list_manage.branch_name');
			$this->db->from($table);
			$this->db->join('branch_list_manage', 'holyday_setup.branch_id= branch_list_manage.id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}
		

		public function findAllEmpHolydayInfo($table, $where, $orderBy, $serialized)
		{
			$this->db->select('emp_holyday_setup.*, domain_list_manage.domain_name, emp_branch_manage.branch_name');
			$this->db->from($table);
			$this->db->join('emp_branch_manage', 'emp_holyday_setup.branch_id= emp_branch_manage.id', 'left');
			$this->db->join('domain_list_manage', 'emp_holyday_setup.domain_id= domain_list_manage.id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}



		public function findIssuStudentInfo($table, $where)
		{
			$this->db->select('class_wise_info.*, stu_basic_info.stu_full_name,stu_photo,stu_sex,class_list_manage.class_name, section_list_manage.section_name, group_list_manage.group_name, shift_list_manage.shift_name, branch_list_manage.branch_name');
			$this->db->from($table);
			$this->db->join('stu_basic_info', 'class_wise_info.stu_auto_id 				= stu_basic_info.id', 'left');
			$this->db->join('class_list_manage', 'class_wise_info.class_id 				= class_list_manage.id', 'left');
			$this->db->join('section_list_manage', 'class_wise_info.class_section_id 	= section_list_manage.id', 'left');
			$this->db->join('group_list_manage', 'class_wise_info.class_group_id  		= group_list_manage.id', 'left');
			$this->db->join('shift_list_manage', 'class_wise_info.class_shift_id  		= shift_list_manage.id', 'left');
			$this->db->join('branch_list_manage', 'class_wise_info.branc_id 	  		= branch_list_manage.id', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}

		
		
		
		// live chat start

		public function findAllSmsById($table, $sendTo, $sendFrom)
		{
			$this->db->select('live_chat.*, all_chat_user_registration.image');
			$this->db->from($table);
			$this->db->join('all_chat_user_registration', 'live_chat.send_from = all_chat_user_registration.id', 'left');
			$where ="(send_to =$sendTo AND send_from=$sendFrom) OR (send_to =$sendFrom AND send_from=$sendTo)";
			$this->db->where($where);
			$this->db->order_by("live_chat.id", "desc");
			$this->db->limit(20, 0);
			$query = $this->db->get();
			return $query->result();
		}

		public function getAllSmsById($table, $sendFrom, $sendTo)
		{
			$this->db->select('live_chat.*, all_chat_user_registration.image');
			$this->db->from($table);
			$this->db->join('all_chat_user_registration', 'live_chat.send_from = all_chat_user_registration.id', 'left');
			$where ="(send_to =$sendTo AND send_from=$sendFrom) OR (send_to =$sendFrom AND send_from=$sendTo)";
			$this->db->where($where);
			$this->db->order_by("live_chat.id", "desc");
			$this->db->limit(20, 0);
			$query = $this->db->get();
			return $query->result();
		}



		public function findAllPurchaseInfo($table, $where, $onset, $orderBy, $serialized)
		{
			$this->db->select('purchase.*, vendor.name,item_manage.item_name, current_stock');
			$this->db->from($table);
			$this->db->join('vendor', 'purchase.vendor_id = vendor.id', 'left');
			$this->db->join('item_manage', 'purchase.item_id =  item_manage.id', 'left');
			$this->db->where($where);
			$this->db->limit(10, $onset); 
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}

		public function findAllPurchaseSearchInfo($table, $where, $orderBy, $serialized)
		{
			$this->db->select('purchase.*, vendor.name,item_manage.item_name, current_stock');
			$this->db->from($table);
			$this->db->join('vendor', 'purchase.vendor_id = vendor.id', 'left');
			$this->db->join('item_manage', 'purchase.item_id =  item_manage.id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}


		public function countAll($table, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);			
			return $this->db->count_all_results();
		}



		public function findAllRequiInfo($table, $where, $orderBy, $serialized)
		{
			$this->db->select('requisition_create.*, reg_department.depart_name');
			$this->db->from($table);
			$this->db->join('reg_department', 'requisition_create.department_id = reg_department.id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}


        public function findAllRequisition($table, $where, $orderBy, $serialized)
		{
			$this->db->select('req_item_manage.*, item_manage.id as itemId, item_manage.item_name, current_stock');
			$this->db->from($table);
			$this->db->join('item_manage', 'req_item_manage.item_id = item_manage.id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}

		public function findAllRequisitionData($table, $where, $orderBy, $serialized)
		{
			$allData   = $this->findAllRequisition($table, $where, $orderBy, $serialized);

			foreach($allData as $v){
				$v->allItemQty  = $this->M_crud_ayenal->calCulateSum('req_item_manage', array('item_id' =>$v->item_id), 'item_qnty');
			}

			return $allData;
		}

		public function findAllReqDelvery($table, $where, $groupBy, $orderBy, $serialized)
		{
			$this->db->select('req_item_manage.*, item_manage.item_name, current_stock');
			$this->db->from($table);
			$this->db->join('item_manage', 'req_item_manage.item_id = item_manage.id', 'left');
			$this->db->where($where);
			$this->db->group_by($groupBy);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}

		public function findAllReqDelveryData($table, $where, $groupBy, $orderBy, $serialized)
		{
			$allData   = $this->findAllReqDelvery($table, $where, $groupBy, $orderBy, $serialized);

			foreach($allData as $v){
				$v->allItemQty  = $this->M_crud_ayenal->calCulateSum('req_item_manage', array('item_id' =>$v->item_id), 'item_qnty');
				$allItemQty  = $this->M_crud_ayenal->findById('req_item_manage', array('item_id' =>$v->item_id));
				if(!empty($allItemQty))  $v->qnty = $allItemQty->item_qnty; 
			}

			return $allData;
		}




		public function findAllRequisitionDepInfo($table, $where)
		{
			$this->db->select('requisition_create.*, reg_department.depart_name');
			$this->db->from($table);
			$this->db->join('reg_department', 'requisition_create.department_id = reg_department.id', 'left');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}


		public function findAllReqItemInfo($table, $where, $orderBy, $serialized)
		{
			$this->db->select('req_item_manage.*, item_manage.item_name, item_code, price');
			$this->db->from($table);
			$this->db->join('item_manage', 'req_item_manage.item_id = item_manage.id', 'left');
			$this->db->where($where);
			$this->db->order_by($orderBy, $serialized);
			$query = $this->db->get();
			return $query->result();
		}





		
		
	

		



	}
?>