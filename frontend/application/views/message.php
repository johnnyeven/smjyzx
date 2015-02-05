		<link href="<?php echo base_url('resources/css/article.css'); ?>" rel="stylesheet" type="text/css" />
		<div class="row content">
			<h1><?php if($type != MESSAGE_TYPE_SUCCESS): ?>错误<?php endif; ?>信息</h1>
			<div id="login-content" class="clearfix">
			
		        <h2 style="font-size:16px;color:#ff0000;"><?php echo lang($info); ?></h2>
		        <p><?php echo $return_content; ?></p>
					
			</div>
		</div>