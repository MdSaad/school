<table class="table table-striped table-bordered table-hover text-left empListTable">
	<thead>
		<tr>
		  <th class="center">SL</th>
			<th>Employee  ID</th>
			<th>Name</th>
			<th class="hidden-480">Department</th>

			<th class="hidden-480">Designition</th>
			<th class="hidden-480">Picture</th>
		</tr>
	</thead>

	<tbody>
	
	<?php
		$i = 1;
		 foreach($allEmpInfo as $v) { 
	
	?>
		<tr>
		  <td class="center"><a class="leaveManage" href="#" data-id="<?php echo $v->employee_id ?>"><?php echo $i++; ?></a></td>
			<td width="10%" align="left">
			<a class="leaveManage" href="#" data-id="<?php echo $v->employee_id ?>"><?php echo $v->employee_id; ?></a>
			<td class="hidden-480"><a class="leaveManage" href="#" data-id="<?php echo $v->employee_id ?>"><?php echo $v->employee_full_name; ?></a></td>
			<td class=""><a class="leaveManage" href="#" data-id="<?php echo $v->employee_id ?>"><?php echo $v->department_name; ?></a></td>
			<td class="hidden-480"><a class="leaveManage" href="#" data-id="<?php echo $v->employee_id ?>"><?php echo $v->designition_name; ?></a></td>

			<td class="hidden-480"><a class="leaveManage" href="#" data-id="<?php echo $v->employee_id ?>"><img src="<?php echo base_url("resource/emp_photo/$v->emp_photo") ?>" width="50" height="50" /></a></td>
		</tr>
	 <?php } ?>	
	</tbody>
</table>