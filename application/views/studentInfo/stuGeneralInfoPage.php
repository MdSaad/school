<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $title; ?></title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<script type="text/javascript" language="javascript" src="<?php echo site_url('adapter/javascript'); ?>"></script>
	</head>
			
            <?php $this->load->view('common/header'); ?>
            
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						
					   <ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?php echo site_url('adminHome'); ?>">Home</a>
							</li>
							<li class="active">Students Report</li>
							<li class="active">General Report</li>
						</ul><!-- /.breadcrumb -->
						
						<!-- /.nav-search -->
						
								
					</div>

					<div class="page-content">
					
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="row">
							<div class="col-xs-12 text-center">
								<!-- PAGE CONTENT BEGINS -->
								

								<!-- /.row -->

						
								  
								  <div id="widget-container-col-11" class="col-md-11 col-xs-12 col-sm-12 col-lg-11 widget-container-col ui-sortable addFormContent" style="min-height: 172px; display:block">
									<div id="widget-box-11" class="widget-box widget-color-dark ui-sortable-handle" style="opacity: 1;">
										<div class="widget-header">
											<h4 class="widget-title">Student General Report </h4>
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
											<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('stuGeneralReport/stuGeneralReportDetails'); ?>" enctype="multipart/form-data" method="post">	
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
																								  <tr>
																									<td><label class="pos-rel">
																									<input type="checkbox" class="ace" id="stuEssentialInfo" name="stuEssentialInfo" />
																									<span class="lbl"></span></label></td>
																									<td>&nbsp;</td>
																									<td>Students Essential Information </td>
																								  </tr>
																								  <tr>
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
												
												  
												</div>
											</div>
										</div>
									</div>
									
								
								  
								  
								  <div id="reportModal" class="modal fade-in" tabindex="-1">
									<div class="modal-dialog reportView modal-lg">
										<div class="modal-content">
											<span class="fa fa-circle-o-notch fa-spin fa-3x text-primary"></span><span class="h4">Loading</span>
										 </div>
									</div><!-- /.modal-dialog -->
								</div>
								

								<!-- /.row -->

								

								<!-- /.row -->

								<!-- PAGE CONTENT ENDS -->
							</div>
							
					<!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
		
         <?php $this->load->view('common/footer'); ?>
         <?php $this->load->view('common/jsLinkPage'); ?>
		 
		<!-- <script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
		</script> -->
		
<script type="text/javascript" >
$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy/mm/dd',
})



$("#addForm").submit(function(e)
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

$('.formCancel').on('click', function() {
	$('.addFormContent').fadeOut('slow');
	$('.add_new').fadeIn('slow');
});
</script>



