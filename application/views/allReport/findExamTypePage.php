<form action="<?php echo site_url('allReport/findExamReportResult'); ?>" method="post" target="_blank">
	<input name="branch_id" id="branch_id" type="hidden" value="<?php echo $branch_id; ?>" >
	<input name="class_id" id="class_id" type="hidden" value="<?php echo $class_id; ?>" >
	<input name="group_id" id="branch_id" type="hidden" value="<?php echo $group_id; ?>" >
	<input name="section_id" id="section_id" type="hidden" value="<?php echo $section_id; ?>" >
	<input name="year" id="year" type="hidden" value="<?php echo $year; ?>" >
	<input name="shift_id" id="shift_id" type="hidden" value="<?php echo $shift_id; ?>" >
	<input name="subject_id" id="subject_id" type="hidden" value="<?php echo $subject_id; ?>" >
	 <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
																
																<div class="clearfix">
																	<div class="pull-right tableTools-container"></div>
																</div>
																<div class="table-header text-left">
																	Select Exam Type : 
																	</div>
																	
																<!-- div.table-responsive -->
						
																<!-- div.dataTables_borderWrap -->
																<?php if(isset($examTypeList)) { ?>
																<div>
																	<table id="dynamic-table" class="table table-striped table-bordered table-hover text-left stuListTable">
																		
																		<tbody>
																		
																		<?php
																			$i = 1;
																			$a = 0;
																			$b = 4;
																			 foreach($examTypeList as $v) { 
																			
																				if($a == 0) echo "<tr>";
																				if($a <= $b)
																		?>
																			
																				<td class="hidden-480"><label class="pos-rel">
                                                                                    <input type="checkbox" class="ace" id="examTypeID[]" name="examTypeID[]" value="<?php echo $v->id; ?>" /><span class="lbl"></span></label><?php echo $v->exam_type_name; ?></td>
																			<?php 	$a++;	
																					if($a == $b) echo "</tr>";				
																					if($a == $b) $a=0; } ?>
																					
																			 <tr>
																			  <th class="" colspan="4">
																			  	<div class=" displayNoneBB">
																						<button class="btn btn-sm btn-primary  pull-right finalSubmit" type="submit">
																							<i class="ace-icon fa fa-check"></i>
																							Find Result.
																						</button>
																						
																					</div>
																				</th>
																			</tr>
																		 
																		 
																		</tbody>
																	</table>
																</div>
																<?php } ?>
															</div>
															
																
</form>														
															
<script type="text/javascript" >
$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy/mm/dd',
})


$('.stuInfoLoad').on('click', function(){
	var stuID = $(this).attr('stuID');
	var formURL = "<?php echo site_url('allReport/stuInfoLoad'); ?>";
	var parent = $(this).parents('tr');
	$('.stuInfoHide').css('display','none');
	$('.stuInfoLoad').css('display','block');
	//$('.curOrderDtls').html('');
	$(this).css('display','none');
	$(this).parents('tr').find('.stuInfoHide').css('display' , 'block');
	
	$.ajax(
		{
			url : formURL,
			type: "POST",
			data : {stuID: stuID},
			//dataType: "json",
			success:function(data){
				$('.stuListTable .details').remove();
				$('<tr class="details"><td colspan="7">'+data+'</td></tr>').insertAfter(parent);
				
				 
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