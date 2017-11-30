<form id="resetAtten" action="<?php echo site_url('attendence/attendenceResetAction'); ?>" method="post">
<input type="hidden" name="studentId" value="<?php echo $studentId ?>" />
<input type="hidden" name="monthYear" value="<?php echo $monthYear ?>" />
<div class="modal-header" style="border-bottom:2px solid #FF0000">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h3 class="modal-title" id="myModalLabel">Reset Attendence</h3>
</div>
  
<div class="modal-body">
   <div class="row">


      <table  width="100%" border="0" cellspacing="0" cellpadding="0" class="table-condensed table-bordered" style="border-bottom:1px solid #FF0000;">
              
              <tr>
                <td width="20%"><strong>Class Roll : </strong><?php echo $studentDetails->class_roll ?></td>
                <td width="80%" colspan="2" align="left" valign="middle"><strong>Name : </strong><?php echo $studentDetails->stu_full_name ?></td>
              </tr>
              <tr>
                <td colspan="4" align="left" valign="middle">
              <table id="inputTable" width="100%" border="0" cellspacing="0" cellpadding="0" class="table-condensed table-bordered" style="font-weight: bold;">
              
                  <?php 
                     
                      $totalDay =  date("t",mktime(0,0,0,$givenMonth,1,$givenYear));

                 ?>
                <tr>
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
                <tr>
                  <td align="center" valign="middle">
                  <?php if(in_array(1, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(1, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day1" value="1" <?php if($stuAttnInfo->day1 == 1){ echo 'checked'; } ?> >
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                       <?php if(in_array(2, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(2, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day2" value="2" <?php if($stuAttnInfo->day2 == 2){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                </td>
                  <td align="center" valign="middle">
                  <?php if(in_array(3, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(3, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day3" value="3" <?php if($stuAttnInfo->day3 == 3){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                </td>
                  <td align="center" valign="middle">
                  <?php if(in_array(4, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(4, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day4" value="4" <?php if($stuAttnInfo->day4 == 4){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                  <?php if(in_array(5, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(5, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day5" value="5" <?php if($stuAttnInfo->day5 == 5){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle">
                  <?php if(in_array(6, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(6, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day6" value="6" <?php if($stuAttnInfo->day6 == 6){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                  <?php if(in_array(7, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(7, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day7" value="7" <?php if($stuAttnInfo->day7 == 7){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle">
                  <?php if(in_array(8, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(8, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day8" value="8" <?php if($stuAttnInfo->day8 == 8){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle">
                  <?php if(in_array(9, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(9, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day9" value="9" <?php if($stuAttnInfo->day9 == 9){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle">
                  <?php if(in_array(10, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(10, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day10" value="10" <?php if($stuAttnInfo->day10 == 10){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle">
                  <?php if(in_array(11, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(11, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day11" value="11" <?php if($stuAttnInfo->day11 == 11){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle">
                  <?php if(in_array(12, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(12, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day12" value="12" <?php if($stuAttnInfo->day12 == 12){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle">
                  <?php if(in_array(13, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(13, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day13" value="13" <?php if($stuAttnInfo->day1 == 13){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle">
                  <?php if(in_array(14, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(14, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day14" value="14" <?php if($stuAttnInfo->day14 == 14){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle">
                  <?php if(in_array(15, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(15, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day15" value="15" <?php if($stuAttnInfo->day15 == 15){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle">
                  <?php if(in_array(16, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(16, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day16" value="16" <?php if($stuAttnInfo->day16 == 16){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle">
                  <?php if(in_array(17, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(17, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day17" value="17" <?php if($stuAttnInfo->day17 == 17){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle">
                   <?php if(in_array(18, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(18, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day18" value="18" <?php if($stuAttnInfo->day18 == 18){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle">
                   <?php if(in_array(19, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(19, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day19" value="19" <?php if($stuAttnInfo->day19 == 19){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle">
                   <?php if(in_array(20, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(20, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day20" value="20" <?php if($stuAttnInfo->day20 == 20){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle">
                   <?php if(in_array(21, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(21, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day21" value="21" <?php if($stuAttnInfo->day21 == 21){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle">
                   <?php if(in_array(22, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(22, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day22" value="22" <?php if($stuAttnInfo->day22 == 22){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?>
                  </td>
                  <td align="center" valign="middle">
                  <?php if(in_array(23, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(23, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day23" value="23" <?php if($stuAttnInfo->day23 == 23){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle">
                  <?php if(in_array(24, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(24, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day24" value="24" <?php if($stuAttnInfo->day24 == 24){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle">
                  <?php if(in_array(25, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(25, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day25" value="25" <?php if($stuAttnInfo->day25 == 25){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle">
                  <?php if(in_array(26, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(26, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day26" value="26" <?php if($stuAttnInfo->day26 == 26){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle">
                  <?php if(in_array(27, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(27, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day27" value="27" <?php if($stuAttnInfo->day27 == 27){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <td align="center" valign="middle">
                  <?php if(in_array(28, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(28, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day28" value="28" <?php if($stuAttnInfo->day28 == 28){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>

                   <?php if($totalDay > 28){ ?>
                  <td align="center" valign="middle">
                  <?php if(in_array(29, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(29, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day29" value="29" <?php if($stuAttnInfo->day29 == 29){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <?php } if($totalDay > 29){ ?>
                  <td align="center" valign="middle">
                  <?php if(in_array(30, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(30, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day30" value="30" <?php if($stuAttnInfo->day30 == 30){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
                  <?php } if($totalDay > 30){ ?>
                  <td align="center" valign="middle">
                  <?php if(in_array(31, $customArray)){ ?>
                     <span style="color:#894545">H</span>
                    <?php }else if(in_array(31, $fridays)){ ?>
                    <span style="color:#FF00FF">F</span>
                  <?php }else{ ?>
                                  
                   <label class="pos-rel" style="padding:0">                     
                     <input type="checkbox"  class="ace" name="day31" value="31" <?php if($stuAttnInfo->day31 == 31){ echo 'checked'; } ?>>
                   <span class="lbl"></span>
                  <?php  }  ?></td>
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


</form>

<script type="text/javascript">
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




