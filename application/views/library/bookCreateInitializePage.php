
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
																				<option <?php if($language =='Bangla') echo 'selected' ?> value="Bangla" >Bangla</option>
																				<option <?php if($language =='English') echo 'selected' ?> value="English" >English</option>
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
																			    <option <?php if($book_type_id == $v->id) echo 'selected' ?> value="<?php echo $v->id ?>" data-type-name="<?php echo $v->book_type_name; ?>" ><?php echo $v->book_type_name ?></option> 

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
																			    <option <?php if($class_id == $v->id) echo 'selected' ?> value="<?php echo $v->id ?>" ><?php echo $v->class_name ?></option> 

																			  <?php }  ?>
																			  <option <?php if($class_id == '22') echo 'selected' ?> value="22" >Other</option> 
																			       
																		 </select>
																		 <span style="color:#FF0000" class="classalert"></span>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="subject_id">Subject :</label>
																	  <div class="col-sm-4">
																		<div class="input-group">
																			<select class="form-control subjectListView" name="subject_id" id="subject_id" required="required">
																			<option value="" selected="selected" >Select Subject</option>
																			<?php 
																			     foreach ($subjectListInfo as $v){
																			    ?>
																			    <option <?php if($subject_id == $v->id) echo 'selected' ?> value="<?php echo $v->id ?>" data-subject-name="<?php echo $v->library_subject_name; ?>" ><?php echo $v->library_subject_name ?></option> 

																			   <?php }  ?>
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

															    <form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('libraryManage/bookCreateAction'); ?>" enctype="multipart/form-data" method="post">	
															    <input type="hidden" name="language_in" id="language_in"  />
																<input type="hidden" name="book_type_id_in" id="book_type_id_in"  />
																<input type="hidden" name="class_id_in" id="class_id_in"  />
																<input type="hidden" name="subject_id_in" id="subject_id_in"  />

																	<div class="form-group" style="padding:20px 0 0 0;border-top:1px solid #CCCCCC;">
																	  <label class="control-label col-sm-2" for="book_id">Book Id :</label>
																	  <div class="col-sm-2">
																		 <input  type="text" class="form-control" name="book_id" id="book_id" placeholder="Enter Book Id" value="<?php echo $bookId ?>" readonly/>	
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="book_name">Book Name :</label>
																	  <div class="col-sm-2">
																			<input  type="text" class="form-control" name="book_name" id="book_name" placeholder="Enter Book Name" value=""/>	
																	  </div>

																	   <label class="control-label col-sm-2" for="entry_date">Entry Date :</label>
																	  <div class="col-sm-2">
																			<input  type="text" class="form-control date-picker" name="entry_date" id="entry_date" placeholder="Enter Entry Date"  value=""/>	
																	  </div>

																	 
																	</div> 

																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="writer_name">Writer's Name :</label>
																	  <div class="col-sm-2">
																		 <input  type="text" class="form-control" name="writer_name" id="writer_name" placeholder="Enter Writer's Name" value=""/>	
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="publication">Publication :</label>
																	  <div class="col-sm-2">
																			<input  type="text" class="form-control" name="publication" id="publication" placeholder="Enter Publication" value=""/>	
																	  </div>

																	   <label class="control-label col-sm-2" for="isbn">ISBN :</label>
																	  <div class="col-sm-2">
																			<input  type="text" class="form-control" name="isbn" id="isbn" placeholder="Enter ISBN" value=""/>	
																	  </div>
																	 
																	</div> 

																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="edition">Edition :</label>
																	  <div class="col-sm-2">
																		 <input  type="text" class="form-control" name="edition" id="edition" placeholder="Enter Edition" value=""/>	
																	  </div>
																	  
																	  

																	   <label class="control-label col-sm-2" for="selves_location">Book Selves Location :</label>
																	  <div class="col-sm-2">
																			<input  type="text" class="form-control" name="selves_location" id="selves_location" placeholder="Enter ISBN" value=""/>	
																	  </div>

																	  <label class="control-label col-sm-2" for="book_collection_type">Book Collection Type :</label>
																	  <div class="col-sm-2">
																			<select class="form-control" name="book_collection_type" id="book_collection_type" >
																			  <option value="" selected="selected" >Select Type</option>
																			  <option value="board" >Board Book</option>
																			     <option value="purchasable" >Purchasable</option>
																			     <option value="gifted" >Gifted</option>
																			     <option value="donated" >Donated</option>
																			</select>
																	  </div>
																	 
																	</div> 


																	<div id="Purchase" class="form-group" style="display: none; padding:20px 0 0 0;border-top:1px solid #CCCCCC;">
																	  <label class="control-label col-sm-2" for="purchase_price">Book Price :</label>
																	  <div class="col-sm-2">
																		 <input  type="number" class="form-control" name="purchase_price" id="purchase_price" placeholder="Enter Book Price" value=""/>	
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="class_section_id">Purchase Vandor :</label>
																	  <div class="col-sm-2">
																			<input  type="text" class="form-control" name="purchase_vandor" id="purchase_vandor" placeholder="Enter Purchase Vandor" value=""/>	
																	  </div>

																	   <label class="control-label col-sm-2" for="pur_quantity">Purchase Quantity :</label>
																	  <div class="col-sm-2">
																			<input  type="number" class="form-control" name="pur_quantity" id="pur_quantity" placeholder="Enter Purchase Quantity" value=""/>	
																	  </div>

																	   <label class="control-label col-sm-2" for="pur_date" style="padding-top: 17px">Purchase Date :</label>
																	  <div class="col-sm-2" style="padding-top: 15px">
																			<input  type="text" class="form-control date-picker" name="pur_date" id="pur_date" placeholder="Enter Purchase Date" value=""/>	
																	  </div>
																	 
																	</div> 

																	<div id="Gifted" class="form-group" style="display: none; padding:20px 0 0 0;border-top:1px solid #CCCCCC;">
																	  <label class="control-label col-sm-2" for="gift_com_name">Gifted Company :</label>
																	  <div class="col-sm-2">
																		 <input  type="text" class="form-control" name="gift_com_name" id="gift_com_name" placeholder="Enter Gifted Company" value=""/>	
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="gift_quan">Quantity :</label>
																	  <div class="col-sm-2">
																			<input  type="number" class="form-control" name="gift_quan" id="gift_quan" placeholder="Enter Quantity" value=""/>	
																	  </div>

																	   <label class="control-label col-sm-2" for="gift_date">Gifted Date :</label>
																	  <div class="col-sm-2">
																			<input  type="text" class="form-control date-picker" name="gift_date" id="gift_date" placeholder="Enter Gifted Date" value=""/>	
																	  </div>

																	  
																	 
																	</div> 

																	<div id="Donated" class="form-group" style="display: none; padding:20px 0 0 0;border-top:1px solid #CCCCCC;">
																	  <label class="control-label col-sm-2" for="don_com_name">Donated Company :</label>
																	  <div class="col-sm-2">
																		 <input  type="text" class="form-control" name="don_com_name" id="don_com_name" placeholder="Enter Donated Company" value=""/>	
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="don_quan">Quantity :</label>
																	  <div class="col-sm-2">
																			<input  type="number" class="form-control" name="don_quan" id="don_quan" placeholder="Enter Quantity" value=""/>	
																	  </div>

																	   <label class="control-label col-sm-2" for="don_date">Donated Date :</label>
																	  <div class="col-sm-2">
																			<input  type="text" class="form-control date-picker" name="don_date" id="don_date" placeholder="Enter Donated Date" value=""/>	
																	  </div>

																	 
																	</div> 
 
														
																	  <div class="modal-footer">
																	  	
																		<button class="btn btn-sm btn-danger formCancel" type="button">
																			<i class="ace-icon fa fa-times"></i>
																			Cancel
																		</button>
																		<button class="btn btn-sm btn-primary" type="submit">
																			<i class="ace-icon fa fa-check"></i>
																			<span class="update"> Submit </span>
																		</button>
																	</div>
																	</div>
												          </form>

												            <div class="alert alert-block alert-success afterSubmitContent" id="">
																<button class="close" data-dismiss="alert" type="button">
																<i class="ace-icon fa fa-times"></i>
																</button>
																<strong class="green">
																<i class="ace-icon fa fa-check-square-o"></i>
																
																</strong>
																<span class="alrtText">New Book Create Successfully. Create Again Click <strong class="btn-danger tryAgain">Here</strong></span>
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

// add new book create ajax submit
$("#addForm").submit(function(e)
{
	var language 	 = $("#language").val();
	var book_type_id = $("#book_type_id").val();
	var class_id 	 = $("#class_id").val();
	var subject_id   = $("#subject_id").val();
	$("#addForm #language_in").val(language);
	$("#addForm #book_type_id_in").val(book_type_id);
	$("#addForm #class_id_in").val(class_id);
	$("#addForm #subject_id_in").val(subject_id);
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
			$("#addForm input[type='text'], #addForm input[type='hidden'], #addForm input[type='number'], #addForm textarea").val("");
			$("#addForm").css("display", "none");				
			$("#initForm").css("display", "none");				
			$(".afterSubmitContent").css("display", "block");	
		}
	});
	
	e.preventDefault();
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


//book collection Type
$('#book_collection_type').on('change', function() {
	var collectionType    = $(this).val();
	console.log(collectionType);

	if(collectionType == 'purchasable'){
		$('#Purchase').css('display', 'block');
		$('#Gifted').css('display', 'none');
		$('#Donated').css('display', 'none');

	} else if(collectionType == 'gifted'){
		$('#Purchase').css('display', 'none');
		$('#Gifted').css('display', 'block');
		$('#Donated').css('display', 'none');

	} else if(collectionType == 'donated'){
		$('#Purchase').css('display', 'none');
		$('#Gifted').css('display', 'none');
		$('#Donated').css('display', 'block');

	} else {
		$('#Purchase').css('display', 'none');
		$('#Gifted').css('display', 'none');
		$('#Donated').css('display', 'none');

	}
	
});





	
 // create again  
	$('.tryAgain').on('click', function() {
	$("#initForm option:selected").prop("selected", false);
	$("#addForm input[type='text'], #addForm input[type='hidden'], #addForm input[type='number'], #addForm textarea").val("");
	$("#addForm option:selected").prop("selected", false);

	var replaceUrl = "<?php echo site_url('libraryManage/bookCreate'); ?>";
	location.replace(replaceUrl);
	
});

$('.formCancel').on('click', function() {
	$('.addFormContent').fadeOut('slow');
	$('.add_new').fadeIn('slow');
});


$('[data-rel=tooltip]').tooltip({container:'body'});
$('[data-rel=popover]').popover({container:'body'});


</script>