<form action="<?php echo site_url('resultSubModule/subwiseExamMarkStore'); ?>" method="post" id="subwiseExamMarkStore">
	<input name="branch_id" id="branch_id" type="hidden" value="<?php echo $branch_id; ?>" >
	<input name="class_id" id="class_id" type="hidden" value="<?php echo $class_id; ?>" >
	<input name="group_id" id="branch_id" type="hidden" value="<?php echo $group_id; ?>" >
	<input name="year" id="year" type="hidden" value="<?php echo $year; ?>" >
	<input name="exam_type_id" id="exam_type_id" type="hidden" value="<?php echo $exam_type_id; ?>" >
	<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
																	
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		 
			
	
		<!-- div.table-responsive -->
	
		<div class="table-header text-left">
			Subject List :
		</div>
			
		<!-- div.dataTables_borderWrap -->
		<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover text-left stuListTable">
				<thead>
					<tr>
						<th class="center">
						
						  <?php if($class_id == '6' || $class_id == '7' || $class_id == '8' || $class_id == '9' || $class_id == '10' || $class_id == '11' || $class_id == '12'){ ?>
						  
						   <?php 
							    foreach($subjectList as $v) { 
								 
						       ?>
							    
									<div class="img-thumbnail col-md-6">
									   <div class="form-group">
											 <label class="control-label col-sm-8 pull-right" for="email"><u><?php echo $v->subject_name; ?></u></label>
										 </div>
										 <br />
										<div class="form-group" style="padding-bottom:6px">
											  <label class="control-label col-sm-5 " for="email">MCQ :</label>
											  <div class="col-sm-5">
											  <input name="subject_id[]" id="subject_id[]" value="<?php echo $v->id; ?>" type="hidden">
													<input name="mcq_marks[]" id="mcq_marks[]" value="<?php if(!empty($v->subjectMarks->mcq_marks)) echo $v->subjectMarks->mcq_marks ?>" type="number" placeholder="Mcq Mark's">															   		
											 </div>
											 <div class="col-sm-2"></div>
										 </div>
										 <br />
										 
										 <div class="form-group" style="padding-bottom:6px">
											  <label class="control-label col-sm-5 " for="email">Creative :</label>
											  <div class="col-sm-5">
													<input name="creative_marks[]" id="creative_marks[]" value="<?php if(!empty($v->subjectMarks->creative_marks)) echo $v->subjectMarks->creative_marks ?>" type="number" placeholder="Creative Mark's">															   		
											 </div>
											  <div class="col-sm-2"></div>
										 </div>
										 
										  <br />
										 
										 <div class="form-group">
											  <label class="control-label col-sm-5 " for="email">Practicle :</label>
											  <div class="col-sm-5">
													<input name="practicle_marks[]" id="practicle_marks[]" value="<?php if(!empty($v->subjectMarks->practicle_marks)) echo $v->subjectMarks->practicle_marks ?>" type="number" placeholder="Practicle Mark's">															   		
											 </div>
											  <div class="col-sm-2"></div>
										 </div>
								</div>
								
								
						
							
							 <?php } }else{ ?>
							 
							 <?php 
							    foreach($subjectList as $v) { 
								 
						     ?>
							 
							        <div class="img-thumbnail col-md-6">
										<div class="col-md-5 text-right">
											<?php echo $v->subject_name; ?>
											
										</div>
										<div class="col-md-1 pull-left">
											<input name="subject_id[]" id="subject_id[]" value="<?php echo $v->id; ?>" type="hidden">
											<input name="total_marks[]" id="total_marks[]" value="<?php if(!empty($v->subjectMarks->total_marks)) echo $v->subjectMarks->total_marks ?>" type="number" placeholder="Mark's">
										</div>
									</div>
							 
							 
							<?php } } ?>
						</th>
					</tr>
					
					
					<tr>
						<th class="center">
							<div class=" displayNoneBB">
									
								<button class="btn btn-sm btn-primary  pull-right" type="submit">
									<i class="ace-icon fa fa-check"></i>
									Submit
								</button>									  	
								<button class="btn btn-sm btn-danger formCancel pull-right" type="button" style="margin-right: 10px;">
									<i class="ace-icon fa fa-times"></i>
									Cancel
								</button>
								
							</div>
						</th>
					</tr>
				</thead>
			</table>
	
			  
		</div>
	</div>
</form>


<div class="alert alert-block alert-success afterSubmitContent" id="">
		<button class="close" data-dismiss="alert" type="button">
		<i class="ace-icon fa fa-times"></i>
		</button>
		<strong class="green">
		<i class="ace-icon fa fa-check-square-o"></i>
		
		</strong>
		<span class="alrtText">Exam Mark Submitted Successfully. Try Again Click "Again Find Subject"</span>
	</div>
<script>
$("#subwiseExamMarkStore").submit(function(e)
{
	var postData = $(this).serializeArray();
	var formURL = $(this).attr("action");
	$.ajax(
	{
		url : formURL,
		type: "POST",
		data : postData,
		success:function(data){
			$('.afterSubmitContent').css('display', 'block');
			$('#subwiseExamMarkStore').css('display', 'none');
		}
	});
	
	e.preventDefault();
});
</script>