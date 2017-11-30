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
						
						<?php 
						    if(!empty($stuPerResultInfo)) { 
						 ?>
						 
						<table id="dynamic-table" class="table table-striped table-bordered ">

								<tbody>
									<tr> 
										
										<?php //print_r($stuDetailsInfo); 
											 foreach($stuPerResultInfo as $v) { 
											 
											 }
											 ?>
								      <td align="center" valign="middle" class="text-center"><strong>Class :</strong> <?php echo $v->class_name; ?>,&nbsp;&nbsp;&nbsp;<strong>Group :</strong> <?php echo $v->group_name; ?>,&nbsp;&nbsp;&nbsp;<strong>Section : </strong><?php echo $v->section_name; ?>,&nbsp;&nbsp;&nbsp;<strong>Shift :</strong> <?php echo $shiftInfo->shift_name; ?>,&nbsp;&nbsp;&nbsp;<strong>Year :</strong> <?php echo $v->year; ?>,&nbsp;&nbsp;&nbsp;<strong>Subject :</strong> <?php echo $subjectInfo->subject_name; ?> &nbsp;&nbsp;&nbsp; <strong>Exam Name :</strong> <?php echo $examTypeInfo->exam_type_name; ?></td>
									</tr>
									
									<tr> 
									    <td align="center" valign="middle" class="text-left">
										  
											<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-condensed  table-striped table-bordered">
											  <thead>
											  </thead>
											  
											  <thead>
												  <tr style="background-color:#F9F9F9; border:2px solid #DDDDDD">
													<th align="center" valign="middle">SL No</th>
													<th align="center" valign="middle">Stu ID </th>
													<th align="center" valign="middle">Stu Name </th>
												    <th align="center" valign="middle" class="text-center">Class Roll </th>
												    <th align="center" valign="middle" class="text-center">
													<?php echo $examTypeInfo->exam_type_name; ?> => FM : <?php echo $examTypeInfo->total_marks; ?>													</th>
												    <th align="center" valign="middle" class="text-center">Obtain Marks</th>
												  </tr>
											  </thead> 
											  <?php 
												$slNo = 1;
												?>
											<tbody>	
											 
											<?php //print_r($stuDetailsInfo); 
											 foreach($stuPerResultInfo as $v) { ?>
											  <tr style="background-color:#FFFFFF">
												<td><?php echo $slNo++; ?></td>
												<td><?php echo $v->stu_id; ?></td>
												<td><?php echo $v->stu_full_name; ?></td>
											    <td align="center" valign="middle"><?php echo $v->class_roll; ?></td>
											   <td align="center" valign="middle"><?php echo $examTypeInfo->total_marks; ?></td>
											    <td align="center" valign="middle"><?php  if($v->examMarksInfo) { echo $v->examMarksInfo+0; } else { echo "<span style='color:red' >No Entry</span>"; } ?></td>
											  </tr>
										    </tbody> 
											<?php } ?> 
										    <tr>
												<th colspan="16" class="text-right"><a href="#" class="pull-right">Print</a></th>
											  </tr>
										  </table>
										</td>
									</tr>
								
								</tbody>
					  </table>
					  
					  
					  
					  <?php  } else if(!empty($stuResultInfo)){ ?>
					   
					     <table width="656" class="table table-striped table-bordered " id="dynamic-table">

								<tbody>
									<tr> 
										
										<?php //print_r($stuDetailsInfo); 
											 foreach($stuResultInfo as $v) { 
											 
											 }
											 ?>
								      <td width="648" align="center" valign="middle" class="text-center"><strong>Class :</strong> <?php echo $v->class_name; ?>,&nbsp;&nbsp;&nbsp;<strong>Group :</strong> <?php echo $v->group_name; ?>,&nbsp;&nbsp;&nbsp;<strong>Section : </strong><?php echo $v->section_name; ?>,&nbsp;&nbsp;&nbsp;<strong>Shift :</strong> <?php echo $shiftInfo->shift_name; ?>,&nbsp;&nbsp;&nbsp;<strong>Year :</strong> <?php echo $v->year; ?>,&nbsp;&nbsp;&nbsp;<strong>Subject :</strong> <?php echo $subjectInfo->subject_name; ?> &nbsp;&nbsp;&nbsp; <strong>Exam Name :</strong> <?php echo $examTypeInfo->exam_type_name; ?></td>
									</tr>
									
									<tr> 
									    <td align="center" valign="middle" class="text-left">
										  
											<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-condensed  table-striped table-bordered">
											  <thead>
											  </thead>
											  
											  <thead>
												  <tr style="background-color:#F9F9F9; border:2px solid #DDDDDD">
												    <th width="5%" rowspan="3" align="center" valign="top">SL No</th>
												    <th width="10%" rowspan="3" align="center" valign="top">Stu ID </th>
												    <th width="17%" rowspan="3" align="center" valign="top">Stu Name </th>
												    <th colspan="6" align="center" valign="middle" class="text-center">Marks</th>
												    <th width="7%" rowspan="3" align="center" valign="top" class="text-center">T<br>o<br>t<br>a<br>l</th>
												    <th width="6%" rowspan="3" align="center" valign="top" class="text-center">1<br>
											        0<br>0<br>%</th>
												    <th width="4%" rowspan="3" align="center" valign="top" class="text-center">L<br>
											        G</th>
												    <th width="4%" rowspan="3" align="center" valign="top" class="text-center">G<br>
											        P</th>
											    </tr>
												  <tr style="background-color:#F9F9F9; border:2px solid #DDDDDD">
												    <th colspan="2" align="center" valign="middle" class="text-center">MCQ</th>
												    <th colspan="2" align="center" valign="middle" class="text-center">Creative</th>
												    <th colspan="2" align="center" valign="middle" class="text-center">CA/Prac</th>
											    </tr>
												  <tr style="background-color:#F9F9F9; border:2px solid #DDDDDD">
													<th width="6%" align="center" valign="middle" class="text-center">FM </th>
												    <th width="6%" align="center" valign="middle" class="text-center">OM</th>
												    <th width="5%" align="center" valign="middle" class="text-center">FM</th>
												    <th width="9%" align="center" valign="middle" class="text-center">OM</th>
												    <th width="8%" align="center" valign="middle" class="text-center">FM</th>
												    <th width="8%" align="center" valign="middle" class="text-center">OM</th>
											      </tr>
											  </thead> 
											  
											<tbody>	
											 
											<?php //print_r($stuDetailsInfo); 
											
											    $slNo = 1;
											    foreach($stuResultInfo as $v) {
												$totalMarks = $v->mcqMarksInfo + $v->creativeMarksInfo + $v->practicleMarksInfo;
												$totalFullMarks = $examTypeInfo->mcq_marks + $examTypeInfo->creative_marks + $examTypeInfo->practicle_marks;
												
											  ?>
											  <tr style="background-color:#FFFFFF">
												<td><?php echo $slNo++; ?></td>
												<td><?php echo $v->stu_id; ?></td>
												<td><?php echo $v->stu_full_name; ?></td>
											    <td align="center" valign="middle"><?php echo $examTypeInfo->mcq_marks ?></td>
											   <td align="center" valign="middle"><?php  if($v->mcqMarksInfo) { echo $v->mcqMarksInfo+0; } else { echo "<span style='color:red' >No Entry</span>"; } ?></td>
											    <td align="center" valign="middle"><?php echo $examTypeInfo->creative_marks ?></td>
											    <td align="center" valign="middle"><?php  if($v->creativeMarksInfo) { echo $v->creativeMarksInfo+0; } else { echo "<span style='color:red' >No Entry</span>"; } ?></td>
											    <td align="center" valign="middle"><?php echo $examTypeInfo->practicle_marks ?></td>
											    <td align="center" valign="middle"><?php  if($v->practicleMarksInfo) { echo $v->practicleMarksInfo+0; } else { echo "<span style='color:red' >No Entry</span>"; } ?></td>
											    <td align="center" valign="middle"><?php echo $totalMarks ?></td>
											    <td align="center" valign="middle"><?php  echo $percentage = $totalMarks * 100/$totalFullMarks ;  ?></td>
											    <td align="center" valign="middle">
												<?php 
													   if(!empty($percentage)){ 
													     if($percentage <= 100 && $percentage > 0){
															  if($percentage >=80 && $percentage <= 100) echo $getGpa = "A+"; 
															  else if($percentage >=70 && $percentage < 80) echo $getGpa = "A";
															  else if($percentage >=60 && $percentage < 70) echo $getGpa = "A-"; 
															  else if($percentage >=50 && $percentage < 60) echo $getGpa = "B"; 
															  else if($percentage >=40 && $percentage < 50) echo $getGpa = "C"; 
															  else if($percentage >=33 && $percentage < 40) echo $getGpa = "D";  
															  else echo "F";
														  }else{
														      echo "Invalide";
														  }
														  
													    } 
												     ?>	</td>
											    <td align="center" valign="middle">
												   <?php 
													   if(!empty($percentage)){ 
													     if($percentage <= 100 && $percentage > 0){
															  if($percentage >=80 && $percentage <= 100) echo $Gpa = "5.00"; 
															  else if($percentage >=70 && $percentage < 80) echo $Gpa = "4.00";
															  else if($percentage >=60 && $percentage < 70) echo $Gpa = "3.5"; 
															  else if($percentage >=50 && $percentage < 60) echo $Gpa = "3"; 
															  else if($percentage >=40 && $percentage < 50) echo $Gpa = "2"; 
															  else if($percentage >=33 && $percentage < 40) echo $Gpa = "1";  
															  else echo "0.00";
														  }else{
														      echo "Invalide";
														  }
														  
													    } 
												     ?>												</td>
											  </tr>
										    </tbody> 
											<?php } ?> 
										    <tr>
												<th colspan="23" class="text-right"><a href="#" class="pull-right">Print</a></th>
											  </tr>
										  </table>
										</td>
									</tr>
								
								</tbody>
					  </table>
					
					 <?php } else { ?>
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
		 



