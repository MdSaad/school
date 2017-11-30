
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
					<a href="<?php echo site_url('HR'); ?>">HR</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('empAttendance'); ?>">Attentdence</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('empAttendance/setupHoliday'); ?>">Setup Holyday</a>
				</div>
			</div>	
	</div>
				
		<div class="col-md-11 col-lg-11">
		<div class="row">
		<div class="col-md-2 col-sm-2 col-lg-2 ">
			
		</div>
		<div class="col-md-10 col-sm-10 col-lg-10 interfaceBody headerBox3">
			<div class="row text-center">
					<!-- PAGE CONTENT BEGINS -->
					<!-- /.row -->
			  <div id="widget-container-col-11" class="col-md-12 col-xs-12 col-sm-12 col-lg-12 widget-container-col ui-sortable addFormContent" style="min-height: 172px; display:block">
				<div id="widget-box-11" class="widget-box widget-color-dark ui-sortable-handle" style="opacity: 1;">
					<div class="widget-header">
						<h4 class="widget-title">Setup Holyday Management</h4>
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
					
			<div class="widget-body">
			 <div class="widget-main padding-4"  style="position: relative;">
				<form id="addForm" class="form-horizontal" role="form" action="<?php echo site_url('empAttendance/setupHolydayAction'); ?>" enctype="multipart/form-data" method="post">
				<input type="hidden" class="form-control" name="update_id" id="update_id"  value=""/>	
					<div class="scroll-content">
						 <div class="content img-thumbnail container">
						<div class="col-md-12">
						 <div class="row textleft">
							  <h4 class="text-left"> Setup Holyday Management <span class="alert" style="padding-left:20px;">  </span> </h4>
						 </div>
							<div class="col-md-12 img-thumbnail">
							 <div class="col-md-6" style="padding-top: 6px;">

							    <div class="form-group">
									<label class="control-label col-sm-5 " for="domain_id">Domain :</label>
									<div class="col-sm-7 paddingZero">
									   <select class="form-control" name="domain_id" id="domain_id" required="required">
											<option value="" selected="selected" >Select Domain </option>
											<?php 
											    foreach($domainListInfo as $v){ ?>
											      <option value="<?php echo $v->id ?>" ><?php echo $v->domain_name ?> </option>
											<?php } ?>
									    </select>														   		
									 </div>
								 </div>
						 


								

								 <div class="form-group">
									  <label class="control-label col-sm-5 " for="holyday_name">Holyday Name :</label>
									  <div class="col-sm-7 paddingZero">
											<input type="text" name="holyday_name" id="holyday_name" class="form-control"  placeholder="Holyday Name">																   		
									 </div>
								 </div>
															 
								 
							 </div>
														 
							 <div class="col-md-6" style="padding-top: 6px;">

							    <div class="form-group">
									<label class="control-label col-sm-5 " for="branch_id">Branch :</label>
									<div class="col-sm-7 paddingZero">
										<select class="form-control branchListView" name="branch_id" id="branch_id">
											<option value="" selected="selected" >Select Branch </option>
										</select>														   		
									</div>
								</div>


								  


							    <div class="form-group">
									  <label class="control-label col-sm-5 " for="email">Date Range :</label>
									  <div class="input-group col-sm-7 paddingZero">
									   <input type="text" name="fromDate" id="fromDate"  class="form-control date-picker" placeholder="YYYY-MM-DD" required>
									  <span class="input-group-addon" id="basic-addon1">To</span>
									  <input type="text" class="form-control date-picker" name="toDate" id="toDate" placeholder="YYYY-MM-DD" required>
									 </div>
								</div>

								<div class="form-group">
									  <label class="control-label col-sm-5 " for="email">Short Holyday Details :</label>
									  <div class="col-sm-7 paddingZero">
										<textarea name="short_details" id="short_details" class="form-control"></textarea>																   		
									 </div>
								 </div>
								
							 </div>

							 
						</div>	

						
					</div>
				</div>
			   </div>
			</div>

			<div class="modal-footer">
				<button class="btn btn-sm btn-danger formCancel" type="button">
					<i class="ace-icon fa fa-times"></i>
					Cancel
				</button>
				<button class="btn btn-sm btn-primary submitButton" type="submit">
					<i class="ace-icon fa fa-check"></i>
					<span class="update">Save</span>
				</button>
			</div>
			</form>
		</div>
	</div>
	</div>
  </div>
  <div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
			
			<div class="clearfix">
				<div class="pull-right tableTools-container"></div>
			</div>
			<div class="table-header">
			  Holyday Manage List
			</div>
				
				

			<!-- div.table-responsive -->

			<!-- div.dataTables_borderWrap -->
			<div id="listView">
				<table class="table table-bordered leaveListTable">
					<thead>
						<tr>
							<th class="center" width="8%">
							  Sl No
							</th>
							<th>Domain Name</th>
							<th>Branch Name</th>
							<th>Holyday name</th>
							<th>From Date</th>
							<th>To Date</th>
							<th width="10%">Action</th>
						</tr>
					</thead>

					<tbody>
					
					<?php 

					   $sl = 1;
					   foreach($allHolydayInfo as $v) { 
					 ?>
						<tr style="background-color:#F9F9F9">
							<td class="center">
                               <?php echo $sl++; ?>
							</td>

							<td><?php echo $v->domain_name; ?></td>
							<td><?php echo $v->branch_name; ?></td>
							<td class="hidden-480"><?php echo $v->holyday_name; ?></td>
							<td><?php echo $v->from_date; ?></td>
							<td><?php echo $v->to_date; ?></td>
							<td>
								<div class="hidden-sm hidden-xs btn-group">
								<button class="btn btn-xs btn-info green" data-id="<?php echo $v->id ?>"  data-rel="tooltip" title="Edit" data-placement="bottom">
									<i class="ace-icon fa fa-pencil bigger-120"></i>															</button>

								<button class="btn btn-xs btn-danger red" data-id="<?php echo $v->id ?>" data-rel="tooltip" title="Delete" data-placement="bottom" >
									<i class="ace-icon fa fa-trash-o bigger-120"></i>															</button>
								
							</div>
							</td>
						</tr>


					 <?php  } ?>


					</tbody>
				</table> 
				
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


<script>

$('.formCancel').on('click', function() {
	$('.addFormContent').fadeOut('slow');
	$('.add_new').fadeIn('slow');
});


$('#fromDate, #toDate, #branch_id, #domain_id').on('change', function(e) {

	var branch_id       = $('#branch_id').val();
	var fromDate        = $('#fromDate').val();
	var toDate          = $('#toDate').val();
	var domain_id   	= $('#domain_id').val();
	var id       		= $('#update_id').val();
	var formURL 		= "<?php echo site_url('empAttendance/holyDayInsertChkInfo'); ?>";


    if(fromDate && toDate){
		$.ajax(
		{
			url : formURL,
			type: "POST",
			async: false,
			data : {branch_id : branch_id, fromDate : fromDate, toDate : toDate, id : id, domain_id : domain_id},
			success:function(data){
				if(data =='notpermission'){

				  $('.alert').text("Sorry! Attendence Already Count On That Day So Change HolydayDate");
				  $('.alert').css("color", "red");
				  $('.submitButton').attr("disabled","disabled");

				}else if(data=='duplicated'){

                  $('.alert').text("Sorry! Holyday Already Manage On This Date Please  Change Holyday Date");
				  $('.alert').css("color", "red");
				  $('.submitButton').attr("disabled","disabled");

				}else{

				   $('.alert').text("");
				   $('.submitButton').removeAttr("disabled","disabled");

				}
				
			  }
		    });
		  
		e.preventDefault();
    }

	  
});






   $("#addForm").submit(function(e)
	{   
		var id       = $('#update_id').val();
		var postData = $(this).serializeArray();
		var formURL  = $(this).attr("action");
		console.log(postData);
		$.ajax(
			{
				url : formURL,
				type: "POST",
				async: false,
				data : postData,
				success:function(data){
					if(data == 'Friday'){ 
					  $('.alert').text("Sorry! This Day is Friday");
                      $('.alert').css("color", "red");
					}else{
					  $('.alert').text("");
					  $("#listView").html(data);	
					  if(id){
                        $('.alert').text("Update successfully");
					  }else{
					    $('.alert').text("Insert successfully");	
					  }	
					  $("#addForm").find("input[type=text],input[type='number'], select, hidden, textarea").val("");
					  
					  $('.alert').css("color", "#0000FF");
					  $('.update').text("Save");
					}
				
				  }
			  });
		
		e.preventDefault();
	});


    $(document).on("click", ".green", function(e)
	{
		
		var id 		= $(this).attr("data-id");
		var formURL = "<?php echo site_url('empAttendance/holyDayEditInfo'); ?>";
		$('.update').text('Update');
		$.ajax(
		{
			url : formURL,
			type: "POST",
			async: false,
			data : {id: id},
			dataType: "json",
			success:function(data){

				$('#update_id').val(data.id);
				$('#domain_id').val(data.domain_id);
				$('#short_details').val(data.short_details);
				$('#holyday_name').val(data.holyday_name);
				$('#fromDate').val(data.from_date);
				$('#toDate').val(data.to_date);

				$('#branch_id').html('<option value="">Select Branch Name</option>');
					
				$.each(data.branchList, function(key, value){
					var option = '<option value="'+value.id+'">'+value.branch_name+'</option>';
					$('#branch_id').append(option);						
				});
				
				$('#branch_id').val(data.branch_id);

				
				$('.update').text("Update");
		
			}
		});
		
		e.preventDefault();
	});



    $(document).on("click", ".red", function(e){ 
		var x = confirm('Are you sure to delete?');
		
		if(x){
			var id = $(this).attr('data-id');
			console.log(id);
			var url = SAWEB.getSiteAction('empAttendance/holydayDelete/'+id);
			location.replace(url);
		} else {
			return false;
		}
	});



	
	
	  

    

     $('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format: 'yyyy-mm-dd',
});


    //Domain wise Branch 
	$("#domain_id").change(function() {
	var domain_id = $("#domain_id").val();			
	$.ajax({
		url : SAWEB.getSiteAction('employeeInfo/domainWiseBranch'), // URL TO LOAD BEHIND THE SCREEN
		type : "POST",
		data : { domain_id : domain_id },
		dataType : "html",
		success : function(data) {			
			  $(".branchListView").html(data);
		   }
		});
		
	});	
	





	
</script>