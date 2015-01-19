				<h1 class="page-title">
					<i class="icon-home"></i>
					管理员管理					
				</h1>
                <?php if(empty($edit)): ?>
				<div class="widget widget-table">
				
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3>管理员列表</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>编号</th>
									<th>帐户名</th>
									<th>创建时间</th>
									<th>最后登录时间</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							
							<tbody>
                            <?php if(!empty($result)): ?>
                            	<?php foreach($result as $row): ?>
								<tr>
									<td><?php echo $row->admin_id; ?></td>
									<td><?php echo $row->admin_account; ?></td>
									<td><?php if(!empty($row->admin_starttime)) echo date('Y-m-d', $row->admin_starttime); else echo '-'; ?></td>
									<td><?php if(!empty($row->admin_lastlogin)) echo date('Y-m-d', $row->admin_lastlogin); else echo '-'; ?></td>
									<td class="action-td">
										<a href="<?php echo site_url('account/edit/' . $row->admin_id); ?>" class="btn btn-small btn-warning">
											<i class="icon-edit"></i>								
										</a>					
										<a href="<?php echo site_url('account/delete/' . $row->admin_id); ?>" class="btn btn-small">
											<i class="icon-remove"></i>						
										</a>
									</td>
								</tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                            	<tr>
                                	<td colspan="6">没有管理员</td>
                                </tr>
                            <?php endif; ?>
							</tbody>
						</table>
					
					</div> <!-- /widget-content -->
				
				</div>
                <?php endif; ?>
                <?php if($admin->admin_init == '1' || !empty($edit)): ?>
				<div class="widget">
                    
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3><?php if(empty($edit)): ?>添加<?php else: ?>修改<?php endif; ?>管理员</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
						<form id="edit-profile" class="form-horizontal" action="<?php echo site_url('account/submit'); ?>" method="post" />
                                    <fieldset>
                                        <input type="hidden" id="edit" name="edit" value="<?php echo $edit; ?>" />
                                        <input type="hidden" id="adminId" name="adminId" value="<?php echo $admin_id; ?>" />
                                        <div class="control-group">											
                                            <label class="control-label" for="adminAccount">帐户名</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="adminAccount" name="adminAccount" value="<?php echo $value->admin_account; ?>" />
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="adminPass">密码</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="adminPass" name="adminPass" value="" />
												<?php if(!empty($edit)): ?><p class="help-block">如果不修改密码请留空！</p><?php endif; ?>
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                        <br />
                                        
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary">提交</button>
                                        </div> <!-- /form-actions -->
                                    </fieldset>
                                </form>
					
					</div> <!-- /widget-content -->
				
				</div>
                <?php endif; ?>