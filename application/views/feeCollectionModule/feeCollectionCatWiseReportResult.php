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
						
						<h4 class="text-center"><u>Fee Collection Report</u></h4>
						
					 
					 <?php 
					if($branch_id) 	$where['fee_branch_id']		= $branch_id;
					if($class_id)	$where['fee_class_id']		= $class_id;
					if($group_id) 	$where['fee_group_id']		= $group_id;
					if($section_id) $where['fee_section_id']	= $section_id;
					if($shift_id) 	$where['fee_shift_id']		= $shift_id;
					if($year) 		$where['fee_year']			= $year;
					if($cat_id) 	$where['cat_id']			= $cat_id;
					if($fee_head_id) $where['fee_head_id']	= $fee_head_id;
					$catInfo 	=  $this->M_crud->findById('fee_head_cat_list_manage', array('id' => $cat_id));
					 
					 $stuList	= $this->M_crud->findAllGroupID('stu_fee_collection_applicable_mode_list', $where, 'fee_coll_app_stu_auto_id', 'asc', 'fee_coll_app_stu_auto_id');
					 
					 if(!empty($stuList)) {  ?>
					 	<table width="85%" border="0" cellspacing="0" cellpadding="0" class="table-bordered table table-striped">
									   <tr>
										<?php if($branch_id) { 
										$branchInfo 	=  $this->M_crud->findById('branch_list_manage', array('id' => $branch_id));
										?><td><strong>Class</strong> : <?php echo $branchInfo->branch_name; ?> </td>
										<?php } ?>
										<?php if($class_id) { 
										$classInfo 	=  $this->M_crud->findById('class_list_manage', array('id' => $class_id));
										?>
										<td><strong>Class</strong> : <?php echo $classInfo->class_name; ?> </td>
										<?php } ?>
										<?php if($group_id) { 
										 $groupInfo 	=  $this->M_crud->findById('group_list_manage', array('id' => $group_id));
										?>
										<td><strong>Group</strong> : <?php echo $groupInfo->group_name; ?> </td>
										<?php } ?>
										<?php if($section_id) { 
										  $sectionInfo 	=  $this->M_crud->findById('section_list_manage', array('id' => $section_id));
										?>
										<td><strong>Section</strong> : <?php echo $sectionInfo->section_name; ?> </td>
										<?php } ?>
										<?php if($shift_id) { 
										$shiftInfo 	=  $this->M_crud->findById('shift_list_manage', array('id' => $shift_id));
										?>
										<td><strong>Shift</strong> : <?php echo $shiftInfo->shift_name; ?> </td>
										<?php } ?>
									  </tr> 
									  
									  
									  <tr>
										<td colspan="5">Year <strong><?php echo $year; ?> - <?php echo $catInfo->cat_name; ?></strong>
										<?php if($fee_head_id) { 
											$headInfo 	=  $this->M_crud->findById('fee_head_list_manage', array('id' => $fee_head_id));
											echo "(".$headInfo->head_name.")";
										} ?> </td>
									  </tr>
									  <tr>
										<td colspan="5" align="center" valign="middle">
										
										<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered" style="width:100%">
                                          
										  <tr>
										    <th class="text-center">SL</th>
										    <th class="text-center">Student ID</th>
										    <th class="text-center">Student Name</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">Paid</th>
											<th class="text-center">Dues</th>
                                          </tr>
										   <?php 
										    $i	= 1;
										   	$totalPayableAmount = 0;
											$totalPaidAmount = 0;
											foreach($stuList as $v) {
											//$totalAmount	= $totalAmount+$v->paidTotal;
											$payableWhere['fee_coll_app_stu_auto_id']	= $v->fee_coll_app_stu_auto_id;
											$payableWhere['fee_year']					= $year;
											$payableWhere['cat_id']						= $cat_id;
											if($fee_head_id)$payableWhere['fee_head_id']				= $fee_head_id;
											 $payableCat	=  $this->M_crud->findAll('stu_fee_collection_applicable_mode_list', $payableWhere, 'id', 'asc');
											 
											 $payableAmount = 0;
											 foreach($payableCat as $cat) {
											 	$payableAmount	= $payableAmount+$cat->mode_total_amount;
											 }
											  // echo $payableAmount;
											 $paidWhere['fee_head_stu_auto_id'] 		= $v->fee_coll_app_stu_auto_id;
											 $paidWhere['cat_id'] 					    = $cat_id;
											 if($fee_head_id)  $paidWhere['fee_head_id'] 				= $fee_head_id;
											 if($year)  $paidWhere['fee_head_year'] 					= $year;
											 if($fromDate)$paidWhere['submittedDate >='] 		    	= $fromDate;
											 if($toDate)  $paidWhere['submittedDate <='] 				= $toDate; 
											 
											// print_r($paidWhere);
											 $paidHead	=  $this->M_crud->findAll('stu_fee_head_paid_details_info', $paidWhere, 'id', 'asc');
											 
											 $paidAmount	= 0;
											 foreach($paidHead as $paid) {
											 	 $paidAmount	= $paidAmount+$paid->fee_head_mode_pay_amount;
											 }
											 $stuInfo		=  $this->M_crud->findById('stu_basic_info', array('id' => $v->fee_coll_app_stu_auto_id));
					 						 $classInfo		=  $this->M_crud->findById('class_wise_info', array('stu_auto_id' => $v->fee_coll_app_stu_auto_id, 'year' => $year));
										    ?>
                                          <tr>
                                            <td><?php echo $i++; ?></td>
											<td><?php echo $classInfo->stu_id; ?></td>
                                            <td><?php echo $stuInfo->stu_full_name; ?></td>
											<td><?php echo number_format($payableAmount,2); ?>/-</td>
                                            <td><?php echo number_format($paidAmount, 2); ?>/-</td>
                                            <td class="<?php if($payableAmount-$paidAmount>0) echo 'text-danger'; ?>"><?php echo number_format($payableAmount-$paidAmount,2); ?>/-</td>
                                          </tr>
										 <?php 
										 	$totalPayableAmount	= $totalPayableAmount+$payableAmount;
											$totalPaidAmount	= $totalPaidAmount+$paidAmount;
										 
										 } ?> 
<tr>
                                            <td colspan="3" class="text-right"><strong>Total</strong></td>
                							<td><strong><?php echo number_format($totalPayableAmount,2); ?></strong>/-</td>
                                            <td><strong><?php echo number_format($totalPaidAmount,2); ?></strong>/-</td>
                                            <td class=""><strong><?php echo number_format($totalPayableAmount-$totalPaidAmount,2); ?></strong>/-</td>
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
		 



