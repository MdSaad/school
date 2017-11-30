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
            			
						<?php if(!empty($chkEmp)){ ?>
						  <table  width="100%" border="0" class="tableStyle">
						        
								 <thead>
									  <tr>
										<th colspan="9" class="text-center">
											 <?php $this->load->view('common/reportHeader'); ?>
											<h4 class="text-center">Employee Training Report</h4>										</th>
									  </tr>
								  </thead> 
								
								<tr style="background-color:#E0E0E0">
								  <td width="8%" align="left" valign="middle"><strong style="font-size: 14px">Sl No : </strong> 01</td>
								  <td colspan="2" align="left" valign="middle"><strong style="font-size: 14px">Employee Name : </strong> <?php echo $empDetails->employee_full_name ?></td>
								  <td width="16%" align="left" valign="middle"><strong style="font-size: 14px">Employee Id : </strong> <?php echo $empDetails->employee_id ?></td>
								  <td width="32%" colspan="5" align="left" valign="middle"><strong style="font-size: 14px">Designition : </strong><?php echo $empDetails->designition_name ?></td>
							 </tr>
							    <?php 
									  $empWiseMonthLyAttnData  = $this->M_crud_ayenal->findAllGroup('employee_attendence_information', array("emp_auto_id" => $empDetails->id, "date >=" => $fromDate, "date <=" => $toDate, 'action' => "training"), 'month_year', 'asc', 'month_year');
									   foreach($empWiseMonthLyAttnData as $va){	
									     $dateFormate 	= strtotime($va->month_year);
								?> 
								<tr>
								  <td colspan="9" align="center" valign="middle"><strong>Month : </strong> <?php echo date('M-Y', $dateFormate); ?></td>
						        </tr>
								<tr>
									<td align="left" valign="middle"><strong>Date</strong></td>
									<td colspan="8" align="left" valign="middle"><strong>Training Details </strong></td>
								  </tr>
								
								  <?php 
									  $empWiseTrainingData  = $this->M_crud_ayenal->findAll('employee_attendence_information', array("month_year" => $va->month_year, "emp_auto_id" => $empDetails->id, 'action' => "training"), 'month_year', 'asc');	 
									  
									   foreach($empWiseTrainingData as $ta){
									   
									   
	
								  ?>
								  <tr>
									<td  align="left" valign="middle"><?php echo $ta->date; ?></td>
									<td colspan="8" align="left" valign="middle"><?php echo $ta->training_details; ?></td>
								  </tr>
								   <?php } } ?>
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
									 $empDetails   			= $this->M_join_ayenal->findByEmpId('employee_basic_information', array('employee_basic_information.id' => $vm->emp_auto_id)); 
								?>
								
								<tr style="background-color:#E0E0E0">
								  <td width="8%" align="left" valign="middle"><strong style="font-size: 14px">Sl No : </strong> <?php echo $sl++; ?></td>
								  <td colspan="2" align="left" valign="middle"><strong style="font-size: 14px">Employee Name : </strong> <?php echo $empDetails->employee_full_name ?></td>
								  <td width="16%" align="left" valign="middle"><strong style="font-size: 14px">Employee Id : </strong> <?php echo $empDetails->employee_id ?></td>
								  <td width="32%" colspan="5" align="left" valign="middle"><strong style="font-size: 14px">Designition : </strong><?php echo $empDetails->designition_name ?></td>
							 </tr>
							    <?php 
									  $empWiseMonthLyAttnData  = $this->M_crud_ayenal->findAllGroup('employee_attendence_information', array("emp_auto_id" => $empDetails->id, "date >=" => $fromDate, "date <=" => $toDate, 'action' => "training"), 'month_year', 'asc', 'month_year');
									   foreach($empWiseMonthLyAttnData as $va){	
									     $dateFormate 	= strtotime($va->month_year);
								?> 
								<tr>
								  <td colspan="9" align="center" valign="middle"><strong>Month : </strong> <?php echo date('M-Y', $dateFormate); ?></td>
						        </tr>
								<tr>
									<td align="left" valign="middle"><strong>Date</strong></td>
									<td colspan="8" align="left" valign="middle"><strong>Training Details </strong></td>
								  </tr>
								
								  <?php 
									  $empWiseTrainingData  = $this->M_crud_ayenal->findAll('employee_attendence_information', array("month_year" => $va->month_year, "emp_auto_id" => $empDetails->id, 'action' => "training"), 'month_year', 'asc');	 
									  
									   foreach($empWiseTrainingData as $ta){
									   
									   
	
								  ?>
								  <tr>
									<td  align="left" valign="middle"><?php echo $ta->date; ?></td>
									<td colspan="8" align="left" valign="middle"><?php echo $ta->training_details; ?></td>
								  </tr>
								   <?php } } } ?>
								</table>
						
						
								
								
					 

						   <br>
							
						<?php   } else { ?>
						   <?php $this->load->view('common/reportHeader'); ?>
							<h4 class="text-center">Employee Training Report</h4>	
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
		 



