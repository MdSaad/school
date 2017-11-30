<form id="leaveForm" action="<?php echo site_url('leaveManage/leaveManageStore'); ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="emp_id" value="<?php echo $empInfo->id ?>" />
<div class="modal-header" style="border-bottom:2px solid #FF0000">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h3 class="modal-title" id="myModalLabel"><?php echo $empInfo->employee_full_name; ?>  </h3>
</div>
  
<div class="modal-body" style="z-index:10000">
   <div class="row">
      <div class="col-md-12" style="font-size:15px;"><strong>Previous Leave Record :</strong></div>
	  <div class="col-md-12">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered">
	  <tr>
		<td width="22%"><strong>Leave Type</strong></td>
		<td width="19%"><strong>Total Leave Days</strong> </td>
		<td width="30%"><strong>Leave Achieve</strong></td>
		<td width="29%"><strong>Available Leave</strong></td>
	  </tr>
	   <?php 
	     if(!empty($empLeaveInfo)){
	     foreach($empLeaveInfo as $v){ 
		   $leaveAvailable = $v->leave_days - $v->total_leave;
		 ?>
	  <tr>
		<td><?php echo $v->leave_type ?></td>
		<td><?php echo $v->leave_days ?></td>
		<td>
		   <?php 
		      $takenLeave = array();
		      foreach($v->leaveDetails as $allLeave){
			    $takenLeave[]  = $allLeave->taken_leave; 
			  }
			 
			  echo implode("+",$takenLeave);
			 
		    ?>
		  </td>
		<td><?php echo $leaveAvailable ?></td>
	  </tr>
	  
	  <?php } } else { ?>
	  <?php 
	     foreach($empTempLeaveInfo as $v){ ?>
	  <tr>
		<td><?php echo $v->leave_type ?></td>
		<td><?php echo $v->leave_days ?></td>
		<td>0</td>
		<td><?php echo $v->leave_days ?></td>
	  </tr>
	  
	  <?php } } ?>
	</table>

      </div>

   </div>
   
    <div class="row">
      <div class="col-md-4"></div>
	  <div class="col-md-8 text-left" style="font-size:15px; text-decoration:underline"><strong>New Leave Record Save</strong></div>
	  <div class="col-md-4"></div>
	  <div class="col-md-8">
	     <div class="col-xs-12 col-sm-3">
          <div class="form-group">
			<label for="admin_type"><strong>Join Date</strong></label>        
			<div>
			   <input type="text" id="to_date" placeholder="To Date" name="to_date"
				tabindex="2" class="form-control" disabled="disabled" value="<?php echo $empInfo->initiate_joining_date ?>" /> 
				
			</div>
		</div>
	    </div>
	    <div class="col-xs-12 col-sm-3">
          <div class="form-group">
			<label for="admin_type"><strong>Leave Type</strong></label>        
			<div>
			   <select class="form-control" id="leave_type" name="leave_type"  tabindex="2" required >
					<option value="" selected>Select Leave Type</option>
					<?php foreach($empTempLeaveInfo as $v){ ?>
					  <option value="<?php echo $v->id ?>"><?php echo $v->leave_type ?></option>
					 <?php } ?>
			   </select>
				
			</div>
		</div>
	    </div>
		<div class="col-xs-12 col-sm-3">
          <div class="form-group">
			<label for="admin_type"><strong>From Date</strong></label>        
			<div>
			   <input type="text" id="from_date" placeholder="From Date" name="from_date"
				tabindex="1" class="form-control date-picker" /> 
				
			</div>
		</div>
	    </div>
		<div class="col-xs-12 col-sm-3">
          <div class="form-group">
			<label for="admin_type"><strong>To Date</strong></label>        
			<div>
			   <input type="text" id="to_date" placeholder="To Date" name="to_date"
				tabindex="2" class="form-control date-picker" /> 
				
			</div>
		</div>
	    </div>
      </div>

   </div>
   
    
		
</div>
		

<div class="modal-footer">
<span style="text-decoration:none; color:#FF0000" class="alert"></span>
<button class="btn btn-sm btn-primary" type="submit">
	<i class="ace-icon fa fa-check"></i>
	Save
</button>
	
 <button class="btn btn-sm" data-dismiss="modal">
	<i class="ace-icon fa fa-times"></i>
	Cancel
</button></div>
</form>

<script>
  $('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd',
});



       //callback handler for form submit
		$("#leaveForm").submit(function(e)
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
				    if(data ==1){
					    $(".alert").text("You have not enough leave"); 
					}else if(data ==2){
					    $(".alert").text("Sorry There are holyday to selected date range please change date range"); 
					} else {
						$("#leaveForm").find("input[type=text], select").val("");
						alert("Leave Manage Success");
						$("#leaveModal").modal('hide');
						$(".alert").text(""); 
				   }
					
					
				}
			});
			
			e.preventDefault();
		});
		
		
		

</script>






