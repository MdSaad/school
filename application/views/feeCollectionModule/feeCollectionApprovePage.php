
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
							<a href="<?php echo site_url('feeCollectionApproveHome'); ?>">Fee Collection Approve</a>
					</div>
				</div>	
	</div>
				
				<div class="col-md-11 col-lg-11">
					<div class="row">
					<div class="col-md-2 col-sm-2 col-lg-2 ">
						
						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 interfaceBody">
							 <div class="row">
							         <div class="alert alert-block alert-success afterSubmitContent" id="">
											<button class="close" data-dismiss="alert" type="button">
											<i class="ace-icon fa fa-times"></i>
											</button>
											<strong class="green">
											<i class="ace-icon fa fa-check-square-o"></i>
											
											</strong>
											<span class="alrtText">Approve Successfully.</span>
									</div>
									<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
										
										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
										Fee Collection Pending  List
											</div>
											
											

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										
										<div id="listView">
											 <table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>Sl No </th>
														<th class="hidden-480">Student Id </th>

														<th>Action</th>
													</tr>
												</thead>

												<tbody>
												
												<?php 
												   $i = 1;
												   foreach($findAlUnapproveDta as $v) {  ?>
													<tr>
														<td width="10%"><?php echo $i++; ?></td>
														<td width="70%" class="hidden-480"><?php echo $v->stu_id; ?></td>
														<td width="20%" class="hidden-480"><div class="hidden-sm hidden-xs btn-group">

															<button class="btn btn-xs btn-info green" data-id="<?php echo $v->id ?>"  data-rel="tooltip" title="Approve" data-placement="bottom">
																<i class=" bigger-120">Approve</i>															</button>

															
															
														</div></td>
													</tr>
												 <?php }  ?>	
												</tbody>
											</table> 
										</div>
									</div>
								</div>
					</div>
				</div>
				
					
				</div>
				
	  <?php $this->load->view('common/footer'); ?>
				
	</body>
</html>

		 
	

<script type="text/javascript" >

 
 $(document).on("click", ".green", function(e)
	{
		
		var id 		= $(this).attr("data-id");
		
		var formURL = "<?php echo site_url('feeCollectionApproveHome/approveFee'); ?>";
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : {id: id},
			dataType: "html",
			success:function(data){
			   $('#listView').html(data);	
			   $('.afterSubmitContent').css('display', 'block');
			}
		});
		
		e.preventDefault();
	});
</script>