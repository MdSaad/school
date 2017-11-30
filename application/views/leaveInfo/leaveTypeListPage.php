<table class="table table-bordered">
		<thead>
			<tr>
				<th class="center" width="8%">
				  Sl No
				</th>
				<th>Leave Type Name</th>
				<th>Leave Days</th>
				<th>Leave Year</th>
				<th width="10%">Action</th>
			</tr>
		</thead>

		<tbody>
		
		<?php 
		   $sl = 1;
		   foreach($allLeaveInfo as $v) { 
		 ?>
			<tr style="background-color:#F9F9F9">
				<td class="center">
				   <?php echo $sl++; ?>
				</td>

				<td><?php echo $v->leave_type; ?></td>
				<td class="hidden-480"><?php echo $v->leave_days; ?></td>
				<td><?php echo $v->year; ?></td>
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

  $("#addForm").submit(function(e)
	{
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		console.log(postData);
		$.ajax(
			{
				url : formURL,
				type: "POST",
				async: false,
				data : postData,
				success:function(data){
					$("#listView").html(data);	
					$("#addForm").find("input[type=text],input[type='number'], select, textarea").val("");
					
				}
			  });
		
		e.preventDefault();
	});
	
	
	$(document).on("click", ".green", function(e)
	{
		
		var id 		= $(this).attr("data-id");
		var formURL = "<?php echo site_url('leaveManage/leaveEditInfo'); ?>";
		$('.update').text('Update');
		$.ajax(
		{
			url : formURL,
			type: "POST",
			async: false,
			data : {id: id},
			dataType: "json",
			success:function(data){
				$('#update_id').val(data.id);
				$('#leave_type').val(data.leave_type);
				$('#leave_days').val(data.leave_days);
				$('#year').val(data.year);
				$('#update').text("Update");
		
			}
		});
		
		e.preventDefault();
	});
	
	
	 $('.red').on('click', function() {
			var x = confirm('Are you sure to delete?');
			
			if(x){
				var id = $(this).attr('data-id');
				console.log(id);
				var url = SAWEB.getSiteAction('leaveManage/leaveDelete/'+id);
				location.replace(url);
			} else {
				return false;
			}
		});

</script>
