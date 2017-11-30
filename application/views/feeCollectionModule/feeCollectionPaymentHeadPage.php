
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<title><?php echo $title; ?></title>
		<?php //$this->load->view(''); ?>
	</head>
	
	<body>
	<div class="col-md-11 col-lg-11 headerBox" >
	  <?php $this->load->view('common/header'); ?>
		
				<div class="row">
					<div class="col-md-2 col-sm-2 col-lg-2 leftBox">
							<a href="<?php echo site_url('adminHome'); ?>" > Home </a>
						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 headerBox2">
						<a href="<?php echo site_url('adminHome'); ?>" > Home </a>
						<i class="glyphicon glyphicon-forward"></i>
							<a href="<?php echo site_url('feeCollectionModule'); ?>">Fee Collection</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('feeCollectionModule/feeSetup'); ?>">Collection Setup</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('feeCollectionModule/paymentHead'); ?>">Payment Head Create</a>
					</div>
				</div>	
	</div>
				
				<div class="col-md-11 col-lg-11">
					<div class="row">
					<div class="col-md-2 col-sm-2 col-lg-2 ">
						
						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 interfaceBody headerBox3">
						<div class="row text-center">
								<!-- PAGE CONTENT BEGINS -->
								

								<!-- /.row -->
								  <div id="widget-container-col-11" class="col-md-12 col-xs-12 col-sm-12 col-lg-12 widget-container-col ui-sortable addFormContent" style="min-height: 172px; display:block">
									<div id="widget-box-11" class="widget-box widget-color-dark ui-sortable-handle" style="opacity: 1;">
										<div class="widget-header">
											<h4 class="widget-title">Payment Head Create</h4>
												<div class="widget-toolbar">
												<!-- <a data-action="settings" href="#">
													<i class="ace-icon fa fa-cog"></i>
												</a> -->
												
												<a data-action="reload" href="#">
													<i class="ace-icon fa fa-refresh"></i>
												</a>
												
												<a data-action="collapse" href="#">
													<i class="ace-icon fa fa-chevron-up"></i>
												</a>
												
												<a data-action="close" href="#">
													<i class="ace-icon fa fa-times"></i>
												</a>
												
												<!-- <a class="orange2" data-action="fullscreen" href="#">
													<i class="ace-icon fa fa-expand"></i>
												</a> -->
												</div>
										</div>
										
										<div class="widget-body ">
											<div class="widget-main padding-4"  style="position: relative;">
											<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('stuGeneralReport/stuGeneralReportDetails'); ?>" enctype="multipart/form-data" method="post">	
												<div class="scroll-content">
																		 <div class="content img-thumbnail container">
																		<div class="col-md-12">
																		 <div class="row textleft">
																					<h4 class="text-left"> Payment Managment Selection </h4>
																				</div>
																				 <div class="col-md-12 img-thumbnail boxShadow_1">
																							
																						 <div class="col-md-6">
																							<div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Campus/Branch :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="branch_id" id="branch_id">
																												  <option value="">Select Campus</option>
																												  <?php foreach($branchListInfo as $k=>$v) { ?>
																													<option value="<?php echo $v->id; ?>" ><?php echo $v->branch_name; ?></option>																										<?php } ?>
																										</select>																	   		
																								 </div>
																							 </div>
																							 
																							 <div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Class :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="class_id" id="class_id">
																												  <option value="">Select Class </option>
																												  <?php foreach($classListInfo as $k=>$v) { ?>
																													<option value="<?php echo $v->id; ?>" ><?php echo $v->class_name; ?></option>																										<?php } ?>
																										</select>																	   		
																								 </div>
																							 </div>
																							
																							
																						  </div>
																						 
																						 <div class="col-md-6">
																							 <div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Group :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="group_id" id="group_id">
																												  <option value="">Select Group </option>
																												  <?php foreach($groupListInfo as $k=>$v) { ?>
																													<option value="<?php echo $v->id; ?>" ><?php echo $v->group_name; ?></option>																										<?php } ?>
																										</select>																	   		
																								 </div>
																							 </div>
																							 <div class="form-group">
																								  <label class="control-label col-sm-5 " for="email">Year :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="year" id="year">
																												  <option value="">Select Year </option>
																												  <?php for ($year = date('Y'); $year > date('Y')-100; $year--) { ?>
																													<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
																													<?php } ?>
																										</select>		
																									</div>
																							</div>
																							
																						 </div>
																					</div>	
																			
																			
																			
																		<div class="col-md-12 img-thumbnail boxShadow_1 text-left">
																		 			
																				 <div class="col-md-4">
																				 	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-condensed">
																							  <tr>
																								<td width="2%"><label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>															</label></td>
																								<td width="67%"><strong>Admission Fees </strong></td>
																								<td width="31%"><input type="text" name="textfield" class="form-control"></td>
																							  </tr>
																							  <tr>
                                                                                                <td><label class="pos-rel">
                                                                                                  <input type="checkbox" class="ace" />
                                                                                                  <span class="lbl"></span> </label></td>
																							    <td><strong>Tution Fees Total</strong></td>
																							    <td><input type="text" name="textfield" class="form-control"></td>
																				      </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td colspan="2">
																								<div class="row">
																									<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-condensed table-bordered">
                                                                                                  <tr>
                                                                                                    <td width="8%"><label class="pos-rel">
                                                                                                  <input type="checkbox" class="ace" id="fsfs" name="fsf" />
                                                                                                  <span class="lbl"></span> </label></td>
                                                                                                    <td width="64%">                                                                                                    Tution Fee January </td>
                                                                                                    <td width="28%"><input type="text" name="textfield2" class="form-control" id="dsfs"></td>
                                                                                                  </tr>
                                                                                                  <tr>
                                                                                                    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsfs" name="fsf" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td> Tution Fee April </td>
                                                                                                    <td><input type="text" name="textfield2" class="form-control" id="dsfs"></td>
                                                                                                  </tr>
                                                                                                  <tr>
                                                                                                    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsfs" name="fsf" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td>Tution Fee July</td>
                                                                                                    <td><input type="text" name="textfield2" class="form-control" id="dsfs"></td>
                                                                                                  </tr>
                                                                                                  <tr>
                                                                                                    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsfs" name="fsf" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td> Tution Fee October</td>
                                                                                                    <td><input type="text" name="textfield2" class="form-control" id="dsfs"></td>
                                                                                                  </tr>
                                                                                                </table>
																								</div>
																								
																								</td>
																							  </tr>
																							  <tr>
                                                                                                <td><label class="pos-rel">
                                                                                                  <input type="checkbox" class="ace" />
                                                                                                  <span class="lbl"></span> </label></td>
																							    <td><strong>Transport Total</strong></td>
																							    <td><input type="text" name="textfield" class="form-control"></td>
																				      </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td colspan="2">
																									<div class="row">
																										<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-condensed table-bordered">
                                                                                                  <tr>
                                                                                                    <td width="8%"><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsf" name="fsf2" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td width="64%"> Tution Fee January </td>
                                                                                                    <td width="28%"><input type="text" name="textfield22" class="form-control" id="textfield2"></td>
                                                                                                  </tr>
                                                                                                  <tr>
                                                                                                    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsf" name="fsf2" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td> Tution Fee April </td>
                                                                                                    <td><input type="text" name="textfield22" class="form-control" id="textfield2"></td>
                                                                                                  </tr>
                                                                                                  <tr>
                                                                                                    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsf" name="fsf2" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td>Tution Fee July</td>
                                                                                                    <td><input type="text" name="textfield22" class="form-control" id="textfield2"></td>
                                                                                                  </tr>
                                                                                                  <tr>
                                                                                                    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsf" name="fsf2" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td> Tution Fee October</td>
                                                                                                    <td><input type="text" name="textfield22" class="form-control" id="textfield2"></td>
                                                                                                  </tr>
                                                                                                </table>
																									</div>
																								</td>
																							  </tr>
																							  <tr>
                                                                                                <td><label class="pos-rel">
                                                                                                  <input type="checkbox" class="ace" />
                                                                                                  <span class="lbl"></span> </label></td>
																							    <td><strong>Exam Fees </strong></td>
																							    <td><input type="text" name="textfield" class="form-control"></td>
																				      </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-condensed table-bordered">
                                                                                                  <tr>
                                                                                                    <td width="8%"><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsf2" name="fsf22" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td width="64%"> First Term Exam </td>
                                                                                                    <td width="28%"><input type="text" name="textfield222" class="form-control" id="textfield22"></td>
                                                                                                  </tr>
                                                                                                  
                                                                                                  
                                                                                                  
                                                                                                </table></td>
																							  </tr>
																							  <tr>
                                                                                                <td><label class="pos-rel">
                                                                                                  <input type="checkbox" class="ace" />
                                                                                                  <span class="lbl"></span> </label></td>
																							    <td><strong>Certificate Fees</strong></td>
																							    <td><input type="text" name="textfield" class="form-control"></td>
																				      </tr>
																							  <tr>
                                                                                                <td><label class="pos-rel">
                                                                                                  <input type="checkbox" class="ace" />
                                                                                                  <span class="lbl"></span> </label></td>
																							    <td>Board Administrative </td>
																							    <td><input type="text" name="textfield" class="form-control"></td>
																				      </tr>
																							  <tr>
                                                                                                <td><label class="pos-rel">
                                                                                                  <input type="checkbox" class="ace" />
                                                                                                  <span class="lbl"></span> </label></td>
																							    <td><strong>Others</strong></td>
																							    <td><input type="text" name="textfield" class="form-control"></td>
																				      </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																							  </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																							  </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																							  </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																							  </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																							  </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																							  </tr>
																							</table>

																		  </div>
																				 
																				 <div class="col-md-4">
																					 
																							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-condensed">
																							  <tr>
																								<td width="2%"><label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>															</label></td>
																								<td width="67%"><strong>Re-admission Fees </strong></td>
																								<td width="31%"><input type="text" name="textfield" class="form-control"></td>
																							  </tr>
																							  <tr>
                                                                                                <td><label class="pos-rel"><span class="lbl"></span> </label></td>
																							    <td style="height: 45px">&nbsp;</td>
																							    <td>&nbsp;</td>
																							  </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-condensed table-bordered">
                                                                                                  <tr>
                                                                                                    <td width="8%"><label class="pos-rel">
                                                                                                  <input type="checkbox" class="ace" id="fsfs" name="fsf" />
                                                                                                  <span class="lbl"></span> </label></td>
                                                                                                    <td width="64%"> Tution Fee February </td>
                                                                                                    <td width="28%"><input type="text" name="textfield2" class="form-control" id="dsfs"></td>
                                                                                                  </tr>
                                                                                                  <tr>
                                                                                                    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsfs" name="fsf" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td>Tution Fee May</td>
                                                                                                    <td><input type="text" name="textfield2" class="form-control" id="dsfs"></td>
                                                                                                  </tr>
                                                                                                  <tr>
                                                                                                    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsfs" name="fsf" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td>Tution Fee August</td>
                                                                                                    <td><input type="text" name="textfield2" class="form-control" id="dsfs"></td>
                                                                                                  </tr>
                                                                                                  <tr>
                                                                                                    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsfs" name="fsf" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td> Tution Fee November</td>
                                                                                                    <td><input type="text" name="textfield2" class="form-control" id="dsfs"></td>
                                                                                                  </tr>
                                                                                                </table></td>
																							  </tr>
																							  <tr>
                                                                                                <td><label class="pos-rel"><span class="lbl"></span> </label></td>
																							    <td style="height: 45px">&nbsp;</td>
																							    <td>&nbsp;</td>
																							  </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-condensed table-bordered">
                                                                                                  <tr>
                                                                                                    <td width="8%"><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsf" name="fsf2" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td width="64%"> Tution Fee February </td>
                                                                                                    <td width="28%"><input type="text" name="textfield22" class="form-control" id="textfield2"></td>
                                                                                                  </tr>
                                                                                                  <tr>
                                                                                                    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsf" name="fsf2" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td>Tution Fee May</td>
                                                                                                    <td><input type="text" name="textfield22" class="form-control" id="textfield2"></td>
                                                                                                  </tr>
                                                                                                  <tr>
                                                                                                    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsf" name="fsf2" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td>Tution Fee August</td>
                                                                                                    <td><input type="text" name="textfield22" class="form-control" id="textfield2"></td>
                                                                                                  </tr>
                                                                                                  <tr>
                                                                                                    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsf" name="fsf2" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td> Tution Fee November</td>
                                                                                                    <td><input type="text" name="textfield22" class="form-control" id="textfield2"></td>
                                                                                                  </tr>
                                                                                                </table></td>
																							  </tr>
																							  <tr>
                                                                                                <td><label class="pos-rel"><span class="lbl"></span> </label></td>
																							    <td style="height: 45px">&nbsp;</td>
																							    <td>&nbsp;</td>
																							  </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-condensed table-bordered">
                                                                                                  <tr>
                                                                                                    <td width="8%"><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsf2" name="fsf22" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td width="64%"> Second  Exam</td>
                                                                                                    <td width="28%"><input type="text" name="textfield222" class="form-control" id="textfield22"></td>
                                                                                                  </tr>
                                                                                                  
                                                                                                  
                                                                                                  
                                                                                                </table></td>
																							  </tr>
																							  <tr>
                                                                                                <td><label class="pos-rel">
                                                                                                  <input type="checkbox" class="ace" />
                                                                                                  <span class="lbl"></span> </label></td>
																							    <td>Testimonial Fees</td>
																							    <td><input type="text" name="textfield" class="form-control"></td>
																				      </tr>
																							  <tr>
                                                                                                <td><label class="pos-rel">
                                                                                                  <input type="checkbox" class="ace" />
                                                                                                  <span class="lbl"></span> </label></td>
																							    <td>Scout, Rover etc.</td>
																							    <td><input type="text" name="textfield" class="form-control"></td>
																				      </tr>
																							  <tr>
                                                                                                <td><label class="pos-rel">
                                                                                                  <input type="checkbox" class="ace" />
                                                                                                  <span class="lbl"></span> </label></td>
																							    <td><strong>Others</strong></td>
																							    <td><input type="text" name="textfield" class="form-control"></td>
																				      </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																							  </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																							  </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																							  </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																							  </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																							  </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																							  </tr>
																							</table>
																					
																				 </div>
																				 
																				 
																				  <div class="col-md-4">
																					 
																							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-condensed">
																							  <tr>
																								<td width="2%"><label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>															</label></td>
																								<td width="67%"><strong>Session Fee</strong></td>
																								<td width="31%"><input type="text" name="textfield" class="form-control"></td>
																							  </tr>
																							  <tr>
                                                                                                <td><label class="pos-rel"><span class="lbl"></span> </label></td>
																							    <td style="height: 45px">&nbsp;</td>
																							    <td>&nbsp;</td>
																							  </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-condensed table-bordered">
                                                                                                  <tr>
                                                                                                    <td width="8%"><label class="pos-rel">
                                                                                                  <input type="checkbox" class="ace" id="fsfs" name="fsf" />
                                                                                                  <span class="lbl"></span> </label></td>
                                                                                                    <td width="64%"> Tution Fee March </td>
                                                                                                    <td width="28%"><input type="text" name="textfield2" class="form-control" id="dsfs"></td>
                                                                                                  </tr>
                                                                                                  <tr>
                                                                                                    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsfs" name="fsf" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td> Tution Fee June</td>
                                                                                                    <td><input type="text" name="textfield2" class="form-control" id="dsfs"></td>
                                                                                                  </tr>
                                                                                                  <tr>
                                                                                                    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsfs" name="fsf" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td> Tution Fee September</td>
                                                                                                    <td><input type="text" name="textfield2" class="form-control" id="dsfs"></td>
                                                                                                  </tr>
                                                                                                  <tr>
                                                                                                    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsfs" name="fsf" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td> Tution Fee December</td>
                                                                                                    <td><input type="text" name="textfield2" class="form-control" id="dsfs"></td>
                                                                                                  </tr>
                                                                                                </table></td>
																							  </tr>
																							  <tr>
                                                                                                <td><label class="pos-rel"><span class="lbl"></span> </label></td>
																							    <td style="height: 45px">&nbsp;</td>
																							    <td>&nbsp;</td>
																							  </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-condensed table-bordered">
                                                                                                  <tr>
                                                                                                    <td width="8%"><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsf" name="fsf2" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td width="64%"> Tution Fee March </td>
                                                                                                    <td width="28%"><input type="text" name="textfield22" class="form-control" id="textfield2"></td>
                                                                                                  </tr>
                                                                                                  <tr>
                                                                                                    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsf" name="fsf2" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td> Tution Fee June</td>
                                                                                                    <td><input type="text" name="textfield22" class="form-control" id="textfield2"></td>
                                                                                                  </tr>
                                                                                                  <tr>
                                                                                                    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsf" name="fsf2" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td> Tution Fee September</td>
                                                                                                    <td><input type="text" name="textfield22" class="form-control" id="textfield2"></td>
                                                                                                  </tr>
                                                                                                  <tr>
                                                                                                    <td><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsf" name="fsf2" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td> Tution Fee December</td>
                                                                                                    <td><input type="text" name="textfield22" class="form-control" id="textfield2"></td>
                                                                                                  </tr>
                                                                                                </table></td>
																							  </tr>
																							  <tr>
                                                                                                <td><label class="pos-rel"><span class="lbl"></span> </label></td>
																							    <td style="height: 45px">&nbsp;</td>
																							    <td>&nbsp;</td>
																							  </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-condensed table-bordered">
                                                                                                  <tr>
                                                                                                    <td width="8%"><label class="pos-rel">
                                                                                                      <input type="checkbox" class="ace" id="fsf2" name="fsf22" />
                                                                                                      <span class="lbl"></span> </label></td>
                                                                                                    <td width="64%"> Annual  Exam</td>
                                                                                                    <td width="28%"><input type="text" name="textfield222" class="form-control" id="textfield22"></td>
                                                                                                  </tr>
                                                                                                  
                                                                                                  
                                                                                                  
                                                                                                </table></td>
																							  </tr>
																							  <tr>
                                                                                                <td><label class="pos-rel">
                                                                                                  <input type="checkbox" class="ace" />
                                                                                                  <span class="lbl"></span> </label></td>
																							    <td>Transfer Certificate </td>
																							    <td><input type="text" name="textfield" class="form-control"></td>
																				      </tr>
																							  <tr>
                                                                                                <td><label class="pos-rel">
                                                                                                  <input type="checkbox" class="ace" />
                                                                                                  <span class="lbl"></span> </label></td>
																							    <td>Fine</td>
																							    <td><input type="text" name="textfield" class="form-control"></td>
																				      </tr>
																							  <tr>
                                                                                                <td><label class="pos-rel"><span class="lbl"></span> </label></td>
																							    <td>&nbsp;</td>
																							    <td>&nbsp;</td>
																				      </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																							  </tr>
																							  <tr class="borderTopTD">
                                                                                                <td ><label class="pos-rel">
                                                                                                  <input type="checkbox" class="ace" />
                                                                                                  <span class="lbl"></span> </label></td>
																							    <td><strong>Total</strong></td>
																							    <td><input type="text" name="textfield" class="form-control"></td>
																						      </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																							  </tr>
																							  <tr>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																								<td>&nbsp;</td>
																							  </tr>
																							</table>
																					
																				 </div>
																			</div>	
																				
																		</div>
																	</div>
																	
																	  <div class="modal-footer">
																	  	
																		<button class="btn btn-sm btn-danger formCancel" type="button">
																			<i class="ace-icon fa fa-times"></i>
																			Cancel
																		</button>
																		<button class="btn btn-sm btn-primary" type="submit">
																			<i class="ace-icon fa fa-check"></i>
																			Submit
																		</button>
																	</div>
																	</div>
												</form>
												
												  
												</div>
											</div>
										</div>
									</div>
							 </div>	
					</div>
				</div>
				</div>
				
	  <?php $this->load->view('common/footer'); ?>
				
	</body>
</html>


<script>
	$('.goModule').on('click', function() {
		var goModuleName	= $(this).attr('data-url');
		window.open(goModuleName, '_blank');
	});
	
	
</script>