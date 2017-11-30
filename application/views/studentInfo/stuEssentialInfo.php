
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
							<a href="<?php echo site_url('admissionModule'); ?>">Admission</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('admissionModule/stuEssentialInfo'); ?>">Student Essential Information</a>&nbsp;&nbsp;
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
											<h4 class="widget-title">Student Essential Information Manage </h4>
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
											<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('admissionModule/stuEssentialInfoStore'); ?>" enctype="multipart/form-data" method="post">
												<div class="scroll-content">
															<div class="content img-thumbnail container">
																  <input type="hidden" class="form-control" name="stuAutoID" id="stuAutoID"  value=""/>
																	<div class="col-md-12 img-thumbnail stuIDPart">
																			<div class="form-group">
																			  <label class="control-label col-sm-4"><strong>Student ID  :</strong></label>
																			 	    <div class="col-sm-4">
																						<input name="stuCurrentID" id="stuCurrentID" class="form-control" type="text" placeholder="Enter Student ID" required="required"> <span class="label label-sm label-danger form-control emptyAlrt"></span>
																					</div>
																					<div class="col-sm-4 text-left">
																						<button class="btn btn-sm btn-primary findSubmit " type="button">
																							Submit
																							</button>
																					</div>																			  
																			  </div>
																			 
																			</div>
																		<div class="col-md-12   text-left formPart hiddenForm">
																		 <table width="100%" border="0" class="table-responsive">
																					
																				
																				  <tr>
																					<td width="">&nbsp;</td>
																					<td width="">&nbsp;</td>
																					<td width=""><strong>PAPERS/DOCUMENTS </strong></td>
																					<td width="">&nbsp;</td>
																					<td width="">&nbsp;</td>
																					<td width=""><strong>PAPERS/DOCUMENTS </strong></td>
																				</tr> 
																				  <tr>
																				    <td>&nbsp;</td>
																				    <td>&nbsp;</td>
																				    <td>&nbsp;</td>
																				    <td>&nbsp;</td>
																				    <td>&nbsp;</td>
																				    <td>&nbsp;</td>
																	       </tr>
																				  <tr>
																					<td>R</td>
																					<td>
																					  <i class="glyphicon glyphicon-ok recpic displayNone"></i>
																						<label class="pos-rel recvPicChk">
																									<input type="checkbox" class="ace" id="rcv_picture" name="rcv_paper[]" value="Picture"/>
																						<span class="lbl"></span></label>
																					</td>
																					<td>&nbsp;Picture</td>
																					<td>D</td>
																					<td>
																					<i class="glyphicon glyphicon-ok delpic displayNone"></i>
																					<label class="pos-rel delPicChk">
                                                                                      <input type="checkbox" class="ace" id="delivery_picture" name="delivery_paper[]" value="Picture"/>
                                                                                      <span class="lbl"></span></label></td>
																					<td>&nbsp;Picture</td>
																				  </tr>
																				  <tr>
																					<td>E</td>
																					<td>
																					<i class="glyphicon glyphicon-ok recvTest displayNone"></i>
																					<label class="pos-rel recvTestChk">
																									<input type="checkbox" class="ace" id="rcv_testmonial" name="rcv_paper[]" value="Testmonial"/>
																					<span class="lbl"></span></label></td>
																					<td>&nbsp;Testimonial</td>
																					<td>E</td>
																					<td>
																					<i class="glyphicon glyphicon-ok delTest displayNone"></i>
																					<label class="pos-rel delTestChk">
                                                                                      <input type="checkbox" class="ace" id="delivery_testmonial" name="delivery_paper[]" value="Testmonial"/>
                                                                                      <span class="lbl"></span></label></td>
																					<td>&nbsp;Testimonial</td>
																				  </tr>
																				  <tr>
																					<td>C</td>
																					<td>
																					<i class="glyphicon glyphicon-ok recvCer displayNone"></i>
																					<label class="pos-rel recvCerChk">
																									<input type="checkbox" class="ace" id="rcv_certificate" name="rcv_paper[]" value="Certificate"/>
																					<span class="lbl"></span></label></td>
																					<td>&nbsp;Certificate</td>
																					<td>L</td>
																					<td>
																					<i class="glyphicon glyphicon-ok delCer displayNone"></i>
																					<label class="pos-rel delCerChk">
                                                                                      <input type="checkbox" class="ace" id="delivery_certificate" name="delivery_paper[]" value="Certificate"/>
                                                                                      <span class="lbl"></span></label></td>
																					<td>&nbsp;Certificate</td>
																				  </tr>
																				  <tr>
																					<td>E</td>
																					<td>
																					<i class="glyphicon glyphicon-ok recTrans displayNone"></i>
																					<label class="pos-rel recTransChk">
																									<input type="checkbox" class="ace" id="rcv_transcript" name="rcv_paper[]" value="Transcript"/>
																					<span class="lbl"></span></label></td>
																					<td>&nbsp;Transcript</td>
																					<td>I</td>
																					<td>
																					<i class="glyphicon glyphicon-ok delTrans displayNone"></i>
																					<label class="pos-rel delTransChk">
                                                                                      <input type="checkbox" class="ace" id="delivery_transcript" name="delivery_paper[]" value="Transcript"/>
                                                                                      <span class="lbl"></span></label></td>
																					<td>&nbsp;Transcript</td>
																				  </tr>
																				  <tr>
																					<td>V</td>
																					<td>
																					<i class="glyphicon glyphicon-ok recvPasport displayNone"></i>
																					<label class="pos-rel recvPasportChk">
																									<input type="checkbox" class="ace" id="rcv_passport_copy" name="rcv_paper[]" value="Passport_Copy"/>
																					<span class="lbl"></span></label></td>
																					<td>&nbsp;Passport Copy</td>
																					<td>V</td>
																					<td>
																					<i class="glyphicon glyphicon-ok delPassport displayNone"></i>
																					<label class="pos-rel delPassportChk">
                                                                                      <input type="checkbox" class="ace" id="delivery_passport_copy" name="delivery_paper[]" value="Passport_Copy"/>
                                                                                      <span class="lbl"></span></label></td>
																					<td>&nbsp;Passport Copy</td>
																				  </tr>
																				  <tr>
																					<td>E</td>
																					<td>
																					<i class="glyphicon glyphicon-ok recvBirth displayNone"></i>
																					<label class="pos-rel recvBirthChk">
																									<input type="checkbox" class="ace" id="rcv_birth_cer" name="rcv_paper[]" value="Birth_Certificate"/>
																					<span class="lbl"></span></label></td>
																					<td>&nbsp;Birth Certificate</td>
																					<td>E</td>
																					<td>
																					<i class="glyphicon glyphicon-ok delBirth displayNone"></i>
																					<label class="pos-rel delBirthChk">
                                                                                      <input type="checkbox" class="ace" id="delivery_birth_cer" name="delivery_paper[]" value="Birth_Certificate"/>
                                                                                      <span class="lbl"></span></label></td>
																					<td>&nbsp;Birth Certificate</td>
																				  </tr>
																				  <tr>
																					<td>R</td>
																					<td>
																					<i class="glyphicon glyphicon-ok recvNational displayNone"></i>
																					<label class="pos-rel recvNationalChk">
																									<input type="checkbox" class="ace" id="rcv_national_id" name="rcv_paper[]" value="National_ID"/>
																					<span class="lbl"></span></label></td>
																					<td>&nbsp;National ID</td>
																					<td>R</td>
																					<td>
																					<i class="glyphicon glyphicon-ok delNational displayNone"></i>
																					<label class="pos-rel delNationalChk">
                                                                                      <input type="checkbox" class="ace" id="delivery_national_id" name="delivery_paper[]" value="National_ID"/>
                                                                                      <span class="lbl"></span></label></td>
																					<td>&nbsp;National ID</td>
																			  </tr>
																			  <tr>
																				<td>&nbsp;</td>
																				<td>
																				<i class="glyphicon glyphicon-ok recvSocial displayNone"></i>
																				<label class="pos-rel recvSocialChk">
																									<input type="checkbox" class="ace" id="rcv_social_security_card" name="rcv_paper[]" value="Social_Security_Card"/>
																					<span class="lbl"></span></label></td>
																				<td>&nbsp;Social Security Card</td>
																				<td>Y</td>
																				<td>
																				<i class="glyphicon glyphicon-ok delSocial displayNone"></i>
																				<label class="pos-rel delSocialChk">
                                                                                  <input type="checkbox" class="ace" id="delivery_social_security_card" name="delivery_paper[]" value="Social_Security_Card"/>
                                                                                  <span class="lbl"></span></label></td>
																				<td>&nbsp;Social Security Card</td>
																			  </tr>
																			  <tr>
																				<td>&nbsp;</td>
																				<td>&nbsp;</td>
																				<td>&nbsp;</td>
																				<td>&nbsp;</td>
																				<td>&nbsp;</td>
																				<td>&nbsp;</td>
																			  </tr>
																			  <tr>
																				<td>&nbsp;</td>
																				<td>&nbsp;</td>
																				<td><input class="form-control date-picker" name="recieved_date" id="recieved_date" placeholder ="Enter Recived Date" /></td>
																				<td>&nbsp;</td>
																				<td>&nbsp;</td>
																				<td><input class="form-control date-picker" name="delivery_date" id="delivery_date" placeholder="Enter Delivery Date" /></td>
																			  </tr>
																			  
																			  <tr>
																				<td>&nbsp;</td>
																				<td>&nbsp;</td>
																				<td>&nbsp;</td>
																				<td>&nbsp;</td>
																				<td>&nbsp;</td>
																				<td>&nbsp;</td>
																			  </tr>
																			</table>
																		</div>
																	</div>
																	
																	  <div class="modal-footer" style="display:none">
																	  	
																		<button class="btn btn-sm btn-danger formCancel" type="button">
																			<i class="ace-icon fa fa-times"></i>
																			Cancel
																		</button>
																		<button class="btn btn-sm btn-primary" type="submit">
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
																<span class="alrtText">Student Assential Info Added Successfully. Try Again Click <strong class="btn-danger tryAgain">Here</strong></span>
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
		format: 'yyyy/mm/dd',
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
	//var stuCurrentID =$('#stuCurrentID').val();
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
	
	e.preventDefault();
});


$('.tryAgain').on('click', function() {
	$('#addForm').fadeIn("slow");
	$('.afterSubmitContent').fadeOut('slow');
	$('.hiddenForm').fadeOut('slow');
	$('input:checkbox').removeAttr('checked');
	$('input:text').removeAttr('readonly');
	$('.findSubmit ').removeAttr('disabled');
	$("#addForm input[type='text'], input[type='hidden'], input[type='number'], input[type='email']").val("");
	$("#addForm option:selected").prop("selected", false);
});



$('.findSubmit').on("click", function(e)
	{
		
		var stuCurrentID 		= $('#stuCurrentID').val();
		var formURL = "<?php echo site_url('admissionModule/stuEssentialInfoSubmit'); ?>";
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : {stuCurrentID: stuCurrentID},
			dataType: "json",
			success:function(data){
				
				if(data == 0 ) {
					$('.emptyAlrt').text('Sorry This ID is Not Exist');
				} else {
					$('.formPart').css('display', 'block');
					$('.modal-footer').css('display', 'block');
					$('#stuCurrentID').attr('readonly', 'readonly');
					$('.findSubmit ').attr('disabled', 'disabled');
					$('#stuAutoID').val(data.stu_auto_id);
					$('#recieved_date').val('');
					$('#delivery_date').val('');
						$.each(data.recvEssentInfo, function(key, value){
						var rcvPaper =(value.paper);
						
						if(rcvPaper == 'Picture'){
							$('.recvPicChk').css('display', 'none');
							$('.recpic').css('display', 'block');
							
						} 
						
						if(rcvPaper == 'Testmonial'){
						    $('.recvTestChk').css('display', 'none');
							$('.recvTest').css('display', 'block');
						}
						
						if(rcvPaper == 'Certificate'){
						    $('.recvCerChk').css('display', 'none');
							$('.recvCer').css('display', 'block');
						}
						
						if(rcvPaper == 'Transcript'){
						    $('.recTransChk').css('display', 'none');
							$('.recTrans').css('display', 'block');
						}
						
						if(rcvPaper == 'Passport_Copy'){
						    $('.recvPasportChk').css('display', 'none');
							$('.recvPasport').css('display', 'block');
						} 
						
						if(rcvPaper == 'Birth_Certificate'){
						    $('.recvBirthChk').css('display', 'none');
							$('.recvBirth').css('display', 'block');
						} 
						
						if(rcvPaper == 'National_ID'){
						    $('.recvNational').css('display', 'none');
							$('.recvNational').css('display', 'block');
						} 
						if(rcvPaper == 'Social_Security_Card'){
						    $('.recvSocialChk').css('display', 'none');
							$('.recvSocial').css('display', 'block');
						} 				
						
					});
					
					 $.each(data.deliveryEssentInfo, function(key, value){
						var deliveryPaper =(value.paper);
						console.log(deliveryPaper);
						
						if(deliveryPaper == 'Picture'){
						    $('.delPicChk').css('display', 'none');
							$('.delpic').css('display', 'block');
						}
						
						if(deliveryPaper == 'Testmonial'){
						    $('.delTestChk').css('display', 'none');
							$('.delTest').css('display', 'block');
						}
						
						if(deliveryPaper == 'Certificate'){
						    $('.delCerChk').css('display', 'none');
							$('.delCer').css('display', 'block'); 
						} 
						
						if(deliveryPaper == 'Transcript'){
							$('.delTransChk').css('display', 'none');
							$('.delTrans').css('display', 'block');  
						}
						
						if(deliveryPaper == 'Passport_Copy'){
						    $('.delPassportChk').css('display', 'none');
							$('.delPassport').css('display', 'block');
						}
						
						if(deliveryPaper == 'Birth_Certificate'){
						    $('.delBirthChk').css('display', 'none');
							$('.delBirth').css('display', 'block');
						}
						
						if(deliveryPaper == 'National_ID'){
						    $('.delNationalChk').css('display', 'none');
							$('.delNational').css('display', 'block');
						}
						
						if(deliveryPaper == 'Social_Security_Card'){
						    $('.delSocialChk').css('display', 'none');
							$('.delSocial').css('display', 'block');
						}					
						
					});
					
					$('.emptyAlrt').text('');
				 }
				
				
			}
		});
		
		e.preventDefault();
	});

</script>

	