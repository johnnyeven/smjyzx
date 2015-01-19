				<h1 class="page-title">
					<i class="icon-home"></i>
					职位列表					
				</h1>
				
				<div class="row">
					
					<div class="span9">
                        <form id="edit_category" class="form-horizontal" method="post" action="" >
                            <fieldset>
                                <select class="input-medium" id="jobCategory" name="jobCategory" onchange="edit_category.submit();">
                                    <option value="0">全部类别</option>
                                    <option value="1"<?php if($category=='1'): ?> selected="selected"<?php endif; ?>>技术类</option>
                                    <option value="2"<?php if($category=='2'): ?> selected="selected"<?php endif; ?>>业务类</option>
                                    <option value="3"<?php if($category=='3'): ?> selected="selected"<?php endif; ?>>美术类</option>
                                    <option value="4"<?php if($category=='4'): ?> selected="selected"<?php endif; ?>>职能类</option>
                                </select>
                            </fieldset>
                        </form>
                    </div>
                    
                </div>
                
				<div class="widget widget-table">
										
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3>职位列表</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>编号</th>
									<th>职位名称</th>
									<th>人数</th>
									<th>开始时间</th>
									<th>结束时间</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							
							<tbody>
                            <?php if(!empty($result)): ?>
                            	<?php foreach($result as $row): ?>
								<tr>
									<td><?php echo $row->job_id; ?></td>
									<td><?php echo $row->job_name; ?></td>
									<td><?php echo $row->job_count; ?></td>
									<td><?php echo date('Y-m-d', $row->job_posttime); ?></td>
									<td><?php echo date('Y-m-d', $row->job_endtime); ?><?php if($row->job_endtime < time()): ?><span style="color:#F00">(已过期)</span><?php endif; ?></td>
									<td class="action-td">
										<a href="<?php echo site_url('job_add/edit/' . $row->job_id); ?>" class="btn btn-small btn-warning">
											<i class="icon-edit"></i>								
										</a>					
										<a href="<?php echo site_url('job_list/delete/' . $row->job_id); ?>" class="btn btn-small">
											<i class="icon-remove"></i>						
										</a>
									</td>
								</tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                            	<tr>
                                	<td colspan="6">没有职位</td>
                                </tr>
                            <?php endif; ?>
							</tbody>
						</table>
					
					</div> <!-- /widget-content -->
					
				</div>