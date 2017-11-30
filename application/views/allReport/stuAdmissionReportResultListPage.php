<!DOCTYPE html>
<html lang="en">
<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $title; ?></title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<script type="text/javascript" language="javascript" src="<?php echo site_url('adapter/javascript'); ?>"></script>
</head>
	<body>
			<div class="container">
				<div class="">
					<div class="aFourSize">
						<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-condensed  table-striped table-bordered">
							 <thead>
								  <tr>
									<th colspan="8" class="text-center">
										<?php $this->load->view('common/reportHeader'); ?>
										<h4 class="text-center"><u>Student Admission Report</u></h4>
									</th>
								  </tr>
							  </thead> 
						<?php 
							if(isset($findAdmittedStuInfo)) { 
						     foreach($findAdmittedStuInfo as $v) {
						 ?>
											  <thead>
												  <tr>
													<th colspan="8" class="text-center"><strong>Class : </strong><?php echo $v->class_name ?></th>
												  </tr>
											  </thead> 
											  
											  
											  <thead>
												  <tr>
													<th>SL No</th>
													<th>Stu ID </th>
													<th>Stu Name </th>
												    <th>Class</th>
												    <th>Section</th>
													<th>Roll</th>
												    <th>Group</th>
												  </tr>
											  </thead> 
											  <?php 
												$slNo = 1;
												?>
										<tbody>	
											 
											<?php //print_r($stuDetailsInfo); 
											 foreach($v->findAllstu as $vs) { ?>
											  <tr class="" >
												<td><?php echo $slNo++; ?></td>
												<td><?php echo $vs->stu_current_id; ?></td>
												<td><?php echo $vs->stu_full_name; ?></td>
											    <td><?php echo $vs->class_name; ?></td>
											   	<td><?php echo $vs->section_name; ?></td>
											   	<td><?php echo $vs->class_roll; ?></td>
											 
											   
											    <td><?php echo $vs->group_name; ?></td>
											  </tr>
											  <?php } ?> 
										    </tbody> 

										    <?php }  ?> 
											
										    <tr style="height: 50px">
												<th colspan="16" class="text-left"><span style="float-left"><?php if(!empty($class_id)){ echo "Class"; }else{ echo "Branch"; } ?> Total : <?php echo $branchTotal; ?> 
													 </span><a class="printWindowId pull-right" style="cursor: pointer;">Print</a></th>
											  </tr>
											</table>
						
					  <?php }  ?> 
					  
					  <?php if(isset($allStu)) { ?>
									      <table width="100%"  cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover text-left ">
									      <thead>
											  <tr>
												<th colspan="8" class="text-center">
													<?php $this->load->view('common/reportHeader'); ?>
													<h4 class="text-center"><u>Student Admission Report</u></h4>
												</th>
											  </tr>
										  </thead> 
												<thead>
													<tr>
													  <th class="">Branch Name</th>
														<th>Total Male</th>
														<th>Total Female</th>
														<th>Total</th>
													</tr>
												</thead>
										  
										      <?php 
												$totalStu = 0;
												foreach ($branchListInfo as $v) {
												$male = 1;
												$female = 1;
												$mot = 1;
												$totalMale = 0;
												$totaFelmale = 0;
												$totalStu = 0;
												$branchName = $v->branch_name;
												foreach($allStu as $vv) {
												if($v->id == $vv->branc_id) {
													 $totalStu = $mot++;
													 if($vv->stu_sex == 'M'){
														$totalMale = $male++;
													 } else {
														$totaFelmale = $female++;
													 }
												}
												} ?>
										  <tr>
											<td><?php echo $branchName; ?></td>
											<td><?php echo $totalMale; ?></td>
											<td><?php echo $totaFelmale; ?></td>
											<td><?php echo $totalStu; ?></td>
										  </tr>
										  <?php } ?>
										</table>
										<?php } ?> 
					
		  
			      </div>
				</div>
			</div>
	</body>		
            
	</html>
         <?php //$this->load->view('common/footer'); ?>
         <?php $this->load->view('common/jsLinkPage'); ?>
		 <script type="text/javascript">
			$(document).on('click', '.printWindowId', function(){
				$(this).hide();
				window.print();
				console.log('ok');
			});
		 </script>



