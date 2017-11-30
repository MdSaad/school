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
						  <td><?php echo $v->applicable_mode_name; ?></td>
						  <td ><?php echo $v->head_details; ?></td>
						  <td><?php echo $v->paid_amount; ?></td>
					  	 <td ><span class="removeFeePaidHead cursorPointer hand" data-id ="<?php echo $v->id; ?>"><i class="ace-icon glyphicon glyphicon-remove"></i></span></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
<div class="col-md-12">
	<span class="label label-info arrowed-right arrowed-in hand feeHeadFinalSubmit pull-left">Received Verified</span>
	
	<span class="pull-right"><strong>Amount Total :<?php echo number_format($totalPaid, 2); ?></strong></span>
</div>		
</div>	

<script>
$(".removeFeePaidHead").on('click', function()
{
	var dataID = $(this).attr('data-id');
	var formURL = "<?php echo site_url('studentHome/removeFeePaidHead'); ?>";
	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : {dataID : dataID},
		success:function(data){
			$(".paidListView").html(data);
			$('#feeHeadAddForm input[type="text"]').val("");
			$("#feeHeadAddForm option:selected").prop("selected", false)				
		}
	});
	
});


$(".feeHeadFinalSubmit").on('click', function()
{
	var formURL = "<?php echo site_url('studentHome/feeHeadFinalSubmit'); ?>";
	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : {},
		success:function(data){
			$(".paymentHeadListView").html(data);
		}
	});
	
});
</script>