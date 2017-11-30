
<div class="tempPaidListView">
<table id="dynamic-table" class="table table-striped table-bordered table-hover text-left stuListTable">
				<thead>
					<tr>
						<th class="center">SL No</th>
					  	<th class="center">Payment Head</th>
						<th>Description</th>
						<th> Pay Amount </th>
						<th> Action </th>
						
					</tr>
				</thead>

				<tbody>
					<?php
					 $slNo = 1;
					 $totalPaid = 0;
					 foreach($submitFeeHeadAmountInfo as $v) { 
					 $totalPaid = $v->paid_amount+$totalPaid;
					 
					 ?>
					 <tr>
						  <td class="center">
							<?php echo $slNo++; ?>
						 </td>
						  <td><?php if($v->applicable_mode_name) echo $v->applicable_mode_name; else echo "Other's"; ?> </td>
						  <td ><?php echo $v->head_details; ?></td>
						  <td><?php echo $v->paid_amount; ?></td>
					  	 <td ><span class="removeFeePaidHead cursorPointer hand" data-id ="<?php echo $v->id; ?>"><i class="ace-icon glyphicon glyphicon-remove"></i></span></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
					<tr>
						<th>Send SMS :</th>
						<td>
							<div class="checkbox">
							  <label><input type="checkbox" name="toStudent" id="toStudent" >To Student</label>
							</div>
						</td>
						<td>
							<div class="checkbox">
							  <label><input type="checkbox" name="toFather" id="toFather" >To Father</label>
							</div>
							</td>
						<td>
							<div class="checkbox">
							  <label><input type="checkbox" name="toMother" id="toMother" >To Mother</label>
							</div>
						</td>
						<td>
							<div class="checkbox">
							  <label><input type="checkbox" name="toGuardian" id="toGuardian">To Guardian</label>
							</div>
						</td>
					  </tr>
			</table>
		<div class="col-md-12">
			<span class="label label-info arrowed-right arrowed-in hand feeHeadFinalSubmit pull-left">Received Verified</span>
			
			<span class="pull-right"><strong>Amount Total :<?php echo number_format($totalPaid, 2); ?><input type="hidden" name="totalAmount" id="totalAmount" value="<?php echo number_format($totalPaid, 2); ?>" /></strong></span>
		</div>		
</div>	

<script>
$(".removeFeePaidHead").on('click', function()
{
	var dataID = $(this).attr('data-id');
	var formURL = "<?php echo site_url('feeCollectionModule/removeFeePaidHead'); ?>";
	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : {dataID : dataID},
		success:function(data){
			$(".paidListView").html(data);
			//$('#feeHeadAddForm input[type="text"]').val("");
			$("#feeHeadAddForm option:selected").prop("selected", false)				
		}
	});
	
});


$(".feeHeadFinalSubmit").on('click', function()
{
	var toStudent 			= ($("#toStudent").is(':checked') ) ? 1 : 0;
	var toFather 			= ($("#toFather").is(':checked') ) ? 1 : 0;
	var toMother 			= ($("#toMother").is(':checked') ) ? 1 : 0;
	var toGuardian 			= ($("#toGuardian").is(':checked') ) ? 1 : 0;
	var totalAmount 		= $('#totalAmount').val();
	var class_wise_auto_id  = $('#class_wise_auto_id').val();
	var submittedDate  		= $('#submittedDate').val();
	$(this).text('Please Wait...');
	$(this).removeClass('feeHeadFinalSubmit');
	var formURL = "<?php echo site_url('feeCollectionModule/feeHeadFinalSubmit'); ?>";
	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : {toStudent:toStudent, toFather:toFather, toMother:toMother, toGuardian:toGuardian, totalAmount:totalAmount, class_wise_auto_id:class_wise_auto_id, submittedDate:submittedDate},
		success:function(data){
			$(".paymentHeadListView").html(data);
		}
	});
	
});


</script>