<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LibraryManage extends CI_Controller {

	const  Title	 = 'VMGPS-Admin Panel';
	
	static $model 	 = array('M_admin', 'M_crud_ayenal', 'M_join_ayenal','M_crud', 'M_join');
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
	
	
	public function index()
	{
		$data['title'] = 'VMGPS&#65515;Library Managment';
		$currYear 	= date('Y');
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		$this->load->view('library/libraryModulePage', $data);
	}


    public function bookCreate()
	{
		$data['title'] = 'VMGPS&#65515;Library Book Create';
		$currYear 	= date('Y');
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		$data['bookTypeListInfo'] 		=  $this->M_crud->findAll('book_type', $where, 'id', $serialized);
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, $order = 'sl_no', $serialized);

		$this->load->view('library/bookCreatePage', $data);
	}

	public function bookCreateInitialize()
	{
		$data['title'] = 'VMGPS&#65515;Library Book Create';
		$currYear 	= date('Y');
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;

		$language					= $this->input->post('language');
		$data['language']			= $language;
		$data['book_type_id']		= $this->input->post('book_type_id');
		$data['class_id']			= $this->input->post('class_id');
		$data['subject_id']			= $this->input->post('subject_id');


		$findMaxId   = $this->M_crud_ayenal->findMax('library_book_create', array('language' => $data['language'], 'class_id' => $data['class_id']), 'book_id');


	   if(!empty($findMaxId->book_id)){
	   	   $bookId   			= $findMaxId->book_id; 
	   	   $partId 				= str_split($bookId, 3);
	   	   $adTwoPart           = $partId[1].$partId[2];
	   	   $incremntId          = $adTwoPart+1;
	   	   $data['bookId']      = $partId[0].$incremntId; 
	   	   
	   }else{
	   	$classDetails   		= $this->M_crud_ayenal->findById('class_list_manage', array('id' => $data['class_id']));  
	   	$className         		= $classDetails->class_name;

		   	if(!empty($className)){
			   	if($className =='Play' || $className =='KG1')   
			   	    $data['bookId']     = "L".$language[0].$className[0]."10001"; 
			   	else 
			   		$data['bookId']     = "L".$language[0].$className[6]."10001"; 
			} else {
			   	$data['bookId']     = "L".$language[0]."O10001"; 
			}

	   }

		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		$data['subjectListInfo'] 		=  $this->M_crud_ayenal->findAll('library_subject_manage', array('class_id' => $data['class_id']), $orderBy, $serialized);	
		$data['bookTypeListInfo'] 		=  $this->M_crud->findAll('book_type', $where, 'id', $serialized);
		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, $order = 'sl_no', $serialized);

		$this->load->view('library/bookCreateInitializePage', $data);
	}


	public function bookCreateAction()
	{


		$data['language']				= $this->input->post('language_in');
		$data['book_type_id']	    	= $this->input->post('book_type_id_in');
		$data['class_id']				= $this->input->post('class_id_in');
		$data['subject_id']				= $this->input->post('subject_id_in');
		$data['book_id']				= $this->input->post('book_id');
		$data['book_name']				= $this->input->post('book_name');
		$data['entry_date']				= $this->input->post('entry_date');
		$data['writer_name']			= $this->input->post('writer_name');
		$data['publication']			= $this->input->post('publication');
		$data['isbn']					= $this->input->post('isbn');
		$data['edition']				= $this->input->post('edition');
		$data['selves_location']		= $this->input->post('selves_location');
		$data['book_collection_type']	= $this->input->post('book_collection_type');
		if($data['language'] !=''){
		    $lastId    = $this->M_crud_ayenal->save('library_book_create', $data);
		}



		if($data['book_collection_type'] == 'purchasable'){
           	$data2['book_id']				= $lastId;
           	$data2['purchase_price']			= $this->input->post('purchase_price');
			$data2['purchase_vandor']		= $this->input->post('purchase_vandor');
			$data2['pur_quantity']			= $this->input->post('pur_quantity');
			$data2['pur_date']				= $this->input->post('pur_date');
			if($data2['purchase_price'] !=''){
			  $this->M_crud_ayenal->save('book_purchase_info', $data2);
			}
		} 
		if($data['book_collection_type'] == 'gifted'){
			$data2['book_id']				= $lastId;
           	$data2['gift_com_name']			= $this->input->post('gift_com_name');
			$data2['gift_quan']				= $this->input->post('gift_quan');
			$data2['gift_date']				= $this->input->post('gift_date');
			if($data2['gift_com_name'] !=''){
			   $this->M_crud_ayenal->save('book_gift_info', $data2);
			}
		} 

		if($data['book_collection_type'] == 'donated'){
           	$data2['book_id']				= $lastId;
			$data2['don_com_name']			= $this->input->post('don_com_name');
			$data2['don_quan']				= $this->input->post('don_quan');
			$data2['don_date']				= $this->input->post('don_date');
			if($data2['don_com_name'] !=''){
			  $this->M_crud_ayenal->save('book_donate_info', $data2);
			}

		} 

		

	}

	public function bookIssue()
	{
		$data['title'] = 'VMGPS&#65515;Library Book Issue';
		$currYear 	= date('Y');
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		$this->load->view('library/bookIssuePage', $data);
	}



	public function issueForStudent()
	{
		$data['title'] = 'VMGPS&#65515;Issue For Student';
		$currYear 	= date('Y');
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, $order = 'sl_no', $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);

		$this->load->view('library/issueForStudentPage', $data);
	}



	public function bookTypeStore()
	{
		$type_id_edit			    = $this->input->post('type_id_edit');
		$data['book_type_name']		= $this->input->post('book_type_name');
		
		
		$table = 'book_type';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';

		   if(!empty($type_id_edit)){
			   if($data['book_type_name'] !=''){
				$this->M_crud_ayenal->update($table, $data, array('id' => $type_id_edit));
			   }
			}else{
				if($data['book_type_name'] !=''){
				   $lastId      =  $this->M_crud_ayenal->save($table, $data); 
				}
			}
		
			
	    $bookTypeList =  $this->M_crud->findAll($table, $where, $orderBy, $serialized);


		
		if($type_id_edit){
			echo '<option value="">Select Book Type</option>';
			foreach($bookTypeList as $v) {
			if($type_id_edit == $v->id){
			  echo '<option value="'.$v->id.'" data-type-name="'.$v->book_type_name.'" selected>'.$v->book_type_name.'</option>';
		    }else{
			  echo '<option value="'.$v->id.'" data-type-name="'.$v->book_type_name.'">'.$v->book_type_name.'</option>';
		    }
		   }
		}else{

			echo '<option value="">Select Book Type</option>';
			foreach($bookTypeList as $v) {
			if($lastId == $v->id){
			  echo '<option value="'.$v->id.'" data-type-name="'.$v->book_type_name.'" selected>'.$v->book_type_name.'</option>';
		    }else{
			  echo '<option value="'.$v->id.'" data-type-name="'.$v->book_type_name.'">'.$v->book_type_name.'</option>';
		    }
		   }

		}

		
	}


	public function librarySubjectStore()
	{
		$sub_id_edit			    	= $this->input->post('sub_id_edit');
		$data['class_id']				= $this->input->post('class_id_in');
		$data['library_subject_name']	= $this->input->post('library_subject_name');
		
		
		$table = 'library_subject_manage';
		$orderBy = 'id';
		$serialized = 'asc';

		   if(!empty($sub_id_edit)){
			   if($data['library_subject_name'] !=''){
				$this->M_crud_ayenal->update($table, $data, array('id' => $sub_id_edit));
			   }
			}else{
				if($data['library_subject_name'] !=''){
				   $lastId      =  $this->M_crud_ayenal->save($table, $data); 
				}
			}
		
			
	    $subjectList =  $this->M_crud->findAll($table, array('class_id' => $data['class_id']), $orderBy, $serialized);


		
		if($sub_id_edit){
			echo '<option value="">Select Subject Type</option>';
			foreach($subjectList as $v) {
			if($sub_id_edit == $v->id){
			  echo '<option value="'.$v->id.'" data-subject-name="'.$v->library_subject_name.'" selected>'.$v->library_subject_name.'</option>';
		    }else{
			  echo '<option value="'.$v->id.'" data-subject-name="'.$v->library_subject_name.'">'.$v->library_subject_name.'</option>';
		    }
		   }
		}else{

			echo '<option value="">Select Subject Type</option>';
			foreach($subjectList as $v) {
			if($lastId == $v->id){
			  echo '<option value="'.$v->id.'" data-subject-name="'.$v->library_subject_name.'" selected>'.$v->library_subject_name.'</option>';
		    }else{
			  echo '<option value="'.$v->id.'" data-subject-name="'.$v->library_subject_name.'">'.$v->library_subject_name.'</option>';
		    }
		   }

		}

		
	}






	 public function classWiseSubject()
	 {
		$class_id 	   = $this->input->post('class_id');
		
		$orderBy = 'id';
		$serialized = 'asc';

		$subjectList   = $this->M_crud_ayenal->findAll('library_subject_manage', array('class_id' => $class_id), $orderBy, $serialized);				
	
			echo '<option value="">Select Subject</option>';
			foreach($subjectList as $v) {
				echo '<option value="'.$v->id.'" data-subject-name="'.$v->library_subject_name.'">'.$v->library_subject_name.'</option>';
			}
			
		
		
		
	 }
	 



	public function issuStudentInfo()
	{
		$data['student_id']				= $this->input->post('student_id');
		$data['year2']					= $this->input->post('year');
		$data['branc_id']				= $this->input->post('branc_id');
		$data['class_section_id']		= $this->input->post('class_section_id');
		$data['class_id']				= $this->input->post('class_id');
		$data['class_shift_id']			= $this->input->post('class_shift_id');
		$data['class_group_id']			= $this->input->post('class_group_id');
		$data['class_roll']				= $this->input->post('class_roll');
		$data['ad_year2']				= $this->input->post('ad_year');

		$data['title'] = 'VMGPS&#65515;Issue For Student';
		$currYear 	= date('Y');
		$table = '';
		$where2 = array();
		$orderBy = 'id';
		$serialized = 'asc';
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where2, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}



		if(!empty($data['student_id'])){
			if(!empty($data['student_id']))    	$where['class_wise_info.stu_id']  	= $data['student_id'];
			if(!empty($data['year2']))    		$where['class_wise_info.year']  	= $data['year2'];
			$data['studentDetails']      = $this->M_join_ayenal->findIssuStudentInfo('class_wise_info', $where); 
		}  else {
		   if(!empty($data['branc_id']) || !empty($data['class_section_id']) || !empty($data['class_id']) || !empty($data['class_shift_id']) || !empty($data['class_group_id']) || !empty($data['class_roll']) || !empty($data['ad_year2'])){
               	if(!empty($data['branc_id']))    				$where['class_wise_info.branc_id']  			= $data['branc_id'];
				if(!empty($data['class_section_id']))    		$where['class_wise_info.class_section_id']  	= $data['class_section_id'];
				if(!empty($data['class_id']))    				$where['class_wise_info.class_id']  			= $data['class_id'];
				if(!empty($data['class_shift_id']))    			$where['class_wise_info.class_shift_id']  		= $data['class_shift_id'];
				if(!empty($data['class_group_id']))    			$where['class_wise_info.class_group_id']  		= $data['class_group_id'];
				if(!empty($data['class_roll']))    				$where['class_wise_info.class_roll']  			= $data['class_roll'];
				if(!empty($data['ad_year']))    				$where['class_wise_info.year']  				= $data['ad_year2'];

				$data['studentDetails']      = $this->M_join_ayenal->findIssuStudentInfo('class_wise_info', $where); 

		   }

		}


		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where2, $order = 'sl_no', $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where2, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where2, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where2, $orderBy, $serialized);

        $this->load->view('library/issuStudentInfoPage', $data);


	}

	public function bookIssueSearch()
	{
		$data['book_id']						= $this->input->post('book_id');
		$data['book_name']						= $this->input->post('book_name');
		$data['available_date']					= $this->input->post('available_date');
		$data['student_id_search']				= $this->input->post('student_id_search');
		$data['year2_search']					= $this->input->post('year2_search');
		$data['branc_id_search']				= $this->input->post('branc_id_search');
		$data['class_section_id_search']		= $this->input->post('class_section_id_search');
		$data['class_id_search']				= $this->input->post('class_id_search');
		$data['class_shift_id_search']			= $this->input->post('class_shift_id_search');
		$data['class_group_id_search']			= $this->input->post('class_group_id_search');
		$data['class_roll_search']				= $this->input->post('class_roll_search');
		$data['ad_year2_search']				= $this->input->post('ad_year2_search');

		if(!empty($data['book_id']) || !empty($data['book_name'])){
			if(!empty($data['book_id'])) 		$where['book_id'] 			 = $data['book_id'];
			if(!empty($data['book_name'])) 		$where['book_name'] 		 = $data['book_name'];

			$chkBookStore  = $this->M_crud_ayenal->findById('library_book_create', $where); 
		}

		if(!empty($chkBookStore)){

			if(!empty($data['book_id']) || !empty($data['book_name']) || !empty($data['available_date'])){
				if(!empty($data['book_id'])) 		$where2['book_id'] 			 = $data['book_id'];
				if(!empty($data['book_name'])) 		$where2['book_name'] 		 = $data['book_name'];
				if(!empty($data['available_date'])) $where2['valid_till_date >='] = $data['available_date'];

                 $chkBookAvailability  = $this->M_crud_ayenal->findById('book_issue_info', $where2); 

                if(!empty($chkBookAvailability)){
                    $data['availability'] = "no";
                } else {
                	$uniqId  				= $this->session->userdata('currentAddId');
                	if(empty($uniqId)){
                	   $sessUniqId      = time();
                	   $this->session->set_userdata(array('currentAddId' => $sessUniqId));
                	}  
                	if(!empty($uniqId)){ 
                	   $data['tempBookList']  	= $this->M_crud_ayenal->findAll('temp_book_issue', array('unique_id' => $uniqId), 'id', 'desc');
                	}   
                	$data['availability'] = "yes";
                }

            }

		    $this->load->view('library/tempIssuStudentBookPage', $data);


		} else {
			echo "Invalid";
		}

	}



	public function addBookTempFormAction()
	{
		$uniqId  						= $this->session->userdata('currentAddId');
		$data['unique_id']				= $uniqId;
		$book_id						= $this->input->post('book_id');
		$book_name						= $this->input->post('book_name');
		$data['issue_date']				= $this->input->post('issue_date');
		$data['valide_date']			= $this->input->post('valid_date');


		if(!empty($book_id)){
		   $bookDetails    = $this->M_crud_ayenal->findById('library_book_create', array('book_id' => $book_id)); 
		   if(!empty($bookDetails)){
		   	  $data['book_auto_id']  = $bookDetails->id; 
		   	  $data['book_id']  	 = $book_id; 
		   	  $data['book_name']  	 = $bookDetails->book_name; 

		   } 
		}else{
		   $bookDetails    = $this->M_crud_ayenal->findById('library_book_create', array('book_name' => $book_name)); 
		     if(!empty($bookDetails)){
		   	  $data['book_auto_id']  = $bookDetails->id; 
		   	  $data['book_id']  	 = $bookDetails->book_id; 
		   	  $data['book_name']  	 = $book_name; 

		   } 
		}

        $this->db->insert('temp_book_issue', $data);
        
        $data['student_id_search']				= $this->input->post('student_id_search');
		$data['year2_search']					= $this->input->post('year2_search');
		$data['branc_id_search']				= $this->input->post('branc_id_search');
		$data['class_section_id_search']		= $this->input->post('class_section_id_search');
		$data['class_id_search']				= $this->input->post('class_id_search');
		$data['class_shift_id_search']			= $this->input->post('class_shift_id_search');
		$data['class_group_id_search']			= $this->input->post('class_group_id_search');
		$data['class_roll_search']				= $this->input->post('class_roll_search');
		$data['ad_year2_search']				= $this->input->post('ad_year2_search');


        $data['tempBookList']  	= $this->M_crud_ayenal->findAll('temp_book_issue', array('unique_id' => $uniqId), 'id', 'desc');

        $this->load->view('library/addBookTempBookListPage', $data);
	}

	public function bookIssueDelete()
	{
		$id				= $this->input->post('id');
		$uniqId  		= $this->session->userdata('currentAddId');
		$this->M_crud_ayenal->destroy('temp_book_issue', array('id' => $id));
		$data['tempBookList']  	= $this->M_crud_ayenal->findAll('temp_book_issue', array('unique_id' => $uniqId), 'id', 'desc');

        $this->load->view('library/addBookTempBookListPage', $data);

	}



	public function bookApproveFormAction()
	{
		$student_id						= $this->input->post('student_id_ap');
		$ad_year2_ap					= $this->input->post('ad_year2_ap');
		$year2_ap						= $this->input->post('year2_ap');

		$book_auto_id_list				= $this->input->post('book_auto_id');
		$book_id_list					= $this->input->post('book_id');
		$book_name_list					= $this->input->post('book_name');
		$issue_date_list				= $this->input->post('issue_date');
		$valide_date_list				= $this->input->post('valide_date');

		if(!empty($student_id)){
			$data['student_id']         = $student_id;
			$studentDetails      		= $this->M_crud_ayenal->findById('class_wise_info', array('stu_id' => $student_id));  
			$data['branch_id']			= $studentDetails->branc_id;
			$data['section_id']			= $studentDetails->class_section_id;
			$data['shift_id']			= $studentDetails->class_shift_id;
			$data['class_id']			= $studentDetails->class_id;
			$data['group_id']			= $studentDetails->class_group_id;
			$data['class_roll']			= $studentDetails->class_roll;

		}else{
			$data['branch_id']			= $this->input->post('branc_id_ap');
			$data['section_id']			= $this->input->post('class_section_id_ap');
			$data['shift_id']			= $this->input->post('class_shift_id_ap');
			$data['class_id']			= $this->input->post('class_id_ap');
			$data['group_id']			= $this->input->post('class_group_id_ap');
			$data['class_roll']			= $this->input->post('class_roll_ap');

			if(!empty($data['branch_id']) || !empty($data['section_id']) || !empty($data['shift_id']) || !empty($data['class_id']) || !empty($data['group_id']) || !empty($data['class_roll']) ||  !empty($year2_ap)){

	            if(!empty($data['branc_id']))    		$where['class_wise_info.branc_id']  			= $data['branc_id'];
				if(!empty($data['section_id']))    		$where['class_wise_info.class_section_id']  	= $data['section_id'];
				if(!empty($data['class_id']))    		$where['class_wise_info.class_id']  			= $data['class_id'];
				if(!empty($data['shift_id']))    		$where['class_wise_info.class_shift_id']  		= $data['shift_id'];
				if(!empty($data['group_id']))    		$where['class_wise_info.class_group_id']  		= $data['group_id'];
				if(!empty($data['class_roll']))    		$where['class_wise_info.class_roll']  			= $data['class_roll'];
				if(!empty($year2_ap))    				$where['class_wise_info.year']  				= $year2_ap;

				$studentDetails      			= $this->M_crud_ayenal->findById('class_wise_info', $where);   
				$data['student_id']          	= $studentDetails->stu_id;

			}
		}


		if(!empty($ad_year2_ap)){
		   $data['year']				= $ad_year2_ap;	
		}else{
		  $data['year']					= $year2_ap;	
		}

		if($book_auto_id_list || $book_id_list || $book_name_list || $issue_date_list || $valide_date_list){

			foreach($book_auto_id_list as $k => $bookautoId) {
				if($book_auto_id_list[$k]){
					$bookDetails     = $this->M_crud_ayenal->findById('library_book_create', array('id' => $book_auto_id_list[$k]));  

					if(!empty($bookDetails->language))  	$data['issue_language']	  	= $bookDetails->language;
					if(!empty($bookDetails->book_type_id))  $data['issue_book_type_id']	= $bookDetails->book_type_id;
					if(!empty($bookDetails->class_id))  	$data['issue_class_id']	  	= $bookDetails->class_id;
					if(!empty($bookDetails->subject_id))  	$data['subject_id']	  		= $bookDetails->subject_id;

					if(!empty($book_auto_id_list[$k]))  	$data['book_auto_id']	  	= $book_auto_id_list[$k];
					if(!empty($book_id_list[$k])) 			$data['book_id']		  	= $book_id_list[$k];
					if(!empty($book_name_list[$k])) 		$data['book_name']		  	= $book_name_list[$k];
					if(!empty($issue_date_list[$k])) 		$data['issue_date']		  	= $issue_date_list[$k];
					if(!empty($valide_date_list[$k])) 		$data['valid_till_date']  	= $valide_date_list[$k];

					$this->db->insert('book_issue_info', $data);



				}
			}

		}


		$uniqId  		  = $this->session->userdata('currentAddId');
		$this->M_crud_ayenal->destroy('temp_book_issue', array('unique_id' => $uniqId));
		$this->session->set_userdata(array('currentAddId' => ""));


	}


	public function bookReturn()
	{
		$data['title'] = 'VMGPS&#65515;Library Book Return';
		$currYear 	= date('Y');
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		$this->load->view('library/bookReturnModulePage', $data);
	}



	public function returnFromStudent()
	{
		$data['title'] = 'VMGPS&#65515;Student Book Return';
		$currYear 	= date('Y');
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'asc';
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where, $order = 'sl_no', $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where, $orderBy, $serialized);


		$this->load->view('library/returnFromStudentPage', $data);
	}



	public function returnStudentInfo()
	{
		$data['student_id']				= $this->input->post('student_id');
		$data['year2']					= $this->input->post('year');
		$data['branc_id']				= $this->input->post('branc_id');
		$data['class_section_id']		= $this->input->post('class_section_id');
		$data['class_id']				= $this->input->post('class_id');
		$data['class_shift_id']			= $this->input->post('class_shift_id');
		$data['class_group_id']			= $this->input->post('class_group_id');
		$data['class_roll']				= $this->input->post('class_roll');
		$data['ad_year2']				= $this->input->post('ad_year');

		$data['title'] = 'VMGPS&#65515;Return From Student';
		$currYear 	= date('Y');
		$table = '';
		$where2 = array();
		$orderBy = 'id';
		$serialized = 'asc';
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		if($authorType == "superadmin" ) {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where2, $orderBy, $serialized);
		} else {
		$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}



		if(!empty($data['student_id'])){
			if(!empty($data['student_id']))    	$where['book_issue_info.student_id']  	= $data['student_id'];
			if(!empty($data['year2']))    		$where['book_issue_info.year']  		= $data['year2'];
			$data['studentBookIssueDetails']    = $this->M_join_ayenal->findAllStudentBookIssue('book_issue_info', $where, 'book_issue_info.id', 'desc'); 
		}  else {
		   if(!empty($data['branc_id']) || !empty($data['class_section_id']) || !empty($data['class_id']) || !empty($data['class_shift_id']) || !empty($data['class_group_id']) || !empty($data['class_roll']) || !empty($data['ad_year2'])){
               	if(!empty($data['branc_id']))    				$where['book_issue_info.branch_id']  		= $data['branc_id'];
				if(!empty($data['class_section_id']))    		$where['book_issue_info.section_id']  		= $data['class_section_id'];
				if(!empty($data['class_id']))    				$where['book_issue_info.class_id']  		= $data['class_id'];
				if(!empty($data['class_shift_id']))    			$where['book_issue_info.shift_id']  		= $data['class_shift_id'];
				if(!empty($data['class_group_id']))    			$where['book_issue_info.group_id']  		= $data['class_group_id'];
				if(!empty($data['class_roll']))    				$where['book_issue_info.class_roll']  		= $data['class_roll'];
				if(!empty($data['ad_year']))    				$where['book_issue_info.year']  			= $data['ad_year2'];

				$data['studentBookIssueDetails']  = $this->M_join_ayenal->findAllStudentBookIssue('book_issue_info', $where, 'book_issue_info.id', 'desc'); 

		   }

		}


		$data['classListInfo'] 			=  $this->M_crud->findAll('class_list_manage', $where2, $order = 'sl_no', $serialized);
		$data['sectionListInfo']		=  $this->M_crud->findAll('section_list_manage', $where2, $orderBy, $serialized);
		$data['shiftListInfo'] 			=  $this->M_crud->findAll('shift_list_manage', $where2, $orderBy, $serialized);
		$data['groupListInfo'] 			=  $this->M_crud->findAll('group_list_manage', $where2, $orderBy, $serialized);

        $this->load->view('library/studentReturnInfoPage', $data);


	}

	public function bookReturnAction()
	{
		$issueId						= $this->input->post('issueId');
		$data['return_date']			= $this->input->post('returnDate');
		$issueDetails      				= $this->M_crud_ayenal->findById('book_issue_info', array('id' => $issueId));  
		$data['re_book_auto_id']		= $issueDetails->book_auto_id;
		$data['re_book_id']				= $issueDetails->book_id;
		$data['re_book_name']			= $issueDetails->book_name;
		$data['re_student_id']			= $issueDetails->student_id;
		$data['re_branch_id']			= $issueDetails->branch_id;
		$data['re_class_id']			= $issueDetails->class_id;
		$data['re_group_id']			= $issueDetails->group_id;
		$data['re_section_id']			= $issueDetails->section_id;
		$data['re_shift_id']			= $issueDetails->shift_id;
		$data['re_class_roll']			= $issueDetails->class_roll;
		$data['re_year']				= $issueDetails->year;
		$data['re_issue_date']			= $issueDetails->issue_date;
		$data['re_valide_date']			= $issueDetails->valid_till_date;

		 $this->db->insert('book_return_info', $data);
		 $this->M_crud_ayenal->destroy('book_issue_info', array('id' => $issueId));


	}







	
	 
	 
	 
	 
	
	
	

}


