				<h1 class="page-title">
					<i class="icon-home"></i>
					新闻列表					
				</h1>
                
				<div class="widget widget-table">
										
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3>新闻列表</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>编号</th>
									<th>新闻标题</th>
									<th>更新时间</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							
							<tbody>
                            <?php if(!empty($result)): ?>
                            	<?php foreach($result as $row): ?>
								<tr>
									<td><?php echo $row->article_id; ?></td>
									<td><?php echo $row->article_title; ?></td>
									<td><?php echo date('Y-m-d H:i:s', $row->article_posttime); ?></td>
									<td class="action-td">
										<a href="<?php echo site_url('article_add/edit/' . $row->article_id); ?>" class="btn btn-small btn-warning">
											<i class="icon-edit"></i>								
										</a>
									</td>
								</tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                            	<tr>
                                	<td colspan="6">没有新闻</td>
                                </tr>
                            <?php endif; ?>
							</tbody>
						</table>
					
					</div> <!-- /widget-content -->
					
				</div>