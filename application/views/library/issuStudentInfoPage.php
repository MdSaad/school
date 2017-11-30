
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
							<a href="<?php echo site_url('libraryManage'); ?>">Library Management</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('libraryManage/bookIssue'); ?>">Book Issue</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('libraryManage/issueForStudent'); ?>">Book Issue For Student</a>
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
											<h3 class="widget-title"><strong>Book Issue For Student</strong></h3>
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
														<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('libraryManage/issuStudentInfo'); ?>" enctype="multipart/form-data" method="post">							
														<div class="content img-thumbnail container">
														 
														    <div class="alert alert-block alert-success" id="" style="display:none">
																<button class="close" data-dismiss="alert" type="button">
																<i class="ace-icon fa fa-times"></i>
																</button>
																<strong class="green">
																<i class="ace-icon fa fa-check-square-o"></i>
																
																</strong>
																<span class="alrtText">SMS Send Successfully. Send Again</span>
															</div>
															
														
																
																   <div class="form-group" style="padding:20px 0 20px 0; border-bottom:1px solid #CCCCCC;">
																	  <label class="control-label col-sm-2" for="student_id">Student Id :</label>
																	 <div class="col-sm-4">
																			<input type="text" class="form-control" name="student_id" id="student_id" placeholder="Enter Student Id" value="<?php echo $student_id ?>"/>
																	  </div>
																	  <label class="control-label col-sm-2" for="year">Year :</label>
																	  <div class="col-sm-4">
																			<select class="form-control" name="year" id="year">
																					  <option value="">Select Year </option>
																					  <?php for ($year = date('Y'); $year > date('Y')-13; $year--) { ?>
																						<option value="<?php echo $year; ?>" <?php if($year == $year2) { ?> selected="selected" <?php } ?>><?php echo $year; ?></option>
																						<?php } ?>
																			</select>
																	  </div>
																	  
																	</div>
																	
																	
																	
																   
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="branc_id">Campus/Branch :</label>
																	  <div class="col-sm-4">
																			<select class="form-control branchListView" name="branc_id" id="branc_id">
																			<option value="" selected="selected" >Select Branch</option>
																				<?php foreach($branchListInfo as $k=>$v) { ?>
																				<option <?php if($v->id == $branc_id) echo 'selected'; ?> value="<?php echo $v->id; ?>" ><?php echo $v->branch_name; ?></option>
																				<?php } ?>
																		
																		    </select>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="class_section_id">Section:</label>
																	  <div class="col-sm-4 text-left">
																		<select class="form-control sectionListView" name="class_section_id" id="class_section_id">
																			<option value="" selected="selected" >Select Section </option>
																				<?php foreach($sectionListInfo as $k=>$v) { ?>
																				<option <?php if($v->id == $class_section_id) echo 'selected'; ?> value="<?php echo $v->id; ?>" ><?php echo $v->section_name; ?></option>
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
																				<option <?php if($v->id == $class_id) echo 'selected'; ?> value="<?php echo $v->id; ?>" ><?php echo $v->class_name; ?></option>
																				<?php } ?>
																		
																			</select>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="class_shift_id">Shift :</label>
																	     <div class="col-sm-4 text-left">
																		  <select class="form-control shiftListView" name="class_shift_id" id="class_shift_id">
																			<option value="" selected="selected" >Select Shift </option>
																				<?php foreach($shiftListInfo as $k=>$v) { ?>
																				<option <?php if($v->id == $class_shift_id) echo 'selected'; ?> value="<?php echo $v->id; ?>" ><?php echo $v->shift_name; ?></option>
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
																				<option <?php if($v->id == $class_group_id) echo 'selected'; ?> value="<?php echo $v->id; ?>" ><?php echo $v->group_name; ?></option>
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
																			  <option <?php if($i == $class_roll) echo 'selected'; ?> value="<?php echo $i; ?>" ><?php echo $i; ?></option>	
																	          <?php } ?>																
																	    </select>		
																	  </div>
																	  
																	</div>
																	
																	<div class="form-group">
																	
																	  <label class="control-label col-sm-2" for="ad_year2"></label>
																	  <div class="col-sm-4">
																		
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="ad_year2">Year :</label>
																	     <div class="col-sm-4 text-left">
																			<select class="form-control" name="ad_year" id="ad_year">
																			   <option value="">Select Year </option>
																			   <?php for ($year = date('Y'); $year > date('Y')-13; $year--) { ?>
																			   <option <?php if($v->id == $ad_year2) echo 'selected'; ?> value="<?php echo $year; ?>" <?php if($year == date('Y')) { ?> selected="selected" <?php } ?>><?php echo $year; ?></option>
																			   <?php } ?>
																			</select>
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
														</form>
																
														 <div class="form-group" style="padding:20px 0 20px 0; border-top:1px solid #CCCCCC;">
														    <table width="100%" border="0" class="table-responsive">
															  <tr>
															    <td colspan="8" align="center" valign="middle"><table width="100%" border="0">
                                                                  <tr style="line-height:50px">
                                                                    <td width="33%">&nbsp;</td>
                                                                    <td width="31%" align="center" valign="middle"><strong style="font-size:20px; text-decoration:underline">Student Information </strong></td>
                                                                    <td width="36%" align="right" valign="middle" style="padding-right:20px">
																	   <?php if(!empty($studentDetails->stu_photo)){ ?>
																		   <img src="<?php echo base_url("resource/stu_photo/$studentDetails->stu_photo") ?>" width="50" height="50" />
																		 <?php } else {  if($studentDetails->stu_sex == 'M'){ ?>
																			 <img src="<?php echo base_url('resource/img/male.png'); ?>" width="50" height="50">  
																		 <?php } else {  ?>
																		 <img src="<?php echo base_url('resource/img/EmptyProfile.png'); ?>" width="50" height="50">  
																		 <?php } } ?>																	 </td>
                                                                  </tr>
                                                                </table></td>
	 </tr>
															  <tr>
																<td width="3%">&nbsp;</td>
																<td width="19%" align="left" valign="middle"><strong>Student Name</strong></td>
																<td width="2%" align="center" valign="middle"><strong>:</strong></td>
																<td width="24%" align="left" valign="middle"><?php echo $studentDetails->stu_full_name ?></td>
																<td width="20%" align="left" valign="middle"><strong>Student Id</strong></td>
																<td width="2%" align="center" valign="middle"><strong>:</strong></td>
																<td width="30%" align="left" valign="middle"><?php echo $studentDetails->stu_id ?></td>
																<td width="0%">&nbsp;</td>
															  </tr>
															  <tr>
																<td>&nbsp;</td>
																<td align="left" valign="middle"><strong>Branch</strong></td>
																<td align="center" valign="middle"><strong>:</strong></td>
																<td align="left" valign="middle"><?php echo $studentDetails->branch_name ?></td>
																<td align="left" valign="middle"><strong>Group</strong></td>
																<td align="center" valign="middle"><strong>:</strong></td>
																<td align="left" valign="middle"><?php echo $studentDetails->group_name ?></td>
																<td>&nbsp;</td>
															  </tr>
															  <tr>
																<td>&nbsp;</td>
																<td align="left" valign="middle"><strong>Class</strong></td>
																<td align="center" valign="middle"><strong>:</strong></td>
																<td align="left" valign="middle"><?php echo $studentDetails->class_name ?></td>
																<td align="left" valign="middle"><strong>Class Roll </strong></td>
																<td align="center" valign="middle"><strong>:</strong></td>
																<td align="left" valign="middle"><?php echo $studentDetails->class_roll ?></td>
																<td>&nbsp;</td>
															  </tr>
															  <tr>
																<td>&nbsp;</td>
																<td align="left" valign="middle"><strong>Section</strong></td>
																<td align="center" valign="middle"><strong>:</strong></td>
																<td align="left" valign="middle"><?php echo $studentDetails->section_name ?></td>
																<td align="left" valign="middle"><strong>Shift</strong></td>
																<td align="center" valign="middle"><strong>:</strong></td>
																<td align="left" valign="middle"><?php echo $studentDetails->shift_name ?></td>
																<td>&nbsp;</td>
															  </tr>
															  <tr>
																<td>&nbsp;</td>
																<td align="left" valign="middle">&nbsp;</td>
																<td align="center" valign="middle">&nbsp;</td>
																<td align="left" valign="middle">&nbsp;</td>
																<td align="left" valign="middle"><strong>Year</strong></td>
																<td align="center" valign="middle"><strong>:</strong></td>
																<td align="left" valign="middle"><?php echo $studentDetails->year ?></td>
																<td>&nbsp;</td>
															  </tr>
															</table>

														</div>
														
														  <div class="form-group" style="padding:20px 0 20px 10px; border-top:1px solid #CCCCCC;">
															<form id="searchForm" method="post" action="<?php echo site_url('libraryManage/bookIssueSearch'); ?>">
																<input type="hidden" name="student_id_search" id="student_id_search" />
																<input type="hidden" name="year2_search" id="year2_search" />
																<input type="hidden" name="branc_id_search" id="branc_id_search" />
																<input type="hidden" name="class_section_id_search" id="class_section_id_search" />
																<input type="hidden" name="class_id_search" id="class_id_search" />
																<input type="hidden" name="class_shift_id_search" id="class_shift_id_search" />
																<input type="hidden" name="class_group_id_search" id="class_group_id_search" />
																<input type="hidden" name="class_roll_search" id="class_roll_search" />
																<input type="hidden" name="ad_year2_search" id="ad_year2_search" />
																<div class="col-sm-3">
																	<div class="form-group">
																	<label for="book_id" style="width:100%; text-align:left">Book Id</label>        
																	<div>
																	   <input type="text" id="book_id" placeholder="Book Id" name="book_id"
																		tabindex="1" class="form-control" /> 
																		
																	</div>
																</div>
															   </div>
															   
															    <div class="col-sm-3" style="padding-left:20px">
																	<div class="form-group">
																	<label for="book_name" style="width:100%; text-align:left">Book Name</label>        
																	<div>
																	   <input type="text" id="book_name" placeholder="Book Name" name="book_name"
																		tabindex="2" class="form-control" /> 
																		
																	</div>
																</div>
															   </div>
															   
															   
															    <div class="col-sm-3" style="padding-left:20px">
																	<div class="form-group">
																	<label for="available_date" style="width:100%; text-align:left">Available Date*</label>        
																	<div>
																	   <input type="text" id="available_date" placeholder="Available Date*" name="available_date"
																		tabindex="3" class="form-control date-picker" data-date-format="dd-mm-yyyy" required /> 
																		
																	</div>
																</div>
															   </div>
															   
															    <div class="col-sm-3" style="padding-left:40px">
																	<div class="form-group pull-left">
																	<label for="admin_type"></label>        
																	<div style="padding-top:7px;">
																	   <button class="btn btn-xs btn-primary pull-right initialize" type="submit"s>
																			<i class="ace-icon fa fa-search bigger-110"></i>
																			<span class="initialAgain">Search.</span>
																			<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
																		</button> 
																		
																	</div>
																</div>
															   </div>
															  </form>
															  <div class="col-sm-12">
																  <div class="alert alert-block alert-success afterSubmitContent" id="" style="height: 30px; padding:5px 5px 5px 5px; width: 860px">
																	<button class="close" data-dismiss="alert" type="button">
																	<i class="ace-icon fa fa-times"></i>
																	</button>
																	<strong class="green">
																	<i class="ace-icon fa fa-check-square-o"></i>
																	
																	</strong>
																	<span class="alrtText">Invalide Book Id/Book Name</span>
																  </div>
																</div>
														   </div>
														   
														   <div id="issueBookList" class="form-group" style="padding-left:10px"></div>
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

//callback handler for form submit
		$("#searchForm").submit(function(e)
		{
		    var student_id_search  		 	= $('#student_id').val();
			var year2_search   				= $('#year').val();
			var branc_id_search   			= $('#branc_id').val();
			var class_section_id_search   	= $('#class_section_id').val();
			var class_id_search   			= $('#class_id').val();
			var class_shift_id_search   	= $('#class_shift_id').val();
			var class_group_id_search   	= $('#class_group_id').val();
			var class_roll_search   		= $('#class_roll').val();
			var ad_year2_search   			= $('#ad_year').val();
			
			$('#student_id_search').val(student_id_search);
			$('#year2_search').val(year2_search);
			$('#branc_id_search').val(branc_id_search);
			$('#class_section_id_search').val(class_section_id_search);
			$('#class_id_search').val(class_id_search);
			$('#class_shift_id_search').val(class_shift_id_search);
			$('#class_group_id_search').val(class_group_id_search);
			$('#class_roll_search').val(class_roll_search);
			$('#ad_year2_search').val(ad_year2_search);
			
			var postData = $(this).serializeArray();
			var formURL = $(this).attr("action");
			console.log(postData);
			$.ajax(
			{
				url : formURL,
				type: "POST",
				async: false,
				data : postData,
				success:function(data){
				  if(data =='Invalid'){
				     $('.afterSubmitContent').css('display', 'block');
				  }else{
				     $("#issueBookList").html(data);				
					 //$("#searchForm").find("input[type=text]").val("");
					 $('.afterSubmitContent').css('display', 'none');
				  }
					
					
				}
			});
		
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


$('[data-rel=tooltip]').tooltip({container:'body'});
$('[data-rel=popover]').popover({container:'body'});
</script>