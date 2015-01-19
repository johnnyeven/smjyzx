			<div class="span3">
				
				<div class="account-container">
				
					<div class="account-details">
					
						<span class="account-name"><?php echo $admin->admin_account; ?></span>
						
						<span class="account-role">管理员</span>
						
						<span class="account-actions">
							<a href="<?php echo site_url('account/edit/' . $admin->admin_id); ?>">更改密码</a> |
							
							<a href="<?php echo site_url('login/out'); ?>">退出登录</a>
						</span>
					
					</div> <!-- /account-details -->
				
				</div> <!-- /account-container -->
				
				<hr />
				
				<ul id="main-nav" class="nav nav-tabs nav-stacked">
                
					<li<?php if($page_name=='config'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('config'); ?>">
							<i class="icon-home"></i>
							基本配置
						</a>
					</li>
					
					<li<?php if($page_name=='sliders'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('sliders'); ?>">
							<i class="icon-home"></i>
							首页幻灯管理
						</a>
					</li>
                    
					<li<?php if($page_name=='article_list'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('article_list'); ?>">
							<i class="icon-th-list"></i>
							新闻管理
						</a>
					</li>
                    
					<li<?php if($page_name=='product_list'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('product_list'); ?>">
							<i class="icon-th-list"></i>
							产品管理
						</a>
					</li>
                    
					<li<?php if($page_name=='product_add'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('product_add'); ?>">
							<i class="icon-th-list"></i>
							添加/修改产品
						</a>
					</li>
                    
					<li<?php if($page_name=='job_list'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('job_list'); ?>">
							<i class="icon-th-list"></i>
							职位列表
						</a>
					</li>
					
					<li<?php if($page_name=='job_add'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('job_add'); ?>">
							<i class="icon-th-list"></i>
							添加/修改职位
						</a>
					</li>
					
					<li<?php if($page_name=='account'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('account'); ?>">
							<i class="icon-user"></i>
							管理员设置
						</a>
					</li>
					
				</ul>
		
			</div>