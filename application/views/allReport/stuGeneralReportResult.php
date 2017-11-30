
			
  
   <div class="modal-content">
		<div class="modal-header btn-primary">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<span class="white">&times;</span>
				</button>
				<span style="font-size:18px; font-weight:bold">Student General Report Result</strong>"</span>
		</div>

		<div class="modal-body">
		<?php if($stuDetailsInfo || $stuParentsDetailsInfo || $stuGuardianDetailsInfo)  { 
		 ?>
		 
		 <?php if(!empty($stuDetailsInfo)) { ?>
		 	<div id="generalReport">
		 		<div class="midTitle">Student Details Information</div>
				<?php if(!empty($stuDetailsInfo)) { ?>
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-responsive table-condensed">
					  <tr>
						<td width="22%" align="left" valign="middle" ><strong>Student Full Name </strong></td>
						<td width="2%" align="center" valign="middle" ><strong>:</strong></td>
						<td width="24%" align="left" valign="middle" ><?php echo $stuDetailsInfo->stu_full_name; ?></td>
						<td width="1%" >&nbsp;</td>
						<td width="18%" align="left" valign="middle" ><strong> Campus/Branch </strong></td>
						<td width="2%" align="center" valign="middle" ><strong>:</strong></td>
						<td width="31%" align="left" valign="middle" ><?php echo $stuDetailsInfo->currClassInfo->branch_name; ?></td>
					  </tr>
					  <tr>
						<td align="left" valign="middle"><strong>Date of Birth </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuDetailsInfo->stu_birth_date; ?></td>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><strong>Student Class</strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuDetailsInfo->currClassInfo->class_name; ?></td>
					  </tr>
					  <tr>
						<td align="left" valign="middle"><strong>Sex/Gender </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuDetailsInfo->stu_sex; ?></td>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><strong>Group </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuDetailsInfo->currClassInfo->group_name; ?></td>
					  </tr>
					  <tr>
						<td align="left" valign="middle"><strong>Blood Group </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuDetailsInfo->stu_blood_group; ?></td>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><strong>Section </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuDetailsInfo->currClassInfo->section_name; ?></td>
					  </tr>
					  <tr>
						<td align="left" valign="middle"><strong>Special Remarkable Sign </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuDetailsInfo->stu_remarkabe_sign; ?></td>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><strong>Shift </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuDetailsInfo->currClassInfo->shift_name; ?></td>
					  </tr>
					  <tr>
						<td align="left" valign="middle"><strong> Mail Address </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuDetailsInfo->stu_mail_adrs; ?></td>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><strong> Class Roll </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuDetailsInfo->currClassInfo->class_roll; ?></td>
					  </tr>
					  <tr>
					    <td align="left" valign="middle"><strong> Present Address </strong></td>
					    <td align="center" valign="middle"><strong>:</strong></td>
					    <td align="left" valign="middle"><?php echo $stuDetailsInfo->f_pre_adrs; ?></td>
					    <td>&nbsp;</td>
					    <td align="left" valign="middle"><strong> Permenent Address </strong></td>
					    <td align="center" valign="middle"><strong>:</strong></td>
					    <td align="left" valign="middle"><?php echo $stuDetailsInfo->f_per_adrs; ?></td>
			      </tr>
					  <tr>
						<td align="left" valign="middle"><strong> Mobile/Cell No </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuDetailsInfo->stu_mobile; ?></td>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><strong>Nationality </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuDetailsInfo->nationality_name; ?></td>
					  </tr>
					  <tr>
						<td align="left" valign="middle"><strong>Passport No </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuDetailsInfo->stu_passport; ?></td>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><strong>Religion </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuDetailsInfo->religion_name; ?></td>
					  </tr>
					  <tr>
						<td align="left" valign="middle"><strong>National ID </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuDetailsInfo->stu_nid; ?></td>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><strong>Last School </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuDetailsInfo->stu_last_school; ?></td>
					  </tr>
					  <tr>
						<td align="left" valign="middle"><strong>Social Security No </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuDetailsInfo->stu_social_scr_no; ?></td>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><strong>Entry Date </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuDetailsInfo->stu_entry_date; ?></td>
					  </tr>
					  <tr>
						<td align="left" valign="middle"><strong>Student Type </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuDetailsInfo->stu_type; ?></td>
						<td>&nbsp;</td>
						<td align="left" valign="middle">&nbsp;</td>
						<td align="center" valign="middle">&nbsp;</td>
						<td align="left" valign="middle">&nbsp;</td>
					  </tr>
					  <tr>
						<td align="left" valign="middle">&nbsp;</td>
						<td>&nbsp;</td>
						<td align="left" valign="middle">&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td align="left" valign="middle">&nbsp;</td>
					  </tr>
		  </table>
		  <?php } ?>
		  </div>
		 <?php } ?> 
		 
		 
		 
		 <?php if(isset($stuParentsDetailsInfo)) { ?>
	 	  <div id="generalReport">
		 		<div class="midTitle">Student Parent's Details Information</div>
				<?php if(!empty($stuParentsDetailsInfo)) { ?>
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-responsive table-condensed">
					  <tr>
					    <td colspan="3" align="center" valign="middle" ><h4><u>Father's Details Information </u></h4></td>
					    <td >&nbsp;</td>
					    <td colspan="3" align="center" valign="middle" ><h4><u>Mother's Details Information </u></h4></td>
			      </tr>
					  <tr>
						<td width="23%" align="left" valign="middle" ><strong>Father's Name </strong></td>
						<td width="3%" align="center" valign="middle" ><strong>:</strong></td>
						<td width="25%" align="left" valign="middle" ><?php echo $stuParentsDetailsInfo->f_name; ?></td>
						<td width="2%" >&nbsp;</td>
						<td width="18%" align="left" valign="middle" ><strong> Mother's Name </strong></td>
						<td width="3%" align="center" valign="middle" ><strong>:</strong></td>
						<td width="26%" align="left" valign="middle" ><?php echo $stuParentsDetailsInfo->m_name; ?></td>
					  </tr>
					  <tr>
						<td align="left" valign="middle"><strong>Present Address </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuParentsDetailsInfo->f_pre_adrs; ?></td>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><strong>Present Address </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuParentsDetailsInfo->m_pre_adrs; ?></td>
					  </tr>
					  <tr>
						<td align="left" valign="middle"><strong>Permanent Address  </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuParentsDetailsInfo->f_per_adrs; ?></td>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><strong>Permanent Address </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuParentsDetailsInfo->m_per_adrs; ?></td>
					  </tr>
					  <tr>
						<td align="left" valign="middle"><strong>Occupation </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuParentsDetailsInfo->f_occupation; ?></td>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><strong>Occupation </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuParentsDetailsInfo->m_occupation; ?></td>
					  </tr>
					  <tr>
						<td align="left" valign="middle"><strong>Occupation Address </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuParentsDetailsInfo->f_occupation_adrs; ?></td>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><strong>Occupation Address </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuParentsDetailsInfo->m_occupation_adrs; ?></td>
					  </tr>
					  <tr>
						<td align="left" valign="middle"><strong> Yearly Income </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuParentsDetailsInfo->f_yearly_income; ?></td>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><strong> Yearly Income </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuParentsDetailsInfo->m_yearly_income; ?></td>
					  </tr>
					  <tr>
						<td align="left" valign="middle"><strong> Contace Phone/Cell </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuParentsDetailsInfo->f_mobile; ?></td>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><strong> Contace Phone/Cell </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuParentsDetailsInfo->m_mobile; ?></td>
					  </tr>
					  <tr>
						<td align="left" valign="middle"><strong>Contact E-mail </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuParentsDetailsInfo->f_email; ?></td>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><strong>Contact E-mail </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuParentsDetailsInfo->m_email; ?></td>
					  </tr>
					  <tr>
                        <td align="left" valign="middle"><strong>Passport No</strong></td>
					    <td align="center" valign="middle"><strong>:</strong></td>
					    <td align="left" valign="middle"><?php echo $stuParentsDetailsInfo->f_passport_no; ?></td>
					    <td>&nbsp;</td>
					    <td align="left" valign="middle"><strong>Passport No</strong></td>
					    <td align="center" valign="middle"><strong>:</strong></td>
					    <td align="left" valign="middle"><?php echo $stuParentsDetailsInfo->m_passport_no; ?></td>
  </tr>
					  <tr>
						<td align="left" valign="middle"><strong>National ID </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuParentsDetailsInfo->f_nid; ?></td>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><strong>National ID </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuParentsDetailsInfo->m_nid; ?></td>
					  </tr>
					  <tr>
						<td align="left" valign="middle"><strong>Driving Licence </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuParentsDetailsInfo->f_driving_licence; ?></td>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><strong>Driving Licence </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuParentsDetailsInfo->m_driving_licence; ?></td>
					  </tr>
					  
					  <tr>
						<td align="left" valign="middle">&nbsp;</td>
						<td>&nbsp;</td>
						<td align="left" valign="middle">&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td align="left" valign="middle">&nbsp;</td>
					  </tr>
		  </table>
		  <?php } ?>
		  </div>
		 <?php } ?> 
		 
		 
		 <?php if(isset($stuGuardianDetailsInfo)) { ?>
		 	<div id="generalReport">
		 		<div class="midTitle">Guardian Details Information</div>
				<?php if(!empty($stuGuardianDetailsInfo)) { ?>
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-responsive table-condensed">
					  
					  <tr>
						<td width="23%" align="left" valign="middle" ><strong>Name </strong></td>
						<td width="3%" align="center" valign="middle" ><strong>:</strong></td>
						<td width="25%" align="left" valign="middle" ><?php echo $stuGuardianDetailsInfo->g_name; ?></td>
						<td width="2%" >&nbsp;</td>
						<td width="18%" align="left" valign="middle" ><strong> Occupation Address </strong></td>
						<td width="3%" align="center" valign="middle" ><strong>:</strong></td>
						<td width="26%" align="left" valign="middle" ><?php echo $stuGuardianDetailsInfo->m_name; ?></td>
					  </tr>
					  <tr>
						<td align="left" valign="middle"><strong>Present Address </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuGuardianDetailsInfo->g_pre_adrs; ?></td>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><strong>Contact Phone/Cell </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuGuardianDetailsInfo->m_pre_adrs; ?></td>
					  </tr>
					  <tr>
						<td align="left" valign="middle"><strong>Permanent Address  </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuGuardianDetailsInfo->g_per_adrs; ?></td>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><strong>Contact Email </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuGuardianDetailsInfo->m_per_adrs; ?></td>
					  </tr>
					  <tr>
						<td align="left" valign="middle"><strong>Occupation </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuGuardianDetailsInfo->g_occupation; ?></td>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><strong>Passport No </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuGuardianDetailsInfo->m_occupation; ?></td>
					  </tr>
					  <tr>
						<td align="left" valign="middle">&nbsp;</td>
						<td align="center" valign="middle">&nbsp;</td>
						<td align="left" valign="middle">&nbsp;</td>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><strong>National ID </strong></td>
						<td align="center" valign="middle"><strong>:</strong></td>
						<td align="left" valign="middle"><?php echo $stuGuardianDetailsInfo->m_occupation_adrs; ?></td>
					  </tr>
					  
					  
					  
					  
					  
					  
					  
		  </table>
		  <?php } ?>
		  </div>
		 <?php } ?> 
		<?php } else { ?>
		<div class="alert alert-danger">
			<strong>Warning!</strong> Sorry System Could Not Find Anything. Please Check Information and Try Again!
		  </div>
		<?php } ?>
	
		</div>

		<div class="modal-footer no-margin-top">
			<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
				<i class="ace-icon fa fa-times"></i>
				Close
			</button>
			
		</div>
</div>
