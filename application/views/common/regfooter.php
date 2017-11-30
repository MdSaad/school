<div class="col-md-11 col-lg-11 col-sm-12 headerBox">
				<div class="row" >
					<div class="col-md-2 col-sm-2 col-lg-2 leftBox paddingZero" style="min-height:55px">
					</div>
					<div class="col-md-10 col-sm-10 col-lg-10 headerBox2" style="min-height:55px">
						<div class="row text-right">
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


 <?php if(!empty($alertMsg)) { ?> 
	<div class="alert alert-block alert-danger" id="alertMsg">
		<button class="close" data-dismiss="alert" type="button">
		<i class="ace-icon fa fa-times"></i>
		</button>
		<strong class="green">
		<i class="ace-icon fa fa-check-square-o"></i>
		
		</strong>
		<span class="alrtText"><?php echo $alertMsg; ?></span>
	</div>
	<?php } ?>
<?php $this->load->view('common/jsLinkPage'); ?>
<script type="text/javascript" >
setTimeout( "jQuery('#alertMsg').fadeOut();",8000 );

</script>
