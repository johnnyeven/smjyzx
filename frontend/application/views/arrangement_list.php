		<link href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('resources/css/jquery-ui.css'); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('resources/css/article.css'); ?>" rel="stylesheet" type="text/css" />
		<div class="row content">
			<h1><?php echo date('Y年m月d日', $monday_time); ?> - <?php echo date('Y年m月d日', $friday_time); ?>开评标安排</h1>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>日期</th>
						<th>开标时间</th>
						<th>项目名称</th>
						<th>项目编号</th>
						<th>项目类型</th>
						<th>采购单位</th>
						<th>开评标地点</th>
					</tr>
				</thead>
				
				<tbody>
                	<?php foreach($result as $key => $row): ?>
					<tr>
						<td><?php echo lang('DAY' . $key); ?></td>
						<?php if(!empty($row)): ?>
						<td><?php echo date('Y-m-d H:i:s', $row->start_time); ?></td>
						<?php
						if(!empty($row->url))
						{
							$url = $row->url;
							$target = '_blank';
						}
						else
						{
							$url = site_url("bid/show/" . $row->id);
							$target = '_self';
						}
						?>
						<td><a href="<?php echo $url; ?>" target="<?php echo $target; ?>"><?php echo $row->name; ?></a></td>
						<td><?php echo $row->number; ?></td>
						<td><?php echo $row->category_name; ?></td>
						<td><?php echo $row->unit_name; ?></td>
						<td><?php echo $row->location_name; ?></td>
						<?php else: ?>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<?php endif; ?>
					</tr>
                    <?php endforeach; ?>
                	<tr>
                    	<td style="text-align:right;" colspan="7"><?php echo $pagination; ?></td>
                    </tr>
				</tbody>
			</table>
		</div>
		<script type="text/javascript" src="<?php echo base_url('resources/js/jquery.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('resources/js/jquery-ui.js'); ?>"></script>
		<script type="text/javascript">
		$(function() {
			$.datepicker.regional['zh-CN'] = {
				clearText: '清除',
				clearStatus: '清除已选日期',
				closeText: '关闭',
				closeStatus: '不改变当前选择',
				prevText: '<上月',
				prevStatus: '显示上月',
				prevBigText: '<<',
				prevBigStatus: '显示上一年',
				nextText: '下月>',
				nextStatus: '显示下月',
				nextBigText: '>>',
				nextBigStatus: '显示下一年',
				currentText: '今天',
				currentStatus: '显示本月',
				monthNames: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
				monthNamesShort: ['一', '二', '三', '四', '五', '六', '七', '八', '九', '十', '十一', '十二'],
				monthStatus: '选择月份',
				yearStatus: '选择年份',
				weekHeader: '周',
				weekStatus: '年内周次',
				dayNames: ['星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'],
				dayNamesShort: ['周日', '周一', '周二', '周三', '周四', '周五', '周六'],
				dayNamesMin: ['日', '一', '二', '三', '四', '五', '六'],
				dayStatus: '设置 DD 为一周起始',
				dateStatus: '选择 m月 d日, DD',
				dateFormat: 'yy-mm-dd',
				firstDay: 7,
				initStatus: '请选择日期',
				isRTL: false
			};
			$.datepicker.setDefaults($.datepicker.regional['zh-CN']);
			$(".datepicker").datepicker();
		});
		</script>