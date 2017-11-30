
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
							<a href="<?php echo site_url('resultSubModule'); ?>">Result</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('resultSubModule/examSystem'); ?>">Exam System</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('resultSubModule/examTypeManage'); ?>">Class Wise Exam Type Manage</a>
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
											<h4 class="widget-title">Class Wise Exam Type Manage</h4>
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
											<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('resultSubModule/examTypeInfoStore'); ?>" enctype="multipart/form-data" method="post">	
												<input type="hidden" name="id" id="id">
													<input type="hidden" name="editMode" id="editMode">
												                   <div class="scroll-content">
																		 <div class="content img-thumbnail container">
																		<div class="col-md-12">
																		 
																				 <div class="col-md-12  initialPart">
																							
																						 <div class="col-md-6">
																							<div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Campus/Branch :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="branch_id" id="branch_id" required>
																												  <option value="">Select Campus</option>
																												  <?php foreach($branchListInfo as $k=>$v) { ?>
																													<option value="<?php echo $v->id; ?>" ><?php echo $v->branch_name; ?></option>																										<?php } ?>
																										</select>																	   		
																								 </div>
																							 </div>
																							 
																							 
																							 <div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Class :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="class_id" id="class_id" required>
																												  <option value="">Select Class </option>
																												  <?php foreach($classListInfo as $k=>$v) { ?>
																													<option value="<?php echo $v->id; ?>" ><?php echo $v->class_name; ?></option>																										<?php } ?>
																										</select>																	   		
																								 </div>
																							 </div>
																							 
																						  </div>
																						 
																						 <div class="col-md-6">
																						 
																						 
																						 	<div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Year :</label>
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
																								  <label class="control-label col-sm-5 " for="exam_type_id">Exam Type Name :</label>
																								  <div class="col-sm-7 paddingZero">
																								      <select class="form-control" name="exam_type_id" id="exam_type_id" required>
																												  <option value="">Select Exam Type Name </option>
																												  <?php foreach($allExamListInfo as $k=>$v) { ?>
																													<option value="<?php echo $v->id; ?>" ><?php echo $v->exam_type_name; ?></option>																										<?php } ?>
																										</select>		
																										
																								 </div>
																							 </div>
																							 
																							 
																							
																							
																							
																						 </div>
																						
																					</div>	
																			
																			
																		<div class="divForView">	
																				
																		</div>
																				
																		</div>
																	</div>
																	
																	  <div class="modal-footer displayNoneBB">
																	  	
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
												
												
	
												
												
															<div class="alert alert-block alert-success afterSubmitContent" id="" style="display:none;">
																<button class="close" data-dismiss="alert" type="button">
																<i class="ace-icon fa fa-times"></i>
																</button>
																<strong class="green">
																<i class="ace-icon fa fa-check-square-o"></i>
																
																</strong>
											<span class="alrtText"><span class="updatMsg">New Exam Type Update Successfully.</span> Add New Click <strong class="btn-danger tryAgain">Here</strong></span>
												</div>
												
														 
														  <div class="row listView">
															<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
																
																<div class="clearfix">
																	<div class="pull-right tableTools-container"></div>
																</div>
																 
																	
						
																<!-- div.table-responsive -->
						
																<div class="table-header text-left">
																	Exam Type List :
																</div>
																	
																<!-- div.dataTables_borderWrap -->
																<div>
																	<table id="dynamic-table" class="table table-striped table-bordered table-hover text-left stuListTable">
																		<thead>
																			<tr>
																			  <th class="center">SL</th>
																				<th>Branch Name</th>
																				<th>Class Name</th>
																				<th>Year</th>
																				<th class="">Exam Type Name</th>
																				<th class="">Action</th>
																			</tr>
																		</thead>
						
																		<tbody>
																		
																		<?php
																			$i = 1;
																			$authorID = $this->session->userid;
																			$authorType = $this->session->usertype;
																			$authorBranchID = $this->session->authorBranchID;
																			if(isset($examTypeList)) {
																			  $i = $onset + 1; 
																			 foreach($examTypeList as $v) { 
																		
																		?>
																			<tr>
																			  <td class="center"><?php echo $i++; ?></td>
																				<td><?php echo $v->branch_name; ?></td>
																				<td class="hidden-480"><?php echo $v->class_name; ?></td>
																				<td class="hidden-480"><?php echo $v->year; ?></td>
																				<td class="hidden-480"><?php echo $v->exam_type_name; ?></td>
																				<td class=""><a href="#" class="green" data-id="<?php echo $v->id; ?>">Edit</a></td>
																			</tr>
																		 <?php }}  ?>	
																		</tbody>
																	</table>
																	
																	<label class="pos-rel"><span class="lbl"></span></label>
																	<ul class="pagination-sm list-inline">
																		  <li class="pagi"><?php echo $this->pagination->create_links(); ?></li>
																	</ul>
						
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
				</div>
				
	  <?php $this->load->view('common/footer'); ?>
				
	</body>
</html>

<script>
$("#addForm").submit(function(e)
	{
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
				//location.replace(successUrl);
				$('#addForm').css('display', 'none');
				$('.afterSubmitContent').css('display', 'block');
				$('.listView').html(data);
			}
		  });
		e.preventDefault();
	});
	
	$('.formCancel').on('click', function() {
	$('#addForm').fadeOut('slow');
	//$('.add_new').fadeIn('slow');
});

$('.tryAgain').on('click', function() {
	$('#addForm').fadeIn("slow");
	$('.afterSubmitContent').fadeOut('slow');
	$("#addForm input[type='text'], input[type='hidden'], input[type='number'], input[type='email']").val("");
	$("#addForm option:selected").prop("selected", false);
	$('#class_roll').val('');
	$('#class_roll').attr('type', 'hidden');
	$('.GenerateClassRoll').css('display', 'block');
	$(".update").text("Submit");
	$(".updatMsg").text('Add New Type Successfully.');
});




$(".green").on('click', function(){
	var id = $(this).attr("data-id");
	var resultsubmule = "<?php echo site_url("resultSubModule/examTypeManage"); ?>";
	var url = "<?php echo site_url("resultSubModule/edit"); ?>";
	$.ajax(
	{
		url: url,
		type:"POST",
		data:{id:id},
		dataType: "json",
		success:function(data){
		$('#addForm').css('display', 'block');
		$("#id").val(data.id);
		$("#branch_id").val(data.branch_id);
		$("#class_id").val(data.class_id);
		$("#exam_type_id").val(data.exam_type_id);
		$("#year").val(data.year);
		$("#status").val(data.status);
		$(".update").text("Update");
		$(".updatMsg").text('Update Successfully.');
		}
		
	});
	
	
});






</script>	
