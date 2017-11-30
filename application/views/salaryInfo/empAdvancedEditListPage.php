<table class="table table-striped table-bordered table-hover text-left">
		<thead>
			<tr>
			  <th class="center">SL</th>
				<th width="12%">Advanced Reason </th>
				<th>Payable Amount </th>
				<th class="hidden-480">Payable Month  </th>

				<th class="hidden-480"> Installment Type</th>
				<th class="hidden-480">Total Installment </th>
				<th class="hidden-480">Start Date </th>
				<th width="12%">Total Amount </th>
				<th width="12%">Action </th>
			</tr>
		</thead>

		<tbody>
		
		<?php
			$i = 1;
			 foreach($empAllAdvacedDetails as $v) { 
		
		?>
			<tr>
			  <td class="center"><?php echo $i++; ?></td>
				<td width="10%" align="left">
				  <?php echo $v->advanced_reason; ?></td>
				<td class="hidden-480"><?php echo $v->payable_amount; ?></td>
				<td class=""><?php echo $v->payable_month; ?></td>
				<td class="hidden-480"><?php echo $v->install_type; ?></td>

				<td class="hidden-480"><?php echo $v->total_installment; ?></td>
				<td class="hidden-480"><?php echo $v->advanced_start_date; ?></td>
				<td width="10%" align="center"><?php echo $v->advanced_amount; ?> </td>
				<td >
				<div class="hidden-sm hidden-xs btn-group">
				<button class="btn btn-xs btn-info adgreen" data-id="<?php echo $v->id ?>"  data-rel="tooltip" title="Edit" data-placement="bottom">
					<i class="ace-icon fa fa-pencil bigger-120"></i>															</button>

				<button class="btn btn-xs btn-danger adred" data-emp-id="<?php echo $v->emp_id ?>" data-id="<?php echo $v->id ?>" data-rel="tooltip" title="Delete" data-placement="bottom" >
					<i class="ace-icon fa fa-trash-o bigger-120"></i>															</button>
				
			</div>
					</td>
			</tr>
		 <?php } ?>	
		</tbody>
	</table>
	<script type="text/javascript" >
 $('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd',
});


$("#advancedAddForm").submit(function(e)
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
				$("#advancedListData").html(data);				
				$("#advancedAddForm").find("input[type=text],input[type=number],input[name=advan_update_id], textarea").val("");
				$('.afterSubmitContent').css('display', 'block');
				$('.alrtText').text("Advanced Update Successfully");
				
			}
		});
		
		e.preventDefault();
	});
	
	

	
	 $(document).on("click", ".adgreen", function(e)
	{
		var id 		= $(this).attr("data-id");
		var formURL = "<?php echo site_url('salaryManageSystem/empAdvancedEdit'); ?>";
		
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : {id: id},
			dataType: "json",
			success:function(data){
				$('#advan_update_id').val(data.id);
				$('#advancedAddForm #advanced_amount').val(data.advanced_amount);
				$('#advancedAddForm #total_installment').val(data.total_installment); 
				$('#advancedAddForm #payable_amount').val(data.payable_amount);
				$('#advancedAddForm #install_type').val(data.install_type);
				$('#advancedAddForm #advanced_reason').val(data.advanced_reason); 
				$('#advancedAddForm #advanced_start_date').val(data.advanced_start_date);
				$('#advancedAddForm #payable_month').val(data.payable_month);
				
			}
		});
		
		e.preventDefault();
	});

   $(document).on("click", ".adred", function(e){ 
   	    var id 		= $(this).attr("data-id");
   	    var emp_id 	= $(this).attr("data-emp-id");
   	    var formURL = "<?php echo site_url('salaryManageSystem/empAdvanceDelete'); ?>";
			 $.ajax(
			 {
				url : formURL,
				async: false,
				type: "POST",
				data : {id: id, emp_id: emp_id},
				success:function(data){
				   $("#advancedListData").html(data);		
				   $('.afterSubmitContent').css('display', 'block'); 
				   $('.alrtText').text("Advanced Delete Successfully");
				}
			 });
			e.preventDefault();
	    });



	

</script>