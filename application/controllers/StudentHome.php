<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentHome extends CI_Controller {

	const  Title	 = 'VMGPS-Admin Panel';
	
	static $model 	 = array('M_crud_ayenal', 'M_crud', 'M_join', 'M_join_ayenal');
	static $helper   = array('url', 'stuauthentication');

	
	public function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->model(self::$model);
		$this->load->helper('url');
		$this->load->helper(self::$helper);
		$this->load->library('session');
		$this->load->library('email');
	}
	
	
	public function index()
	{
		
		$data['title']  		= 'VMGPS&#65515;Student Fee collection';
		$userAutoId     		= $this->session->userdata('userAutoId');
		$data['UserDetails']	= $this->M_crud->findById('stu_basic_info', array('id' => $userAutoId));
		$data['stuDetails']		= $this->M_crud->findById('class_wise_info', array('stu_auto_id' => $userAutoId));


		$data['stuID']			= $this->session->userdata('UserName');
		$data['stuYear']	    = $data['stuDetails']->year;
		
		
		$data['findStuInfoClassWise']  = $this->M_join->findStuInfoByIDClassWise('class_wise_info', array('class_wise_info.stu_id' =>$data['stuID']));

		$data['findStuInfoClassWise']->stu_auto_id;


		$data['studentLastTreeReceptNo']    = $this->M_crud->findLastThreeRepNo('stu_fee_head_paid_details_info', $where = array('fee_head_stu_auto_id' => $data['findStuInfoClassWise']->stu_auto_id, 'fee_head_year' =>$data['stuYear'], 'collection_approve_status' => "unapprove"), $groupBy='invoice_no', $orderBy = 'id' , $serialized = 'desc', $limit = '3'); 


		if(!empty($data['findStuInfoClassWise'])) {
		$data['applicablePaymentHeaderList'] 		=  $this->M_crud->findAll('stu_fee_collection_applicable_mode_list', $where = array('fee_coll_app_stu_auto_id' => $data['findStuInfoClassWise']->stu_auto_id, 'fee_year' =>$data['stuYear']), $orderBy = 'id' , $serialized = 'asc');

		//print_r($data['applicablePaymentHeaderList']);
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

		$this->load->view('studentPanel/studentfeeCollectionPage', $data);
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
		
		$data['submitFeeHeadAmountInfo'] 		=  $this->M_join->findSubmittedHeadInfo('temp_paid_fee_head_details', $where = array('invoice_no' => $data['invoice_no']), $orderBy = 'id' , $serialized = 'desc');
		
		$this->load->view('studentPanel/stuSubmitFeeHeadAmountPage', $data);
		
	}

	public function loadFeeHeadAmount(){
		$data['feePaymentHeadID']					= $this->input->post('feePaymentHeadID');
		$data['feePaymentHeadInfo']  = $this->M_crud->findById('stu_fee_collection_applicable_mode_list', $where = array('id' => $data['feePaymentHeadID']));
		
		//$this->load->view('feeCollectionModule/loadFeeHeadAmountPage', $data);
		echo $data['feePaymentHeadInfo']->mode_due_amount;
		
	}
	


	public function removeFeePaidHead() {
	   $data['dataID']					= $this->input->post('dataID');
	   $this->db->delete('temp_paid_fee_head_details', array('id' =>  $data['dataID'])); 
	   
	   $data['invoice_no']						= $this->session->userdata('feeHeadPaidInvoice_no');
	   $data['submitFeeHeadAmountInfo'] 		=  $this->M_join->findSubmittedHeadInfo('temp_paid_fee_head_details', $where = array('invoice_no' => $data['invoice_no']), $orderBy = 'id' , $serialized = 'desc');
	   $this->load->view('studentPanel/stuSubmitFeeHeadAmountPage', $data);
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
					$data['pay_head_details']				= $tempData->head_details;
					$data['collection_approve_status']		= "unapprove";
					$data['invoice_no']						= $invoice_no; 
					
					$data['fee_head_feeModeNameCode']		= $feePaymentHeadInfo->feeModeNameCode;
					$data['date_time']						= date('Y-m-d H:i:s');
					$data['submittedDate']					= date('Y-m-d');
					
					$this->db->insert('stu_fee_head_paid_details_info', $data); 
					$this->db->delete('temp_paid_fee_head_details', array('tempUniqInvoicNo' => $tempUniqInvoicNo));
					
					
					
				$feeHeadModeDetailsInfoByGroup 		=  $this->M_crud->findAllGroupID($table = 'stu_fee_head_paid_details_info', $where = array('fee_head_stu_auto_id' => $data['fee_head_stu_auto_id']), $orderBy = 'id', $serialized = 'desc', $groupBy = 'fee_head_feeModeNameCode');
				
				foreach($feeHeadModeDetailsInfoByGroup as $v) {
					$findAllPaidFeeHead 			=  $this->M_crud->findAll($table = 'stu_fee_head_paid_details_info', $where = array('fee_head_feeModeNameCode' => $v->fee_head_feeModeNameCode), $orderBy = 'id', $serialized = 'desc');
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
							
							
							if(strlen($response) == 1) {
								
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
							
							echo 'Click <a href="'.site_url('studentHome/receitNoWiseEarningReportResult/'.$data['invoice_no']).'" target="_blank" >Here </a>For Reciept or Click to Initialize Button For New Transaction. 
						 </div>'; 


						 $this->session->set_userdata(array('feeHeadPaidInvoice_no' => ""));
	
	
		    }



		    public function printReciept() {
				echo "Here are Print Page. Coming Soon...";
			}




			public function receitNoWiseEarningReportResult($recetno) {
				$data['title'] 		= "Fee Collection Earning Report";
				$data['recetno']    = $recetno; 
			    $studentDetais 		= $this->M_crud->findById('stu_fee_head_paid_details_info', array('invoice_no' => $recetno)); 	
				
				if(!empty($studentDetais)) {
				 	$data['stuDetailsInfo']  	= $this->M_join->findStuInfoByIDClassWise('class_wise_info', array('class_wise_info.stu_auto_id' => $studentDetais->fee_head_stu_auto_id));
					$data['stuPayDetailsInfo']  = $this->M_crud->findAll('stu_fee_head_paid_details_info', $where = array('invoice_no' => $recetno), $orderBy = 'id', $serialized = 'desc');
					
					 $data['branch_name']  = $data['stuDetailsInfo']->branch_name;
				 }
				
				 
			
				$this->load->view('studentPanel/receitNoWiseEarningReportResult', $data);
			
			}


			public function pdfRecept($recetno) {
				$data['title'] 		= "Fee Collection Earning Report";
				$data['recetno']    = $recetno; 
			    $studentDetais 		= $this->M_crud->findById('stu_fee_head_paid_details_info', array('invoice_no' => $recetno)); 	
				
				if(!empty($studentDetais)) {
				 	$data['stuDetailsInfo']  	= $this->M_join->findStuInfoByIDClassWise('class_wise_info', array('class_wise_info.stu_auto_id' => $studentDetais->fee_head_stu_auto_id));
					$data['stuPayDetailsInfo']  = $this->M_crud->findAll('stu_fee_head_paid_details_info', $where = array('invoice_no' => $recetno), $orderBy = 'id', $serialized = 'desc');
					
					 $data['branch_name']  = $data['stuDetailsInfo']->branch_name;
				 }
				
				 
			
				$this->load->view('studentPanel/pdfReceptPage', $data);
			
			}




			public function receptPrint($recetno) {
				$data['title'] 		= "Fee Collection Earning Report";
				$data['recetno']    = $recetno; 
			    $studentDetais 		= $this->M_crud->findById('stu_fee_head_paid_details_info', array('invoice_no' => $recetno)); 	
				
				if(!empty($studentDetais)) {
				 	$data['stuDetailsInfo']  	= $this->M_join->findStuInfoByIDClassWise('class_wise_info', array('class_wise_info.stu_auto_id' => $studentDetais->fee_head_stu_auto_id));
					$data['stuPayDetailsInfo']  = $this->M_crud->findAll('stu_fee_head_paid_details_info', $where = array('invoice_no' => $recetno), $orderBy = 'id', $serialized = 'desc');
					
					 $data['branch_name']  = $data['stuDetailsInfo']->branch_name;
				 }
				
				 
			
				$this->load->view('studentPanel/receitNoWisePrintPage', $data);
			
			}
				










	
	
}


