<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EmpAttendance extends CI_Controller {

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

		$data['title'] 		= 'VMGPS&#65515;Employee Attendence Managment';
		$currYear 			= date('Y');
		$table 				= '';
		$where 				= array();
		$orderBy 			= 'id';
		$serialized 		= 'asc';
		$authorID 		    = $this->session->userid;
		$authorType 		= $this->session->usertype;
		$authorBranchID 	= $this->session->authorBranchID;

		
		if($authorType == "superadmin" )
		{
		   $data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		   $data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		$this->load->view('empAttendance/empAttendanceModulePage', $data);
	}





	public function manualAttendence() {
	
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
		
		$data['title'] = 'VMGPS&#65515;Manual Attentdence Management';
		$data['domainListInfo'] 		=  $this->M_crud->findAll('domain_list_manage', $where, $orderBy, $serialized);

		$data['msg']                    =  $this->session->msg; 
		$this->session->set_userdata(array('msg' => ""));
		
		
		$this->load->view('empAttendance/manualAttendencePage', $data);
	
	}



	public function menualAttendenceInput() {
	
		$currYear 	= date('Y');
		$where 		= array();
		$orderBy 	= 'id';
		$orderByCl 	= 'employee_basic_information.id';
		$serialized = 'asc';
       
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

		$data['domain_id']			= $this->input->post('domain_id');
		$data['designition_id']	    = $this->input->post('designition_id');
		$data['branch_id']	    	= $this->input->post('branch_id');
		$data['date']				= $this->input->post('date');

		 $pieces = explode("-", $data['date']);
		 $data['findYear']  = $pieces[0]; 
		 $data['findMonth'] = $pieces[1]; 
		 $data['monthYear'] = $data['findYear']."-".$data['findMonth'];

		 $data['nameOfDay'] = date('D', strtotime($data['date'])); 


		 $data['chkAttnData']   = $this->M_crud->findById('employee_attendence_information', array('domain_id' => $data['domain_id'], 'branch_id' => $data['branch_id'], 'designition_id' => $data['designition_id'], 'date' => $data['date']));
									   

		 
		$data['title']                  = 'VMGPS&#65515;Manual Attentdence Management';

		$data['domainListInfo'] 		=  $this->M_crud->findAll('domain_list_manage', $where, $orderBy, $serialized);
		$data['empBranchList'] 			=  $this->M_crud->findAll('emp_branch_manage', array('domain_id' => $data['domain_id']), $orderBy, $serialized);
		$data['designitionListInfo'] 	=  $this->M_crud->findAll('designition_list_manage', array('domain_id' => $data['domain_id']), $orderBy, $serialized);

        $data['employeeList']   		= $this->M_crud->findAll('employee_basic_information', array('domain_id' => $data['domain_id'], 'branch_id' => $data['branch_id'], 'designition_id' => $data['designition_id']), $orderBy, $serialized);


        $data['validationText'] = '';

	    if($data['nameOfDay'] == 'Fri'){
            $data['validationText'] = 'Sorry! The Day is Friday';
	    }else{

	    	$customHolyDay     = $this->M_crud->findById('emp_day_to_day_holyday_manage', array('domain_id' => $data['domain_id'], 'branch_id' => $data['branch_id'], 'holyday_date' => $data['date']));	
            if(!empty($customHolyDay)){
               $data['validationText'] = 'Sorry! The Day is Custom Holyday';
		    }

	    }

		
		
		
		$this->load->view('empAttendance/manualAttendenceCreatePage', $data);
	
	}



	public function menualAttendenceCreateAction() {
	   
		
		$data['domain_id'] 	      = $this->input->post('domainId');
		$data['branch_id'] 		  = $this->input->post('branchId');
		$data['designition_id']   = $this->input->post('designitionId');
		$data['month_year'] 	  = $this->input->post('monthYear');
		$data['attenYear'] 	      = $this->input->post('attnYear');
		$data['date']			  = $this->input->post('date');


        $employeeAutoId_list 	  = $this->input->post('employeeAutoId');
		$inTime_list 	  		  = $this->input->post('inTime');
		$outTime_list 	  		  = $this->input->post('outTime');
		$action_type_list 	  	  = $this->input->post('action_type');
		$training_details_list 	  = $this->input->post('training_details');
		$updateId_list 	  	  	  = $this->input->post('updateId');
    
		foreach ($employeeAutoId_list as $key => $value) {
			$data['emp_auto_id']  = $employeeAutoId_list[$key];
			$data['in_time']      = $inTime_list[$key];
			$data['out_time']     = $outTime_list[$key];
			$data['action']       = $action_type_list[$key];

			if($action_type_list[$key] =='training') $data['training_details']      = $training_details_list[$key];	
			else  $data['training_details']      = NULL;	
			    
			       
		 

			
			$indatetime  = new DateTime($data['date'].' '.$inTime_list[$key]);
		
			$outdatetime = new DateTime($data['date'].' '.$outTime_list[$key]);
		
			$interval    = $indatetime->diff($outdatetime);
			
			  
			$data['total_hours']   = $interval->format('%h');
			$data['total_time']    = $interval->format('%i');


			

			if($updateId_list[$key])
			    $this->db->update('employee_attendence_information', $data, array('id' =>  $updateId_list[$key]));  
			else
			    $this->db->insert('employee_attendence_information', $data); 

		}


		$this->session->set_userdata(array('msg' => "Attandence data insert success "));
		redirect('empAttendance/manualAttendence');

				
		
		
	}

	






	public function setupHoliday()
	{
		$data['title'] = 'VMGPS&#65515;Setup Holiday';
		$currYear 	= date('Y');		
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		

		$data['domainListInfo'] 		=  $this->M_crud->findAll('domain_list_manage', $where, $orderBy, $serialized);

       
        $data['allHolydayInfo'] 		=  $this->M_join_ayenal->findAllEmpHolydayInfo(' emp_holyday_setup', $where, $orderBy, 'desc');

		$this->load->view('empAttendance/setupHolidayPage', $data);
	}

	public function holydayList_()
	{
		$where = array();	
		$orderBy = 'id';
		$serialized = 'desc';
		$data['allHolydayInfo'] 		=  $this->M_join_ayenal->findAllEmpHolydayInfo(' emp_holyday_setup', $where, $orderBy, $serialized);
		$this->load->view('empAttendance/setUpHolydayListPage', $data);
	}

	public function holyDayEditInfo()
	{
		$id 							= $this->input->post('id');	
		$where     						= array('id' => $id);	
		$holyDayEditInfo 				= $this->M_crud_ayenal->findById('emp_holyday_setup', $where);
		$holyDayEditInfo->branchList 	= $this->M_crud->findAll('emp_branch_manage', array('id' => $holyDayEditInfo->domain_id), $orderBy, $serialized);
				
		echo json_encode($holyDayEditInfo);
	}
	




    public function setupHolydayAction() {
	   
		
		$id		    		    	= $this->input->post('update_id');
		$data['domain_id'] 	    	= $this->input->post('domain_id');
		$data['branch_id'] 	    	= $this->input->post('branch_id');
		$data['short_details'] 		= $this->input->post('short_details');
		$data['holyday_name'] 		= $this->input->post('holyday_name');
		$data['from_date']			= $this->input->post('fromDate');
		$data['to_date']			= $this->input->post('toDate');

		

		$allDates = array();

		$holyDay_starting_date=date($data['from_date']);
		$holyDay_ending_date=date($data['to_date']);
		$report_starting_date1=date('Y-m-d',strtotime($holyDay_starting_date.'-1 day'));
		while (strtotime($report_starting_date1)<strtotime($holyDay_ending_date))
		{

		    $report_starting_date1=date('Y-m-d',strtotime($report_starting_date1.'+1 day'));
		    $allDates[]=$report_starting_date1;
		} 



		if(!empty($id)) {
	     	if($data['from_date'] && $data['to_date']){
		        $this->M_crud_ayenal->update('emp_holyday_setup', $data, array('id' => $id));
		  	}

		  	$this->db->delete('emp_day_to_day_holyday_manage', array('holy_auto_id' => $id));    
		  	$holyAutoId = $id;
		}else{
		 	if($data['from_date'] && $data['to_date']){
		        $holyAutoId = $this->M_crud_ayenal->save('emp_holyday_setup', $data);
		    }

		}
        
		
        
        
		foreach ($allDates as $key => $value) {

			$dayName = date('D', strtotime($value)); 
			$data2['holy_auto_id'] 	= $holyAutoId;
			$data2['domain_id'] 	= $data['domain_id'];
			$data2['branch_id'] 	= $data['branch_id'];
			$data2['holyday_date'] 	= $value;

			$partDate 		        = explode("-", $value);
		    $data2['month_year']  = $partDate[0]."-".$partDate[1];

            if($dayName !='Fri')
            	$this->db->insert('emp_day_to_day_holyday_manage', $data2); 
			
			
		}
		
         $this->holydayList_();

       
			  
	}

    




	public function holyDayInsertChkInfo()
	{
		$id 			    = $this->input->post('id');	
		$branch_id 			= $this->input->post('branch_id');	
		$fromDate 		    = $this->input->post('fromDate');	
		$toDate 		    = $this->input->post('toDate');	
		$domain_id 		    = $this->input->post('domain_id');	

	    $chkHolyday         = $this->M_crud_ayenal->findById('employee_attendence_information', array('domain_id' => $domain_id, 'branch_id' => $branch_id, 'date >=' => $fromDate, 'date <=' => $toDate));
		
		if(!empty($chkHolyday)){
			echo"notpermission";
		}else{
		   $chkHolyExistday = $this->M_crud_ayenal->findById('emp_day_to_day_holyday_manage', array('domain_id' => $domain_id, 'branch_id' => $branch_id, 'holyday_date >=' => $fromDate, 'holyday_date <=' => $toDate, 'holy_auto_id !=' => $id));

		    if(!empty($chkHolyExistday))
                echo"duplicated";	
            else
            	echo"permission";	
		    
		}
	   
	}



	public function holydayDelete($id)
	{	
		
		$this->M_crud_ayenal->destroy('emp_holyday_setup', array('id' => $id));
		$this->M_crud_ayenal->destroy('emp_day_to_day_holyday_manage', array('holy_auto_id' => $id));
		redirect ('empAttendance/setupHoliday');
	}

	




	

	
	 
	 
	 
	 
	
	
	

}


