
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
							<a href="<?php echo site_url('admissionModule'); ?>">Admission</a>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;<a href="<?php echo site_url('admissionModule/studentTransferManage'); ?>">Student Transfer</a>&nbsp;&nbsp;
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
											<h4 class="widget-title">Student Transfer </h4>
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
										
										<div class="widget-body ">
											<div class="widget-main padding-4"  style="position: relative;">
											  <form class="form-horizontal" role="form" action="#" enctype="multipart/form-data" method="post">
												<div class="scroll-content">
															<div class="content img-thumbnail container">
																	<div class="row">
																		<div class="form-group" style="padding-top:10px">
																			  <label class="control-label col-sm-4"><strong>Student ID  :</strong></label>
																			  <div class="col-sm-5">
																				  <input name="stuCurrentID" id="stuCurrentID" class="form-control" type="text" placeholder="Enter Student ID" required>
																			  </div>
																				 <div class="col-sm-3 text-left">
																				   <button class="btn btn-sm btn-primary find" type="button">
																						<i class="ace-icon fa fa-check"></i>
																						<span class="update">Find</span>
																					</button>
																		         </div>																			  
																			  </div>
																			 
																			  
																			</div>
																			
																			<div class="alert alert-block alert-success afterSubmitContent" id="">
																				<button class="close" data-dismiss="alert" type="button">
																				<i class="ace-icon fa fa-times"></i>
																				</button>
																				<strong class="green">
																				<i class="ace-icon fa fa-check-square-o"></i>
																				
																				</strong>
																				<span class="alrtText">Student Transfer Successfully</span>
																			</div>
																			
																		<div class="col-md-12 studentTransferDataView"> </div>
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


$("#addForm").submit(function(e)
{
	var postData = $(this).serializeArray();
	console.log(postData);
	var formURL = $(this).attr("action");
	var successUrl = '<?php echo site_url('stuParentsInfo'); ?>';
	$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data){
			    $('#update_id').val("");
			    $("#addForm").find("input[type=text]").val("");
				$('#addForm').css('display', 'none');
				$('.afterSubmitContent').css('display', 'block');
				$(".stuImgView").html('');
				$('.update').text("Save");
				
				$.each($('.attachmentbody'), function(i, attachment) {
					attachment = $(attachment).html('<img class="upload" src="'+SAWEB.getBaseAction('resource/img/no_image.png')+'" />');
					reInitiateFileUpload(attachment);                        
				});
			}
		  });
	
	e.preventDefault();
});







$(".find").click(function(e)
{
   
	var stuId 	= $("#stuCurrentID").val();
	var formURL = '<?php echo site_url('studentPromotionManage/studentTransferDataView'); ?>';
	
	if(stuId !=''){
		$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {stuId : stuId},
				dataType : "html",
				success:function(data){
				    $('.afterSubmitContent').css('display', 'none');
					$(".studentTransferDataView").html(data);
				}
		  });
	 } else {
	    $(".studentTransferDataView").html('');
	 }
	
	e.preventDefault();
});


 

$('.tryAgain').on('click', function() {
	$('#addForm').fadeIn("slow");
	$('.afterSubmitContent').fadeOut('slow');
});

</script>

	