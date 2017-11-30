
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
							<a href="<?php echo site_url('allReport'); ?>">Report</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('libraryReport'); ?>">Library Report</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('libraryReport/issueBookReport'); ?>">Issue Book Report</a>
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
											<h3 class="widget-title"><strong>Issue Book Report</strong></h3>
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
												   <div class="col-md-6" style="padding-top:10px">
												       <form class="form-horizontal" id="languageForm" role="form" action="<?php echo site_url('libraryReport/languageWiseBookReportAction'); ?>" enctype="multipart/form-data" method="post">							
														<div class="content img-thumbnail container" style="min-height: 340px">
														   
																	<div class="form-group" style="padding-top: 15px">
																	  <label class="control-label col-sm-2" for="language">Language :</label>
																	  <div class="col-sm-4">
																			<select class="form-control" name="language" id="language">
																			<option value="" selected="selected" >Select Language</option>
																				<option value="Bangla" >Bangla</option>
																				<option value="English" >English</option>
																		    </select>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="book_type_id">Book Type :</label>
																	  <div class="col-sm-4">
																			<select class="form-control bookTypeListView" name="book_type_id" id="book_type_id" >
																			  <option value="" selected="selected" >Select Book Type</option>
																			    <?php 
																			     foreach ($bookTypeListInfo as $v){
																			    ?>
																			    <option value="<?php echo $v->id ?>" data-type-name="<?php echo $v->book_type_name; ?>" ><?php echo $v->book_type_name ?></option> 

																			   <?php }  ?>
																			</select>
																	  </div>
															  
																	 
																	</div>
																	
																	
																	
																	<div class="form-group">
																	
																	  <label class="control-label col-sm-2" for="class_id_for">Class For :</label>
																	  <div class="col-sm-4">
																		 <select class="form-control" name="class_id" id="class_id_for">
																			<option value="" selected="selected" >Select Class </option>
																			 <?php 
																			     foreach ($classListInfo as $v){
																			 ?>
																			    <option value="<?php echo $v->id ?>" ><?php echo $v->class_name ?></option> 

																			  <?php }  ?>
																			  <option value="22" >Other</option> 
																			       
																		 </select>
																		 <span style="color:#FF0000" class="classalert"></span>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="subject_id">Subject :</label>
																	  <div class="col-sm-4">
																			<select class="form-control subjectListView" name="subject_id" id="subject_id">
																			<option value="" selected="selected" >Select Subject</option>
																			</select>
																	  </div>
																	     
																	</div>
																	
																	<div class="form-group">
																	
																	  <label class="control-label col-sm-2" for="issue_from">Issue From :</label>
																	  <div class="col-sm-4">
																		 <input type="text" class="form-control date-picker" name="issue_from" id="issue_from" placeholder="Enter Issue From"/>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="issue_to">Issue To :</label>
																	  <div class="col-sm-4">
																		 <input type="text" class="form-control date-picker" name="issue_to" id="issue_to" placeholder="Enter Issue To"/>	
																	  </div>
																	     
																	</div>
																	
																	
																	<div class="form-group">
																	  <div class="col-sm-8">
																		
																	  </div>
																	     <div class="col-sm-4 text-left">
																			<button class="btn btn-xs btn-danger pull-right initialize" type="submit"s>
																				<i class="ace-icon fa fa-bolt bigger-110"></i>
																				<span class="initialAgain">Show Report.</span>
																				<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
																			</button>
																	  </div>
																	  
																	</div>
									
																</div>
														</form>
												   </div>
												   <div class="col-md-6" style="padding-top:10px">
												       <form class="form-horizontal" id="stuWiseForm" role="form" action="<?php echo site_url('libraryReport/studentWiseBookIssueReportAction'); ?>" enctype="multipart/form-data" method="post">							
														<div class="content img-thumbnail container">
														 
																   <div class="form-group" style="padding:20px 0 20px 0; border-bottom:1px solid #CCCCCC;">
																	  <label class="control-label col-sm-4" for="student_id">Student Id :</label>
																	 <div class="col-sm-5">
																			<input type="text" class="form-control" name="student_id" id="student_id" placeholder="Enter Student Id" value=""/>
																	  </div>
																	</div>
																	
																	
																	
																   
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="branc_id">Campus :</label>
																	  <div class="col-sm-4">
																			<select class="form-control branchListView" name="branc_id" id="branc_id">
																			<option value="" selected="selected" >Select Branch</option>
																				<?php foreach($branchListInfo as $k=>$v) { ?>
																				<option value="<?php echo $v->id; ?>" ><?php echo $v->branch_name; ?></option>
																				<?php } ?>
																		
																		    </select>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="class_section_id">Section:</label>
																	  <div class="col-sm-4 text-left">
																		<select class="form-control sectionListView" name="class_section_id" id="class_section_id">
																			<option value="" selected="selected" >Select Section </option>
																				<?php foreach($sectionListInfo as $k=>$v) { ?>
																				<option value="<?php echo $v->id; ?>" ><?php echo $v->section_name; ?></option>
																				<?php } ?>
																			</select>
																	  </div>
																	  
																	   
																	  
																	 
																	</div>
																	
																	
																	
																	<div class="form-group">
																	
																	  <label class="control-label col-sm-2" for="class_id">Class :</label>
																	  <div class="col-sm-4">
																		 <select class="form-control classListView" name="class_id" id="class_id">
																			<option value="" selected="selected" >Select Class </option>
																				<?php foreach($classListInfo as $k=>$v) { ?>
																				<option value="<?php echo $v->id; ?>" ><?php echo $v->class_name; ?></option>
																				<?php } ?>
																		
																			</select>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="class_shift_id">Shift :</label>
																	     <div class="col-sm-4 text-left">
																		  <select class="form-control shiftListView" name="class_shift_id" id="class_shift_id">
																			<option value="" selected="selected" >Select Shift </option>
																				<?php foreach($shiftListInfo as $k=>$v) { ?>
																				<option value="<?php echo $v->id; ?>" ><?php echo $v->shift_name; ?></option>
																				<?php } ?>
																		
																			</select>
																	  </div>
																	  
																	</div>
																	
																	<div class="form-group">
																	
																	  <label class="control-label col-sm-2" for="class_group_id">Group :</label>
																	  <div class="col-sm-4">
																		 <select class="form-control groupListView" name="class_group_id" id="class_group_id">
																			<option value="" selected="selected" >Select Group </option>
																				<?php foreach($groupListInfo as $k=>$v) { ?>
																				<option value="<?php echo $v->id; ?>" ><?php echo $v->group_name; ?></option>
																				<?php } ?>
																		
																			</select>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="class_roll">Clsss Roll :</label>
																	     <div class="col-sm-4 text-left">
																		 <select class="form-control" name="class_roll" id="class_roll">
																			  <option value="">Select Roll </option>
																			   <?php
																			       for($i=1; $i<=150; $i++) {
																					    if($i<10){
																						   $i = "0".$i;
																						}  
																				?>
																			  <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>	
																	          <?php } ?>																
																	    </select>		
																	  </div>
																	  
																	</div>
																	
																	<div class="form-group">
																	
																	  <label class="control-label col-sm-2" for="entry_from_stu">Issue From :</label>
																	  <div class="col-sm-4">
																		 <input type="text" class="form-control date-picker" name="issue_from_stu" id="issue_from_stu" placeholder="Enter Issue From"/>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="issue_to_stu">Issue To :</label>
																	  <div class="col-sm-4">
																		 <input type="text" class="form-control date-picker" name="issue_to_stu" id="issue_to_stu" placeholder="Enter Issue To"/>	
																	  </div>
																	     
																	</div>
																	
																	  <div class="form-group">
																	  <div class="col-sm-8">
																		
																	  </div>
																	     <div class="col-sm-4 text-left">
																			<button class="btn btn-xs btn-danger pull-right initialize" type="submit">
																				<i class="ace-icon fa fa-bolt bigger-110"></i>
																				<span class="initialAgain">Show Report.</span>
																				<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
																			</button>
																	</div>
																</div>
															</div>
												     	</form>
												   </div>
												</div>
												
												<div id="issueBookReportView" class="form-group" style="padding:30px 0 20px 0;"></div>
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
		format: 'yyyy-mm-dd',
});



//Onchang for Subject Teacher
$("#class_id_for").change(function() {
	var class_id 		= $("#class_id_for").val();
		
	$.ajax({
		url : SAWEB.getSiteAction('libraryManage/classWiseSubject'), // URL TO LOAD BEHIND THE SCREEN
		type : "POST",
		data : { class_id : class_id},
		dataType : "html",
		success : function(data) {			
			$(".subjectListView").html(data);
		}
	});

});	

//Language wise book issue
$("#languageForm").submit(function(e)
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
			$("#issueBookReportView").html(data);	
			$("#stuWiseForm").find("input[type=text], textarea, select").val("");					
		}
	});
	
	e.preventDefault();
});
		
//Student wise book issue
$("#stuWiseForm").submit(function(e)
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
			$("#issueBookReportView").html(data);	
			$("#languageForm").find("input[type=text], textarea, select").val("");					
		}
	});
	
	e.preventDefault();
});
		




	


$('.formCancel').on('click', function() {
	$('.addFormContent').fadeOut('slow');
	$('.add_new').fadeIn('slow');
});


$('[data-rel=tooltip]').tooltip({container:'body'});
$('[data-rel=popover]').popover({container:'body'});


</script>