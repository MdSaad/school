<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SystemBasicInfo extends CI_Controller {

	const  Title	 = 'VMGPS-Admin Panel';
	
	static $model 	 = array('M_admin', 'M_crud');
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
		$data['title'] = 'VMGPS&#65515;System Settings';
		$data['alertMsg']	= $this->session->userdata('alertMsg');
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		$this->session->set_userdata(array('alertMsg' => ''));
		$this->load->view('basicInfo/basicInfoPage', $data);
	}
	
	
	public function update()
	{
		$updateId						= $this->input->post('update_id');
		
		$table = 'system_basic_info';
		$where = array('id' => $updateId);
		$orderBy = 'id';
			
		$data['inst_name']				= $this->input->post('inst_name');
		$data['inst_adrs']				= $this->input->post('inst_adrs');
		$data['inst_phone_no']			= $this->input->post('inst_phone_no');
		$data['inst_web_site']			= $this->input->post('inst_web_site');
		$data['inst_establishe_date']	= $this->input->post('inst_establishe_date');
		$data['inst_establishe_date']	= $this->input->post('inst_establishe_date');
		$data['soft_start_date']		= $this->input->post('soft_start_date');
		
		$inst_logo						= $this->input->post('inst_logo');
		
		if(!empty($inst_logo)) {
			$data['inst_logo']	= $inst_logo;
			$basicInfo 	= $this->M_crud->findById($table, $where);
			if(!empty($basicInfo->inst_logo) && file_exists('./resource/basicImg/'.$basicInfo->inst_logo)) {					
				unlink('./resource/basicImg/'.$basicInfo->inst_logo);	
			}
		}
	
		
		$this->db->update('system_basic_info', $data, array('id' => $updateId));
		$data['basisInfo'] =  $this->M_crud->findABasicInfo($table, $orderBy);
		$this->session->set_userdata(array('alertMsg' => 'Update Successfully'));
		redirect('systemBasicInfo');
	}

}


