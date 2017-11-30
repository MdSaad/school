
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
							<a href="<?php echo site_url('resultSubModule'); ?>">Result</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('resultSubModule/examSystem'); ?>">Exam System</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('resultSubModule/examMarksManage'); ?>">Exam Mark's Manage</a>
					</div>
				</div>	
	</div>
				
				<div class="col-md-11 col-lg-11">
					<div class="row">
					<div class="col-md-2 col-sm-2 col-lg-2">
						
						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 interfaceBody headerBox3">
						<div class="row text-center">
								<!-- PAGE CONTENT BEGINS -->
								

								<!-- /.row -->
								  <div id="widget-container-col-11" class="col-md-12 col-xs-12 col-sm-12 col-lg-12 widget-container-col ui-sortable addFormContent" style="min-height: 172px; display:block">
									<div id="widget-box-11" class="widget-box widget-color-dark ui-sortable-handle" style="opacity: 1;">
										<div class="widget-header">
											<h4 class="widget-title">Exam Mark's Manage</h4>
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
																		 <div class="content">
																		<div class="col-md-12">
																		 		<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('resultSubModule/initialSubject'); ?>" enctype="multipart/form-data" method="post">	
																				 <div class="col-md-12 img-thumbnail  initialPart">
																							
																						 <div class="col-md-6">
																							<div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Campus/Branch :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="branch_id" id="branch_id" required>
																												  <option value="">Select Campus</option>
																												  <?php foreach($branchListInfo as $k=>$v) { ?>
																													<option value="<?php echo $v->id; ?>" ><?php echo $v->branch_name; ?></option>																										<?php } ?>
																										</select>																	   		
																								 </div>
																							 </div>
																							 
																							 
																							 
																							 
																							 <div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Group :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="group_id" id="group_id" required>
																												  <option value="">Select Group</option>
																												  <?php foreach($groupListInfo as $k=>$v) { ?>
																													<option value="<?php echo $v->id; ?>" ><?php echo $v->group_name; ?></option>																										<?php } ?>
																													
																												  																									
																										</select>																	   		
																								 </div>
																							 </div> 
																							 
																							 
																							
																							
																						  </div>
																						 
																						 <div class="col-md-6">
																							 <div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Class :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="class_id" id="class_id" required>
																												  <option value="">Select Class </option>
																												  <?php foreach($classListInfo as $k=>$v) { ?>
																													<option value="<?php echo $v->id; ?>" ><?php echo $v->class_name; ?></option>																										<?php } ?>
																										</select>																	   		
																								 </div>
																							 </div>
																							 
																							 
																							 
																							 <div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Year :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="year" id="year" required>
																												  <option value="">Select Year </option>
																												  <?php for ($year = date('Y'); $year > date('Y')-5; $year--) { ?>
																													<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
																													<?php } ?>
																										</select>		
																									</div>
																							</div>
																							 
																							 
																							
																							<div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Exam Type :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control branchListView" name="exam_type_id" id="exam_type_id" required="required">
																												<option value="" selected="selected" >Select Exam Type</option>
																										 </select>		
																									</div>
																							</div>
																							
																						 </div>
																						
																						<button class="btn btn-xs btn-danger pull-right initialize" type="submit"s>
																							<i class="ace-icon fa fa-bolt bigger-110"></i>
																							<span class="initialAgain">Subject.</span>
																							<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
																						</button>
																						<div class="pull-right loadingPart"><img src="<?php echo base_url('resource/img/search-loading.gif'); ?>" class="img-responsive center-block" /></div>
																					</div>	
																			 </form>
																		</div>
																	</div>
																	
																	  <!-- <div class="modal-footer displayNone">
																	  	
																		<button class="btn btn-sm btn-danger formCancel" type="button">
																			<i class="ace-icon fa fa-times"></i>
																			Cancel
																		</button>
																		<button class="btn btn-sm btn-primary" type="submit">
																			<i class="ace-icon fa fa-check"></i>
																			Submit
																		</button>
																	</div> -->
																	<div class="listView">
																			
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
	
$("#branch_id, #class_id, #year").on('change', function()
 {
	var branch_id = $('#branch_id').val();
	var class_id  = $('#class_id').val();
	var year  = $('#year').val();
	
	var formURL = "<?php echo site_url('resultSubModule/changeExamType'); ?>";
	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : {branch_id:branch_id, class_id:class_id, year:year},
		success:function(data){
			$('#exam_type_id').html(data);
			
		}
	});
});


$("#addForm").submit(function(e)
{
	var postData = $(this).serializeArray();
	var formURL = $(this).attr("action");
	
	$('.loadingPart').css('display', 'block');
	$('.listView').css('display', 'none');
	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : postData,
		success:function(data){
			$(".listView").html(data);				
			$('.initialAgain').text('Again Find Subject');
			$('.loadingPart').css('display', 'none');
			$('.listView').css('display', 'block');
		}
	});
	
	e.preventDefault();
});
</script>
