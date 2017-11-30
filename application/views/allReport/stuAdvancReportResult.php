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
							<h4 class="text-center"><u>Student Advance Report</u></h4>
						<?php if(!empty($stuDetailsInfo) || ($allStuDetailsInfo)) { 
						 if(!empty($stuDetailsInfo)) { 
						 ?>
						<table id="dynamic-table" class="table table-striped table-bordered table-hostuDetailsInfoer">
								<thead>
									<tr>
									  <th align="right" valign="middle" class="text-right">Stu ID</th>
										<th align="center" valign="middle" class="text-center">Name</th>
										<th align="center" valign="middle" class="text-center" >Branch</th>
										<th align="center" valign="middle" class="text-center">Class</th>
										<th align="center" valign="middle" class="text-center" >Roll</th>
										<th align="center" valign="middle" class="text-center" >Image</th>
									</tr>
								</thead> 

								<tbody>
							
									<tr>
									  <td align="right"><a href="#"><?php echo $stuDetailsInfo->stu_current_id; ?></a></td>
										<td align="center" class="text-center"><?php echo $stuDetailsInfo->stu_full_name; ?></td>
										<td align="center" class="text-center"><?php echo $stuDetailsInfo->currClassInfo->branch_name; ?></td>
										<td align="center" class="text-center"><?php echo $stuDetailsInfo->currClassInfo->class_name; ?></td>

										<td align="center" class="text-center"><?php echo $stuDetailsInfo->currClassInfo->class_roll; ?></td>
										<td align="center" class="text-center">
										   <?php if(!empty($stuDetailsInfo->stu_photo)){ ?>
													   <img src="<?php echo base_url("resource/stu_photo/$stuDetailsInfo->stu_photo") ?>" width="50" height="50" />
													 <?php } else {  if($stuDetailsInfo->stu_sex == 'M'){ ?>
														 <img src="<?php echo base_url('resource/img/male.png'); ?>" width="50" height="50">  
													 <?php } else {  ?>
													 <img src="<?php echo base_url('resource/img/EmptyProfile.png'); ?>" width="50" height="50">  
											<?php } } ?>	
										</td>
									</tr>
									<tr>
									  <td align="right" valign="middle">&nbsp;</td>
									  <td colspan="5" align="center">&nbsp;</td>
								  </tr>
								   <?php if(!empty($StuPhone)) { ?>
									<tr>
									  <td align="right" valign="middle"><strong>Phone Number </strong></td>
									  <td colspan="5" align="left"><?php echo $stuDetailsInfo->stu_mobile; ?></td>
								  </tr>
								  <?php } if(!empty($StuEmail)) { ?>
									<tr>
									  <td align="right" valign="middle"><strong>Email ID </strong></td>
									  <td colspan="5" align="left"><?php echo $stuDetailsInfo->stu_mail_adrs; ?></td>
								  </tr>
								  <?php } if (!empty($StuPrntsPresAdrs)) { ?>
									<tr>
									  <td align="right" valign="middle"><span class="text-center"><strong>Present Address </strong></span></td>
									  <td colspan="5" align="left"><?php echo $stuDetailsInfo->f_pre_adrs; ?></td>
								  </tr>
								    <?php } if (!empty($StuPrntsPersAdrs)) { ?>
									<tr>
									  <td align="right" valign="middle"><span class="text-center"><strong>Permenent Address </strong></span></td>
									  <td colspan="5" align="left"><?php echo $stuDetailsInfo->f_per_adrs; ?></td>
								  </tr>
								  <?php } if(!empty($StuGrdnsPresAdrs)) {  ?>
									<tr>
									  <td align="right" valign="middle"><strong> Students  Guardian Present Address</strong></td>
									  <td colspan="5" align="left"><?php echo $stuDetailsInfo->g_pre_adrs; ?></td>
								  </tr>
								  <?php } if(!empty($StuGrdnsPhone)) {  ?>
									<tr>
									  <td align="right" valign="middle"><strong> Students Guardian Contact Phone/Cell</strong></td>
									  <td colspan="5" align="left"><?php echo $stuDetailsInfo->g_mobile; ?></td>
								  </tr>
								    <?php } if(!empty($StuGrdnsEmail)) {  ?>
									<tr>
									  <td align="right" valign="middle"><strong> Students  Guardian Contact Email</strong></td>
									  <td colspan="5" align="left"><?php echo $stuDetailsInfo->g_email; ?></td>
								  </tr>
								  <?php } ?>
								</tbody>
					  </table>
					  <?php } if($allStuDetailsInfo) { ?>
					  	<table id="dynamic-table" class="table table-striped table-bordered table-hostuDetailsInfoer">
							
								<thead>
									<tr>
									  <th align="center" valign="middle" class="text-center">SL</th>
									  <th align="right" valign="middle" class="text-right">Stu ID</th>
										<th align="center" valign="middle" class="text-center">Name</th>
										<th align="center" valign="middle" class="text-center" >Branch</th>
										<th align="center" valign="middle" class="text-center">Class</th>
										<th align="center" valign="middle" class="text-center" >Roll</th>
										<th align="center" valign="middle" class="text-center" >Image</th>
									</tr>
								</thead> 
								<tbody class="">
									<?php $sl = 1;
							 foreach($allStuDetailsInfo as $v) { ?>
								
									<tr>
									  <td align="center"><?php echo $sl++; ?></td>
									  <td align="right"><a href="#"><?php echo $v->stu_current_id; ?></a></td>
										<td align="center" class="text-center"><?php echo $v->stu_full_name; ?></td>
										<td align="center" class="text-center"><?php echo $v->branch_name; ?></td>
										<td align="center" class="text-center"><?php echo $v->class_name; ?></td>

										<td align="center" class="text-center"><?php echo $v->class_roll; ?></td>
										<td align="center" class="text-center">
										    <?php if(!empty($v->stu_photo)){ ?>
													   <img src="<?php echo base_url("resource/stu_photo/$v->stu_photo") ?>" width="50" height="50" />
													 <?php } else {  if($v->stu_sex == 'M'){ ?>
														 <img src="<?php echo base_url('resource/img/male.png'); ?>" width="50" height="50">  
													 <?php } else {  ?>
													 <img src="<?php echo base_url('resource/img/EmptyProfile.png'); ?>" width="50" height="50">  
											<?php } } ?>
										</td>
									</tr>
									
								   <?php if(!empty($allStuPhone)) { ?>
									<tr>
									  <td align="right" valign="middle">&nbsp;</td>
									  <td align="right" valign="middle"><strong>Phone Number </strong></td>
									  <td colspan="5" align="left"><?php echo $v->stu_mobile; ?></td>
								  </tr>
								  <?php } if(!empty($allStuEmail)) { ?>
									<tr>
									  <td align="right" valign="middle">&nbsp;</td>
									  <td align="right" valign="middle"><strong>Email ID </strong></td>
									  <td colspan="5" align="left"><?php echo $v->stu_mail_adrs; ?></td>
								  </tr>
								  <?php } if (!empty($allStuPrntsPresAdrs)) { ?>
									<tr>
									  <td align="right" valign="middle">&nbsp;</td>
									  <td align="right" valign="middle"><span class="text-center"><strong>Present Address </strong></span></td>
									  <td colspan="5" align="left"><?php echo $v->f_pre_adrs; ?></td>
								  </tr>
								    <?php } if (!empty($allStuPrntsPersAdrs)) { ?>
									<tr>
									  <td align="right" valign="middle">&nbsp;</td>
									  <td align="right" valign="middle"><span class="text-center"><strong>Permenent Address </strong></span></td>
									  <td colspan="5" align="left"><?php echo $v->f_per_adrs; ?></td>
								  </tr>
								  <?php } if(!empty($allStuGrdnsPresAdrs)) {  ?>
									<tr>
									  <td align="right" valign="middle">&nbsp;</td>
									  <td align="right" valign="middle"><strong> Students  Guardian Present Address</strong></td>
									  <td colspan="5" align="left"><?php echo $v->g_pre_adrs; ?></td>
								  </tr>
								  <?php } if(!empty($allStuGrdnsPhone)) {  ?>
									<tr>
									  <td align="right" valign="middle">&nbsp;</td>
									  <td align="right" valign="middle"><strong> Students Guardian Contact Phone/Cell</strong></td>
									  <td colspan="5" align="left"><?php echo $v->g_mobile; ?></td>
								  </tr>
								    <?php } if(!empty($allStuGrdnsEmail)) {  ?>
									<tr>
									  <td align="right" valign="middle">&nbsp;</td>
									  <td align="right" valign="middle"><strong> Students  Guardian Contact Email</strong></td>
									  <td colspan="5" align="left"><?php echo $v->g_email; ?></td>
								  </tr>
								  
								   <?php } ?>
								  <?php } ?>
									<tr>
									  <td align="right" valign="middle">&nbsp;</td>
									  <td align="right" valign="middle"><strong>Total</strong></td>
									  <td colspan="5" align="left"><?php echo $totalStu; ?></td>
								  </tr>
								</tbody>
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
		 



