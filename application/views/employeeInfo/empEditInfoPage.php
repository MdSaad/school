
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
							<a href="<?php echo site_url('HR'); ?>">HR</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('employeeInfo/empEditInfo'); ?>">Editable</a>&nbsp;&nbsp;
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
											<h4 class="widget-title">Employee  Information Edit Manage </h4>
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
											<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('employeeInfo/empEditInfoChk'); ?>" enctype="multipart/form-data" method="post">
												<div class="scroll-content">
															<div class="content img-thumbnail container">
																	<div class="form-group" style="padding-top:10px;">
																			  <label class="control-label col-sm-4"><strong>Employee ID  :</strong></label>
																			 	    <div class="col-sm-4">
																						<input name="empID" id="empID" class="form-control" type="text" placeholder="Enter Employee ID" required="required"> <span class="label label-sm label-danger form-control emptyAlrt"></span>
																					</div>
																					
																					<div class="col-sm-2 text-left">
																						<select class="form-control" name="year" id="year">
																										  <option value="">Select Year </option>
																										  <?php for ($year = date('Y'); $year > date('Y')-100; $year--) { ?>
																											<option value="<?php echo $year; ?>" <?php if($year == date('Y')) { ?> selected="selected" <?php } ?>><?php echo $year; ?></option>
																											<?php } ?>
																								</select>
																					</div>
																					<div class="col-sm-2 text-left">
																						<button class="btn btn-sm btn-primary " type="submit">
																							Submit
																							</button>
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



<script type="text/javascript" >


$("#addForm").submit(function(e)
{
	var postData = $(this).serializeArray();
	var formURL = $(this).attr("action");
	var successUrl = '<?php echo site_url('employeeInfo/empInfoEditModule'); ?>';
	//var stuCurrentID =$('#stuCurrentID').val();
	$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
					if(data == 1) {
						location.replace(successUrl);
					} else {
						$('.emptyAlrt').text('Sorry This ID is Not Exist');
						return false;
					}
			}
		  });
	
	e.preventDefault();
});




</script>

	