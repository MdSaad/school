
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
							<a href="<?php echo site_url('HR'); ?>">HR</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('leaveManage'); ?>">Employee Leave Management</a>&nbsp;&nbsp;
							<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('leaveManage/leaveSetup'); ?>">Leave Setup</a>
					</div>
				</div>	
	</div>
				
				<div class="col-md-11 col-lg-11">
					<div class="row">
					<div class="col-md-2 col-sm-2 col-lg-2 ">
						
						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 interfaceBody ">
							<div class="row text-center">
								<!-- PAGE CONTENT BEGINS -->
								<!-- /.row -->
								  <div id="widget-container-col-12" class="col-md-11 col-xs-12 col-sm-12 col-lg-12 widget-container-col ui-sortable addFormContent" style="min-height: 172px;">
									<div id="widget-box-11" class="widget-box widget-color-dark ui-sortable-handle" style="opacity: 1;">
										<div class="widget-header">
											<h4 class="widget-title">Leave Type Manage</h4>
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
												
												<a class="formCancel" href="#">
													<i class="ace-icon fa fa-times"></i>
												</a>
												
												<!-- <a class="orange2" data-action="fullscreen" href="#">
													<i class="ace-icon fa fa-expand"></i>
												</a> -->
												</div>
										</div>
										
										<div class="widget-body ">
											<div class="widget-main padding-4"  style="position: relative;">
											<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('leaveManage/store'); ?>" enctype="multipart/form-data" method="post">
												<div class="scroll-content">
															<div class="content img-thumbnail container">
																  <input type="hidden" class="form-control" name="update_id" id="update_id"  value=""/>
																		<div class="col-md-12">
																		 <div class="col-md-4" style="padding-top: 20px">
																		   <div class="form-group">
																		  <label class="control-label col-sm-5 " for="email">Leave Year* :</label>
																		  <div class="col-sm-7 paddingZero">
																				<select class="form-control" name="year" id="year" required>
																				  <option value="">Select Year </option>
																				   <?php for ($year = date('Y'); $year > date('Y')-10; $year--) { ?>
																				   <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
																				   <?php } ?>
																				</select>		
																			</div>
																	      </div>
																		 </div>
					
					
																		 <div class="col-md-4 " style="padding-top: 20px">
																			
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="leave_type">Leave Type Name :</label>
																			  <div class="col-sm-7">
																					<input id="leave_type" name="leave_type" class="form-control" type="text"  placeholder="Enter Leave Type Name*" required="required">	
																				</div>
																			</div>
																			
																			
																			
																			
																		 </div>
																		 
																		 <div class="col-md-4 " style="padding-top: 20px">
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="leave_days">Leave Days :</label>
																				  <div class="col-sm-7">
																						<input id="leave_days" name="leave_days" class="form-control" type="number"  placeholder="Enter Leave Days*" required="required">																	  </div>
																				</div>
																				
																				
																				
																				
																				
																				
																				
																			</div>
																			
																		
																			
																		</div>
																	</div>
																	
																	  <div class="modal-footer">
																	  	
																		<button class="btn btn-sm btn-danger formCancel" type="button">
																			<i class="ace-icon fa fa-times"></i>
																			Cancel
																		</button>
																		<button class="btn btn-sm btn-primary" type="submit">
																			<i class="ace-icon fa fa-check"></i>
																			<span class="update">Submit</span>
																		</button>
																	</div>
																	</div>
														</form>
												</div>
											</div>
										</div>
									</div>
							 </div>	
							 
							 
							 
							 <div class="row">
									<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
										
										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
										  Leave Type Manage List
										</div>
											
											

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div id="listView">
											 <table class="table table-bordered leaveListTable">
												<thead>
													<tr>
														<th class="center" width="8%">
														  Sl No
														</th>
														<th>Leave Type Name</th>
														<th>Leave Days</th>
														<th>Leave Year</th>
														<th width="10%">Action</th>
													</tr>
												</thead>

												<tbody>
												
												<?php 
												   $sl = 1;
												   foreach($allLeaveInfo as $v) { 
												 ?>
													<tr style="background-color:#F9F9F9">
														<td class="center">
                                                           <?php echo $sl++; ?>
														</td>

														<td><span class="leaveDetails" leaveId="<?php echo $v->id ?>" style="cursor:pointer"><?php echo $v->leave_type; ?></span></td>
														<td class="hidden-480"><?php echo $v->leave_days; ?></td>
														<td><?php echo $v->year; ?></td>
														<td>
															<div class="hidden-sm hidden-xs btn-group">
															<button class="btn btn-xs btn-info green" data-id="<?php echo $v->id ?>"  data-rel="tooltip" title="Edit" data-placement="bottom">
																<i class="ace-icon fa fa-pencil bigger-120"></i>															</button>

															<button class="btn btn-xs btn-danger red" data-id="<?php echo $v->id ?>" data-rel="tooltip" title="Delete" data-placement="bottom" >
																<i class="ace-icon fa fa-trash-o bigger-120"></i>															</button>
															
														</div>
														</td>
													</tr>
												 <?php  } ?>	
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

	
		
<script>

  $("#addForm").submit(function(e)
	{
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		console.log(postData);
		$.ajax(
			{
				url : formURL,
				type: "POST",
				async: false,
				data : postData,
				success:function(data){
					$("#listView").html(data);	
					$("#addForm").find("input[type=text],input[type='number'], select, textarea").val("");
					
				}
			  });
		
		e.preventDefault();
	});
	
	
	$(document).on("click", ".green", function(e)
	{
		
		var id 		= $(this).attr("data-id");
		var formURL = "<?php echo site_url('leaveManage/leaveEditInfo'); ?>";
		$('.update').text('Update');
		$.ajax(
		{
			url : formURL,
			type: "POST",
			async: false,
			data : {id: id},
			dataType: "json",
			success:function(data){
				$('#update_id').val(data.id);
				$('#leave_type').val(data.leave_type);
				$('#leave_days').val(data.leave_days);
				$('#year').val(data.year);
				$('#update').text("Update");
		
			}
		});
		
		e.preventDefault();
	});
	
	
	 $('.red').on('click', function() {
			var x = confirm('Are you sure to delete?');
			
			if(x){
				var id = $(this).attr('data-id');
				console.log(id);
				var url = SAWEB.getSiteAction('leaveManage/leaveDelete/'+id);
				location.replace(url);
			} else {
				return false;
			}
		});

</script>