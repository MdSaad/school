<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	const Title	 = '';
	
	
	static $model 	 = array('M_crud', 'M_join', 'M_join_ayenal', 'M_crud_ayenal');
	static $helper   = array('url', 'authentication');

	
	public function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->model(self::$model);
		$this->load->helper('url');
		$this->load->helper(self::$helper);
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('user_agent');
		$this->load->library('pagination');
		$this->load->helper('text');
		$this->load->helper('date');
		date_default_timezone_set('Asia/Dhaka');
		//isAuthenticate();
	}
	

	public function edit($table, $field) {
		$dataID		= $this->input->post('id');
		$result		=  $this->M_crud->findById($table, $where = array($field => $dataID));
		echo json_encode($result);
		
	}
	
	public function delete($table, $field, $dataID){
			$this->db->delete($table,  array($field => $dataID));
			$this->session->set_userdata(array('alertMsg' => "Delete Successfully"));
			$previousPage	=  $this->agent->referrer();
			redirect($previousPage);
	}
	

	
}
