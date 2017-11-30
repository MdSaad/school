
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
							<a href="<?php echo site_url('feeCollectionModule'); ?>">Fee Collection</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('feeCollectionModule/exCollection'); ?>"><?php echo $title; ?></a>&nbsp;&nbsp;</div>
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
											<h3 class="widget-title"><strong><?php echo $title; ?></strong></h3>
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
											
												<div class="scroll-content">
														<form class="form-vertical text-left" id="" role="form" action="<?php echo site_url('feeCollectionModule/exCollection'); ?>" enctype="multipart/form-data" method="get">	
																		         <div class="firstPart" >
																		 			 <div class="form-group col-md-6">
																						  <label class="control-label " for="student_name">Student Name :</label>
																						  <div class="">
																						 		<input type="text" name="student_name" id="student_name" required = "required"	 class="form-control" value="<?php echo $student_name; ?>" />																   		
																						 </div>
																					 </div>
																					 
																					 <div class="form-group col-md-6">
																						  <label class="control-label " for="collection_date">Collection Date :</label>
																						  <div class="">
																						 		<input type="text" name="collection_date" id="collection_date" required = "required"	 class="form-control date-picker" value="<?php echo $collection_date; ?>" />																	   		
																						 </div>
																					 </div>
																					 
																					 
																					 
																					 
																				    <div class="modal-footer col-md-12">
																							<button class="btn btn-xs btn-danger pull-right initialize" type="submit">
																								<i class="ace-icon fa fa-bolt bigger-110"></i>
																								<span class="initialAgain"> <?php if($student_name) echo "Again Initialize"; else echo "Initialize"; ?></span>
																								<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
																							</button>
																					</div>	 
																					
																				 </div>	 
												        </form>
														
														 <?php if($student_name) { ?>
														<form class="form-vertical" id="addForm" role="form" action="<?php echo site_url('feeCollectionModule/exCollectionSave'); ?>" enctype="multipart/form-data" method="post">	
																				
																				 <div class="secondPart">
																				 	 <table width="100%" id="dynamic-table" class="table table-striped table-bordered table-hover text-left item-table">
																						<thead>
																							<tr>
																							  <td colspan="4" class="center">Student Name : <strong class="text-primary"><?php echo $student_name; ?></strong>  <input type="hidden" name="student_name" id="student_name" value="<?php echo $student_name; ?>" /><br>
																							    Collection Date : <strong class="text-primary"><?php echo date('d-M-Y', strtotime($collection_date)); ?></strong> <input type="hidden" name="collection_date" id="collection_date" value="<?php echo $collection_date; ?>" /></td>
																						  </tr>
																							<tr>
																							  <th width="26%" class="center">Payment Head</th>
																								<th width="34%">Description</th>
																								<th width="30%"> Pay Amount </th>
																								<th width="10%"> Action </th>
																							</tr>
																						</thead>
													
																						<tbody>
																							 <tr>
																								  <td class="center">
																									<?php
																									$catList		=  $this->M_crud->findAll('fee_head_cat_list_manage', $where = array('status' => 'Active'), $orderBy = 'id' , $serialized = 'asc'); 
																									?>
																								<select class="form-control select " name="head_id" id="head_id">
																
																										<option value="">Select Payment Head</option>
																										<?php
																											foreach($catList as $k=>$v) {
																										 ?>
																										<optgroup label="<?php echo $v->cat_name; ?>">
																										<?php
																										$headList		=  $this->M_crud->findAll('fee_head_list_manage', $where = array('cat_id' => $v->id, 'status' =>"Active"), $orderBy = 'id' , $serialized = 'asc');
																										
																										foreach ($headList as $row) {
																											?>
																						
																											<option value="<?php echo $v->id.'_'.$row->id; ?>">
																												- <?php echo $row->head_name; ?>
																											</option>
																										<?php } ?>
																									</optgroup>
																									<?php } ?>
																									<optgroup label="Other's">
																										<option value="others_others">- Other's</option>
																									</optgroup>	
																									</select>																							 </td>
																								<td><input type="text" class="form-control" name="pay_head_details" id="pay_head_details"/></td>
																								<td >
																									<input type="number" class="form-control" name="pay_amount" id="pay_amount" />																								</td>
																								<td >
																									<button class="btn btn-xs btn-danger pull-right add-item" type="button">
																										<i class="ace-icon fa fa-bolt bigger-110"></i>
																										<span class="">Add</span>
																										<i class="ace-icon fa fa-arrow-right icon-on-right"></i>																									</button>																						</td>
																							</tr>
																						</tbody>
																					</table>
																					
																					<table width="100%" id="dynamic-table" class="table table-striped table-bordered table-hover text-left ">
																					<tr>
																						  <th align="right" class="text-right">Total Amount </th>
																						  <th width="30%" class="total"></th>
																						  <th width="10%">&nbsp;</th>
																					</tr>
																					</table>
																			     </div>	
																				 
																				 <div class="modal-footer">
																					<button class="btn btn-sm btn-danger formCancel" type="button">
																						<i class="ace-icon fa fa-times"></i>
																						Cancel
																					</button>
																					<button class="btn btn-sm btn-primary submitButton" type="submit">
																						<i class="ace-icon fa fa-check"></i>
																						Confirm To Submit
																					</button>
																				</div>
																				 
																			    
												        </form>
														 <?php } ?>	 


														
												</div>
												<br><br>
												<?php 
													$invoice = $this->M_crud->findAllGroupByLimit('ex_stu_fee_collection', array(),  'id', 'desc', 'invoice_no', 50)
												?>
												<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
																  <tr>
																    <td colspan="5" align="left" valign="top"><strong>Recent Invoice List : </strong></td>
											      </tr>
																  <tr>
																	<td align="left" valign="top">#</td>
																	<td align="left" valign="top">Student Name</td>
																	<td align="left" valign="top">Invoice No</td>
																	<td align="left" valign="top">Collection Date</td>
																	<td align="left" valign="top">Amount</td>
																  </tr>
																  
																  <?php 
																  $sl = 1;
																  foreach($invoice as $v) { 
																  $paidInvoice	= $this->M_crud->calCulateSum('ex_stu_fee_collection', array('invoice_no' => $v->invoice_no), 'pay_amount');
																  
																  ?>
																  
																  <tr>
																   
																	<td align="left" valign="top"><?php echo $sl++; ?></td>
																	<td align="left" valign="top"><?php echo $v->student_name; ?></td>
																	<td align="left" valign="top"><a href="<?php echo site_url('feeCollectionModule/exMoneyReceipt?invoice_no='.$v->invoice_no); ?>" target="_blank">#<?php echo $v->invoice_prefix; ?>-<?php echo $v->invoice_no; ?></a></td>
																	<td align="left" valign="top"><?php echo date('d-M-Y', strtotime($v->collection_date)); ?></td>
																	<td align="left" valign="top"><?php echo number_format($paidInvoice,2); ?>/-</td>
																  </tr>
																  <?php } ?>
																</table>
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
		format: 'yyyy/mm/dd',
})

$('.formCancel').on('click', function() {
	$('.addFormContent').fadeOut('slow');
	$('.add_new').fadeIn('slow');
});


// Add product for sell
		$('.add-item').on('click', function() {
            var head_id         	= $('#head_id').val();
            var headName        	= $('#head_id option:selected').html();
			var pay_head_details    = $('#pay_head_details').val();
			var pay_amount       	= $('#pay_amount').val();
            
			if(!head_id) { alert("Please Select a Payment Head"); return false; }
			if(pay_amount < 1) { alert("Please Enter Valid Amount"); return false; }
			
				var html = '<tr>';
				html    += '<tr><td class="text-right serial">'+headName+'</td><td class="text-right">'+pay_head_details+'</td><td class="text-right">'+pay_amount+'/-</td><td align="center">';
				html    += '<input type="hidden" name="head_id[]" value="'+head_id+'" />';
				html    += '<input type="hidden" name="pay_head_details[]" value="'+pay_head_details+'" />';
				html    += '<input type="hidden" name="pay_amount[]" value="'+pay_amount+'" />';
				html    += '<div class="item-delete hand"><i class="ace-icon fa fa-trash-o bigger-130"></i></div></td></tr>';
				
				$('.item-table tbody').append(html);
	
				$('#head_id').val('');
				$('#pay_head_details').val('');
				$('#pay_amount').val('');
				serialMaintain();
        });	
		
		$('.item-table').on('click', '.item-delete', function() {
            var element 		= $(this).parents('tr');
            element.remove();
            serialMaintain();
        });
		
		function serialMaintain(){
            var i = 1;
            var total = 0;
            $('.serial').each(function(key, element) {
                var pay_amount   = $(element).parents('tr').find('input[name="pay_amount[]"]').val();
                total    += +pay_amount;
            });
            $('.total').html(total.toFixed(2)+'/-');
        }
	
	$('.submitButton').on('click', function() {
		var x = confirm("Are You Sure To Confirm?");
		if(!x) { return false; }
	});

</script>