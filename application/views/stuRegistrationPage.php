<style>
	.loginInput option {
		color:#000000;
		font-weight:bold;
	}
</style>
 <!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $title; ?></title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<?php $this->load->view('common/cssLinkPage'); ?>
	</head>

	<body class="login-layout blur-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<img src="<?php echo base_url('resource/interface/img/islamiAcademy.jpg'); ?>" class="" style="width: 882px" />
					</div>
					<div class="col-sm-8 col-sm-offset-2" style="width: 907px">
						<div class="" style="margin-top:-3px">
							<!-- <div class="center">
								<h1>
									<i class="ace-icon fa fa-briefcase green"></i>
									<span class="red">SMSC</span>
									<span class="white" id="id-text2">Login Panel</span>
								</h1>
							</div> 

							<div class="space-6"></div> -->

							<div class="position-relative slideInDown ">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body" style="background: #F7F7F7">
										<div class="widget-main" style="width: 460px ; background: #F7F7F7;   margin-left: 200px";>
										
											<h4 class="header blue lighter bigger text-center">
												<i class="ace-icon fa fa-coffee green"></i>
												<strong>Please Enter Your Registration Information </strong>
											</h4>

											<div class="space-6"></div>
											<?php if(!empty($msg)) { ?>
											<div class="alert alert-warning alert-dismissible" role="alert">
											  <button type="button" class="close" data-dismiss="alert" ></button>
											  <strong>Success!</strong> <?php echo $msg; ?>.
											</div>
											<?php } ?>

											<form action="<?php echo site_url('stuRegistration/stuRegistrationDataSave'); ?>" method="post" enctype="multipart/form-data">
												<fieldset class="">
													
													
                                                    <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="Student Id"  autocomplete="off" 
                                                            name="student_id" id="student_id" required = "required"  style="color:#000000; font-weight:bold"/>
															<i style="color:#00FF00" class="right"></i>
														</span>
														<span class="validation" style="color:#FF0000"></span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="password" 
                                                             name="password" id="password" autocomplete="off" required = "required"  style="color:#000000; font-weight:bold" />
															
														</span>
													</label>
													
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<select class="form-control" name="status" id="status" required="required"   style="color:#000000; font-weight:bold" >
																<option value="" selected="selected" style="color:#000000; font-weight:bold" >Select Status* </option>
																<option value="Active" >Active</option>
																<option value="InActive" >In-Active</option>
																
															</select>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix text-center">													

														<button type="submit" class="width-35 btn btn-sm btn-primary">
															<span class="bigger-110">Resigter</span>
															<i class="ace-icon fa fa-arrow-right"></i>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->
										
										<div class="toolbar clearfix">
										      <div>
												
											 </div>
											<div>
												<a class="user-signup-link" href="<?php echo site_url('adminLogin') ?>">
												<i class="ace-icon fa fa-arrow-left"></i>
													Back to login
													
												</a>
											</div>
										</div>

										
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

							</div><!-- /.position-relative -->

							
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<script src="<?php echo base_url("resource/assets/js/jquery.2.1.1.min.js"); ?>"></script>
		<script>
			$('#student_id').blur(function(){
			    var stuId  = $(this).val();
				var chkUrl = '<?php echo site_url('stuRegistration/chkValidId'); ?>';
				
				if(stuId !=''){
					$.ajax({
					   url : chkUrl,
					   type : "POST",
					   data : {stuId : stuId},
						success : function(data){
						   if(data ==1){
							   $('.validation').text("Invalide Id");
							   $('.right').removeClass("ace-icon fa fa-check");
						  }else{
							$('.validation').text("");
							$('.right').addClass("ace-icon fa fa-check");
						  }
						}
					});
				 }else{
				    $('.validation').text("");
					$('.right').removeClass("ace-icon fa fa-check");
				 }
			
			});
	</script>

	

				
	</body>
</html>
