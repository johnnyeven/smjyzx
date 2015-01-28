		<link href="<?php echo base_url('resources/css/article.css'); ?>" rel="stylesheet" type="text/css" />
		<div class="row content">
			<h1>友情链接</h1>
			<?php if(!empty($result)): ?>
			<ul>
				<?php for($i=0; $i<count($result); $i++): ?>
				<?php if($i != count($result) - 1): ?>
                <li><span class="list-title" style="width:700px;"><a target="_blank" href="<?php echo $result[$i]->link; ?>"><?php echo $result[$i]->name; ?></a></span></li>
                <?php else: ?>
                <li class="list-last"><span class="list-title" style="width:700px;"><a target="_blank" href="<?php echo $result[$i]->link; ?>"><?php echo $result[$i]->name; ?></a></span></li>
                <?php endif; ?>
				<?php endfor; ?>
			</ul>
			<?php if(!empty($pagination)): ?>
			<p style="margin-top:10px;text-align:center;">
			<?php echo $pagination; ?>
			</p>
			<?php endif; ?>
			<?php else: ?>
			<p>没有可以显示的内容</p>
			<?php endif; ?>
		</div>