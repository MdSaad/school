<table width="100%" border="0">
  <tr>
    <td> 
	  <form class="form-horizontal" id="benifitAddForm" role="form" action="<?php echo site_url('salaryManageSystem/empWiseBenifitAction'); ?>" enctype="multipart/form-data" method="post">	
		 <input type="hidden" name="empId" id="empId" value="<?php echo $empId ?>" />
		 <input type="hidden" name="monthYear" id="monthYear" value="<?php echo $monthYear ?>" />
		 <input type="hidden" name="edit_id" id="edit_id" />
		  
		  <div class="content img-thumbnail container" style="padding-top:15px; width:100%">
							  
						<div class="form-group">
						  <label class="control-label col-sm-1" for="employee_full_name">Name :</label>
						  <div class="col-sm-3">
						        <select class="form-control" name="benifit_name" id="benifit_name" required>
									<option value="" selected="selected" >Select Benifit Name </option>
									   <option value="exDuty">Extra Duty Payment </option>
									   <option value="header">Headship/ Coordinatorship </option>
									   <option value="arrear">Arrear </option>
									   <option value="other">Other</option>
								 </select>		  
								
						  </div>
						  
						  <label class="control-label col-sm-1" for="benifit_amount">Amount :</label>
						  <div class="col-sm-3 text-left">
							<input required="required" type="number" class="form-control" name="benifit_amount" id="benifit_amount" placeholder="Enter Amount*" value=""/>
						  </div>
						  
						  <label class="control-label col-sm-1" for="description">Description:</label>
						  <div class="col-sm-3 text-left">
							<textarea name="description" id="description" class="form-control"  placeholder="Enter Description"></textarea>
						  </div>
						 
						</div>
								
				  <div class="modal-footer">
					<div class="col-md-8">
					<div class="alert alert-block alert-success text-left afterSubmitContent" style="height: 35px; padding:5px 5px 5px 5px;">
					<button class="close" data-dismiss="alert" type="button">
					<i class="ace-icon fa fa-times"></i>
					</button>
					<strong class="green">
					<i class="ace-icon fa fa-check-square-o"></i>
					
					</strong>
					<span class="alrtText text-center">Benifit Added Successfully</span>
				   </div></div>
				
					<button class="btn btn-sm btn-danger formCancel" type="button">
						<i class="ace-icon fa fa-times"></i>
						Cancel
					</button>
					<button class="btn btn-sm btn-primary" type="submit">
						<i class="ace-icon fa fa-check"></i>
						<span class="update"> Submit </span>
					</button>
				</div>
			   <div id="salaryListView">
			     <table class="table table-striped table-bordered table-hover text-left empListTable">
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

						<button class="btn btn-xs btn-danger redemp" data-emp-id="<?php echo $v->emp_id ?>" data-id="<?php echo $v->id ?>" data-rel="tooltip" title="Delete" data-placement="bottom" >
							<i class="ace-icon fa fa-trash-o bigger-120"></i>															</button>
						
					</div>
							</td>
						</tr>
					 <?php } ?>	
					 
					</tbody>
				</table>
			   </div>
			</div> 
		</form>	
	</td>
  </tr>
</table>

<script>
  $('.formCancel').on('click', function() {
  $('.empListTable .detailsShow').remove();
  $('.showForm').css('display','block');
  $('.hideForm').css('display','none');
});



$("#benifitAddForm").submit(function(e)
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
				$("#benifitAddForm #salaryListView").html(data);				
				$("#benifitAddForm").find("input[type=text],input[type=number],input[name=edit_id], textarea, select").val("");
				$('#benifitAddForm .afterSubmitContent').css('display', 'block'); 
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

    $(document).on("click", ".redemp", function(e){ 
   	    var id 			= $(this).attr("data-id");
   	    var emp_id 		= $(this).attr("data-emp-id");
   	    var formURL 	= "<?php echo site_url('salaryManageSystem/empWiseBenifitDelete'); ?>";
			 $.ajax(
			 {
				url : formURL,
				async: false,
				type: "POST",
				data : {id: id, emp_id: emp_id},
				success:function(data){
				   $("#benifitAddForm #salaryListView").html(data);		
				   $('.afterSubmitContent').css('display', 'block'); 
				   $('.alrtText').text("Benifit Delete Successfully");
				}
			 });
			e.preventDefault();
	    });





</script>
