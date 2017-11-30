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
		<link rel="stylesheet" href="<?php echo base_url('resource/css/custom.css'); ?>">
		
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
						
						  // get all friday 
						  
						  function getFridays($month,$year){
							  $ts=strtotime('first friday of '.$year.'-'.$month.'-01');
							  $ls=strtotime('last day of '.$year.'-'.$month.'-01');
							  $fridays=array(date('Y-m-d', $ts));
							  while(($ts=strtotime('+1 week', $ts))<=$ls){
								$fridays[]=date('Y-m-d', $ts);
							  }
							
							  return $fridays;
							}

	
						    if(!empty($dateRangeAttendenceData)) { 
							  
						 ?>
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableStyle">
								 <thead>
									  <tr>
										<th colspan="11" class="text-center">
											 <?php $this->load->view('common/reportHeader'); ?>
											<h4 class="text-center">Student Attendence Report</h4>
										</th>
									  </tr>
								  </thead> 
								  
							   <?php 
							       
								    foreach($dateRangeAttendenceData as $v){
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
							
								  <thead>
								      <tr>
										<th colspan="11" class="text-center">
											<h4 class="text-center"><?php echo $branchName->branch_name ?></h4>										</th>
									  </tr>
								  </thead> 
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
									
									$allStudent  =  $this->M_join->findAllAttnStuInfo('class_wise_info', $whereStu, 'class_wise_info.class_roll', 'asc'); 
									  
								   $i  = 1; 
								   foreach($allStudent as $vs){
										  
									
									   
							    ?>
								  
								   <thead>
								     <tr style="background-color:#E0E0E0"> 
										<th colspan="11" class="text-center" style="padding:0">
										   <table width="100%" border="0" cellspacing="0" cellpadding="0" height="20" style="font-size: 15px; border:none !important" class="tableStyleNone">
											  <tr>
											    <td align="center" valign="middle">Sl No : <?php echo $i++; ?> </td>
											    <td align="center" valign="middle">Class : <span style="font-weight:normal"><?php echo $className->class_name; ?></span></td>
											    <td align="center" valign="middle"> Student Name  : <span style="font-weight:normal"> <?php echo $vs->stu_full_name; ?></span></td>
											    <td align="center" valign="middle">Student Id  : <span style="font-weight:normal"><?php echo $vs->stu_id; ?></span></td>
											    <td align="center" valign="middle">Class Roll : <span style="font-weight:normal"> <?php echo $vs->class_roll ?></span></td>
										     </tr>
									    </table></th>
									  </tr>
								   </thead>
								  
								  
								  <thead>
									  <tr>
										<th><strong>Month</strong></th>
										<th><strong>Total day</strong></th>
										<th><strong>Total Holyday</strong></th>
										<th><strong>Total work day</strong></th>
										<th><strong>Total Present</strong></th>
										<th><strong>Total Abs</strong></th>
										<th><strong>Total Undefined </strong></th>
										<th><strong>Present % </strong></th>
										<th><strong>Absent % </strong></th>
									  </tr>
								  </thead> 
								   <?php
									   $stuWiseMonthLyData  = $this->M_crud_ayenal->findAllGroup('attendence_information', array("date >=" => $fromDate, "date <=" => $toDate), 'month_year', 'asc', 'month_year');	 
										  
										 foreach($stuWiseMonthLyData as $vm){
										 $dateFormate 	= strtotime($vm->month_year);
										 $part 			= explode("-", $vm->month_year);
										 $numberOfDay 	=  date("t",mktime(0,0,0,$part[1],1,$part[0])); 
										 
										  $firstDaty 	= date($vm->month_year.'-01');
										  $lastDaty  	= date($vm->month_year.'-t');
										  
										 
										 $fridays 		= getFridays($part[1],$part[0]);	
										 
										 $totalCustomHolyDay  = $this->M_crud_ayenal->countAll('day_to_day_holyday_manage', array('branch_id' => $v->branc_id, 'class_id' => $vc->class_id, 'month_year' => $vm->month_year));
										 
										 $totalHolyDay 	= sizeof($fridays) + $totalCustomHolyDay;

									     $totalWorkDay  = $numberOfDay - $totalHolyDay; 
										 
										 $studentAttnData  	   = $this->M_crud_ayenal->countAll('attendence_information', array("month_year" => $vm->month_year, 'student_auto_id' => $vs->id, 'action' => "present", 'date >=' =>$fromDate, 'date <=' =>$toDate));
			    						 $studentAbsenceData   = $this->M_crud_ayenal->countAll('attendence_information', array("month_year" => $vm->month_year, 'student_auto_id' => $vs->id, 'action' => "absent", 'date >=' =>$fromDate, 'date <=' =>$toDate));

										  
										  $undefine  = $totalWorkDay - ($studentAttnData + $studentAbsenceData);
										  
											 
								   ?>
							  
								        <tbody>	
										 
										
										  <tr>
											<td align="left" valign="middle"><?php echo date('M-Y', $dateFormate); ?></td>
											<td align="left" valign="middle"><?php echo  $numberOfDay ?></td>
											<td align="left" valign="middle"><?php echo  $totalHolyDay ?></td>
											<td align="left" valign="middle"><?php echo  $totalWorkDay ?></td>
											<td align="left" valign="middle"><?php echo  $studentAttnData ?></td>
											<td align="left" valign="middle"><?php echo  $studentAbsenceData ?></td>
											<td align="left" valign="middle"><?php echo  $undefine; ?></td>
											<td align="left" valign="middle"><?php $prePercentage = $studentAttnData * 100/$totalWorkDay; echo number_format($prePercentage,2); ?> %</td>
											<td align="left" valign="middle" ><?php $absPercentage = $studentAbsenceData * 100/$totalWorkDay; echo number_format($absPercentage,2); ?>%</td>
										  </tr>
										</tbody> 
										  
								
								 <?php
								        }  // end monthly loop
								 
								        }  // end student loop 
								       
								       } // end class loop
								      } // end branch loop
								 ?>
								</table>
						
					  <?php } else if(!empty($studentDetails)){// end if statement  ?> 
					  
					     <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableStyle">
								 <thead>
									  <tr>
										<th colspan="11" class="text-center">
											 <?php $this->load->view('common/reportHeader'); ?>
											<h4 class="text-center">Student Attendence Report</h4>
										</th>
									  </tr>
						   </thead> 
								  
								  <thead>
								     <tr style="background-color:#E0E0E0">
										<th colspan="11" class="text-center" style="padding:0">
										   <table width="100%" border="0" cellspacing="0" cellpadding="0" height="20" style="font-size: 15px" class="tableStyleNone">
											  <tr>
											    <td align="center" valign="middle">Class : <span style="font-weight:normal"><?php echo $studentDetails->class_name; ?></span></td>
											    <td align="center" valign="middle"> Student Name  : <span style="font-weight:normal"> <?php echo $studentDetails->stu_full_name; ?></span></td>
											    <td align="center" valign="middle">Student Id  : <span style="font-weight:normal"><?php echo $studentDetails->stu_id; ?></span></td>
											    <td align="center" valign="middle">Class Roll : <span style="font-weight:normal"> <?php echo $studentDetails->class_roll ?></span></td>
										     </tr>
									    </table>
										</th>
									  </tr>
								   </thead>
								   
								   
								   <thead>
									  <tr>
										<th><strong>Month</strong></th>
										<th><strong>Total day</strong></th>
										<th><strong>Total Holyday</strong></th>
										<th><strong>Total work day</strong></th>
										<th><strong>Total Present</strong></th>
										<th><strong>Total Abs</strong></th>
										<th><strong>Total Undefined </strong></th>
										<th><strong>Present % </strong></th>
										<th><strong>Absent % </strong></th>
									  </tr>
								  </thead> 
								  
								   
								 <?php 
								     $stuMonthLyAttnData  = $this->M_crud_ayenal->findAllGroup('attendence_information', array("date >=" => $fromDate, "date <=" => $toDate), 'month_year', 'asc', 'month_year');	
									 foreach($stuMonthLyAttnData as $vsm){
										$monthName 	    = strtotime($vsm->month_year);
										$part 		    = explode("-", $vsm->month_year);
										$numberOfDay 	= date("t",mktime(0,0,0,$part[1],1,$part[0]));
										
										$firstDaty 		= date($vsm->month_year.'-01');
										$lastDaty  		= date($vsm->month_year.'-t');
										$fridays 		= getFridays($part[1],$part[0]);	
										 
										$totalCustomHolyDay  = $this->M_crud_ayenal->countAll('day_to_day_holyday_manage', array('branch_id' => $studentDetails->branc_id, 'class_id' => $studentDetails->class_id, 'month_year' => $vsm->month_year));
										 
										 $totalHolyDay 	= sizeof($fridays) + $totalCustomHolyDay;

									     $totalWorkDay  = $numberOfDay - $totalHolyDay; 
										 
										 $studentAttnData  	   = $this->M_crud_ayenal->countAll('attendence_information', array("month_year" => $vsm->month_year, 'student_auto_id' => $studentDetails->stu_auto_id, 'action' => "present", 'date >=' =>$fromDate, 'date <=' =>$toDate));
			    						 $studentAbsenceData   = $this->M_crud_ayenal->countAll('attendence_information', array("month_year" => $vsm->month_year, 'student_auto_id' => $studentDetails->stu_auto_id, 'action' => "absent", 'date >=' =>$fromDate, 'date <=' =>$toDate));

										  
										  $undefine  = $totalWorkDay - ($studentAttnData + $studentAbsenceData);
										  
								 ?>
								  
								   <tbody>	
										 
										
										  <tr>
											<td align="left" valign="middle"><?php echo date('M-Y', $monthName); ?></td>
											<td align="left" valign="middle"><?php echo  $numberOfDay ?></td>
											<td align="left" valign="middle"><?php echo  $totalHolyDay ?></td>
											<td align="left" valign="middle"><?php echo  $totalWorkDay ?></td>
											<td align="left" valign="middle"><?php echo  $studentAttnData ?></td>
											<td align="left" valign="middle"><?php echo  $studentAbsenceData ?></td>
											<td align="left" valign="middle"><?php echo  $undefine; ?></td>
											<td align="left" valign="middle"><?php $prePercentage = $studentAttnData * 100/$totalWorkDay; echo number_format($prePercentage,2); ?> %</td>
											<td align="left" valign="middle"><?php $absPercentage = $studentAbsenceData * 100/$totalWorkDay; echo number_format($absPercentage,2); ?>%</td>
										  </tr>
										</tbody> 
										
								<?php } ?>
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
		 



