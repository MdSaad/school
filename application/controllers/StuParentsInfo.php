<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StuParentsInfo extends CI_Controller {

	const  Title	 = 'VMGPS-Admin Panel';
	
	static $model 	 = array('M_admin', 'M_crud', 'M_join', 'M_crud_ayenal');
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
		$table = 'stu_basic_info';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		
		$sujestList		= $this->M_crud->findAll($table, $where, $orderBy, $serialized);	
		
		$categoryList 	= array();					
		foreach($sujestList as $k => $v){
			$categoryList[] = $v->stu_current_id;
		}
		
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where = array(), $orderBy = 'id', $serialized = 'desc');
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy = 'id', $serialized = 'desc');
		}
		
		$data['categoryList'] 	= $categoryList;
			
		$data['title'] = 'VMGPS&#65515;Student Parents Information';
		$data['alertMsg']	= $this->session->userdata('alertMsg');
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		
		$limit = 12;
		$data['stuParentsInfo'] 			=  $this->M_join->findAllParentsInfo('stu_parents_info', $where, 'stu_parents_info.stuP_AutoId', 'desc', $onset, $limit);
		
			
		//$data['allOrderList']    = $this->M_order_info->findAllByCus($customer_id);
		$data['onset'] 			= $onset;
		$config['base_url'] 	= base_url('stuParentsInfo/index');
		$config['total_rows'] 	= $this->M_crud->countAllList('stu_parents_info', array());
		$config['uri_segment'] 	= 3;
		$config['per_page'] 	= 12;
		$config['num_links'] 	= 7;
		$config['first_link']	= FALSE;
		$config['last_link'] 	= FALSE;
		$config['prev_link']	= 'Previous';
		$config['next_link'] 	= 'Next';

		$this->pagination->initialize($config); 
		
		$this->session->set_userdata(array('alertMsg' => ''));
		$this->load->view('studentInfo/stuParentsInfoPage', $data);
	}
	
	
	public function stuParentsInfoStore()
	{

		$updateId						= $this->input->post('update_id');
		
		$table = '';
		$where = array('id' => $updateId);
		$orderBy = 'id';
		
		$stuCurrentID					= $this->input->post('stuCurrentID');
			
		$data['f_name']					= $this->input->post('f_name');
		$data['f_pre_adrs']				= $this->input->post('f_pre_adrs');
		$data['f_per_adrs']				= $this->input->post('f_per_adrs');
		$data['f_occupation']			= $this->input->post('f_occupation');
		$data['f_occupation_adrs']		= $this->input->post('f_occupation_adrs');
		$data['f_yearly_income']		= $this->input->post('f_yearly_income');
		$data['f_mobile']				= $this->input->post('f_mobile');
		$data['f_passport_no']			= $this->input->post('f_passport_no');
		$data['f_nid']					= $this->input->post('f_nid');
		$data['f_driving_licence']		= $this->input->post('f_driving_licence');
		$data['f_email']				= $this->input->post('f_email');
		
		$data['m_name']					= $this->input->post('m_name');
		$data['m_pre_adrs']				= $this->input->post('m_pre_adrs');
		$data['m_per_adrs']				= $this->input->post('m_per_adrs');
		$data['m_occupation']			= $this->input->post('m_occupation');
		$data['m_occupation_adrs']		= $this->input->post('m_occupation_adrs');
		$data['m_yearly_income']		= $this->input->post('m_yearly_income');
		$data['m_mobile']				= $this->input->post('m_mobile');
		$data['m_passport_no']			= $this->input->post('m_passport_no');
		$data['m_nid']					= $this->input->post('m_nid');
		$data['m_driving_licence']		= $this->input->post('m_driving_licence');
		$data['m_email']				= $this->input->post('m_email');
		
		
		$data['g_name']					= $this->input->post('g_name');
		$data['g_pre_adrs']				= $this->input->post('g_pre_adrs');
		$data['g_per_adrs']				= $this->input->post('g_per_adrs');
		$data['g_occupation']			= $this->input->post('g_occupation');
		$data['g_occupation_adrs']		= $this->input->post('g_occupation_adrs');
		$data['g_mobile']				= $this->input->post('g_mobile');
		$data['g_passport_no']			= $this->input->post('g_passport_no');
		$data['g_nid']					= $this->input->post('g_nid');
		$data['g_email']				= $this->input->post('g_email');

		$father_photo					= $this->input->post('father_photo'); 
		$mother_photo					= $this->input->post('mother_photo');
		$guardian_photo					= $this->input->post('guardian_photo');

		if(!empty($father_photo))       $data['father_photo']	 = $father_photo;     
		if(!empty($mother_photo))       $data['mother_photo']	 = $mother_photo; 
		if(!empty($guardian_photo))     $data['guardian_photo']	 = $guardian_photo; 
	
		
		
	
		$data['date_time']					= date("Y-m-d h:i:sa");
		$data['year']						= date("Y");
		$findStuAutoID						= $this->M_crud->findById('stu_basic_info', array('stu_current_id'=>$stuCurrentID));

		
		$data['stu_auto_id']				= $findStuAutoID->id;
		
		if(!empty($updateId)) {
			$stuParentsInfo = $this->M_crud->findById('stu_parents_info', array('stu_auto_id'=>$updateId));
				
			if( !empty($stuParentsInfo->father_photo) && file_exists('./resource/parents_gardian_photo/'.$stuParentsInfo->father_photo) && !empty($father_photo) ) {					
				unlink('./resource/parents_gardian_photo/'.$stuParentsInfo->father_photo);	
			}
			
			if( !empty($stuParentsInfo->mother_photo) && file_exists('./resource/parents_gardian_photo/'.$stuParentsInfo->mother_photo) && !empty($mother_photo) ) {					
				unlink('./resource/parents_gardian_photo/'.$stuParentsInfo->mother_photo);	
			}		

			if( !empty($stuParentsInfo->guardian_photo) && file_exists('./resource/parents_gardian_photo/'.$stuParentsInfo->guardian_photo) && !empty($guardian_photo) ) {					
				unlink('./resource/parents_gardian_photo/'.$stuParentsInfo->guardian_photo);	
			}				
			$this->db->update('stu_parents_info', $data, array('stu_auto_id' => $updateId));  
			$this->session->set_userdata(array('alertMsg' => 'Update Successfully')); 
		} else {
			$this->db->insert('stu_parents_info', $data); 
			$this->session->set_userdata(array('alertMsg' => 'Added Successfully'));
		}
		//redirect('stuParentsInfo');

	}


	public function stuWiseImageView()
	{
		$stuId				= $this->input->post('stuId');
		$data['stuInfo']   	= $this->M_crud_ayenal->findById('stu_basic_info', array('stu_current_id' =>$stuId));	
		
        $this->load->view('studentInfo/stuWiseImageViewPage', $data);
	}

	public function parrentsInfoChk()
	{
		$stuCurrentID				= $this->input->post('stuCurrentID');
		$stuInfo   					= $this->M_crud_ayenal->findById('stu_basic_info', array('stu_current_id' =>$stuCurrentID));	
		$data['stuParrentsInfo']   	= $this->M_crud_ayenal->findById('stu_parents_info', array('stu_auto_id' =>$stuInfo->id));	
		echo json_encode($data['stuParrentsInfo'] );
        
	}





}


