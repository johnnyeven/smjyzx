				<link rel="stylesheet" href="<?php echo base_url('resources/admin/css/jquery-ui.css'); ?>" type="text/css" />
				<h1 class="page-title">
					<i class="icon-home"></i>
					友情链接管理
				</h1>
                <?php if(empty($edit)): ?>
				<div class="widget widget-table">
				
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3>链接列表</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
						<table class="table table-striped table-bordered" id="imgTable">
							<thead>
								<tr>
									<th>编号</th>
									<th>名字</th>
									<th>链接</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							
							<tbody>
                            <?php if(!empty($result)): ?>
                            	<?php foreach($result as $row): ?>
								<tr>
									<td><?php echo $row->id; ?></td>
									<td><?php echo $row->name; ?></td>
									<td><?php echo $row->link; ?></td>
									<td class="action-td">
										<a href="<?php echo site_url('link_list/edit/' . $row->id); ?>" class="btn btn-small btn-warning">
											<i class="icon-edit"></i>								
										</a>					
										<a href="<?php echo site_url('link_list/delete/' . $row->id); ?>" class="btn btn-small">
											<i class="icon-remove"></i>						
										</a>
									</td>
								</tr>
                                <?php endforeach; ?>
                            	<tr>
                                	<td style="text-align:right;" colspan="5"><?php echo $pagination; ?></td>
                                </tr>
                            <?php else: ?>
                            	<tr>
                                	<td colspan="5">没有链接</td>
                                </tr>
                            <?php endif; ?>
							</tbody>
						</table>
					
					</div> <!-- /widget-content -->
				
				</div>
                <?php endif; ?>
				<div class="widget">
                    
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3><?php if(empty($edit)): ?>添加<?php else: ?>修改<?php endif; ?>链接</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
						<form id="edit-profile" class="form-horizontal" action="<?php echo site_url('link_list/submit'); ?>" method="post" />
                                    <fieldset>
                                        <input type="hidden" id="edit" name="edit" value="<?php echo $edit; ?>" />
                                        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>" />
                                        <div class="control-group">											
                                            <label class="control-label" for="linkName">名称</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="linkName" name="linkName" value="<?php echo $value->name; ?>" />
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        <div class="control-group">											
                                            <label class="control-label" for="linkUrl">链接</label>
                                            <div class="controls">
                                                <input type="text" class="input-xlarge" id="linkUrl" name="linkUrl" value="<?php echo $value->link; ?>" />
                                                <p class="help-block">请在链接开头带上"http://"</p>
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                        <br />
                                        
                                        <div class="form-actions">
                                            <button id="btnSubmit" type="submit" class="btn btn-primary">提交</button>
                                        </div> <!-- /form-actions -->
                                    </fieldset>
                                </form>
					
					</div> <!-- /widget-content -->
				
				</div>
				<script type="text/javascript">
				function IsURL(str_url) {
					var strRegex = "^https?://(.*\.)+([A-Za-z0-9])+\/?$"; 
					var re=new RegExp(strRegex); 
					//re.test()
					if (re.test(str_url)) {
						return (true); 
					} else { 
						return (false); 
					}
				}
				$(function() {
					$("#btnSubmit").click(function() {
						var url = $("#linkUrl").val();
						if(!IsURL(url)) {
							alert('链接格式不正确，请确保链接以http://或者是https://开头');
							return false;
						}
					});
				});
				</script>