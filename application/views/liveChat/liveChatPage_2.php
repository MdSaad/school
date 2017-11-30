<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<title><?php echo $title; ?></title>
		<?php //$this->load->view(''); ?>
		<style>
		   /*live chat css start*/

.chat_box{
 background-color:#FFFFFF;
 width:250px;
 position:fixed;
 bottom:0px;
 right:10px;
 border-radius:5px 5px 0px 0px;
 z-index:99999999;
}

.chat_head,.msg_head{
 background: #4E69A2;
 padding:10px;
 color:#FFFFFF;
 border-radius:5px 5px 0px 0px;
 
}

.chat_body{
 height:400px;
 overflow: scroll;
 overflow-x: hidden;
 border-left:2px solid #C5CDE0;
 
}

.user{
  padding:4px 25px 0px 3px;
  position:relative;
  cursor:pointer;
  font-size:12px;
  color:000000; 

}
.user:after{
content:"";
position:absolute;
width:8px;
height:8px;
background-color:green;
right:6px;
top:10px;
border-radius:5px;
 
}

.msg_box{
 background-color:#FFFFFF;
 width:250px;
 position:fixed;
 bottom:0px;
 right:10px;
 border-radius:5px 5px 0px 0px;
}

.msg_head{
 background-color:#4E69A2;
 cursor:pointer;
}

.msg_body{
 height:220px;
 font-size:12px;
 bottom:-5px;
 padding:5px;
 
}
.close{
float:right;
 
}

.msg_input{
 width:242px;
 
}

.msg_first{
 background-color:#333333;
 color:#FFFFFF;
 padding:5px;
 margin-top:5px;
 margin-right:5px;
 
}

.msg_second{
 background-color:#666666;
 padding:5px;
 color:#FFFFFF;
 margin-top:5px;
 margin-right:5px;
 
}


/*live chat css end*/
		</style>
	</head>
	
	<body>
	<div class="col-md-11 col-lg-11 headerBox" >
	  <?php $this->load->view('common/chatHeader'); ?>
		
				<div class="row">
					<div class="col-md-2 col-sm-2 col-lg-2 leftBox">
							<a href="<?php echo site_url('adminHome'); ?>" > Home </a>
						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 headerBox2">
						<a href="<?php echo site_url('adminHome'); ?>" > Home </a>
						<i class="glyphicon glyphicon-forward"></i>
							Online ERP System
					</div>
				</div>	
	</div>
				
				<div class="col-md-11 col-lg-11">
					<div class="row">
					<div class="col-md-2 col-sm-2 col-lg-2 ">
						
						</div>
					<div class="col-md-10 col-sm-10 col-lg-10 interfaceBody headerBox3" style="min-height:550px">
							Welcome <?php echo $this->session->userdata('UserId'); ?> 	
					</div>
				</div>
			</div>
			
			<!-- live chat start -->
					<div class="chat_box">
					   <input type="hidden" name="chatHiddenId" id="chatHiddenId" value="">
					   <div id="chatBarShow">
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
									    <img src="<?php echo base_url("resource/img/profile2.png"); ?>"align="right" class="img-responsive" />
									  </div>
									<div class="col-md-10 user" style="padding:0 0 0 6px;"><?php echo $v->full_name ?></div>
								  </div>
								  <div class="row" style="padding:3px"></div>
								  </a>
								<?php } }else{ ?>
									 <span style="color:#FF0000">Chat List Empty!</span>
								<?php } }else{  ?>
									 <span style="color:#FF0000">Please login to chat</span>
								<?php } ?>

								
							</div>
					    </div>
							<div class="input-group"><input name="search_user" id="search_user" type="text" class="form-control input-sm chat_input" placeholder="search by name" />
								<span class="input-group-btn">
								  <button id="searchUser" type="submit" class="btn btn-default btn-sm">Search </button>
							   </span>
							</div>
					 </div>
				
				<!-- live chat end -->
				
				<div style="position: fixed; right:265px; bottom: 0; z-index:999999999999999;" id="chatMsgView"></div>
				
	  <?php $this->load->view('common/chatfooter'); ?>
				
	</body>
</html>


<script>
	$('.goModule').on('click', function() {
		var goModuleName	= $(this).attr('data-url');
		window.open(goModuleName, '_blank');
	});
	
	//add zero
	
	 function addZero(i) {
		    if (i < 10) {
		        i = "0" + i;
		    }
		    return i;
		}
	
	//user wise chat message window

		$(document).on("click", ".chat", function(event){
			var id = $(this).attr('data-id');
			var formURL = "<?php echo site_url('liveChat/chatWiseDetail'); ?>";

			$.ajax({
				url : formURL,
				type: "POST",
				data : {id: id},
				dataType: "json",
				success : function(data) {	
				 //get current date time
	                var currentdate = new Date(); 
					var new_date = + currentdate.getFullYear() + "-"
		            + addZero(currentdate.getMonth()+1)+ "-" 
		            + addZero(currentdate.getDate());
	    			//console.log(new_date);
				 //current date time end 
				if ($("#chatMsgView").find("#msgViewId[data-id="+data.id+"]").length==0){	
				   
				   var element = '<div style="padding:0" id="msgViewId" class="container" data-id="'+ data.id +'">';
	                element = element + '<div class="row chat-window col-xs-5 col-md-3" style="bottom:0 !important;">';
	                element = element + '<div class="col-xs-12 col-md-12" style="padding-right:8px; bottom:0 !important;">';
	                element = element + '<div class="">';
	                element = element + '<div class="top-bar">';
	                element = element + '<div class="col-md-8 col-xs-8">';
	                if(data.online_status =='active'){
	                 element = element + '<h3 class="panel-title">'+ data.full_name +'</h3>';
	                } else {
	                  element = element + '<h4 style="font-size:12px;" class="panel-title">'+ data.full_name +'</h4>';
	                }
	                element = element + '</div>';
                    element = element + '<div class="col-md-4 col-xs-4" style="text-align: right; padding-right:0px">';
                    element = element + '<span class="maximux" style="padding-right:25px; margin-bottom:-16px;cursor:pointer;display:none">';
                    element = element + '<img src="<?php echo base_url("resource/img/minimize.png"); ?>" style="max-height:11px;right:50" />';
                    element = element + '</span>';
                    element = element + '<a href="#"><span class="removeIcon" style="padding-right:8px; color:#FFFFFF"><i class="glyphicon glyphicon-minus minusChatBox"></i></span></a>';
                    element = element + '<a href="#"><span style="color:#FFFFFF; right:0px"><i class="glyphicon glyphicon-remove"></i></span></a>';
                    element = element + '</div></div>';
                    element = element + '<div style="height:300px" class="panel-body msg_container_base">';
                     if(data.countMsg > 20){
	                    element = element + '<div class="oldMsg" style="padding-top:5px; cursor:pointer">See old message</div>'; 
	                    element = element + '<div id="oldMsgView"></div>'; 
	                 }
                    if(data.alert != 'nomsg'){
                      element = element + '<div id="chatView">';
                       $.each(data.msg, function(key, value){
                       	    var dbDate = value.date_time; 
		                      //date time formated start

		                        var  getDateString = function(date, format) {
						        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
						        getPaddedComp = function(comp) {
						            return ((parseInt(comp) < 10) ? ('0' + comp) : comp)
						        },
						        formattedDate = format,
						        o = {
						            "y+": date.getFullYear(), // year
						            "M+": months[date.getMonth()], //month
						            "d+": getPaddedComp(date.getDate()), //day
						            "h+": getPaddedComp((date.getHours() > 12) ? date.getHours() % 12 : date.getHours()), //hour
						             "H+": getPaddedComp(date.getHours()), //hour
						            "m+": getPaddedComp(date.getMinutes()), //minute
						            "s+": getPaddedComp(date.getSeconds()), //second
						            "S+": getPaddedComp(date.getMilliseconds()), //millisecond,
						            "b+": (date.getHours() >= 12) ? 'PM' : 'AM'
						        };

						        for (var k in o) {
						            if (new RegExp("(" + k + ")").test(format)) {
						                formattedDate = formattedDate.replace(RegExp.$1, o[k]);
						            }
						        }
						        return formattedDate;
						    };
							
						     objDate = Date.parse(dbDate.replace(/-/g, "/"));
							 var formattedDate  = getDateString(new Date(objDate ), "d M, y at h:m b");
							 var formattedTime  = getDateString(new Date(objDate ), "h:m b");

							 //console.log(formattedmonth);

                         	//date time formated end
 
	                       //split
	                       	var dateString = value.date_time;
							var arr  = dateString.split(' ');
							var date = arr[0];
							//console.log(date);
                            if(value.send_from == data.sendUser){
                                element = element + '<div class="row msg_container base_sent">';
                                element = element + '<div class="col-md-10 col-xs-10">';
                                element = element + '<div class="messages msg_sent">';
            	                element = element + '<p>'+ value.message +'</p>';

            	                if(new_date == date){
                                   element = element + '<time style="color:#666666">'+ formattedTime +'</time>';
                                }else{
                                    element = element + '<time style="color:#666666">'+ formattedDate +'</time>';
                                }
                                element = element + '</div>';
                                element = element + '</div>';
                                element = element + '<div class="col-md-2 col-xs-2 avatar">';
                                 if(data.senderImg){
                               		 element = element + '<img style="display: block; width: 100%;" src="<?php echo base_url("resource/Register_image/'+ data.senderImg +'"); ?>">';
                                 } else {
                                  element = element + '<img style="display: block; width: 100%;" src="<?php echo base_url("resource/img/profile2.png"); ?>">';   	
                                 }
                                element = element + '</div>';
                                element = element + '</div>';

                            } else {
                                element = element + '<div class="row msg_container base_receive">';
                                element = element + '<div class="col-md-2 col-xs-2 avatar">';
                                 if(value.image){
                                   element = element + '<img style="display: block; width: 100%;" src="<?php echo base_url("resource/Register_image/'+ value.image +'"); ?>">';
                                 } else {
                                   element = element + '<img style="display: block; width: 100%;" src="<?php echo base_url("resource/img/profile2.png"); ?>">';  
                                 }

                                element = element + '</div>';
                                element = element + '<div class="col-md-10 col-xs-10">';
                                element = element + '<div class="messages msg_receive">';
                                element = element + '<p>'+ value.message +'</p>';
                                if(new_date == date){
                                   element = element + '<time style="color:#666666">'+ formattedTime +'</time>';
                                }else{
                                    element = element + '<time style="color:#666666">'+ formattedDate +'</time>';
                                }
                                element = element + '</div>';
                                element = element + '</div>';
                                element = element + '</div>';

                           }


                      });

                      element = element + '</div>';
                    } else {

                      element = element + '<div id="chatView">';
                      element = element + '<div class="row msg_container base_receive">';
                      element = element + '<div class="col-md-2 col-xs-2 avatar">';
                      if(data.image){
                      	element = element + '<img style="display: block; width: 100%;" src="<?php echo base_url("resource/Register_image/'+ data.image +'"); ?>" class=" img-responsive ">';
                      } else {
                        element = element + '<img style="display: block; width: 100%;" src="<?php echo base_url("resource/img/profile2.png"); ?>">';  
                      }
                      element = element + '</div>';
                      element = element + '<div class="col-md-10 col-xs-10">';
                      element = element + '<div class="messages msg_receive">';
                      element = element + '<p>No message</p>';
                      element = element + '</div>';
                      element = element + '</div>';
                      element = element + '</div>';
                      element = element + '</div>'; 
                    }
                    element = element + '</div>';
                    element = element + '<div class="panel-footer">';
                    element = element + '<form id="sendMsg" action="<?php echo site_url('liveChat/sendMessageAction'); ?>" method="post" enctype="multipart/form-data">';
                    element = element + '<textarea class="form-control" name="message" id="message" rows="2" placeholder="Write your message here..." ></textarea>';
                    element = element + '</form>';
                    element = element + '</div>';
                    element = element + '</div>';
                    element = element + '</div>';
                    element = element + '</div>';
                    element = element + '</div>';


                       $( "#chatMsgView" ).prepend(element);
                       $(".msg_container_base").animate({ scrollTop: $(document).height() }, "slow");
  					   return false;

                   }
	                
	              
				}


			});	

			event.preventDefault();
	});
	
	
	// open window when new message 

   function getNewMsg() {
      var activeUser = "<?php echo $userAutoId; ?>";
       $('<audio id="chatAudio"><source src="<?php echo base_url("resource/img/notify.ogg"); ?>" type="audio/ogg"><source src="<?php echo base_url("resource/img/notify.mp3"); ?>" type="audio/mpeg"><source src="<?php echo base_url("resource/img/notify.wav"); ?>" type="audio/wav"></audio>').appendTo('body');
	  $.ajax({
        url : SAWEB.getSiteAction('liveChat/getMsgFromUser'),
		type: "POST",
		data : {activeUser: activeUser},
		dataType: "json",
        success: function (data) { 
	     //get current date time
            var currentdate = new Date(); 
			var new_date = + currentdate.getFullYear() + "-"
            + addZero(currentdate.getMonth()+1)+ "-" 
            + addZero(currentdate.getDate());
		 //current date time end 
        if(data != "noNewMsg"){
		   if ($("#chatMsgView").find("#msgViewId[data-id="+data.id+"]").length==0){	

			//New Box Open
        	 var element = '<div style="padding:0" id="msgViewId" class="container" data-id="'+ data.id +'">';
                element = element + '<div class="row chat-window col-xs-5 col-md-3">';
                element = element + '<div class="col-xs-12 col-md-12" style="padding-right:10px; bottom:0;">';
                element = element + '<div class="">';
                element = element + '<div class="top-bar">';
                element = element + '<div class="col-md-8 col-xs-8">';
                if(data.online_status =='active'){
                 element = element + '<h3 class="panel-title">'+ data.full_name +'</h3>';
                } else {
                  element = element + '<h4 style="font-size:12px;" class="panel-title">'+ data.full_name +'</h4>';
                }
                element = element + '</div>';
                element = element + '<div class="col-md-4 col-xs-4" style="text-align: right; padding-right:0px">';
                element = element + '<a href="#"><span style="padding-right:8px; color:#FFFFFF"><i class="glyphicon glyphicon-minus minusChatBox"></i></span></a>';
                element = element + '<a href="#"><span style="color:#FFFFFF; right:0px"><i class="glyphicon glyphicon-remove"></i></span></a>';
                element = element + '</div></div>';
                element = element + '<div style="height:300px" class="panel-body msg_container_base">';
                if(data.countMsg > 20){
	                element = element + '<div class="oldMsg" style="padding-top:5px; cursor:pointer">See old message</div>'; 
	                element = element + '<div id="oldMsgView"></div>';
	             }
                if(data.alert != 'nomsg'){
                  element = element + '<div id="chatView">';
                   $.each(data.allmsg, function(key, value){

                   	   var dbDate = value.date_time; 

		                      //date time formated start

		                        var  getDateString = function(date, format) {
						        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
						        getPaddedComp = function(comp) {
						            return ((parseInt(comp) < 10) ? ('0' + comp) : comp)
						        },
						        formattedDate = format,
						        o = {
						            "y+": date.getFullYear(), // year
						            "M+": months[date.getMonth()], //month
						            "d+": getPaddedComp(date.getDate()), //day
						            "h+": getPaddedComp((date.getHours() > 12) ? date.getHours() % 12 : date.getHours()), //hour
						             "H+": getPaddedComp(date.getHours()), //hour
						            "m+": getPaddedComp(date.getMinutes()), //minute
						            "s+": getPaddedComp(date.getSeconds()), //second
						            "S+": getPaddedComp(date.getMilliseconds()), //millisecond,
						            "b+": (date.getHours() >= 12) ? 'PM' : 'AM'
						        };

						        for (var k in o) {
						            if (new RegExp("(" + k + ")").test(format)) {
						                formattedDate = formattedDate.replace(RegExp.$1, o[k]);
						            }
						        }
						        return formattedDate;
						    };
							
						     objDate = Date.parse(dbDate.replace(/-/g, "/"));
							 var formattedDate = getDateString(new Date(objDate ), "d M, y at h:m b");
							 var formattedTime  = getDateString(new Date(objDate ), "h:m b");

							 //console.log(formattedDate);

                         	//date time formated end
 
	                       //split
	                       	var dateString = value.date_time;
							var arr  = dateString.split(' ');
							var date = arr[0];

							

                        if(value.send_from == data.sendUser){
                            element = element + '<div class="row msg_container base_sent">';
                            element = element + '<div class="col-md-10 col-xs-10">';
                            element = element + '<div class="messages msg_sent">';
        	                element = element + '<p>'+ value.message +'</p>';
        	                 if(new_date == date){
                                   element = element + '<time style="color:#666666">'+ formattedTime +'</time>';
                                }else{
                                    element = element + '<time style="color:#666666">'+ formattedDate +'</time>';
                                }
                            element = element + '</div>';
                            element = element + '</div>';
                            element = element + '<div class="col-md-2 col-xs-2 avatar">';
                             if(data.senderImg){
                           		 element = element + '<img style="display: block; width: 100%;" src="<?php echo base_url("resource/Register_image/'+ data.senderImg +'"); ?>">';
                             } else {
                              element = element + '<img style="display: block; width: 100%;" src="<?php echo base_url("resource/img/profile2.png"); ?>">';   	
                             }
                            element = element + '</div>';
                            element = element + '</div>';

                        } else {
                            element = element + '<div class="row msg_container base_receive">';
                            element = element + '<div class="col-md-2 col-xs-2 avatar">';
                             if(value.image){
                               element = element + '<img style="display: block; width: 100%;" src="<?php echo base_url("resource/Register_image/'+ value.image +'"); ?>">';
                             } else {
                               element = element + '<img style="display: block; width: 100%;" src="<?php echo base_url("resource/img/profile2.png"); ?>">';  
                             }

                            element = element + '</div>';
                            element = element + '<div class="col-md-10 col-xs-10">';
                            element = element + '<div class="messages msg_receive">';
                            element = element + '<p>'+ value.message +'</p>';
                              if(new_date == date){
                                   element = element + '<time style="color:#666666">'+ formattedTime +'</time>';
                                }else{
                                    element = element + '<time style="color:#666666">'+ formattedDate +'</time>';
                                }
                            element = element + '</div>';
                            element = element + '</div>';
                            element = element + '</div>';

                       }


                  });

                  element = element + '</div>';
                 }
                
                element = element + '</div>';
                element = element + '<div class="panel-footer">';
                element = element + '<form id="sendMsg" action="<?php echo site_url('liveChat/sendMessageAction'); ?>" method="post" enctype="multipart/form-data">';
                element = element + '<textarea class="form-control" name="message" id="message" rows="2" placeholder="Write your message here..." ></textarea>';
                element = element + '</form>'; 
                element = element + '</div>';
                element = element + '</div>';
                element = element + '</div>';
                element = element + '</div>';
                element = element + '</div>';

                 $( "#chatMsgView" ).prepend(element);
                 $('#chatAudio')[0].play();
                  updateMsgStatus(data.msgId);

                 $(".msg_container_base").animate({ scrollTop: $(document).height() }, "slow");
					  return false;
					 

	            } else{
	               element = '';
                       $.each(data.allmsg, function(key, value){
                       	     var dbDate = value.date_time; 

		                      //date time formated start

		                        var  getDateString = function(date, format) {
						        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
						        getPaddedComp = function(comp) {
						            return ((parseInt(comp) < 10) ? ('0' + comp) : comp)
						        },
						        formattedDate = format,
						        o = {
						            "y+": date.getFullYear(), // year
						            "M+": months[date.getMonth()], //month
						            "d+": getPaddedComp(date.getDate()), //day
						            "h+": getPaddedComp((date.getHours() > 12) ? date.getHours() % 12 : date.getHours()), //hour
						             "H+": getPaddedComp(date.getHours()), //hour
						            "m+": getPaddedComp(date.getMinutes()), //minute
						            "s+": getPaddedComp(date.getSeconds()), //second
						            "S+": getPaddedComp(date.getMilliseconds()), //millisecond,
						            "b+": (date.getHours() >= 12) ? 'PM' : 'AM'
						        };

						        for (var k in o) {
						            if (new RegExp("(" + k + ")").test(format)) {
						                formattedDate = formattedDate.replace(RegExp.$1, o[k]);
						            }
						        }
						        return formattedDate;
						    };
							
						     objDate = Date.parse(dbDate.replace(/-/g, "/"));
							 var formattedDate = getDateString(new Date(objDate ), "d M, y at h:m b");
							 var formattedTime  = getDateString(new Date(objDate ), "h:m b");

                         	//date time formated end
 
	                       //different two datetime 
	                       	var dateString = value.date_time;
							var arr  = dateString.split(' ');
							var date = arr[0];

                            if(value.send_from == data.sendUser){
                                element = element + '<div class="row msg_container base_sent">';
                                element = element + '<div class="col-md-10 col-xs-10">';
                                element = element + '<div class="messages msg_sent">';
            	                element = element + '<p>'+ value.message +'</p>';
            	                  if(new_date == date){
                                   element = element + '<time style="color:#666666">'+ formattedTime +'</time>';
                                }else{
                                    element = element + '<time style="color:#666666">'+ formattedDate +'</time>';
                                }
                                element = element + '</div>';
                                element = element + '</div>';
                                element = element + '<div class="col-md-2 col-xs-2 avatar">';
                                 if(data.senderImg){
                               		 element = element + '<img style="display: block; width: 100%;" src="<?php echo base_url("resource/Register_image/'+ data.senderImg +'"); ?>">';
                                 } else {
                                  element = element + '<img style="display: block; width: 100%;" src="<?php echo base_url("resource/img/profile2.png"); ?>">';   	
                                 }
                                element = element + '</div>';
                                element = element + '</div>';

                            } else {
                                element = element + '<div class="row msg_container base_receive">';
                                element = element + '<div class="col-md-2 col-xs-2 avatar">';
                                 if(value.image){
                                   element = element + '<img style="display: block; width: 100%;" src="<?php echo base_url("resource/Register_image/'+ value.image +'"); ?>">';
                                 } else {
                                   element = element + '<img style="display: block; width: 100%;" src="<?php echo base_url("resource/img/profile2.png"); ?>">';  
                                 }

                                element = element + '</div>';
                                element = element + '<div class="col-md-10 col-xs-10">';
                                element = element + '<div class="messages msg_receive">';
                                element = element + '<p>'+ value.message +'</p>';
                                if(new_date == date){
                                   element = element + '<time style="color:#666666">'+ formattedTime +'</time>';
                                }else{
                                    element = element + '<time style="color:#666666">'+ formattedDate +'</time>';
                                }
                                element = element + '</div>';
                                element = element + '</div>';
                                element = element + '</div>';

                           }


                      });

                       $("#chatMsgView").find("#msgViewId[data-id="+data.id+"]").find("#chatView").html(element);
                       $('#chatAudio')[0].play();
                        updateMsgStatus(data.msgId);
                       $(".msg_container_base").animate({ scrollTop: $(document).height() }, "slow");
  					  return false;

	            }
	              

	          }
              
           }
       });
	  setTimeout(getNewMsg, 2000);

	}





	$(document).ready(function() {
	   setTimeout(getNewMsg, 2000);
	   setTimeout(getAllActiveUser, 8000);  
	   //setTimeout(emptySearchField, 5000);
	});

	//status Update 
	function updateMsgStatus(msgId) {
	  $.ajax({
			url : SAWEB.getSiteAction('liveChat/updateMsgStatus'), // URL TO LOAD BEHIND THE SCREEN
			type : "POST",
			data : {msgId : msgId},
			dataType : "html",
			success : function(data) {			
			}
		});	

	}
	
	
	// message send to user
	$(document).on("keyup", "#message", function(event){
		var message 	= $(this).val();
		var parents  	= $(this).parents('#msgViewId');	
		var viewMsg  	= parents.find("#chatView");
		var scrollMsg  	= parents.find(".msg_container_base");
		var id 			= parents.attr('data-id');
		var formURL 	= parents.find("#sendMsg").attr("action");
		console.log(formURL);

	    if (event.which == 13 && ! event.shiftKey) {
	    	$.ajax({
				url : formURL, // URL TO LOAD BEHIND THE SCREEN
				type : "POST",
				data : { id : id,  message : message},
				dataType : "html",
				success : function(data) {			
					viewMsg.html(data);
					parents.find("#message").val("");
					scrollMsg.animate({ scrollTop: $(document).height() }, "slow");
  					  return false;
					
				}
			});
			
	    }

	    event.preventDefault();

	    
   });
   
   
   
    //chat box slidetoggle
	$(document).on("click", ".glyphicon-remove", function(event){
		var parents 	 = $(this).parents('#msgViewId');
		console.log(parents);		
		parents.remove();	
        event.preventDefault();
	});

   //message box hide 
	$(document).on("click", ".minusChatBox", function(event){
		var parents 	 = $(this).parents('#msgViewId');
		if($(this).hasClass("glyphicon-minus")) {
			$(this).parents('.removeIcon').css("display","none");
			parents.find('.panel-body').hide().animate('slow');
			parents.find('.panel-footer').hide().animate('slow');
			parents.find(".chat-window").css("margin-top", "395px").animate('slow');
			parents.find('.maximux').css("display","block");
		} 
        event.preventDefault();
	});
	
	


    //message box show 
	$(document).on("click", ".maximux", function(event){
		var parents 	 = $(this).parents('#msgViewId');
			parents.find('.removeIcon').css({'display': 'block','padding-right': '25px','margin-bottom': '-16px'}); 
			parents.find('.panel-body').show().animate('slow');
			parents.find('.panel-footer').show().animate('slow');
			parents.find(".chat-window").css("margin-top", "0").animate('slow');
			parents.find('.maximux').css("display","none");
        event.preventDefault();
	});
	
	
	//chat box slidetoggle

	$(document).on("click", ".chat_head", function(){
		var parents = $(this).parents('.chat_box');
		if(parents.find('.minimusChat').hasClass("glyphicon-minus")){
		   $('#chatHiddenId').val('min');
		    parents.find('.minimusChat').removeClass("glyphicon-minus");
		   parents.find('.noImg').css("display", "none"); 
		   parents.find('.chat_body').hide(200); 
		   parents.find('.imgAd').css("display", "block"); 
		} else {
		   $('#chatHiddenId').val('');
		   parents.find('.minimusChat').addClass("glyphicon-minus");
		   parents.find('.chat_body').show(200);
		   parents.find('.noImg').css("display", "block"); 
		    parents.find('.imgAd').css("display", "none"); 
		   getAllActiveUser();
		}
		

	});
	
	
	// chat box hover
	$(document).on("mouseover", "#chatRow", function(){
	        $(this).css("background-color", "#E9EAED");
	});

	$(document).on("mouseleave", "#chatRow", function(){
	        $(this).css("background-color", "#FFFFFF");
	});
	
	
	$(document).on("click", ".removeChatBox", function(){
		var parents = $(this).parents('.chat_box');
		parents.remove();
		
		

	});
	
	// chat list refresh at a time
    
	 function getAllActiveUser() {
	  var hiddenValue = $('#chatHiddenId').val();
	  //alert(hiddenValue);
	  console.log(hiddenValue);
      var activeUser = "<?php echo $userAutoId; ?>";
       if(hiddenValue == ''){
		  $.ajax({
	        url : SAWEB.getSiteAction('liveChat/getAllActiveUser'),
			type: "POST",
			data : {},
			dataType: "html",
	        success: function (data) { 
	        	$("#chatBarShow").html(data);

	          }
	       });
		   setTimeout(getAllActiveUser, 8000);
        }
	}
	
	
	
	// see old message 
     $(document).on("click", ".oldMsg", function(event){
		var parents 	 = $(this).parents('#msgViewId');
		var sendToId 	 = parents.attr('data-id');
		console.log(sendToId);	

		  $.ajax({
			url : SAWEB.getSiteAction('liveChat/oldMsgView'), // URL TO LOAD BEHIND THE SCREEN
			type : "POST",
			data : { sendToId : sendToId},
			dataType : "html",
			success : function(data) {			
				parents.find("#oldMsgView").html(data);
				parents.find(".oldMsg").css("display", "none");
				
			}
		});	

        event.preventDefault();
	});
	
	// search user

	$(document).on("click", "#searchUser", function(event){
		var parents  = $(this).parents('.chat_box');
		var user 	 = parents.find("#search_user").val();
		
		if(user ==''){
			alert('please enter value');
			return false;
		} else {
		
			$.ajax({
					url : SAWEB.getSiteAction('liveChat/searchUser'), // URL TO LOAD BEHIND THE SCREEN
					type : "POST",
					data : { user : user},
					dataType : "html",
					success : function(data) {			
						parents.find(".chat_body").html(data);
						//parents.find("#search_user").val("");
						
					}
				});	
		}
        event.preventDefault();
	});
	//search field value remove
	
	/*function emptySearchField() {
	  var search_user = $('#search_user').val();
	  //alert(search_user);
       if(search_user == ''){
	        console.log($('#chatHiddenId').val(''));
			$('#chatHiddenId').val('');
        }
		
		setTimeout(emptySearchField, 5000);
	}
	*/
	
	
	
	
		
	
	
	


	





    
    



	
	
</script>