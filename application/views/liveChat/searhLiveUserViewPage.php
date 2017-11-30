    <?php
     if(!empty($allUser)){
     foreach($allUser as $v){ 
	?>
	 <a data-id="<?php echo $v->id ?>" class="chat" href="#">
	 <div id="chatRow" class="row">
		<div class="col-md-2" style="padding-left:5px;">
		  <?php if($v->image){ ?>
		   <img src="<?php echo base_url("resource/Register_image/$v->image"); ?>"align="right" class="img-responsive" />
		   <?php }else{ ?>
			<img src="<?php echo base_url("resource/img/profile2.png"); ?>"align="right" class="img-responsive" />
			<?php } ?>
		  </div>
		    <?php if($v->online_status =='active'){?>
			    <div class="col-md-10 user" style="padding:6px 0 0 6px;">
			      <?php echo $v->full_name ?>
			    </div>
			<?php }else{ ?>
			    <div class="col-md-10" style="padding:6px 0 0 6px;">
			      <?php echo $v->full_name ?> <span style="float:right">inactive</span>
			    </div>
			<?php } ?>
	  </div>
	  <div class="row" style="padding:3px"></div>
	  </a>
	<?php } }else{ echo "Result not found !"; }  ?>




