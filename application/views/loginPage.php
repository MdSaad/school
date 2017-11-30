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
		<style>
			.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
				padding-left: 0;
				padding-right: 0;
			}
		</style>
	</head>

	<body class="login-layout blur-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row text-center">
					<div class="col-md-2">

					</div>
					<div class="col-md-8" style="background-color: #00A61D">
						<div class="">
							<div class="col-md-1" style="padding-left: 10px;margin-top: 10px;">
								<div class="thumbnail">
									<img src="<?php echo base_url('resource/interface/img/republic_of_bangladesh.jpg');?>"/>
								</div>
							</div>
							<div class="col-md-10">
								<div class="report_school_name text-center">VATTAPUR MODEL GOVT. PRIMARY SCHOOL <?php //echo $basicInfo->inst_name; ?></div>
								<div class="report_school_adrs text-center">Vill:-Vattapur, P.O: Sonargaon-1440, Word No.: 08, Sonargaon Paurashava </div>
								<div class="report_school_adrs text-center">Sonargaon, Narayanganj </div>
								<div class="report_school_adrs text-center">Cell: 01959613022, Head Teacher: 01715010037 </div>
								<div class="company-name text-center">United IT Solution LTD. ERP System</div>
							</div>
							<div class="col-md-1" style="padding-right: 10px;margin-top: 10px;">
								<div class="thumbnail">
									<img src="<?php echo base_url('resource/interface/img/sober jonna mansommat shikhkha.jpg');?>" />
								</div>
							</div>
						</div>

					</div>
					<div class="col-md-2">

					</div>
				</div>
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<!--<img src="<?php /*echo base_url('resource/interface/img/islamiAcademy.jpg'); */?>" class="" style="width: 882px" />-->

					</div>
					<div class="col-sm-8 col-sm-offset-2" style="width: 907px">
						<div class="">
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

											<form action="<?php echo site_url('adminLogin/authenticate'); ?>" method="post" enctype="multipart/form-data">
												<fieldset class="">
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<select class="form-control loginInput" name="type" id="type" required="required"   style="color:#000000; font-weight:bold" >
																<option value="" selected="selected" style="color:#000000; font-weight:bold" >Select Admin Type* </option>
																<option value="superadmin" >Super Admin</option>
																<option value="teacher" >Teacher</option>
																<option value="classTeacher" >Class Teacher</option>
																<option value="adminStaff" >Admin Staff</option>
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

													<div class="clearfix text-center">													

														<button type="submit" class="width-35 btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->
										
										<div class="toolbar clearfix">
										      <div>
												 <a class="forgot-password-link" href="<?php echo site_url('studentLogin') ?>">
													<i class="ace-icon fa fa-arrow-left"></i>
													  Student Login
												 </a> 
											 </div>
											<div>
												<a class="user-signup-link" href="<?php echo site_url('stuRegistration') ?>">
													Student register
													<i class="ace-icon fa fa-arrow-right"></i>
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
