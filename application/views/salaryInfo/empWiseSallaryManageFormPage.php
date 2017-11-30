<table width="100%" border="0">
  <tr>
    <td> 
	  <form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('salaryManageSystem/empWiseSalaryAllowanceAction') ?>" enctype="multipart/form-data" method="post">	
		<input type="hidden" name="salary_auto_id" id="salary_auto_id" value="<?php if(!empty($emppreSalary)){ echo $emppreSalary->id; } ?>">
		<input type="hidden" name="sallary_keep_keep" id="sallary_keep_keep">
		<input type="hidden" name="special_allowance_keep" id="special_allowance_keep">
		<input type="hidden" name="ta_keep" id="ta_keep">
		<input type="hidden" name="da_keep" id="da_keep">
		<input type="hidden" name="food_allowance_keep" id="food_allowance_keep">
		<input type="hidden" name="medical_allowance_keep" id="medical_allowance_keep">
		<input type="hidden" name="mobile_allowance_keep" id="mobile_allowance_keep">
		<input type="hidden" name="phone_allowance_keep" id="phone_allowance_keep">
		<input type="hidden" name="profident_fund_keep" id="profident_fund_keep">
		<input type="hidden" name="income_tax_keep" id="income_tax_keep">
		<input type="hidden" name="group_insurance_keep" id="group_insurance_keep">
		<input type="hidden" name="c_found_keep" id="c_found_keep">
		<input type="hidden" name="security_amount_keep" id="security_amount_keep">
		<input type="hidden" name="sallary_month" id="sallary_month" value="<?php echo $monthYear; ?>">
		<input type="hidden" name="employee_id" id="employee_id" value="<?php echo $empId; ?>">
	  
	  <div class="content img-thumbnail container" style="padding-top:15px; width:100%">
	       <div class="col-md-12 text-center" style="padding-bottom:15px;">
			  <h3>Salary Manage Update Form</h3>
		   </div>
	 
	 
			<div class="form-group">
			  <label class="control-label col-sm-2" for="sallary">Salary :</label>
			  <div class="col-sm-4">
					<input required="required" type="number" class="form-control" name="sallary" id="sallary" placeholder="Enter Salary*" value="<?php if(!empty($emppreSalary)){ echo $emppreSalary->sallary; } else if(!empty($empSalary)){ echo $empSalary->sallary; } ?>" />
			  </div>
			  
			  <label class="control-label col-sm-2" for="bonus_applicable">Bonus Applicable :</label>
			  <div class="col-sm-4 text-left">
				<select class="form-control" name="bonus_applicable" id="bonus_applicable">
					<option <?php if(!empty($emppreSalary)){ if($emppreSalary->bonus_applicable == 'Yes'){ echo "selected";} } ?> value="Yes">Yes </option>
					<option <?php if(!empty($emppreSalary)){ if($emppreSalary->bonus_applicable == 'No'){ echo "selected";} } ?> value="No">No </option>
					</select>
			  </div>
			  
			   
			  
			 
			</div>
			
			
			
			<div class="form-group">
			
			  <label class="control-label col-sm-2" for="father_name">Basic :</label>
			  <div class="col-sm-4">
				 <input  type="number" class="form-control" name="basic" id="basic" placeholder="Enter Basic" <?php if(!empty($emppreSalary)){ echo "readonly"; } ?>  value="<?php if(!empty($emppreSalary)){ echo $emppreSalary->basic; } else if(!empty($empSalary)){ echo $empSalary->basic; }  ?>"/>
			  </div>
			  
			  <label class="control-label col-sm-2" for="overtime_applicable">Overtime Applicable :</label>
				 <div class="col-sm-4 text-left">
				<select class="form-control" name="overtime_applicable" id="overtime_applicable">
					<option <?php if(!empty($emppreSalary)){ if($emppreSalary->overtime_applicable == 'Yes'){ echo "selected";} } ?> value="Yes">Yes </option>
					<option <?php if(!empty($emppreSalary)){ if($emppreSalary->overtime_applicable == 'No'){ echo "selected";} } ?> value="No">No </option>
					</select>
			  </div>
			  
			</div>
			
			<div class="form-group">
			   <label class="control-label col-sm-2" for="mother_name">House Rent :</label>
			  <div class="col-sm-4">
				 <input  type="number" class="form-control" name="house_rent" id="house_rent" placeholder="Enter House Rent" <?php if(!empty($emppreSalary)){ echo "readonly"; } ?> value="<?php if(!empty($emppreSalary)){ echo $emppreSalary->house_rent; } else if(!empty($empSalary)){ echo $empSalary->house_rent; } ?>"/>
			  </div>
			  
			   <label class="control-label col-sm-2">P/F :</label>
			   <div class="col-sm-4">
				 <input  type="number" class="form-control" name="profident_fund" id="profident_fund" placeholder="Enter P/F" value="<?php if(!empty($emppreSalary)){ echo $emppreSalary->profident_fund; }else if(!empty($empSalary)){ echo $empSalary->profident_fund; } ?>"/>
			  </div>
			  
			</div>
			
			
			<div class="form-group">
			  <label class="control-label col-sm-2">Special Allowance :</label>
			  <div class="col-sm-4">
				 <input  type="number" class="form-control" name="special_allowance" id="special_allowance" placeholder="Enter Special Allowance" value="<?php if(!empty($emppreSalary)){ echo $emppreSalary->special_allowance; }else if(!empty($empSalary)){ echo $empSalary->special_allowance; } ?>"/>
			  </div>
			  
			  <label class="control-label col-sm-2" for="income_tax">Income Tax :</label>
			  <div class="col-sm-4">
				 <input  type="number" class="form-control" name="income_tax" id="income_tax" placeholder="Enter Income Tax" value="<?php if(!empty($emppreSalary)){ echo $emppreSalary->income_tax; }else if(!empty($empSalary)){ echo $empSalary->income_tax; } ?>"/>
			  </div>
			  
			</div>
			
			<div class="form-group">
			   <label class="control-label col-sm-2">TA :</label>
			   <div class="col-sm-4">
				 <input  type="number" class="form-control" name="ta" id="ta" placeholder="Enter TA" value="<?php if(!empty($emppreSalary)){ echo $emppreSalary->ta; }else if(!empty($empSalary)){ echo $empSalary->ta; } ?>"/>
			  </div>
			   
			  <label class="control-label col-sm-2" for="group_insurance">Group Insurance:</label>
			  <div class="col-sm-4">
				 <input  type="number" class="form-control" name="group_insurance" id="group_insurance" placeholder="Enter Group Insurance" value="<?php if(!empty($emppreSalary)){ echo $emppreSalary->group_insurance; }else if(!empty($empSalary)){ echo $empSalary->group_insurance; } ?>"/>
			  </div>
			  
			</div>
			
			
			<div class="form-group">
			   <label class="control-label col-sm-2">DA :</label>
			  <div class="col-sm-4">
				 <input  type="number" class="form-control" name="da" id="da" placeholder="Enter DA" value="<?php if(!empty($emppreSalary)){ echo $emppreSalary->da; }else if(!empty($empSalary)){ echo $empSalary->da; } ?>"/>
			  </div>
			  
			   
			  <label class="control-label col-sm-2" for="c_found">C/Fund :</label>
			  <div class="col-sm-4">
				<input type="number" class="form-control" name="c_found" id="c_found" placeholder="Enter C/Fund" value="<?php if(!empty($emppreSalary)){ echo $emppreSalary->c_found; }else if(!empty($empSalary)){ echo $empSalary->c_found; } ?>"/>
			  </div>  
			 
			  
			</div>
			
			<div class="form-group">
			   <label class="control-label col-sm-2">Food Allowance :</label>
				<div class="col-sm-4">
				<input type="number" class="form-control" name="food_allowance" id="food_allowance" placeholder="Enter Food Allowance" value="<?php if(!empty($emppreSalary)){ echo $emppreSalary->food_allowance; }else if(!empty($empSalary)){ echo $empSalary->food_allowance; } ?>"/>
			  </div>  
			  
			  <label class="control-label col-sm-2" for="cash_bank"> Cash/Bank :</label>
			  <div class="col-sm-4">
				 <select class="form-control" name="cash_bank" id="cash_bank">
					<option value="" selected="selected">Select Cash/Bank </option>
					<option <?php if(!empty($emppreSalary)){ if($emppreSalary->cash_bank == 'Cash'){ echo "selected";} } ?> value="Cash">Cash </option>
					<option <?php if(!empty($emppreSalary)){ if($emppreSalary->cash_bank == 'Bank'){ echo "selected";} } ?> value="Bank">Bank </option>
				</select>
					
			  </div>
			  
			  
				
			</div>
			
			<div class="form-group">
			
			   <label class="control-label col-sm-2" for="date_of_birth">Mobile Allowance :</label>
			  <div class="col-sm-4">
					<input id="mobile_allowance" name="mobile_allowance" class="form-control" type="number"  placeholder="Enter Mobile Allowance" value="<?php if(!empty($emppreSalary)){ echo $emppreSalary->mobile_allowance; }else if(!empty($empSalary)){ echo $empSalary->mobile_allowance; } ?>">
			  </div>
			  
			  
			  <label class="control-label col-sm-2" for="increment_date">Increment Date  :</label>
			  <div class="col-sm-4">
				<div class="input-group">
					<input id="increment_date" name="increment_date" class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" placeholder="Enter Increment Date" value="<?php if(!empty($emppreSalary)){ echo $emppreSalary->increment_date; }else if(!empty($empSalary)){ echo $empSalary->increment_date; } ?>" >
					
					
					<span class="input-group-addon">
						<i class="fa fa-calendar bigger-110"></i>
					</span>
				</div>
			  </div>
			  
			 
			</div>
			
			
			<div class="form-group">
			
			  <label class="control-label col-sm-2" for="medical_allowance"> Medical Allowance :</label>
			   <div class="col-sm-4">
					<input id="medical_allowance" name="medical_allowance" class="form-control" type="number"  placeholder="Enter Medical Allowance" value="<?php if(!empty($emppreSalary)){ echo $emppreSalary->medical_allowance; }else if(!empty($empSalary)){ echo $empSalary->medical_allowance; } ?>">
			  </div>
			  
			  
			  <label class="control-label col-sm-2" for="security_amount">Security Amount :</label>
			   <div class="col-sm-4">
					<input id="security_amount" name="security_amount" class="form-control" type="number"  placeholder="Enter Security Amount" value="<?php if(!empty($emppreSalary)){ echo $emppreSalary->security_amount; }else if(!empty($empSalary)){ echo $empSalary->security_amount; } ?>">
			  </div>
			
			</div>
			
			
			<div class="form-group">
			
				<label class="control-label col-sm-2" for="phone_allowance">Phone  Allowance:</label>
			  
			  <div class="col-sm-4">
					<input type="number" class="form-control" name="phone_allowance" id="phone_allowance" placeholder="Enter Phone Allowance" value="<?php if(!empty($emppreSalary)){ echo $emppreSalary->phone_allowance; }else if(!empty($empSalary)){ echo $empSalary->phone_allowance; } ?>"/>
				</div>
				
				
				
			 <label class="control-label col-sm-2" for="total_salary">Total Salary :</label>
			  <div class="col-sm-4">
					<input id="total_salary" name="total_salary" class="form-control" type="number" placeholder="Total Salary" value="<?php if(!empty($emppreSalary)){ echo $emppreSalary->total_salary; }else if(!empty($empSalary)){ echo $empSalary->total_salary; } ?>" readonly="readonly" >
			  </div>
			  
			</div>
							
		  <div class="modal-footer">
			
			<button class="btn btn-sm btn-danger formCancel" type="button">
				<i class="ace-icon fa fa-times"></i>
				Cancel
			</button>
			<button class="btn btn-sm btn-primary" type="submit">
				<i class="ace-icon fa fa-check"></i>
				<?php if(!empty($emppreSalary)){ ?>
				  <span class="update"> Update </span>
				<?php }else{ ?>
				   <span class="update"> Submit </span>
				<?php } ?>
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
		<span class="alrtText">Salary & Allowance Information Added Successfully</span>
	</div>
	</td>
  </tr>
</table>

<script>
  $('.formCancel').on('click', function() {
  $('.empListTable .editDetailsShow').remove();
  $('.showSalForm').css('display','block');
  $('.hideSalForm').css('display','none');
});


$(document).on("click", ".close", function(){
  $('.empListTable .editDetailsShow').remove();
 });
 

	$("#addForm").submit(function(e)
	{
		var postData = $(this).serializeArray();
		console.log(postData);
		var formURL = $(this).attr("action");
		var parents = $(this).parents('tr');  
		
		$.ajax(
		{
			url : formURL,
			type: "POST",
			async: false,
			data : postData,
			success:function(data){
				$('#addForm').css('display', 'none');
				$('.showSalForm').css('display','block');
  				$('.hideSalForm').css('display','none');
				parents.find('.afterSubmitContent').css('display', 'block');
				$("#addForm input[type='text'], #addForm input[type='hidden'], #addForm input[type='number'], #addForm textarea").val("");
				
			}
		  });
		 
		e.preventDefault();
	});
	






$('#sallary').on('blur', function() {
	var sallaryValu 	= parseInt($('#sallary').val());
	var basicPersentage = parseInt('60');
	var housePersentage = parseInt('40');
	//var basic       	= 40/100 * sallaryValu
	parseInt($('#basic').val(basicPersentage/100 * sallaryValu));
	parseInt($('#house_rent').val(housePersentage/100 * sallaryValu));
	$('#basic').attr('readonly', 'readonly');
	$('#house_rent').attr('readonly', 'readonly');
	
	
	
});

$('#sallary, #special_allowance, #ta, #da, #food_allowance, #medical_allowance, #mobile_allowance, #phone_allowance, #profident_fund, #c_found, #income_tax, #group_insurance, #security_amount').on('blur', function() {
	var currentItemValue 		= parseInt($(this).val());
	var totalSalary      		= parseInt($('#total_salary').val());
	var TotalSalaryDecrement 	= parseInt(totalSalary - currentItemValue);
	$('#total_salary').val(parseInt(TotalSalaryDecrement));

});

$('#sallary, #special_allowance, #ta, #da, #food_allowance, #medical_allowance, #mobile_allowance, #phone_allowance, #profident_fund, #c_found, #income_tax, #group_insurance, #security_amount').on('blur', function() {
	var sallary 		= parseInt($('#sallary').val());
	var specialAl 		= parseInt($('#special_allowance').val());
	var ta 				= parseInt($('#ta').val());
	var da 				= parseInt($('#da').val());
	var foodAl 			= parseInt($('#food_allowance').val());
	var medicalAl 		= parseInt($('#medical_allowance').val());
	var mobileAl 		= parseInt($('#mobile_allowance').val());
	var phoneAl 		= parseInt($('#phone_allowance').val());
	var pfAl 			= parseInt($('#profident_fund').val());
	var incomeAl 		= parseInt($('#income_tax').val());
	var groupAl 		= parseInt($('#group_insurance').val());
	var cFound 			= parseInt($('#c_found').val());
	var securityAmn 	= parseInt($('#security_amount').val());

    $('#sallary_keep').val(sallary);
	$('#special_allowance_keep').val(specialAl); 	$('#phone_allowance_keep').val(phoneAl); 
    $('#ta_keep').val(ta); 							$('#profident_fund_keep').val(pfAl); 
    $('#da_keep').val(da); 							$('#income_tax_keep').val(incomeAl); 
    $('#food_allowance_keep').val(foodAl); 			$('#group_insurance_keep').val(groupAl); 
    $('#medical_allowance_keep').val(medicalAl); 	$('#c_found_keep').val(cFound); 
    $('#mobile_allowance_keep').val(mobileAl);      $('#security_amount_keep').val(securityAmn); 
    
    var TotalSallaryAmout = 0;
    if(sallary || specialAl || ta || da || foodAl || medicalAl || mobileAl || phoneAl || pfAl || incomeAl || groupAl || cFound || securityAmn){
    	if(sallary) 	TotalSallaryAmout = parseInt(TotalSallaryAmout + sallary);
    	if(specialAl) 	TotalSallaryAmout = parseInt(TotalSallaryAmout + specialAl);
    	if(ta) 			TotalSallaryAmout = parseInt(TotalSallaryAmout + ta);
    	if(da) 			TotalSallaryAmout = parseInt(TotalSallaryAmout + da);
    	if(foodAl) 		TotalSallaryAmout = parseInt(TotalSallaryAmout + foodAl);
    	if(medicalAl) 	TotalSallaryAmout = parseInt(TotalSallaryAmout + medicalAl);
    	if(mobileAl) 	TotalSallaryAmout = parseInt(TotalSallaryAmout + mobileAl);
    	if(phoneAl) 	TotalSallaryAmout = parseInt(TotalSallaryAmout + phoneAl);
    	if(pfAl) 		TotalSallaryAmout = parseInt(TotalSallaryAmout + pfAl);
    	if(incomeAl) 	TotalSallaryAmout = parseInt(TotalSallaryAmout + incomeAl);
    	if(groupAl) 	TotalSallaryAmout = parseInt(TotalSallaryAmout + groupAl);
    	if(cFound) 		TotalSallaryAmout = parseInt(TotalSallaryAmout + cFound);
    	if(securityAmn) TotalSallaryAmout = parseInt(TotalSallaryAmout + securityAmn);
    	 parseInt($('#total_salary').val(TotalSallaryAmout));
    }

   
	
	$('#total_salary').attr('readonly', 'readonly');
	
	
	
	
});




</script>
