
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
							<a href="<?php echo site_url('HR'); ?>">Report</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('hrReport'); ?>">HR Report </a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('hrReport/empLeaveReport'); ?>">Leave Report</a>&nbsp;&nbsp;
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
								  <div id="widget-container-col-11" class="col-md-12 col-xs-12 col-sm-12 col-lg-12 widget-container-col ui-sortable addFormContent" style="min-height: 172px; display:block">
									<div id="widget-box-11" class="widget-box widget-color-dark ui-sortable-handle" style="opacity: 1;">
										<div class="widget-header">
											<h3 class="widget-title"><strong>Employee Leave Manage</strong></h3>
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
											
												<div class="scroll-content">
														
														<div class="row reportResultListView">
															<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
																
																<div class="clearfix">
																	<div class="pull-right tableTools-container"></div>
																</div>
																<div class="table-header text-left" style="height:45px">
																	
																	<form class="form-inline pull-left" role="form" action="<?php echo site_url('hrReport/allEmpLeaveReportList'); ?>" id="findReportResultList" method="post">
																	    <div class="form-group">
																		  Search By :
																		</div>
																		<div class="form-group">
																		  <label for="email"></label>
																		  <select class="form-control" name="domain_id" id="domain_id" required="required">
																			<option value="" selected="selected" >Select Domain </option>
																			<?php foreach($domainListInfo as $v){ ?>
																			  <option <?php if($domain_id == $v->id ){ ?> selected="selected" <?php } ?> value="<?php echo $v->id ?>" ><?php echo $v->domain_name ?> </option>
																			<?php } ?>
																			</select>
																		</div>
																		
																		<div class="form-group">
																		  <label for="email"></label>
																		  <select class="form-control designitionListView" name="designition_id" id="designition_id">
																			<option value="" selected="selected" >Select Designition </option>
																			<?php foreach($desigListInfo as $v){ ?>
																			  <option <?php if($designition_id == $v->id ){ ?> selected="selected" <?php } ?> value="<?php echo $v->id ?>" ><?php echo $v->designition_name ?> </option>
																			<?php } ?>
																			</select>
																		</div>
																		
																		
																		
																		<div class="form-group">
																		  <label for="pwd"></label>
																				<div class="input-group">
																				  <span class="input-group-btn">
																					<button class="btn btn-danger form-control" type="submit">Find/Show</button>
																				  </span>
																				</div>
																		</div>
																		
																	  </form>
																	</div>
																	
																	<div id="leaveListView">
																	   <table class="table table-striped table-bordered table-hover text-left empListTable">
																			<thead>
																				<tr>
																				  <th class="center">SL</th>
																					<th width="12%">Employee  ID</th>
																					<th>Name</th>
																					<th class="hidden-480">Department</th>
																
																					<th class="hidden-480">Designition</th>
																					<th class="hidden-480">Picture</th>
																					<th class="hidden-480">Joining Date</th>
																					<th width="20%" class="text-center">Date Range </th>
																					<th width="11%">Show Report</th>
																				</tr>
																			</thead>
																
																			<tbody>
																			
																			<?php
																				$i = 1;
																				 foreach($allEmpInfo as $v) { 
																			
																			?>
																				<tr>
																				  <td class="center"><?php echo $i++; ?></td>
																					<td width="10%" align="left">
																					<?php echo $v->employee_id; ?>
																					<td class="hidden-480"><?php echo $v->employee_full_name; ?></td>
																					<td class=""><?php echo $v->department_name; ?></td>
																					<td class="hidden-480"><?php echo $v->designition_name; ?></td>
																
																					<td class="hidden-480"><img src="<?php echo base_url("resource/emp_photo/$v->emp_photo") ?>" width="50" height="50" /></td>
																					<td class="hidden-480"><?php echo $v->initiate_joining_date; ?></td>
																					<td width="20%">
																					 <div class="row">
																					 <div class="col-sm-6">
																						 <div class="form-group">
																							  <input type="text" name="fromDate" id="fromDate" class="form-control date-picker"  placeholder="From" >
																						 </div>
																					</div>
																					 <div class="col-sm-6">
																					    <div class="form-group">
																						  <input type="text" name="toDate" id="toDate" class="form-control date-picker"  placeholder="To" >
																						</div>
																					 </div>
																	                 </div>
																					  
																		            </td>
																					<td width="10%"> <span data-emp-id="<?php echo $v->employee_id; ?>"  style="padding:0 10px 1px 10px; cursor:pointer" class="btn-primary showReport"> Show result</span>
														   <span style="padding:0 10px 1px 10px; cursor:pointer; display:none" class="btn-danger hideReport"> Hide result</span></td>
																				</tr>
																			 <?php } ?>	
																			</tbody>
																		</table>



																	</div>
															
																
															</div>
															</div>
												
														<div class="loadingPart col-md-12"><img src="<?php echo base_url('resource/img/search-loading.gif'); ?>" class="img-responsive center-block" /></div>
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

 		<div class="modal fade" id="leaveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content modal-lg">				
					
				</div>
			</div>
		</div>
		 
		
<script type="text/javascript" >
$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd',
});

   //Domain wise Designition 
		$("#domain_id").change(function() {
		var domain_id = $("#domain_id").val();			
		$.ajax({
			url : SAWEB.getSiteAction('employeeInfo/domainWiseDesignition'), // URL TO LOAD BEHIND THE SCREEN
			type : "POST",
			data : { domain_id : domain_id },
			dataType : "html",
			success : function(data) {			
				$(".designitionListView").html(data);
			}
		});
		
	});	
	
	
	
	$(document).on("click", ".showReport", function(){
	  var parrents   = $(this).parents('tr');
	  var empId      = $(this).attr('data-emp-id');
	  
	  var fromDate   = parrents.find('input[name="fromDate"]').val();
	  var toDate  	 = parrents.find('input[name="toDate"]').val();
	  console.log(fromDate);
	  console.log(toDate);
	  $('.hideReport').css({"display":"none","text-align":"center"});
	  $('.showReport').css({"display":"block","text-align":"center"});
	  $(this).css({"display":"none","text-align":"center"});
	  parrents.find('.hideReport').css({"display":"block","text-align":"center"});
	  var formURL    = "<?php echo site_url('hrReport/empWiseLeaveReport'); ?>";
	  
		$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {empId: empId, fromDate: fromDate, toDate: toDate},
				success:function(data){
					$('.empListTable .detailsShow').remove();
					$('<tr class="detailsShow"><td colspan="9">'+data+'</td></tr>').insertAfter(parrents);
				}
			});
	  
	 
	
	});



$('.hideReport').on('click', function() {
	$('.empListTable .detailsShow').remove();
	$('.showReport').css('display','block');
	var parrents   = $(this).parents('tr');
	parrents.find('input[name="fromDate"]').val('');
	parrents.find('input[name="toDate"]').val('');
	$('.hideReport').css('display','none');
});



	
	

	
$('[data-rel=tooltip]').tooltip({container:'body'});
$('[data-rel=popover]').popover({container:'body'});
</script>