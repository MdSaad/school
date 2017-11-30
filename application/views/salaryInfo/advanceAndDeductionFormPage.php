
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
							<a href="<?php echo site_url('HR'); ?>">HR</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('salaryManageSystem'); ?>">Employee Salary</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp; <a href="<?php echo site_url('salaryManageSystem/advanceAndDeductions'); ?>">Advance & Deductions </a>&nbsp;&nbsp;
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
											<h3 class="widget-title"><strong>Employee Advance & Deductions Management</strong></h3>
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
												<form class="form-horizontal" id="attendenceReportForm" role="form" action="<?php echo site_url('salaryManageSystem/advanceAndDeductionForm'); ?>" enctype="multipart/form-data" method="post">	
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
																		  <label class="control-label col-sm-5 " for="salaryMonth">Month :</label>
																		  <div class="col-sm-7 paddingZero">
																			 <input type="text" name="advancedMonth" id="advancedMonth" class="form-control date-picker"  placeholder="Month" required="required" value="<?php echo $advancedMonth; ?>">
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
											
											  
											  <div class="content img-thumbnail container" style="padding-top:15px;">
													<div class="col-md-12">
													  <!-- Nav tabs -->
													   <ul class="nav nav-tabs" role="tablist">
													   <li role="presentation" class="active"><a href="#advanced" aria-controls="deduction" role="tab" data-toggle="tab">Add Deduction</a></li>
														<li style="margin-left:20px;">
														   <div class="alert alert-block alert-success text-left afterSubmitContent" style="height: 30px; padding:5px 5px 5px 5px; width: 304px">
														<button class="close" data-dismiss="alert" type="button">
														<i class="ace-icon fa fa-times"></i>
														</button>
														<strong class="green">
														<i class="ace-icon fa fa-check-square-o"></i>
														
														</strong>
														<span class="alrtText text-center"></span>
													   </div>
														</li>
													  </ul>
													
													  <!-- Tab panes -->
													  <div class="tab-content">
														  <div role="tabpanel" class="tab-pane active" id="deduction">
														     <form class="form-horizontal" id="deductionAddForm" role="form" action="<?php echo site_url('salaryManageSystem/empDeductionAction'); ?>" enctype="multipart/form-data" method="post">	
															    <input type="hidden" name="empId" id="empId" value="<?php echo $empID ?>" />
											 					<input type="hidden" name="monthYear" id="monthYear" value="<?php echo $monthYear ?>" />
															     <div class="form-group">
																     <label class="control-label col-sm-2" for="employee_full_name">Deduction Reason :</label>
																	  <div class="col-sm-4">
																	     <select class="form-control" name="deduction_reason" id="deduction_reason" required>
																			<option value="" selected="selected" >Select Deduction Reason </option>
																		   <option value="Absent">Absent </option>
																		   <option value="Tax">Tax </option>
																		   <option value="Revenue Stamps">Revenue Stamps </option>
																		   <option value="Loan/Advance">Loan/Advance </option>
																		   <option value="other">Other</option>
																		 </select>		  
																	  </div>
																	  
																	  
																	  <label class="control-label col-sm-2" for="deduction_amount">Deduction Amount :</label>
																	  <div class="col-sm-4">
																			<input required="required" type="text" class="form-control" name="deduction_amount" id="deduction_amount" placeholder="Enter Deduction Amount" value=""/>
																	  </div>
																	  
																	  
																	
																</div>  
																
																 <div class="form-group">
																      <label class="control-label col-sm-2" for="total_installment">Deduction Installment :</label>
																	  <div class="col-sm-4">
																			<input type="text" class="form-control" name="total_installment" id="total_installment" placeholder="Enter Deduction Installment" value=""/>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="payable_amount">Payable Amount :</label>
																	  <div class="col-sm-4">
																			<input  type="text" class="form-control" name="payable_amount" id="payable_amount" placeholder="Enter Monthly Payable Amount" value=""/>
																	  </div>
																	 
																	
																</div>
																
																 <div class="form-group">
																	  
																	  <label class="control-label col-sm-2" for="install_type">Install  Type :</label>
																	  <div class="col-sm-4">
																			<input type="text" class="form-control" name="install_type" id="install_type" placeholder="Enter Install  Type" value=""/>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="maritus_status">Deduction Start Date :</label>
																	  <div class="col-sm-4">
																			<input type="text" class="form-control date-picker" name="deduction_start_date" id="deduction_start_date" placeholder="Enter Deduction Start Date" value=""/>
																	  </div>
																	
																</div>
																
																 <div class="form-group">
																	  <label class="control-label col-sm-2" for="employee_full_name">Payable Month :</label>
																	  <div class="col-sm-4">
																			<input type="text" class="form-control date-picker" name="payable_month" id="payable_month" placeholder="Enter Payable Month" value=""/>
																	  </div>
																	
																</div>
																
																<div class="form-group text-center">
																	  <button class="btn btn-sm btn-primary" type="submit">
																		  Initiate Deduction
																	</button>
																</div>
																
																
															 <div id="deductionAmountView">	
																<table class="table table-striped table-bordered table-hover text-left empListTable">
																			<thead>
																				<tr>
																				  <th class="center">SL</th>
																					<th width="13%">Deduction Reason </th>
																					<th>Payable Amount </th>
																					<th class="hidden-480">Payable Month </th>
																					<th class="hidden-480">Installment Type </th>
																					<th class="hidden-480">Total Installment </th>
																					<th class="hidden-480">Start Month </th>
																					<th width="12%">Total Amount </th>
																				</tr>
																			</thead>
																
																			<tbody>
																			
																			<?php
																				$i = 1;
																				 foreach($empAllDeductionDetails as $v) { 
																			
																			?>
																				<tr>
																				  <td class="center"><?php echo $i++; ?></td>
																					<td width="10%" align="left">
																					<?php echo $v->deduction_reason; ?></td>
																					<td class="hidden-480"><?php echo $v->payable_amount; ?></td>
																					<td class="hidden-480"><?php echo $v->payable_month; ?></td>
																					<td class=""><?php echo $v->install_type; ?></td>
																					<td class="hidden-480"><?php echo $v->total_installment; ?></td>
																					<td class="hidden-480"><?php echo $v->deduction_start_date; ?></td>
																					<td width="10%" align="center"><?php echo $v->deduction_amount; ?> </td>
																				</tr>
																			 <?php } ?>	
																			</tbody>
																		</table>
															 </div>
																
																
																 
															 </form>
														  </div>
													  </div>
													
													</div>			  
															
															
																	
													  
													</div> 
											
															
											<?php } } else { ?>
											    <div id="advanceDeductionListView">
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
																					<th width="15%">Advance & Deduction Manage</th>
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

$('#total_installment, #deduction_amount').on('blur', function() {
	var totalInstal = parseInt($('#total_installment').val()); 
	var amount      = parseInt($('#deduction_amount').val()); 
	$('#payable_amount').val(parseInt(amount/totalInstal));
	$('#payable_amount').attr('readonly', 'readonly');
	
});



$("#advancedAddForm").submit(function(e)
	{
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
				$("#advancedListData").html(data);				
				$("#advancedAddForm").find("input[type=text],input[type=number],hidden, textarea").val("");
				$('.afterSubmitContent').css('display', 'block');
				$('.alrtText').text("Advanced Added Successfully"); 
			}
		});
		
		e.preventDefault();
	});
	
	
	$("#deductionAddForm").submit(function(e)
	{
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
				$("#deductionAmountView").html(data);				
				$("#deductionAddForm").find("input[type=text],input[type=number],hidden, textarea, select").val("");
				$('.afterSubmitContent').css('display', 'block'); 
				$('.alrtText').text("Deduction Added Successfully"); 
			}
		});
		
		e.preventDefault();
	});






$(document).on("click", ".showForm", function(){
	  var parrents   = $(this).parents('tr');
	  var empId  	 = $(this).attr('data-emp-id');
	  var monthYear  = $('#advancedMonth').val();
	  $('.hideForm').css({"display":"none","text-align":"center"});
	  $('.showForm').css({"display":"block","text-align":"center"});
	  $(this).css({"display":"none","text-align":"center"});
	  parrents.find('.hideForm').css({"display":"block","text-align":"center"});
	  var formURL    = "<?php echo site_url('salaryManageSystem/empWiseAdvanceDeductionManageForm'); ?>";
	  
		$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {empId: empId, monthYear: monthYear},
				success:function(data){
					$('.empListTable .detailsShow').remove();
					$('<tr class="detailsShow"><td colspan="8">'+data+'</td></tr>').insertAfter(parrents);
				}
			});
	  
	 
	
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