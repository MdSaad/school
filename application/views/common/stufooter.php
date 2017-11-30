<div class="col-md-11 col-lg-11 col-sm-12 headerBox">
				<div class="row" >
					<div class="col-md-2 col-sm-2 col-lg-2 leftBox paddingZero" style="min-height:55px">
						<a href="<?php echo site_url('studentLogin/logout'); ?>" class="logOut" > LogOut </a><br />
						<?php echo $UserDetails->stu_full_name; ?>
					</div>
					<div class="col-md-10 col-sm-10 col-lg-10 headerBox2" style="min-height:55px">
						<div class="row text-right">
							<a href="<?php echo site_url('authorize/createUser/changePassword'); ?>" class="" style="font-size:12px; padding:5px 0"> Change Password </a>
							<div class="col-md-3 text-right">
							
							</div>
						</div>	
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-md-12 myFooter">
					<img src="<?php echo base_url('resource/interface/img/usoft.png'); ?>" class="pull-left img-responsive">
					<div class="text-right">© 2016 <a href="www.usoftbd.com" target="_blank">www.usoftbd.com</a></div>
				</div>
				</div>	
</div>


 
<?php $this->load->view('common/jsLinkPage'); ?>
<script type="text/javascript" >
setTimeout( "jQuery('#alertMsg').fadeOut();",8000 );

</script>
