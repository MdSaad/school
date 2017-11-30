<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

	static $model 	 = array();
	static $helper   = array('form');
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model(self::$model);
		$this->load->helper(self::$helper);
		$this->load->library('upload');
	}
	
	public function index($type = 0)
	{	
		$output = array();

		if($type == 'inst_logo'){
			$config = array('upload_path' => './resource/basicImg/');
			$fileLocation = "resource/basicImg/";
		
		}else if($type == 'stu_photo'){
			$config = array('upload_path' => './resource/stu_photo/');
			$fileLocation = "resource/stu_photo/";

		}else if($type == 'emp_photo'){
			$config = array('upload_path' => './resource/emp_photo/');
			$fileLocation = "resource/emp_photo/";

		}else if($type == 'user_photo'){
			$config = array('upload_path' => './resource/Register_image/');
			$fileLocation = "resource/Register_image/";

		}else if($type == 'father_photo' ||  $type == 'mother_photo' || $type == 'guardian_photo'){
			$config = array('upload_path' => './resource/parents_gardian_photo/');
			$fileLocation = "resource/parents_gardian_photo/";
		
		}  else  {
			$config = array('upload_path' => './uploads/', 'max_size' => '200');
			$fileLocation = "uploads/";
		}

		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['file_name'] 	 = time();

		$this->upload->initialize($config);

		if($this->upload->do_upload('attachment')) {
			$uploadData = $this->upload->data();
			$output['status'] = 'success';
			$output['fileLocation'] = $fileLocation.$uploadData['file_name'];
			$output['fileName'] 	= $uploadData['file_name'];
		} else {
			$output['status'] = 'failed';
			$output['message'] = $this->upload->display_errors('', '');
		}

		echo json_encode($output);
	}


	public function remove($type = 0)
	{	
		 $fileName = $this->input->post('attachment');

		
		if($type == 'inst_logo') {
			$fileLink = './resource/basicImg/'.$fileName;
		} 
		
		if($type == 'stu_photo') {
			$fileLink = './resource/stu_photo/'.$fileName; 
		}

		if($type == 'emp_photo') {
			$fileLink = './resource/emp_photo/'.$fileName; 
		}

		if($type == 'user_photo') {
			$fileLink = './resource/Register_image/'.$fileName; 
		}

		if($type == 'father_photo' ||  $type == 'mother_photo' || $type == 'guardian_photo'){
			$fileLink = './resource/parents_gardian_photo/'.$fileName; 
		}
		
		unlink($fileLink);
	}
	
	


}