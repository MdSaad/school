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
						
						<h4 class="text-center"><u>Earning Fee Collection Report</u></h4>
						
					 
					 <?php 
					 if(!empty($classWiseFeeCollection)) {  
					 $classInfo 	=  $this->M_crud->findById('class_list_manage', array('id' => $class_id));
					 $groupInfo 	=  $this->M_crud->findById('group_list_manage', array('id' => $group_id));
					 $sectionInfo 	=  $this->M_crud->findById('section_list_manage', array('id' => $section_id));
					 $shiftInfo 	=  $this->M_crud->findById('shift_list_manage', array('id' => $shift_id)); 
					 
					 ?>
					 	<table width="85%" border="0" cellspacing="0" cellpadding="0" class="table-bordered table table-striped">
									  <tr>
										<td><strong>Class</strong> : <?php echo $classInfo->class_name; ?> </td>
										<td><strong>Group</strong> : <?php echo $groupInfo->group_name; ?> </td>
										<td><strong>Section</strong> : <?php echo $sectionInfo->section_name; ?> </td>
										<td><strong>Shift</strong> : <?php echo $shiftInfo->shift_name; ?> </td>
										<!-- <td><strong>Version</strong> : <?php echo $version; ?> </td> -->
									  </tr>
									  
									  
									  <tr>
										<td colspan="5">From <strong><?php echo date("d-M-Y", strtotime($fromDate)); ?></strong> To <strong><?php echo date("d-M-Y", strtotime($toDate)); ?></strong> </td>
									  </tr>
									  <tr>
										<td colspan="5" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped" style="width:100%">
                                          
										 
										  <tr>
                                            <th>SL</th>
                                            <th>Student ID</th>
                                            <th>Student Name</th>
											<th>Paid Amount</th>
                                          </tr>
										   <?php 
										    $i	= 1;
										   	$totalAmount = 0;
											foreach($classWiseFeeCollection as $v) {
											$totalAmount	= $totalAmount+$v->paidTotal;
										   
										    ?>
                                          <tr>
                                            <td><?php echo $i++; ?></td>
											<td><?php echo $v->stu_current_id; ?></td>
                                            <td><?php echo $v->stu_full_name; ?></td>
                                            <td><?php echo number_format($v->paidTotal,2); ?>/-</td>
                                          </tr>
										 <?php } ?> 
										 <tr>
                                            <td colspan="3" class="text-right"><strong>Total</strong></td>
                                            <td><strong><?php echo number_format($totalAmount,2); ?>/-</strong></td>
                                          </tr>
                                        </table></td>
									  </tr>
									</table>
									<h4><i class="ace-icon fa fa-print hand pull-right" title="Print" onClick="printMultiPart('.aFourSize');"></i></h4>
					 <?php } else { ?> 
					 <div class="alert alert-danger">
			<strong>Message!</strong> Sorry System Could Not Find Anything. Please Check Information and Try Again!
		  </div>
		  			<?php } ?>
		  
			      </div>
				</div>
			</div>
	</body>		
            
	</html>
         <?php //$this->load->view('common/footer'); ?>
         <?php $this->load->view('common/jsLinkPage'); ?>
		 



