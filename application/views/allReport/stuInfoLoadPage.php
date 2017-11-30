<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-responsive table-condensed img-thumbnail">
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