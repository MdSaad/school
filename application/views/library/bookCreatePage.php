
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
							<a href="<?php echo site_url('libraryManage'); ?>">Library Management</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('libraryManage/bookCreate'); ?>">Library Book Create</a>
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
											<h3 class="widget-title"><strong>Library Book Create</strong></h3>
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
														<form class="form-horizontal" id="initForm" role="form" action="<?php echo site_url('libraryManage/bookCreateInitialize'); ?>" enctype="multipart/form-data" method="post">							
														<div class="content img-thumbnail container">
														   
																	<div class="form-group" style="padding-top: 5px">
																	  <label class="control-label col-sm-2" for="language">Language :</label>
																	  <div class="col-sm-4">
																			<select class="form-control" name="language" id="language" required="required">
																			<option value="" selected="selected" >Select Language</option>
																				<option value="Bangla" >Bangla</option>
																				<option value="English" >English</option>
																		    </select>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="book_type_id">Book Type :</label>
																	  <div class="col-sm-4">
																		<div class="input-group">
																			<select class="form-control bookTypeListView" name="book_type_id" id="book_type_id" required="required" >
																			  <option value="" selected="selected" >Select Book Type</option>
																			    <?php 
																			     foreach ($bookTypeListInfo as $v){
																			    ?>
																			    <option value="<?php echo $v->id ?>" data-type-name="<?php echo $v->book_type_name; ?>" ><?php echo $v->book_type_name ?></option> 

																			   <?php }  ?>
																			</select>
																			<span style="color:#FF0000" class="typealert"></span>	
																			
																			<span class="input-group-addon addInstant">
																			  <a class="addBookType" title="Add New" href="#">  <i class="fa fa-plus "></i></a>&nbsp;
																			  <a class="editBookType" title="Edit Book Type" href="#"> <i class="fa fa-pencil "></i></a>
																			</span>
																			
																		</div>
																	  </div>
															  
																	 
																	</div>
																	
																	
																	
																	<div class="form-group">
																	
																	  <label class="control-label col-sm-2" for="class_id">Class For :</label>
																	  <div class="col-sm-4">
																		 <select class="form-control" name="class_id" id="class_id" required="required">
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
																		<div class="input-group">
																			<select class="form-control subjectListView" name="subject_id" id="subject_id" required="required">
																			<option value="" selected="selected" >Select Subject</option>
																			</select>
																			<span style="color:#FF0000" class="subalert"></span>
																			
																			<span class="input-group-addon addInstant">
																			  <a class="addSubject" title="Add New" href="#">  <i class="fa fa-plus "></i></a>&nbsp;
																			  <a class="editSubject" title="Edit Subject" href="#"> <i class="fa fa-pencil "></i></a>
																			</span>
																			
																		</div>
																	  </div>
																	     
																	</div>
																	
																	
																	<div class="form-group">
																	  <div class="col-sm-8">
																		
																	  </div>
																	     <div class="col-sm-4 text-left">
																			<button class="btn btn-xs btn-danger pull-right initialize" type="submit"s>
																				<i class="ace-icon fa fa-bolt bigger-110"></i>
																				<span class="initialAgain">Initialize.</span>
																				<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
																			</button>
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
				</div>

		<!-- start add new Book  part modal -->
			<form class="modal fade" id="addNewBookType" role="dialog" action="<?php echo site_url('libraryManage/bookTypeStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="type_id_edit" id="type_id_edit"  />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-primary no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Book Type :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter New Book Type :</label>
				  	<input name="book_type_name" id="book_type_name" type="text" class="form-control" required="required" placeholder="Enter New Book Type">
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
	 
	 <!-- end add new Book part modal -->
	 
	  <!-- start add new Subject part modal -->
			<form class="modal fade" id="addNewSubject" role="dialog" action="<?php echo site_url('libraryManage/librarySubjectStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="sub_id_edit" id="sub_id_edit"  />
			<input type="hidden" name="class_id_in" id="class_id_in"  />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-primary no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Subject :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter New Subject Name :</label>
				  	<input name="library_subject_name" id="library_subject_name" type="text" class="form-control" required="required" placeholder="Enter New Subject Name">
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
	 
	 <!-- end add new Subject part modal -->
				
	  <?php $this->load->view('common/footer'); ?>
				
	</body>
</html>
		
<script type="text/javascript" >

$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd',
});


// add book type 

$(document).on("click", ".addBookType", function()
{

    $('#addNewBookType').modal('show');
	 
	$("#addNewBookType input[type='text'], #addNewBookType input[type='hidden']").val("");
	$('#addNewBookType .update').text("Save");
	$('.typealert').text("");
	
});


// edit book type 
$(document).on("click", ".editBookType", function()
{
		
	var bookTypeName 	= $("#book_type_id option:selected").attr('data-type-name');
	var editId      	= $("#book_type_id option:selected").val();
	
	
	if(editId ){
	 console.log($("#addNewBookType #book_type_name").val(bookTypeName));
	 console.log($("#addNewBookType #type_id_edit").val(editId));
	 $('#addNewBookType .update').text("Update");
	 $('#addNewBookType').modal('show');
	   $('.typealert').text("");
	   
	} else {
	   $('.typealert').text("Please Select a Book Type");
	 
	}

});

// add new Book Type ajax submit

$("#addNewBookType").submit(function(e)
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
			$(".bookTypeListView").html(data);				
			$("#addNewBookType input[type='text'], #addNewBookType input[type='hidden']").val("");
			$('#addNewBookType').modal('hide');
		}
	});
	
	e.preventDefault();
});
		


// add new subject 
$(document).on("click", ".addSubject", function()
{
     var class_id 		= $("#class_id").val();

     if(class_id){
	     $('#addNewSubject').modal('show');
	     $("#addNewSubject #class_id_in").val(class_id);
		 $("#addNewSubject input[type='text'], #addNewSubject input[name='sub_id_edit']").val("");
		 $('#addNewSubject .update').text("Save");
		 $('.classalert').text("");
		 $('.subalert').text("");
	 }else{
	 	$('.classalert').text("Please Select a Class");

	 }
	
});

//Edit subject 


$(document).on("click", ".editSubject", function()
{
		
	var subjectName 	= $("#subject_id option:selected").attr('data-subject-name');
	var editId      	= $("#subject_id option:selected").val();
	var class_id      	= $("#class_id").val();
	
	
	if(class_id ){
	 console.log($("#addNewSubject #library_subject_name").val(subjectName));
	 console.log($("#addNewSubject #sub_id_edit").val(editId));
	 console.log($("#addNewSubject #class_id_in").val(class_id));
	 $('#addNewSubject .update').text("Update");
	 $('#addNewSubject').modal('show');
	   $('.subalert').text("");
	   
	} else {
	   $('.subalert').text("Please Select a Book Type");
	 
	}

});




// add new subject ajax submit
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
$("#class_id").change(function() {
	var class_id 		= $("#class_id").val();
		
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




	


$('.formCancel').on('click', function() {
	$('.addFormContent').fadeOut('slow');
	$('.add_new').fadeIn('slow');
});


$('[data-rel=tooltip]').tooltip({container:'body'});
$('[data-rel=popover]').popover({container:'body'});


</script>