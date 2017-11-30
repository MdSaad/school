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
	  
							  function getFridays($month,$year)
							  {
								  $ts=strtotime('first friday of '.$year.'-'.$month.'-01');
								  $ls=strtotime('last day of '.$year.'-'.$month.'-01');
								  $fridays=array(date('Y-m-d', $ts));
								  while(($ts=strtotime('+1 week', $ts))<=$ls){
									$fridays[]=date('Y-m-d', $ts);
								  }
								  return $fridays;
								}

							 if(!empty($empDetails)){
					   ?>
					   
						  <table  width="100%" border="0" class="tableStyle">
						        
								 <thead>
									  <tr>
										<th colspan="9" class="text-center">
											 <?php $this->load->view('common/reportHeader'); ?>
											<h4 class="text-center">Employee Attendence Report</h4>										</th>
									  </tr>
								  </thead> 
								
								<tr style="background-color:#E0E0E0">
								  <td align="left" valign="middle"><strong style="font-size: 14px">Sl No : </strong> <?php echo $sl++ ?></td>
								  <td colspan="2" align="left" valign="middle"><strong style="font-size: 14px">Employee Name : </strong> <?php echo $empDetails->employee_full_name ?></td>
								  <td align="left" valign="middle"><strong style="font-size: 14px">Employee Id : </strong> <?php echo $empDetails->employee_id ?></td>
								  <td colspan="5" align="left" valign="middle"><strong style="font-size: 14px">Designition : </strong><?php echo $empDetails->designition_name ?></td>
							 </tr>
								<tr>
									<td width="8%" align="left" valign="middle"><strong>Month</strong></td>
									<td width="13%" align="left" valign="middle"><strong>Total day</strong></td>
									<td width="15%" align="left" valign="middle"><strong>Total Holyday</strong></td>
									<td width="16%" align="left" valign="middle"><strong>Total working day</strong></td>
									<td width="16%" align="left" valign="middle"><strong>Leave Archeve</strong></td>
									<td width="15%" align="left" valign="middle"><strong>Total Present</strong></td>
									<td width="8%" align="left" valign="middle"><strong>Total Abs</strong></td>
									<td width="10%" align="left" valign="middle"><strong>Training</strong></td>
									<td width="10%" align="left" valign="middle"><strong>Undefined</strong> </td>
								  </tr>
								
								  <?php 
									  $empWiseMonthLyAttnData  = $this->M_crud_ayenal->findAllGroup('employee_attendence_information', array("date >=" => $fromDate, "date <=" => $toDate), 'month_year', 'asc', 'month_year');	 
									  
									  foreach($empWiseMonthLyAttnData as $va){
										$dateFormate 	= strtotime($va->month_year);
										$part 			= explode("-", $va->month_year);
										$numberOfDay 	= date("t",mktime(0,0,0,$part[1],1,$part[0])); 
										
										$firstDaty 		= date($va->month_year.'-01');
										$lastDaty  		= date($va->month_year.'-t');
										$fridays 		= getFridays($part[1],$part[0]);
										
										
										$totalCustomHolyDay  = $this->M_crud_ayenal->countAll('emp_day_to_day_holyday_manage', array('domain_id' => $empDetails->domain_id, 'branch_id' => $empDetails->branch_id, 'month_year' => $va->month_year));
					 
										$totalHolyDay 	= sizeof($fridays) + $totalCustomHolyDay;
										
										$totalWorkDay   = $numberOfDay - $totalHolyDay; 
										
										$totalLeave     = $this->M_crud_ayenal->countAll('employee_attendence_information', array("month_year" => $va->month_year, 'emp_auto_id' => $empDetails->id, 'action' => "Leave", 'date >=' =>$fromDate, 'date <=' =>$toDate));
										
										
										$empAttnData  	= $this->M_crud_ayenal->countAll('employee_attendence_information', array("month_year" => $va->month_year, 'emp_auto_id' => $empDetails->id, 'action' => "present", 'date >=' =>$fromDate, 'date <=' =>$toDate));
										$empAbsenceData = $this->M_crud_ayenal->countAll('employee_attendence_information', array("month_year" => $va->month_year, 'emp_auto_id' => $empDetails->id, 'action' => "absent", 'date >=' =>$fromDate, 'date <=' =>$toDate));
										
										$empTrainingData  	= $this->M_crud_ayenal->countAll('employee_attendence_information', array("month_year" => $va->month_year, 'emp_auto_id' => $empDetails->id, 'action' => "training", 'date >=' =>$fromDate, 'date <=' =>$toDate));
					  
										$undefine       = $totalWorkDay - ($empAttnData + $empAbsenceData + $totalLeave);
						
					 
					 
										
	
								  ?>
								  <tr>
									<td align="left" valign="middle"><?php echo date('M-Y', $dateFormate); ?></td>
									<td align="left" valign="middle"><?php echo $numberOfDay ?></td>
									<td align="left" valign="middle"><?php echo $totalHolyDay; ?></td>
									<td align="left" valign="middle"><?php echo $totalWorkDay ?></td>
									<td align="left" valign="middle"><?php echo $totalLeave ?></td>
									<td align="left" valign="middle"><?php echo $empAttnData ?></td>
									<td align="left" valign="middle"><?php echo $empAbsenceData ?></td>
									<td align="left" valign="middle"><?php echo $empTrainingData ?></td>
									<td align="left" valign="middle"><?php echo $undefine; ?></td>
								  </tr>
								   <?php  } ?>
								</table>
						
							 
						 <?php
						   } else if(!empty($allEmpInfo)) {
							
						  ?>
						   <table  width="100%" border="0" class="tableStyle">
						        
								 <thead>
									  <tr>
										<th colspan="9" class="text-center">
											 <?php $this->load->view('common/reportHeader'); ?>
											<h4 class="text-center">Employee Attendence Report</h4>										</th>
									  </tr>
						     </thead> 
								  
								<?php 
								    $sl = 1;
									foreach($allEmpInfo as $vm){
									 $designitionDetails  	= $this->M_crud_ayenal->findById('designition_list_manage', array('id' => $vm->designition_id));
								?>
								
								<tr style="background-color:#E0E0E0">
								  <td align="left" valign="middle"><strong style="font-size: 14px">Sl No : </strong> <?php echo $sl++ ?></td>
								  <td colspan="2" align="left" valign="middle"><strong style="font-size: 14px">Employee Name : </strong> <?php echo $vm->employee_full_name ?></td>
								  <td align="left" valign="middle"><strong style="font-size: 14px">Employee Id : </strong> <?php echo $vm->employee_id ?></td>
								  <td colspan="5" align="left" valign="middle"><strong style="font-size: 14px">Designition : </strong><?php echo $designitionDetails->designition_name ?></td>
							 </tr>
								<tr>
									<td width="8%" align="left" valign="middle"><strong>Month</strong></td>
									<td width="13%" align="left" valign="middle"><strong>Total day</strong></td>
									<td width="15%" align="left" valign="middle"><strong>Total Holyday</strong></td>
									<td width="16%" align="left" valign="middle"><strong>Total working day</strong></td>
									<td width="16%" align="left" valign="middle"><strong>Leave Archeve</strong></td>
									<td width="15%" align="left" valign="middle"><strong>Total Present</strong></td>
									<td width="8%" align="left" valign="middle"><strong>Total Abs</strong></td>
									<td width="10%" align="left" valign="middle"><strong>Training</strong></td>
									<td width="10%" align="left" valign="middle"><strong>Undefined</strong> </td>
						     </tr>
								
								  <?php 
									  $empWiseMonthLyAttnData  = $this->M_crud_ayenal->findAllGroup('employee_attendence_information', array("date >=" => $fromDate, "date <=" => $toDate), 'month_year', 'asc', 'month_year');	 
									  
									  foreach($empWiseMonthLyAttnData as $va){
										$dateFormate 	= strtotime($va->month_year);
										$part 			= explode("-", $va->month_year);
										$numberOfDay 	= date("t",mktime(0,0,0,$part[1],1,$part[0])); 
										
										$firstDaty 		= date($va->month_year.'-01');
										$lastDaty  		= date($va->month_year.'-t');
										$fridays 		= getFridays($part[1],$part[0]);
										
										
										$totalCustomHolyDay  = $this->M_crud_ayenal->countAll('emp_day_to_day_holyday_manage', array('domain_id' => $vm->domain_id, 'branch_id' => $vm->branch_id, 'month_year' => $va->month_year));
					 
										$totalHolyDay 	= sizeof($fridays) + $totalCustomHolyDay;
										
										$totalWorkDay   = $numberOfDay - $totalHolyDay; 
										
										$totalLeave     = $this->M_crud_ayenal->countAll('employee_attendence_information', array("month_year" => $va->month_year, 'emp_auto_id' => $vm->id, 'action' => "Leave", 'date >=' =>$fromDate, 'date <=' =>$toDate));
										
										$empAttnData  	= $this->M_crud_ayenal->countAll('employee_attendence_information', array("month_year" => $va->month_year, 'emp_auto_id' => $vm->id, 'action' => "present", 'date >=' =>$fromDate, 'date <=' =>$toDate));
										$empAbsenceData = $this->M_crud_ayenal->countAll('employee_attendence_information', array("month_year" => $va->month_year, 'emp_auto_id' => $vm->id, 'action' => "absent", 'date >=' =>$fromDate, 'date <=' =>$toDate));
										
										$empTrainingData  	= $this->M_crud_ayenal->countAll('employee_attendence_information', array("month_year" => $va->month_year, 'emp_auto_id' => $vm->id, 'action' => "training", 'date >=' =>$fromDate, 'date <=' =>$toDate));
					  
										$undefine       = $totalWorkDay - ($empAttnData + $empAbsenceData + $totalLeave);
						
					 
					 
										
	
								  ?>
								  <tr>
									<td align="left" valign="middle"><?php echo date('M-Y', $dateFormate); ?></td>
									<td align="left" valign="middle"><?php echo $numberOfDay ?></td>
									<td align="left" valign="middle"><?php echo $totalHolyDay; ?></td>
									<td align="left" valign="middle"><?php echo $totalWorkDay ?></td>
									<td align="left" valign="middle"><?php echo $totalLeave ?></td>
									<td align="left" valign="middle"><?php echo $empAttnData ?></td>
									<td align="left" valign="middle"><?php echo $empAbsenceData ?></td>
									<td align="left" valign="middle"><?php echo $empTrainingData ?></td>
									<td align="left" valign="middle"><?php echo $undefine; ?></td>
								  </tr>
								   <?php } } ?>
					  </table>

						   <br>
							
						<?php   } else { ?>
						   
						   <?php $this->load->view('common/reportHeader'); ?>
						    <h4 class="text-center">Employee Attendence Report</h4>	
						   <div class="col-md-12 text-center" style="padding: 20px 20px 20px 20px; color: #FF0000">Sorry! result not found</div>
						<?php } ?>
					  
					  <div class="col-md-12"><a href="#" class="pull-right print">Print</a></div>
					  <br><br>
					  
					  
					
		  
			      </div>
				</div>
			</div>
	</body>		
            
	</html>
    <?php $this->load->view('common/jsLinkPage'); ?>
	
   <script type="text/javascript" >
     
	 $(document).on('click', '.print',  function(){
		$(this).css('display', 'none');
		window.print();
	});


	
	$('.date-picker').datepicker({
			autoclose: true,
			todayHighlight: true,
			format: 'yyyy-mm-dd',
	});
	
	
	$('.add_new').on('click', function() {
		$('.add_new').fadeOut("slow");
		$('.addFormContent').fadeIn("slow");
	});
	
	$('.formCancel').on('click', function() {
		$('.addFormContent').fadeOut('slow');
		$('.add_new').fadeIn('slow');
	});

   //Domain wise Designition 
		$("#domain_id").change(function() {
		var domain_id = $("#domain_id").val();			
		$.ajax({
			url : SAWEB.getSiteAction('employeeInfo/domainWiseDesignition'), // URL TO LOAD BEHIND THE SCREEN
			type : "POST",
			data : { domain_id : domain_id },
			dataType : "html",
			success : function(data) {			
				$(".designitionListView").html(data);
			}
		});
		
	});	
	
	//Domain wise Branch 
		$("#domain_id").change(function() {
		var domain_id = $("#domain_id").val();			
		$.ajax({
			url : SAWEB.getSiteAction('employeeInfo/domainWiseBranch'), // URL TO LOAD BEHIND THE SCREEN
			type : "POST",
			data : { domain_id : domain_id },
			dataType : "html",
			success : function(data) {			
				$(".branchListView").html(data);
			}
		});
		
	});	



$('[data-rel=tooltip]').tooltip({container:'body'});
$('[data-rel=popover]').popover({container:'body'});
</script>
		 



