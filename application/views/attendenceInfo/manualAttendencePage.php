
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
					
	<div class="widget-body">
	 <div class="widget-main padding-4"  style="position: relative;">
		<form class="form-horizontal" role="form" action="<?php echo site_url('attendence/menualAttendenceInput'); ?>" enctype="multipart/form-data" method="post">	
			<div class="scroll-content">
				 <div class="content img-thumbnail container">
				<div class="col-md-12">
				 <div class="row textleft">
					 <div class="col-md-6"><h4 class="text-left"> Manual Attentdence Management <span class="alert" style="padding-left:20px; color:#0000FF"> </span> </h4></div>

				    <div class="col-md-6 text-left"><h4 style="color:blue"><?php if(!empty($msg)) echo $msg; ?> </h4></div>
				 </div>
					<div class="col-md-12 img-thumbnail">
					 <div class="col-md-4" style="padding-top:6px">
						<div class="form-group">
							<label class="control-label col-sm-5 " for="email">Branch :</label>
							<div class="col-sm-7 paddingZero">
							    <select class="form-control" name="branch_id" id="branch_id" required>
											  <option value="">Select Campus*</option>
											  <?php foreach($branchListInfo as $k=>$v) { ?>
												<option value="<?php echo $v->id; ?>" ><?php echo $v->branch_name; ?></option>																										<?php } ?>
								 </select>																	   		
							 </div>
						 </div>
													 
						 <div class="form-group">
							  <label class="control-label col-sm-5 " for="email">Section :</label>
							  <div class="col-sm-7 paddingZero">
								<select class="form-control" name="section_id" id="section_id" required>
								  <option value="">Select Section*</option>
								    <?php foreach($sectionListInfo as $k=>$v) { ?>
									<option value="<?php echo $v->id; ?>" ><?php echo $v->section_name; ?></option><?php } ?>
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
												<option value="<?php echo $v->id; ?>" ><?php echo $v->class_name; ?></option>																										<?php } ?>
									</select>																	   		
							 </div>
						 </div>
						 <div class="form-group">
							  <label class="control-label col-sm-5 " for="email">Shift :</label>
							  <div class="col-sm-7 paddingZero">
									<select class="form-control" name="shift_id" id="shift_id" required="required">
									   <option value="" selected="selected" >Select Shift* </option>
										<?php foreach($shiftListInfo as $k=>$v) { ?>
										<option value="<?php echo $v->id; ?>" ><?php echo $v->shift_name; ?></option>
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
								<option value="<?php echo $v->id; ?>" ><?php echo $v->group_name; ?></option>
								<?php } ?>
						
							</select>
						</div>
					</div>
					 <div class="form-group">
						  <label class="control-label col-sm-5 " for="email">Date* :</label>
						  <div class="col-sm-7 paddingZero">
								<input type="text" name="date" id="date" class="form-control date-picker"  placeholder="Date" required>
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
			</div>
		</div>
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
  <?php $this->load->view('common/footer'); ?>
				
	</body>
</html>


<script>
     $('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd',
	 });
</script>