<link rel="stylesheet" href="<?php echo base_url("resource/assets/css/bootstrap.min.css"); ?>" />
<link rel="stylesheet" href="<?php echo base_url("resource/css/animate.css"); ?>" />
<link rel="stylesheet" href="<?php echo base_url("resource/assets/font-awesome/4.2.0/css/font-awesome.min.css"); ?>" />
<link href="<?php echo base_url('resource/css/custom.css'); ?>" rel="stylesheet">

<link href="<?php echo base_url('resource/css/reportStyle.css'); ?>" rel="stylesheet" />

			<div class="row">
					<?php 
						$authorBranchID = $this->session->authorBranchID;
						if(isset($branch_id) && $branch_id != "") {
							$branchInfo 		=  $this->M_crud->findById('branch_list_manage', array('id' => $branch_id));
						} else {
							$branchInfo 		=  $this->M_crud->findById('branch_list_manage', array('id' => $authorBranchID));
						}
					?>
					<div class="report_school_name text-center">VATTAPUR MODEL GOVT. PRIMARY SCHOOL <?php //echo $basicInfo->inst_name; ?></div>
					<div class="report_school_adrs text-center">Vill:-Vattapur, P.O: Sonargaon-1440, Word No.: 08, Sonargaon Paurashava </div>
					<div class="report_school_adrs text-center">Sonargaon Narayanganj </div>
					<div class="report_school_adrs text-center">Cell: 01959613022, Head Teacher: 01715010037 </div>
					<div class="company-name text-center" style="color: black">United IT Solution LTD. ERP System</div>
			</div>

<script type="text/javascript">


        function printMultiPart(contentArea, pageWidth = "850px") {
            var content = $(contentArea).html();
			var html_content	= '<link rel="stylesheet" href="<?php echo base_url("resource/assets/css/bootstrap.min.css"); ?>" /><link href="<?php echo base_url('resource/css/custom.css'); ?>" rel="stylesheet"><link rel="stylesheet" href="<?php echo base_url("resource/css/printPage.css"); ?>" />'+content;

            newwindow = window.open();
            newdocument = newwindow.document;
            newdocument.write('<div style="width:'+pageWidth+'" class="col-md-12">'+html_content+'</div>');
            newdocument.close();

            newwindow.print();

            return false;
        }
		

    </script>
	
<script>
function fullPagePrint() {
	$('.fullPrint').css('display', 'none');
	$('.container').addClass('container-fluid');
	$('.container').removeClass('container');
    window.print();
}
</script>