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
	<body class="">
			<div class="container">
					<div class="aFourSize">
					    <?php if(!empty($certificateInfo)){ if($certificate =='testimonial'){ ?>
						   <div class="col-md-12 text-center testimonial">
						      <table width="100%" border="0" style="color:#000000">
							     <tr>
									<td height="200" align="center" valign="middle"></td>
							    </tr>
								  <tr>
									<td align="center" valign="middle" style="padding-left:21%;"><?php echo $certificateInfo->stu_id ?></td>
								  </tr>
								   <tr>
									<td height="61" align="center" valign="middle"></td>
								  </tr>
								  <tr>
									<td align="center" valign="middle" style="padding-left:12%;"><?php echo $certificateInfo->stu_full_name ?></td>
								  </tr>
								  <tr>
									<td align="center" valign="bottom" height="26" style="padding-left:2%;"><?php echo $certificateInfo->f_name ?></td>
								  </tr>
								  
								  <tr>
									<td align="center" valign="bottom" height="30" style="padding-right:10%;"><?php echo $certificateInfo->m_name ?></td>
								  </tr>
								  <tr>
									<td align="center" valign="bottom" height="36" style="padding-left:11%;"><?php echo $certificateInfo->class_name ?></td>
								  </tr>
								  <tr>
									<td align="center" valign="bottom" height="35" style="padding-right:3%;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; <?php echo $certificateInfo->stu_birth_date ?></td>
								  </tr>
								  <tr>
									<td align="center" valign="bottom" height="40" style="padding-right:12%;"><?php echo $certificateInfo->stu_full_name ?></td>
								  </tr>
								  
								  <tr>
									<td height="110" align="center" valign="middle"></td>
								  </tr>
								  <tr>
									<td align="center" valign="middle">
									   <table width="100%" border="0">
										  <tr>
											<td width="47%" align="right" valign="middle" style="padding: 4% 7% 0 0"><?php echo date('Y-m-d'); ?></td>
											<td width="53%" align="left" valign="middle" style="padding: 1% 0 0 11%"> <img src="<?php echo base_url('resource/img/signature.png'); ?>"></td>
										  </tr>
										</table>

									</td>
								  </tr>
							 </table>

						   </div>
						<?php }else if($certificate =='promotinal'){ ?>
						   <div class="col-md-12 text-center promotinal">
						      <table width="100%" border="0" style="color:#000000">
							     <tr>
									<td height="170" align="center" valign="middle"></td>
							    </tr>
								  <tr>
									<td align="center" valign="middle" style="padding-left:28%;"><?php echo $certificateInfo->stu_id ?></td>
								  </tr>
								   <tr>
									<td height="110" align="center" valign="middle"></td>
								  </tr>
								  <tr>
									<td align="center" valign="middle" style="padding-left:5%;"><?php echo $certificateInfo->stu_full_name ?></td>
								  </tr>
								  <tr>
									<td align="center" valign="bottom" height="35"><?php echo $certificateInfo->f_name ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $certificateInfo->m_name ?></td>
								  </tr>
								  
								  <tr>
									<td align="center" valign="bottom" height="37" style="padding-left:4%;"><?php echo $certificateInfo->class_name ?></td>
								  </tr>
								  <tr>
									<td align="center" valign="bottom" height="30" style="padding-left:4%;"> </td>
								  </tr>
								  <tr>
									<td align="center" valign="bottom" height="35"><?php echo $certificateInfo->stu_birth_date ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; </td>
								  </tr>
								  
								  
								  <tr>
									<td height="150" align="center" valign="middle"></td>
								  </tr>
								  <tr>
									<td align="center" valign="middle">
									   <table width="100%" border="0">
										  <tr>
											<td width="47%" align="right" valign="middle" style="padding: 4% 7% 0 0"><?php echo date('Y-m-d'); ?></td>
											<td width="53%" align="left" valign="middle" style="padding: 1% 0 3% 11%"> <img src="<?php echo base_url('resource/img/signature.png'); ?>"></td>
										  </tr>
										</table>

									</td>
								  </tr>
							 </table>

						   </div>
						<?php }else{ ?>
						   <div class="col-md-12 text-center transfer">
								<table width="100%" border="0" style="color:#000000">
																 <tr>
																	<td height="170" align="center" valign="middle"></td>
																</tr>
																  <tr>
																	<td align="center" valign="middle" style="padding-left:28%;"><?php echo $certificateInfo->stu_id ?></td>
																  </tr>
																   <tr>
																	<td height="110" align="center" valign="middle"></td>
																  </tr>
																  <tr>
																	<td align="center" valign="middle" style="padding-left:5%;"><?php echo $certificateInfo->stu_full_name ?></td>
																  </tr>
																  <tr>
																	<td align="center" valign="bottom" height="35"><?php echo $certificateInfo->f_name ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $certificateInfo->m_name ?></td>
																  </tr>
																  
																  <tr>
																	<td align="center" valign="bottom" height="37" style="padding-left:4%;"><?php echo $certificateInfo->class_name ?></td>
																  </tr>
																  <tr>
																	<td align="center" valign="bottom" height="30" style="padding-left:4%;"> </td>
																  </tr>
																  
																
																  <tr>
																	<td align="center" valign="bottom" height="35"><?php echo $certificateInfo->stu_birth_date ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; <?php echo $certificateInfo->stu_full_name ?></td>
																  </tr>
																  
																  <tr>
																	<td align="center" valign="bottom" height="36" style="padding-left:32%;">Bogra</td>
																  </tr>
																  <tr>
																	<td align="center" valign="bottom" height="32" style="padding-right:25%;">Comillla</td>
																  </tr>
																  <tr>
																	<td height="140" align="center" valign="middle"></td>
																  </tr>
																  <tr>
																	<td align="center" valign="middle">
																	   <table width="100%" border="0">
																		  <tr>
																			<td width="47%" align="right" valign="middle" style="padding: 0 5% 0 0"><?php echo date('Y-m-d'); ?></td>
																			<td width="53%" align="left" valign="middle" style="padding: 1% 0 3% 11%"> <img src="<?php echo base_url('resource/img/signature.png'); ?>"></td>
																		  </tr>
																		</table>
								
																	</td>
																  </tr>
															 </table>
						   </div>
						<?php } } else {?>
						
						  <div class="col-md-12 text-center" style="font-size:16px; color:#FF0000">Invalide Id!</div>
						  <?php } ?>
						   
						 
						   <div class="col-md-12 text-center" style="font-size:16px"><a style="cursor:pointer" class="printCertificate">Print</a></div>
			      </div>
				  
			</div>
	</body>		
            
	</html>
         <?php //$this->load->view('common/footer'); ?>
         <?php $this->load->view('common/jsLinkPage'); ?>
		 
		 <script>
		    $('.printCertificate').click(function(){
			   window.print();
			});
		    
		 </script>
		 
		 
		 
		 



