
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
							<a href="<?php echo site_url('libraryManage'); ?>">Library Management</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('libraryManage/bookReturn'); ?>">Book Return</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('libraryManage/returnFromStudent'); ?>">Book Return From Student</a>
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
											<h3 class="widget-title"><strong>Book Return From Student</strong></h3>
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
														<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('libraryManage/returnStudentInfo'); ?>" enctype="multipart/form-data" method="post">							
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
																	
																	  <label class="control-label col-sm-2" for="ad_year"></label>
																	  <div class="col-sm-4">
																		
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="ad_year">Year :</label>
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
																			<button class="btn btn-xs btn-danger pull-right initialize" type="submit">
																				<i class="ace-icon fa fa-bolt bigger-110"></i>
																				<span class="initialAgain">Initialize.</span>
																				<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
																			</button>
																	</div>
																</div>
														</form>
																	
															 <div class="form-group" style="padding:20px 10px  20px 10px ; border-top:1px solid #CCCCCC;">
															    <div class="col-sm-12 text-left" style="padding-left:0px; font-size:15px; font-weight:bold">Book Isue Information  : </div>
																
																	<table class="table table-striped table-bordered table-hover text-left empListTable">
																		<thead>
																			<tr>
																			  <th class="center" width="5%">SL</th>
																				<th width="12%">Book ID</th>
																				<th width="15%">Book Name</th>
																				<th class="hidden-480" width="10%">Issue Date </th>
															
																				<th class="hidden-480" width="10%">Valid Till </th>
																				<th class="hidden-480" width="10%">Return Date</th>
																				<th width="12%">Return </th>
																			</tr>
																		</thead>
															
																		<tbody>
																			<tr>
																			   <td colspan="7" class="afterSubmitContent">
																					<div class="col-sm-12">
																					  <div class="alert alert-block alert-success " id="" style="height: 30px; padding:5px 5px 5px 5px;">
																						<button class="close" data-dismiss="alert" type="button">
																						<i class="ace-icon fa fa-times"></i>
																						</button>
																						<strong class="green">
																						<i class="ace-icon fa fa-check-square-o"></i>
																						
																						</strong>
																						<span class="alrtText">Student Book Return Success</span>
																					  </div>
																					</div>
	
																			   </td>
																			</tr>
																		<?php
																			$i = 1;
																			 foreach($studentBookIssueDetails as $v) { 
																		
																		?>
																			<tr>
																			  <td class="center"><?php echo $i++ ?><input type="hidden" name="issue_auto_id" id="issue_auto_id" value="<?php echo $v->id ?>" /></td>
																				<td width="10%" align="left"><?php echo $v->book_id ?></td>
																				
																				<td class="hidden-480"><?php echo $v->bookName ?></td>
																				<td class=""><?php echo $v->issue_date ?></td>
																				<td class="hidden-480"><?php echo $v->valid_till_date ?></td>
															
																				<td class="hidden-480"><input type="text" class="form-control date-picker" name="return_date" id="return_date" placeholder="Enter Return Date*"/></td>
																				<td class="hidden-480">
																				 <button class="btn btn-xs btn-success pull-left return">
																					<i class="ace-icon fa fa-bolt bigger-110"></i>
																					<span class="initialAgain">Return.</span>
																					<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
																			     </button>
																			</td>
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



$('.alert').click(function(){
   var tr = $(this).parents('tr');
   tr.remove();
   
});



$(document).on("click", ".return", function(e){
	  var parrents   = $(this).parents('tr');
	  var issueId    = parrents.find('input[name="issue_auto_id"]').val();
	  var returnDate = parrents.find('input[name="return_date"]').val();
	  console.log(issueId);
	  console.log(returnDate);
	  var formURL    = "<?php echo site_url('libraryManage/bookReturnAction'); ?>";
		$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {issueId: issueId, returnDate: returnDate},
				success:function(data){
					parrents.remove();
					$('.afterSubmitContent').css({"display":"block","display":"table-cell"});
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