<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class SalaryManageSystem extends CI_Controller {

	static $model 	 = array('M_admin', 'M_crud_ayenal', 'M_join_ayenal','M_crud', 'M_join');
	static $helper   = array('url', 'authentication');

	const  Title	 = 'VMGPS&#65515; Salary Manage';

	public function __construct(){

		parent::__construct();

		$this->load->database();

		$this->load->model(self::$model);

		$this->load->helper(self::$helper);

		$this->load->library('upload');

		$this->load->library('session');
		
		isAuthenticate();

	}

	

	

	public function index()

	{	

		
		$data['title'] = 'VMGPS&#65515;Employee Salary Managment';
		$where = array();	
		$orderBy = 'id';
		$serialized = 'desc';

		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		

		$this->load->view('salaryInfo/salaryManageSubModulePage', $data);

		
	}


	public function salaryAndAllowance()

	{	

		
		$data['title'] = 'VMGPS&#65515;Employee Salary & Allowance';
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
		

		$this->load->view('salaryInfo/salaryAndAllowancePage', $data);

		
	}


	public function empSalaryForm()

	{	

		
		$data['title'] = 'VMGPS&#65515;Employee Salary & Allowance';
		$where = array();	
		$orderBy = 'id';
		$serialized = 'asc';

		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

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
        }

		if(!empty($empID)){
			 $data['empID']             = $empID;
			 $data['emppreSalary']      = $this->M_crud_ayenal->findById('salary_and_allowance_information', array('employee_id' =>$data['empID'], 'sallary_month' => $data['monthYear']));
			 $data['empSalary']      	= $this->M_crud_ayenal->findById('salary_and_allowance_information', array('employee_id' =>$data['empID']));
			 $data['empDetails']        = $this->M_crud_ayenal->findById('employee_basic_information', array('employee_id' =>$data['empID'])); 

		} else {

			if(!empty($data['domain_id']) || $data['branch_id'] || !empty($data['designition_id'])){
		   	  if(!empty($data['domain_id']))        $where2['employee_basic_information.domain_id'] 		= $data['domain_id'];
		   	  if(!empty($data['branch_id']))   		$where2['employee_basic_information.branch_id'] 		= $data['branch_id'];
		   	  if(!empty($data['designition_id']))   $where2['employee_basic_information.designition_id'] 	= $data['designition_id'];

		   	  $data['allEmpInfo']   				= $this->M_join_ayenal->findEmpSallaryCreateInfo('employee_basic_information', $where2 , $orderBy, $serialized, $data['monthYear']);
		   }

		}


		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		$data['domainListInfo'] 		=  $this->M_crud->findAll('domain_list_manage', $where, $orderBy, $serialized);

		$data['empBranchList'] 			=  $this->M_crud->findAll('emp_branch_manage', array('domain_id' => $data['domain_id']), $orderBy, $serialized);
		$data['designitionListInfo'] 	=  $this->M_crud->findAll('designition_list_manage', array('domain_id' => $data['domain_id']), $orderBy, $serialized);


		

		$this->load->view('salaryInfo/empSalaryFormPage', $data);

		
	}

	
   	public function empWiseSalaryAllowanceAction()
	{	
        $salary_auto_id		    		= $this->input->post('salary_auto_id');
        $data['employee_id']		    = $this->input->post('employee_id');
        $empDetails        				= $this->M_crud_ayenal->findById('employee_basic_information', array('employee_id' =>$data['employee_id'])); 
        $data['domain_id']				= $empDetails->domain_id;
		$data['branch_id']				= $empDetails->branch_id;
		$data['designition_id']			= $empDetails->designition_id;
		$data['sallary']		    	= $this->input->post('sallary');  
		$data['basic']		    		= $this->input->post('basic');  
		$data['house_rent']		    	= $this->input->post('house_rent');  
		$data['profident_fund']		    = $this->input->post('profident_fund');  
		$data['special_allowance']		= $this->input->post('special_allowance');  
		$data['income_tax']		    	= $this->input->post('income_tax');  
		$data['ta']		    			= $this->input->post('ta');  
		$data['group_insurance']		= $this->input->post('group_insurance');  
		$data['medical_allowance']		= $this->input->post('medical_allowance');  
		$data['overtime_applicable']	= $this->input->post('overtime_applicable');  
		$data['bonus_applicable']		= $this->input->post('bonus_applicable');  
		$data['da']		    			= $this->input->post('da');  
		$data['c_found']		    	= $this->input->post('c_found');  
		$data['food_allowance']		    = $this->input->post('food_allowance');  
		$data['cash_bank']		    	= $this->input->post('cash_bank');  
		$data['mobile_allowance']		= $this->input->post('mobile_allowance');  
		$data['increment_date']		    = $this->input->post('increment_date');  
		$data['bonus_applicable']		= $this->input->post('bonus_applicable');  
		$data['overtime_applicable']	= $this->input->post('overtime_applicable');  
		$data['security_amount']		= $this->input->post('security_amount');  
		$data['phone_allowance']		= $this->input->post('phone_allowance');  
		$data['total_salary']		    = $this->input->post('total_salary');  
		$data['sallary_month']		    = $this->input->post('sallary_month'); 
		$data['salary_create_date']		= date('Y-m-d'); 

		
		if(!empty($salary_auto_id)){
		  $this->M_crud_ayenal->update('salary_and_allowance_information', $data, array('id' => $salary_auto_id));  
		} else {
		  if($data['sallary'] !=''){
		    $this->M_crud_ayenal->save('salary_and_allowance_information', $data);  
		  }

		}
	}



    public function empWiseSallaryUpdateForm()

	{	

		
		$data['title'] = 'VMGPS&#65515;Employee Salary & Allowance';
		$where = array();	
		$orderBy = 'id';
		$serialized = 'asc';

		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

		$data['empId']					= $this->input->post('empId');
		$data['domain_id']				= $this->input->post('domain_id');
		$data['branch_id']				= $this->input->post('branch_id');
		$data['designition_id']			= $this->input->post('designition_id');
		$data['salaryMonth']		    = $this->input->post('salaryMonth');

		if(!empty($data['salaryMonth'])){
			$pieces = explode("-", $data['salaryMonth']);
			$data['findYear']  = $pieces[0]; // piece1
			$data['findMonth'] = $pieces[1]; // piece2
			$data['monthYear'] = $data['findYear']."-".$data['findMonth'];
        }

         $data['emppreSalary'] = $this->M_crud_ayenal->findById('salary_and_allowance_information', array('employee_id' =>$data['empId'], 'sallary_month' => $data['monthYear']));

		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		$this->load->view('salaryInfo/empWiseSallaryManageFormPage', $data);

		
	}



	public function addBenifit()

	{	

		
		$data['title'] = 'VMGPS&#65515;Employee Add Benifit';
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
		

		$this->load->view('salaryInfo/addBenifitPage', $data);

		
	}



	public function empBenifitForm()

	{	

		
		$data['title'] = 'VMGPS&#65515;Employee Benifit';
		$where = array();	
		$orderBy = 'id';
		$serialized = 'asc';

		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

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
        }


		if(!empty($empID)){
			 $data['empID']             = $empID;
			 $data['empDetails']        = $this->M_crud_ayenal->findById('employee_basic_information', array('employee_id' =>$data['empID'])); 
			 $data['empAllBenifitDetails']        = $this->M_crud_ayenal->findAll('emp_salary_benifit_manage', array('emp_id' =>$data['empID']), $orderBy, 'desc'); 

		} else {

			if(!empty($data['domain_id']) || $data['branch_id'] || !empty($data['designition_id'])){
		   	  if(!empty($data['domain_id']))        $where2['employee_basic_information.domain_id']         = $data['domain_id'];
		   	  if(!empty($data['branch_id']))   		$where2['employee_basic_information.branch_id'] 		= $data['branch_id'];
		   	  if(!empty($data['designition_id']))   $where2['employee_basic_information.designition_id'] 	= $data['designition_id'];

		   	  $data['allEmpInfo']   				= $this->M_join_ayenal->findAllEmpData('employee_basic_information', $where2 , $orderBy, $serialized);
		   }

		}


		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		$data['domainListInfo'] 		=  $this->M_crud->findAll('domain_list_manage', $where, $orderBy, $serialized);

		$data['empBranchList'] 			=  $this->M_crud->findAll('emp_branch_manage', array('domain_id' => $data['domain_id']), $orderBy, $serialized);
		$data['designitionListInfo'] 	=  $this->M_crud->findAll('designition_list_manage', array('domain_id' => $data['domain_id']), $orderBy, $serialized);


		$this->load->view('salaryInfo/empBenifitFormPage', $data);

		
	}


	public function empWiseBenifitAction()
	{

        $edit_id		    			= $this->input->post('edit_id');
        $data['emp_id']		    		= $this->input->post('empId');
        $empDetails        				= $this->M_crud_ayenal->findById('employee_basic_information', array('employee_id' =>$data['emp_id'])); 
        $data['domain_id']				= $empDetails->domain_id;
		$data['branch_id']				= $empDetails->branch_id;
		$data['designition_id']			= $empDetails->designition_id;
		$data['benifit_name']		    = $this->input->post('benifit_name');  
		$data['benifit_amount']		    = $this->input->post('benifit_amount');  
		$data['description']		    = $this->input->post('description');  
		$data['month_year']		    	= $this->input->post('monthYear');
		$data['benifit_entry_date']		= date('Y-m-d');  	
		
		if(!empty($edit_id)){
		  if($data['benifit_name'] !=""){
		   $this->M_crud_ayenal->update('emp_salary_benifit_manage', $data, array('id' => $edit_id));  
		  }
		} else {
         if($data['benifit_name'] !=""){
		   $this->M_crud_ayenal->save('emp_salary_benifit_manage', $data);  
         }
		}

		$this->empWiseBenifitList_($data['emp_id']);	
	}

	public function empWiseBenifitList_($empId)
	{
		$data['empAllBenifitDetails']        = $this->M_crud_ayenal->findAll('emp_salary_benifit_manage', array('emp_id' =>$empId), 'id', 'desc'); 
		$this->load->view('salaryInfo/empWiseBenifitListPage', $data);
	}

	public function empBenifitAction()
	{

        $edit_id		    			= $this->input->post('edit_id');
        $data['emp_id']		    		= $this->input->post('empId');
        $empDetails        				= $this->M_crud_ayenal->findById('employee_basic_information', array('employee_id' =>$data['emp_id'])); 
        $data['domain_id']				= $empDetails->domain_id;
		$data['branch_id']				= $empDetails->branch_id;
		$data['designition_id']			= $empDetails->designition_id;
		$data['benifit_name']		    = $this->input->post('benifit_name');  
		$data['benifit_amount']		    = $this->input->post('benifit_amount');  
		$data['description']		    = $this->input->post('description');  
		$data['month_year']		    	= $this->input->post('monthYear');
		$data['benifit_entry_date']		= date('Y-m-d');  	
		
		if(!empty($edit_id)){
		  if($data['benifit_name'] !=""){
		   $this->M_crud_ayenal->update('emp_salary_benifit_manage', $data, array('id' => $edit_id));  
		  }
		} else {
         if($data['benifit_name'] !=""){
		   $this->M_crud_ayenal->save('emp_salary_benifit_manage', $data);  
         }
		}

		$this->empBenifitList_($data['emp_id']);	
	}

	public function empBenifitList_($empId)
	{
		$data['empAllBenifitDetails']        = $this->M_crud_ayenal->findAll('emp_salary_benifit_manage', array('emp_id' =>$empId), 'id', 'desc'); 
		$this->load->view('salaryInfo/empBenifitListPage', $data);
	}



	public function empBenifitEdit()
	{
		$id 				= $this->input->post('id');		
		$benifitEditInfo 	= $this->M_crud_ayenal->findById('emp_salary_benifit_manage', array('id' => $id));
				
		echo json_encode($benifitEditInfo);
	}

	

	public function empWiseBenifitDelete()
	{

		$id 				= $this->input->post('id');		
		$emp_id 			= $this->input->post('emp_id');	
		if($id !='' && $emp_id !=''){
			$benifitEditInfo 	= $this->M_crud_ayenal->destroy('emp_salary_benifit_manage', array('id' => $id));
	        $this->empWiseBenifitList_($emp_id);		
		}	
		   
		
	}

	public function empBenifitDelete()
	{

		$id 				= $this->input->post('id');		
		$emp_id 			= $this->input->post('emp_id');	
		if($id !='' && $emp_id !=''){
			$benifitEditInfo 	= $this->M_crud_ayenal->destroy('emp_salary_benifit_manage', array('id' => $id));
	        $this->empBenifitList_($emp_id);		
		}	
		   
		
	}



	public function empWiseBenifitManageForm()

	{	

		
		$data['title'] = 'VMGPS&#65515;Employee Benifit';
		$where = array();	
		$orderBy = 'id';
		$serialized = 'asc';

		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

		$data['empId']				    = $this->input->post('empId');
		$data['salaryMonth']		    = $this->input->post('salaryMonth');

		if(!empty($data['salaryMonth'])){
			$pieces = explode("-", $data['salaryMonth']);
			$data['findYear']  = $pieces[0]; // piece1
			$data['findMonth'] = $pieces[1]; // piece2
			$data['monthYear'] = $data['findYear']."-".$data['findMonth'];
        }

		$data['empAllBenifitDetails']   = $this->M_crud_ayenal->findAll('emp_salary_benifit_manage', array('emp_id' =>$data['empId']), $orderBy, 'desc'); 
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		$this->load->view('salaryInfo/empWiseBenifitManageFormPage', $data);

		
	}



	public function advanceAndDeductions()

	{	

		
		$data['title'] = 'VMGPS&#65515;Employee Advance & Deduction';
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
		

		$this->load->view('salaryInfo/advanceAndDeductionsPage', $data);

		
	}



	public function advanceAndDeductionForm()

	{	

		
		$data['title'] = 'VMGPS&#65515;Employee Advance & Deduction';
		$where = array();	
		$orderBy = 'id';
		$serialized = 'asc';

		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

		$empID							= $this->input->post('empID');
		$data['domain_id']				= $this->input->post('domain_id');
		$data['branch_id']				= $this->input->post('branch_id');
		$data['designition_id']			= $this->input->post('designition_id');
		$data['advancedMonth']		    = $this->input->post('advancedMonth');

		if(!empty($data['advancedMonth'])){
			$pieces = explode("-", $data['advancedMonth']);
			$data['findYear']  = $pieces[0]; // piece1
			$data['findMonth'] = $pieces[1]; // piece2
			$data['monthYear'] = $data['findYear']."-".$data['findMonth'];
        }


		if(!empty($empID)){
			 $data['empID']             = $empID;
			 $data['empDetails']        = $this->M_crud_ayenal->findById('employee_basic_information', array('employee_id' =>$data['empID'])); 
			 $data['empAllDeductionDetails']   = $this->M_crud_ayenal->findAll('emp_deduction_manage', array('emp_id' =>$data['empID']), $orderBy, 'desc'); 


		} else {

			if(!empty($data['domain_id']) || $data['branch_id'] || !empty($data['designition_id'])){
		   	  if(!empty($data['domain_id']))        $where2['employee_basic_information.domain_id'] 		= $data['domain_id'];
		   	  if(!empty($data['branch_id']))   		$where2['employee_basic_information.branch_id'] 		= $data['branch_id'];
		   	  if(!empty($data['designition_id']))   $where2['employee_basic_information.designition_id'] 	= $data['designition_id'];

		   	  $data['allEmpInfo']   				= $this->M_join_ayenal->findAllEmpData('employee_basic_information', $where2 , $orderBy, $serialized);
		   }

		}


		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		$data['domainListInfo'] 		=  $this->M_crud->findAll('domain_list_manage', $where, $orderBy, $serialized);

		$data['empBranchList'] 			=  $this->M_crud->findAll('emp_branch_manage', array('domain_id' => $data['domain_id']), $orderBy, $serialized);
		$data['designitionListInfo'] 	=  $this->M_crud->findAll('designition_list_manage', array('domain_id' => $data['domain_id']), $orderBy, $serialized);


		

		$this->load->view('salaryInfo/advanceAndDeductionFormPage', $data);

		
	}


	public function empAdvancedAction()
	{

        
        $data['emp_id']		    		= $this->input->post('empId');
        $empDetails        				= $this->M_crud_ayenal->findById('employee_basic_information', array('employee_id' =>$data['emp_id'])); 
        $data['domain_id']				= $empDetails->domain_id;
		$data['branch_id']				= $empDetails->branch_id;
		$data['designition_id']			= $empDetails->designition_id;
		$data['advanced_amount']		= $this->input->post('advanced_amount');  
		$data['total_installment']		= $this->input->post('total_installment');  
		$data['payable_amount']		    = $this->input->post('payable_amount');  
		$data['install_type']		    = $this->input->post('install_type');
		$data['advanced_reason']		= $this->input->post('advanced_reason');
		$data['advanced_start_date']    = $this->input->post('advanced_start_date');
		$data['payable_month']		    = $this->input->post('payable_month');
		$data['advanced_month']		    = $this->input->post('monthYear');
		$data['entry_date']				= date('Y-m-d');  	
		
		
         if($data['advanced_amount'] !=""){
		    $this->M_crud_ayenal->save('emp_advanced_manage', $data);  
         }

		$this->empAdvancedtList_($data['emp_id']);	
	}

	public function empAdvancedtList_($empId)
	{
		$data['empAllAdvacedDetails']        = $this->M_crud_ayenal->findAll('emp_advanced_manage', array('emp_id' =>$empId), 'id', 'desc'); 
		$this->load->view('salaryInfo/empAdvancedListPage', $data);
	}

	public function empAdvancedUpdateAction()
	{

        
        $advan_update_id		    	= $this->input->post('advan_update_id');
        $data['emp_id']		    		= $this->input->post('empId');
        $empDetails        				= $this->M_crud_ayenal->findById('employee_basic_information', array('employee_id' =>$data['emp_id'])); 
        $data['domain_id']				= $empDetails->domain_id;
		$data['branch_id']				= $empDetails->branch_id;
		$data['designition_id']			= $empDetails->designition_id;
		$data['advanced_amount']		= $this->input->post('advanced_amount');  
		$data['total_installment']		= $this->input->post('total_installment');  
		$data['payable_amount']		    = $this->input->post('payable_amount');  
		$data['install_type']		    = $this->input->post('install_type');
		$data['advanced_reason']		= $this->input->post('advanced_reason');
		$data['advanced_start_date']    = $this->input->post('advanced_start_date');
		$data['payable_month']		    = $this->input->post('payable_month');
		$data['advanced_month']		    = $this->input->post('monthYear');
		$data['entry_date']				= date('Y-m-d');  


		
		if(!empty($advan_update_id)){
		  if($data['advanced_amount'] !=""){
		   $this->M_crud_ayenal->update('emp_advanced_manage', $data, array('id' => $advan_update_id));  
		  }
		} else {
         if($data['advanced_amount'] !=""){
		   $this->M_crud_ayenal->save('emp_advanced_manage', $data);  
         }
		}
         
		$this->empAdvancedtEditList_($data['emp_id']);	
	}

	public function empAdvancedtEditList_($empId)
	{
		$data['empAllAdvacedDetails']        = $this->M_crud_ayenal->findAll('emp_advanced_manage', array('emp_id' =>$empId), 'id', 'desc'); 
		$this->load->view('salaryInfo/empAdvancedEditListPage', $data);
	}

	public function empAdvanceDelete()
	{

		$id 				= $this->input->post('id');		
		$emp_id 			= $this->input->post('emp_id');	
		if($id !='' && $emp_id !=''){
			$this->M_crud_ayenal->destroy('emp_advanced_manage', array('id' => $id));
	        $this->empAdvancedtEditList_($emp_id);		
		}	
		   
		
	}

	public function empAdvancedEdit()
	{
		$id 					= $this->input->post('id');		
		$empAdvancedEditInfo 	= $this->M_crud_ayenal->findById('emp_advanced_manage', array('id' => $id));
				
		echo json_encode($empAdvancedEditInfo);
	}




	public function empDeductionAction()
	{

        
        $data['emp_id']		    		= $this->input->post('empId');
        $empDetails        				= $this->M_crud_ayenal->findById('employee_basic_information', array('employee_id' =>$data['emp_id'])); 
        $data['domain_id']				= $empDetails->domain_id;
		$data['branch_id']				= $empDetails->branch_id;
		$data['designition_id']			= $empDetails->designition_id;
		$data['deduction_amount']		= $this->input->post('deduction_amount');  
		$data['total_installment']		= $this->input->post('total_installment');  
		$data['payable_amount']		    = $this->input->post('payable_amount');  
		$data['install_type']		    = $this->input->post('install_type');
		$data['deduction_reason']		= $this->input->post('deduction_reason');
		$data['deduction_start_date']   = $this->input->post('deduction_start_date');
		$payable_month		    		= $this->input->post('payable_month');
		if(!empty($payable_month)){
			 $pieces = explode("-", $payable_month);
			 $findYear  = $pieces[0]; // piece1
			 $findMonth = $pieces[1]; // piece2
			 $data['payable_month']   = $findYear."-".$findMonth;
	    }
		
		$data['deduction_month']		= $this->input->post('monthYear');
		$data['entry_date']				= date('Y-m-d');  	
		$totalInstallMent               = $data['total_installment'];
		
		
         if($data['deduction_amount'] !=""){
		   $insertId =  $this->M_crud_ayenal->save('emp_deduction_manage', $data);  
		   $toMonthYear = date('Y-m', strtotime("+$totalInstallMent months", strtotime($data['payable_month'])));

		    $start    = new DateTime($data['payable_month']);
			$start->modify('first day of this month');
			$end      = new DateTime($toMonthYear);
			//$end->modify('first day of next month');
			$interval = DateInterval::createFromDateString('1 month');
			$period   = new DatePeriod($start, $interval, $end);

			foreach ($period as $dt) {
				$dataMonthLy['deduction_auto_id']      	= $insertId;
				$dataMonthLy['emp_id']      		   	= $data['emp_id'];
				$dataMonthLy['monthly_payable_amount']  = $data['payable_amount'];
				$dataMonthLy['deduction_reason']      	= $data['deduction_reason'];
				$dataMonthLy['payable_month']      		= $dt->format("Y-m");
				$dataMonthLy['due_amount']      		= $data['payable_amount'];
				$this->db->insert('month_wise_deduction_amount', $dataMonthLy); 
			    //echo $dt->format("Y-m") . "<br>\n";
			}

         }

		$this->empDeductionList_($data['emp_id']);	
	}

	public function empDeductionList_($empId)
	{
		$data['empAllDeductionDetails']        = $this->M_crud_ayenal->findAll('emp_deduction_manage', array('emp_id' =>$empId), 'id', 'desc'); 
		$this->load->view('salaryInfo/empDeductionListPage', $data);
	}

	public function empDeductionUpdateAction()
	{

        
        $deduc_update_id		    	= $this->input->post('deduc_update_id');
        $data['emp_id']		    		= $this->input->post('empId');
        $empDetails        				= $this->M_crud_ayenal->findById('employee_basic_information', array('employee_id' =>$data['emp_id'])); 
        $data['domain_id']				= $empDetails->domain_id;
		$data['branch_id']				= $empDetails->branch_id;
		$data['designition_id']			= $empDetails->designition_id;
		$data['deduction_amount']		= $this->input->post('deduction_amount');  
		$data['total_installment']		= $this->input->post('total_installment');  
		$data['payable_amount']		    = $this->input->post('payable_amount');  
		$data['install_type']		    = $this->input->post('install_type');
		$data['deduction_reason']		= $this->input->post('deduction_reason');
		$data['deduction_start_date']   = $this->input->post('deduction_start_date');
		$payable_month		    		= $this->input->post('payable_month');
		if(!empty($payable_month)){
			 $pieces = explode("-", $payable_month);
			 $findYear  = $pieces[0]; // piece1
			 $findMonth = $pieces[1]; // piece2
			 $data['payable_month']   = $findYear."-".$findMonth;
	    }
		$data['deduction_month']		= $this->input->post('monthYear');
		$data['entry_date']				= date('Y-m-d');  
		$totalInstallMent               = $data['total_installment'];	

		if(!empty($deduc_update_id)){
		  if($data['deduction_amount'] !=""){
		   $this->M_crud_ayenal->update('emp_deduction_manage', $data, array('id' => $deduc_update_id));  
		   $this->M_crud_ayenal->destroy('month_wise_deduction_amount', array('deduction_auto_id' => $deduc_update_id));  

		    $toMonthYear = date('Y-m', strtotime("+$totalInstallMent months", strtotime($data['payable_month'])));

		    $start    = new DateTime($data['payable_month']);
			$start->modify('first day of this month');
			$end      = new DateTime($toMonthYear);
			//$end->modify('first day of next month');
			$interval = DateInterval::createFromDateString('1 month');
			$period   = new DatePeriod($start, $interval, $end);

			foreach ($period as $dt) {
				$dataMonthLy['deduction_auto_id']      	= $deduc_update_id;
				$dataMonthLy['emp_id']      		   	= $data['emp_id'];
				$dataMonthLy['monthly_payable_amount']  = $data['payable_amount'];
				$dataMonthLy['deduction_reason']      	= $data['deduction_reason'];
				$dataMonthLy['payable_month']      		= $dt->format("Y-m");
				$dataMonthLy['due_amount']      		= $data['payable_amount'];
				$this->db->insert('month_wise_deduction_amount', $dataMonthLy); 
			    //echo $dt->format("Y-m") . "<br>\n";
			}
		  }
		} else {
         if($data['deduction_amount'] !=""){
		   $insertId =  $this->M_crud_ayenal->save('emp_deduction_manage', $data);  
		   $toMonthYear = date('Y-m', strtotime("+$totalInstallMent months", strtotime($data['payable_month'])));

		    $start    = new DateTime($data['payable_month']);
			$start->modify('first day of this month');
			$end      = new DateTime($toMonthYear);
			//$end->modify('first day of next month');
			$interval = DateInterval::createFromDateString('1 month');
			$period   = new DatePeriod($start, $interval, $end);

			foreach ($period as $dt) {
				$dataMonthLy['deduction_auto_id']      	= $insertId;
				$dataMonthLy['emp_id']      		   	= $data['emp_id'];
				$dataMonthLy['monthly_payable_amount']  = $data['payable_amount'];
				$dataMonthLy['deduction_reason']      	= $data['deduction_reason'];
				$dataMonthLy['payable_month']      		= $dt->format("Y-m");
				$dataMonthLy['due_amount']      		= $data['payable_amount'];
				$this->db->insert('month_wise_deduction_amount', $dataMonthLy); 
			    //echo $dt->format("Y-m") . "<br>\n";
			}

         }
		}
		
         
		$this->empDeductionEditList_($data['emp_id']);	
	}

	public function empDeductionEditList_($empId)
	{
		$data['empAllDeductionDetails']        = $this->M_crud_ayenal->findAll('emp_deduction_manage', array('emp_id' =>$empId), 'id', 'desc'); 
		$this->load->view('salaryInfo/empDeductionEditListPage', $data);
	}

    public function empDeductionDelete()
	{

		$id 				= $this->input->post('id');		
		$emp_id 			= $this->input->post('emp_id');	
		if($id !='' && $emp_id !=''){
			$this->M_crud_ayenal->destroy('emp_deduction_manage', array('id' => $id));
	        $this->empDeductionEditList_($emp_id);		
		}	
		   
		
	}

	public function empDeductionEdit()
	{
		$id 					= $this->input->post('id');		
		$empDeductionEditInfo 	= $this->M_crud_ayenal->findById('emp_deduction_manage', array('id' => $id));
				
		echo json_encode($empDeductionEditInfo);
	}





	public function empWiseAdvanceDeductionManageForm()

	{	

		
		$data['title'] = 'VMGPS&#65515;Employee Benifit';
		$where = array();	
		$orderBy = 'id';
		$serialized = 'asc';

		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

		$data['empID']			    	= $this->input->post('empId');
		$data['domain_id']				= $this->input->post('domain_id');
		$data['branch_id']				= $this->input->post('branch_id');
		$data['designition_id']			= $this->input->post('designition_id');
		$data['monthYear']		    	= $this->input->post('monthYear');

		if(!empty($data['monthYear'])){
			$pieces = explode("-", $data['monthYear']);
			$data['findYear']  = $pieces[0]; // piece1
			$data['findMonth'] = $pieces[1]; // piece2
			$data['monthYear'] = $data['findYear']."-".$data['findMonth'];
        }

	     $data['empAllDeductionDetails']   = $this->M_crud_ayenal->findAll('emp_deduction_manage', array('emp_id' =>$data['empID']), $orderBy, 'desc'); 

	     //print_r($data['empAllAdvacedDetails']);


		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		$this->load->view('salaryInfo/empWiseAdvanceDeductionManageFormPage', $data);

		
	}


	public function salaryAdvaceDeductionEdit()

	{	

		
		$data['title'] = 'VMGPS&#65515; Salary Advance Deduction Edit Managment';
		$where = array();	
		$orderBy = 'id';
		$serialized = 'desc';

		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		

		$this->load->view('salaryInfo/salaryAdvanceDeductionEditSubModulePage', $data);

		
	}


   public function salaryAndAllowanceEdit()

	{	

		
		$data['title'] = 'VMGPS&#65515; Salary & Allowance Edit Managment';
		$where = array();	
		$orderBy = 'id';
		$serialized = 'desc';

		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		

		$this->load->view('salaryInfo/salaryAndAllowanceEditPage', $data);

		
	}
	

	public function salaryEditInfoChk()

	{	

		
		$data['title'] = 'VMGPS&#65515; Salary & Allowance Edit Managment';
		$where = array();	
		$orderBy = 'id';
		$serialized = 'desc';

		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		echo $data['empID']				= $this->input->post('empID');
		$data['salaryMonth']		    = $this->input->post('salaryMonth');

		if(!empty($data['salaryMonth'])){
			$pieces = explode("-", $data['salaryMonth']);
			$data['findYear']  = $pieces[0]; // piece1
			$data['findMonth'] = $pieces[1]; // piece2
			$data['monthYear'] = $data['findYear']."-".$data['findMonth'];
        }

        $data['empDetails']   = $this->M_crud_ayenal->findById('employee_basic_information', array('employee_id' =>$data['empID']));
        //print_r($data['empDetails']);
        $data['emppreSalary'] = $this->M_crud_ayenal->findById('salary_and_allowance_information', array('employee_id' =>$data['empID'], 'sallary_month' => $data['monthYear']));


		

		$this->load->view('salaryInfo/salaryEditInfoChkPage', $data);

		
	}


	public function benifitEdit()

	{	

		
		$data['title'] = 'VMGPS&#65515; Salary & Allowance Edit Managment';
		$where = array();	
		$orderBy = 'id';
		$serialized = 'desc';

		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		

		$this->load->view('salaryInfo/benifitEditPage', $data);

		
	}



	public function benifitEditInfoChk()

	{	

		
		$data['title'] = 'VMGPS&#65515; Benifit Edit Managment';
		$where = array();	
		$orderBy = 'id';
		$serialized = 'desc';

		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		 $data['empID']				= $this->input->post('empID');
		 $data['benifitMonth']		    = $this->input->post('benifitMonth');

		if(!empty($data['benifitMonth'])){
			$pieces = explode("-", $data['benifitMonth']);
			$data['findYear']  = $pieces[0]; // piece1
			$data['findMonth'] = $pieces[1]; // piece2
			$data['monthYear'] = $data['findYear']."-".$data['findMonth'];
        }

        $data['empDetails']   		 = $this->M_crud_ayenal->findById('employee_basic_information', array('employee_id' =>$data['empID']));
        //print_r($data['empDetails']);
        $data['emppreBenifit'] 		 = $this->M_crud_ayenal->findById('emp_salary_benifit_manage', array('emp_id' =>$data['empID'], 'month_year' => $data['monthYear']));
        $data['empAllBenifitDetails'] = $this->M_crud_ayenal->findAll('emp_salary_benifit_manage', array('emp_id' =>$data['empID']), $orderBy, 'desc');


		

		$this->load->view('salaryInfo/benifitEditInfoChkPage', $data);

		
	}


	public function advanceAndDeductionEdit()

	{	

		
		$data['title'] = 'VMGPS&#65515; Advance & Deduction Edit Managment';
		$where = array();	
		$orderBy = 'id';
		$serialized = 'desc';

		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		

		$this->load->view('salaryInfo/advanceAndDeductionEditPage', $data);

		
	}



	public function advanceAndDeductionEditInfoChk()

	{	

		
		$data['title'] = 'VMGPS&#65515; Advance & Deduction Edit Managment';
		$where = array();	
		$orderBy = 'id';
		$serialized = 'desc';

		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		 $data['empID']					= $this->input->post('empID');
		 $data['month']		    		= $this->input->post('month');

		if(!empty($data['month'])){
			$pieces = explode("-", $data['month']);
			$data['findYear']  = $pieces[0]; // piece1
			$data['findMonth'] = $pieces[1]; // piece2
			$data['monthYear'] = $data['findYear']."-".$data['findMonth'];
        }

        $data['empDetails']   		 = $this->M_crud_ayenal->findById('employee_basic_information', array('employee_id' =>$data['empID']));
        //print_r($data['empDetails']);
        //$data['empAdvanced'] 		 = $this->M_crud_ayenal->findById('emp_advanced_manage', array('emp_id' =>$data['empID'], 'advanced_month' => $data['monthYear']));
        //$data['empAllAdvacedDetails']  = $this->M_crud_ayenal->findAll('emp_advanced_manage', array('emp_id' =>$data['empID']), $orderBy, 'desc');

        $data['empDeduction'] 		 = $this->M_crud_ayenal->findById('emp_deduction_manage', array('emp_id' =>$data['empID'], 'deduction_month' => $data['monthYear']));
        $data['empAllDeductionDetails'] = $this->M_crud_ayenal->findAll('emp_deduction_manage', array('emp_id' =>$data['empID']), $orderBy, 'desc');


		

		$this->load->view('salaryInfo/advanceAndDeductionEditInfoChkPage', $data);

		
	}



















	

	

				






}

