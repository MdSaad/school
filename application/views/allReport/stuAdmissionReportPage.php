
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
							<a href="<?php echo site_url('allReport'); ?>">Report</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('allReport/stuReport'); ?>">Student Report</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('allReport/stuAdmissionReport'); ?>">Admissin List Report</a>&nbsp;&nbsp;
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
											<h3 class="widget-title"><strong>Student Admission List Report</strong></h3>
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
														<form class="form-horizontal" target="_blank" id="findReportResultList" role="form" action="<?php echo site_url('allReport/findAdmittedStuList'); ?>"  enctype="multipart/form-data" method="post">	
												    			<div class="scroll-content">
																			<div class="content img-thumbnail container">
																				<div class="col-md-12">
																				 
																				 <div class="col-md-12">
																						 <div class="col-md-6">
																							<div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Campus/Branch :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="branch_id" id="branch_id">
																												  <option value="">Select Campus</option>
																												  <?php foreach($branchListInfo as $k=>$v) { ?>
																													<option value="<?php echo $v->id; ?>" ><?php echo $v->branch_name; ?></option>																										<?php } ?>
																										</select>																	   		
																								 </div>
																							 </div>
																							 
																							 <div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Class :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="class_id" id="class_id">
																												  <option value="">Select Class </option>
																												  <?php foreach($classListInfo as $k=>$v) { ?>
																													<option value="<?php echo $v->id; ?>" ><?php echo $v->class_name; ?></option>																										<?php } ?>
																										</select>																	   		
																								 </div>
																							 </div>
																							
																							<div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Group :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="group_id" id="group_id">
																												  <option value="">Select Group </option>
																												  <?php foreach($groupListInfo as $k=>$v) { ?>
																													<option value="<?php echo $v->id; ?>" ><?php echo $v->group_name; ?></option>																										<?php } ?>
																										</select>																	   		
																								 </div>
																							 </div>
																							 
																							
																							 
																							<div class="form-group">
																								  <label class="control-label col-sm-5 " for="student_type">Student Type :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="student_type" id="student_type">
																											<option value="">Select Student Type </option>
																											<option value="new" >Admitted Student</option>
																											<option value="promotted" >Promotted Student</option>																																																
																											<option value="all" >All</option>																																																
																										</select>	
																										<span class="textAlert" style="color:#FF0000"></span>	
																									</div>
																							</div> 
																							
																							
																						  </div>
																						 
																						 <div class="col-md-6">
																							 <div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Section :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="section_id" id="section_id">
																												  <option value="">Select Section </option>
																												  <?php foreach($sectionListInfo as $k=>$v) { ?>
																													<option value="<?php echo $v->id; ?>" ><?php echo $v->section_name; ?></option>																										<?php } ?>
																										</select>					   		

																									</div>
																							</div>
																							
																							 <div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Shift :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="shift_id" id="shift_id">
																												  <option value="">Select Shift </option>
																												  <?php foreach($shiftListInfo as $k=>$v) { ?>
																													<option value="<?php echo $v->id; ?>" ><?php echo $v->shift_name; ?></option>																										<?php } ?>
																										</select>		
																									</div>
																							</div>
																							
																							 <div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Class Roll :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="class_roll" id="class_roll">
																												  <option value="">Select Roll </option>
																												  <?php for($i=1; $i<=150; $i++) { ?>
																													<option value="<?php echo $i; ?>" ><?php echo $i; ?></option>																										<?php } ?>																						</select>		
																									</div>
																							</div>
																							
																							
																							
																							<div class="form-group">
																								  <label class="control-label col-sm-5 " for="year">Year :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="year" id="year" required>
																														  <option value="">Select Year </option>
																														  <?php for ($year = date('Y'); $year > date('Y')-5; $year--) { ?>
																															<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
																															<?php } ?>
																												</select>		
																									</div>
																							</div>
																							
																							 
																							
																							
																							
																							
																							
																							
																							 <div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Date Range :</label>
																								  <div class="input-group col-sm-7 paddingZero">
																								   <input type="text" name="fromDate" id="fromDate"  class="form-control date-picker" placeholder="YYYY-MM-DD">
																								  <span class="input-group-addon" id="basic-addon1"></span>
																								  <input type="text" class="form-control date-picker" name="toDate" id="toDate" placeholder="YYYY-MM-DD">
																								 </div>
																							</div>
																							
																							
																							
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
																					Search
																				</button>
																			</div>
																			  
																			</div>
												</form>
												
														<div class="row reportResultListView">
															<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
																
																<div class="clearfix">
																	<div class="pull-right tableTools-container"></div>
																</div>
																 
																	
						
																<!-- div.table-responsive -->
						
																<div class="table-header text-left">
																	Today Admitted Student List :
																</div>
																	
																<!-- div.dataTables_borderWrap -->
																<div>
																	<table id="dynamic-table" class="table table-striped table-bordered table-hover text-left stuListTable">
																		<thead>
																			<tr>
																			  <th class="center">SL</th>
																				<th>Stu ID</th>
																				<th>Name</th>
																				<th class="hidden-480">Class</th>
						
																				<th class="hidden-480">Section</th>
																				<th class="hidden-480">Roll</th>
																				<th class="hidden-480">Group</th>
																			</tr>
																		</thead>
						
																		<tbody>
																		
																		<?php
																			$i = 1;
																			$authorID = $this->session->userid;
																			$authorType = $this->session->usertype;
																			$authorBranchID = $this->session->authorBranchID;
																			if(isset($todayAdmittedStuInfo)) {
																			  $i = $onset + 1; 
																			 foreach($todayAdmittedStuInfo as $v) { 
																		
																		?>
																			<tr>
																			  <td class="center"><?php echo $i++; ?></td>
																				<td>
																				<span  class="stuInfoLoad btn-primary pointerCls"  stuID="<?php echo $v->stu_current_id; ?>"><?php echo $v->stu_current_id; ?></span>
																				<span  class="stuInfoHide btn-danger pointerCls"  stuID="<?php echo $v->stu_current_id; ?>"><?php echo $v->stu_current_id; ?></span>	
																				</td>
																				<td class="hidden-480"><?php echo $v->stu_full_name; ?></td>
																				<td class=""><?php echo $v->currClassInfo->class_name; ?></td>
																				<td class="hidden-480"><?php echo $v->currClassInfo->section_name; ?></td>
						
																				<td class="hidden-480"><?php echo $v->currClassInfo->class_roll; ?></td>
																				<td class="hidden-480"><?php echo $v->currClassInfo->group_name; ?></td>
																			</tr>
																		 <?php }}  ?>	
																		</tbody>
																	</table>
																	
																	<label class="pos-rel"><span class="lbl"></span></label>
																	<ul class="pagination-sm list-inline pull-right no-margin">
																		  <li class="pagi"><?php echo $this->pagination->create_links(); ?></li>
																	</ul>
						
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
		
<script type="text/javascript" >
$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy/mm/dd',
})


$("#findReportResultList").submit(function(e)
{
	var student_type = $('#student_type').val();
	
	if(student_type !=''){
		$('.textAlert').text('');
	   return true;
	}else{
	  $('.textAlert').text('Please Select student type');
	  return false;
	}
	
	e.preventDefault();
});
	
	
$('.add_new').on('click', function() {
	$('.add_new').fadeOut("slow");
	$('.addFormContent').fadeIn("slow");
});

$('.formCancel').on('click', function() {
	$('.addFormContent').fadeOut('slow');
	$('.add_new').fadeIn('slow');
});

$('.tryAgain').on('click', function() {
	$('#addForm').fadeIn("slow");
	$('.afterSubmitContent').fadeOut('slow');
	$("#addForm input[type='text'], input[type='hidden'], input[type='number'], input[type='email']").val("");
	$("#addForm option:selected").prop("selected", false);
	$('#class_roll').val('');
	$('#class_roll').attr('type', 'hidden');
	$('.GenerateClassRoll').css('display', 'block');
});




$('.stuInfoLoad').on('click', function(){
	var stuID = $(this).attr('stuID');
	var formURL = "<?php echo site_url('allReport/stuInfoLoad'); ?>";
	var parent = $(this).parents('tr');
	$('.stuInfoHide').css('display','none');
	$('.stuInfoLoad').css('display','block');
	//$('.curOrderDtls').html('');
	$(this).css('display','none');
	$(this).parents('tr').find('.stuInfoHide').css('display' , 'block');
	
	$.ajax(
		{
			url : formURL,
			type: "POST",
			data : {stuID: stuID},
			//dataType: "json",
			success:function(data){
				$('.stuListTable .details').remove();
				$('<tr class="details"><td colspan="7">'+data+'</td></tr>').insertAfter(parent);
				
				 
				//$('.orderDetalsLoad').removeClass('orderDetalsLoad');					
			}
		});
	});	
	
$('.stuInfoHide').on('click', function() {
	$('.stuListTable .details').remove();
	$('.stuInfoLoad').css('display','block');
	$('.stuInfoHide').css('display','none');
});
	
$('[data-rel=tooltip]').tooltip({container:'body'});
$('[data-rel=popover]').popover({container:'body'});
</script>