<?php $this->load->view('common/cssLinkPage'); ?>
	<body class="no-skin">
        <div id="navbar" class="navbar navbar-default">
            <script type="text/javascript">
                try{ace.settings.check('navbar' , 'fixed')}catch(e){}
            </script>
        
            <div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>
				<img src="<?php echo base_url('resource/basicImg/'.$basisInfo->inst_logo); ?>" style="max-height:45px" class="pull-left img-responsive img-thumbnail" />
				<div class="navbar-header pull-left">
					<a href="<?php echo site_url('adminHome'); ?>" class="navbar-brand">
						<small>
							<?php echo $basisInfo->inst_name; ?>&nbsp;&nbsp;<i class="glyphicon glyphicon-forward"></i>&nbsp;&nbsp;Admin Panel
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="green">
							
							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										

										
									</ul>
								</li>

								
							</ul>
						</li>

						
					</ul>
				</div>
			</div><!-- /.navbar-container -->
        </div>
        
        <div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			
            
            <div id="sidebar" class="sidebar responsive">
				<script type="text/javascript">
                    try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
                </script>
            
                <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                        <button class="btn btn-success">
                            <i class="ace-icon fa fa-signal"></i>
                        </button>
            
                        <button class="btn btn-info">
                            <i class="ace-icon fa fa-pencil"></i>
                        </button>
            
                        <button class="btn btn-warning">
                            <i class="ace-icon fa fa-users"></i>
                        </button>
            
                        <button class="btn btn-danger">
                            <i class="ace-icon fa fa-cogs"></i>
                        </button>
                    </div>
            
                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class="btn btn-success"></span>
            
                        <span class="btn btn-info"></span>
            
                        <span class="btn btn-warning"></span>
            
                        <span class="btn btn-danger"></span>
                    </div>
                </div> <!--/.sidebar-shortcuts -->
				
				
				<?php
					$file_name = $this->router->fetch_class();
			     ?>
            
                <ul class="nav nav-list">
                    <li class="<?php if($file_name == 'adminHome') echo 'active' ?>">
                        <a href="<?php echo site_url('adminHome'); ?>">
                            <i class="menu-icon fa fa-tachometer"></i>
                            <span class="menu-text">Dashboard </span>
                        </a>
                    
                        <b class="arrow"></b>
                    </li>
					
					
					<li class="<?php if($file_name == 'createUser') echo 'active' ?>">
                        <a href="<?php echo site_url('createUser'); ?>">
                            <i class="menu-icon fa fa-desktop"></i>
                            <span class="menu-text">
                              Create User
                            </span>
                        </a>
                    </li>
					
					<li class="">
                        <a href="<?php echo site_url('adminLogin/logout'); ?>">
                            <i class="menu-icon fa fa-desktop"></i>
                            <span class="menu-text">
                               Log Out
                            </span>
                        </a>
                    </li>
					
                    
                    
                    
                    
                </ul><!-- /.nav-list -->
            
                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            
            </div>