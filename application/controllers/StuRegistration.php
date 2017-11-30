<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StuRegistration extends CI_Controller {

	const  Title	 = 'VMGPS-Admin Panel';
	
	static $model 	 = array('M_admin', 'M_crud');
	static $helper   = array('url', 'authentication');

	
	public function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->model(self::$model);
		$this->load->helper('url');
		$this->load->helper(self::$helper);
		$this->load->library('email');
		$this->load->library('session');
	}
	
	
	public function index()
	{
		$data['msg']		= $this->session->userdata('msg');
		$data['title'] = 'VMGPS&#65515;Student Registration';
		$this->session->set_userdata(array('msg' => ""));
		$this->load->view('stuRegistrationPage', $data);
	}

	public function stuRegistrationDataSave()
	{
		$data['student_id']			= $this->input->post('student_id');
		$stuDeatils   				= $this->M_crud->findById('class_wise_info', array('stu_id' => $data['student_id']));
		$data['stu_auto_id']		= $stuDeatils->stu_auto_id;
		$data['password']			= $this->input->post('password');
		$data['status']				= $this->input->post('status');
		$data['registration_date']	= date('Y-m-d');

		$chkRegistration  = $this->M_crud->findById('stu_registration', array('student_id' => $data['student_id'])); 
	    if(empty($chkRegistration)){
	    	$this->db->insert('stu_registration', $data);
	    } else {
           $this->db->update('stu_registration', $data, array('student_id' => $data['student_id']));
	    }
	    
		$this->session->set_userdata(array('msg' => "Registration successfully"));	
		redirect('stuRegistration');
	    
	}

	public function chkValidId()
	{
		$stuId		= $this->input->post('stuId');
		$chkQuery   = $this->M_crud->findById('class_wise_info', array('stu_id' => $stuId));
		if(empty($chkQuery)) echo "1";

	}

	
}


