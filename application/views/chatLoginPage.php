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
						<img src="<?php echo base_url('resource/interface/img/ok4.jpg'); ?>" class="" style="width: 882px" />
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
												<strong>Please Enter Your User <br>
Name & Password</strong>
											</h4>

											<div class="space-6"></div>
											<?php if(!empty($msg)) { ?>
											<div class="alert alert-warning alert-dismissible" role="alert">
											  <button type="button" class="close" data-dismiss="alert" ></button>
											  <strong>Warning!</strong> <?php echo $msg; ?>.
											</div>
											<?php } ?>

											<form action="<?php echo site_url('livechatLogin/authenticate'); ?>" method="post" enctype="multipart/form-data">
												<fieldset class="">
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<select class="form-control loginInput" name="type" id="type" required="required"   style="color:#000000; font-weight:bold" >
																<option value="" selected="selected" style="color:#000000; font-weight:bold" >Select User Type* </option>
																<option value="teacher" >Teacher</option>
																<option value="student" >Student</option>
																<option value="adminStaff" >Admin Staff</option>
																<option value="other" >Other People</option>
															</select>
														</span>
													</label>
													
                                                    <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="Username"  autocomplete="off" 
                                                            name="userid" id="userid" required = "required"  style="color:#000000; font-weight:bold"/>
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="password" 
                                                             name="password" id="password" autocomplete="off" required = "required"  style="color:#000000; font-weight:bold" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>
													

													<div class="clearfix">
													  											

														<button type="submit" class="width-35 btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>  
															<span style="padding-left:5px"><a href="<?php echo site_url('livechatLogin/registration') ?>" style="cursor:pointer">I want to register <i class="ace-icon fa fa-arrow-right"></i></a></span>
														
														 
															
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<br/>&nbsp;
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

							</div><!-- /.position-relative -->

							
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?php echo base_url("resource/assets/js/jquery.2.1.1.min.js"); ?>"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url("resource/assets/js/jquery.min.js"); ?>'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url("resource/assets/js/jquery.mobile.custom.min.js"); ?>'>"+"<"+"/script>");
		</script>

				
	</body>
</html>
