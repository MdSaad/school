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
            			<?php $this->load->view('common/stuReportHeader'); ?>
						
						<h4 class="text-center"><u>Student Fee Collection Report</u></h4>
						
						
						<?php if(!empty($stuPayDetailsInfo)) {  ?> 
						
						<table id="dynamic-table" class="table table-striped table-bordered ">

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
											<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-condensed">
											  <thead>
												  <tr>
													<td colspan="4"><strong>Receipt No : </strong> <?php echo $recetno; ?> </td>
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
												<td><?php echo $v->submittedDate; ?></td>
												<td><?php echo $v->fee_head_applicable_mode_name; ?><?php if(!empty($v->pay_head_details)) { ?>-<?php echo $v->pay_head_details; } ?></td>
												<td><?php echo $v->fee_head_mode_pay_amount; ?>/-</td>
											  </tr>
										    </tbody> 
											<?php } ?> 
											
											<tr>
												<th colspan="3" class="text-right">Total :</th>
												<th><?php echo number_format($totalAmount,2); ?>/-</th>
											  </tr> 
										    <tr>
												<th colspan="4" class="text-right"><a href="#" class="pull-right print">Print</a></th>
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
		   $('.print').click(function(){
				 window.print();
		   });
		</script>



