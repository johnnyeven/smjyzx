		<link href="<?php echo base_url('resources/css/article.css'); ?>" rel="stylesheet" type="text/css" />
		<div class="row content">
			<h1><?php echo $result->name; ?></h1>
			<div class="meta">
				<span>分类：<?php echo $result->category_name; ?></span>
				<span>来源：<?php echo $result->refer_name; ?></span>
				<span>时间：<?php echo date('Y-m-d H:i:s', $result->time); ?></span>
			</div>
			<div class="main">
				<?php echo $result->content; ?>
			</div>
		</div>