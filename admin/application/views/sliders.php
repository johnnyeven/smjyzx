				<h1 class="page-title">
					<i class="icon-home"></i>
					首页轮播图片管理
				</h1>
                
				<div class="widget widget-table">
				
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3>图片列表</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
						<table class="table table-striped table-bordered" id="imgTable">
							<thead>
								<tr>
									<th>编号</th>
									<th>排序</th>
									<th>图片</th>
									<th>链接</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							
							<tbody>
                            <?php if(!empty($result)): ?>
                            	<?php foreach($result as $row): ?>
								<tr>
									<td><?php echo $row->slider_id; ?></td>
									<td><?php echo $row->slider_sort; ?></td>
									<td><img src="<?php echo $row->slider_pic_path; ?>" style="" /></td>
									<td style="word-break:break-all;"><?php echo $row->slider_url; ?></td>
									<td class="action-td">
										<a href="<?php echo site_url('sliders/edit/' . $row->slider_id); ?>" class="btn btn-small btn-warning">
											<i class="icon-edit"></i>								
										</a>					
										<a href="<?php echo site_url('sliders/delete/' . $row->slider_id); ?>" class="btn btn-small">
											<i class="icon-remove"></i>						
										</a>
									</td>
								</tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                            	<tr>
                                	<td colspan="6">没有图片</td>
                                </tr>
                            <?php endif; ?>
							</tbody>
						</table>
					
					</div> <!-- /widget-content -->
				
				</div>
                
				<div class="widget">
                    
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3><?php if(empty($edit)): ?>添加<?php else: ?>修改<?php endif; ?>图片</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
						<form id="edit-profile" class="form-horizontal" action="<?php echo site_url('sliders/submit'); ?>" method="post" />
                                    <fieldset>
                                        <input type="hidden" id="edit" name="edit" value="<?php echo $edit; ?>" />
                                        <input type="hidden" id="sliderId" name="sliderId" value="<?php echo $slider_id; ?>" />
                                        <div class="control-group">											
                                            <label class="control-label" for="sliderSort">排序</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="sliderSort" name="sliderSort" value="<?php echo $value->slider_sort; ?>" />
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="sliderUrl">链接</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="sliderUrl" name="sliderUrl" value="<?php echo $value->slider_url; ?>" />
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="sliderUrl">上传图片</label>
                                            <div class="controls">
                                                <input name="picUpload" type="file" id="picUpload" size="20" class="input-medium" />
                                                <input type="button" name="btnUpload" id="btnUpload" value="上传" onclick="javascript:contentPicUpload('picUpload', 'sliderPicPathContent', 'sliderPicPath')" class="btn btn-primary" />
                                                <input name="sliderPicPath" type="hidden" id="sliderPicPath" value="<?php echo $value->slider_pic_path; ?>" />
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
                <script src="<?php echo base_url('resources/admin/js/uploader/ajaxfileupload.js'); ?>" language="javascript"></script>
                <script src="<?php echo base_url('resources/admin/js/upload.js'); ?>" language="javascript"></script>
                <script src="<?php echo base_url('resources/admin/js/jquery.resizeimg.js'); ?>" language="javascript"></script>
                <script language="javascript">
				$(function() {
					$("#imgTable img").resizeImg({w: 300, h: 150});
				});
				</script>