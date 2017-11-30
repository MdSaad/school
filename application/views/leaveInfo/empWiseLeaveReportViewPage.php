
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-responsive table-condensed img-thumbnail">

  <tr>
    <td colspan="6" align="center" valign="middle"><strong style="font-size:14px">Leave Details </strong> </td>
  </tr>
  <tr>
    <td colspan="6">
	 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-responsive table-bordered">
      <tr  style="line-height:30px;">
        <td><strong>Leave Type</strong></td>
        <td><strong>Total Leave Days</strong></td>
        <td><strong>Leave Achieve</strong></td>
        <td width="13%"><strong>Available Leave</strong></td>
      </tr>
	  <?php 
   
    foreach($empWiseLeaveResutInfo as $v){
	$leaveAvailable = $v->leave_days - $v->countAllLeave;
		
 ?>
      <tr>
        <td><?php echo $v->leave_type ?></td>
        <td><?php echo $v->leave_days ?></td>
        <td><?php echo $v->countAllLeave ?></td>
        <td><?php echo $leaveAvailable ?></td>
      </tr>
	   <?php } ?>  
    </table>
	</td>
  </tr>
  <tr>
    <td width="28%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="31%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="27%">&nbsp;</td>
    <td width="11%">&nbsp;</td>
  </tr>

  
</table>

