
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
							<a href="<?php echo site_url('allReport'); ?>">Report</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('libraryReport'); ?>">Library Report</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('libraryReport/storedReport'); ?>">Store Book Report</a>
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
											<h3 class="widget-title"><strong>Store Book Report</strong></h3>
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
														<form class="form-horizontal" id="initForm" role="form" action="<?php echo site_url('libraryReport/stockBookReportAction'); ?>" enctype="multipart/form-data" method="post">							
														<div class="content img-thumbnail container">
														   
																	<div class="form-group" style="padding-top: 5px">
																	  <label class="control-label col-sm-2" for="language">Language :</label>
																	  <div class="col-sm-4">
																			<select class="form-control" name="language" id="language">
																			<option value="" selected="selected" >Select Language</option>
																				<option <?php if($language =='Bangla') echo 'selected' ?> value="Bangla" >Bangla</option>
																				<option <?php if($language =='English') echo 'selected' ?> value="English" >English</option>
																		    </select>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="book_type_id">Book Type :</label>
																	  <div class="col-sm-4">
																			<select class="form-control bookTypeListView" name="book_type_id" id="book_type_id">
																			  <option value="" selected="selected" >Select Book Type</option>
																			    <?php 
																			     foreach ($bookTypeListInfo as $v){
																			    ?>
																			    <option <?php if($book_type_id == $v->id) echo 'selected' ?> value="<?php echo $v->id ?>" data-type-name="<?php echo $v->book_type_name; ?>" ><?php echo $v->book_type_name ?></option> 

																			   <?php }  ?>
																			</select>
																	  </div>
															  
																	 
																	</div>
																	
																	
																	
																	<div class="form-group">
																	
																	  <label class="control-label col-sm-2" for="class_id">Class For :</label>
																	  <div class="col-sm-4">
																		 <select class="form-control" name="class_id" id="class_id">
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
																			<select class="form-control subjectListView" name="subject_id" id="subject_id">
																			<option value="" selected="selected" >Select Subject</option>
																			<?php 
																			     foreach ($subjectListInfo as $v){
																			    ?>
																			    <option <?php if($subject_id == $v->id) echo 'selected' ?> value="<?php echo $v->id ?>" data-subject-name="<?php echo $v->library_subject_name; ?>" ><?php echo $v->library_subject_name ?></option> 

																			   <?php }  ?>
																			</select>
																	  </div>
																	     
																	</div>
																	
																	
																	<div class="form-group">
																	
																	  <label class="control-label col-sm-2" for="entry_from">Entry From :</label>
																	  <div class="col-sm-4">
																		 <input type="text" class="form-control date-picker" name="entry_from" id="entry_from" placeholder="Enter Entry From" value="<?php echo $entry_from ?>"/>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="entry_to">Entry To :</label>
																	  <div class="col-sm-4">
																		 <input type="text" class="form-control date-picker" name="entry_to" id="entry_to" placeholder="Enter Entry To" value="<?php echo $entry_to ?>"/>	
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
																	</form>
																	
												        <div class="form-group" style="padding:20px 10px  20px 10px ; border-top:1px solid #CCCCCC;">
															    <div class="col-sm-12 text-left" style="padding-left:0px; font-size:15px; font-weight:bold">Store Book Report Result  : </div>
																
																	<table class="table table-striped table-bordered table-hover text-left empListTable">
																		<thead>
																			<tr>
																			  <th class="center" width="5%">SL</th>
																				<th width="12%">Book ID</th>
																				<th width="15%">Book Name</th>
																				<th class="hidden-480" width="10%">Writter Name </th>
															
																				<th class="hidden-480" width="10%">Publication </th>
																				<th class="hidden-480" width="10%">Collection Type</th>
																				<th width="12%">Entry Date </th>
																			</tr>
																		</thead>
															
																		<tbody>
																		<?php
																			$i = 1;
																			 foreach($bookStoreDetails as $v) { 
																		
																		?>
																			<tr>
																			  <td class="center"><?php echo $i++ ?></td>
																				<td width="10%" align="left"><?php echo $v->book_id ?></td>
																				
																				<td class="hidden-480"><?php echo $v->book_name ?></td>
																				<td class=""><?php echo $v->writer_name ?></td>
																				<td class="hidden-480"><?php echo $v->publication ?></td>
															
																				<td class="hidden-480"><?php echo $v->book_collection_type ?></td>
																			  <td class="hidden-480"><?php echo $v->entry_date ?></td>
																			</tr>
																		 <?php } ?>	
																		</tbody>
																	</table>
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
		
<script type="text/javascript" >

$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd',
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