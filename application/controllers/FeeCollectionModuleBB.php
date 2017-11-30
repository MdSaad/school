<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FeeCollectionModule extends CI_Controller {

	const  Title	 = 'VMGPS-Admin Panel';
	
	static $model 	 = array('M_admin', 'M_crud', 'M_join');
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
	
	
	public function index($onset = 0)
	{
		$data['title'] = 'VMGPS&#65515;Student Basic Information';
		$data['alertMsg']	= $this->session->userdata('alertMsg');
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		
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
		
		if($authorType == "superadmin") {
			$stuBasicWhere = array('delete_status !=' => 'Yes');
		} else {	
			$stuBasicWhere = array('delete_status !=' => 'Yes', 'current_branch_id' => $authorBranchID);
		}
		
		
		$this->session->set_userdata(array('alertMsg' => ''));
		$this->load->view('feeCollectionModule/feeCollectionModule', $data);
	}
	
	
	
	
	public function feeSetup()
	{
		
		$data['title'] = 'VMGPS&#65515;Fee Collection Setup';
		$data['alertMsg']	= $this->session->userdata('alertMsg');
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		
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
		
		
		$this->session->set_userdata(array('alertMsg' => ''));
		$this->load->view('feeCollectionModule/feeCollectionSetupPage', $data);
	}
	
	
	
	public function paymentHead()
	{
		
		$data['title'] = 'VMGPS&#65515;Fee Collection Setup';
		$data['alertMsg']	= $this->session->userdata('alertMsg');
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		
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
		
		if($authorType == "superadmin") {
			$stuBasicWhere = array('delete_status !=' => 'Yes');
		} else {	
			$stuBasicWhere = array('delete_status !=' => 'Yes', 'current_branch_id' => $authorBranchID);
		}
		
		
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, $order = 'sl_no', $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		//$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		$data['nationalityListInfo'] 	=  $this->M_crud->findAll('nationality_list_manage', $where, $orderBy, $serialized);
		$data['religionListInfo'] 		=  $this->M_crud->findAll('religion_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		
		$this->session->set_userdata(array('alertMsg' => ''));
		$this->load->view('feeCollectionModule/feeCollectionPaymentHeadPage', $data);
	}
	
	
	
	public function collectionManagment() 
	{
		
		$data['title'] = 'VMGPS&#65515;Fee Collection Setup';
		$data['alertMsg']	= $this->session->userdata('alertMsg');
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		
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
		
		if($authorType == "superadmin") {
			$stuBasicWhere = array('delete_status !=' => 'Yes');
		} else {	
			$stuBasicWhere = array('delete_status !=' => 'Yes', 'current_branch_id' => $authorBranchID);
		}
		
		
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, $order = 'sl_no', $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		//$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		$data['nationalityListInfo'] 	=  $this->M_crud->findAll('nationality_list_manage', $where, $orderBy, $serialized);
		$data['religionListInfo'] 		=  $this->M_crud->findAll('religion_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		
		
		$this->session->set_userdata(array('alertMsg' => ''));
		$this->load->view('feeCollectionModule/feeCollectionManagementPage', $data);
	}
	
	
	public function feeCollectionMode()
	{
		$UpdateID								= $this->input->post('UpdateID');
		
		$data2['fee_branch_id']					= $this->input->post('fee_branch_id');
		$data2['fee_class_id']					= $this->input->post('fee_class_id');
		$data2['fee_group_id']					= $this->input->post('fee_group_id');
		$data2['fee_year']						= $this->input->post('fee_year');
		$data2['admission_fee']					= $this->input->post('admission_fee');
		$data2['session_fee']					= $this->input->post('session_fee');
		$data2['re_admission_fee']				= $this->input->post('re_admission_fee');
		$data2['tution_fee_total']				= $this->input->post('tution_fee_total');
		$data2['trans_total']					= $this->input->post('trans_total');
		$data2['tution_fee_jan']				= $this->input->post('tution_fee_jan');
		$data2['tution_fee_feb']					= $this->input->post('tution_fee_feb');
		$data2['tution_fee_mar']					= $this->input->post('tution_fee_mar');
		$data2['tution_fee_apr']					= $this->input->post('tution_fee_apr');
		$data2['tution_fee_may']					= $this->input->post('tution_fee_may');
		$data2['tution_fee_jun']					= $this->input->post('tution_fee_jun');
		$data2['tution_fee_jul']					= $this->input->post('tution_fee_jul');
		$data2['tution_fee_aug']					= $this->input->post('tution_fee_aug');
		$data2['tution_fee_sep']					= $this->input->post('tution_fee_sep');
		$data2['tution_fee_oct']					= $this->input->post('tution_fee_oct');
		$data2['tution_fee_nov']					= $this->input->post('tution_fee_nov');
		$data2['tution_fee_dec']					= $this->input->post('tution_fee_dec');
		
		$data2['trans_fee_jan']					= $this->input->post('trans_fee_jan');
		$data2['trans_fee_feb']					= $this->input->post('trans_fee_feb');
		$data2['trans_fee_mar']					= $this->input->post('trans_fee_mar');
		$data2['trans_fee_apr']					= $this->input->post('trans_fee_apr');
		$data2['trans_fee_may']					= $this->input->post('trans_fee_may');
		$data2['trans_fee_jun']					= $this->input->post('trans_fee_jun');
		$data2['trans_fee_jul']					= $this->input->post('trans_fee_jul');
		$data2['trans_fee_aug']					= $this->input->post('trans_fee_aug');
		$data2['trans_fee_sep']					= $this->input->post('trans_fee_sep');
		$data2['trans_fee_oct']					= $this->input->post('trans_fee_oct');
		$data2['trans_fee_nov']					= $this->input->post('trans_fee_nov');
		$data2['trans_fee_dec']					= $this->input->post('trans_fee_dec');


		$data2['ct_exam_total_fee']							= $this->input->post('ct_exam_total_fee');
		$data2['ct_1st_m']									= $this->input->post('ct_1st_m');
		$data2['ct_2nd_m']									= $this->input->post('ct_2nd_m');
		$data2['ct_3rd_m']									= $this->input->post('ct_3rd_m');
		$data2['ct_4th_m']									= $this->input->post('ct_4th_m');
		$data2['monthly_exam_total_fees']					= $this->input->post('monthly_exam_total_fees');
		$data2['first_monthly_exam_fees']					= $this->input->post('first_monthly_exam_fees');
		$data2['second_monthly_exam_fees']					= $this->input->post('second_monthly_exam_fees');
		$data2['third_monthly_exam_fees']					= $this->input->post('third_monthly_exam_fees');
		$data2['fourth_monthly_exam_fees']					= $this->input->post('fourth_monthly_exam_fees');
		$data2['half_yearly']								= $this->input->post('half_yearly');
		$data2['hundred_marks_total_fees']					= $this->input->post('hundred_marks_total_fees');
		$data2['annual_exam_fee']							= $this->input->post('annual_exam_fee');
		
		
		
		$data2['certificate_fee']					= $this->input->post('certificate_fee');
		$data2['testmonial_fee']					= $this->input->post('testmonial_fee');
		$data2['trans_certificate_fee']				= $this->input->post('trans_certificate_fee');
		$data2['board_administrative_fee']			= $this->input->post('board_administrative_fee');
		$data2['scout_rovert_fee']					= $this->input->post('scout_rovert_fee');
		$data2['fine_fee']							= $this->input->post('fine_fee');
		$data2['others']							= $this->input->post('others');
		

		if(!empty($UpdateID)) {
			$this->db->update('stu_payment_collection_managment', $data2, array('fee_coll_id' => $UpdateID));         
			$this->session->set_userdata(array('alertMsg' => 'Update Successfull'));
		} else {
			$this->db->insert('stu_payment_collection_managment', $data2); 
			$this->session->set_userdata(array('alertMsg' => 'Insert Successfull'));
	    }
		redirect('feeCollectionModule/collectionManagment'); 
		//$this->session->set_userdata(array('alertMsg' => ''));
		//$this->load->view('feeCollectionModule/feeCollectionManagementPage', $data);
	}
	
	
	
	public function initialPayColl() {
		
		$data2['fee_branch_id']					= $this->input->post('fee_branch_id');
		$data2['fee_class_id']					= $this->input->post('fee_class_id');
		$data2['fee_group_id']					= $this->input->post('fee_group_id');
		$data2['fee_year']						= $this->input->post('fee_year');
		
		$data['existPayCollInfo']  = $this->M_crud->findById('stu_payment_collection_managment', $where = array('fee_branch_id' => $data2['fee_branch_id'], 'fee_class_id' => $data2['fee_class_id'], 'fee_group_id' => $data2['fee_group_id'], 'fee_year' => $data2['fee_year']));
		
		$this->load->view('feeCollectionModule/initialPayCollInfoPage', $data);
		
	
	}
	
	public function collectionApplyStu() {
		$data['title'] = 'VMGPS&#65515;Fee Collection Setup';
		$data['alertMsg']	= $this->session->userdata('alertMsg');
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		
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
		
		if($authorType == "superadmin") {
			$stuBasicWhere = array('delete_status !=' => 'Yes');
		} else {	
			$stuBasicWhere = array('delete_status !=' => 'Yes', 'current_branch_id' => $authorBranchID);
		}
		
		
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, $order = 'sl_no', $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		//$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		$data['nationalityListInfo'] 	=  $this->M_crud->findAll('nationality_list_manage', $where, $orderBy, $serialized);
		$data['religionListInfo'] 		=  $this->M_crud->findAll('religion_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);
		
		
		$this->session->set_userdata(array('alertMsg' => ''));
		$this->load->view('feeCollectionModule/feeCollectionApplicablePage', $data);
	
	}
	
	public function initialPayCollApplicable() {
			
		$data['fee_branch_id']					= $this->input->post('fee_branch_id');
		$data['fee_class_id']					= $this->input->post('fee_class_id');
		$data['fee_group_id']					= $this->input->post('fee_group_id');
		$data['fee_section_id']					= $this->input->post('fee_section_id');
		$data['fee_shift_id']					= $this->input->post('fee_shift_id');
		$data['fee_year']						= $this->input->post('fee_year');
		
		$data['initialStuList']  = $this->M_crud->findStuListForFeeCollApplicable('class_wise_info', array("class_wise_info.branc_id" => $data['fee_branch_id'], "class_id" => $data['fee_class_id'], 'class_group_id' =>$data['fee_group_id'], 'class_section_id' =>$data['fee_section_id'], 'class_shift_id' =>$data['fee_shift_id'], "class_wise_info.year" => $data['fee_year']), 'class_roll',  'asc');
		
		$data['paymentCollectionMode']  		= $this->M_crud->findById('stu_payment_collection_managment', $where = array('fee_branch_id' => $data['fee_branch_id'], 'fee_class_id' => $data['fee_class_id'], 'fee_group_id' => $data['fee_group_id'], 'fee_year' => $data['fee_year']));
		//print_r($data['initialStuList']);
		$this->load->view('feeCollectionModule/initialPayCollApplicableInfoPage', $data);
	}
	
	public function stuFeeCollectionModeApply() {
		
		$data['class_wise_auto_id']				= $this->input->post('class_wise_auto_id');
		$data['currStuID']						= $this->input->post('currStuID');
		$data['editMode']						= $this->input->post('editMode');
		$data['stuInfo']  						= $this->M_crud->findById('class_wise_info', $where = array('class_wise_auto_id' => $data['class_wise_auto_id']));
		
		$this->db->delete('stu_fee_collection_applicable_mode_list', array('fee_coll_app_stu_auto_id' => $data['stuInfo']->stu_auto_id, 'fee_year' => $data['stuInfo']->year));
		$chkFeeModeName								= $this->input->post('chkFeeModeName');
		$feeAmnt									= $this->input->post('feeAmnt');
		$feeModeNameCode							= $this->input->post('feeModeNameCode');
		
		foreach($chkFeeModeName as $i => $v) {
			$data2['fee_coll_app_stu_auto_id']		= $data['stuInfo']->stu_auto_id;
			$data2['fee_branch_id']					= $data['stuInfo']->branc_id;
			$data2['fee_class_id']					= $data['stuInfo']->class_id;
			$data2['fee_group_id']					= $data['stuInfo']->class_group_id;
			$data2['fee_section_id']				= $data['stuInfo']->class_section_id;
			$data2['fee_shift_id']					= $data['stuInfo']->class_shift_id;
			$data2['fee_year']						= $data['stuInfo']->year;
			$data2['applicable_mode_name']			= $chkFeeModeName[$i];
			$data2['mode_total_amoun']				= $feeAmnt[$i];
			$data2['mode_due_amount']				= $feeAmnt[$i];
			$data2['feeModeNameCode']				= $feeModeNameCode[$i];
			$data2['submit_status']					= "Applicable";
			if(!empty($data2['applicable_mode_name'])) {
				$this->db->insert('stu_fee_collection_applicable_mode_list', $data2);
			}
		  }
		  
		 
		$data['appfeeCollInfo'] 		=  $this->M_crud->findAll('stu_fee_collection_applicable_mode_list', $where = array('fee_coll_app_stu_auto_id' => $data['stuInfo']->stu_auto_id, 'fee_year' => $data['stuInfo']->year), $orderBy = 'id', $serialized = 'asc');
		
		$totalAmnt	= 0;
		foreach($data['appfeeCollInfo']  as $v) {
			$totalAmnt	= $totalAmnt+$v->mode_total_amoun;
		} 
		
		if($data['editMode'] == "Yes") {
		
		echo '<div class="alert alert-success col-md-12">
				<strong>Success!</strong> Fee Collection Applicable Update Successfully For '.$data['stuInfo']->stu_id.' This Student. <strong> New Total Amount '.$totalAmnt.'(TK)</strong>.
		     </div>';
		} else  {
		echo '<div class="alert alert-success col-md-12">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Fee Collection Applicable Successfully For '.$data['stuInfo']->stu_id.' This Student. <strong> Total Amount '.$totalAmnt.'(TK)</strong>.
		     </div>';
		}	 
		//print_r($data['chkFeeAmount']);
		//$this->load->view('feeCollectionModule/initialPayCollApplicableInfoPage', $data);
	}

	public function feeCollection()
	{
		$data['title'] = 'VMGPS&#65515;Student Fee collection';
		$data['alertMsg']	= $this->session->userdata('alertMsg');
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		
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
		
		$feeHeadModeDetailsInfoByGroup 		=  $this->M_crud->findAllGroupID($table = 'stu_fee_head_paid_details_info', $where = array(), $orderBy = 'id', $serialized = 'desc', $groupBy = 'fee_head_feeModeNameCode');
		
		foreach($feeHeadModeDetailsInfoByGroup as $v) {
			
			//print_r($findFeeModeInfo);
			$findAllPaidFeeHead 			=  $this->M_crud->findAll($table = 'stu_fee_head_paid_details_info', $where = array('fee_head_feeModeNameCode' => $v->fee_head_feeModeNameCode), $orderBy = 'id', $serialized = 'desc');
			//echo $v->fee_head_feeModeNameCode;
			$totalDiscontAmount = 0;
			$totalPaidtAmount = 0;
			foreach($findAllPaidFeeHead as $vv) {
				$totalDiscontAmount = $vv->fee_head_discount_amount + $totalDiscontAmount;
				$totalPaidtAmount = $vv->fee_head_mode_pay_amount + $totalPaidtAmount;
			
			}
			
			$findFeeModeInfo	=	$this->M_crud->findById($table = 'stu_fee_collection_applicable_mode_list',$where = array('feeModeNameCode' => $v->fee_head_feeModeNameCode));
			
			$data2['discount_amount'] = $totalDiscontAmount;
			$data2['mode_pay_amount'] = $totalPaidtAmount;
			$data2['mode_due_amount'] = ($findFeeModeInfo->mode_total_amoun)-($totalDiscontAmount + $totalPaidtAmount);
			$this->db->update('stu_fee_collection_applicable_mode_list', $data2, array('feeModeNameCode' => $v->fee_head_feeModeNameCode));
		  }
		
		 
		
		$this->session->set_userdata(array('alertMsg' => ''));
		$this->load->view('feeCollectionModule/feeCollectionPage', $data);
	}
	
	public function feeCollectionHeadInitialize() {

        $data['title'] 		= 'VMGPS&#65515;Student Fee collection';
		$data['alertMsg']	= $this->session->userdata('alertMsg');
		$data['alertMsg']	= $this->session->userdata('alertMsg');
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		
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
		


		$data['stuID']						= $this->input->post('stuID');
		$stuYear							= $this->input->post('stuYear');
		$data['stuYear']					= $stuYear;
		
		
		$data['branch_id']					= $this->input->post('branch_id');
		$data['class_id']					= $this->input->post('class_id');
		$data['group_id']					= $this->input->post('group_id');
		$data['section_id']					= $this->input->post('section_id');
		$data['shift_id']					= $this->input->post('shift_id');
		$data['class_roll']					= $this->input->post('class_roll');
		$year								= $this->input->post('year');
		
		if(!empty($year)) {
			$data['stuYear'] = $year;
		} else {
			$data['stuYear'] = $stuYear;
		}
		
		if($data['class_roll'] < 10) {
			$data['class_roll'] = "0".$data['class_roll'];
		}
		
		if(!empty($data['stuID']) && !empty($data['stuYear'])) {
			$where = array('stu_id' => $data['stuID'], 'class_wise_info.year' => $data['stuYear']);
		}
		
		
		if(!empty($data['branch_id']) && !empty($data['class_id']) && !empty($data['group_id']) && !empty($data['shift_id']) && !empty($data['stuYear'])) {
			$where = array('branc_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'class_section_id' => $data['section_id'], 'class_group_id' => $data['group_id'], 'class_shift_id' => $data['shift_id'], 'class_roll' => $data['class_roll']);
		}	
		
		if(!empty($where)){
		   $data['findStuInfoClassWise']  = $this->M_join->findStuInfoByIDClassWise('class_wise_info', $where);
		}

		$data['studentLastTreeReceptNo']    = $this->M_crud->findLastThreeRepNo('stu_fee_head_paid_details_info', $where = array('fee_head_stu_auto_id' => $data['findStuInfoClassWise']->stu_auto_id, 'fee_head_year' =>$data['stuYear'], 'collection_approve_status' => "approve"), $groupBy='invoice_no', $orderBy = 'id' , $serialized = 'desc', $limit = '3'); 

		if(!empty($data['findStuInfoClassWise'])) {
		$data['applicablePaymentHeaderList'] 		=  $this->M_crud->findAll('stu_fee_collection_applicable_mode_list', $where = array('fee_coll_app_stu_auto_id' => $data['findStuInfoClassWise']->stu_auto_id, 'fee_year' =>$data['stuYear']), $orderBy = 'id' , $serialized = 'asc');
			$findMaxInvoiceo	=	$this->M_crud->findMax($table = 'stu_fee_head_paid_details_info',$where = array(), $fieldName = 'invoice_no');
			if(!empty($findMaxInvoiceo)) {
				$feeHeadPaidInvoice_no = $findMaxInvoiceo->invoice_no+1;
			} else {
				$feeHeadPaidInvoice_no = 1;
			}
			
		
			$feeHeadModeDetailsInfoByGroup 		=  $this->M_crud->findAllGroupID($table = 'stu_fee_head_paid_details_info', $where = array('fee_head_stu_auto_id' => $data['findStuInfoClassWise']->stu_auto_id), $orderBy = 'id', $serialized = 'desc', $groupBy = 'fee_head_feeModeNameCode');
		
			foreach($feeHeadModeDetailsInfoByGroup as $v) {
			
			//print_r($findFeeModeInfo);
			$findAllPaidFeeHead 			=  $this->M_crud->findAll($table = 'stu_fee_head_paid_details_info', $where = array('fee_head_feeModeNameCode' => $v->fee_head_feeModeNameCode), $orderBy = 'id', $serialized = 'desc');
			//echo $v->fee_head_feeModeNameCode;
			$totalDiscontAmount = 0;
			$totalPaidtAmount = 0;
			foreach($findAllPaidFeeHead as $vv) {
				$totalDiscontAmount = $vv->fee_head_discount_amount + $totalDiscontAmount;
				$totalPaidtAmount = $vv->fee_head_mode_pay_amount + $totalPaidtAmount;
			
			}
			
			$findFeeModeInfo	=	$this->M_crud->findById($table = 'stu_fee_collection_applicable_mode_list',$where = array('feeModeNameCode' => $v->fee_head_feeModeNameCode));
			
			$data2['discount_amount'] = $totalDiscontAmount;
			$data2['mode_pay_amount'] = $totalPaidtAmount;
			$data2['mode_due_amount'] = ($findFeeModeInfo->mode_total_amoun)-($totalDiscontAmount + $totalPaidtAmount);
			$this->db->update('stu_fee_collection_applicable_mode_list', $data2, array('feeModeNameCode' => $v->fee_head_feeModeNameCode));
		  }
		  
			$this->session->set_userdata(array('feeHeadPaidInvoice_no' => $feeHeadPaidInvoice_no));
			$this->session->set_userdata(array('tempUniqInvoicNo' => time()));
		}
		$this->session->set_userdata(array('alertMsg' => ''));
		$this->load->view('feeCollectionModule/feeCollectionHeadInitializePage', $data);
	}

	public function loadFeeHeadAmount(){
		$data['feePaymentHeadID']					= $this->input->post('feePaymentHeadID');
		$data['feePaymentHeadInfo']  = $this->M_crud->findById('stu_fee_collection_applicable_mode_list', $where = array('id' => $data['feePaymentHeadID']));
		
		//$this->load->view('feeCollectionModule/loadFeeHeadAmountPage', $data);
		echo $data['feePaymentHeadInfo']->mode_due_amount;
		
	}
	
	public function submitFeeHeadAmount() {
		$feeHeadAutoID					= $this->input->post('feePaymentHeadID');
		
		/* $feePaymentHeadInfo		 = $this->M_crud->findById('stu_fee_collection_applicable_mode_list', $where = array('id' => $feeHeadAutoID));
		$data['fee_head_stu_auto_id']			= $feePaymentHeadInfo->fee_coll_app_stu_auto_id;
		$data['fee_head_stu_branch_id']			= $feePaymentHeadInfo->fee_branch_id;
		$data['fee_head_stu_class_id']			= $feePaymentHeadInfo->fee_class_id;
		$data['fee_head_stu_group_id']			= $feePaymentHeadInfo->fee_group_id;
		$data['fee_head_stu_section_id']		= $feePaymentHeadInfo->fee_section_id;
		$data['fee_head_stu_shift_id']			= $feePaymentHeadInfo->fee_shift_id;
		$data['fee_head_year']					= $feePaymentHeadInfo->fee_year;
		$data['fee_head_applicable_mode_name']	= $feePaymentHeadInfo->applicable_mode_name;
		$data['fee_head_mode_total_amoun']		= $feePaymentHeadInfo->mode_total_amoun; 
		$data['fee_head_mode_due_amount']		= $feePaymentHeadInfo->mode_due_amount-($data['fee_head_discount_amount']+$data['fee_head_mode_pay_amount']);
		$data['fee_head_feeModeNameCode']		= $feePaymentHeadInfo->feeModeNameCode;
		$data['date_time']						= date('Y-m-d H:i:s');
		$data['submittedDate']					= date('Y-m-d');
		$todayDate = date('Y-m-d');
		*/
		$data['fee_head_id']					= $feeHeadAutoID;
		$data['head_details']					= $this->input->post('pay_head_details');
		$data['discount_amount']				= $this->input->post('pay_mode_discount_amount');
		$data['paid_amount']					= $this->input->post('mode_pay_amount');
		$data['invoice_no']						= $this->session->userdata('feeHeadPaidInvoice_no');
		$data['tempUniqInvoicNo']			    = $this->session->userdata('tempUniqInvoicNo');
		$this->db->insert('temp_paid_fee_head_details', $data); 
		
		
		/* $data2['submitFeeHeadAmountInfo'] 		=  $this->M_crud->findAll('stu_fee_head_paid_details_info', $where = array('fee_head_stu_auto_id' => $data['fee_head_stu_auto_id'], 'invoice_no' => $data['invoice_no']), $orderBy = 'id' , $serialized = 'desc');
		
		$data2['stuInfo']						= $this->M_join->findStuInfoByIDClassWise('class_wise_info', $where = array('class_wise_info.stu_auto_id' => $data['fee_head_stu_auto_id'], 'class_wise_info.year' => $data['fee_head_year']));
		
		$data2['invoice_no']	= $data['invoice_no'];
		
		$feeHeadModeDetailsInfoByGroup 		=  $this->M_crud->findAllGroupID($table = 'stu_fee_head_paid_details_info', $where = array(), $orderBy = 'id', $serialized = 'desc', $groupBy = 'fee_head_feeModeNameCode');
		
		foreach($feeHeadModeDetailsInfoByGroup as $v) {
			$findFeeModeInfo				=	$this->M_crud->findById($table = 'stu_fee_collection_applicable_mode_list',$where = array('feeModeNameCode' => $v->fee_head_feeModeNameCode));
			$findAllPaidFeeHead 			=  $this->M_crud->findAll($table = 'stu_fee_head_paid_details_info', $where = array('fee_head_feeModeNameCode' => $v->fee_head_feeModeNameCode), $orderBy = 'id', $serialized = 'desc');
			//echo $v->fee_head_feeModeNameCode;
			
			$totalDiscontAmount = 0;
			$totalPaidtAmount = 0;
			foreach($findAllPaidFeeHead as $vv) {
				$totalDiscontAmount = $vv->fee_head_discount_amount + $totalDiscontAmount;
				$totalPaidtAmount = $vv->fee_head_mode_pay_amount + $totalPaidtAmount;
			}
			$data3['discount_amount'] = $totalDiscontAmount;
			$data3['mode_pay_amount'] = $totalPaidtAmount;
			$data3['mode_due_amount'] = ($findFeeModeInfo->mode_total_amoun)-($totalDiscontAmount + $totalPaidtAmount);
			$this->db->update('stu_fee_collection_applicable_mode_list', $data3, array('feeModeNameCode' => $v->fee_head_feeModeNameCode));
		
		} */
		
		$data['submitFeeHeadAmountInfo'] 		=  $this->M_join->findSubmittedHeadInfo('temp_paid_fee_head_details', $where = array('invoice_no' => $data['invoice_no']), $orderBy = 'id' , $serialized = 'desc');
		
		$this->load->view('feeCollectionModule/submitFeeHeadAmountPage', $data);
		
	}
	
	public function removeFeePaidHead() {
		   $data['dataID']					= $this->input->post('dataID');
		   $this->db->delete('temp_paid_fee_head_details', array('id' =>  $data['dataID'])); 
		   
		   $data['invoice_no']						= $this->session->userdata('feeHeadPaidInvoice_no');
		   $data['submitFeeHeadAmountInfo'] 		=  $this->M_join->findSubmittedHeadInfo('temp_paid_fee_head_details', $where = array('invoice_no' => $data['invoice_no']), $orderBy = 'id' , $serialized = 'desc');
		   $this->load->view('feeCollectionModule/submitFeeHeadAmountPage', $data);
	}
	
	public function feeHeadFinalSubmit() {
		   $invoice_no						= $this->session->userdata('feeHeadPaidInvoice_no');
		   $tempUniqInvoicNo			    = $this->session->userdata('tempUniqInvoicNo');
		   
		   $submitFeeHeadAmountInfo 		=  $this->M_crud->findAll('temp_paid_fee_head_details', $where = array('tempUniqInvoicNo' => $tempUniqInvoicNo), $orderBy  = 'id' , $serialized = 'desc');
		   
		   foreach($submitFeeHeadAmountInfo as $tempData) {
		   		  	
				  	$feePaymentHeadInfo						= $this->M_crud->findById('stu_fee_collection_applicable_mode_list', $where = array('id' => $tempData->fee_head_id));
					$data['fee_head_stu_auto_id']			= $feePaymentHeadInfo->fee_coll_app_stu_auto_id;
					$data['fee_head_stu_branch_id']			= $feePaymentHeadInfo->fee_branch_id;
					$data['fee_head_stu_class_id']			= $feePaymentHeadInfo->fee_class_id;
					$data['fee_head_stu_group_id']			= $feePaymentHeadInfo->fee_group_id;
					$data['fee_head_stu_section_id']		= $feePaymentHeadInfo->fee_section_id;
					$data['fee_head_stu_shift_id']			= $feePaymentHeadInfo->fee_shift_id;
					$data['fee_head_year']					= $feePaymentHeadInfo->fee_year;
					$data['fee_head_applicable_mode_name']	= $feePaymentHeadInfo->applicable_mode_name;
					$data['fee_head_mode_total_amoun']		= $feePaymentHeadInfo->mode_total_amoun; 
					$data['fee_head_discount_amount']		= $tempData->discount_amount; 
					$data['fee_head_mode_pay_amount']		= $tempData->paid_amount; 
					$data['collection_approve_status']		= "approve";
					$data['pay_head_details']				= $tempData->head_details; 
					$data['invoice_no']						= $invoice_no; 
					
					$data['fee_head_feeModeNameCode']		= $feePaymentHeadInfo->feeModeNameCode;
					$data['date_time']						= date('Y-m-d H:i:s');
					$data['submittedDate']					= date('Y-m-d');
					
					$this->db->insert('stu_fee_head_paid_details_info', $data); 
					$this->db->delete('temp_paid_fee_head_details', array('tempUniqInvoicNo' => $tempUniqInvoicNo));
					
					
					
				$feeHeadModeDetailsInfoByGroup 		=  $this->M_crud->findAllGroupID($table = 'stu_fee_head_paid_details_info', $where = array('fee_head_stu_auto_id' => $data['fee_head_stu_auto_id']), $orderBy = 'id', $serialized = 'desc', $groupBy = 'fee_head_feeModeNameCode');
				
				foreach($feeHeadModeDetailsInfoByGroup as $v) {
					//print_r($findFeeModeInfo);
					$findAllPaidFeeHead 			=  $this->M_crud->findAll($table = 'stu_fee_head_paid_details_info', $where = array('fee_head_feeModeNameCode' => $v->fee_head_feeModeNameCode), $orderBy = 'id', $serialized = 'desc');
					//echo $v->fee_head_feeModeNameCode;
					$totalDiscontAmount = 0;
					$totalPaidtAmount = 0;
				foreach($findAllPaidFeeHead as $vv) {
				$totalDiscontAmount = $vv->fee_head_discount_amount + $totalDiscontAmount;
				$totalPaidtAmount = $vv->fee_head_mode_pay_amount + $totalPaidtAmount;
				
				}
			
				$findFeeModeInfo	=	$this->M_crud->findById($table = 'stu_fee_collection_applicable_mode_list',$where = array('feeModeNameCode' => $v->fee_head_feeModeNameCode));
			
			$data2['discount_amount'] = $totalDiscontAmount;
			$data2['mode_pay_amount'] = $totalPaidtAmount;
			$data2['mode_due_amount'] = ($findFeeModeInfo->mode_total_amoun)-($totalDiscontAmount + $totalPaidtAmount);
			$this->db->update('stu_fee_collection_applicable_mode_list', $data2, array('feeModeNameCode' => $v->fee_head_feeModeNameCode));
		  	}
		   
		   }


echo '<style>
	RESPONSE {
		display:none;
	}
	credits {
		display:none;
	}
</style>
';		   
		   			//START PART OF SEND MESSAGE //
					$stuInformation 						= $this->M_crud->findById('stu_basic_info', $where = array('id' => $data['fee_head_stu_auto_id']));
					$parentInformation						= $this->M_crud->findById('stu_parents_info', $where = array('stu_auto_id' => $data['fee_head_stu_auto_id']));
					$sms_username = "SAWEBSOFT";
					$sms_password = "wBWUosEU";
					$sms_sender = "Sailors";
				
					$mobl = $parentInformation->f_mobile;					//$mobl = $_REQUEST["mobile"];
					$mobile	= '88'.$mobl;
					$msg = 'Dear Parent, Fee Collection Submitted Successfully for '.$stuInformation->stu_full_name.
					'<br />
						<br />
						 Thanks Sincerely-<br />
						 VMGPS.
					';		
					$year = ("Y");
					
					if($mobl != "")
					{
						if($msg != "")
						{
							//Start SMS Prtal Link//
							$postUrl = "http://193.105.74.59 /api/sendsms/xml";
							$xmlString = "<SMS><authentification><username>".$sms_username."</username><password>".$sms_password."</password></authentification><message><sender>".$sms_sender."
										</sender><text>".$msg."</text></message><recipients><gsm>".$mobile."</gsm></recipients></SMS>";
						
							$fields = "XML=" . urlencode($xmlString);
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL, $postUrl);
							curl_setopt($ch, CURLOPT_POST, 1);
							curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
							
							$response = curl_exec($ch);
							curl_close($ch);
							//End SMS Prtal Link// 
							
							if(strlen($response) == 1) {
								//$ql = mysql_query("insert into single_sms values ('', '$mobile', '$msg', '$year', '$date', '$date_time', '$user_id', '$branch_id')");
								//print_r($response);
							}
							
						} else {
							$response = "Please Enter SMS Text.";
						}
					} else {
						$response = "Please Enter Mobile No.";
					}	

					
					
					
					
		   			echo '<div class="alert alert-success col-md-10 col-md-offset-1">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Success!</strong> Collection Paid Successfully.'; 
							
							if(strlen($response) == 1) {
							echo 'SMS Send Successfully. ';
							} else {
							echo 'SMS Send Failed. ';
							}
							
							echo 'Click <a href="'.site_url('feeCollectionModule/printReciept/'.$data['fee_head_stu_auto_id'].'/'.$data['invoice_no']).'" target="_blank" >Here </a>For Reciept or Click to Initialize Button For New Transaction. 
						 </div>'; 


						 $this->session->set_userdata(array('feeHeadPaidInvoice_no' => ""));
	
	
		    }
		
		public function printReciept() {
				echo "Here are Print Page. Coming Soon...";
		}
		
		public function stuFeecollApplEdit() {
			$data['stuID']							=  $this->input->post('stuID');
			$data['fee_branch_id']					= $this->input->post('fee_branch_id');
			$data['fee_class_id']					= $this->input->post('fee_class_id');
			$data['fee_group_id']					= $this->input->post('fee_group_id');
			$data['fee_section_id']					= $this->input->post('fee_section_id');
			$data['fee_shift_id']					= $this->input->post('fee_shift_id');
			$data['fee_year']						= $this->input->post('feeYear');
			
			
			$data['initialStuList']  = $this->M_crud->findStuListForFeeCollApplicable('class_wise_info', array("class_wise_info.stu_auto_id" => $data['stuID'], "class_wise_info.year" => $data['fee_year']), 'class_wise_auto_id',  'asc');
		
		//$data['paymentCollectionApplMode']  		= $this->M_crud->findAll('stu_fee_collection_applicable_mode_list', $where = array('fee_coll_app_stu_auto_id' => $data['stuID'], 'fee_year' => $data['feeYear']), $orderBy = 'id', $serialized = 'asc');
		
		//print_r($data['initialStuList']);	
		$data['paymentCollectionMode']  		= $this->M_crud->findById('stu_payment_collection_managment', $where = array('fee_branch_id' => $data['fee_branch_id'], 'fee_class_id' => $data['fee_class_id'], 'fee_group_id' => $data['fee_group_id'], 'fee_year' => $data['fee_year']));
		
		$data['existApplMode']					=  $this->M_crud->findAll('stu_fee_collection_applicable_mode_list', $where = array('fee_coll_app_stu_auto_id' => $data['stuID'], 'fee_year' => $data['fee_year']), $orderBy = 'id', $serialized = 'asc');
		
		//print_r($data['existApplMode']);	
			
			$this->load->view('feeCollectionModule/stuFeecollApplEditPage', $data);
		
		}
		
}


