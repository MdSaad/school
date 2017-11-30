
										<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
											
											<div class="clearfix">
												<div class="pull-right tableTools-container"></div>
											</div>
											<div class="table-header text-left">
												<form  role="form" action="<?php echo site_url('allReport/diaryReportAction'); ?>" id="diaryReportForm">

												<div class="row">

												<div class="col-md-3" style="padding-top: 5px;">
													<div class="form-group">
														<label class="control-label col-sm-5 " for="email">Branch</label>
														<div class="col-sm-7 paddingZero">
														    <select class="form-control" name="branch_id" id="branch_id" required>
															<option value="">Select Campus*</option>
															<?php foreach($branchListInfo as $k=>$v) { ?>
															<option <?php if($v->id == $branch_id){ ?> selected="selected" <?php } ?> value="<?php echo $v->id; ?>" >
															   <?php echo $v->branch_name; ?>
															  </option>											<?php } ?>
															 </select>																	   		
														 </div>
													 </div>
												</div>
												<div class="col-md-3" style="padding-top: 5px;">
													<div class="form-group">
													  <label class="control-label col-sm-5 " for="email">Class</label>
													  <div class="col-sm-7 paddingZero">
														<select class="form-control" name="class_id" id="class_id" required>
														  <option value="">Select Class* </option>
														    <?php foreach($classListInfo as $k=>$v) { ?>
															<option <?php if($v->id == $class_id){ ?> selected="selected" <?php } ?> value="<?php echo $v->id; ?>" >
															    <?php echo $v->class_name; ?>
															  </option>											<?php } ?>
															</select>																	   		
													 </div>
												 </div>
												</div>
												<div class="col-md-3" style="padding-top: 5px;">
													<div class="form-group">
													  <label class="control-label col-sm-5 " for="email">Group </label>
												  	<div class="col-sm-7 paddingZero">
														<select class="form-control" name="group_id" 
														  id="group_id" required="required">
														 <option value="" selected="selected" >
														    Select Group* </option>
														   <?php foreach($groupListInfo as $k=>$v) { ?>
															<option <?php if($v->id == $group_id){ ?> selected="selected" <?php } ?> value="<?php echo $v->id; ?>" ><?php echo $v->group_name; ?></option>
															<?php } ?>
													
														</select>
													  </div>
													</div>
												</div>
												<div class="col-md-3" style="padding-top: 5px;">
													<div class="form-group">
													  <label class="control-label col-sm-5 " for="email">Section</label>
													  <div class="col-sm-7 paddingZero">
														<select class="form-control" name="section_id" id="section_id" required>
														  <option value="">Select Section*</option>
														    <?php foreach($sectionListInfo as $k=>$v) { ?>
															<option <?php if($v->id == $section_id){ ?> selected="selected" <?php } ?> value="<?php echo $v->id; ?>" ><?php echo $v->section_name; ?></option><?php } ?>
														</select>																	   		
													 </div>
												 </div>
												</div>
												</div>


                                               <div class="row">
												<div class="col-md-3">
													<div class="form-group">
													  <label class="control-label col-sm-5 " for="email">Shift </label>
													  <div class="col-sm-7 paddingZero">
															<select class="form-control" name="shift_id" id="shift_id" required="required">
															   <option value="" selected="selected" >Select Shift* </option>
																<?php foreach($shiftListInfo as $k=>$v) { ?>
																<option <?php if($v->id == $shift_id){ ?> selected="selected" <?php } ?>  value="<?php echo $v->id; ?>" ><?php echo $v->shift_name; ?></option>
																<?php } ?>
														
															</select>
														</div>
												</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														  <label class="control-label col-sm-5 " for="email">From Date </label>
														  <div class="col-sm-7 paddingZero">
																 <input type="text" name="fromDate" id="fromDate" class="form-control date-picker"  placeholder="From" value="<?php echo $fromDate ?>">
															</div>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														  <label class="control-label col-sm-5 " for="email">To Date </label>
														  <div class="col-sm-7 paddingZero">
																 <input type="text" name="toDate" id="toDate" class="form-control date-picker"  placeholder="To" value="<?php echo $toDate ?>">
															</div>
													</div>
												</div>

												<div class="col-md-3">
												  <div class="form-group">
												 
													<button class="btn btn-danger form-control" type="submit">Find/Show</button>
														  
												 </div>
												</div>


												</div>
													
										     </form>
										</div>

										<div style="padding-top:10px">

										  <?php 
										    if(!empty($diaryListData)){
                                             foreach ($diaryListData as $v) {
										    
                                            
										  ?>
										   <div class="col-md-12 text-center" style="padding-bottom: 5px">
										   <strong>Diary date -</strong><?php echo $v->date ?>  <strong>&nbsp;&nbsp; Class :</strong> <?php echo $classNameInfo->class_name ?>
										   </div>
										   <table id="inputTable" class="table table-bordered table-hover">
												<thead>
													<tr>
														<th width="30%"  style="padding-left: 20px;">Subject  Name</th>														
														<th width="40%"  class="hidden-480">Diary Content </th>
														<th width="30%"  style="padding-right: 20px;">Remarks</th>
													</tr>
												</thead>

												<tbody>
												<?php 
				                                     foreach ($v->allSubDiary as $v2) {
												 ?>
													<tr>
														<td align="left" valign="middle" style="padding-left: 20px;">
															<?php echo $v2->subject_name; ?></td>														
														<td align="left" valign="middle" class="hidden-480"><?php echo $v2->diary_content; ?></td>
														<td align="left" valign="middle" style="padding-right: 20px;">
														  <?php echo $v2->remarks; ?>														</td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
											

										<?php } }else{?>
										   <span style="color: #FF0000">Result not found !</span>
										<?php } ?>
										</div>
												
												
	
											<!-- div.table-responsive -->
	
											<!-- div.dataTables_borderWrap -->
											
										</div>
								

<script type="text/javascript" >
$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd',
})


$("#diaryReportForm").submit(function(e)
	{
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$('.loadingPart').css('display', 'block');
		$('.reportResultListView').css('display', 'none');
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
				$(".reportResultListView").html(data);	
				$('.loadingPart').css('display', 'none');
				$('.reportResultListView').css('display', 'block');			
			}
		});
		
		e.preventDefault();
	});



</script>