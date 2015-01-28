		<link href="<?php echo base_url('resources/css/article.css'); ?>" rel="stylesheet" type="text/css" />
		<div class="row content">
			<h1><?php echo $result->name; ?></h1>
			<div class="meta">
				<span>编号：<?php echo $result->number; ?></span>
				<span>名称：<?php echo $result->name; ?></span>
				<span>类别：<?php echo $result->category_name; ?></span>
			</div>
			<div class="meta" style="padding-top:0;">
				<span>开标时间：<?php echo date('Y-m-d H:i:s', $result->start_time); ?></span>
				<span>开标室：<?php echo $result->location_name; ?></span>
			</div>
			<div class="main">
				<?php echo $result->content; ?>
			</div>
		</div>