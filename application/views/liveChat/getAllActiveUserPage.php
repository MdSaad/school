	<div class="chat_head">Chat Box <?php if(!empty($totalActiveUser)){ ?>(<?php echo $totalActiveUser ?>) <?php } ?></span><span class="noImg" style="float:right;"><i style="cursor:pointer" class="minimusChat glyphicon glyphicon-minus"></i>&nbsp;<i style="cursor:pointer" class="removeChatBox glyphicon glyphicon-remove"></i></span><span class="imgAd" style="float:right;display:none"><span><img src="<?php echo base_url("resource/img/minimize.png"); ?>" style="max-height:11px;right:50" /></span>&nbsp;<i style="cursor:pointer" class="removeChatBox glyphicon glyphicon-remove"></i></span></div>
	<div class="panel-body chat_body">

		<?php 
		     if(!empty($activeUser)){
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
			<div class="col-md-10 user" style="padding:6px 0 0 6px;"><?php echo $v->full_name ?></div>
		  </div>
		  <div class="row" style="padding:3px"></div>
		  </a>
		<?php } }else{ ?>
		  <span style="color:#FF0000">Chat List Empty!</span>
		<?php } }else{  ?>
		  <span style="color:#FF0000">Please login to chat</span>
		<?php } ?>

		
	</div>