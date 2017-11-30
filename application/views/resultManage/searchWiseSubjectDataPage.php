<table class="table table-bordered leaveListTable">
	<thead>
		<tr>
			<th class="center" width="8%">
			  Sl No
			</th>
			<th>Campus</th>
			<th>Class</th>
			<th>Subject</th>
			<th width="10%">Action</th>
		</tr>
	</thead>

	<tbody>
	
	<?php 
	   $sl = 1;
	   foreach($allSubjectInfo as $v) { 
	 ?>
		<tr style="background-color:#F9F9F9">
			<td class="center">
			   <?php echo $sl++; ?>
			</td>

			<td><?php echo $v->branch_name; ?></td>
			<td class="hidden-480"><?php echo $v->class_name; ?></td>
			<td><?php echo $v->subject_name; ?></td>
			<td>
				<div class="hidden-sm hidden-xs btn-group">
				<button class="btn btn-xs btn-info green" data-id="<?php echo $v->id ?>"  data-rel="tooltip" title="Edit" data-placement="bottom">
					<i class="ace-icon fa fa-pencil bigger-120"></i>															</button>

				<button class="btn btn-xs btn-danger red" data-id="<?php echo $v->id ?>" data-rel="tooltip" title="Delete" data-placement="bottom" >
					<i class="ace-icon fa fa-trash-o bigger-120"></i>															</button>
				
			</div>
			</td>
		</tr>
	 <?php  } ?>	
	</tbody>
</table>
<script>
   $('.red').on('click', function() {
			var x = confirm('Are you sure to delete?');
			
			if(x){
				var id = $(this).attr('data-id');
				console.log(id);
				var url = SAWEB.getSiteAction('resultSubModule/subjectDelete/'+id);
				location.replace(url);
			} else {
				return false;
			}
		});
</script>
											
										
								