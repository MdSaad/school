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
						
						<h4 class="text-center"><u>Earning Fee Collection Report</u></h4>
						
						<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-bordered table">
						  <tr>
						  <?php 
						  $shiftList 	=  $this->M_crud->findAllGroupByInvoice($table = 'stu_fee_head_paid_details_info', $where = array('fee_head_stu_branch_id' => $branch_id), $groupBy = 'fee_head_stu_shift_id', $orderBy = 'id', $serialized = 'asc');
						  $classList 	=  $this->M_crud->findAllGroupByInvoice($table = 'stu_fee_head_paid_details_info', $where = array('fee_head_stu_branch_id' => $branch_id), $groupBy = 'fee_head_stu_class_id', $orderBy = 'id', $serialized = 'asc');
						  
						  $groupList 	=  $this->M_crud->findAllGroupByInvoice($table = 'stu_fee_head_paid_details_info', $where = array('fee_head_stu_branch_id' => $branch_id), $groupBy = 'fee_head_stu_group_id', $orderBy = 'id', $serialized = 'asc');
						  $sectionList 	=  $this->M_crud->findAllGroupByInvoice($table = 'stu_fee_head_paid_details_info', $where = array('fee_head_stu_branch_id' => $branch_id), $groupBy = 'fee_head_stu_section_id', $orderBy = 'id', $serialized = 'asc');
						  
							$totalGroupStart	= 1;
							$totalSectionSart	= 1;
							foreach($groupList as $group) {
							$totalGroup = $totalGroupStart++;
							}
							// $totalGroup;
							foreach($sectionList as $section) {
							$totalSection = $totalSectionSart++;
							}
							$rowSpan	= ($totalGroup*$totalSection)+1;
						  foreach($shiftList as $shift) {
						  $shiftName	= $this->M_crud->findById('shift_list_manage', array('id' => $shift->fee_head_stu_shift_id));
						  ?>
						  
							<th class="text-center">
								<?php echo $shiftName->shift_name; ?>
							</th>
						<?php } ?>	
						  </tr>
						  
						  <tr>
						  <?php
						  $shiftTotal	= 0; 
						  foreach($shiftList as $shift) {
						  $shiftPaid	= $this->M_crud->calCulateSum('stu_fee_head_paid_details_info', array('fee_head_stu_shift_id' => $shift->fee_head_stu_shift_id, 'fee_head_stu_branch_id' => $branch_id,  'submittedDate >=' =>$fromDate, 'submittedDate <=' =>$toDate, 'collection_approve_status' => "approve"), 'fee_head_mode_pay_amount');
						 
						  ?>
							<td class="text-center">
								
									<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-bordered table table-striped">
									  <tr>
										<td>SL</td>
										<td>Class</td>
										<td>Group</td>
										<td>Section</td>
										<td>Earning</td>
									  </tr>
									  <?php  
										$sl	= 1;
										foreach($classList as $class) { 
										 $className	= $this->M_crud->findById('class_list_manage', array('id' => $class->fee_head_stu_class_id));
										?>
									  <tr>
										<td rowspan="<?php echo $rowSpan; ?>" style=""><?php echo $sl++; ?></td>
										<td rowspan="<?php echo $rowSpan; ?>"><?php echo $className->class_name; ?></td>
									  </tr>
									  <?php 
									   $totalClassPaid	= 0;
									   foreach($groupList as $group) {
									   $groupName	= $this->M_crud->findById('group_list_manage', array('id' => $group->fee_head_stu_group_id));
									   foreach($sectionList as $section) {
									   $sectionName	= $this->M_crud->findById('section_list_manage', array('id' => $section->fee_head_stu_section_id));
									   $classPaid	= $this->M_crud->calCulateSum('stu_fee_head_paid_details_info', array('fee_head_stu_branch_id' => $branch_id, 'fee_head_stu_class_id' => $class->fee_head_stu_class_id, 'fee_head_stu_group_id' => $group->fee_head_stu_group_id, 'fee_head_stu_section_id' => $section->fee_head_stu_section_id, 'fee_head_stu_shift_id' => $shift->fee_head_stu_shift_id,  'submittedDate >=' =>$fromDate, 'submittedDate <=' =>$toDate, 'collection_approve_status' => "approve"), 'fee_head_mode_pay_amount');
									  // $totalClassPaid	= $totalClassPaid+$classPaid;
									   ?>
									  <tr>
										<td><?php echo $groupName->group_name; ?></td>
										<td><?php echo $sectionName->section_name; ?></td>
										<td><?php echo number_format($classPaid,2); ?>/-</td>
									  </tr>
									  <?php } //sectionEnd?>
									  <?php } //groupEnd?>
									  <!-- <tr>
										<th colspan="2" class="text-right">Total</th>
										<th><?php echo number_format($totalClassPaid,2); ?>/-</th>
									  </tr> -->
									  <?php } //classEnd?>	
									  
									  <tr>
										<th colspan="4" class="text-right">Grand Total</th>
										<th class="text-center"><?php echo number_format($shiftPaid,2); ?>/-</th>
									  </tr>
								</table>
							</td>
							
						<?php } ?>	
						  </tr>
						</table>
						<h4><i class="ace-icon fa fa-print hand pull-right" title="Print" onClick="printMultiPart('.aFourSize');"></i></h4>
					 
		  
			      </div>
				</div>
			</div>
	</body>		
            
	</html>
         <?php //$this->load->view('common/footer'); ?>
         <?php $this->load->view('common/jsLinkPage'); ?>
		 



