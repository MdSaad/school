
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
							<a href="<?php echo site_url('admissionModule'); ?>">Admission</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('stuParentsInfo'); ?>">Student Parents Information</a>&nbsp;&nbsp;
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
																  <input type="hidden" class="form-control" name="update_id" id="update_id"  value=""/>
																	<div class="row">
																		<div class="form-group" style="padding-top:10px">
																			  <label class="control-label col-sm-4"><strong>Student ID  :</strong></label>
																			  <div class="col-sm-5">
																				  <input name="stuCurrentID" id="stuCurrentID" class="form-control" type="text" placeholder="Enter Student ID" required>
																			  </div>
																				 <div class="col-sm-3 stuImgView"></div>																			  
																			  </div>
																			 
																			  
																			</div>
																		<div class="col-md-12">
																		 <div class="col-md-6 img-thumbnail">
																		 	<h4>Father's Details Information </h4>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Father's Name  :</label>
																			  <div class="col-sm-7">
																					<input id="f_name" name="f_name" class="form-control" type="text"  placeholder="Enter Father Name" >																			  </div>
																			</div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Present Address :</label>
																			  <div class="col-sm-7">
																					<input id="f_pre_adrs" name="f_pre_adrs" class="form-control" type="text"  placeholder="Enter Present Address" >																			 
																				</div>
																			</div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Permanent Address   :</label>
																			  <div class="col-sm-7">
																					<input id="f_per_adrs" name="f_per_adrs" class="form-control" type="text"  placeholder="Enter Permanent Address" >														  </div>
																			</div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Occupation :</label>
																			  <div class="col-sm-7">
																					<input id="f_occupation" name="f_occupation" class="form-control" type="text"  placeholder="Enter Occupation" >													  </div>
																			</div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Occupation Address :</label>
																			  <div class="col-sm-7">
																					<input id="f_occupation_adrs" name="f_occupation_adrs" class="form-control" type="text"  placeholder="Enter Occupation Address" >									   </div>
																			</div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Yearly Income :</label>
																			  <div class="col-sm-7">
																					<input id="f_yearly_income" name="f_yearly_income" class="form-control" type="text"  placeholder="Enter Yearly Income" >													   </div>
																			</div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Contact Phone/Cell :</label>
																			  <div class="col-sm-7">
																					<input id="f_mobile" name="f_mobile" class="form-control" type="text"  placeholder="Enter Mobile Number" >																			  </div>
																			</div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Contact E-mail :</label>
																			  <div class="col-sm-7">
																					<input id="f_email" name="f_email" class="form-control" type="text"  placeholder="Enter Email" >																			  </div>
																			</div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Passport No :</label>
																			  <div class="col-sm-7">
																					<input id="f_passport_no" name="f_passport_no" class="form-control" type="text"  placeholder="Enter Passport No" >														  </div>
																			</div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">National ID :</label>
																			  <div class="col-sm-7">
																					<input id="f_nid" name="f_nid" class="form-control" type="text"  placeholder="Enter NID" >																			  </div>
																			</div>
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Driving Licence  :</label>
																			  <div class="col-sm-7">
																					<input id="f_driving_licence" name="f_driving_licence" class="form-control" type="text"  placeholder="Enter Driving Licence" >										  </div>
																			</div>
																			
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Father's Photo  :</label>
																			  <div class="col-sm-7">
																			     <div class="attachmentbody" data-type="father_photo" data-target="#father_photo">
																					<img class="upload " src="<?php echo base_url('resource/img/no_image.png'); ?>">
																				 </div>
																				 <input id="father_photo" type="hidden" value="" name="father_photo">
																			  </div>
																			</div>
																			
																			
																			
																			
																			
																		 </div>
																		 
																		 <div class="col-md-6 img-thumbnail">
																				<h4>Mother's Details Information </h4>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Mother's Name  :</label>
																				  <div class="col-sm-7">
																						<input id="m_name" name="m_name" class="form-control" type="text"  placeholder="Enter Mother Name" >																			  </div>
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Present Address :</label>
																				  <div class="col-sm-7">
																						<input id="m_pre_adrs" name="m_pre_adrs" class="form-control" type="text"  placeholder="Enter Present Address" >																			 
																					</div>
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Permanent Address   :</label>
																				  <div class="col-sm-7">
																						<input id="m_per_adrs" name="m_per_adrs" class="form-control" type="text"  placeholder="Enter Permanent Address" >														  </div>
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Occupation :</label>
																				  <div class="col-sm-7">
																						<input id="m_occupation" name="m_occupation" class="form-control" type="text"  placeholder="Enter Occupation" >													  </div>
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Occupation Address :</label>
																				  <div class="col-sm-7">
																						<input id="m_occupation_adrs" name="m_occupation_adrs" class="form-control" type="text"  placeholder="Enter Occupation Address" >									   </div>
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Yearly Income :</label>
																				  <div class="col-sm-7">
																						<input id="m_yearly_income" name="m_yearly_income" class="form-control" type="text"  placeholder="Enter Yearly Income" >													   </div>
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Contace Phone/Cell :</label>
																				  <div class="col-sm-7">
																						<input id="m_mobile" name="m_mobile" class="form-control" type="text"  placeholder="Enter Mobile Number" >																			  </div>
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Contact E-mail :</label>
																				  <div class="col-sm-7">
																						<input id="m_email" name="m_email" class="form-control" type="text"  placeholder="Enter Email" >																			  </div>
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Passport No :</label>
																				  <div class="col-sm-7">
																						<input id="m_passport_no" name="m_passport_no" class="form-control" type="text"  placeholder="Enter Passport No" >														  </div>
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">National ID :</label>
																				  <div class="col-sm-7">
																						<input id="m_nid" name="m_nid" class="form-control" type="text"  placeholder="Enter NID" >																			  </div>
																				</div>
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="email">Driving Licence  :</label>
																				  <div class="col-sm-7">
																						<input id="m_driving_licence" name="m_driving_licence" class="form-control" type="text"  placeholder="Enter Driving Licence" >										  </div>
																				</div>
																				
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="email">Mother's Photo  :</label>
																			  <div class="col-sm-7">
																				 <div class="attachmentbody" data-type="mother_photo" data-target="#mother_photo">
																					<img class="upload " src="<?php echo base_url('resource/img/no_image.png'); ?>">
																				 </div>
																				 <input id="mother_photo" type="hidden" value="" name="mother_photo">
																			  </div>
																			</div>
																			
																				
																			</div>
																			
																			
																		 <div class="col-md-12 img-thumbnail">
																				<h4>Guardian Details Information </h4>
																				 <div class="col-md-6">
																					 <div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Name  :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<input id="g_name" name="g_name" class="form-control" type="text"  placeholder="Enter Name" >																	   		
																							</div>
																					 </div>
																						
																					<div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Present Address  :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<input id="g_pre_adrs" name="g_pre_adrs" class="form-control" type="text"  placeholder="Enter Present Address" >																	   		
																							</div>
																					</div>
																					
																					<div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Permanent Address :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<input id="g_per_adrs" name="g_per_adrs" class="form-control" type="text"  placeholder="Enter Permanent Address" >																	   		
																							</div>
																					</div>
																					
																					<div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Occupation :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<input id="g_occupation" name="g_occupation" class="form-control" type="text"  placeholder="Enter Occupation" >																	   		
																							</div>
																					</div>	
																				  </div>
																				 
																				 <div class="col-md-6">
																					 <div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Occupation Address :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<input id="g_occupation_adrs" name="g_occupation_adrs" class="form-control" type="text"  placeholder="Enter Occupation Address" >																	   		
																							</div>
																					</div>
																					
																					 <div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Contact Phone/Cell :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<input id="g_mobile" name="g_mobile" class="form-control" type="text"  placeholder="Enter Contact Phone/Cell " >																	   		
																							</div>
																					</div>
																					
																					 <div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Contact Email :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<input id="g_email" name="g_email" class="form-control" type="text"  placeholder="Enter Contact Email" >																	   		
																							</div>
																					</div>
																					
																					
																					 <div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">Passport No :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<input id="g_passport_no" name="g_passport_no" class="form-control" type="text"  placeholder="Enter Passport No" >																	   		
																							</div>
																					</div>
																					
																					 <div class="form-group">
																						  <label class="control-label col-sm-5 " for="email">National ID :</label>
																						  <div class="col-sm-7 paddingZero">
																						 		<input id="g_nid" name="g_nid" class="form-control" type="text"  placeholder="Enter National ID" >																	   		
																							</div>
																					</div>
																					
																					<div class="form-group">
																					  <label class="control-label col-sm-5" for="guardian_photo">Guardian's Photo  :</label>
																					  <div class="col-sm-7">
																						 <div class="attachmentbody" data-type="guardian_photo" data-target="#guardian_photo">
																							<img class="upload " src="<?php echo base_url('resource/img/no_image.png'); ?>">
																						 </div>
																						 <input id="guardian_photo" type="hidden" value="" name="guardian_photo">
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
																			<span class="update">Submit</span>
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
																<span class="alrtText">Student Parents Info Added Successfully. Try Again Click <strong class="btn-danger tryAgain">Here</strong></span>
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
	var successUrl = '<?php echo site_url('stuParentsInfo'); ?>';
	$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
				$('#addForm').css('display', 'none');
				$('.afterSubmitContent').css('display', 'block');
				$(".stuImgView").html('');
				
				$.each($('.attachmentbody'), function(i, attachment) {
					attachment = $(attachment).html('<img class="upload" src="'+SAWEB.getBaseAction('resource/img/no_image.png')+'" />');
					reInitiateFileUpload(attachment);                        
				});
			}
		  });
	
	e.preventDefault();
});



$("#stuCurrentID").blur(function(e)
{
	var stuId 	= $(this).val();
	var formURL = '<?php echo site_url('stuParentsInfo/stuWiseImageView'); ?>';
	
	if(stuId !=''){
		$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {stuId : stuId},
				dataType : "html",
				success:function(data){
					$(".stuImgView").html(data);
				}
		  });
	 } else {
	    $(".stuImgView").html('');
	 }
	
	e.preventDefault();
});


 $(document).on("blur", "#stuCurrentID", function(e)
	{
		var stuCurrentID = $(this).val();
		var formURL = "<?php echo site_url('stuParentsInfo/parrentsInfoChk'); ?>";
		
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : {stuCurrentID: stuCurrentID},
			dataType: "json",
			success:function(data){
				//$('#id').val(data.id);
				$('#f_name').val(data.f_name);
				//$('#status').val(data.status);
				//$('.update').text("Update");
			}
		});
		
		e.preventDefault();
	});


$('.tryAgain').on('click', function() {
	$('#addForm').fadeIn("slow");
	$('.afterSubmitContent').fadeOut('slow');
});

</script>

	