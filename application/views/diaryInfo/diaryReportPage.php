
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
							<a href="<?php echo site_url('allReport'); ?>">Report</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('allReport/dairyReport'); ?>">Student Diary Information Report</a>
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
							<h3 class="widget-title"><strong>Student Diary Information Report</strong></h3>
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
										
									<div class="row reportResultListView">
										<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
											
											<div class="clearfix">
												<div class="pull-right tableTools-container"></div>
											</div>
											<div class="table-header text-left">
												<form  role="form" action="<?php echo site_url('allReport/diaryReportAction'); ?>" id="diaryReportForm">

												<div class="row">

												<div class="col-md-3" style="padding-top: 5px;">
													<div class="form-group">
														<label class="control-label col-sm-5 " for="email">Branch</label>
														<div class="col-sm-7 paddingZero">
														    <select class="form-control" name="branch_id" id="branch_id" required>
															<option value="">Select Campus*</option>
															<?php foreach($branchListInfo as $k=>$v) { ?>
															<option value="<?php echo $v->id; ?>" >
															   <?php echo $v->branch_name; ?>
															  </option>											<?php } ?>
															 </select>																	   		
														 </div>
													 </div>
												</div>
												<div class="col-md-3" style="padding-top: 5px;">
													<div class="form-group">
													  <label class="control-label col-sm-5 " for="email">Class</label>
													  <div class="col-sm-7 paddingZero">
														<select class="form-control" name="class_id" id="class_id" required>
														  <option value="">Select Class* </option>
														    <?php foreach($classListInfo as $k=>$v) { ?>
															<option value="<?php echo $v->id; ?>" >
															    <?php echo $v->class_name; ?>
															  </option>											<?php } ?>
															</select>																	   		
													 </div>
												 </div>
												</div>
												<div class="col-md-3" style="padding-top: 5px;">
													<div class="form-group">
													  <label class="control-label col-sm-5 " for="email">Group </label>
												  	<div class="col-sm-7 paddingZero">
														<select class="form-control" name="group_id" 
														  id="group_id" required="required">
														 <option value="" selected="selected" >
														    Select Group* </option>
														   <?php foreach($groupListInfo as $k=>$v) { ?>
															<option value="<?php echo $v->id; ?>" ><?php echo $v->group_name; ?></option>
															<?php } ?>
													
														</select>
													  </div>
													</div>
												</div>
												<div class="col-md-3" style="padding-top: 5px;">
													<div class="form-group">
													  <label class="control-label col-sm-5 " for="email">Section</label>
													  <div class="col-sm-7 paddingZero">
														<select class="form-control" name="section_id" id="section_id" required>
														  <option value="">Select Section*</option>
														    <?php foreach($sectionListInfo as $k=>$v) { ?>
															<option value="<?php echo $v->id; ?>" ><?php echo $v->section_name; ?></option><?php } ?>
														</select>																	   		
													 </div>
												 </div>
												</div>
												</div>


                                               <div class="row">
												<div class="col-md-3">
													<div class="form-group">
													  <label class="control-label col-sm-5 " for="email">Shift </label>
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
												<div class="col-md-3">
													<div class="form-group">
														  <label class="control-label col-sm-5 " for="email">From Date </label>
														  <div class="col-sm-7 paddingZero">
																 <input type="text" name="fromDate" id="fromDate" class="form-control date-picker"  placeholder="From">
															</div>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														  <label class="control-label col-sm-5 " for="email">To Date </label>
														  <div class="col-sm-7 paddingZero">
																 <input type="text" name="toDate" id="toDate" class="form-control date-picker"  placeholder="To">
															</div>
													</div>
												</div>

												<div class="col-md-3">
												  <div class="form-group">
												 
													<button class="btn btn-danger form-control" type="submit">Find/Show</button>
														  
												 </div>
												</div>


												</div>
													
										     </form>
										</div>

											<!-- div.table-responsive -->
	
											<!-- div.dataTables_borderWrap -->
											
										</div>
									</div>
								
									<div class="loadingPart col-md-12"><img src="<?php echo base_url('resource/img/search-loading.gif'); ?>" class="img-responsive center-block" />
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
})


$("#diaryReportForm").submit(function(e)
	{
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$('.loadingPart').css('display', 'block');
		$('.reportResultListView').css('display', 'none');
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
				$(".reportResultListView").html(data);	
				$('.loadingPart').css('display', 'none');
				$('.reportResultListView').css('display', 'block');			
			}
		});
		
		e.preventDefault();
	});



</script>