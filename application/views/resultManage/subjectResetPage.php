<form id="resetSubject" action="<?php echo site_url('resultSubModule/resetSubjectAction'); ?>" method="post">
<input type="hidden" name="stuId" value="<?php echo $stuId ?>" />
<input type="hidden" name="year" value="<?php echo $year ?>" />
<div class="modal-header" style="border-bottom:2px solid #FF0000">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h3 class="modal-title" id="myModalLabel">Reset Subject</h3>
</div>
  
<div class="modal-body">
   <div class="row">

     <table  class="table table-bordered">
		<thead>
			<tr>
				<th class="center" width="5%">
				  Roll
				</th>
				<th width="20%">Name</th>
				<th width="10%">Class</th>
				<th width="65%">Subject List</th>
				
			</tr>
		</thead>

		
		
		<?php 
		   
		 ?>
		  <tbody class="inputTable2">
			<tr style="background-color:#FFEBEB">
				<td class="center">
				   <?php echo $studentDetails->class_roll; ?>
				</td>

				<td><?php echo $studentDetails->stu_full_name; ?></td>
				<td class="hidden-480"><?php echo $studentDetails->class_name; ?></td>
				<td>
					<div class="row">
					 <?php foreach ($subjectList as $vs){ ?>
						 <div class="col-md-4 parents">
							<input type="checkbox" name="subject_id2[]" id="subject_id2[]" value="<?php echo $vs->id ?>" <?php if(!empty($takenSubjectArray)){ if(in_array($vs->id, $takenSubjectArray)) echo 'checked'; } ?>  style="display:none" >
							<input type="checkbox" name="choose2" <?php if(!empty($takenSubjectArray)){ if(in_array($vs->id, $takenSubjectArray)) echo 'checked'; } ?> > <?php echo $vs->subject_name ?></div>
					 <?php } ?>
					</div>
				</td>
			</tr>
			</tbody>
		
			
		
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

    $(document).on('click', 'input[name="choose2"]', function(e){
	  var parents = $(this).parents('.parents');
	  var checked = this.checked;
	   if(checked){ 
		   parents.find('input[name="subject_id2[]"]').prop('checked', true);
	  } else {
		   parents.find('input[name="subject_id2[]"]').prop('checked', false); 
	  }
	 });
 
 
 
   $("#resetSubject").submit(function(e)
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
          alert('Subject Reset success');
          $("#subjectReset").modal('hide');
          location.reload();
        }
      });
      
      e.preventDefault();
    });
</script>




