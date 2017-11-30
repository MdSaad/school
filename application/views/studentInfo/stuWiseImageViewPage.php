<?php
     if(!empty($stuInfo)){
     if(!empty($stuInfo->stu_photo)){ ?>
	<img src="<?php echo base_url("resource/stu_photo/$stuInfo->stu_photo"); ?>" width="50" height="40" class="img-thumbnail"> 
<?php }else{  if($stuInfo->stu_sex == 'M'){ ?>
         <img src="<?php echo base_url('resource/img/male.png'); ?>" width="50" height="40"> 
	 <?php }else{ ?>
	   <img src="<?php echo base_url('resource/img/EmptyProfile.png'); ?>" width="50" height="40"> 
<?php } } ?>
<br><?php echo $stuInfo->stu_full_name ?>
<?php } else { echo "<span style='color:red' >Invalide Id</span>";} ?>