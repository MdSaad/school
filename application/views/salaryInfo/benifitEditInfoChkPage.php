
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
							<a href="<?php echo site_url('HR'); ?>">HR</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('salaryManageSystem/salaryAdvaceDeductionEdit'); ?>"> Salary/Advance/Deductions Edit </a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('salaryManageSystem/benifitEdit'); ?>">Benifit Edit</a>&nbsp;&nbsp;
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
											<h4 class="widget-title">Benifit Edit </h4>
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
											<form class="form-horizontal"  role="form" action="<?php echo site_url('salaryManageSystem/benifitEditInfoChk'); ?>" enctype="multipart/form-data" method="post">
												<div class="scroll-content">
											<div class="content img-thumbnail container">
													<div class="form-group" style="padding-top:10px;">
														<label class="control-label col-sm-2"><strong>Employee ID  :</strong></label>
												 	    <div class="col-sm-3">
															<input name="empID" id="empID" class="form-control" type="text" placeholder="Enter Employee ID" required="required" value="<?php echo $empID ?>"> 
															<?php 
															 if(!empty($empID)){
															 if(empty($empDetails->employee_id)){

															?>
														    <span style="color:#FF0000; padding-top:2px;">Sorry This Id is not exit</span>
														    <?php } } ?>
														  
														</div>

														<label class="control-label col-sm-2"><strong>Benifit Month  :</strong></label>			
														<div class="col-sm-3 text-left">
															<input name="benifitMonth" id="benifitMonth" class="form-control date-picker" type="text" placeholder="Enter Salary Month" required="required" value="<?php echo $benifitMonth ?>">
														</div>
														<div class="col-sm-2 text-left">
															<button class="btn btn-sm btn-primary " type="submit">
																Submit
																</button>
														</div>																			  
													</div>
																		
												</div>
												</form>
												<?php if(!empty($empDetails->employee_id)){ ?>

											   <!--form start-->
												<form class="form-horizontal" id="addForm" role="form" action="<?php echo site_url('salaryManageSystem/empBenifitAction'); ?>" enctype="multipart/form-data" method="post">	
											 <input type="hidden" name="empId" id="empId" value="<?php echo $empID ?>" />
											 <input type="hidden" name="monthYear" id="monthYear" value="<?php echo $monthYear ?>" />
											 <input type="hidden" name="edit_id" id="edit_id" value="<?php if(!empty($emppreBenifit)) echo $emppreBenifit->id; ?>" />
											  
											  <div class="content img-thumbnail container" style="padding-top:15px;">
																  
															<div class="form-group">
															  <label class="control-label col-sm-1" for="employee_full_name">Name :</label>
															  <div class="col-sm-3">
															       <select class="form-control" name="benifit_name" id="benifit_name" required>
																	<option value="" selected="selected" >Select Benifit Name </option>
																	   <option <?php if(!empty($emppreBenifit)){ if($emppreBenifit->benifit_name =='exDuty') echo "selected"; } ?> value="exDuty">Extra Duty Payment </option>
																	   <option <?php if(!empty($emppreBenifit)){ if($emppreBenifit->benifit_name =='header') echo "selected"; } ?> value="header">Headship/ Coordinatorship </option>
																	   <option <?php if(!empty($emppreBenifit)){ if($emppreBenifit->benifit_name =='arrear') echo "selected"; } ?>  value="arrear">Arrear </option>
																	   <option  <?php if(!empty($emppreBenifit)){ if($emppreBenifit->benifit_name =='other') echo "selected"; } ?> value="other">Other</option>
																 </select>		 
																	
															  </div>
															  
															  <label class="control-label col-sm-1" for="benifit_amount">Amount :</label>
															  <div class="col-sm-3 text-left">
																<input required="required" type="number" class="form-control" name="benifit_amount" id="benifit_amount" placeholder="Enter Amount*" value="<?php if(!empty($emppreBenifit)) echo $emppreBenifit->benifit_amount; ?>"/>
															  </div>
															  
															  <label class="control-label col-sm-1" for="description">Description:</label>
															  <div class="col-sm-3 text-left">
																<textarea name="description" id="description" class="form-control"  placeholder="Enter Description"><?php if(!empty($emppreBenifit)) echo $emppreBenifit->description; ?></textarea>
															  </div>
															 
															</div>
																	
													  <div class="modal-footer">
														<div class="col-md-8">
														<div class="alert alert-block alert-success text-left afterSubmitContent" style="height: 35px; padding:5px 5px 5px 5px;">
														<button class="close" data-dismiss="alert" type="button">
														<i class="ace-icon fa fa-times"></i>
														</button>
														<strong class="green">
														<i class="ace-icon fa fa-check-square-o"></i>
														
														</strong>
														<span class="alrtText text-center">Benifit Update Successfully</span>
													   </div></div>
													
														<button class="btn btn-sm btn-danger formCancel" type="button">
															<i class="ace-icon fa fa-times"></i>
															Cancel
														</button>
														<button class="btn btn-sm btn-primary" type="submit">
															<i class="ace-icon fa fa-check"></i>
															<span class="update"> Update </span>
														</button>
													</div>
											    <div id="salaryListView">
												   <table class="table table-striped table-bordered table-hover text-left empListTable" style="font-size:13px;">
														<thead>
															<tr>
															  <th width="6%">SL</th>
																<th width="12%">ID</th>
																<th width="12%">Benefit Name </th>
																<th width="10%">Amount</th>
																<th width="10%">Benifit Month</th>
																<th width="20%">Description</th>
											
																<th width="12%">Action</th>
															</tr>
														</thead>
											
														<tbody>
														
														<?php
															$i = 1;
															 foreach($empAllBenifitDetails as $v) { 
														
														?>
															<tr>
															  <td class="center"><?php echo $i++; ?></td>
															  <td align="left"><?php echo $v->emp_id; ?></td>
															  <td align="left">
															     <?php echo $v->benifit_name; ?></td>
															  <td><?php echo $v->benifit_amount; ?></td>
															  <td><?php echo $v->month_year; ?></td>
															  <td><?php echo $v->description; ?></td>
																<td >
																   <div class="hidden-sm hidden-xs btn-group">
															<button class="btn btn-xs btn-info green" data-id="<?php echo $v->id ?>"  data-rel="tooltip" title="Edit" data-placement="bottom">
																<i class="ace-icon fa fa-pencil bigger-120"></i>															</button>

															<button class="btn btn-xs btn-danger red" data-emp-id="<?php echo $v->emp_id ?>" data-id="<?php echo $v->id ?>" data-rel="tooltip" title="Delete" data-placement="bottom" >
																<i class="ace-icon fa fa-trash-o bigger-120"></i>															</button>
															
														</div>
																</td>
															</tr>
														 <?php } ?>	
														 
														</tbody>
													</table>
												</div>
												</div> 
											</form>
											
										<?php } ?>
											<!--form start-->
														  
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



<script type="text/javascript" >
 $('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd',
});


$("#addForm").submit(function(e)
	{
		var postData = $(this).serializeArray();
		var formURL  = $(this).attr("action");
		console.log(postData);
		$.ajax(
		{
			url : formURL,
			type: "POST",
			async: false,
			data : postData,
			success:function(data){
				$("#salaryListView").html(data);				
				$("#addForm").find("input[type=text],input[type=number],input[name=edit_id], textarea").val("");
				$('.afterSubmitContent').css('display', 'block'); 
			}
		});
		
		e.preventDefault();
	});
	
	 $(document).on("click", ".green", function(e)
	{
		var id 		= $(this).attr("data-id");
		var formURL = "<?php echo site_url('salaryManageSystem/empBenifitEdit'); ?>";
		
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : {id: id},
			dataType: "json",
			success:function(data){
				$('#edit_id').val(data.id);
				$('#benifit_name').val(data.benifit_name);
				$('#benifit_amount').val(data.benifit_amount); 
				$('#description').val(data.description);
				$('.update').text("Update");
			}
		});
		
		e.preventDefault();
	});

   $(document).on("click", ".red", function(e){ 
   	    var id 		= $(this).attr("data-id");
   	    var emp_id 	= $(this).attr("data-emp-id");
   	    var formURL = "<?php echo site_url('salaryManageSystem/empBenifitDelete'); ?>";
			 $.ajax(
			 {
				url : formURL,
				async: false,
				type: "POST",
				data : {id: id, emp_id: emp_id},
				success:function(data){
				   $("#salaryListView").html(data);		
				   $('.afterSubmitContent').css('display', 'block'); 
				   $('.alrtText').text("Benifit Delete Successfully");
				}
			 });
			e.preventDefault();
	    });



	

</script>

	