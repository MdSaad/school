
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
							<a href="<?php echo site_url('HR'); ?>">HR</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('employeeInfo/empEditInfo'); ?>">Edit Information</a>&nbsp;&nbsp;
							<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('employeeInfo/essentialInfoEdit'); ?>">Essential Information Edit</a>
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
											<h3 class="widget-title"><strong>Employee Essential Information Edit</strong></h3>
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
												
												<a data-action="close" href="#">
													<i class="ace-icon fa fa-times"></i>
												</a>
												
												<!-- <a class="orange2" data-action="fullscreen" href="#">
													<i class="ace-icon fa fa-expand"></i>
												</a> -->
												</div>
										</div>
										
										<div class="widget-body ">
											<div class="widget-main padding-4"  style="position: relative;">
											
												<div class="scroll-content">
														<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('employeeInfo/empEssentialInfoUpdateAction'); ?>" enctype="multipart/form-data" method="post">							
														<div class="content img-thumbnail container">
														      <input type="hidden" name="essential_edit_id" id="essential_edit_id" value="<?php echo $empEssentialEditInfo->emp_auto_id ?>" />
														            <div class="form-group" style="padding:20px 0 20px 0; border-bottom:1px solid #CCCCCC;">
																	<div class="col-sm-3 text-left">
																		   
																	    </div>
																	  <label class="control-label col-sm-2" for="emp_id"><strong>Employee Id :</strong></label>
																	 <div class="col-sm-4">
																			<input type="text" class="form-control" name="emp_id" id="emp_id" placeholder="Enter Employee Id"  
																			value="<?php echo $this->session->userdata('empEditId'); ?>" readonly="readonly"/>
																	  </div>
																	  
																	    <div class="col-sm-3 text-left">
																		   
																	    </div>
																	  
																	</div>
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="bank_id">Bank Name :</label>
																	  <div class="col-sm-4">
																		<div class="input-group">
																			<select class="form-control bankListView" name="bank_id" id="bank_id" >
																			<option value="" selected="selected" >Select Bank </option>
																			<?php foreach($bankListInfo as $v){ ?>
																			  <option <?php if($empEssentialEditInfo->bank_id == $v->id){ ?> selected="selected" <?php } ?> value="<?php echo $v->id ?>" data-bank-name="<?php echo $v->bank_name ?>" ><?php echo $v->bank_name ?> </option>
																			<?php } ?>
																			</select>
																			<span class="input-group-addon addInstant">
																			  <a class="addBank" data-toggle="modal" data-target="#addNewBank" title="Add New" href="#">  <i class="fa fa-plus "></i></a>&nbsp;
																			  <a class="editBank" title="Edit Bank" href="#"> <i class="fa fa-pencil "></i></a>
																			</span>
																			
																			
																		</div>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="blood_group">Blood Group :</label>
																	   <div class="col-sm-4">
																		<select class="form-control" name="blood_group" id="blood_group" >
																		<option value="" selected="selected" >Select Blood Group </option>
																		<option <?php if($empEssentialEditInfo->blood_group == 'O+'){ ?> selected="selected" <?php } ?> value="O+">O+ </option>
																		<option <?php if($empEssentialEditInfo->blood_group == 'O-'){ ?> selected="selected" <?php } ?> value="O-">O- </option>
																		<option <?php if($empEssentialEditInfo->blood_group == 'A+'){ ?> selected="selected" <?php } ?> value="A+">A+ </option>
																		<option <?php if($empEssentialEditInfo->blood_group == 'A-'){ ?> selected="selected" <?php } ?> value="A-">A- </option>
																		<option <?php if($empEssentialEditInfo->blood_group == 'B+'){ ?> selected="selected" <?php } ?> value="B+">B+ </option>
																		<option <?php if($empEssentialEditInfo->blood_group == 'B-'){ ?> selected="selected" <?php } ?> value="B-">B- </option>
																		<option <?php if($empEssentialEditInfo->blood_group == 'AB+'){ ?> selected="selected" <?php } ?> value="AB+">AB+ </option>
																		<option <?php if($empEssentialEditInfo->blood_group == 'AB-'){ ?> selected="selected" <?php } ?> value="AB-">AB- </option>
																		</select>
																	  </div>
																	</div>
																	
																	
																	
																	<div class="form-group">
																	
																	  <label class="control-label col-sm-2" for="bank_list">Bank List :</label>
																	  <div class="col-sm-4">
																		 <input type="text" class="form-control" name="bank_list" id="bank_list" placeholder="Enter Bank List" 
																		  value="<?php echo $empEssentialEditInfo->bank_list ?>" />
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="driving_licence"> Driving Licence :</label>
																	  <div class="col-sm-4">
																		<input type="text" class="form-control" name="driving_licence" id="driving_licence" placeholder="Enter Driving Licence" 
																		 value="<?php echo $empEssentialEditInfo->driving_licence ?>" />
																	  </div>
																	</div>
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="bank_branch_id">Branch :</label>
																	  <div class="col-sm-4">
																		<div class="input-group">
																			<select class="form-control branchListView" name="bank_branch_id" id="bank_branch_id" >
																			<option value="" selected="selected" >Select Branch </option>
																			<?php foreach($bankBranchListInfo as $v){ ?>
																			  <option <?php if($empEssentialEditInfo->bank_branch_id == $v->id){ ?> selected="selected" <?php } ?> value="<?php echo $v->id ?>" data-bankBranch-name="<?php echo $v->branch_name ?>" ><?php echo $v->branch_name ?> </option>
																			<?php } ?>
																			</select>
																			
																			<span class="input-group-addon addInstant">
																			  <a class="addBranch" data-toggle="modal" data-target="#addNewBranch" title="Add New" href="#">  <i class="fa fa-plus "></i></a>&nbsp;
																			  <a class="editBranch" title="Edit Branch" href="#"> <i class="fa fa-pencil "></i></a>
																			</span>
																		</div>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="type_of_licence">Type Of Licence  :</label>
																	    <div class="col-sm-4 text-left">
																		<select class="form-control" name="type_of_licence" id="type_of_licence">
																			<option value="" selected="selected" >Select Licence Type </option>
																			<option <?php if($empEssentialEditInfo->type_of_licence == 'Heavy'){ ?> selected="selected" <?php } ?> value="Heavy">Heavy</option>
																			<option <?php if($empEssentialEditInfo->type_of_licence == 'Medium'){ ?> selected="selected" <?php } ?> value="Medium">Medium </option>
																			<option <?php if($empEssentialEditInfo->type_of_licence == 'Normal'){ ?> selected="selected" <?php } ?> value="Normal">Normal </option>
																			<option <?php if($empEssentialEditInfo->type_of_licence == 'Motor cycle'){ ?> selected="selected" <?php } ?> value="Motor cycle">Motor cycle </option>
																			<option <?php if($empEssentialEditInfo->type_of_licence == 'CNG'){ ?> selected="selected" <?php } ?> value="CNG">CNG </option>
																		</select>
																	  </div>
																	  
																	</div>
																	
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-2">Address :</label>
																	  <div class="col-sm-4">
																		<textarea class="form-control" name="address" id="address" placeholder="Enter Bank Address"><?php echo $empEssentialEditInfo->address ?></textarea>
																	  </div>
																	  
																	  
																	  <label class="control-label col-sm-2" for="passport_no"> Passport :</label>
																	  <div class="col-sm-4">
																		 <input  type="text" class="form-control" name="passport_no" id="passport_no" placeholder="Enter Passport"
																		  value="<?php echo $empEssentialEditInfo->passport_no ?>"/>
																	  </div>
																	  
																	</div>
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="account_no">Account No :</label>
																	  <div class="col-sm-4">
																		 <input  type="text" class="form-control" name="account_no" id="account_no" placeholder="Enter Account No" 
																		 value="<?php echo $empEssentialEditInfo->account_no ?>" />
																	  </div>
																	  
																	  
																	  
																	  
																	  <label class="control-label col-sm-2" for="passport_issu_date">Passport Issue Date :</label>
																	  <div class="col-sm-4">
																		<div class="input-group">
																			<input id="passport_issu_date" name="passport_issu_date" class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" 
																			placeholder="Enter Passport Issue Date" value="<?php echo $empEssentialEditInfo->passport_issu_date ?>" >
																			<span class="input-group-addon">
																				<i class="fa fa-calendar bigger-110"></i>
																			</span>
																		</div>
																	  </div>
																	  
																	  
																	</div>
																	
																	
																	<div class="form-group">
																	   <label class="control-label col-sm-2" for="type_of_account">Type Of Account:</label>
																	  <div class="col-sm-4">
																	     <select class="form-control" name="type_of_account" id="type_of_account" >
																			<option value="" selected="selected" >Select Type Of Account </option>
																			<option <?php if($empEssentialEditInfo->type_of_account == 'Current'){ ?> selected="selected" <?php } ?> value="Current">Current Account </option>
																			<option <?php if($empEssentialEditInfo->type_of_account == 'Saving'){ ?> selected="selected" <?php } ?> value="Saving">Saving Account </option>
																			<option <?php if($empEssentialEditInfo->type_of_account == 'Salary'){ ?> selected="selected" <?php } ?> value="Salary">Salary Account</option>
																		</select>
																		
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="visited_country">Visited Country :</label>
																	   <div class="col-sm-4">
																		<input type="text" class="form-control" name="visited_country" id="visited_country" placeholder="Enter Visited Country" 
																		value="<?php echo $empEssentialEditInfo->visited_country ?>" />
																	  </div>
																	</div>
																	
																	<div class="form-group">
																	  
																	 <label class="control-label col-sm-2" for="nid">NID :</label>
																	  <div class="col-sm-4">
																			<input id="nid" name="nid" class="form-control" type="text"  placeholder="Enter NID" value="<?php echo $empEssentialEditInfo->nid ?>" >
																	  </div>
																	 																	  
																	    <label class="control-label col-sm-2" for="tin">TIN :</label>
																	     <div class="col-sm-4 text-left">
																		<input type="text" class="form-control" name="tin" id="tin" placeholder="Enter TIN" value="<?php echo $empEssentialEditInfo->tin ?>" />
																	  </div>
																	</div>
																	
																	
																	
																	
																	
																	
																	
																	
																	  <div class="modal-footer">
																	  	
																		<button class="btn btn-sm btn-danger formCancel" type="button">
																			<i class="ace-icon fa fa-times"></i>
																			Cancel
																		</button>
																		<button class="btn btn-sm btn-primary" type="submit">
																			<i class="ace-icon fa fa-check"></i>
																			<span class="update"> Update </span>
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
																<span class="alrtText">Information Update Successfully. Update Again Click <strong class="btn-danger tryAgain">Here</strong></span>
															</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							 </div>	
					</div>
				</div>
				</div>
				
	  <?php $this->load->view('common/footer'); ?>
				
	</body>
</html>


<!-- Start Part of Modal For Add New Class -->
			<form class="modal fade" id="addNewBank" role="dialog" action="<?php echo site_url('employeeInfo/bankInfoStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="bank_edit_id" value="" id="bank_edit_id" />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-primary no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Bank :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter New Bank Name :</label>
				  	<input name="bankName" id="bankName" type="text" class="form-control" required="required" placeholder="Enter New Bank Name">
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
 		<!-- End Part of Modal For Add New Class -->
		
		
		<!-- Start Part of Modal For Add New Branch -->
			<form class="modal fade" id="addNewBranch" role="dialog" action="<?php echo site_url('employeeInfo/bankBranchInfoStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="branch_edit_id" value="" id="branch_edit_id" />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-primary no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Bank Branch :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter New Branch Name :</label>
				  	<input name="branchName" id="branchName" type="text" class="form-control" required="required" placeholder="Enter New Branch Name">
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
 		<!-- End Part of Modal For Add New Section -->
		
		
		
		
 		<!-- End Part of Modal For Add New Group -->
 
		
         <?php //$this->load->view('common/jsLinkPage'); ?>
		 
		<!-- <script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
		</script> -->
		
<script type="text/javascript" >
$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd',
});


// Bank name edit part start

 $(document).on("click", ".addBank", function()
	{
		$("#addNewBank input[type='text'], #addNewBank input[type='hidden']").val("");
		$('#addNewBank .update').text("Save");
	});


   $(document).on("click", ".editBank", function()
	{
		
		var bankName 	= $("#bank_id option:selected").attr('data-bank-name');
		var editId      = $("#bank_id option:selected").val();
		
		if(editId ==''){
		 alert('Please select a Bank name to edit');
		 return false;
		}
		
		 console.log($("#addNewBank #bankName").val(bankName));
		 console.log($("#addNewBank #bank_edit_id").val(editId));
		 $('#addNewBank .update').text("Update");
		 $('#addNewBank').modal('show');
		
		
		
	});

// Bank name edit part end



// Bank name edit part start

 $(document).on("click", ".addBranch", function()
	{
		$("#addNewBranch input[type='text'], #addNewBranch input[type='hidden']").val("");
		$('#addNewBranch .update').text("Save");
	});


   $(document).on("click", ".editBranch", function()
	{
		
		var branchName 	= $("#bank_branch_id option:selected").attr('data-bankBranch-name');
		var editId      = $("#bank_branch_id option:selected").val();
		
		if(editId ==''){
		 alert('Please select a Bank name to edit');
		 return false;
		}
		
		 console.log($("#addNewBranch #branchName").val(branchName));
		 console.log($("#addNewBranch #branch_edit_id").val(editId));
		 $('#addNewBranch .update').text("Update");
		 $('#addNewBranch').modal('show');
		
		
		
	});

// Bank name edit part end




$("#addForm").submit(function(e)
	{
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
				$('#addForm').css('display', 'none');
				$('.afterSubmitContent').css('display', 'block');
				$("#addForm input[type='text'], #addForm input[type='hidden'], #addForm select, #addForm textarea").val("");
			}
		  });
		
		e.preventDefault();
	});
	


$("#addNewBank").submit(function(e)
	{
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
				$(".bankListView").html(data);	
				$("#addNewBank input[type='text'], #addNewBank input[type='hidden']").val("");
			    $('#addNewBank').modal('hide');			
			}
		});
		
		e.preventDefault();
	});
	
$("#addNewBranch").submit(function(e)
	{
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
				$(".branchListView").html(data);	
				$("#addNewBranch input[type='text'], #addNewBranch input[type='hidden']").val("");
			    $('#addNewBranch').modal('hide');		
			}
		});
		
		e.preventDefault();
	});	
	
	

	
   // again insert 
	$('.tryAgain').on('click', function() {
	 var successUrl = '<?php echo site_url('employeeInfo/empEditInfo'); ?>';
	 location.replace(successUrl);
	
});


$('[data-rel=tooltip]').tooltip({container:'body'});
$('[data-rel=popover]').popover({container:'body'});
</script>