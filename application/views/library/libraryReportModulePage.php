
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
							<a href="<?php echo site_url('allReport'); ?>">Report</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('libraryReport'); ?>">Library Report</a>
					</div>
				</div>	
	</div>
				
				<div class="col-md-11 col-lg-11">
					<div class="row">
					<div class="col-md-2 col-sm-2 col-lg-2 ">
						
						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 headerBox4">
						<div class="col-md-6 col-md-offset-2 img-thumbnail ">
						<table width="100%" border="0" cellspacing="0" cellpadding="0" class=" table-bordered text-center table condensed myTable">
							  <tr>
								<td colspan="3">&nbsp;</td>
							  </tr>
							  <tr>
								<td width="48%"><a href="<?php echo site_url('LibraryReport/storedReport'); ?>">Stored Book Report</a></td>
								<td width="2%">&nbsp;</td>
								<td width="50%"> <a href="<?php echo site_url('LibraryReport/issueBookReport'); ?>">Issued Book Report</a></td>
							  </tr>
							  <tr>
								<td><a href="<?php echo site_url('LibraryReport/expiredBookIssueReport'); ?>">Expired Issue Book Report</a></td>
								<td>&nbsp;</td>
								<td><a href="#">Total Fine Report</a></td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							  </tr>
							</table>
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