
<?php if($stuDataList) { ?>
<div class="afterSubmittedContent">
  <input name="submit_status" id="submit_status" type="hidden" value="Final" >
  <form action="<?php echo site_url('studentPromotionManage/promotionDataStore'); ?>" method="post" id="addPomotion">
	<input name="branch_id" id="branch_id" type="hidden" value="<?php echo $branch_id; ?>" >
	<input name="class_id" id="class_id" type="hidden" value="<?php echo $class_id; ?>" >
	<input name="group_id" id="branch_id" type="hidden" value="<?php echo $group_id; ?>" >
	<input name="section_id" id="section_id" type="hidden" value="<?php echo $section_id; ?>" >
	<input name="shift_id" id="shift_id" type="hidden" value="<?php echo $shift_id; ?>" >
	<input name="year" id="year" type="hidden" value="<?php echo $year; ?>" >
	
	
	<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
																	
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		 
		<!-- div.table-responsive -->
	
		<div class="table-header text-left">
			Promotion Student List
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
					  <th align="center" valign="top" class="center">Promotion Roll</th>
				  </tr>
				 </thead> 
				  <?php
				  	$sn = 1;
				  	   foreach($stuDataList as $v) { 
					 ?>
					<tr>
						<td align="left" valign="middle" class=""><?php echo $sn++; ?></td>
					    <td align="left" valign="middle" class=""><?php echo $v->stu_id; ?>
						   <input type="checkbox" name="stu_auto_id[]" value="<?php echo $v->stu_auto_id ?>" style="display:none" <?php if(!empty($v->chkPromotionData)) echo 'checked'; ?>>
						   <input type="checkbox" name="stu_sex[]" value="<?php echo $v->stu_sex ?>" style="display:none" <?php if(!empty($v->chkPromotionData)) echo 'checked'; ?>>
						   <input type="hidden" name="getStuId[]"  style="width: 100px" value="<?php if(!empty($v->chkPromotionData)){ echo $v->stu_auto_id; }else{ echo '';}  ?>" >
						   <input type="hidden" name="getStuSex[]"  style="width: 100px" value="<?php if(!empty($v->chkPromotionData)){ echo $v->stu_sex; }else{ echo '';}  ?>" >
						   <input type="hidden"  name="promotion_chk[]" value="<?php if(!empty($v->chkPromotionData)){ echo 'exit'; }else{ echo '';}  ?>" />
						</td>
					    <td align="left" valign="middle" class=""><?php echo $v->stu_full_name; ?></td>
					    <td align="left" valign="middle" class=""><?php echo $v->class_roll; ?></td>
				        <td align="center" valign="middle" class=""><input type="text"  name="promotion_roll[]" value="<?php if(!empty($v->chkPromotionData)){ echo $v->chkPromotionData->class_roll; }else{ echo ''; }  ?>" /><br /><span class="exitText" style="color:#FF0000"></span></td>
					</tr>
					<?php } ?>
					<thead>
					<tr>
						<th colspan="5" class="center">
								<div class=" displayNoneBB">
								 <button class="btn btn-sm btn-success formCancel pull-right normalSubmit" type="submit" style="margin-right: 10px;">
									<i class="ace-icon fa fa-check"></i>
									Submit</button>
							</div>
						</th>
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
		<span class="alrtText">Sorry There is no student for promotion.</span>
	</div>
<?php } ?>



<script>

$(document).on('keyup', 'input[name="promotion_roll[]"]', function(){
   var parent 		 = $(this).parents('tr');
   var promotionRoll = $(this).val();
   var url 			 = "<?php echo site_url('studentPromotionManage/chkStuId'); ?>";
   var htmlAlert     = $(this).parents('tr').find('.exitText');
   
   if(promotionRoll !=''){
      parent.find('input[name="stu_auto_id[]"]').prop('checked', true); 
	  parent.find('input[name="stu_sex[]"]').prop('checked', true); 
	  var stuId  =  $(this).parents('tr').find('input[name="stu_auto_id[]"]').val();
	  var stuSex =  $(this).parents('tr').find('input[name="stu_sex[]"]').val();
	  $(this).parents('tr').find('input[name="getStuId[]"]').val(stuId);
	  $(this).parents('tr').find('input[name="getStuSex[]"]').val(stuSex);
	  
	  var branch_id  = $('#branch_id').val();
	  var class_id   = $('#class_id').val();
	  var group_id   = $('#group_id').val();
	  var section_id = $('#section_id').val();
	  var shift_id   = $('#shift_id').val();
	  var year       = $('#year').val();
	  var promo_chk  = $(this).parents('tr').find('input[name="promotion_chk[]"]').val();
	 
	  
	  
	    $.ajax(
		{
			url : url,
			type: "POST",
			data : {stuId:stuId,stuSex:stuSex,promotionRoll:promotionRoll, branch_id:branch_id,class_id:class_id,group_id:group_id,section_id:section_id,shift_id:shift_id,year:year,promo_chk:promo_chk},
			dataType: "html",
			success:function(data){
				console.log(data);
					if(data =='exit'){
					   $('#addPomotion button[type="submit"]').attr('disabled', true);
					   htmlAlert.text('Sorry! dublicate Student ID . Change it');
					}else{
						htmlAlert.text('');
						$('#addPomotion button[type="submit"]').removeAttr('disabled', false);
					}
			   }
		  });
	  
   }else{
      parent.find('input[name="stu_auto_id[]"]').prop('checked', false);  
	  parent.find('input[name="stu_sex[]"]').prop('checked', false);  
	  $(this).parents('tr').find('input[name="getStuId[]"]').val('');
	  $(this).parents('tr').find('input[name="getStuSex[]"]').val('');
	  htmlAlert.text('');
	  $('#addPomotion button[type="submit"]').removeAttr('disabled', false);
   }
	
});


$(document).on('change', 'input[name="promotion_roll[]"]', function(){
   var parent = $(this).parents('tr');
   var promotionRoll = $(this).val();
   
   var url 			 = "<?php echo site_url('studentPromotionManage/chkStuId'); ?>";
   var htmlAlert     = $(this).parents('tr').find('.exitText');
   
   if(promotionRoll !=''){
      parent.find('input[name="stu_auto_id[]"]').prop('checked', true); 
	  parent.find('input[name="stu_sex[]"]').prop('checked', true); 
	  var stuId  =  $(this).parents('tr').find('input[name="stu_auto_id[]"]').val();
	  var stuSex =  $(this).parents('tr').find('input[name="stu_sex[]"]').val();
	  $(this).parents('tr').find('input[name="getStuId[]"]').val(stuId);
	  $(this).parents('tr').find('input[name="getStuSex[]"]').val(stuSex);
	  
	  var branch_id  = $('#branch_id').val();
	  var class_id   = $('#class_id').val();
	  var group_id   = $('#group_id').val();
	  var section_id = $('#section_id').val();
	  var shift_id   = $('#shift_id').val();
	  var year       = $('#year').val();
	  var promo_chk  = $(this).parents('tr').find('input[name="promotion_chk[]"]').val();
	 
	  
	  
	    $.ajax(
		{
			url : url,
			type: "POST",
			data : {stuId:stuId,stuSex:stuSex,promotionRoll:promotionRoll, branch_id:branch_id,class_id:class_id,group_id:group_id,section_id:section_id,shift_id:shift_id,year:year,promo_chk:promo_chk},
			dataType: "html",
			success:function(data){
				console.log(data);
					if(data =='exit'){
					   $('#addPomotion button[type="submit"]').attr('disabled', true);
					   htmlAlert.text('Sorry! dublicate Student ID . Change it');
					}else{
						htmlAlert.text('');
						$('#addPomotion button[type="submit"]').removeAttr('disabled', false);
					}
			   }
		  });
		  
		  
	  
   }else{
      parent.find('input[name="stu_auto_id[]"]').prop('checked', false);  
	  parent.find('input[name="stu_sex[]"]').prop('checked', false);  
	  $(this).parents('tr').find('input[name="getStuId[]"]').val('');
	  $(this).parents('tr').find('input[name="getStuSex[]"]').val('');
	  
	   htmlAlert.text('');
	   $('#addPomotion button[type="submit"]').removeAttr('disabled', false);
    }

});




$("#addPomotion").submit(function(e)
	{
		var postData = $(this).serializeArray();
		console.log(postData);
		var formURL = $(this).attr("action");
		$('#addPomotion .loadingPart').css('display', 'block');
		$('#addPomotion button[type="submit"]').attr('disabled', true);
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
				$('#addPomotion .loadingPart').css('display', 'none');
				$('#addPomotion button[type="submit"]').removeAttr('disabled', false);
			    $('.afterSubmittedContent').html(data);
			}
		});
		
		e.preventDefault();
	});


		
</script>