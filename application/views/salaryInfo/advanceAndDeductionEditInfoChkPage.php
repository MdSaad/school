
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
							<a href="<?php echo site_url('HR'); ?>">HR</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('salaryManageSystem/salaryAdvaceDeductionEdit'); ?>"> Salary/Advance/Deductions Edit </a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('salaryManageSystem/salaryAndAllowanceEdit'); ?>">Advance & Deductions Edit</a>&nbsp;&nbsp;
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
											<h4 class="widget-title">Advance & Deductions Edit </h4>
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
											<form class="form-horizontal"  role="form" action="<?php echo site_url('salaryManageSystem/advanceAndDeductionEditInfoChk'); ?>" enctype="multipart/form-data" method="post">
												<div class="scroll-content">
											<div class="content img-thumbnail container">
													<div class="form-group" style="padding-top:10px;">
														<label class="control-label col-sm-2"><strong>Employee ID  :</strong></label>
												 	    <div class="col-sm-3">
															<input name="empID" id="empID" class="form-control" type="text" placeholder="Enter Employee ID" required="required" value="<?php echo $empID ?>"> 
															<?php 
															 if(!empty($empID)){
															 if(empty($empDetails->employee_id)){

															?>
														    <span style="color:#FF0000; padding-top:2px;">Sorry This Id is not exit</span>
														    <?php } } ?>
														  
														</div>

														<label class="control-label col-sm-2"><strong>Benifit Month  :</strong></label>			
														<div class="col-sm-3 text-left">
															<input name="month" id="month" class="form-control date-picker" type="text" placeholder="Enter Salary Month" required="required" value="<?php echo $month ?>">
														</div>
														<div class="col-sm-2 text-left">
															<button class="btn btn-sm btn-primary " type="submit">
																Submit
																</button>
														</div>																			  
													</div>
																		
												</div>
												</form>
												<?php if(!empty($empDetails->employee_id)){ ?>

											    <div class="content img-thumbnail container" style="padding-top:15px;">
													<div class="col-md-12">
													  <!-- Nav tabs -->
													   <ul class="nav nav-tabs" role="tablist">
														<li role="presentation" class="active"><a href="#deduction" aria-controls="deduction" role="tab" data-toggle="tab">Edit Deduction</a></li>
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
														     <form class="form-horizontal" id="deductionAddForm" role="form" action="<?php echo site_url('salaryManageSystem/empDeductionUpdateAction'); ?>" enctype="multipart/form-data" method="post">	
															    <input type="hidden" name="empId" id="empId" value="<?php echo $empID ?>" />
											 					<input type="hidden" name="monthYear" id="monthYear" value="<?php echo $monthYear ?>" />
																<input type="hidden" name="deduc_update_id" id="deduc_update_id" value="<?php if(!empty($empDeduction)) echo $empDeduction->id ?>" />
															     <div class="form-group">
																     <label class="control-label col-sm-2" for="employee_full_name">Deduction Reason :</label>
																	  <div class="col-sm-4">
																	       <select class="form-control" name="deduction_reason" id="deduction_reason" required>
																			<option value="" selected="selected" >Select Deduction Reason </option>
																		   <option <?php if(!empty($empDeduction)){ if($empDeduction->deduction_reason == 'Absent') echo "selected"; } ?> value="Absent">Absent </option>
																		   <option <?php if(!empty($empDeduction)){ if($empDeduction->deduction_reason == 'Tax') echo "selected"; } ?>  value="Tax">Tax </option>
																		   <option <?php if(!empty($empDeduction)){ if($empDeduction->deduction_reason == 'Revenue Stamps') echo "selected"; } ?>  value="Revenue Stamps">Revenue Stamps </option>
																		   <option <?php if(!empty($empDeduction)){ if($empDeduction->deduction_reason == 'Loan/Advance') echo "selected"; } ?>  value="Loan/Advance">Loan/Advance </option>
																		   <option <?php if(!empty($empDeduction)){ if($empDeduction->deduction_reason == 'other') echo "selected"; } ?>  value="other">Other</option>
																		 </select>		  
																			
																	  </div>
																	  <label class="control-label col-sm-2" for="deduction_amount">Deduction Amount :</label>
																	  <div class="col-sm-4">
																			<input required="required" type="text" class="form-control" name="deduction_amount" id="deduction_amount" placeholder="Enter Deduction Amount" value="<?php if(!empty($empDeduction)) echo $empDeduction->deduction_amount ?>"/>
																	  </div>
																	  
																	
																</div>  
																
																 <div class="form-group">
																     <label class="control-label col-sm-2" for="total_installment">Deduction Installment :</label>
																	  <div class="col-sm-4">
																			<input type="text" class="form-control" name="total_installment" id="total_installment" placeholder="Enter Deduction Installment" value="<?php if(!empty($empDeduction)) echo $empDeduction->total_installment ?>"/>
																	  </div>
																	  <label class="control-label col-sm-2" for="payable_amount">Payable Amount :</label>
																	  <div class="col-sm-4">
																			<input  type="text" class="form-control" name="payable_amount" id="payable_amount" placeholder="Enter Monthly Payable Amount" value="<?php if(!empty($empDeduction)) echo $empDeduction->payable_amount ?>"/>
																	  </div>
																	  
																	 
																	
																</div>
																
																 <div class="form-group">
																	  <label class="control-label col-sm-2" for="install_type">Install  Type :</label>
																	  <div class="col-sm-4">
																			<input type="text" class="form-control" name="install_type" id="install_type" placeholder="Enter Install  Type" value="<?php if(!empty($empDeduction)) echo $empDeduction->install_type ?>"/>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="maritus_status">Deduction Start Date :</label>
																	  <div class="col-sm-4">
																			<input type="text" class="form-control date-picker" name="deduction_start_date" id="deduction_start_date" placeholder="Enter Deduction Start Date" value="<?php if(!empty($empDeduction)) echo $empDeduction->deduction_start_date ?>"/>
																	  </div>
																	
																</div>
																
																 <div class="form-group">
																	  <label class="control-label col-sm-2" for="employee_full_name">Payable Month :</label>
																	  <div class="col-sm-4">
																			<input type="text" class="form-control date-picker" name="payable_month" id="payable_month" placeholder="Enter Payable Month" value="<?php if(!empty($empDeduction)) echo $empDeduction->payable_month ?>"/>
																	  </div>
																	
																</div>
																
																<div class="form-group text-center">
																	  <button class="btn btn-sm btn-primary" type="submit">
																		  Update Deduction
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
																					<th width="12%">Action </th>
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
																					<td >
																					<div class="hidden-sm hidden-xs btn-group">
																					<button class="btn btn-xs btn-info degreen" data-id="<?php echo $v->id ?>"  data-rel="tooltip" title="Edit" data-placement="bottom">
																						<i class="ace-icon fa fa-pencil bigger-120"></i>															</button>
						
																					<button class="btn btn-xs btn-danger dered" data-emp-id="<?php echo $v->emp_id ?>" data-id="<?php echo $v->id ?>" data-rel="tooltip" title="Delete" data-placement="bottom" >
																						<i class="ace-icon fa fa-trash-o bigger-120"></i>															</button>
																					
																				</div>
																						</td>
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
												
											
										<?php } ?>
											<!--form start-->
														  
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
				$("#advancedAddForm").find("input[type=text],input[type=number],input[name=advan_update_id], textarea").val("");
				$('.afterSubmitContent').css('display', 'block');
				$('.alrtText').text("Advanced Update Successfully");
				
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
				$("#deductionAddForm").find("input[type=text],input[type=number],input[name=deduc_update_id], textarea, select").val("");
				$('.afterSubmitContent').css('display', 'block'); 
				$('.alrtText').text("Deduction Update Successfully");
				
			}
		});
		
		e.preventDefault();
	});


	
	 $(document).on("click", ".adgreen", function(e)
	{
		var id 		= $(this).attr("data-id");
		var formURL = "<?php echo site_url('salaryManageSystem/empAdvancedEdit'); ?>";
		
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : {id: id},
			dataType: "json",
			success:function(data){
				$('#advan_update_id').val(data.id);
				$('#advancedAddForm #advanced_amount').val(data.advanced_amount);
				$('#advancedAddForm #total_installment').val(data.total_installment); 
				$('#advancedAddForm #payable_amount').val(data.payable_amount);
				$('#advancedAddForm #install_type').val(data.install_type);
				$('#advancedAddForm #advanced_reason').val(data.advanced_reason); 
				$('#advancedAddForm #advanced_start_date').val(data.advanced_start_date);
				$('#advancedAddForm #payable_month').val(data.payable_month);
				
			}
		});
		
		e.preventDefault();
	});

   $(document).on("click", ".adred", function(e){ 
   	    var id 		= $(this).attr("data-id");
   	    var emp_id 	= $(this).attr("data-emp-id");
   	    var formURL = "<?php echo site_url('salaryManageSystem/empAdvanceDelete'); ?>";
			 $.ajax(
			 {
				url : formURL,
				async: false,
				type: "POST",
				data : {id: id, emp_id: emp_id},
				success:function(data){
				   $("#advancedListData").html(data);		
				   $('.afterSubmitContent').css('display', 'block'); 
				   $('.alrtText').text("Advanced Delete Successfully");
				}
			 });
			e.preventDefault();
	    });
		
	$(document).on("click", ".degreen", function(e)
	{
		var id 		= $(this).attr("data-id");
		var formURL = "<?php echo site_url('salaryManageSystem/empDeductionEdit'); ?>";
		
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : {id: id},
			dataType: "json",
			success:function(data){
				$('#deduc_update_id').val(data.id);
				$('#deductionAddForm #deduction_amount').val(data.deduction_amount);
				$('#deductionAddForm #total_installment').val(data.total_installment); 
				$('#deductionAddForm #payable_amount').val(data.payable_amount);
				$('#deductionAddForm #install_type').val(data.install_type);
				$('#deductionAddForm #deduction_reason').val(data.deduction_reason); 
				$('#deductionAddForm #deduction_start_date').val(data.deduction_start_date);
				$('#deductionAddForm #payable_month').val(data.payable_month);
				
			}
		});
		
		e.preventDefault();
	});

   $(document).on("click", ".dered", function(e){ 
   	    var id 		= $(this).attr("data-id");
   	    var emp_id 	= $(this).attr("data-emp-id");
   	    var formURL = "<?php echo site_url('salaryManageSystem/empDeductionDelete'); ?>";
			 $.ajax(
			 {
				url : formURL,
				async: false,
				type: "POST",
				data : {id: id, emp_id: emp_id},
				success:function(data){
				   $("#deductionAmountView").html(data);		
				   $('.afterSubmitContent').css('display', 'block'); 
				   $('.alrtText').text("Deduction Delete Successfully");
				}
			 });
			e.preventDefault();
	    });
		
		$('#total_installment, #deduction_amount').on('blur', function() {
			var totalInstal = parseInt($('#total_installment').val()); 
			var amount      = parseInt($('#deduction_amount').val()); 
			$('#payable_amount').val(parseInt(amount/totalInstal));
			$('#payable_amount').attr('readonly', 'readonly');
			
		});




	

</script>

	