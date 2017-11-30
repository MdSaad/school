
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
							<a href="<?php echo site_url('resultSubModule'); ?>">Result</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('resultSubModule/examSystem'); ?>">Exam System</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('resultSubModule/allExamTypeManage'); ?>">Exam Type Manage</a>
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
											<h4 class="widget-title">Exam Type Manage</h4>
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
											<?php /*?><form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('resultSubModule/allExamTypeInfoStore'); ?>" enctype="multipart/form-data" method="post">	
												<input type="hidden" name="id" id="id">
													<input type="hidden" name="editMode" id="editMode">
												                   <div class="scroll-content">
																		 <div class="content img-thumbnail container">
																		<div class="col-md-12">
																		 
																				 <div class="col-md-12  initialPart">
																							
																						 <div class="col-md-6">
																							<div class="form-group">
																								   <label class="control-label col-sm-5 " for="year">Select Year :</label>
																								  <div class="col-sm-7 paddingZero">
																										<select class="form-control" name="year" id="year" required>
																												  <option value="">Select Year </option>
																												  <?php for ($year = date('Y'); $year > date('Y')-5; $year--) { ?>
																													<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
																													<?php } ?>
																										</select>		
																									</div>
																							 </div>
																						  </div>
																						 
																						 <div class="col-md-6">
																						 
																						 
																						 	<div class="form-group">
																								  <label class="control-label col-sm-5 " for="exam_type_name">Exam Type Name :</label>
																								  <div class="col-sm-7 paddingZero">
																										<input name="exam_type_name" id="exam_type_name" type="text" class="form-control" placeholder="Exam Type Name*" required= "required">																	   		
																								 </div>
																							</div>
																							
																						 </div>
																						
																					</div>	
																				
																			</div>
																		</div>
																	
																	  <div class="modal-footer">
																	  
																	     <?php if(!empty($alertData)){ ?>
																		   <div class="col-md-8">
																				<div class="alert alert-block alert-success text-left" style="height: 35px; padding:5px 5px 5px 5px;">
																				<button class="close" data-dismiss="alert" type="button">
																				<i class="ace-icon fa fa-times"></i>
																				</button>
																				<strong class="green">
																				<i class="ace-icon fa fa-check-square-o"></i>
																				
																				</strong>
																				<span class="alrtText text-center"> <?php echo $alertData ?></span>
																			   </div>
																			</div>
																		<?php } ?>
																	  	
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
												<?php */?>
												
	
												
												
															
														 
														  <div class="row listView">
															<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
																
																<div class="clearfix">
																	<div class="pull-right tableTools-container"></div>
																</div>
																 
																	
						
																<!-- div.table-responsive -->
						
																<div class="table-header text-left">
																	Exam Type List :
																</div>
																	
																<!-- div.dataTables_borderWrap -->
																<div>
																	<table id="dynamic-table" class="table table-striped table-bordered table-hover text-left stuListTable">
																		<thead>
																			<tr>
																			  <th class="center">SL</th>
																				<th>Exam Type Name</th>
																				<th>Year</th>
																				<th class="hide">Action</th>
																			</tr>
																		</thead>
						
																		<tbody>
																		
																		<?php
																			$i = 1;
																			
																			 foreach($allExamListInfo as $v) { 
																		
																		?>
																			<tr>
																			  <td class="center"><?php echo $i++; ?></td>
																				<td><?php echo $v->exam_type_name; ?></td>
																				<td class="hidden-480"><?php echo $v->year; ?></td>
																				<td class="hide"><a href="#" class="green" data-id="<?php echo $v->id; ?>">Edit</a></td>
																			</tr>
																		 <?php }  ?>	
																		</tbody>
																	</table>
																</div>
															</div>
															</div>			
												
												  
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
	$(document).on("click", ".green", function(e)
	{
		
		var id 		= $(this).attr("data-id");
		var formURL = "<?php echo site_url('resultSubModule/allExamTypeEditInfo'); ?>";
		$('.update').text('Update');
		$.ajax(
		{
			url : formURL,
			type: "POST",
			async: false,
			data : {id: id},
			dataType: "json",
			success:function(data){
				$('#id').val(data.id);
				$('#exam_type_name').val(data.exam_type_name);
				$('#year').val(data.year);
				
				$('#addForm .update').text("Update");
		
			}
		});
		
		e.preventDefault();
	});









</script>	
