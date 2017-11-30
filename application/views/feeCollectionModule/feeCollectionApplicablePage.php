
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
							<a href="<?php echo site_url('feeCollectionModule'); ?>">Fee Collection</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('feeCollectionModule/feeSetup'); ?>">Collection Setup</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('feeCollectionModule/collectionApplyStu'); ?>">Student Wise Collection Applicable </a>
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
											<h4 class="widget-title">Student Wise Collection Applicable</h4>
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
											<div class="form-horizontal">	
												<div class="scroll-content">
																		 <div class="content img-thumbnail container">
																		<div class="col-md-12">
																		 <div class="row textleft">
																					<h4 class="text-left">Student Wise Payment Managment Selection </h4>
																				</div>
																				 <div class="col-md-12 img-thumbnail boxShadow_1 initialPart">
																							
																						 <div class="col-md-6">
																							<div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Campus/Branch :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="fee_branch_id" id="fee_branch_id" required>
																												  <option value="">Select Campus</option>
																												  <?php foreach($branchListInfo as $k=>$v) { ?>
																													<option value="<?php echo $v->id; ?>" ><?php echo $v->branch_name; ?></option>																										<?php } ?>
																										</select>																	   		
																								 </div>
																							 </div>
																							 
																							 <div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Class :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="fee_class_id" id="fee_class_id" required>
																												  <option value="">Select Class </option>
																												  <?php foreach($classListInfo as $k=>$v) { ?>
																													<option value="<?php echo $v->id; ?>" ><?php echo $v->class_name; ?></option>																										<?php } ?>
																										</select>																	   		
																								 </div>
																							 </div>
																							 
																							 <div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Group :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="fee_group_id" id="fee_group_id" required>
																												  <option value="">Select Group</option>
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
																										<select class="form-control" name="fee_section_id" id="fee_section_id" required>
																												  <option value="">Select Section</option>
																												  <?php foreach($sectionListInfo as $k=>$v) { ?>
																													<option value="<?php echo $v->id; ?>" ><?php echo $v->section_name; ?></option>																										<?php } ?>
																										</select>																	   		
																								 </div>
																								 
																								 
																							 </div>
																							 <div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Shift :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="fee_shift_id" id="fee_shift_id" required>
																												  <option value="">Select Shift</option>
																												  <?php foreach($shiftListInfo as $k=>$v) { ?>
																													<option value="<?php echo $v->id; ?>" ><?php echo $v->shift_name; ?></option>																										<?php } ?>
																										</select>																	   		
																								 </div>
																							</div>
																							 
																							 <div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Year :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="fee_year" id="fee_year" required>
																												  <option value="">Select Year </option>
																												  <?php for ($year = date('Y'); $year > date('Y')-100; $year--) { ?>
																													<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
																													<?php } ?>
																										</select>		
																									</div>
																							</div>
																							
																						 </div>
																						
																						<button class="btn btn-xs btn-danger pull-right initialize" type="button">
																							<i class="ace-icon fa fa-bolt bigger-110"></i>
																							<span class="initialAgain">Initialize</span>
																							<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
																						</button>
																						<div class="pull-right loadingPart"><img src="<?php echo base_url('resource/img/search-loading.gif'); ?>" class="img-responsive center-block" /></div>
																					</div>	
																			
																			
																		<div class="divForView">	
																				
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
				</div>
				</div>
				
	  <?php $this->load->view('common/footer'); ?>
				
	</body>
</html>


<script>
$(".initialize").on('click', function()
{
	var fee_branch_id = $('#fee_branch_id').val();
	var fee_group_id = $('#fee_group_id').val();
	var fee_class_id = $('#fee_class_id').val();
	var fee_year = $('#fee_year').val();
	var postData = $( ".initialPart input, select" ).serializeArray();
	var formURL = '<?php echo site_url('feeCollectionModule/initialPayCollApplicable'); ?>';
	if(fee_branch_id != "" && fee_group_id != "" && fee_class_id != "" && fee_year != "") {
	$('.loadingPart').css('display', 'block');
	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : postData,
		success:function(data){
			$(".divForView").html(data);				
			//$('#class_roll').val('');
			$('.initialAgain').text('Again Initialize');
			$('.displayNone').css('display', 'block');
			$('.loadingPart').css('display', 'none');
		}
	});
   } else  {
   	alert('Please Select All Field.');
   }
});

$('.formCancel').on('click', function() {
	$('.addFormContent').fadeOut('slow');
	$('.add_new').fadeIn('slow');
});

</script>