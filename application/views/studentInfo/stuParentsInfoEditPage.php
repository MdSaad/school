
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
							<a href="<?php echo site_url('admissionModule'); ?>">Admission</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('admissionModule/stuInfoEditModule'); ?>">Student Editable</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('admissionModule/stuParentsInfoEdit'); ?>">Student Parents Information Edit</a>&nbsp;&nbsp;
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
											<h4 class="widget-title">Parents & Guardian Information Manage </h4>
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
											<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('stuParentsInfo/stuParentsInfoStore'); ?>" enctype="multipart/form-data" method="post">
												<div class="scroll-content">
															<div class="content img-thumbnail container">
																  <input type="hidden" class="form-control" name="update_id" id="update_id"  value="<?php echo $stuParentsInfo->id; ?>"/>
																	<div class="row">

																		<div class="form-group" style="padding-top:10px">
																			  <label class="control-label col-sm-4"><strong>Student ID  :</strong></label>
																			  <div class="col-sm-5">
																						<input name="stuCurrentID" id="stuCurrentID" class="form-control" type="text" placeholder="Enter Student ID" value="<?php echo $stuParentsInfo->stu_id; ?>" readonly="readonly">
																					</div>		
																					<div class="col-sm-3">
																					    <?php
																							 if(!empty($stuParentsInfo->stu_photo)){ ?>
																							<img src="<?php echo base_url("resource/stu_photo/$stuParentsInfo->stu_photo"); ?>" width="50" height="40" class="img-thumbnail"> 
																						<?php }else{  if($stuParentsInfo->stu_sex == 'M'){ ?>
																								 <img src="<?php echo base_url('resource/img/male.png'); ?>" width="50" height="40"> 
																							 <?php }else{ ?>
																							   <img src="<?php echo base_url('resource/img/EmptyProfile.png'); ?>" width="50" height="40"> 
																						<?php } } ?>
																						<br><?php echo $stuParentsInfo->stu_full_name ?>
																						
																					</div>																		  
																			  </div>
																			</div>
																		<div class="col-md-12">
																		 <div class="col-md-6 img-thumbnail">
																		 	<h4>Father's Details Information </h4>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Father's Name  :</label>
																			  <div class="col-sm-7">
																					<input id="f_name" name="f_name" class="form-control" type="text"  placeholder="Enter Father Name" value="<?php echo $stuParentsInfo->f_name; ?>" >																			  </div>
																			</div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Present Address :</label>
																			  <div class="col-sm-7">
																					<input id="f_pre_adrs" name="f_pre_adrs" class="form-control" type="text"  placeholder="Enter Present Address" value="<?php echo $stuParentsInfo->f_pre_adrs; ?>" >																			 
																				</div>
																			</div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Permanent Address   :</label>
																			  <div class="col-sm-7">
																					<input id="f_per_adrs" name="f_per_adrs" class="form-control" type="text"  placeholder="Enter Permanent Address" value="<?php echo $stuParentsInfo->f_per_adrs; ?>" >														  </div>
																			</div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Occupation :</label>
																			  <div class="col-sm-7">
																					<input id="f_occupation" name="f_occupation" class="form-control" type="text"  placeholder="Enter Occupation" value="<?php echo $stuParentsInfo->f_occupation; ?>" ></div>
																			</div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Occupation Address :</label>
																			  <div class="col-sm-7">
																					<input id="f_occupation_adrs" name="f_occupation_adrs" class="form-control" type="text"  placeholder="Enter Occupation Address" value="<?php echo $stuParentsInfo->f_occupation_adrs; ?>" >									   </div>
																			</div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Yearly Income :</label>
																			  <div class="col-sm-7">
																					<input id="f_yearly_income" name="f_yearly_income" class="form-control" type="text"  placeholder="Enter Yearly Income" value="<?php echo $stuParentsInfo->f_yearly_income; ?>" >													   </div>
																			</div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Contact Phone/Cell :</label>
																			  <div class="col-sm-7">
																					<input id="f_mobile" name="f_mobile" class="form-control" type="text"  placeholder="Enter Mobile Number" value="<?php echo $stuParentsInfo->f_mobile; ?>" >																			  </div>
																			</div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Contact E-mail :</label>
																			  <div class="col-sm-7">
																					<input id="f_email" name="f_email" class="form-control" type="text"  placeholder="Enter Email" value="<?php echo $stuParentsInfo->f_email; ?>" >																			  </div>
																			</div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Passport No :</label>
																			  <div class="col-sm-7">
																					<input id="f_passport_no" name="f_passport_no" class="form-control" type="text"  placeholder="Enter Passport No" value="<?php echo $stuParentsInfo->f_passport_no; ?>" >														  </div>
																			</div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">National ID :</label>
																			  <div class="col-sm-7">
																					<input id="f_nid" name="f_nid" class="form-control" type="text"  placeholder="Enter NID" value="<?php echo $stuParentsInfo->f_nid; ?>" >																			  </div>
																			</div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Driving Licence  :</label>
																			  <div class="col-sm-7">
																					<input id="f_driving_licence" name="f_driving_licence" class="form-control" type="text"  placeholder="Enter Driving Licence" value="<?php echo $stuParentsInfo->f_driving_licence; ?>" >										  </div>
																			</div>
																			
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Father's Photo  :</label>
																			  <div class="col-sm-7">
																			     <div class="attachmentbody" data-type="father_photo" data-target="#father_photo">
																					<img class="upload " src="<?php echo base_url('resource/img/no_image.png'); ?>">
																				 </div>
																				 <input id="father_photo" type="hidden" value="" name="father_photo">
																				  <?php if(!empty($stuParentsInfo->father_photo)){ ?>
																				 <div class="attachmentbody">
																				     <img src="<?php echo base_url("resource/parents_gardian_photo/$stuParentsInfo->father_photo"); ?>"> 
																				 </div>
																				  <?php } ?>
																				 
																			  </div>
																			</div>
																			
																		 </div>
																		 
																		 <div class="col-md-6 img-thumbnail">
																				<h4>Mother's Details Information </h4>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Mother's Name  :</label>
																				  <div class="col-sm-7">
																						<input id="m_name" name="m_name" class="form-control" type="text"  placeholder="Enter Mother Name" value="<?php echo $stuParentsInfo->m_name; ?>" >																			  </div>
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Present Address :</label>
																				  <div class="col-sm-7">
																						<input id="m_pre_adrs" name="m_pre_adrs" class="form-control" type="text"  placeholder="Enter Present Address" value="<?php echo $stuParentsInfo->m_pre_adrs; ?>" >																			 
																					</div>
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Permanent Address   :</label>
																				  <div class="col-sm-7">
																						<input id="m_per_adrs" name="m_per_adrs" class="form-control" type="text"  placeholder="Enter Permanent Address" value="<?php echo $stuParentsInfo->m_per_adrs; ?>" >														  </div>
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Occupation :</label>
																				  <div class="col-sm-7">
																						<input id="m_occupation" name="m_occupation" class="form-control" type="text"  placeholder="Enter Occupation" value="<?php echo $stuParentsInfo->m_occupation; ?>" >													  </div>
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Occupation Address :</label>
																				  <div class="col-sm-7">
																						<input id="m_occupation_adrs" name="m_occupation_adrs" class="form-control" type="text"  placeholder="Enter Occupation Address" value="<?php echo $stuParentsInfo->m_occupation_adrs; ?>" >									   </div>
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Yearly Income :</label>
																				  <div class="col-sm-7">
																						<input id="m_yearly_income" name="m_yearly_income" class="form-control" type="text"  placeholder="Enter Yearly Income" value="<?php echo $stuParentsInfo->m_yearly_income; ?>" >													   </div>
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Contace Phone/Cell :</label>
																				  <div class="col-sm-7">
																						<input id="m_mobile" name="m_mobile" class="form-control" type="text"  placeholder="Enter Mobile Number"  value="<?php echo $stuParentsInfo->m_mobile; ?>">																			  </div>
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Contact E-mail :</label>
																				  <div class="col-sm-7">
																						<input id="m_email" name="m_email" class="form-control" type="text"  placeholder="Enter Email" value="<?php echo $stuParentsInfo->m_email; ?>" >																			  </div>
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Passport No :</label>
																				  <div class="col-sm-7">
																						<input id="m_passport_no" name="m_passport_no" class="form-control" type="text"  placeholder="Enter Passport No" value="<?php echo $stuParentsInfo->m_passport_no; ?>" >														  </div>
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">National ID :</label>
																				  <div class="col-sm-7">
																						<input id="m_nid" name="m_nid" class="form-control" type="text"  placeholder="Enter NID"  value="<?php echo $stuParentsInfo->m_nid; ?>">																			  </div>
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Driving Licence  :</label>
																				  <div class="col-sm-7">
																						<input id="m_driving_licence" name="m_driving_licence" class="form-control" type="text"  placeholder="Enter Driving Licence" value="<?php echo $stuParentsInfo->m_driving_licence; ?>" >										  </div>
																				</div>
																				
																				<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Mother's Photo  :</label>
																			  <div class="col-sm-7">
																			     <div class="attachmentbody" data-type="mother_photo" data-target="#mother_photo">
																					<img class="upload " src="<?php echo base_url('resource/img/no_image.png'); ?>">
																				 </div>
																				 <input id="mother_photo" type="hidden" value="" name="mother_photo">
																				 <?php if(!empty($stuParentsInfo->mother_photo)){ ?>
																				 <div class="attachmentbody">
																				     <img src="<?php echo base_url("resource/parents_gardian_photo/$stuParentsInfo->mother_photo"); ?>"> 
																				 </div>
																				  <?php } ?>
																			  </div>
																			</div>
																				
																			</div>
																			
																			
																		 <div class="col-md-12 img-thumbnail">
																				<h4>Guardian Details Information </h4>
																				 <div class="col-md-6">
																					 <div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Name  :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<input id="g_name" name="g_name" class="form-control" type="text"  placeholder="Enter Name" value="<?php echo $stuParentsInfo->g_name; ?>" >																	   		
																							</div>
																					 </div>
																						
																					<div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Present Address  :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<input id="g_pre_adrs" name="g_pre_adrs" class="form-control" type="text"  placeholder="Enter Present Address" value="<?php echo $stuParentsInfo->g_pre_adrs; ?>" >																	   		
																							</div>
																					</div>
																					
																					<div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Permanent Address :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<input id="g_per_adrs" name="g_per_adrs" class="form-control" type="text"  placeholder="Enter Permanent Address" value="<?php echo $stuParentsInfo->g_per_adrs; ?>" >																	   		
																							</div>
																					</div>
																					
																					<div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Occupation :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<input id="g_occupation" name="g_occupation" class="form-control" type="text"  placeholder="Enter Occupation" value="<?php echo $stuParentsInfo->g_occupation; ?>" >																	   		
																							</div>
																					</div>	
																				  </div>
																				 
																				 <div class="col-md-6">
																					 <div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Occupation Address :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<input id="g_occupation_adrs" name="g_occupation_adrs" class="form-control" type="text"  placeholder="Enter Occupation Address" value="<?php echo $stuParentsInfo->g_occupation_adrs; ?>" >																	   		
																							</div>
																					</div>
																					
																					 <div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Contact Phone/Cell :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<input id="g_mobile" name="g_mobile" class="form-control" type="text"  placeholder="Enter Contact Phone/Cell " value="<?php echo $stuParentsInfo->g_mobile; ?>" >																	   		
																							</div>
																					</div>
																					
																					 <div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Contact Email :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<input id="g_email" name="g_email" class="form-control" type="text"  placeholder="Enter Contact Email" value="<?php echo $stuParentsInfo->g_email; ?>" >																	   		
																							</div>
																					</div>
																					
																					
																					 <div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Passport No :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<input id="g_passport_no" name="g_passport_no" class="form-control" type="text"  placeholder="Enter Passport No" value="<?php echo $stuParentsInfo->g_passport_no; ?>" >																	   		
																							</div>
																					</div>
																					
																					 <div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">National ID :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<input id="g_nid" name="g_nid" class="form-control" type="text"  placeholder="Enter National ID" value="<?php echo $stuParentsInfo->g_nid; ?>" >																	   		
																							</div>
																					</div>
																					
																					 <div class="form-group">
																					  <label class="control-label col-sm-5" for="guardian_photo">Guardian's Photo  :</label>
																					  <div class="col-sm-7">
																						 <div class="attachmentbody" data-type="guardian_photo" data-target="#guardian_photo">
																							<img class="upload " src="<?php echo base_url('resource/img/no_image.png'); ?>">
																						 </div>
																						 <input id="guardian_photo" type="hidden" value="" name="guardian_photo">
																						 <?php if(!empty($stuParentsInfo->guardian_photo)){?>
																						 <div class="attachmentbody">
																							 <img src="<?php echo base_url("resource/parents_gardian_photo/$stuParentsInfo->guardian_photo"); ?>"> 
																						 </div>
																						  <?php } ?>
																					  </div>
																					</div>
																					
																				 </div>
																		</div>	
																				
																		</div>
																	</div>
																	
																	  <div class="modal-footer">
																	  	
																		<button class="btn btn-sm btn-danger formCancel" type="button">
																			<i class="ace-icon fa fa-times"></i>
																			Cancel
																		</button>
																		<button class="btn btn-sm btn-primary" type="submit">
																			<i class="ace-icon fa fa-check"></i>
																			Update
																		</button>
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
				
	  <?php $this->load->view('common/footer'); ?>
				
	</body>
</html>



<script type="text/javascript" >
$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd',
})

$('.add_new').on('click', function() {
	$('.add_new').fadeOut("slow");
	$('.addFormContent').fadeIn("slow");
});

$('.formCancel').on('click', function() {
	$('.addFormContent').fadeOut('slow');
	$('.add_new').fadeIn('slow');
});


$("#addForm").submit(function(e)
{
	var postData = $(this).serializeArray();
	var formURL = $(this).attr("action");
	$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
				//console.log(data);
				location.reload();
			}
		  });
	
	e.preventDefault();
});


$('.tryAgain').on('click', function() {
	$('#addForm').fadeIn("slow");
	$('.afterSubmitContent').fadeOut('slow');
});

</script>

	