<div class="col-md-12 img-thumbnail boxShadow_1 text-left">
	<?php
		$catList	= $this->M_crud->findAll('fee_head_cat_list_manage', array('status' => "Active"), 'id', 'asc');
		$stuInfo	= $this->M_join->findStuInfoByIDClassWise('class_wise_info', array("class_wise_info.stu_auto_id" => $stuID, "class_wise_info.year" => $fee_year));
	?>
	<form action="<?php echo site_url('feeCollectionModule/stuFeeCollectionModeApply'); ?>" method="post" class="submitStuFeeCollectionFeeMode" dataForm = "<?php echo $stuInfo->stu_id; ?>">
	<h4><u>Update Paymnet Collection Mode :</u></h4>
	<input type="hidden"  name="class_wise_auto_id" id="class_wise_auto_id" value="<?php  echo $stuInfo->class_wise_auto_id;  ?>">
	<input type="hidden"  name="currStuID" id="currStuID" value="<?php echo $stuInfo->stu_id; ?>">
	<input type="hidden"  name="editMode" id="editMode" value="Yes">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-responsive table-bordered">
		  <tr>
			<th>Student ID : <?php echo $stuInfo->stu_id; ?></th>
			<th>Class Roll : <?php echo $stuInfo->class_roll; ?></th>
			<th>Name : <?php echo $stuInfo->stu_full_name; ?></th>
		  </tr>
		</table>
	<?php
	foreach($catList as $v) { 
		  $headList	= $this->M_crud->findAll('fee_head_list_manage', array('cat_id' =>$v->id, 'status' => "Active"), 'id', 'asc');
		  if($headList) {
	?>
	<div class=" col-md-12">
		<h4><?php echo $v->cat_name; ?></h4>
		<?php foreach($headList as $head) { 
			$classWiseApp	= $this->M_crud->findById('class_wise_fee_head_applicable', array('fee_branch_id' =>$fee_branch_id, 'fee_class_id' => $fee_class_id, 'fee_group_id' => $fee_group_id, 'fee_year' => $fee_year, 'fee_head_id' => $head->id));
			
			$stuWiseApp		= $this->M_crud->findById('stu_fee_collection_applicable_mode_list', array('fee_coll_app_stu_auto_id' =>$stuInfo->stu_auto_id, 'fee_year' => $fee_year, 'fee_head_id' => $head->id));
		
		?>
		<div class="col-md-6">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
			  <tr>
				<td width="15%"><label class="pos-rel"><input name="fee_head_list[]" type="checkbox" <?php if(!empty($stuWiseApp)) { ?> checked="checked" value="<?php echo $stuWiseApp->mode_total_amount.'_'.$head->id; ?>" <?php } else if(!empty($classWiseApp)) { ?> value="<?php echo $classWiseApp->amount.'_'.$head->id; ?>" <?php } else { ?> disabled="disabled" <?php } ?>  class="ace" id="head_<?php echo $head->id; ?>" /><span class="lbl"></span></label> </td>
				<td width="" ><label for="head_<?php echo $head->id; ?>"><?php echo $head->head_name; ?><br /><?php if(!empty($stuWiseApp)) { ?><i style="font-size:10px" class="<?php if($stuWiseApp->mode_due_amount >0) echo 'text-danger'; else if($stuWiseApp->mode_due_amount == 0) echo 'text-success'; ?>">Paid-<?php echo number_format($stuWiseApp->mode_pay_amount,2); ?>/-, Disc - <?php echo number_format($stuWiseApp->discount_amount,2); ?>/-</i><?php } ?></label></td>
				<td width="40%"><input type="number" name="feeAmnt" id="feeAmnt" class="form-control feeAmnt" head-id = "<?php echo $head->id; ?>" value="<?php if(!empty($stuWiseApp)) { echo $stuWiseApp->mode_total_amount; } else if(!empty($classWiseApp)) { echo $classWiseApp->amount; } ?>" /></td>
			  </tr>
			</table>
	    </div>
		<?php } ?>
	</div>	
	<?php } }  ?>
	
	<div class="modal-footer col-md-12">
				<button class="btn btn-sm btn-danger formCancel" type="button">
					<i class="ace-icon fa fa-times"></i>
					Cancel
				</button>
				<button class="btn btn-sm btn-primary applicableCollectionMode"  type="submit">
					<i class="ace-icon fa fa-check"></i>
					<span class="apply">Apply to Update</span>
				</button>
			</div>
	</form>
																	 
																				  
</div>
<script>
$('.feeAmnt').on('keyup click', function() {
	var feeAmnt = $(this).val();
	var headId = $(this).attr('head-id');
	if(feeAmnt >0) {
		$(this).closest("tr").find('.ace').val(feeAmnt+'_'+headId);
	} else {
		$(this).closest("tr").find('.ace').val("0_"+headId);
	}
})



$(".applicableCollectionMode").on('click', function()
	{
		var postData = $(this).parents('.submitStuFeeCollectionFeeMode').serializeArray();
		var formURL = $(this).parents('.submitStuFeeCollectionFeeMode').attr("action");
		var formDesign = $(this).parents('.submitStuFeeCollectionFeeMode').val("dataForm");
		//console.log(formDesign);
		//console.log(postData);
		$(this).children(".apply").text("Please Wait..");
		$(this).attr('disabled', 'disabled');
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
				$(formDesign).html(data);
				$(this).children(".apply").text("Success.")
				
			}
		  });  
		  //$(this).parents('.submitStuFeeCollectionFeeMode').fadeOut("slow");
		  return false;
	});

$('.formCancel').on('click', function() {
	$('.submitStuEditFeeCollectionFeeMode').fadeOut('slow');
	$('.stuListTable .details').remove();
	$('.stuInfoLoad').css('display','block');
	$('.stuInfoHide').css('display','none');
});

</script>																			