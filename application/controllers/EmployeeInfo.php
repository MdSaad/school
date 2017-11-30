<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeInfo extends CI_Controller {

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
		$data['title'] = 'VMGPS&#65515;Employee Information Managment';
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

		$this->load->view('employeeInfo/empSubModulePage', $data);
	}


	public function empBasicInfo()
	{
		$data['title'] = 'VMGPS&#65515;Employee Basic Information';
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
		
		
		$data['domainListInfo'] 		=  $this->M_crud->findAll('domain_list_manage', $where, $orderBy, $serialized);
		//$data['branchList'] 			=  $this->M_crud->findAll('emp_branch_manage', $where, $orderBy, $serialized);
		//$data['zoneListInfo'] 			=  $this->M_crud->findAll('zone_list_manage', $where, $orderBy, $serialized);
		$data['nationalityListInfo'] 	=  $this->M_crud->findAll('nationality_list_manage', $where, $orderBy, $serialized);
		$data['religionListInfo'] 		=  $this->M_crud->findAll('religion_list_manage', $where, $orderBy, $serialized);
		//$data['departmentListInfo'] 	=  $this->M_crud->findAll('department_list_manage', $where, $orderBy, $serialized);
		//$data['designitionListInfo'] 	=  $this->M_crud->findAll('designition_list_manage', $where, $orderBy, $serialized);
		$data['placeListInfo'] 			=  $this->M_crud->findAll('birth_place_list_manage', $where, $orderBy, $serialized);
		$data['jobTypeListInfo'] 		=  $this->M_crud->findAll('initiate_job_type', $where, $orderBy, $serialized);

		$this->load->view('employeeInfo/empBasicInfoPage', $data);
	}



	public function empEssentialInfo()
	{
		$data['title'] = 'VMGPS&#65515;Employee Essential Information';
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

		$data['bankListInfo'] 			=  $this->M_crud->findAll('bank_list_manage', $where, $orderBy, $serialized);
		$data['bankBranchListInfo'] 	=  $this->M_crud->findAll('bank_branch_list_manage', $where, $orderBy, $serialized);

		$this->load->view('employeeInfo/empEssentialInfoPage', $data);
	}

	public function empEditInfo()
	{
		$data['title'] = 'VMGPS&#65515;Employee Information Edit';
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

		$this->load->view('employeeInfo/empEditInfoPage', $data);
	}


	public function empEditInfoChk()
	{
		
		$empID    						=  $this->input->post('empID');	
	    $year    						=  $this->input->post('year');	
		$chkEditInfo 					=  $this->M_crud_ayenal->findById('employee_basic_information', array('employee_id' => $empID, '	year' => $year));

		if(!empty($chkEditInfo)){
			$this->session->set_userdata(array('empEditId' => $empID));
			echo "1";
		} else {
			echo "0";
		}
		
		
	}


	public function basicInfoEdit()
	{
		$data['title'] = 'VMGPS&#65515;Basic Information Edit';
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

		$editId                         = $this->session->userdata('empEditId');
		$data['empBasicEditInfo']       = $this->M_crud_ayenal->findById('employee_basic_information', array('employee_id' => $editId));
		$data['domainName']             = $this->M_crud_ayenal->findById('domain_list_manage', array('id' => $data['empBasicEditInfo']->domain_id));
		
		$data['empBranchList'] 			=  $this->M_crud->findAll('emp_branch_manage', array('domain_id' => $data['empBasicEditInfo']->domain_id), $orderBy, $serialized);
		$data['zoneListInfo'] 			=  $this->M_crud->findAll('zone_list_manage', array('domain_id' => $data['empBasicEditInfo']->domain_id), $orderBy, $serialized);
		$data['departmentListInfo'] 	=  $this->M_crud->findAll('department_list_manage', array('domain_id' => $data['empBasicEditInfo']->domain_id), $orderBy, $serialized);
		$data['designitionListInfo'] 	=  $this->M_crud->findAll('designition_list_manage', array('domain_id' => $data['empBasicEditInfo']->domain_id), $orderBy, $serialized);
		$data['nationalityListInfo'] 	=  $this->M_crud->findAll('nationality_list_manage', $where, $orderBy, $serialized);
		$data['religionListInfo'] 		=  $this->M_crud->findAll('religion_list_manage', $where, $orderBy, $serialized);
		$data['placeListInfo'] 			=  $this->M_crud->findAll('birth_place_list_manage', $where, $orderBy, $serialized);
		$data['jobTypeListInfo'] 		=  $this->M_crud->findAll('initiate_job_type', $where, $orderBy, $serialized);


		$this->load->view('employeeInfo/empBasicInfoEditPage', $data);
	}


    public function essentialInfoEdit()
	{
		$data['title'] = 'VMGPS&#65515;Essential Information Edit';
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

		$editId                         = $this->session->userdata('empEditId');
		$empInfo   						= $this->M_crud_ayenal->findById('employee_basic_information', array('employee_id' => $editId));
		$data['empEssentialEditInfo']   = $this->M_crud_ayenal->findById('employee_essential_information', array('emp_auto_id' => $empInfo->id));
		
		$data['bankListInfo'] 			=  $this->M_crud->findAll('bank_list_manage', $where, $orderBy, $serialized);
		$data['bankBranchListInfo'] 	=  $this->M_crud->findAll('bank_branch_list_manage', $where, $orderBy, $serialized);


		$this->load->view('employeeInfo/essentialInfoEditPage', $data);
	}



	public function empInfoEditModule()
	{
		$data['title'] = 'VMGPS&#65515;Employee Information Edit Module';
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

		$this->load->view('employeeInfo/empInfoEditModulePage', $data);
	}





	public function empIdGenerate()
	{
	   $domainId    =  $this->input->post('domainId');	

	   $findMaxId   = $this->M_crud_ayenal->findMax('employee_basic_information', array('domain_id' => $domainId), 'employee_id');

	   if(!empty($findMaxId->employee_id)){
	   	  $empId   = $findMaxId->employee_id + 1; 
	   }else{
	   	$findEmpIdCode   = $this->M_crud_ayenal->findById('domain_list_manage', array('id' => $domainId));  
	   	$empId     = $findEmpIdCode->domain_code."000001"; 

	   }
	   
	  echo '<label class="control-label col-sm-1" for="employee_id">ID :</label>';
	  echo  '<div class="col-sm-4">
			<input readonly="readonly" type="text" class="form-control" name="employee_id" id="employee_id" value="'.$empId.'"/>
	  </div>';

		
	}



	public function empBasicInfoStore()
	{
	   $data['domain_id']    				=  $this->input->post('domain_id');	
	   $data['employee_id']    				=  $this->input->post('employee_id');	
	   $data['employee_full_name']    		=  $this->input->post('employee_full_name');	
	   $data['father_name']    				=  $this->input->post('father_name');	
	   $data['nationality']    				=  $this->input->post('nationality');	
	   $data['mother_name']    				=  $this->input->post('mother_name');	
	   $data['religion']    				=  $this->input->post('religion');	
	   $data['branch_id']    				=  $this->input->post('branch_id');	
	   $data['zone_id']    					=  $this->input->post('zone_id');	
	   $data['department_id']    			=  $this->input->post('department_id');	
	   $data['eduication_qualification']    =  $this->input->post('eduication_qualification');	
	   $data['designition_id']    			=  $this->input->post('designition_id');	
	   $data['area_of_exprience']    		=  $this->input->post('area_of_exprience');
	   $data['date_of_birth']    			=  $this->input->post('date_of_birth');	
	   $data['university_institute']    	=  $this->input->post('university_institute');	
	   $data['place_of_birth']    			=  $this->input->post('place_of_birth');	
	   $data['initiate_joining_date']    	=  $this->input->post('initiate_joining_date');	
	   $data['confirmation_date']    		=  $this->input->post('confirmation_date');	
	   $data['mobile_no']    				=  $this->input->post('mobile_no');	
	   $data['phone_no']    				=  $this->input->post('phone_no');	
	   $data['appointment_date']    		=  $this->input->post('appointment_date');	
	   $data['email']    					=  $this->input->post('email');	
	   $data['initiate_job_type']    		=  $this->input->post('initiate_job_type');	
	   $data['present_address']    			=  $this->input->post('present_address');	
	   $data['job_status_change_date']    	=  date('Y-m-d');	
	   $data['permanent_address']    		=  $this->input->post('permanent_address');	
	   $data['job_status']    				=  $this->input->post('job_status');	
	   $data['work_shift']    				=  $this->input->post('work_shift');	
	   $data['maritus_status']    			=  $this->input->post('maritus_status');	
	   $data['job_location']    			=  $this->input->post('job_location');	
	   $data['gender']    					=  $this->input->post('gender');
	   $data['emp_insert_date']    			=  date('Y-m-d');	
	   $data['year']    					=  date('Y');	
	   $emp_photo    						=  $this->input->post('emp_photo');	

	   if(!empty($emp_photo)){
	   	 $data['emp_photo']     			= $emp_photo;
	   }

	    $this->M_crud_ayenal->save('employee_basic_information', $data);  

		
	}



	public function empBasicInfoEditAction()
	{
	   $basic_edit_id    					=  $this->input->post('basic_edit_id');	
	   $data['employee_full_name']    		=  $this->input->post('employee_full_name');	
	   $data['father_name']    				=  $this->input->post('father_name');	
	   $data['nationality']    				=  $this->input->post('nationality');	
	   $data['mother_name']    				=  $this->input->post('mother_name');	
	   $data['religion']    				=  $this->input->post('religion');	
	   $data['branch_id']    				=  $this->input->post('branch_id');	
	   $data['zone_id']    					=  $this->input->post('zone_id');	
	   $data['department_id']    			=  $this->input->post('department_id');	
	   $data['eduication_qualification']    =  $this->input->post('eduication_qualification');	
	   $data['designition_id']    			=  $this->input->post('designition_id');	
	   $data['area_of_exprience']    		=  $this->input->post('area_of_exprience');
	   $data['date_of_birth']    			=  $this->input->post('date_of_birth');	
	   $data['university_institute']    	=  $this->input->post('university_institute');	
	   $data['place_of_birth']    			=  $this->input->post('place_of_birth');	
	   $data['initiate_joining_date']    	=  $this->input->post('initiate_joining_date');	
	   $data['confirmation_date']    		=  $this->input->post('confirmation_date');	
	   $data['mobile_no']    				=  $this->input->post('mobile_no');	
	   $data['phone_no']    				=  $this->input->post('phone_no');	
	   $data['appointment_date']    		=  $this->input->post('appointment_date');	
	   $data['email']    					=  $this->input->post('email');	
	   $data['initiate_job_type']    		=  $this->input->post('initiate_job_type');	
	   $data['present_address']    			=  $this->input->post('present_address');	
	   $data['job_status_change_date']    	=  date('Y-m-d');
	   $data['permanent_address']    		=  $this->input->post('permanent_address');	
	   $data['job_status']    				=  $this->input->post('job_status');	
	   $data['work_shift']    				=  $this->input->post('work_shift');	
	   $data['maritus_status']    			=  $this->input->post('maritus_status');	
	   $data['job_location']    			=  $this->input->post('job_location');	
	   $data['gender']    					=  $this->input->post('gender');
	   $data['year']    					=  date('Y');	
	   $emp_photo    						=  $this->input->post('emp_photo');	

	   if(!empty($emp_photo)){
	   	 $data['emp_photo']     			= $emp_photo;
	   }


	   $basicEditinfo = $this->M_crud_ayenal->findById('employee_basic_information', array('id' => $basic_edit_id));
				
		if( !empty($basicEditinfo->emp_photo) && file_exists('./resource/emp_photo/'.$basicEditinfo->emp_photo) && !empty($emp_photo) ) {					
			unlink('./resource/emp_photo/'.$basicEditinfo->emp_photo);	
		}
		   $this->M_crud_ayenal->update('employee_basic_information', $data, array('id' => $basic_edit_id));

		   $this->session->set_userdata(array('empEditId' => ""));

		
	}




	public function empEssentialInfoStore()
	{
	   $emp_id    							=  $this->input->post('emp_id');
	   $empDetails                          =  $this->M_crud_ayenal->findById('employee_basic_information', array('employee_id' => $emp_id));  
	   $data['emp_auto_id']    				=  $empDetails->id;	
	   $data['bank_id']    					=  $this->input->post('bank_id');	
	   $data['blood_group']    				=  $this->input->post('blood_group');	
	   $data['bank_list']    				=  $this->input->post('bank_list');	
	   $data['bank_branch_id']    			=  $this->input->post('bank_branch_id');	
	   $data['driving_licence']    			=  $this->input->post('driving_licence');	
	   $data['type_of_licence']    			=  $this->input->post('type_of_licence');	
	   $data['address']    					=  $this->input->post('address');	
	   $data['passport_no']    				=  $this->input->post('passport_no');	
	   $data['account_no']    				=  $this->input->post('account_no');	
	   $data['passport_issu_date']    		=  $this->input->post('passport_issu_date');	
	   $data['type_of_account']    			=  $this->input->post('type_of_account');	
	   $data['visited_country']    			=  $this->input->post('visited_country');	
	   $data['nid']    						=  $this->input->post('nid');
	   $data['tin']    						=  $this->input->post('tin');	


	    $this->M_crud_ayenal->save('employee_essential_information', $data);  

		
	}



	public function empEssentialInfoUpdateAction()
	{
	   $essential_edit_id    			    =  $this->input->post('essential_edit_id');
	   
	   $data['bank_id']    					=  $this->input->post('bank_id');	
	   $data['blood_group']    				=  $this->input->post('blood_group');	
	   $data['bank_list']    				=  $this->input->post('bank_list');	
	   $data['bank_branch_id']    			=  $this->input->post('bank_branch_id');	
	   $data['driving_licence']    			=  $this->input->post('driving_licence');	
	   $data['type_of_licence']    			=  $this->input->post('type_of_licence');	
	   $data['address']    					=  $this->input->post('address');	
	   $data['passport_no']    				=  $this->input->post('passport_no');	
	   $data['account_no']    				=  $this->input->post('account_no');	
	   $data['passport_issu_date']    		=  $this->input->post('passport_issu_date');	
	   $data['type_of_account']    			=  $this->input->post('type_of_account');	
	   $data['visited_country']    			=  $this->input->post('visited_country');	
	   $data['nid']    						=  $this->input->post('nid');
	   $data['tin']    						=  $this->input->post('tin');	

	   $this->M_crud_ayenal->update('employee_essential_information', $data, array('emp_auto_id' => $essential_edit_id));

	   $this->session->set_userdata(array('empEditId' => ""));
   
		
	}







	public function branchInfoStore()
	{
		
		$id							= $this->input->post('branch_id_edit');
		$domain_id					= $this->input->post('domain_id_in');
		if(!empty($domain_id)){
		   $data['domain_id']		= $domain_id;
		}
		$data['branch_name']		= $this->input->post('branchName');
		
		$table = 'emp_branch_manage';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		if(!empty($id)){
				$this->M_crud_ayenal->update('emp_branch_manage', $data, array('id' => $id));
			}else{
				if($data['branch_name'] !=''){
				   $lastId      =  $this->M_crud_ayenal->save($table, $data); 
				}
			}
		
		   
			$branchList   = $this->M_crud_ayenal->findAll('emp_branch_manage', array('domain_id' =>$domain_id), $orderBy, $serialized);	
			
			if(!empty($id)){
			   echo '<option value="">Select Branch</option>';
			   foreach($branchList as $v) {
				if($id == $v->id){
				  echo '<option value="'.$v->id.'" data-branch-name="'.$v->branch_name.'" selected>'.$v->branch_name.'</option>';
			    }else{
				  echo '<option value="'.$v->id.'" data-branch-name="'.$v->branch_name.'">'.$v->branch_name.'</option>';
			    }
			}
			
			}else{			
	
			echo '<option value="">Select Branch</option>';
			foreach($branchList as $v) {
				if($lastId == $v->id){
				  echo '<option value="'.$v->id.'" data-branch-name="'.$v->branch_name.'" selected>'.$v->branch_name.'</option>';
			    }else{
				  echo '<option value="'.$v->id.'" data-branch-name="'.$v->branch_name.'">'.$v->branch_name.'</option>';
			    }
			}
			
		}
			
		
	}





	public function zoneInfoStore()
	{
		
		$id							= $this->input->post('zone_id_edit');
		$domain_id					= $this->input->post('domain_id_in');
		if(!empty($domain_id)){
		   $data['domain_id']		= $domain_id;
		}
		$data['zone_name']			= $this->input->post('zoneName');
		
		$table = 'zone_list_manage';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		if(!empty($id)){
				$this->M_crud_ayenal->update('zone_list_manage', $data, array('id' => $id));
			}else{
				if($data['zone_name'] !=''){
				   $lastId      =  $this->M_crud_ayenal->save($table, $data); 
				}
			}
		
		   
			$branchList   = $this->M_crud_ayenal->findAll('zone_list_manage', array('domain_id' =>$domain_id), $orderBy, $serialized);	
			
			if(!empty($id)){
			   echo '<option value="">Select Zone</option>';
			   foreach($branchList as $v) {
				if($id == $v->id){
				  echo '<option value="'.$v->id.'" data-zone-name="'.$v->zone_name.'" selected>'.$v->zone_name.'</option>';
			    }else{
				  echo '<option value="'.$v->id.'" data-zone-name="'.$v->zone_name.'">'.$v->zone_name.'</option>';
			    }
			}
			
			}else{			
	
			echo '<option value="">Select Zone</option>';
			foreach($branchList as $v) {
				if($lastId == $v->id){
				  echo '<option value="'.$v->id.'" data-zone-name="'.$v->zone_name.'" selected>'.$v->zone_name.'</option>';
			    }else{
				  echo '<option value="'.$v->id.'" data-zone-name="'.$v->zone_name.'">'.$v->zone_name.'</option>';
			    }
			}
			
		}
			
		
	}



	


	


	public function domainInfoStore()
	{
		
		$id								= $this->input->post('domain_id_edit');
		$data['domain_name']			= $this->input->post('domainName');
		$data['domain_code']			= $this->input->post('domainCode');
		
		$table = 'domain_list_manage';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		if(!empty($id)){
				$this->M_crud_ayenal->update('domain_list_manage', $data, array('id' => $id));
			}else{
				if($data['domain_name'] !=''){
				   $lastId      =  $this->M_crud_ayenal->save($table, $data); 
				}
			}
		
		   
			$domainList   = $this->M_crud_ayenal->findAll('domain_list_manage', $where, $orderBy, $serialized);	
			
			if(!empty($id)){
			   echo '<option value="">Select Domain</option>';
			   foreach($domainList as $v) {
				if($id == $v->id){
				  echo '<option value="'.$v->id.'" data-domain-name="'.$v->domain_name.'" data-domain-code="'.$v->domain_code.'" selected>'.$v->domain_name.'</option>';
			    }else{
				  echo '<option value="'.$v->id.'" data-domain-code="'.$v->domain_code.'" data-domain-name="'.$v->domain_name.'">'.$v->domain_name.'</option>';
			    }
			}
			
			}else{			
	
			echo '<option value="">Select Domain</option>';
			foreach($domainList as $v) {
				if($lastId == $v->id){
				  echo '<option value="'.$v->id.'" data-domain-name="'.$v->domain_name.'" data-domain-code="'.$v->domain_code.'" selected>'.$v->domain_name.'</option>';
			    }else{
				  echo '<option value="'.$v->id.'" data-domain-name="'.$v->domain_name.'" data-domain-code="'.$v->domain_code.'">'.$v->domain_name.'</option>';
			    }
			}
			
		}
			
		
	}





	public function departmenInfoStore()
	{
		
		$id								= $this->input->post('depart_id_edit');
		$domain_id						= $this->input->post('domain_id_in');
		if(!empty($domain_id)){
		   $data['domain_id']			= $domain_id;
		}
		$data['department_name']		= $this->input->post('departmentName');
		
		
		$table = 'department_list_manage';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		if(!empty($id)){
				$this->M_crud_ayenal->update('department_list_manage', $data, array('id' => $id));
			}else{
				if($data['department_name'] !=''){
				   $lastId      =  $this->M_crud_ayenal->save($table, $data); 
				}
			}
		
		   
			$departmentList   = $this->M_crud_ayenal->findAll('department_list_manage', array('domain_id' =>$domain_id), $orderBy, $serialized);	
			
			if(!empty($id)){
			   echo '<option value="">Select Department</option>';
			   foreach($departmentList as $v) {
				if($id == $v->id){
				  echo '<option value="'.$v->id.'" data-department-name="'.$v->department_name.'" selected>'.$v->department_name.'</option>';
			    }else{
				  echo '<option value="'.$v->id.'" data-department-name="'.$v->domain_name.'">'.$v->domain_name.'</option>';
			    }
			}
			
			}else{			
	
			echo '<option value="">Select Department</option>';
			foreach($departmentList as $v) {
				if($lastId == $v->id){
				  echo '<option value="'.$v->id.'" data-department-name="'.$v->department_name.'" selected>'.$v->department_name.'</option>';
			    }else{
				  echo '<option value="'.$v->id.'" data-department-name="'.$v->department_name.'">'.$v->department_name.'</option>';
			    }
			}
			
		}
			
		
	}




  public function designitionInfoStore()
	{
		
		$id								= $this->input->post('desig_id_edit');
		$domain_id						= $this->input->post('domain_id_in');
		if(!empty($domain_id)){
		   $data['domain_id']			= $domain_id;
		}
		$data['designition_name']		= $this->input->post('designitionName');
		
		
		$table = 'designition_list_manage';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		if(!empty($id)){
				$this->M_crud_ayenal->update('designition_list_manage', $data, array('id' => $id));
			}else{
				if($data['designition_name'] !=''){
				   $lastId      =  $this->M_crud_ayenal->save($table, $data); 
				}
			}
		
		   
			$designitionList   = $this->M_crud_ayenal->findAll('designition_list_manage', array('domain_id' =>$domain_id), $orderBy, $serialized);	
			
			if(!empty($id)){
			   echo '<option value="">Select Designition</option>';
			   foreach($designitionList as $v) {
				if($id == $v->id){
				  echo '<option value="'.$v->id.'" data-designition-name="'.$v->designition_name.'" selected>'.$v->designition_name.'</option>';
			    }else{
				  echo '<option value="'.$v->id.'" data-designition-name="'.$v->designition_name.'">'.$v->designition_name.'</option>';
			    }
			}
			
			}else{			
	
			echo '<option value="">Select Designition</option>';
			foreach($designitionList as $v) {
				if($lastId == $v->id){
				  echo '<option value="'.$v->id.'" data-designition-name="'.$v->designition_name.'" selected>'.$v->designition_name.'</option>';
			    }else{
				  echo '<option value="'.$v->id.'" data-designition-name="'.$v->designition_name.'">'.$v->designition_name.'</option>';
			    }
			}
			
		}
			
		
	}



	


	public function placeOfBirthInfoStore()
	{
		
		$id								= $this->input->post('place_id_edit');
		$data['place_name']				= $this->input->post('placeName');
		
		
		$table = 'birth_place_list_manage';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		if(!empty($id)){
				$this->M_crud_ayenal->update('birth_place_list_manage', $data, array('id' => $id));
			}else{
				if($data['place_name'] !=''){
				   $lastId      =  $this->M_crud_ayenal->save($table, $data); 
				}
			}
		
		   
			$placeList   = $this->M_crud_ayenal->findAll('birth_place_list_manage', $where, $orderBy, $serialized);	
			
			if(!empty($id)){
			   echo '<option value="">Select Place</option>';
			   foreach($placeList as $v) {
				if($id == $v->id){
				  echo '<option value="'.$v->id.'" data-place-name="'.$v->place_name.'" selected>'.$v->place_name.'</option>';
			    }else{
				  echo '<option value="'.$v->id.'" data-place-name="'.$v->place_name.'">'.$v->place_name.'</option>';
			    }
			}
			
			}else{			
	
			echo '<option value="">Select Place</option>';
			foreach($placeList as $v) {
				if($lastId == $v->id){
				  echo '<option value="'.$v->id.'" data-place-name="'.$v->place_name.'" selected>'.$v->place_name.'</option>';
			    }else{
				  echo '<option value="'.$v->id.'" data-place-name="'.$v->place_name.'">'.$v->place_name.'</option>';
			    }
			}
			
		}
			
		
	}





	public function nationalityInfoStore()
	{
		
		$id								= $this->input->post('nationality_id_edit');
		$data['nationality_name']		= $this->input->post('nationality');
		$data['nationality_status']		= "Active";
		
		
		$table = 'nationality_list_manage';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		if(!empty($id)){
				$this->M_crud_ayenal->update('nationality_list_manage', $data, array('id' => $id));
			}else{
				if($data['nationality_name'] !=''){
				   $lastId      =  $this->M_crud_ayenal->save($table, $data); 
				}
			}
		
		   
			$nationalityList   = $this->M_crud_ayenal->findAll('nationality_list_manage', $where, $orderBy, $serialized);	
			
			if(!empty($id)){
			   echo '<option value="">Select Nationality</option>';
			   foreach($nationalityList as $v) {
				if($id == $v->id){
				  echo '<option value="'.$v->id.'" data-nationality-name="'.$v->nationality_name.'" selected>'.$v->nationality_name.'</option>';
			    }else{
				  echo '<option value="'.$v->id.'" data-nationality-name="'.$v->nationality_name.'">'.$v->nationality_name.'</option>';
			    }
			}
			
			}else{			
	
			echo '<option value="">Select Nationality</option>';
			foreach($nationalityList as $v) {
				if($lastId == $v->id){
				  echo '<option value="'.$v->id.'" data-nationality-name="'.$v->nationality_name.'" selected>'.$v->nationality_name.'</option>';
			    }else{
				  echo '<option value="'.$v->id.'" data-nationality-name="'.$v->nationality_name.'">'.$v->nationality_name.'</option>';
			    }
			}
			
		}
			
		
	}






   public function religionInfoStore()
	{
		
		$id								= $this->input->post('religion_id_edit');
		$data['religion_name']			= $this->input->post('religion');
		$data['religion_status']		= "Active";
		
		
		
		$table = 'religion_list_manage';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		if(!empty($id)){
				$this->M_crud_ayenal->update('religion_list_manage', $data, array('id' => $id));
			}else{
				if($data['religion_name'] !=''){
				   $lastId      =  $this->M_crud_ayenal->save($table, $data); 
				}
			}
		
		   
			$religionList   = $this->M_crud_ayenal->findAll('religion_list_manage', $where, $orderBy, $serialized);	
			
			if(!empty($id)){
			   echo '<option value="">Select Religion</option>';
			   foreach($religionList as $v) {
				if($id == $v->id){
				  echo '<option value="'.$v->id.'" data-religion-name="'.$v->religion_name.'" selected>'.$v->religion_name.'</option>';
			    }else{
				  echo '<option value="'.$v->id.'" data-religion-name="'.$v->religion_name.'">'.$v->religion_name.'</option>';
			    }
			}
			
			}else{			
	
			echo '<option value="">Select Religion</option>';
			foreach($religionList as $v) {
				if($lastId == $v->id){
				  echo '<option value="'.$v->id.'" data-religion-name="'.$v->religion_name.'" selected>'.$v->religion_name.'</option>';
			    }else{
				  echo '<option value="'.$v->id.'" data-religion-name="'.$v->religion_name.'">'.$v->religion_name.'</option>';
			    }
			}
			
		}
			
		
	}


	 public function jobTypeInfoStore()
	{
		
		$id								= $this->input->post('jobType_id_edit');
		$data['job_type_name']			= $this->input->post('jobTypeName');
		
		
		$table = 'initiate_job_type';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		if(!empty($id)){
				$this->M_crud_ayenal->update('initiate_job_type', $data, array('id' => $id));
			}else{
				if($data['job_type_name'] !=''){
				   $lastId      =  $this->M_crud_ayenal->save($table, $data); 
				}
			}
		
		   
			$jobTypeList   = $this->M_crud_ayenal->findAll('initiate_job_type', $where, $orderBy, $serialized);	
			
			if(!empty($id)){
			   echo '<option value="">Select Job Type</option>';
			   foreach($jobTypeList as $v) {
				if($id == $v->id){
				  echo '<option value="'.$v->id.'" data-job-name="'.$v->job_type_name.'" selected>'.$v->job_type_name.'</option>';
			    }else{
				  echo '<option value="'.$v->id.'" data-job-name="'.$v->job_type_name.'">'.$v->job_type_name.'</option>';
			    }
			}
			
			}else{			
	
			echo '<option value="">Select Job Type</option>';
			foreach($jobTypeList as $v) {
				if($lastId == $v->id){
				  echo '<option value="'.$v->id.'" data-job-name="'.$v->job_type_name.'" selected>'.$v->job_type_name.'</option>';
			    }else{
				  echo '<option value="'.$v->id.'" data-job-name="'.$v->job_type_name.'">'.$v->job_type_name.'</option>';
			    }
			}
			
		}
			
		
	}



	public function bankInfoStore()
	{
		
		$id							= $this->input->post('bank_edit_id');
		$data['bank_name']			= $this->input->post('bankName');
		
		$table = 'bank_list_manage';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		if(!empty($id)){
				$this->M_crud_ayenal->update('bank_list_manage', $data, array('id' => $id));
			}else{
				if($data['bank_name'] !=''){
				   $lastId      =  $this->M_crud_ayenal->save($table, $data); 
				}
			}
		
		   
			$bankList   = $this->M_crud_ayenal->findAll('bank_list_manage', $where, $orderBy, $serialized);	
			
			if(!empty($id)){
			   echo '<option value="">Select Bank</option>';
			   foreach($bankList as $v) {
				if($id == $v->id){
				  echo '<option value="'.$v->id.'" data-bank-name="'.$v->bank_name.'" selected>'.$v->bank_name.'</option>';
			    }else{
				  echo '<option value="'.$v->id.'" data-bank-name="'.$v->bank_name.'">'.$v->bank_name.'</option>';
			    }
			}
			
			}else{			
	
			echo '<option value="">Select Bank</option>';
			foreach($bankList as $v) {
				if($lastId == $v->id){
				  echo '<option value="'.$v->id.'" data-bank-name="'.$v->bank_name.'" selected>'.$v->bank_name.'</option>';
			    }else{
				  echo '<option value="'.$v->id.'" data-bank-name="'.$v->bank_name.'">'.$v->bank_name.'</option>';
			    }
			}
			
		}
			
		
	}



    public function bankBranchInfoStore()
	{
		
		$id							= $this->input->post('branch_edit_id');
		$data['branch_name']		= $this->input->post('branchName');
		
		$table = 'bank_branch_list_manage';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		if(!empty($id)){
				$this->M_crud_ayenal->update('bank_branch_list_manage', $data, array('id' => $id));
			}else{
				if($data['branch_name'] !=''){
				   $lastId      =  $this->M_crud_ayenal->save($table, $data); 
				}
			}
		
		   
			$branchList   = $this->M_crud_ayenal->findAll('bank_branch_list_manage', $where, $orderBy, $serialized);	
			
			if(!empty($id)){
			   echo '<option value="">Select Branch</option>';
			   foreach($branchList as $v) {
				if($id == $v->id){
				  echo '<option value="'.$v->id.'" data-bankBranch-name="'.$v->branch_name.'" selected>'.$v->branch_name.'</option>';
			    }else{
				  echo '<option value="'.$v->id.'" data-bankBranch-name="'.$v->branch_name.'">'.$v->branch_name.'</option>';
			    }
			}
			
			}else{			
	
			echo '<option value="">Select Branch</option>';
			foreach($branchList as $v) {
				if($lastId == $v->id){
				  echo '<option value="'.$v->id.'" data-bankBranch-name="'.$v->branch_name.'" selected>'.$v->branch_name.'</option>';
			    }else{
				  echo '<option value="'.$v->id.'" data-bankBranch-name="'.$v->branch_name.'">'.$v->branch_name.'</option>';
			    }
			}
			
		}
			
		
	}





	public function domainWiseBranch()
	{

		$orderBy 		= 'id';
		$serialized 	= 'asc';
		$domain_id		= $this->input->post('domain_id');
		$branchList     = $this->M_crud_ayenal->findAll('emp_branch_manage', array('domain_id' =>$domain_id), $orderBy, $serialized);
		echo '<option value="">Select Branch</option>';
		foreach($branchList as $v) {
			  echo '<option value="'.$v->id.'" data-branch-name="'.$v->branch_name.'">'.$v->branch_name.'</option>';
		}	

	}


	public function domainWiseZone()
	{

		$orderBy 		= 'id';
		$serialized 	= 'asc';
		$domain_id		= $this->input->post('domain_id');
		$zoneList     	= $this->M_crud_ayenal->findAll('zone_list_manage', array('domain_id' =>$domain_id), $orderBy, $serialized);
		echo '<option value="">Select Zone</option>';
		foreach($zoneList as $v) {
			  echo '<option value="'.$v->id.'" data-zone-name="'.$v->zone_name.'">'.$v->zone_name.'</option>';
		}	

	}

    public function domainWiseDepartment()
	{

		$orderBy 		= 'id';
		$serialized 	= 'asc';
		$domain_id		= $this->input->post('domain_id');
		$departList     = $this->M_crud_ayenal->findAll('department_list_manage', array('domain_id' =>$domain_id), $orderBy, $serialized);
		echo '<option value="">Select Department</option>';
		foreach($departList as $v) {
			  echo '<option value="'.$v->id.'" data-department-name="'.$v->department_name.'">'.$v->department_name.'</option>';
		}	

	}

    public function domainWiseDesignition()
	{

		$orderBy 		= 'id';
		$serialized 	= 'asc';
		$domain_id		= $this->input->post('domain_id');
		$desigList     = $this->M_crud_ayenal->findAll('designition_list_manage', array('domain_id' =>$domain_id), $orderBy, $serialized);
		echo '<option value="">Select Designition</option>';
		foreach($desigList as $v) {
			  echo '<option value="'.$v->id.'" data-designition-name="'.$v->designition_name.'">'.$v->designition_name.'</option>';
		}	

	}






	
	 
	 
	 
	 
	
	
	

}


