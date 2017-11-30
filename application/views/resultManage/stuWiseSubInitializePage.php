
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
							<a href="<?php echo site_url('resultSubModule'); ?>">Result</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('resultSubModule/examSystem'); ?>">Exam System</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('resultSubModule/stuWiseSubject'); ?>">Student Wise subject initialize</a>
					</div>
				</div>	
	</div>
				
				<div class="col-md-11 col-lg-11">
					<div class="row">
					<div class="col-md-2 col-sm-2 col-lg-2 ">
						
						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 interfaceBody">
							<div class="row text-center">
								<!-- PAGE CONTENT BEGINS -->
								<!-- /.row -->
								  <div id="widget-container-col-12" class="col-md-11 col-xs-12 col-sm-12 col-lg-12 widget-container-col ui-sortable addFormContent" style="min-height: 172px;">
									<div id="widget-box-11" class="widget-box widget-color-dark ui-sortable-handle" style="opacity: 1;">
										<div class="widget-header">
											<h4 class="widget-title">Student Wise subject initialize</h4>
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
											<form id="addForm" class="form-horizontal" role="form" action="<?php echo site_url('resultSubModule/stuWiseSubInitialize'); ?>" enctype="multipart/form-data" method="post">
												<div class="scroll-content">
															<div class="content img-thumbnail container">
																  <input type="hidden" class="form-control" name="update_id" id="update_id"  value=""/>
																		<div class="col-md-12">
																		 <div class="col-md-4" style="padding-top: 20px">
																		     <div class="form-group">
																			  <label class="control-label col-sm-5 " for="branch_id">Campus* :</label>
																			  <div class="col-sm-7 paddingZero">
																					<select class="form-control" name="branch_id" id="branch_id" required>
																						  <option value="">Select Campus*</option>
																						  <?php foreach($branchListInfo as $k=>$v) { ?>
																							<option <?php if($branch_id == $v->id) echo 'selected'; ?> value="<?php echo $v->id; ?>" ><?php echo $v->branch_name; ?></option>	
																						  <?php } ?>
																					 </select>	
																					 <span style="color:#FF0000" class="balert"></span>				
																				</div>
																			  </div>
						                                                     
																		 </div>
					
					
																		 <div class="col-md-4 " style="padding-top: 20px">
																			
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="class_id">Class* :</label>
																			  <div class="col-sm-7 paddingZero">
																					<select class="form-control" name="class_id" id="class_id" required>
																						  <option value="">Select Class* </option>
																						   <?php foreach($classListInfo as $k=>$v) { ?>
																						  <option <?php if($class_id == $v->id) echo 'selected'; ?> value="<?php echo $v->id; ?>" data-class-name="<?php echo $v->class_name; ?>"><?php echo $v->class_name; ?></option>		
																						  <?php } ?>																								
																				</select>
																				<span style="color:#FF0000" class="calert"></span>			
																				</div>
																			</div>
																			
																			
																			
																		 </div>
																		 
																		 <div class="col-md-4 " style="padding-top: 20px">
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="group_id">Group* :</label>
																				  <div class="col-sm-7 paddingZero">
																						<select class="form-control" name="group_id" id="group_id" required="required">
																							<option value="" selected="selected" >Select Group* </option>
																								<?php foreach($groupListInfo as $k=>$v) { ?>
																								<option <?php if($group_id == $v->id) echo 'selected'; ?> value="<?php echo $v->id; ?>" ><?php echo $v->group_name; ?></option>
																								<?php } ?>
																							</select>
																							<span style="color:#FF0000" class="galert"></span>	
																					</div>
																				</div>
																				
																				
																				<div class="form-group">
																					  <label class="control-label col-sm-5 " for="year">Year* :</label>
																					  <div class="col-sm-7 paddingZero">
																							<select class="form-control" name="year" id="year" required>
																							  <option value="">Select Year </option>
																							   <?php for ($year = date('Y'); $year > date('Y')-100; $year--) { ?>
																							   <option <?php if($year2 == $year) echo 'selected'; ?> value="<?php echo $year; ?>"><?php echo $year; ?></option>
																							   <?php } ?>
																							</select>	
																							<span style="color:#FF0000" class="yalert"></span>	
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
										<div class="table-header" style="height:45px; padding-top:2px;">
										   Student List
										</div>
											
											

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div id="listView">
										   <form  class="form-horizontal" role="form" action="<?php echo site_url('resultSubModule/studentWiseSubjectInsert'); ?>" enctype="multipart/form-data" method="post">
										   <input type="hidden" name="year" value ="<?php echo $year2; ?>" />
											 <table  class="table table-bordered">
												<thead>
													<tr>
														<th class="center" width="5%">
														  Sl No														</th>
														<th width="20%">Name</th>
														<th width="10%">Class</th>
														<th width="55%"><input type="checkbox" name="alcheck"> &nbsp; &nbsp; Subject List</th>
														<th width="10%">Action</th>
													</tr>
												</thead>

												
												
												<?php 
												   $sl = 1;
												   foreach($studentList as $v) { 
												    if(!empty($v->initSubjectList)){
												 ?>
												  <tbody class="inputTable2">
													<tr style="background-color:#FFEBEB">
														<td class="center">
                                                           <?php echo $sl++; ?>														</td>

														<td><?php echo $v->stu_full_name; ?></td>
														<td class="hidden-480"><?php echo $v->class_name; ?></td>
														<td>
														    <div class="row">
															 <?php foreach ($subjectList as $vs){ ?>
															     <div class="col-md-4 parents">
																   <?php if(in_array($vs->id, $v->initSubjectList)){ ?>
																        <i class="glyphicon glyphicon-ok"> </i>
																	 <?php } else { ?>
																	  <i class="glyphicon glyphicon-remove"> </i>
																	  <?php } ?>
																    <?php echo $vs->subject_name ?></div>
															 <?php } ?>
															</div>														</td>
														<td>
															<button class="btn btn-sm btn-success subReset" data-id="<?php echo $v->stu_auto_id;  ?>" data-year="<?php echo $year2;  ?>">
																<i class="ace-icon fa fa-check"></i>
																Reset															</button>														</td>
													</tr>
													</tbody>
												 <?php } else {  ?>	
												  <tbody class="inputTable">
												  
												    
												    <tr style="background-color:#F9F9F9">
														<td class="center">
                                                           <?php echo $sl++; ?>														</td>

														<td><?php echo $v->stu_full_name; ?></td>
														<td class="hidden-480"><?php echo $v->class_name; ?></td>
														<td>
														    <div class="row">
															 <?php foreach ($subjectList as $vs){ ?>
															     <div class="col-md-4 parents">
																	<input type="checkbox" name="student_id[]" id="student_id[]" value="<?php echo $v->stu_auto_id ?>" style="display:none">
																	<input type="checkbox" name="subject_id[]" id="subject_id[]" value="<?php echo $vs->id ?>" style="display:none" >
																    <input type="checkbox" name="choose"> <?php echo $vs->subject_name ?></div>
															 <?php } ?>
															</div>														</td>
														<td>
															<button class="btn btn-sm btn-success" disabled="disabled">
																<i class="ace-icon fa fa-check"></i>
																Reset															</button>														</td>
													</tr>
													</tbody>
													 <?php } } ?>
													 
													 <tr style="background-color:#F9F9F9">
												      <td colspan="5" align="center" valign="middle" class="center">
																<button class="btn btn-sm btn-primary" type="submit">
																	<i class="ace-icon fa fa-check"></i>
																	Submit
																</button>
														</td>
											        </tr>
											</table>
 
											</form>
										</div>
									</div>
								</div>
							 
					</div>
				</div>
				</div>
				
	  <?php $this->load->view('common/footer'); ?>
	  
	  <div class="modal fade" id="subjectReset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">				
					
				</div>
			</div>
		</div>
				
	</body>
</html>
<script>

 $(document).on("click", ".subReset", function(e){
  	var stuId 		= $(this).attr('data-id');
	var year 		= $(this).attr('data-year');
	console.log(stuId);

  	var url = "<?php echo site_url('resultSubModule/subjectReset'); ?>";

  	$.ajax(
			{
				url : url,
				type: "POST",
				data : {stuId: stuId, year : year},
				dataType: "html",
				success:function(data){
					$("#subjectReset .modal-content").html(data);
					$("#subjectReset").modal({
						keyboard: false,
						backdrop: 'static',
					});
					$("#subjectReset").modal('show');

					 
				}
			});

	 e.preventDefault();		
  	 
  });
  
  
// insert
 $(document).on('click', 'input[name="choose"]', function(e){
  var parents = $(this).parents('.parents');
  var checked = this.checked;
   if(checked){ 
       parents.find('input[name="subject_id[]"]').prop('checked', true);
	   parents.find('input[name="student_id[]"]').prop('checked', true);
  } else {
       parents.find('input[name="subject_id[]"]').prop('checked', false); 
	   parents.find('input[name="student_id[]"]').prop('checked', false); 
  }
 });
 
 // alcheck 
  
  $(document).on('click', 'input[name="alcheck"]', function(e){
   var checked = this.checked;
   if(checked){ 
	   $('input[name="subject_id[]"]').prop('checked', true);
	   $('input[name="student_id[]"]').prop('checked', true);
	   $('input[name="choose"]').prop('checked', true);
  } else {
	   $('input[name="subject_id[]"]').prop('checked', false); 
	   $('input[name="student_id[]"]').prop('checked', false);
	   $('input[name="choose"]').prop('checked', false); 
  }
 });
 

  
	
			
</script>

	
		
