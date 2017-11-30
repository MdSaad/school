<table width="100%" border="0">
  <tr>
    <td> 
	    <div class="content img-thumbnail container" style="padding-top:15px; width:100%">
			<div class="col-md-12">
			  <!-- Nav tabs -->
			   <ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#deduction" aria-controls="deduction" role="tab" data-toggle="tab">Add Deduction</a></li>
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
	</td>
  </tr>
</table>

<script>
  $('.formCancel').on('click', function() {
  $('.empListTable .detailsShow').remove();
  $('.showForm').css('display','block');
  $('.hideForm').css('display','none');
});

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
				$("#deductionAddForm").find("input[type=text],input[type=number],hidden, textarea").val("");
				$('.afterSubmitContent').css('display', 'block'); 
				$('.alrtText').text("Deduction Added Successfully"); 
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
