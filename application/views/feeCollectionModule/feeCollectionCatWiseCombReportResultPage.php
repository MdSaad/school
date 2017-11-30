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
						
						<h4 class="text-center"><u><?php echo $title; ?></u></h4>
						
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td width="86%"><span>Date : <?php if($fromDate) { ?>From <strong><?php echo date('d-M-Y', strtotime($fromDate)); ?></strong><?php } if($toDate) { ?> To <strong><?php echo date('d-M-Y', strtotime($toDate)); ?></strong><?php } ?></span></td>
						  </tr>
						</table>

					 
					 <?php
					$where	= array(); 
					if($branch_id) 	$where['fee_head_stu_branch_id']	= $branch_id;
					if($class_id)	$where['fee_head_stu_class_id']		= $class_id;
					if($group_id) 	$where['fee_head_stu_group_id']		= $group_id;
					if($section_id) $where['fee_head_stu_section_id']	= $section_id;
					if($shift_id) 	$where['fee_head_stu_shift_id']		= $shift_id;
					
					$whereOthers	= $where;
					$catList 	=  $this->M_crud->findAll('fee_head_cat_list_manage', array('status' => "Active"), 'id', 'asc');
					 ?>
					 	
						<table width="100%" border="0" cellspacing="0" cellpadding="0" class=" reportTable">
								  <tr>
									<th>Category Name </th>
									<th>Head Name </th>
									<th class="text-right">Amount</th>
								  </tr>
								  
								  <?php 
								  		$grandPaid	= 0;
								  		foreach($catList as $cat) { 
								  	    $headList 	=  $this->M_crud->findAll('fee_head_list_manage', array('cat_id' => $cat->id, 'status' => "Active"), 'id', 'asc');
										$rowSpan 	= $this->M_crud->countAllList('fee_head_list_manage', array('cat_id' => $cat->id, 'status' => "Active"));
								  ?>
								  <tr>
									<td align="left" valign="middle" rowspan="<?php echo $rowSpan+1; ?>"><strong><?php echo $cat->cat_name; ?></strong></td>
								  </tr>
									  <?php 
									    foreach($headList as $head) {
									  	if($fromDate) $where['submittedDate >=']	= $fromDate;
										if($toDate) $where['submittedDate <=']	= $toDate;
									  	$where['cat_id']	= $cat->id;
										$where['fee_head_id']	= $head->id; 
									  	$where['collection_approve_status']	= "approve";
									  	$paid = $this->M_crud->calCulateSum('stu_fee_head_paid_details_info', $where, 'fee_head_mode_pay_amount');
									  	
										$grandPaid	= $grandPaid+$paid;
									  ?>
									  <tr>	
										<td align="left" valign="middle"><?php echo $head->head_name; ?></td>
										<td align="right" valign="middle"><strong><?php echo number_format($paid, 2); ?>/-</strong></td>
									  </tr>
									  <?php } ?>
								  
								  <?php } 
								  		
								  		if($fromDate) $whereOthers['submittedDate >=']	= $fromDate;
										if($toDate) $whereOthers['submittedDate <=']	= $toDate;
									  	$whereOthers['cat_id']	="others";
										$whereOthers['fee_head_id']	= "others"; 
								  		$paidOthers = $this->M_crud->calCulateSum('stu_fee_head_paid_details_info', $whereOthers, 'fee_head_mode_pay_amount');
										
										$exWhere	= array();
										if($fromDate) $exWhere['collection_date >=']	= $fromDate;
										if($toDate) $exWhere['collection_date <=']		= $toDate;
										
										$paidExTotal	= 0;
										$exHeadList	= $this->M_crud->findAllGroupID('ex_stu_fee_collection', $exWhere, 'head_id', 'asc', 'head_id');
										
										if($exHeadList) {
								  ?>
								  <tr>
								    <td rowspan="<?php echo sizeof($exHeadList)+1; ?>" align="left" valign="middle"><strong>Ex Student Collection</strong></td>
					      		</tr>
								
								  <?php 
								   
									
									if($exHeadList)
									foreach($exHeadList as $v) { 
								  	$head = $this->M_crud->findById('fee_head_list_manage', array('id' => $v->head_id));
										if($head) {
											$headName = $head->head_name;
										} else {
											$headName = "Other's";
										}
									
									$exWhere['head_id']	= $v->head_id;
									
											
									$paidEx	= $this->M_crud->calCulateSum('ex_stu_fee_collection', $exWhere, 'pay_amount');	
									$paidExTotal	= $paidExTotal+$paidEx;
									
									
								  ?>
								  <tr>	
								  		<td align="left" valign="middle"><?php echo $headName; ?></td>
										<td align="right" valign="middle"><strong><?php echo number_format($paidEx, 2); ?>/-</strong></td>
						         </tr>
								 
						  		<?php } } ?>
						  
								  <tr>	
								  		<td align="left" valign="middle"><strong>Other's</strong></td>
										<td align="left" valign="middle">Other's</td>
										<td align="right" valign="middle"><strong><?php echo number_format($paidOthers, 2); ?>/-</strong></td>
						  </tr>
									  
								 <tr>	
										<td align="right" valign="middle" colspan="2"><strong>Grand Total</strong></td>
										<td align="right" valign="middle"><strong><?php echo number_format($grandPaid+$paidOthers+$paidExTotal, 2); ?>/-</strong></td>
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
		 



