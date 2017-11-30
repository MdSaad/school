
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
							<a href="<?php echo site_url('inventoryManageMent/requisition'); ?>">Requisition Create</a>
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
											<h4 class="widget-title">Requisition Create</h4>
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
											<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('inventoryManageMent/requisitionStore'); ?>" enctype="multipart/form-data" method="post">
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
																		 <div class="col-md-5" style="padding-top: 20px">
																			   <div class="form-group">
																			  <label class="control-label col-sm-4" for="requisition_id">Requisition Id *:</label>
																			  <div class="col-sm-8">
																					<input id="requisition_id" name="requisition_id" class="form-control" type="text"  placeholder="Pur No*" required="required" 
																					value="<?php echo $maxReq->requisition_id + 1 ?>" readonly>		
																				</div>
																			  </div>
																			  
																			  <div class="form-group">
																			  <label class="control-label col-sm-4" for="department_id">Department *:</label>
																			  <div class="col-sm-8">
																				   <div class="input-group">
																					<select class="form-control departListView" name="department_id" id="department_id" required="required">
																						<option value="" selected="selected" >Select Department </option>
																						<?php foreach($allDepartName as $v){ ?>
																						  <option value="<?php echo $v->id ?>" data-depart-name="<?php echo $v->depart_name ?>"><?php echo $v->depart_name ?> </option>
																						<?php } ?>
																					</select>
																					<span class="redomain"></span>
																					<span class="input-group-addon addInstant">
																						<a class="addDepart" data-toggle="modal" data-target="#addNewVendor" title="Add New" href="#">  <i class="fa fa-plus "></i></a>&nbsp;
																						<a class="editDepart" title="Edit Depart" href="#"> <i class="fa fa-pencil "></i></a>
																					</span>
																		          </div>	
																					
																				</div>
																			</div>
																			  
																			   <div class="form-group">
																				  <label class="control-label col-sm-4" for="item_id">Creator Name:</label>
																				  <div class="col-sm-8">
																					    <input id="creator_name" name="creator_name" class="form-control" type="text"  placeholder="Creator Name">	
																					</div>
																				</div>
																				
																				<div class="form-group">
																				 <label class="control-label col-sm-4" for="reg_date">Date*:</label>	  
																				  <div class="col-sm-8">
																						<input id="reg_date" name="reg_date" class="form-control date-picker" type="text"  data-date-format="yyyy-mm-dd" placeholder="Enter Date*">		
																					</div>
																				  </div>
																			  
																			    <div class="form-group">
																				  <label class="control-label col-sm-4" for="remarks">Remarks:</label>
																				  <div class="col-sm-8">
																						<textarea  name="remarks" id="remarks" cols="" rows="" class="form-control"  placeholder="Remarks"  value="" ></textarea>	
																					</div>
																				  </div>
																				
																			   
																		 </div>
					
					
					 
																		 <div class="col-md-7" style="padding-top: 20px">
																		     <table width="100%" border="0">
																				  <tr>
																					<td width="39%"> 
																					  <div class="form-group" style="padding-left: 20px">
																						<label for="pro_id" class="pull-left">Select Item</label>
																						<select class="form-control" id="item_id" name="item_id"  tabindex="7" >
																							<option value=""> Select Item</option>
																							<?php foreach ($allItemName as $v): ?>
																							<option value="<?php echo $v->id; ?>" data-item-name='<?php echo $v->item_name; ?>'> <?php echo $v->item_name; ?> </option>
																							<?php endforeach; ?>
																						</select>
																				    </div>										    </td>
																					<td width="11%">&nbsp;</td>
																					<td width="30%">
																					   <div class="form-group" style="padding:0 6px 0 6px;">
																						<label for="pur_quantity" class="pull-left">Item Quantity</label>
																					   <input type="text" class="form-control" id="req_quantity" name="req_quantity" placeholder="Item Quantity">
																				    </div></td>
																					<td width="20%">
																					  <div class="form-group" style="padding-top:25px;">                                                          
																						<button type="button" class="btn btn-success btn-sm add-item">ADD</button>
																				    </div></td>
																				  </tr>
																				</table>
																				<div class="col-md-12" style="padding: 0 20px 0 10px">
																				<table class="table table-striped table-bordered table-hover item-table">
																					<thead>
																						<tr>
																							<th width="10%" class="text-right"> S.N </th>
																							<th width="35%" align="right" valign="middle" class="text-right">Product Name </th>
																							<th width="35%" align="right" valign="middle" class="text-right">Quantity </th>
																							<th width="20%" class="text-center">Action</th>
																						</tr>
																					</thead>
																					<tbody>
																					</tbody>
																					
																			  </table>
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
										  <div class="table-header"> Requisition List </div> 
											
											

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div id="listView">
											 <table class="table table-bordered leaveListTable">
												<thead>
													<tr>
														<th class="center" width="10%">
														  Requisition Id
														</th>
														<th>Department</th>
														<th>Creator name</th>
														<th>Date</th>
														<th>Remarks</th>
														<th width="10%">Action</th>
													</tr>
												</thead>

												<tbody>
												
												<?php 
												   if(isset($allRequisitionInfo)) {
													 $i = $onset + 1;
													 foreach ($allRequisitionInfo as $v){
												 ?>
													<tr style="background-color:#F9F9F9">
														<td class="center">
                                                           <a  href="#requisition-form" style="text-decoration:none;" class="requisition" data-id="<?php echo $v->id ?>">#REQ00<?php echo $v->requisition_id; ?></a>
														</td>

														<td><?php echo $v->depart_name; ?></td>
														<td class="hidden-480"><?php echo $v->creator_name; ?></td>
														<td class="hidden-480"><?php echo $v->reg_date; ?></td>
														<td><?php echo $v->remarks; ?></td>
														<td>
															<div class="hidden-sm hidden-xs btn-group">
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

    <div id="requisition-form" class="modal" tabindex="-1" data-backdrop="static">
			<div class="modal-dialog modal-lg">
				
			</div>
	</div>

<form class="modal fade" id="addNewDepart" role="dialog" action="<?php echo site_url('inventoryManageMent/departStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="depart_id_edit" id="depart_id_edit"  />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-primary no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Department :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter Department Name :</label>
				  	<input name="depart_name" id="depart_name" type="text" class="form-control" required="required" placeholder="Enter New Department Name">
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
	   
	   // requisition detrails
	   
	   $(document).on('click', '.requisition', function(e) {
		    var reqId   = $(this).attr("data-id");
		    var formURL = "<?php echo site_url('inventoryManageMent/requisitionWiseDetails'); ?>";
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {reqId: reqId},
				dataType : "html",
				success:function(data){
				  $('#requisition-form').modal('show');   
				  $('#requisition-form  .modal-dialog').html(data);
				
				}
			});
			
		    
		});
	   
 // Add item for Requisition
		$('.add-item').on('click', function() {
		
            var item_id            = $('#item_id').val();
			var itemName 		   = $("#item_id option:selected").attr('data-item-name'); 
            var req_quantity       = $('#req_quantity').val();
			
			var html = '<tr>';
				html +='<td class="serial text-right"></td><td class="text-right">'+itemName+'</td><td class="text-right">'+req_quantity+'</td><td>';
				html    += '<input type="hidden" name="item_id[]" value="'+item_id+'" />';
			    html    += '<input type="hidden" name="item_quan[]" value="'+req_quantity+'" />';
			    html += '<a class="item-edit" href="#"><i class="ace-icon fa fa-pencil bigger-130"></i></a>&nbsp;<a class="item-delete" href="#"><i class="ace-icon fa fa-trash-o bigger-130"></i></a></td></tr>';
			
			 $('.item-table tbody').append(html);
			 $('#item_id').val('');
             $('#req_quantity').val('');
			 
			 serialMaintain();
	    });	
		
		// Edit item 
		
		  $('.item-table').on('click', '.item-edit', function(e) {
            var element         = $(this).parents('tr');
            var item_id         = element.find('input[name="item_id[]"]').val();
            var item_quan       = element.find('input[name="item_quan[]"]').val();
			

            $('#item_id').val(item_id);
            $('#req_quantity').val(item_quan);
			
            element.remove();

            e.preventDefault();

            serialMaintain();
        });
		
		// Remove item 
		$('.item-table').on('click', '.item-delete', function(e) {
            var element = $(this).parents('tr');
            element.remove();

            e.preventDefault();

            serialMaintain();
        });
		
		
		function serialMaintain(){
            var i = 1;
            $('.serial').each(function(key, element) {
                $(element).html(i);
                i++;
            });

       }
		
		
		
		
		
		




// add department  part start

 $(document).on("click", ".addDepart", function()
	{	
	     $('#addNewDepart').modal('show');
		 
		 $("#addNewDepart input[type='text'], #addNewItem input[type='hidden']").val("");
		 $('#addNewDepart .update').text("Save");
	    
		
	});

   // add item edit
   $(document).on("click", ".editDepart", function()
	{
		var departName 	 = $("#department_id option:selected").attr('data-depart-name');
		var editDepartId   = $("#department_id option:selected").val();
		
		
		if(editDepartId ==''){
		 alert('Please select a Department to edit');
		 return false;
		} else {
		
		 console.log($("#addNewDepart #depart_name").val(departName));
		 console.log($("#addNewDepart #depart_id_edit").val(editDepartId));
		 $('#addNewDepart .update').text("Update");
		 $('#addNewDepart').modal('show');
		}
		
		
		
	});
	
	
	// item insert  ajax
	
	 $("#addNewDepart").submit(function(e)
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
					$(".departListView").html(data);				
					$("#addNewDepart input[type='text'], #addNewDepart input[type='hidden']").val("");
					$('#addNewDepart').modal('hide');
				}
			});
			
			
			e.preventDefault();
		});

// item part end


	
	 $('.red').on('click', function() {
			var x = confirm('Are you sure to delete?');
			
			if(x){
				var id = $(this).attr('data-id');
				console.log(id);
				var url = SAWEB.getSiteAction('inventoryManageMent/reqDelete/'+id);
				location.replace(url);
			} else {
				return false;
			}
		});

</script>