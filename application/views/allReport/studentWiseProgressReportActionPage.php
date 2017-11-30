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
						
						<h4 class="text-center"><u>Student Result Report</u></h4>
						
					  
					  <?php if(!empty($stuWiseSixToTenResultInfo)){ ?>
					  
					      <table id="dynamic-table" class="table table-striped table-bordered ">

								<tbody>
									<tr>
									  <td align="left" valign="middle" class="text-center">
									      <table width="100%" border="0">
                                        <tr>
                                          <td width="32%" align="left" valign="middle"><strong>Name &nbsp;: </strong><?php echo $studentDetails->stu_full_name ?></td>
                                          <td width="33%" align="left" valign="middle"><strong>ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong> <?php echo $studentDetails->stu_id ?></td>
                                          <td width="25%" align="left" valign="middle"><strong>Class &nbsp;: </strong><?php echo $studentDetails->class_name ?></td>
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
                                          <td align="left" valign="middle"><strong>Group : </strong> <?php echo $studentDetails->group_name ?></td>
                                          <td align="left" valign="middle"><strong>Section &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong> <?php echo $studentDetails->section_name ?></td>
                                          <td align="left" valign="middle"><strong>Shift &nbsp; &nbsp;: </strong> <?php echo $studentDetails->shift_name ?></td>
									    </tr>
                                        <tr>
                                          <td align="left" valign="middle"><strong>Year &nbsp;&nbsp;&nbsp;:</strong> <?php echo $studentDetails->year; ?></td>
                                          <td align="left" valign="middle"></td>
                                          <td align="left" valign="middle">&nbsp;</td>
                                          <td align="left" valign="middle">&nbsp;</td>
                                        </tr>
                                      </table>
									 </td>
								  </tr>
									

									<tr>
									    <td align="center" valign="middle" class="text-left">
										  
											<table width="100%" border="0" class="table table-condensed  table-bordered">
											  <tr style="background-color:#F9F9F9">
											    <td width="4%" rowspan="3" align="center" valign="middle" style="padding-top:30px"><strong>Sl No </strong></td>
												<td width="12%" rowspan="3" align="center" valign="middle" style="padding-top:30px"><strong>Subject</strong></td>
												<td colspan="6" align="center" valign="middle"><strong>Marks</strong></td>
												<td width="6%" rowspan="3" align="center" valign="middle"><strong> Annual<br> Total </strong></td>
												<td width="5%" rowspan="3" align="center" valign="middle"><strong> Half<br>Yearly <br> Total </strong></td>
												<td width="5%" rowspan="3" align="center" valign="middle"><strong>Total</strong></td>
												<td width="5%" rowspan="3" align="center" valign="middle"><strong>L<br>G</strong></td>
												<td width="6%" rowspan="3" align="center" valign="middle"><strong>G<br>P</strong></td>
											  </tr>
											  <tr style="background-color:#F9F9F9">
											    <td colspan="2" align="center" valign="middle"><strong>MCQ</strong></td>
											    <td colspan="2" align="center" valign="middle"><strong>Creative</strong></td>
											    <td colspan="2" align="center" valign="middle"><strong>CA/Prac</strong></td>
											  </tr>
											  <tr style="background-color:#F9F9F9">
											    <td width="5%" align="center" valign="middle"><strong>FM</strong></td>
											    <td width="5%" align="center" valign="middle"><strong>OM</strong></td>
											    <td width="7%" align="center" valign="middle"><strong>FM</strong></td>
											    <td width="8%" align="center" valign="middle"><strong>OM</strong></td>
											    <td width="7%" align="center" valign="middle"><strong>FM</strong></td>
												<td width="8%" align="center" valign="middle"><strong>OM</strong></td>
											  </tr>
											  <?php 
											      $slNo 		 = 1;
											      $countGpa  	 = 0;
												  $countSub  	 = 0;
												  $stuAnnualTotalMarks = 0;
												  $stuHalfTotalMarks = 0;
											      foreach($stuWiseSixToTenResultInfo as $v) {
												  $totalAnnualMarks    = $v->examWiseAnnualMcqObtain + $v->examWiseAnnualCreaObtain + $v->examWiseAnnualPracObtain;  
												  $totalAnnualFmMarks  = $v->examWiseMcqAnnualFmMarks + $v->examWiseCreaAnnualFmMarks + $v->examWisePracAnnualFmMarks;  
												  $stuAnnualTotalMarks += $totalAnnualMarks;
												  
												  
												  $totalHalfMarks    = $v->examWiseHalfMcqObtain + $v->examWiseHalfCreaObtain + $v->examWiseHalfPracObtain;  
												  $totalHalfFmMarks  = $v->examWiseMcqHalfFmMarks + $v->examWiseCreaHalfFmMarks + $v->examWisePracHalfFmMarks;  
												  $stuHalfTotalMarks += $totalHalfMarks;
												  
												  $totalAnnualPersentage = $totalAnnualMarks * 100/$totalAnnualFmMarks; 
												  $totalHalfPersentage   = $totalHalfMarks * 100/$totalHalfFmMarks;
												  
												  $totalPersetage        = $totalAnnualPersentage + $totalHalfPersentage; 
												  $gradePointPercentage  = $totalPersetage/2; 
												  	
											   ?> 
											
											    <tr>
											      <td align="center" valign="middle"><?php echo $slNo++ ?></td>
												<td><?php echo $v->subject_name ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseMcqAnnualFmMarks ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseAnnualMcqObtain ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseCreaAnnualFmMarks ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseAnnualCreaObtain ?></td>
												<td align="center" valign="middle"><?php echo $v->examWisePracAnnualFmMarks ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseAnnualPracObtain;  ?></td>
												<td align="center" valign="middle"><?php echo $totalAnnualMarks ?></td>
												<td align="center" valign="middle"><?php echo $totalHalfMarks ?> </td>
												<td align="center" valign="middle"><?php echo $totalAnnualMarks + $totalHalfMarks ?></td>
												<td align="center" valign="middle">
												   <?php 
												       
												        if(!empty($gradePointPercentage)){ 
													      if($gradePointPercentage <= 100 && $gradePointPercentage > 0){
															  if($gradePointPercentage >=80 && $gradePointPercentage <= 100){ echo $getGpa = "A+"; 		
															  }else if($gradePointPercentage >=70 && $gradePointPercentage < 80){ echo $getGpa = "A"; 	
															  }else if($gradePointPercentage >=60 && $gradePointPercentage < 70){ echo $getGpa = "A-";	
															  }else if($gradePointPercentage >=50 && $gradePointPercentage < 60){ echo $getGpa = "B"; 	
															  }else if($gradePointPercentage >=40 && $gradePointPercentage < 50){ echo $getGpa = "C";	   
															  }else if($gradePointPercentage >=33 && $gradePointPercentage < 40){ echo $getGpa = "D"; 	
															  }else{ echo "F"; $countGpa = $countGpa + 0; 		$countSub = $countSub + 1; }
															}else{
														      echo "Invalide";
														  }
														  
													    } 
												   ?>												</td>
												<td align="center" valign="middle"><?php 
												       
												       if(!empty($gradePointPercentage)){ 
													      if($gradePointPercentage <= 100 && $gradePointPercentage > 0){
															  if($gradePointPercentage >=80 && $gradePointPercentage <= 100){ echo $getGpa = "5.00"; 		$countGpa = $countGpa + 5; 		$countSub = $countSub + 1;
															  }else if($gradePointPercentage >=70 && $gradePointPercentage < 80){ echo $getGpa = "4.00"; 	$countGpa = $countGpa + 4; 		$countSub = $countSub + 1;
															  }else if($gradePointPercentage >=60 && $gradePointPercentage < 70){ echo $getGpa = "3.50";	$countGpa = $countGpa + 3.5; 	$countSub = $countSub + 1; 
															  }else if($gradePointPercentage >=50 && $gradePointPercentage < 60){ echo $getGpa = "3.00"; 	$countGpa = $countGpa + 3; 		$countSub = $countSub + 1;
															  }else if($gradePointPercentage >=40 && $gradePointPercentage < 50){ echo $getGpa = "2.00";	$countGpa = $countGpa + 2; 		$countSub = $countSub + 1; 
															  }else if($gradePointPercentage >=33 && $gradePointPercentage < 40){ echo $getGpa = "1.00"; 	$countGpa = $countGpa + 1; 		$countSub = $countSub + 1; 
															  }else{ echo "0.00"; $countGpa = $countGpa + 0; 		$countSub = $countSub + 1; }
															}else{
														      echo "Invalide";
														  }
														  
													    } 
												   ?></td>
											  </tr>
											  
											  <?php } ?> 
											  <tr>
											    <td align="center" valign="middle">&nbsp;</td>
												<td><strong>Class Roll : </strong> <?php echo $studentDetails->class_roll; ?></td>
												<td colspan="3" align="left" valign="middle"><strong>Position Held : </strong> <?php echo $position ?></td>
												<td  align="left" valign="middle">&nbsp;</td>
												<td  align="left" valign="middle">&nbsp;</td>
												<td  align="left" valign="middle">&nbsp;</td>
												
												<td colspan="3" align="right" valign="middle"><strong>Total Marks = <?php echo $stuAnnualTotalMarks + $stuHalfTotalMarks ?> </strong></td>
												<td  align="right" valign="middle"><strong> GPA =</strong></td>
												<td align="center" valign="middle"><?php 
													        $avgGpa = $countGpa/$countSub;
														   echo number_format($avgGpa, 2);
														   
													   ?>												</td>
											  </tr>
										  </table>


									   </td>
									</tr>
									
									<tr>
									  <td align="left" valign="middle" class="text-center">
									     <table width="100%" border="0">
											  <tr>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td><img src="<?php echo base_url('resource/img/headsig.jpg'); ?>" width="50" height="50">  </td>
											  </tr>
											  <tr>
												<td align="center" valign="middle" style="text-decoration: overline;">Signature of the class Teacher </td>
												<td align="center" valign="middle" style="text-decoration: overline;">Signature of Parents </td>
												<td align="center" valign="middle" style="text-decoration: overline;">Remarks</td>
												<td align="center" valign="middle" style="text-decoration: overline;">Signature of Headmaster </td>
											  </tr>
											  <tr>
											    <td>&nbsp;</td>
											    <td>&nbsp;</td>
											    <td>&nbsp;</td>
											    <td>&nbsp;</td>
									       </tr>
											</table>

									  </td>
									</tr>
								</tbody>
					  </table>
					  
					  <?php }else if(!empty($stuWisePlayToFiveResultInfo)){ ?>
					  
					      <table id="dynamic-table" class="table table-striped table-bordered ">

								<tbody>
									<tr>
									  <td align="left" valign="middle" class="text-center">
									      <table width="100%" border="0">
                                        <tr>
                                          <td width="32%" align="left" valign="middle"><strong>Name &nbsp;: </strong><?php echo $studentDetails->stu_full_name ?></td>
                                          <td width="33%" align="left" valign="middle"><strong>ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong> <?php echo $studentDetails->stu_id ?></td>
                                          <td width="25%" align="left" valign="middle"><strong>Class &nbsp;: </strong><?php echo $studentDetails->class_name ?></td>
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
                                          <td align="left" valign="middle"><strong>Group : </strong> <?php echo $studentDetails->group_name ?></td>
                                          <td align="left" valign="middle"><strong>Section &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong> <?php echo $studentDetails->section_name ?></td>
                                          <td align="left" valign="middle"><strong>Shift &nbsp; &nbsp;: </strong> <?php echo $studentDetails->shift_name ?></td>
									    </tr>
                                        <tr>
                                          <td align="left" valign="middle"><strong>Year &nbsp;&nbsp;&nbsp;:</strong> <?php echo $studentDetails->year; ?></td>
                                          <td align="left" valign="middle"></td>
                                          <td align="left" valign="middle">&nbsp;</td>
                                          <td align="left" valign="middle">&nbsp;</td>
                                        </tr>
                                      </table>
									 </td>
								  </tr>
									

									<tr>
									    <td align="center" valign="middle" class="text-left">
										  
											<table width="100%" border="0" class="table table-condensed  table-bordered">
											  <tr style="background-color:#F9F9F9">
											    <td width="4%" rowspan="2" align="center" valign="middle" style="padding-top:30px"><strong>Sl No </strong></td>
												<td width="12%" rowspan="2" align="center" valign="middle" style="padding-top:30px"><strong>Subject</strong></td>
												<td colspan="2" align="center" valign="middle"><strong>Marks</strong></td>
												<td width="5%" rowspan="2" align="center" valign="middle"><strong>First<br>
											    Term</strong></td>
												<td width="5%" rowspan="2" align="center" valign="middle"><strong>Second<br>
											    Term</strong></td>
												<td width="5%" rowspan="2" align="center" valign="middle"><strong>Third<br>
											    Term</strong></td>
												<td width="5%" rowspan="2" align="center" valign="middle"><strong>Total</strong></td>
												<td width="5%" rowspan="2" align="center" valign="middle"><strong>L<br>G</strong></td>
												<td width="6%" rowspan="2" align="center" valign="middle"><strong>G<br>P</strong></td>
											  </tr>
											  

											  <tr style="background-color:#F9F9F9">
											    <td width="5%" align="center" valign="middle"><strong>FM</strong></td>
											    <td width="5%" align="center" valign="middle"><strong>OM</strong></td>
										      </tr>
											  <?php 
											      $slNo = 1;
											      $countGpa  = 0;
												  $countSub  = 0;
												  $stuTotalStudent = 0;
											      foreach($stuWisePlayToFiveResultInfo as $v) {
												  
												  $totalMarks  = $v->examWiseAnnualObMarksInfo->obtained_marks + $v->examWiseFirstTermObMarksInfo->obtained_marks + $v->examWiseSecondTermObMarksInfo->obtained_marks +$v->examWiseThirdTermObMarksInfo->obtained_marks; 
												  $stuTotalStudent += $totalMarks;
												  
												  $firstTermPersectage   = $v->examWiseFirstTermObMarksInfo->obtained_marks * 100/$v->examWiseFirstTermFmMarksInfo->total_marks;  
												  $secondTermPersectage  = $v->examWiseSecondTermObMarksInfo->obtained_marks * 100/$v->examWiseSecondTermFmMarksInfo->total_marks;  
												  $thirdTermPersectage   = $v->examWiseThirdTermObMarksInfo->obtained_marks * 100/$v->examWiseThirdTermFmMarksInfo->total_marks;  
												  $annualPersentage 	 = $v->examWiseAnnualObMarksInfo->obtained_marks * 100/$v->examWiseAnnualFmMarksInfo->total_marks; 
												  $allXmPersentage       = $firstTermPersectage + $secondTermPersectage + $thirdTermPersectage + $annualPersentage;
												  
												  $totalPersentage  = $allXmPersentage/4;
												  	
											   ?> 
											
											    <tr>
											      <td align="center" valign="middle"><?php echo $slNo++ ?></td>
												<td><?php echo $v->subject_name ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseAnnualFmMarksInfo->total_marks ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseAnnualObMarksInfo->obtained_marks ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseFirstTermObMarksInfo->obtained_marks ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseSecondTermObMarksInfo->obtained_marks ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseThirdTermObMarksInfo->obtained_marks ?></td>
												<td align="right" valign="middle"><?php echo $totalMarks ?></td>
												<td align="center" valign="middle">
												   <?php 
												       if(!empty($totalPersentage)){ 
													      if($totalPersentage <= 100 && $totalPersentage > 0){
															  if($totalPersentage >=80 && $totalPersentage <= 100){ echo $getGpa = "A+"; 		
															  }else if($totalPersentage >=70 && $totalPersentage < 80){ echo $getGpa = "A"; 	
															  }else if($totalPersentage >=60 && $totalPersentage < 70){ echo $getGpa = "A-";	
															  }else if($totalPersentage >=50 && $totalPersentage < 60){ echo $getGpa = "B"; 	
															  }else if($totalPersentage >=40 && $totalPersentage < 50){ echo $getGpa = "C";	   
															  }else if($totalPersentage >=33 && $totalPersentage < 40){ echo $getGpa = "D"; 	
															  }else{ echo "F"; $countGpa = $countGpa + 0; 		$countSub = $countSub + 1; }
															}else{
														      echo "Invalide";
														  }
														  
													    } 
												   ?>												</td>
												<td align="center" valign="middle"><?php 
												       
												       if(!empty($totalPersentage)){ 
													      if($totalPersentage <= 100 && $totalPersentage > 0){
															  if($totalPersentage >=80 && $totalPersentage <= 100){ echo $getGpa = "5.00"; 		$countGpa = $countGpa + 5; 		$countSub = $countSub + 1;
															  }else if($totalPersentage >=70 && $totalPersentage < 80){ echo $getGpa = "4.00"; 	$countGpa = $countGpa + 4; 		$countSub = $countSub + 1;
															  }else if($totalPersentage >=60 && $totalPersentage < 70){ echo $getGpa = "3.50";	$countGpa = $countGpa + 3.5; 	$countSub = $countSub + 1; 
															  }else if($totalPersentage >=50 && $totalPersentage < 60){ echo $getGpa = "3.00"; 	$countGpa = $countGpa + 3; 		$countSub = $countSub + 1;
															  }else if($totalPersentage >=40 && $totalPersentage < 50){ echo $getGpa = "2.00";	$countGpa = $countGpa + 2; 		$countSub = $countSub + 1; 
															  }else if($totalPersentage >=33 && $totalPersentage < 40){ echo $getGpa = "1.00"; 	$countGpa = $countGpa + 1; 		$countSub = $countSub + 1; 
															  }else{ echo "0.00"; $countGpa = $countGpa + 0; 		$countSub = $countSub + 1; }
															}else{
														      echo "Invalide";
														  }
														  
													    } 
												   ?></td>
											  </tr>
											  
											  <?php } ?> 
											  <tr>
											    <td align="center" valign="middle">&nbsp;</td>
												<td><strong>Class Roll : </strong> <?php echo $studentDetails->class_roll; ?></td>
												<td colspan="2" align="left" valign="middle"><strong>Position Held : </strong> <?php echo $position ?></td>
												<td align="right" valign="middle">&nbsp;</td>
												<td align="right" valign="middle">&nbsp;</td>
												<td colspan="2" align="right" valign="middle"><strong>Total Marks = </strong><?php echo $stuTotalStudent ?></td>
												<td align="right" valign="middle"><strong>Avg GPA =</strong></td>
												<td align="center" valign="middle">
												<?php 
													        $avgGpa = $countGpa/$countSub;
														   echo number_format($avgGpa, 2);
														   
													   ?>												</td>
											  </tr>
										  </table>


									   </td>
									</tr>
									
									<tr>
									  <td align="left" valign="middle" class="text-center">
									     <table width="100%" border="0">
											  <tr>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td><img src="<?php echo base_url('resource/img/headsig.jpg'); ?>" width="50" height="50"></td>
											  </tr>
											  <tr>
												<td align="center" valign="middle" style="text-decoration: overline;">Signature of the class Teacher </td>
												<td align="center" valign="middle" style="text-decoration: overline;">Signature of Parents </td>
												<td align="center" valign="middle" style="text-decoration: overline;">Remarks</td>
												<td align="center" valign="middle" style="text-decoration: overline;">Signature of Headmaster </td>
											  </tr>
											  <tr>
											    <td>&nbsp;</td>
											    <td>&nbsp;</td>
											    <td>&nbsp;</td>
											    <td>&nbsp;</td>
									       </tr>
											</table>

									  </td>
									</tr>
								</tbody>
					  </table>
					  
					  <?php }else if(!empty($stuWiseElevenResultInfo)){ ?>
					  
					     <table id="dynamic-table" class="table table-striped table-bordered ">

								<tbody>
									<tr>
									  <td align="left" valign="middle" class="text-center">
									      <table width="100%" border="0">
                                        <tr>
                                          <td width="32%" align="left" valign="middle"><strong>Name &nbsp;: </strong><?php echo $studentDetails->stu_full_name ?></td>
                                          <td width="33%" align="left" valign="middle"><strong>ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong> <?php echo $studentDetails->stu_id ?></td>
                                          <td width="25%" align="left" valign="middle"><strong>Class &nbsp;: </strong><?php echo $studentDetails->class_name ?></td>
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
                                          <td align="left" valign="middle"><strong>Group : </strong> <?php echo $studentDetails->group_name ?></td>
                                          <td align="left" valign="middle"><strong>Section &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong> <?php echo $studentDetails->section_name ?></td>
                                          <td align="left" valign="middle"><strong>Shift &nbsp; &nbsp;: </strong> <?php echo $studentDetails->shift_name ?></td>
									    </tr>
                                        <tr>
                                          <td align="left" valign="middle"><strong>Year &nbsp;&nbsp;&nbsp;:</strong> <?php echo $studentDetails->year; ?></td>
                                          <td align="left" valign="middle"></td>
                                          <td align="left" valign="middle">&nbsp;</td>
                                          <td align="left" valign="middle">&nbsp;</td>
                                        </tr>
                                      </table>
									 </td>
								  </tr>
									

									<tr>
									    <td align="center" valign="middle" class="text-left">
										  
											<table width="100%" border="0" class="table table-condensed  table-bordered">
											  <tr style="background-color:#F9F9F9">
											    <td width="4%" rowspan="3" align="center" valign="middle" style="padding-top:30px"><strong>Sl No </strong></td>
												<td width="12%" rowspan="3" align="center" valign="middle" style="padding-top:30px"><strong>Subject</strong></td>
												<td colspan="6" align="center" valign="middle"><strong>Marks</strong></td>
												<td width="6%" rowspan="3" align="center" valign="middle"><strong>Year<br> Final <br> Total </strong></td>
											   
												<td width="5%" rowspan="3" align="center" valign="middle"><strong> First<br>Term <br> Total </strong></td>
												<td width="5%" rowspan="3" align="center" valign="middle"><strong> Second <br>
												    Term <br> Total </strong></td>
												<td width="5%" rowspan="3" align="center" valign="middle"><strong>Total</strong></td>
												<td width="5%" rowspan="3" align="center" valign="middle"><strong>L<br>G</strong></td>
												<td width="6%" rowspan="3" align="center" valign="middle"><strong>G<br>P</strong></td>
											  </tr>
											  <tr style="background-color:#F9F9F9">
											    <td colspan="2" align="center" valign="middle"><strong>MCQ</strong></td>
											    <td colspan="2" align="center" valign="middle"><strong>Creative</strong></td>
											    <td colspan="2" align="center" valign="middle"><strong>CA/Prac</strong></td>
											  </tr>
											  <tr style="background-color:#F9F9F9">
											    <td width="5%" align="center" valign="middle"><strong>FM</strong></td>
											    <td width="5%" align="center" valign="middle"><strong>OM</strong></td>
											    <td width="7%" align="center" valign="middle"><strong>FM</strong></td>
											    <td width="8%" align="center" valign="middle"><strong>OM</strong></td>
											    <td width="7%" align="center" valign="middle"><strong>FM</strong></td>
												<td width="8%" align="center" valign="middle"><strong>OM</strong></td>
											  </tr>
											  <?php 
											      $slNo 		 = 1;
											      $countGpa  	 = 0;
												  $countSub  	 = 0;
												  $stuTotalMarks = 0;
											      foreach($stuWiseElevenResultInfo as $v) {
												  $totalYearFinalMarks    = $v->examWiseYearFinalObMarksInfo->multi_choose_mark + $v->examWiseYearFinalObMarksInfo->written_marks + $v->examWiseYearFinalObMarksInfo->practicle_marks;  												  $totalYearFinalFmMarks  = $v->examWiseYearFinalFmMarksInfo->mcq_marks + $v->examWiseYearFinalFmMarksInfo->creative_marks + $v->examWiseYearFinalFmMarksInfo->practicle_marks;  
												  
												  $totalFirstTermMarks    = $v->examWiseFirstTermObMarksInfo->multi_choose_mark + $v->examWiseFirstTermObMarksInfo->written_marks + $v->examWiseFirstTermObMarksInfo->practicle_marks;  												  $totalFirstTermFmMarks  = $v->examWiseFirstTermFmMarksInfo->mcq_marks + $v->examWiseFirstTermFmMarksInfo->creative_marks + $v->examWiseFirstTermFmMarksInfo->practicle_marks; 
												   
												  $totalSecondTermMarks   = $v->examWiseSecondTermObMarksInfo->multi_choose_mark + $v->examWiseSecondTermObMarksInfo->written_marks + $v->examWiseSecondTermObMarksInfo->practicle_marks;  								  $totalSecondTermFmMarks = $v->examWiseSecondTermFmMarksInfo->mcq_marks + $v->examWiseSecondTermFmMarksInfo->creative_marks + $v->examWiseSecondTermFmMarksInfo->practicle_marks;  
												  
												  
												 
												  $totalYearFinalPersentage  = $totalYearFinalMarks * 100/$totalYearFinalFmMarks; 
												  $totalFirstTermPersentage  = $totalFirstTermMarks * 100/$totalFirstTermMarks;
												  $totalSecondTermPersentage = $totalSecondTermMarks * 100/$totalSecondTermFmMarks;
												  
												  $totalPersetage        = $totalYearFinalPersentage + $totalFirstTermPersentage + $totalSecondTermPersentage; 
												  $gradePointPercentage  = $totalPersetage/3; 
												  
												  $totalAllTermMmarks        = $totalYearFinalMarks + $totalFirstTermMarks + $totalSecondTermMarks;
												  $stuTotalMarks += $totalAllTermMmarks;  
												  	
											   ?> 
											
											    <tr>
											      <td align="center" valign="middle"><?php echo $slNo++ ?></td>
												<td><?php echo $v->subject_name ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseYearFinalFmMarksInfo->mcq_marks ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseYearFinalObMarksInfo->multi_choose_mark ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseYearFinalFmMarksInfo->creative_marks ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseYearFinalObMarksInfo->written_marks ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseYearFinalFmMarksInfo->practicle_marks ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseYearFinalObMarksInfo->practicle_marks;  ?></td>
												<td align="center" valign="middle"><?php echo $totalYearFinalMarks ?></td>
												<td align="center" valign="middle"><?php echo $totalFirstTermMarks ?></td>
												<td align="center" valign="middle"><?php echo $totalSecondTermMarks ?></td>
												<td align="center" valign="middle"><?php echo $totalAllTermMmarks ?></td>
												<td align="center" valign="middle">
												   <?php 
												       
												       if(!empty($gradePointPercentage)){ 
													      if($gradePointPercentage <= 100 && $gradePointPercentage > 0){
															  if($gradePointPercentage >=80 && $gradePointPercentage <= 100){ echo $getGpa = "A+"; 		
															  }else if($gradePointPercentage >=70 && $gradePointPercentage < 80){ echo $getGpa = "A"; 	
															  }else if($gradePointPercentage >=60 && $gradePointPercentage < 70){ echo $getGpa = "A-";	
															  }else if($gradePointPercentage >=50 && $gradePointPercentage < 60){ echo $getGpa = "B"; 	
															  }else if($gradePointPercentage >=40 && $gradePointPercentage < 50){ echo $getGpa = "C";	   
															  }else if($gradePointPercentage >=33 && $gradePointPercentage < 40){ echo $getGpa = "D"; 	
															  }else{ echo "F"; $countGpa = $countGpa + 0; 		$countSub = $countSub + 1; }
															}else{
														      echo "Invalide";
														  }
														  
													    } 
												   ?>												</td>
												<td align="center" valign="middle"><?php 
												       
												       if(!empty($gradePointPercentage)){ 
													      if($gradePointPercentage <= 100 && $gradePointPercentage > 0){
															  if($gradePointPercentage >=80 && $gradePointPercentage <= 100){ echo $getGpa = "5.00"; 		$countGpa = $countGpa + 5; 		$countSub = $countSub + 1;
															  }else if($gradePointPercentage >=70 && $gradePointPercentage < 80){ echo $getGpa = "4.00"; 	$countGpa = $countGpa + 4; 		$countSub = $countSub + 1;
															  }else if($gradePointPercentage >=60 && $gradePointPercentage < 70){ echo $getGpa = "3.50";	$countGpa = $countGpa + 3.5; 	$countSub = $countSub + 1; 
															  }else if($gradePointPercentage >=50 && $gradePointPercentage < 60){ echo $getGpa = "3.00"; 	$countGpa = $countGpa + 3; 		$countSub = $countSub + 1;
															  }else if($gradePointPercentage >=40 && $gradePointPercentage < 50){ echo $getGpa = "2.00";	$countGpa = $countGpa + 2; 		$countSub = $countSub + 1; 
															  }else if($gradePointPercentage >=33 && $gradePointPercentage < 40){ echo $getGpa = "1.00"; 	$countGpa = $countGpa + 1; 		$countSub = $countSub + 1; 
															  }else{ echo "0.00"; $countGpa = $countGpa + 0; 		$countSub = $countSub + 1; }
															}else{
														      echo "Invalide";
														  }
														  
													    } 
												   ?></td>
											  </tr>
											  
											  <?php } ?> 
											  <tr>
											    <td align="center" valign="middle">&nbsp;</td>
												<td><strong>Class Roll : </strong> <?php echo $studentDetails->class_roll; ?></td>
												<td colspan="3" align="left" valign="middle"><strong>Position Held : </strong> <?php echo $position ?></td>
												<td  align="left" valign="middle">&nbsp;</td>
												<td  align="left" valign="middle">&nbsp;</td>
												<td  align="left" valign="middle">&nbsp;</td>
												
												<td colspan="4" align="right" valign="middle"><strong>Total Marks = <?php echo $stuTotalMarks ?> </strong></td>
												<td  align="right" valign="middle"><strong> GPA =</strong></td>
												<td align="center" valign="middle"><?php 
													        $avgGpa = $countGpa/$countSub;
														   echo number_format($avgGpa, 2);
														   
													   ?>												</td>
											  </tr>
										  </table>


									   </td>
									</tr>
									
									<tr>
									  <td align="left" valign="middle" class="text-center">
									     <table width="100%" border="0">
											  <tr>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td><img src="<?php echo base_url('resource/img/headsig.jpg'); ?>" width="50" height="50">  </td>
											  </tr>
											  <tr>
												<td align="center" valign="middle" style="text-decoration: overline;">Signature of the class Teacher </td>
												<td align="center" valign="middle" style="text-decoration: overline;">Signature of Parents </td>
												<td align="center" valign="middle" style="text-decoration: overline;">Remarks</td>
												<td align="center" valign="middle" style="text-decoration: overline;">Signature of Headmaster </td>
											  </tr>
											  <tr>
											    <td>&nbsp;</td>
											    <td>&nbsp;</td>
											    <td>&nbsp;</td>
											    <td>&nbsp;</td>
									       </tr>
											  
											</table>

									  </td>
									</tr>
								</tbody>
					  </table>
					  
					  <?php }else if(!empty($stuWiseTwlveResultInfo)){ ?>
					  
					      <table id="dynamic-table" class="table table-striped table-bordered ">

								<tbody>
									<tr>
									  <td align="left" valign="middle" class="text-center">
									      <table width="100%" border="0">
                                        <tr>
                                          <td width="32%" align="left" valign="middle"><strong>Name &nbsp;: </strong><?php echo $studentDetails->stu_full_name ?></td>
                                          <td width="33%" align="left" valign="middle"><strong>ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong> <?php echo $studentDetails->stu_id ?></td>
                                          <td width="25%" align="left" valign="middle"><strong>Class &nbsp;: </strong><?php echo $studentDetails->class_name ?></td>
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
                                          <td align="left" valign="middle"><strong>Group : </strong> <?php echo $studentDetails->group_name ?></td>
                                          <td align="left" valign="middle"><strong>Section &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong> <?php echo $studentDetails->section_name ?></td>
                                          <td align="left" valign="middle"><strong>Shift &nbsp; &nbsp;: </strong> <?php echo $studentDetails->shift_name ?></td>
									    </tr>
                                        <tr>
                                          <td align="left" valign="middle"><strong>Year &nbsp;&nbsp;&nbsp;:</strong> <?php echo $studentDetails->year; ?></td>
                                          <td align="left" valign="middle"></td>
                                          <td align="left" valign="middle">&nbsp;</td>
                                          <td align="left" valign="middle">&nbsp;</td>
                                        </tr>
                                      </table>
									 </td>
								  </tr>
									

									<tr>
									    <td align="center" valign="middle" class="text-left">
										  
											<table width="100%" border="0" class="table table-condensed  table-bordered">
											  <tr style="background-color:#F9F9F9">
											    <td width="4%" rowspan="3" align="center" valign="middle" style="padding-top:30px"><strong>Sl No </strong></td>
												<td width="12%" rowspan="3" align="center" valign="middle" style="padding-top:30px"><strong>Subject</strong></td>
												<td colspan="6" align="center" valign="middle"><strong>Marks</strong></td>
												<td width="6%" rowspan="3" align="center" valign="middle"><strong>Test<br> Total  </strong></td>
											   
												<td width="5%" rowspan="3" align="center" valign="middle"><strong> Pre Test<br>Total</strong></td>
												<td width="5%" rowspan="3" align="center" valign="middle"><strong>Total</strong></td>
												<td width="5%" rowspan="3" align="center" valign="middle"><strong>L<br>G</strong></td>
												<td width="6%" rowspan="3" align="center" valign="middle"><strong>G<br>P</strong></td>
											  </tr>
											  <tr style="background-color:#F9F9F9">
											    <td colspan="2" align="center" valign="middle"><strong>MCQ</strong></td>
											    <td colspan="2" align="center" valign="middle"><strong>Creative</strong></td>
											    <td colspan="2" align="center" valign="middle"><strong>CA/Prac</strong></td>
											  </tr>
											  <tr style="background-color:#F9F9F9">
											    <td width="5%" align="center" valign="middle"><strong>FM</strong></td>
											    <td width="5%" align="center" valign="middle"><strong>OM</strong></td>
											    <td width="7%" align="center" valign="middle"><strong>FM</strong></td>
											    <td width="8%" align="center" valign="middle"><strong>OM</strong></td>
											    <td width="7%" align="center" valign="middle"><strong>FM</strong></td>
												<td width="8%" align="center" valign="middle"><strong>OM</strong></td>
											  </tr>
											  <?php 
											      $slNo 		 = 1;
											      $countGpa  	 = 0;
												  $countSub  	 = 0;
												  $stuTotalMarks = 0;
											      foreach($stuWiseTwlveResultInfo as $v) {
												  $totalTestMarks         = $v->examWiseTestObMarksInfo->multi_choose_mark + $v->examWiseTestObMarksInfo->written_marks + $v->examWiseTestObMarksInfo->practicle_marks;  												  												  $totalTestFmMarks  	  = $v->examWiseTestFmMarksInfo->mcq_marks + $v->examWiseTestFmMarksInfo->creative_marks + $v->examWiseTestFmMarksInfo->practicle_marks;  
												  
												  $totalPreTestMarks      = $v->examWisePreTestObMarksInfo->multi_choose_mark + $v->examWisePreTestObMarksInfo->written_marks + $v->examWisePreTestObMarksInfo->practicle_marks;  												  												  $totalPreTestFmMarks    = $v->examWisePreTestFmMarksInfo->mcq_marks + $v->examWisePreTestFmMarksInfo->creative_marks + $v->examWisePreTestFmMarksInfo->practicle_marks; 
												   
												  
												       
												   
												  $totalTestPersentage     = $totalTestMarks * 100/$totalTestFmMarks; 
												  $totalpreTestPersentage  = $totalPreTestMarks * 100/$totalPreTestFmMarks;
												  
												  
												  $totalPersetage          = $totalTestPersentage + $totalpreTestPersentage; 
												  $gradePointPercentage    = $totalPersetage/2; 
												  
												  $totalAllTermMmarks      = $totalTestMarks + $totalPreTestMarks;
												  $stuTotalMarks += $totalAllTermMmarks;  
												  	
											   ?> 
											
											    <tr>
											      <td align="center" valign="middle"><?php echo $slNo++ ?></td>
												<td><?php echo $v->subject_name ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseTestFmMarksInfo->mcq_marks ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseTestObMarksInfo->multi_choose_mark ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseTestFmMarksInfo->creative_marks ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseTestObMarksInfo->written_marks ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseTestFmMarksInfo->practicle_marks ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseTestObMarksInfo->practicle_marks;  ?></td>
												<td align="center" valign="middle"><?php echo $totalTestMarks ?></td>
												<td align="center" valign="middle"><?php echo $totalPreTestMarks ?></td>
												<td align="center" valign="middle"><?php echo $totalAllTermMmarks ?></td>
												<td align="center" valign="middle">
												   <?php 
												       
												       if(!empty($gradePointPercentage)){ 
													      if($gradePointPercentage <= 100 && $gradePointPercentage > 0){
															  if($gradePointPercentage >=80 && $gradePointPercentage <= 100){ echo $getGpa = "A+"; 		
															  }else if($gradePointPercentage >=70 && $gradePointPercentage < 80){ echo $getGpa = "A"; 	
															  }else if($gradePointPercentage >=60 && $gradePointPercentage < 70){ echo $getGpa = "A-";	
															  }else if($gradePointPercentage >=50 && $gradePointPercentage < 60){ echo $getGpa = "B"; 	
															  }else if($gradePointPercentage >=40 && $gradePointPercentage < 50){ echo $getGpa = "C";	   
															  }else if($gradePointPercentage >=33 && $gradePointPercentage < 40){ echo $getGpa = "D"; 	
															  }else{ echo "F"; $countGpa = $countGpa + 0; 		$countSub = $countSub + 1; }
															}else{
														      echo "Invalide";
														  }
														  
													    } 
												   ?>												</td>
												<td align="center" valign="middle"><?php 
												       
												       if(!empty($gradePointPercentage)){ 
													      if($gradePointPercentage <= 100 && $gradePointPercentage > 0){
															  if($gradePointPercentage >=80 && $gradePointPercentage <= 100){ echo $getGpa = "5.00"; 		$countGpa = $countGpa + 5; 		$countSub = $countSub + 1;
															  }else if($gradePointPercentage >=70 && $gradePointPercentage < 80){ echo $getGpa = "4.00"; 	$countGpa = $countGpa + 4; 		$countSub = $countSub + 1;
															  }else if($gradePointPercentage >=60 && $gradePointPercentage < 70){ echo $getGpa = "3.50";	$countGpa = $countGpa + 3.5; 	$countSub = $countSub + 1; 
															  }else if($gradePointPercentage >=50 && $gradePointPercentage < 60){ echo $getGpa = "3.00"; 	$countGpa = $countGpa + 3; 		$countSub = $countSub + 1;
															  }else if($gradePointPercentage >=40 && $gradePointPercentage < 50){ echo $getGpa = "2.00";	$countGpa = $countGpa + 2; 		$countSub = $countSub + 1; 
															  }else if($gradePointPercentage >=33 && $gradePointPercentage < 40){ echo $getGpa = "1.00"; 	$countGpa = $countGpa + 1; 		$countSub = $countSub + 1; 
															  }else{ echo "0.00"; $countGpa = $countGpa + 0; 		$countSub = $countSub + 1; }
															}else{
														      echo "Invalide";
														  }
														  
													    } 
												   ?></td>
											  </tr>
											  
											  <?php } ?> 
											  <tr>
											    <td align="center" valign="middle">&nbsp;</td>
												<td><strong>Class Roll : </strong> <?php echo $studentDetails->class_roll; ?></td>
												<td colspan="3" align="left" valign="middle"><strong>Position Held : </strong> <?php echo $position ?></td>
												<td  align="left" valign="middle">&nbsp;</td>
												<td  align="left" valign="middle">&nbsp;</td>
												<td  align="left" valign="middle">&nbsp;</td>
												
												<td colspan="3" align="right" valign="middle"><strong>Total Marks = <?php echo $stuTotalMarks ?> </strong></td>
												<td  align="right" valign="middle"><strong> GPA =</strong></td>
												<td align="center" valign="middle"><?php 
													        $avgGpa = $countGpa/$countSub;
														   echo number_format($avgGpa, 2);
														   
													   ?>												</td>
											  </tr>
										  </table>


									   </td>
									</tr>
									
									<tr>
									  <td align="left" valign="middle" class="text-center">
									     <table width="100%" border="0">
											  <tr>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td><img src="<?php echo base_url('resource/img/headsig.jpg'); ?>" width="50" height="50">  </td>
											  </tr>
											  <tr>
												<td align="center" valign="middle" style="text-decoration: overline;">Signature of the class Teacher </td>
												<td align="center" valign="middle" style="text-decoration: overline;">Signature of Parents </td>
												<td align="center" valign="middle" style="text-decoration: overline;">Remarks</td>
												<td align="center" valign="middle" style="text-decoration: overline;">Signature of Headmaster </td>
											  </tr>
											  <tr>
											    <td>&nbsp;</td>
											    <td>&nbsp;</td>
											    <td>&nbsp;</td>
											    <td>&nbsp;</td>
									       </tr>
											  
											 
											</table>

									  </td>
									</tr>
								</tbody>
					  </table>
					  
					  
					  
					  <?php  } else { ?> 
					 <div class="alert alert-danger">
						<strong>Warning!</strong> Sorry System Could Not Find Anything. Please Check Information and Try Again!
					  </div>
		  			<?php } ?>
					
					<?php if(!empty($stuWiseSixToTenResultInfo) || !empty($stuWiseElevenResultInfo) || !empty($stuWiseTwlveResultInfo) || !empty($stuWisePlayToFiveResultInfo)){ ?>
					   <div class="col-md-12 Remove text-right"><a href="#" class="print">Print</a></div>
					 <?php } ?>
					  
					
		  
			      </div>
				</div>
			</div>
	</body>		
            
	</html>
         <?php //$this->load->view('common/footer'); ?>
         <?php $this->load->view('common/jsLinkPage'); ?>
		 
		 <script>
		  $('.print').on('click', function(e){
		     $('.Remove').css('display','none');
		      window.print();
		      e.preventdefault();
		  });
		 </script>
		 



