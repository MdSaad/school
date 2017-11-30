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
						
					  
					  <?php if(!empty($stuWiseResultInfo)){ ?>
					  
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
                                          <td align="left" valign="middle"><strong>Exam Name :</strong> <?php echo $examName->exam_type_name ?></td>
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
												<td width="6%" rowspan="3" align="center" valign="middle"><strong>T<br>
											    o<br>
											    t<br>
											    a<br>
											    l</strong></td>
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
												  $status        = '';
											      foreach($stuWiseResultInfo as $v) {
												  $totalMarks    = $v->examWiseMcqObtain + $v->examWiseCreaObtain + $v->examWisePracObtain;  
												  $totalFmMarks  = $v->examWiseMcqFmMarks + $v->examWiseCreaFmMarks + $v->examWisePracFmMarks;  
												  $stuTotalMarks += $totalMarks;
												  
												  $totalPersentage = $totalMarks * 100/$totalFmMarks ; 
												  	
											   ?> 
											
											    <tr>
											      <td align="center" valign="middle"><?php echo $slNo++ ?></td>
												<td><?php echo $v->subject_name ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseMcqFmMarks ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseMcqObtain ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseCreaFmMarks ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseCreaObtain ?></td>
												<td align="center" valign="middle"><?php echo $v->examWisePracFmMarks ?></td>
												<td align="center" valign="middle"><?php echo $v->examWisePracObtain;  ?></td>
												<td align="center" valign="middle"><?php echo $totalMarks ?></td>
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
															  }else{ echo "F"; $countGpa = $countGpa + 0; 		$countSub = $countSub + 1; $status = "Fail"; }
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
												<td colspan="3" align="left" valign="middle"><strong>Position Held : </strong> <?php echo $position ?></td>
												<td colspan="3" align="right" valign="middle"><strong>Total Marks = </strong></td>
												<td align="center" valign="middle"><?php echo $stuTotalMarks ?></td>
												<td  align="center" valign="middle">
												   <?php 
												     if($status ==''){
														   $avgGpa = $countGpa/$countSub;
															$gpa =   number_format($avgGpa, 2);
															   
														  if(!empty($gpa)){
															if($gpa >=5) echo "A+";
															else if($gpa >=4 && $gpa<5) echo "A";
															else if($gpa >=3.50 && $gpa<4) echo "A-";
															else if($gpa >=3 && $gpa<3.5) echo "B";
															else if($gpa >=2 && $gpa<3) echo "C";
															else if($gpa >1 && $gpa<2) echo "D";
															else  echo "F";
														 } 
													  }else{
													    echo $status;
													  }
													 
												   ?>												</td>
												<td align="center" valign="middle">
												          <?php 
														     if($status ==''){
													            $avgGpa = $countGpa/$countSub;
														        echo number_format($avgGpa, 2);
														     }else{
															    echo '0.00';
															 }
														   
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
											  
											  <tr>
												<td colspan="4" align="right" valign="middle"><a href="#" class="pull-right">Print</a></td>
											  </tr>
											</table>

									  </td>
									</tr>
								</tbody>
					  </table>
					  
					  <?php }else if(!empty($stuWiseResultInfo2)){ ?>
					  
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
                                          <td align="left" valign="middle"><strong>Exam Name :</strong><?php echo $examName->exam_type_name ?></td>
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
												<td width="5%" rowspan="2" align="center" valign="middle"><strong>L<br>G</strong></td>
												<td width="6%" rowspan="2" align="center" valign="middle"><strong>G<br>P</strong></td>
											  </tr>
											  

											  <tr style="background-color:#F9F9F9">
											    <td width="5%" align="center" valign="middle"><strong>FM</strong></td>
											    <td width="5%" align="center" valign="middle"><strong>OM</strong></td>
										      </tr>
											  <?php 
											      $slNo 	 = 1;
											      $countGpa  = 0;
												  $countSub  = 0;
												  $status    = '';
											      foreach($stuWiseResultInfo2 as $v) {
												  $totalMarks    = $v->examWiseObtainMarks;  
												  $totalFmMarks  = $v->examWiseFmMarks;  
												  
												  $totalPersentage = $totalMarks * 100/$totalFmMarks ; 
												  	
											   ?> 
											
											    <tr>
											      <td align="center" valign="middle"><?php echo $slNo++ ?></td>
												<td><?php echo $v->subject_name ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseFmMarks ?></td>
												<td align="center" valign="middle"><?php echo $v->examWiseObtainMarks ?></td>
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
															  }else{ echo "F"; $countGpa = $countGpa + 0; 		$countSub = $countSub + 1; $status = "Fail"; }
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
												<td align="center" valign="middle">
											      <?php 
												     if($status ==''){
														   $avgGpa = $countGpa/$countSub;
															$gpa =   number_format($avgGpa, 2);
															   
														  if(!empty($gpa)){
															if($gpa >=5) echo "A+";
															else if($gpa >=4 && $gpa<5) echo "A";
															else if($gpa >=3.50 && $gpa<4) echo "A-";
															else if($gpa >=3 && $gpa<3.5) echo "B";
															else if($gpa >=2 && $gpa<3) echo "C";
															else if($gpa >1 && $gpa<2) echo "D";
															else  echo "F";
														 } 
													  }else{
													    echo $status;
													  }
													 
												   ?></td>
												<td align="center" valign="middle">
												<?php 
												
												          if($status ==''){
													        $avgGpa = $countGpa/$countSub;
														   echo number_format($avgGpa, 2);
														  }else{
														     echo "0.00";
														  }
														   
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
											  
											  <tr>
												<td colspan="4" align="right" valign="middle"><a href="#" class="pull-right">Print</a></td>
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
					  
					  
					
		  
			      </div>
				</div>
			</div>
	</body>		
            
	</html>
         <?php //$this->load->view('common/footer'); ?>
         <?php $this->load->view('common/jsLinkPage'); ?>
		 



