
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<title><?php echo $title; ?></title>
		<?php //$this->load->view(''); ?>
	</head>
	
	<body>
	<div class="col-md-11 col-lg-11 headerBox" >
	  <?php $this->load->view('common/header'); ?>
		
				<div class="row">
					<div class="col-md-2 col-sm-2 col-lg-2 leftBox">
							<a href="<?php echo site_url('adminHome'); ?>" > Home </a>
						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 headerBox2">
						<a href="<?php echo site_url('adminHome'); ?>" > Home </a>
						<i class="glyphicon glyphicon-forward"></i>
							<a href="<?php echo site_url('inventoryManageMent'); ?>">Inventory Management</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('inventoryManageMent/itemPurchase'); ?>">Item Purchase</a>
					</div>
				</div>	
	</div>
				
				<div class="col-md-11 col-lg-11">
					<div class="row">
					<div class="col-md-2 col-sm-2 col-lg-2 ">
						
						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 interfaceBody ">
							<div class="row text-center">
								<!-- PAGE CONTENT BEGINS -->
								<!-- /.row -->
								  <div id="widget-container-col-12" class="col-md-11 col-xs-12 col-sm-12 col-lg-12 widget-container-col ui-sortable addFormContent" style="min-height: 172px;">
									<div id="widget-box-11" class="widget-box widget-color-dark ui-sortable-handle" style="opacity: 1;">
										<div class="widget-header">
											<h4 class="widget-title">Item Purchase</h4>
												<div class="widget-toolbar">
												<!-- <a data-action="settings" href="#">
													<i class="ace-icon fa fa-cog"></i>
												</a> -->
												
												<a data-action="reload" href="#">
													<i class="ace-icon fa fa-refresh"></i>
												</a>
												
												<a data-action="collapse" href="#">
													<i class="ace-icon fa fa-chevron-up"></i>
												</a>
												
												<a class="formCancel" href="#">
													<i class="ace-icon fa fa-times"></i>
												</a>
												
												<!-- <a class="orange2" data-action="fullscreen" href="#">
													<i class="ace-icon fa fa-expand"></i>
												</a> -->
												</div>
										</div>
										
										<div class="widget-body ">
											<div class="widget-main padding-4"  style="position: relative;">
											<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('inventoryManageMent/purchaseStore'); ?>" enctype="multipart/form-data" method="post">
											<input type="hidden" name="pur_edit_id" id="pur_edit_id"  />
												<div class="scroll-content">
															<div class="content img-thumbnail container">
															     <?php if(!empty($msg)){?>
															       <div class="alert alert-success alert-dismissible" role="alert">
																		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																		<strong>Success!</strong><?php echo $msg ?>.
																	</div>
																  <?php } ?>
																		<div class="col-md-12">
																		 <div class="col-md-6" style="padding-top: 20px">
																			   <div class="form-group">
																			  <label class="control-label col-sm-4" for="pur_no">Pur No *:</label>
																			  <div class="col-sm-8">
																					<input id="pur_no" name="pur_no" class="form-control" type="text"  placeholder="Pur No*" required="required" 
																					value="<?php echo $maxPur->pur_no + 1 ?>" readonly>		
																				</div>
																			  </div>
																			  
																			   <div class="form-group">
																				  <label class="control-label col-sm-4" for="item_id">Item Name *:</label>
																				  <div class="col-sm-8">
																					  <div class="input-group">
																						<select class="form-control itemListView" name="item_id" id="item_id" required="required">
																							<option value="" selected="selected" >Select Item Name </option>
																							<?php foreach($allItemName as $v){ ?>
																							  <option value="<?php echo $v->id ?>" data-item-name="<?php echo $v->item_name ?>" 
																							  data-item-stock="<?php echo $v->current_stock ?>" data-item-price="<?php echo $v->price ?>" data-item-code ="<?php echo $v->item_code ?>"
																							  data-item-remarks = "<?php echo $v->remarks ?>" ><?php echo $v->item_name ?> </option>
																							<?php } ?>
																						</select>
																						<span class="redomain"></span>
																						<span class="input-group-addon addInstant">
																							<a class="addIem" data-toggle="modal" data-target="#addNewItem" title="Add New" href="#">  <i class="fa fa-plus "></i></a>&nbsp;
																							<a class="editItem" title="Edit Item" href="#"> <i class="fa fa-pencil "></i></a>
																						</span>
																					</div>
																					</div>
																				</div>
																				
																				
																			  
																				<div class="form-group">
																			  <label class="control-label col-sm-4" for="item_quantity">Item Quantity*:</label>
																			  <div class="col-sm-8">
																					<input id="item_quantity" name="item_quantity" class="form-control" type="text"  placeholder="Enter Item Quantity*" required="required">		
																				</div>
																			  </div>
																				
																			   
																		 </div>
					
					
																		 <div class="col-md-6" style="padding-top: 20px">
																			
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-4" for="vendor_id">Vendor Name *:</label>
																			  <div class="col-sm-8">
																				   <div class="input-group">
																					<select class="form-control vendorListView" name="vendor_id" id="vendor_id" required="required">
																						<option value="" selected="selected" >Select Vendor </option>
																						<?php foreach($allVendorName as $v){ ?>
																						  <option value="<?php echo $v->id ?>" data-vendor-name="<?php echo $v->name ?>" data-vendor-email="<?php echo $v->email ?>"
																						   data-vendor-mobile="<?php echo $v->mobile ?>" data-vendor-adress="<?php echo $v->adress ?>"><?php echo $v->name ?> </option>
																						<?php } ?>
																					</select>
																					<span class="redomain"></span>
																					<span class="input-group-addon addInstant">
																						<a class="addVendor" data-toggle="modal" data-target="#addNewVendor" title="Add New" href="#">  <i class="fa fa-plus "></i></a>&nbsp;
																						<a class="editVendor" title="Edit Vendor" href="#"> <i class="fa fa-pencil "></i></a>
																					</span>
																		          </div>	
																					
																				</div>
																			</div>
																			
																		    <div class="form-group">
																			 <label class="control-label col-sm-4" for="item_quantity">Pur Price*:</label>	  
																			  <div class="col-sm-8">
																					<input id="pur_price" name="pur_price" class="form-control" type="text"  placeholder="Enter Pur Price*" required="required">		
																				</div>
																			  </div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-4" for="total_price">Total Price:</label>
																			  <div class="col-sm-8">
																					<input id="total_price" name="total_price" class="form-control" type="text"  placeholder="Total Price" readonly="readonly">		
																				</div>
																			  </div>
																			  
																		    <div class="form-group">
																			  <label class="control-label col-sm-4" for="remarks">Remarks:</label>
																			  <div class="col-sm-8">
																					<textarea  name="remarks" id="remarks" cols="" rows="" class="form-control"  placeholder="Remarks"  value="" ></textarea>	
																				</div>
																			  </div>
																			
																			
																			
																		 </div>
																		 
																			
																		
																			
																		</div>
																	</div>
																	
																	  <div class="modal-footer">
																	  	
																		<button class="btn btn-sm btn-danger formCancel" type="button">
																			<i class="ace-icon fa fa-times"></i>
																			Cancel
																		</button>
																		<button class="btn btn-sm btn-primary" type="submit">
																			<i class="ace-icon fa fa-check"></i>
																			<span class="update2">Submit</span>
																		</button>
																	</div>
																	</div>
														</form>
												</div>
											</div>
										</div>
									</div>
							 </div>	
							 
							 
							 
							 <div class="row">
									<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
										
										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
										  <form id="purSearchForm" action="<?php echo site_url('inventoryManageMent/purSearchResult'); ?>" method="post" enctype="multipart/form-data">
                                           <div class="row">
										        <div class="col-xs-1">Search by :</div>
                                                <div class="col-xs-2" style="height:45px;">
                                                              <div class="form-group">
																<div style="padding:2% !important; padding-left:0px !important;">
																<input type="text" name="start" id="start"  tabindex="1" 
																class="form-control date-picker" required data-date-format="yyyy-mm-dd" placeholder="FROM DATE" style="width:98%" />	
																</div>
															</div>
                                                 </div>
                                                <div class="col-xs-2" style="height:45px;">
                                                              <div class="form-group">
																<div style="padding:2% !important; padding-left:0px !important;">
																<input type="text" name="end" id="end"  tabindex="2" 
																class="form-control date-picker" required data-date-format="yyyy-mm-dd" placeholder="To DATE" style="width:100%" />	
																</div>
															</div>
                                                 </div>
                                                 <div class="col-xs-2" style="height:45px;">
                                                    <div class="form-group">
																<div style="padding:2% !important; padding-left:0px !important;">
																	<select class="form-control" id="item_id_search" name="item_id_search"  tabindex="3" >
																		 <option value=""> Select Item</option>
																		<?php 												
																		  foreach ($allItem as $v){
																		?>
																		   <option value="<?php echo $v->item_id; ?>"> <?php echo $v->item_name; ?> </option>
																		<?php
																		  }
																		?>
																	 </select>
																</div>
															</div>
                                                </div>
												
												
                                                 
                                                <div class="col-xs-2" style="padding-top:2px">
													  <button class="btn btn-sm btn-success" type="submit">
														<i class="ace-icon fa fa-check"></i>
														Show Report
													  </button>
                                                </div>
												
												<div class="col-xs-1">
												    
												</div>											          
                                            </div>
                                          </form>
										</div>
											
											

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div id="listView">
											 <table class="table table-bordered leaveListTable">
												<thead>
													<tr>
														<th class="center" width="8%">
														  Pur No
														</th>
														<th>Item Name</th>
														<th>Item Quantity</th>
														<th>Current stock</th>
														<th>Purchase Date</th>
														<th width="10%">Action</th>
													</tr>
												</thead>

												<tbody>
												
												<?php 
												   if(isset($allPurchaseInfo)) {
													 $i = $onset + 1;
													 foreach ($allPurchaseInfo as $v){
												 ?>
													<tr style="background-color:#F9F9F9">
														<td class="center">
                                                           #PUR00<?php echo $v->pur_no; ?>
														</td>

														<td><?php echo $v->item_name; ?></td>
														<td class="hidden-480"><?php echo $v->item_quantity; ?></td>
														<td class="hidden-480"><?php echo $v->current_stock; ?></td>
														<td><?php echo $v->pur_date; ?></td>
														<td>
															<div class="hidden-sm hidden-xs btn-group">
															<button class="btn btn-xs btn-info green2" data-id="<?php echo $v->id ?>"  data-rel="tooltip" title="Edit" data-placement="bottom">
																<i class="ace-icon fa fa-pencil bigger-120"></i>															</button>

															<button class="btn btn-xs btn-danger red" data-id="<?php echo $v->id ?>" data-rel="tooltip" title="Delete" data-placement="bottom" >
																<i class="ace-icon fa fa-trash-o bigger-120"></i>															</button>
															
														</div>
														</td>
													</tr>
												 <?php  } }  ?>	
												 
												 <tr>
													<th height="43" class="center">
														<label class="pos-rel"><span class="lbl"></span></label></th>
													<th colspan="5">
													<ul class="pager pull-right"><li><?php echo $this->pagination->create_links(); ?></li></ul>
													 </th>
												</tr>
												</tbody>
											</table> 
											
										</div>
									</div>
								</div>
					</div>
				</div>
				</div>
				
	  <?php $this->load->view('common/footer'); ?>
				
	</body>
</html>

<form class="modal fade" id="addNewItem" role="dialog" action="<?php echo site_url('inventoryManageMent/itemStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="item_id_edit" id="item_id_edit"  />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-primary no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Item :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter Item Code :</label>
				  	<input name="item_code" id="item_code" type="text" class="form-control" required="required" placeholder="Enter New Item Code">
				  </div>
				  
				  <div class="form-group">
				  <label>Enter Item Name :</label>
				  	<input name="item_name" id="item_name" type="text" class="form-control" required="required" placeholder="Enter New Item Name">
				  </div>
				  
				  <div class="form-group">
				  <label>Enter Item Price :</label>
				  	<input name="price" id="price" type="number" class="form-control" required="required" placeholder="Enter New Item Price">
				  </div>
				  
				  <div class="form-group">
				  <label>Enter Remarks :</label>
				    <textarea  name="remarks" id="remarks" cols="" rows="" class="form-control"  placeholder="Enter Remarks"  value="" ></textarea>	
				  </div>
				  
				</div>
				<div class="btn-lg btn-default  no_radius text-right">
				  <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">
						<i class="ace-icon fa fa-times"></i>
						Close
					</button>
					
					
				  <button class="btn btn-sm btn-primary" type="submit">
						<i class="ace-icon fa fa-check"></i>
						<span class="update">Submit</span>
					</button>
				</div>
			  </div>
			  
			</div>
 	 </form>	
	 
	 
	 
	 <form class="modal fade" id="addNewVendor" role="dialog" action="<?php echo site_url('inventoryManageMent/vendorStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="vendor_id_edit" id="vendor_id_edit"  />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-primary no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Vendor :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter Vendor Name :</label>
				  	<input name="name" id="name" type="text" class="form-control" required="required" placeholder="Enter New Vendor Name">
				  </div>
				  
				  <div class="form-group">
				  <label>Enter Email :</label>
				  	<input name="email" id="email" type="text" class="form-control" required="required" placeholder="Enter New Email">
				  </div>
				  
				  <div class="form-group">
				  <label>Enter Mobile :</label>
				  	<input name="mobile" id="mobile" type="text" class="form-control" required="required" placeholder="Enter New Mobile">
				  </div>
				  
				  
				  <div class="form-group">
				  <label>Enter Adress :</label>
				    <textarea  name="adress" id="adress" cols="" rows="" class="form-control"  placeholder="Adress"  value="" ></textarea>	
				  </div>
				  
				</div>
				<div class="btn-lg btn-default  no_radius text-right">
				  <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">
						<i class="ace-icon fa fa-times"></i>
						Close
					</button>
					
					
				  <button class="btn btn-sm btn-primary" type="submit">
						<i class="ace-icon fa fa-check"></i>
						<span class="update">Submit</span>
					</button>
				</div>
			  </div>
			  
			</div>
 	 </form>	
		
<script>


$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd',
       });



$('#item_id').change(function(){
    var purPrice = $("#item_id option:selected").attr('data-item-price'); 
	console.log(purPrice);
	$('#pur_price').val(purPrice);
});

$('#item_quantity').blur(function(){
    var purPrice = $("#pur_price").val(); 
	var qnty     = $(this).val();
	
	$('#total_price').val(+purPrice * +qnty);
});


// add item  part start

 $(document).on("click", ".addIem", function()
	{	
	     $('#addNewItem').modal('show');
		 
		 $("#addNewItem input[type='text'], #addNewItem input[type='hidden']").val("");
		 $('#addNewItem .update').text("Save");
	    
		
	});

   // add item edit
   $(document).on("click", ".editItem", function()
	{
		var itemName 	 = $("#item_id option:selected").attr('data-item-name');
		var itemprice 	 = $("#item_id option:selected").attr('data-item-price');
		var itemCode 	 = $("#item_id option:selected").attr('data-item-code');
		var itemRemarks  = $("#item_id option:selected").attr('data-item-remarks');
		var editItemId   = $("#item_id option:selected").val();
		
		
		if(editItemId ==''){
		 alert('Please select a Item name to edit');
		 return false;
		} else {
		
		 console.log($("#addNewItem #item_name").val(itemName));
		 console.log($("#addNewItem #item_id_edit").val(editItemId));
		 $("#addNewItem #item_code").val(itemCode);
		 $("#addNewItem #price").val(itemprice);
		 $("#addNewItem #remarks").val(itemRemarks);
		 $('#addNewItem .update').text("Update");
		 $('#addNewItem').modal('show');
		}
		
		
		
	});
	
	
	// item insert  ajax
	
	 $("#addNewItem").submit(function(e)
		{
			
			var postData = $(this).serializeArray();
			var formURL = $(this).attr("action");
			$.ajax(
			{
				url : formURL,
				type: "POST",
				async: false,
				data : postData,
				success:function(data){
					$(".itemListView").html(data);				
					$("#addNewItem input[type='text'], #addNewItem input[type='hidden'], #addNewItem textarea").val("");
					$('#addNewItem').modal('hide');
				}
			});
			
			
			e.preventDefault();
		});

// item part end


// add vendor 

 $(document).on("click", ".addVendor", function()
	{	
	     $('#addNewVendor').modal('show');
		 
		 $("#addNewVendor input[type='text'], #addNewItem input[type='hidden']").val("");
		 $('#addNewVendor .update').text("Save");
	   
		
	});
	
	
	
	
	 $(document).on("click", ".editVendor", function()
		{
			var name 	 		= $("#vendor_id option:selected").attr('data-vendor-name');
			var email 	 		= $("#vendor_id option:selected").attr('data-vendor-email');
			var mobile 			= $("#vendor_id option:selected").attr('data-vendor-mobile');
			var adress  		= $("#vendor_id option:selected").attr('data-vendor-adress');
			var editVendorId   	= $("#vendor_id option:selected").val();
			
			
			if(editVendorId ==''){
			 alert('Please select a Vendor name to edit');
			 return false;
			} else {
			
			 console.log($("#addNewVendor #name").val(name));
			 console.log($("#addNewVendor #vendor_id_edit").val(editVendorId));
			 $("#addNewVendor #email").val(email);
			 $("#addNewVendor #mobile").val(mobile);
			 $("#addNewVendor #adress").val(adress);
			 $('#addNewVendor .update').text("Update");
			 $('#addNewVendor').modal('show');
			}
			
			
			
		});
		
		
		
	  // vendor insert  ajax
	
	   $("#addNewVendor").submit(function(e)
		{
			
			var postData = $(this).serializeArray();
			var formURL = $(this).attr("action");
			$.ajax(
			{
				url : formURL,
				type: "POST",
				async: false,
				data : postData,
				success:function(data){
					$(".vendorListView").html(data);				
					$("#addNewVendor input[type='text'], #addNewVendor input[type='hidden'], #addNewVendor textarea").val("");
					$('#addNewVendor').modal('hide');
				}
			});
			
			
			e.preventDefault();
		});
		
	
	

// add vendor  end


	
	$(document).on("click", ".green2", function(e)
	{
		
		var id 		= $(this).attr("data-id");
		console.log(id);
		var formURL = "<?php echo site_url('inventoryManageMent/purchaseEditInfo'); ?>";
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : {id: id},
			dataType: "json",
			success:function(data){
				$('#pur_edit_id').val(data.id);
				$('#pur_no').val(data.pur_no);
				$('#item_id').val(data.item_id);
				$('#vendor_id').val(data.vendor_id);
				$('#item_quantity').val(data.item_quantity);
				$('#total_price').val(data.total_price);
				$('#pur_price').val(data.pur_price);
				$('#remarks').val(data.remarks);
				$('#addForm .update2').text("Update");
				
		
			}
		});
		
		e.preventDefault();
	});
	
	
	
	$("#purSearchForm").on("submit", function(e)
		{
			var formURL 	= $(this).attr('action');
			var inputData 	= $(this).serializeArray();
			
			$.ajax({
				url : formURL,
				type: "POST",
				data : inputData,
				dataType: "html",
				success:function(data){
					$('#listView').html(data);
				}
			});
			
			e.preventDefault();
		});
		
	
	
	 $('.red').on('click', function() {
			var x = confirm('Are you sure to delete?');
			
			if(x){
				var id = $(this).attr('data-id');
				console.log(id);
				var url = SAWEB.getSiteAction('inventoryManageMent/purDelete/'+id);
				location.replace(url);
			} else {
				return false;
			}
		});

</script>