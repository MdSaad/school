  <?php if(!empty($stuInfo)){ ?>
	 <div class="col-md-6 img-thumbnail" style="height:460px">
	   
		<h4 style="padding-bottom:20px;"> <span class="label label-success arrowed-in arrowed-in-right">Student Current Information</span>  </h4>
		 
		   <div class="col-md-4">
				<span class="profile-picture">
				    <?php  
					     if(!empty($stuInfo->stu_photo)){ ?>
							<img class="editable img-responsive editable-click editable-empty" src="<?php echo base_url("resource/stu_photo/$stuInfo->stu_photo"); ?>" width="120" height="120"> 
					<?php }else{  if($stuInfo->stu_sex == 'M'){ ?>
							 <img class="editable img-responsive editable-click editable-empty" src="<?php echo base_url('resource/img/male.png'); ?>" width="120" height="120"> 
						 <?php }else{ ?>
						   <img class="editable img-responsive editable-click editable-empty" src="<?php echo base_url('resource/img/EmptyProfile.png'); ?>" width="120" height="120"> 
					<?php } } ?>
				</span>
		   </div>
           <div class="col-md-8 text-left">
		        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table" style="font-size:14px;">
				  <tr>
					<td width="33%"><strong>Name</strong></td>
					<td width="2%" align="center" valign="middle"><strong>:</strong></td>
					<td width="65%"><?php echo $stuInfo->stu_full_name ?></td>
				  </tr>
				  <tr>
					<td><strong>ID</strong></td>
					<td align="center" valign="middle"><strong>:</strong></td>
					<td><?php echo $stuInfo->stu_id ?></td>
				  </tr>
				  <tr>
				    <td><strong>Roll</strong></td>
				    <td align="center" valign="middle"><strong>:</strong></td>
				    <td><?php echo $stuInfo->class_roll ?></td>
			      </tr>
				  <tr>
					<td><strong>Branch</strong></td>
					<td align="center" valign="middle"><strong>:</strong></td>
					<td><?php echo $stuInfo->branch_name ?></td>
				  </tr>
				  <tr>
					<td><strong>Class</strong></td>
					<td align="center" valign="middle"><strong>:</strong></td>
					<td><?php echo $stuInfo->class_name ?></td>
				  </tr>
				  <tr>
					<td><strong>Shift</strong></td>
					<td align="center" valign="middle"><strong>:</strong></td>
					<td><?php echo $stuInfo->shift_name ?></td>
				  </tr>
				  <tr>
					<td><strong>Section</strong></td>
					<td align="center" valign="middle">:</td>
					<td><?php echo $stuInfo->section_name ?></td>
				  </tr>
				</table>

		   </div>
												

												
											
	 </div>
	 
	 <div class="col-md-6 img-thumbnail">
	     <h4 style="padding-bottom:20px;"> <span class="label label-success arrowed-in arrowed-in-right">Student Transfer Information</span>  </h4>
	    <form id="transferForm"  role="form" action="<?php echo site_url('studentPromotionManage/stuTransferActionStore'); ?>" enctype="multipart/form-data" method="post">	
		 <input type="hidden" name="stu_sex" id="stu_sex" value="<?php echo $stuInfo->stu_sex ?>" /> 
		 <input type="hidden" name="stu_id" id="stu_id" value="<?php echo $stuInfo->stu_id ?>" /> 
		 <div class="form-group">
			  <label class="control-label col-sm-5 " for="email">Campus/Branch :</label>
			  <div class="col-sm-7">
					<select class="form-control" name="branch_id" id="branch_id">
						  <option value="">Select Campus</option>
						  <?php foreach($branchListInfo as $k=>$v) { ?>
							<option value="<?php echo $v->id; ?>" ><?php echo $v->branch_name; ?></option>
						  <?php } ?>
					</select>	
					<span class="branchEmptyAlrt label label-sm label-danger form-control emptyAlrt"></span>																   		
			 </div>
		 </div>
		 
		 
		 <div class="form-group">
			  <label class="control-label col-sm-5 " for="email">Class :</label>
			  <div class="col-sm-7">
					<select class="form-control" name="class_id" id="class_id">
							  <option value="">Select Class </option>
							  <?php foreach($classListInfo as $k=>$v) { ?>
								<option value="<?php echo $v->id; ?>" ><?php echo $v->class_name; ?></option>																										
							<?php } ?>
					</select>
					<span class="classEmptyAlrt label label-sm label-danger form-control emptyAlrt"></span>																	   		
			 </div>
		 </div>
																					
		<div class="form-group">
			  <label class="control-label col-sm-5" for="email">Group :</label>
			  <div class="col-sm-7">
					<select class="form-control" name="group_id" id="group_id">
					  <option value="">Select Group </option>
					    <?php foreach($groupListInfo as $k=>$v) { ?>
						<option value="<?php echo $v->id; ?>" ><?php echo $v->group_name; ?></option>																										
						<?php } ?>
					</select>	
					<span class="groupEmptyAlrt label label-sm label-danger form-control emptyAlrt"></span>																   		
			 </div>
		 </div>
		 
		 
		 
		 <div class="form-group">
		  <label class="control-label col-sm-5 " for="email">Section :</label>
		  <div class="col-sm-7">
				<select class="form-control" name="section_id" id="section_id">
					  <option value="">Select Section </option>
					  <?php foreach($sectionListInfo as $k=>$v) { ?>
						<option value="<?php echo $v->id; ?>" ><?php echo $v->section_name; ?></option>																										
					<?php } ?>
				</select>	
			  <span class="sectionEmptyAlrt label label-sm label-danger form-control emptyAlrt"></span>				   		
			</div>
	    </div>
																					
		 <div class="form-group">
			  <label class="control-label col-sm-5 " for="email">Shift :</label>
			  <div class="col-sm-7">
					<select class="form-control" name="shift_id" id="shift_id">
					  <option value="">Select Shift </option>
					  <?php foreach($shiftListInfo as $k=>$v) { ?>
						<option value="<?php echo $v->id; ?>" ><?php echo $v->shift_name; ?></option>																										
					 <?php } ?>
					</select>	
					<span class="shiftEmptyAlrt label label-sm label-danger form-control emptyAlrt"></span>	
				</div>
		</div>

		 
		 <div class="form-group">
			  <label class="control-label col-sm-5" for="year">Year :</label>
			  <div class="col-sm-7">
					<select class="form-control" name="year" id="year" required>
						 <option value="">Select Year </option>
						  <?php for ($year = date('Y'); $year > date('Y')-5; $year--) { ?>
							<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
						  <?php } ?>
					</select>	
					<span class="yearEmptyAlrt label label-sm label-danger form-control emptyAlrt"></span>	
				</div>
		</div>
		
		<div class="form-group">
			  <label class="control-label col-sm-5" for="class_roll">Class Roll :</label>
			  <div class="col-sm-7">
					<input type="hidden" required="required" class="form-control" name="class_roll" id="class_roll" placeholder="Enter Class Roll*" value="" readonly="readonly"/><a href="#" class="label label-sm label-success  GenerateClassRoll form-control emptyAlrt">Click Here to Generate Class Roll</a>
					<span class="classRollEmptyAlrt label label-sm label-danger form-control emptyAlrt"></span>
				</div>
		</div>
		
		
		
		<div class="form-group">
			  <label class="control-label col-sm-7"></label>
			  <div class="col-sm-5">
					<button class="btn btn-sm btn-primary find" type="submit">
						<i class="ace-icon fa fa-check"></i>
						<span class="update">Transfer Student</span>
					</button>
				</div>
		</div>
	 
	 </form>
		
		
			
</div>

<?php }else{ ?>
   <span style="color:#FF0000"> Invalid Student Id</span>
<?php } ?>

<script>

   $(".GenerateClassRoll").on('click', function()
	{
		
		var stu_id 			     = $('#stu_id').val();
		var branc_id 			 = $('#branch_id').val();
		var class_id 			 = $('#class_id').val();
		var class_group_id  	 = $('#group_id').val();
		var class_section_id	 = $('#section_id').val();
		var class_shift_id	     = $('#shift_id').val();
		var year	     		 = $('#year').val();
		
		
		
		if(branc_id == '') {
			$('.branchEmptyAlrt').text('Please Select Branch');
		} else {
			$('.branchEmptyAlrt').text('');
		}
		
		if(class_id == '') {
			$('.classEmptyAlrt').text('Please Select Class');
		} else {
			$('.classEmptyAlrt').text('');
		}
		
		if(class_group_id == '') {
			$('.groupEmptyAlrt').text('Please Select Group');
		} else {
			$('.groupEmptyAlrt').text('');
		}
		
		if(class_section_id == '') {
			$('.sectionEmptyAlrt').text('Please Select Section');
		} else {
			$('.sectionEmptyAlrt').text('');
		}
		
		if(class_shift_id == '') {
			$('.shiftEmptyAlrt').text('Please Select Shift');
		} else {
			$('.shiftEmptyAlrt').text('');
		}
		
		
		if(year == '') {
			$('.yearEmptyAlrt').text('Please Select Year');
		} else {
			$('.yearEmptyAlrt').text('');
		}
		
		
		
		var formURL = '<?php echo site_url('studentPromotionManage/generateTransferClassRoll'); ?>';
		if(branc_id != '' && class_id != '' && class_section_id != '' && class_shift_id != '' && class_group_id != '' && stu_sex != '' && year !='') {
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : {stu_id : stu_id, branc_id : branc_id, class_id : class_id, class_group_id : class_group_id, class_section_id : class_section_id, class_shift_id : class_shift_id, year : year},
			dataType: "json",
			success:function(data){
			  if(data){
			      if(data.expectedRoll){
					$('.GenerateClassRoll').css('display', 'none');
					$('#class_roll').attr('type', 'text');
					$('#class_roll').val(data.expectedRoll);
					$('.classRollEmptyAlrt').text('');
				  }else{
				    alert(data.errorValue);
				  }
			  }
			}
		});
		}
	});
	
	
	$("#transferForm").submit(function(e)
	{
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		var class_roll = $('#class_roll').val();
		if(class_roll == "") {
			$('.classRollEmptyAlrt').text("Please Generate Class Roll");
		} else {
			$('.classRollEmptyAlrt').text("");
		}
		
		
		if(class_roll != "") {
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
			    $("#stuCurrentID").val('');
				$('.studentTransferDataView').html('');
				$('.afterSubmitContent').css('display', 'block');
			}
		  });
		}
		e.preventDefault();
	});


</script>
																			
																			
																		 	
																				
															