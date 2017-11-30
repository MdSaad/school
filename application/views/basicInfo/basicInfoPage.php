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
			
            <?php $this->load->view('common/header'); ?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						
					   <ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?php echo site_url('adminHome'); ?>">Home</a>
							</li>
							<li class="active">System Settings</li>
						</ul><!-- /.breadcrumb -->
								
					</div>

					<div class="page-content">
					
						<!-- /.ace-settings-container -->

						<div class="row">
							<div class="col-xs-12 text-center">
								<!-- PAGE CONTENT BEGINS -->
								

								<!-- /.row -->

						
								  
								  <div id="widget-container-col-11" class="col-sm-10 widget-container-col ui-sortable" style="min-height: 172px;">
									<div id="widget-box-11" class="widget-box widget-color-dark ui-sortable-handle" style="opacity: 1;">
										<div class="widget-header">
											<h4 class="widget-title">System Basic Informatin Manage</h4>
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
											<div class="scroll-track scroll-active" style="display: block;">
												<div class="scroll-bar" style="height: 8px; top: 0px;"></div>
											</div>
												<div class="scroll-content">
												<form class="form-horizontal  " role="form" action="<?php echo site_url('systemBasicInfo/update'); ?>" enctype="multipart/form-data" method="post">
													<div class="content col-md-12 col-xs-12 col-sm-12 col-lg-12 img-thumbnail">
																<input type="hidden" class="form-control" name="update_id" id="update_id"  value="<?php echo $basisInfo->id; ?>"/>
																	<div class="form-group">
																	  <label class="control-label col-sm-4" for="email">School/Institute Name:</label>
																	  <div class="col-sm-6">
																		<input type="text" class="form-control" name="inst_name" id="inst_name" placeholder="Enter School/Institute Name" value="<?php echo $basisInfo->inst_name; ?>"/>
																	  </div>
																	</div>
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-4" for="email">School/Institute Adress:</label>
																	  <div class="col-sm-6">
																		<input type="text" class="form-control" name="inst_adrs" id="inst_adrs" placeholder="Enter School/Institute Adress" value="<?php echo $basisInfo->inst_adrs; ?>">
																	  </div>
																	</div>
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-4" for="email">School/Institute Mobile Number:</label>
																	  <div class="col-sm-6">
																		<input type="text" class="form-control" name="inst_phone_no" id="inst_phone_no" placeholder="Enter School/Institute Mobile Number" value="<?php echo $basisInfo->inst_phone_no; ?>">
																	  </div>
																	</div>
																	
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-4" for="email">School/Institute Website:</label>
																	  <div class="col-sm-6">
																		<input type="text" class="form-control" name="inst_web_site" id="inst_web_site" placeholder="Enter School/Institute Website" value="<?php echo $basisInfo->inst_web_site; ?>">
																	  </div>
																	</div>
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-4" for="email">School/Institute Established Date:</label>
																	  <div class="col-sm-6">
																		<input id="inst_establishe_date" class="form-control date-picker" type="text"  placeholder="Enter School/Institute Established Date" data-date-format="yyyy-mm-dd" name="inst_establishe_date" value="<?php echo $basisInfo->inst_establishe_date; ?>">
																	  </div>
																	</div>
																	
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-4" for="email">Software Start Date:</label>
																	  <div class="col-sm-6">
																		<input id="soft_start_date" class="form-control date-picker" type="text"  placeholder="Enter School/Institute Start Date" data-date-format="yyyy-mm-dd" name="soft_start_date" value="<?php echo $basisInfo->soft_start_date; ?>">
																	  </div>
																	</div>
																	
																	
																	<div class="form-group">
																	  <label class="control-label col-sm-4" for="email">School/Institue Logo:</label>
																	  
																	   <div class="col-sm-6">
																			<div class="attachmentbody" data-type="inst_logo" data-target="#inst_logo">
																				<img class="upload " src="<?php echo base_url('resource/img/no_image.png'); ?>">
																			</div>
																			<input id="inst_logo" type="hidden" value="" name="inst_logo">
																			<img class="upload " src="<?php echo base_url('resource/basicImg/'.$basisInfo->inst_logo); ?>" style="max-height:80px; float:left; padding-top:7px"/>
																		</div>
																		
																		
																		
																	  </div>
																	  
																	  <div class="modal-footer">
																		<button class="btn btn-sm btn-primary" type="submit">
																			<i class="ace-icon fa fa-check"></i>
																			Update
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
								

								<!-- /.row -->

								

								<!-- /.row -->

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
        
        <!-- inline scripts related to this page -->
        
        <?php if($alertMsg != "") { ?>
		<div class="alert alert-block alert-success" id="alertMsg">
			<button class="close" data-dismiss="alert" type="button">
			<i class="ace-icon fa fa-times"></i>
			</button>
			<strong class="green">
			<i class="ace-icon fa fa-check-square-o"></i>
			
			</strong>
			<?php echo $alertMsg; ?>.
		</div>
		<?php } ?>
		
         <?php $this->load->view('common/footer'); ?>
         <?php $this->load->view('common/jsLinkPage'); ?>
		 
		<!-- <script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
		</script> -->
		
<script type="text/javascript" >
$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true
})
</script>