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
					<li<?php if($page_name=='account'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('account'); ?>">
							<i class="icon-th-list"></i>
							管理员管理
						</a>
					</li>

					<li<?php if($page_name=='jianjie_list'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('jianjie_list'); ?>">
							<i class="icon-th-list"></i>
							中心简介
						</a>
					</li>
                    
					<li<?php if($page_name=='fagui_list'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('fagui_list/show'); ?>">
							<i class="icon-th-list"></i>
							政策法规
						</a>
					</li>
                    
					<li<?php if($page_name=='download_list'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('download_list/show'); ?>">
							<i class="icon-th-list"></i>
							资料下载
						</a>
					</li>
                    
					<li<?php if($page_name=='guide_list'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('guide_list'); ?>">
							<i class="icon-th-list"></i>
							服务指南
						</a>
					</li>
					
					<li<?php if($page_name=='news_list'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('news_list/show'); ?>">
							<i class="icon-th-list"></i>
							中心动态
						</a>
					</li>
					
					<li<?php if($page_name=='anouncement_list'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('anouncement_list/show'); ?>">
							<i class="icon-user"></i>
							通知公告
						</a>
					</li>
					
					<li<?php if($page_name=='gongcheng_list'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('gongcheng_list/show'); ?>">
							<i class="icon-user"></i>
							建设工程
						</a>
					</li>
					
					<li<?php if($page_name=='caigou_list'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('caigou_list/show'); ?>">
							<i class="icon-user"></i>
							政府采购
						</a>
					</li>
					
					<li<?php if($page_name=='chanquan_list'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('chanquan_list/show'); ?>">
							<i class="icon-user"></i>
							产权交易
						</a>
					</li>
					
					<li<?php if($page_name=='tudi_list'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('tudi_list/show'); ?>">
							<i class="icon-user"></i>
							土地出让
						</a>
					</li>
					
					<li<?php if($page_name=='yuyue_list'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('yuyue_list/show'); ?>">
							<i class="icon-user"></i>
							场地预约
						</a>
					</li>
					
					<li<?php if($page_name=='anpai_list'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('anpai_list/show'); ?>">
							<i class="icon-user"></i>
							开标安排
						</a>
					</li>
					
					<li<?php if($page_name=='pic_list'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('pic_list/show'); ?>">
							<i class="icon-user"></i>
							图片快讯
						</a>
					</li>
					
					<li<?php if($page_name=='link_list'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('link_list/show'); ?>">
							<i class="icon-user"></i>
							友情链接
						</a>
					</li>
					
				</ul>
		
			</div>