
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
							<a href="<?php echo site_url('studentHome'); ?>" > Home </a>
						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 headerBox2">
						<a href="<?php echo site_url('adminHome'); ?>" > Home </a>
						<i class="glyphicon glyphicon-forward"></i>
							<a href="<?php echo site_url('studentHome'); ?>">Fee Collection</a>
					</div>
				</div>	
	</div>
				
				<div class="col-md-11 col-lg-11">
					<div class="row">
					<div class="col-md-2 col-sm-2 col-lg-2 ">
						
						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 interfaceBody headerBox3">
						<div class="row text-center">
								<!-- PAGE CONTENT BEGINS -->
								

								<!-- /.row -->
								  <div id="widget-container-col-11" class="col-md-12 col-xs-12 col-sm-12 col-lg-12 widget-container-col ui-sortable addFormContent" style="min-height: 172px; display:block">
									<div id="widget-box-11" class="widget-box widget-color-dark ui-sortable-handle" style="opacity: 1;">
										<div class="widget-header">
											<h4 class="widget-title">Student Fee Collection </h4>
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
												<div class="row paymentHeadListView">
												
												   <div class="col-xs-9 col-md-9 col-lg-9 col-sm-9">
																													
															<div class="clearfix">
																<div class="pull-right tableTools-container"></div>
															</div>
															<div class="table-header text-left" style="min-height: 60px;padding-top: 6px">
																<span class="label label-success  arrowed-right"><?php echo $findStuInfoClassWise->stu_id; ?></span>
																<strong>Name :</strong> <?php echo $findStuInfoClassWise->stu_full_name; ?>
																<span style="float:right">
																   <?php
																		 if(!empty($findStuInfoClassWise->stu_photo)){ ?>
																		<img src="<?php echo base_url("resource/stu_photo/$findStuInfoClassWise->stu_photo"); ?>" width="50" height="40" class="img-thumbnail"> 
																	<?php }else{  if($findStuInfoClassWise->stu_sex == 'M'){ ?>
																			 <img src="<?php echo base_url('resource/img/male.png'); ?>" width="50" height="40"> 
																		 <?php }else{ ?>
																		   <img src="<?php echo base_url('resource/img/EmptyProfile.png'); ?>" width="50" height="40"> 
																	<?php } } ?>
																</span>
															</div>
																
																
													
														<form action="<?php echo site_url('studentHome/submitFeeHeadAmount'); ?>" id="feeHeadAddForm" method="post" >
														<div>
																<table id="dynamic-table" class="table table-striped table-bordered table-hover text-left stuListTable">
																	<thead>
																		<tr>
																		  <th class="center">Payment Head</th>
																			<th>Description</th>
																			<th> Amount </th>
																			<th >Discount </th>
																			<th> Pay Amount </th>
																			<th> Action </th>
																			
																		</tr>
																	</thead>
													
																	<tbody>
																	
																		 <tr>
																			  <td class="center">
																				<select class="form-control paymentHead" name="feePaymentHeadID" id="feePaymentHeadID" required>
																						  <option value="">Select Payment Head</option>
																						  <?php foreach($applicablePaymentHeaderList as $k=>$v) {
																							if($v->mode_due_amount >0) {
																						   ?>
																							<option value="<?php echo $v->id; ?>" ><?php echo $v->applicable_mode_name; ?></option>																										<?php } } ?>
																				</select>
																			 </td>
																			<td><input type="text" class="form-control" name="pay_head_details" id="pay_head_details"/></td>
																			<td ><input type="text" class="form-control" name="mode_due_amount" id="mode_due_amount"/></td>
																			<td><input type="text" class="form-control" name="pay_mode_discount_amount" id="pay_mode_discount_amount"/></td>
																			<td >
																				<input type="text" class="form-control" name="mode_pay_amount" id="mode_pay_amount" required/>
																				<input type="hidden" class="form-control" name="orginal_mode_due_amount" id="orginal_mode_due_amount" required/>
																			</td>
																			<td >
																				<button class="btn btn-xs btn-danger pull-right" type="submit">
																					<i class="ace-icon fa fa-bolt bigger-110"></i>
																					<span class="">Add</span>
																					<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
																				</button>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</form>	
														
														<div class="paidListView" style="">
														
														</div>
														</div>
														
												  <div class="col-xs-3 col-md-3 col-lg-3 col-sm-3">
												    <div class="col-md-12" style="font-size:14px;font-weight:bold;text-decoration:underline;padding-bottom:5px">Last Recept No</div>
																		   <table width="100%" class="table table-bordered">
																		    <thead>
																			  <tr>
																				<th>Recept No</th>
																				<th>Print</th>
																				<th>Download</th>
																			  </tr>
																			 </thead>
																			<tbody>
																		      <?php 
																			       foreach ($studentLastTreeReceptNo as $vt){ ?>
																				  <tr>
																					<td style="padding-top:15px"><a href="<?php echo site_url('studentHome/receitNoWiseEarningReportResult/'.$vt->invoice_no); ?>" target="_blank">REC#00<?php echo $vt->invoice_no; ?></a></td>
																					<td><a target="_blank" href="<?php echo site_url('studentHome/receptPrint/'.$vt->invoice_no);?>"><img src="<?php echo base_url('resource/img/Printer.png'); ?>" width="25" height="25"></a></td>
																					<td><a target="_blank" href="<?php echo site_url('studentHome/pdfRecept/'.$vt->invoice_no);?>"><img src="<?php echo base_url('resource/img/download.png'); ?>" width="25" height="25"></a>
</td>
																				  </tr>
																			 <?php } ?>
																			</tbody>
																		</table>
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
				
	  <?php $this->load->view('common/footer'); ?>
				
	</body>
</html>


<script>

		$(".paymentHead").on('change', function() {
			var feePaymentHeadID = $('#feePaymentHeadID').val();
			var formURL = "<?php echo site_url('studentHome/loadFeeHeadAmount'); ?>";
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {feePaymentHeadID : feePaymentHeadID},
				success:function(data){
					$("#mode_due_amount").val(data);
					$("#mode_pay_amount").val(data);
					$("#orginal_mode_due_amount").val(data);
					$("#pay_mode_discount_amount").val("");
					$("#mode_due_amount").attr('readonly', 'readonly');
				}
			});
		});
		
		$('#pay_mode_discount_amount, #mode_due_amount').on('keyup', function() {
			var orginal_mode_due_amount	= $('#orginal_mode_due_amount').val();
			var pay_mode_discount_amount = $('#pay_mode_discount_amount').val();
			
			
			var mode_pay_amount = (orginal_mode_due_amount - pay_mode_discount_amount)
			
			$('#mode_pay_amount').val(mode_pay_amount);
		});
		
		
		$("#feeHeadAddForm").submit(function(e)
		{
			var postData = $(this).serializeArray();
			var formURL = $(this).attr("action");
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : postData,
				success:function(data){
					$(".paidListView").html(data);
					$('#feeHeadAddForm input[type="text"]').val("");
					$("#feeHeadAddForm option:selected").prop("selected", false)				
				}
			});
			
			e.preventDefault();
		});

	
</script>