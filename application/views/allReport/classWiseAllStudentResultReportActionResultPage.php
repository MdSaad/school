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
							
							if($exam_type_id ==5 || $exam_type_id ==6 || $exam_type_id ==7){
						 ?>
						 
							<table id="dynamic-table" class="table table-striped table-bordered" style="font-size:10px">
							
							  
	
									<tbody>
										<tr> 
											
										  <td align="center" valign="middle" class="text-center"><strong>Class :</strong> <?php echo $className->class_name; ?>,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Year :</strong> <?php echo $year; ?>,&nbsp;&nbsp;&nbsp;&nbsp; <strong>Exam Name :</strong> <?php echo $examName->exam_type_name ?></td>
										</tr>
										 
										<tr> 
											<td align="center" valign="middle" class="text-left">
											  
												<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-condensed  table-striped table-bordered">
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
														<th rowspan="2" align="center" valign="middle" class="text-center">Status</th>
														<th rowspan="2" align="center" valign="middle" class="text-center">Merit</th>
													</tr>
													  <tr style="background-color:#F9F9F9; border:2px solid #DDDDDD">
														<?php foreach ($allSubjectList as $v){ ?><th align="center" valign="middle" class="text-center"><span style="font-size:10px"><?php echo $v->subject_name ?></span></th> <?php } ?>
														<th align="center" valign="middle" class="text-center">Annual</th>
														<th align="center" valign="middle" class="text-center">Half <br>Yearly</th>
														<th align="center" valign="middle" class="text-center">Total<br>
														Marks</th>
													  </tr>
												  </thead> 
												  <?php 
													$slNo = 1;
													?>
												<tbody>	
												 
												<?php 
												   $status = "";
												   foreach($stuWiseResultInfo as $v) { 
												   
													
												 ?>
												
												  <tr style="background-color:#FFFFFF">
													<td><?php echo $slNo++; ?> </td>
													<td><?php echo $v->stu_full_name; ?></td>
													<td><?php echo $v->group_name; ?></td>
													<?php
														$annualTotal = 0;
														$halfTotal = 0;
														foreach ($allSubjectList as $vs){
														  $annualResult	  	    = $this->M_crud_ayenal->findById('obtained_subject_marks', array('subject_id' => $vs->id, 'stu_auto_id' =>$v->stu_auto_id, 'exam_type_id' => $annualXmId));
														  $annualObMarksMarks 	= $this->M_crud_ayenal->findById('exam_type_subjec_wise_total_marks', array('subject_id' => $vs->id, 'exam_type_id' => $annualXmId));
														  $halfYearResult  	 	= $this->M_crud_ayenal->findById('obtained_subject_marks', array('subject_id' => $vs->id, 'stu_auto_id' =>$v->stu_auto_id, 'exam_type_id' => "4"));
														
					
														$total = $annualResult->multi_choose_mark + $annualResult->written_marks + $annualResult->practicle_marks;
														$annualTotal += $total;
														$haftotal  = $halfYearResult->multi_choose_mark + $halfYearResult->written_marks + $halfYearResult->practicle_marks;    
														$halfTotal += $haftotal;
														
														$totalObtainMarks = $annualObMarksMarks->mcq_marks + $annualObMarksMarks->creative_marks + $annualObMarksMarks->practicle_marks; 
														
														$passPersentage  		=  $total * 100/$totalObtainMarks;
														
														
														if(!empty($passPersentage)){
														   if($passPersentage<33) $status = "Fail";
														}else{
															 $status = "Fail";
														}
														 
													 ?>
													<td align="center" valign="middle"><?php if($total) echo $total; else echo "-"; ?></td>
												   <?php } ?>
													<td align="center" valign="middle"><?php echo $annualTotal ?></td>
													<td align="center" valign="middle"><?php echo $halfTotal ?></td>
													<td align="center" valign="middle"><?php echo $annualTotal + $halfTotal; ?></td>
													<td align="center" valign="middle"><?php echo $v->class_roll; ?></td>
													<td align="center" valign="middle"><?php if(!empty($status)) echo $status; else echo "Pass"; ?></td>
													<td align="center" valign="middle">
													 
													    <?php 
															  if (array_key_exists($v->stu_auto_id, $allStudentAerray)) {
																 echo $allStudentAerray[$v->stu_auto_id];
															  }  
														 ?>
												  
												  
													</td>
												  </tr>
												</tbody> 
												<?php $status = ""; } ?> 
											  </table>
											</td>
										</tr>
									
									</tbody>
						  </table>
					  
					  <?php }else{ ?>
					  
					    <table id="dynamic-table" class="table table-striped table-bordered" style="font-size:10px">
						
						  

								<tbody>
									<tr> 
										
								      <td align="center" valign="middle" class="text-center"><strong>Class :</strong> <?php echo $className->class_name; ?>,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Year :</strong> <?php echo $year; ?>,&nbsp;&nbsp;&nbsp;&nbsp; <strong>Exam Name :</strong> <?php echo $examName->exam_type_name ?></td>
									</tr>
									 
									<tr> 
									    <td align="center" valign="middle" class="text-left">
										  
											<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-condensed  table-striped table-bordered">
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
												    <th rowspan="2" align="center" valign="middle" class="text-center">Status</th>
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
											   $status = "";
											   foreach($stuWiseResultInfo as $v) { 
											   
											   	
											 ?>
											
											  <tr style="background-color:#FFFFFF">
												<td><?php echo $slNo++; ?> </td>
												<td><?php echo $v->stu_full_name; ?></td>
												<td><?php echo $v->group_name; ?></td>
											    <?php
												   
													$halfTotal = 0;
												    foreach ($allSubjectList as $vs){
													  $halfYearResult  	 	= $this->M_crud_ayenal->findById('obtained_subject_marks', array('subject_id' => $vs->id, 'stu_auto_id' =>$v->stu_auto_id, 'exam_type_id' => $exam_type_id));
													  $halfObMarksMarks 	= $this->M_crud_ayenal->findById('exam_type_subjec_wise_total_marks', array('subject_id' => $vs->id, 'exam_type_id' => $exam_type_id));
													 
													
													$total = $halfYearResult->multi_choose_mark + $halfYearResult->written_marks + $halfYearResult->practicle_marks;
													$halfTotal += $total;
													$totalObtainMarks = $halfObMarksMarks->mcq_marks + $halfObMarksMarks->creative_marks + $halfObMarksMarks->practicle_marks; 
													
													$passPersentage  		=  $total * 100/$totalObtainMarks;
													
													
													if(!empty($passPersentage)){
													   if($passPersentage<33) $status = "Fail";
													}else{
													     $status = "Fail";
													}
													 
												 ?>
											    <td align="center" valign="middle"><?php if($total) echo $total; else echo "-"; ?></td>
											   <?php } ?>
											    <td align="center" valign="middle"><?php echo $halfTotal; ?></td>
											    <td align="center" valign="middle"><?php echo $v->class_roll; ?></td>
											    <td align="center" valign="middle"><?php if(!empty($status)) echo $status; else echo "Pass"; ?></td>
											    <td align="center" valign="middle">
												  <?php 
												      if (array_key_exists($v->stu_auto_id, $allStudentAerray)) {
														 echo $allStudentAerray[$v->stu_auto_id];
													  }  
												  ?>
												</td>
											  </tr>
										    </tbody> 
											<?php $status = ""; } ?> 
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
		 



