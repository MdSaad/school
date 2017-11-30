<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

	const  Title	 = 'VMGPS-Admin Panel';
	
	static $model 	 = array('M_admin', 'M_crud', 'M_join');
	static $helper   = array('url', 'authentication');

	
	public function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->model(self::$model);
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('email');
	}
	
	
	public function updateStuFeeCollApplcbleMdeList()
	{
		$feeHeadModeDetailsInfoByGroup 		=  $this->M_crud->findAllGroupID($table = 'stu_fee_head_paid_details_info', $where = array(), $orderBy = 'id', $serialized = 'desc', $groupBy = 'fee_head_feeModeNameCode');
		
		foreach($feeHeadModeDetailsInfoByGroup as $v) {
			
			//print_r($v);
			$findAllPaidFeeHead 			=  $this->M_crud->findAll($table = 'stu_fee_head_paid_details_info', $where = array('fee_head_feeModeNameCode' => $v->fee_head_feeModeNameCode), $orderBy = 'id', $serialized = 'desc');
			echo $v->fee_head_feeModeNameCode;
			echo "<br/>";
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
	
	

}


