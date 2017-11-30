
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
							<a href="<?php echo site_url('allReport'); ?>">Report</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('allReport/feeCollectionReport'); ?>">Fee Collection Report </a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('feeCollectionModule/feeCollectionCatWiseReport'); ?>">Category Wise Report</a>&nbsp;&nbsp;</div>
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
											<h3 class="widget-title"><strong>Category Wise Report</strong></h3>
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
														<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('feeCollectionModule/feeCollectionCatWiseReportResult'); ?>" enctype="multipart/form-data" method="post" target="_blank">	
												<div class="scroll-content">
																		 <div class="content img-thumbnail container">
																		<div class="col-md-12">
																		 
																		 <div class="col-md-12 img-thumbnail">
																				 <div class="col-md-6">
																				 	<div class="form-group">
																						  <label class="control-label col-sm-5 " for="branch_id">Campus/Branch :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<select class="form-control" name="branch_id" id="branch_id">
																										  <option value="">Select Campus</option>
																										  <?php foreach($branchListInfo as $k=>$v) { ?>
																											<option value="<?php echo $v->id; ?>" ><?php echo $v->branch_name; ?></option>																										<?php } ?>
																								</select>																	   		
																						 </div>
																					 </div>
																					 
																					 <div class="form-group">
																						  <label class="control-label col-sm-5 " for="class_id">Class :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<select class="form-control" name="class_id" id="class_id">
																										  <option value="">Select Class </option>
																										  <?php foreach($classListInfo as $k=>$v) { ?>
																											<option value="<?php echo $v->id; ?>" ><?php echo $v->class_name; ?></option>																										<?php } ?>
																								</select>																	   		
																						 </div>
																					 </div>
																					
																					<div class="form-group">
																						  <label class="control-label col-sm-5 " for="group_id">Group :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<select class="form-control" name="group_id" id="group_id">
																										  <option value="">Select Group </option>
																										  <?php foreach($groupListInfo as $k=>$v) { ?>
																											<option value="<?php echo $v->id; ?>" ><?php echo $v->group_name; ?></option>																										<?php } ?>
																								</select>																	   		
																						 </div>
																					 </div>
																					 
																					<div class="form-group">
																						  <label class="control-label col-sm-5 " for="section_id">Section :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<select class="form-control" name="section_id" id="section_id">
																										  <option value="">Select Section </option>
																										  <?php foreach($sectionListInfo as $k=>$v) { ?>
																											<option value="<?php echo $v->id; ?>" ><?php echo $v->section_name; ?></option>																										<?php } ?>
																								</select>					   		
																							</div>
																					</div> 
																					 
																				  </div>
																				 
																				 <div class="col-md-6">
																				 	
																					
																					 <div class="form-group">
																						  <label class="control-label col-sm-5 " for="shift_id">Shift :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<select class="form-control" name="shift_id" id="shift_id">
																										  <option value="">Select Shift </option>
																										  <?php foreach($shiftListInfo as $k=>$v) { ?>
																											<option value="<?php echo $v->id; ?>" ><?php echo $v->shift_name; ?></option>																										<?php } ?>
																								</select>		
																							</div>
																					</div>
																					 
																					 <!-- <div class="form-group">
																							  <label class="control-label col-sm-5 " for="version">Version :</label>
																							  <div class="col-sm-7 paddingZero">
																									<select class="form-control" name="version" id="version">
																											  <option value="">Select Version </option>
																											  <option value="Bangla">Bangla</option>
																											  <option value="English">English</option>
																									</select>		
																								</div>
																						</div> -->
																						<?php
																							$catList	= $this->M_crud->findAll('fee_head_cat_list_manage', array(), 'id', 'asc');
																						?>
																					<div class="form-group">
																						  <label class="control-label col-sm-5 " for="cat_id">Category :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		 <select class="form-control" name="cat_id" id="cat_id" required>
																										  <option value="">Select Category</option>
																										  <?php foreach($catList as $v) { ?>
																											<option value="<?php echo $v->id; ?>"><?php echo $v->cat_name; ?></option>
																											<?php } ?>
																								</select>	
																							</div>
																					</div>	
																					
																					<div class="form-group">
																						  <label class="control-label col-sm-5 " for="fee_head_id">Fee Head :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		 <select class="form-control" name="fee_head_id" id="fee_head_id">
																										  <option value="" selected="selected">Select Head</option>
																								</select>	
																							</div>
																					</div>
																						
																					<div class="form-group">
																						  <label class="control-label col-sm-5 " for="year">Year :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		 <select class="form-control" name="year" id="year" required>
																										  <option value="">Select Year </option>
																										  <?php for ($year = date('Y')+1; $year > date('Y')-100; $year--) { ?>
																											<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
																											<?php } ?>
																								</select>	
																							</div>
																					</div>	
																					
																					<div class="form-group">
																						  <label class="control-label col-sm-5 ">Date Range :</label>
																						  <div class="col-sm-7 paddingZero">
																								<div class="input-group">
																								    <input type="text" name="fromDate" id="fromDate" class="form-control date-picker"  placeholder="From" >
																								  <span class="input-group-addon" id="basic-addon1"></span>
																								  <input type="text" name="toDate"  id="toDate" class="form-control date-picker" placeholder="To">
																							</div>
																							</div>
																					</div>
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
		format: 'yyyy/mm/dd',
})

$('.formCancel').on('click', function() {
	$('.addFormContent').fadeOut('slow');
	$('.add_new').fadeIn('slow');
});

$("#cat_id").on('change', function()
{
	var dataID = $(this).val();
	var formURL = "<?php echo site_url('feeCollectionModule/changeFeeHeadList'); ?>";
	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : {dataID : dataID},
		success:function(data){
			$("#fee_head_id").html(data);
		}
	});
	
});

</script>