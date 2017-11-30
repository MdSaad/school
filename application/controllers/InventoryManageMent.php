<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InventoryManageMent extends CI_Controller {

	const  Title	 = 'VMGPS-Inventory Management';
	
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
		$data['title'] = 'VMGPS&#65515;Inventory Management';
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

		$this->load->view('inventory/inventoryModulePage', $data);
	}


    public function itemPurchase($onset = 0)
	{
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'desc';
		
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		$data['title'] = 'VMGPS&#65515;Item Purchase';
		$data['alertMsg']	= $this->session->userdata('alertMsg');
		
		$this->session->set_userdata(array('alertMsg' => ''));
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		
		if($authorType == "superadmin" ) {
			$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
			$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		$data['maxPur']  					= $this->M_crud_ayenal->findMax('purchase', array(), 'pur_no');
		$data['allVendorName'] 				=  $this->M_crud_ayenal->findAll('vendor', $where, $orderBy, $serialized);
		$data['allItemName'] 			    =  $this->M_crud_ayenal->findAll('item_manage', $where, $orderBy, $serialized);
		$data['allPurchaseInfo']  			=  $this->M_join_ayenal->findAllPurchaseInfo('purchase', array(), $onset, 'purchase.id', 'desc');
		$data['allItem']  					=  $this->M_join_ayenal->findAllPurchaseSearchInfo('purchase', array(), 'purchase.id', 'desc');


		$data['onset'] 			= $onset;
		$config['base_url'] 	= base_url('inventoryManageMent/itemPurchase');
		$config['total_rows'] 	= $this->M_join_ayenal->countAll('purchase', array());
		$config['uri_segment'] 	= 4;
		$config['per_page'] 	= 10;
		$config['num_links'] 	= 7;
		$config['first_link']	= FALSE;
		$config['last_link'] 	= FALSE;
		$config['prev_link']	= 'Prev';
		$config['next_link'] 	= 'Next';

		$this->pagination->initialize($config); 
        $data['msg']    = $this->session->userdata('msg');
        $this->session->set_userdata(array('msg' => ""));
        
 
		

		$this->load->view('inventory/itemPurchasePage', $data);
	}


	public function purchaseStore()
	{
		$pur_edit_id			    = $this->input->post('pur_edit_id');
		$data['pur_no']			    = $this->input->post('pur_no');
		$data['item_id']			= $this->input->post('item_id');
		$data['vendor_id']			= $this->input->post('vendor_id');
		$data['pur_price']			= $this->input->post('pur_price');
		$data['item_quantity']		= $this->input->post('item_quantity');
		$data['total_price']		= $this->input->post('total_price');
		$data['remarks']			= $this->input->post('remarks');
		$data['pur_date']			= date('Y-m-d');
		$data['admin_id']           = $this->session->userid;

		if(!empty($pur_edit_id)){
			$itemDetails  = $this->M_crud_ayenal->findById('item_manage', array('id' => $data['item_id']));
			$purDetails   = $this->M_crud_ayenal->findById('purchase', array('id' => $pur_edit_id));

            $data2['current_stock'] = $itemDetails->current_stock - $purDetails->item_quantity + $data['item_quantity'];
			$this->M_crud_ayenal->update('item_manage', $data2, array('id' => $data['item_id']));
			$this->M_crud_ayenal->update('purchase', $data, array('id' => $pur_edit_id));

           $this->session->set_userdata(array('msg' => "Update Successfull"));

		} else {

			$itemDetails  = $this->M_crud_ayenal->findById('item_manage', array('id' => $data['item_id']));
			$data2['current_stock'] = $itemDetails->current_stock + $data['item_quantity'];
			$this->M_crud_ayenal->update('item_manage', $data2, array('id' => $data['item_id']));
			$this->db->insert('purchase', $data);
			$this->session->set_userdata(array('msg' => "Save Successfull"));
		}

		redirect('inventoryManageMent/itemPurchase');
		
	}

	public function purchaseEditInfo()
	{
		$id			    = $this->input->post('id');
		$purEditDetails = $this->M_crud_ayenal->findById('purchase', array('id' => $id));
		echo json_encode($purEditDetails);
	}

    public function purSearchResult()
	{
		
        $data['start']			    = $this->input->post('start');
		$data['end']				= $this->input->post('end');
		$data['item_id_search']		= $this->input->post('item_id_search');

		if(!empty($data['start']) || !empty($data['end']) || $data['item_id_search']){
		    if(!empty($data['start']))    			$where['purchase.pur_date >=']	 = $data['start'];
		    if(!empty($data['end']))    			$where['purchase.pur_date <=']	 = $data['end'];
		    if(!empty($data['item_id_search']))     $where['purchase.item_id']	 	 = $data['item_id_search'];

		    $data['allPurchaseInfo']  			=  $this->M_join_ayenal->findAllPurchaseSearchInfo('purchase', $where, 'purchase.id', 'desc');
		}
           $this->load->view('inventory/itemPurchaseSearchPage', $data);
		
	}


	public function requisition($onset = 0)
	{
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'desc';
		
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		$data['title'] = 'VMGPS&#65515;Requisition';
		$data['alertMsg']	= $this->session->userdata('alertMsg');
		
		$this->session->set_userdata(array('alertMsg' => ''));
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		
		if($authorType == "superadmin" ) {
			$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
			$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		$data['maxReq']  					= $this->M_crud_ayenal->findMax('requisition_create', array(), 'requisition_id');
		$data['allDepartName'] 				=  $this->M_crud_ayenal->findAll('reg_department', $where, $orderBy, $serialized);
		$data['allItemName'] 			    =  $this->M_crud_ayenal->findAll('item_manage', $where, $orderBy, $serialized);
		$data['allRequisitionInfo']  		=  $this->M_join_ayenal->findAllRequiInfo('requisition_create', array(), $onset, 'requisition_create.id', 'desc');
		


		$data['onset'] 			= $onset;
		$config['base_url'] 	= base_url('inventoryManageMent/requisition');
		$config['total_rows'] 	= $this->M_join_ayenal->countAll('requisition_create', array());
		$config['uri_segment'] 	= 4;
		$config['per_page'] 	= 10;
		$config['num_links'] 	= 7;
		$config['first_link']	= FALSE;
		$config['last_link'] 	= FALSE;
		$config['prev_link']	= 'Prev';
		$config['next_link'] 	= 'Next';

		$this->pagination->initialize($config); 
        $data['msg']    = $this->session->userdata('msg');
        $this->session->set_userdata(array('msg' => ""));
        
 
		

		$this->load->view('inventory/requisitionPage', $data);
	}



	public function requisitionWiseDetails()
	{
		
		$data['reqId']				= $this->input->post('reqId');
		$data['reqDetails'] 		= $this->M_join_ayenal->findAllRequisitionDepInfo('requisition_create', array('requisition_create.id' => $data['reqId']));
		$data['reqItemDetails'] 	= $this->M_join_ayenal->findAllReqItemInfo('req_item_manage', array('req_item_manage.req_id' => $data['reqId']), 'req_item_manage.id', 'desc');
		$this->load->view('inventory/requisitionWiseDetailsPage', $data);
	}


	public function requisitionStore()
	{
		
		$data['requisition_id']		= $this->input->post('requisition_id');
		$data['department_id']		= $this->input->post('department_id');
		$data['creator_name']		= $this->input->post('creator_name');
		$data['reg_date']			= $this->input->post('reg_date');
		$data['remarks']			= $this->input->post('remarks');
		$data['req_status']			= "pending";
		$data['delivery_status']	= "pending";
		$data['admin_id']			= $this->session->userid;
        $lastId                     = $this->M_crud_ayenal->save('requisition_create', $data);

		$item_id_list			    = $this->input->post('item_id');
		$item_quan_list			    = $this->input->post('item_quan');

		if(!empty($item_id_list) || !empty($item_quan_list)){

			foreach ($item_id_list as $key => $value) {
				if($item_id_list[$key] &&  $item_quan_list[$key]){
					$data2['req_id']    	= $lastId;
					$data2['item_id']    	= $item_id_list[$key];
					$data2['item_qnty']    	= $item_quan_list[$key];
					$this->db->insert('req_item_manage', $data2);
				}
			}

		}

        $this->session->set_userdata(array('msg' => "Save Successfull"));
        redirect('inventoryManageMent/requisition');
		
		
    }

    public function requisitionEdit()
	{
		$id			    				= $this->input->post('id');
		$requisitionEditInfo 			= $this->M_crud_ayenal->findById('requisition_create', array('id' => $id));
		$requisitionEditInfo->alItem 	= $this->M_join_ayenal->findAllRequisitionData('req_item_manage', array('req_id' => $id), 'id', 'asc');
		echo json_encode($requisitionEditInfo);
	}

	public function reqDelivery()
	{
		$id			    				= $this->input->post('id');
		$allItemData                    = $this->M_join_ayenal->findAllReqDelveryData('req_item_manage', array('req_id' => $id), 'item_id', 'id', 'asc');

		foreach($allItemData as $v){
			
			if($v->allItemQty > $v->current_stock){
				$status  =  "Invalide";
				break;
			}
		}

        if($status =='Invalide'){
            echo "Not";
        }else{
        foreach($allItemData as $v){
			$itemDetails  			= $this->M_crud_ayenal->findById('item_manage', array('id' => $v->item_id));
			print_r($itemDetails);
		    $data2['current_stock'] = $itemDetails->current_stock - $v->qnty;
			$this->M_crud_ayenal->update('item_manage', $data2, array('id' => $v->item_id));	
			
		}
          echo "Yes"; 
          $data['delivery_status']  = "Completed";
          $this->db->update('requisition_create', $data, array('id' => $id)); 
        }

	}


	public function requisitionUpdate()
	{
		$req_edit_id			    = $this->input->post('req_edit_id');
		$data['requisition_id']		= $this->input->post('requisition_id');
		$data['department_id']		= $this->input->post('department_id');
		$data['creator_name']		= $this->input->post('creator_name');
		$data['reg_date']			= $this->input->post('reg_date');
		$data['remarks']			= $this->input->post('remarks');
		$data['message']			= $this->input->post('message');
		$data['req_status']			= $this->input->post('req_status');
		$data['admin_id']			= $this->session->userid;

		$this->db->delete('req_item_manage', array('req_id' => $req_edit_id));   

        $this->db->update('requisition_create', $data, array('id' => $req_edit_id));     

		$item_id_list			    = $this->input->post('item_id');
		$item_quan_list			    = $this->input->post('item_quan');

		if(!empty($item_id_list) || !empty($item_quan_list)){

			foreach ($item_id_list as $key => $value) {
				if($item_id_list[$key] &&  $item_quan_list[$key]){
					$data2['req_id']    	= $req_edit_id;
					$data2['item_id']    	= $item_id_list[$key];
					$data2['item_qnty']    	= $item_quan_list[$key];
					$this->db->insert('req_item_manage', $data2);
				}
			}

		}

        $this->session->set_userdata(array('msg' => "Update Successfull"));
        redirect('inventoryManageMent/itemDistribute');
		
		
    }



    public function reqDelete($id)
	{
		$this->db->delete('req_item_manage', array('req_id' => $id));   
		$this->db->delete('requisition_create', array('id' => $id));   
		$this->session->set_userdata(array('msg' => "Delete Successfull"));  
		redirect('inventoryManageMent/requisition'); 
		
	}



	public function itemDistribute($onset = 0)
	{
		$table = '';
		$where = array();
		$orderBy = 'id';
		$serialized = 'desc';
		
		
		$authorID = $this->session->userid;
		$authorType = $this->session->usertype;
		$authorBranchID = $this->session->authorBranchID;
		
		$data['title'] = 'VMGPS&#65515;Requisition';
		$data['alertMsg']	= $this->session->userdata('alertMsg');
		
		$this->session->set_userdata(array('alertMsg' => ''));
		$data['basisInfo'] =  $this->M_crud->findABasicInfo('system_basic_info', 'id');
		
		
		if($authorType == "superadmin" ) {
			$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', $where, $orderBy, $serialized);
		} else {
			$data['branchListInfo'] 		=  $this->M_crud->findAll('branch_list_manage', array('id' => $authorBranchID), $orderBy, $serialized);
		}

		$data['maxReq']  					=  $this->M_crud_ayenal->findMax('requisition_create', array(), 'requisition_id');
		$data['allDepartName'] 				=  $this->M_crud_ayenal->findAll('reg_department', $where, $orderBy, $serialized);
		$data['allItemName'] 			    =  $this->M_crud_ayenal->findAll('item_manage', $where, $orderBy, $serialized);
		$data['allRequisitionInfo']  		=  $this->M_join_ayenal->findAllRequiInfo('requisition_create', array('requisition_create.delivery_status' => "pending"), $onset, 'requisition_create.id', 'desc');
		


		$data['onset'] 			= $onset;
		$config['base_url'] 	= base_url('inventoryManageMent/requisition');
		$config['total_rows'] 	= $this->M_join_ayenal->countAll('requisition_create', array());
		$config['uri_segment'] 	= 4;
		$config['per_page'] 	= 10;
		$config['num_links'] 	= 7;
		$config['first_link']	= FALSE;
		$config['last_link'] 	= FALSE;
		$config['prev_link']	= 'Prev';
		$config['next_link'] 	= 'Next';

		$this->pagination->initialize($config); 
        $data['msg']    = $this->session->userdata('msg');
        $this->session->set_userdata(array('msg' => ""));
        
 
		

		$this->load->view('inventory/itemDistributePage', $data);
	}




	public function departStore()
	{
		$depart_id_edit			    = $this->input->post('depart_id_edit');
		$data['depart_name']		= $this->input->post('depart_name');
		
		
		
		$table 		= 'reg_department';
		$where 		= array();
		$orderBy 	= 'id';
		$serialized = 'asc';

		   if(!empty($depart_id_edit)){
			   if($data['depart_name'] !=''){
				$this->M_crud_ayenal->update($table, $data, array('id' => $depart_id_edit));
			   }
			}else{
				if($data['depart_name'] !=''){
				   $lastId      =  $this->M_crud_ayenal->save($table, $data); 
				}
			}
		
			
	    $departList 		=  $this->M_crud->findAll($table, $where, $orderBy, $serialized);


		
		if($depart_id_edit){
			echo '<option value="">Select Departent</option>';
			foreach($departList as $v) {
			if($depart_id_edit == $v->id){
			  echo '<option value="'.$v->id.'" data-depart-name="'.$v->depart_name.'" selected>'.$v->depart_name.'</option>';
		    }else{
			  echo '<option value="'.$v->id.'" data-depart-name="'.$v->depart_name.'">'.$v->depart_name.'</option>';
		    }
		   }
		}else{

			echo '<option value="">Select Item name</option>';
			foreach($departList as $v) {
			if($lastId == $v->id){
			 echo '<option value="'.$v->id.'" data-depart-name="'.$v->depart_name.'" selected>'.$v->depart_name.'</option>';
		    }else{
			  echo '<option value="'.$v->id.'" data-depart-name="'.$v->depart_name.'">'.$v->depart_name.'</option>';
		    }
		   }

		}

		
	}




    public function purDelete($id)
	{
		
		$purDetails   	= $this->M_crud_ayenal->findById('purchase', array('id' => $id));
		$itemDetails  	= $this->M_crud_ayenal->findById('item_manage', array('id' => $purDetails->item_id));

        $data2['current_stock'] = $itemDetails->current_stock - $purDetails->item_quantity;
		$this->M_crud_ayenal->update('item_manage', $data2, array('id' => $purDetails->item_id));

		$this->db->delete('purchase', array('id' => $id));   
		$this->session->set_userdata(array('msg' => "Delete Successfull"));     
		redirect('inventoryManageMent/itemPurchase');
		
	}




	public function itemStore()
	{
		$item_id_edit			    = $this->input->post('item_id_edit');
		$data['item_code']			= $this->input->post('item_code');
		$data['item_name']			= $this->input->post('item_name');
		$data['price']				= $this->input->post('price');
		$data['remarks']			= $this->input->post('remarks');
		
		
		$table 		= 'item_manage';
		$where 		= array();
		$orderBy 	= 'id';
		$serialized = 'asc';

		   if(!empty($item_id_edit)){
			   if($data['item_code'] !=''){
				$this->M_crud_ayenal->update($table, $data, array('id' => $item_id_edit));
			   }
			}else{
				if($data['item_code'] !=''){
				   $lastId      =  $this->M_crud_ayenal->save($table, $data); 
				}
			}
		
			
	    $itemList 		=  $this->M_crud->findAll($table, $where, $orderBy, $serialized);


		
		if($item_id_edit){
			echo '<option value="">Select Item name</option>';
			foreach($itemList as $v) {
			if($item_id_edit == $v->id){
			  echo '<option value="'.$v->id.'" data-item-name="'.$v->item_name.'" data-item-price="'.$v->price.'" data-item-code="'.$v->item_code.'" data-item-remarks="'.$v->remarks.'" selected>'.$v->item_name.'</option>';
		    }else{
			  echo '<option value="'.$v->id.'" data-item-name="'.$v->item_name.'" data-item-price="'.$v->price.'" data-item-code="'.$v->item_code.'" data-item-remarks="'.$v->remarks.'">'.$v->item_name.'</option>';
		    }
		   }
		}else{

			echo '<option value="">Select Item name</option>';
			foreach($itemList as $v) {
			if($lastId == $v->id){
			  echo '<option value="'.$v->id.'" data-item-name="'.$v->item_name.'" data-item-price="'.$v->price.'" data-item-code="'.$v->item_code.'" data-item-remarks="'.$v->remarks.'" selected>'.$v->item_name.'</option>';
		    }else{
			  echo '<option value="'.$v->id.'" data-item-name="'.$v->item_name.'" data-item-price="'.$v->price.'" data-item-code="'.$v->item_code.'" data-item-remarks="'.$v->remarks.'">'.$v->item_name.'</option>';
		    }
		   }

		}

		
	}




	public function vendorStore()
	{
		$vendor_id_edit			= $this->input->post('vendor_id_edit');
		$data['name']			= $this->input->post('name');
		$data['email']			= $this->input->post('email');
		$data['mobile']		    = $this->input->post('mobile');
		$data['adress']			= $this->input->post('adress');
		
		
		$table 		= 'vendor';
		$where 		= array();
		$orderBy 	= 'id';
		$serialized = 'asc';

		   if(!empty($vendor_id_edit)){
			   if($data['name'] !=''){
				$this->M_crud_ayenal->update($table, $data, array('id' => $vendor_id_edit));
			   }
			}else{
				if($data['name'] !=''){
				   $lastId      =  $this->M_crud_ayenal->save($table, $data); 
				}
			}
		
			
	    $vendorList 		=  $this->M_crud->findAll($table, $where, $orderBy, $serialized);


		
		if($vendor_id_edit){
			echo '<option value="">Select Vendor</option>';
			foreach($vendorList as $v) {
			if($vendor_id_edit == $v->id){
			  echo '<option value="'.$v->id.'" data-vendor-name="'.$v->name.'" data-vendor-email="'.$v->email.'" data-vendor-mobile="'.$v->mobile.'" data-vendor-adress="'.$v->adress.'" selected>'.$v->name.'</option>';
		    }else{
			  echo '<option value="'.$v->id.'" data-vendor-name="'.$v->name.'" data-vendor-email="'.$v->email.'" data-vendor-mobile="'.$v->mobile.'" data-vendor-adress="'.$v->adress.'">'.$v->name.'</option>';
		    }
		   }
		}else{

			echo '<option value="">Select Item name</option>';
			foreach($vendorList as $v) {
			if($lastId == $v->id){
			 echo '<option value="'.$v->id.'" data-vendor-name="'.$v->name.'" data-vendor-email="'.$v->email.'" data-vendor-mobile="'.$v->mobile.'" data-vendor-adress="'.$v->adress.'" selected>'.$v->name.'</option>';
		    }else{
			  echo '<option value="'.$v->id.'" data-vendor-name="'.$v->name.'" data-vendor-email="'.$v->email.'" data-vendor-mobile="'.$v->mobile.'" data-vendor-adress="'.$v->adress.'">'.$v->name.'</option>';
		    }
		   }

		}

		
	}




	




	
	 
	 
	 
	 
	
	
	

}


