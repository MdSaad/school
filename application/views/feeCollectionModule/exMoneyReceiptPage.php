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
					 <table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>
            			<?php $this->load->view('common/reportHeader'); 
							$info		= $this->M_crud->findById('ex_stu_fee_collection', array('invoice_no' => $invoice_no));
							$details	= $this->M_crud->findAll('ex_stu_fee_collection', array('invoice_no' => $invoice_no), 'id', 'asc'); 
						?>
						<h6 class="text-center"><u> <?php echo $title; ?></u></h6>
						
						<table id="dynamic-table" class="table table-striped">

								<tbody>
									<tr> 
									    <td align="center" valign="middle" class="text-center" width="100%">
										<table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                          <tr>
                                            <td width="50%" align="left" valign="middle"><strong>Name: </strong><?php echo $info->student_name; ?></td>
                                            <td width="50%" align="right" valign="top">Date:<?php echo date('d-M-Y', strtotime($info->collection_date)); ?></td>
                                          </tr>
                                        </table>
										</td>
									</tr>
									
									<tr> 
									    <td align="center" valign="middle" class="text-left reportTable">
											<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-condensed">
											  <thead>
												  <tr>
													<td colspan="3"><strong>Receipt No : </strong> #<?php echo $info->invoice_prefix; ?>-<?php echo $info->invoice_no; ?> <strong class="pull-right">Student Copy </strong></td>
												  </tr>
											  </thead>
											  
											  <thead>
												  <tr>
													<td><strong>#</strong></td>
													<td><strong>Head</strong></td>
													<td class="text-right"><strong>Amount (TK)</strong></td>
												  </tr>
											  </thead> 
											  <?php 
												$slNo = 1;
												$totalAmount = 0;
												foreach($details as $v) { 
												
												$totalAmount	= $totalAmount+$v->pay_amount;
												$head = $this->M_crud->findById('fee_head_list_manage', array('id' => $v->head_id));
												
												if($head) {
													$headName = $head->head_name;
												} else {
													$headName = "Other's";
												}
												?>
											  <tr>
												<td><?php echo $slNo++; ?></td>
												<td><?php echo $headName; ?><em><?php if(!empty($v->pay_head_details)) { ?>-<?php echo $v->pay_head_details; } ?></em></td>
												<td align="right" valign="middle"><?php echo number_format($v->pay_amount,2); ?>/-</td>
											  </tr>
											<?php } ?> 
											
											  <tr>
												<td colspan="2" class="text-right"><span class="pull-left"><strong>Money is not refundable</strong></span></td>
												<td class="text-right"><strong>Total&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo number_format($totalAmount,2); ?>/-</strong></td>
											  </tr> 
											</table>
										</td>
									</tr>
									<tr>
										<td align="center" valign="bottom"> <br><br><span class="borderTop pull-left">&nbsp;&nbsp;&nbsp;Account&nbsp;&nbsp; &nbsp;</span> <span class="borderTop pull-right">Founder Director</span></td>
									</tr>
								
								</tbody>
					  </table>
					
					 
	</td>
	<td>&nbsp;&nbsp;&nbsp;</td>
    <td>
            			<?php $this->load->view('common/reportHeader'); ?>
						<h6 class="text-center"><u> <?php echo $title; ?></u></h6>
						
						<table id="dynamic-table" class="table table-striped">

								<tbody>
									<tr> 
									    <td align="center" valign="middle" class="text-center" width="100%">
										<table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                          <tr>
                                            <td width="50%" align="left" valign="middle"><strong>Name: </strong><?php echo $info->student_name; ?></td>
                                            <td width="50%" align="right" valign="top">Date:<?php echo date('d-M-Y', strtotime($info->collection_date)); ?></td>
                                          </tr>
                                        </table>
										</td>
									</tr>
									
									<tr> 
									    <td align="center" valign="middle" class="text-left reportTable">
											<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-condensed">
											  <thead>
												  <tr>
													<td colspan="3"><strong>Receipt No : </strong> #<?php echo $info->invoice_prefix; ?>-<?php echo $info->invoice_no; ?> <strong class="pull-right">Office Copy </strong></td>
												  </tr>
											  </thead>
											  
											  <thead>
												  <tr>
													<td><strong>#</strong></td>
													<td><strong>Head</strong></td>
													<td class="text-right"><strong>Amount (TK)</strong></td>
												  </tr>
											  </thead> 
											  <?php 
												$slNo = 1;
												$totalAmount = 0;
												foreach($details as $v) { 
												
												$totalAmount	= $totalAmount+$v->pay_amount;
												$head = $this->M_crud->findById('fee_head_list_manage', array('id' => $v->head_id));
												
												if($head) {
													$headName = $head->head_name;
												} else {
													$headName = "Other's";
												}
												?>
											  <tr>
												<td><?php echo $slNo++; ?></td>
												<td><?php echo $headName; ?><em><?php if(!empty($v->pay_head_details)) { ?>-<?php echo $v->pay_head_details; } ?></em></td>
												<td align="right" valign="middle"><?php echo number_format($v->pay_amount,2); ?>/-</td>
											  </tr>
											<?php } ?> 
											
											  <tr>
												<td colspan="2" class="text-right"><span class="pull-left"><strong>Money is not refundable</strong></span></td>
												<td class="text-right"><strong>Total&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo number_format($totalAmount,2); ?>/-</strong></td>
											  </tr> 
											</table>
										</td>
									</tr>
									<tr>
										<td align="center" valign="bottom"> <br><br><span class="borderTop pull-left">&nbsp;&nbsp;&nbsp;Account&nbsp;&nbsp; &nbsp;</span> <span class="borderTop pull-right">Founder Director</span></td>
									</tr>
								
								</tbody>
					  </table>
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
		 



