<div class="modal-content" style="z-index:10 !important">
<div class="modal-header" style="border-bottom:2px solid #FF0000">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 class="modal-title" id="myModalLabel">Salary Sheet Of => <strong style="color:#007814"> <?php $dateFormate= strtotime($monthYear); echo date('M-Y', $dateFormate); ?> </strong></h3>
</div>
  
<!-- <pre class="report-pre modal-body report-modal-body"> -->
<div class="modal-body" style="width: 100%; height:600px; overflow-x:auto;">
   <div class="row">

<?php 
     if(!empty($empSalarySheet)){ 
?>
    
  <table width="190%" border="0" class="table-condensed table-bordered">
  <tr>
    <td rowspan="2" align="center" valign="middle" width="10%"><strong>Name</strong></td>
    <td rowspan="2" align="center" valign="middle" width="6%"><strong>Designition</strong></td>
    <td rowspan="2" align="center" valign="middle"><strong>Joining Date </strong></td>
    <td rowspan="2" align="center" valign="middle" width="10%"><strong>Job Duration </strong></td>
    <td colspan="5" align="center" valign="middle"><strong>Attendance Details </strong></td>
    <td colspan="2" align="center" valign="middle"><strong>Earning Details </strong></td>
    <td rowspan="2" align="center" valign="middle" width="5%"><strong>Total Salary </strong></td>
    <td colspan="2" align="center" valign="middle"><strong>Allowance</strong></td>
    <td rowspan="2"  align="center" valign="middle"><strong>Total Allowance </strong></td>
    <td colspan="4" align="center" valign="middle"><strong>Benifits</strong></td>
	<td rowspan="2" align="center" valign="middle"><strong>Total Benifit </strong></td>
	<td rowspan="2" align="center" valign="middle"><strong>Gross Salary </strong></td>
    <td colspan="5" align="center" valign="middle"><strong>Deduction Details </strong></td>
    <td rowspan="2" align="center" valign="middle"><strong>Total Deduction </strong></td>
    <td rowspan="2" align="center" valign="middle" width="4%"><strong>Net Salary</strong></td>
    <td rowspan="2" align="center" valign="middle" width="4%"><strong>Bank Account No.</strong></td>
    </tr>
  <tr>
     <?php 
	    $countHolyDay = 0;
		$countAttenDay = 0;
		if(!empty($v)){
			if($v->day1 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day2 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day3 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day4 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day5 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day6 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day7 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day8 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day9 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day10 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day11 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day12 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day13 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day14 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day15 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day16 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day17 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day18 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day19 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day20 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day21 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day22 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day23 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day24 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day25 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day26 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day27 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day28 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day29 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day30 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day31 == 'F') $countHolyDay = $countHolyDay + 1;  	
		
		
			if($v->day1 == 1) $countAttenDay = $countAttenDay + 1; if($v->day2 == 2) $countAttenDay = $countAttenDay + 1; if($v->day3 == 3) $countAttenDay = $countAttenDay + 1;
			if($v->day4 == 4) $countAttenDay = $countAttenDay + 1; if($v->day5 == 5) $countAttenDay = $countAttenDay + 1; if($v->day6 == 6) $countAttenDay = $countAttenDay + 1;
			if($v->day7 == 7) $countAttenDay = $countAttenDay + 1; if($v->day8 == 8) $countAttenDay = $countAttenDay + 1; if($v->day9 == 9) $countAttenDay = $countAttenDay + 1;
			if($v->day10 == 10) $countAttenDay = $countAttenDay + 1; if($v->day11 == 11) $countAttenDay = $countAttenDay + 1; if($v->day12 == 12) $countAttenDay = $countAttenDay + 1;
			if($v->day13 == 13) $countAttenDay = $countAttenDay + 1; if($v->day14 == 14) $countAttenDay = $countAttenDay + 1; if($v->day15 == 15) $countAttenDay = $countAttenDay + 1;
			if($v->day16 == 16) $countAttenDay = $countAttenDay + 1; if($v->day17 == 17) $countAttenDay = $countAttenDay + 1; if($v->day18 == 18) $countAttenDay = $countAttenDay + 1;
			if($v->day19 == 19) $countAttenDay = $countAttenDay + 1; if($v->day20 == 20) $countAttenDay = $countAttenDay + 1; if($v->day21 == 21) $countAttenDay = $countAttenDay + 1;
			if($v->day22 == 22) $countAttenDay = $countAttenDay + 1; if($v->day23 == 23) $countAttenDay = $countAttenDay + 1; if($v->day24 == 24) $countAttenDay = $countAttenDay + 1;
			if($v->day25 == 25) $countAttenDay = $countAttenDay + 1; if($v->day26 == 26) $countAttenDay = $countAttenDay + 1; if($v->day27 == 27) $countAttenDay = $countAttenDay + 1;
			if($v->day28 == 28) $countAttenDay = $countAttenDay + 1; if($v->day29 == 29) $countAttenDay = $countAttenDay + 1; if($v->day30 == 30) $countAttenDay = $countAttenDay + 1;
			if($v->day31 == 31) $countAttenDay = $countAttenDay + 1;  	
		}
		
		$totalHolyday 	= $countHolyDay + $countAllCustom;  
		$countWorkDay   =  $numberOfDay - $totalHolyday;
		$totalPresent   = $countAttenDay + $countAllLeave;
		$countAbsence   = $countWorkDay - $totalPresent;
		
		
		$totalAllowance = $empSalarySheet->ta + $empSalarySheet->da + $empSalarySheet->food_allowance + $empSalarySheet->medical_allowance + $empSalarySheet->mobile_allowance + $empSalarySheet->security_amount + $empSalarySheet->phone_allowance; 
		
		$totalAl        = $totalAllowance + $empSalarySheet->special_allowance;
        $totalBenifit   = $toatlExtraDutyPayment + $toatlHeadship + $toatlArrear + $toatlOther; 	
		$taoatalGrossSalary   = $empSalarySheet->sallary + $totalAl + $totalBenifit;
		$taoatalDeduction     = $toatlAbsent + $toatlTax + $toatlRevenue + $toatlAdvance + $toatlother;	
		$netSalary            = $taoatalGrossSalary - $taoatalDeduction;
		
		
		
		
												     			 
												     		
	 ?>
    <td align="center" valign="middle"><strong>TWD</strong></td>
    <td align="center" valign="middle"><strong>Present</strong></td>
    <td align="center" valign="middle"><strong>Leave</strong></td>
    <td align="center" valign="middle"><strong>Absent</strong></td>
    <td align="center" valign="middle"><strong>Extra Duty </strong></td>
    <td align="center" valign="middle" width="4%"><strong>Basic</strong></td>
    <td align="center" valign="middle"><strong>House Rent </strong></td>
    <td align="center" valign="middle"><strong>Allowance</strong></td>
    <td align="center" valign="middle"><strong>Special</strong></td>
    <td align="center" valign="middle"><strong>Extra Duty Payment </strong></td>
    <td align="center" valign="middle"><strong>Headship/ Coordinatorship </strong></td>
    <td align="center" valign="middle"><strong>Arrear</strong></td>
    <td align="center" valign="middle"><strong>Other</strong></td>
    <td align="center" valign="middle"><strong>Absent</strong></td>
    <td align="center" valign="middle" width="2%"><strong>Tax</strong></td>
    <td align="center" valign="middle"><strong>Revenue Stamps</strong></td>
    <td align="center" valign="middle"><strong>Loan/Advance</strong></td>
    <td align="center" valign="middle"><strong>Other</strong></td>
    </tr>
  <tr>
    <td align="center" valign="middle"><?php echo $empSalarySheet->employee_full_name ?></td>
    <td align="center" valign="middle"><?php echo $empSalarySheet->designition_name ?></td>
    <td align="center" valign="middle"><?php echo $empSalarySheet->initiate_joining_date ?></td>
    <td align="center" valign="middle"> <?php 
		       if(!empty($empSalarySheet->initiate_joining_date)){ 
			    $today = date('Y-m-d');
			   
				$joiningDtae = new DateTime($empSalarySheet->initiate_joining_date);
				$currentDate = new DateTime($today);
				$diff = $joiningDtae->diff($currentDate);

				echo "Year : " . $diff->y . " Month : " . $diff->m." Days : ".$diff->d;
				 
			}

		 ?></td>
    <td align="center" valign="middle"><?php echo $countWorkDay ?></td>
    <td align="center" valign="middle"><?php echo $totalPresent ?></td>
    <td align="center" valign="middle"><?php echo $countAllLeave ?></td>
    <td align="center" valign="middle"><?php echo $countAbsence ?></td>
    <td align="center" valign="middle">&nbsp;</td>
    <td align="center" valign="middle"><?php echo $empSalarySheet->basic ?></td>
    <td align="center" valign="middle"><?php echo $empSalarySheet->house_rent ?></td>
    <td align="center" valign="middle"><?php echo $empSalarySheet->sallary ?></td>
    <td align="center" valign="middle"><?php echo $totalAllowance ?></td>
    <td align="center" valign="middle"><?php echo $empSalarySheet->special_allowance ?> </td>
    <td align="center" valign="middle"><?php echo $totalAl ?></td>
    <td align="center" valign="middle"><?php echo $toatlExtraDutyPayment ?></td>
    <td align="center" valign="middle"><?php echo $toatlHeadship ?></td>
    <td align="center" valign="middle"><?php echo $toatlArrear ?></td>
    <td align="center" valign="middle"><?php echo $toatlOther ?></td>
    <td align="center" valign="middle"><?php echo $totalBenifit ?></td>
    <td align="center" valign="middle"><?php echo $taoatalGrossSalary ?></td>
    <td align="center" valign="middle"><?php echo $toatlAbsent ?></td>
    <td align="center" valign="middle"><?php echo $toatlTax ?></td>
    <td align="center" valign="middle"><?php echo $toatlRevenue ?></td>
    <td align="center" valign="middle"><?php echo $toatlAdvance ?></td>
    <td align="center" valign="middle"><?php echo $toatlother ?></td>
    <td align="center" valign="middle"><?php echo $taoatalDeduction ?></td>
    <td align="center" valign="middle"><?php echo $netSalary ?></td>
    <td align="center" valign="middle"><?php echo $empBankDetails->account_no ?></td>
    </tr>
</table>

<?php }else if($allEmpSalarySheetInfo){ ?>
  
    <table width="190%" border="0" class="table-condensed table-bordered">
  <tr>
    <td rowspan="2" align="center" valign="middle" width="2%"><strong>Sl</strong></td>
    <td rowspan="2" align="center" valign="middle" width="10%"><strong>Name</strong></td>
    <td rowspan="2" align="center" valign="middle" width="6%"><strong>Designition</strong></td>
    <td rowspan="2" align="center" valign="middle"><strong>Joining Date </strong></td>
    <td rowspan="2" align="center" valign="middle" width="10%"><strong>Job Duration </strong></td>
    <td colspan="5" align="center" valign="middle"><strong>Attendance Details </strong></td>
    <td colspan="2" align="center" valign="middle"><strong>Earning Details </strong></td>
    <td rowspan="2" align="center" valign="middle" width="5%"><strong>Total Salary </strong></td>
    <td colspan="2" align="center" valign="middle"><strong>Allowance</strong></td>
    <td rowspan="2"  align="center" valign="middle"><strong>Total Allowance </strong></td>
    <td colspan="4" align="center" valign="middle"><strong>Benifits</strong></td>
	<td rowspan="2" align="center" valign="middle"><strong>Total Benifit </strong></td>
	<td rowspan="2" align="center" valign="middle"><strong>Gross Salary </strong></td>
    <td colspan="5" align="center" valign="middle"><strong>Deduction Details </strong></td>
    <td rowspan="2" align="center" valign="middle"><strong>Total Deduction </strong></td>
    <td rowspan="2" align="center" valign="middle" width="4%"><strong>Net Salary</strong></td>
    <td rowspan="2" align="center" valign="middle" width="4%"><strong>Bank Account No.</strong></td>
    </tr>
  <tr>
     <?php 
	    /*$countHolyDay = 0;
		$countAttenDay = 0;
		if(!empty($v)){
			if($v->day1 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day2 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day3 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day4 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day5 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day6 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day7 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day8 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day9 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day10 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day11 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day12 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day13 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day14 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day15 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day16 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day17 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day18 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day19 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day20 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day21 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day22 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day23 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day24 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day25 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day26 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day27 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day28 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day29 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day30 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day31 == 'F') $countHolyDay = $countHolyDay + 1;  	
		
		
			if($v->day1 == '1') $countAttenDay = $countAttenDay + 1; if($v->day2 == 2) $countAttenDay = $countAttenDay + 1; if($v->day3 == 'F') $countAttenDay = $countAttenDay + 1;
			if($v->day4 == 4) $countAttenDay = $countAttenDay + 1; if($v->day5 == 5) $countAttenDay = $countAttenDay + 1; if($v->day6 == 6) $countAttenDay = $countAttenDay + 1;
			if($v->day7 == 7) $countAttenDay = $countAttenDay + 1; if($v->day8 == 8) $countAttenDay = $countAttenDay + 1; if($v->day9 == 9) $countAttenDay = $countAttenDay + 1;
			if($v->day10 == 10) $countAttenDay = $countAttenDay + 1; if($v->day11 == 11) $countAttenDay = $countAttenDay + 1; if($v->day12 == 12) $countAttenDay = $countAttenDay + 1;
			if($v->day13 == 13) $countAttenDay = $countAttenDay + 1; if($v->day14 == 14) $countAttenDay = $countAttenDay + 1; if($v->day15 == 15) $countAttenDay = $countAttenDay + 1;
			if($v->day16 == 16) $countAttenDay = $countAttenDay + 1; if($v->day17 == 17) $countAttenDay = $countAttenDay + 1; if($v->day18 == 18) $countAttenDay = $countAttenDay + 1;
			if($v->day19 == 19) $countAttenDay = $countAttenDay + 1; if($v->day20 == 20) $countAttenDay = $countAttenDay + 1; if($v->day21 == 21) $countAttenDay = $countAttenDay + 1;
			if($v->day22 == 22) $countAttenDay = $countAttenDay + 1; if($v->day23 == 23) $countAttenDay = $countAttenDay + 1; if($v->day24 == 24) $countAttenDay = $countAttenDay + 1;
			if($v->day25 == 25) $countAttenDay = $countAttenDay + 1; if($v->day26 == 26) $countAttenDay = $countAttenDay + 1; if($v->day27 == 27) $countAttenDay = $countAttenDay + 1;
			if($v->day28 == 28) $countAttenDay = $countAttenDay + 1; if($v->day29 == 29) $countAttenDay = $countAttenDay + 1; if($v->day30 == 30) $countAttenDay = $countAttenDay + 1;
			if($v->day31 == 31) $countAttenDay = $countAttenDay + 1;  	
		}
		
		$totalHolyday 	= $countHolyDay + $countAllCustom;  
		$countWorkDay   =  $numberOfDay - $totalHolyday;
		$totalPresent   = $countAttenDay + $countAllLeave;
		$countAbsence   = $countWorkDay - $totalPresent;
		*/
		
		
		
												     			 
												     		
	 ?>
    <td align="center" valign="middle"><strong>TWD</strong></td>
    <td align="center" valign="middle"><strong>Present</strong></td>
    <td align="center" valign="middle"><strong>Leave</strong></td>
    <td align="center" valign="middle"><strong>Absent</strong></td>
    <td align="center" valign="middle"><strong>Extra Duty </strong></td>
    <td align="center" valign="middle" width="4%"><strong>Basic</strong></td>
    <td align="center" valign="middle"><strong>House Rent </strong></td>
    <td align="center" valign="middle"><strong>Allowance</strong></td>
    <td align="center" valign="middle"><strong>Special</strong></td>
    <td align="center" valign="middle"><strong>Extra Duty Payment </strong></td>
    <td align="center" valign="middle"><strong>Headship/ Coordinatorship </strong></td>
    <td align="center" valign="middle"><strong>Arrear</strong></td>
    <td align="center" valign="middle"><strong>Other</strong></td>
    <td align="center" valign="middle"><strong>Absent</strong></td>
    <td align="center" valign="middle" width="2%"><strong>Tax</strong></td>
    <td align="center" valign="middle"><strong>Revenue Stamps</strong></td>
    <td align="center" valign="middle"><strong>Loan/Advance</strong></td>
    <td align="center" valign="middle"><strong>Other</strong></td>
    </tr>
	<?php 
	    $countHolyDay = 0;
		$countAttenDay = 0;
		$sl = 1;
	    foreach($allEmpSalarySheetInfo as $v){
		  
		$totalAllowance 	  = $v->ta + $v->da + $v->food_allowance + $v->medical_allowance + $v->mobile_allowance + $v->security_amount + $v->phone_allowance; 
		
		$totalAl        	  = $totalAllowance + $v->special_allowance;
        $totalBenifit   	  = $v->toatlExtraDutyPayment + $v->toatlHeadship + $v->toatlArrear + $v->toatlOther; 	
		$taoatalGrossSalary   = $v->sallary + $totalAl + $totalBenifit;
		$taoatalDeduction     = $v->toatlAbsent + $v->toatlTax + $v->toatlRevenue + $v->toatlAdvance + $v->toatlother;	
		$netSalary            = $taoatalGrossSalary - $taoatalDeduction;
		
		
		if(!empty($v)){
			if($v->day1 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day2 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day3 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day4 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day5 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day6 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day7 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day8 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day9 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day10 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day11 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day12 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day13 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day14 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day15 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day16 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day17 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day18 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day19 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day20 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day21 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day22 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day23 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day24 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day25 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day26 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day27 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day28 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day29 == 'F') $countHolyDay = $countHolyDay + 1; if($v->day30 == 'F') $countHolyDay = $countHolyDay + 1;
			if($v->day31 == 'F') $countHolyDay = $countHolyDay + 1;  	
		
		
			if($v->day1 == 1) $countAttenDay = $countAttenDay + 1; if($v->day2 == 2) $countAttenDay = $countAttenDay + 1; if($v->day3 == 3) $countAttenDay = $countAttenDay + 1;
			if($v->day4 == 4) $countAttenDay = $countAttenDay + 1; if($v->day5 == 5) $countAttenDay = $countAttenDay + 1; if($v->day6 == 6) $countAttenDay = $countAttenDay + 1;
			if($v->day7 == 7) $countAttenDay = $countAttenDay + 1; if($v->day8 == 8) $countAttenDay = $countAttenDay + 1; if($v->day9 == 9) $countAttenDay = $countAttenDay + 1;
			if($v->day10 == 10) $countAttenDay = $countAttenDay + 1; if($v->day11 == 11) $countAttenDay = $countAttenDay + 1; if($v->day12 == 12) $countAttenDay = $countAttenDay + 1;
			if($v->day13 == 13) $countAttenDay = $countAttenDay + 1; if($v->day14 == 14) $countAttenDay = $countAttenDay + 1; if($v->day15 == 15) $countAttenDay = $countAttenDay + 1;
			if($v->day16 == 16) $countAttenDay = $countAttenDay + 1; if($v->day17 == 17) $countAttenDay = $countAttenDay + 1; if($v->day18 == 18) $countAttenDay = $countAttenDay + 1;
			if($v->day19 == 19) $countAttenDay = $countAttenDay + 1; if($v->day20 == 20) $countAttenDay = $countAttenDay + 1; if($v->day21 == 21) $countAttenDay = $countAttenDay + 1;
			if($v->day22 == 22) $countAttenDay = $countAttenDay + 1; if($v->day23 == 23) $countAttenDay = $countAttenDay + 1; if($v->day24 == 24) $countAttenDay = $countAttenDay + 1;
			if($v->day25 == 25) $countAttenDay = $countAttenDay + 1; if($v->day26 == 26) $countAttenDay = $countAttenDay + 1; if($v->day27 == 27) $countAttenDay = $countAttenDay + 1;
			if($v->day28 == 28) $countAttenDay = $countAttenDay + 1; if($v->day29 == 29) $countAttenDay = $countAttenDay + 1; if($v->day30 == 30) $countAttenDay = $countAttenDay + 1;
			if($v->day31 == 31) $countAttenDay = $countAttenDay + 1;  	
		}
		
		$totalHolyday 	= $countHolyDay + $v->countAllCustom;  
		$countWorkDay   = $numberOfDay - $totalHolyday;
		$totalPresent   = $countAttenDay + $v->countAllLeave;
		$countAbsence   = $countWorkDay - $totalPresent;
		
		
	 ?>
      <tr>
        <td align="center" valign="middle"><?php echo $sl++ ?></td>
    <td align="center" valign="middle"><?php echo $v->employee_full_name ?></td>
    <td align="center" valign="middle"><?php echo $v->designition_name ?></td>
    <td align="center" valign="middle"><?php echo $v->initiate_joining_date ?></td>
    <td align="center" valign="middle"> <?php 
		       if(!empty($v->initiate_joining_date)){ 
			    $today = date('Y-m-d');
			   
				$joiningDtae = new DateTime($v->initiate_joining_date);
				$currentDate = new DateTime($today);
				$diff = $joiningDtae->diff($currentDate);

				echo "Year : " . $diff->y . " Month : " . $diff->m." Days : ".$diff->d;
				 
			}

		 ?></td>
    <td align="center" valign="middle"><?php echo $countWorkDay ?></td>
    <td align="center" valign="middle"><?php echo $totalPresent ?></td>
    <td align="center" valign="middle"><?php echo $v->countAllLeave ?></td>
    <td align="center" valign="middle"><?php echo $countAbsence ?></td>
    <td align="center" valign="middle">&nbsp;</td>
    <td align="center" valign="middle"><?php echo $v->basic ?></td>
    <td align="center" valign="middle"><?php echo $v->house_rent ?></td>
    <td align="center" valign="middle"><?php echo $v->sallary ?></td>
    <td align="center" valign="middle"><?php echo $totalAllowance ?></td>
    <td align="center" valign="middle"><?php echo $v->special_allowance ?> </td>
    <td align="center" valign="middle"><?php echo $totalAl ?></td>
    <td align="center" valign="middle"><?php echo $v->toatlExtraDutyPayment ?></td>
    <td align="center" valign="middle"><?php echo $v->toatlHeadship ?></td>
    <td align="center" valign="middle"><?php echo $v->toatlArrear ?></td>
    <td align="center" valign="middle"><?php echo $v->toatlOther ?></td>
    <td align="center" valign="middle"><?php echo $totalBenifit ?></td>
    <td align="center" valign="middle"><?php echo $taoatalGrossSalary ?></td>
    <td align="center" valign="middle"><?php echo $v->toatlAbsent ?></td>
    <td align="center" valign="middle"><?php echo $v->toatlTax ?></td>
    <td align="center" valign="middle"><?php echo $v->toatlRevenue ?></td>
    <td align="center" valign="middle"><?php echo $v->toatlAdvance ?></td>
    <td align="center" valign="middle"><?php echo $v->toatlother ?></td>
    <td align="center" valign="middle"><?php echo $taoatalDeduction ?></td>
    <td align="center" valign="middle"><?php echo $netSalary ?></td>
    <td align="center" valign="middle"><?php echo $v->bankAccountName->account_no ?></td>
    </tr>
    <?php $countHolyDay = 0; $countAttenDay = 0; } ?>
</table>
<?php }else{ ?>
   <span style="color:#FF0000">Salary Sheet not create Yet</span>
<?php } ?>



      
   </div>

    
</div>
    

<div class="modal-footer">
</div>
</div>



