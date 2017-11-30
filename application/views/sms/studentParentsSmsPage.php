
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
							<a href="<?php echo site_url('smsManagementModule'); ?>">SMS Management</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('smsManagementModule/studentParentsSms'); ?>">Student Parents SMS</a>
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
											<h3 class="widget-title"><strong>Student Parents SMS Management</strong></h3>
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
														<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('smsManagementModule/studentParentsMessageAction'); ?>" enctype="multipart/form-data" method="post">							
														<div class="content img-thumbnail container">
														  <?php if(!empty($successAlert)){ ?>
														    <div class="alert alert-block alert-success" id="">
																<button class="close" data-dismiss="alert" type="button">
																<i class="ace-icon fa fa-times"></i>
																</button>
																<strong class="green">
																<i class="ace-icon fa fa-check-square-o"></i>
																
																</strong>
																<span class="alrtText">SMS Send Successfully. Send Again</span>
															</div>
															
														<?php } ?>
																
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
																	  <label class="control-label col-sm-2" for="branc_id">Campus/Branch :</label>
																	  <div class="col-sm-4">
																			<select class="form-control branchListView" name="branc_id" id="branc_id">
																			<option value="" selected="selected" >Select Branch</option>
																				<?php foreach($branchListInfo as $k=>$v) { ?>
																				<option value="<?php echo $v->id; ?>" ><?php echo $v->branch_name; ?></option>
																				<?php } ?>
																		
																		    </select>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="class_section_id">Section:</label>
																	  <div class="col-sm-4 text-left">
																		<select class="form-control sectionListView" name="class_section_id" id="class_section_id">
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
																	  
																	  <label class="control-label col-sm-2" for="class_shift_id">Shift :</label>
																	     <div class="col-sm-4 text-left">
																		  <select class="form-control shiftListView" name="class_shift_id" id="class_shift_id">
																			<option value="" selected="selected" >Select Shift </option>
																				<?php foreach($shiftListInfo as $k=>$v) { ?>
																				<option value="<?php echo $v->id; ?>" ><?php echo $v->shift_name; ?></option>
																				<?php } ?>
																		
																			</select>
																	  </div>
																	  
																	</div>
																	
																	<div class="form-group">
																	
																	  <label class="control-label col-sm-2" for="class_group_id">Group :</label>
																	  <div class="col-sm-4">
																		 <select class="form-control groupListView" name="class_group_id" id="class_group_id">
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
																			   <?php for($i=1; $i<=150; $i++) { ?>
																			  <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>	
																	          <?php } ?>																
																	    </select>		
																	  </div>
																	  
																	</div>
																	
																	<div class="form-group">
																	
																	  <label class="control-label col-sm-2" for="ad_year"></label>
																	  <div class="col-sm-4">
																		
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="ad_year">Year :</label>
																	     <div class="col-sm-4 text-left">
																			<select class="form-control" name="ad_year" id="ad_year">
																			   <option value="">Select Year </option>
																			   <?php for ($year = date('Y'); $year > date('Y')-13; $year--) { ?>
																			   <option value="<?php echo $year; ?>" <?php if($year == date('Y')) { ?> selected="selected" <?php } ?>><?php echo $year; ?></option>
																			   <?php } ?>
																			</select>
																	  </div>
																	  
																	</div>
																	<div class="form-group" style="padding:20px 0 20px 0;border-top:1px solid #CCCCCC;">
																	  <div class="col-sm-6 text-left">
																	    <label class="pos-rel">
																			<input name="sendto_student" id="sendto_student" class="ace" type="checkbox" value="Student">
																			<span class="lbl"></span>
																			</label> Student &nbsp;&nbsp;&nbsp;
																			
																			<label class="pos-rel">
																			<input name="sendto_father" id="sendto_father" class="ace" type="checkbox" value="Father">
																			<span class="lbl"></span>
																			</label>
																	    Father &nbsp;&nbsp;&nbsp;
																		
																		<label class="pos-rel">
																			<input name="sendto_mother" id="sendto_mother"  class="ace" type="checkbox" value="Mother">
																			<span class="lbl"></span>
																			</label>
																	   Mother &nbsp;&nbsp;&nbsp; 
																	   
																	    <label class="pos-rel">
																			<input name="sendto_guardian" id="sendto_guardian" class="ace" type="checkbox" value="Guardian">
																			<span class="lbl"></span>
																			</label>
																	     Guardian
																	     
																	 </div>
																	 <div class="col-sm-6 text-left"></div>
																	 <div class="col-sm-12 text-left send" style="color:#FF0000">
																	    
																	 </div>
																	
																	 
																	</div> 
																	
																	
																	<div class="form-group">
																	  <div class="col-sm-12">
																	     <textarea class="form-control" name="msg" id="msg" placeholder="Type a messege" required></textarea>
																	 </div>
																	</div>
																	
																	
																	  <div class="modal-footer">
																	  	
																		<button class="btn btn-sm btn-danger formCancel" type="button">
																			<i class="ace-icon fa fa-times"></i>
																			Cancel
																		</button>
																		<button class="btn btn-sm btn-primary" type="submit">
																			<i class="ace-icon fa fa-check"></i>
																			<span class="update"> Submit </span>
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


$("#addForm").submit(function(e){
 
 if($("#sendto_student").is(':checked') || $("#sendto_father").is(':checked') || $("#sendto_mother").is(':checked') || $("#sendto_guardian").is(':checked')){
 $('.send').text(" "); 
  return true;
    
 }else{
 $('.send').text("Please Select a Checkbox to send sms"); 
	return false;
  
 }
 
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


$('[data-rel=tooltip]').tooltip({container:'body'});
$('[data-rel=popover]').popover({container:'body'});
</script>