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
						    if(!empty($stuWiseElevenResultInfo)){ 
							
							 if($exam_type_id == 10){
						 ?>
						 
								<table id="dynamic-table" class="table table-striped table-bordered">
								
										<tbody>
											<tr> 
												
											  <td align="center" valign="middle" class="text-center"><strong>Class :</strong> <?php echo $className->class_name; ?>,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Year :</strong> <?php echo $year; ?>,&nbsp;&nbsp;&nbsp;&nbsp; <strong>Exam Name :</strong> <?php echo $examName->exam_type_name ?> </td>
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
															<th colspan="4" align="center" valign="middle" class="text-center">Total</th>
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
															
															<th align="center" valign="middle" class="text-center">Total<br>
															Marks</th>
														  </tr>
													  </thead> 
													  <?php 
														$slNo = 1;
														?>
													<tbody>	
													 
													<?php 
													   foreach($stuWiseElevenResultInfo as $v) { 
													  
													 ?>
													
													  <tr style="background-color:#FFFFFF">
														<td><?php echo $slNo++; ?></td>
														<td><?php echo $v->stu_full_name; ?></td>
														<td><?php echo $v->group_name; ?></td>
														<?php
															$annualTotal 		= 0;
															$firstTermTotal 	= 0;
															$secondTermTotal 	= 0;
															
															foreach ($allSubjectList as $vs){
															
																$yearFinal  	= $this->M_crud->findById('obtained_subject_marks', array('subject_id' => $vs->id, 'stu_auto_id' =>$v->stu_auto_id, 'exam_type_id' => "10"));
																$firstterm  	= $this->M_crud->findById('obtained_subject_marks', array('subject_id' => $vs->id, 'stu_auto_id' =>$v->stu_auto_id, 'exam_type_id' => "8"));
																$secondterm  	= $this->M_crud->findById('obtained_subject_marks', array('subject_id' => $vs->id, 'stu_auto_id' =>$v->stu_auto_id, 'exam_type_id' => "9"));
																
																$totalAn   		= $yearFinal->multi_choose_mark + $yearFinal->written_marks + $yearFinal->practicle_marks;
																$totalFirst   	= $firstterm->multi_choose_mark + $firstterm->written_marks + $firstterm->practicle_marks;
																$totalSecond   	= $secondterm->multi_choose_mark + $secondterm->written_marks + $secondterm->practicle_marks;
																
																$annualTotal += $totalAn;
																$firstTermTotal += $totalFirst;
																$secondTermTotal += $totalSecond;
															 
															
														 ?>
														<td align="center" valign="middle"><?php if($totalAn) echo $totalAn; else echo "-"; ?></td>
													   <?php } ?>
														<td align="center" valign="middle"><?php echo $annualTotal ?></td>
														<td align="center" valign="middle"><?php echo $firstTermTotal ?></td>
														<td align="center" valign="middle"><?php echo $secondTermTotal; ?></td>
														
														  <td align="center" valign="middle"><?php echo $annualTotal + $firstTermTotal + $secondTermTotal; ?></td>
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
												
											  <td align="center" valign="middle" class="text-center"><strong>Class :</strong> <?php echo $className->class_name; ?>,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Year :</strong> <?php echo $year; ?>,&nbsp;&nbsp;&nbsp;&nbsp; <strong>Exam Name :</strong> <?php echo $examName->exam_type_name ?></td>
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
													   foreach($stuWiseElevenResultInfo as $v) { 
													  
													 ?>
													
													  <tr style="background-color:#FFFFFF">
														<td><?php echo $slNo++; ?></td>
														<td><?php echo $v->stu_full_name; ?></td>
														<td><?php echo $v->group_name; ?></td>
														<?php
															$marksTotal 		= 0;
															foreach ($allSubjectList as $vs){
																$marksInfo  	= $this->M_crud->findById('obtained_subject_marks', array('subject_id' => $vs->id, 'stu_auto_id' =>$v->stu_auto_id, 'exam_type_id' => $exam_type_id));
																$totalAn   		= $marksInfo->multi_choose_mark + $marksInfo->written_marks + $marksInfo->practicle_marks;
																$marksTotal += $totalAn;
																
															
														 ?>
														<td align="center" valign="middle"><?php if($totalAn) echo $totalAn; else echo "-"; ?></td>
													   <?php } ?>
														<td align="center" valign="middle"><?php echo $marksTotal; ?></td>
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
						
					 <?php
					     } else if($stuWiseTwelveResultInfo) {
						 
						 if($exam_type_id == 12){
					  ?>	
					 
					     <table id="dynamic-table" class="table table-striped table-bordered">
						
								<tbody>
									<tr> 
										
								      <td align="center" valign="middle" class="text-center"><strong>Class :</strong> <?php echo $className->class_name; ?>,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Year :</strong> <?php echo $year; ?>,&nbsp;&nbsp;&nbsp;&nbsp; <strong>Exam Name :</strong> <?php echo $examName->exam_type_name ?></td>
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
												    <th colspan="3" align="center" valign="middle" class="text-center">Total</th>
												    <th rowspan="2" align="center" valign="middle" class="text-center">Present<br>
Roll</th>
												    <th rowspan="2" align="center" valign="middle" class="text-center">Merit</th>
											    </tr>
												  <tr style="background-color:#F9F9F9; border:2px solid #DDDDDD">
													<?php foreach ($allSubjectList as $v){ ?><th align="center" valign="middle" class="text-center"><span style="font-size:10px"><?php echo $v->subject_name ?></span></th> <?php } ?>
												    <th align="center" valign="middle" class="text-center">Annual</th>
												    <th align="center" valign="middle" class="text-center">Pre <br>Test</th>
												    
													
													<th align="center" valign="middle" class="text-center">Total<br>
											        Marks</th>
											      </tr>
											  </thead> 
											  <?php 
												$slNo = 1;
												?>
											<tbody>	
											 
											<?php 
											   foreach($stuWiseTwelveResultInfo as $v) { 
											   
											   
											 ?>
											
											  <tr style="background-color:#FFFFFF">
												<td><?php echo $slNo++; ?></td>
												<td><?php echo $v->stu_full_name; ?></td>
												<td><?php echo $v->group_name; ?></td>

											    <?php
												    $annualTotal 	= 0;
													$preTestTotal 	= 0;
													
													
												    foreach ($allSubjectList as $vs){
													
													  $testMarks  		= $this->M_crud->findById('obtained_subject_marks', array('subject_id' => $vs->id, 'stu_auto_id' =>$v->stu_auto_id, 'exam_type_id' => "12"));
													  $preTestMarks  	= $this->M_crud->findById('obtained_subject_marks', array('subject_id' => $vs->id, 'stu_auto_id' =>$v->stu_auto_id, 'exam_type_id' => "11"));
													  
													  $totalAn   		= $testMarks->multi_choose_mark + $testMarks->written_marks + $testMarks->practicle_marks;
													  $totalPreTest     = $preTestMarks->multi_choose_mark + $preTestMarks->written_marks + $preTestMarks->practicle_marks;
													
													
													  $annualTotal += $totalAn;
													  $preTestTotal += $totalPreTest;
													
													 
													
												 ?>
											    <td align="center" valign="middle"><?php if($totalAn) echo $totalAn; else echo "-"; ?></td>
											   <?php } ?>
											    <td align="center" valign="middle"><?php echo $annualTotal ?></td>
											    <td align="center" valign="middle"><?php echo $preTestTotal ?></td>
											    
												
												  <td align="center" valign="middle"><?php echo $annualTotal + $preTestTotal; ?></td>
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
					  
					 <?php } else { ?>
					 
					    <table id="dynamic-table" class="table table-striped table-bordered">
						
								<tbody>
									<tr> 
										
								      <td align="center" valign="middle" class="text-center"><strong>Class :</strong> <?php echo $className->class_name; ?>,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Year :</strong> <?php echo $year; ?>,&nbsp;&nbsp;&nbsp;&nbsp; <strong>Exam Name :</strong> <?php echo $examName->exam_type_name ?></td>
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
											   foreach($stuWiseTwelveResultInfo as $v) { 
											   
											   
											 ?>
											
											  <tr style="background-color:#FFFFFF">
												<td><?php echo $slNo++; ?></td>
												<td><?php echo $v->stu_full_name; ?></td>
												<td><?php echo $v->group_name; ?></td>

											    <?php
												    $examTotal 	= 0;
												    foreach ($allSubjectList as $vs){
													
													  $preTestMarks  	= $this->M_crud->findById('obtained_subject_marks', array('subject_id' => $vs->id, 'stu_auto_id' =>$v->stu_auto_id, 'exam_type_id' => $exam_type_id));
													  $totalAn   		= $preTestMarks->multi_choose_mark + $preTestMarks->written_marks + $preTestMarks->practicle_marks;
													  $examTotal += $totalAn;
													
												 ?>
											    <td align="center" valign="middle"><?php if($totalAn) echo $totalAn; else echo "-"; ?></td>
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
		 



