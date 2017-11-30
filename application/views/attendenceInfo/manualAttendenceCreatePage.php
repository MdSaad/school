<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<title><?php echo $title; ?></title>
		<style>
		    .emptySortStyle{
				padding-top: 50px;
				margin-top:5px;
				border-style: dashed;
				border-color: #CCCCCC;
				min-height: 150px;
				color: #CCCCCC;
				font-size: 16px; 
			
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
							<a href="<?php echo site_url('attendence'); ?>">Attentdence</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('attendence/manualAttendence'); ?>">Manual Attentdence Management</a>
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
						<h4 class="widget-title">Manual Attentdence Management</h4>
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
					
			<div id="inputTable" class="widget-body">
			 <div class="widget-main padding-4"  style="position: relative;">
				<form class="form-horizontal" id="diaryDataInsertForm" role="form" action="<?php echo site_url('attendence/menualAttendenceInput'); ?>" enctype="multipart/form-data" method="post">	
					<div class="scroll-content">
						 <div class="content img-thumbnail container">
						<div class="col-md-12" style="padding-bottom:20px">
						 <div class="row textleft">
							  <h4 class="text-left"> Manual Attentdence Management <span class="alert" style="padding-left:20px; color:#0000FF"> </span> </h4>
						 </div>
							<div class="col-md-12 img-thumbnail">
							 <div class="col-md-4" style="padding-top:6px">
								<div class="form-group">
									<label class="control-label col-sm-5" for="email">Branch :</label>
									<div class="col-sm-7 paddingZero">
										<select class="form-control" name="branch_id" id="branch_id" required>
										  <option value="">Select Campus*</option>
										   <?php foreach($branchListInfo as $k=>$v) { ?>
										   <option <?php if($branch_id == $v->id){ ?> selected="selected" <?php } ?> value="<?php echo $v->id; ?>" ><?php echo $v->branch_name; ?></option>
										   <?php } ?>																			
										   </select>																	   		
									 </div>
								 </div>
															 
								 <div class="form-group">
									  <label class="control-label col-sm-5 " for="email">Section :</label>
									  <div class="col-sm-7 paddingZero">
										<select class="form-control" name="section_id" id="section_id" required>
										  <option value="">Select Section*</option>
											<?php foreach($sectionListInfo as $k=>$v) { ?>
											<option <?php if($section_id == $v->id){ ?> selected="selected" <?php } ?> value="<?php echo $v->id; ?>" ><?php echo $v->section_name; ?></option><?php } ?>
										</select>																	   		
									 </div>
								 </div>
							 </div>
														 
							 <div class="col-md-4" style="padding-top:6px">
								  <div class="form-group">
									  <label class="control-label col-sm-5 " for="email">Class :</label>
									  <div class="col-sm-7 paddingZero">
											<select class="form-control" name="class_id" id="class_id" required>
											  <option value="">Select Class* </option>
											  <?php foreach($classListInfo as $k=>$v) { ?>
												<option <?php if($class_id == $v->id){ ?> selected="selected" <?php } ?>  value="<?php echo $v->id; ?>" ><?php echo $v->class_name; ?></option>																										<?php } ?>
											</select>																	   		
									 </div>
								 </div>
								 <div class="form-group">
									  <label class="control-label col-sm-5 " for="email">Shift :</label>
									  <div class="col-sm-7 paddingZero">
											<select class="form-control" name="shift_id" id="shift_id" required="required">
											   <option value="" selected="selected" >Select Shift* </option>
												<?php foreach($shiftListInfo as $k=>$v) { ?>
												<option <?php if($shift_id == $v->id){ ?> selected="selected" <?php } ?> value="<?php echo $v->id; ?>" ><?php echo $v->shift_name; ?></option>
												<?php } ?>
										
											</select>
										</div>
								</div>
								
							 </div>
							 
							 <div class="col-md-4" style="padding-top:6px">
							 <div class="form-group">
								  <label class="control-label col-sm-5 " for="email">Group :</label>
							  <div class="col-sm-7 paddingZero">
									<select class="form-control" name="group_id" id="group_id" required="required">
									<option value="" selected="selected" >Select Group* </option>
										<?php foreach($groupListInfo as $k=>$v) { ?>
										<option <?php if($group_id == $v->id){ ?> selected="selected" <?php } ?> value="<?php echo $v->id; ?>" ><?php echo $v->group_name; ?></option>
										<?php } ?>
								
									</select>
								</div>
							</div>
							 <div class="form-group">
								  <label class="control-label col-sm-5 " for="email">Date* :</label>
								  <div class="col-sm-7 paddingZero">
										<input type="text" name="date" id="date" class="form-control date-picker"  placeholder="Date" value="<?php echo $date ?>">
									</div>
							</div>
								
							 </div>
							 
							
							
							<div id="initiateMove" class="col-md-12 text-center" style="padding-bottom:10px">
							   <button class="btn btn-sm btn-primary" id="initiate">
									<i class="ace-icon fa fa-check"></i>
									 Initiate 
								</button>
							</div>
							
							 
						</div>	
						
						</form>
						
						 </div>
						 
						
						
					  <div class="col-md-12" style=""> 
						<form class="form-horizontal" id="diaryDataInsertForm" role="form" action="<?php echo site_url('attendence/menualAttendenceCreateAction'); ?>" enctype="multipart/form-data" method="post">	
							<input type="hidden" name="branchId" value="<?php echo $branch_id ?>" />
							<input type="hidden" name="classId" value="<?php echo $class_id ?>" />
							<input type="hidden" name="groupId" value="<?php echo $group_id ?>" />
							<input type="hidden" name="sectionId" value="<?php echo $section_id ?>" />
							<input type="hidden" name="shiftId" value="<?php echo $shift_id ?>" />
							<input type="hidden" name="attenYear" value="<?php echo $findYear ?>" />
							<input type="hidden" name="monthYear" value="<?php echo $monthYear ?>" />
							<input type="hidden" name="date" value="<?php echo $date ?>" />
							
							 <?php if(!empty($validationText)){ ?>
							    <div class="emptySortStyle text-cenbter"> <?php echo $validationText ?></div>
							 <?php }else{ ?>
							    <div class="row" style="padding-top:20px">
								 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-condensed table-bordered">
								  <thead>
								  <tr>
									<th width="5%" align="left" valign="middle">Sl No </th>
									<th width="23%" align="left" valign="middle">Student Name </th>
									<th width="14%" align="left" valign="middle">ID</th>
									<th width="14%" align="left" valign="middle">Class</th>
									<th width="15%" align="left" valign="middle">Group </th>
									<?php if(!empty($chkAttnData)){ ?>
									  <th width="15%" align="left" valign="middle">Previous Status </th>
									<?php } ?>
									<th width="14%" align="left" valign="middle">Action  </th>
									
								  </tr>
								  </thead>
								  <tbody>
								  <?php

									    $chkWholeAttnDate  = $this->M_crud->findById('attendence_information', array('branch_id' => $branch_id, 'class_id' => $class_id, 'group_id' => $group_id, 'section_id' => $section_id, 'date' => $date));
									   
			


								       $i = 1;
									   foreach($studentList as $v){ 
									   $chkAttnDate  = $this->M_crud->findById('attendence_information', array('student_auto_id' => $v->stu_auto_id, 'date' => $date));
								   ?>
									  <tr align="center" valign="middle">
										<td align="left" valign="middle"><?php  echo $i++ ?></td>
										<td align="left" valign="middle"><?php echo  $v->stu_full_name ?></td>
										<td align="left" valign="middle"><?php echo  $v->stu_id ?></td>
										<td align="left" valign="middle"><?php echo  $v->class_name ?></td>
										<td align="left" valign="middle"><?php echo $v->group_name ?></td>
										<?php if(!empty($chkWholeAttnDate)){ ?>
										<td align="left" valign="middle">
										   <?php 
										        if(!empty($chkAttnDate)){
											        if($chkAttnDate->action =='present'){ ?>
											        	<span class="label label-success arrowed-in arrowed-in-right">Present</span>
												    <?php }else if($chkAttnDate->action =='absent'){ ?>
												    	<span class="label label-danger arrowed-in arrowed-in-right">Absent</span>
												    <?php }else{ ?>
                                                         <span class="label label-warning arrowed-in arrowed-in-right">Undefined</span>
												<?php } } else{ ?>
												    <span class="label label-warning arrowed-in arrowed-in-right">Undefined</span>
												<?php } ?>
										</td>
											 
										<?php } ?>
										<td align="left" valign="middle">
										    <input type="hidden" name="updateId[]" value="<?php if(!empty($chkAttnDate)) echo $chkAttnDate->id; ?>" >
											<input type="hidden" name="stu_id[]" value="<?php echo $v->stu_auto_id; ?>" >
										    <select class="form-control" name="action_type[]" required="required">
												<option selected="selected"  value="present" >Present</option>
												<option <?php if(!empty($chkAttnDate)){ if($chkAttnDate->action =='absent') echo 'selected'; } ?> value="absent" >Absent</option>

												<option <?php if((!empty($chkWholeAttnDate) && empty($chkAttnDate)) || !empty($chkAttnDate) && $chkAttnDate->action =='undefined'){ echo 'selected'; } ?> value="undefined" >Undefined</option>

											</select>
										</td>
										
									</tr>
								   <?php } ?>
								   
								  </tbody>
							  </table>
							  
							   <button class="btn btn-sm btn-success  pull-right normalSubmit" type="submit" style="margin-right: 10px;">
								   <i class="ace-icon fa fa-check"></i>
								   Submit
							   </button>
							   <div class="pull-right loadingPart"><img src="<?php echo base_url('resource/img/search-loading.gif'); ?>" class="img-responsive center-block" /></div>
								
							  </div>
							 <?php } ?>
                            
								
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
				
		
 		<!-- End Part of Modal For Add New Section -->
				
	  <?php $this->load->view('common/footer'); ?>

     <!-- Reset Attendence Modal start -->
	  <div class="modal fade" id="attendenceDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">				
					
				</div>
			</div>
		</div>
  <!-- Reset Attendence Modal end -->

				
	</body>
</html>


<script>

$('.date-picker').datepicker({
	autoclose: true,
	todayHighlight: true,
	format: 'yyyy-mm-dd',
});



		
		

	
</script>