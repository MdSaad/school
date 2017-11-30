<!DOCTYPE html>
<html lang="en">
<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $title; ?></title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<?php $this->load->view('common/cssLinkPage'); ?>
<script type="text/javascript" language="javascript" src="<?php echo site_url('adapter/javascript'); ?>"></script>
<style>
  .idStyle {
    border: 2px solid #a1a1a1;
    background: #dddddd;
    width: 300px;
	background:#FFFBDC;
}

   
</style>
</head>
	<body>
			<div class="container">
				<div class="">
					<div class="aFourSize">
            			<?php $this->load->view('common/reportHeader'); ?>
						
						<h4 class="text-center"><u>Student Id List</u></h4>
						
						
						<?php if(!empty($studentIdDetails)){ ?>
						<table id="dynamic-table" class="table table-bordered ">

								<tbody>
									<tr> 
									    <td align="center" valign="middle" class="text-center">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td colspan="2" align="center" valign="middle">
											 <div class="row">
											 
											 <?php if($student =='one'){ ?>
												   <div class="col-md-4"></div>
													 <div class="col-md-4" style="padding-bottom:10px">
														<table width="100%" border="0" class="idStyle">
														  <tr>
															<td width="16%" rowspan="10" align="center" valign="middle" style="background-color:#449BBC; color:#FFFFFF; font-weight:bold; font-size:20px">S <br> 
															T<br> U <br> D<br> E<br> N<br> T</td>
															<td width="84%" align="center" valign="middle" style="padding-top:5px"><img src="<?php echo base_url('resource/interface/img/sailors_logo.png'); ?>" class="img-responsive center-block" style="height:80px" /></td>
														  </tr>
														  <tr>
															<td height="67" align="center" valign="middle"><span style="color:#544562; font-size:20px;font-weight:bold; padding:0 15px 0 15px">Islami Academy School & College Trishal </span></td>
														  </tr>
														  <tr>
															<td align="center" valign="middle">
															   <?php
																	 if(!empty($studentIdDetails->stu_photo)){ ?>
																	<img src="<?php echo base_url("resource/stu_photo/$studentIdDetails->stu_photo"); ?>" width="70" height="80"> 
																<?php }else{  if($studentIdDetails->stu_sex == 'M'){ ?>
																		 <img src="<?php echo base_url('resource/img/male.png'); ?>" width="70" height="80"> 
																<?php }else{ ?>
																	   <img src="<?php echo base_url('resource/img/EmptyProfile.png'); ?>" width="70" height="80"> 
																<?php } } ?>
																
															 </td>
														  </tr>
														  <tr>
															<td height="34" align="center" valign="middle"><span style="color:#544562; font-size:15px;font-weight:bold; padding:0 15px 0 15px"><?php echo $studentIdDetails->stu_full_name ?></span></td>
														  </tr>
														  
														  <tr>
															<td align="center" valign="middle"><table width="100%" border="0">
															  <tr>
																<td width="16%" align="left" valign="middle">&nbsp;</td>
																<td width="33%" align="left" valign="middle"><strong style="color:#544562;">Class</strong></td>
																<td width="51%" align="left" valign="middle"><strong>: <?php echo $studentIdDetails->class_name ?> </strong></td>
															  </tr>
															  <tr>
																<td align="left" valign="middle">&nbsp;</td>
																<td align="left" valign="middle"><strong style="color:#544562;">Class Roll</strong></td>
																<td align="left" valign="middle"><strong>: <?php echo $studentIdDetails->class_roll ?> </strong></td>
															  </tr>
															  <tr>
																<td align="left" valign="middle">&nbsp;</td>
																<td align="left" valign="middle"><strong style="color:#544562;">Duration</strong></td>
																<td align="left" valign="middle"><strong>: <?php echo $currentYear ?> - <?php echo $currentYear+1; ?> </strong></td>
															  </tr>
															</table></td>
														  </tr>
														  <tr>
															<td align="right" valign="middle" style="padding:5px 20px 0 0;"><img src="<?php echo base_url('resource/img/signature.png'); ?>"></td>
														  </tr>
														  <tr>
															<td align="right" valign="middle" style="padding-right:20px; font-weight:bold; color:#5D7848;font-family:Arial, Helvetica, sans-serif; text-decoration:underline; font-size:16px; text-decoration: overline;">Signature</td>
														  </tr>
														  <tr>
															<td align="center" valign="middle">&nbsp;</td>
														  </tr>
													</table>
	
	
												  </div>
												   <div class="col-md-4"></div>
											  <?php }else{ foreach($studentIdDetails as $v){ ?>
											   
											       <div class="col-md-4" style="padding-bottom:20px">
														<table width="100%" border="0" class="idStyle">
														  <tr>
															<td width="16%" rowspan="10" align="center" valign="middle" style="background-color:#449BBC; color:#FFFFFF; font-weight:bold; font-size:20px">S <br> 
															T<br> U <br> D<br> E<br> N<br> T</td>
															<td width="84%" align="center" valign="middle" style="padding-top:5px"><img src="<?php echo base_url('resource/interface/img/sailors_logo.png'); ?>" class="img-responsive center-block" style="height:80px" /></td>
														  </tr>
														  <tr>
															<td height="67" align="center" valign="middle"><span style="color:#544562; font-size:20px;font-weight:bold; padding:0 15px 0 15px">Islami Academy School & College Trishal </span></td>
														  </tr>
														  <tr>
															<td align="center" valign="middle">
															   <?php
																	 if(!empty($v->stu_photo)){ ?>
																	<img src="<?php echo base_url("resource/stu_photo/$v->stu_photo"); ?>" width="70" height="80"> 
																<?php }else{  if($v->stu_sex == 'M'){ ?>
																		 <img src="<?php echo base_url('resource/img/male.png'); ?>" width="70" height="80"> 
																<?php }else{ ?>
																	   <img src="<?php echo base_url('resource/img/EmptyProfile.png'); ?>" width="70" height="80"> 
																<?php } } ?>
																
															 </td>
														  </tr>
														  <tr>
															<td height="34" align="center" valign="middle"><span style="color:#544562; font-size:14px;font-weight:bold; padding:0 15px 0 15px"><?php echo $v->stu_full_name ?></span></td>
														  </tr>
														  
														  <tr>
															<td align="center" valign="middle"><table width="100%" border="0">
															 <tr>
																<td width="16%" align="left" valign="middle">&nbsp;</td>
																<td width="33%" align="left" valign="middle"><strong style="color:#544562;">Class</strong></td>
																<td width="51%" align="left" valign="middle"><strong>: <?php echo $v->class_name ?> </strong></td>
															  </tr>
															  <tr>
																<td align="left" valign="middle">&nbsp;</td>
																<td align="left" valign="middle"><strong style="color:#544562;">Class Roll</strong></td>
																<td align="left" valign="middle"><strong>: <?php echo $v->class_roll ?> </strong></td>
															  </tr>
															  <tr>
																<td align="left" valign="middle">&nbsp;</td>
																<td align="left" valign="middle"><strong style="color:#544562;">Duration</strong></td>
																<td align="left" valign="middle"><strong>: <?php echo $currentYear ?> - <?php echo $currentYear+1; ?> </strong></td>
															  </tr>
															</table></td>
														  </tr>
														  <tr>
															<td align="right" valign="middle" style="padding:5px 20px 0 0;"><img src="<?php echo base_url('resource/img/signature.png'); ?>"></td>
														  </tr>
														  <tr>
															<td align="right" valign="middle" style="padding-right:20px; font-weight:bold; color:#5D7848;font-family:Arial, Helvetica, sans-serif; text-decoration:underline; font-size:16px; text-decoration: overline;">Signature</td>
														  </tr>
														  <tr>
															<td align="center" valign="middle">&nbsp;</td>
														  </tr>
													</table>
	
	                                                
												  </div>
											  
											  <?php  } } ?>
											 </div>
											  </td>
                                          </tr>
                                          <tr>
                                            <td width="15%" align="center" valign="middle">&nbsp;</td>
                                            <td width="5%" align="center" valign="middle">&nbsp;</td>
                                          </tr>
                                        </table>
										</td>
									</tr>
									
									<tr> 
								      <td align="center" valign="middle" class="text-right"><a href="#" class="pull-right printId">Print</a></td>
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
		    $('.printId').click(function(){
			   window.print();
			});
		    
		 </script>
		 
		 
		 
		 



