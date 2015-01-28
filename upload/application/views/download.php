		<link href="<?php echo base_url('resources/css/article.css'); ?>" rel="stylesheet" type="text/css" />
		<div class="row content">
			<h1>资料下载</h1>
			<?php if(!empty($result)): ?>
			<table class="content-table" width="100%">
				<thead>
					<tr>
						<th>资料名称</th>
						<th>发布时间</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
				<?php for($i=0; $i<count($result); $i++): ?>
					<tr>
						<td><?php echo $result[$i]->name; ?></td>
						<td><?php echo date('Y-m-d H:i:s', $result[$i]->time); ?></td>
						<td><a href="<?php echo $result[$i]->filepath; ?>">下载</a></td>
					</tr>
				<?php endfor; ?>
				</tbody>
			</table>
			<?php if(!empty($pagination)): ?>
			<p style="margin-top:10px;text-align:center;">
			<?php echo $pagination; ?>
			</p>
			<?php endif; ?>
			<?php else: ?>
			<p>没有可以显示的内容</p>
			<?php endif; ?>
		</div>