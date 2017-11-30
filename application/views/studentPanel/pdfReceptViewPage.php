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
            			<?php $this->load->view('common/pdfHeader'); ?>
						<?php if(!empty($stuPayDetailsInfo)) {  ?> 
						
							<table id="dynamic-table" class="table table-striped table-bordered ">
	
									<tbody>
										<tr> 
											<td align="center" valign="middle" class="text-center">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
											  <tr>
												<td width="17%" align="left" valign="middle"><strong>Student Name </strong></td>
												<td width="1%" align="center" valign="middle">:</td>
												<td width="31%" align="left" valign="middle" ><?php echo $stuDetailsInfo->stu_full_name; ?></td>
												<td width="22%" align="left" valign="middle"><strong>ID</strong></td>
												<td width="29%" align="left" valign="middle"><?php echo $stuDetailsInfo->stu_id; ?></td>
											  </tr>
											 
											  <tr>
												<td align="left" valign="middle"><strong>Class</strong></td>
												<td align="center" valign="middle">:</td>
												<td align="left" valign="middle"><?php echo $stuDetailsInfo->class_name; ?></td>
												<td align="left" valign="middle"><strong>Class Roll </strong></td>
												<td align="left" valign="middle"><?php echo $stuDetailsInfo->class_roll; ?></td>
											  </tr>
											   <tr>
											    <td align="left" valign="middle">&nbsp;</td>
											    <td align="center" valign="middle">&nbsp;</td>
											    <td align="left" valign="middle">&nbsp;</td>
											    <td align="left" valign="middle">&nbsp;</td>
											    <td align="left" valign="middle">&nbsp;</td>
										      </tr>
											</table>
											</td>
										</tr>
										
										<tr> 
											<td align="center" valign="middle" class="text-left">
												<table width="100%" border="1" cellspacing="0" cellpadding="0" class="table">
												  <thead>
													  <tr>
														<td colspan="4"><strong>Receipt No : </strong> <?php echo $recetno; ?> </td>
													  </tr>
												  </thead>
												  
												  <thead>
													  <tr>
														<th width="10%" align="left" valign="middle">SL No</th>
														<th width="15%" align="left" valign="middle">Date</th>
														<th width="47%" align="left" valign="middle">Head With Description</th>
														<th width="28%" align="right" valign="middle">Amount (TK)</th>
													  </tr>
												  </thead> 
												  <?php 
													$slNo = 1;
													$totalAmount = 0;
													foreach($stuPayDetailsInfo as $v) { 
													$totalAmount = $v->fee_head_mode_pay_amount+$totalAmount;
													?>
												<tbody>	
												  <tr>
													<td><?php echo $slNo++; ?></td>
													<td><?php echo $v->submittedDate; ?></td>
													<td><?php echo $v->fee_head_applicable_mode_name; ?><?php if(!empty($v->pay_head_details)) { ?>-<?php echo $v->pay_head_details; } ?></td>
													<td align="right" valign="middle"><?php echo $v->fee_head_mode_pay_amount; ?>/-</td>
												  </tr>
												</tbody> 
												<?php } ?> 
												
												<tr>
													<th colspan="3" align="right" valign="middle" class="text-right">Total :</th>
													<th align="right" valign="middle"><?php echo number_format($totalAmount,2); ?>/-</th>
												  </tr> 
												<tr>
													<th colspan="4" class="text-right"><a href="#" class="pull-right">Print</a></th>
												  </tr>
											  </table>
											</td>
										</tr>
									
									</tbody>
						  </table>
					  
					 <?php } else { ?> 
					 <div class="alert alert-danger">
			<strong>Warning!</strong> Sorry System Could Not Find Anything. Please Check Information and Try Again!
		  </div>
		  			<?php } ?>
		  
			      </div>
				  <hr style="border: 1px dashed #0000FF !important;" />
				  <br>
				  <div class="aFourSize">
            			<?php $this->load->view('common/pdfHeader'); ?>
						<?php if(!empty($stuPayDetailsInfo)) {  ?> 
						
							<table id="dynamic-table" class="table table-striped table-bordered ">
	
									<tbody>
										<tr> 
											<td align="center" valign="middle" class="text-center">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
											  <tr>
												<td width="17%" align="left" valign="middle"><strong>Student Name </strong></td>
												<td width="1%" align="center" valign="middle">:</td>
												<td width="31%" align="left" valign="middle" ><?php echo $stuDetailsInfo->stu_full_name; ?></td>
												<td width="22%" align="left" valign="middle"><strong>ID</strong></td>
												<td width="29%" align="left" valign="middle"><?php echo $stuDetailsInfo->stu_id; ?></td>
											  </tr>
											 
											  <tr>
												<td align="left" valign="middle"><strong>Class</strong></td>
												<td align="center" valign="middle">:</td>
												<td align="left" valign="middle"><?php echo $stuDetailsInfo->class_name; ?></td>
												<td align="left" valign="middle"><strong>Class Roll </strong></td>
												<td align="left" valign="middle"><?php echo $stuDetailsInfo->class_roll; ?></td>
											  </tr>
											   <tr>
											    <td align="left" valign="middle">&nbsp;</td>
											    <td align="center" valign="middle">&nbsp;</td>
											    <td align="left" valign="middle">&nbsp;</td>
											    <td align="left" valign="middle">&nbsp;</td>
											    <td align="left" valign="middle">&nbsp;</td>
										      </tr>
											</table>
											</td>
										</tr>
										
										<tr> 
											<td align="center" valign="middle" class="text-left">
												<table width="100%" border="1" cellspacing="0" cellpadding="0" class="table">
												  <thead>
													  <tr>
														<td colspan="4"><strong>Receipt No : </strong> <?php echo $recetno; ?> </td>
													  </tr>
												  </thead>
												  
												  <thead>
													  <tr>
														<th width="10%" align="left" valign="middle">SL No</th>
														<th width="15%" align="left" valign="middle">Date</th>
														<th width="47%" align="left" valign="middle">Head With Description</th>
														<th width="28%" align="right" valign="middle">Amount (TK)</th>
													  </tr>
												  </thead> 
												  <?php 
													$slNo = 1;
													$totalAmount = 0;
													foreach($stuPayDetailsInfo as $v) { 
													$totalAmount = $v->fee_head_mode_pay_amount+$totalAmount;
													?>
												<tbody>	
												  <tr>
													<td><?php echo $slNo++; ?></td>
													<td><?php echo $v->submittedDate; ?></td>
													<td><?php echo $v->fee_head_applicable_mode_name; ?><?php if(!empty($v->pay_head_details)) { ?>-<?php echo $v->pay_head_details; } ?></td>
													<td align="right" valign="middle"><?php echo $v->fee_head_mode_pay_amount; ?>/-</td>
												  </tr>
												</tbody> 
												<?php } ?> 
												
												<tr>
													<th colspan="3" align="right" valign="middle" class="text-right">Total :</th>
													<th align="right" valign="middle"><?php echo number_format($totalAmount,2); ?>/-</th>
												  </tr> 
												<tr>
													<th colspan="4" class="text-right"><a href="#" class="pull-right">Print</a></th>
												  </tr>
											  </table>
											</td>
										</tr>
									
									</tbody>
						  </table>
					  
					 <?php } else { ?> 
					 <div class="alert alert-danger">
			<strong>Warning!</strong> Sorry System Could Not Find Anything. Please Check Information and Try Again!
		  </div>
		  			<?php } ?>
		  
			      </div>
				  
				  <hr style="border: 1px dashed #0000FF !important;" />
				  <br>
				  <div class="aFourSize">
            			<?php $this->load->view('common/pdfHeader'); ?>
						<?php if(!empty($stuPayDetailsInfo)) {  ?> 
						
							<table id="dynamic-table" class="table table-striped table-bordered ">
	
									<tbody>
										<tr> 
											<td align="center" valign="middle" class="text-center">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
											  <tr>
												<td width="17%" align="left" valign="middle"><strong>Student Name </strong></td>
												<td width="1%" align="center" valign="middle">:</td>
												<td width="31%" align="left" valign="middle" ><?php echo $stuDetailsInfo->stu_full_name; ?></td>
												<td width="22%" align="left" valign="middle"><strong>ID</strong></td>
												<td width="29%" align="left" valign="middle"><?php echo $stuDetailsInfo->stu_id; ?></td>
											  </tr>
											 
											  <tr>
												<td align="left" valign="middle"><strong>Class</strong></td>
												<td align="center" valign="middle">:</td>
												<td align="left" valign="middle"><?php echo $stuDetailsInfo->class_name; ?></td>
												<td align="left" valign="middle"><strong>Class Roll </strong></td>
												<td align="left" valign="middle"><?php echo $stuDetailsInfo->class_roll; ?></td>
											  </tr>
											   <tr>
											    <td align="left" valign="middle">&nbsp;</td>
											    <td align="center" valign="middle">&nbsp;</td>
											    <td align="left" valign="middle">&nbsp;</td>
											    <td align="left" valign="middle">&nbsp;</td>
											    <td align="left" valign="middle">&nbsp;</td>
										      </tr>
											</table>
											</td>
										</tr>
										
										<tr> 
											<td align="center" valign="middle" class="text-left">
												<table width="100%" border="1" cellspacing="0" cellpadding="0" class="table">
												  <thead>
													  <tr>
														<td colspan="4"><strong>Receipt No : </strong> <?php echo $recetno; ?> </td>
													  </tr>
												  </thead>
												  
												  <thead>
													  <tr>
														<th width="10%" align="left" valign="middle">SL No</th>
														<th width="15%" align="left" valign="middle">Date</th>
														<th width="47%" align="left" valign="middle">Head With Description</th>
														<th width="28%" align="right" valign="middle">Amount (TK)</th>
													  </tr>
												  </thead> 
												  <?php 
													$slNo = 1;
													$totalAmount = 0;
													foreach($stuPayDetailsInfo as $v) { 
													$totalAmount = $v->fee_head_mode_pay_amount+$totalAmount;
													?>
												<tbody>	
												  <tr>
													<td><?php echo $slNo++; ?></td>
													<td><?php echo $v->submittedDate; ?></td>
													<td><?php echo $v->fee_head_applicable_mode_name; ?><?php if(!empty($v->pay_head_details)) { ?>-<?php echo $v->pay_head_details; } ?></td>
													<td align="right" valign="middle"><?php echo $v->fee_head_mode_pay_amount; ?>/-</td>
												  </tr>
												</tbody> 
												<?php } ?> 
												
												<tr>
													<th colspan="3" align="right" valign="middle" class="text-right">Total :</th>
													<th align="right" valign="middle"><?php echo number_format($totalAmount,2); ?>/-</th>
												  </tr> 
												<tr>
													<th colspan="4" class="text-right"><a href="#" class="pull-right">Print</a></th>
												  </tr>
											  </table>
											</td>
										</tr>
									
									</tbody>
						  </table>
					  
					 <?php } else { ?> 
					 <div class="alert alert-danger">
			<strong>Warning!</strong> Sorry System Could Not Find Anything. Please Check Information and Try Again!
		  </div>
		  			<?php } ?>
		  
			      </div>
				</div>
			</div>
	</body>		
            
	</html>
         <?php //$this->load->view('common/footer'); ?>
         <?php $this->load->view('common/jsLinkPage'); ?>
		 



