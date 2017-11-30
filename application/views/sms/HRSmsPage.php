
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
							<a href="<?php echo site_url('smsManagementModule'); ?>">SMS Management</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('smsManagementModule/HRSms'); ?>">HR SMS</a>
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
											<h3 class="widget-title"><strong>HR SMS Management</strong></h3>
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
														<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('smsManagementModule/HRSmsSendAction') ?>" enctype="multipart/form-data" method="post">							
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
																   <div class="col-sm-3"></div>
																	  <label class="control-label col-sm-2" for="employee_id">Empolyee Id :</label>
																	 <div class="col-sm-4">
																			<input type="text" class="form-control" name="employee_id" id="employee_id" placeholder="Enter Empolyee Id" value=""/>
																	  </div>
																	 
																	  <div class="col-sm-3"></div>
																	</div>
																	
																	
																	
																   
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="domain_id">Domain :</label>
																	  <div class="col-sm-4">
																			<select class="form-control" name="domain_id" id="domain_id">
																				<option value="" selected="selected" >Select Domain </option>
																				<?php foreach($domainListInfo as $v){ ?>
																				  <option value="<?php echo $v->id ?>" ><?php echo $v->domain_name ?> </option>
																				<?php } ?>
																			</select>	
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="department_id">Department:</label>
																	  <div class="col-sm-4 text-left">
																		<select class="form-control departListView" name="department_id" id="department_id">
																			<option value="" selected="selected" >Select Department </option>
																		 </select>	
																	  </div>
																	  
																	   
																	  
																	 
																	</div>
																	
																	
																	
																	<div class="form-group">
																	
																	  <label class="control-label col-sm-2" for="branc_id">Branch :</label>
																	  <div class="col-sm-4">
																		 <select class="form-control branchListView" name="branch_id" id="branch_id">
																			<option value="" selected="selected" >Select Branch </option>
																		 </select>	
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="designition_id">Designition :</label>
																	     <div class="col-sm-4 text-left">
																		  <select class="form-control designitionListView" name="designition_id" id="designition_id">
																			<option value="" selected="selected" >Select Designition </option>
																		 </select>	
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

		//Domain wise department 
		$("#domain_id").change(function() {
		var domain_id = $("#domain_id").val();			
		$.ajax({
			url : SAWEB.getSiteAction('employeeInfo/domainWiseDepartment'), // URL TO LOAD BEHIND THE SCREEN
			type : "POST",
			data : { domain_id : domain_id },
			dataType : "html",
			success : function(data) {			
				$(".departListView").html(data);
			}
		});
		
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