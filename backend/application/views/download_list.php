				<h1 class="page-title">
					<i class="icon-home"></i>
					资料下载管理
				</h1>
				<div class="widget">
                    
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3><?php if(empty($edit)): ?>添加<?php else: ?>修改<?php endif; ?>资料</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
						<form id="edit-profile" class="form-horizontal" action="<?php echo site_url('download_list/submit'); ?>" method="post" />
                                    <fieldset>
                                        <input type="hidden" id="edit" name="edit" value="<?php echo $edit; ?>" />
                                        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>" />
                                        <div class="control-group">											
                                            <label class="control-label" for="downloadName">名称</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="downloadName" name="downloadName" value="<?php echo $value->name; ?>" />
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="sliderUrl">上传资料</label>
                                            <div class="controls">
                                                <input name="picUpload" type="file" id="picUpload" size="20" class="input-medium" />
                                                <input type="button" name="btnUpload" id="btnUpload" value="上传" onclick="javascript:contentFileUpload('<?php echo site_url('utils/doFileUpload'); ?>', 'picUpload', 'sliderPicPathContent', 'downloadFilepath')" class="btn btn-primary" />
                                                <input name="downloadFilepath" type="hidden" id="downloadFilepath" value="<?php echo $value->filepath; ?>" />
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                        <div id="sliderPicPathContent" class="control-group"></div>
                                        
                                        <br />
                                        
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary">提交</button>
                                        </div> <!-- /form-actions -->
                                    </fieldset>
                                </form>
					
					</div> <!-- /widget-content -->
				
				</div>
				
                <?php if(empty($edit)): ?>
				<div class="widget widget-table">
				
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3>资料列表</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
						<table class="table table-striped table-bordered" id="imgTable">
							<thead>
								<tr>
									<th>编号</th>
									<th>名称</th>
									<th>文件路径</th>
									<th>发布时间</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							
							<tbody>
                            <?php if(!empty($result)): ?>
                            	<?php foreach($result as $row): ?>
								<tr>
									<td><?php echo $row->id; ?></td>
									<td><?php echo $row->name; ?></td>
									<td><a href="<?php echo $row->filepath; ?>" target="_blank"><?php echo $row->filepath; ?></a></td>
									<td><?php echo date('Y-m-d H:i:s', $row->time); ?></td>
									<td class="action-td">
										<a href="<?php echo site_url('download_list/edit/' . $row->id); ?>" class="btn btn-small btn-warning">
											<i class="icon-edit"></i>								
										</a>					
										<a href="<?php echo site_url('download_list/delete/' . $row->id); ?>" class="btn btn-small">
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
                                	<td colspan="5">没有资料</td>
                                </tr>
                            <?php endif; ?>
							</tbody>
						</table>
					
					</div> <!-- /widget-content -->
				
				</div>
                <?php endif; ?>
                <script src="<?php echo base_url('resources/admin/js/uploader/ajaxfileupload.js'); ?>" language="javascript"></script>
                <script src="<?php echo base_url('resources/admin/js/upload.js'); ?>" language="javascript"></script>