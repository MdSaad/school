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
		
		<link href="<?php echo base_url('resource/css/reportStyle.css'); ?>" rel="stylesheet" />
		
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
						 
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableStyle">
								 <thead>
									  <tr>
										<th colspan="8" class="text-center">
											 <?php $this->load->view('common/reportHeader'); ?>
											 <h4 class="text-center">Student Attendence Report</h4>
										</th>
									  </tr>
							  </thead> 
								  
							   <?php 
							   
							       if(!empty($dailyAttendenceData)) { 
								   
								     $totalPresentStu 	= 0;
									 $totalAbsentStu  	= 0;
									 $totalUndefinedStu = 0;
									 $totalStudent    	= 0;
							       
								    foreach($dailyAttendenceData as $v){
									$branchName   = $this->M_crud->findById('branch_list_manage', array('id' => $v->branc_id));
									$where2       = array('class_wise_info.branc_id' => $v->branc_id);
									if(!empty($class_id) || !empty($group_id) || !empty($shift_id) || !empty($year )){
										if(!empty($class_id))    $where2['class_wise_info.class_id']  		         = $class_id;
										if(!empty($group_id))    $where2['class_wise_info.class_group_id']  		 = $group_id;
										if(!empty($shift_id))    $where2['class_wise_info.class_shift_id']  		 = $shift_id;
										if(!empty($year))        $where2['class_wise_info.year']  		             = $year;
									}
									$allClassInfo = $this->M_crud_ayenal->findAllGroup('class_wise_info', $where2, $orderBy = 'class_sl_no', 'asc', $groupBy = 'class_id');
									
							   ?>
							
								  <thead>
								      <tr>
										<th colspan="8" class="text-center">
											<h4 class="text-center"><?php echo $branchName->branch_name ?></h4>										</th>
									  </tr>
								  </thead> 
							   <?php 
							        foreach($allClassInfo as $vc){
									$className   		= $this->M_crud->findById('class_list_manage', array('id' => $vc->class_id));
									$totalClStuList 	= $this->M_crud_ayenal->countAll('class_wise_info', array('branc_id' => $v->branc_id, 'class_id' => $vc->class_id, 'year' => $year));  
									$chkClassAttnData   = $this->M_crud->findById('attendence_information', array('branch_id' => $v->branc_id, 'class_id' => $vc->class_id, 'date' => $attnDate));
									
									  if(!empty($chkClassAttnData)){
										  $clPresentList = $this->M_crud_ayenal->countAll('attendence_information', array('branch_id' => $v->branc_id, 'class_id' => $vc->class_id, 'action' => "present", 'date' => $attnDate));  
										  $clAbsentList  = $this->M_crud_ayenal->countAll('attendence_information', array('branch_id' => $v->branc_id, 'class_id' => $vc->class_id, 'action' => "absent", 'date' => $attnDate)); 
									  }else{
										  $clPresentList = 0;
										  $clAbsentList  = 0;
									  }
									  
									   $totalClUndefined = $totalClStuList - ($clPresentList + $clAbsentList);		
									   
									   $totalPresentStu += $clPresentList;
									   $totalAbsentStu += $clAbsentList;
									   $totalUndefinedStu += $totalClUndefined;
									   $totalStudent += $totalClStuList;
									    	
									
									  
							    ?>
								  
								   <thead>
								     <tr style="background-color:#E0E0E0">
										<th colspan="8" class="text-center" style="padding:0">
										   <table width="100%" border="0" cellspacing="0" cellpadding="0" height="20" style="font-size: 15px" class="tableStyleNone">
											  <tr>
											    <td align="center" valign="middle">Class : <span style="font-weight:normal"><?php echo $className->class_name; ?></span></td>
											    <td align="center" valign="middle"> Date  : <span style="font-weight:normal"> <?php echo $attnDate; ?></span></td>
											    <td align="center" valign="middle">Total Student : <span style="font-weight:normal"><?php  echo $totalClStuList; ?></span></td>
											    <td align="center" valign="middle">Total Present : <span style="font-weight:normal"> <?php echo $clPresentList ?></span></td>
											    <td align="center" valign="middle">Total Absence :  <span style="font-weight:normal"><?php echo $clAbsentList;  ?></span></td>
											    <td align="center" valign="middle">Undefine : <span style="font-weight:normal"><?php echo $totalClUndefined; ?></span></td>
											    <td align="center" valign="middle">Attendence Percentage : 
												  <span style="font-weight:normal"><?php  $percentage = $clPresentList * 100/$totalClStuList; echo number_format($percentage,2); ?> %</span></td>
										     </tr>
										   </table>
										 </th>
								     </tr>
								   </thead>
								  
								  
								  <thead>
									  <tr>
										<th align="right" valign="middle" class="text-right">Class</th>
										<th align="right" valign="middle" class="text-right">Section </th>
										<th align="right" valign="middle" class="text-right">Present List  </th>
										<th align="right" valign="middle" class="text-right">Absent List </th>
										<th align="right" valign="middle" class="text-right">Undefined List </th>
										<th align="right" valign="middle" class="text-right">Total Student </th>
									  </tr>
								  </thead> 
								   <?php
                                          foreach($sectionListInfo as $vs){	
										  $chkSectionAttnData =  $this->M_crud->findById('attendence_information', array('branch_id' => $v->branc_id, 'class_id' => $vc->class_id, 'section_id' => $vs->id, 'date' => $attnDate));
										  if(!empty($chkSectionAttnData)){
										      $presentList = $this->M_crud_ayenal->countAll('attendence_information', array('branch_id' => $v->branc_id, 'class_id' => $vc->class_id, 'section_id' => $vs->id, 'action' => "present",'date' => $attnDate));  
											  $absentList = $this->M_crud_ayenal->countAll('attendence_information', array('branch_id' => $v->branc_id, 'class_id' => $vc->class_id, 'section_id' => $vs->id, 'action' => "absent",'date' => $attnDate)); 
										  }else{
										      $presentList = 0;
											  $absentList  = 0;
										  }
										  
										      $totalStuList = $this->M_crud_ayenal->countAll('class_wise_info', array('branc_id' => $v->branc_id, 'class_id' => $vc->class_id, 'class_section_id' => $vs->id, 'year' => $year));   	
										  
										     
										  
										      $totalUndefined = $totalStuList - ($presentList + $absentList);								  
								    ?>
							  
								        <tbody>	
										  <tr>
											<td align="right" valign="middle"><?php echo  $className->class_name; ?></td>
											<td align="right" valign="middle"><?php echo  $vs->section_name ?></td>
											<td align="right" valign="middle"><?php echo  $presentList ?></td>
											<td align="right" valign="middle"><?php echo  $absentList ?></td>
											<td align="right" valign="middle"><?php echo  $totalUndefined ?></td>
											<td align="right" valign="middle"><?php echo  $totalStuList ?></td>
										  </tr>
										</tbody> 
										
								    <?php 
										    
										}  // end student loop 
								    ?> 
									
									
										
								
								 <?php
								       
								       } // end class loop
									   
								      } // end branch loop
								?>  
									  
									  <tr style="background-color:#FFFFFF">
										<td height="47" colspan="2" align="right" valign="middle"><strong>Summary For Date : </strong> <?php echo $attnDate; ?> </td>
										<td align="right" valign="middle"><strong>Total Present : </strong>  <?php echo $totalPresentStu  ?></td>
										<td align="right" valign="middle"><strong>Total Absnt :</strong> <?php echo  $totalAbsentStu ?></td>
										<td align="right" valign="middle"><strong>Total Undefined :</strong> <?php echo  $totalUndefinedStu ?></td>
										<td align="right" valign="middle"><strong>Total Student :</strong> <?php echo  $totalStudent ?></td>
									</tr>
										
										
								<?php		
									  
									}else{ // end parents if
								 ?>
								 
								    <tbody>	
										   <tr>
											<td align="left" colspan="6" height="20" valign="middle" class="text-center"><h3>No Record Found !</h3></td>
										  </tr>
								    </tbody> 
									<?php } ?>
					  </table>
						
					 
					  
					
					  
					  <div class="col-md-12">
					       <a href="#" class="pull-right print">Print</a>
					   </div>
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
		 



