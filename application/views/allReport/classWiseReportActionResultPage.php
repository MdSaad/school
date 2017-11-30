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
						
						<?php if(!empty($stuHalfYearlyResultInfo)) { 
						 ?>
						<table id="dynamic-table" class="table table-striped table-bordered ">

								<tbody>
									<tr> 
										
										<?php //print_r($stuDetailsInfo); 
											 foreach($stuHalfYearlyResultInfo as $v) { 
											 
											 }
											 ?>
								      <td align="center" valign="middle" class="text-center"><strong>Class :</strong> <?php echo $v->class_name; ?>,&nbsp;&nbsp;&nbsp;<strong>Group :</strong> <?php echo $v->group_name; ?>,&nbsp;&nbsp;&nbsp;<strong>Section : </strong><?php echo $v->section_name; ?>,&nbsp;&nbsp;&nbsp;<strong>Shift :</strong> <?php echo $shiftInfo->shift_name; ?>,&nbsp;&nbsp;&nbsp;<strong>Year :</strong> <?php echo $v->year; ?>,&nbsp;&nbsp;&nbsp;<strong>Subject :</strong> <?php echo $subjectInfo->subject_name; ?> &nbsp;&nbsp;&nbsp; <strong>Exam Name :</strong> <?php echo $examTypehalfMonthLyInfo->exam_type_name; ?></td>
									</tr>
									
									<tr> 
									    <td align="center" valign="middle" class="text-left">
											<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-condensed  table-striped table-bordered">
											  <thead>
											  </thead>
											  
											  <thead>
												  <tr style="background-color:#F9F9F9; border:2px solid #DDDDDD">
													<th>SL No</th>
													<th>Stu ID </th>
													<th>Stu Name </th>
												    <th class="text-center">Class Roll </th>
												    <th align="center" valign="middle" class="text-center">
													  HY  
													  <br>
												    FM </th>
												    <th align="center" valign="middle" class="text-center">HY <br>OM<br>100%</th>
											        
												    <th align="center" valign="middle" width="12%" class="text-center">1M <br> 100% <br> OM <br> (Converted) </th>
												    <th align="center" valign="middle" width="12%" class="text-center">2M <br> 100% <br> OM  <br> (Converted) </th>
												    <th align="center" valign="middle" class="text-center">1M 25% <br/>  2M 25% <br/>  HY 50%, <br/>  Total 100% 
											        </th>
												    <th align="center" valign="middle" class="text-center">GPA</th>
												  </tr>
											  </thead> 
											  <?php 
												$slNo = 1;
												?>
											<tbody>	
											 
											<?php //print_r($stuDetailsInfo); 
											 foreach($stuHalfYearlyResultInfo as $v) {
											    $totalFstMonthlyObtainedMarks  		= $v->ctfstExamMarksInfo + $v->fstmonthlyExamMarksInfo;
												$totalFstMonthlyFullMarks  			= $examTypefstCtInfo->total_marks + $examTypefstMonthLyInfo->total_marks;
												$totalSecondMonthlyObtainedMarks  	= $v->secondctExamMarksInfo + $v->secondmonthlyExamMarksInfo;
												$totalSecondMonthlyFullMarks  		= $examTypeSecondCtInfo->total_marks + $examTypeSecondMonthLyInfo->total_marks;
												
												$halfYearly50Percentage     		= $v->halfyearlyExamMarksInfo * 50/$examTypehalfMonthLyInfo->total_marks;
												$fstMonthly25Percentage     		= $totalFstMonthlyObtainedMarks * 25/$totalFstMonthlyFullMarks;
												$secondMonthly25Percentage     		= $totalSecondMonthlyObtainedMarks * 25/$totalSecondMonthlyFullMarks;
												$totalPersentageForHalfYearly   	= $halfYearly50Percentage + $fstMonthly25Percentage + $secondMonthly25Percentage;
												
											  ?>
											  <tr style="background-color:#FFFFFF">
												<td><?php echo $slNo++; ?></td>
												<td><?php echo $v->stu_id; ?></td>
												<td><?php echo $v->stu_full_name; ?></td>
											    <td align="center" valign="middle"><?php echo $v->class_roll; ?></td>
											   <td align="center" valign="middle"><?php echo $examTypehalfMonthLyInfo->total_marks; ?></td>
											    <td align="center" valign="middle"><?php  if($v->halfyearlyExamMarksInfo) { echo $v->halfyearlyExamMarksInfo+0; } else { echo "<span style='color:red' >No Entry</span>"; } ?></td>
											    <td align="center" valign="middle"><?php echo $fstMonthlypercentage = $totalFstMonthlyObtainedMarks * 100/$totalFstMonthlyFullMarks ;  ?> </td>
											    <td align="center" valign="middle"><?php echo $secondMonthlypercentage = $totalSecondMonthlyObtainedMarks * 100/$totalSecondMonthlyFullMarks ;  ?> </td>
											    <td align="center" valign="middle"><?php echo $totalPersentageForHalfYearly ?></td>
											    <td align="center" valign="middle">
												    <?php 
													   if(!empty($totalPersentageForHalfYearly)){ 
													     if($totalPersentageForHalfYearly <= 100 && $totalPersentageForHalfYearly > 0){
															  if($totalPersentageForHalfYearly >=80 && $totalPersentageForHalfYearly <= 100) echo $getGpa = "A+"; 
															  else if($totalPersentageForHalfYearly >=70 && $totalPersentageForHalfYearly < 80) echo $getGpa = "A";
															  else if($totalPersentageForHalfYearly >=60 && $totalPersentageForHalfYearly < 70) echo $getGpa = "A-"; 
															  else if($totalPersentageForHalfYearly >=50 && $totalPersentageForHalfYearly < 60) echo $getGpa = "B"; 
															  else if($totalPersentageForHalfYearly >=40 && $totalPersentageForHalfYearly < 50) echo $getGpa = "C"; 
															  else if($totalPersentageForHalfYearly >=33 && $totalPersentageForHalfYearly < 40) echo $getGpa = "D";  
															  else echo "F";
														   }else{
														      echo "Invalide";
														  }
														  
													    } 
												     ?>											   </td>
											  </tr>
										    </tbody> 
											<?php } ?> 
										    <tr>
												<th colspan="20" class="text-right"><a href="#" class="pull-right">Print</a></th>
											  </tr>
										  </table>
										</td>
									</tr>
								
								</tbody>
					  </table>
					  
					 <?php }else if(!empty($stuAnnualResultInfo)){ ?>
					      <table id="dynamic-table" class="table table-striped table-bordered ">

								<tbody>
									<tr> 
										
										<?php //print_r($stuDetailsInfo); 
											 foreach($stuAnnualResultInfo as $v) { 
											 
											 }
											 ?>
								      <td align="center" valign="middle" class="text-center"><strong>Class :</strong> <?php echo $v->class_name; ?>,&nbsp;&nbsp;&nbsp;<strong>Group :</strong> <?php echo $v->group_name; ?>,&nbsp;&nbsp;&nbsp;<strong>Section : </strong><?php echo $v->section_name; ?>,&nbsp;&nbsp;&nbsp;<strong>Shift :</strong> <?php echo $shiftInfo->shift_name; ?>,&nbsp;&nbsp;&nbsp;<strong>Year :</strong> <?php echo $v->year; ?>,&nbsp;&nbsp;&nbsp;<strong>Subject :</strong> <?php echo $subjectInfo->subject_name; ?>,&nbsp;&nbsp;&nbsp; <strong>Exam Name :</strong> <?php echo $examTypeAnnualInfo->exam_type_name; ?> </td>
									</tr>
									
									<tr> 
									    <td align="center" valign="middle" class="text-left">
										    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-condensed  table-striped table-bordered">
											  <thead>
											  </thead>
											  
											  <thead>
												  <tr style="background-color:#F9F9F9; border:2px solid #DDDDDD">
													<th>SL No</th>
													<th>Stu ID </th>
													<th>Stu Name </th>
												    <th class="text-center">Class Roll </th>
												    <th align="center" valign="middle" class="text-center">FE<br>FM </th>  
												    <th align="center" valign="middle" class="text-center">FE <br>OM<br></th>
												    <th align="center" valign="middle" class="text-center">HY <br>25% </th>
												    <th align="center" valign="middle" class="text-center">3M <br>12.5%</th> 
												    <th align="center" valign="middle" class="text-center">4M <br> 12.5%</th>
												    <th align="center" valign="middle" class="text-center">FE <br> 50%</th>
												    <th align="center" valign="middle" class="text-center">Total <br> 100%</th>
												    <th align="center" valign="middle" class="text-center">GPA</th>
												  </tr>
											  </thead> 
											  <?php 
												$slNo = 1;
												?>
											<tbody>	
											 
											<?php //print_r($stuDetailsInfo); 
											 foreach($stuAnnualResultInfo as $v) {
											    $totalFstMonthlyObtainedMarks  		= $v->ctfstExamMarksInfo + $v->fstmonthlyExamMarksInfo;
												$totalFstMonthlyFullMarks  			= $examTypefstCtInfo->total_marks + $examTypefstMonthLyInfo->total_marks;
												$totalSecondMonthlyObtainedMarks  	= $v->secondctExamMarksInfo + $v->secondmonthlyExamMarksInfo;
												$totalSecondMonthlyFullMarks  		= $examTypeSecondCtInfo->total_marks + $examTypeSecondMonthLyInfo->total_marks;
												
												
												$totalThirdMonthlyObtainedMarks  	= $v->ctThirdExamMarksInfo + $v->thirdmonthlyExamMarksInfo;
												$totalThirdMonthlyFullMarks  		= $examTypeThirdCtInfo->total_marks + $examTypeThirdMonthLyInfo->total_marks;
												$totalFourthMonthlyObtainedMarks  	= $v->fourthctExamMarksInfo + $v->fourthmonthlyExamMarksInfo;
												$totalFourthMonthlyFullMarks  		= $examTypeFourthCtInfo->total_marks + $examTypeFourthMonthLyInfo->total_marks;
												
												
												$halfYearly50Percentage     		= $v->halfyearlyExamMarksInfo * 50/$examTypehalfMonthLyInfo->total_marks;
												$fstMonthly25Percentage     		= $totalFstMonthlyObtainedMarks * 25/$totalFstMonthlyFullMarks;
												$secondMonthly25Percentage     		= $totalSecondMonthlyObtainedMarks * 25/$totalSecondMonthlyFullMarks;
												$totalPersentageForHalfYearly   	= $halfYearly50Percentage + $fstMonthly25Percentage + $secondMonthly25Percentage;
												$annualHalfYear25Percentage         = $totalPersentageForHalfYearly/4;
												
												$thirdMonthly12Percentage     		= $totalThirdMonthlyObtainedMarks * 12.5/$totalThirdMonthlyFullMarks;
												$fourthMonthly12Percentage     		= $totalFourthMonthlyObtainedMarks * 12.5/$totalFourthMonthlyFullMarks;
												$annual50Percentage     			= $v->annualExamMarksInfo * 50/$examTypeAnnualInfo->total_marks;
												
												$totalPercentageOfAnnual = $annualHalfYear25Percentage + $thirdMonthly12Percentage + $fourthMonthly12Percentage + $annual50Percentage; 
												
											  ?>
											  <tr style="background-color:#FFFFFF">
												<td><?php echo $slNo++; ?></td>
												<td><?php echo $v->stu_id; ?></td>
												<td><?php echo $v->stu_full_name; ?></td>
											    <td align="center" valign="middle"><?php echo $v->class_roll; ?></td>
											   <td align="center" valign="middle"><?php echo $examTypeAnnualInfo->total_marks; ?></td>
											    <td align="center" valign="middle"><?php  if($v->annualExamMarksInfo) { echo $v->annualExamMarksInfo+0; } else { echo "<span style='color:red' >No Entry</span>"; } ?></td>
											    <td align="center" valign="middle"><?php echo $annualHalfYear25Percentage;  ?></td>
											    <td align="center" valign="middle"><?php echo $thirdMonthly12Percentage;  ?></td>
											    <td align="center" valign="middle"><?php echo $fourthMonthly12Percentage;  ?></td>
											    <td align="center" valign="middle"><?php echo $annual50Percentage;  ?></td>
											    <td align="center" valign="middle"><?php echo $totalPercentageOfAnnual;  ?></td>
											    <td align="center" valign="middle">
												    <?php 
													   if(!empty($totalPercentageOfAnnual)){ 
													     if($totalPercentageOfAnnual <= 100 && $totalPercentageOfAnnual > 0){
															  if($totalPercentageOfAnnual >=80 && $totalPercentageOfAnnual <= 100) echo $getGpa = "A+"; 
															  else if($totalPercentageOfAnnual >=70 && $totalPercentageOfAnnual < 80) echo $getGpa = "A";
															  else if($totalPercentageOfAnnual >=60 && $totalPercentageOfAnnual < 70) echo $getGpa = "A-"; 
															  else if($totalPercentageOfAnnual >=50 && $totalPercentageOfAnnual < 60) echo $getGpa = "B"; 
															  else if($totalPercentageOfAnnual >=40 && $totalPercentageOfAnnual < 50) echo $getGpa = "C"; 
															  else if($totalPercentageOfAnnual >=33 && $totalPercentageOfAnnual < 40) echo $getGpa = "D";  
															  else echo "F";
														  }else{
														      echo "Invalide";
														  }
														  
													    } 
												     ?>	
											    </td>
											  </tr>
										    </tbody> 
											<?php } ?> 
										    <tr>
												<th colspan="22" class="text-right"><a href="#" class="pull-right">Print</a></th>
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
		 



