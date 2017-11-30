		<table class="table table-striped table-bordered table-hover text-left empListTable">
			<thead>
				<tr>
				  <th class="center">SL</th>
					<th>Employee  ID</th>
					<th>Name</th>
					<th class="hidden-480">Department</th>

					<th class="hidden-480">Designition</th>
					<th class="hidden-480">Picture</th>
				</tr>
			</thead>

			<tbody>
			
			<?php
				$i = 1;
				 foreach($domainWiseReportData as $v) { 
			
			?>
				<tr>
				  <td class="center"><?php echo $i++; ?></td>
					<td width="10%" align="left">
					
					<span  class="showReport btn-primary pointerCls" empID="<?php echo $v->employee_id; ?>"><?php echo $v->employee_id; ?></span>
					<span style="display:none"  class="hideReport btn-danger pointerCls"  empID="<?php echo $v->employee_id; ?>"><?php echo $v->employee_id; ?></span>																				</td>
					<td class="hidden-480"><?php echo $v->employee_full_name; ?></td>
					<td class=""><?php echo $v->department_name; ?></td>
					<td class="hidden-480"><?php echo $v->designition_name; ?></td>

					<td class="hidden-480">
					  <?php if(!empty($v->emp_photo)){ ?>
					    <img src="<?php echo base_url("resource/emp_photo/$v->emp_photo") ?>" width="50" height="50" /></td>
					 <?php } else {  if($v->gender == 'Male'){ ?>
					     <img src="<?php echo base_url('resource/img/male.png'); ?>" width="50" height="50">  
					 <?php } else {  ?>
					 <img src="<?php echo base_url('resource/img/EmptyProfile.png'); ?>" width="50" height="50">  
					 <?php } } ?>
				</tr>
			 <?php } ?>	
			</tbody>
		</table>
		
<script>
  $(document).on("click", ".showReport", function(){
  console.log(this);
  var parrents   = $(this).parents('tr');
  var empID      = $(this).attr('empID');
  
  $('.hideReport').css({"display":"none","text-align":"left", "margin-right":"60px"});
  $('.showReport').css({"display":"block","text-align":"left", "margin-right":"60px" });
  $(this).css({"display":"none","text-align":"left", "margin-right":"60px"});
  
  parrents.find('.hideReport').css('display','block');
  var formURL    = "<?php echo site_url('hrReport/empWiseReportDetails'); ?>";
  
    $.ajax(
		{
			url : formURL,
			type: "POST",
			data : {empID: empID},
			success:function(data){
				$('.empListTable .detailsShow').remove();
				$('<tr class="detailsShow"><td colspan="6">'+data+'</td></tr>').insertAfter(parrents);
			}
		});
  
 

});



$('.hideReport').on('click', function() {
	$('.empListTable .detailsShow').remove();
	$('.showReport').css('display','block');
	$('.hideReport').css('display','none');
});

</script>
