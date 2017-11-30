
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
							<a href="<?php echo site_url('allReport'); ?>">Report</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('hrReport'); ?>">HR Report</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('hrReport/trainingReport'); ?>">Employee Training Report</a>&nbsp;&nbsp;
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
										<h3 class="widget-title"><strong>Employee Training Report</strong></h3>
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
												<form target="_blank" class="form-horizontal" id="attendenceReportForm" role="form" action="<?php echo site_url('hrReport/trainingReportAction'); ?>" enctype="multipart/form-data" method="get">	
												<div class="scroll-content">
													<div class="content img-thumbnail container" style="width: 100%">
														<div class="row">
															<div class="form-group">
																  <label class="control-label col-sm-4"><strong>Employee ID  :</strong></label>
																  <div class="col-sm-5">
																			<input name="empID" id="empID" class="form-control" type="text" placeholder="Enter Employee ID">
																		</div>																			  
																  </div>
																</div>
														<div class="col-md-12">
														 <div class="col-md-12 img-thumbnail">
															 <div class="col-md-6" style="padding-top:6px;">
																<div class="form-group">
																	 <label class="control-label col-sm-5 " for="domain_id">Domain :</label>
																	  <div class="col-sm-7 paddingZero">
																		 <select class="form-control" name="domain_id" id="domain_id">
																			<option value="" selected="selected" >Select Domain </option>
																			<?php foreach($domainListInfo as $v){ ?>
																			  <option value="<?php echo $v->id ?>" ><?php echo $v->domain_name ?> </option>
																			<?php } ?>
																		</select>																		   		
																	 </div>
																 </div>
																 
																 
																<div class="form-group">
																		  <label class="control-label col-sm-5 " for="designition_id">Designition :</label>
																		  <div class="col-sm-7 paddingZero">
																				<select class="form-control designitionListView" name="designition_id" id="designition_id">
																				  <option value="" selected="selected" >Select Designition </option>
																			    </select>					   		
																		</div>
																	</div>
																	
																	
																	
															
																 
																  
																	
															  </div>
																 
															 <div class="col-md-6" style="padding-top:6px;">
																  <div class="form-group">
																	 <label class="control-label col-sm-5 " for="branch_id">Branch :</label>
																	  <div class="col-sm-7 paddingZero">
																		 <select class="form-control branchListView" name="branch_id" id="branch_id">
																			<option value="" selected="selected" >Select Branch </option>
																		 </select>														   		
																	 </div>
																 </div>
																 
																 <div class="form-group">
																		  <label class="control-label col-sm-5 " for="email">Date Range :</label>
																		  <div class="input-group col-sm-7 paddingZero">
																		   <input type="text" name="fromDate" id="fromDate"  class="form-control date-picker" placeholder="YYYY-MM-DD" required>
																		  <span class="input-group-addon" id="basic-addon1">To</span>
																		  <input type="text" class="form-control date-picker" name="toDate" id="toDate" placeholder="YYYY-MM-DD" required>
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




$('.add_new').on('click', function() {
	$('.add_new').fadeOut("slow");
	$('.addFormContent').fadeIn("slow");
});

$('.formCancel').on('click', function() {
	$('.addFormContent').fadeOut('slow');
	$('.add_new').fadeIn('slow');
});





//Domain wise Designition 
		$("#domain_id").change(function() {
		var domain_id = $("#domain_id").val();			
		$.ajax({
			url : SAWEB.getSiteAction('employeeInfo/domainWiseDesignition'), // URL TO LOAD BEHIND THE SCREEN
			type : "POST",
			data : { domain_id : domain_id },
			dataType : "html",
			success : function(data) {			
				$(".designitionListView").html(data);
			}
		});
		
	});	
	
	//Domain wise Branch 
		$("#domain_id").change(function() {
		var domain_id = $("#domain_id").val();			
		$.ajax({
			url : SAWEB.getSiteAction('employeeInfo/domainWiseBranch'), // URL TO LOAD BEHIND THE SCREEN
			type : "POST",
			data : { domain_id : domain_id },
			dataType : "html",
			success : function(data) {			
				$(".branchListView").html(data);
			}
		});
		
	});	
	
	</script>