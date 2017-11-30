
<?php if($totalMarksInfo) { ?>
<div  id="finalSubmit" class="afterSubmittedContent">
  <input name="submit_status" id="submit_status" type="hidden" value="Final" >
  <form action="<?php echo site_url('resultSubModule/sitToTenMarksInputStore'); ?>" method="post" id="normalSubmit">
	<input name="branch_id" id="branch_id" type="hidden" value="<?php echo $branch_id; ?>" >
	<input name="class_id" id="class_id" type="hidden" value="<?php echo $class_id; ?>" >
	<input name="group_id" id="branch_id" type="hidden" value="<?php echo $group_id; ?>" >
	<input name="section_id" id="section_id" type="hidden" value="<?php echo $section_id; ?>" >
	<input name="year" id="year" type="hidden" value="<?php echo $year; ?>" >
	<input name="exam_type_id" id="exam_type_id" type="hidden" value="<?php echo $exam_type_id; ?>" >
	<input name="shift_id" id="shift_id" type="hidden" value="<?php echo $shift_id; ?>" >
	<input name="subject_id" id="subject_id" type="hidden" value="<?php echo $subject_id; ?>" >
	
	<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
																	
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		 
			
	
		<!-- div.table-responsive -->
	
		<div class="table-header text-left">
			Student List : <?php echo $examInfo->exam_type_name; ?>
		</div>
			
		<!-- div.dataTables_borderWrap -->
		<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover text-left stuListTable">
				<thead>
					<tr>
					  <th align="left" valign="top" class="">SL No</th>
					  <th align="left" valign="top" class="">Student ID</th>
					  <th align="left" valign="top" class="">Student Name</th>
					  <th align="left" valign="top" class="">Class Roll</th>
					  <?php if(!empty($totalMarksInfo->mcq_marks)){ ?>
					  <th align="center" valign="top" class="center">
					    <u>MCQ</u><br />
				          <?php echo $totalMarksInfo->mcq_marks ?>
					  </th>
					 <?php } ?>
					 
					  <?php if(!empty($totalMarksInfo->creative_marks)){ ?> <th align="center" valign="top" class="center"><u>Creative</u></br> <?php echo $totalMarksInfo->creative_marks ?></th> <?php } ?>
					  <?php if(!empty($totalMarksInfo->practicle_marks)){ ?>
					  <th align="center" valign="top" class="center">
					     <u>Practicle</u></br> <?php echo $totalMarksInfo->practicle_marks ?>
					  </th>
					  <?php } ?>
				  </tr>
				 </thead> 
				  <?php
				  	$sn = 1;
				  	 foreach($stuList as $v) { 
					 
					 	if(!empty($v->obtainMark->submit_status)) {
							$existSubmit_status = $v->obtainMark->submit_status;
						} else { 
							$existSubmit_status = "Empty";
						}
					 
					 ?>
					<tr>
						<td align="left" valign="middle" class=""><?php echo $sn++; ?></td>
					    <td align="left" valign="middle" class=""><?php echo $v->stu_id; ?><input type="hidden" step="0.01" name="stu_auto_id[]" value="<?php echo $v->stu_auto_id; ?>" />
						<input type="hidden" step="0.01" name="updateId[]" value="<?php if(!empty($v->obtainMark->id)) { echo $v->obtainMark->id; } ?>" />						</td>
					    <td align="left" valign="middle" class=""><?php echo $v->stu_full_name; ?></td>
					    <td align="left" valign="middle" class=""><?php echo $v->class_roll; ?></td>
				      <?php if(!empty($totalMarksInfo->mcq_marks)){ ?>  <td align="center" valign="middle" class=""><input type="number" step="0.01" name="multi_choose_mark[]" value="<?php if(!empty($v->obtainMark->multi_choose_mark)) { echo $v->obtainMark->multi_choose_mark; } ?>" <?php if(!empty($v->obtainMark->submit_status) && ($v->obtainMark->submit_status== "Final" )) { ?> disabled="disabled"<?php } ?>  style="max-width:80px"/></td> <?php } ?>
					  <?php if(!empty($totalMarksInfo->creative_marks)){ ?> <td align="center" valign="middle" class=""><input type="number" step="0.01" name="written_marks[]" value="<?php if(!empty($v->obtainMark->written_marks)) { echo $v->obtainMark->written_marks; } ?>" <?php if(!empty($v->obtainMark->submit_status) && ($v->obtainMark->submit_status== "Final" )) { ?> disabled="disabled"<?php } ?>  style="max-width:80px"/></td> <?php } ?>
					  <?php if(!empty($totalMarksInfo->practicle_marks)){ ?>  <td align="center" valign="middle" class=""><input type="number" step="0.01" name="practicle_marks[]" value="<?php if(!empty($v->obtainMark->practicle_marks)) { echo $v->obtainMark->practicle_marks; } ?>" <?php if(!empty($v->obtainMark->submit_status) && ($v->obtainMark->submit_status== "Final" )) { ?> disabled="disabled"<?php } ?>  style="max-width:80px"/></td> <?php } ?>
					</tr>
					<?php } ?>
					<thead>
					<tr>
						<th colspan="7" class="center">
						<input name="existSubmit_status" id="existSubmit_status" type="hidden" value="<?php echo $existSubmit_status; ?>" >
						  <?php if($existSubmit_status== "Final" ) { ?>
						  		<div class="alert alert-block alert-danger" id="">
									<button class="close" data-dismiss="alert" type="button">
									<i class="ace-icon fa fa-times"></i>									</button>
									<strong class="danger">
									<i class="ace-icon fa fa-exclamation-triangle bigger-120"></i>
										Mark's Entry Finaly Submitted For This Properties. You Can Not Modify Anything(Mark's) For This Properties.									</strong>
									<span class="alrtText"></span>								</div>
							<?php } else { ?>
								<div class=" displayNoneBB">
								<!-- <button class="btn btn-sm btn-primary  pull-right finalSubmit" type="button">
									<i class="ace-icon fa fa-check"></i>
									Final.</button> -->
								<button class="btn btn-sm btn-success formCancel pull-right normalSubmit" type="button" style="margin-right: 10px;">
									<i class="ace-icon fa fa-check"></i>
									Submit</button>
									<div class="pull-right loadingPart"><img src="<?php echo base_url('resource/img/search-loading.gif'); ?>" class="img-responsive center-block" /></div>
							</div>
							<?php } ?>						</th>
				    </tr>
				</thead>
			</table>
	
			  
		</div>
	</div>
</form>
</div>
<?php }  else { ?>
<div class="alert alert-block alert-danger" id="">
		<button class="close" data-dismiss="alert" type="button">
		<i class="ace-icon fa fa-times"></i>
		</button>
		<strong class="danger">
		<i class="ace-icon fa fa-exclamation-triangle bigger-120"></i>
		
		</strong>
		<span class="alrtText">Sorry This Subject Not Available For Marks Input.Please Check Total Mark's Entry Yes or No.</span>
	</div>
<?php } ?>



<script>

		
$(".normalSubmit").on('click', function()
{
	var postData = $('#normalSubmit').serializeArray();
	var formURL = $('#normalSubmit').attr("action");
	$('#finalSubmit .loadingPart').css('display', 'block');
	$('#finalSubmit button[type="button"]').attr('disabled','disabled');

	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : postData,
		success:function(data){
			$('#finalSubmit button[type="button"]').removeAttr('disabled','disabled');
			$('#finalSubmit .loadingPart').css('display', 'none');
			$('.afterSubmittedContent').html(data);
		}
	});
	
});


$(".finalSubmit").on('click', function()
{
	var postData = $( "#finalSubmit input, select" ).serializeArray();
	var formURL = "<?php echo site_url('resultSubModule/marksInputStore'); ?>";
	$('.loadingPart').css('display', 'block');
	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : postData,
		success:function(data){
			$('.afterSubmittedContent').html(data);
		}
	});
	
});

</script>