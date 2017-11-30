<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendence extends CI_Controller {

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
		$data['title'] = 'VMGPS&#65515;Attendence Managment';
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

		$this->load->view('attendenceInfo/attendenceModulePage', $data);
	}





	public function manualAttendence()
	{
		//var_dump('Manual Attendence'); die;
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
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, 'sl_no', $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		$data['teacherListInfo'] 		=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);

		$data['msg']                    =  $this->session->msg; 
		$this->session->set_userdata(array('msg' => ""));
		
		$this->load->view('attendenceInfo/manualAttendencePage', $data);
	}



	public function menualAttendenceInput() {
		//var_dump('Attedence Input');die;
		$currYear 	= date('Y');
		$where 		= array();
		$orderBy 	= 'id';
		$orderByCl 	= 'class_wise_info.class_roll';
		$serialized = 'asc';

		$data['title'] = 'VMGPS&#65515;Manual Attentdence Management';
       
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

		$data['branch_id']			= $this->input->post('branch_id');
		$data['class_id']			= $this->input->post('class_id');
		$data['group_id']			= $this->input->post('group_id');
		$data['section_id']			= $this->input->post('section_id');
		$data['shift_id']			= $this->input->post('shift_id');
		$data['date']				= $this->input->post('date');

		$data['chkAttnData'] = $this->M_crud->findById('attendence_information', array('branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'group_id' => $data['group_id'], 'section_id' => $data['section_id'], 'shift_id' => $data['shift_id'], 'date' => $data['date']));


		

		 $pieces = explode("-", $data['date']);
		 $data['findYear']  = $pieces[0]; // piece1
		 $data['findMonth'] = $pieces[1]; // piece2
		 
         $monthYear   = $data['findYear']."-".$data['findMonth'];
         $data['monthYear'] = $monthYear;


         $data['nameOfDay'] = date('D', strtotime($data['date'])); 



		if(!empty($data['branch_id']) || !empty($data['class_id']) || !empty($data['group_id']) || !empty($data['section_id']) || !empty($data['shift_id']) || !empty($data['findYear'])) {

			if(!empty($data['branch_id'])) 			$where2['class_wise_info.branc_id'] 	        = $data['branch_id'];
			if(!empty($data['class_id'])) 			$where2['class_wise_info.class_id'] 		    = $data['class_id'];
			if(!empty($data['group_id'])) 			$where2['class_wise_info.class_group_id'] 		= $data['group_id'];
			if(!empty($data['section_id'])) 		$where2['class_wise_info.class_section_id'] 	= $data['section_id'];
			if(!empty($data['shift_id'])) 		 	$where2['class_wise_info.class_shift_id'] 		= $data['shift_id'];
			if(!empty($data['findYear'])) 			$where2['class_wise_info.year'] 		        = $data['findYear'];
			
			$data['studentList']   = $this->M_join->findAllAttnStuInfo('class_wise_info', $where2, $orderByCl, $serialized);



		    $data['validationText'] = '';

		    if($data['nameOfDay'] == 'Fri'){
                $data['validationText'] = 'Sorry! The Day is Friday';
		    }else{

		    	$customHolyDay     = $this->M_crud->findById('day_to_day_holyday_manage', array('branch_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'holyday_date' => $data['date']));	
                if(!empty($customHolyDay)){
                   $data['validationText'] = 'Sorry! The Day is Custom Holyday';
			    }
		    }

		    

					
		}



       
		if($authorType == "superadmin" ) {
		   $data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		   $data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}
		
		
		
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, 'sl_no', $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		$data['teacherListInfo'] 		=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		
		$this->load->view('attendenceInfo/manualAttendenceCreatePage', $data);
	
	}

	public function menualAttendenceCreateAction() 
	{

		$data['branch_id']			= $this->input->post('branchId');
		$data['class_id']			= $this->input->post('classId');
		$data['group_id']			= $this->input->post('groupId');
		$data['section_id']			= $this->input->post('sectionId');
		$data['shift_id']			= $this->input->post('shiftId');
		$data['attenYear']			= $this->input->post('attenYear');
		$data['month_year']			= $this->input->post('monthYear');
		$data['date']				= $this->input->post('date');

		$studentAutoId_list         = $this->input->post('stu_id');
		$action_type_list           = $this->input->post('action_type');
		$updateId_list              = $this->input->post('updateId');

		foreach($studentAutoId_list as $k => $autoId) {

			if($studentAutoId_list[$k]){
			    $data['student_auto_id']   = $studentAutoId_list[$k];	
			    $data['action']    		   = $action_type_list[$k];	
                
                if($updateId_list[$k])
			        $this->db->update('attendence_information', $data, array('id' =>  $updateId_list[$k]));  
			    else
			        $this->db->insert('attendence_information', $data); 


			}

		}


		$this->session->set_userdata(array('msg' => "Attandence data insert success "));
		redirect('attendence/manualAttendence');

      
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
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

       
        $data['allHolydayInfo'] 		=  $this->M_join_ayenal->findAllHolydayInfo(' holyday_setup', $where, $orderBy, 'desc');

		$this->load->view('attendenceInfo/setupHolidayPage', $data);
	}

	public function holydayList_()
	{
		$where = array();	
		$orderBy = 'id';
		$serialized = 'desc';
		$data['allHolydayInfo'] 		=  $this->M_join_ayenal->findAllHolydayInfo(' holyday_setup', $where, $orderBy, $serialized);
		$this->load->view('attendenceInfo/setUpHolydayListPage', $data);
	}

	public function holyDayEditInfo()
	{
		$id 			= $this->input->post('id');	
		$where     		= array('id' => $id);	
		$holyDayEditInfo 	= $this->M_crud_ayenal->findById('holyday_setup', $where);
				
		echo json_encode($holyDayEditInfo);
	}
	




    public function setupHolydayAction() {
	   
		
		$id		    		    	= $this->input->post('update_id');
		$data['branch_id'] 	    	= $this->input->post('branch_id');
		$data['short_details'] 		= $this->input->post('short_details');
		$data['holyday_name'] 		= $this->input->post('holyday_name');
		$data['from_date']			= $this->input->post('fromDate');
		$data['to_date']			= $this->input->post('toDate');
		$data['class_section']	    = $this->input->post('class_section');


		if($data['class_section'] =='kg')  
			$classListArray = array('13', '16', '15', '1','2','3','4','5'); 

		if($data['class_section'] =='high')  
			$classListArray = array('6', '7', '8', '9','10'); 

		if($data['class_section'] =='college')  
			$classListArray = array('11', '12'); 
		
        $arrlength = count($classListArray);


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
		        $this->M_crud_ayenal->update('holyday_setup', $data, array('id' => $id));
		  	}

		  	$this->db->delete('day_to_day_holyday_manage', array('holy_auto_id' => $id));    
		  	$holyAutoId = $id;
		}else{
		 	if($data['from_date'] && $data['to_date']){
		        $holyAutoId = $this->M_crud_ayenal->save('holyday_setup', $data);
		    }

		}
        
		
        
        for($x = 0; $x < $arrlength; $x++) {
        
			foreach ($allDates as $key => $value) {

				$dayName = date('D', strtotime($value)); 
				$data2['holy_auto_id'] 	= $holyAutoId;
				$data2['branch_id'] 	= $data['branch_id'];
				$data2['class_id'] 	    = $classListArray[$x];
				$data2['class_section'] = $data['class_section']; 
				$data2['holyday_date'] 	= $value;

				$partDate 		        = explode("-", $value);
			    $data2['month_year']  = $partDate[0]."-".$partDate[1];

	            if($dayName !='Fri')
	            	$this->db->insert('day_to_day_holyday_manage', $data2); 
				
				
			}
		}
			
         $this->holydayList_();

       
			  
	}

   

    public function holyDayInsertChkInfo()
	{
		$id 			    = $this->input->post('id');	
		$branch_id 			= $this->input->post('branch_id');	
		$fromDate 		    = $this->input->post('fromDate');	
		$toDate 		    = $this->input->post('toDate');	
		$class_section 		= $this->input->post('class_section');	

		if($class_section == 'kg')
		   $where =  "(class_id ='13' OR class_id ='16' OR class_id ='15' OR class_id ='1' OR class_id ='2' OR class_id ='3' OR class_id ='4' OR class_id ='5') AND branch_id ='$branch_id' AND date >='$fromDate' AND date <= '$toDate'";


        if($class_section == 'high')
		   $where =  "(class_id ='6' OR class_id ='7' OR class_id ='8' OR class_id ='9' OR class_id ='10') AND branch_id ='$branch_id' AND date >='$fromDate' AND date <= '$toDate'";



		if($class_section == 'college')
		   $where =  "(class_id ='11' OR class_id ='12') AND branch_id ='$branch_id' AND date >='$fromDate' AND date <= '$toDate'";





	    $chkHolyday   = $this->M_crud_ayenal->findById('attendence_information', $where);
		
		if(!empty($chkHolyday)){
			echo"notpermission";
		}else{
		   $chkHolyExistday = $this->M_crud_ayenal->findById('day_to_day_holyday_manage', array('branch_id' => $branch_id, 'class_section' => $class_section, 'holyday_date >=' => $fromDate, 'holyday_date <=' => $toDate, 'holy_auto_id !=' => $id));

		    if(!empty($chkHolyExistday))
                echo"duplicated";	
            else
            	echo"permission";	
		    
		}
	   
	}


	public function holydayDelete($id)
	{	
		$where     = array('id' => $id);

		$this->db->delete('day_to_day_holyday_manage', array('holy_auto_id' => $id));  
		$this->M_crud_ayenal->destroy('holyday_setup', $where);
		redirect ('attendence/setupHoliday');
	}

	




	
	
	

}


