
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
							<a href="<?php echo site_url('diary'); ?>">Diary</a>
					</div>
				</div>	
	</div>
				
				<div class="col-md-11 col-lg-11">
					<div class="row">
					<div class="col-md-2 col-sm-2 col-lg-2 ">
						
						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 interfaceBody ">
							<div class="container-fluid ">
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled goModule" data-url="<?php echo site_url('diary/diaryInput'); ?>">
							<li  class="moduleName col-md-12 col-sm-10 col-xs-12"><div class="boxShadow_1">Diary Information Management</div><span class="shortModuleName">Diary Information</span></li>
						</div>
						
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled goModule">
							<li  class="moduleName col-md-12 col-sm-10 col-xs-12"><div class="boxShadow_1">Edit Diary Management</div><span class="shortModuleName">Edit Information</span></li>
						</div>
						
					</div>	
					</div>
				</div>
				</div>
				
	  <?php $this->load->view('common/footer'); ?>
				
	</body>
</html>


<script>
	$('.goModule').on('click', function() {
		var goModuleName	= $(this).attr('data-url');
		window.open(goModuleName, "_self");
	});

</script>