
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
							<a href="<?php echo site_url('admissionModule'); ?>">Admission</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('stuBasicInfo'); ?>">Student Basic Information</a>&nbsp;&nbsp;
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
											<h3 class="widget-title"><strong>Student Basic Information Manage</strong></h3>
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
														<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('stuBasicInfo/stuBasicInfoStore'); ?>" enctype="multipart/form-data" method="post">							<div class="content img-thumbnail container">
																  <input type="hidden" class="form-control" name="update_id" id="update_id"  value=""/>
																   <input type="hidden" class="form-control" name="update_class_year" id="update_class_year"  value=""/>
																<div class="form-group">
																	<label class="control-label col-sm-2" for="email">Identification Number :</label>
																	<div class="col-sm-4">
																		<input required="required" type="text" class="form-control" name="identity_number" id="identity_number" placeholder="Enter identification number*" value=""/>
																	</div>
																</div>
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="email">Student Full Name :</label>
																	  <div class="col-sm-4">
																			<input required="required" type="text" class="form-control" name="stu_full_name" id="stu_full_name" placeholder="Enter Full Name*" value=""/>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" > Campus/Branch :</label>
																	  <div class="col-sm-4">
																		 <div class="input-group">
																			<select class="form-control branchListView" name="branc_id" id="branc_id" required="required">
																			<option value="" selected="selected" >Select Branch*</option>
																				<?php foreach($branchListInfo as $k=>$v) { ?>
																				<option value="<?php echo $v->id; ?>" data-branch-name="<?php echo $v->branch_name ?>" ><?php echo $v->branch_name; ?></option>
																				<?php } ?>
																		
																		 </select>
																		    <span class="input-group-addon addInstant">
																				<a class="addBranch" data-toggle="modal" data-target="#addNewBranch" title="Add New" href="#">  <i class="fa fa-plus "></i></a>&nbsp;
																				<a class="editBranch" title="Edit Branch" href="#"> <i class="fa fa-pencil "></i></a>
																			</span>
																			
																			 
																		</div>
																		  <span class="branchEmptyAlrt label label-sm label-danger form-control emptyAlrt"></span>
																	  </div>
																	</div>
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="email">Date of Birth :</label>
																	  <div class="col-sm-4">
																		<div class="input-group">
																			<input id="stu_birth_date" name="stu_birth_date" class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" placeholder="Enter Date of Birth" >
																			
																			
																			<span class="input-group-addon">
																				<i class="fa fa-calendar bigger-110"></i>
																			</span>
																		</div>
																	  </div>
																	  
																	   <label class="control-label col-sm-2" for="email">Student Class :</label>
																	   <div class="col-sm-4" id="">
																		<div class="input-group">
																			<select class="form-control classListView" name="class_id" id="class_id" required="required">
																			<option value="" selected="selected" >Select Class* </option>
																				<?php foreach($classListInfo as $k=>$v) { ?>
																				<option value="<?php echo $v->id; ?>" data-class-name="<?php echo $v->class_name ?>" ><?php echo $v->class_name; ?></option>
																				<?php } ?>
																		
																			</select>
																			<span class="input-group-addon addInstant">
																				<a class="addClass" data-toggle="modal" data-target="#addNewClass" title="Add New" href="#">  <i class="fa fa-plus "></i></a>&nbsp;
																				<a class="editClass" title="Edit Class" href="#"> <i class="fa fa-pencil "></i></a>
																			</span>
																		</div>
																		<span class="classEmptyAlrt label label-sm label-danger form-control emptyAlrt"></span>
																	  </div>
																	</div>
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="email">Sex/Gender :</label>
																	  <div class="col-sm-4">
																		<select class="form-control" name="stu_sex" id="stu_sex" required="required">
																			<option value="" selected="selected" >Select Gender* </option>
																			<option value="M">Male</option>
																			<option value="F">Female</option>
																		</select>
																		<span class="genderEmptyAlrt label label-sm label-danger form-control emptyAlrt"></span>
																	  </div>
																	  
																	  
																	  
																	 
																	   <label class="control-label col-sm-2" for="email"> Group :</label>
																	  <div class="col-sm-4">
																		<div class="input-group">
																			<select class="form-control groupListView" name="class_group_id" id="class_group_id"  required="required">
																			<option value="" selected="selected" >Select Group* </option>
																				<?php foreach($groupListInfo as $k=>$v) { ?>
																				<option value="<?php echo $v->id; ?>" data-group-name="<?php echo $v->group_name ?>" ><?php echo $v->group_name; ?></option>
																				<?php } ?>
																		
																			</select>
																			<span class="input-group-addon addInstant">
																				<a class="addGroup" data-toggle="modal" data-target="#addNewGroup" title="Add New" href="#">  <i class="fa fa-plus "></i></a>&nbsp;
																				<a class="editGroup" title="Edit Group" href="#"> <i class="fa fa-pencil "></i></a>
																			</span>
																			
																		</div>
																		<span class="groupEmptyAlrt label label-sm label-danger form-control emptyAlrt"></span>
																	  </div>
																	  
																	  
																	  
																	  
																	  
																	</div>
																	
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-2">Blood Group :</label>
																	  <div class="col-sm-4">
																		<select class="form-control" name="stu_blood_group" id="stu_blood_group">
																			<option value="">Select Blood Group </option>
																			<option value="A+">A+</option>
																			<option value="A-">A-</option>
																			<option value="B+">B+</option>
																			<option value="B-">B-</option>
																			<option value="AB+">AB+</option>
																			<option value="AB-">AB-</option>
																			<option value="O+">O+</option>
																			<option value="O-">O-</option>
																		 </select>
																	  </div>
																	  
																	  
																	  <label class="control-label col-sm-2" for="email">Section :</label>
																	  <div class="col-sm-4">
																		<div class="input-group">
																			<select class="form-control sectionListView" name="class_section_id" id="class_section_id" required="required">
																			<option value="" selected="selected" >Select Section* </option>
																				<?php foreach($sectionListInfo as $k=>$v) { ?>
																				<option value="<?php echo $v->id; ?>" data-section-name="<?php echo $v->section_name ?>" ><?php echo $v->section_name; ?></option>
																				<?php } ?>
																		
																			</select>
																			
																			<span class="input-group-addon addInstant">
																				<a class="addSection" data-toggle="modal" data-target="#addNewSection" title="Add New" href="#">  <i class="fa fa-plus "></i></a>&nbsp;
																				<a class="editSection" title="Edit Section" href="#"> <i class="fa fa-pencil "></i></a>
																			</span>
																		</div>
																		<span class="sectionEmptyAlrt label label-sm label-danger form-control emptyAlrt"></span>
																	  </div>
																	  
																	 
																	 
																	 
																	 
																	</div>
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="email">Special Remarkable Sign :</label>
																	  <div class="col-sm-4">
																		<input type="text" class="form-control" name="stu_remarkabe_sign" id="stu_remarkabe_sign" placeholder="Enter Special Remarkable Sign" value=""/>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="email"> Shift :</label>
																	  <div class="col-sm-4">
																		<div class="input-group">
																			<select class="form-control shiftListView" name="class_shift_id" id="class_shift_id" required="required">
																			<option value="" selected="selected" >Select Shift* </option>
																				<?php foreach($shiftListInfo as $k=>$v) { ?>
																				<option value="<?php echo $v->id; ?>" data-shift-name="<?php echo $v->shift_name ?>"  ><?php echo $v->shift_name; ?></option>
																				<?php } ?>
																		
																			</select>
																			
																			<span class="input-group-addon addInstant">
																				<a class="addShift" data-toggle="modal" data-target="#addNewShift" title="Add New" href="#">  <i class="fa fa-plus "></i></a>&nbsp;
																				<a class="editShift" title="Edit Shift" href="#"> <i class="fa fa-pencil "></i></a>
																			</span>
																		</div>
																		<span class="shiftEmptyAlrt label label-sm label-danger form-control emptyAlrt"></span>
																	  </div>
																	   
																	  
																	  
																	  
																	</div>
																	
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="email"> Mail Address :</label>
																	  <div class="col-sm-4">
																		<input type="email" class="form-control" name="stu_mail_adrs" id="stu_mail_adrs" placeholder="Enter Mail Address" value=""/>
																	  </div>
																	  
																	 <label class="control-label col-sm-2" for="email">Class Roll :</label>
																	  <div class="col-sm-4 text-left">
																		<input type="hidden" required="required" class="form-control" name="class_roll" id="class_roll" placeholder="Enter Class Roll*" value="" readonly="readonly"/><a href="#" class="label label-sm label-primary  GenerateClassRoll form-control emptyAlrt">Click Here to Generate Class Roll</a>
																		
																		<span class="classRollEmptyAlrt label label-sm label-danger form-control emptyAlrt"></span>
																	  </div>
																	 
																	</div>
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="email"> Mobile/Cell No :</label>
																	  <div class="col-sm-4">
																		<input type="number" class="form-control" name="stu_mobile" id="stu_mobile" placeholder="Enter Mobile/Cell No" value=""/>
																	  </div>
																	  
																	   
																	  <label class="control-label col-sm-2">Nationality :</label>
																	    <div class="col-sm-4">
																		  
																		  <div class="input-group">
																			<select class="form-control nationalityListView" name="stu_nationality_id" id="stu_nationality_id" >
																			<option value="" selected="selected" >Select Nationality </option>
																				<?php foreach($nationalityListInfo as $k=>$v) { ?>
																				<option value="<?php echo $v->id; ?>" data-nationality-name="<?php echo $v->nationality_name ?>" ><?php echo $v->nationality_name; ?></option>
																				<?php } ?>
																		
																			</select>
																			
																			<span class="input-group-addon addInstant">
																				<a class="addNationality" data-toggle="modal" data-target="#addNewNationality" title="Add New" href="#">  <i class="fa fa-plus "></i></a>&nbsp;
																				<a class="editNationality" title="Edit Nationality" href="#"> <i class="fa fa-pencil "></i></a>
																			</span>
																			 
																		</div>
																		</div>
																	 
																	 																	  
																	    
																	</div>
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="email">Passport No :</label>
																	  <div class="col-sm-4">
																		<input type="text" class="form-control" name="stu_passport" id="stu_passport" placeholder="Enter Passport No" value=""/>
																	  </div>
																	  
																	  
																	  <label class="control-label col-sm-2">Religion :</label>
																	  <div class="col-sm-4">
																		<div class="input-group">
																			<select class="form-control religionListView" name="stu_religion_id" id="stu_religion_id">
																			<option value="" selected="selected" >Select Religion </option>
																				<?php foreach($religionListInfo as $k=>$v) { ?>
																				<option value="<?php echo $v->id; ?>" data-religion-name="<?php echo $v->religion_name ?>" ><?php echo $v->religion_name; ?></option>
																				<?php } ?>
																		
																			</select>
																			<span class="input-group-addon addInstant">
																				<a class="addReligion" data-toggle="modal" data-target="#addNewReligion" title="Add New" href="#">  <i class="fa fa-plus "></i></a>&nbsp;
																				<a class="editReligion" title="Edit Religion" href="#"> <i class="fa fa-pencil "></i></a>
																			</span>
																			
																		</div>
																	  </div>
																	  
																	</div>
																	
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="email">NID/BC :</label>
																	  <div class="col-sm-4">
																		<input type="text" class="form-control" name="stu_nid" id="stu_nid" placeholder="Enter NID/BC" value=""/>
																	  </div>
																	  
																	   
																	    <label class="control-label col-sm-2" for="email">Student Status :</label>
																	  <div class="col-sm-4">
																		<select class="form-control" name="stu_status" id="stu_status" required="required">
																				<!--<option value="">Select Student Status*</option>-->
																				<option value="current_stu" selected>Current Student</option>
																				<option value="ex_student">Ex-Student</option>
																		</select>
																	  </div>
																	  
																	  
																	</div>
																	
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="email">Social Security No :</label>
																	  <div class="col-sm-4">
																		<input type="text" class="form-control" name="stu_social_scr_no" id="stu_social_scr_no" placeholder="Enter Social Security No" value=""/>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="email">Last School :</label>
																	  <div class="col-sm-4">
																		<input type="text" class="form-control" name="stu_last_school" id="stu_last_school" placeholder="Enter Last School Name" value=""/>
																	  </div>
																	  
																	 
																	</div>
																	
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="email">Student Type :</label>
																	  <div class="col-sm-4">
																		<select class="form-control" name="stu_type" id="stu_type" required = "required">
																				 <!-- <option value="">Select Student Type* </option>-->
																				  <option value="new" selected>Admitted/New Student</option>
																				  <option value="promotted">Promoted Student</option>
																		</select>
																	  </div>
																	  
																	 <label class="control-label col-sm-2" for="email"> Entry Date :</label>
																	  <div class="col-sm-4">
																		<div class="input-group">
																			<input id="stu_entry_date" name="stu_entry_date" class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" placeholder="Enter Entry Date*" required="required">
																			<span class="input-group-addon">
																				<i class="fa fa-calendar bigger-110"></i>
																			</span>
																		</div>
																	  </div>  
																	  
																	</div>
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="email">Student Photo:</label>
																	  
																	  <div class="col-sm-4">
																			<div class="attachmentbody" data-type="stu_photo" data-target="#stu_photo">
																				<img class="upload " src="<?php echo base_url('resource/img/no_image.png'); ?>">
																			</div>
																			<input id="stu_photo" type="hidden" value="" name="stu_photo">
																			
																		</div>
																		
																		<label class="control-label col-sm-2" for="admission_session">Admission Session :</label>
																		  <div class="col-sm-4">
																			<input type="text" class="form-control" name="admission_session" id="admission_session" placeholder="Enter Admission Session" value=""/>
																		  </div>
																		
																	  
																	</div>
																	
																	 
																	 
																	
																	 
																	 
																	 
																	
																	  <div class="modal-footer">
																	  	
																		<button class="btn btn-sm btn-danger formCancel" type="button">
																			<i class="ace-icon fa fa-times"></i>
																			Cancel
																		</button>
																		<button class="btn btn-sm btn-primary" type="submit" >
																			<i class="ace-icon fa fa-check"></i>
																			 Submit
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
																<span class="alrtText">New Student Added Successfully. Try Again Click <strong class="btn-danger tryAgain">Here</strong></span>
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


<!-- Start Part of Modal For Add New Class -->
			<form class="modal fade" id="addNewClass" role="dialog" action="<?php echo site_url('classInfo/classInfoStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="update_id" value="" id="update_id" />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-warning no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Class :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter New Class Name :</label>
				  	<input name="class_name" id="class_name" type="text" class="form-control" required="required" placeholder="Enter New Class Name">
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
			<form class="modal fade" id="addNewSection" role="dialog" action="<?php echo site_url('classInfo/sectionInfoStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="update_id" value="" id="update_id" />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-primary no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Section :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter New Section Name :</label>
				  	<input name="section_name" id="section_name" type="text" class="form-control" required="required" placeholder="Enter New Section Name">
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
 		<!-- End Part of Modal For Add New Section -->
		
		
		
		<!-- Start Part of Modal For Add New Shift -->
			<form class="modal fade" id="addNewShift" role="dialog" action="<?php echo site_url('classInfo/shiftInfoStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="update_id" value="" id="update_id" />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-success no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Shift :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter New Shift Name :</label>
				  	<input name="shift_name" id="shift_name" type="text" class="form-control" required="required" placeholder="Enter New Shift Name">
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
 		<!-- End Part of Modal For Add New Shift -->
		
		
		
		<!-- Start Part of Modal For Add New Branch -->
			<form class="modal fade" id="addNewBranch" role="dialog" action="<?php echo site_url('classInfo/branchInfoStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="update_id" value="" id="update_id" />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-danger no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Campus/Branch :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter New Campus/Branch Name :</label>
				  	<input name="branch_name" id="branch_name" type="text" class="form-control" required="required" placeholder="Enter New Branch Name">
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
 		<!-- End Part of Modal For Add New Branch -->
		
		<!-- Start Part of Modal For Add New Nationality -->
			<form class="modal fade" id="addNewNationality" role="dialog" action="<?php echo site_url('classInfo/nationalityInfoStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="update_id" value="" id="update_id" />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-default no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Nationality :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter New Nationality :</label>
				  	<input name="nationality_name" id="nationality_name" type="text" class="form-control" required="required" placeholder="Enter New Nationality">
				  </div>
				</div>
				<div class="btn-lg btn-default  no_radius text-right">
				  <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">
						<i class="ace-icon fa fa-times"></i>
						Close
					</button>
					
					
				  <button class="btn btn-sm btn-primary" type="submit" >
						<i class="ace-icon fa fa-check"></i>
						<span class="update">Submit</span>
					</button>
				</div>
			  </div>
			  
			</div>
 	 </form>
 		<!-- End Part of Modal For Add New Nationality -->
		
		<!-- Start Part of Modal For Add New Religion -->
			<form class="modal fade" id="addNewReligion" role="dialog" action="<?php echo site_url('classInfo/religionInfoStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="update_id" value="" id="update_id" />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-danger no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Religion :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter New Religion :</label>
				  	<input name="religion_name" id="religion_name" type="text" class="form-control" required="required" placeholder="Enter New Religion">
				  </div>
				</div>
				<div class="btn-lg btn-default  no_radius text-right">
				  <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">
						<i class="ace-icon fa fa-times"></i>
						Close
					</button>
					
					
				  <button class="btn btn-sm btn-primary" type="submit" >
						<i class="ace-icon fa fa-check"></i>
						<span class="update">Submit</span>
					</button>
				</div>
			  </div>
			  
			</div>
 	 </form>
 		<!-- End Part of Modal For Add New Religion -->
		
		
		<!-- Start Part of Modal For Add New Group -->
			<form class="modal fade" id="addNewGroup" role="dialog" action="<?php echo site_url('classInfo/groupInfoStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="update_id" value="" id="update_id" />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-danger no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Group :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter New Group :</label>
				  	<input name="group_name" id="group_name" type="text" class="form-control" required="required" placeholder="Enter New Group Name">
				  </div>
				</div>
				<div class="btn-lg btn-default  no_radius text-right">
				  <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">
						<i class="ace-icon fa fa-times"></i>
						Close
					</button>
					
					
				  <button class="btn btn-sm btn-primary" type="submit" >
						<i class="ace-icon fa fa-check"></i>
						<span class="update">Submit</span>
					</button>
				</div>
			  </div>
			  
			</div>
 	 </form>
 		<!-- End Part of Modal For Add New Group -->
 
		
         <?php //$this->load->view('common/jsLinkPage'); ?>
		 
		<!-- <script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
		</script> -->
		
<script type="text/javascript" >
$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd',
});

// identity check //

/* $('#identity_number').blur(function(){*/
$(document).on("blur", "#identity_number", function()
{
	 var identity_number = $(this).val();
	 if(identity_number.length <= 0){
		 alert("Identification Number is required!");
		 return;
	 }
	/* var getUrl = '<?php echo site_url('stuBasicInfo/identity_check'); ?>/'+identity_number;
	 $.get(getUrl,function(result){
		if(result == 'exist'){
			alert('This Identification number has already been taken');
			return false;
		}
	 });*/

	 var postUrl = '<?php echo site_url('stuBasicInfo/identity_check'); ?>';

	 $.ajax(
		 {
			 url : postUrl,
			 type: "POST",
			 data : {'identity_number':identity_number},
			 dataType :"json",
			 success:function(data){
				console.log(data);
			 }
		 });

 });


// branch
	$(document).on("click", ".addBranch", function()
	{
		 $("#addNewBranch input[type='text'], #addNewBranch input[type='hidden']").val("");
		 $('#addNewBranch .update').text("Save");
	});
	
	
	$(document).on("click", ".editBranch", function()
	{
		
		var branchName 	= $("#branc_id option:selected").attr('data-branch-name');
		var editId      = $("#branc_id option:selected").val();
		
		if(editId ==''){
		 alert('Please select a Branch name to edit');
		    return false;
		}
		
		 console.log($("#addNewBranch #branch_name").val(branchName));
		 console.log($("#addNewBranch #update_id").val(editId));
		 $('#addNewBranch .update').text("Update");
		 $('#addNewBranch').modal('show');
		
		
		
	});
	
	// class

     $(document).on("click", ".addClass", function()
	{
		 $("#addNewClass input[type='text'], #addNewClass input[type='hidden']").val("");
		 $('#addNewClass .update').text("Save");
	});
	
	
	$(document).on("click", ".editClass", function()
	{
		
		var className 	= $("#class_id option:selected").attr('data-class-name');
		console.log(className);
		var editId      = $("#class_id option:selected").val();
		
		if(editId ==''){
		 alert('Please select a Class name to edit');
		    return false;
		}
		
		 console.log($("#addNewClass #class_name").val(className));
		 console.log($("#addNewClass #update_id").val(editId));
		 $('#addNewClass .update').text("Update");
		 $('#addNewClass').modal('show');
		
		
		
	});
	
	// group
	
	
   $(document).on("click", ".addGroup", function()
	{
		 $("#addNewGroup input[type='text'], #addNewGroup input[type='hidden']").val("");
		 $('#addNewGroup .update').text("Save");
	});
	
	
	$(document).on("click", ".editGroup", function()
	{
		
		var groupName 	= $("#class_group_id option:selected").attr('data-group-name');
		var editId      = $("#class_group_id option:selected").val();
		
		if(editId ==''){
		 alert('Please select a Group name to edit');
		    return false;
		}
		
		 console.log($("#addNewGroup #group_name").val(groupName));
		 console.log($("#addNewGroup #update_id").val(editId));
		 $('#addNewGroup .update').text("Update");
		 $('#addNewGroup').modal('show');
		
		
		
	});
	
	
   // section
   $(document).on("click", ".addSection", function()
	{
		 $("#addNewSection input[type='text'], #addNewSection input[type='hidden']").val("");
		 $('#addNewSection .update').text("Save");
	});
	
	
	$(document).on("click", ".editSection", function()
	{
		
		var sectionName = $("#class_section_id option:selected").attr('data-section-name');
		var editId      = $("#class_section_id option:selected").val();
		
		if(editId ==''){
		 alert('Please select a Section name to edit');
		    return false;
		}
		
		 console.log($("#addNewSection #section_name").val(sectionName));
		 console.log($("#addNewSection #update_id").val(editId));
		 $('#addNewSection .update').text("Update");
		 $('#addNewSection').modal('show');
		
	});
	
	// shift
   $(document).on("click", ".addShift", function()
	{
		 $("#addNewShift input[type='text'], #addNewShift input[type='hidden']").val("");
		 $('#addNewShift .update').text("Save");
	});
	
	
	$(document).on("click", ".editShift", function()
	{
		
		var shiftName   = $("#class_shift_id option:selected").attr('data-shift-name');
		var editId      = $("#class_shift_id option:selected").val();
		console.log(editId);
		
		if(editId ==''){
		 alert('Please select a Section name to edit');
		    return false;
		}
		
		 console.log($("#addNewShift #shift_name").val(shiftName));
		 console.log($("#addNewShift #update_id").val(editId));
		 $('#addNewShift .update').text("Update");
		 $('#addNewShift').modal('show');
		
	});


  // Nationality
   $(document).on("click", ".addNationality", function()
	{
		 $("#addNewNationality input[type='text'], #addNewNationality input[type='hidden']").val("");
		 $('#addNewNationality .update').text("Save");
	});
	
	
	$(document).on("click", ".editNationality", function()
	{
		
		var nationName   = $("#stu_nationality_id option:selected").attr('data-nationality-name');
		var editId      = $("#stu_nationality_id option:selected").val();
		console.log(editId);
		
		if(editId ==''){
		 alert('Please select a Nationality name to edit');
		    return false;
		}
		
		 console.log($("#addNewNationality #nationality_name").val(nationName));
		 console.log($("#addNewNationality #update_id").val(editId));
		 $('#addNewNationality .update').text("Update");
		 $('#addNewNationality').modal('show');
		
	});
	
	
	
	// Religion
   $(document).on("click", ".addReligion", function()
	{
		 $("#addNewReligion input[type='text'], #addNewReligion input[type='hidden']").val("");
		 $('#addNewReligion .update').text("Save");
	});
	
	
	$(document).on("click", ".editReligion", function()
	{
		
		var regionName   = $("#stu_religion_id option:selected").attr('data-religion-name');
		var editId      = $("#stu_religion_id option:selected").val();
		console.log(regionName);
		
		if(editId ==''){
		 alert('Please select a Nationality name to edit');
		    return false;
		}
		
		 console.log($("#addNewReligion #religion_name").val(regionName));
		 console.log($("#addNewReligion #update_id").val(editId));
		 $('#addNewReligion .update').text("Update");
		 $('#addNewReligion').modal('show');
		
	});






   $("#addForm").submit(function(e)
	{
		var identity_number = $('#identity_number').val();
		if(identity_number.length <= 0){
			alert("Identification Number is required!");
			return;
		}
		var getUrl = '<?php echo site_url('stuBasicInfo/identity_check'); ?>/'+identity_number;
		$.get(getUrl,function(result){
			if(result == 'exist'){
				e.preventDefault();
				alert('This Identification number has already been taken');
			}else{
				var postData = $(this).serializeArray();
				var formURL = $(this).attr("action");
				var class_roll = $('#class_roll').val();
				if(class_roll == "") {
					$('.classRollEmptyAlrt').text("Please Generate Class Roll");
				} else {
					$('.classRollEmptyAlrt').text("");
				}

				var successUrl = '<?php echo site_url('stuBasicInfo'); ?>';
				if(class_roll != "") {
					$.ajax(
						{
							url : formURL,
							type: "POST",
							data : postData,
							success:function(data){
								$('#addForm').css('display', 'none');
								$('.afterSubmitContent').css('display', 'block');
							}
						});
				}
				e.preventDefault();
			}
		});


	});


$("#addNewClass").submit(function(e)
	{
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
				$(".classListView").html(data);				
				$("#addNewClass input[type='text'], input[type='hidden']").val("");
				$('#addNewClass').modal('hide');
				
				$('#class_roll').val('');
				$('#class_roll').attr('type', 'hidden');
				$('.GenerateClassRoll').css('display', 'block');
			}
		});
		
		e.preventDefault();
	});
	
$("#addNewSection").submit(function(e)
	{
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
				$(".sectionListView").html(data);				
				$("#addNewSection input[type='text'], input[type='hidden']").val("");
				$('#addNewSection').modal('hide');
				
				$('#class_roll').val('');
				$('#class_roll').attr('type', 'hidden');
				$('.GenerateClassRoll').css('display', 'block');
			}
		});
		
		e.preventDefault();
	});	
	
	
	$("#addNewShift").submit(function(e)
	{
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
				$(".shiftListView").html(data);				
				$("#addNewShift input[type='text'], input[type='hidden']").val("");
				$('#addNewShift').modal('hide');
				
				$('#class_roll').val('');
				$('#class_roll').attr('type', 'hidden');
				$('.GenerateClassRoll').css('display', 'block');
			}
		});
		
		e.preventDefault();
	});
	
	
$("#addNewBranch").submit(function(e)
{
	var postData = $(this).serializeArray();
	var formURL = $(this).attr("action");
	$.ajax(
	{
		url : formURL,
		type: "POST",

		data : postData,
		success:function(data){
			$(".branchListView").html(data);				
			$("#addNewBranch input[type='text'], input[type='hidden']").val("");
			$('#addNewBranch').modal('hide');
			
			$('#class_roll').val('');
			$('#class_roll').attr('type', 'hidden');
			$('.GenerateClassRoll').css('display', 'block');
		}
	});
	
	e.preventDefault();
});

$("#addNewNationality").submit(function(e)
{
	var postData = $(this).serializeArray();
	var formURL = $(this).attr("action");
	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : postData,
		success:function(data){
			$(".nationalityListView").html(data);				
			$("#addNewNationality input[type='text'], input[type='hidden']").val("");
			$('#addNewNationality').modal('hide');
			
			$('#class_roll').val('');
			$('#class_roll').attr('type', 'hidden');
			$('.GenerateClassRoll').css('display', 'block');
		}
	});
	
	e.preventDefault();
});


$("#addNewReligion").submit(function(e)
{
	var postData = $(this).serializeArray();
	var formURL = $(this).attr("action");
	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : postData,
		success:function(data){
			$(".religionListView").html(data);				
			$("#addNewReligion input[type='text'], input[type='hidden']").val("");
			$('#addNewReligion').modal('hide');
		}
	});
	
	e.preventDefault();
});


$("#addNewGroup").submit(function(e)
{
	var postData = $(this).serializeArray();
	var formURL = $(this).attr("action");
	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : postData,
		success:function(data){
			$(".groupListView").html(data);				
			$("#addNewGroup input[type='text'], input[type='hidden']").val("");
			$('#addNewGroup').modal('hide');
			$('#class_roll').val('');
			$('#class_roll').attr('type', 'hidden');
			$('.GenerateClassRoll').css('display', 'block');
		}
	});
	
	e.preventDefault();
});



$(".GenerateClassRoll").on('click', function()
{
	var stu_sex	 			 = $('#stu_sex').val();
	var branc_id 			 = $('#branc_id').val();
	var class_id 			 = $('#class_id').val();
	var class_group_id  	 = $('#class_group_id').val();
	var class_section_id	 = $('#class_section_id').val();
	var class_shift_id	 = $('#class_shift_id').val();
	
	
	if(stu_sex == '') {
		$('.genderEmptyAlrt').text('Please Select Gender');
	} else {
		$('.genderEmptyAlrt').text('');
	}
	
	if(branc_id == '') {
		$('.branchEmptyAlrt').text('Please Select Branch');
	} else {
		$('.branchEmptyAlrt').text('');
	}
	
	if(class_id == '') {
		$('.classEmptyAlrt').text('Please Select Class');
	} else {
		$('.classEmptyAlrt').text('');
	}
	
	if(class_group_id == '') {
		$('.groupEmptyAlrt').text('Please Select Group');
	} else {
		$('.groupEmptyAlrt').text('');
	}
	
	if(class_section_id == '') {
		$('.sectionEmptyAlrt').text('Please Select Section');
	} else {
		$('.sectionEmptyAlrt').text('');
	}
	
	if(class_shift_id == '') {
		$('.shiftEmptyAlrt').text('Please Select Shift');
	} else {
		$('.shiftEmptyAlrt').text('');
	}
	
	var formURL = '<?php echo site_url('classInfo/generateClassRoll'); ?>';
	if(branc_id != '' && class_id != '' && class_section_id != '' && class_shift_id != '' && class_group_id != '' && stu_sex != '') {
	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : {branc_id : branc_id, class_id : class_id, class_group_id : class_group_id, class_section_id : class_section_id, class_shift_id : class_shift_id},
		dataType: "json",
		success:function(data){
			console.log(data);
			$('.GenerateClassRoll').css('display', 'none');
			$('#class_roll').attr('type', 'text');
			//('0' + data.expectedRoll).slice(-2)
			
			$('#class_roll').val(data.expectedRoll);
			$('.classRollEmptyAlrt').text('');
		}
	});
	}
});


$(document).on("click", ".green", function(e)
	{
		
		var id 		= $(this).attr("data-id");
		var formURL = "<?php echo site_url('stuBasicInfo/stuInfoEdit'); ?>";
		$('.update').text('Update');
		
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : {id: id},
			dataType: "json",
			success:function(data){
				$('.addFormContent').css('display', 'block');
				$('#update_id').val(data.id);
				$('#stu_full_name').val(data.stu_full_name);
				$('#stu_birth_date').val(data.stu_birth_date);
				$('#stu_sex').val(data.stu_sex);
				$('#stu_blood_group').val(data.stu_blood_group);
				$('#stu_remarkabe_sign').val(data.stu_remarkabe_sign);
				$('#stu_mail_adrs').val(data.stu_mail_adrs);
				$('#stu_mobile').val(data.stu_mobile);
				$('#stu_passport').val(data.stu_passport);
				$('#stu_nid').val(data.stu_nid);
				$('#stu_social_scr_no').val(data.stu_social_scr_no);
				$('#stu_type').val(data.stu_type);
				$('#branc_id').val(data.classWiseInfo.branc_id);
				$('#class_id').val(data.classWiseInfo.class_id);
				$('#class_group_id').val(data.classWiseInfo.class_group_id);
				$('#class_section_id').val(data.classWiseInfo.class_section_id);
				$('#class_shift_id').val(data.classWiseInfo.class_shift_id);
				$('#class_roll').val(data.classWiseInfo.class_roll);
				$('#class_roll').attr('type', 'text', 'disabled', 'disabled');
				$('.GenerateClassRoll ').css('display', 'none');
				$('#stu_nationality_id').val(data.stu_nationality_id);
				$('#stu_religion_id').val(data.stu_religion_id);
				$('#stu_status').val(data.stu_status);
				$('#stu_last_school').val(data.stu_last_school);
				$('#stu_entry_date').val(data.stu_entry_date);
				$('#update_class_year').val(data.classWiseInfo.year);
				
				
				$("html, body").animate({ scrollTop: 0 }, "slow");
				
				
			}
		});
		
		e.preventDefault();
	});

$('#branc_id , #class_id, #class_group_id, #class_section_id, #class_shift_id').on('change', function() {
	$('#class_roll').val('');
	$('#class_roll').attr('type', 'hidden');
	$('.GenerateClassRoll').css('display', 'block');
});

$('.add_new').on('click', function() {
	$('.add_new').fadeOut("slow");
	$('.addFormContent').fadeIn("slow");
});

$('.formCancel').on('click', function() {
	$('.addFormContent').fadeOut('slow');
	$('.add_new').fadeIn('slow');
});

$('.tryAgain').on('click', function() {
	$('#addForm').fadeIn("slow");
	$('.afterSubmitContent').fadeOut('slow');
	$("#addForm input[type='text'], input[type='hidden'], input[type='number'], input[type='email']").val("");
	$.each($('.attachmentbody'), function(i, attachment) {
		attachment = $(attachment).html('<img class="upload" src="'+SAWEB.getBaseAction('resource/img/no_image.png')+'" />');
		reInitiateFileUpload(attachment);                        
	});
	$("#addForm option:selected").prop("selected", false);
	$('#class_roll').val('');
	$('#class_roll').attr('type', 'hidden');
	$('.GenerateClassRoll').css('display', 'block');
});

$('[data-rel=tooltip]').tooltip({container:'body'});
$('[data-rel=popover]').popover({container:'body'});
</script>