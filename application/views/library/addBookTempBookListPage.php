  <div class="alert alert-block alert-success aproveAlert" style="display:none">
		<button class="close" data-dismiss="alert" type="button">
		<i class="ace-icon fa fa-times"></i>
		</button>
		<strong class="green">
		<i class="ace-icon fa fa-check-square-o"></i>
		
		</strong>
		<span class="alrtText">Book Issue Successfully. Issue Again</span>
	</div>

  <form id="bookApproveForm" method="post" action="<?php echo site_url('libraryManage/bookApproveFormAction'); ?>">
    <input type="hidden" name="student_id_ap" id="student_id_ap" value="<?php echo $student_id_search ?>" />
	<input type="hidden" name="year2_ap" id="year2_ap" value="<?php echo $year2_search ?>" />
	<input type="hidden" name="branc_id_ap" id="branc_id_ap" value="<?php echo $branc_id_search ?>" />
	<input type="hidden" name="class_section_id_ap" id="class_section_id_ap" value="<?php echo $class_section_id_search ?>" />
	<input type="hidden" name="class_id_ap" id="class_id_ap" value="<?php echo $class_id_search ?>" />
	<input type="hidden" name="class_shift_id_ap" id="class_shift_id_ap" value="<?php echo $class_shift_id_search ?>" />
	<input type="hidden" name="class_group_id_ap" id="class_group_id_ap" value="<?php echo $class_group_id_search ?>" />
	<input type="hidden" name="class_roll_ap" id="class_roll_ap" value="<?php echo $class_roll_search ?>" />
	<input type="hidden" name="ad_year2_ap" id="ad_year2_ap" value="<?php echo $ad_year2_search ?>" />
	<table class="table table-striped table-bordered table-hover text-left empListTable">
				<thead>
					<tr>
					  <th class="center">SL</th>
						<th width="12%">Book   ID</th>
						<th>Book Name</th>
						<th class="hidden-480">Issue Date </th>
	
						<th class="hidden-480">Valid Till </th>
						<th class="hidden-480">Remove</th>
					</tr>
				</thead>
	
				<tbody>
				
				<?php
					$i = 1;
					 foreach($tempBookList as $v) { 
				
				?>
					<tr>
					  <td class="center"><?php echo $i++ ?></td>
						<td width="10%" align="left"><?php echo $v->book_id ?> <input type="hidden" name="book_auto_id[]" value="<?php echo $v->book_auto_id ?>" /> <input type="hidden" name="book_id[]" value="<?php echo $v->book_id ?>" /></td>
						
						<td class="hidden-480"><?php echo $v->book_name ?> <input type="hidden" name="book_name[]" value="<?php echo $v->book_name ?>" /></td>
						<td class=""><?php echo $v->issue_date ?> <input type="hidden" name="issue_date[]" value="<?php echo $v->issue_date ?>" /></td>
						<td class="hidden-480"><?php echo $v->valide_date ?> <input type="hidden" name="valide_date[]" value="<?php echo $v->valide_date ?>" /></td>
	
						<td class="hidden-480"><a class="del" data-id="<?php echo $v->id ?>"><i style="color:#FF0000; cursor:pointer" class="ace-icon fa fa-remove"></i></a></td>
					</tr>
				 <?php } ?>	
				</tbody>
			</table>
			<div class="form-group pull-right" style="padding:0 20px 0 12px">
	        <button class="btn btn-xs btn-primary" type="submit">
				<i class="ace-icon fa fa-check bigger-110"></i>
				<span class="initialAgain">Approved</span>
			</button> 
	       </div>
	</form>
	<script>
	  $(document).on("click", ".del", function(e)
		{
			var id 		= $(this).attr("data-id");
			var formURL = "<?php echo site_url('libraryManage/bookIssueDelete'); ?>"; 
			
			$.ajax(
			{
				url : formURL,
				type: "POST",
				async: false,
				data : {id: id},
				success:function(data){
				     $("#issueBookList").html(data);				
				}
			});
			
		   e.preventDefault();
		});

	  $("#bookApproveForm").submit(function(e)
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
				     $('#bookApproveForm').css('display', 'none');
				     $('.aproveAlert').css('display', 'block');		
					 
				}
			});
			
			e.preventDefault();
		});
	</script>