<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 				
			</a>
			
			<a class="brand" href="./">后台管理</a>
			
			<div class="nav-collapse">
			
				<ul class="nav pull-right">
					<li class="divider-vertical"></li>
					
					<li class="dropdown">
						
						<a data-toggle="dropdown" class="dropdown-toggle " href="#">
							<?php echo $admin->admin_account; ?> <b class="caret"></b>							
						</a>
						
						<ul class="dropdown-menu">
							<li>
								<a href="<?php echo site_url('account/edit/' . $admin->admin_id); ?>"><i class="icon-lock"></i> 更改密码</a>
							</li>
							
							<li class="divider"></li>
							
							<li>
								<a href="<?php echo site_url('login/out'); ?>"><i class="icon-off"></i> 退出登录</a>
							</li>
						</ul>
					</li>
				</ul>
				
			</div> <!-- /nav-collapse -->
			
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div>