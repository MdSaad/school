<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FeeCollectionModule extends CI_Controller {

	const  Title	 = 'Fee Collection';
	
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
		$this->load->library('user_agent');
		date_default_timezone_set('Asia/Dhaka');
		isAuthenticate();
	}
	
	
	public function index($onset = 0)
	{
		$data['title'] = 'Student Basic Information';
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
		
		$data['title'] = 'Fee Collection Setup';
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
		
		$data['title'] = 'Fee Collection Setup';
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
		
		$data['title'] = 'Fee Collection Setup';
		$data['alertMsg']	= $this->session->userdata('alertMsg');
		
		
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
		$update_status							= $this->input->post('update_status');
		$fee_branch_id							= $this->input->post('branch_id');
		$fee_class_id							= $this->input->post('class_id');
		$fee_group_id							= $this->input->post('group_id');
		$fee_year								= $this->input->post('year');
		
		$fee_head_list							= $this->input->post('fee_head_list');
		$this->db->delete('class_wise_fee_head_applicable', array('fee_branch_id' => $fee_branch_id, 'fee_class_id' => $fee_class_id, 'fee_group_id' =>$fee_group_id, 'fee_year' =>$fee_year));
		foreach($fee_head_list as $k=>$v) {
				$fee_head_id							= $fee_head_list[$k];
				$head									= explode("_", $fee_head_id);
				$data['fee_branch_id']					= $fee_branch_id;
				$data['fee_class_id']					= $fee_class_id;
				$data['fee_group_id']					= $fee_group_id;
				$data['fee_year']						= $fee_year;
				$data['update_date_time']				= date('Y-m-d H:i:s');
			    $data['admin_id']						= $this->session->userid;
				$data['amount']							= $head[0];
				$data['fee_head_id']					= $head[1];
				$catInfo								= $this->M_crud->findById('fee_head_list_manage', array('id' => $data['fee_head_id']));
				$data['cat_id']							= $catInfo->cat_id;
				$this->db->insert('class_wise_fee_head_applicable', $data); 
		}
		if(!empty($update_status)) {
		$this->session->set_userdata(array('alertMsg' => 'Data Update Successfully'));
		} else {
		$this->session->set_userdata(array('alertMsg' => 'Data Insert Successfully'));
		}
		redirect('feeCollectionModule/collectionManagment'); 
	}
	
	
	
	public function initialPayColl() {
		
		$data2['fee_branch_id']					= $this->input->post('fee_branch_id');
		$data2['fee_class_id']					= $this->input->post('fee_class_id');
		$data2['fee_group_id']					= $this->input->post('fee_group_id');
		$data2['fee_year']						= $this->input->post('fee_year');
		
		//$data['existPayCollInfo']  = $this->M_crud->findById('stu_payment_collection_managment', $where = array('fee_branch_id' => $data2['fee_branch_id'], 'fee_class_id' => $data2['fee_class_id'], 'fee_group_id' => $data2['fee_group_id'], 'fee_year' => $data2['fee_year']));
		
		$this->load->view('feeCollectionModule/initialPayCollInfoPage', $data2);
		
	
	}
	
	public function collectionApplyStu() {
		$data['title'] = 'Fee Collection Setup';
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
		
		//$data['initialStuList']  = $this->M_crud->findStuListForFeeCollApplicable('class_wise_info', array("class_wise_info.branc_id" => $data['fee_branch_id'], "class_id" => $data['fee_class_id'], 'class_group_id' =>$data['fee_group_id'], 'class_section_id' =>$data['fee_section_id'], 'class_shift_id' =>$data['fee_shift_id'], "class_wise_info.year" => $data['fee_year']), 'class_roll',  'asc');
		
		$data['initialStuList']  = $this->M_join->findAllStuInfo('class_wise_info', array("class_wise_info.branc_id" => $data['fee_branch_id'], "class_id" => $data['fee_class_id'], 'class_group_id' =>$data['fee_group_id'], 'class_section_id' =>$data['fee_section_id'], 'class_shift_id' =>$data['fee_shift_id'], "class_wise_info.year" => $data['fee_year']), 'class_roll',  'asc');
		
		
		
		//$data['paymentCollectionMode']  		= $this->M_crud->findById('stu_payment_collection_managment', $where = array('fee_branch_id' => $data['fee_branch_id'], 'fee_class_id' => $data['fee_class_id'], 'fee_group_id' => $data['fee_group_id'], 'fee_year' => $data['fee_year']));
		//print_r($data['initialStuList']);
		$this->load->view('feeCollectionModule/initialPayCollApplicableInfoPage', $data);
	}
	
	public function stuFeeCollectionModeApply() {
		
		$data['class_wise_auto_id']				= $this->input->post('class_wise_auto_id');
		$data['currStuID']						= $this->input->post('currStuID');
		$data['editMode']						= $this->input->post('editMode');
		$data['stuInfo']  						= $this->M_crud->findById('class_wise_info', $where = array('class_wise_auto_id' => $data['class_wise_auto_id']));
		
		$this->db->delete('stu_fee_collection_applicable_mode_list', array('fee_coll_app_stu_auto_id' => $data['stuInfo']->stu_auto_id, 'fee_year' => $data['stuInfo']->year));
		$fee_head_list							= $this->input->post('fee_head_list');
		
		foreach($fee_head_list as $k => $v) {
			$data2['fee_coll_app_stu_auto_id']		= $data['stuInfo']->stu_auto_id;
			$data2['fee_branch_id']					= $data['stuInfo']->branc_id;
			$data2['fee_class_id']					= $data['stuInfo']->class_id;
			$data2['fee_group_id']					= $data['stuInfo']->class_group_id;
			$data2['fee_section_id']				= $data['stuInfo']->class_section_id;
			$data2['fee_shift_id']					= $data['stuInfo']->class_shift_id;
			$data2['fee_year']						= $data['stuInfo']->year;
			
			$fee_head_id							= $fee_head_list[$k];
			$head									= explode("_", $fee_head_id);
			$data2['fee_head_id']					= $head[1];
			$catInfo								= $this->M_crud->findById('fee_head_list_manage', array('id' => $data2['fee_head_id']));
			$data2['cat_id']						= $catInfo->cat_id;
			$data2['applicable_mode_name']			= $catInfo->head_name;
			$data2['mode_total_amount']				= $head[0];
			$data2['mode_due_amount']				= $head[0];
			//$data2['feeModeNameCode']				= $feeModeNameCode[$i];
			$data2['submit_status']					= "Applicable";
			$data2['admin_id']						= $this->session->userid;
			$this->db->insert('stu_fee_collection_applicable_mode_list', $data2);
		  }
		  
		    //Start for Update Applicable Mode List from Paid Details Info
			$this->updateStuPaidHeadInfo($data['stuInfo']->stu_auto_id, $data['stuInfo']->year);
		    //End Part of Update Applicable Mode List from Paid Details Info
		 
		$data['appfeeCollInfo'] 		=  $this->M_crud->findAll('stu_fee_collection_applicable_mode_list', $where = array('fee_coll_app_stu_auto_id' => $data['stuInfo']->stu_auto_id, 'fee_year' => $data['stuInfo']->year), $orderBy = 'id', $serialized = 'asc');
		
		$totalAmnt	= 0;
		foreach($data['appfeeCollInfo']  as $v) {
			$totalAmnt	= $totalAmnt+$v->mode_total_amount;
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
		$data['title'] = 'Student Fee collection';
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
		$this->session->set_userdata(array('alertMsg' => ''));
		$this->load->view('feeCollectionModule/feeCollectionPage', $data);
	}
	
	public function feeCollectionHeadInitialize() {

        $data['title'] 		= 'Student Fee collection';
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
			$data['stuYear'] = $currYear;
		}
		
		if($data['class_roll'] < 10) {
			$data['class_roll'] = "0".$data['class_roll'];
		}
		
		if(!empty($data['stuID']) && !empty($data['stuYear'])) {
			$where = array('stu_id' => $data['stuID'], 'class_wise_info.year' => $data['stuYear']);
		}
		
		
		if(!empty($data['branch_id']) && !empty($data['class_id']) && !empty($data['group_id']) && !empty($data['shift_id']) && !empty($data['stuYear'])) {
			$where = array('branc_id' => $data['branch_id'], 'class_id' => $data['class_id'], 'class_section_id' => $data['section_id'], 'class_group_id' => $data['group_id'], 'class_shift_id' => $data['shift_id'], 'class_roll' => $data['class_roll'], 'class_wise_info.year' => $data['stuYear']);
		}	
		
		if(!empty($where)){
		   $data['findStuInfoClassWise']  = $this->M_join->findStuInfoByIDClassWise('class_wise_info', $where);
		   $data['studentLastTreeReceptNo']    = $this->M_crud->findLastThreeRepNo('stu_fee_head_paid_details_info', $where = array('fee_head_stu_auto_id' => $data['findStuInfoClassWise']->stu_auto_id, 'fee_head_year' =>$data['stuYear'], 'collection_approve_status' => "approve"), $groupBy='invoice_no', $orderBy = 'id' , $serialized = 'desc', $limit = '3'); 
		}

		

		if(!empty($data['findStuInfoClassWise'])) {
		//$data['applicablePaymentHeaderList'] 		=  $this->M_crud->findAll('stu_fee_collection_applicable_mode_list', $where = array('fee_coll_app_stu_auto_id' => $data['findStuInfoClassWise']->stu_auto_id, 'fee_year' =>$data['stuYear']), $orderBy = 'id' , $serialized = 'asc');
			$findMaxInvoiceo	=	$this->M_crud->findMax($table = 'stu_fee_head_paid_details_info',$where = array(), $fieldName = 'invoice_no');
			if(!empty($findMaxInvoiceo)) {
				$feeHeadPaidInvoice_no = $findMaxInvoiceo->invoice_no+1;
			} else {
				$feeHeadPaidInvoice_no = 1;
			}
			$feeHeadPaidRecieptNo  = $data['findStuInfoClassWise']->stu_auto_id.'-'.$feeHeadPaidInvoice_no;
			
		     //Start for Update Applicable Mode List from Paid Details Info
			$this->updateStuPaidHeadInfo($data['findStuInfoClassWise']->stu_auto_id, $data['stuYear']);
		    //End Part of Update Applicable Mode List from Paid Details Info
			
			$this->session->set_userdata(array('feeHeadPaidInvoice_no' => $feeHeadPaidInvoice_no, 'feeHeadPaidRecieptNo' => $feeHeadPaidRecieptNo));
			$this->session->set_userdata(array('tempUniqInvoicNo' => time()));
		}
		$this->session->set_userdata(array('alertMsg' => ''));
		$this->load->view('feeCollectionModule/feeCollectionHeadInitializePage', $data);
	}

	public function loadFeeHeadAmount(){
		$data['feePaymentHeadID']					= $this->input->post('feePaymentHeadID');
		$data['feePaymentHeadInfo']  = $this->M_crud->findById('stu_fee_collection_applicable_mode_list', $where = array('id' => $data['feePaymentHeadID']));
		
		if($data['feePaymentHeadInfo']) {
		echo $data['feePaymentHeadInfo']->mode_due_amount;
		} else {
		echo NULL;
		}
	}
	
	public function submitFeeHeadAmount() {
		$feeHeadAutoID							= $this->input->post('feePaymentHeadID');
		$data['fee_head_id']					= $feeHeadAutoID;
		$data['head_details']					= $this->input->post('pay_head_details');
		$data['discount_amount']				= $this->input->post('pay_mode_discount_amount');
		$data['paid_amount']					= $this->input->post('mode_pay_amount');
		$data['invoice_no']						= $this->session->userdata('feeHeadPaidInvoice_no');
		$data['tempUniqInvoicNo']			    = $this->session->userdata('tempUniqInvoicNo');
		$this->db->insert('temp_paid_fee_head_details', $data); 
		
		$data['submitFeeHeadAmountInfo'] 		=  $this->M_join->findSubmittedHeadInfo('temp_paid_fee_head_details', $where = array('tempUniqInvoicNo' => $data['tempUniqInvoicNo']), $orderBy = 'id' , $serialized = 'desc');
		
		$this->load->view('feeCollectionModule/submitFeeHeadAmountPage', $data);
		
	}
	
	public function removeFeePaidHead() {
		   $data['dataID']					= $this->input->post('dataID');
		   $this->db->delete('temp_paid_fee_head_details', array('id' =>  $data['dataID'])); 
		   $data['tempUniqInvoicNo']			    = $this->session->userdata('tempUniqInvoicNo');
		   
		   $data['invoice_no']						= $this->session->userdata('feeHeadPaidInvoice_no');
		   $data['submitFeeHeadAmountInfo'] 		=  $this->M_join->findSubmittedHeadInfo('temp_paid_fee_head_details', $where = array('tempUniqInvoicNo' => $data['tempUniqInvoicNo']), $orderBy = 'id' , $serialized = 'desc');
		   $this->load->view('feeCollectionModule/submitFeeHeadAmountPage', $data);
	}
	
	public function feeHeadFinalSubmit() {
		   $findMaxInvoice	=	$this->M_crud->findMax($table = 'stu_fee_head_paid_details_info',$where = array(), $fieldName = 'invoice_no');
		   if(!empty($findMaxInvoice)) {
				$invoice_no = $findMaxInvoice->invoice_no+1;
			} else {
				$invoice_no = 1;
			}
		   
		   //$invoice_no						= $this->session->userdata('feeHeadPaidInvoice_no');
		   $reciept_no						= $this->session->userdata('feeHeadPaidRecieptNo');
		   $tempUniqInvoicNo			    = $this->session->userdata('tempUniqInvoicNo');
		   $class_wise_auto_id				= $this->input->post('class_wise_auto_id');
		   $submittedDate					= $this->input->post('submittedDate');
		   $stuClassInfo					= $this->M_crud->findById('class_wise_info', $where = array('class_wise_auto_id' => $class_wise_auto_id));
		   
		   $submitFeeHeadAmountInfo 		=  $this->M_crud->findAll('temp_paid_fee_head_details', $where = array('tempUniqInvoicNo' => $tempUniqInvoicNo), $orderBy  = 'id' , $serialized = 'desc');
		   
		   foreach($submitFeeHeadAmountInfo as $tempData) {
		   		  	
				  	$feePaymentHeadInfo						= $this->M_crud->findById('stu_fee_collection_applicable_mode_list', $where = array('id' => $tempData->fee_head_id));
					$data['fee_head_stu_auto_id']			= $stuClassInfo->stu_auto_id;
					$data['fee_head_stu_branch_id']			= $stuClassInfo->branc_id;
					$data['fee_head_stu_class_id']			= $stuClassInfo->class_id;
					$data['fee_head_stu_group_id']			= $stuClassInfo->class_group_id;
					$data['fee_head_stu_section_id']		= $stuClassInfo->class_section_id;
					$data['fee_head_stu_shift_id']			= $stuClassInfo->class_shift_id;
					$data['fee_head_year']					= $stuClassInfo->year;
					
					if($feePaymentHeadInfo) {
						$data['fee_head_applicable_mode_name']	= $feePaymentHeadInfo->applicable_mode_name;
						$data['fee_head_mode_total_amount']		= $feePaymentHeadInfo->mode_total_amount;
						$data['fee_head_id']					= $feePaymentHeadInfo->fee_head_id;
						$data['cat_id']							= $feePaymentHeadInfo->cat_id;
					} else {
						$data['fee_head_applicable_mode_name']	= "Other's";
						$data['fee_head_mode_total_amount']		= 0;
						$data['fee_head_id']					= "others";
						$data['cat_id']							= "others";
					} 
					$data['fee_head_discount_amount']		= $tempData->discount_amount; 
					$data['fee_head_mode_pay_amount']		= $tempData->paid_amount; 
					$data['collection_approve_status']		= "approve";
					$data['pay_head_details']				= $tempData->head_details; 
					$data['invoice_no']						= $invoice_no; 
					$data['reciept_no']						= $reciept_no; 
					$data['admin_id']						= $this->session->userdata('userid');
					
					$data['date_time']						= $submittedDate." ".date('H:i:s');
					$data['submittedDate']					= $submittedDate;
					
					$this->db->insert('stu_fee_head_paid_details_info', $data); 
					
		   }
		   
		   //Start for Update Applicable Mode List from Paid Details Info
			$this->updateStuPaidHeadInfo($stuClassInfo->stu_auto_id, $stuClassInfo->year);
			//End Part of Update Applicable Mode List from Paid Details Info
		   $this->db->delete('temp_paid_fee_head_details', array('tempUniqInvoicNo' => $tempUniqInvoicNo));
		 	

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
					$basicInfo	   							= $this->M_crud->findById('system_basic_info', array());
					$message								=  "Dear, ".$stuInformation->stu_full_name.", ID No:".$stuInformation->stu_current_id." You Paid " .$this->input->post('totalAmount')."(TK) of ". date('d-M-Y')." into ".$basicInfo->inst_name.". Thanks.";	
					$sendMessage	= "0";
					
					if($this->input->post('toStudent') && $stuInformation->stu_mobile) {
						$sendMessage = $this->M_crud->sendMessageProcess($receiver_phone = $stuInformation->stu_mobile, $message, $stuInformation->stu_full_name, 'Student', 'Fee Collection');	
					}
					
					if($this->input->post('toFather') && $parentInformation && $parentInformation->f_mobile) {
						$sendMessage = $this->M_crud->sendMessageProcess($receiver_phone = $parentInformation->f_mobile, $message, $stuInformation->stu_full_name, 'Father', 'Fee Collection');	
					}
					if($this->input->post('toMother') && $parentInformation && $parentInformation->m_mobile) {
						$sendMessage = $this->M_crud->sendMessageProcess($receiver_phone = $parentInformation->m_mobile, $message, $stuInformation->stu_full_name, 'Mother', 'Fee Collection');	
					}
					
					if($this->input->post('toGuardian') && $parentInformation && $parentInformation->g_mobile) {
						$sendMessage = $this->M_crud->sendMessageProcess($receiver_phone = $parentInformation->g_mobile, $message, $stuInformation->stu_full_name, 'Guardian', 'Fee Collection');	
					}
					
					
					
					
		   			echo '<div class="alert alert-success col-md-10 col-md-offset-1">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Success!</strong> Collection Paid Successfully.'; 
							
						echo 'Click <a href="'.site_url('allReport/receitNoWiseEarningReportResult/'.$data['reciept_no']).'" target="_blank" >Here </a>For Reciept or Click to Initialize Button For New Transaction. 
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
			
			
			//$data['initialStuList']  = $this->M_crud->findStuListForFeeCollApplicable('class_wise_info', array("class_wise_info.stu_auto_id" => $data['stuID'], "class_wise_info.year" => $data['fee_year']), 'class_wise_auto_id',  'asc');
		
		//$data['paymentCollectionApplMode']  		= $this->M_crud->findAll('stu_fee_collection_applicable_mode_list', $where = array('fee_coll_app_stu_auto_id' => $data['stuID'], 'fee_year' => $data['feeYear']), $orderBy = 'id', $serialized = 'asc');
		
		//print_r($data['initialStuList']);	
		//$data['paymentCollectionMode']  		= $this->M_crud->findById('stu_payment_collection_managment', $where = array('fee_branch_id' => $data['fee_branch_id'], 'fee_class_id' => $data['fee_class_id'], 'fee_group_id' => $data['fee_group_id'], 'fee_year' => $data['fee_year']));
		
		//$data['existApplMode']					=  $this->M_crud->findAll('stu_fee_collection_applicable_mode_list', $where = array('fee_coll_app_stu_auto_id' => $data['stuID'], 'fee_year' => $data['fee_year']), $orderBy = 'id', $serialized = 'asc');
		
		//print_r($data['existApplMode']);	
			
			$this->load->view('feeCollectionModule/stuFeecollApplEditPage', $data);
		
		}
		
		
		public function categoryManage($onset = 0) {
			$data['title'] = self::Title;
			
			
			$data['categoryList'] 		=  $this->M_crud->findAllForPagination('fee_head_cat_list_manage', $where = array(),  $orderBy = 'id', $serialized = 'desc', $onset, $limit = 12);		$data['onset'] 			= $onset;
			$config['base_url'] 	= base_url('feeCollectionModule/categoryManage');
			$config['total_rows'] 	= $this->M_crud->countAllList('fee_head_cat_list_manage', array());
			$config['uri_segment'] 	= 3;
			$config['per_page'] 	= 12;
			$config['num_links'] 	= 7;
			$config['first_link']	= FALSE;
			$config['last_link'] 	= FALSE;
			$config['prev_link']	= 'Previous';
			$config['next_link'] 	= 'Next';
			$this->pagination->initialize($config); 
			
			$data['alertMsg']	= $this->session->userdata('alertMsg');
			$this->session->set_userdata(array('alertMsg' => ''));
			$this->load->view('feeCollectionModule/categoryManagePage', $data);

		}
		
		public function storeFeeHeadCat() {
			   $UpdateID								= $this->input->post('update_id');
			   $data['cat_name']						= $this->input->post('cat_name');
			   $data['status']							= $this->input->post('status');
			   $data['update_date_time']				= date('Y-m-d H:i:s');
			   $data['admin_id']						= $this->session->userid;
			   
				
			if(!empty($UpdateID)) {
				$this->db->update('fee_head_cat_list_manage', $data, array('id' => $UpdateID));         
				$this->session->set_userdata(array('alertMsg' => 'Update Successfull'));
			} else {
				$data['created_date_time']				= date('Y-m-d H:i:s');
				$this->db->insert('fee_head_cat_list_manage', $data); 
				$this->session->set_userdata(array('alertMsg' => 'Insert Successfull'));
			}
			
			$previousPage	=  $this->agent->referrer();
			redirect($previousPage);
		}
		
		
		public function feeHeadCreate($onset = 0) {
			$data['title'] = self::Title;
			$data['feeHeadList'] 	=  $this->M_crud->findAllForPagination('fee_head_list_manage', $where = array(),  $orderBy = 'id', $serialized = 'desc', $onset, $limit = 12);		$data['onset'] 			= $onset;
			$config['base_url'] 	= base_url('feeCollectionModule/feeHeadCreate');
			$config['total_rows'] 	= $this->M_crud->countAllList('fee_head_list_manage', array());
			$config['uri_segment'] 	= 3;
			$config['per_page'] 	= 12;
			$config['num_links'] 	= 7;
			$config['first_link']	= FALSE;
			$config['last_link'] 	= FALSE;
			$config['prev_link']	= 'Previous';
			$config['next_link'] 	= 'Next';
			$this->pagination->initialize($config); 
			
			$data['alertMsg']	= $this->session->userdata('alertMsg');
			$this->session->set_userdata(array('alertMsg' => ''));
			$this->load->view('feeCollectionModule/feeHeadCreatePage', $data);

		}
		
		
		public function storeFeeHead() {
			   $UpdateID								= $this->input->post('update_id');
			   $data['cat_id']							= $this->input->post('cat_id');
			   $data['head_name']						= $this->input->post('head_name');
			   $data['update_date_time']				= date('Y-m-d H:i:s');
			   $data['admin_id']						= $this->session->userid;
			   
				
			if(!empty($UpdateID)) {
				$this->db->update('fee_head_list_manage', $data, array('id' => $UpdateID));         
				$this->session->set_userdata(array('alertMsg' => 'Update Successfull'));
			} else {
				$data['created_date_time']				= date('Y-m-d H:i:s');
				$this->db->insert('fee_head_list_manage', $data); 
				$this->session->set_userdata(array('alertMsg' => 'Insert Successfull'));
			}
			
			$previousPage	=  $this->agent->referrer();
			redirect($previousPage);
		}
		
		
		public function feeCollectionSummaryReport() {
			$data['title'] = "Fee Collection Summary Report";
			$authorType = $this->session->usertype;
			$authorBranchID = $this->session->authorBranchID;
			
			if($authorType == "superadmin" ) {
			$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage',  array(), $orderBy = 'id', $serialized = 'asc');
			} else {
			$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
			}
			$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage',  array(), $order = 'sl_no', $serialized);
			$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage',  array(), $orderBy, $serialized);
			$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage',  array(), $orderBy, $serialized);
			$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage',  array(), $orderBy, $serialized);
			$this->load->view('feeCollectionModule/feeCollectionSummaryReportPage', $data);
	  }
	  
	  public function feeCollectionSummaryReportResult() {
		
		$data['title'] = "Fee Collection Summary Report";
		
		$data['branch_id'] 	= $this->input->post('branch_id'); 
		$data['class_id'] 	= $this->input->post('class_id'); 
		$data['group_id'] 	= $this->input->post('group_id'); 
		$data['section_id'] = $this->input->post('section_id'); 
		$data['shift_id'] 	= $this->input->post('shift_id'); 
		//$data['version'] 	= $this->input->post('version'); 
		$data['year'] = $this->input->post('year'); 
		$this->load->view('feeCollectionModule/feeCollectionSummaryReportResult', $data);
	
	}
	
	public function feeCollectionCatWiseReport() {
			$data['title'] = "Fee Collection Report";
			$authorType = $this->session->usertype;
			$authorBranchID = $this->session->authorBranchID;
			
			if($authorType == "superadmin" ) {
			$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage',  array(), $orderBy = 'id', $serialized = 'asc');
			} else {
			$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
			}
			$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage',  array(), $order = 'sl_no', $serialized);
			$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage',  array(), $orderBy, $serialized);
			$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage',  array(), $orderBy, $serialized);
			$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage',  array(), $orderBy, $serialized);
			$this->load->view('feeCollectionModule/feeCollectionCatWiseReportPage', $data);
	  }
	  
	   public function feeCollectionCatWiseReportResult() {
		
		$data['title'] = "Fee Collection Summary Report";
		
		$data['branch_id'] 	= $this->input->post('branch_id'); 
		$data['class_id'] 	= $this->input->post('class_id'); 
		$data['group_id'] 	= $this->input->post('group_id'); 
		$data['section_id'] = $this->input->post('section_id'); 
		$data['shift_id'] 	= $this->input->post('shift_id'); 
		$data['year'] 		= $this->input->post('year');
		$data['cat_id'] 	= $this->input->post('cat_id');
		$data['fee_head_id'] 	= $this->input->post('fee_head_id');
		$data['fromDate'] 	= $this->input->post('fromDate');
		$data['toDate'] 	= $this->input->post('toDate');  
		$this->load->view('feeCollectionModule/feeCollectionCatWiseReportResult', $data);
	}
	
	public function changeFeeHeadList() {
		$data['dataID'] 	= $this->input->post('dataID'); 
		$info	= $this->M_crud->findAll('fee_head_list_manage', array('cat_id' => $data['dataID'], 'status' => "Active"), 'id', 'asc');
		
		$response	= '<option value="" selected="selected">Select Head</option>';
		foreach($info as $v) {
			$response	.= '<option value="'.$v->id.'">'.$v->head_name.'</option>';
		}
		echo $response;
	}
	
	public function updateStuPaidHeadInfo($stu_auto_id, $stuYear) {
	
			$feeHeadModeDetailsInfoByGroup 		=  $this->M_crud->findAllGroupID($table = 'stu_fee_head_paid_details_info', $where = array('fee_head_stu_auto_id' => $stu_auto_id, 'fee_head_year' =>$stuYear, 'collection_approve_status' => "collection_approve_status"), $orderBy = 'id', $serialized = 'desc', $groupBy = 'fee_head_id');
		
			foreach($feeHeadModeDetailsInfoByGroup as $v) {
			$findAllPaidFeeHead 			=  $this->M_crud->findAll($table = 'stu_fee_head_paid_details_info', $where = array('fee_head_stu_auto_id'=> $stu_auto_id, 'fee_head_id' => $v->fee_head_id, 'fee_head_year' => $stuYear, 'collection_approve_status' => "collection_approve_status"), $orderBy = 'id', $serialized = 'desc');
			$totalDiscontAmount = 0;
			$totalPaidtAmount = 0;
			foreach($findAllPaidFeeHead as $vv) {
				$totalDiscontAmount = $vv->fee_head_discount_amount + $totalDiscontAmount;
				$totalPaidtAmount = $vv->fee_head_mode_pay_amount + $totalPaidtAmount;
			
			}
			if($v->fee_head_id != 'others') {
			$findFeeModeInfo	=	$this->M_crud->findById($table = 'stu_fee_collection_applicable_mode_list',$where = array('fee_coll_app_stu_auto_id' => $stu_auto_id, 'fee_head_id' => $v->fee_head_id, 'fee_year' => $stuYear));
			
			$data2['discount_amount'] = $totalDiscontAmount;
			$data2['mode_pay_amount'] = $totalPaidtAmount;
			$data2['mode_due_amount'] = ($findFeeModeInfo->mode_total_amount)-($totalDiscontAmount + $totalPaidtAmount);
			$this->db->update('stu_fee_collection_applicable_mode_list', $data2, array('fee_coll_app_stu_auto_id' => $stu_auto_id, 'fee_head_id' => $v->fee_head_id, 'fee_year' => $stuYear));
			} // End if($findAllPaidFeeHead->fee_head_id != 'others') {
		  }
		  
		$myDate = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-1 month" ) );
		$this->db->delete('temp_paid_fee_head_details', array('created_date<' => $myDate));
		return true;
	} // End updateStuPaidHeadInfo
	
	
	public function feeCollectionCatWiseCombReport() {
			$data['title'] = "Category wise Earning Combine Report";
			$this->load->view('feeCollectionModule/feeCollectionCatWiseCombReportPage', $data);
	  }
	  
	 public function feeCollectionCatWiseCombReportResult() {
		
		$data['title'] = "Category wise Earning Combine Report";
		
		$data['branch_id'] 	= $this->input->post('branch_id'); 
		$data['class_id'] 	= $this->input->post('class_id'); 
		$data['group_id'] 	= $this->input->post('group_id'); 
		$data['section_id'] = $this->input->post('section_id'); 
		$data['shift_id'] 	= $this->input->post('shift_id'); 
		$data['fromDate'] 	= $this->input->post('fromDate');
		$data['toDate'] 	= $this->input->post('toDate');  
		$this->load->view('feeCollectionModule/feeCollectionCatWiseCombReportResultPage', $data);
	} 
	
	
	public function exCollection() {
			$data['title'] = "Ex Student Fee Collection";
			$data['student_name'] 	= $this->input->get('student_name'); 
			$data['collection_date'] 	= $this->input->get('collection_date'); 
			
			$data['alertMsg']	= $this->session->userdata('alertMsg');
			$this->session->set_userdata(array('alertMsg' => ''));
			$this->load->view('feeCollectionModule/exCollectionPage', $data);
	 }
	 
	 public function exCollectionSave(){
	 	$data['student_name']	= $this->input->post('student_name');
		$data['collection_date']	= $this->input->post('collection_date');
		$head_id_list	= $this->input->post('head_id');
		$pay_head_details_list	= $this->input->post('pay_head_details');
		$pay_amount_list	= $this->input->post('pay_amount');
		
		$findMaxInvoice	=	$this->M_crud->findMax($table = 'ex_stu_fee_collection', $where = array(), $fieldName = 'invoice_no');
		if($findMaxInvoice) {
			$data['invoice_no']			= $findMaxInvoice->invoice_no+1;
		} else {
			$data['invoice_no']			= 1;
		}	
		foreach($head_id_list as  $k=> $v) {
			$explode = explode('_', $v);
			$data['cat_id']				= $explode[0];
			$data['head_id']			= $explode[1];
			$data['pay_head_details']	= $pay_head_details_list[$k];
			$data['pay_amount']			= $pay_amount_list[$k];
			$data['invoice_prefix']		= "EX";
			$data['admin_id']						= $this->session->userdata('userid');
			$this->db->insert('ex_stu_fee_collection', $data);
		}
		
		$this->session->set_userdata(array('alertMsg' => 'Fee Collection has been Submitted Successfully'));
		redirect('feeCollectionModule/exCollection');
	 } 
	
	 public function exMoneyReceipt() {
			$data['title'] = "Money Receipt";
			$data['invoice_no'] 	= $this->input->get('invoice_no'); 
			$this->load->view('feeCollectionModule/exMoneyReceiptPage', $data);
	 }	
}


