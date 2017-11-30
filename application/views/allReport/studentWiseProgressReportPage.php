
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
							<a href="<?php echo site_url('allReport'); ?>">Report</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('allReport/resultReportModule'); ?>">Result Report</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('allReport/studentWiseProgressReport'); ?>">Student Wise Progress Result Report</a>
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
											<h3 class="widget-title"><strong>Student Wise Progress Result Report</strong></h3>
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
														<form target="_blank" class="form-horizontal"  role="form" action="<?php echo site_url('allReport/studentWiseProgressReportAction
'); ?>"  enctype="multipart/form-data" method="post">	
														<div class="scroll-content">
															   <div class="content img-thumbnail container">
														 
																   <div class="form-group" style="padding:20px 0 20px 0; border-bottom:1px solid #CCCCCC;">
																	  <label class="control-label col-sm-2" for="student_id">Student Id :</label>
																	 <div class="col-sm-4">
																			<input type="text" class="form-control" name="student_id" id="student_id" placeholder="Enter Student Id" value=""/>
																	  </div>
																	  <label class="control-label col-sm-2" for="year">Year :</label>
																	  <div class="col-sm-4">
																			<select class="form-control" name="year" id="year">
																					  <option value="">Select Year </option>
																					  <?php for ($year = date('Y'); $year > date('Y')-13; $year--) { ?>
																						<option value="<?php echo $year; ?>" <?php if($year == date('Y')) { ?> selected="selected" <?php } ?>><?php echo $year; ?></option>
																						<?php } ?>
																			</select>
																	  </div>
																	  
																	</div>
																	
																	
																	
																   
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="branch_id">Campus/Branch :</label>
																	  <div class="col-sm-4">
																			<select class="form-control branchListView" name="branch_id" id="branch_id">
																			<option value="" selected="selected" >Select Branch</option>
																				<?php foreach($branchListInfo as $k=>$v) { ?>
																				<option value="<?php echo $v->id; ?>" ><?php echo $v->branch_name; ?></option>
																				<?php } ?>
																		
																		    </select>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="section_id">Section:</label>
																	  <div class="col-sm-4 text-left">
																		<select class="form-control sectionListView" name="section_id" id="section_id">
																			<option value="" selected="selected" >Select Section </option>
																				<?php foreach($sectionListInfo as $k=>$v) { ?>
																				<option value="<?php echo $v->id; ?>" ><?php echo $v->section_name; ?></option>
																				<?php } ?>
																			</select>
																	  </div>
																	  
																	   
																	  
																	 
																	</div>
																	
																	
																	
																	<div class="form-group">
																	
																	  <label class="control-label col-sm-2" for="class_id">Class :</label>
																	  <div class="col-sm-4">
																		 <select class="form-control classListView" name="class_id" id="class_id">
																			<option value="" selected="selected" >Select Class </option>
																				<?php foreach($classListInfo as $k=>$v) { ?>
																				<option value="<?php echo $v->id; ?>" ><?php echo $v->class_name; ?></option>
																				<?php } ?>
																		
																			</select>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="shift_id">Shift :</label>
																	     <div class="col-sm-4 text-left">
																		  <select class="form-control shiftListView" name="shift_id" id="shift_id">
																			<option value="" selected="selected" >Select Shift </option>
																				<?php foreach($shiftListInfo as $k=>$v) { ?>
																				<option value="<?php echo $v->id; ?>" ><?php echo $v->shift_name; ?></option>
																				<?php } ?>
																		
																			</select>
																	  </div>
																	  
																	</div>
																	
																	<div class="form-group">
																	
																	  <label class="control-label col-sm-2" for="group_id">Group :</label>
																	  <div class="col-sm-4">
																		 <select class="form-control groupListView" name="group_id" id="group_id">
																			<option value="" selected="selected" >Select Group </option>
																				<?php foreach($groupListInfo as $k=>$v) { ?>
																				<option value="<?php echo $v->id; ?>" ><?php echo $v->group_name; ?></option>
																				<?php } ?>
																		
																			</select>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="class_roll">Clsss Roll :</label>
																	     <div class="col-sm-4 text-left">
																		 <select class="form-control" name="class_roll" id="class_roll">
																			  <option value="">Select Roll </option>
																			   <?php
																			       for($i=1; $i<=150; $i++) {
																					    if($i<10){
																						   $i = "0".$i;
																						}  
																				?>
																			  <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>	
																	          <?php } ?>																
																	    </select>		
																	  </div>
																	  
																	</div>
																	
																	<div class="form-group">
																	
																	  <label class="control-label col-sm-2" for="ad_year">Year :</label>
																	  <div class="col-sm-4 text-left">
																			<select class="form-control" name="ad_year" id="ad_year">
																			   <option value="">Select Year </option>
																			   <?php for ($year = date('Y'); $year > date('Y')-13; $year--) { ?>
																			   <option value="<?php echo $year; ?>" <?php if($year == date('Y')) { ?> selected="selected" <?php } ?>><?php echo $year; ?></option>
																			   <?php } ?>
																			</select>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="exam_type_id">Exam Type :</label>
																	     <div class="col-sm-4 text-left">
																			<select class="form-control" name="exam_type_id" id="exam_type_id" required>
																				  <option value="">Select Exam Type </option>
																				  <option value="cobineReport" >Combine Progress Report</option>
																			</select>		
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
																		Find Result.
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
});






	
$('[data-rel=tooltip]').tooltip({container:'body'});
$('[data-rel=popover]').popover({container:'body'});
</script>