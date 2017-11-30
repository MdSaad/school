<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LiveChat extends CI_Controller {

		static $model 	 = array('M_admin', 'M_crud_ayenal', 'M_join_ayenal','M_crud', 'M_join');
		static $helper   = array('url', 'chatauthentication');

	
		const  Title	 = 'VMGPS&#65515; Live Chat';
		
	
		public function __construct(){

			parent::__construct();
			$this->load->database();
			$this->load->model(self::$model);
			$this->load->helper(self::$helper);
			$this->load->library('session');
			$this->load->library('email');
			$this->load->library('pagination');
			isAuthenticate();
		}
	
	

		public function index()
	
		{	
		 
			$data['title']  			= self::Title;	
			$userId  					= getUserName();
			$userDetails   		    	= $this->M_crud_ayenal->findById('all_chat_user_registration', array('user_name' => $userId));
			$data['userAutoId']       	= $userDetails->id;
			$data['activeUser']       	= $userDetails->full_name;
			$data['userType']       	= $userDetails->user_type;
			$data['totalActiveUser']  	= $this->M_crud_ayenal->countAllActiveUser('all_chat_user_registration', $userDetails->id);  
			$data['allUser']   			= $this->M_crud_ayenal->findAllLoginUser('all_chat_user_registration', $userDetails->id); 
			
			$this->load->view('liveChat/liveChatPage', $data);
	
		}
		
		
		public function chatWiseDetail()
		{
			  if( isActiveUser() ) {
			      $userId  			= getUserName();
				  $userDetails      = $this->M_crud_ayenal->findById('all_chat_user_registration', array('user_name' => $userId));
		     }
			  $id   				= $this->input->post('id');
		      $allData              = $this->M_join_ayenal->findAllSmsById('live_chat', $id, $userDetails->id);
			  $allMsg   			= $this->M_crud_ayenal->findById('all_chat_user_registration', array('id' => $id)); 
			  $allMsg->sendUser     = $userDetails->id;
			  $allMsg->senderImg    = $userDetails->image;
			  $allMsg->countMsg     = $this->M_crud_ayenal->countAllMsg('live_chat', $id, $userDetails->id);
			  $allMsg->msg   		= array_reverse($allData);
			  if(empty($allMsg->msg)){
			  	$allMsg->alert      = "nomsg";
			  } 
              echo json_encode($allMsg);
		}
		
		
		public function sendMessageAction()
		{
			if( isActiveUser() ) {
			      $userId  			= getUserName();
				  $userDetails      = $this->M_crud_ayenal->findById('all_chat_user_registration', array('user_name' => $userId));
		     }

		       date_default_timezone_set("Asia/Dhaka");
			   $data['send_to']   	= $this->input->post('id');
			   $data['send_from']   = $userDetails->id;
			   $data['date_time']   = date('Y-m-d H:i:s');
			   $data['msg_status']  = "1";
			   $data['message']   	= $this->input->post('message');

			   if(!empty($data['message'])){
			   	$this->db->insert('live_chat', $data); 
			   }

			   redirect('liveChat/msgListViewMain/'.$data['send_to']);
		}
		
		
		public function msgListViewMain($send_to)
		{
		  	if( isActiveUser() ) {
			    $userId  		= getUserName();
				$userDetails    = $this->M_crud_ayenal->findById('all_chat_user_registration', array('user_name' => $userId));
		  	}
	      $data['userDetails']  = $userDetails;
		  $allMsg   			= $this->M_join_ayenal->findAllSmsById('live_chat', $send_to, $userDetails->id);
		  $data['allMsg']   	= array_reverse($allMsg);
          $this->load->view('liveChat/allmsgViewPage', $data);
				
		}


		public function updateMsgStatus()
		{
		  
           $msgId   			= $this->input->post('msgId');
           $data['msg_status']  = "0";
           $this->M_crud_ayenal->update('live_chat', $data, array('id' => $msgId));
				
        }


        public function getMsgFromUser()
		{
		    if( isActiveUser() ) {
			    $userId  		= getUserName();
				$userDetails    = $this->M_crud_ayenal->findById('all_chat_user_registration', array('user_name' => $userId));
		  	}
			  $sendTo   			= $this->input->post('activeUser');
			  $sendFromdetails   	= $this->M_crud_ayenal->findById('live_chat', array('send_to' => $sendTo, 'msg_status' => "1")); 

			  if(!empty($sendFromdetails)){
				  $alldata   			= $this->M_join_ayenal->getAllSmsById('live_chat', $sendFromdetails->send_from, $userDetails->id);
			      $allMsg   			= $this->M_crud_ayenal->findById('all_chat_user_registration', array('id' => $sendFromdetails->send_from)); 
				  $allMsg->sendUser     = $userDetails->id;
				  $allMsg->senderImg    = $userDetails->image;
				  $allMsg->msgId    	= $sendFromdetails->id;
			      $allMsg->countMsg     = $this->M_crud_ayenal->countAllMsg('live_chat', $sendFromdetails->send_from, $userDetails->id);
				  $allMsg->allmsg   	= array_reverse($alldata);
				  if(empty($allMsg->allmsg)){
				  	$allMsg->alert      = "nomsg";
			      } 
				  echo json_encode($allMsg);  
			 } else {
			   echo "noNewMsg";
			 }


             
		}

		public function getAllActiveUser()
		{
		  if( isActiveUser() ) {
		      $userId  					= getUserName();
			  $userDetails   		    = $this->M_crud_ayenal->findById('all_chat_user_registration', array('user_name' => $userId));
			  $data['activeUser']       = $userDetails->full_name;
			  $data['totalActiveUser']  = $this->M_crud_ayenal->countAllActiveUser('all_chat_user_registration', $userDetails->id);  
			  $data['allUser']   		= $this->M_crud_ayenal->findAllLoginUser('all_chat_user_registration', $userDetails->id); 

		   }
		  
           $this->load->view('liveChat/getAllActiveUserPage', $data);
				
		}


      
		public function oldMsgView()
		{
		  if( isActiveUser() ) {
		      $userId  			= getUserName();
			  $userDetails      = $this->M_crud_ayenal->findById('all_chat_user_registration', array('user_name' => $userId));
	      }
	      $data['userDetails']  = $userDetails;
		  $sendToId   			= $this->input->post('sendToId');
		  $allMsg   			= $this->M_crud_ayenal->findAllOldMsg('live_chat', $sendToId, $userDetails->id);
		  $data['allMsg']   	= array_reverse($allMsg);
          $this->load->view('liveChat/oldMsgViewPage', $data);
				
		}
  
      

		public function searchUser()
		{
		  if( isActiveUser() ) {
		      $userId  			= getUserName();
			  $userDetails      = $this->M_crud_ayenal->findById('all_chat_user_registration', array('user_name' => $userId));
	      }
	      $data['user']  		= $this->input->post('user');
		  $data['allUser']   	= $this->M_crud_ayenal->findAllSearchLiveUser('all_chat_user_registration', $data['user'], $userDetails->full_name); 
		  
          $this->load->view('liveChat/searhLiveUserViewPage', $data);
				
		}



	

}

