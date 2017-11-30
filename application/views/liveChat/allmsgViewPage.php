   <?php 
      foreach($allMsg as $v){
        date_default_timezone_set("Asia/Dhaka");
        $date  = date_create($v->date_time);
        $formattedDate = date_format($date, 'F j, Y, h:i a');
        $currentDate   = date("Y-m-d");

        $dateTime = explode(" ",$v->date_time);
        $date     = $dateTime[0];
        $time     = $dateTime[1]; 
        $mainTime = date ('h:i a',strtotime($time));
        
      if($v->send_from == $userDetails->id){
     ?>
       <div class="row msg_container base_sent">
        	<div class="col-md-10 col-xs-10">
        		<div class="messages msg_sent">
        			<p><?php echo $v->message ?></p>
              <?php if($date != $currentDate){ ?>
        			   <time style="color:#666666"><?php echo $formattedDate ?></time>
               <?php }else{ ?>
                  <time style="color:#666666"><?php echo $mainTime ?></time>
               <?php } ?>
                      
        		</div>
        	</div>
	        <div class="col-md-2 col-xs-2 avatar">
            <?php if(!empty($userDetails->image)){ ?>
	            <img style="display: block; width: 100%;" src="<?php echo base_url("resource/Register_image/$userDetails->image"); ?>">
            <?php }else{ ?>
              <img src="<?php echo base_url("resource/img/profile2.png"); ?>"align="right" class="img-responsive" />
            <?php } ?>
	        </div>
        </div>
        
        <?php }else{ ?>

        <div class="row msg_container base_receive">
        	<div class="col-md-2 col-xs-2 avatar">
             <?php if(!empty($v->image)){ ?>
	             <img style="display: block; width: 100%;" src="<?php echo base_url("resource/Register_image/$v->image"); ?>">
             <?php }else{ ?>
               <img src="<?php echo base_url("resource/img/profile2.png"); ?>"align="right" class="img-responsive" />
            <?php } ?>
	        </div>
	        <div class="col-md-10 col-xs-10">
        		<div class="messages msg_receive">
        			<p><?php echo $v->message ?></p>
                <?php if($date != $currentDate){ ?>
                 <time style="color:#666666"><?php echo $formattedDate ?></time>
               <?php }else{ ?>
                  <time style="color:#666666"><?php echo $mainTime ?></time>
               <?php } ?>
        		</div>
        	</div>
        </div>

     <?php } }  ?>
        