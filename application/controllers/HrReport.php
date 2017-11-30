<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HrReport extends CI_Controller {

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
		isAuthenticate();
	}
	
	
	public function index()
	{

		$data['title'] = 'VMGPS&#65515;HR Report';
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
		
		
		$this->load->view('employeeInfo/hrReportSubModulePage', $data);
	}


	public function empLeaveReport()
	{
		$data['title'] = 'VMGPS&#65515;Employee Leave Report';
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

		$data['domainListInfo'] 		=  $this->M_crud->findAll('domain_list_manage', $where, $orderBy, $serialized);
		
		
		$this->load->view('leaveInfo/employeeLeaveReportPage', $data);
	}

	public function allEmpLeaveReportList()

	{	

		
		  $data['title'] = 'VMGPS&#65515;Employee Leave Report List';
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
		  $data['domain_id'] 			= $this->input->post('domain_id');	
		  $data['designition_id'] 		= $this->input->post('designition_id');	

		   if(!empty($data['domain_id']) || !empty($data['designition_id'])){
		   	  if(!empty($data['domain_id']))        $where2['employee_basic_information.domain_id'] 		= $data['domain_id'];
		   	  if(!empty($data['designition_id']))   $where2['employee_basic_information.designition_id'] 	= $data['designition_id'];

		   	  $data['allEmpInfo']   	= $this->M_join_ayenal->findAllEmpData('employee_basic_information', $where2 , $orderBy, $serialized);
		   }
		  
		  $data['desigListInfo'] 		=  $this->M_crud->findAll('designition_list_manage', array('domain_id' => $data['domain_id']), $orderBy, $serialized);
		  $data['domainListInfo'] 		=  $this->M_crud->findAll('domain_list_manage', $where, $orderBy, $serialized);
		  $this->load->view('leaveInfo/allEmpLeaveReportListPage', $data);


	}

	public function empWiseLeaveReport()

	{	
		  $orderBy = 'id';
		  $groupBy = 'month_year';
		  $serialized = 'asc';
		  $empId 				         = $this->input->post('empId');	
		  $data['fromDate'] 			 = $this->input->post('fromDate');	
		  $data['toDate'] 				 = $this->input->post('toDate');	
		  
		  $where 						 = array('leave_date >=' =>$data['fromDate'], 'leave_date <=' =>$data['toDate'],'emp_id <=' =>$empId);
		  $data['empInfo'] 				 =  $this->M_crud->findById('employee_basic_information', array('employee_id' => $empId));
		  $data['empWiseLeaveResutInfo'] =  $this->M_crud_ayenal->findAllEmpWiseLeaveInfo('emp_leave_manage', array('emp_id' =>$data['empInfo']->id), $data['fromDate'], $data['toDate'], $orderBy, $serialized);
		  
		  		
		  $this->load->view('leaveInfo/empWiseLeaveReportViewPage', $data);
	}




	public function empInformationReport()
	{
		$data['title'] = 'VMGPS&#65515;HR Information Report';
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

		$data['domainListInfo'] 		=  $this->M_crud->findAll('domain_list_manage', $where, $orderBy, $serialized);
		
		
		$this->load->view('employeeInfo/empInformationReportPage', $data);
	}
	
	

    


    public function domainWiseEmployee()
	{

	   $orderBy = 'employee_basic_information.id';
	   $serialized = 'asc';
	   $domain_id    					=  $this->input->post('domain_id');	
	   $department_id    				=  $this->input->post('department_id');	
	   $designition_id    			    =  $this->input->post('designition_id');	

	   if(!empty($domain_id) || !empty($department_id) || !empty($designition_id)){
	   	  if(!empty($domain_id))        $where['employee_basic_information.domain_id'] = $domain_id;
	   	  if(!empty($department_id))    $where['employee_basic_information.department_id'] = $department_id;
	   	  if(!empty($designition_id))   $where['employee_basic_information.designition_id'] = $designition_id;

	   	  $data['domainWiseReportData']   	= $this->M_join_ayenal->findAllEmpData('employee_basic_information', $where , $orderBy, $serialized);
	   }

	   

	   $this->load->view('employeeInfo/empInfoReportViewPage', $data);
	  
		
	}


	public function empWiseReportDetails()
	{

	   $orderBy 						= 'employee_basic_information.id';
	   $serialized 						= 'asc';
	   $empId    						=  $this->input->post('empID');	

       $empinfo   						= $this->M_crud_ayenal->findById('employee_basic_information', array('employee_id' => $empId));  

       $data['empBasicReportData']   	= $this->M_join_ayenal->findEmpBasicData('employee_basic_information', array('employee_basic_information.id' => $empinfo->id));
       $data['empEssentialReportData']  = $this->M_join_ayenal->findAllEssentialData('employee_essential_information', array('employee_essential_information.emp_auto_id' =>$empinfo->id));
	   

	   $this->load->view('employeeInfo/empBasicEssenInfoReportViewPage', $data);
	  
		
	}



    public function empAttendanceReport()
	{
		$data['title'] = 'VMGPS&#65515;HR Employee Attendence  Report';
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

		$data['domainListInfo'] 		=  $this->M_crud->findAll('domain_list_manage', $where, $orderBy, $serialized);
		
		
		$this->load->view('empAttendance/empAttendenceReportPage', $data);
	}





	public function empAttendenceReportAction()
	{
		$data['title'] = 'VMGPS&#65515;Employee Attendence Report';
		
		
		$where = array();
		$orderBy = 'id';
		$searchOrderBy = 'employee_attendence_information.id';
		$serialized = 'asc';
		$groupBy = 'employee_auto_id';
		
		$authorID   	= $this->session->userid;
		$authorType 	= $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

		$data['empID']					= $this->input->get('empID');
		$data['domain_id']				= $this->input->get('domain_id');
		$data['branch_id']				= $this->input->get('branch_id');
		$data['designition_id']			= $this->input->get('designition_id');
		$data['fromDate']				= $this->input->get('fromDate');
		$data['toDate']					= $this->input->get('toDate');

        if(!empty($data['empID'])){
         	$wheresEm = array('employee_id' => $data['empID']);

         	$data['empDetails']   = $this->M_join_ayenal->findByEmpId('employee_basic_information', $wheresEm);
        } else {
            
            $whereEmp = array();
            
	        if(!empty($data['domain_id']) || !empty($data['branch_id']) || !empty($data['designition_id']) ){

		        if(!empty($data['domain_id']))  		$whereEmp['domain_id'] 		= $data['domain_id'];
		        if(!empty($data['branch_id']))  		$whereEmp['branch_id'] 		= $data['branch_id'];
		        if(!empty($data['designition_id']))  	$whereEmp['designition_id'] = $data['designition_id'];

	        }

           $data['allEmpInfo']    =  $this->M_crud_ayenal->findAll('employee_basic_information', $whereEmp, 'id', 'asc');


        }

		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		
		$data['domainListInfo'] 		=  $this->M_crud->findAll('domain_list_manage', $where, $orderBy, $serialized);
		$data['empBranchList'] 			=  $this->M_crud->findAll('emp_branch_manage', array('domain_id' => $data['domain_id']), $orderBy, $serialized);
		$data['designitionListInfo'] 	=  $this->M_crud->findAll('designition_list_manage', array('domain_id' => $data['domain_id']), $orderBy, $serialized);
		$data['domainName'] 			=  $this->M_crud_ayenal->findById('domain_list_manage', array('id' => $data['domain_id']));
		$data['empBranchName'] 			=  $this->M_crud_ayenal->findById('emp_branch_manage', array('id' => $data['branch_id']));
		$data['designitionName'] 		=  $this->M_crud_ayenal->findById('designition_list_manage', array('id' => $data['designition_id']));


		$this->load->view('empAttendance/empAttendenceReportResultPage', $data);
	}



	public function trainingReport()
	{
		$data['title'] = 'VMGPS&#65515;HR Employee Attendence  Report';
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

		$data['domainListInfo'] 		=  $this->M_crud->findAll('domain_list_manage', $where, $orderBy, $serialized);
		
		
		$this->load->view('empAttendance/trainingReportPage', $data);
	}


	public function trainingReportAction()
	{
		$data['title'] = 'VMGPS&#65515;Employee Attendence Report';
		
		
		$where = array();
		$orderBy = 'id';
		$searchOrderBy = 'employee_attendence_information.id';
		$serialized = 'asc';
		$groupBy = 'employee_auto_id';
		
		$authorID   	= $this->session->userid;
		$authorType 	= $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

		$data['empID']					= $this->input->get('empID');
		$data['domain_id']				= $this->input->get('domain_id');
		$data['branch_id']				= $this->input->get('branch_id');
		$data['designition_id']			= $this->input->get('designition_id');
		$data['fromDate']				= $this->input->get('fromDate');
		$data['toDate']					= $this->input->get('toDate');

        if(!empty($data['empID'])){
         	$wheresEm = array('employee_id' => $data['empID']);
         	$data['empDetails']   = $this->M_join_ayenal->findByEmpId('employee_basic_information', $wheresEm); 
         	$data['chkEmp']       = $this->M_crud_ayenal->findById('employee_attendence_information', array('emp_auto_id' => $data['empDetails']->id, 'date >=' => $data['fromDate'], 'date <=' => $data['toDate'], 'action' => "training"));

        } else {
            
            $whereEmp = array('date >=' => $data['fromDate'], 'date <=' => $data['toDate'], 'action' => "training");
            
	        if(!empty($data['domain_id']) || !empty($data['branch_id']) || !empty($data['designition_id']) ){

		        if(!empty($data['domain_id']))  		$whereEmp['domain_id'] 		= $data['domain_id'];
		        if(!empty($data['branch_id']))  		$whereEmp['branch_id'] 		= $data['branch_id'];
		        if(!empty($data['designition_id']))  	$whereEmp['designition_id'] = $data['designition_id'];


	        }

           $data['allEmpInfo']    =  $this->M_crud_ayenal->findAllGroup('employee_attendence_information', $whereEmp, 'id', 'asc', 'emp_auto_id');


        }

		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		
		

		$this->load->view('empAttendance/trainingReportActionPage', $data);
	}







	public function salaryReport()
	{
		$data['title'] = 'VMGPS&#65515;Employee Leave Report';
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

		$data['domainListInfo'] 		=  $this->M_crud->findAll('domain_list_manage', $where, $orderBy, $serialized);
		
		
		$this->load->view('salaryInfo/salaryReportPage', $data);
	}

	public function empSalarySalaryReport()
	{
		$data['title'] = 'VMGPS&#65515;Employee Leave Report';
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

		$empID							= $this->input->post('empID');
		$data['domain_id']				= $this->input->post('domain_id');
		$data['branch_id']				= $this->input->post('branch_id');
		$data['designition_id']			= $this->input->post('designition_id');
		$data['salaryMonth']		    = $this->input->post('salaryMonth');
       
        if(!empty($data['salaryMonth'])){
			$pieces = explode("-", $data['salaryMonth']);
			$data['findYear']  = $pieces[0]; // piece1
			$data['findMonth'] = $pieces[1]; // piece2
			$data['monthYear'] = $data['findYear']."-".$data['findMonth'];
			$data['numberOfDay'] =  date("t",mktime(0,0,0,$data['findMonth'],1,$data['findYear']));
        }

		if(!empty($empID)){
			 $data['empID']               	= $empID;
			 $data['empDetails']          	= $this->M_crud_ayenal->findById('employee_basic_information', array('employee_id' =>$data['empID'])); 
			 $data['empBankDetails']        = $this->M_crud_ayenal->findById('employee_essential_information', array('emp_auto_id' =>$data['empDetails']->id)); 
			 $data['empSalarySheet']      	= $this->M_join_ayenal->findOneEmpDetails('salary_and_allowance_information', array('salary_and_allowance_information.employee_id' =>$data['empID'], 'sallary_month' => $data['monthYear']));
			 $data['v']  = $this->M_crud_ayenal->findById('employee_attendence_information', array('employee_auto_id' =>$data['empDetails']->id, 'month_year' => $data['monthYear']));
			 $data['countAllCustom']  		= $this->M_crud_ayenal->countAll('emp_holyday_setup', array('branch_id' =>$data['empDetails']->branch_id, 'month_year' => $data['monthYear']));
			 $data['countAllLeave']  		= $this->M_crud_ayenal->countAll('emp_day_to_day_leave_manage_details', array('emp_id' =>$data['empDetails']->id, 'month_year' => $data['monthYear']));
			 /*benifit start*/
			 $data['toatlExtraDutyPayment'] = $this->M_crud_ayenal->findAllEmpHoursMin('emp_salary_benifit_manage', array('emp_id' =>$data['empID'], 'month_year' => $data['monthYear'], 'benifit_name' => "exDuty"), 'benifit_amount');
			 $data['toatlHeadship'] 		= $this->M_crud_ayenal->findAllEmpHoursMin('emp_salary_benifit_manage', array('emp_id' =>$data['empID'], 'month_year' => $data['monthYear'], 'benifit_name' => "header"), 'benifit_amount');
			 $data['toatlArrear'] 			= $this->M_crud_ayenal->findAllEmpHoursMin('emp_salary_benifit_manage', array('emp_id' =>$data['empID'], 'month_year' => $data['monthYear'], 'benifit_name' => "arrear"), 'benifit_amount');
			 $data['toatlOther'] 			= $this->M_crud_ayenal->findAllEmpHoursMin('emp_salary_benifit_manage', array('emp_id' =>$data['empID'], 'month_year' => $data['monthYear'], 'benifit_name' => "other"), 'benifit_amount');
			  /*benifit end*/
			  /*Deduction start*/
			 $data['toatlAbsent'] 			= $this->M_crud_ayenal->findAllEmpHoursMin('emp_deduction_manage', array('emp_id' =>$data['empID'], 'deduction_month <=' => $data['monthYear'], 'deduction_reason' => "Absent"), 'payable_amount');
			 $data['toatlTax'] 			= $this->M_crud_ayenal->findAllEmpHoursMin('emp_deduction_manage', array('emp_id' =>$data['empID'], 'deduction_month <=' => $data['monthYear'], 'deduction_reason' => "Tax"), 'payable_amount');
			 $data['toatlRevenue'] 			= $this->M_crud_ayenal->findAllEmpHoursMin('emp_deduction_manage', array('emp_id' =>$data['empID'], 'deduction_month <=' => $data['monthYear'], 'deduction_reason' => "Revenue Stamps"), 'payable_amount');
			 $data['toatlAdvance'] 			= $this->M_crud_ayenal->findAllEmpHoursMin('emp_deduction_manage', array('emp_id' =>$data['empID'], 'deduction_month <=' => $data['monthYear'], 'deduction_reason' => "Loan/Advance"), 'payable_amount');
			 $data['toatlother'] 			= $this->M_crud_ayenal->findAllEmpHoursMin('emp_deduction_manage', array('emp_id' =>$data['empID'], 'deduction_month <=' => $data['monthYear'], 'deduction_reason' => "other"), 'payable_amount');


			   /*Deduction end*/

			 
			 

		} else {

			if(!empty($data['domain_id']) || empty($data['branch_id']) || !empty($data['designition_id']) || !empty($data['salaryMonth'])){
		   	  if(!empty($data['domain_id']))        $where2['salary_and_allowance_information.domain_id'] 		= $data['domain_id'];
		   	  if(!empty($data['branch_id']))   		$where2['salary_and_allowance_information.branch_id'] 		= $data['branch_id'];
		   	  if(!empty($data['designition_id']))   $where2['salary_and_allowance_information.designition_id'] 	= $data['designition_id'];
		   	  if(!empty($data['salaryMonth']))      $where2['salary_and_allowance_information.sallary_month'] 	= $data['monthYear'];

		   	  $data['allEmpSalarySheetInfo']   	    = $this->M_join_ayenal->employeeSalarySheet('salary_and_allowance_information', $where2 , 'salary_and_allowance_information.id', $serialized, $data['monthYear']);
		   }

		}

		$data['domainListInfo'] 		=  $this->M_crud->findAll('domain_list_manage', $where, $orderBy, $serialized);

		$data['empBranchList'] 			=  $this->M_crud->findAll('emp_branch_manage', array('domain_id' => $data['domain_id']), $orderBy, $serialized);
		$data['designitionListInfo'] 	=  $this->M_crud->findAll('designition_list_manage', array('domain_id' => $data['domain_id']), $orderBy, $serialized);
		
		
		$this->load->view('salaryInfo/salaryReportResultPage', $data);
	}










	
	
	
}


