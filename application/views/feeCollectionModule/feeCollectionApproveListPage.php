<table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Sl No </th>
				<th class="hidden-480">Student Id </th>

				<th>Action</th>
			</tr>
		</thead>

		<tbody>
		
		<?php 
		   $i = 1;
		   foreach($findAlUnapproveDta as $v) {  ?>
			<tr>
				<td width="10%"><?php echo $i++; ?></td>
				<td width="70%" class="hidden-480"><?php echo $v->stu_id; ?></td>
				<td width="20%" class="hidden-480"><div class="hidden-sm hidden-xs btn-group">

					<button class="btn btn-xs btn-info green" data-id="<?php echo $v->id ?>"  data-rel="tooltip" title="Approve" data-placement="bottom">
						<i class=" bigger-120">Approve</i>															</button>

					
					
				</div></td>
			</tr>
		 <?php }  ?>	
		</tbody>
	</table>


<script type="text/javascript" >

 
 $(document).on("click", ".green", function(e)
	{
		
		var id 		= $(this).attr("data-id");
		
		var formURL = "<?php echo site_url('feeCollectionApproveHome/approveFee'); ?>";
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : {id: id},
			dataType: "html",
			success:function(data){
			   $('#listView').html(data);	
			   $('.afterSubmitContent').css('display', 'block');
			}
		});
		
		e.preventDefault();
	});
</script>