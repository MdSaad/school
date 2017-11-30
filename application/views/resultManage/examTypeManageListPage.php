<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
																
	<div class="clearfix">
		<div class="pull-right tableTools-container"></div>
	</div>
	 
		

	<!-- div.table-responsive -->

	<div class="table-header text-left">
		Exam Type List :
	</div>
		
	<!-- div.dataTables_borderWrap -->
	<div>
		<table id="dynamic-table" class="table table-striped table-bordered table-hover text-left stuListTable">
																		<thead>
																			<tr>
																			  <th class="center">SL</th>
																				<th>Branch Name</th>
																				<th>Class Name</th>
																				<th>Year</th>
																				<th class="">Exam Type Name</th>
																				<th class="">Action</th>
																			</tr>
																		</thead>
						
																		<tbody>
																		
																		<?php
																			$i = 1;
																			$authorID = $this->session->userid;
																			$authorType = $this->session->usertype;
																			$authorBranchID = $this->session->authorBranchID;
																			if(isset($examTypeList)) {
																			  $i = $onset + 1; 
																			 foreach($examTypeList as $v) { 
																		
																		?>
																			<tr>
																			  <td class="center"><?php echo $i++; ?></td>
																				<td><?php echo $v->branch_name; ?></td>
																				<td class="hidden-480"><?php echo $v->class_name; ?></td>
																				<td class="hidden-480"><?php echo $v->year; ?></td>
																				<td class="hidden-480"><?php echo $v->exam_type_name; ?></td>
																				<td class=""><a href="#" class="green" data-id="<?php echo $v->id; ?>">Edit</a></td>
																			</tr>
																		 <?php }}  ?>	
																		</tbody>
																	</table>
		
		<label class="pos-rel"><span class="lbl"></span></label>
		<ul class="pagination-sm list-inline">
			  <li class="pagi"><?php echo $this->pagination->create_links(); ?></li>
		</ul>

	</div>
</div>

<script>

$(".green").on('click', function(){
	var id = $(this).attr("data-id");
	var resultsubmule = "<?php echo site_url("resultSubModule/examTypeManage"); ?>";
	var url = "<?php echo site_url("resultSubModule/edit"); ?>";
	$.ajax(
	{
		url: url,
		type:"POST",
		data:{id:id},
		dataType: "json",
		success:function(data){
		$('#addForm').css('display', 'block');
		$("#id").val(data.id);
		$("#branch_id").val(data.branch_id);
		$("#class_id").val(data.class_id);
		$("#exam_type_name").val(data.exam_type_name);
		$("#year").val(data.year);
		$("#status").val(data.status);
		$(".update").text("Update");
		$(".updatMsg").text('Update Successfully.');
		}
		
	});
	
	
});
</script>