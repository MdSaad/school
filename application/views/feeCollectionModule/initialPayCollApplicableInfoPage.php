<?php if(!empty($initialStuList)) { 
$chkClassWissApp	= $this->M_crud->findById('class_wise_fee_head_applicable', array('fee_branch_id' =>$fee_branch_id, 'fee_class_id' => $fee_class_id, 'fee_group_id' => $fee_group_id, 'fee_year' => $fee_year));
if(!empty($chkClassWissApp)) {
?>
<div class="col-md-12 img-thumbnail boxShadow_1 text-left">
	<?php
		$catList	= $this->M_crud->findAll('fee_head_cat_list_manage', array('status' => "Active"), 'id', 'asc');
	?>
	<?php 
	$slNo	= 1;
	foreach($initialStuList as $stu) {
	$chkStuWiseApp	=  $this->M_crud->findAll('stu_fee_collection_applicable_mode_list', array('fee_branch_id' =>$fee_branch_id, 'fee_class_id' => $fee_class_id, 'fee_group_id' => $fee_group_id,  'fee_section_id' => $fee_section_id,  'fee_shift_id' => $fee_shift_id, 'fee_year' => $fee_year, 'fee_coll_app_stu_auto_id' => $stu->stu_auto_id), 'id', 'desc');
	
		$mode_total_amount = 0;
		foreach($chkStuWiseApp as $vv) {
			$mode_total_amount	= $vv->mode_total_amount+$mode_total_amount;
			$submit_status	= $vv->submit_status;
		}
		if(empty($chkStuWiseApp)) {
	?>
	<form action="<?php echo site_url('feeCollectionModule/stuFeeCollectionModeApply'); ?>" method="post" class="submitStuFeeCollectionFeeMode col-md-12 thumbnail" dataForm = "<?php echo $stu->stu_id; ?>">
	<h4><u>Add New Paymnet Collection Mode :</u></h4>
	<input type="hidden"  name="class_wise_auto_id" id="class_wise_auto_id" value="<?php  echo $stu->class_wise_auto_id;  ?>">
	<input type="hidden"  name="currStuID" id="currStuID" value="<?php echo $stu->stu_id; ?>">
	<input type="hidden"  name="editMode" id="editMode" value="No">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-responsive table-bordered">
		  <tr>
			<th>SL No : <?php echo $slNo++; ?></th>
			<th>Student ID : <?php echo $stu->stu_id; ?></th>
			<th>Class Roll : <?php echo $stu->class_roll; ?></th>
			<th>Name : <?php echo $stu->stu_full_name; ?></th>
		  </tr>
		</table>
	<?php
	foreach($catList as $v) { 
		  $headList	= $this->M_crud->findAll('fee_head_list_manage', array('cat_id' =>$v->id, 'status' => "Active"), 'id', 'asc');
		  if($headList) {
	?>
	<div class="col-md-12 ">
		<h4><?php echo $v->cat_name; ?></h4>
		<?php foreach($headList as $head) { 
			$appHeadAmnt	= $this->M_crud->findById('class_wise_fee_head_applicable', array('fee_branch_id' =>$fee_branch_id, 'fee_class_id' => $fee_class_id, 'fee_group_id' => $fee_group_id, 'fee_year' => $fee_year, 'fee_head_id' => $head->id));
		
		?>
		<div class="col-md-6">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
			  <tr>
				<td width="10%"><label class="pos-rel"><input name="fee_head_list[]" type="checkbox" <?php if(!empty($appHeadAmnt)) { ?>checked="checked" value="<?php echo $appHeadAmnt->amount.'_'.$head->id; ?>" <?php } else  { ?>  disabled="disabled" <?php } ?>  class="ace" id="head_<?php echo $head->id.'_'.$stu->stu_auto_id; ?>" /><span class="lbl"></span></label> </td>
				<td width="" ><label for="head_<?php echo $head->id.'_'.$stu->stu_auto_id; ?>"><?php echo $head->head_name; ?></label></td>
				<td width="30%"><input type="number" name="feeAmnt" id="feeAmnt" class="form-control feeAmnt" head-id = "<?php echo $head->id; ?>" value="<?php if(!empty($appHeadAmnt)) { echo $appHeadAmnt->amount; } ?>" /></td>
			  </tr>
			</table>
	    </div>
		<?php } ?>
	</div>	
	<?php } }  ?>
	
	<div class="modal-footer displayNone col-md-12">
				<button class="btn btn-sm btn-danger formCancel" type="button">
					<i class="ace-icon fa fa-times"></i>
					Cancel
				</button>
				<button class="btn btn-sm btn-primary applicableCollectionMode"  type="submit">
					<i class="ace-icon fa fa-check"></i>
					<span class="apply">Apply</span>
				</button>
			</div>
	</form>
		<?php } else { ?>
				<div  class="submitStuFeeCollectionFeeMode" dataForm = "<?php echo $stu->stu_id; ?>">
					<div class="col-md-12 img-thumbnail boxShadow_1 text-left ">
						<table width="100%" border="1" cellspacing="0" cellpadding="0" class="table-responsive table-strip table-condensed table-bordered bg-primary stuListTable">
				  <tr>
					<th width="8%">SL NO</th>
					<th width="16%">Student ID</th>
					<th width="22%">Name</th>
					<th width="8%">Roll</th>
					<th width="13%">Status</th>
					<th width="20%">Total Amount</th>
					<th width="13%" class="">Action</th>
				  </tr>
				  <tr>
					<td><?php echo $slNo++; ?> </td>
					<td><?php echo $stu->stu_id; ?></td>
					<td><?php echo $stu->stu_full_name; ?></td>
					<td><?php echo $stu->class_roll; ?></td>
					<td><?php echo $submit_status; ?></td>
					<th><span ><?php echo $mode_total_amount; ?></span>(TK)</th>
					<td class="">
						<button class="btn btn-xs btn-warning green stuInfoLoad pointerCls" stuid="<?php echo $stu->stu_auto_id; ?>" data-placement="bottom" title="Edit" data-rel="tooltip">
							<i class="">Edit/View</i>
						</button>
						
						<button class="btn btn-xs btn-default stuInfoHide pointerCls" style="display:none">
							<i class="">Hide</i>
						</button>
					</td>
				  </tr>
				</table>
				
					</div>
				</div>
	
		<?php } ?>
	<?php }  ?>																		 
																				  
</div>
<?php } else { ?>
<div class="col-md-12">
<div class="alert alert-alert bg-danger row">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Sorry!</strong> Class Wise Collection Not Applicable For this Class.
 </div>
</div>
<?php } } else { ?>	
<div class="col-md-12">
<div class="alert alert-alert bg-warning row">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Sorry!</strong> There has no student.
 </div>
</div>
<?php } ?>																		
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
	$(this).parents('.submitStuFeeCollectionFeeMode').fadeOut("slow");
});



$('.stuInfoLoad').on('click', function(){
	var stuID = $(this).attr('stuid');
	var fee_branch_id = '<?php echo $fee_branch_id; ?>';
	var fee_class_id = '<?php echo $fee_class_id; ?>';
	var fee_group_id = '<?php echo $fee_group_id; ?>';
	var fee_section_id = '<?php echo $fee_section_id; ?>';
	var fee_shift_id = '<?php echo $fee_shift_id; ?>';
	var feeYear = '<?php echo $fee_year; ?>';
	var formURL = "<?php echo site_url('feeCollectionModule/stuFeecollApplEdit'); ?>";
	var parent = $(this).parents('tr');
	$('.stuInfoHide').css('display','none');
	$('.stuInfoLoad').css('display','block');
	//$('.curOrderDtls').html('');
	$(this).css('display','none');
	$(this).parents('tr').find('.stuInfoHide').css('display' , 'block');
	$('.stuListTable').removeClass('bg-danger');
	$('.stuListTable').addClass('bg-primary');
	$(this).parents('table').addClass('bg-danger');
	$(this).parents('table').removeClass('bg-primary');
	
	$.ajax(
		{
			url : formURL,
			type: "POST",
			data : {stuID: stuID, fee_branch_id:fee_branch_id, fee_class_id:fee_class_id, fee_group_id:fee_group_id, fee_section_id:fee_section_id, fee_shift_id:fee_shift_id, feeYear:feeYear},
			//dataType: "json",
			success:function(data){
				$('.stuListTable .details').remove();
				$('<tr class="details"><td colspan="8">'+data+'</td></tr>').insertAfter(parent);
				
				 
				//$('.orderDetalsLoad').removeClass('orderDetalsLoad');					
			}
		});
	});	
	
$('.stuInfoHide').on('click', function() {
	$('.stuListTable .details').remove();
	$('.stuInfoLoad').css('display','block');
	$('.stuInfoHide').css('display','none');
});

</script>																			