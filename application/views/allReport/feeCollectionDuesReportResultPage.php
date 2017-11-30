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
						
						<h4 class="text-center"><u>Dues Fee Collection Report</u></h4>
						
						<?php if(!empty($stuPayDetailsInfo) || !empty($classWiseFeeCollectionPayDetailsInfo)) { ?>
						<?php if(!empty($stuPayDetailsInfo)) { 
						 ?>
						<table id="dynamic-table" class="table table-striped table-bordered table-hostuDetailsInfoer">

								<tbody>
									<tr> 
									    <td align="center" valign="middle" class="text-center">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="15%" align="left" valign="middle"><strong>Student Name </strong></td>
                                            <td width="5%" align="center" valign="middle">:</td>
                                            <td width="80%" align="left" valign="middle"><?php echo $stuDetailsInfo->stu_full_name; ?></td>
                                            <td width="80%" rowspan="4" align="right" valign="top">
											   <?php
													 if(!empty($stuDetailsInfo->stu_photo)){ ?>
													<img src="<?php echo base_url("resource/stu_photo/$stuDetailsInfo->stu_photo"); ?>" width="50" height="50"> 
												<?php }else{  if($stuDetailsInfo->stu_sex == 'M'){ ?>
														 <img src="<?php echo base_url('resource/img/male.png'); ?>" width="50" height="40"> 
												<?php }else{ ?>
													   <img src="<?php echo base_url('resource/img/EmptyProfile.png'); ?>" width="50" height="40"> 
												<?php } } ?>
											</td>
                                          </tr>
                                          <tr>
                                            <td align="left" valign="middle"><strong>ID</strong></td>
                                            <td align="center" valign="middle">:</td>
                                            <td align="left" valign="middle"><?php echo $stuDetailsInfo->stu_id; ?></td>
                                          </tr>
                                          <tr>
                                            <td align="left" valign="middle"><strong>Class</strong></td>
                                            <td align="center" valign="middle">:</td>
                                            <td align="left" valign="middle"><?php echo $stuDetailsInfo->class_name; ?></td>
                                          </tr>
                                          <tr>
                                            <td align="left" valign="middle"><strong>Class Roll </strong></td>
                                            <td align="center" valign="middle">:</td>
                                            <td align="left" valign="middle"><?php echo $stuDetailsInfo->class_roll; ?></td>
                                          </tr>
                                        </table>
										</td>
									</tr>
									
									<tr> 
									    <td align="center" valign="middle" class="text-left">
											<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-condensed ">
											  <thead>
												  <tr>
													<td colspan="4">Year- <strong><?php echo $year; ?></strong></td>
												  </tr>
											  </thead>
											  
											  <thead>
												  <tr>
													<th>SL No</th>
													<th>Head</th>
													<th>Total Amount (TK)</th>
													<th>Total Paid (TK)</th>
												    <th>Dues Amount (TK) </th>
												  </tr>
											  </thead> 
											  <?php 
												$slNo = 1;
												$totalAmount = 0;
												$totalPayAmount = 0;
												$totalDuesAmount = 0;
												foreach($stuPayDetailsInfo as $v) { 
												$totalAmount = $v->mode_total_amount+$totalAmount;
												$totalPayAmount = $v->mode_pay_amount+$totalPayAmount;
												$totalDuesAmount = $v->mode_due_amount+$totalDuesAmount;
												?>
											<tbody>	
											  <tr class="<?php if($v->mode_due_amount == 0) { echo "noDueBg"; } else if($v->mode_due_amount != $v->mode_total_amount) { echo "notEqualBg"; } else { echo "equalBg"; } ?>" >
												<td><?php echo $slNo++; ?></td>
												<td><?php echo $v->applicable_mode_name; ?></td>
												<td><?php echo $v->mode_total_amount; ?>/-</td>
												<td><?php echo $v->mode_pay_amount; ?>/-</td>
											    <td><?php echo $v->mode_due_amount; ?> /- </td>
											  </tr>
										    </tbody> 
											<?php } ?> 
											
											<tr>
												<th colspan="2" class="text-right">Total :</th>
												<th><?php echo number_format($totalAmount,2); ?>/-</th>
												<th><?php echo number_format($totalPayAmount,2); ?>/-</th>
											    <th><?php echo number_format($totalDuesAmount,2); ?>/-</th>
											</tr> 
										    <tr>
												<th colspan="5" class="text-right"><a href="#" class="pull-right">Print</a></th>
											  </tr>
											</table>
										</td>
									</tr>
								
								</tbody>
					  </table>
					 <?php } ?>
					 
					 <?php if(!empty($classWiseFeeCollectionPayDetailsInfo)) {  ?>
					 	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-bordered table table-striped">
									  <tr>
										<td colspan="4">Year-<strong><?php echo $year; ?></strong></td>
									  </tr>
									  <tr>
										<td colspan="4" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0" class=" table" style="width:50%">
                                          
										 
										  <tr>
                                            <th>Class Name </th>
                                            <th>&nbsp;</th>
                                            <th>Total Amount (TK) </th>
                                            <th>Dues Amount (TK) </th>
                                          </tr>
										   <?php 
										   	$totalAmount = 0;
											$totalDuesAmount = 0;
											foreach($classWiseFeeCollectionPayDetailsInfo as $v) {
											$totalCollectionClassWise = 0;
											$totalDuesCollectionClassWise = 0;
										   	foreach ($v->classWiseCollection as $sub) { 
												 $totalCollectionClassWise = $sub->mode_total_amount+$totalCollectionClassWise;
												 $totalDuesCollectionClassWise = $sub->mode_due_amount+$totalDuesCollectionClassWise;
												
											}
												$totalAmount = $totalCollectionClassWise+$totalAmount;
												$totalDuesAmount = $totalDuesCollectionClassWise+$totalDuesAmount;
										   
										    ?>
                                          <tr  class="<?php if($totalCollectionClassWise != $totalDuesCollectionClassWise) { echo "notEqualBg"; } else { echo "equalBg"; } ?>">
                                            <td><?php echo $v->class_name; ?></td>
                                            <td align="center" valign="middle"><strong>:</strong></td>
                                            <td><?php echo number_format($totalCollectionClassWise,2); ?>/-</td>
                                            <td><?php echo number_format($totalDuesCollectionClassWise,2); ?> /-</td>
                                          </tr>
										 <?php } ?> 
										 
										 <tr>
                                            <td colspan="2" class="text-right"><strong>Total Amount</strong></td>
                                            <td><?php echo number_format($totalAmount,2); ?>/-</td>
                                            <td><?php echo number_format($totalDuesAmount,2); ?>/-</td>
                                          </tr>
                                        </table></td>
									  </tr>
									  <tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>Print</td>
									  </tr>
									</table>

					 <?php } } else { ?> 
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
		 



