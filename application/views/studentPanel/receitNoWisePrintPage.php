<!DOCTYPE html>
<html lang="en">
<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $title; ?></title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<style>
		   .dotted {border: 1px dotted #ff0000; border-style: none none dotted; color: #fff; background-color: #fff; }
		</style>
<script type="text/javascript" language="javascript" src="<?php echo site_url('adapter/javascript'); ?>"></script>
</head>
	<body>
			<div class="container">
				<div class="">
					<div class="aFourSize">
            			<?php $this->load->view('common/printHeader'); ?>
						
						
						
						<?php if(!empty($stuPayDetailsInfo)) {  ?> 
						
						<table id="dynamic-table" class="table table-striped table-bordered ">

								<tbody>
									<tr> 
									    <td align="center" valign="middle" class="text-center">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="17%" align="left" valign="middle"><strong>Student Name </strong></td>
                                            <td width="1%" align="center" valign="middle">:</td>
                                            <td width="20%" align="left" valign="middle"><?php echo $stuDetailsInfo->stu_full_name; ?></td>
                                            <td width="30%" align="left" valign="middle"><strong>ID</strong></td>
                                            <td width="32%" align="left" valign="middle">: <?php echo $stuDetailsInfo->stu_id; ?></td>
                                          </tr>
                                          <tr>
                                            <td align="left" valign="middle"><strong>Class </strong></td>
                                            <td align="center" valign="middle">:</td>
                                            <td align="left" valign="middle"><?php echo $stuDetailsInfo->class_name; ?></td>
                                            <td align="left" valign="middle"><strong>Class Roll</strong></td>
                                            <td align="left" valign="middle">: <?php echo $stuDetailsInfo->class_roll; ?></td>
                                          </tr>
                                        </table>
										</td>
									</tr>
									
									<tr> 
									    <td align="center" valign="middle" class="text-left" style="padding-bottom: 0">
											<table width="100%" border="1" cellspacing="0" cellpadding="0" class="">
											  <thead>
											  </thead>
											  
											  <thead>
												  <tr>
													<th align="left" valign="middle">&nbsp; SL No</th>
													<th align="left" valign="middle"> &nbsp; Date</th>
													<th align="left" valign="middle"> &nbsp; Head With Description</th>
													<th align="right" valign="middle" class="text-right"> &nbsp; Amount (TK)</th>
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
												<td align="left" valign="middle"> &nbsp; <?php echo $slNo++; ?></td>
												<td align="left" valign="middle"> &nbsp; <?php echo $v->submittedDate; ?></td>
												<td align="left" valign="middle"> &nbsp; <?php echo $v->fee_head_applicable_mode_name; ?><?php if(!empty($v->pay_head_details)) { ?>-<?php echo $v->pay_head_details; } ?></td>
												<td align="right" valign="middle"> &nbsp; <?php echo $v->fee_head_mode_pay_amount; ?>/-</td>
											  </tr>
										    </tbody> 
											<?php } ?>  
											
											<tr>
											   <th class="text-left"> &nbsp; <strong>Receipt No : </strong> <?php echo $recetno; ?> </th>
												<th colspan="2" class="text-right">Total :</th>
												<th align="right" valign="middle" class="text-right"><?php echo number_format($totalAmount,2); ?>/-</th>
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
				    <div style="border-bottom:dashed 1px #0000FF;"></div>
					 <div class="aFourSize" style="padding-top:5px;">
            			<?php $this->load->view('common/printHeader'); ?>
						
						
						
						<?php if(!empty($stuPayDetailsInfo)) {  ?> 
						
						<table id="dynamic-table" class="table table-striped table-bordered ">

								<tbody>
									<tr> 
									    <td align="center" valign="middle" class="text-center">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="17%" align="left" valign="middle"><strong>Student Name </strong></td>
                                            <td width="1%" align="center" valign="middle">:</td>
                                            <td width="20%" align="left" valign="middle"><?php echo $stuDetailsInfo->stu_full_name; ?></td>
                                            <td width="30%" align="left" valign="middle"><strong>ID</strong></td>
                                            <td width="32%" align="left" valign="middle">: <?php echo $stuDetailsInfo->stu_id; ?></td>
                                          </tr>
                                          <tr>
                                            <td align="left" valign="middle"><strong>Class </strong></td>
                                            <td align="center" valign="middle">:</td>
                                            <td align="left" valign="middle"><?php echo $stuDetailsInfo->class_name; ?></td>
                                            <td align="left" valign="middle"><strong>Class Roll</strong></td>
                                            <td align="left" valign="middle">: <?php echo $stuDetailsInfo->class_roll; ?></td>
                                          </tr>
                                        </table>
										</td>
									</tr>
									
									<tr> 
									    <td align="center" valign="middle" class="text-left" style="padding-bottom: 0">
											<table width="100%" border="1" cellspacing="0" cellpadding="0" class="">
											  <thead>
											  </thead>
											  
											  <thead>
												  <tr>
													<th align="left" valign="middle">&nbsp; SL No</th>
													<th align="left" valign="middle"> &nbsp; Date</th>
													<th align="left" valign="middle"> &nbsp; Head With Description</th>
													<th align="right" valign="middle" class="text-right"> &nbsp; Amount (TK)</th>
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
												<td align="left" valign="middle"> &nbsp; <?php echo $slNo++; ?></td>
												<td align="left" valign="middle"> &nbsp; <?php echo $v->submittedDate; ?></td>
												<td align="left" valign="middle"> &nbsp; <?php echo $v->fee_head_applicable_mode_name; ?><?php if(!empty($v->pay_head_details)) { ?>-<?php echo $v->pay_head_details; } ?></td>
												<td align="right" valign="middle"> &nbsp; <?php echo $v->fee_head_mode_pay_amount; ?>/-</td>
											  </tr>
										    </tbody> 
											<?php } ?>  
											
											<tr>
											   <th class="text-left"> &nbsp; <strong>Receipt No : </strong> <?php echo $recetno; ?> </th>
												<th colspan="2" class="text-right">Total :</th>
												<th align="right" valign="middle" class="text-right"><?php echo number_format($totalAmount,2); ?>/-</th>
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
				   <div style="border-bottom:dashed 1px #0000FF;"></div>
				    <div class="aFourSize" style="padding-top:5px;">
            			<?php $this->load->view('common/printHeader'); ?>
						
						
						
						<?php if(!empty($stuPayDetailsInfo)) {  ?> 
						
						<table id="dynamic-table" class="table table-striped table-bordered ">

								<tbody>
									<tr> 
									    <td align="center" valign="middle" class="text-center">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="17%" align="left" valign="middle"><strong>Student Name </strong></td>
                                            <td width="1%" align="center" valign="middle">:</td>
                                            <td width="20%" align="left" valign="middle"><?php echo $stuDetailsInfo->stu_full_name; ?></td>
                                            <td width="30%" align="left" valign="middle"><strong>ID</strong></td>
                                            <td width="32%" align="left" valign="middle">: <?php echo $stuDetailsInfo->stu_id; ?></td>
                                          </tr>
                                          <tr>
                                            <td align="left" valign="middle"><strong>Class </strong></td>
                                            <td align="center" valign="middle">:</td>
                                            <td align="left" valign="middle"><?php echo $stuDetailsInfo->class_name; ?></td>
                                            <td align="left" valign="middle"><strong>Class Roll</strong></td>
                                            <td align="left" valign="middle">: <?php echo $stuDetailsInfo->class_roll; ?></td>
                                          </tr>
                                        </table>
										</td>
									</tr>
									
									<tr> 
									    <td align="center" valign="middle" class="text-left" style="padding-bottom: 0">
											<table width="100%" border="1" cellspacing="0" cellpadding="0" class="">
											  <thead>
											  </thead>
											  
											  <thead>
												  <tr>
													<th align="left" valign="middle">&nbsp; SL No</th>
													<th align="left" valign="middle"> &nbsp; Date</th>
													<th align="left" valign="middle"> &nbsp; Head With Description</th>
													<th align="right" valign="middle" class="text-right"> &nbsp; Amount (TK)</th>
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
												<td align="left" valign="middle"> &nbsp; <?php echo $slNo++; ?></td>
												<td align="left" valign="middle"> &nbsp; <?php echo $v->submittedDate; ?></td>
												<td align="left" valign="middle"> &nbsp; <?php echo $v->fee_head_applicable_mode_name; ?><?php if(!empty($v->pay_head_details)) { ?>-<?php echo $v->pay_head_details; } ?></td>
												<td align="right" valign="middle"> &nbsp; <?php echo $v->fee_head_mode_pay_amount; ?>/-</td>
											  </tr>
										    </tbody> 
											<?php } ?>  
											
											<tr>
											   <th class="text-left"> &nbsp; <strong>Receipt No : </strong> <?php echo $recetno; ?> </th>
												<th colspan="2" class="text-right">Total :</th>
												<th align="right" valign="middle" class="text-right"><?php echo number_format($totalAmount,2); ?>/-</th>
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
		 <script>
		    window.print();
		 </script>
		



