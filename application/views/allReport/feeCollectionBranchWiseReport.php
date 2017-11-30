
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

				  </div>
					<div class="col-md-10 col-sm-10 col-lg-10 headerBox2">
						<a href="<?php echo site_url('adminHome'); ?>" > Home </a>
						<i class="glyphicon glyphicon-forward"></i>
							<a href="<?php echo site_url('allReport'); ?>">Report</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('allReport/feeCollectionReport'); ?>">Fee Collection Report </a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('allReport/feeCollectionBranchWiseReport'); ?>">Branch Wise Earning</a>&nbsp;&nbsp;
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
											<h3 class="widget-title"><strong>Branch Wise Earning  Report</strong></h3>
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
														<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('allReport/feeCollectionBranchWiseReportResult'); ?>" enctype="multipart/form-data" method="post" target="_blank">	
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
																					 
																				  </div>
																				 
																				 <div class="col-md-6">
																					 <div class="form-group">
																						  <label class="control-label col-sm-5 " for="fromDate">From :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		 <input type="text" name="fromDate" id="fromDate" class="form-control date-picker"  placeholder="From" required="required">		
																							</div>
																					</div>
																					
																					 <div class="form-group">
																						  <label class="control-label col-sm-5 " for="toDate">To :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		 <input type="text" name="toDate"  id="toDate" class="form-control date-picker" placeholder="To" required="required">	
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

</script>