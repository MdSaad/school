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
						
						<h4 class="text-center"><u>Fee Collection Summary Report</u></h4>
						
					 
					 <?php 
					 $stuWhere['year']	= $year;
					 if($branch_id)$stuWhere['branc_id']	= $branch_id;
					 if($class_id)$stuWhere['class_id']	= $class_id;
					 if($section_id)$stuWhere['class_section_id']	= $section_id;
					 if($group_id)$stuWhere['class_group_id']	= $group_id;
					 if($shift_id)$stuWhere['class_shift_id']	= $shift_id;
					 
					 $stuList	= $this->M_crud->findAll('class_wise_info', $stuWhere, 'class_roll', 'asc');
					 
					 if(!empty($stuList)) {  
					 if($class_id)$classInfo 	=  $this->M_crud->findById('class_list_manage', array('id' => $class_id));
					 if($section_id) $groupInfo =  $this->M_crud->findById('group_list_manage', array('id' => $group_id));
					 if($group_id)$sectionInfo 	=  $this->M_crud->findById('section_list_manage', array('id' => $section_id));
					 if($shift_id)$shiftInfo 	=  $this->M_crud->findById('shift_list_manage', array('id' => $shift_id)); 
					 ?>
					 	<table width="85%" border="0" cellspacing="0" cellpadding="0" class="table-bordered table table-striped">
									  <tr>
										<?php if($class_id) { ?><td><strong>Class</strong> : <?php echo $classInfo->class_name; ?> </td><?php } ?>
										<?php if($group_id) { ?><td><strong>Group</strong> : <?php echo $groupInfo->group_name; ?> </td><?php } ?>
										<?php if($section_id){ ?><td><strong>Section</strong> : <?php echo $sectionInfo->section_name; ?> </td><?php } ?>
										<?php if($shift_id) {?><td><strong>Shift</strong> : <?php echo $shiftInfo->shift_name; ?> </td><?php } ?>
										<!-- <td><strong>Version</strong> : <?php echo $version; ?> </td> -->
									  </tr>
									  
									  
									  <tr>
										<td colspan="5">Year <strong><?php echo $year; ?></strong> </td>
									  </tr>
									  <tr>
										<td colspan="5" align="center" valign="middle">
										
										<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered" style="width:100%">
                                          
										 
										  <tr>
										    <th rowspan="2" class="text-center">SL</th>
										    <th rowspan="2" class="text-center">Student ID</th>
										    <th rowspan="2" class="text-center">Student Name</th>
										    <th colspan="12" class="text-center">Month</th>
										    <th colspan="2" class="text-center">Total</th>
									      </tr>
										  <tr>
										  <?php 
										  
										   for($x=1; $x<=12; $x++)
											{
												//$month = mktime(0, 0, 0, date("m")+$x, date("d"),  date("Y"));
												//$key = date('m', $month);
												//echo $monthsdf	= $x;
												//$monthname = date('F', strtotime($monthsdf));
												//$months[$key] = $monthname;
												
												//$monthNum  = $x;
												$dateObj   = DateTime::createFromFormat('!m', $x);
												$monthname = $dateObj->format('F'); // March
											
											?>
                                            <th class="text-center"><?php echo substr($monthname, 0, 3); ?></th>
											<?php } ?>
                                            <th class="text-center">Earn</th>
                                            <th class="text-center">Dues</th>
                                          </tr>
										   <?php 
										    $i	= 1;
										   	$totalAmount = 0;
											$monthlyTotalEarn = 0;
											$totalPayableAmount	= 0;
											foreach($stuList as $v) {
											//$totalAmount	= $totalAmount+$v->paidTotal;
											$payableAmount	=  $this->M_crud->calculateSum('stu_fee_collection_applicable_mode_list', array('fee_coll_app_stu_auto_id' => $v->stu_auto_id, 'fee_year'=> $year), 'mode_total_amount');
											$totalPayableAmount	= $totalPayableAmount+$payableAmount;
											$stuInfo	= $this->M_crud->findById('stu_basic_info', array('id' => $v->stu_auto_id));
										   
										    ?>
                                          <tr>
                                            <td><?php echo $i++; ?></td>
											<td><?php echo $v->stu_id; ?></td>
                                            <td><?php echo $stuInfo->stu_full_name; ?></td>
											<?php 
										   $stuYearlyTotal	= 0;
										   for($x=0; $x<12; $x++)
											{
												$month	= $x+1;
												 $fromDate	  = $year."-0".$month."-01";
												 $toDate	  = $year."-0".$month."-31";
												 
												 $monthlyEarning	= $this->M_crud->calculateSum('stu_fee_head_paid_details_info', array('fee_head_stu_auto_id' => $v->stu_auto_id, 'month(submittedDate)=' => $month, 'fee_head_year' => $year, 'collection_approve_status' => "approve"), 'fee_head_mode_pay_amount');
												 $stuYearlyTotal	= $stuYearlyTotal+$monthlyEarning;
											
											?>
                                            <td><?php echo number_format($monthlyEarning,2); ?>/-</td>
											<?php } ?>
											
                                            <td><strong><?php echo number_format($stuYearlyTotal, 2); ?>/-</strong></td>
                                            <td class=""><strong><?php echo number_format($payableAmount-$stuYearlyTotal,2); ?></strong>/-</td>
                                          </tr>
										 <?php } ?> 
										 <tr>
                                            <td colspan="3" class="text-right"><strong>Total</strong></td>
											<?php 
										    $grandTotalEarn	= 0;
										   for($x=0; $x<12; $x++)
											{
												 $month	= $x+1;
												 $monthTotalWhere['fee_head_year']	= $year;
												 if($branch_id)$monthTotalWhere['fee_head_stu_branch_id']	= $branch_id;
												 if($class_id)$monthTotalWhere['fee_head_stu_class_id']	= $class_id;
												 if($section_id)$monthTotalWhere['fee_head_stu_section_id']	= $section_id;
												 if($group_id)$monthTotalWhere['fee_head_stu_group_id']	= $group_id;
												 if($shift_id)$monthTotalWhere['fee_head_stu_shift_id']	= $shift_id;
												 $monthTotalWhere['month(submittedDate)=']	= $month;
												 $monthTotalWhere['collection_approve_status'] 					= "approve"; 
												 
												 $monthlyTotalEarning	= $this->M_crud->calculateSum('stu_fee_head_paid_details_info', $monthTotalWhere, 'fee_head_mode_pay_amount');
												$grandTotalEarn	= $grandTotalEarn+$monthlyTotalEarning;
											
											?>
                                            <td><strong><?php echo number_format($monthlyTotalEarning, 2); ?>/-</strong></td>
											<?php } ?>
                                            <td><strong><?php echo number_format($grandTotalEarn,2); ?>/-</strong></td>
                                            <td><strong><?php echo number_format($totalPayableAmount-$grandTotalEarn,2); ?>/-</strong></td>
                                          </tr>
                                        </table></td>
									  </tr>
									</table>
						<h4><i class="ace-icon fa fa-print hand pull-right" title="Print" onClick="printMultiPart('.aFourSize');"></i></h4>
					 <?php } else { ?> 
					 <div class="alert alert-danger">
			<strong>Message!</strong> Sorry System Could Not Find Anything. Please Check Information and Try Again!
		  </div>
		  			<?php } ?>
		  
			      </div>
				</div>
			</div>
	</body>		
            
	</html>
         <?php //$this->load->view('common/footer'); ?>
         <?php $this->load->view('common/jsLinkPage'); ?>
		 



