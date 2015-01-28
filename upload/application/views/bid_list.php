		<link href="<?php echo base_url('resources/css/article.css'); ?>" rel="stylesheet" type="text/css" />
		<div class="row content">
			<h1><?php echo $category_name; ?></h1>
			<?php if(!empty($result)): ?>
			<table class="content-table" width="100%">
				<thead>
					<tr>
						<th>编号</th>
						<th>项目名称</th>
						<th>项目类别</th>
						<th>开标时间</th>
						<th>开标室</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($result as $row): ?>
					<tr>
						<td><?php echo $row->number; ?></td>
						<td><a href="<?php echo site_url('bid/show/' . $row->id); ?>"><?php echo $row->name; ?></a></td>
						<td><?php echo $row->category_name; ?></td>
						<td><?php echo date('Y-m-d H:i:s', $row->start_time); ?></td>
						<td><?php echo $row->location_name; ?></td>
					</tr>
					<?php endforeach; ?>
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