<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class LeaveManage extends CI_Controller {

	static $model 	 = array('M_admin', 'M_crud_ayenal', 'M_join_ayenal','M_crud', 'M_join');
	static $helper   = array('url', 'authentication');

	const  Title	 = 'VMGPS&#65515; Leave Type Manage';

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

		
		$data['title'] = 'VMGPS&#65515;Employee Leave Managment';
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
		

		$this->load->view('leaveInfo/leaveManageSubModulePage', $data);

		
	}

	public function leaveSetup()

	{	

		
		$data['title'] = 'VMGPS&#65515;Employee Leave Setup';
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
		$data['allLeaveInfo']  =  $this->M_crud->findAll('leave_type_manage', $where, $orderBy, $serialized);	

		$this->load->view('leaveInfo/leaveTypeManagePage', $data);

		
	}

	
	public function leaveTypeList_()
	{
		$where = array();	
		$orderBy = 'id';
		$serialized = 'desc';
		$data['allLeaveInfo'] =  $this->M_crud->findAll('leave_type_manage', $where, $orderBy, $serialized);	
		$this->load->view('leaveInfo/leaveTypeListPage', $data);
	}
	


	public function leaveEditInfo()
	{
		$id 			= $this->input->post('id');	
		$where     		= array('id' => $id);	
		$leaveEditInfo 	= $this->M_crud_ayenal->findById('leave_type_manage', $where);
				
		echo json_encode($leaveEditInfo);
	}






	public function store()
	{	
		$id		    		    	= $this->input->post('update_id');
		$data['leave_type'] 		= $this->input->post('leave_type');
		$data['leave_days']			= $this->input->post('leave_days');
		$data['year']				= $this->input->post('year');
		
		if(!empty($id)) {
		     if($data['leave_type'] !=''){
			    $this->M_crud_ayenal->update('leave_type_manage', $data, array('id' => $id));
			  }
			}else{
			 if($data['leave_type'] !=''){
			     $this->M_crud_ayenal->save('leave_type_manage', $data);
			   }
			}

		 $this->leaveTypeList_();	
		
	}



	public function leaveDelete($id)
	{	
		$where     = array('id' => $id);
		$this->M_crud_ayenal->destroy('leave_type_manage', $where);
		redirect ('leaveManage/leaveSetup');
	}



	



	public function empLeaveManage()

	{	
		
		  $data['title'] = 'VMGPS&#65515;Employee Leave Manage';
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
		
		  $data['allEmpInfo'] 	 		=  $this->M_join_ayenal->findAllEmpData('employee_basic_information', $where, $orderBy, $serialized);	
		  $data['domainListInfo'] 		=  $this->M_crud->findAll('domain_list_manage', $where, $orderBy, $serialized);
		  $data['designitionListInfo'] 	=  $this->M_crud->findAll('designition_list_manage', $where, $orderBy, $serialized);
		  $this->load->view('leaveInfo/empLeaveManagePage', $data);
		
	}
	
	
	
	public function empLeaveDetails()

	{	

		if(isAuthenticate()){
		  $data['title']  = self::Title;
		  $where = array();	
		  $orderBy = 'id';
		  $serialized = 'asc';
		  $empId 			 	 = $this->input->post('id');
		  $data['empInfo'] 	 	 =  $this->M_crud_ayenal->findById('employee_basic_information', array('employee_id' =>$empId));
		  $leaveChk              = $this->M_crud_ayenal->findById('emp_leave_manage', array('emp_id' =>$data['empInfo']->id));
		  if(!empty($leaveChk)){
		     $data['empLeaveInfo']  =  $this->M_join_ayenal->findEmpLeaveInfo('emp_leave_manage', array('emp_id' =>$data['empInfo']->id), $orderBy, $serialized);
		  }
		    $data['empTempLeaveInfo']  =  $this->M_crud_ayenal->findAll('leave_type_manage', $where, $orderBy, $serialized);   
		 	
		 		
		  $this->load->view('leaveInfo/empLeaveDetailsPage', $data);

		}

	}

	public function domainWiseEmployee()
	{

	   $orderBy = 'employee_basic_information.id';
	   $serialized = 'asc';
	   $domain_id    					=  $this->input->post('domain_id');	
	   $designition_id    			    =  $this->input->post('designition_id');	

	   if(!empty($domain_id) || !empty($designition_id)){
	   	  if(!empty($domain_id))        $where['employee_basic_information.domain_id'] = $domain_id;
	   	  if(!empty($designition_id))   $where['employee_basic_information.designition_id'] = $designition_id;

	   	  $data['allEmpInfo']   	= $this->M_join_ayenal->findAllEmpData('employee_basic_information', $where , $orderBy, $serialized);
	   }

	   

	   $this->load->view('leaveInfo/domainWiseEmployeeLeavePage', $data);
	  
		
	}


    public function leaveManageStore()
	{	
		$emp_id		    	= $this->input->post('emp_id');
		$leave_type 		= $this->input->post('leave_type');
		$from_date			= $this->input->post('from_date');
		$to_date		    = $this->input->post('to_date');
		$piecesfrom 		= explode("-", $from_date);
		$fromMonthYear      = $piecesfrom[0]."-".$piecesfrom[1];
		$piecesTo 			= explode("-", $to_date);
		$toMonthYear        = $piecesTo[0]."-".$piecesTo[1];

		$leaveYearInfo  	=  $this->M_crud_ayenal->findById('leave_type_manage', array('id' => $leave_type));


		$leave_starting_date=date($from_date);
		$leave_ending_date=date($to_date);
		$report_starting_date1=date('Y-m-d',strtotime($leave_starting_date.'-1 day'));
		while (strtotime($report_starting_date1)<strtotime($leave_ending_date))
		{

		    $report_starting_date1=date('Y-m-d',strtotime($report_starting_date1.'+1 day'));
		    $allDates[]=$report_starting_date1;
		} 
		  $totalLeave = sizeof($allDates);
		
		
		 $leaveChk              = $this->M_crud_ayenal->findById('emp_leave_manage', array('emp_id' =>$emp_id, 'leave_year' => $leaveYearInfo->year));
		 
		if(empty($leaveChk)){ 
			
			 $empTempLeaveInfo  =  $this->M_crud_ayenal->findAll('leave_type_manage', array('year' => $leaveYearInfo->year), 'id', 'asc');
			 
			    foreach($empTempLeaveInfo as $v){
			     $data['emp_id']   	      = $emp_id;
				 $data['leave_year']   	  = $v->year;
				 $data['leave_type_id']   = $v->id;
				 $data['leave_days']      = $v->leave_days;
				 
				 $this->M_crud_ayenal->save('emp_leave_manage', $data);
			    }
		  }



			//holyday check to leeave start
		    $empDetails               = $this->M_crud_ayenal->findById('employee_basic_information', array('id' =>$emp_id));

		    $customHolyDayChk  		  = $this->M_crud->findById('emp_day_to_day_holyday_manage', array('holyday_date >=' => $from_date, 'holyday_date <=' => $to_date, 'domain_id' => $empDetails->domain_id, 'branch_id' => $empDetails->branch_id));	

		    $permission = 'yes';

		        if(!empty($customHolyDayChk))  $permission = 'no';	

				foreach($allDates as $k => $vd) {
					$nameOfDay = date('D', strtotime($vd)); 

					if($nameOfDay =='Fri'){
                        $permission = 'no';	
                        break;
					}
				}

				//holyday check to leeave end

				$previousValue = $this->M_crud_ayenal->findById('emp_leave_manage', array('emp_id' => $emp_id, 'leave_type_id' => $leave_type, 'leave_year' => $leaveYearInfo->year));
			
		        $dataUp['total_leave']          = $previousValue->total_leave + $totalLeave;

				if($permission =='yes'){
					if($dataUp['total_leave'] <= $previousValue->leave_days){
						$this->M_crud_ayenal->update('emp_leave_manage', $dataUp ,array('emp_id' => $emp_id, 'leave_type_id' => $leave_type, 'leave_year' => $leaveYearInfo->year));
						
						 if($leave_type !=''){
							 $data2['emp_id']   		= $emp_id;
							 $data2['leave_type_id']   	= $leave_type;
							 $data2['taken_leave']   	= $totalLeave;
							 $data2['year']   			= $leaveYearInfo->year;
							 $data2['leave_from_date']  = $from_date;
							 $data2['leave_to_date']   	= $to_date;
							 $this->M_crud_ayenal->save('emp_leave_manage_details', $data2);
						 }


		                foreach($allDates as $k => $v) {
		             	   $pieces 				 	= explode("-", $allDates[$k]);
						   $findYear  			 	= $pieces[0];
						   $findMonth 			 	= $pieces[1];

		             	   $data3['leave_date']  	= $allDates[$k];
		             	   $data3['month_year']  	= $findYear."-".$findMonth;
		             	   $data3['emp_id']  	 	= $emp_id;
		             	   $data3['leave_type_id']  = $leave_type;
		             	   $data3['count_leave']  	= 1;
		             	   $data3['year']  			= $leaveYearInfo->year;
		             	   $this->M_crud_ayenal->save('emp_day_to_day_leave_manage_details', $data3);

		                }
					
		            }else{
					  echo"1";
					}
				} else {
				  echo"2";	
				}
				
		
	}



	public function designitionWiseData()
	{
		$orderBy = 'id';
		$serialized = 'desc';
		$desig_id_search 			= $this->input->post('desig_id_search');	
		$where     					= array('emp_basic_info.designition_id' => $desig_id_search);	
		$data['desigWiseData']      = $this->M_join->findEmpInfo('emp_basic_info', $where, $orderBy, $serialized);
		$this->load->view('leaveInfo/desigWiseList', $data);
	}

	public function departdesignitionWiseAttnData()
	{
		$orderBy = 'id';
		$serialized = 'desc';
		$currentDate           		= date('Y-m-d');
		$depart_id_search 			= $this->input->post('depart_id_search');
		$desig_id_search 			= $this->input->post('desig_id_search');

		if(!empty($depart_id_search) || !empty($desig_id_search)){
			 if(!empty($depart_id_search))  $where['emp_basic_info.department_id']  = $depart_id_search;
			 if(!empty($desig_id_search))   $where['emp_basic_info.designition_id'] = $desig_id_search;

		}
		
		$data['allEmpInfo'] 	    = $this->M_join->findEmpAttnInfo('emp_basic_info', $where, $currentDate, $orderBy, $serialized);		
		$this->load->view('leaveInfo/desigWiseAttnDataList', $data);
	}





	

	

				






}

