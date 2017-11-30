<table class="table table-striped table-bordered table-hover text-left empListTable" style="font-size:13px;">
		<thead>
			<tr>
			  <th width="6%">SL</th>
				<th width="12%">ID</th>
				<th width="12%">Benefit Name </th>
				<th width="10%">Amount</th>
				<th width="10%">Benifit Month</th>
				<th width="20%">Description</th>

				<th width="12%">Action</th>
			</tr>
		</thead>

		<tbody>
		
		<?php
			$i = 1;
			 foreach($empAllBenifitDetails as $v) { 
			  if($v->benifit_name == 'exDuty'){
			  $benifit_name = "Extra Duty Payment";
			 }else if($v->benifit_name == 'header'){
			  $benifit_name = "Headship/ Coordinatorship";
			 }else if($v->benifit_name == 'arrear'){
			  $benifit_name = "Arrear";
			 }else{
			  $benifit_name = "Other";
			 }
		
		?>
			<tr>
			  <td class="center"><?php echo $i++; ?></td>
			  <td align="left"><?php echo $v->emp_id; ?></td>
			  <td align="left">
				 <?php echo $benifit_name; ?></td>
			  <td><?php echo $v->benifit_amount; ?></td>
			  <td><?php echo $v->month_year; ?></td>
			  <td><?php echo $v->description; ?></td>
				<td >
				   <div class="hidden-sm hidden-xs btn-group">
			<button class="btn btn-xs btn-info green" data-id="<?php echo $v->id ?>"  data-rel="tooltip" title="Edit" data-placement="bottom">
				<i class="ace-icon fa fa-pencil bigger-120"></i>															</button>

			<button class="btn btn-xs btn-danger red" data-emp-id="<?php echo $v->emp_id ?>" data-id="<?php echo $v->id ?>" data-rel="tooltip" title="Delete" data-placement="bottom" >
				<i class="ace-icon fa fa-trash-o bigger-120"></i>															</button>
			
		</div>
				</td>
			</tr>
		 <?php } ?>	
		 
		</tbody>
	</table>
<script type="text/javascript">
  $("#addForm").submit(function(e)
	{
	    var id       = $("#edit_id").val();
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
				$("#salaryListView").html(data);				
				$("#addForm").find("input[type=text],input[type=number],input[name=edit_id], textarea, select").val("");
				$('.afterSubmitContent').css('display', 'block'); 
				if(id) $('.alrtText').text("Benifit Update Successfully");
				$('.update').text("Submit");
				
			}
		});
		
		e.preventDefault();
	});



    $(document).on("click", ".green", function(e)
	{
		var id 		= $(this).attr("data-id");
		var formURL = "<?php echo site_url('salaryManageSystem/empBenifitEdit'); ?>";
		
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : {id: id},
			dataType: "json",
			success:function(data){
				$('#edit_id').val(data.id);
				$('#benifit_name').val(data.benifit_name);
				$('#benifit_amount').val(data.benifit_amount); 
				$('#description').val(data.description);
				$('.update').text("Update");
			}
		});
		
		e.preventDefault();
	});

   $(document).on("click", ".red", function(e){ 
   	    var id 			= $(this).attr("data-id");
   	    var emp_id 		= $(this).attr("data-emp-id");
   	    var formURL 	= "<?php echo site_url('salaryManageSystem/empBenifitDelete'); ?>";
			 $.ajax(
			 {
				url : formURL,
				async: false,
				type: "POST",
				data : {id: id, emp_id: emp_id},
				success:function(data){
				   $("#salaryListView").html(data);		
				   $('.afterSubmitContent').css('display', 'block'); 
				   $('.alrtText').text("Benifit Delete Successfully");
				}
			 });
			e.preventDefault();
	    });


	
</script>