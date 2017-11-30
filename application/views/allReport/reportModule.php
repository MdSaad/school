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

						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 headerBox2">
						<a href="<?php echo site_url('adminHome'); ?>" > Home </a>
						<i class="glyphicon glyphicon-forward"></i>
							<a href="<?php echo site_url('allReport'); ?>">Report</a>
					</div>
				</div>	
	</div>
				
				<div class="col-md-11 col-lg-11">
					<div class="row">
					<div class="col-md-2 col-sm-2 col-lg-2 ">
						
						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 interfaceBody headerBox3">
						<div class="container-fluid ">
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled  goModule" id="admission" data-url = "<?php echo site_url('allReport/stuReport'); ?>">
							<li  class="moduleName col-md-12 col-sm-10 col-xs-12"><div class="boxShadow_1">Admission Related Report</div><span class="shortModuleName">Admission Report</span></li>
						</div>
						
						
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled  goModule"  data-url = "<?php echo site_url('allReport/feeCollectionReport'); ?>">
							<li  class="moduleName col-md-12 col-sm-10 col-xs-12"><div class="boxShadow_1">Student Fee Collection Report</div><span class="shortModuleName">Fee Collection </span></li>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled  goModule">
							<li  class="moduleName col-md-12 col-sm-10 col-xs-12"><div class="boxShadow_1">General Ledger Related Report</div><span class="shortModuleName">General </span></li>
						</div>
						
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled  goModule" data-url = "<?php echo site_url('allReport/resultReportModule'); ?>">
							<li  class="moduleName col-md-12 col-sm-10 col-xs-12"><div class="boxShadow_1">Report on Result</div><span class="shortModuleName">Result</span></li>
						</div>
						
						
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled  goModule">
							<li  class="moduleName col-md-12 col-sm-10 col-xs-12"><div class="boxShadow_1">Remote Related Report</div><span class="shortModuleName">Remote</span></li>
						</div>
						
						
						
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled  goModule">
							<li  class="moduleName col-md-12 col-sm-10 col-xs-12"><div class="boxShadow_1">Annual Related Report</div><span class="shortModuleName">Annual</span></li>
						</div>
						
						
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled  goModule">
							<li  class="moduleName col-md-12 col-sm-10 col-xs-12"><div class="boxShadow_1">Query Related Report</div><span class="shortModuleName">Query</span></li>
						</div>
						
						
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled  goModule" data-url = "<?php echo site_url('allReport/dairyReport'); ?>">
							<li  class="moduleName col-md-12 col-sm-10 col-xs-12"><div class="boxShadow_1">Student Diary Information Report</div><span class="shortModuleName">Diary</span></li>
						</div>
						
						
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled  goModule" data-url = "<?php echo site_url('attendenceReport'); ?>">
							<li  class="moduleName col-md-12 col-sm-10 col-xs-12"><div class="boxShadow_1">Attendence Report</div><span class="shortModuleName">Attendence</span></li>
						</div>
						
						
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled  goModule" data-url = "<?php echo site_url('hrReport'); ?>">
							<li  class="moduleName col-md-12 col-sm-10 col-xs-12"><div class="boxShadow_1">HR Report</div><span class="shortModuleName">HR</span></li>
						</div>
						
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled  goModule" data-url = "<?php echo site_url('libraryReport'); ?>">
							<li  class="moduleName col-md-12 col-sm-10 col-xs-12"><div class="boxShadow_1">Library Report</div><span class="shortModuleName">Library</span></li>
						</div>
						
						
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled  goModule">
							<li  class="moduleName col-md-12 col-sm-10 col-xs-12"><div class="boxShadow_1">Asset Manage Report</div><span class="shortModuleName">Asset</span></li>
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