				<link rel="stylesheet" href="<?php echo base_url('resources/admin/css/jquery-ui.css'); ?>" type="text/css" />
				<h1 class="page-title">
					<i class="icon-home"></i>
					图片快讯管理
				</h1>
                <?php if(empty($edit)): ?>
				<div class="widget widget-table">
				
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3>文章列表</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
						<table class="table table-striped table-bordered" id="imgTable">
							<thead>
								<tr>
									<th>编号</th>
									<th>标题</th>
									<th>图片</th>
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
									<?php
									$picArray = explode(';', $row->pic);
									?>
									<td><img src="<?php echo $picArray[0]; ?>" /></td>
									<td><?php echo date('Y-m-d H:i:s', $row->time); ?></td>
									<td class="action-td">
										<a href="<?php echo site_url('pic_list/edit/' . $row->id); ?>" class="btn btn-small btn-warning">
											<i class="icon-edit"></i>								
										</a>					
										<a href="<?php echo site_url('pic_list/delete/' . $row->id); ?>" class="btn btn-small">
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
                                	<td colspan="5">没有文章</td>
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
						<h3><?php if(empty($edit)): ?>添加<?php else: ?>修改<?php endif; ?>资料</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
						<form id="edit-profile" class="form-horizontal" action="<?php echo site_url('pic_list/submit'); ?>" method="post" />
                                    <fieldset>
                                        <input type="hidden" id="edit" name="edit" value="<?php echo $edit; ?>" />
                                        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>" />
                                        <div class="control-group">											
                                            <label class="control-label" for="newsName">名称</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="newsName" name="newsName" value="<?php echo $value->name; ?>" />
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        <div class="control-group">											
                                            <label class="control-label" for="newsRefer">来源</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="newsRefer" name="newsRefer" value="<?php echo $value->refer; ?>" />
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="articleTime">发布时间</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="articleTime" name="articleTime" value="<?php if(!empty($value->time)) echo date('Y-m-d H:i:s', $value->time); else echo date('Y-m-d H:i:s') ?>" />
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="sliderUrl">上传图片</label>
                                            <div class="controls">
                                                <input name="picUpload" type="file" id="picUpload" size="20" class="input-medium" />
                                                <input type="button" name="btnUpload" id="btnUpload" value="上传" onclick="javascript:contentPicUpload('<?php echo site_url('utils/doPicUpload'); ?>', 'picUpload', 'newsPicPathContent', 'newsPicFilepath', 'append', 5)" class="btn btn-primary" />
                                                <input name="newsPicFilepath" type="hidden" id="newsPicFilepath" value="<?php echo $value->pic; ?>" />
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        <div id="newsPicPathContent" class="control-group">
										<?php if(!empty($edit)): ?>
										<?php
										$picArray = explode(';', $value->pic);
										foreach($picArray as $path)
										{
											if(!empty($path)) echo "<div style='padding:10px;border:#CCC 1px solid;width:200px;height:200px;float:left;margin-right:10px;'><img src='" . $path . "' /><a href='#'>删除</a></div>";
										}
										?>
										<?php endif; ?>
                                        </div>
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="wysisyg">新闻内容</label>
                                            <div class="controls">
                                                <textarea id="wysiwyg" name="wysiwyg" cols="50" rows="20" class="wysiwyg"><?php echo $value->content; ?></textarea>
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
                <script src="<?php echo base_url('resources/js/ckeditor/ckeditor.js'); ?>" language="javascript"></script>
                <script src="<?php echo base_url('resources/admin/js/jquery-ui.js'); ?>" language="javascript"></script>
                <script src="<?php echo base_url('resources/admin/js/jquery.resizeimg.js'); ?>" language="javascript"></script>
                <script src="<?php echo base_url('resources/admin/js/uploader/ajaxfileupload.js'); ?>" language="javascript"></script>
                <script src="<?php echo base_url('resources/admin/js/upload.js'); ?>" language="javascript"></script>
                <script language="javascript">
				$(function() {
					CKEDITOR.replace( 'wysiwyg' );
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
					$("#articleTime").datepicker();
					$("#imgTable img").resizeImg({w: 300, h: 150});
					$("#newsPicPathContent img").resizeImg({w: 200, h: 200});
					$("#newsPicPathContent a").click(function() {
						var path = $(this).prev().attr('src');
						var value = $("#newsPicFilepath").val();
						$("#newsPicFilepath").val(value.replace(path + ";", ""));
						$(this).parent().remove();
					});
				});
				</script>