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
			<div class="container-flud">
				<div class="">
					
            			<?php $this->load->view('common/reportHeader'); ?>
						
						<h4 class="text-center"><u>Student Result Report</u></h4>
						
						<?php 
						    if(!empty($stuWiseResultInfo)) { 
							
							 if($exam_type_id ==5){
						 ?>
						 
						    <table id="dynamic-table" class="table table-striped table-bordered">
						
								<tbody>
									<tr> 
										
								      <td align="center" valign="middle" class="text-center"><strong>Class :</strong> <?php echo $className->class_name; ?>,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Section :</strong> <?php echo $sectionName->section_name; ?>,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Year :</strong> <?php echo $year; ?>,&nbsp;&nbsp;&nbsp;&nbsp; <strong>Exam Name :</strong> <?php echo $examName->exam_type_name ?></td>
									</tr>
									 
									<tr> 
									    <td align="center" valign="middle" class="text-left">
										  
											<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-condensed  table-striped table-bordered" style="font-size:10px;">
											  <thead>
											  </thead>
											 <?php
											      $colspan = 1; 
												  foreach ($allSubjectList as $v){
												     $colspan++; 
												  }
												  
												  
											?> 
											  <thead>
												  <tr style="background-color:#F9F9F9; border:2px solid #DDDDDD">
												    <th rowspan="2" align="center" valign="middle">SL No</th>
												    <th rowspan="2" align="center" valign="middle">Stu Name</th>
												    <th rowspan="2" align="center" valign="middle">Group</th>
												    <th align="center" valign="middle" colspan="<?php echo $colspan -1; ?>" class="text-center">Subject Name </th>
												    <th colspan="5" align="center" valign="middle" class="text-center">Total</th>
												    <th rowspan="2" align="center" valign="middle" class="text-center">Present<br>
Roll</th>
												    <th rowspan="2" align="center" valign="middle" class="text-center">Merit</th>
											    </tr>
												  <tr style="background-color:#F9F9F9; border:2px solid #DDDDDD">
													<?php foreach ($allSubjectList as $v){ ?><th align="center" valign="middle" class="text-center"><span style="font-size:10px"><?php echo $v->subject_name ?></span></th> <?php } ?>
												    <th align="center" valign="middle" class="text-center">Annual</th>
												    <th align="center" valign="middle" class="text-center">1st <br>Term</th>
												    <th align="center" valign="middle" class="text-center">2nd<br>
											        Term</th>
													<th align="center" valign="middle" class="text-center">3rd<br>
											        Term</th>
													<th align="center" valign="middle" class="text-center">Total<br>
											        Marks</th>
											      </tr>
											  </thead> 
											  <?php 
												$slNo = 1;
												?>
											<tbody>	
											 
											<?php 
											   foreach($stuWiseResultInfo as $v) { 
											 ?>
											
											  <tr style="background-color:#FFFFFF">
												<td><?php echo $slNo++; ?></td>
												<td><?php echo $v->stu_full_name; ?></td>
												<td><?php echo $v->group_name; ?></td>
											    <?php
												    $annualTotal 		= 0;
													$firstTermTotal 	= 0;
													$secondTermTotal 	= 0;
													$thirdTermTotal 	= 0;
												    foreach ($allSubjectList as $vs){
													 $annualExamInfo 	= $this->M_crud_ayenal->findById('obtained_subject_marks', array('subject_id' => $vs->id, 'stu_auto_id' =>$v->stu_auto_id, 'exam_type_id' => "5"));
													 $firstExamInfo   	= $this->M_crud_ayenal->findById('obtained_subject_marks', array('subject_id' => $vs->id, 'stu_auto_id' =>$v->stu_auto_id, 'exam_type_id' => "1"));
													 $secondExamInfo 	= $this->M_crud_ayenal->findById('obtained_subject_marks', array('subject_id' => $vs->id, 'stu_auto_id' =>$v->stu_auto_id, 'exam_type_id' => "2"));
													 $thirdExamInfo 	= $this->M_crud_ayenal->findById('obtained_subject_marks', array('subject_id' => $vs->id, 'stu_auto_id' =>$v->stu_auto_id, 'exam_type_id' => "3"));
													 
													 
													$annualTotal += $annualExamInfo->obtained_marks;
													$firstTermTotal += $firstExamInfo->obtained_marks;
												    $secondTermTotal += $secondExamInfo->obtained_marks;
													$thirdTermTotal += $thirdExamInfo->obtained_marks;
												 ?>
											    <td align="center" valign="middle"><?php if($annualExamInfo->obtained_marks) echo $annualExamInfo->obtained_marks; else echo "-"; ?></td>
											   <?php } ?>
											    <td align="center" valign="middle"><?php echo $annualTotal ?></td>
											    <td align="center" valign="middle"><?php echo $firstTermTotal ?></td>
											    <td align="center" valign="middle"><?php echo $secondTermTotal; ?></td>
												 <td align="center" valign="middle"><?php echo $thirdTermTotal; ?></td>
												  <td align="center" valign="middle"><?php echo $annualTotal + $firstTermTotal + $secondTermTotal + $thirdTermTotal; ?></td>
											    <td align="center" valign="middle"><?php echo $v->class_roll; ?></td>
											    <td align="center" valign="middle">
												  <?php 
												      if (array_key_exists($v->stu_auto_id, $allStudentAerray)) {
														 echo $allStudentAerray[$v->stu_auto_id];
													  }  
												  ?>
												</td>
											  </tr>
										    </tbody> 
											<?php } ?> 
										    
										  </table>
										</td>
									</tr>
								
								</tbody>
					  </table>
					        
							<?php }else{ ?> 
							
							   <table id="dynamic-table" class="table table-striped table-bordered">
						

								<tbody>
									<tr> 
										
								      <td align="center" valign="middle" class="text-center"><strong>Class :</strong> <?php echo $className->class_name; ?>,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Section :</strong> <?php echo $sectionName->section_name; ?>,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Year :</strong> <?php echo $year; ?>,&nbsp;&nbsp;&nbsp;&nbsp; <strong>Exam Name :</strong> <?php echo $examName->exam_type_name ?></td>
									</tr>
									 
									<tr> 
									    <td align="center" valign="middle" class="text-left">
										  
											<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-condensed  table-striped table-bordered" style="font-size:10px;">
											  <thead>
											  </thead>
											 <?php
											      $colspan = 1; 
												  foreach ($allSubjectList as $v){
												     $colspan++; 
												  }
												  
												 
												  
											?> 
											  <thead>
												  <tr style="background-color:#F9F9F9; border:2px solid #DDDDDD">
												    <th rowspan="2" align="center" valign="middle">SL No</th>
												    <th rowspan="2" align="center" valign="middle">Stu Name</th>
												    <th rowspan="2" align="center" valign="middle">Group</th>
												    <th align="center" valign="middle" colspan="<?php echo $colspan -1; ?>" class="text-center">Subject Name </th>
												    <th rowspan="2" align="center" valign="middle" class="text-center">Total<br>
											        Marks</th>
												    <th rowspan="2" align="center" valign="middle" class="text-center">Present<br>
Roll</th>
												    <th rowspan="2" align="center" valign="middle" class="text-center">Merit</th>
											    </tr>
												  <tr style="background-color:#F9F9F9; border:2px solid #DDDDDD">
													<?php foreach ($allSubjectList as $v){ ?><th align="center" valign="middle" class="text-center"><span style="font-size:10px"><?php echo $v->subject_name ?></span></th> <?php } ?>
											      </tr>
											  </thead> 
											  <?php 
												$slNo = 1;
												?>
											<tbody>	
											 
											<?php 
											   foreach($stuWiseResultInfo as $v) { 
											 ?>
											
											  <tr style="background-color:#FFFFFF">
												<td><?php echo $slNo++; ?>  <?php //echo $v->stu_auto_id; ?></td>
												<td><?php echo $v->stu_full_name; ?></td>
												<td><?php echo $v->group_name; ?></td>
											    <?php
												    $examTotal 		= 0;
												    foreach ($allSubjectList as $vs){
													
													 $examMarksInfo 	= $this->M_crud_ayenal->findById('obtained_subject_marks', array('subject_id' => $vs->id, 'stu_auto_id' =>$v->stu_auto_id, 'exam_type_id' => $exam_type_id));
													 $examTotal += $examMarksInfo->obtained_marks;
													
												 ?>
											    <td align="center" valign="middle"><?php if($examMarksInfo->obtained_marks) echo $examMarksInfo->obtained_marks; else echo "-"; ?></td>
											   <?php } ?>
											    <td align="center" valign="middle"><?php echo $examTotal; ?></td>
											    <td align="center" valign="middle"><?php echo $v->class_roll; ?></td>
											    <td align="center" valign="middle">
												<?php 
												    if (array_key_exists($v->stu_auto_id, $allStudentAerray)) {
														 echo $allStudentAerray[$v->stu_auto_id];
													} 
												?>
			                                   </td>
											  </tr>
										    </tbody> 
											<?php } ?> 
										  </table>
										</td>
									</tr>
								
								</tbody>
					  </table>
							
							<?php } ?>
					  
					  <p class="print" style="text-align:right; padding-right:20px; cursor:pointer; font-size:18px">Print</p>
					
					 <?php } else { ?>
<div class="alert alert-danger">
			<strong>Warning!</strong> Sorry System Could Not Find Anything. Please Check Information and Try Again!
		  </div>
		  			<?php } ?>
		  
			      
				</div>
			</div>
	</body>		
            
	</html>
         <?php $this->load->view('common/jsLinkPage'); ?>
		 
  <script>
     $('.print').click(function(e){
	    $(this).css("display", "none");
	    window.print();
		$(this).css("display", "block");
	 });
  </script>
		 



