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
							Online ERP System
					</div>
				</div>	
	</div>
				
				<div class="col-md-11 col-lg-11">
					<div class="row">
					<div class="col-md-2 col-sm-2 col-lg-2 ">
						
						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 interfaceBody headerBox3">
						<div class="container-fluid ">
						<?php 
							$module_name = "module";
							foreach($findAccessModule as $v) {
							$module_name = $v->module_name;
							
							if($module_name == "Admission") {
								 $Admission = "Admission";
							}
							
							
							if($module_name == "SIMS") {
								 $SIMS = true;
							}
							
							if($module_name == "TIMS") {
								 $TIMS = true;
							}
							
							if($module_name == "Fee Collection") {
								 $feeCollection = true;
							}
							
							if($module_name == "Certificate & Transcrift") {
								 $Certificate = true;
							}
							
							
							if($module_name == "Result") {
								 $Result = true;
							}
							
							
							if($module_name == "Report") {
								 $Report = true;
							}
							
							
							if($module_name == "Assignment") {
								 $Assignment = true;
							}
							
							if($module_name == "Parents Portal") {
								 $ParentsPortal = true;
							}
							
							if($module_name == "Student Blog") {
								 $StuBlog = true;
							}
							
							if($module_name == "Attendence") {
								 $Attendence = true;
							}
							
							if($module_name == "Authorization") {
								 $Authorization = true;
							}
							if($module_name == "Diary") {
								 $Diary = true;
							}
							if($module_name == "HR") {
								 $HR = true;
							}
							if($module_name == "Gallery") {
								 $Gallery = true;
							}
							if($module_name == "Asset Management") {
								 $assetManagement = true;
							}
							
							if($module_name == "Accounts") {
								 $Accounts = true;
							}

							if($module_name == "LibraryManage") {
								 $Accounts = true;
							}

							
							
							
						} 
							
						?>
						<?php if(!empty($Admission) or $authorType == "superadmin") { ?>
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled goModule"  data-url="<?php echo site_url('admissionModule'); ?>">
							<li class="col-md-2 col-sm-2 hidden-480"> <img alt="admission icon" src="<?php echo base_url('resource/interface/img/admission.png'); ?>" class="img-responsive moduleIcon"> </li>
							<li  class="moduleName col-md-10 col-sm-10 col-xs-12"><div class="boxShadow_1">Admission Management System</div><span class="shortModuleName">Admission</span></li>
						</div>
						<?php } ?>
						
						<?php if(!empty($SIMS) or $authorType == "superadmin") { ?>
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled goModule" id="sims" data-url="<?php echo site_url('StudentHome'); ?>">
							<li class="col-md-2 col-sm-2 hidden-480"> <img alt="admission icon" src="<?php echo base_url('resource/interface/img/student_info.png'); ?>" class="img-responsive moduleIcon"> </li>
							<li  class="moduleName col-md-10 col-sm-10 col-xs-12"><div class="boxShadow_1">Student Information Management System</div><span class="shortModuleName">SIMS</span></li>
						</div>
						<?php } ?>
						
						<?php if(!empty($feeCollection) or $authorType == "superadmin") { ?>
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled goModule" id="feeCollectionModule" data-url="<?php echo site_url('feeCollectionModule'); ?>">
							<li class="col-md-2 col-sm-2 hidden-480"> <img alt="admission icon" src="<?php echo base_url('resource/interface/img/mony_collection.png'); ?>" class="img-responsive moduleIcon"> </li>
							<li  class="moduleName col-md-10 col-sm-10 col-xs-12"><div class="boxShadow_1">Students Fee Collection</div><span class="shortModuleName">Collection</span></li>
						</div>
						<?php } ?>
						
						
						<?php if(!empty($Accounts) or $authorType == "superadmin") { ?>
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled goModule">
							<li class="col-md-2 col-sm-2 hidden-480"> <img alt="admission icon" src="<?php echo base_url('resource/interface/img/ledger.png'); ?>" class="img-responsive moduleIcon"> </li>
							<li  class="moduleName col-md-10 col-sm-10 col-xs-12"><div class="boxShadow_1">General Accounts System</div><span class="shortModuleName">Accounts</span></li>
						</div>
						<?php  } ?>
						
						<?php if(!empty($HR) or $authorType == "superadmin") { ?>
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled goModule" data-url="<?php echo site_url('HR'); ?>">
							<li class="col-md-2 col-sm-2 hidden-480"> <img alt="admission icon" src="<?php echo base_url('resource/interface/img/human_resource.png'); ?>" class="img-responsive moduleIcon"> </li>
							<li  class="moduleName col-md-10 col-sm-10 col-xs-12"><div class="boxShadow_1">Human Resource Management</div><span class="shortModuleName">HR</span></li>
						</div>
						<?php } ?>
						
						<?php if(!empty($TIMS) or $authorType == "superadmin") { ?>
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled goModule">
							<li class="col-md-2 col-sm-2 hidden-480"> <img alt="admission icon" src="<?php echo base_url('resource/interface/img/teacher.png'); ?>" class="img-responsive moduleIcon"> </li>
							<li  class="moduleName col-md-10 col-sm-10 col-xs-12"><div class="boxShadow_1">Teacher Information Management System</div><span class="shortModuleName">TIMS</span></li>
						</div>
						<?php } ?>
						
						<?php if(!empty($Result) or $authorType == "superadmin") { ?>
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled goModule" data-url="<?php echo site_url('resultSubModule'); ?>">
							<li class="col-md-2 col-sm-2 hidden-480"> <img alt="admission icon" src="<?php echo base_url('resource/interface/img/result_icon.png'); ?>" class="img-responsive moduleIcon"> </li>
							<li  class="moduleName col-md-10 col-sm-10 col-xs-12"><div class="boxShadow_1">Result Management System</div><span class="shortModuleName">Result</span></li>
						</div>
						<?php } ?>
						
						
						<?php if(!empty($Certificate) or $authorType == "superadmin") { ?>
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled goModule" data-url="<?php echo site_url('certificateTranscript'); ?>">
							<li class="col-md-2 col-sm-2 hidden-480"> <img alt="admission icon" src="<?php echo base_url('resource/interface/img/certificate.png'); ?>" class="img-responsive moduleIcon"> </li>
							<li  class="moduleName col-md-10 col-sm-10 col-xs-12"><div class="boxShadow_1">Certificate & Transcript Management</div><span class="shortModuleName">Certificate</span></li>
						</div>
						<?php } ?>
						
						
						<?php if(!empty($Diary) or $authorType == "superadmin") { ?>
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled goModule" data-url="<?php echo site_url('diary'); ?>">
							<li class="col-md-2 col-sm-2 hidden-480"> <img alt="admission icon" src="<?php echo base_url('resource/interface/img/Diary-Icon.png'); ?>" class="img-responsive moduleIcon"> </li>
							<li  class="moduleName col-md-10 col-sm-10 col-xs-12"><div class="boxShadow_1">Student Diary Managment</div><span class="shortModuleName">Diary</span></li>
						</div>
						<?php } ?>
						
						
						<?php if(!empty($Attendence) or $authorType == "superadmin") { ?>
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled goModule" data-url="<?php echo site_url('attendence'); ?>">
							<li class="col-md-2 col-sm-2 hidden-480"> <img alt="admission icon" src="<?php echo base_url('resource/interface/img/attendence.png'); ?>" class="img-responsive moduleIcon"> </li>
							<li  class="moduleName col-md-10 col-sm-10 col-xs-12"><div class="boxShadow_1">Student Attendence Managment</div><span class="shortModuleName">Attentdence</span></li>
						</div>
						<?php } ?>
						
						
						<?php if(!empty($Authorization) or $authorType == "superadmin") { ?>
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled goModule" id="createUser" data-url="<?php echo site_url('authorize/createUser'); ?>">
							<li class="col-md-2 col-sm-2 hidden-480"> <img alt="admission icon" src="<?php echo base_url('resource/interface/img/AIcon.png'); ?>" class="img-responsive moduleIcon"> </li>
							<li  class="moduleName col-md-10 col-sm-10 col-xs-12"><div class="boxShadow_1">User Access Privilege</div><span class="shortModuleName">Authorization</span></li>
						</div>
						<?php } ?>
						
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled goModule img-responsive moduleIcon" id="report"  data-url="<?php echo site_url('smsManagementModule'); ?>">
							<li class="col-md-2 col-sm-2 hidden-480"> <img alt="admission icon" src="<?php echo base_url('resource/interface/img/sms_icon.png'); ?>" class="img-responsive moduleIcon"> </li>
							<li  class="moduleName col-md-10 col-sm-10 col-xs-12"><div class="boxShadow_1">SMS Management</div><span class="shortModuleName">SMS</span></li>
						</div>
						
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled img-responsive moduleIcon goModule" data-url="<?php echo site_url('inventoryManageMent/requisition'); ?>" >
							<li class="col-md-2 col-sm-2 hidden-480"> <img alt="admission icon" src="<?php echo base_url('resource/interface/img/requisition.png'); ?>" class="img-responsive moduleIcon"> </li>
							<li  class="moduleName col-md-10 col-sm-10 col-xs-12"><div class="boxShadow_1">Requisition Create</div><span class="shortModuleName">Requisition</span></li>
						</div>

						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled  img-responsive moduleIcon goModule" id="report"  data-url="<?php echo site_url('libraryManage'); ?>">
							<li class="col-md-2 col-sm-2 hidden-480"> <img alt="Library icon" src="<?php echo base_url('resource/interface/img/library_icon.png'); ?>" class="img-responsive moduleIcon"> </li>
							<li  class="moduleName col-md-10 col-sm-10 col-xs-12"><div class="boxShadow_1">Library Management System</div><span class="shortModuleName">Library</span></li>
						</div>
						
						
						
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled img-responsive moduleIcon goModule" data-url="<?php echo site_url('inventoryManageMent'); ?>">
							<li class="col-md-2 col-sm-2 hidden-480"> <img alt="admission icon" src="<?php echo base_url('resource/interface/img/inventorylogo.png'); ?>" class="img-responsive moduleIcon"> </li>
							<li  class="moduleName col-md-10 col-sm-10 col-xs-12"><div class="boxShadow_1">Inventory Management</div><span class="shortModuleName">Inventory</span></li>
						</div>

						<?php if(!empty($Report) or $authorType == "superadmin") { ?>
						<div class="col-md-6 col-sm-6 col-xs-12 boxShadow_1 moduleBox list-unstyled goModule" id="report" data-url="<?php echo site_url('allReport'); ?>">
							<li class="col-md-2 col-sm-2 hidden-480"> <img alt="admission icon" src="<?php echo base_url('resource/interface/img/report.png'); ?>" class="img-responsive moduleIcon"> </li>
							<li  class="moduleName col-md-10 col-sm-10 col-xs-12"><div class="boxShadow_1">Report Management</div><span class="shortModuleName">Report</span></li>
						</div>
						<?php } ?>
						
						
						
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
		window.open(goModuleName, '_blank');
	});
	
	
</script>