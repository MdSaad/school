
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
							<a href="<?php echo site_url('resultSubModule'); ?>">Result</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('resultSubModule/examSystem'); ?>">Exam System</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('resultSubModule/subjectManage'); ?>">Subject Manage</a>
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
											<h4 class="widget-title">Subject Manage</h4>
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
											<form id="addForm" class="form-horizontal" role="form" action="<?php echo site_url('resultSubModule/subjectStore'); ?>" enctype="multipart/form-data" method="post">
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
																							<option value="<?php echo $v->id; ?>" ><?php echo $v->branch_name; ?></option>	
																						  <?php } ?>
																					 </select>	
																					 <span style="color:#FF0000" class="balert"></span>				
																				</div>
																			  </div>
																			  
																			  <div class="form-group">
																					  <label class="control-label col-sm-5 " for="year">Year* :</label>
																					  <div class="col-sm-7 paddingZero">
																							<select class="form-control" name="year" id="year" required>
																							  <option value="">Select Year </option>
																							   <?php for ($year = date('Y'); $year > date('Y')-100; $year--) { ?>
																							   <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
																							   <?php } ?>
																							</select>	
																							<span style="color:#FF0000" class="yalert"></span>	
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
																						  <option value="<?php echo $v->id; ?>" data-class-name="<?php echo $v->class_name; ?>"><?php echo $v->class_name; ?></option>		
																						  <?php } ?>																								
																				</select>
																				<span style="color:#FF0000" class="calert"></span>			
																				</div>
																			</div>
																			
																			<div class="form-group">
																				  <label class="control-label col-sm-5 " for="teacher_id">Subject Teacher :</label>
																				  <div class="col-sm-7 paddingZero">
																				    <div class="input-group">
																						<select class="form-control teacherListView" name="teacher_id" id="teacher_id">
																						<option value="" selected="selected" >Select Teacher</option>
																					 </select>
																						<span class="input-group-addon addInstant">
																							<a class="addTea" title="Add New" href="#">  
																							   <i class="fa fa-plus "></i>
																							</a>
																							&nbsp;
																						   <a class="editTea" title="Edit Teacher" href="#">  
																							 <i class="fa fa-pencil "></i>
																						   </a>
																						</span>
																						
																						 
																					</div>
																				 </div>
																			 </div>
																			 
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="subject_type">Subject Type* :</label>
																			  <div class="col-sm-7 paddingZero">
																					<select class="form-control" name="subject_type" id="subject_type" required>
																						  <option value="">Select Subject Type* </option>
																						  <option value="compulsory">Compulsory</option>
																						   <option value="elective">Elective</option>
																						  <option value="optional">Optional/4th Subject</option>		
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
																								<option value="<?php echo $v->id; ?>" ><?php echo $v->group_name; ?></option>
																								<?php } ?>
																								<option value="all" >All</option>
																							</select>
																							<span style="color:#FF0000" class="galert"></span>	
																					</div>
																				</div>
																				
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5 " for="subject_name">Subject Name* :</label>
																				  <div class="col-sm-7 paddingZero">
																						<input type="text" name="subject_name" id="subject_name" class="form-control"  placeholder="Subject Name*" required="required">	
																					</div>
																				</div>
																				
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5 " for="subject_code">Subject Code* :</label>
																				  <div class="col-sm-7 paddingZero">
																						<input type="text" name="subject_code" id="subject_code" class="form-control"  placeholder="Subject Code*" required="required">	
																					</div>
																				</div>
																				
																				
																			</div>
																			
																		
																			
																		</div>
																	</div>
																	
																	  <div class="modal-footer">
																	   <?php if(!empty($alertData)){ ?>
																		   <div class="col-md-8">
																				<div class="alert alert-block alert-success text-left" style="height: 35px; padding:5px 5px 5px 5px;">
																				<button class="close" data-dismiss="alert" type="button">
																				<i class="ace-icon fa fa-times"></i>
																				</button>
																				<strong class="green">
																				<i class="ace-icon fa fa-check-square-o"></i>
																				
																				</strong>
																				<span class="alrtText text-center"><?php echo $alertData ?></span>
																			   </div>
																			</div>
																		<?php } ?>
														
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
										  <form class="form-inline pull-left" role="form" action="#">
												<div class="form-group">
												  Search By :
												</div>
												<div class="form-group">
												  <label for="branch_id"></label>
												 <select class="form-control" name="branch_id" id="branch_id_search">
														  <option value="">Select Campus*</option>
														  <?php foreach($branchListInfo as $k=>$v) { ?>
															<option value="<?php echo $v->id; ?>" ><?php echo $v->branch_name; ?></option>	
														  <?php } ?>
													 </select>	
												</div>
												
												<div class="form-group">
												  <label for="department_id"></label>
												  <select class="form-control" name="class_id" id="class_id_search">
														  <option value="">Select Class* </option>
														   <?php foreach($classListInfo as $k=>$v) { ?>
														  <option value="<?php echo $v->id; ?>" data-class-name="<?php echo $v->class_name; ?>"><?php echo $v->class_name; ?></option>		
														  <?php } ?>																								
												</select>
												</div>
												<div class="form-group">
												  <label for="email"></label>
												  <select class="form-control" name="group_id" id="group_id_search">
													<option value="" selected="selected" >Select Group* </option>
														<option value="all" >All</option>
														<?php foreach($groupListInfo as $k=>$v) { ?>
														<option value="<?php echo $v->id; ?>" ><?php echo $v->group_name; ?></option>
														<?php } ?>
													</select>
												</div>
												
												<div class="form-group">
												  <label for="email"></label>
												  <select class="form-control" name="year" id="year_search">
													  <option value="">Select Year </option>
													   <?php for ($year = date('Y'); $year > date('Y')-10; $year--) { ?>
													   <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
													   <?php } ?>
													</select>	
												</div>
												
											  </form> 
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
														<th>Campus</th>
														<th>Class</th>
														<th>Subject</th>
														<th width="10%">Action</th>
													</tr>
												</thead>

												<tbody>
												
												<?php 
												   $sl = 1;
												   foreach($allSubjectInfo as $v) { 
												 ?>
													<tr style="background-color:#F9F9F9">
														<td class="center">
                                                           <?php echo $sl++; ?>
														</td>

														<td><?php echo $v->branch_name; ?></td>
														<td class="hidden-480"><?php echo $v->class_name; ?></td>
														<td><?php echo $v->subject_name; ?></td>
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
				
				<form class="modal fade" id="addNewTeacher" role="dialog" action="<?php echo site_url('diary/teacherStore'); ?>" method="post" enctype="multipart/form-data">
			 <input type="hidden" name="tea_edit_id" id="tea_edit_id">
			 <input type="hidden" name="branch_id_tea" id="branch_id_tea">
			 <input type="hidden" name="class_id_tea" id="class_id_tea">
			 <input type="hidden" name="group_id_tea" id="group_id_tea">
			 <input type="hidden" name="year_tea" id="year_tea">
		
			
			<div class="modal-dialog modal-sm">
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-primary no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Teacher :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Teacher Name :</label>
				  	<input name="teacher_name" id="teacher_name" type="text" class="form-control" required="required" placeholder="Enter Teacher Name">
				  </div>
				</div>
				<div class="btn-lg btn-default  no_radius text-right">
				  <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">
						<i class="ace-icon fa fa-times"></i>
						Close
					</button>
					
					
				  <button class="btn btn-sm btn-primary" type="submit">
						<i class="ace-icon fa fa-check"></i>
						<span class="updateTea">Submit</span>
					</button>
				</div>
			  </div>
			  
			</div>
 	 </form>
				
	  <?php $this->load->view('common/footer'); ?>
				
	</body>
</html>

	
		
<script>

   // search onchange
   
     $("#year_search, #branch_id_search, #class_id_search, #group_id_search").change(function() {
	 
		var year_search 		    = $("#year_search").val();
		var branch_id_search 		= $("#branch_id_search").val();
		var class_id_search 		= $("#class_id_search").val();
		var group_id_search 		= $("#group_id_search").val();
		console.log(branch_id_search);
		
			
		$.ajax({
			url : SAWEB.getSiteAction('resultSubModule/searchWiseSubjectData'), // URL TO LOAD BEHIND THE SCREEN
			type : "POST",
			data : { class_id_search : class_id_search, branch_id_search : branch_id_search, group_id_search : group_id_search, year_search : year_search},
			dataType : "html",
			success : function(data) {			
				$("#listView").html(data);
			}
		  });
		
	   });	
		   

  		//Onchang for Subject Teacher
			$("#year, #branch_id, #class_id, #group_id, #section_id, #shift_id").change(function() {
			var branch_id 		= $("#branch_id").val();
			var class_id 		= $("#class_id").val();
			var group_id 		= $("#group_id").val();
			var year 			= $("#year").val();	
				
			$.ajax({
				url : SAWEB.getSiteAction('diary/teacherList'), // URL TO LOAD BEHIND THE SCREEN
				type : "POST",
				data : { branch_id : branch_id, class_id : class_id, group_id : group_id, year : year },
				dataType : "html",
				success : function(data) {			
					$("#teacher_id").html(data);
				}
			  });
			
		   });	
		   
		   
		   // add teacher start
	$(document).on("click", ".addTea", function()
	{
		var branch_id 		= $("#branch_id").val();
		var class_id 		= $("#class_id").val();
		var group_id 		= $("#group_id").val();
		var year 			= $("#year").val();
		
		if(branch_id && class_id && group_id && year){
		    $("#addNewTeacher #branch_id_tea").val(branch_id);	
			$("#addNewTeacher #class_id_tea").val(class_id);
			$("#addNewTeacher #group_id_tea").val(group_id);	
			$("#addNewTeacher #year_tea").val(year);	
		    $("#addNewTeacher").find("input[type=text], input[name='tea_edit_id']").val("");
			$('#addNewTeacher .updateTea').text("Submit");
		   $('#addNewTeacher').modal('show');
		   $('.balert').text("");
		   $('.calert').text("");
		   $('.galert').text("");
		   $('.yalert').text("");
		} else {
		  if(!branch_id)    $('.balert').text("Please Select a Branch");
		  else              $('.balert').text("");
		  if(!class_id)     $('.calert').text("Please Select a Class"); 	
		  else              $('.calert').text(""); 
		  if(!group_id) 	$('.galert').text("Please Select a Group");
		  else              $('.galert').text("");
		  if(!year) 		$('.yalert').text("Please Select a Year");
		  else              $('.yalert').text("");
		}
	});

// ad teacher end

//teacher edit
   $(document).on("click", ".editTea", function()
	{
		
		var teacherName 	= $("#teacher_id option:selected").attr('data-teacher-name');
		var editId      	= $("#teacher_id option:selected").val();
		var branch_id 		= $("#branch_id").val();
		var class_id 		= $("#class_id").val();
		var group_id 		= $("#group_id").val();
		var year 			= $("#year").val();
		
		if(editId && branch_id && class_id && group_id && year){
		 console.log($("#addNewTeacher #teacher_name").val(teacherName));
		 console.log($("#addNewTeacher #tea_edit_id").val(editId));
		$("#addNewTeacher #branch_id_tea").val(branch_id);	
		$("#addNewTeacher #class_id_tea").val(class_id);
		$("#addNewTeacher #group_id_tea").val(group_id);	
		$("#addNewTeacher #year_tea").val(year);	
		 $('#addNewTeacher .updateTea').text("Update");
		 $('#addNewTeacher').modal('show');
		   $('.tealert').text("");
		   $('.balert').text("");
		   $('.calert').text("");
		   $('.galert').text("");
		   $('.yalert').text("");
		} else {
		  if(!editId)    	$('.tealert').text("Please Select a Teacher");
		  else              $('.tealert').text("");
		  if(!branch_id)    $('.balert').text("Please Select a Branch");
		  else              $('.balert').text("");
		  if(!class_id)     $('.calert').text("Please Select a Class"); 	
		  else              $('.calert').text(""); 
		  if(!group_id) 	$('.galert').text("Please Select a Group");
		  else              $('.galert').text("");
		  if(!year) 		$('.yalert').text("Please Select a Year");
		  else              $('.yalert').text("");
		}
		
		
	});
	
	// teacher edit end
	
	// add a teacher start
	
	 	
	 $("#addNewTeacher").submit(function(e)
		{
			var postData = $(this).serializeArray();
			console.log(postData);
			var formURL = $(this).attr("action");
			$.ajax(
			{
				url : formURL,
				type: "POST",
				async: false,
				data : postData,
				success:function(data){
					$(".teacherListView").html(data);				
					$("#addNewTeacher input[type='text'], #addNewTeacher input[type='hidden']").val("");
					$('#addNewTeacher').modal('hide');
				}
			});
			
			e.preventDefault();
		});
		
		// edit subject 
		
		 $(document).on("click", ".green", function(e)
			{
				
				var id 		= $(this).attr("data-id");
				var formURL = "<?php echo site_url('resultSubModule/subjectEditInfo'); ?>";
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
						$('#branch_id').val(data.branch_id);
						$('#class_id').val(data.class_id);
						$('#subject_name').val(data.subject_name); 
						$('#subject_type').val(data.subject_type);
						$('#subject_code').val(data.subject_code);
						$('#year').val(data.year);
						$('#group_id').val(data.group_id);
						
						$('#teacher_id').html('<option value="">Select Teacher</option>');
					
						$.each(data.allTeacherList, function(key, value){
							var option = '<option value="'+value.id+'" data-teacher-name="'+value.teacher_name+'">'+value.teacher_name+'</option>';
							$('#teacher_id').append(option);						
						});
						
						$('#teacher_id').val(data.teacher_id);
						$('#addForm .update').text("Update");
				
					}
				});
				
				e.preventDefault();
			});
		
		// delete subject 
		
		 $('.red').on('click', function() {
			var x = confirm('Are you sure to delete?');
			
			if(x){
				var id = $(this).attr('data-id');
				console.log(id);
				var url = SAWEB.getSiteAction('resultSubModule/subjectDelete/'+id);
				location.replace(url);
			} else {
				return false;
			}
		});

		
		
		   

</script>