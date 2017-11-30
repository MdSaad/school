<div class="col-md-12 img-thumbnail boxShadow_1 text-left">
<input  type="hidden" name="branch_id" id="branch_id" value="<?php echo $fee_branch_id; ?>" />
<input  type="hidden" name="class_id" id="class_id" value="<?php echo $fee_class_id; ?>" />
<input  type="hidden" name="group_id" id="group_id" value="<?php echo $fee_group_id; ?>" />
<input  type="hidden" name="year" id="year" value="<?php echo $fee_year; ?>" />
<?php
$existPayCollInfo	= $this->M_crud->findById('class_wise_fee_head_applicable', array('fee_branch_id' =>$fee_branch_id, 'fee_class_id' => $fee_class_id, 'fee_group_id' => $fee_group_id, 'fee_year' => $fee_year));
?>
	<h4><?php if(!empty($existPayCollInfo)) { ?><u>Update Payment Collection Mode :</u><input  type="hidden" name="update_status" id="update_status" value="yes" /><?php } else { ?><u>Add New Paymnet Collection Mode :</u><?php } ?></h4>
	
	<?php
		$catList	= $this->M_crud->findAll('fee_head_cat_list_manage', array('status' => "Active"), 'id', 'asc');
	?>
	<?php foreach($catList as $v) { 
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
				<td width="10%"><label class="pos-rel"><input name="fee_head_list[]" type="checkbox" <?php if(!empty($appHeadAmnt)) { ?>checked="checked" value="<?php echo $appHeadAmnt->amount.'_'.$head->id; ?>" <?php } ?>   class="ace" id="head_<?php echo $head->id; ?>" /><span class="lbl"></span></label> </td>
				<td width="" ><label for="head_<?php echo $head->id; ?>"><?php echo $head->head_name; ?></label></td>
				<td width="30%"><input type="number" name="feeAmnt" id="feeAmnt" class="form-control feeAmnt" head-id = "<?php echo $head->id; ?>" value="<?php if(!empty($appHeadAmnt)) { echo $appHeadAmnt->amount; } ?>" /></td>
			  </tr>
			</table>
	    </div>
		<?php } ?>
	</div>	
	<?php } } ?>																		 
																				  
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

</script>																			