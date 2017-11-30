<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FeeCollectionApproveHome extends CI_Controller {

	const  Title	 = 'VMGPS&#65515;Fee Collection Approve';
	
	static $model 	 = array('M_crud', 'M_join');
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
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 	=  $this->M_crud->findAll('branch_list_manage', $where = array(), $orderBy = 'id', $serialized = 'desc');
		} else {
		$data['branchListInfo'] 	=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy = 'id', $serialized = 'desc');
		}
		$data['findAccessModule'] 	=  $this->M_crud->findAll('user_accesable_module', $where = array('user_id' =>$authorID), 'id' , 'asc');
		$data['authorType'] 		=  $this->session->usertype;
		
		$data['title'] 				=  self::Title;
		$data['basisInfo'] 			=  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		$data['findAlUnapproveDta'] =  $this->M_join->findAllUnapprove('stu_fee_head_paid_details_info', $where = array('stu_fee_head_paid_details_info.collection_approve_status' => "unapprove"), 'stu_fee_head_paid_details_info.fee_head_stu_auto_id', 'stu_fee_head_paid_details_info.id', 'desc');
		$this->load->view('feeCollectionModule/feeCollectionApprovePage', $data);
	}

    public function approveFee()
	{
		$id 				= $this->input->post('id');
        $updateStudentId   	= $this->M_crud->findById('stu_fee_head_paid_details_info', array('id' => $id));
        $data['collection_approve_status'] = "approve";
        $this->db->update('stu_fee_head_paid_details_info', $data, array('fee_head_stu_auto_id' => $updateStudentId->fee_head_stu_auto_id));

        $data['findAlUnapproveDta'] =  $this->M_join->findAllUnapprove('stu_fee_head_paid_details_info', $where = array('stu_fee_head_paid_details_info.collection_approve_status' => "unapprove"), 'stu_fee_head_paid_details_info.fee_head_stu_auto_id', 'stu_fee_head_paid_details_info.id', 'desc');
		$this->load->view('feeCollectionModule/feeCollectionApproveListPage', $data);  

	}









}
