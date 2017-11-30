<table class="table table-striped table-bordered table-hover text-left empListTable">
		<thead>
			<tr>
			  <th class="center">SL</th>
				<th width="13%">Deduction Reason </th>
				<th>Payable Amount </th>
				<th class="hidden-480">Payable Month </th>
				<th class="hidden-480">Installment Type </th>
				<th class="hidden-480">Total Installment </th>
				<th class="hidden-480">Start Month </th>
				<th width="12%">Total Amount </th>
				<th width="12%">Action </th>
			</tr>
		</thead>

		<tbody>
		
		<?php
			$i = 1;
			 foreach($empAllDeductionDetails as $v) { 
		
		?>
			<tr>
			  <td class="center"><?php echo $i++; ?></td>
				<td width="10%" align="left">
				<?php echo $v->deduction_reason; ?></td>
				<td class="hidden-480"><?php echo $v->payable_amount; ?></td>
				<td class="hidden-480"><?php echo $v->payable_month; ?></td>
				<td class=""><?php echo $v->install_type; ?></td>
				<td class="hidden-480"><?php echo $v->total_installment; ?></td>
				<td class="hidden-480"><?php echo $v->deduction_start_date; ?></td>
				<td width="10%" align="center"><?php echo $v->deduction_amount; ?> </td>
				<td >
				<div class="hidden-sm hidden-xs btn-group">
				<button class="btn btn-xs btn-info degreen" data-id="<?php echo $v->id ?>"  data-rel="tooltip" title="Edit" data-placement="bottom">
					<i class="ace-icon fa fa-pencil bigger-120"></i>															</button>

				<button class="btn btn-xs btn-danger dered" data-emp-id="<?php echo $v->emp_id ?>" data-id="<?php echo $v->id ?>" data-rel="tooltip" title="Delete" data-placement="bottom" >
					<i class="ace-icon fa fa-trash-o bigger-120"></i>															</button>
				
			</div>
					</td>
			</tr>
		 <?php } ?>	
		</tbody>
	</table>
	<script>
	  $(document).on("click", ".degreen", function(e)
	{
		var id 		= $(this).attr("data-id");
		var formURL = "<?php echo site_url('salaryManageSystem/empDeductionEdit'); ?>";
		
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : {id: id},
			dataType: "json",
			success:function(data){
				$('#deduc_update_id').val(data.id);
				$('#deductionAddForm #deduction_amount').val(data.deduction_amount);
				$('#deductionAddForm #total_installment').val(data.total_installment); 
				$('#deductionAddForm #payable_amount').val(data.payable_amount);
				$('#deductionAddForm #install_type').val(data.install_type);
				$('#deductionAddForm #deduction_reason').val(data.deduction_reason); 
				$('#deductionAddForm #deduction_start_date').val(data.deduction_start_date);
				$('#deductionAddForm #payable_month').val(data.payable_month);

				
			}
		});
		
		e.preventDefault();
	});

   $(document).on("click", ".dered", function(e){ 
   	    var id 		= $(this).attr("data-id");
   	    var emp_id 	= $(this).attr("data-emp-id");
   	    var formURL = "<?php echo site_url('salaryManageSystem/empDeductionDelete'); ?>";
			 $.ajax(
			 {
				url : formURL,
				async: false,
				type: "POST",
				data : {id: id, emp_id: emp_id},
				success:function(data){
				   $("#deductionAmountView").html(data);		
				   $('.afterSubmitContent').css('display', 'block'); 
				   $('.alrtText').text("Deduction Delete Successfully");
				}
			 });
			e.preventDefault();
	    });


	</script>