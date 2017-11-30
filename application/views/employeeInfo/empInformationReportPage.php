
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
							<a href="<?php echo site_url('allReport'); ?>">Report</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('hrReport'); ?>">HR Report</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('hrReport/empInformationReport'); ?>">Employee Information List Report</a>&nbsp;&nbsp;
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
											<h3 class="widget-title"><strong>Employee Information List Report</strong></h3>
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
																<div class="table-header text-left" style="height:45px">
																	
																	<form class="form-inline pull-left" role="form" action="#" id="findReportResultList">
																	    <div class="form-group">
																		  Search By :
																		</div>
																		<div class="form-group">
																		  <label for="email"></label>
																		  <select class="form-control" name="domain_id" id="domain_id" required="required">
																			<option value="" selected="selected" >Select Domain </option>
																			<?php foreach($domainListInfo as $v){ ?>
																			  <option value="<?php echo $v->id ?>" ><?php echo $v->domain_name ?> </option>
																			<?php } ?>
																			</select>
																		</div>
																		
																		<div class="form-group">
																		  <label for="email"></label>
																		  <select class="form-control departmentListView" name="department_id" id="department_id">
																			<option value="" selected="selected" >Select Department </option>
																			</select>
																		</div>
																		<div class="form-group">
																		  <label for="email"></label>
																		  <select class="form-control designitionListView" name="designition_id" id="designition_id">
																			<option value="" selected="selected" >Select Designition </option>
																			</select>
																		</div>
																		
																	  </form>
																	</div>
																	
																	<div id="reportListView">
																	</div>
															
																
															</div>
															</div>
												
														<div class="loadingPart col-md-12"><img src="<?php echo base_url('resource/img/search-loading.gif'); ?>" class="img-responsive center-block" /></div>
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

 //Domain wise Department 
		$("#domain_id").change(function() {
		var domain_id = $("#domain_id").val();			
		$.ajax({
			url : SAWEB.getSiteAction('employeeInfo/domainWiseDepartment'), // URL TO LOAD BEHIND THE SCREEN
			type : "POST",
			data : { domain_id : domain_id },
			dataType : "html",
			success : function(data) {			
				$(".departmentListView").html(data);
			}
		});
		
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
	
	
	
	//Domain wise Employee data 
		$("#domain_id").change(function() {
		var domain_id = $("#domain_id").val();			
		$.ajax({
			url : SAWEB.getSiteAction('hrReport/domainWiseEmployee'), // URL TO LOAD BEHIND THE SCREEN
			type : "POST",
			data : { domain_id : domain_id },
			dataType : "html",
			success : function(data) {			
				$("#reportListView").html(data);
			}
		});
		
	});	
	
	
	//Domain and department wise Employee data 
		$("#department_id").change(function() {
		var domain_id = $("#domain_id").val();	
		var department_id = $("#department_id").val();			
		$.ajax({
			url : SAWEB.getSiteAction('hrReport/domainWiseEmployee'), // URL TO LOAD BEHIND THE SCREEN
			type : "POST",
			data : { domain_id : domain_id, department_id : department_id },
			dataType : "html",
			success : function(data) {			
				$("#reportListView").html(data);
			}
		});
		
	});	
	
	
	
	//Domain and department and designition wise Employee data 
		$("#designition_id").change(function() {
		var domain_id 		= $("#domain_id").val();	
		var department_id 	= $("#department_id").val();		
		var designition_id 	= $("#designition_id").val();		
		$.ajax({
			url : SAWEB.getSiteAction('hrReport/domainWiseEmployee'), // URL TO LOAD BEHIND THE SCREEN
			type : "POST",
			data : { domain_id : domain_id, department_id : department_id, designition_id : designition_id},
			dataType : "html",
			success : function(data) {			
				$("#reportListView").html(data);
			}
		});
		
	});	



	
$('[data-rel=tooltip]').tooltip({container:'body'});
$('[data-rel=popover]').popover({container:'body'});
</script>