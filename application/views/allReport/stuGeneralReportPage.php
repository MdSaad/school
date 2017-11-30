
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
							<a href="<?php echo site_url('allReport'); ?>">Report</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('allReport/stuReport'); ?>">Student Report</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('allReport/stuGeneralReport'); ?>">General Report</a>&nbsp;&nbsp;
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
											<h3 class="widget-title"><strong>Student General Report</strong></h3>
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
														<form class="form-horizontal" id="reportForm" role="form" action="<?php echo site_url('allReport/stuGeneralReportDetails'); ?>" enctype="multipart/form-data" method="post">	
												<div class="scroll-content">
																		 <div class="content img-thumbnail container">
																	<div class="row">
																		<div class="form-group">
																			  <label class="control-label col-sm-4"><strong>Student ID  :</strong></label>
																			  <div class="col-sm-5">
																						<input name="stuCurrentID" id="stuCurrentID" class="form-control" type="text" placeholder="Enter Student ID">
																					</div>																			  
																			  </div>
																			</div>
																		<div class="col-md-12">
																		 
																		 <div class="col-md-12 img-thumbnail">
																				 <div class="col-md-6">
																				 	<div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Campus/Branch :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<select class="form-control" name="branch_id" id="branch_id">
																										  <option value="">Select Campus</option>
																										  <?php foreach($branchListInfo as $k=>$v) { ?>
																											<option value="<?php echo $v->id; ?>" ><?php echo $v->branch_name; ?></option>																										<?php } ?>
																								</select>																	   		
																						 </div>
																					 </div>
																					 
																					 <div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Class :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<select class="form-control" name="class_id" id="class_id">
																										  <option value="">Select Class </option>
																										  <?php foreach($classListInfo as $k=>$v) { ?>
																											<option value="<?php echo $v->id; ?>" ><?php echo $v->class_name; ?></option>																										<?php } ?>
																								</select>																	   		
																						 </div>
																					 </div>
																					
																					<div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Group :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<select class="form-control" name="group_id" id="group_id">
																										  <option value="">Select Group </option>
																										  <?php foreach($groupListInfo as $k=>$v) { ?>
																											<option value="<?php echo $v->id; ?>" ><?php echo $v->group_name; ?></option>																										<?php } ?>
																								</select>																	   		
																						 </div>
																					 </div>
																				  </div>
																				 
																				 <div class="col-md-6">
																					 <div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Section :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<select class="form-control" name="section_id" id="section_id">
																										  <option value="">Select Section </option>
																										  <?php foreach($sectionListInfo as $k=>$v) { ?>
																											<option value="<?php echo $v->id; ?>" ><?php echo $v->section_name; ?></option>																										<?php } ?>
																								</select>					   		
																							</div>
																					</div>
																					
																					 <div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Shift :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<select class="form-control" name="shift_id" id="shift_id">
																										  <option value="">Select Shift </option>
																										  <?php foreach($shiftListInfo as $k=>$v) { ?>
																											<option value="<?php echo $v->id; ?>" ><?php echo $v->shift_name; ?></option>																										<?php } ?>
																								</select>		
																							</div>
																					</div>
																					
																					 <div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Class Roll :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<select class="form-control" name="class_roll" id="class_roll">
																										  <option value="">Select Roll </option>
																										  <?php for($i=1; $i<=150; $i++) { ?>
																											<option value="<?php echo $i; ?>" ><?php echo $i; ?></option>																										<?php } ?>																						</select>		
																							</div>
																					</div>
																					
																					
																					 <div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Year :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<select class="form-control" name="year" id="year">
																										  <option value="">Select Year </option>
																										  <?php for ($year = date('Y'); $year > date('Y')-100; $year--) { ?>
																											<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
																											<?php } ?>
																								</select>		
																							</div>
																					</div>
																					
																				 </div>
																				 <div class="col-md-11 col-xs-offset-4">
																						<h5 class="text-left">Student Details Information Selection :</h5>
																						
																						<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-responsive text-left">
																								  <tr>
																									<td><label class="pos-rel">
																									<input type="checkbox" class="ace" id="stuDetailsInfo" name="stuDetailsInfo"/>
																									<span class="lbl"></span></label></td>
																									<td>&nbsp;</td>
																									<td>Students Details Information</td>
																								  </tr>
																									<td><label class="pos-rel">
																									<input type="checkbox" class="ace" id="stuParentDetailsInfo" name="stuParentDetailsInfo" />
																									<span class="lbl"></span></label></td>
																									<td>&nbsp;</td>
																									<td>Parents Details Information</td>
																								  </tr>
																								  <tr>
																									<td><label class="pos-rel">
																									<input type="checkbox" class="ace" id="stuGuarDetailsInfo" name="stuGuarDetailsInfo" />
																									<span class="lbl"></span></label></td>
																									<td>&nbsp;</td>
																									<td>Guardian Details Information</td>
																								  </tr>
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
																			Submit
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
							 </div>	
					</div>
				</div>
				</div>
				
	  <?php $this->load->view('common/footer'); ?>
				
	</body>
</html>
<div id="reportModal" class="modal fade-in" tabindex="-1">
									<div class="modal-dialog reportView modal-lg">
										<div class="modal-content">
											<span class="fa fa-circle-o-notch fa-spin fa-3x text-primary"></span><span class="h4">Loading</span>
										 </div>
									</div><!-- /.modal-dialog -->
								</div>
		
<script type="text/javascript" >
$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy/mm/dd',
})



$("#reportForm").submit(function(e)
{
	var postData = $(this).serializeArray();
	var formURL = $(this).attr("action");
	 $("#reportModal").focus();
	$('#reportModal').modal('show');
	$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
				$('.reportView').html(data);
				//$('#alertMsg').css('display', 'block');
				//$('.alrtText').text('Added Successfully');
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

$('.tryAgain').on('click', function() {
	$('#addForm').fadeIn("slow");
	$('.afterSubmitContent').fadeOut('slow');
	$("#addForm input[type='text'], input[type='hidden'], input[type='number'], input[type='email']").val("");
	$("#addForm option:selected").prop("selected", false);
	$('#class_roll').val('');
	$('#class_roll').attr('type', 'hidden');
	$('.GenerateClassRoll').css('display', 'block');
});

$('[data-rel=tooltip]').tooltip({container:'body'});
$('[data-rel=popover]').popover({container:'body'});
</script>