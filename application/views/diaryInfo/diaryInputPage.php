
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
							<a href="<?php echo site_url('diary'); ?>">Diary</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('diary/diaryInput'); ?>">Diary Information Management</a>
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
						<h4 class="widget-title">Diary Information Management</h4>
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
					
	<div id="inputTable" class="widget-body">
	 <div class="widget-main padding-4"  style="position: relative;">
		<form class="form-horizontal" id="diaryDataInsertForm" role="form" action="<?php echo site_url('diary/diaryDataInputAction'); ?>" enctype="multipart/form-data" method="post">	
			<div class="scroll-content">
				 <div class="content img-thumbnail container">
				<div class="col-md-12">
				 <div class="row textleft">
					  <h4 class="text-left"> Diary Information Management <span class="alert" style="padding-left:20px; color:#0000FF"> </span> </h4>
				 </div>
					<div class="col-md-12 img-thumbnail boxShadow_1">
					 <div class="col-md-4">
						<div class="form-group">
							<label class="control-label col-sm-5 " for="email">Branch :</label>
							<div class="col-sm-7 paddingZero">
							    <select class="form-control" name="branch_id" id="branch_id" required>
											  <option value="">Select Campus*</option>
											  <?php foreach($branchListInfo as $k=>$v) { ?>
												<option value="<?php echo $v->id; ?>" ><?php echo $v->branch_name; ?></option>																										<?php } ?>
								 </select>	
								 <span style="color:#FF0000" class="balert"></span>																   		
							 </div>
						 </div>
													 
						 <div class="form-group">
							  <label class="control-label col-sm-5 " for="email">Section :</label>
							  <div class="col-sm-7 paddingZero">
								<select class="form-control" name="section_id" id="section_id" required>
								  <option value="">Select Section*</option>
								    <?php foreach($sectionListInfo as $k=>$v) { ?>
									<option value="<?php echo $v->id; ?>" ><?php echo $v->section_name; ?></option><?php } ?>
								</select>
								 <span style="color:#FF0000" class="salert"></span>																		   		
							 </div>
						 </div>
					 </div>
												 
					 <div class="col-md-4">
						  <div class="form-group">
							  <label class="control-label col-sm-5 " for="email">Class :</label>
							  <div class="col-sm-7 paddingZero">
									<select class="form-control" name="class_id" id="class_id" required>
											  <option value="">Select Class* </option>
											  <?php foreach($classListInfo as $k=>$v) { ?>
												<option value="<?php echo $v->id; ?>" data-class-name="<?php echo $v->class_name; ?>"><?php echo $v->class_name; ?></option>																										<?php } ?>
									</select>	
								<span style="color:#FF0000" class="calert"></span>																	   		
							 </div>
						 </div>
						 <div class="form-group">
							  <label class="control-label col-sm-5 " for="email">Shift :</label>
							  <div class="col-sm-7 paddingZero">
									<select class="form-control" name="shift_id" id="shift_id" required="required">
									   <option value="" selected="selected" >Select Shift* </option>
										<?php foreach($shiftListInfo as $k=>$v) { ?>
										<option value="<?php echo $v->id; ?>" ><?php echo $v->shift_name; ?></option>
										<?php } ?>
								
									</select>
									<span style="color:#FF0000" class="shalert"></span>	
								</div>
						</div>
						
					 </div>
					 
					 <div class="col-md-4">
					 <div class="form-group">
						  <label class="control-label col-sm-5 " for="email">Group :</label>
					  <div class="col-sm-7 paddingZero">
							<select class="form-control" name="group_id" id="group_id" required="required">
							<option value="" selected="selected" >Select Group* </option>
								<?php foreach($groupListInfo as $k=>$v) { ?>
								<option value="<?php echo $v->id; ?>" ><?php echo $v->group_name; ?></option>
								<?php } ?>
						
							</select>
							<span style="color:#FF0000" class="galert"></span>	
						</div>
					</div>
					 <div class="form-group">
						  <label class="control-label col-sm-5 " for="email">Year* :</label>
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
					 
					<div class="form-group">
					  <label class="control-label col-sm-2" > Subject Teacher :</label>
					  <div class="col-sm-3">
						 <div class="input-group">
							<select class="form-control teacherListView" name="teacher_id" id="teacher_id" required="required">
							<option value="" selected="selected" >Select Teacher*</option>
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
					  
					  <label class="control-label col-sm-1" > Subject:</label>
					  <div class="col-sm-3">
						 <div class="input-group">
							<select class="form-control subjectListView" name="subject_id" id="subject_id" required="required">
							<option value="" selected="selected" >Select Subject*</option>
						 </select>
						 <span style="color:#FF0000" class="subalert"></span>	
							<span class="input-group-addon addInstant">
							   <a class="addSub" title="Add New" href="#">  
								   <i class="fa fa-plus "></i>
								</a>
								&nbsp;
							   <a class="editSub" title="Edit Subject" href="#">  
								 <i class="fa fa-pencil "></i>
							   </a>
							</span>
							 
						</div>
					  </div>
					</div>
					
					<div id="initiateMove" class="col-md-12 text-center" style="padding-bottom:10px">
					   <button class="btn btn-sm btn-primary" id="initiate">
							<i class="ace-icon fa fa-check"></i>
							 Initiate 
						</button>
					</div>
					
					 
				</div>	
				 
				
					<div id="diaryContentData" class="col-md-12 img-thumbnail boxShadow_1 text-left" style="display:none">
					  <div class="row textleft">
						  <h4 class="text-center" style="padding-left:12px;"> Add Diary Content of <span class="addClassName"></span> </h4>
					 </div>
					   
					  <div class="col-md-3">
					     <div class="form-group">
	                           <label for="admin_type">Date</label>        
								<div>
								   <input type="text" name="date" id="date" class="form-control date-picker"  placeholder="Date">	
									
								</div>
	                      </div>
					  </div>
					  
					     <div class="col-md-5" style="padding-left:25px;">
						     <div class="form-group">
	                           <label for="admin_type">Content</label>        
								<div>
								    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-condensed table-bordered">
									  <tr>
										<td width="6%"> 1 </td>
										<td width="94%"><input type="text" name="diary_content1" class="form-control" id="diary_content1"></td>
									  </tr>
									  <tr>
										<td> 2</td>
										<td><input type="text" name="diary_content2" class="form-control" id="diary_content2"></td>
									  </tr>
									  <tr>
										<td> 3</td>
										<td><input type="text" name="diary_content3" class="form-control" id="diary_content3"></td>
									  </tr>
									  <tr>
										<td> 4</td>
										<td><input type="text" name="diary_content4" class="form-control" id="diary_content4"></td>
									  </tr>
									  <tr>
										<td> 5</td>
										<td><input type="text" name="diary_content5" class="form-control" id="diary_content5"></td>
									  </tr>
									 
								 </table>
								</div>
	                      </div>
						    
						</div>
					  
					  <div class="col-md-4" style="padding-left:25px;">
					      <div class="form-group">
	                           <label for="admin_type">Remarks</label>        
								<div>
								   <textarea class="form-control" name="remarks" id="remarks" rows="5"></textarea>	
									
								</div>
	                      </div>
					  </div>
					  
					  
					  
						  <div class="col-md-12 text-center" style="padding-bottom:10px">
							   <button class="btn btn-sm btn-primary" type="submit">
									<i class="ace-icon fa fa-check"></i>
									 Submit 
								</button>
							</div>
						</div>
					</div>
			   </div>
			</div>
			</form>
		</div>
		</div>
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
		 <input type="hidden" name="section_id_tea" id="section_id_tea">
		 <input type="hidden" name="shift_id_tea" id="shift_id_tea">
		 <input type="hidden" name="year_tea" id="year_tea">
		
			
			<div class="modal-dialog modal-sm">
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-warning no_radius">
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
						<span class="update">Submit</span>
					</button>
				</div>
			  </div>
			  
			</div>
 	 </form>
 		<!-- End Part of Modal For Add New Class -->
		
		
		<!-- Start Part of Modal For Add New Section -->
			<form class="modal fade" id="addNewSubject" role="dialog" action="<?php echo site_url('diary/subjectStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="sub_edit_id" id="sub_edit_id">
			  <input type="hidden" name="branch_id_sub" id="branch_id_sub">
			 <input type="hidden" name="class_id_sub" id="class_id_sub">
			 <input type="hidden" name="group_id_sub" id="group_id_sub">
			 <input type="hidden" name="section_id_sub" id="section_id_sub">
			 <input type="hidden" name="shift_id_sub" id="shift_id_sub">
			 <input type="hidden" name="year_sub" id="year_sub">
			 <input type="hidden" name="teacher_id_sub" id="teacher_id_sub">
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-primary">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Subject :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter New Subject Name :</label>
				  	<input name="subject_name" id="subject_name" type="text" class="form-control" required="required" placeholder="Enter New Subject Name">
				  </div>
				</div>
				<div class="btn-lg btn-default  no_radius text-right">
				  <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">
						<i class="ace-icon fa fa-times"></i>
						Close
					</button>
					
					
				  <button class="btn btn-sm btn-primary" type="submit">
						<i class="ace-icon fa fa-check"></i>
						<span class="update"> Submit </span>
					</button>
				</div>
			  </div>
			  
			</div>
 	 </form>
 		<!-- End Part of Modal For Add New Section -->
				
	  <?php $this->load->view('common/footer'); ?>
				
	</body>
</html>


<script>

   $(document).on("change", "#class_id", function() {
	
		var className 	= $("#class_id option:selected").attr('data-class-name');
		$(".addClassName").html(className);
		 
	
	});
	// add teacher start
	$(document).on("click", ".addTea", function()
	{
		var branch_id 		= $("#branch_id").val();
		var class_id 		= $("#class_id").val();
		var group_id 		= $("#group_id").val();
		var section_id 		= $("#section_id").val();
		var shift_id 		= $("#shift_id").val();
		var year 			= $("#year").val();
		
		if(branch_id && class_id && group_id && section_id && shift_id && year){
		    $("#addNewTeacher #branch_id_tea").val(branch_id);	
			$("#addNewTeacher #class_id_tea").val(class_id);
			$("#addNewTeacher #group_id_tea").val(group_id);	
			$("#addNewTeacher #section_id_tea").val(section_id);
			$("#addNewTeacher #shift_id_tea").val(shift_id);	
			$("#addNewTeacher #year_tea").val(year);	
		    $("#addNewTeacher").find("input[type=text], input[name='tea_edit_id']").val("");
		   $('#addNewTeacher').modal('show');
		   $('.balert').text("");
		   $('.calert').text("");
		   $('.galert').text("");
		   $('.salert').text("");
		   $('.shalert').text("");
		   $('.yalert').text("");
		} else {
		  if(!branch_id)    $('.balert').text("Please Select a Branch");
		  else              $('.balert').text("");
		  if(!class_id)     $('.calert').text("Please Select a Class"); 	
		  else              $('.calert').text(""); 
		  if(!group_id) 	$('.galert').text("Please Select a Group");
		  else              $('.galert').text("");
		  if(!section_id) 	$('.salert').text("Please Select a Section");
		  else              $('.salert').text("");
		  if(!shift_id) 	$('.shalert').text("Please Select a Shift");
		  else              $('.shalert').text("");
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
		var section_id 		= $("#section_id").val();
		var shift_id 		= $("#shift_id").val();
		var year 			= $("#year").val();
		
		if(editId && branch_id && class_id && group_id && section_id && shift_id && year){
		 console.log($("#addNewTeacher #teacher_name").val(teacherName));
		 console.log($("#addNewTeacher #tea_edit_id").val(editId));
		$("#addNewTeacher #branch_id_tea").val(branch_id);	
		$("#addNewTeacher #class_id_tea").val(class_id);
		$("#addNewTeacher #group_id_tea").val(group_id);	
		$("#addNewTeacher #section_id_tea").val(section_id);
		$("#addNewTeacher #shift_id_tea").val(shift_id);	
		$("#addNewTeacher #year_tea").val(year);	
		 $('#addNewTeacher .update').text("Update");
		 $('#addNewTeacher').modal('show');
		   $('.tealert').text("");
		   $('.balert').text("");
		   $('.calert').text("");
		   $('.galert').text("");
		   $('.salert').text("");
		   $('.shalert').text("");
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
		  if(!section_id) 	$('.salert').text("Please Select a Section");
		  else              $('.salert').text("");
		  if(!shift_id) 	$('.shalert').text("Please Select a Shift");
		  else              $('.shalert').text("");
		  if(!year) 		$('.yalert').text("Please Select a Year");
		  else              $('.yalert').text("");
		}
		
		
		
		
		
		
	});
	
	// teacher edit end
	
	
	// add subject start
	$(document).on("click", ".addSub", function()
	{
		var branch_id 		= $("#branch_id").val();
		var class_id 		= $("#class_id").val();
		var group_id 		= $("#group_id").val();
		var section_id 		= $("#section_id").val();
		var shift_id 		= $("#shift_id").val();
		var year 			= $("#year").val();
		var teacher_id 		= $("#teacher_id").val();
		
		if(branch_id && class_id && group_id && section_id && shift_id && year){
		    $("#addNewSubject #branch_id_sub").val(branch_id);	
			$("#addNewSubject #class_id_sub").val(class_id);
			$("#addNewSubject #group_id_sub").val(group_id);	
			$("#addNewSubject #section_id_sub").val(section_id);
			$("#addNewSubject #shift_id_sub").val(shift_id);	
			$("#addNewSubject #year_sub").val(year);	
			$("#addNewSubject #teacher_id_sub").val(teacher_id);
			
		    $("#addNewSubject").find("input[type=text], input[name='sub_edit_id']").val("");
		    $('#addNewSubject').modal('show');
		   $('.balert').text("");
		   $('.calert').text("");
		   $('.galert').text("");
		   $('.salert').text("");
		   $('.shalert').text("");
		   $('.yalert').text("");
		} else {
		  if(!branch_id)    $('.balert').text("Please Select a Branch");
		  else              $('.balert').text("");
		  if(!class_id)     $('.calert').text("Please Select a Class"); 	
		  else              $('.calert').text(""); 
		  if(!group_id) 	$('.galert').text("Please Select a Group");
		  else              $('.galert').text("");
		  if(!section_id) 	$('.salert').text("Please Select a Section");
		  else              $('.salert').text("");
		  if(!shift_id) 	$('.shalert').text("Please Select a Shift");
		  else              $('.shalert').text("");
		  if(!year) 		$('.yalert').text("Please Select a Year");
		  else              $('.yalert').text("");
		}
	});

// ad subject end

//subject edit
   $(document).on("click", ".editSub", function()
	{
		
		var subjectName 	= $("#subject_id option:selected").attr('data-subject-name');
		var editId      	= $("#subject_id option:selected").val();
		var branch_id 		= $("#branch_id").val();
		var class_id 		= $("#class_id").val();
		var group_id 		= $("#group_id").val();
		var section_id 		= $("#section_id").val();
		var shift_id 		= $("#shift_id").val();
		var year 			= $("#year").val();
		var teacher_id 		= $("#teacher_id").val();
		
		if(editId && branch_id && class_id && group_id && section_id && shift_id && year){
		 console.log($("#addNewSubject #subject_name").val(subjectName));
		 console.log($("#addNewSubject #sub_edit_id").val(editId));
		    $("#addNewSubject #branch_id_sub").val(branch_id);	
			$("#addNewSubject #class_id_sub").val(class_id);
			$("#addNewSubject #group_id_sub").val(group_id);	
			$("#addNewSubject #section_id_sub").val(section_id);
			$("#addNewSubject #shift_id_sub").val(shift_id);	
			$("#addNewSubject #year_sub").val(year);	
			$("#addNewSubject #teacher_id_sub").val(teacher_id);
		    $('#addNewSubject .update').text("Update");
		    $('#addNewSubject').modal('show');
		   $('.balert').text("");
		   $('.calert').text("");
		   $('.galert').text("");
		   $('.salert').text("");
		   $('.shalert').text("");
		   $('.yalert').text("");
		} else {
		  if(!editId)    	$('.subalert').text("Please Select a Subject");
		  else              $('.tealert').text("");
		  if(!branch_id)    $('.balert').text("Please Select a Branch");
		  else              $('.balert').text("");
		  if(!class_id)     $('.calert').text("Please Select a Class"); 	
		  else              $('.calert').text(""); 
		  if(!group_id) 	$('.galert').text("Please Select a Group");
		  else              $('.galert').text("");
		  if(!section_id) 	$('.salert').text("Please Select a Section");
		  else              $('.salert').text("");
		  if(!shift_id) 	$('.shalert').text("Please Select a Shift");
		  else              $('.shalert').text("");
		  if(!year) 		$('.yalert').text("Please Select a Year");
		  else              $('.yalert').text("");
		}
		
		
		
		
		
		
	});
	
	// subject edit end



    $("#initiate").on("click", function(){
	
		var branch_id 		= $("#branch_id").val();
		var class_id 		= $("#class_id").val();
		var group_id 		= $("#group_id").val();
		var section_id 		= $("#section_id").val();
		var shift_id 		= $("#shift_id").val();
		var year 			= $("#year").val();
		var subject_id 	    = $("#subject_id").val();
		
		
		if(branch_id && class_id && group_id && section_id && shift_id && year && subject_id){
		   $("#diaryContentData").css("display", "block");
		   $(this).css("display", "none");
		   
		   return false;
		   
		 } else {
		   alert("Please fill all the option");
		   return false;
		 }
    });

     $('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd',
});




$("#diaryDataInsertForm").submit(function(e)
		{
			var postData = $(this).serializeArray();
			console.log(postData);
			var formURL = $(this).attr("action");
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : postData,
				success:function(data){
					$("#diaryDataInsertForm input[type='text'], #diaryDataInsertForm input[type='hidden'], #diaryDataInsertForm textarea, #diaryDataInsertForm select").val("");
					$("#diaryContentData").css("display", "none");
					$("#initiate").css("display", "block");
					$("#diaryDataInsertForm #initiateMove").css("padding-left", "400px");
					$("#initiate").css({"display": "block", "text-align": "center"}); 
					$(".alert").text("Diary content insert successfully");
					
				}
			});
			
			e.preventDefault();
		});
		
	
		
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
		
		
		
		
		
		
		 $("#addNewSubject").submit(function(e)
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
					$(".subjectListView").html(data);				
					$("#addNewSubject input[type='text'], #addNewSubject input[type='hidden']").val("");
					$('#addNewSubject').modal('hide');
				}
			});
			
			e.preventDefault();
		});
		
		
		
		
		//Onchang for Subject Teacher
			$("#year, #branch_id, #class_id, #group_id, #section_id, #shift_id, #year").change(function() {
			var branch_id 		= $("#branch_id").val();
			var class_id 		= $("#class_id").val();
			var group_id 		= $("#group_id").val();
			var section_id 		= $("#section_id").val();
			var shift_id 		= $("#shift_id").val();
			var year 			= $("#year").val();	
				
			$.ajax({
				url : SAWEB.getSiteAction('diary/teacherList'), // URL TO LOAD BEHIND THE SCREEN
				type : "POST",
				data : { branch_id : branch_id, class_id : class_id, group_id : group_id, section_id : section_id, shift_id : shift_id, year : year },
				dataType : "html",
				success : function(data) {			
					$("#teacher_id").html(data);
				}
			  });
			
		   });	
		   
		   
		   
		   
		   //Onchang for Subject
		   
		   $("#year, #branch_id, #class_id, #group_id, #section_id, #shift_id, #year").change(function() {
			var branch_id 		= $("#branch_id").val();
			var class_id 		= $("#class_id").val();
			var group_id 		= $("#group_id").val();
			var section_id 		= $("#section_id").val();
			var shift_id 		= $("#shift_id").val();
			var year 			= $("#year").val();	
			var teacher_id 	    = $("#teacher_id").val();	
				
			$.ajax({
				url : SAWEB.getSiteAction('diary/subjectList'), // URL TO LOAD BEHIND THE SCREEN
				type : "POST",
				data : { branch_id : branch_id, class_id : class_id, group_id : group_id, section_id : section_id, shift_id : shift_id, year : year },
				dataType : "html",
				success : function(data) {			
					$("#subject_id").html(data);
				}
			  });
			
		   });	
		   
		   
			
		
		
		
		

	
</script>