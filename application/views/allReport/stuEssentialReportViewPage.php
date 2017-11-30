<!DOCTYPE html>
<html lang="en">
<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $title; ?></title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<script type="text/javascript" language="javascript" src="<?php echo site_url('adapter/javascript'); ?>"></script>
</head>
	<body>
			<div class="container">
				<div class="">
					<div class="aFourSize">
            			<?php $this->load->view('common/reportHeader'); ?>
						
						<h4 class="text-center"><u>Student Essential Report</u></h4>
						<?php if(!empty($studentDetails)) {  ?>
						
						<table id="dynamic-table" class="table table-striped table-bordered ">

								<tbody>
									<tr>
									  <td align="left" valign="middle" class="text-center">
									  <table width="100%" border="0">
                                        <tr>
                                          <td width="32%" align="left" valign="middle"><strong>Branch : </strong><?php echo $studentDetails->branch_name ?></td>
                                          <td width="33%" align="left" valign="middle"><strong>Name : </strong> <?php echo $studentDetails->stu_full_name ?></td>
                                          <td width="25%" align="left" valign="middle"><strong>ID : </strong><?php echo $studentDetails->stu_id ?></td>
										  <td width="6%" rowspan="2" align="left" valign="top"> 
										     <?php if(!empty($studentDetails->stu_photo)){ ?>
													   <img src="<?php echo base_url("resource/stu_photo/$studentDetails->stu_photo") ?>" width="50" height="50" />
													 <?php } else {  if($studentDetails->stu_sex == 'M'){ ?>
														 <img src="<?php echo base_url('resource/img/male.png'); ?>" width="50" height="50">  
													 <?php } else {  ?>
													 <img src="<?php echo base_url('resource/img/EmptyProfile.png'); ?>" width="50" height="50">  
											<?php } } ?>										</td>
                                        </tr>
                                        <tr>
                                          <td align="left" valign="middle"><strong>Class : </strong> <?php echo $studentDetails->class_name ?></td>
                                          <td align="left" valign="middle"><strong>Class Roll  : </strong> <?php echo $studentDetails->class_roll ?></td>
                                          <td align="left" valign="middle"><strong>Section : </strong> <?php echo $studentDetails->section_name ?></td>
									    </tr>
                                        <tr>
                                          <td align="left" valign="middle"><strong>Shift :</strong> <?php echo $studentDetails->shift_name; ?></td>
                                          <td align="left" valign="middle"><strong>Year :</strong> <?php echo $studentDetails->year; ?></td>
                                          <td align="left" valign="middle">&nbsp;</td>
                                          <td align="left" valign="middle">&nbsp;</td>
                                        </tr>
                                      </table></td>
								  </tr>
									

									<tr>
									    <td align="center" valign="middle" class="text-left">
										   <table width="100%" border="0" class="table-responsive">
																					
																				
												  <tr>
													<td width="15%">&nbsp;</td>
													<td colspan="2"><strong>PAPERS/DOCUMENTS </strong></td>
													<td width="3%">&nbsp;</td>
													<td colspan="2"><strong>PAPERS/DOCUMENTS </strong></td>
												</tr> 
												  <tr>
													<td>&nbsp;</td>
													<td colspan="2">&nbsp;</td>
													<td>&nbsp;</td>
													<td colspan="2">&nbsp;</td>
										   </tr>
												  <tr>
													<td align="right" valign="middle">R &nbsp;&nbsp;</td>
													<td width="2%">
														<label class="pos-rel recvPicChk">
																	<input type="checkbox" class="ace" id="rcv_picture" name="rcv_paper[]" value="Picture" <?php if(in_array("Picture", $receivePaperArray)) echo 'checked'; ?> />
														<span class="lbl"></span></label>																					</td>
													<td width="30%">&nbsp;Picture</td>
													<td align="right" valign="middle">D &nbsp;&nbsp;</td>
													<td width="2%">
													
													<label class="pos-rel delPicChk">
													  <input type="checkbox" class="ace" id="delivery_picture" name="delivery_paper[]" value="Picture" <?php if(in_array("Picture", $delPaperArray)) echo 'checked'; ?> />
													  <span class="lbl"></span></label></td>
													<td width="41%">&nbsp;Picture</td>
												  </tr>
												  <tr>
													<td align="right" valign="middle">E &nbsp;&nbsp;</td>
													<td>
													
													<label class="pos-rel recvTestChk">
																	<input type="checkbox" class="ace" id="rcv_testmonial" name="rcv_paper[]" value="Testmonial" <?php if(in_array("Testmonial", $receivePaperArray)) echo 'checked'; ?>/>
													<span class="lbl"></span></label></td>
													<td>&nbsp;Testimonial</td>
													<td align="right" valign="middle">E &nbsp;&nbsp;</td>
													<td>
													
													<label class="pos-rel delTestChk">
													  <input type="checkbox" class="ace" id="delivery_testmonial" name="delivery_paper[]" value="Testmonial" <?php if(in_array("Testmonial", $delPaperArray)) echo 'checked'; ?> />
													  <span class="lbl"></span></label></td>
													<td>&nbsp;Testimonial</td>
												  </tr>
												  <tr>
													<td align="right" valign="middle">C &nbsp;&nbsp;</td>
													<td>
													
													<label class="pos-rel recvCerChk">
																	<input type="checkbox" class="ace" id="rcv_certificate" name="rcv_paper[]" value="Certificate" <?php if(in_array("Certificate", $receivePaperArray)) echo 'checked'; ?> />
													<span class="lbl"></span></label></td>
													<td>&nbsp;Certificate</td>
													<td align="right" valign="middle">L &nbsp;&nbsp;</td>
													<td>
													
													<label class="pos-rel delCerChk">
													  <input type="checkbox" class="ace" id="delivery_certificate" name="delivery_paper[]" value="Certificate" <?php if(in_array("Certificate", $delPaperArray)) echo 'checked'; ?> />
													  <span class="lbl"></span></label></td>
													<td>&nbsp;Certificate</td>
												  </tr>
												  <tr>
													<td align="right" valign="middle">E &nbsp;&nbsp;</td>
													<td>
													
													<label class="pos-rel recTransChk">
																	<input type="checkbox" class="ace" id="rcv_transcript" name="rcv_paper[]" value="Transcript" <?php if(in_array("Transcript", $receivePaperArray)) echo 'checked'; ?> />
													<span class="lbl"></span></label></td>
													<td>&nbsp;Transcript</td>
													<td align="right" valign="middle">I &nbsp;&nbsp;</td>
													<td>
													
													<label class="pos-rel delTransChk">
													  <input type="checkbox" class="ace" id="delivery_transcript" name="delivery_paper[]" value="Transcript" <?php if(in_array("Transcript", $delPaperArray)) echo 'checked'; ?> />
													  <span class="lbl"></span></label></td>
													<td>&nbsp;Transcript</td>
												  </tr>
												  <tr>
													<td align="right" valign="middle">V &nbsp;&nbsp;</td>
													<td>
													
													<label class="pos-rel recvPasportChk">
																	<input type="checkbox" class="ace" id="rcv_passport_copy" name="rcv_paper[]" value="Passport_Copy" <?php if(in_array("Passport_Copy", $receivePaperArray)) echo 'checked'; ?> />
													<span class="lbl"></span></label></td>
													<td>&nbsp;Passport Copy</td>
													<td align="right" valign="middle">V &nbsp;&nbsp;</td>
													<td>
													
													<label class="pos-rel delPassportChk">
													  <input type="checkbox" class="ace" id="delivery_passport_copy" name="delivery_paper[]" value="Passport_Copy" <?php if(in_array("Passport_Copy", $delPaperArray)) echo 'checked'; ?> />
													  <span class="lbl"></span></label></td>
													<td>&nbsp;Passport Copy</td>
												  </tr>
												  <tr>
													<td align="right" valign="middle">E &nbsp;&nbsp;</td>
													<td>
													
													<label class="pos-rel recvBirthChk">
																	<input type="checkbox" class="ace" id="rcv_birth_cer" name="rcv_paper[]" value="Birth_Certificate" <?php if(in_array("Birth_Certificate", $receivePaperArray)) echo 'checked'; ?> />
													<span class="lbl"></span></label></td>
													<td>&nbsp;Birth Certificate</td>
													<td align="right" valign="middle">E &nbsp;&nbsp;</td>
													<td>
													
													<label class="pos-rel delBirthChk">
													  <input type="checkbox" class="ace" id="delivery_birth_cer" name="delivery_paper[]" value="Birth_Certificate" <?php if(in_array("Birth_Certificate", $delPaperArray)) echo 'checked'; ?> />
													  <span class="lbl"></span></label></td>
													<td>&nbsp;Birth Certificate</td>
												  </tr>
												  <tr>
													<td align="right" valign="middle">R &nbsp;&nbsp;</td>
													<td>
													
													<label class="pos-rel recvNationalChk">
																	<input type="checkbox" class="ace" id="rcv_national_id" name="rcv_paper[]" value="National_ID" <?php if(in_array("National_ID", $receivePaperArray)) echo 'checked'; ?> />
													<span class="lbl"></span></label></td>
													<td>&nbsp;National ID</td>
													<td align="right" valign="middle">R &nbsp;&nbsp; </td>
													<td>
													
													<label class="pos-rel delNationalChk">
													  <input type="checkbox" class="ace" id="delivery_national_id" name="delivery_paper[]" value="National_ID" <?php if(in_array("National_ID", $delPaperArray)) echo 'checked'; ?> />
													  <span class="lbl"></span></label></td>
													<td>&nbsp;National ID</td>
											  </tr>
											  <tr>
												<td>&nbsp;</td>
												<td>
												
												<label class="pos-rel recvSocialChk">
																	<input type="checkbox" class="ace" id="rcv_social_security_card" name="rcv_paper[]" value="Social_Security_Card" <?php if(in_array("Social_Security_Card", $receivePaperArray)) echo 'checked'; ?> />
													<span class="lbl"></span></label></td>
												<td>&nbsp;Social Security Card</td>
												<td align="right" valign="middle">Y &nbsp;&nbsp;</td>
												<td>
												
												<label class="pos-rel delSocialChk">
												  <input type="checkbox" class="ace" id="delivery_social_security_card" name="delivery_paper[]" value="Social_Security_Card" <?php if(in_array("Social_Security_Card", $delPaperArray)) echo 'checked'; ?> />
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
										  </table>
											<br>
											 <table width="100%" border="0" class="table table-condensed  table-striped table-bordered">
											  <tr>
												<td align="center" valign="middle"><strong>Receive</strong></td>
												<td align="center" valign="middle"><strong>Delivery</strong></td>
											   </tr>
											  <tr>
												<td align="center" valign="middle">
												<table width="100%" border="0" class="table table-bordered">
                                                  <tr>
                                                    <td width="50%" align="center" valign="middle"><strong>Paper's Name </strong></td>
                                                    <td width="50%" align="center" valign="middle"><strong>Date</strong></td>
                                                  </tr>
												  <?php 
												     foreach($allRecevpaPerDetails as $v){
										           ?>
                                                  <tr>
                                                    <td align="center" valign="middle"><?php echo $v->paper ?></td>
                                                    <td align="center" valign="middle"><?php echo $v->recv_last_date ?></td>
                                                  </tr>
												  <?php } ?>
                                                </table></td>
												<td align="center" valign="middle">
												   <table width="100%" border="0" class="table table-bordered">
                                                  <tr>
                                                    <td width="50%" align="center" valign="middle"><strong>Paper's Name </strong></td>
                                                    <td width="50%" align="center" valign="middle"><strong>Date</strong></td>
                                                  </tr>
												  <?php 
												     foreach($allDelPaperDetails as $v){
										           ?>
                                                  <tr>
                                                    <td align="center" valign="middle"><?php echo $v->paper ?></td>
                                                    <td align="center" valign="middle"><?php echo $v->delivery_last_date ?></td>
                                                  </tr>
												  <?php } ?>
                                                </table>
												</td>
											   </tr>
										  </table>
													
									   </td>
									</tr>
									<tr>
									    <td align="center" valign="middle" class="text-right">
										 
                                              <a href="#" class="pull-right">Print</a>
										</td>
									</tr>
								</tbody>
					  </table>
					  
					 
					  <?php  } else { ?> 
					 <div class="alert alert-danger">
						<strong>Warning!</strong> Sorry System Could Not Find Anything. Please Check Information and Try Again!
					  </div>
		  			<?php } ?>
					  
					  
					
		  
			      </div>
				</div>
			</div>
	</body>		
            
	</html>
         <?php //$this->load->view('common/footer'); ?>
         <?php $this->load->view('common/jsLinkPage'); ?>
		 



