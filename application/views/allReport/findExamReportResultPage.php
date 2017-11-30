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
            			<?php $this->load->view('common/reportHeader'); ?>
						
						<h4 class="text-center"><u>Student Result Report</u></h4>
						
						<?php if(!empty($stuDetailsInfo)) { 
						 ?>
						<table id="dynamic-table" class="table table-striped table-bordered ">

								<tbody>
									<tr> 
										
										<?php //print_r($stuDetailsInfo); 
											 foreach($stuDetailsInfo as $v) { 
											 
											 }
											 ?>
								      <td align="center" valign="middle" class="text-center"><strong>Class :</strong> <?php echo $v->class_name; ?>,&nbsp;&nbsp;&nbsp;<strong>Group :</strong> <?php echo $v->group_name; ?>,&nbsp;&nbsp;&nbsp;<strong>Section : </strong><?php echo $v->section_name; ?>,&nbsp;&nbsp;&nbsp;<strong>Shift :</strong> <?php echo $shiftInfo->shift_name; ?>,&nbsp;&nbsp;&nbsp;<strong>Year :</strong> <?php echo $v->year; ?>,&nbsp;&nbsp;&nbsp;<strong>Subject :</strong> <?php echo $subjectInfo->subject_name; ?></td>
									</tr>
									
									<tr> 
									    <td align="center" valign="middle" class="text-left">
											<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-condensed  table-striped table-bordered">
											  <thead>
											  </thead>
											  
											  <thead>
												  <tr>
													<th>SL No</th>
													<th>Stu ID </th>
													<th>Stu Name </th>
												    <th>Class Roll </th>
													<?php foreach($examTypeInfo as $examType) { 
														if (in_array($examType->id, $examTypeIDList)) {
													?>
												    <th>
													<?php echo $examType->exam_type_name; ?> => FM : <?php echo $examType->typeWiseMarks->total_marks; ?>
													</th>
													<?php } } ?>
												    <th>Obtain Marks</th>
												  </tr>
											  </thead> 
											  <?php 
												$slNo = 1;
												?>
											<tbody>	
											 
											<?php //print_r($stuDetailsInfo); 
											 foreach($stuDetailsInfo as $v) { ?>
											  <tr class="" >
												<td><?php echo $slNo++; ?></td>
												<td><?php echo $v->stu_id; ?></td>
												<td><?php echo $v->stu_full_name; ?></td>
											    <td><?php echo $v->class_roll; ?></td>
												<?php 
												   $totalMarks = 0; 
												   foreach($v->examWiseMarks as $k => $examMarks){ 
												   $totalMarks = $totalMarks + $v->examWiseMarks[$k];
												  ?> 
											   <td><?php  if($v->examWiseMarks[$k] != "No_Entry") { echo $v->examWiseMarks[$k]+0; } else { echo "<span style='color:red' >No Entry</span>"; } ?></td>
											   <?php } ?>
											   
											    <td><?php echo $totalMarks; ?></td>
											  </tr>
										    </tbody> 
											<?php } ?> 
										    <tr>
												<th colspan="16" class="text-right"><a href="#" class="pull-right">Print</a></th>
											  </tr>
											</table>
										</td>
									</tr>
								
								</tbody>
					  </table>
					 <?php  } else { ?> 
					 <div class="alert alert-danger">
			<strong>Warning!</strong> Sorry System Could Not Find Anything. Please Check Information and Try Again!
		  </div>
		  			<?php } ?>
		  
			      </div>
				</div>
			</div>
	</body>		
            
	</html>
         <?php //$this->load->view('common/footer'); ?>
         <?php $this->load->view('common/jsLinkPage'); ?>
		 



