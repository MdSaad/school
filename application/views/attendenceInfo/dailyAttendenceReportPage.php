
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
							<a href="<?php echo site_url('allReport'); ?>">Report</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('attendenceReport'); ?>">Attendence Report</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('attendenceReport/dailyAttendenceReport'); ?>">Student Daily Attendence Report</a>&nbsp;&nbsp;
					</div>
				</div>	
	</div>
				
				<div class="col-md-11 col-lg-11">
					<div class="row">
					<div class="col-md-2 col-sm-2 col-lg-2 ">
						
						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 interfaceBody">
							<div class="row text-center">
								<!-- PAGE CONTENT BEGINS -->
								<!-- /.row -->
								  <div id="widget-container-col-11" class="col-md-12 col-xs-12 col-sm-12 col-lg-12 widget-container-col ui-sortable addFormContent" style="min-height: 172px; display:block">
									<div id="widget-box-11" class="widget-box widget-color-dark ui-sortable-handle" style="opacity: 1;">
										<div class="widget-header">
											<h3 class="widget-title"><strong>Student Daily Attendence Report</strong></h3>
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
												<form class="form-horizontal" target="_blank" id="attendenceReportForm" role="form" action="<?php echo site_url('attendenceReport/dailyAttendenceReportAction'); ?>" enctype="multipart/form-data" method="get">	
												<div class="scroll-content">
													<div class="content img-thumbnail container" style="width: 100%">
														<div class="row">
															<div class="form-group" style="padding-top:5px">
																  <label class="control-label col-sm-4"><strong>Student ID  :</strong></label>
																  <div class="col-sm-5">
																			<input name="stuCurrentID" id="stuCurrentID" class="form-control" type="text" placeholder="Enter Student ID">
																		</div>																			  
																  </div>
																</div>
														<div class="col-md-12">
														 <div class="col-md-12 img-thumbnail">
														 
															 <div class="col-md-6" style="padding-top:6px;">
																<div class="form-group">
																	 <label class="control-label col-sm-5 " for="email">Branch :</label>
																	  <div class="col-sm-7 paddingZero">
																		 <select class="form-control" name="branch_id" id="branch_id">
																			 <option value="">Select Campus</option>
																			 <?php foreach($branchListInfo as $k=>$v) { ?>
																			<option value="<?php echo $v->id; ?>" ><?php echo $v->branch_name; ?></option>	
																			<?php } ?>																									
																		</select>																	   		
																	 </div>
																 </div>
																 
																 <div class="form-group">
																	  <label class="control-label col-sm-5 " for="email">Group :</label>
																	  <div class="col-sm-7 paddingZero">
																			<select class="form-control" name="group_id" id="group_id">
																		  <option value="">Select Group </option>
																		  <?php foreach($groupListInfo as $k=>$v) { ?>
																		  <option value="<?php echo $v->id; ?>" ><?php echo $v->group_name; ?></option>	
																		  <?php } ?>																									
																		</select>																	   		
																	 </div>
																 </div>
																 
																 <div class="form-group">
																		  <label class="control-label col-sm-5 " for="email">Section :</label>
																		  <div class="col-sm-7 paddingZero">
																				<select class="form-control" name="section_id" id="section_id">
																				  <option value="">Select Section </option>
																				  <?php foreach($sectionListInfo as $k=>$v) { ?>
																				  <option value="<?php echo $v->id; ?>" ><?php echo $v->section_name; ?></option>	
																				  <?php } ?>																									
																				</select>					   		
																			</div>
																	</div>
																	
																	
																 <div class="form-group">
																	  <label class="control-label col-sm-5 " for="report_type">Report Type :</label>
																	  <div class="col-sm-7 paddingZero">
																			<select class="form-control" name="report_type" id="report_type">
																			  <option value="">Select Report Type </option>
																			  <option value="present" >Present</option>	
																			  <option value="absent" >Absence</option>	
																			  <option value="both" >Both</option>	
																			</select>																	   		
																	 </div>
																 </div>
																 
																 
															  </div>
																 
															 <div class="col-md-6" style="padding-top:6px;">
																   <div class="form-group">
																	  <label class="control-label col-sm-5 " for="email">Class :</label>
																	  <div class="col-sm-7 paddingZero">
																			<select class="form-control" name="class_id" id="class_id">
																			  <option value="">Select Class </option>
																			  <?php foreach($classListInfo as $k=>$v) { ?>
																			 <option value="<?php echo $v->id; ?>" ><?php echo $v->class_name; ?></option>	
																			 <?php } ?>																									
																			</select>																	   		
																	 </div>
																 </div>
																 
																<div class="form-group">
																		  <label class="control-label col-sm-5 " for="email">Shift :</label>
																		  <div class="col-sm-7 paddingZero">
																				<select class="form-control" name="shift_id" id="shift_id">
																				  <option value="">Select Shift </option>
																				  <?php foreach($shiftListInfo as $k=>$v) { ?>
																				 <option value="<?php echo $v->id; ?>" ><?php echo $v->shift_name; ?></option>	
																				 <?php } ?>																									
																				</select>		
																			</div>
																	</div>	
																	 
																<div class="form-group">
																	  <label class="control-label col-sm-5 " for="email">Year :</label>
																	  <div class="col-sm-7 paddingZero">
																			<select class="form-control" name="year" id="year">
																				  <option value="">Select Year </option>
																				  <?php for ($year = date('Y'); $year > date('Y')-5; $year--) { ?>
																				  <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
																				  <?php } ?>
																			</select>		
																		</div>
																	</div>
																	
																<div class="form-group">
																		  <label class="control-label col-sm-5 " for="attendenceDate">Attendence Date :</label>
																		  <div class="col-sm-7 paddingZero">
																		  <input type="text" name="attendenceDate" id="attendenceDate" class="form-control date-picker"  placeholder="YYY-MM-DD">																																								  		
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
														Show
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


</script>