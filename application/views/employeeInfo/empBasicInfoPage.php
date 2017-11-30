
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
							<a href="<?php echo site_url('HR'); ?>">HR</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('employeeInfo'); ?>">Employee Information Management</a>&nbsp;&nbsp;
							<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('employeeInfo/empBasicInfo'); ?>">Basic Information Management</a>
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
											<h3 class="widget-title"><strong>Employee Basic Information Manage</strong></h3>
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
														<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('employeeInfo/empBasicInfoStore'); ?>" enctype="multipart/form-data" method="post">							
														<div class="content img-thumbnail container">
																  
																   <div class="form-group" style="padding:20px 0 20px 0; border-bottom:1px solid #CCCCCC;">
																	  <label class="control-label col-sm-1" for="domain_id">Domain :</label>
																	 <div class="col-sm-4">
																		<div class="input-group">
																			<select class="form-control domainListView" name="domain_id" id="domain_id" required="required">
																			<option value="" selected="selected" >Select Domain </option>
																			<?php foreach($domainListInfo as $v){ ?>
																			  <option value="<?php echo $v->id ?>" data-domain-name="<?php echo $v->domain_name ?>" data-domain-code="<?php echo $v->domain_code ?>" ><?php echo $v->domain_name ?> </option>
																			<?php } ?>
																			</select>
																			<span class="redomain"></span>
																			<span class="input-group-addon addInstant">
																				<a class="addDomain" data-toggle="modal" data-target="#addNewDomain" title="Add New" href="#">  <i class="fa fa-plus "></i></a>&nbsp;
																				<a class="editDomain" title="Edit Domain" href="#"> <i class="fa fa-pencil "></i></a>
																			</span>
																			
																			 
																		</div>
																	  </div>
																	  
																	    <div class="col-sm-2 text-left">
																		    <button class="btn btn-sm btn-primary idCreate">
																			Click To Generate Id 
																		</button>
																	    </div>
																	  
																	  <div class="showID"></div>
																	   
																	 
																	</div>
																	
																	
																	
																   
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="employee_full_name">Employee Full Name :</label>
																	  <div class="col-sm-4">
																			<input required="required" type="text" class="form-control" name="employee_full_name" id="employee_full_name" placeholder="Enter Full Name*" value=""/>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="maritus_status">Marital Status :</label>
																	  <div class="col-sm-4 text-left">
																		<select class="form-control" name="maritus_status" id="maritus_status">
																			<option value="" selected="selected" >Select Marital Status </option>
																			<option value="Married">Married </option>
																			<option value="Unmarried">Un Married </option>
																			</select>
																	  </div>
																	  
																	   
																	  
																	 
																	</div>
																	
																	
																	
																	<div class="form-group">
																	
																	  <label class="control-label col-sm-2" for="father_name">Father's Name :</label>
																	  <div class="col-sm-4">
																		 <input  type="text" class="form-control" name="father_name" id="father_name" placeholder="Enter Father's Name" value=""/>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="gender">Gender :</label>
																	     <div class="col-sm-4 text-left">
																		<select class="form-control" name="gender" id="gender">
																			<option value="" selected="selected" >Select Gender </option>
																			<option value="Male">Male </option>
																			<option value="Female">Female </option>
																			</select>
																	  </div>
																	  
																	</div>
																	
																	<div class="form-group">
																	   <label class="control-label col-sm-2" for="mother_name">Mother's Name :</label>
																	  <div class="col-sm-4">
																		 <input  type="text" class="form-control" name="mother_name" id="mother_name" placeholder="Enter Mother's Name" value=""/>
																	  </div>
																	  
																	   <label class="control-label col-sm-2">Nationality :</label>
																	  <div class="col-sm-4">
																		<div class="input-group">
																			<select class="form-control nationalityListView" name="nationality" id="nationality">
																			<option value="" selected="selected" >Select Nationality </option>
																			<?php foreach($nationalityListInfo as $v){ ?>
																			  <option value="<?php echo $v->id ?>" data-nationality-name="<?php echo $v->nationality_name ?>" ><?php echo $v->nationality_name ?> </option>
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
																	  <label class="control-label col-sm-2">Branch :</label>
																	  <div class="col-sm-4">
																		<div class="input-group">
																			<select class="form-control branchListView" name="branch_id" id="branch_id" >
																			<option value="" selected="selected" >Select Branch </option>
																			</select>
																			
																			<span class="input-group-addon addInstant">
																			  <a class="addBranch" title="Add New" href="#">  <i class="fa fa-plus "></i></a>&nbsp;
																			  <a class="editBranch" title="Edit Branch" href="#"> <i class="fa fa-pencil "></i></a>
																			</span>
																			
																		</div>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="religion">Religion :</label>
																	  <div class="col-sm-4">
																		<div class="input-group">
																			<select class="form-control religionListView" name="religion" id="religion" >
																			<option value="" selected="selected" >Select Religion </option>
																			<?php foreach($religionListInfo as $v){ ?>
																			  <option value="<?php echo $v->id ?>" data-religion-name="<?php echo $v->religion_name ?>" ><?php echo $v->religion_name ?> </option>
																			<?php } ?>
																			</select>
																			
																			<span class="input-group-addon addInstant">
																			<a class="addReligion" data-toggle="modal" data-target="#addNewReligion" title="Add New" href="#">  <i class="fa fa-plus "></i></a>&nbsp;
																				<a class="editReligion" title="Edit Nationality" href="#"> <i class="fa fa-pencil "></i></a>
																				
																			</span>
																			 
																		</div>
																	  </div>
																	  
																	</div>
																	
																	<div class="form-group">
																	   <label class="control-label col-sm-2">Zone :</label>
																	   <div class="col-sm-4">
																		<div class="input-group">
																			<select class="form-control zoneListView" name="zone_id" id="zone_id">
																			<option value="" selected="selected" >Select Zone </option>
																			</select>
																			
																			<span class="input-group-addon addInstant">
																			  <a class="addZone" title="Add New" href="#">  <i class="fa fa-plus "></i></a>&nbsp;
																			  <a class="editZone" title="Edit Zone" href="#"> <i class="fa fa-pencil "></i></a>
																			</span>
																		</div>
																	  </div>
																	  
																	   
																	  <label class="control-label col-sm-2" for="email">Education Qualification:</label>
																	  <div class="col-sm-4">
																	     <input  type="text" class="form-control" name="eduication_qualification" id="eduication_qualification" placeholder="Enter Lat Degree" value=""/>
																		
																	  </div>
																	  
																	</div>
																	
																	
																	<div class="form-group">
																	   <label class="control-label col-sm-2">Department :</label>
																	  <div class="col-sm-4">
																		<div class="input-group">
																			<select class="form-control departmentListView" name="department_id" id="department_id" >
																			<option value="" selected="selected" >Select Department </option>
																			</select>
																			
																			<span class="input-group-addon addInstant">
																			  <a class="addDepartment" title="Add New" href="#">  <i class="fa fa-plus "></i></a>&nbsp;
																			  <a class="editDepartment" title="Edit Department" href="#"> <i class="fa fa-pencil "></i></a>
																			</span>
																			
																		</div>
																	  </div>
																	  
																	   
																	  <label class="control-label col-sm-2" for="area_of_exprience">Area Of Exprience :</label>
																	  <div class="col-sm-4">
																		<input type="text" class="form-control" name="area_of_exprience" id="area_of_exprience" placeholder="Enter Area Of Exprience" value=""/>
																	  </div>  
																	 
																	  
																	</div>
																	
																	<div class="form-group">
																	   <label class="control-label col-sm-2">Designition :</label>
																	   <div class="col-sm-4">
																		<div class="input-group">
																			<select class="form-control designitionListView" name="designition_id" id="designition_id" >
																			<option value="" selected="selected" >Select Designition </option>
																			</select>
																			
																			<span class="input-group-addon addInstant">
																			  <a class="addDesignition" title="Add New" href="#">  <i class="fa fa-plus "></i></a>&nbsp;
																			  <a class="editDesignition" title="Edit Designition" href="#"> <i class="fa fa-pencil "></i></a>
																			</span>
																		</div>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="university_institute"> University/Institute :</label>
																	  <div class="col-sm-4">
																			<input id="university_institute" name="university_institute" class="form-control" type="text"  placeholder="Enter Entry Institute Name">
																	  </div>
																	  
																	  
																	    
																	</div>
																	
																	<div class="form-group">
																	
																	   <label class="control-label col-sm-2" for="date_of_birth">Date of Birth :</label>
																	  <div class="col-sm-4">
																		<div class="input-group">
																			<input id="date_of_birth" name="date_of_birth" class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" placeholder="Enter Date of Birth" >
																			<span class="input-group-addon">
																				<i class="fa fa-calendar bigger-110"></i>
																			</span>
																		</div>
																	  </div>
																	  
																	  
																	  <label class="control-label col-sm-2" for="initiate_joining_date">Initial Joining Date  :</label>
																	  <div class="col-sm-4">
																		<div class="input-group">
																			<input id="initiate_joining_date" name="initiate_joining_date" class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" placeholder="Enter Initial Joining Date" >
																			
																			
																			<span class="input-group-addon">
																				<i class="fa fa-calendar bigger-110"></i>
																			</span>
																		</div>
																	  </div>
																	  
																	 
																	</div>
																	
																	
																	<div class="form-group">
																	
																	  <label class="control-label col-sm-2" for="place_of_birth"> Place Of Birth :</label>
																	   <div class="col-sm-4">
																		<div class="input-group">
																			<select class="form-control placeListView" name="place_of_birth" id="place_of_birth" >
																			<option value="" selected="selected" >Select Place </option>
																			<?php foreach($placeListInfo as $v){ ?>
																			  <option value="<?php echo $v->id ?>" data-place-name="<?php echo $v->place_name ?>" ><?php echo $v->place_name ?> </option>
																			<?php } ?>
																			</select>
																			<span class="input-group-addon addInstant">
																			  <a class="addPlace" data-toggle="modal" data-target="#addNewPlace" title="Add New" href="#">  <i class="fa fa-plus "></i></a>&nbsp;
																			  <a class="editPlace" title="Edit Designition" href="#"> <i class="fa fa-pencil "></i></a>
																			</span>
																			
																			
																			 
																		</div>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="confirmation_date">Confirmation Date  :</label>
																	   <div class="col-sm-4">
																		<div class="input-group">
																			<input id="confirmation_date" name="confirmation_date" class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" placeholder="Enter Confirmation Date" >
																			
																			
																			<span class="input-group-addon">
																				<i class="fa fa-calendar bigger-110"></i>
																			</span>
																		</div>
																	  </div>
																	
																	</div>
																	
																	
																	<div class="form-group">
																	
																	    <label class="control-label col-sm-2" for="mobile_no">Mobile/Cell No:</label>
																	  
																	  <div class="col-sm-4">
																			<input type="number" class="form-control" name="mobile_no" id="mobile_no" placeholder="Enter Mobile/Cell No" value=""/>
																		</div>
																		
																		
																		
																     <label class="control-label col-sm-2" for="appointment_date">Appointment Date :</label>
																	  <div class="col-sm-4">
																		<div class="input-group">
																			<input id="appointment_date" name="appointment_date" class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" placeholder="Enter Appointment Date" >
																			
																			
																			<span class="input-group-addon">
																				<i class="fa fa-calendar bigger-110"></i>
																			</span>
																		</div>
																	  </div>
																	  
																	</div>
																	
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-2" for="phone_no">Phone No :</label>
																	  <div class="col-sm-4">
																	      <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="Enter Phone No" value=""/>
																	  </div>
																	  
																	   <label class="control-label col-sm-2" for="email">Initial Job Type :</label>
																	   <div class="col-sm-4">
																		<div class="input-group">
																			<select class="form-control jobTypeListView" name="initiate_job_type" id="initiate_job_type" >
																			<option value="" selected="selected" >Select Job Type </option>
																			<?php foreach($jobTypeListInfo as $v){ ?>
																			  <option value="<?php echo $v->id ?>" data-job-name="<?php echo $v->job_type_name ?>" ><?php echo $v->job_type_name ?> </option>
																			<?php } ?>
																			</select>
																			<span class="input-group-addon addInstant">
																			  <a class="addJobType" data-toggle="modal" data-target="#addNewJobType" title="Add New" href="#">  <i class="fa fa-plus "></i></a>&nbsp;
																			  <a class="editJobType" title="Edit Job Type" href="#"> <i class="fa fa-pencil "></i></a>
																			</span>
																			
																		</div>
																	  </div>
																	 
																	</div>
																	
																	<div class="form-group">
																	
																	  <label class="control-label col-sm-2" > Email :</label>
																	  <div class="col-sm-4">
																		<input type="text" class="form-control" name="email" id="email" placeholder="Enter Email" value=""/>
																	  </div>
																	  
																	 
																	   <label class="control-label col-sm-2" for="work_shift"> Shift :</label>
																	  <div class="col-sm-4">
																			<select class="form-control" name="work_shift" id="work_shift">
																				<option value="" selected="selected">Select Shift</option>
																				<option value="Morning">Morning</option>
																				<option value="Evening">Evening</option>
																				
																		</select>
																	  </div>
																	  
																	  
																	  
																	</div>
																	
																	
																	<div class="form-group">
																	
																	   <label class="control-label col-sm-2" for="present_address">Present Address :</label>
																	  <div class="col-sm-4">
																	    <textarea class="form-control" name="present_address" id="present_address" placeholder="Enter Present Address"></textarea>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="job_status"> Job Status :</label>
																	  <div class="col-sm-4">
																			<select class="form-control" name="job_status" id="job_status">
																				<option value="" selected="selected">Select Job Status</option>
																				<option value="inservice">In Service</option>
																				<option value="notinservice">Not In Service</option>
																				
																		</select>
																	  </div>
																	  
																	  
																	</div>
																	
																	<div class="form-group">
																		<label class="control-label col-sm-2" for="permanent_address">Permanent Address :</label>
																	  <div class="col-sm-4">
																		   <textarea class="form-control" name="permanent_address" id="permanent_address" placeholder="Enter Permanent Address"></textarea>
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="job_location"> Job Location :</label>
																		  <div class="col-sm-4">
																				<input id="job_location" name="job_location" class="form-control" type="text" placeholder="Enter Job Location">
																		  </div> 
																	 
																	</div>
																	
																	<div class="form-group">
																		<label class="control-label col-sm-2" for="permanent_address"></label>
																	  <div class="col-sm-4">
																		   
																	  </div>
																	  
																	  <label class="control-label col-sm-2" for="emp_photo">Employee Photo :</label>
																	  
																	   <div class="col-sm-4">
																			<div class="attachmentbody" data-type="emp_photo" data-target="#emp_photo">
																				<img class="upload " src="<?php echo base_url('resource/img/no_image.png'); ?>">
																			</div>
																			<input id="emp_photo" type="hidden" value="" name="emp_photo">
																			
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
																<span class="alrtText">New Employee Added Successfully. Add Again Click <strong class="btn-danger tryAgain">Here</strong></span>
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


<!-- start add new domain part modal -->
			<form class="modal fade" id="addNewDomain" role="dialog" action="<?php echo site_url('employeeInfo/domainInfoStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="domain_id_edit" id="domain_id_edit"  />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-primary no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Domain :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter New Domain Name :</label>
				  	<input name="domainName" id="domainName" type="text" class="form-control" required="required" placeholder="Enter New Domain Name">
				  </div>
				  <span class="chkdomain"></span>
				  
				  <div class="form-group">
				  <label>Enter Domain Code :</label>
				  	<input name="domainCode" id="domainCode" type="number" class="form-control" required="required" placeholder="Enter New Domain Code">
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
	 
	 <!-- end add new domain part modal -->
	 
	 
	 <!-- start add new department part modal -->
			<form class="modal fade" id="addNewDepartment" role="dialog" action="<?php echo site_url('employeeInfo/departmenInfoStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="depart_id_edit" id="depart_id_edit"  />
			<input type="hidden" name="domain_id_in" id="domain_id_in"  />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-primary no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Department :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter New Department Name :</label>
				  	<input name="departmentName" id="departmentName" type="text" class="form-control" required="required" placeholder="Enter New Department Name">
				  </div>
				  <span class="chkdomain"></span>
				  
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
	 
	 <!-- end add new department part modal -->
 		
		
		
		 <!-- start add new desinitionj part modal -->
			<form class="modal fade" id="addNewDesignition" role="dialog" action="<?php echo site_url('employeeInfo/designitionInfoStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="desig_id_edit" id="desig_id_edit"  />
			<input type="hidden" name="domain_id_in" id="domain_id_in"  />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-primary no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Designition :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter New Designition Name :</label>
				  	<input name="designitionName" id="designitionName" type="text" class="form-control" required="required" placeholder="Enter New Designition Name">
				  </div>
				  <span class="chkdomain"></span>
				  
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
	 
	 <!-- end add new desinitionj part modal -->
	 
	 
	  <!-- start add new place of birth part modal -->
			<form class="modal fade" id="addNewPlace" role="dialog" action="<?php echo site_url('employeeInfo/placeOfBirthInfoStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="place_id_edit" id="place_id_edit"  />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-primary no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Place of Birth :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter New Place Name :</label>
				  	<input name="placeName" id="placeName" type="text" class="form-control" required="required" placeholder="Enter New Place Name">
				  </div>
				  <span class="chkdomain"></span>
				  
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
	 
	 <!-- end add new place of birth part modal -->
	 
	 
	 
	 <!-- start add new Nationality part modal -->
			<form class="modal fade" id="addNewNationality" role="dialog" action="<?php echo site_url('employeeInfo/nationalityInfoStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="nationality_id_edit" id="nationality_id_edit"  />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-primary no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Nationality :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter New Nationality Name :</label>
				  	<input name="nationality" id="nationality" type="text" class="form-control" required="required" placeholder="Enter New Nationality Name">
				  </div>
				  <span class="chkdomain"></span>
				  
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
	 
	 <!-- end add newNationality part modal -->
	 
	 
	 <!-- start add new Religion part modal -->
			<form class="modal fade" id="addNewReligion" role="dialog" action="<?php echo site_url('employeeInfo/religionInfoStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="religion_id_edit" id="religion_id_edit"  />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-primary no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Religion :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter New Religion Name :</label>
				  	<input name="religion" id="religion" type="text" class="form-control" required="required" placeholder="Enter New Religion Name">
				  </div>
				  <span class="chkdomain"></span>
				  
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
	 
	 <!-- end add Religion part modal -->
	 
	 
	 
	 <!-- start add new initial job type part modal -->
			<form class="modal fade" id="addNewJobType" role="dialog" action="<?php echo site_url('employeeInfo/jobTypeInfoStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="jobType_id_edit" id="jobType_id_edit"  />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-primary no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Job Type :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter New Job Type Name :</label>
				  	<input name="jobTypeName" id="jobTypeName" type="text" class="form-control" required="required" placeholder="Enter New Job Type Name">
				  </div>
				  <span class="chkdomain"></span>
				  
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
	 
	 <!-- end add Religion part modal -->
	 
	 
	 <!-- start add new Branch part modal -->
			<form class="modal fade" id="addNewBranch" role="dialog" action="<?php echo site_url('employeeInfo/branchInfoStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="branch_id_edit" id="branch_id_edit"  />
			<input type="hidden" name="domain_id_in" id="domain_id_in"  />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-primary no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Branch :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter New Branch Name :</label>
				  	<input name="branchName" id="branchName" type="text" class="form-control" required="required" placeholder="Enter New Branch Name">
				  </div>
				  <span class="chkdomain"></span>
				  
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
	 
	 <!-- end add new Branch part modal -->
	 
	  <!-- start add new Zone part modal -->
			<form class="modal fade" id="addNewZone" role="dialog" action="<?php echo site_url('employeeInfo/zoneInfoStore'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="zone_id_edit" id="zone_id_edit"  />
			<input type="hidden" name="domain_id_in" id="domain_id_in"  />
			<div class="modal-dialog modal-sm">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="btn-lg btn-primary no_radius">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Add New Zone :</h4>
				</div>
				<div class="modal-body">
				  <div class="form-group">
				  <label>Enter New Zone Name :</label>
				  	<input name="zoneName" id="zoneName" type="text" class="form-control" required="required" placeholder="Enter New Zone Name">
				  </div>
				  <span class="chkdomain"></span>
				  
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
	 
	 <!-- end add new Zone part modal -->
 		
 		
 
		
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

// Branch name edit part start

 $(document).on("click", ".addBranch", function()
	{
	
	   var domainId   = $('#domain_id').val();
	   if(domainId == ''){
	      alert('Please select a domain to create branch');
		  return false;
	   }else{
	     $('#addNewBranch').modal('show');
		 
		 $("#addNewBranch input[type='text'], #addNewBranch input[type='hidden']").val("");
		 $('#addNewBranch .update').text("Save");
	    
	   }
		
	});


   $(document).on("click", ".editBranch", function()
	{
		
		var branchName 	= $("#branch_id option:selected").attr('data-branch-name');
		var editId      = $("#branch_id option:selected").val();
		var domainId    = $('#domain_id').val();
		
		if(editId ==''){
		 alert('Please select a Branch name to edit');
		 return false;
		}
		
		 console.log($("#addNewBranch #branchName").val(branchName));
		 console.log($("#addNewBranch #branch_id_edit").val(editId));
		 console.log($("#addNewBranch #domain_id_in").val(domainId));
		 $('#addNewBranch .update').text("Update");
		 $('#addNewBranch').modal('show');
		
		
		
	});

// Branch name edit part end

// Branch information insert action start
$("#addNewBranch").submit(function(e)
{
	var domainId   = $('#domain_id').val();
	console.log(domainId);
	console.log($("#addNewBranch #domain_id_in").val(domainId));
	
	
	var postData = $(this).serializeArray();
	var formURL = $(this).attr("action");
	$.ajax(
	{
		url : formURL,
		type: "POST",
		async: false,
		data : postData,
		success:function(data){
			$(".branchListView").html(data);				
			$("#addNewBranch input[type='text'] #addNewBranch input[type='hidden']").val("");
			$('#addNewBranch').modal('hide');
		}
	});
	
	
	e.preventDefault();
});

// Branch information insert action start



// Zone name edit part start

 $(document).on("click", ".addZone", function()
	{
	
	   var domainId   = $('#domain_id').val();
	   if(domainId == ''){
	      alert('Please select a domain to create branch');
		  return false;
	   }else{
	     $('#addNewZone').modal('show');
		 
		 $("#addNewZone input[type='text'], #addNewZone input[type='hidden']").val("");
		 $('#addNewZone .update').text("Save");
	    
	   }
		
	});


   $(document).on("click", ".editZone", function()
	{
		
		var zoneName 	= $("#zone_id option:selected").attr('data-zone-name');
		var editId      = $("#zone_id option:selected").val();
		var domainId    = $('#domain_id').val();
		
		if(editId ==''){
		 alert('Please select a Zone name to edit');
		 return false;
		}
		
		 console.log($("#addNewZone #zoneName").val(zoneName));
		 console.log($("#addNewZone #zone_id_edit").val(editId));
		 console.log($("#addNewZone #domain_id_in").val(domainId));
		 $('#addNewZone .update').text("Update");
		 $('#addNewZone').modal('show');
		
		
		
	});

// Zone name edit part end

// Zone information insert action start
$("#addNewZone").submit(function(e)
{
	var domainId   = $('#domain_id').val();
	console.log(domainId);
	console.log($("#addNewZone #domain_id_in").val(domainId));
	
	
	var postData = $(this).serializeArray();
	var formURL = $(this).attr("action");
	$.ajax(
	{
		url : formURL,
		type: "POST",
		async: false,
		data : postData,
		success:function(data){
			$(".zoneListView").html(data);				
			$("#addNewZone input[type='text'], #addNewZone input[type='hidden']").val("");
			$('#addNewZone').modal('hide');
		}
	});
	
	
	e.preventDefault();
});

// Zone information insert action start






// id create start

  $(document).on("click", ".idCreate", function(e)
	{
		
		var domainId      = $("#domain_id option:selected").val();
		
		if(domainId ==''){
		  $('.redomain').text("Please select a domain name"); 
		  $('.redomain').css('color', 'red');
		} else {
		  $('.redomain').text(""); 
		  var actionUrl = '<?php echo site_url('employeeInfo/empIdGenerate'); ?>';
		  $.ajax(
			{
				url : actionUrl,
				type: "POST",
				data : {domainId : domainId},
				success:function(data){
					$('.showID').html(data);
				}
			  });
		   
		   }
		
		e.preventDefault();
		
		
		
	});

// id create end

// basic information insert action start

$("#addForm").submit(function(e)
	{
		var postData = $(this).serializeArray();
		var html     = $('.showID').html();
		var formURL = $(this).attr("action");
		
		if(html !=''){
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
				$('#addForm').css('display', 'none');
				$('.afterSubmitContent').css('display', 'block');
				$('.showID').html('');
				$(".designitionListView").html('');
				$(".departmentListView").html('');
				$(".zoneListView").html('');
				$(".branchListView").html('');
				$("#addForm input[type='text'], #addForm input[type='hidden'], #addForm input[type='number'], #addForm textarea").val("");
				$.each($('.attachmentbody'), function(i, attachment) {
					attachment = $(attachment).html('<img class="upload" src="'+SAWEB.getBaseAction('resource/img/no_image.png')+'" />');
					reInitiateFileUpload(attachment);                        
				});
			}
		  });
		 }else{
		   alert("Click to generate Id Then submit");
		 }
		
		e.preventDefault();
	});
	
	
	// basic information insert action end
	
   // again insert 
	$('.tryAgain').on('click', function() {
	$('#addForm').fadeIn("slow");
	$('.afterSubmitContent').fadeOut('slow');
	$("#addForm input[type='text'], #addForm input[type='hidden'], #addForm input[type='number'], #addForm textarea").val("");
	$("#addForm option:selected").prop("selected", false);
	$.each($('.attachmentbody'), function(i, attachment) {
		attachment = $(attachment).html('<img class="upload" src="'+SAWEB.getBaseAction('resource/img/no_image.png')+'" />');
		reInitiateFileUpload(attachment);                        
	});
});

	
// domain name edit part start

 $(document).on("click", ".addDomain", function()
	{
		$("#addNewDomain input[type='text'], #addNewDomain input[type='hidden'], #addNewDomain input[type='number']").val("");
		$('#addNewDomain .update').text("Save");
	});


   $(document).on("click", ".editDomain", function()
	{
		
		var domainName 	= $("#domain_id option:selected").attr('data-domain-name');
		var domainCode 	= $("#domain_id option:selected").attr('data-domain-code');
		var editId      = $("#domain_id option:selected").val();
		
		if(editId ==''){
		 alert('Please select a Domain name to edit');
		 return false;
		}
		
		 console.log($("#addNewDomain #domainName").val(domainName));
		 console.log($("#addNewDomain #domainCode").val(domainCode));
		 console.log($("#addNewDomain #domain_id_edit").val(editId));
		 $('#addNewDomain .update').text("Update");
		 $('#addNewDomain').modal('show');
		
		
		
	});

// domain name edit part end



// domain name insert start
$("#addNewDomain").submit(function(e)
	{
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
				$(".domainListView").html(data);				
				$("#addNewDomain input[type='text'], #addNewDomain input[type='hidden'], #addNewDomain input[type='number']").val("");
				$('#addNewDomain').modal('hide');
			}
		});
		
		e.preventDefault();
	});
	
	// domain name insert end
	
	
	
	// department name edit part start

	$(document).on("click", ".addDepartment", function()
	{
	   var domainId   = $('#domain_id').val();
	   if(domainId == ''){
	      alert('Please select a domain to create branch');
		  return false;
	   }else{
	     $('#addNewDepartment').modal('show');
		 
		 $("#addNewDepartment input[type='text'], #addNewDepartment input[type='hidden']").val("");
		 $('#addNewDepartment .update').text("Save");
	    
	   }
		
	});



   $(document).on("click", ".editDepartment", function()
	{
		
		var departName 	= $("#department_id option:selected").attr('data-department-name');
		var editId      = $("#department_id option:selected").val();
		var domainId    = $('#domain_id').val();
		
		if(editId ==''){
		 alert('Please select a Department name to edit');
		 return false;
		}
		
		 console.log($("#addNewDepartment #departmentName").val(departName));
		 console.log($("#addNewDepartment #depart_id_edit").val(editId));
		 console.log($("#addNewDepartment #domain_id_in").val(domainId));
		 $('#addNewDepartment .update').text("Update");
		 $('#addNewDepartment').modal('show');
		
		
		
	});

// domain name edit part end

	
	// department name insert start
$("#addNewDepartment").submit(function(e)
	{
	    var domainId   = $('#domain_id').val();
	    console.log($("#addNewDepartment #domain_id_in").val(domainId));
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action"); 
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
				$(".departmentListView").html(data);				
				$("#addNewDepartment input[type='text'], #addNewDepartment input[type='hidden']").val("");
				$('#addNewDepartment').modal('hide');
			}
		});
		
		e.preventDefault();
	});
	
	// domain name insert end

	
	



	// designition name edit part start
	
	$(document).on("click", ".addDesignition", function()
	{
	   var domainId   = $('#domain_id').val();
	   if(domainId == ''){
	      alert('Please select a domain to create branch');
		  return false;
	   }else{
	     $('#addNewDesignition').modal('show');
		 
		 $("#addNewDesignition input[type='text'], #addNewDesignition input[type='hidden']").val("");
		 $('#addNewDesignition .update').text("Save");
	    
	   }
		
	});



   $(document).on("click", ".editDesignition", function()
	{
		
		var desigName 	= $("#designition_id option:selected").attr('data-designition-name');
		var editId      = $("#designition_id option:selected").val();
		var domainId    = $('#domain_id').val();
		
		if(editId ==''){
		 alert('Please select a Department name to edit');
		 return false;
		}
		
		 console.log($("#addNewDesignition #designitionName").val(desigName));
		 console.log($("#addNewDesignition #desig_id_edit").val(editId));
		  console.log($("#addNewDesignition #domain_id_in").val(domainId));
		 $('#addNewDesignition .update').text("Update");
		 $('#addNewDesignition').modal('show');
		
		
		
	});

// designition name edit part end

	
	// designition name insert start
$("#addNewDesignition").submit(function(e)
	{
	    var domainId   = $('#domain_id').val();
		console.log($("#addNewDesignition #domain_id_in").val(domainId));
	
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
				$(".designitionListView").html(data);				
				$("#addNewDesignition input[type='text'], #addNewDesignition input[type='hidden']").val("");
				$('#addNewDesignition').modal('hide');
			}
		});
		
		e.preventDefault();
	});
	
	// domain name insert end

	
	

// place of birth name edit part start

 $(document).on("click", ".addPlace", function()
	{
		$("#addNewPlace input[type='text'], #addNewPlace input[type='hidden']").val("");
		$('#addNewPlace .update').text("Save");
	});


   $(document).on("click", ".editPlace", function()
	{
		
		var placeName 	= $("#place_of_birth option:selected").attr('data-place-name');
		var editId      = $("#place_of_birth option:selected").val();
		console.log(placeName);
		
		if(editId ==''){
		 alert('Please select a place name to edit');
		 return false;
		}
		
		 console.log($("#addNewPlace #placeName").val(placeName));
		 console.log($("#addNewPlace #place_id_edit").val(editId));
		 $('#addNewPlace .update').text("Update");
		 $('#addNewPlace').modal('show');
		
		
		
	});

// place of birth name edit part end

	
	// place of birth name insert start
$("#addNewPlace").submit(function(e)
	{
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
				$(".placeListView").html(data);				
				$("#addNewPlace input[type='text'], #addNewPlace input[type='hidden']").val("");
				$('#addNewPlace').modal('hide');
			}
		});
		
		e.preventDefault();
	});
	
	// place of birth name insert end

	
	



// Nationality name edit part start

 $(document).on("click", ".addNationality", function()
	{
		$("#addNewNationality input[type='text'], #addNewNationality input[type='hidden']").val("");
		$('#addNewNationality .update').text("Save");
	});


   $(document).on("click", ".editNationality", function()
	{
		
		var placeName 	= $("#nationality option:selected").attr('data-nationality-name');
		var editId      = $("#nationality option:selected").val();
		console.log(placeName);
		
		if(editId ==''){
		 alert('Please select a Nationality to edit');
		 return false;
		}
		
		 console.log($("#addNewNationality #nationality").val(placeName));
		 console.log($("#addNewNationality #nationality_id_edit").val(editId));
		 $('#addNewNationality .update').text("Update");
		 $('#addNewNationality').modal('show');
		
		
		
	});

// Nationality name edit part end

	
	// Nationality name insert start
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
				$("#addNewNationality input[type='text'], #addNewNationality input[type='hidden']").val("");
				$('#addNewNationality').modal('hide');
			}
		});
		
		e.preventDefault();
	});
	
	// Nationality name insert end

	
	


// Religion name edit part start

 $(document).on("click", ".addReligion", function()
	{
		$("#addNewReligion input[type='text'], #addNewReligion input[type='hidden']").val("");
		$('#addNewReligion .update').text("Save");
	});


   $(document).on("click", ".editReligion", function()
	{
		
		var religionName 	= $("#religion option:selected").attr('data-religion-name');
		var editId      	= $("#religion option:selected").val();
		console.log(placeName);
		
		if(editId ==''){
		 alert('Please select a Religion to edit');
		 return false;
		}
		
		 console.log($("#addNewReligion #religion").val(religionName));
		 console.log($("#addNewReligion #religion_id_edit").val(editId));
		 $('#addNewReligion .update').text("Update");
		 $('#addNewReligion').modal('show');
		
		
		
	});

// Religion name edit part end

	
	// Religion name insert start
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
				$("#addNewReligion input[type='text'], #addNewReligion input[type='hidden']").val("");
				$('#addNewReligion').modal('hide');
			}
		});
		
		e.preventDefault();
	});
	
	// Religion name insert end

	
	


// Job Type  name edit part start

 $(document).on("click", ".addJobType", function()
	{
		$("#addNewJobType input[type='text'], #addNewJobType input[type='hidden']").val("");
		$('#addNewJobType .update').text("Save");
	});


   $(document).on("click", ".editJobType", function()
	{
		
		var religionName 	= $("#initiate_job_type option:selected").attr('data-job-name');
		var editId      	= $("#initiate_job_type option:selected").val();
		console.log(placeName);
		
		if(editId ==''){
		 alert('Please select a Religion to edit');
		 return false;
		}
		
		 console.log($("#addNewJobType #jobTypeName").val(religionName));
		 console.log($("#addNewJobType #jobType_id_edit").val(editId));
		 $('#addNewJobType .update').text("Update");
		 $('#addNewJobType').modal('show');
		
		
		
	});

// Job Type name edit part end

	
	// Job Type name insert start
$("#addNewJobType").submit(function(e)
	{
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
				$(".jobTypeListView").html(data);				
				$("#addNewJobType input[type='text'], #addNewJobType input[type='hidden']").val("");
				$('#addNewJobType').modal('hide');
			}
		});
		
		e.preventDefault();
	});
	
	// Job Type name insert end


// Domain wise all data show start	

   //Domain wise branch 
		$("#domain_id").change(function() {
		var domain_id = $("#domain_id").val();			
		$.ajax({
			url : SAWEB.getSiteAction('employeeInfo/domainWiseBranch'), // URL TO LOAD BEHIND THE SCREEN
			type : "POST",
			data : { domain_id : domain_id },
			dataType : "html",
			success : function(data) {			
				$(".branchListView").html(data);
			}
		});
		
	});	
	
	//Domain wise zone 
		$("#domain_id").change(function() {
		var domain_id = $("#domain_id").val();			
		$.ajax({
			url : SAWEB.getSiteAction('employeeInfo/domainWiseZone'), // URL TO LOAD BEHIND THE SCREEN
			type : "POST",
			data : { domain_id : domain_id },
			dataType : "html",
			success : function(data) {			
				$(".zoneListView").html(data);
			}
		});
		
	});	
 
   //Domain wise Department 
		$("#domain_id").change(function() {
		var domain_id = $("#domain_id").val();			
		$.ajax({
			url : SAWEB.getSiteAction('employeeInfo/domainWiseDepartment'), // URL TO LOAD BEHIND THE SCREEN
			type : "POST",
			data : { domain_id : domain_id },
			dataType : "html",
			success : function(data) {			
				$(".departmentListView").html(data);
			}
		});
		
	});	
 
   //Domain wise Designition 
		$("#domain_id").change(function() {
		var domain_id = $("#domain_id").val();			
		$.ajax({
			url : SAWEB.getSiteAction('employeeInfo/domainWiseDesignition'), // URL TO LOAD BEHIND THE SCREEN
			type : "POST",
			data : { domain_id : domain_id },
			dataType : "html",
			success : function(data) {			
				$(".designitionListView").html(data);
			}
		});
		
	});	
 


// Domain wise all data show end	


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