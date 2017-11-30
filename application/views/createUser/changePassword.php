
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
							<a href="<?php echo site_url('authorize/createUser/changePassword'); ?>">Change Password</a>
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
											<h4 class="widget-title">Change Password</h4>
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
												
												<a class="formCancel" href="#">
													<i class="ace-icon fa fa-times"></i>
												</a>
												
												<!-- <a class="orange2" data-action="fullscreen" href="#">
													<i class="ace-icon fa fa-expand"></i>
												</a> -->
												</div>
										</div>
										
										<div class="widget-body ">
											<div class="widget-main padding-4"  style="position: relative;">
												<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('authorize/createUser/changePasswordAction'); ?>" enctype="multipart/form-data" method="post">
												<div class="scroll-content">
															<div class="content img-thumbnail container">
																  <input type="hidden" class="form-control" name="update_id" id="update_id"  value=""/>
																		<div class="col-md-12">
																		 <div class="col-md-6 ">
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Current Password :</label>
																			  <div class="col-sm-7">
																				   <input name="current_password" id="current_password" type="password" placeholder="Enter Current Password" class="form-control"><span class="invalidCurrentPass existAlert"></span></div>
																			</div>
																			
																		 </div>
																		 
																		 <div class="col-md-6 ">
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">New Password :</label>
																				  <div class="col-sm-7">
																						<input name="new_password" id="new_password" type="password" class="form-control" placeholder="Enter New Password">			<span class="existAlert" style=""></span>
																					</div>
																						
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Confirm New Password :</label>
																				  <div class="col-sm-7">
																						<input name="confirm_new_password" id="confirm_new_password" type="password" class="form-control" placeholder="Confirm New Password">
																						<span class="chkRepeatPass existAlert"></span>																			 
																					</div>
																				</div>
																				
																			</div>
																		</div>
																	</div>
																	
																	  <div class="modal-footer">
																	  	<?php if($this->session->usertype == "superadmin") { ?><span  class="pull-left changeProfile hand">Change Your Login Name/ID</span><?php } ?>
																		<button class="btn btn-sm btn-danger formCancel" type="button">
																			<i class="ace-icon fa fa-times"></i>
																			Cancel
																		</button>
																		<button class="btn btn-sm btn-primary" type="submit">
																			<i class="ace-icon fa fa-check"></i>
																			<span class="update">Update</span>
																		</button>
																	</div>
																	</div>
											</form>
											
												<form class="form-horizontal displayNone" id="changeProfile" role="form" action="<?php echo site_url('authorize/createUser/changeProfileAction'); ?>" enctype="multipart/form-data" method="post">
												<div class="scroll-content">
															<div class="content img-thumbnail container">
																  <input type="hidden" class="form-control" name="update_id" id="update_id"  value=""/>
																		<div class="col-md-12">
																		 <div class="col-md-6 ">
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Login Name :</label>
																			  <div class="col-sm-7">
																				   <input id="user_name" class="form-control" type="text" required="required" placeholder="Enter Login Name*" name="user_name"><span class="existUserName existAlert"></span></div>
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
																			<span class="update">Update</span>
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
				
	  <?php $this->load->view('common/footer'); ?>
				
	</body>
</html>

 <?php if(!empty($alertMsg)) { ?> 
		<div class="alert alert-block alert-danger" id="alertMsg">
			<button class="close" data-dismiss="alert" type="button">
			<i class="ace-icon fa fa-times"></i>
			</button>
			<strong class="green">
			<i class="ace-icon fa fa-check-square-o"></i>
			
			</strong>
			<span class="alrtText"><?php echo $alertMsg; ?></span>
		</div>
		<?php } ?>
			

			

 
		
         <?php //$this->load->view('common/jsLinkPage'); ?>
		 
		<!-- <script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
		</script> -->
		
			

<script type="text/javascript" >
$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy/mm/dd',
})

$('.formCancel').on('click', function() {
	$('.addFormContent').fadeOut('slow');
	$('.add_new').fadeIn('slow');
});


$("#addForm").submit(function(e)
{
	var postData = $(this).serializeArray();
	var formURL = $(this).attr("action");
	var successUrl = '<?php echo site_url('authorize/createUser/changePassword'); ?>';
	$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
				if(data == 0) {
					$(".invalidCurrentPass").text('Sorry ! Your Current Password is Incorrect. Please Type Valid Password');	
				} else {
					$("#addForm input[type='text'], input[type='hidden'], input[type='number'], input[type='email']").val("");
					location.replace(successUrl);
				}
				
			}
		  });
	
	e.preventDefault();
});


$("#current_password").on('blur', function()
{
	var current_password = $(this).val();
	var formURL = '<?php echo site_url('authorize/createUser/verifyAuthorPassword'); ?>';
	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : {current_password : current_password},
		success:function(data){
			if(data == 0) {
			$(".invalidCurrentPass").text('Sorry ! Your Current Password is Incorrect.');	
			} else {
			$(".invalidCurrentPass").text('');	
			}			
		}
	});
});
$('#new_password').on('keyup', function() {
	var new_password			= $("#new_password").val();
	var confirm_new_password		= $("#confirm_new_password").val();
	
	
	if ((confirm_new_password != "")&&(new_password != confirm_new_password)) { 
			$(".chkRepeatPass").text("Password and Confirm Password is do not match");
			$(".chkRepeatPass").css('color', 'red');
			$('.modal-footer button[type="submit"]').attr("disabled", "disabled");
	}
	else if(new_password != confirm_new_password) {
			$(".chkRepeatPass").text("");
			$('.modal-footer button[type="submit"]').attr("disabled", "disabled");
			
	} else {
			$(".chkRepeatPass").text("Password Match");
			$(".chkRepeatPass").css('color', 'green');
			$('.modal-footer button[type="submit"]').removeAttr("disabled", "disabled");
	}
	
});
		
		
$('#confirm_new_password').on('keyup', function() {
	var new_password			= $("#new_password").val();
	var confirm_new_password		= $("#confirm_new_password").val();
	if((confirm_new_password != "")&&(new_password != confirm_new_password)) {
			$(".chkRepeatPass").text("Password and Confirm Password is do not match");
			$(".chkRepeatPass").css("color", "red");
			$('.modal-footer button[type="submit"]').attr("disabled", "disabled");
	} else if((confirm_new_password == "")&&(new_password !="")){ 
			$(".chkRepeatPass").text("");
			$('.modal-footer button[type="submit"]').attr("disabled", "disabled");
			
	} else {
			$(".chkRepeatPass").text("Password Match");
			$(".chkRepeatPass").css('color', 'green');
			$('.modal-footer button[type="submit"]').removeAttr("disabled", "disabled");
	}
	
  });
 
 $('.changeProfile').on('click', function() {
 	$('#changeProfile').css('display', 'block');
	$('#addForm').css('display', 'none');
	$('.widget-title').text('Change User ID/Login Name');
 });
 
 $("#user_name").on('keyup', function()
{
	var user_name = $(this).val();
	var formURL = '<?php echo site_url('authorize/createUser/chkAuthorExist'); ?>';
	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : {user_name : user_name},
		success:function(data){
			if(data == 0) {
			$(".existUserName").text('Sorry ! This User Name Already Exis. Please Chose Another.');	
			$('.modal-footer button[type="submit"]').attr("disabled", "disabled");
			} else {
			$(".existUserName").text('');	
			$('.modal-footer button[type="submit"]').removeAttr("disabled", "disabled");
			}			
		}
	});
}); 
</script>