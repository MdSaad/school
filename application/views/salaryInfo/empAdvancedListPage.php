<table class="table table-striped table-bordered table-hover text-left empListTable">
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
		</tr>
	 <?php } ?>	
	</tbody>
</table>
