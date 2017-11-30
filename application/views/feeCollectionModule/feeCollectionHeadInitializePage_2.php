<style>
	RESPONSE {
		display:none;
	}
	credits {
		display:none;
	}
</style>
<?php if(!empty($findStuInfoClassWise)) { ?>
<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
																
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header text-left" style="min-height: 60px;padding-top: 6px">
			<span class="label label-success  arrowed-right"><?php echo $findStuInfoClassWise->stu_id; ?></span>
			<strong>Name :</strong> <?php echo $findStuInfoClassWise->stu_full_name; ?>
			<span style="float:right">
			   <?php
					 if(!empty($findStuInfoClassWise->stu_photo)){ ?>
					<img src="<?php echo base_url("resource/stu_photo/$findStuInfoClassWise->stu_photo"); ?>" width="50" height="40" class="img-thumbnail"> 
				<?php }else{  if($findStuInfoClassWise->stu_sex == 'M'){ ?>
						 <img src="<?php echo base_url('resource/img/male.png'); ?>" width="50" height="40"> 
					 <?php }else{ ?>
					   <img src="<?php echo base_url('resource/img/EmptyProfile.png'); ?>" width="50" height="40"> 
				<?php } } ?>
			</span>
		</div>
			
			

	<form action="<?php echo site_url('feeCollectionModule/submitFeeHeadAmount'); ?>" id="feeHeadAddForm" method="post" >
	<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover text-left stuListTable">
				<thead>
					<tr>
					  <th class="center">Payment Head</th>
						<th>Description</th>
						<th> Amount </th>
						<th >Discount </th>
						<th> Pay Amount </th>
						<th> Action </th>
						
					</tr>
				</thead>

				<tbody>
				
					 <tr>
						  <td class="center">
							<select class="form-control paymentHead" name="feePaymentHeadID" id="feePaymentHeadID" required>
									  <option value="">Select Payment Head</option>
									  <?php foreach($applicablePaymentHeaderList as $k=>$v) {
									  	if($v->mode_due_amount >0) {
									   ?>
										<option value="<?php echo $v->id; ?>" ><?php echo $v->applicable_mode_name; ?></option>																										<?php } } ?>
							</select>
						 </td>
						<td><input type="text" class="form-control" name="pay_head_details" id="pay_head_details"/></td>
						<td ><input type="text" class="form-control" name="mode_due_amount" id="mode_due_amount"/></td>
						<td><input type="text" class="form-control" name="pay_mode_discount_amount" id="pay_mode_discount_amount"/></td>
						<td >
							<input type="text" class="form-control" name="mode_pay_amount" id="mode_pay_amount" required/>
							<input type="hidden" class="form-control" name="orginal_mode_due_amount" id="orginal_mode_due_amount" required/>
						</td>
						<td >
							<button class="btn btn-xs btn-danger pull-right" type="submit">
								<i class="ace-icon fa fa-bolt bigger-110"></i>
								<span class="">Add</span>
								<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
							</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</form>	
	
	<div class="paidListView" style="">
	
	</div>
	</div>
<?php } else { ?>
<div class="alert alert-danger col-md-10 col-md-offset-1">
	<strong>Sorry!</strong> System Could Not Find Anything. Please Check Information and Try Again!
</div>
<?php } ?>
	
<script>
	
$(".paymentHead").on('change', function() {
	var feePaymentHeadID = $('#feePaymentHeadID').val();
	var formURL = "<?php echo site_url('feeCollectionModule/loadFeeHeadAmount'); ?>";
	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : {feePaymentHeadID : feePaymentHeadID},
		success:function(data){
			$("#mode_due_amount").val(data);
			$("#mode_pay_amount").val(data);
			$("#orginal_mode_due_amount").val(data);
			$("#pay_mode_discount_amount").val("");
			$("#mode_due_amount").attr('readonly', 'readonly');
		}
	});
});

$('#pay_mode_discount_amount, #mode_due_amount').on('keyup', function() {
	var orginal_mode_due_amount	= $('#orginal_mode_due_amount').val();
	var pay_mode_discount_amount = $('#pay_mode_discount_amount').val();
	
	
	var mode_pay_amount = (orginal_mode_due_amount - pay_mode_discount_amount)
	
	$('#mode_pay_amount').val(mode_pay_amount);
});


$("#feeHeadAddForm").submit(function(e)
{
	var postData = $(this).serializeArray();
	var formURL = $(this).attr("action");
	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : postData,
		success:function(data){
			$(".paidListView").html(data);
			$('#feeHeadAddForm input[type="text"]').val("");
			$("#feeHeadAddForm option:selected").prop("selected", false)				
		}
	});
	
	e.preventDefault();
});

</script>	