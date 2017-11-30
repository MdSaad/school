<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SmsManagementModule extends CI_Controller {

	const  Title	 = 'VMGPS-Sms Management';
	
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
		isAuthenticate();
	}
	
	
	public function index()
	{
		$data['title'] = 'VMGPS-Sms Management';
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

		$this->load->view('sms/smsModulePage', $data);
	}


	public function studentParentsSms()
	{

		$data['title'] = 'VMGPS-Student Parents Sms';
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

		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, $order = 'sl_no', $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		$data['successAlert']           =  $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ""));

		$this->load->view('sms/studentParentsSmsPage', $data);
	}

	public function studentAttendanceAbsenceSms()
	{
		$data['title'] = 'VMGPS-Student Parents Sms';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);

		$data['successAlert']           =  $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ""));

		$this->load->view('sms/studentAttendanceAbsenceSmsPage', $data);
	}

	public function studentAttendanceAbsenceMessageAction(){



		$data['title'] = 'VMGPS-Student Parents Sms';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		$data['shiftListInfo'] 					=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$cu_date								= $this->input->post('date');
		$attendance_absence						= $this->input->post('present_student');
		$sms1					    			= $this->input->post('msg1');
		$msg1									= str_replace(' ','+',$sms1);
		$sms2					    			= $this->input->post('msg2');
		$msg2									= str_replace(' ','+',$sms2);

		$ex_date = explode('-',$cu_date);
		$year = $ex_date[2];
		$month = $ex_date[1];
		$day = $ex_date[2];
		$year_month = $year.'-'.$month;
		$shift							= 	(int) $this->input->post('class_shift_id');

		if($shift == 1){
			$start_time =strtotime("8:45") ;
			$end_time =strtotime("9:15") ;
		}elseif($shift == 2){
			$start_time =strtotime("12:00") ;
			$end_time =strtotime("12:15") ;
		}

		move_uploaded_file($_FILES['attendance_file']['tmp_name'], 'uploads/sheet.xls');
		$file = './uploads/sheet.xls';

		//load the excel library
		$this->load->library('excel');

//read file from path
		$objPHPExcel = PHPExcel_IOFactory::load($file);

		foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
			$highestRow = $worksheet->getHighestRow(); // e.g. 10
			$highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
			$highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);
			$sl = 0;
			$row = 2;

			for ($row = 2; $row <= $highestRow; $row++) {
				$identity_number = (int) $worksheet->getCellByColumnAndRow(0, $row)->getValue();
				$cell = $worksheet->getCellByColumnAndRow(5, $row);
				$date = date('m-d-Y', PHPExcel_Shared_Date::ExcelToPHP($cell->getValue()));
				$time = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
				$student_time =strtotime($time);
				$present_absence_status = '' ;
				if($student_time >= $start_time && $student_time <= $end_time ){
					$present_absence_status =  "present";
				}else{
					$present_absence_status =  "absence";
				}
				$status = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
				$studentInfo     = $this->M_crud->findById('stu_basic_info', $where = array('identity_number' => $identity_number));
				$class_wise_student =  $this->M_crud->findById('class_wise_info', $where = array('stu_auto_id' => $studentInfo->id));
				//var_dump($cu_date.'  '.$date);die;
				if(trim($cu_date) == trim($date) && $status == 'True') {
					if ($class_wise_student->class_shift_id == $shift) {
						$attendance_data['student_auto_id'] = $studentInfo->id;
						if($present_absence_status == "present")
						{
							$attendance_ids[] = $studentInfo->id;
						}
						$attendance_data['branch_id'] = $class_wise_student->branc_id;
						$attendance_data['section_id'] = $class_wise_student->class_section_id;
						$attendance_data['group_id'] = $class_wise_student->class_group_id;
						$attendance_data['class_id'] = $class_wise_student->class_roll;
						$attendance_data['shift_id'] = $class_wise_student->class_shift_id;
						$attendance_data['action'] = $present_absence_status;
						$attendance_data['month_year'] = $year_month;
						$attendance_data['attenYear'] = $year;
						$attendance_data['date'] = date('Y-m-d',strtotime($cu_date));
						$attendance_data['time'] = $time;
						$where = array('student_auto_id' => $studentInfo->id, 'date' => $cu_date);
						$chk_attendance = $this->M_crud->findById('attendence_information', $where);
						/*if(!isset($chk_attendance)){
							$this->db->insert('attendence_information', $attendance_data);
						}
						var_dump($chk_attendance);die;*/
						if (!isset($chk_attendance)) {
							if ($this->db->insert('attendence_information', $attendance_data)) {
								if (in_array('Present', $attendance_absence)) {
									//$studentParent = $this->M_crud->findById('stu_parents_info', $where = array('stu_auto_id' => $studentInfo->id));
									//$mobl = $studentParent->f_mobile;
									$mobl = $studentInfo->stu_mobile;
									if (!empty($mobl)) {
										if (strlen($mobl) == 10) {
											$mobile = '880' . $mobl;
										} else {
											$mobile = '88' . $mobl;
										}

										//var_dump($mobile);die;

										$api_url = 'http://116.212.108.50/BulkSMSAPI/BulkSMSExtAPI.php?SendFrom=EssenceIT&SendTo=' . $mobile . '&InMSgID=8801676266967201708261826407&AuthToken=aWZ0aTY2NTB8MDIyODM0&Msg=' . $msg1 . '';
										$url = $api_url;

										$ch = curl_init();

										curl_setopt($ch, CURLOPT_POST, false);

										curl_setopt($ch, CURLOPT_URL, $url);

										curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
										$output = curl_exec($ch);
										curl_close($ch);
									}
								}
							}
						}
					}

				}
			}
		}

	//	var_dump($attendance_ids);die;


		$data = $this->M_crud_ayenal->findAllStudentNotIn('class_wise_info', $attendance_ids,array('class_shift_id'=>$shift));

		//var_dump($data);die;
		if(isset($data)){
			foreach($data as $datum){
				$chk_absence =  $this->M_crud->findById('attendence_information', array('student_auto_id' =>$datum->stu_auto_id,'date'=>$cu_date));
				//var_dump($chk_absence);die;
				if(!isset($chk_absence)){

					$absence['student_auto_id'] = $datum->stu_auto_id ;
					$absence['branch_id'] = $datum->branc_id ;
					$absence['section_id'] = $datum->class_section_id ;
					$absence['group_id'] = $datum->class_group_id ;
					$absence['class_id'] = $datum->class_roll ;
					$absence['shift_id'] = $datum->class_shift_id ;
					$absence['action'] = 'absence' ;
					$absence['month_year'] = $year_month ;
					$absence['attenYear'] = $year ;

					$absence['date'] = date('Y-m-d',strtotime($cu_date));
					$this->db->insert('attendence_information', $absence);

					if (in_array('Absence', $attendance_absence)) {
						//$studentParent = $this->M_crud->findById('stu_parents_info', $where = array('stu_auto_id' => $datum->stu_auto_id));
						$student = $this->M_crud->findById('stu_basic_info', $where = array('id' => $datum->stu_auto_id));
						//$mobl = $studentParent->f_mobile ;
						$mobl = $student->stu_mobile ;
						if (!empty($mobl)) {
							if (strlen($mobl) == 10) {
								$mobile = '880' . $mobl;
							} else {
								$mobile = '88' . $mobl;
							}
							$api_url = 'http://116.212.108.50/BulkSMSAPI/BulkSMSExtAPI.php?SendFrom=EssenceIT&SendTo='.$mobile.'&InMSgID=8801676266967201708261826407&AuthToken=aWZ0aTY2NTB8MDIyODM0&Msg='.$msg2.'';
							$url = $api_url ;

							$ch = curl_init();

							curl_setopt($ch, CURLOPT_POST, false);

							curl_setopt($ch, CURLOPT_URL, $url);

							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							$output = curl_exec($ch);
							curl_close($ch);

						}
					}
				}

			}
		}
		$this->session->set_userdata(array('success' => "SMS send successfully"));
		redirect('smsManagementModule/studentAttendanceAbsenceSms');
		//var_dump($upload_data);die;
	}

	public function studentParentsMessageAction()
	{

		$student_id								= $this->input->post('student_id');
		$year									= $this->input->post('year');
		$branc_id								= $this->input->post('branc_id');
		$class_section_id						= $this->input->post('class_section_id');
		$class_id								= $this->input->post('class_id');
		$class_shift_id							= $this->input->post('class_shift_id');
		$class_group_id							= $this->input->post('class_group_id');
		$class_roll								= $this->input->post('class_roll');
		$ad_year								= $this->input->post('ad_year');
		$sendto_student							= $this->input->post('sendto_student');
		$sendto_father							= $this->input->post('sendto_father');
		$sendto_mother							= $this->input->post('sendto_mother');
		$sendto_guardian					    = $this->input->post('sendto_guardian');
		$sms					    			= $this->input->post('msg');
		$msg									= str_replace(' ','+',$sms);



		$studentWiseSendToAray 					= array('sendto_student' => $sendto_student, 'sendto_father' => $sendto_father, 'sendto_mother' => $sendto_mother, 'sendto_guardian' => $sendto_guardian);



		// sms service user name and password
		$sms_username = "SAWEBSOFT";
		$sms_password = "wBWUosEU";
		$sms_sender   = "Sailors";


	
		// sms send start

		if(!empty($student_id))
		{

			if(!empty($year)){
				$studentInfo     = $this->M_crud->findById('stu_basic_info', $where = array('stu_current_id' => $student_id, 'current_year' => $year));
			} else {
			   $studentInfo      = $this->M_crud->findById('stu_basic_info', $where = array('stu_current_id' => $student_id));
			}

			$studentParentsInfo  = $this->M_crud->findById('stu_parents_info', $where = array('stu_auto_id' => $studentInfo->id));

		
                if(!empty($studentWiseSendToAray)){
		            foreach($studentWiseSendToAray as $vs => $key){
		                if(!empty($studentWiseSendToAray[$vs])){
		                	if($studentWiseSendToAray[$vs] == 'Student'){
		                	 if(!empty($studentInfo->stu_mobile))  	 	$mobl 	= $studentInfo->stu_mobile;	
		                	}else if($studentWiseSendToAray[$vs] == 'Father'){
		                	 if(!empty($studentParentsInfo->f_mobile))  $mobl 	= $studentParentsInfo->f_mobile;	
		                	}else if($studentWiseSendToAray[$vs] == 'Mother'){
		                	 if(!empty($studentParentsInfo->m_mobile))  $mobl 	= $studentParentsInfo->m_mobile;	
		                	} else {
		                	  if(!empty($studentParentsInfo->g_mobile))  $mobl 	= $studentParentsInfo->g_mobile;	
		                	}


							if(!empty($mobl)){
								if(strlen($mobl) == 10){
								    $mobile				 = '880'.$mobl;
								}else{
								    $mobile				 = '88'.$mobl;
								}

								//exit($mobile);

								//$mobile = "01744212996";

								if($mobile != "")
								{
									if($msg != "")
									{
										//Start SMS Prtal Link//
										/*$postUrl = "http://193.105.74.59 /api/sendsms/xml";
										$xmlString = "<SMS><authentification><username>".$sms_username."</username><password>".$sms_password."</password></authentification><message><sender>".$sms_sender."
													</sender><text>".$msg."</text></message><recipients><gsm>".$mobile."</gsm></recipients></SMS>";
									
										$fields = "XML=" . urlencode($xmlString);
										$ch = curl_init();
										curl_setopt($ch, CURLOPT_URL, $postUrl);
										curl_setopt($ch, CURLOPT_POST, 1);
										curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
										
										$response = curl_exec($ch);
										curl_close($ch);*/
										//End SMS Prtal Link//



										$api_url = 'http://116.212.108.50/BulkSMSAPI/BulkSMSExtAPI.php?SendFrom=EssenceIT&SendTo='.$mobile.'&InMSgID=8801676266967201708261826407&AuthToken=aWZ0aTY2NTB8MDIyODM0&Msg='.$msg.'';
										$url = $api_url ;

										$ch = curl_init();

										curl_setopt($ch, CURLOPT_POST, false);

										curl_setopt($ch, CURLOPT_URL, $url);

										curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
										$output = curl_exec($ch);
										curl_close($ch);




										
									} else {
										$response = "Please Enter SMS Text.";
									}
								} else {
									$response = "Please Enter Mobile No.";
								}
							}
						}
				    }
				}

		} else {

			if(!empty($branc_id) || !empty($class_section_id) || !empty($class_id) || !empty($class_shift_id) || !empty($class_group_id) || !empty($class_roll) || !empty($ad_year)){

				if(!empty($branc_id))  			$where['branc_id'] 			= $branc_id;
				if(!empty($class_section_id))  	$where['class_section_id'] 	= $class_section_id;
				if(!empty($class_id))  			$where['class_id'] 			= $class_id;
				if(!empty($class_shift_id))  	$where['class_group_id'] 	= $class_shift_id;
				if(!empty($class_group_id))  	$where['class_group_id'] 	= $class_group_id;
				if(!empty($class_roll))  		$where['class_roll'] 		= $class_roll;
				if(!empty($ad_year))  			$where['year'] 				= $ad_year;

				$allStudentInfo     			= $this->M_crud->findAll('class_wise_info', $where, 'class_wise_auto_id', 'asc');

				foreach($allStudentInfo as $v){
			        $studentWiseInfo      	  = $this->M_crud->findById('stu_basic_info', $where = array('id' => $v->stu_auto_id));
			        $studentWiseParentsInfo   = $this->M_crud->findById('stu_parents_info', $where = array('stu_auto_id' => $v->stu_auto_id));


				    if(!empty($studentWiseSendToAray)){
			            foreach($studentWiseSendToAray as $vs => $key){
			                if(!empty($studentWiseSendToAray[$vs])){
			                	if($studentWiseSendToAray[$vs] == 'Student'){
			                	 if(!empty($studentWiseInfo->stu_mobile)) 		$mobl 	= $studentWiseInfo->stu_mobile;	
			                	}else if($studentWiseSendToAray[$vs] == 'Father'){
			                	 if(!empty($studentWiseParentsInfo->f_mobile))	$mobl 	= $studentWiseParentsInfo->f_mobile;	
			                	}else if($studentWiseSendToAray[$vs] == 'Mother'){
			                	 if(!empty($studentWiseParentsInfo->m_mobile)) 	$mobl 	= $studentWiseParentsInfo->m_mobile;	
			                	} else {
			                	 if(!empty($studentWiseParentsInfo->g_mobile)) 	$mobl 	= $studentWiseParentsInfo->g_mobile;	
			                	}
								
								if(!empty($mobl)){
									if(strlen($mobl) == 10){				
									    $mobile				 = '880'.$mobl;
									}else{
									    $mobile				 = '88'.$mobl;	
									}


									if($mobile != "")
									{
										if($msg != "")
										{
											//Start SMS Prtal Link//
											/*$postUrl = "http://193.105.74.59 /api/sendsms/xml";
											$xmlString = "<SMS><authentification><username>".$sms_username."</username><password>".$sms_password."</password></authentification><message><sender>".$sms_sender."
														</sender><text>".$msg."</text></message><recipients><gsm>".$mobile."</gsm></recipients></SMS>";
										
											$fields = "XML=" . urlencode($xmlString);
											$ch = curl_init();
											curl_setopt($ch, CURLOPT_URL, $postUrl);
											curl_setopt($ch, CURLOPT_POST, 1);
											curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
											
											$response = curl_exec($ch);
											curl_close($ch);*/
											//End SMS Prtal Link//



											$api_url = 'http://116.212.108.50/BulkSMSAPI/BulkSMSExtAPI.php?SendFrom=EssenceIT&SendTo='.$mobile.'&InMSgID=8801676266967201708261826407&AuthToken=aWZ0aTY2NTB8MDIyODM0&Msg='.$msg.'';
											$url = $api_url ;

											$ch = curl_init();

											curl_setopt($ch, CURLOPT_POST, false);

											curl_setopt($ch, CURLOPT_URL, $url);

											curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
											$output = curl_exec($ch);
											curl_close($ch);

											
										} else {
											$response = "Please Enter SMS Text.";
										}
									} else {
										$response = "Please Enter Mobile No.";
									}
								}
							}
					    }
					}



				}



			}



		}




		if(strlen($response) == 1) {
		   $this->session->set_userdata(array('success' => "SMS Send Successfully. Send Again"));
           
		} else {
		   $this->session->set_userdata(array('success' => "SMS Send Failed"));
		}

		redirect('smsManagementModule/studentParentsSms');	

	}




	public function HRSms()
	{
		$data['title'] = 'VMGPS-HR Sms';
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
		$data['successAlert']           =  $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ""));

		$this->load->view('sms/HRSmsPage', $data);
	}

	public function HRSmsSendAction()
	{
	//	exit('Called');
		$employee_id							= $this->input->post('employee_id');
		$domain_id								= $this->input->post('domain_id');
		$department_id							= $this->input->post('department_id');
		$branc_id								= $this->input->post('branc_id');
		$designition_id							= $this->input->post('designition_id');
		$sms					    			= $this->input->post('msg');
		$msg									= str_replace(' ','+',$sms);


								

		if(!empty($employee_id)){
		   $empInfoInfo     = $this->M_crud->findById('employee_basic_information', array('employee_id' => $employee_id));	

		   if(!empty($empInfoInfo->mobile_no))  $mobl 	= $empInfoInfo->mobile_no;

		   if(!empty($mobl)){
				if(strlen($mobl) == 10){				
				    $mobile				 = '880'.$mobl;
				}else{
				    $mobile				 = '88'.$mobl;	
				}

				if($mobile != "")
				{
					if($msg != "")
					{
						$api_url = 'http://116.212.108.50/BulkSMSAPI/BulkSMSExtAPI.php?SendFrom=EssenceIT&SendTo='.$mobile.'&InMSgID=8801676266967201708261826407&AuthToken=aWZ0aTY2NTB8MDIyODM0&Msg='.$msg.'';
						$url = $api_url ;

						$ch = curl_init();

						curl_setopt($ch, CURLOPT_POST, false);

						curl_setopt($ch, CURLOPT_URL, $url);

						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$output = curl_exec($ch);
						curl_close($ch);
						
					} else {
						$response = "Please Enter SMS Text.";
					}
				} else {
					$response = "Please Enter Mobile No.";
				}
			}


		} else {

           if(!empty($domain_id) || !empty($department_id) || !empty($branc_id) || !empty($designition_id) ){

           	  if(!empty($domain_id)) 		$where['domain_id'] 		= $domain_id; 
           	  if(!empty($department_id)) 	$where['department_id'] 	= $department_id; 
           	  if(!empty($branc_id)) 		$where['branch_id'] 		= $branc_id; 
           	  if(!empty($designition_id)) 	$where['designition_id'] 	= $designition_id; 

           }
			$empAllInfoInfo     = $this->M_crud->findAll('employee_basic_information', $where, 'id', 'asc');	

			foreach($empAllInfoInfo as $v){
				if(!empty($v->mobile_no)) $mobl  = $v->mobile_no; 
					if(!empty($mobl)){
					if(strlen($mobl) == 10){				
					    $mobile				 = '880'.$mobl;
					}else{
					    $mobile				 = '88'.$mobl;	
					}

					if($mobile != "")
					{
						if($msg != "")
						{
							$api_url = 'http://116.212.108.50/BulkSMSAPI/BulkSMSExtAPI.php?SendFrom=EssenceIT&SendTo='.$mobile.'&InMSgID=8801676266967201708261826407&AuthToken=aWZ0aTY2NTB8MDIyODM0&Msg='.$msg.'';
							$url = $api_url ;

							$ch = curl_init();

							curl_setopt($ch, CURLOPT_POST, false);

							curl_setopt($ch, CURLOPT_URL, $url);

							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							$output = curl_exec($ch);
							curl_close($ch);
							
						} else {
							$response = "Please Enter SMS Text.";
						}
					} else {
						$response = "Please Enter Mobile No.";
					}
				}
			}


		}


		if(strlen($response) == 1) {
		   $this->session->set_userdata(array('success' => "SMS Send Successfully. Send Again"));
           
		} else {
		   $this->session->set_userdata(array('success' => "SMS Send Failed"));
		}

		redirect('smsManagementModule/HRSms');	


	}



	public function generalPeopleSms()
	{
		$data['title'] = 'VMGPS-General People Sms';
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

		$data['successAlert']           =  $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ""));

		$this->load->view('sms/generalPeopleSmsPage', $data);
	}

	public function generalPeopleSmsSendAction()
	{
	    $input_mobile				= $this->input->post('people_number');
		$sms_body				    = $this->input->post('msg');

	    if(!empty($input_mobile)){
			$mobile_nos = explode(',',$input_mobile);
				if($sms_body != "")
				{
					$msg						   = str_replace(' ','+',$sms_body);
					foreach($mobile_nos as $mob){
						if(strlen($mob) == 10){
							$mobile				 = '880'.$mob;
						}else{
							$mobile				 = '88'.$mob;
						}
						//exit($mobile);
						$api_url = 'http://116.212.108.50/BulkSMSAPI/BulkSMSExtAPI.php?SendFrom=EssenceIT&SendTo='.$mobile.'&InMSgID=8801676266967201708261826407&AuthToken=aWZ0aTY2NTB8MDIyODM0&Msg='.$msg.'';
						$url = $api_url ;

						$ch = curl_init();

						curl_setopt($ch, CURLOPT_POST, false);

						curl_setopt($ch, CURLOPT_URL, $url);

						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$output = curl_exec($ch);
						curl_close($ch);
					}

				} else {
					$response = "Please Enter SMS Text.";
				}
			}
			if(strlen($response) == 1) {
		    $this->session->set_userdata(array('success' => "SMS Send Successfully. Send Again"));
           
			} else {
			   $this->session->set_userdata(array('success' => "SMS Send Failed"));
			}

			redirect('smsManagementModule/generalPeopleSms');
	}


}


