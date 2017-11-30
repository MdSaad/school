<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms extends CI_Controller {

	const  Title	 = 'VMGPS-Admin Panel';
	
	static $model 	 = array('M_admin', 'M_crud', 'M_join');
	static $helper   = array('url', 'authentication');

	
	public function __construct(){

		parent::__construct();
		$this->load->database();
		$this->load->model(self::$model);
		$this->load->helper(self::$helper);
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('pagination');
		isAuthenticate();
	}
	
	
	public function index()
	{
		// Register your ip first. To do that, contact bpl personnel
			$url = 'http://180.210.190.230:6500/httpapi/sendsms';
			$fields = array(
								'userId' => urlencode('sawebsoft'),
								'password' => urlencode('Sawebsoft123'),
								'smsText' => urlencode('This is a sample sms text.'),
								'commaSeperatedReceiverNumbers' => '01854278070'
							);
			
			foreach($fields as $key=>$value){ 
				$fields_string .= $key.'='.$value.'&'; 
			}
			
			rtrim($fields_string, '&');
			
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL, $url);
			
			// If you have proxy
			// $proxy = '<proxy-ip>:<proxy-port>';
			// curl_setopt($ch, CURLOPT_PROXY, $proxy);
			
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_POST, count($fields));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_FAILONERROR, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
			$result = curl_exec($ch);
			
			if($result === false)
			{    
				echo sprintf('<span>%s</span>CURL error:', curl_error($ch));
				return;
			}
			
			$json_result = json_decode($result);
			var_dump($json_result);
			
			if($json_result->isError){
				echo sprintf("<p style='color:red'>ERROR: <span style='font-weight:bold;'>%s</span></p>", $json_result->message);
			}
			else{
				echo sprintf("<p style='color:green;'>SUCCESS!</p>");
			}
			
			curl_close($ch);
		  
	}

}


