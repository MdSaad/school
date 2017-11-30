
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<title><?php echo $title; ?></title>
		<?php //$this->load->view(''); ?>
	</head>
	
	<body>
	<div class="col-md-11 col-lg-11 headerBox" >
	  <?php $this->load->view('common/header'); ?>
		
				<div class="row">
					<div class="col-md-2 col-sm-2 col-lg-2 leftBox">
							<a href="<?php echo site_url('adminHome'); ?>" > Home </a>
						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 headerBox2">
						<a href="<?php echo site_url('adminHome'); ?>" > Home </a>
						<i class="glyphicon glyphicon-forward"></i>
							<a href="<?php echo site_url('admissionModule'); ?>">Admission</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('admissionModule/stuInfoEditModule'); ?>">Editable</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('admissionModule/stuBasicInfoEdit'); ?>">Student Basic Information</a>
					</div>
				</div>	
	</div>
				
				<div class="col-md-11 col-lg-11">
					<div class="row">
					<div class="col-md-2 col-sm-2 col-lg-2 ">
						
						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 interfaceBody ">
							<div class="row text-center">
								<!-- PAGE CONTENT BEGINS -->
								<!-- /.row -->
								  <div id="widget-container-col-11" class="col-md-12 col-xs-12 col-sm-12 col-lg-12 widget-container-col ui-sortable addFormContent" style="min-height: 172px; display:block">
									<div id="widget-box-11" class="widget-box widget-color-dark ui-sortable-handle" style="opacity: 1;">
										<div class="widget-header">
											<h4 class="widget-title">Student Basic Info Edit Manage </h4>


												<div class="widget-toolbar">
												<!-- <a data-action="settings" href="#">
													<i class="ace-icon fa fa-cog"></i>
												</a> -->
												
												<a data-action="reload" href="#">
													<i class="ace-icon fa fa-refresh"></i>
												</a>
												
												<a data-action="collapse" href="#">
													<i class="ace-icon fa fa-chevron-up"></i>
												</a>
												
												<a data-action="close" href="#">
													<i class="ace-icon fa fa-times"></i>
												</a>
												
												<!-- <a class="orange2" data-action="fullscreen" href="#">
													<i class="ace-icon fa fa-expand"></i>
												</a> -->
												</div>
										</div>

										<?php if(!empty($alertMsg)){ ?>

										<div class="alert alert-block alert-success" id="">
											<button class="close" data-dismiss="alert" type="button">
												<i class="ace-icon fa fa-times"></i>
											</button>
											<strong class="green">
												<i class="ace-icon fa fa-check-square-o"></i>

											</strong>
											<span class="alrtText">Update Student Successfully.</strong></span>
										</div>
										<?php } ?>
										
										<div class="widget-body ">
											<div class="widget-main padding-4"  style="position: relative;">
												<form class="form-horizontal" id="updateForm" role="form" action="<?php echo site_url('stuBasicInfo/stuBasicInfoStore'); ?>" enctype="multipart/form-data" method="post">							<div class="content img-thumbnail container">
																	  	<input type="hidden" class="form-control" name="update_id" id="update_id"  value="<?php echo $stuInfo->id; ?>"/>
																	   <input type="hidden" class="form-control" name="update_class_year" id="update_class_year"  value="<?php echo $this->session->userdata('year'); ?>"/>
																		<div class="form-group">
																			<label class="control-label col-sm-2" for="email">Identification Number :</label>
																			<div class="col-sm-4">
																				<input required="required" type="text" class="form-control" name="identity_number" id="identity_number" placeholder="Enter identification number*" value="<?php echo $stuInfo->identity_number; ?>"/>
																			</div>
																		</div>
																		<div class="form-group">
																		  <label class="control-label col-sm-2" for="email">Student Full Name :</label>
																		  <div class="col-sm-4">
																				<input required="required" type="text" class="form-control" name="stu_full_name" id="stu_full_name" placeholder="Enter Full Name*" value="<?php echo $stuInfo->stu_full_name; ?>"/>
																		  </div>



																		  <label class="control-label col-sm-2" for="email">Campus/Branch :</label>
																		  <div class="col-sm-4">
																		      <input type="text" class="form-control" name="" id=""  value="<?php echo $stuInfo->branch_name; ?>" readonly="readonly" />
																			  <input type="hidden" class="form-control" name="branc_id" id="branc_id"  value="<?php echo $stuInfo->branc_id; ?>"/>
																		  </div>
																		</div>
																		
																		<div class="form-group">
																		  <label class="control-label col-sm-2" for="email">Date of Birth :</label>
																		  <div class="col-sm-4">
																			<div class="input-group">
																				<input id="stu_birth_date" name="stu_birth_date" class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" placeholder="Enter Date of Birth" value="<?php echo $stuInfo->stu_birth_date; ?>" >
																				
																				
																				<span class="input-group-addon">
																					<i class="fa fa-calendar bigger-110"></i>
																				</span>
																			</div>
																		  </div>
																		  
																		   <label class="control-label col-sm-2" for="email">Student Class :</label>
																		   <div class="col-sm-4" id="">
																		      <input type="text" class="form-control" name="" id=""  value="<?php echo $stuInfo->class_name; ?>" readonly="readonly" />
																			  <input type="hidden" class="form-control" name="class_id" id="class_id"  value="<?php echo $stuInfo->class_id; ?>"/>
																		  </div>
																		</div>
																		
																		<div class="form-group">
																		  <label class="control-label col-sm-2" for="email">Sex/Gender :</label>
																		  <div class="col-sm-4">
																		     <!-- <input type="text" class="form-control" name="" id=""  value="<?php /*if($stuInfo->stu_sex =='M') echo 'Male'; else echo 'Female'; */?>" readonly="readonly" />
																			  <input type="hidden" class="form-control" name="stu_sex" id="stu_sex"  value="<?php /*echo $stuInfo->stu_sex; */?>"/>-->

																			  <select class="form-control" name="stu_sex" id="stu_sex" required="required">
																				  <option value="M" <?php if($stuInfo->stu_sex =='M') {echo 'selected';} ?>>Male</option>
																				  <option value="F" <?php if($stuInfo->stu_sex =='F') {echo 'selected';} ?>>Female</option>
																			  </select>

																		  </div>
																		  
																		  
																		  <label class="control-label col-sm-2" for="email"> Group :</label>
																		  <div class="col-sm-4">
																		     <input type="text" class="form-control" name="" id=""  value="<?php echo $stuInfo->group_name; ?>" readonly="readonly" />
																			 <input type="hidden" class="form-control" name="class_group_id" id="class_group_id"  value="<?php echo $stuInfo->class_group_id; ?>"/>
																		  </div>
																		  
																		  
																		</div>
																		
																		
																		<div class="form-group">
																		  <label class="control-label col-sm-2">Blood Group :</label>
																		  <div class="col-sm-4">
																			<select class="form-control" name="stu_blood_group" id="stu_blood_group">
																				<option value="<?php echo $stuInfo->stu_blood_group; ?>" selected="selected"><?php echo $stuInfo->stu_blood_group; ?></option>
																				<option value="A+">A+</option>
																				<option value="A-">A-</option>
																				<option value="B+">B+</option>
																				<option value="B-">B-</option>
																				<option value="AB+">AB+</option>
																				<option value="AB-">AB-</option>
																				<option value="O+">O+</option>
																				<option value="O-">O-</option>
																			 </select>
																		  </div>
																		  
																		  
																		  <label class="control-label col-sm-2" for="email">Section :</label>
																		  <div class="col-sm-4">
																		     <input type="text" class="form-control" name="" id=""  value="<?php echo $stuInfo->section_name; ?>" readonly="readonly" />
																			 <input type="hidden" class="form-control" name="class_section_id" id="class_section_id"  value="<?php echo $stuInfo->class_section_id; ?>"/>
																		  </div>
																		</div>
																		
																		<div class="form-group">
																		  <label class="control-label col-sm-2" for="email">Special Remarkable Sign :</label>
																		  <div class="col-sm-4">
																			<input type="text" class="form-control" name="stu_remarkabe_sign" id="stu_remarkabe_sign" placeholder="Enter Special Remarkable Sign" value="<?php echo $stuInfo->stu_remarkabe_sign; ?>"/>
																		  </div>
																		  
																		  
																		  <label class="control-label col-sm-2" for="email"> Shift :</label>
																		    <div class="col-sm-4">
																		     <input type="text" class="form-control" name="" id=""  value="<?php echo $stuInfo->shift_name; ?>" readonly="readonly" />
																			 <input type="hidden" class="form-control" name="class_shift_id" id="class_shift_id"  value="<?php echo $stuInfo->class_shift_id; ?>"/>
																		  </div>
																		</div>
																		
																		
																		<div class="form-group">
																		  <label class="control-label col-sm-2" for="email"> Mail Address :</label>
																		  <div class="col-sm-4">
																			<input type="email" class="form-control" name="stu_mail_adrs" id="stu_mail_adrs" placeholder="Enter Mail Address" value="<?php echo $stuInfo->stu_mail_adrs; ?>"/>
																		  </div>
																		  
																		  <label class="control-label col-sm-2" for="email">Class Roll :</label>
																		  <div class="col-sm-4 text-left">
																			<input type="text" required="required" class="form-control" name="class_roll" id="class_roll" placeholder="Enter Class Roll*" value="<?php echo $stuInfo->class_roll; ?>" readonly="readonly"/>
																		  </div>
																		</div>
																		
																		<div class="form-group">
																		  <label class="control-label col-sm-2" for="email"> Mobile/Cell No :</label>
																		  <div class="col-sm-4">
																			<input type="number" class="form-control" name="stu_mobile" id="stu_mobile" placeholder="Enter Mobile/Cell No" value="<?php echo $stuInfo->stu_mobile; ?>"/>
																		  </div>
																																			  
																			<label class="control-label col-sm-2">Nationality :</label>
																			<div class="col-sm-4">
																			  
																				<select class="form-control nationalityListView" name="stu_nationality_id" id="stu_nationality_id">
																				<option value="" selected="selected" >Select Nationality </option>
																					<?php foreach($nationalityListInfo as $k=>$v) { ?>
																					<option value="<?php echo $v->id; ?>" <?php if($stuInfo->stu_nationality_id == $v->id) { ?> selected="selected" <?php } ?> ><?php echo $v->nationality_name; ?></option>
																					<?php } ?>
																			
																				</select>
																			</div>
																		</div>
																		
																		<div class="form-group">
																		  <label class="control-label col-sm-2" for="email">Passport No :</label>
																		  <div class="col-sm-4">
																			<input type="text" class="form-control" name="stu_passport" id="stu_passport" placeholder="Enter Passport No" value="<?php echo $stuInfo->stu_passport; ?>"/>
																		  </div>
																		  
																		  
																		  <label class="control-label col-sm-2">Religion :</label>
																		  <div class="col-sm-4">
																				<select class="form-control religionListView" name="stu_religion_id" id="stu_religion_id" >
																				<option value="" selected="selected" >Select Religion </option>
																					<?php foreach($religionListInfo as $k=>$v) { ?>
																					<option value="<?php echo $v->id; ?>" <?php if($stuInfo->stu_religion_id == $v->id) { ?> selected="selected" <?php } ?> ><?php echo $v->religion_name; ?></option>
																					<?php } ?>
																			
																				</select>
																				
																		  </div>
																		</div>
																		
																		
																		<div class="form-group">
																		  <label class="control-label col-sm-2" for="email">National ID :</label>
																		  <div class="col-sm-4">
																			<input type="number" class="form-control" name="stu_nid" id="stu_nid" placeholder="Enter National ID" value="<?php echo $stuInfo->stu_nid; ?>"/>
																		  </div>
																		  
																		  
																		  <label class="control-label col-sm-2" for="email">Student Status :</label>
																		  <div class="col-sm-4">
																			<select class="form-control" name="stu_status" id="stu_status" required="required">
																					<!--<option  value="" ><?php /*echo $stuInfo->stu_status; */?></option>-->
																					<option value="current_stu" <?php if($stuInfo->stu_status == 'current_stu') {echo 'selected';} ?>>Current Student</option>
																					<option value="ex_student" <?php if($stuInfo->stu_status == 'ex_student') {echo 'selected';} ?>>Ex-Student</option>
																			</select>
																		  </div>
																		</div>
																		
																		
																		<div class="form-group">
																		  <label class="control-label col-sm-2" for="email">Social Security No :</label>
																		  <div class="col-sm-4">
																			<input type="text" class="form-control" name="stu_social_scr_no" id="stu_social_scr_no" placeholder="Enter Social Security No" value="<?php echo $stuInfo->stu_social_scr_no; ?>"/>
																		  </div>
																		  
																		  
																		  <label class="control-label col-sm-2" for="email">Last School :</label>
																		  <div class="col-sm-4">
																			<input type="text" class="form-control" name="stu_last_school" id="stu_last_school" placeholder="Enter Last School Name" value="<?php echo $stuInfo->stu_last_school; ?>"/>
																		  </div>
																		</div>
																		
																		
																		<div class="form-group">
																		  <label class="control-label col-sm-2" for="email">Student Type :</label>
																		  <div class="col-sm-4">
																			<select class="form-control" name="stu_type" id="stu_type">
																					  <!--<option selected="selected" value="<?php /*echo $stuInfo->stu_type; */?>"><?php /*echo $stuInfo->stu_type; */?> </option>-->
																					  <option value="new" <?php if($stuInfo->stu_type == 'new') {echo 'selected';} ?>>Admitted/New Student</option>
																					  <option value="promotted" <?php if($stuInfo->stu_type == 'promotted') {echo 'selected';} ?>>Promoted Student</option>
																			</select>
																		  </div>
																		  <label class="control-label col-sm-2" for="email"> Entry Date :</label>
																		  <div class="col-sm-4">
																			<div class="input-group">
																				<input id="stu_entry_date" name="stu_entry_date" class="form-control" type="text" data-date-format="dd-mm-yyyy" placeholder="Enter Entry Date" value="<?php echo $stuInfo->stu_entry_date; ?>" readonly="readonly">
																				<span class="input-group-addon">
																					<i class="fa fa-calendar bigger-110"></i>
																				</span>
																			</div>
																		  </div>
																		</div>
																		
																		<div class="form-group">
																		  <label class="control-label col-sm-2" for="email">Student Photo:</label>
																		  
																		  <div class="col-sm-4">
																				<div class="attachmentbody" data-type="stu_photo" data-target="#stu_photo">
																					<img class="upload " src="<?php echo base_url('resource/img/no_image.png'); ?>">
																				</div>
																				<input id="stu_photo" type="hidden" value="" name="stu_photo">
																				
																				<img  src="<?php echo base_url('resource/stu_photo/'.$stuInfo->stu_photo); ?>" alt="Photo" style="max-height:80px">
																			</div>
																			
																			<label class="control-label col-sm-2" for="admission_session">Admission Session :</label>
																		  <div class="col-sm-4">
																			<input type="text" class="form-control" name="admission_session" id="admission_session" placeholder="Enter Admission Session" value="<?php echo $stuInfo->admission_session; ?>"/>
																		  </div>
																		  
																		</div>
																		
																		  <div class="modal-footer">
																			
																			<button class="btn btn-sm btn-danger formCancel" type="button">
																				<i class="ace-icon fa fa-times"></i>
																				Cancel
																			</button>
																			<button class="btn btn-sm btn-primary" type="submit">
																				<i class="ace-icon fa fa-check"></i>
																				<span class="update"> Update </span>
																			</button>
																		</div>
																		</div>
													</form>
												</div>
											</div>
										</div>
									</div>
							 </div>	
					</div>
				</div>
				</div>
				
	  <?php $this->load->view('common/footer'); ?>
				
	</body>
</html>



<script type="text/javascript" >
$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd',
})

$('.add_new').on('click', function() {
	$('.add_new').fadeOut("slow");
	$('.addFormContent').fadeIn("slow");
});

$('.formCancel').on('click', function() {
	$('.addFormContent').fadeOut('slow');
	$('.add_new').fadeIn('slow');
});


// identity check //

$('#identity_number').blur(function(){
	var identity_number = $(this).val();
	var update_id = $('#update_id').val();
	if(identity_number.length <= 0){
		alert("Identification Number is required!");
		return;
	}
	var getUrl = '<?php echo site_url('stuBasicInfo/identity_check_update'); ?>/' + identity_number + '/' + update_id;
	$.get(getUrl,function(result){
		//console.log(result);
		if(result == 'exist'){
			alert('This Identification number has already been taken');
			return false;
		}
	});
});

$("#updateForm").submit(function(e) {
	e.preventDefault();
	e.stopImmediatePropagation();
	var identity_number = $('#identity_number').val();
	if(identity_number.length <= 0){
		alert("Identification Number is required!");
		return;
	}
	var update_id = $('#update_id').val();
	var getUrl = '<?php echo site_url('stuBasicInfo/identity_check_update'); ?>/' + identity_number + '/' + update_id;
	$.get(getUrl, function (result) {
		if (result == 'exist') {
			alert('This Identification number has already been taken');
		} else {
			var postData = $("#updateForm").serializeArray();
			//console.log(postData);
			var formURL = $("#updateForm").attr("action");
			$.ajax(
				{
					url: formURL,
					type: "POST",
					data: postData,
					success: function (data) {
						alert('Update student successful!');
						location.reload();
						//console.log(data);
					}
				});
		}
	});
});


$('.tryAgain').on('click', function() {
	$('#updateForm').fadeIn("slow");
	$('.afterSubmitContent').fadeOut('slow');
});

</script>

	