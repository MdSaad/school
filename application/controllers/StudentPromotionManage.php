<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentPromotionManage extends CI_Controller {

	const  Title	 = 'SMSC-Admin Panel';
	
	static $model 	 = array('M_admin', 'M_crud', 'M_join', 'M_crud_ayenal', 'M_join_ayenal');
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
		$data['branch_id']		= $this->input->post('branch_id');
		$data['class_id']		= $this->input->post('class_id');
		$data['group_id']		= $this->input->post('group_id');
		$data['section_id']		= $this->input->post('section_id');
		$data['shift_id']		= $this->input->post('shift_id');
		$data['year']			= $this->input->post('year');

		if($data['class_id'] == 13)
			$promotionClassId = 15;
		else if($data['class_id'] == 15)
			$promotionClassId = 1;
		else if($data['class_id'] == 16)
			$promotionClassId = 15;
		else
			$promotionClassId = $data['class_id'] + 1;

		$promotionYear 			= $data['year'] +1;
        $promotionWhere         = array('class_wise_info.branc_id' => $data['branch_id'], 'class_wise_info.class_id' => $promotionClassId,'class_wise_info.class_group_id' => $data['group_id'],'class_wise_info.class_section_id' => $data['section_id'],'class_wise_info.class_shift_id' => $data['shift_id'], 'class_wise_info.year' => $promotionYear);

		
		
		$data['stuDataList'] 	=  $this->M_join->findAllPromoteStudentInfo($table = 'class_wise_info', $where = array('class_wise_info.branc_id' => $data['branch_id'], 'class_wise_info.class_id' => $data['class_id'],'class_wise_info.class_group_id' => $data['group_id'],'class_wise_info.class_section_id' => $data['section_id'],'class_wise_info.class_shift_id' => $data['shift_id'], 'class_wise_info.year' => $data['year']), $orderBy = 'class_wise_info.class_roll', $serialized = 'asc', $promotionWhere);
        
		  $this->load->view('studentInfo/promotionStudentListDataPage', $data);
       
	}

	public function promotionDataStore() {

		$data['branc_id']			= $this->input->post('branch_id');
		$class_id					= $this->input->post('class_id');
		$data['class_group_id']		= $this->input->post('group_id');
		$data['class_section_id']	= $this->input->post('section_id');
		$data['class_shift_id']		= $this->input->post('shift_id');
		$year						= $this->input->post('year');

		$stu_auto_id_list		    = $this->input->post('getStuId');
		$promotion_roll_list		= $this->input->post('promotion_roll');
		$exit_data_list		        = $this->input->post('promotion_chk');
		$gender_data_list		    = $this->input->post('getStuSex');

		$promotionYear 				= $year +1;

		if($class_id == 13)
			$promotionClassId = 16;
		else if($class_id == 16)
			$promotionClassId = 15;
		else if($class_id == 15)
		    $promotionClassId = 1;
		else
			$promotionClassId = $class_id + 1;

		$findBranchCode			= $this->M_crud->findById('branch_list_manage', array('id'=>$data['branc_id']));
		$findClassCode			= $this->M_crud->findById('class_list_manage', 	array('id'=>$promotionClassId));
		$findShiftCode			= $this->M_crud->findById('shift_list_manage', 	array('id'=>$data['class_shift_id']));
		$findGroupCode			= $this->M_crud->findById('group_list_manage',  array('id'=>$data['class_group_id']));
		$findSectionCode		= $this->M_crud->findById('section_list_manage', array('id'=>$data['class_section_id']));


		$expectedClassCode = $findClassCode->class_code;
		if($expectedClassCode == "13") {
			$classCode = "PL";
		} else if($expectedClassCode == "14") {
			$classCode = "NU";
		} else if($expectedClassCode == "15") {
			$classCode = "SH";
		} else {
			$classCode = $findClassCode->class_code;
		}

		$LastTwoDigitYear = substr((string)$promotionYear,-2); 

        
        foreach($promotion_roll_list as $k=>$v) {
        	if($promotion_roll_list[$k] && $stu_auto_id_list[$k] && $gender_data_list[$k]){
		        $data['stu_auto_id'] = $stu_auto_id_list[$k];
		        $data['stu_id'] = $findBranchCode->branch_code.$classCode.$findGroupCode->group_code.$findSectionCode->section_code.$findShiftCode->id.$LastTwoDigitYear.$gender_data_list[$k].$promotion_roll_list[$k];
		        
		        $data['class_roll']	 = $promotion_roll_list[$k];
		        $data['class_id']	     = $promotionClassId;
		        $data['class_sl_no']	 = $findClassCode->sl_no;
		        $data['year']	    	 = $promotionYear;
		        $data['date']	    	 = date('Y-m-d');
		        $data['student_type']    = "promotted";
		        $data2['stu_current_id'] = $data['stu_id'];

		       $this->db->update('stu_basic_info', $data2, array('id' => $data['stu_auto_id'])); 

		       if($exit_data_list[$k]){
		           $this->db->update('class_wise_info', $data, array('stu_auto_id' => $stu_auto_id_list[$k], 'year' => $promotionYear, 'student_type' =>"promotted")); 
		       } else{
		       	  $this->db->insert('class_wise_info', $data); 
		       }
		    }
		        
		          
        	
        }

		  echo '<div class="alert alert-block alert-success ">
			<button class="close" data-dismiss="alert" type="button">
			<i class="ace-icon fa fa-times"></i>
			</button>
			<strong class="green">
			<i class="ace-icon fa fa-check-square-o"></i>
			
			</strong>
			<span class="alrtText">Student Promotion Submitted Successfully. Try Again Click "Again Initialize"</span>
			</div>';
      

	}


	public function chkStuId()
	{
		
		$stuId	    	= $this->input->post('stuId');
		$stuSex			= $this->input->post('stuSex');
		$promotionRoll	= $this->input->post('promotionRoll');
		$branch_id		= $this->input->post('branch_id');
		$class_id		= $this->input->post('class_id');
		$group_id		= $this->input->post('group_id');
		$section_id		= $this->input->post('section_id');
		$shift_id		= $this->input->post('shift_id');
		$year			= $this->input->post('year');
		$promo_chk	    = $this->input->post('promo_chk');

		if($stuSex =='M')
		   $alterSex = 'F';
	    else
	       $alterSex = 'M';
 

        $promotionYear 	= $year +1;
        if($class_id == 13)
			$promotionClassId = 15;
		else if($class_id == 15)
			$promotionClassId = 1;
		else if($class_id == 16)
			$promotionClassId = 15;
		else
			$promotionClassId = $class_id + 1;




		$findBranchCode			= $this->M_crud->findById('branch_list_manage', array('id'=>$branch_id));
		$findClassCode			= $this->M_crud->findById('class_list_manage', 	array('id'=>$promotionClassId));
		$findShiftCode			= $this->M_crud->findById('shift_list_manage', 	array('id'=>$shift_id));
		$findGroupCode			= $this->M_crud->findById('group_list_manage',  array('id'=>$group_id));
		$findSectionCode		= $this->M_crud->findById('section_list_manage', array('id'=>$section_id));


		$expectedClassCode = $findClassCode->class_code;
		if($expectedClassCode == "13") {
			$classCode = "PL";
		} else if($expectedClassCode == "14") {
			$classCode = "NU";
		} else if($expectedClassCode == "15") {
			$classCode = "SH";
		} else {
			$classCode = $findClassCode->class_code;
		}
        
		 $LastTwoDigitYear = substr((string)$promotionYear,-2); 
	


        $stu_id = $findBranchCode->branch_code.$classCode.$findGroupCode->group_code.$findSectionCode->section_code.$findShiftCode->id.$LastTwoDigitYear.$stuSex.$promotionRoll;
        $stu_id_opsit  = $findBranchCode->branch_code.$classCode.$findGroupCode->group_code.$findSectionCode->section_code.$findShiftCode->id.$LastTwoDigitYear.$alterSex.$promotionRoll;

       

		if(!empty($promo_chk)){
		   $chkStuId    =  $this->M_crud->findById('stu_basic_info',array('stu_current_id'=>$stu_id, 'id !=' => $stuId));
		   $chkStuId2   =  $this->M_crud->findById('stu_basic_info',array('stu_current_id'=>$stu_id_opsit, 'id !=' => $stuId));

		}else{
		   $chkStuId    =  $this->M_crud->findById('stu_basic_info',array('stu_current_id'=>$stu_id));
		   $chkStuId2   =  $this->M_crud->findById('stu_basic_info',array('stu_current_id'=>$stu_id_opsit));

		}
        
		if(!empty($chkStuId->stu_current_id) || !empty($chkStuId2->stu_current_id)) echo 'exit';
		
	}



	public function studentTransferDataView()
	{
		
		$stuId	    	    = trim($this->input->post('stuId'));
		$data['stuInfo']   	= $this->M_join->findStuInfoByIDClassWise('class_wise_info', array('class_wise_info.stu_id' =>$stuId));	

        $where 				= array();
		$authorID 			= $this->session->userid;
		$authorType 		= $this->session->usertype;
		$authorBranchID 	= $this->session->authorBranchID;
		$orderBy            = 'id';
		$serialized         = 'asc';

		if($authorType == "superadmin" ) {
		   $data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		   $data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, $order = 'sl_no', $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);


		$this->load->view('studentInfo/studentTransferDataViewPage', $data);
    }




   public function generateTransferClassRoll()
	{
		$stu_id						= $this->input->post('stu_id');
		$year						= $this->input->post('year');
		$branc_id					= $this->input->post('branc_id');
		$class_id					= $this->input->post('class_id');
		$class_group_id				= $this->input->post('class_group_id');
		$class_section_id			= $this->input->post('class_section_id');
		$class_shift_id				= $this->input->post('class_shift_id');
		
		
		$table = 'class_wise_info';

		$where = array('branc_id' => $branc_id, 'class_id' => $class_id, 'class_group_id' => $class_group_id, 'class_section_id' => $class_section_id, 'class_shift_id' => $class_shift_id, 'year'=>$year);

		$studentTransferDetails   = $this->M_crud->findById('class_wise_info', $where);
		$studentCurrentDetails    = $this->M_crud->findById('class_wise_info', array('stu_id' => $stu_id));
		
		      if($class_id == $studentCurrentDetails->class_id){
					if(!empty($studentTransferDetails)){
						  if($studentTransferDetails->stu_auto_id  != $studentCurrentDetails->stu_auto_id){       		
							$maxRoll =  $this->M_crud->findMax($table, $where, $fieldName = 'class_roll');
							if(empty($maxRoll->class_roll)) {
								  $expectedRoll =	array('expectedRoll' => 1);	
							} else {
								$expectedRoll   = array('expectedRoll' => $maxRoll->class_roll+1);
							}
							
							
							if($expectedRoll['expectedRoll'] < 10) {
								$expectedRoll = array('expectedRoll' => "0".$expectedRoll['expectedRoll']);
							}
							
							echo json_encode($expectedRoll);
						}else{
						   $errorValue  = array('errorValue' => "Sorry! current and transfer information is same please change transfer information");	 
						   echo json_encode($errorValue);
						}
					}else{
						$maxRoll =  $this->M_crud->findMax($table, $where, $fieldName = 'class_roll');
						if(empty($maxRoll->class_roll)) {
							  $expectedRoll =	array('expectedRoll' => 1);	
						} else {
							$expectedRoll   = array('expectedRoll' => $maxRoll->class_roll+1);
						}
						
						
						if($expectedRoll['expectedRoll'] < 10) {
							$expectedRoll = array('expectedRoll' => "0".$expectedRoll['expectedRoll']);
						}
						
						echo json_encode($expectedRoll);
					}
			}else{
			   $errorValue  = array('errorValue' => "Sorry! you can't transfer a student from one class to another classs please change transfer information");	 
			   echo json_encode($errorValue);
			}
		 



		 
	}



	public function stuTransferActionStore()
	{
		$stu_id	    				= trim($this->input->post('stu_id'));
		$stuSex						= $this->input->post('stu_sex');
		$data['class_roll']			= $this->input->post('class_roll');
		$data['branc_id']			= $this->input->post('branch_id');
		$data['class_id']			= $this->input->post('class_id');
		$data['class_group_id']		= $this->input->post('group_id');
		$data['class_section_id']	= $this->input->post('section_id');
		$data['class_shift_id']		= $this->input->post('shift_id');
		$data['year']				= $this->input->post('year');
		$data['date']	    	    = date('Y-m-d');
		


		$findBranchCode			= $this->M_crud->findById('branch_list_manage', array('id'=>$data['branc_id']));
		$findClassCode			= $this->M_crud->findById('class_list_manage', 	array('id'=>$data['class_id']));
		$findShiftCode			= $this->M_crud->findById('shift_list_manage', 	array('id'=>$data['class_shift_id']));
		$findGroupCode			= $this->M_crud->findById('group_list_manage',  array('id'=>$data['class_group_id']));
		$findSectionCode		= $this->M_crud->findById('section_list_manage', array('id'=>$data['class_section_id']));


		$expectedClassCode = $findClassCode->class_code;
		if($expectedClassCode == "13") {
			$classCode = "PL";
		} else if($expectedClassCode == "14") {
			$classCode = "NU";
		} else if($expectedClassCode == "15") {
			$classCode = "SH";
		} else {
			$classCode = $findClassCode->class_code;
		}
        
        
		 $LastTwoDigitYear = substr((string)$data['year'],-2); 
	


        $data['stu_id'] = $findBranchCode->branch_code.$classCode.$findGroupCode->group_code.$findSectionCode->section_code.$findShiftCode->id.$LastTwoDigitYear.$stuSex.$data['class_roll'];

        $stuInfo   = $this->M_crud->findById('class_wise_info', array('stu_id'=>$stu_id));
       
        $data2['stu_current_id'] =  $data['stu_id']; 

        $this->db->update('class_wise_info', $data, array('class_wise_auto_id' => $stuInfo->class_wise_auto_id)); 
        $this->db->update('stu_basic_info', $data2, array('id' => $stuInfo->stu_auto_id)); 
        
      

    }

	
	




	
	
	










}


