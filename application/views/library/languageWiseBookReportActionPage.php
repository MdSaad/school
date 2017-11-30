<?php if(!empty($bookIssueDetails)){ ?>

<div class="col-sm-12 text-left" style="padding:0 0 5px 0; font-size:15px; font-weight:bold">Language Wise Issue Book Report Result  : </div>

	<table class="table table-striped table-bordered table-hover text-left empListTable">
		<thead>
			<tr>
			  <th class="center" width="5%">SL</th>
				<th width="12%">Language</th>
				<th width="15%">Book Type </th>
				<th class="hidden-480" width="10%">Class For </th>

				<th class="hidden-480" width="10%">Subject </th>
				<th class="hidden-480" width="10%">Book ID</th>
				<th width="12%">Book Name</th>
				<th width="12%">Issue Date </th>
				<th width="12%">Expire  Date </th>
			</tr>
		</thead>

		<tbody>
		<?php
			$i = 1;
			 foreach($bookIssueDetails as $v) { 
		
		?>
			<tr>
			  <td class="center"><?php echo $i++ ?></td>
				<td width="10%" align="left"><?php echo $v->issue_language ?></td>
				
				<td class="hidden-480"><?php echo $v->book_type_name ?></td>
				<td class=""><?php echo $v->class_name ?></td>
				<td class="hidden-480"><?php echo $v->library_subject_name ?></td>

				<td class="hidden-480"><?php echo $v->book_id ?></td>
			    <td class="hidden-480"><?php echo $v->book_name ?></td>
			    <td class="hidden-480"><?php echo $v->issue_date ?></td>
		      <td class="hidden-480"><?php echo $v->valid_till_date ?></td>
			</tr>
		 <?php } ?>	
		</tbody>
	</table>
	
	<?php }else if(!empty($stuBookIssueDetails)){ ?>
	
	   <div class="col-sm-12 text-left" style="padding:0 0 5px 20; font-size:15px; font-weight:bold">Student Wise Issue Book Report Result  : </div>
	   
	   <table width="100%" border="0" class="table-responsive">
			  <tr>
				<td colspan="8" align="center" valign="middle"><table width="100%" border="0">
				  <tr style="line-height:50px">
					<td width="33%">&nbsp;</td>
					<td width="31%" align="center" valign="middle"><strong style="font-size:20px; text-decoration:underline">Student Information </strong></td>
					<td width="36%" align="right" valign="middle" style="padding-right:20px">
					   <?php if(!empty($studentDetails->stu_photo)){ ?>
						   <img src="<?php echo base_url("resource/stu_photo/$studentDetails->stu_photo") ?>" width="50" height="50" />
						 <?php } else {  if($studentDetails->stu_sex == 'M'){ ?>
							 <img src="<?php echo base_url('resource/img/male.png'); ?>" width="50" height="50">  
						 <?php } else {  ?>
						 <img src="<?php echo base_url('resource/img/EmptyProfile.png'); ?>" width="50" height="50">  
						 <?php } } ?>																	 </td>
				  </tr>
				</table></td>
</tr>
			  <tr>
				<td width="3%">&nbsp;</td>
				<td width="19%" align="left" valign="middle"><strong>Student Name</strong></td>
				<td width="2%" align="center" valign="middle"><strong>:</strong></td>
				<td width="24%" align="left" valign="middle"><?php echo $studentDetails->stu_full_name ?></td>
				<td width="20%" align="left" valign="middle"><strong>Student Id</strong></td>
				<td width="2%" align="center" valign="middle"><strong>:</strong></td>
				<td width="30%" align="left" valign="middle"><?php echo $studentDetails->stu_id ?></td>
				<td width="0%">&nbsp;</td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td align="left" valign="middle"><strong>Branch</strong></td>
				<td align="center" valign="middle"><strong>:</strong></td>
				<td align="left" valign="middle"><?php echo $studentDetails->branch_name ?></td>
				<td align="left" valign="middle"><strong>Group</strong></td>
				<td align="center" valign="middle"><strong>:</strong></td>
				<td align="left" valign="middle"><?php echo $studentDetails->group_name ?></td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td align="left" valign="middle"><strong>Class</strong></td>
				<td align="center" valign="middle"><strong>:</strong></td>
				<td align="left" valign="middle"><?php echo $studentDetails->class_name ?></td>
				<td align="left" valign="middle"><strong>Class Roll </strong></td>
				<td align="center" valign="middle"><strong>:</strong></td>
				<td align="left" valign="middle"><?php echo $studentDetails->class_roll ?></td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td align="left" valign="middle"><strong>Section</strong></td>
				<td align="center" valign="middle"><strong>:</strong></td>
				<td align="left" valign="middle"><?php echo $studentDetails->section_name ?></td>
				<td align="left" valign="middle"><strong>Shift</strong></td>
				<td align="center" valign="middle"><strong>:</strong></td>
				<td align="left" valign="middle"><?php echo $studentDetails->shift_name ?></td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td align="left" valign="middle">&nbsp;</td>
				<td align="center" valign="middle">&nbsp;</td>
				<td align="left" valign="middle">&nbsp;</td>
				<td align="left" valign="middle"><strong>Year</strong></td>
				<td align="center" valign="middle"><strong>:</strong></td>
				<td align="left" valign="middle"><?php echo $studentDetails->year ?></td>
				<td>&nbsp;</td>
			  </tr>
			</table>
			
		<br />

	<table class="table table-striped table-bordered table-hover text-left">
		<thead>
			<tr>
			  <th class="center" width="5%">SL</th>
				<th class="hidden-480" width="10%">Book ID</th>
				<th width="12%">Book Name</th>
				<th width="12%">Issue Date </th>
				<th width="12%">Expire  Date </th>
			</tr>
		</thead>

		<tbody>
		<?php
			$i = 1;
			 foreach($stuBookIssueDetails as $v) { 
		
		?>
			<tr>
			  <td class="center"><?php echo $i++ ?></td>
				<td class="hidden-480"><?php echo $v->book_id ?></td>
			    <td class="hidden-480"><?php echo $v->book_name ?></td>
			    <td class="hidden-480"><?php echo $v->issue_date ?></td>
		      <td class="hidden-480"><?php echo $v->valid_till_date ?></td>
			</tr>
		 <?php } ?>	
		</tbody>
	</table>
	<?php } else { ?>
	    <div class="col-sm-12 text-center" style="padding:0 0 5px 20; font-size:15px; font-weight:bold; color:#FF0000">No Book Issue Yet </div>
	
	 <?php } ?>	
