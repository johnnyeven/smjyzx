		<link href="<?php echo base_url('resources/css/article.css'); ?>" rel="stylesheet" type="text/css" />
		<div class="row content">
			<h1><?php echo $category_name; ?></h1>
			<?php if(!empty($result)): ?>
			<ul>
				<?php for($i=0; $i<count($result); $i++): ?>
				<?php if(empty($result[$i]->attatchment)): ?>
					<?php
					if(!empty($result[$i]->url))
					{
						$url = $result[$i]->url;
						$blank = ' target="_blank"';
					}
					else
					{
						$url = site_url("article/show/" . $result[$i]->id);
					}
					?>
					<?php if($i != count($result) - 1): ?>
	                <li><span class="list-title" style="width:700px;"><a href="<?php echo $url ?>"<?php echo $blank; ?>><?php echo shorty_string($result[$i]->name, 96); ?></a></span><span class="list-date"><?php echo date('m月d日', $result[$i]->time); ?></span></li>
	                <?php else: ?>
	                <li class="list-last"><span class="list-title" style="width:700px;"><a href="<?php echo $url ?>"<?php echo $blank; ?>><?php echo shorty_string($result[$i]->name, 96); ?></a></span><span class="list-date"><?php echo date('m月d日', $result[$i]->time); ?></span></li>
	                <?php endif; ?>
	            <?php else: ?>
					<?php if($i != count($result) - 1): ?>
	                <li><span class="list-title" style="width:700px;"><a href="<?php echo $result[$i]->attatchment; ?>"><?php echo shorty_string($result[$i]->name, 96); ?></a></span><span class="list-date"><?php echo date('m月d日', $result[$i]->time); ?></span></li>
	                <?php else: ?>
	                <li class="list-last"><span class="list-title" style="width:700px;"><a href="<?php echo $result[$i]->attatchment; ?>"><?php echo shorty_string($result[$i]->name, 96); ?></a></span><span class="list-date"><?php echo date('m月d日', $result[$i]->time); ?></span></li>
	                <?php endif; ?>
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