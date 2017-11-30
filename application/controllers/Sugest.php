<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sugest extends CI_Controller
 {
	 const  Title	 = 'SMSC-Admin Panel';
	
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
		    $data['title'] 	= self::Title;
			
			
		    $table = 'stu_basic_info';
			$where = array();
			$orderBy = 'id';
			$serialized = 'asc';
			
			$sujestList		= $this->M_crud->findAll($table, $where, $orderBy, $serialized);	
			
			$categoryList 	= array();					
			foreach($sujestList as $k => $v){
				$categoryList[] = $v->stu_current_id;
			}
			
			$data['categoryList'] 	= $categoryList;
			
			$this->load->view('sujestPage', $data);
	   }
	  
 }
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 


