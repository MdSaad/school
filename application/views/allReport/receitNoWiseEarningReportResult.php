<!DOCTYPE html>
<html lang="en">
<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $title; ?></title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<script type="text/javascript" language="javascript" src="<?php echo site_url('adapter/javascript'); ?>"></script>
		<link href="<?php echo base_url('resource/css/reportSmallFontStyle.css'); ?>" rel="stylesheet" />
</head>
	<body>
			<div class="container">
				<div class="">
					<div class="aFourSize">
					 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
            			<?php $this->load->view('common/reportHeader'); ?>
						<h6 class="text-center"><u> Fee Collection </u></h6>
						<?php if(!empty($stuPayDetailsInfo)) {  ?> 
						
						<table id="dynamic-table" class="table table-striped ">

								<tbody>
									<tr> 
									    <td align="center" valign="middle" class="text-center">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="15%" align="left" valign="middle"><strong>Name </strong></td>
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
											<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-condensed">
											  <thead>
												  <tr>
													<td colspan="4"><strong>Receipt No : </strong> <?php echo $recetno; ?> <strong class="pull-right">Student Copy </strong></td>
												  </tr>
											  </thead>
											  
											  <thead>
												  <tr>
													<th>SL No</th>
													<th>Date</th>
													<th>Head With Description</th>
													<th>Amount (TK)</th>
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
												<td><?php echo date("Y-M-d", strtotime($v->submittedDate)); ?></td>
												<td><?php echo $v->fee_head_applicable_mode_name; ?><?php if(!empty($v->pay_head_details)) { ?>-<?php echo $v->pay_head_details; } ?></td>
												<td><?php echo $v->fee_head_mode_pay_amount; ?>/-</td>
											  </tr>
										    </tbody> 
											<?php } ?> 
											
											<tr>
												<th colspan="3" class="text-right"><span class="pull-left">Money is not refundable</span>Total :</th>
												<th><?php echo number_format($totalAmount,2); ?>/-</th>
											  </tr> 
											</table>
										</td>
									</tr>
									<tr>
										<td align="center" valign="bottom"> <br><br><span class="borderTop pull-left">&nbsp;&nbsp;&nbsp;Account&nbsp;&nbsp; &nbsp;</span> <span class="borderTop pull-right">Founder Director</span></td>
									</tr>
								
								</tbody>
					  </table>
					
					 <?php } else { ?> 
					 <div class="alert alert-danger">
			<strong>Warning!</strong> Sorry System Could Not Find Anything. Please Check Information and Try Again!
		  </div>
		  			<?php } ?>
	</td>
	<td>&nbsp;&nbsp;&nbsp;</td>
    <td>
            			<?php $this->load->view('common/reportHeader'); ?>
						<h6 class="text-center"><u> Fee Collection </u></h6>
						<?php if(!empty($stuPayDetailsInfo)) {  ?> 
						
						<table id="dynamic-table" class="table table-striped">

								<tbody>
									<tr> 
									    <td align="center" valign="middle" class="text-center">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="15%" align="left" valign="middle"><strong>Name </strong></td>
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
											<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-condensed">
											  <thead>
												  <tr>
													<td colspan="4"><strong>Receipt No : </strong> <?php echo $recetno; ?> <strong class="pull-right">Office Copy </strong></td>
												  </tr>
											  </thead>
											  
											  <thead>
												  <tr>
													<th>SL No</th>
													<th>Date</th>
													<th>Head With Description</th>
													<th>Amount (TK)</th>
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
												<td><?php echo date("Y-M-d", strtotime($v->submittedDate)); ?></td>
												<td><?php echo $v->fee_head_applicable_mode_name; ?><?php if(!empty($v->pay_head_details)) { ?>-<?php echo $v->pay_head_details; } ?></td>
												<td><?php echo $v->fee_head_mode_pay_amount; ?>/-</td>
											  </tr>
										    </tbody> 
											<?php } ?> 
											
											<tr>
												<th colspan="3" class="text-right"><span class="pull-left">Money is not refundable</span>Total :</th>
												<th><?php echo number_format($totalAmount,2); ?>/-</th>
											  </tr> 
											</table>
										</td>
									</tr>
									<tr>
										<td align="center" valign="bottom"> <br><br><span class="borderTop pull-left">&nbsp;&nbsp;&nbsp;Account&nbsp;&nbsp; &nbsp;</span> <span class="borderTop pull-right">Founder Director</span></td>
									</tr>
								
								</tbody>
					  </table>
					
					 <?php } else { ?> 
					 <div class="alert alert-danger">
			<strong>Warning!</strong> Sorry System Could Not Find Anything. Please Check Information and Try Again!
		  </div>
		  			<?php } ?>
	</td>
  </tr>
</table>
	
					  <div class="text-center"><input type="button" value="&nbsp;&nbsp; Print &nbsp; &nbsp; " class=" btn-default fullPrint" onClick="fullPagePrint()" /></div>
			      </div>
				</div>
			</div>
	</body>		
            
	</html>
         <?php //$this->load->view('common/footer'); ?>
         <?php $this->load->view('common/jsLinkPage'); ?>
		 



