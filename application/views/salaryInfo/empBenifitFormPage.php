
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
							<a href="<?php echo site_url('HR'); ?>">HR</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('salaryManageSystem'); ?>">Employee Salary</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp; <a href="<?php echo site_url('salaryManageSystem/addBenifit'); ?>">Employee Benifit </a>&nbsp;&nbsp;
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
											<h3 class="widget-title"><strong>Employee Benifit Management</strong></h3>
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
										
									<div class="row">
										<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
											<div class="clearfix">
												<div class="pull-right tableTools-container"></div>
											</div>
											<div class="text-left">
												<form class="form-horizontal" id="attendenceReportForm" role="form" action="<?php echo site_url('salaryManageSystem/empBenifitForm'); ?>" enctype="multipart/form-data" method="post">	
												<div class="scroll-content">
													<div class="content img-thumbnail container" style="width: 100%; padding:15px;">
														<div class="row">
															<div class="form-group">
																  <label class="control-label col-sm-4"><strong>Employee ID  :</strong></label>
																  <div class="col-sm-5">
																			<input name="empID" id="empID" class="form-control" type="text" placeholder="Enter Employee ID" value="<?php if(!empty($empID)){ echo $empID; }  ?>">

																			<?php 
																			     if(!empty($empID)){ 
																				 if(empty($empDetails->employee_id)){
																			 ?>
																			    <span style="color:#FF0000; padding-top:2px;">Sorry This Id is not exit</span>
																			  <?php } } ?>	
																		</div>																			  
																  </div>
																</div>
														<div class="col-md-12">
														  <div class="col-md-1"></div> 
														    <div class="col-md-10 img-thumbnail">
															 <div class="col-md-6" style="padding-top:6px;">
																<div class="form-group">
																	 <label class="control-label col-sm-5 " for="domain_id">Domain :</label>
																	  <div class="col-sm-7 paddingZero">
																		 <select class="form-control" name="domain_id" id="domain_id">
																			<option value="" selected="selected" >Select Domain </option>
																			<?php foreach($domainListInfo as $v){ ?>
																			  <option <?php if($domain_id == $v->id){ ?> selected="selected" <?php } ?> value="<?php echo $v->id ?>" ><?php echo $v->domain_name ?> </option>
																			<?php } ?>
																		</select>																		   		
																	 </div>
																 </div>
																 
																 <div class="form-group">
																		  <label class="control-label col-sm-5 " for="designition_id">Designition :</label>
																		  <div class="col-sm-7 paddingZero">
																				<select class="form-control designitionListView" name="designition_id" id="designition_id">
																				  <option value="" selected="selected" >Select Designition </option>
																				  <?php foreach($designitionListInfo as $v){ ?>
																					  <option <?php if($designition_id == $v->id){ ?> selected="selected" <?php } ?> value="<?php echo $v->id ?>" ><?php echo $v->designition_name ?> </option>
																					<?php } ?>
																			    </select>					   		
																		</div>
																	</div>
																	
															  </div>
																 
															 <div class="col-md-6" style="padding-top:6px;">
																  <div class="form-group">
																	 <label class="control-label col-sm-5 " for="branch_id">Branch :</label>
																	  <div class="col-sm-7 paddingZero">
																		 <select class="form-control branchListView" name="branch_id" id="branch_id">
																			<option value="" selected="selected" >Select Branch </option>
																			  <?php foreach($empBranchList as $v){ ?>
																			  <option <?php if($branch_id == $v->id){ ?> selected="selected" <?php } ?> value="<?php echo $v->id ?>" ><?php echo $v->branch_name ?> </option>
																			<?php } ?>
																		 </select>														   		
																	 </div>
																 </div>
																 
																	
																	
																<div class="form-group">
																		  <label class="control-label col-sm-5 " for="salaryMonth">Salary Month :</label>
																		  <div class="col-sm-7 paddingZero">
																			 <input type="text" name="salaryMonth" id="salaryMonth" class="form-control date-picker"  placeholder="Salary Month" required="required" value="<?php echo $salaryMonth; ?>">
																		  </div>
																	</div>	
																	 
																	
																 </div>
																 
															 
															 
																 
															</div>	
														  <div class="col-md-1"></div>
																
														</div>
													</div>
																	
												  <div class="modal-footer">
													
													<button class="btn btn-sm btn-danger formCancel" type="button">
														<i class="ace-icon fa fa-times"></i>
														Cancel
													</button>
													<button class="btn btn-sm btn-primary" type="submit">
														<i class="ace-icon fa fa-check"></i>
														Show
													</button>
												</div>
											</div>
												</form>
										     </div>
											<?php 
											   if(!empty($empID)){
											   	if(!empty($empDetails)){

											  ?> 
											 <form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('salaryManageSystem/empBenifitAction'); ?>" enctype="multipart/form-data" method="post">	
											 <input type="hidden" name="empId" id="empId" value="<?php echo $empID ?>" />
											 <input type="hidden" name="monthYear" id="monthYear" value="<?php echo $monthYear ?>" />
											 <input type="hidden" name="edit_id" id="edit_id" />
											  
											  <div class="content img-thumbnail container" style="padding-top:15px;">
																  
															<div class="form-group">
															  <label class="control-label col-sm-1" for="employee_full_name">Name :</label>
															  <div class="col-sm-3">
															     <select class="form-control" name="benifit_name" id="benifit_name" required>
																	<option value="" selected="selected" >Select Benifit Name </option>
																	   <option value="exDuty">Extra Duty Payment </option>
																	   <option value="header">Headship/ Coordinatorship </option>
																	   <option value="arrear">Arrear </option>
																	   <option value="other">Other</option>
																   </select>		  
															  </div>
															  
															  <label class="control-label col-sm-1" for="benifit_amount">Amount :</label>
															  <div class="col-sm-3 text-left">
																<input required="required" type="number" class="form-control" name="benifit_amount" id="benifit_amount" placeholder="Enter Amount*" value=""/>
															  </div>
															  
															  <label class="control-label col-sm-1" for="description">Description:</label>
															  <div class="col-sm-3 text-left">
																<textarea name="description" id="description" class="form-control"  placeholder="Enter Description"></textarea>
															  </div>
															 
															</div>
																	
													  <div class="modal-footer">
														<div class="col-md-8">
														<div class="alert alert-block alert-success text-left afterSubmitContent" style="height: 35px; padding:5px 5px 5px 5px;">
														<button class="close" data-dismiss="alert" type="button">
														<i class="ace-icon fa fa-times"></i>
														</button>
														<strong class="green">
														<i class="ace-icon fa fa-check-square-o"></i>
														
														</strong>
														<span class="alrtText text-center">Benifit Added Successfully</span>
													   </div></div>
													
														<button class="btn btn-sm btn-danger formCancel" type="button">
															<i class="ace-icon fa fa-times"></i>
															Cancel
														</button>
														<button class="btn btn-sm btn-primary" type="submit">
															<i class="ace-icon fa fa-check"></i>
															<span class="update"> Submit </span>
														</button>
													</div>
											<div id="salaryListView">
												   <table class="table table-striped table-bordered table-hover text-left empListTable">
														<thead>
															<tr>
															  <th width="6%">SL</th>
																<th width="12%">ID</th>
																<th width="12%">Benefit Name </th>
																<th width="10%">Amount</th>
																<th width="10%">Benifit Month</th>
																<th width="20%">Description</th>
											
																<th width="12%">Action</th>
															</tr>
														</thead>
											
														<tbody>
														
														<?php
															$i = 1;
															 foreach($empAllBenifitDetails as $v) { 
															 if($v->benifit_name == 'exDuty'){
															  $benifit_name = "Extra Duty Payment";
															 }else if($v->benifit_name == 'header'){
															  $benifit_name = "Headship/ Coordinatorship";
															 }else if($v->benifit_name == 'arrear'){
															  $benifit_name = "Arrear";
															 }else{
															  $benifit_name = "Other";
															 }
														
														?>
															<tr>
															  <td class="center"><?php echo $i++; ?></td>
															  <td align="left"><?php echo $v->emp_id; ?></td>
															  <td align="left">
															     <?php echo $benifit_name; ?></td>
															  <td><?php echo $v->benifit_amount; ?></td>
															  <td><?php echo $v->month_year; ?></td>
															  <td><?php echo $v->description; ?></td>
																<td >
																   <div class="hidden-sm hidden-xs btn-group">
															<button class="btn btn-xs btn-info green" data-id="<?php echo $v->id ?>"  data-rel="tooltip" title="Edit" data-placement="bottom">
																<i class="ace-icon fa fa-pencil bigger-120"></i>															</button>

															<button class="btn btn-xs btn-danger red" data-emp-id="<?php echo $v->emp_id ?>" data-id="<?php echo $v->id ?>" data-rel="tooltip" title="Delete" data-placement="bottom" >
																<i class="ace-icon fa fa-trash-o bigger-120"></i>															</button>
															
														</div>
																</td>
															</tr>
														 <?php } ?>	
														 
														</tbody>
													</table>



												</div>
												</div> 
											</form>	
															
											<?php } } else { ?>
											    <div id="salaryListView">
											   <table class="table table-striped table-bordered table-hover text-left empListTable">
													<thead>
														<tr>
														  <th class="center">SL</th>
															<th width="12%">Employee  ID</th>
															<th>Name</th>
															<th class="hidden-480">Department</th>
										
															<th class="hidden-480">Designition</th>
															<th class="hidden-480">Picture</th>
															<th class="hidden-480">Joining Date</th>
															<th width="13%">Benifit Manage</th>
														</tr>
													</thead>
										
													<tbody>
													
													<?php
														$i = 1;
														 foreach($allEmpInfo as $v) { 
													
													?>
														<tr>
														  <td class="center"><?php echo $i++; ?></td>
															<td width="10%" align="left">
															<?php echo $v->employee_id; ?>
															<td class="hidden-480"><?php echo $v->employee_full_name; ?></td>
															<td class=""><?php echo $v->department_name; ?></td>
															<td class="hidden-480"><?php echo $v->designition_name; ?></td>
										
															<td class="hidden-480"><img src="<?php echo base_url("resource/emp_photo/$v->emp_photo") ?>" width="50" height="50" /></td>
															<td class="hidden-480"><?php echo $v->initiate_joining_date; ?></td>
															<td width="10%" align="center"> <span data-emp-id="<?php echo $v->employee_id; ?>"  style="padding:0 10px 1px 10px; cursor:pointer" class="btn-primary showForm"> Click To Manage</span>
								   <span style="padding:0 10px 1px 10px; cursor:pointer; display:none" class="btn-danger hideForm"> Hide</span></td>
														</tr>
													 <?php } ?>	
													</tbody>
												</table>



											</div>
											<?php } ?>
											
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
</div>
				
	  <?php $this->load->view('common/footer'); ?>
				
	</body>
</html>
		
<script type="text/javascript" >
$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd',
});


$('.add_new').on('click', function() {
	$('.add_new').fadeOut("slow");
	$('.addFormContent').fadeIn("slow");
});

$('.formCancel').on('click', function() {
	$('.addFormContent').fadeOut('slow');
	$('.add_new').fadeIn('slow');
});


$("#addForm").submit(function(e)
	{
	    var id       = $("#edit_id").val();
		var postData = $(this).serializeArray();
		var formURL  = $(this).attr("action");
		console.log(postData);
		$.ajax(
		{
			url : formURL,
			type: "POST",
			async: false,
			data : postData,
			success:function(data){
				$("#salaryListView").html(data);				
				$("#addForm").find("input[type=text],input[type=number],input[name=edit_id], textarea, select").val("");
				$('.afterSubmitContent').css('display', 'block'); 
				if(id) $('.alrtText').text("Benifit Update Successfully");
				$('.update').text("Submit");
				
			}
		});
		
		e.preventDefault();
	});





$(document).on("click", ".showForm", function(){
	  var parrents   	= $(this).parents('tr');
	  var empId      	= $(this).attr('data-emp-id');
	  var salaryMonth   = $('#salaryMonth').val();
	  
	  $('.hideForm').css({"display":"none","text-align":"center"});
	  $('.showForm').css({"display":"block","text-align":"center"});
	  $(this).css({"display":"none","text-align":"center"});
	  parrents.find('.hideForm').css({"display":"block","text-align":"center"});
	  var formURL    = "<?php echo site_url('salaryManageSystem/empWiseBenifitManageForm'); ?>";
	  
		$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {empId: empId, salaryMonth: salaryMonth},
				success:function(data){
					$('.empListTable .detailsShow').remove();
					$('<tr class="detailsShow"><td colspan="8">'+data+'</td></tr>').insertAfter(parrents);
				}
			});
	  
	 
	
	});


   $(document).on("click", ".green", function(e)
	{
		var id 		= $(this).attr("data-id");
		var formURL = "<?php echo site_url('salaryManageSystem/empBenifitEdit'); ?>";
		
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : {id: id},
			dataType: "json",
			success:function(data){
				$('#edit_id').val(data.id);
				$('#benifit_name').val(data.benifit_name);
				$('#benifit_amount').val(data.benifit_amount); 
				$('#description').val(data.description);
				$('.update').text("Update");
			}
		});
		
		e.preventDefault();
	});

   $(document).on("click", ".red", function(e){ 
   	    var id 		= $(this).attr("data-id");
   	    var emp_id 		= $(this).attr("data-emp-id");
   	    var formURL = "<?php echo site_url('salaryManageSystem/empBenifitDelete'); ?>";
			 $.ajax(
			 {
				url : formURL,
				async: false,
				type: "POST",
				data : {id: id, emp_id: emp_id},
				success:function(data){
				   $("#salaryListView").html(data);		
				   $('.afterSubmitContent').css('display', 'block'); 
				   $('.alrtText').text("Benifit Delete Successfully");
				}
			 });
			e.preventDefault();
	    });




$('.hideForm').on('click', function() {
	$('.empListTable .detailsShow').remove();
	$('.showForm').css('display','block');
	var parrents   = $(this).parents('tr');
	parrents.find('input[name="fromDate"]').val('');
	parrents.find('input[name="toDate"]').val('');
	$('.hideForm').css('display','none');
});






//Domain wise Designition 
		$("#domain_id").change(function() {
		var domain_id = $("#domain_id").val();			
		$.ajax({
			url : SAWEB.getSiteAction('employeeInfo/domainWiseDesignition'), // URL TO LOAD BEHIND THE SCREEN
			type : "POST",
			data : { domain_id : domain_id },
			dataType : "html",
			success : function(data) {			
				$(".designitionListView").html(data);
			}
		});
		
	});	
	
	//Domain wise Branch 
		$("#domain_id").change(function() {
		var domain_id = $("#domain_id").val();			
		$.ajax({
			url : SAWEB.getSiteAction('employeeInfo/domainWiseBranch'), // URL TO LOAD BEHIND THE SCREEN
			type : "POST",
			data : { domain_id : domain_id },
			dataType : "html",
			success : function(data) {			
				$(".branchListView").html(data);
			}
		});
		
	});	
	
	</script>