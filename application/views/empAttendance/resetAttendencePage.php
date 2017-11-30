<form id="resetAtten" action="<?php echo site_url('empAttendance/attendenceResetAction'); ?>" method="post">
<input type="hidden" name="empId" value="<?php echo $empId ?>" />
<input type="hidden" name="monthYear" value="<?php echo $monthYear ?>" />
<div class="modal-content" style="z-index:10 !important">
<div class="modal-header" style="border-bottom:2px solid #FF0000">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 class="modal-title" id="myModalLabel">Reset Attendence</h3>
</div>
  
<!-- <pre class="report-pre modal-body report-modal-body"> -->
<div class="modal-body" style="width: 100%; overflow-x:auto;">
   <div class="row">


      <table  width="100%" border="0" cellspacing="0" cellpadding="0" class="table-condensed table-bordered" style="border-bottom:1px solid #FF0000;">
              
              <tr style="font-size:13px">
                <td width="15%"><strong>Id : </strong><?php echo $empDetails->employee_id ?></td>
                <td width="89%" colspan="2" align="left" valign="middle"><strong>Name : </strong><?php echo $empDetails->employee_full_name ?></td>
              </tr>
              <tr>
                <td colspan="4" align="left" valign="middle">
              <table id="inputTable" width="100%" border="0" cellspacing="0" cellpadding="0" class="table-condensed table-bordered" style="font-weight: bold;">
              
                  <?php 
                     // print_r($leaveArray);
                      $totalDay =  date("t",mktime(0,0,0,$givenMonth,1,$givenYear));

                 ?>
                <tr style="font-size:13px">
                  <td align="center" valign="middle">1</td>
                  <td align="center" valign="middle">2</td>
                  <td align="center" valign="middle">3</td>
                  <td align="center" valign="middle">4</td>
                  <td align="center" valign="middle">5</td>
                  <td align="center" valign="middle">6</td>
                  <td align="center" valign="middle">7</td>
                  <td align="center" valign="middle">8</td>
                  <td align="center" valign="middle">9</td>
                  <td align="center" valign="middle">10</td>
                  <td align="center" valign="middle">11</td>
                  <td align="center" valign="middle">12</td>
                  <td align="center" valign="middle">13</td>
                  <td align="center" valign="middle">14</td>
                  <td align="center" valign="middle">15</td>
                  <td align="center" valign="middle">16</td>
                  <td align="center" valign="middle">17</td>
                  <td align="center" valign="middle">18</td>
                  <td align="center" valign="middle">19</td>
                  <td align="center" valign="middle">20</td>
                  <td align="center" valign="middle">21</td>
                  <td align="center" valign="middle">22</td>
                  <td align="center" valign="middle">23</td>
                  <td align="center" valign="middle">24</td>
                  <td align="center" valign="middle">25</td>
                  <td align="center" valign="middle">26</td>
                  <td align="center" valign="middle">27</td>
                  <td align="center" valign="middle">28</td>
                  <?php if($totalDay > 28){ ?>
                    <td align="center" valign="middle">29</td>
                  <?php } if($totalDay > 29){ ?>
                  <td align="center" valign="middle">30</td>
                  <?php } if($totalDay > 30){ ?>
                   <td align="center" valign="middle">31</td>
                   <?php } ?>
                </tr>
        
        
                
          
         <tr style="font-size:13px">
                  <td align="center" valign="middle">
                     <?php if(in_array(1, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(1, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                    <input type="checkbox"  class="ace" name="day1" value="F" style="display: none" checked>
					 <?php }else if(in_array(1, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day1" value="1" <?php if($empAttnInfo->day1 == 1){ echo 'checked'; } ?> >
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                    <?php if(in_array(2, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(2, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day2" value="F" style="display: none" checked>
                    <?php }else if(in_array(2, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day2" value="2" <?php if($empAttnInfo->day2 == 2){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                     <?php if(in_array(3, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(3, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day3" value="F" style="display: none" checked>
                    <?php }else if(in_array(3, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day3" value="3" <?php if($empAttnInfo->day3 == 3){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                    <?php if(in_array(4, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(4, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day4" value="F" style="display: none" checked>
                    <?php }else if(in_array(4, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day4" value="4" <?php if($empAttnInfo->day4 == 4){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                     <?php if(in_array(5, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(5, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day5" value="F" style="display: none" checked>
                    <?php }else if(in_array(5, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day5" value="5" <?php if($empAttnInfo->day5 == 5){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                    <?php if(in_array(6, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(6, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day6" value="F" style="display: none" checked>
                    <?php }else if(in_array(6, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day6" value="6" <?php if($empAttnInfo->day6 == 6){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                    <?php if(in_array(7, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(7, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day7" value="F" style="display: none" checked>
                    <?php }else if(in_array(7, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day7" value="7" <?php if($empAttnInfo->day7 == 7){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                    <?php if(in_array(8, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(8, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day8" value="F" style="display: none" checked>
                    <?php }else if(in_array(8, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day8" value="8" <?php if($empAttnInfo->day8 == 8){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                    <?php if(in_array(9, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(9, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day9" value="F" style="display: none" checked>
                    <?php }else if(in_array(9, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day9" value="9" <?php if($empAttnInfo->day9 == 9){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                    <?php if(in_array(10, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(10, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day10" value="F" style="display: none" checked>
                    <?php }else if(in_array(10, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day10" value="10" <?php if($empAttnInfo->day10 == 10){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                    <?php if(in_array(11, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(11, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day11" value="F" style="display: none" checked>
                    <?php }else if(in_array(11, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day11" value="11" <?php if($empAttnInfo->day11 == 11){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle"><?php if(in_array(12, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(12, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day12" value="F" style="display: none" checked>
                    <?php }else if(in_array(12, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day12" value="12" <?php if($empAttnInfo->day12 == 12){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle"><?php if(in_array(13, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(13, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day13" value="F" style="display: none" checked>
                    <?php }else if(in_array(13, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day13" value="13" <?php if($empAttnInfo->day1 == 13){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle">
                    <?php if(in_array(14, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(14, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day14" value="F" style="display: none" checked>
                    <?php }else if(in_array(14, $leaveArray)){ ?>
					           <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day14" value="14" <?php if($empAttnInfo->day14 == 14){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                    <?php if(in_array(15, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(15, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day15" value="F" style="display: none" checked>
                    <?php }else if(in_array(15, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day15" value="15" <?php if($empAttnInfo->day15 == 15){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                    <?php if(in_array(16, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(16, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day16" value="F" style="display: none" checked>
                    <?php }else if(in_array(16, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day16" value="16" <?php if($empAttnInfo->day16 == 16){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                    <?php if(in_array(17, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(17, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day17" value="F" style="display: none" checked>
                    <?php }else if(in_array(17, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day17" value="17" <?php if($empAttnInfo->day17 == 17){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                    <?php if(in_array(18, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(18, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day18" value="F" style="display: none" checked>
                    <?php }else if(in_array(18, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day18" value="18" <?php if($empAttnInfo->day18 == 18){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                    <?php if(in_array(19, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(19, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day19" value="F" style="display: none" checked>
                    <?php }else if(in_array(19, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day19" value="19" <?php if($empAttnInfo->day19 == 19){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                    <?php if(in_array(20, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(20, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day20" value="F" style="display: none" checked>
                    <?php }else if(in_array(20, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day20" value="20" <?php if($empAttnInfo->day20 == 20){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                    <?php if(in_array(21, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(21, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day21" value="F" style="display: none" checked>
                    <?php }else if(in_array(21, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day21" value="21" <?php if($empAttnInfo->day21 == 21){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                    <?php if(in_array(22, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(22, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day22" value="F" style="display: none" checked>
                    <?php }else if(in_array(22, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day22" value="22" <?php if($empAttnInfo->day22 == 22){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                    <?php if(in_array(23, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(23, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day23" value="F" style="display: none" checked>
                    <?php }else if(in_array(23, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day23" value="23" <?php if($empAttnInfo->day23 == 23){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                    <?php if(in_array(24, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(24, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day24" value="F" style="display: none" checked>
                    <?php }else if(in_array(24, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day24" value="24" <?php if($empAttnInfo->day24 == 24){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                    <?php if(in_array(25, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(25, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day25" value="F" style="display: none" checked>
                    <?php }else if(in_array(25, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day25" value="25" <?php if($empAttnInfo->day25 == 25){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                    <?php if(in_array(26, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(26, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day26" value="F" style="display: none" checked>
                    <?php }else if(in_array(26, $leaveArray)){ ?>
					   <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day26" value="26" <?php if($empAttnInfo->day26 == 26){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                    <?php if(in_array(27, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(27, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day27" value="F" style="display: none" checked>
                    <?php }else if(in_array(27, $leaveArray)){ ?>
             <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day27" value="27" <?php if($empAttnInfo->day27 == 27){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                    <?php if(in_array(28, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(28, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day28" value="F" style="display: none" checked>
                    <?php }else if(in_array(28, $leaveArray)){ ?>
             <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day28" value="28" <?php if($empAttnInfo->day28 == 28){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <?php if($totalDay > 28){ ?>
                    <td align="center" valign="middle">
                      <?php if(in_array(29, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(29, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day29" value="F" style="display: none" checked>
                    <?php }else if(in_array(29, $leaveArray)){ ?>
             <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day29" value="29" <?php if($empAttnInfo->day29 == 29){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                    </td>
                  <?php } if($totalDay > 29){ ?>
                  <td align="center" valign="middle">
                    <?php if(in_array(30, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(30, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day30" value="F" style="display: none" checked>
                    <?php }else if(in_array(30, $leaveArray)){ ?>
             <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day30" value="30" <?php if($empAttnInfo->day30 == 30){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <?php } if($totalDay > 30){ ?>
                   <td align="center" valign="middle">
                     <?php if(in_array(31, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(31, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span> 
                    <input type="checkbox"  class="ace" name="day31" value="F" style="display: none" checked>
                    <?php }else if(in_array(31, $leaveArray)){ ?>
             <span style="color:#007814">L</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day31" value="31" <?php if($empAttnInfo->day31 == 31){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                   </td>
                   <?php } ?>
                </tr>

                <tr style="font-size:12px">
                  <td align="center" valign="middle">
				  <?php if(!in_array(1, $customArray) && !in_array(1, $fridays) && !in_array(1, $leaveArray) ){ ?>
                    <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day1InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px" 
						value="<?php if(!empty($day1AttnInfo)){ echo $day1AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day1OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day1AttnInfo)){ echo $day1AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(2, $customArray) && !in_array(2, $fridays) && !in_array(2, $leaveArray) ){ ?>
                    <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day2InTime]" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px" 
						value="<?php if(!empty($day2AttnInfo)){ echo $day2AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day2OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day2AttnInfo)){ echo $day2AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				   <?php if(!in_array(3, $customArray) && !in_array(3, $fridays) && !in_array(3, $leaveArray) ){ ?>
						<div class="input-group bootstrap-timepicker timepicker">
							<input name="day3InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px" 
							value="<?php if(!empty($day3AttnInfo)){ echo $day3AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
						</div>
						<div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
							<input name="day3OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
							value="<?php if(!empty($day3AttnInfo)){ echo $day3AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
						</div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(4, $customArray) && !in_array(4, $fridays) && !in_array(4, $leaveArray) ){ ?>
                    <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day4InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day4AttnInfo)){ echo $day4AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day4OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day4AttnInfo)){ echo $day4AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(5, $customArray) && !in_array(5, $fridays) && !in_array(5, $leaveArray) ){ ?>
                    <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day5InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day5AttnInfo)){ echo $day5AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day5OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day5AttnInfo)){ echo $day5AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(6, $customArray) && !in_array(6, $fridays) && !in_array(6, $leaveArray) ){ ?>
                    <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day6InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day6AttnInfo)){ echo $day6AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day6OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day6AttnInfo)){ echo $day6AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(7, $customArray) && !in_array(7, $fridays) && !in_array(7, $leaveArray) ){ ?>
                    <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day7InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day7AttnInfo)){ echo $day7AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day7OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day7AttnInfo)){ echo $day7AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(8, $customArray) && !in_array(8, $fridays) && !in_array(8, $leaveArray) ){ ?>
                    <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day8InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day8AttnInfo)){ echo $day8AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day8OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day8AttnInfo)){ echo $day8AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(9, $customArray) && !in_array(9, $fridays) && !in_array(9, $leaveArray) ){ ?>
                     <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day9InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day9AttnInfo)){ echo $day9AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day9OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day9AttnInfo)){ echo $day9AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(10, $customArray) && !in_array(10, $fridays) && !in_array(10, $leaveArray) ){ ?>
                     <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day10InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day10AttnInfo)){ echo $day10AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day10OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day10AttnInfo)){ echo $day10AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(11, $customArray) && !in_array(11, $fridays) && !in_array(11, $leaveArray) ){ ?>
                     <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day11InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day11AttnInfo)){ echo $day11AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day11OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day11AttnInfo)){ echo $day11AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(12, $customArray) && !in_array(12, $fridays) && !in_array(12, $leaveArray) ){ ?>
                     <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day12InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day12AttnInfo)){ echo $day12AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day12OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day12AttnInfo)){ echo $day12AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(13, $customArray) && !in_array(13, $fridays) && !in_array(13, $leaveArray) ){ ?>
                    <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day13InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day13AttnInfo)){ echo $day13AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day13OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day13AttnInfo)){ echo $day13AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(14, $customArray) && !in_array(14, $fridays) && !in_array(14, $leaveArray) ){ ?>
                    <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day14InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day14AttnInfo)){ echo $day14AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day14OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day14AttnInfo)){ echo $day14AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(15, $customArray) && !in_array(15, $fridays) && !in_array(15, $leaveArray) ){ ?>
                    <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day15InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day15AttnInfo)){ echo $day15AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day15OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day15AttnInfo)){ echo $day15AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(16, $customArray) && !in_array(16, $fridays) && !in_array(16, $leaveArray) ){ ?>
                    <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day16InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day16AttnInfo)){ echo $day16AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day16OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day16AttnInfo)){ echo $day16AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(17, $customArray) && !in_array(17, $fridays) && !in_array(17, $leaveArray) ){ ?>
                    <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day17InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day17AttnInfo)){ echo $day17AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day17OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day17AttnInfo)){ echo $day17AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(18, $customArray) && !in_array(18, $fridays) && !in_array(18, $leaveArray) ){ ?>
                    <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day18InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day18AttnInfo)){ echo $day18AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day18OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day18AttnInfo)){ echo $day18AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(19, $customArray) && !in_array(19, $fridays) && !in_array(19, $leaveArray) ){ ?>
                    <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day19InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day19AttnInfo)){ echo $day19AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day19OutTime" type="text" class="form-control input-small outimepick" id="day17OutTime" style="width: 70px; height:30px; font-size:12px" placeholder="Outtime"
						value="<?php if(!empty($day19AttnInfo)){ echo $day19AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(20, $customArray) && !in_array(20, $fridays) && !in_array(20, $leaveArray) ){ ?>
                    <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day20InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day20AttnInfo)){ echo $day20AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day20OutTime" type="text" class="form-control input-small outimepick" id="day20OutTime" style="width: 70px; height:30px; font-size:12px" placeholder="Outtime"
						value="<?php if(!empty($day20AttnInfo)){ echo $day20AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(21, $customArray) && !in_array(21, $fridays) && !in_array(21, $leaveArray) ){ ?>
                    <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day21InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day21AttnInfo)){ echo $day21AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day21OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day21AttnInfo)){ echo $day21AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(22, $customArray) && !in_array(22, $fridays) && !in_array(22, $leaveArray) ){ ?>
                    <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day22InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day22AttnInfo)){ echo $day22AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day22OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day22AttnInfo)){ echo $day22AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(23, $customArray) && !in_array(23, $fridays) && !in_array(23, $leaveArray) ){ ?>
                    <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day23InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day23AttnInfo)){ echo $day23AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day23OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day23AttnInfo)){ echo $day23AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(24, $customArray) && !in_array(24, $fridays) && !in_array(24, $leaveArray) ){ ?>
                    <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day24InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day24AttnInfo)){ echo $day24AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day24OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day24AttnInfo)){ echo $day24AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(25, $customArray) && !in_array(25, $fridays) && !in_array(25, $leaveArray) ){ ?>
                    <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day25InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day25AttnInfo)){ echo $day25AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day25OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day25AttnInfo)){ echo $day25AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(26, $customArray) && !in_array(26, $fridays) && !in_array(26, $leaveArray) ){ ?>
                    <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day26InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day26AttnInfo)){ echo $day26AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day26OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day26AttnInfo)){ echo $day26AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
                  </td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(27, $customArray) && !in_array(27, $fridays) && !in_array(27, $leaveArray) ){ ?>
                  <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day27InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day27AttnInfo)){ echo $day27AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day27OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day27AttnInfo)){ echo $day27AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
					</td>
                  <td align="center" valign="middle">
				  <?php if(!in_array(28, $customArray) && !in_array(28, $fridays) && !in_array(28, $leaveArray) ){ ?>
                  <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day28InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day28AttnInfo)){ echo $day28AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day228OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day28AttnInfo)){ echo $day28AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
					</td>
                  <?php if($totalDay > 28){ ?>
                    <td align="center" valign="middle">
					<?php if(!in_array(29, $customArray) && !in_array(29, $fridays) && !in_array(29, $leaveArray) ){ ?>
                    <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day29InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day29AttnInfo)){ echo $day29AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day29OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day29AttnInfo)){ echo $day29AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
					</td>
                  <?php } if($totalDay > 29){ ?>
                  <td align="center" valign="middle">
				  <?php if(!in_array(30, $customArray) && !in_array(30, $fridays) && !in_array(30, $leaveArray) ){ ?>
                  <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day30InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day30AttnInfo)){ echo $day30AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day30OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day30AttnInfo)){ echo $day30AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
					</td>
                  <?php } if($totalDay > 30){ ?>
                   <td align="center" valign="middle">
				   <?php if(!in_array(31, $customArray) && !in_array(31, $fridays) && !in_array(31, $leaveArray) ){ ?>
                   <div class="input-group bootstrap-timepicker timepicker">
                        <input name="day31InTime" type="text" class="form-control input-small timepic" placeholder="Intime" style="width: 70px; height:30px; z-index: 100; font-size:12px"
						value="<?php if(!empty($day31AttnInfo)){ echo $day31AttnInfo->in_time; }else{ echo"7:45AM"; } ?>">
                    </div>
                    <div class="input-group bootstrap-timepicker timepicker" style="padding-top:5px">
                        <input name="day31OutTime" type="text" class="form-control input-small outimepick" placeholder="Outtime" style="width: 70px; height:30px; font-size:12px"
						value="<?php if(!empty($day31AttnInfo)){ echo $day31AttnInfo->out_time; }else{ echo"2:30PM"; } ?>">
                    </div>
					<?php } ?>
					</td>
                   <?php } ?>
                </tr>
              </table>
                </td>
                </tr>

            </table>



      
   </div>

    
</div>
    

<div class="modal-footer">
    <button class="btn btn-sm btn-primary" type="submit">
        <i class="ace-icon fa fa-check"></i>
        <span class="update">Reset</span>
    </button>
    <button class="btn btn-sm" data-dismiss="modal">
        <i class="ace-icon fa fa-times"></i>
        Cancel
    </button>
</div>
</div>


</form>

<script type="text/javascript">

/*$(document).on("click", ".timepic", function(){
   $(this).timepicker();

});
*/


/*$('.timepic').timepicker({
    template: 'modal'
});*/


  
  /*$(document).on("click", ".outimepick", function(){
   $(this).timepicker({
    template: 'modal'
    });

});
*/

   $("#resetAtten").submit(function(e)
    {
      var postData = $(this).serializeArray();
      var formURL = $(this).attr("action");
      console.log(postData);
      $.ajax(
      {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data){
          alert('Attendence Reset success');
          $("#attendenceDetails").modal('hide');
          location.reload();
        }
      });
      
      e.preventDefault();
    });
</script>




