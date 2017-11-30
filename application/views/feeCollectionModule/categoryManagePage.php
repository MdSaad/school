
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
							<a href="<?php echo site_url('FeeCollectionModule'); ?>">Fee Collection</a> <i class="glyphicon glyphicon-forward"></i> <a href="<?php echo site_url('feeCollectionModule/feeSetup'); ?>">Setup</a> <i class="glyphicon glyphicon-forward"></i> <a href="<?php echo site_url('feeCollectionModule/categoryManage'); ?>">Category Manage</a>
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
								  <div id="widget-container-col-11" class="col-md-12 col-xs-12 col-sm-12 col-lg-12 widget-container-col ui-sortable addFormContent" style="min-height: 172px; display:block">
									<div id="widget-box-11" class="widget-box widget-color-dark ui-sortable-handle" style="opacity: 1;">
										<div class="widget-header">
											<h3 class="widget-title"><strong>Head Category Manage</strong></h3>
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
												
												<a  href="#">
													<i class="ace-icon fa fa-times formCancel"></i>
												</a>
												
												<!-- <a class="orange2" data-action="fullscreen" href="#">
													<i class="ace-icon fa fa-expand"></i>
												</a> -->
												</div>
										</div>



										<div class="widget-body ">
											<div class="widget-main padding-4"  style="position: relative;">
												<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('feeCollectionModule/storeFeeHeadCat'); ?>" enctype="multipart/form-data" method="post">	        <input type="hidden" name="update_id" id="update_id" value="" />
												<div class="scroll-content">
																		 <div class="content img-thumbnail container">
																		<div class="col-md-12">
																				 <div class="col-md-12 img-thumbnail boxShadow_1 initialPart">
																							
																						 <div class="col-md-6">
																							 <div class="form-group">
																								  <label class="control-label col-sm-5 " for="cat_name">Category Name :</label>
																								  <div class="col-sm-7 paddingZero">
																										<input type="text" name="cat_name" id="cat_name" class="form-control" required="required"  />																	   		
																								 </div>
																							 </div>
																						  </div>
																						 
																						 <div class="col-md-6">
																							<div class="form-group">
																								  <label class="control-label col-sm-5 " for="status">Status :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="status" id="status" required="required">
																											<option value=""  >Select Status </option>
																											<option value="Active" selected="selected">Active</option>
																											<option value="Inactive">Inactive</option>
																										</select>		
																									</div>
																							</div>
																						 </div>
																					</div>	
																		</div>
																		
																		
																	</div>
																	
																	  <div class="modal-footer ">
																	  	
																		<button class="btn btn-sm btn-danger formCancel" type="button">
																			<i class="ace-icon fa fa-times"></i>
																			Cancel
																		</button>
																		<button class="btn btn-sm btn-primary" type="submit">
																			<i class="ace-icon fa fa-check"></i>
																			<span class="update">Save</span>
																		</button>
																	</div>
																	</div>
												</form>
												</div>
											</div>
										</div>
										


									</div>
									
								   <div class="col-md-12">
																<div class="widget-box transparent thumbnail">
															<div class="widget-header widget-header-flat">
																<h4 class="widget-title lighter pull-left">
																	Fee Collection Category List
																</h4>
																
																<div class="widget-toolbar">
																	<a href="#" data-action="collapse">
																		<i class="ace-icon fa fa-chevron-up"></i>
																	</a>
																</div>
															</div>
				
															<div class="widget-body" style="display: block;">
																<div class="widget-main no-padding">
																	<table class="table table-bordered table-striped">
																		<thead class="thin-border-bottom">
																			<tr>
																				<th class="text-center">
																					SL
																				</th>
																				<th class="text-center">
																					<i class="ace-icon fa fa-caret-right blue"></i>Category Name
																				</th>
																				<th class="text-center">
																					<i class="ace-icon fa fa-caret-right blue"></i>Status
																				</th>
																				<th class="text-center">
																					<i class="ace-icon fa fa-caret-right blue"></i>Action
																				</th>
																			</tr>
																		</thead>
				
																		<tbody>
																			<?php 
																			$SL	= 1;
																			$SL	= $onset+$SL;
																			foreach($categoryList as $v) { ?>
																			<tr>
																				<td><?php echo $SL++; ?></td>
																				<td><?php echo $v->cat_name; ?></td>
				
																				<td><?php echo $v->status; ?></td>
																				<td class="">
																					<div class=" btn-group">
																						<button class="btn btn-xs btn-primary green" data-id="<?php echo $v->id ?>"  data-rel="tooltip" title="Edit" data-placement="bottom">
																							<i class=" bigger-120">Edit</i>															</button>
																							
																						<button class="btn btn-xs btn-danger red" data-id="<?php echo $v->id ?>"  data-rel="tooltip" title="Delete" data-placement="bottom">
																							<i class=" bigger-120">Delete</i>															</button>
																					</div>
																					
																				</td>
																			</tr>
																			<?php } ?>
																			<tr>
																				<td colspan="10" class="well" style="padding:20px 0px 20px">
							
																				<label class="pos-rel"><span class="lbl"></span></label>
																				<ul class="pagination-sm list-inline pull-right no-margin">
																						  <li class="pagi"><?php echo $this->pagination->create_links(); ?></li>
																					</ul>
							
																				</td>
																			 </tr>
																		</tbody>
																	</table>
																</div><!-- /.widget-main -->
															</div><!-- /.widget-body -->
														</div><br>
<br>

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
$(document).on("click", ".green", function()
	{
		
		var id 		= $(this).attr("data-id");
		var formURL = "<?php echo site_url('crud/edit/fee_head_cat_list_manage/id'); ?>";
		$('.update').text('Update');
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : {id: id},
			dataType: "json",
			success:function(data){
				//$(window).scrollTop(0);
				$("html, body").animate({ scrollTop: 0 }, "slow");
				$('#update_id').val(data.id);
				$('#cat_name').val(data.cat_name);
				$('#status').val(data.status);
			}	
		});
		
	});
	
	$('.red').on('click', function() {
			var x = confirm('Are you sure to delete?');
			
			if(x){
				var id = $(this).attr('data-id');
				console.log(id);
				var url = SAWEB.getSiteAction('crud/delete/fee_head_cat_list_manage/id/'+id);
				location.replace(url);
			} else {
				return false;
			}
		});
	
$('.formCancel').on('click', function() {
	$('.addFormContent').fadeOut('slow');
	$('.add_new').fadeIn('slow');
});
</script>	