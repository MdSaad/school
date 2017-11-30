
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<title><?php echo $title; ?></title>
		<style>
		  .fromNone {
			display:none;
		  }
		  .sallrryManage {
		     background-color:#FDF3FF;
		  }
		</style>
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
							<a href="<?php echo site_url('HR'); ?>">HR</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('salaryManageSystem'); ?>">Employee Salary</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp; <a href="<?php echo site_url('salaryManageSystem/salaryAndAllowance'); ?>">Employee Salary & Allowance Information</a>&nbsp;&nbsp;
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
											<h3 class="widget-title"><strong>Employee Salary & Allowance Information Management</strong></h3>
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
												<form class="form-horizontal" id="attendenceReportForm" role="form" action="<?php echo site_url('salaryManageSystem/empSalaryForm'); ?>" enctype="multipart/form-data" method="post">	
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
																		  <label class="control-label col-sm-5 " for="salaryMonth">Salary Month* :</label>
																		  <div class="col-sm-7 paddingZero">
																			 <input type="text" name="salaryMonth" id="salaryMonth" class="form-control date-picker"  placeholder="Salary Month*" required="required" value="<?php echo $salaryMonth; ?>">
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
												if(!empty($empDetails->employee_id)){ 
											?> 
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
											    <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $empID; ?>">
											  
											  <div class="content img-thumbnail container" style="padding-top:15px;">
											  <div class="col-md-12 text-center" style="padding-bottom:15px;">
											    <?php if($emppreSalary){ ?>
												     <h3>Salary Manage Update Form</h3>
												  <?php }else{ ?> 
												     <h3>Salary Manage Form</h3>
												  <?php } ?>
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
														 <input  type="number" class="form-control" name="basic" id="basic" placeholder="Enter Basic" <?php if(!empty($emppreSalary) || !empty($empSalary)){ echo "readonly"; } ?>  value="<?php if(!empty($emppreSalary)){ echo $emppreSalary->basic; } else if(!empty($empSalary)){ echo $empSalary->basic; }  ?>"/>
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
														 <input  type="number" class="form-control" name="house_rent" id="house_rent" placeholder="Enter House Rent" <?php if(!empty($emppreSalary) || !empty($empSalary)){ echo "readonly"; } ?> value="<?php if(!empty($emppreSalary)){ echo $emppreSalary->house_rent; } else if(!empty($empSalary)){ echo $empSalary->house_rent; } ?>"/>
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
															<input id="total_salary" name="total_salary" class="form-control" type="number" placeholder="Total Salary" <?php if(!empty($emppreSalary) || !empty($empSalary)){ echo "readonly"; } ?> value="<?php if(!empty($emppreSalary)){ echo $emppreSalary->total_salary; }else if(!empty($empSalary)){ echo $empSalary->total_salary; } ?>" >
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
												<?php if(!empty($emppreSalary)){ ?>
												<span class="alrtText">Salary & Allowance Information Update Successfully. Update Again Click <strong class="btn-danger tryAgain">Here</strong></span>
												<?php }else{ ?>
												  <span class="alrtText">Salary & Allowance Information Added Successfully. Add Again Click <strong class="btn-danger tryAgain">Here</strong></span>
												<?php } ?>
											</div>
											
											<?php } } else { ?>
											    <div id="salaryListView">
												   <table class="table table-bordered text-left empListTable">
														<thead>
															<tr>
															  <th class="center">SL</th>
																<th width="12%">Employee  ID</th>
																<th>Name</th>
																<th class="hidden-480">Department</th>
											
																<th class="hidden-480">Designition</th>
																<th class="hidden-480">Picture</th>
																<th width="10%">Joining Date</th>
																<th width="13%">Sallary Manage</th>
															</tr>
														</thead>
											
														 
														
														<?php
															$i = 1;
															 foreach($allEmpInfo as $v) { 
															// print_r($v->empPreSlaryDetails);
														    if(!empty($v->salaryDetails)){
														?>
														  <tbody>
															<tr class="sallrryManage">
															  <td class="center"><?php echo $i++; ?></td>
																<td width="10%" align="left">
																<?php echo $v->employee_id; ?>
																<td class="hidden-480"><?php echo $v->employee_full_name; ?></td>
																<td class=""><?php echo $v->department_name; ?></td>
																<td class="hidden-480"><?php echo $v->designition_name; ?></td>
											
																<td class="hidden-480"><img src="<?php echo base_url("resource/emp_photo/$v->emp_photo") ?>" width="50" height="50" /></td>
																<td class="hidden-480"><?php echo $v->initiate_joining_date; ?></td>
																<td width="10%" align="center"> <span data-emp-id="<?php echo $v->employee_id; ?>"  style="padding:0 10px 1px 10px; cursor:pointer" class="btn-success showSalForm"> Click To Update</span>
									   <span style="padding:0 10px 1px 10px; cursor:pointer; display:none" class="btn-danger hideSalForm"> Hide</span></td>
															</tr>
															</tbody>
															
															<?php }else{ ?>
															  <tbody class="separeate">
															<tr class="salaryCom">
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
															<tr class="detailsShow fromNone">
															 <td colspan="8">
																  <table width="100%" border="0">
																	 <tr>
																	<td> 
																	  <form class="form-horizontal" id="empAddForm" role="form" action="<?php echo site_url('salaryManageSystem/empWiseSalaryAllowanceAction') ?>" enctype="multipart/form-data" method="post">	
																		<input type="hidden" name="salary_keep_2" id="salary_keep_2">
																		<input type="hidden" name="special_allowance_keep_2" id="special_allowance_keep_2">
																		<input type="hidden" name="ta_keep_2" id="ta_keep_2">
																		<input type="hidden" name="da_keep_2" id="da_keep_2">
																		<input type="hidden" name="food_allowance_keep_2" id="food_allowance_keep_2">
																		<input type="hidden" name="medical_allowance_keep_2" id="medical_allowance_keep_2">
																		<input type="hidden" name="mobile_allowance_keep_2" id="mobile_allowance_keep_2">
																		<input type="hidden" name="phone_allowance_keep_2" id="phone_allowance_keep_2">
																		<input type="hidden" name="profident_fund_keep_2" id="profident_fund_keep_2">
																		<input type="hidden" name="income_tax_keep_2" id="income_tax_keep_2">
																		<input type="hidden" name="group_insurance_keep_2" id="group_insurance_keep_2">
																		<input type="hidden" name="c_found_keep_2" id="c_found_keep_2">
																		<input type="hidden" name="security_amount_keep_2" id="security_amount_keep_2">
																		<input type="hidden" name="sallary_month" id="sallary_month_2" value="<?php echo $monthYear; ?>">
																		<input type="hidden" name="employee_id" id="employee_id_2" value="<?php echo $v->employee_id; ?>">
																	  
																	  <div class="content img-thumbnail container" style="padding-top:15px; width:100%">
																	  <div class="col-md-12 text-center" style="padding-bottom:15px;">
																		 <h3>Salary Manage Form</h3>
																	 </div>
																		<div class="form-group">
																		  <label class="control-label col-sm-2" for="sallary">Salary :</label>
																		  <div class="col-sm-4">
																				<input required="required" type="number" class="form-control" name="sallary" id="sallary2" placeholder="Enter Salary*" value="<?php if(!empty($v->empPreSlaryDetails)){ echo $v->empPreSlaryDetails->sallary; } ?>"/>
																		  </div>
																		  
																		  <label class="control-label col-sm-2" for="bonus_applicable">Bonus Applicable :</label>
																		  <div class="col-sm-4 text-left">
																			<select class="form-control" name="bonus_applicable" id="bonus_applicable2">
																				<option <?php if(!empty($v->empPreSlaryDetails)){ if($v->empPreSlaryDetails->bonus_applicable == 'Yes'){ echo "selected";} } ?> value="Yes">Yes </option>
																				<option <?php if(!empty($v->empPreSlaryDetails)){ if($v->empPreSlaryDetails->bonus_applicable == 'No'){ echo "selected";} } ?> value="No">No </option>
																				</select>
																		  </div>
																		  
																		   
																		  
																		 
																		</div>
																		
																		
																		
																		<div class="form-group">
																		  <label class="control-label col-sm-2" for="father_name">Basic :</label>
																		  <div class="col-sm-4">
																			 <input  type="number" class="form-control" name="basic" id="basic2" placeholder="Enter Basic" <?php if(!empty($v->empPreSlaryDetails)){ echo "readonly"; } ?> value="<?php if(!empty($v->empPreSlaryDetails)){ echo $v->empPreSlaryDetails->basic; } ?>"/>
																		  </div>
																		  
																		  <label class="control-label col-sm-2" for="overtime_applicable">Overtime Applicable :</label>
																			 <div class="col-sm-4 text-left">
																			<select class="form-control" name="overtime_applicable" id="overtime_applicable2">
																				<option <?php if(!empty($v->empPreSlaryDetails)){ if($v->empPreSlaryDetails->overtime_applicable == 'Yes'){ echo "selected";} } ?> value="Yes">Yes </option>
																				<option <?php if(!empty($v->empPreSlaryDetails)){ if($v->empPreSlaryDetails->overtime_applicable == 'No'){ echo "selected";} } ?> value="No">No </option>
																				</select>
																		  </div>
																		</div>
																		
																		
																		
																		<div class="form-group">
																		   <label class="control-label col-sm-2" for="mother_name">House Rent :</label>
																		  <div class="col-sm-4">
																			 <input  type="number" class="form-control" name="house_rent" id="house_rent2" placeholder="Enter House Rent" <?php if(!empty($v->empPreSlaryDetails)){ echo "readonly"; } ?> value="<?php if(!empty($v->empPreSlaryDetails)){ echo $v->empPreSlaryDetails->house_rent; } ?>"/>
																		  </div>
																		  
																		   <label class="control-label col-sm-2">P/F :</label>
																		   <div class="col-sm-4">
																			 <input  type="number" class="form-control" name="profident_fund" id="profident_fund2" placeholder="Enter P/F" value="<?php if(!empty($v->empPreSlaryDetails)){ echo $v->empPreSlaryDetails->profident_fund; } ?>"/>
																		  </div>
																		  
																		</div>
																		
																		
																		<div class="form-group">
																		  <label class="control-label col-sm-2">Special Allowance :</label>
																		  <div class="col-sm-4">
																			 <input  type="number" class="form-control" name="special_allowance" id="special_allowance2" placeholder="Enter Special Allowance" value="<?php if(!empty($v->empPreSlaryDetails)){ echo $v->empPreSlaryDetails->special_allowance; } ?>"/>
																		  </div>
																		  
																		  <label class="control-label col-sm-2" for="income_tax">Income Tax :</label>
																		  <div class="col-sm-4">
																			 <input  type="number" class="form-control" name="income_tax" id="income_tax2" placeholder="Enter Income Tax" value="<?php if(!empty($v->empPreSlaryDetails)){ echo $v->empPreSlaryDetails->income_tax; } ?>"/>
																		  </div>
																		  
																		</div>
																		
																		<div class="form-group">
																		   <label class="control-label col-sm-2">TA :</label>
																		   <div class="col-sm-4">
																			 <input  type="number" class="form-control" name="ta" id="ta2" placeholder="Enter TA" value="<?php if(!empty($v->empPreSlaryDetails)){ echo $v->empPreSlaryDetails->ta; } ?>"/>
																		  </div>
																		   
																		  <label class="control-label col-sm-2" for="group_insurance">Group Insurance:</label>
																		  <div class="col-sm-4">
																			 <input  type="number" class="form-control" name="group_insurance" id="group_insurance2" placeholder="Enter Group Insurance" value="<?php if(!empty($v->empPreSlaryDetails)){ echo $v->empPreSlaryDetails->group_insurance; } ?>"/>
																		  </div>
																		  
																		</div>
																		
																		
																		<div class="form-group">
																		   <label class="control-label col-sm-2">DA :</label>
																		  <div class="col-sm-4">
																			 <input  type="number" class="form-control" name="da" id="da2" placeholder="Enter DA" value="<?php if(!empty($v->empPreSlaryDetails)){ echo $v->empPreSlaryDetails->da; } ?>"/>
																		  </div>
																		  
																		   
																		  <label class="control-label col-sm-2" for="c_found">C/Fund :</label>
																		  <div class="col-sm-4">
																			<input type="number" class="form-control" name="c_found" id="c_found2" placeholder="Enter C/Fund" value="<?php if(!empty($v->empPreSlaryDetails)){ echo $v->empPreSlaryDetails->c_found; } ?>"/>
																		  </div>  
																		 
																		  
																		</div>
																		
																		<div class="form-group">
																		   <label class="control-label col-sm-2">Food Allowance :</label>
																			<div class="col-sm-4">
																			<input type="number" class="form-control" name="food_allowance" id="food_allowance2" placeholder="Enter Food Allowance" value="<?php if(!empty($v->empPreSlaryDetails)){ echo $v->empPreSlaryDetails->food_allowance; } ?>"/>
																		  </div>  
																		  
																		  <label class="control-label col-sm-2" for="cash_bank"> Cash/Bank :</label>
																		  <div class="col-sm-4">
																			 <select class="form-control" name="cash_bank" id="cash_bank2">
																				<option value="" selected="selected">Select Cash/Bank </option>
																				<option <?php if(!empty($v->empPreSlaryDetails)){ if($v->empPreSlaryDetails->cash_bank == 'Cash'){ echo "selected";} } ?> value="Cash">Cash </option>
																				<option <?php if(!empty($v->empPreSlaryDetails)){ if($v->empPreSlaryDetails->cash_bank == 'Bank'){ echo "selected";} } ?> value="Bank">Bank </option>
																			</select>
																				
																		  </div>
																		  
																		  
																			
																		</div>
																		
																		<div class="form-group">
																		
																		   <label class="control-label col-sm-2" for="date_of_birth">Mobile Allowance :</label>
																		  <div class="col-sm-4">
																				<input id="mobile_allowance2" name="mobile_allowance" class="form-control" type="number"  placeholder="Enter Mobile Allowance" value="<?php if(!empty($v->empPreSlaryDetails)){ echo $v->empPreSlaryDetails->mobile_allowance; } ?>">
																		  </div>
																		  
																		  
																		  <label class="control-label col-sm-2" for="increment_date">Increment Date  :</label>
																		  <div class="col-sm-4">
																			<div class="input-group">
																				<input id="increment_date2" name="increment_date" class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" placeholder="Enter Increment Date" value="<?php if(!empty($v->empPreSlaryDetails)){ echo $v->empPreSlaryDetails->increment_date; } ?>" >
																				
																				
																				<span class="input-group-addon">
																					<i class="fa fa-calendar bigger-110"></i>
																				</span>
																			</div>
																		  </div>
																		  
																		 
																		</div>
																		
																		
																		<div class="form-group">
																		
																		  <label class="control-label col-sm-2" for="medical_allowance"> Medical Allowance :</label>
																		   <div class="col-sm-4">
																				<input id="medical_allowance2" name="medical_allowance" class="form-control" type="number"  placeholder="Enter Medical Allowance" value="<?php if(!empty($v->empPreSlaryDetails)){ echo $v->empPreSlaryDetails->medical_allowance; } ?>">
																		  </div>
																		  
																		  
																		  <label class="control-label col-sm-2" for="security_amount">Security Amount :</label>
																		   <div class="col-sm-4">
																				<input id="security_amount2" name="security_amount" class="form-control" type="number"  placeholder="Enter Security Amount" value="<?php if(!empty($v->empPreSlaryDetails)){ echo $v->empPreSlaryDetails->security_amount; } ?>">
																		  </div>
																		
																		</div>
																		
																		
																		<div class="form-group">
																		
																			<label class="control-label col-sm-2" for="phone_allowance">Phone  Allowance:</label>
																		  
																		  <div class="col-sm-4">
																				<input type="number" class="form-control" name="phone_allowance" id="phone_allowance2" placeholder="Enter Phone Allowance" value="<?php if(!empty($v->empPreSlaryDetails)){ echo $v->empPreSlaryDetails->phone_allowance; } ?>"/>
																			</div>
																			
																			
																			
																		 <label class="control-label col-sm-2" for="total_salary">Total Salary :</label>
																		  <div class="col-sm-4">
																				<input id="total_salary2" name="total_salary" class="form-control" type="number" placeholder="Total Salary" <?php if(!empty($v->empPreSlaryDetails)){ echo "readonly"; } ?> value="<?php if(!empty($v->empPreSlaryDetails)){ echo $v->empPreSlaryDetails->total_salary; } ?>" >
																		  </div>
																		  
																		</div>
																							
																	  <div class="modal-footer">
																		
																		<button class="btn btn-sm btn-danger formCancel" type="button">
																			<i class="ace-icon fa fa-times"></i>
																			Cancel
																		</button>
																		<button class="btn btn-sm btn-primary" type="submit">
																			<i class="ace-icon fa fa-check"></i>
																			<span class="update"> Submit </span>
																		</button>
																	</div>
																	</div> 
																</form>	
																	
																	</td>
																  </tr>
																   </table>
															  </td>
															</tr>
															<tr class="alertShow afterSubmitContent">
															<td colspan="8">
															<div class="alert alert-block alert-success" id="">
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
															</tbody>
														 <?php } } ?>	
														
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

 $(document).on("click", ".close", function(){
  $('.alertShow').css('display', 'none');
 });

    $(document).on("click", ".showForm", function(){
	  var parrents   		= $(this).parents('tbody');
	  console.log(parrents);
	  $('.hideForm').css({"display":"none","text-align":"center"});
	  $('.showForm').css({"display":"block","text-align":"center"});
	  $(this).css({"display":"none","text-align":"center"});
	  parrents.find('.hideForm').css({"display":"block","text-align":"center"});
	   var showForm = parrents.find('.detailsShow');
	   if(showForm.hasClass( "fromNone" )){
	   $('.empListTable .detailsShow').addClass("fromNone");
	     showForm.removeClass("fromNone");
	   }
	  
	});
	
	
	$('.hideForm').on('click', function() {
		$('.empListTable .detailsShow').addClass("fromNone");
		$('.showForm').css('display','block');
		$('.hideForm').css('display','none');
	});
	
	$(document).on("submit", "#empAddForm", function(e)
	{
	     var parents    	= $(this).parents('.separeate');  
		 var postData 		= $(this).serializeArray();
		//$(this).parents('.separeate').find('.salaryCom').css('background-color','#FDF3FF');
		 var changeButton 	= parents.find('.showForm');
		 var changeHide 	= parents.find('.hideForm');
		 var alertShow 		= parents.find('.alertShow');
		 var formURL 		= $(this).attr("action");	
		//$(this).css('display','none');
		$.ajax(
		{
			url : formURL,
			type: "POST",
			async: false,
			data : postData,
			success:function(data){
				$('#empAddForm').css('display', 'none'); 
				$('#empAddForm').parents('.detailsShow').css('display', 'none');
				$("#empAddForm input[type='text'], #empAddForm input[type='hidden'], #empAddForm input[type='number'], #empAddForm textarea").val("");
				parents.find('.salaryCom').css('background-color','#FDF3FF');
				if(alertShow.hasClass( "afterSubmitContent" )){
				  alertShow.removeClass("afterSubmitContent");
			    }
				if(changeButton.hasClass( "btn-primary" )){
				 changeButton.removeClass("showForm");
				 changeButton.removeClass("btn-primary");
				 changeButton.addClass("btn-success");
				 changeButton.addClass("showSalForm");
				 changeButton.text("Click To Update");
				 changeButton.css('display', 'block'); 
				 $('.hideForm').css('display', 'none');
			   }
			   
			   if(changeHide.hasClass( "btn-danger" )){
			      changeButton.removeClass("hideForm");
				  changeButton.addClass("hideSalForm");
			   }
				
			}
		  });
		 
		e.preventDefault();
	});
	




$('.add_new').on('click', function() {
	$('.add_new').fadeOut("slow");
	$('.addFormContent').fadeIn("slow");
});

$('.formCancel').on('click', function() {
	$('.addFormContent').fadeOut('slow');
	$('.add_new').fadeIn('slow');
});


   // again insert 
	$('.tryAgain').on('click', function() {
	$('.afterSubmitContent').fadeOut('slow');
	$("#addForm input[type='text'], #addForm input[type='hidden'], #addForm input[type='number'], #addForm textarea").val("");
    var successUrl  = "<?php echo site_url('salaryManageSystem/salaryAndAllowance'); ?>";
      location.replace(successUrl);
   });


	$("#addForm").submit(function(e)
	{
		var postData = $(this).serializeArray();
		console.log(postData);
		var formURL = $(this).attr("action");
		
		$.ajax(
		{
			url : formURL,
			type: "POST",
			async: false,
			data : postData,
			success:function(data){
				$('#addForm').css('display', 'none');
				$('.afterSubmitContent').css('display', 'block');
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


$(document).on("blur", "#sallary2", function(e){
    var parrents = $(this).parents('#empAddForm');
	console.log(parrents);
	var sallaryValu 	= parseInt($(this).val());
	var basicPersentage = parseInt('60');
	var housePersentage = parseInt('40');
	//var basic       	= 40/100 * sallaryValu
	parseInt(parrents.find('#basic2').val(basicPersentage/100 * sallaryValu));
	parseInt(parrents.find('#house_rent2').val(housePersentage/100 * sallaryValu));
	parrents.find('#basic2').attr('readonly', 'readonly');
	parrents.find('#house_rent2').attr('readonly', 'readonly');
	
	
	
});

$(document).on("blur", "#sallary2, #special_allowance2, #ta2, #da2, #food_allowance2, #medical_allowance2, #mobile_allowance2, #phone_allowance2, #profident_fund2, #c_found2, #income_tax2, #group_insurance2, #security_amount2", function(e){
    var parrents                = $(this).parents('#empAddForm');
	var currentItemValue 		= parseInt($(this).val());
	var totalSalary      		= parseInt(parrents.find('#total_salary2').val());
	var TotalSalaryDecrement 	= parseInt(totalSalary - currentItemValue);
	parrents.find('#total_salary2').val(parseInt(TotalSalaryDecrement));

});

$(document).on("blur", "#sallary2, #special_allowance2, #ta2, #da2, #food_allowance2, #medical_allowance2, #mobile_allowance2, #phone_allowance2, #profident_fund2, #c_found2, #income_tax2, #group_insurance2, #security_amount2", function(e){

    var parrents        = $(this).parents('#empAddForm');
	var sallary 		= parseInt(parrents.find('#sallary2').val());
	var specialAl 		= parseInt(parrents.find('#special_allowance2').val());
	var ta 				= parseInt(parrents.find('#ta2').val());
	var da 				= parseInt(parrents.find('#da2').val());
	var foodAl 			= parseInt(parrents.find('#food_allowance2').val());
	var medicalAl 		= parseInt(parrents.find('#medical_allowance2').val());
	var mobileAl 		= parseInt(parrents.find('#mobile_allowance2').val());
	var phoneAl 		= parseInt(parrents.find('#phone_allowance2').val());
	var pfAl 			= parseInt(parrents.find('#profident_fund2').val());
	var incomeAl 		= parseInt(parrents.find('#income_tax2').val());
	var groupAl 		= parseInt(parrents.find('#group_insurance2').val());
	var cFound 			= parseInt(parrents.find('#c_found2').val());
	var securityAmn 	= parseInt(parrents.find('#security_amount2').val()); 

    parrents.find('#salary_keep_2').val(sallary); 
	parrents.find('#special_allowance_keep_2').val(specialAl); 		parrents.find('#phone_allowance_keep_2').val(phoneAl); 
    parrents.find('#ta_keep_2').val(ta); 							parrents.find('#profident_fund_keep_2').val(pfAl); 
    parrents.find('#da_keep_2').val(da); 							parrents.find('#income_tax_keep_2').val(incomeAl); 
    parrents.find('#food_allowance_keep_2').val(foodAl); 			parrents.find('#group_insurance_keep_2').val(groupAl); 
    parrents.find('#medical_allowance_keep_2').val(medicalAl); 		parrents.find('#c_found_keep_2').val(cFound); 
    parrents.find('#mobile_allowance_keep_2').val(mobileAl);      	parrents.find('#security_amount_keep_2').val(securityAmn); 
    
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
    	 parseInt( parrents.find('#total_salary2').val(TotalSallaryAmout));
    }

   
	
	parrents.find('#total_salary2').attr('readonly', 'readonly');
	
	
	
	
});



/// emp wise update

$(document).on("click", ".showSalForm", function(){
	  var parrents   		= $(this).parents('tr');
	  var empId      		= $(this).attr('data-emp-id');
	  var salaryMonth   	= $('#salaryMonth').val();
	  var branch_id   		= $('#branch_id').val();
	  var designition_id   	= $('#designition_id').val();
	  var domain_id   		= $('#domain_id').val();
	 
	  $('.hideSalForm').css({"display":"none","text-align":"center"});
	  $('.showSalForm').css({"display":"block","text-align":"center"});
	  $(this).css({"display":"none","text-align":"center"});
	  parrents.find('.hideSalForm').css({"display":"block","text-align":"center"});
	  var formURL    = "<?php echo site_url('salaryManageSystem/empWiseSallaryUpdateForm'); ?>";
	  
		$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {empId: empId, salaryMonth: salaryMonth, domain_id: domain_id, designition_id: designition_id, branch_id: branch_id},
				success:function(data){
					$('.empListTable .editDetailsShow').remove();
					$('<tr class="editDetailsShow"><td colspan="8">'+data+'</td></tr>').insertAfter(parrents);
				}
			});
	  
	 
	
	});
	
	
	$('.hideSalForm').on('click', function() {
		$('.empListTable .editDetailsShow').remove();
		$('.showSalForm').css('display','block');
		$('.hideSalForm').css('display','none');
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