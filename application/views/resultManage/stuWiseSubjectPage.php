
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
							<a href="<?php echo site_url('resultSubModule'); ?>">Result</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('resultSubModule/examSystem'); ?>">Exam System</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('resultSubModule/stuWiseSubject'); ?>">Student Wise subject initialize</a>
					</div>
				</div>	
	</div>
				
				<div class="col-md-11 col-lg-11">
					<div class="row">
					<div class="col-md-2 col-sm-2 col-lg-2 ">
						
						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 interfaceBody ">
							<div class="row text-center">
								<!-- PAGE CONTENT BEGINS -->
								<!-- /.row -->
								  <div id="widget-container-col-12" class="col-md-11 col-xs-12 col-sm-12 col-lg-12 widget-container-col ui-sortable addFormContent" style="min-height: 172px;">
									<div id="widget-box-11" class="widget-box widget-color-dark ui-sortable-handle" style="opacity: 1;">
										<div class="widget-header">
											<h4 class="widget-title">Student Wise subject initialize</h4>
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
												
												<a class="formCancel" href="#">
													<i class="ace-icon fa fa-times"></i>
												</a>
												
												<!-- <a class="orange2" data-action="fullscreen" href="#">
													<i class="ace-icon fa fa-expand"></i>
												</a> -->
												</div>
										</div>
										
										
										<div class="widget-body ">
											<div class="widget-main padding-4"  style="position: relative;">
											<form id="addForm" class="form-horizontal" role="form" action="<?php echo site_url('resultSubModule/stuWiseSubInitialize'); ?>" enctype="multipart/form-data" method="post">
												<div class="scroll-content">
												        
															<div class="content img-thumbnail container">
															<?php if(!empty($alertData)){ ?>
															  <div class="alert alert-success alert-dismissible" role="alert">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Success!</strong> <?php echo $alertData ?>.
															</div>
															<?php } ?>
															
																  <input type="hidden" class="form-control" name="update_id" id="update_id"  value=""/>
																		<div class="col-md-12">
																		 <div class="col-md-4" style="padding-top: 20px">
																		     <div class="form-group">
																			  <label class="control-label col-sm-5 " for="branch_id">Campus* :</label>
																			  <div class="col-sm-7 paddingZero">
																					<select class="form-control" name="branch_id" id="branch_id" required>
																						  <option value="">Select Campus*</option>
																						  <?php foreach($branchListInfo as $k=>$v) { ?>
																							<option value="<?php echo $v->id; ?>" ><?php echo $v->branch_name; ?></option>	
																						  <?php } ?>
																					 </select>	
																					 <span style="color:#FF0000" class="balert"></span>				
																				</div>
																			  </div>
						                                                     
																		 </div>
					
					
																		 <div class="col-md-4 " style="padding-top: 20px">
																			
																			
																			<div class="form-group">
																			  <label class="control-label col-sm-5" for="class_id">Class* :</label>
																			  <div class="col-sm-7 paddingZero">
																					<select class="form-control" name="class_id" id="class_id" required>
																						  <option value="">Select Class* </option>
																						   <?php foreach($classListInfo as $k=>$v) { ?>
																						  <option value="<?php echo $v->id; ?>" data-class-name="<?php echo $v->class_name; ?>"><?php echo $v->class_name; ?></option>		
																						  <?php } ?>																								
																				</select>
																				<span style="color:#FF0000" class="calert"></span>			
																				</div>
																			</div>
																			
																			
																			
																		 </div>
																		 
																		 <div class="col-md-4 " style="padding-top: 20px">
																				
																				<div class="form-group">
																				  <label class="control-label col-sm-5" for="group_id">Group* :</label>
																				  <div class="col-sm-7 paddingZero">
																						<select class="form-control" name="group_id" id="group_id" required="required">
																							<option value="" selected="selected" >Select Group* </option>
																							   <?php foreach($groupListInfo as $v){ ?>
																								<option value="<?php echo $v->id; ?>" ><?php echo $v->group_name; ?></option>
																								<?php } ?>
																							</select>
																							<span style="color:#FF0000" class="galert"></span>	
																					</div>
																				</div>
																				
																				
																				<div class="form-group">
																					  <label class="control-label col-sm-5 " for="year">Year* :</label>
																					  <div class="col-sm-7 paddingZero">
																							<select class="form-control" name="year" id="year" required>
																							  <option value="">Select Year </option>
																							   <?php for ($year = date('Y'); $year > date('Y')-100; $year--) { ?>
																							   <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
																							   <?php } ?>
																							</select>	
																							<span style="color:#FF0000" class="yalert"></span>	
																						</div>
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
																			<span class="update">Submit</span>
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

	
		
