<!DOCTYPE html>
<html lang="en">
<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $title; ?></title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="<?php echo base_url("resource/assets/css/bootstrap.min.css"); ?>" />
		<link rel="stylesheet" href="<?php echo base_url("resource/css/animate.css"); ?>" />
		<link rel="stylesheet" href="<?php echo base_url("resource/assets/font-awesome/4.2.0/css/font-awesome.min.css"); ?>" />
		<link href="<?php echo base_url('resource/css/custom.css'); ?>" rel="stylesheet">
		
		
		<style>
		   
			.tableStyle tr th{
				border:1px solid #000000 !important;
				padding:5px 5px 5px 5px;
			} 
			.tableStyle tr td{
				border:1px solid #000000 !important;
				padding:5px 5px 5px 5px;
			} 
			
			.tableStyleNone tr th{
				border:none !important;
			} 
			.tableStyleNone tr td{
				border:none !important;
			} 
					
			
			
		</style>
</head>
	<body>
			<div class="container">
				<div class="">
					<div class="aFourSize">
            			
						<?php 
						    if(!empty($dailyAttendenceData)) { 
							  
									   
								
												   
						 ?>
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableStyle">
								 <thead>
									  <tr>
										<th colspan="8" class="text-center">
											 <?php $this->load->view('common/reportHeader'); ?>
											<h4 class="text-center">Student Attendence Report</h4>
										</th>
									  </tr>
								 
								  
							   <?php 
							       
								    foreach($dailyAttendenceData as $v){
									$branchName   = $this->M_crud->findById('branch_list_manage', array('id' => $v->branc_id));
									$where2 = array('class_wise_info.branc_id' => $v->branc_id);
									if(!empty($class_id) || !empty($group_id) || !empty($shift_id) || !empty($section_id)  || !empty($year )){
										if(!empty($class_id))    $where2['class_wise_info.class_id']  		         = $class_id;
										if(!empty($group_id))    $where2['class_wise_info.class_group_id']  		 = $group_id;
										if(!empty($section_id))  $where2['class_wise_info.class_section_id']  		 = $section_id;
										if(!empty($shift_id))    $where2['class_wise_info.class_shift_id']  		 = $shift_id;
										if(!empty($year))        $where2['class_wise_info.year']  		             = $year;
									}
									$allClassInfo = $this->M_crud_ayenal->findAllGroup('class_wise_info', $where2, $orderBy = 'class_sl_no', 'asc', $groupBy = 'class_id');
									
							   ?>
							
								 
								      <tr>
										<th colspan="8" class="text-center">
											<h4 class="text-center"><?php echo $branchName->branch_name ?></h4>
										</th>
									  </tr>
									  
								 
							   <?php 
							        foreach($allClassInfo as $vc){
									$className   = $this->M_crud->findById('class_list_manage', array('id' => $vc->class_id));
									
									
									$whereStu = array('class_wise_info.branc_id' => $vc->branc_id, 'class_wise_info.class_id' => $vc->class_id);
									if(!empty($group_id) || !empty($shift_id) || !empty($section_id)  || !empty($year )){
										if(!empty($group_id))    $whereStu['class_wise_info.class_group_id']  		= $group_id;
										if(!empty($section_id))  $whereStu['class_wise_info.class_section_id']  	= $section_id;
										if(!empty($shift_id))    $whereStu['class_wise_info.class_shift_id']  		= $shift_id;
										if(!empty($year))        $whereStu['class_wise_info.year']  		        = $year;
									}
									
									$allStudent  =  $this->M_crud_ayenal->findAllAttnInfo('class_wise_info', $whereStu, 'class_wise_info.class_roll', 'asc', $attnDate); 
									
									   $totalPresent  = 0; 
									   $totalAbs = 0;
									   foreach($allStudent as $vp){
										   if(!empty($vp->attnInfo)){
											  if($vp->attnInfo->action =='present' ){
												 $totalPresent += 1; 
											  }else{
											     $totalAbs += 1;
											  }
										   }
									}
							    ?>
								 
								   
								     <tr>
										<th colspan="8" class="text-center">
										   <table width="100%" border="0" cellspacing="0" cellpadding="0" height="50" style="font-size: 15px" class="tableStyleNone">
											  <tr>
											    <td align="center" valign="middle">Class : <span style="font-weight:normal"><?php echo $className->class_name; ?></span></td>
											    <td align="center" valign="middle"> Date  : <span style="font-weight:normal"> <?php echo $attnDate; ?></span></td>
											    <td align="center" valign="middle">Total Student : <span style="font-weight:normal"><?php echo sizeof($allStudent); ?></span></td>
											    <td align="center" valign="middle">Total Present : <span style="font-weight:normal"> <?php echo $totalPresent ?></span></td>
											    <td align="center" valign="middle">Total Absence :  <span style="font-weight:normal"><?php echo $totalAbs;  ?></span></td>
											    <td align="center" valign="middle">Undefine : <span style="font-weight:normal"><?php echo sizeof($allStudent) -($totalPresent + $totalAbs); ?></span></td>
											    <td align="center" valign="middle">Attendence Percentage : <span style="font-weight:normal"><?php  $percentage = $totalPresent * 100/sizeof($allStudent); echo number_format($percentage,2); ?> %</span></td>
										     </tr>
										   </table>
										</th>
								   </tr>
								  
								  
								  
								
									  <tr>
										<th width="7%" align="center" valign="middle" class="text-center">SL No</th>
										<th width="37%">Student Name </th>
										<th width="9%">ID </th>
										<th width="15%">Group</th>
										<th width="16%">Section</th>
										<th width="16%">Status </th>
									  </tr>
							  </thead> 
								   <?php
										 
										   $chkAttnData = $this->M_crud->findById('attendence_information', array('branch_id' => $vc->branc_id, 'class_id' => $vc->class_id, 'date' => $attnDate));
										  
										   
										   $i  = 1; 
										   foreach($allStudent as $vs){
										   $whereAttn = array('student_auto_id' => $vs->stu_auto_id, 'date' => $attnDate);
										   if(!empty($report_type)){ 
												if($report_type !='both') $whereAttn['action'] = $report_type;
										   }
										   $studentPresentData = $this->M_crud->findById('attendence_information', $whereAttn);
										   
										   
										   
										   if($report_type =='both' || $report_type==''){
											 
								   ?>
							  
								        <tbody>	
										 
										
										  <tr>
											<td align="center" valign="middle" class="tableStyle2" style="border-bottom:1px solid #000000 !important"><?php echo  $i++ ?></td>
											<td align="left" valign="middle"><?php echo  $vs->stu_full_name ?></td>
											<td align="left" valign="middle"><?php echo  $vs->stu_id ?></td>
											<td align="left" valign="middle"><?php echo  $vs->group_name ?></td>
											<td align="left" valign="middle"><?php echo  $vs->section_name ?></td>
											<td align="left" valign="middle">
											   <?php  if(!empty($studentPresentData)){  if($studentPresentData->action =='present'){ echo '<span class="text-success">Present</span>'; }else{ echo '<span class="text-danger">Absent</span>'; } } else { echo '<span class="text-warning">Undefined</span>';} ?>
											</td>
										  </tr>
										 
										</tbody> 
										
										 <?php
										     }else{  // end report_type statement
											   if(!empty($chkAttnData)){
											      if(!empty($studentPresentData)){ 
									     ?>
													  <tbody>	
													 
													
													  <tr>
														<td align="center" valign="middle"><?php echo  $i++ ?></td>
														<td align="left" valign="middle"><?php echo  $vs->stu_full_name ?></td>
														<td align="left" valign="middle"><?php echo  $vs->stu_id ?></td>
														<td align="left" valign="middle"><?php echo  $vs->group_name ?></td>
														<td align="left" valign="middle"><?php echo  $vs->section_name ?></td>
														<td align="left" valign="middle">
														   <?php  if($studentPresentData->action =='present'){ echo '<span class="text-success">Present</span>'; }else{ echo '<span class="text-danger">Absent</span>'; } ?>
														</td>
													  </tr>
													 
													</tbody> 
										
												
												  <?php 
													 
													 }      // end studentPresentData statement
												   }else{  // end chkAttnData statement
												 ?>
										 <tbody>	
										   <tr>
											<td align="left" colspan="6" height="20" valign="middle" class="text-center"><h3>No record Found !</h3></td>
											
										  </tr>
							  </tbody> 
										  
										  
								    <?php 
										     break; 
											} 
									      } 
										}  // end student loop 
								    ?> 
										
										
								
								 <?php
								       
								       } // end class loop
								      } // end branch loop
								 ?>

								
								
					  </table>
						
					  <?php } else if(!empty($studentDetails)){// end if statement  ?> 
					  
					     <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableStyle">
								 <thead>
									  <tr>
										<th colspan="8" class="text-center">
											 <?php $this->load->view('common/reportHeader'); ?>
											<h4 class="text-center">Student Attendence Report</h4>
										</th>
									  </tr>
						   </thead> 
								  
								  <thead>
									  <tr>
										
										<th>Student Name </th>
										<th>ID </th>
										<th>Group</th>
										<th>Section</th>
										<th>Status </th>
									  </tr>
								  </thead> 
								  
								  <tbody>	
									  <tr>
										<td align="left" valign="middle"><?php echo  $studentDetails->stu_full_name ?></td>
										<td align="left" valign="middle"><?php echo  $studentDetails->stu_id ?></td>
										<td align="left" valign="middle"><?php echo  $studentDetails->group_name ?></td>
										<td align="left" valign="middle"><?php echo  $studentDetails->section_name ?></td>
										<td align="left" valign="middle">
										   <?php  if(!empty($stuAttendenceResult)){  if($stuAttendenceResult->action =='present'){ echo '<span class = text-success">Present</span>'; }else{ echo '<span class="text-danger">Absent</span>'; } } else { echo '<span class="text-warning">Undefined</span>'; } ?>
										</td>
									  </tr>
									 
								 </tbody> 
					  </table>
					  
					  <?php }else{ ?>
					      
						  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-condensed  table-striped table-bordered">
								 <thead>
									  <tr>
										<th colspan="8" class="text-center">
											 <?php $this->load->view('common/reportHeader'); ?>
											<h4 class="text-center">Student Attendence Report</h4>
										</th>
									  </tr>
						    </thead> 
								  
								   <tbody>	
							  <tr>
								<td align="left" colspan="6" height="20" valign="middle" class="text-center"><h3>No Record Found !</h3></td>
							  </tr>
						 </tbody>
								 
					  </table>
					      
					  <?php } ?>
					  
					  <div class="col-md-12"><a href="#" class="pull-right print">Print</a></div>
					  <br><br>
					  
					  
					
		  
			      </div>
				</div>
			</div>
	</body>		
            
	</html>
         <?php $this->load->view('common/jsLinkPage'); ?>
		  <script type="text/javascript">
			$(document).on('click', '.print',  function(){
			    $(this).css('display', 'none');
				window.print();
			});
		 </script>
		 



