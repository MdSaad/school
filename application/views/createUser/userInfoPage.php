
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
							<a href="<?php echo site_url('authorize/createUser'); ?>">Authorization</a>
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
								  <div id="widget-container-col-11" class="col-md-12 col-xs-12 col-sm-12 col-lg-12 widget-container-col ui-sortable addFormContent" style="min-height: 172px; display:block">
									<div id="widget-box-11" class="widget-box widget-color-dark ui-sortable-handle" style="opacity: 1;">
										<div class="widget-header">
											<h4 class="widget-title">User Access Privilege Manage</h4>
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
											<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('authorize/createUser/adminUserInfoStore'); ?>" enctype="multipart/form-data" method="post">
												<div class="scroll-content">
															<div class="content img-thumbnail container">
																  <input type="hidden" class="form-control" name="update_id" id="update_id"  value=""/>
																		<div class="col-md-12">
																		 <div class="col-md-6 ">
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Select Branch :</label>
																			  <div class="col-sm-7">
																				   <select class="form-control" name="user_branch_id" id="user_branch_id" required="required" >
																					<option value="" selected="selected" >Select Branch* </option>
																						<?php foreach($branchListInfo as $k=>$v) { ?>
																						<option value="<?php echo $v->id; ?>" ><?php echo $v->branch_name; ?></option>
																						<?php } ?>
																				
																					</select>																			  </div>
																			</div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Admin Type :</label>
																			  <div class="col-sm-7">
																					<select class="form-control" name="type" id="type" required="required" >
																						<option value="" selected="selected" >Select Admin Type* </option>
																						<option value="superadmin" >Super Admin</option>
																						<option value="teacher" >Teacher</option>
																						<option value="classTeacher" >Class Teacher</option>
																						<option value="adminStaff" >Admin Staff</option>
																					</select>																			 
																				</div>
																			</div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Full Name :</label>
																			  <div class="col-sm-7">
																					<input id="user_full_name" name="user_full_name" class="form-control" type="text"  placeholder="Enter Full Name" >														  </div>
																			</div>
																			
																			
																			<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Status  :</label>
																					  <div class="col-sm-7">
																							<select class="form-control" name="status" id="status" required="required" >
																								<option value="" selected="selected" >Select Status* </option>
																								<option value="Active" >Active</option>
																								<option value="Inactive" >Inactive</option>
																							</select>										  
																					  </div>
																				</div>
																			
																		 </div>
																		 
																		 <div class="col-md-6 ">
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Login Name :</label>
																				  <div class="col-sm-7">
																						<input id="user_name" name="user_name" class="form-control" type="text"  placeholder="Enter Login Name*" required="required">			<span class="existAlert"></span>
																					</div>
																						
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Password :</label>
																				  <div class="col-sm-7">
																						<input id="password" name="password" class="form-control" type="text"  placeholder="Enter Password*" required="required" >																			 
																					</div>
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5">Designation  :</label>
																				  <div class="col-sm-7">
																						<div class="input-group">
																							<select class="form-control designationListView" name="designation_id" id="designation_id" >
																							<option value="" selected="selected" >Select Designation </option>
																								<?php foreach($designationListInfo as $k=>$v) { ?>
																								<option value="<?php echo $v->dAutoId; ?>" ><?php echo $v->designationName; ?></option>
																								<?php } ?>
																						
																							</select>
																							<span class="input-group-addon addInstant" data-toggle="modal" data-target="#addNewDesignation" title="Add New" >
																								<i class="fa fa-plus "></i>
																							</span>
																							 
																						</div>														  
																				 </div>
																				</div>
																				
																			</div>
																			
																		<div class="col-md-12 img-thumbnail moduleList">
																			<div class="form-group">
																					<h3 class="text-center accessModuleTitle">Select Access Module  :</h3>
																					  <div class="col-sm-12">
																					  			<div class="accessModule">
																					  				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-responsive text-left">
																								  
																								  <tr>
																								    <td width="6%" >&nbsp;</td>
																									<td width="2%" ><label class="pos-rel">
																									<input type="checkbox" class="ace" id="admission" name="module[]" value="Admission"/>
																									<span class="lbl"></span></label></td>
																									<td width="6%" >&nbsp;</td>
																									<td width="49%" >Admission</td>
																									<td width="3%" ><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="diary" name="module[]" value="Diary"/>
                                                                                                      <span class="lbl"></span></label></td>
																									<td width="3%" >&nbsp;</td>
																									<td width="31%" >Diary</td>
																								  </tr>
																								  <tr>
																								    <td>&nbsp;</td>
																									<td><label class="pos-rel">
																									<input type="checkbox" class="ace" id="SIMS" name="module[]" value="SIMS" />
																									<span class="lbl"></span></label></td>
																									<td>&nbsp;</td>
																									<td>SIMS</td>
																									<td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="authorization" name="module[]" value="Authorization" />
                                                                                                      <span class="lbl"></span></label></td>
																									<td>&nbsp;</td>
																									<td>Authorization</td>
																								  </tr>
																								  <tr>
																								    <td>&nbsp;</td>
																									<td><label class="pos-rel">
																									<input type="checkbox" class="ace" id="TIMS" name="module[]" value="TIMS" />
																									<span class="lbl"></span></label></td>
																									<td>&nbsp;</td>
																									<td>TIMS</td>
																									<td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="result" name="module[]" value="Result" />
                                                                                                      <span class="lbl"></span></label></td>
																									<td>&nbsp;</td>
																									<td>Result</td>
																								  </tr>
																								  <tr>
																								    <td>&nbsp;</td>
																								    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="feeCollection" name="module[]" value="Fee Collection" />
                                                                                                      <span class="lbl"></span></label></td>
																								    <td>&nbsp;</td>
																								    <td>Fee Collection </td>
																								    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="certificateTranscrift" name="module[]" value="Certificate & Transcrift" />
                                                                                                      <span class="lbl"></span></label></td>
																								    <td>&nbsp;</td>
																								    <td>Certificate &amp; Transcrift </td>
																								  </tr>
																								  <tr>
																								    <td>&nbsp;</td>
																								    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="accounts" name="module[]" value="Accounts" />
                                                                                                      <span class="lbl"></span></label></td>
																								    <td>&nbsp;</td>
																								    <td>Accounts</td>
																								    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="attendence" name="module[]" value="Attendence" />
                                                                                                      <span class="lbl"></span></label></td>
																								    <td>&nbsp;</td>
																								    <td>Attendence</td>
																								  </tr>
																								  <tr>
																								    <td>&nbsp;</td>
																								    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="library" name="module[]" value="Library"  />
                                                                                                      <span class="lbl"></span></label></td>
																								    <td>&nbsp;</td>
																								    <td>Library</td>
																								    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="stuBlog" name="module[]" 
																									  value="Student Blog" />
                                                                                                      <span class="lbl"></span></label></td>
																								    <td>&nbsp;</td>
																								    <td>Student Blog </td>
																								  </tr>
																								  <tr>
																								    <td>&nbsp;</td>
																								    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="asset" name="module[]" 
																									  value="Asset Management" />
                                                                                                      <span class="lbl"></span></label></td>
																								    <td>&nbsp;</td>
																								    <td>Asset Management </td>
																								    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="parentsPortal" name="module[]" 
																									  value="Parents Portal" />
                                                                                                      <span class="lbl"></span></label></td>
																								    <td>&nbsp;</td>
																								    <td>Parents Portal </td>
																								  </tr>
																								  <tr>
																								    <td>&nbsp;</td>
																								    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="gallery" name="module[]" value="Gallery" />
                                                                                                      <span class="lbl"></span></label></td>
																								    <td>&nbsp;</td>
																								    <td>Gallery</td>
																								    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="assignment" name="module[]" value="Assignment" />
                                                                                                      <span class="lbl"></span></label></td>
																								    <td>&nbsp;</td>
																								    <td>Assignment</td>
																								  </tr>
																								  <tr>
																								    <td>&nbsp;</td>
																									<td><label class="pos-rel">
																									<input type="checkbox" class="ace" id="HR" name="module[]" value="HR" />
																									<span class="lbl"></span></label></td>
																									<td>&nbsp;</td>
																									<td>HR</td>
																									<td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="report" name="module[]" value="Report" />
                                                                                                      <span class="lbl"></span></label></td>
																									<td>&nbsp;</td>
																									<td>Report</td>
																								  </tr>
																								  
																								  <tr>
																								    <td>&nbsp;</td>
																									<td><label class="pos-rel">
																									<input type="checkbox" class="ace" id="approveCollection" name="module[]" value="approveCollection" />
																									<span class="lbl"></span></label></td>
																									<td>&nbsp;</td>
																									<td>Approve fee collection</td>
																									<td></td>
																									<td>&nbsp;</td>
																									<td></td>
																								  </tr>
																								</table>
																								</div>
																								
																								<span class="spAaccessModule"></span>
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
																			<span class="update">Submit</span>
																		</button>
																	</div>
																	</div>
											</form>
											
											<div class="alert alert-block alert-success afterSubmitContent" id="">
																<button class="close" data-dismiss="alert" type="button">
																<i class="ace-icon fa fa-times"></i>
																</button>
																<strong class="green">
																<i class="ace-icon fa fa-check-square-o"></i>
																
																</strong>
																<span class="alrtText">New Student Added Successfully. Try Again Click <strong class="btn-danger tryAgain">Here</strong></span>
															</div>
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
										User Access Privilege  List
											</div>
											
											

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											 <table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span></label>														</th>
														<th>Full Name</th>
														<th class="hidden-480">Login Name</th>

														<th class="hidden-480">Branch Name</th>
														<th class="hidden-480">Password</th>
														<th>Designation</th>
														<th></th>
													</tr>
												</thead>

												<tbody>
												
												<?php foreach($userInfo as $v) {  ?>
													<tr>
														<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>															</label>														</td>

														<td><?php echo $v->user_full_name; ?></td>
														<td class="hidden-480"><?php echo $v->user_name; ?></td>
														<td class=""><?php echo $v->branch_name; ?></td>
														<td class="hidden-480"><?php echo $v->password; ?></td>

														<td class="hidden-480"><?php echo $v->designationName; ?></td>
														<td>
															<div class="hidden-sm hidden-xs btn-group">

															<button class="btn btn-xs btn-info green" data-id="<?php echo $v->id ?>"  data-rel="tooltip" title="Edit" data-placement="bottom">
																<i class=" bigger-120">Edit/View</i>															</button>

															<button class="btn btn-xs btn-danger">
																<i class="bigger-120">Delete</i>															</button>
															
														</div>

															<div class="hidden-md hidden-lg">
															<div class="inline pos-rel">
																<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
																	<i class="ace-icon fa fa-cog icon-only bigger-110"></i>																</button>

																<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																	<li>
																		<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																			<span class="blue">
																				<i class="ace-icon fa fa-search-plus bigger-120"></i>																			</span>																		</a>																	</li>

																	<li>
																		<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																			<span class="green">
																				<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>																			</span>																		</a>																	</li>

																	<li>
																		<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																			<span class="red">
																				<i class="ace-icon fa fa-trash-o bigger-120"></i>																			</span>																		</a>																	</li>
																</ul>
															</div>
														</div>														
														</td>
													</tr>
												 <?php }  ?>	
												</tbody>
											</table> 
											
											<label class="pos-rel"><span class="lbl"></span></label>
											<ul class="pagination-sm list-inline pull-right no-margin">
												  <li class="pagi"><?php echo $this->pagination->create_links(); ?></li>
											</ul>

										</div>
									</div>
								</div>
					</div>
				</div>
				
					
				</div>
				
	  <?php $this->load->view('common/footer'); ?>
				
	</body>
</html>

 <?php if(!empty($alertMsg)) { ?> 
		<div class="alert alert-block alert-danger" id="alertMsg">
			<button class="close" data-dismiss="alert" type="button">
			<i class="ace-icon fa fa-times"></i>
			</button>
			<strong class="green">
			<i class="ace-icon fa fa-check-square-o"></i>
			
			</strong>
			<span class="alrtText"><?php echo $alertMsg; ?></span>
		</div>
		<?php } ?>
			

			

 
		
         <?php //$this->load->view('common/jsLinkPage'); ?>
		 
		<!-- <script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
		</script> -->
		
<!-- Start Part of Modal For Add New Shift -->
			<form class="modal fade" id="addNewDesignation" role="dialog" action="<?php echo site_url('authorize/createUser/designationInfoStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="update_id" value="" id="update_id" />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-success no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Designation :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter New Designation Name :</label>
				  	<input name="designationName" id="designationName" type="text" class="form-control" required="required" placeholder="Enter New Designation Name">
				  </div>
				</div>
				<div class="btn-lg btn-default  no_radius text-right">
				  <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">
						<i class="ace-icon fa fa-times"></i>
						Close
					</button>
					
					
				  <button class="btn btn-sm btn-primary" type="submit">
						<i class="ace-icon fa fa-check"></i>
						Submit
					</button>
				</div>
			  </div>
			  
			</div>
 	 </form>
<!-- End Part of Modal For Add New Shift -->	

<script type="text/javascript" >
$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy/mm/dd',
})

$('.add_new').on('click', function() {
	$('.add_new').fadeOut("slow");
	$('.addFormContent').fadeIn("slow");
	$("#addForm input[type='text'], #addForm input[type='number'], #addForm input[type='hidden']").val("");
	$("#addForm input[type='checkbox']").prop('checked', false);
	$("option:selected").prop("selected", false)
});

$('.formCancel').on('click', function() {
	$('.addFormContent').fadeOut('slow');
	$('.add_new').fadeIn('slow');
});


$("#addForm").submit(function(e)
{
	var postData = $(this).serializeArray();
	var formURL = $(this).attr("action");
	var successUrl = '<?php echo site_url('authorize/createUser'); ?>';
	$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
				//$('#addForm').css('display', 'none');
				//$('.afterSubmitContent').css('display', 'block');
				$("#addForm input[type='text'], input[type='hidden'], input[type='number'], input[type='email']").val("");
				$("#addForm input[type='checkbox']").prop('checked', false);
				$("option:selected").prop("selected", false);
				location.replace(successUrl);
			}
		  });
	
	e.preventDefault();
});

$('.tryAgain').on('click', function() {
	$('#addForm').fadeIn("slow");
	$('.afterSubmitContent').fadeOut('slow');
	$("#addForm input[type='text'], input[type='hidden'], input[type='number'], input[type='email']").val("");
	$("#addForm input[type='checkbox']").prop('checked', false);
	$("option:selected").prop("selected", false);
});


$("#addNewDesignation").submit(function(e)
{
	var postData = $(this).serializeArray();
	var formURL = $(this).attr("action");
	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : postData,
		success:function(data){
			$(".designationListView").html(data);				
			$("#addNewGroup input[type='text'], input[type='hidden']").val("");
			$('#addNewDesignation').modal('hide');
		}
	});
	
	e.preventDefault();
});


$("#user_name").on('keyup', function()
{
	var user_name = $(this).val();
	var formURL = '<?php echo site_url('authorize/createUser/chkAuthorExist'); ?>';
	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : {user_name: user_name},
		success:function(data){
			if(data == 0) {
			$(".existAlert").text('Sorry ! This Author Name is Already Exist. Try Another..');	
			$('.modal-footer button[type="submit"]').attr("disabled", "disabled");
			} else {
			$(".existAlert").text('');	
			$('.modal-footer button[type="submit"]').removeAttr("disabled", "disabled");
			}			
		}
	});
});

 $('#type').on('change', function() {
 	var type = $('select#type option:selected').val();
 	if(type == 'superadmin') {
		$('.spAaccessModule').html('<h4>Super Admin Can Access All Module</h4>')
		$('.accessModuleTitle').text('Access Module')
		$('.accessModule').css('display', 'none')
	} else {
		$('.spAaccessModule').html('')
		$('.accessModuleTitle').text('Select Access Module')
		$('.accessModule').css('display', 'block')
	}
 });
 
 $(document).on("click", ".green", function(e)
	{
		
		var id 		= $(this).attr("data-id");
		var formURL = "<?php echo site_url('authorize/createUser/adminUserEditInfo'); ?>";
		$('.update').text('Update');
		$("#addForm input[type='checkbox']").prop('checked', false);
		$("option:selected").prop("selected", false)
		
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : {id: id},
			dataType: "json",
			success:function(data){
				$('.addFormContent').css('display', 'block');
				$('#update_id').val(data.id);
				$('#user_branch_id').val(data.user_branch_id);
				$('#type').val(data.type);
				$('#user_full_name').val(data.user_full_name);
				$('#status').val(data.status);
				$('#user_name').val(data.user_name);
				$('#password').val(data.password);
				$('#designation_id').val(data.designation_id);
				if(data.type == "superadmin") {
					$('.spAaccessModule').html('<h4>Super Admin Can Access All Module</h4>')
					$('.accessModuleTitle').text('Access Module')
					$('.accessModule').css('display', 'none')
				}
				
				$('#update').text("Update");
				
				$.each(data.moduleAccessInfo, function(key, value){
						var module_name =(value.module_name);
						
						if(module_name == 'Admission'){
							$("#admission").prop('checked', true);
						}
						
						if(module_name == 'SIMS'){
							$("#SIMS").prop('checked', true);
						}
						
						if(module_name == 'TIMS'){
							$("#TIMS").prop('checked', true);
						} 
						
						if(module_name == 'Fee Collection'){
							$("#feeCollection").prop('checked', true);
						}
						
						if(module_name == 'Accounts'){
							$("#accounts").prop('checked', true);
						}
						
						if(module_name == 'Library'){
							$("#library").prop('checked', true);
						}
						
						if(module_name == 'Asset Management'){
							$("#asset").prop('checked', true);
						}
						
						if(module_name == 'Gallery'){
							$("#gallery").prop('checked', true);
						}
						
						if(module_name == 'HR'){
							$("#HR").prop('checked', true);
						}
						
						if(module_name == 'Diary'){
							$("#diary").prop('checked', true);
						}	
						
						if(module_name == 'Authorization'){
							$("#authorization").prop('checked', true);
						}	
						
						if(module_name == 'Result'){
							$("#result").prop('checked', true);
						}	
						
						if(module_name == 'Certificate & Transcrift'){
							$("#certificateTranscrift").prop('checked', true);
						}	
						
						if(module_name == 'Attendence'){
							$("#attendence").prop('checked', true);
						}	
						
						if(module_name == 'Parents Portal'){
							$("#parentsPortal").prop('checked', true);
						}	
						
						if(module_name == 'Assignment'){
							$("#assignment").prop('checked', true);
						}	
						
						if(module_name == 'Report'){
							$("#report").prop('checked', true);
						}	
						
						if(module_name == 'Student Blog'){
							$("#stuBlog").prop('checked', true);
						}	
						
						if(module_name == 'approveCollection'){
							$("#approveCollection").prop('checked', true);
						}					
						
					});
				
				$("html, body").animate({ scrollTop: 0 }, "slow");
				
				
			}
		});
		
		e.preventDefault();
	});
</script>