
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<title><?php echo $title; ?></title>
		<?php //$this->load->view(''); ?>
		<style>
	RESPONSE {
		display:none;
	}
	credits {
		display:none;
	}
</style>
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
							<a href="<?php echo site_url('feeCollectionModule'); ?>">Fee Collection</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('feeCollectionModule/feeCollection'); ?>">Collection Information</a>&nbsp;&nbsp;
					</div>
				</div>	
	</div>
				
				<div class="col-md-11 col-lg-11">
					<div class="row">
					<div class="col-md-2 col-sm-2 col-lg-2 ">
						
						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 interfaceBody headerBox3">
						<div class="row text-center">
								<!-- PAGE CONTENT BEGINS -->
								

								<!-- /.row -->
								  <div id="widget-container-col-11" class="col-md-12 col-xs-12 col-sm-12 col-lg-12 widget-container-col ui-sortable addFormContent" style="min-height: 172px; display:block">
									<div id="widget-box-11" class="widget-box widget-color-dark ui-sortable-handle" style="opacity: 1;">
										<div class="widget-header">
											<h4 class="widget-title">Student Fee Collection </h4>
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
											<form class="form-horizontal" id="initailize" role="form" action="<?php echo site_url('feeCollectionModule/feeCollectionHeadInitialize'); ?>" enctype="multipart/form-data" method="post">	
												<div class="scroll-content">
																		 <div class="content img-thumbnail container">
																	<div class="row">
																		<div class="form-group">
																			  <label class="control-label col-sm-4"><strong>Student ID  :</strong></label>
																			  <div class="col-sm-4">
																						<input name="stuID" id="stuID" class="form-control" type="text" placeholder="Enter Student ID" value="<?php if(!empty($stuID)){ echo $stuID; } ?>">
																				</div>
																					
																			  <div class="col-sm-1">
																						<input type="submit" class="form-control btn btn-info" value="Find" />
																					</div>																					  
																			  </div>
																			</div>
																		<div class="col-md-12">
																			 <div class="col-md-12 img-thumbnail">
																					 <div class="col-md-6" style="padding-top:10px">
																						<div class="form-group">
																							  <label class="control-label col-sm-5 " for="email">Campus/Branch :</label>
																							  <div class="col-sm-7 paddingZero">
																									<select class="form-control" name="branch_id" id="branch_id">
																											  <option value="">Select Campus</option>
																											  <?php foreach($branchListInfo as $k=>$v) { ?>
																												<option <?php if($branch_id ==$v->id) echo 'selected'; ?>  value="<?php echo $v->id; ?>" ><?php echo $v->branch_name; ?></option>																										<?php } ?>
																									</select>																	   		
																							 </div>
																						 </div>
																						 
																						 <div class="form-group">
																							  <label class="control-label col-sm-5 " for="email">Class :</label>
																							  <div class="col-sm-7 paddingZero">
																									<select class="form-control" name="class_id" id="class_id">
																											  <option value="">Select Class </option>
																											  <?php foreach($classListInfo as $k=>$v) { ?>
																												<option <?php if($class_id ==$v->id) echo 'selected'; ?> value="<?php echo $v->id; ?>" ><?php echo $v->class_name; ?></option>																										<?php } ?>
																									</select>																	   		
																							 </div>
																						 </div>
																						
																						<div class="form-group">
																							  <label class="control-label col-sm-5 " for="email">Group :</label>
																							  <div class="col-sm-7 paddingZero">
																									<select class="form-control" name="group_id" id="group_id">
																											  <option value="">Select Group </option>
																											  <?php foreach($groupListInfo as $k=>$v) { ?>
																												<option <?php if($group_id ==$v->id) echo 'selected'; ?> value="<?php echo $v->id; ?>" ><?php echo $v->group_name; ?></option>																										<?php } ?>
																									</select>																	   		
																							 </div>
																						 </div>
																					  </div>
																					 
																					 <div class="col-md-6" style="padding:10px 25px 0 0">
																						 <div class="form-group">
																							  <label class="control-label col-sm-5 " for="email">Section :</label>
																							  <div class="col-sm-7 paddingZero">
																									<select class="form-control" name="section_id" id="section_id">
																											  <option value="">Select Section </option>
																											  <?php foreach($sectionListInfo as $k=>$v) { ?>
																												<option <?php if($section_id ==$v->id) echo 'selected'; ?> value="<?php echo $v->id; ?>" ><?php echo $v->section_name; ?></option>																										<?php } ?>
																									</select>					   		
																								</div>
																						</div>
																						
																						 <div class="form-group">
																							  <label class="control-label col-sm-5 " for="email">Shift :</label>
																							  <div class="col-sm-7 paddingZero">
																									<select class="form-control" name="shift_id" id="shift_id">
																											  <option value="">Select Shift </option>
																											  <?php foreach($shiftListInfo as $k=>$v) { ?>
																												<option <?php if($shift_id ==$v->id) echo 'selected'; ?> value="<?php echo $v->id; ?>" ><?php echo $v->shift_name; ?></option>																										<?php } ?>
																									</select>		
																								</div>
																						</div>
																						
																						 <div class="form-group">
																							  <label class="control-label col-sm-5 " for="email">Class Roll :</label>
																							  <div class="col-sm-7 paddingZero">
																									<select class="form-control" name="class_roll" id="class_roll">
																											  <option value="">Select Roll </option>
																											  <?php for($i=1; $i<=150; $i++) { ?>
																												<option <?php if($class_roll ==$i) echo 'selected'; ?> value="<?php echo $i; ?>" ><?php echo $i; ?></option>																										<?php } ?>																						</select>		
																								</div>
																						</div>
																						
																						
																						 <div class="form-group">
																							  <label class="control-label col-sm-5 " for="email">Year :</label>
																							  <div class="col-sm-7 paddingZero">
																									<select class="form-control" name="year" id="year">
																											  <option value="">Select Year </option>
																											  <?php for ($year = date('Y'); $year > date('Y')-100; $year--) { ?>
																												<option <?php if($stuYear ==$year) echo 'selected'; ?> value="<?php echo $year; ?>"><?php echo $year; ?></option>
																												<?php } ?>
																									</select>		
																								</div>
																						</div>
																						
																					 </div>
																					
																					<button class="btn btn-xs btn-danger pull-right initialize" type="submit">
																								<i class="ace-icon fa fa-bolt bigger-110"></i>
																								<span class="initialAgain">Initialize</span>
																								<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
																							</button>
																							<div class="pull-right loadingPart"><img src="<?php echo base_url('resource/img/search-loading.gif'); ?>" class="img-responsive center-block" /></div>
																				</div>	
																		</div>
																		<div class="col-md-12">
																		   <div class="col-md-12" style="font-size:14px;font-weight:bold;text-decoration:underline;padding-bottom:5px">Last Receipt No <?php if(isset($feeHeadPaidInvoice_no)) { echo $feeHeadPaidInvoice_no; } ?></div>
																		   <table width="100%" class="table table-bordered">
																			<tbody>
																				  <tr>
																				  	<?php 
																			       foreach ($studentLastTreeReceptNo as $vt){ ?>
																					<td><a href="<?php echo site_url('allReport/receitNoWiseEarningReportResult/'.$vt->reciept_no); ?>" target="_blank">REC#00<?php echo $vt->invoice_no; ?></a></td>
																					<?php } ?>
																				  </tr>
																			</tbody>
																		</table>

																		</div>
																	</div>
																	
																	  
																	</div>
												</form>
												
												<div class="row paymentHeadListView">

													<?php if(!empty($findStuInfoClassWise)) { ?>
													<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
																													
															<div class="clearfix">
																<div class="pull-right tableTools-container"></div>
															</div>
															<div class="table-header text-left" style="min-height: 60px;padding-top: 6px">
																<span class="label label-success  arrowed-right"><?php echo $findStuInfoClassWise->stu_id; ?></span>
																<strong>Name :</strong> <?php echo $findStuInfoClassWise->stu_full_name; ?>
																<span style="float:right">
																   <?php
																		 if(!empty($findStuInfoClassWise->stu_photo)){ ?>
																		<img src="<?php echo base_url("resource/stu_photo/$findStuInfoClassWise->stu_photo"); ?>" width="50" height="40" class="img-thumbnail"> 
																	<?php }else{  if($findStuInfoClassWise->stu_sex == 'M'){ ?>
																			 <img src="<?php echo base_url('resource/img/male.png'); ?>" width="50" height="40"> 
																		 <?php }else{ ?>
																		   <img src="<?php echo base_url('resource/img/EmptyProfile.png'); ?>" width="50" height="40"> 
																	<?php } } ?>
																</span>
															</div>
																
																
													
														<form action="<?php echo site_url('feeCollectionModule/submitFeeHeadAmount'); ?>" id="feeHeadAddForm" method="post" >
														<input type="hidden" id="class_wise_auto_id" name="class_wise_auto_id" value="<?php echo $findStuInfoClassWise->class_wise_auto_id; ?>" />
														
														<div class="pull-right"><strong class=" text-right">Collection Date :</strong>  <strong class=""><input type="text" name="submittedDate" id="submittedDate" value="<?php echo date('Y-m-d'); ?>" class="date-picker" /></strong></div>
														<div>
																<table id="dynamic-table" class="table table-striped table-bordered table-hover text-left stuListTable">
																	<thead>
																		<tr>
																		  <th class="center">Payment Head</th>
																			<th>Description</th>
																			<th> Amount </th>
																			<th >Discount </th>
																			<th> Pay Amount </th>
																			<th> Action </th>
																			
																		</tr>
																	</thead>
													
																	<tbody>
																	
																		 <tr>
																			  <td class="center">
																				<!-- <select class="form-control paymentHead" name="feePaymentHeadID" id="feePaymentHeadID" required>
																						  <option value="">Select Payment Head</option>
																						  <?php foreach($applicablePaymentHeaderList as $k=>$v) {
																							if($v->mode_due_amount >0) {
																						   ?>
																							<option value="<?php echo $v->id; ?>" ><?php echo $v->applicable_mode_name; ?></option>																										<?php } } ?>
																							<option value="others">Other's</option>
																				</select> -->
																				<?php
																				$catList		=  $this->M_crud->findAll('fee_head_cat_list_manage', $where = array('status' => 'Active'), $orderBy = 'id' , $serialized = 'asc'); 
																				?>
																				<select class="form-control select paymentHead" name="feePaymentHeadID" id="feePaymentHeadID" required>
																
																				<option value="">Select Payment Head</option>
																				<?php
																					foreach($catList as $k=>$v) {
																				 ?>
																				<optgroup label="<?php echo $v->cat_name; ?>">
																				<?php
																				$applicableHeadList		=  $this->M_crud->findAll('stu_fee_collection_applicable_mode_list', $where = array('fee_coll_app_stu_auto_id' => $findStuInfoClassWise->stu_auto_id, 'fee_year' =>$stuYear, 'cat_id' => $v->id, 'mode_due_amount >' => 0), $orderBy = 'id' , $serialized = 'asc');
																				
																				foreach ($applicableHeadList as $row) {
																					?>
																
																					<option value="<?php echo $row->id; ?>">
																						- <?php echo $row->applicable_mode_name; ?>
																					</option>
																				<?php } ?>
																			</optgroup>
																			<?php } ?>
																			<optgroup label="Other's">
																				<option value="others">- Other's</option>
																			</optgroup>	
																			</select>
																			 </td>
																			<td><input type="text" class="form-control" name="pay_head_details" id="pay_head_details"/></td>
																			<td ><input type="text" class="form-control" name="mode_due_amount" id="mode_due_amount"/></td>
																			<td><input type="text" class="form-control" name="pay_mode_discount_amount" id="pay_mode_discount_amount"/></td>
																			<td >
																				<input type="text" class="form-control" name="mode_pay_amount" id="mode_pay_amount" required/>
																				<input type="hidden" class="form-control" name="orginal_mode_due_amount" id="orginal_mode_due_amount" required/>
																			</td>
																			<td >
																				<button class="btn btn-xs btn-danger pull-right" type="submit">
																					<i class="ace-icon fa fa-bolt bigger-110"></i>
																					<span class="">Add</span>
																					<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
																				</button>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</form>	
														
														<div class="paidListView" style="">
														
														</div>
														</div>
													<?php } else { ?>
													<div class="alert alert-danger col-md-10 col-md-offset-1">
														<strong>Sorry!</strong> System Could Not Find Anything. Please Check Information and Try Again!
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
				
	  <?php $this->load->view('common/footer'); ?>
				
	</body>
</html>


<script>

$(".paymentHead").on('change', function() {
	var feePaymentHeadID = $('#feePaymentHeadID').val();
	var formURL = "<?php echo site_url('feeCollectionModule/loadFeeHeadAmount'); ?>";
	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : {feePaymentHeadID : feePaymentHeadID},
		success:function(data){
			console.log(data);
			$("#mode_due_amount").val(data);
			$("#mode_pay_amount").val(data);
			$("#orginal_mode_due_amount").val(data);
			$("#pay_mode_discount_amount").val("");
			$("#mode_due_amount").attr('readonly', 'readonly');
		}
	});
});

$('#pay_mode_discount_amount, #mode_due_amount').on('keyup', function() {
	var orginal_mode_due_amount	= $('#orginal_mode_due_amount').val();
	var pay_mode_discount_amount = $('#pay_mode_discount_amount').val();
	var mode_pay_amount = (orginal_mode_due_amount - pay_mode_discount_amount)
	
	if(orginal_mode_due_amount >0)
	$('#mode_pay_amount').val(mode_pay_amount);
});


$("#feeHeadAddForm").submit(function(e)
{
	var postData = $(this).serializeArray();
	var formURL = $(this).attr("action");
	var submittedDate = $('#submittedDate').val();
	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : postData,
		success:function(data){
			$(".paidListView").html(data);
			$('#feeHeadAddForm input[type="text"]').val("");
			$('#submittedDate').val(submittedDate);
			$("#feeHeadAddForm option:selected").prop("selected", false)				
		}
	});
	
	e.preventDefault();
});


$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd',
});
</script>