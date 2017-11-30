<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<title><?php echo $title; ?></title>
		<?php //$this->load->view(''); ?>
	</head>
	
	<body>
	<div class="col-md-11 col-lg-11 headerBox">
	  <?php $this->load->view('common/chatHeader'); ?>
		
				<div class="row">
					<div class="col-md-2 col-sm-2 col-lg-2 leftBox">
							<a href="<?php echo site_url('livechatLogin'); ?>" > Home </a>
						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 headerBox2">
							Online ERP System
					</div>
				</div>	
	</div>
				
				<div class="col-md-11 col-lg-11">
					<div class="row">
					<div class="col-md-2 col-sm-2 col-lg-2 "></div>
					   <div class="col-md-10 col-sm-10 col-lg-10 interfaceBody ">
							<div class="row text-center">
								<!-- PAGE CONTENT BEGINS -->
								<!-- /.row -->
								  <div id="widget-container-col-11" class="col-md-12 col-xs-12 col-sm-12 col-lg-12 widget-container-col ui-sortable addFormContent" style="min-height: 172px; display:block">
									<div id="widget-box-11" class="widget-box widget-color-dark ui-sortable-handle" style="opacity: 1;">
										<div class="widget-header">
											<h3 class="widget-title"><strong>Live Chat User Registration Form</strong></h3>
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
														<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('livechatLogin/registrationAction'); ?>" enctype="multipart/form-data" method="post">							<div class="content img-thumbnail container">
																  
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="full_name">User Full Name* :</label>
																	  <div class="col-sm-4">
																			<input type="text" class="form-control" name="full_name" id="full_name" placeholder="Enter Full Name*" required="required"/>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" > User Type* :</label>
																	  <div class="col-sm-4">
																			<select class="form-control" name="user_type" id="user_type" required="required">
																			<option value="">Select User Type* </option>
																			<option value="teacher" >Teacher</option>
																			<option value="student" >Student</option>
																			<option value="adminStaff" >Admin Staff</option>
																			<option value="other" >Other People</option>
																		
																		 </select>
																	  </div>
																	</div>
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="user_name">User Name :</label>
																	  <div class="col-sm-4">
																			<input required="required" type="text" class="form-control" name="user_name" id="user_name" placeholder="Enter User Name*"/>
																			<span class="exAlert" style="color:#FF0000"></span>
																	  </div>
																	  
																	   <label class="control-label col-sm-2" for="password">Password :</label>
																	     <div class="col-sm-4">
																			<input required="required" type="password" class="form-control" name="password" id="password" placeholder="Enter Password*" value=""/>
																	  </div>
																	</div>
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="email">Email :</label>
																	  <div class="col-sm-4">
																		<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email*" value=""/>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="gender">Sex/Gender :</label>
																	  <div class="col-sm-4">
																		<select class="form-control" name="gender" id="gender">
																			<option value="" selected="selected" >Select Gender* </option>
																			<option value="M">Male</option>
																			<option value="F">Female</option>
																		</select>
																	  </div>
																	  
																	</div>
																	
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-2">User Status :</label>
																	  <div class="col-sm-4">
																		<select class="form-control" name="user_status" id="user_status">
																			<option value="">Select Status </option>
																			<option value="active">Active</option>
																			<option value="In-active">In Active</option>
																		 </select>
																	  </div>
																	  
																	  
																	  <label class="control-label col-sm-2" for="user_photo">User Photo:</label>
																	  
																	  <div class="col-sm-4">
																			<div class="attachmentbody" data-type="user_photo" data-target="#user_photo">
																				<img class="upload " src="<?php echo base_url('resource/img/no_image.png'); ?>">
																			</div>
																			<input id="user_photo" type="hidden" value="" name="user_photo">
																			
																		</div>
																	</div>
																	
																  <div class="modal-footer">
																	
																	<button class="btn btn-sm btn-danger formCancel" type="button">
																		<i class="ace-icon fa fa-times"></i>
																		Cancel
																	</button>
																	<button class="btn btn-sm btn-primary regButon" type="submit">
																		<i class="ace-icon fa fa-check"></i>
																		<span class="update"> Submit </span>
																	</button>
																</div>
																</div>
												</form>
												
												
														<div class="alert alert-block alert-success afterSubmitContent" id="">
																<button class="close" data-dismiss="alert" type="button">
																<i class="ace-icon fa fa-times"></i>
																</button>
																<strong class="green">
																<i class="ace-icon fa fa-check-square-o"></i>
																
																</strong>
																<span class="alrtText">Regitration Successfully. For Login Click <strong class="btn-danger tryAgain">Here</strong></span>
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
			
				
	  <?php $this->load->view('common/regfooter'); ?>
	  <script type="text/javascript" >
	      $("#addForm").submit(function(e)
			{
				var postData = $(this).serializeArray();
				var formURL = $(this).attr("action");
				$.ajax(
				{
					url : formURL,
					type: "POST",
					data : postData,
					success:function(data){
						$('#addForm').css('display', 'none');
						$('.afterSubmitContent').css('display', 'block');
						$("#addForm input[type='text'], #addForm #addForm input[type='password'], #addForm textarea").val("");
						$.each($('.attachmentbody'), function(i, attachment) {
							attachment = $(attachment).html('<img class="upload" src="'+SAWEB.getBaseAction('resource/img/no_image.png')+'" />');
							reInitiateFileUpload(attachment);                        
						});
					}
				  });
				
				e.preventDefault();
			});
			
			
			// basic information insert action end
			
		   // again insert 
			$('.tryAgain').on('click', function() {
			  var LinkUrl   = '<?php echo site_url('livechatLogin'); ?>';
			  location.replace(LinkUrl);
		    });
			
			$('#user_name').on('blur', function() {
			  var user_name = $(this).val(); 
			  var actionUrl   = '<?php echo site_url('livechatLogin/chkUserName'); ?>';
			  
			  $.ajax(
				{
					url : actionUrl,
					type: "POST",
					data : {user_name : user_name},
					success:function(data){
					if(data == 1){
					   $('.exAlert').text("Sory User Name is already exist");
					   $(".regButon").attr("disabled", true);
					} else {
					   $('.exAlert').text("");
					   $(".regButon").removeAttr("disabled", true);
					}
						
					}
				  });
			 
		    });

	
	  </script>
				
	</body>
</html>


