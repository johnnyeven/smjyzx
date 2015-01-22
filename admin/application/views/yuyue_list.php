				<link rel="stylesheet" href="<?php echo base_url('resources/admin/css/jquery-ui.css'); ?>" type="text/css" />
				<h1 class="page-title">
					<i class="icon-home"></i>
					场地预约管理
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
									<th>项目名称</th>
									<th>项目类别</th>
									<th>开标时间</th>
									<th>开标室</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							
							<tbody>
                            <?php if(!empty($result)): ?>
                            	<?php foreach($result as $row): ?>
								<tr>
									<td><?php echo $row->number; ?></td>
									<td><?php echo $row->name; ?></td>
									<td><?php echo $row->category_name; ?></td>
									<td><?php echo date('Y-m-d H:i:s', $row->start_time); ?></td>
									<td><?php echo $row->location_name; ?></td>
									<td class="action-td">
										<a href="<?php echo site_url('yuyue_list/edit/' . $row->id); ?>" class="btn btn-small btn-warning">
											<i class="icon-edit"></i>								
										</a>					
										<a href="<?php echo site_url('yuyue_list/delete/' . $row->id); ?>" class="btn btn-small">
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
                                	<td colspan="6">没有文章</td>
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
					
						<form id="edit-profile" class="form-horizontal" action="<?php echo site_url('yuyue_list/submit'); ?>" method="post" />
                                    <fieldset>
                                        <input type="hidden" id="edit" name="edit" value="<?php echo $edit; ?>" />
                                        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>" />
                                        <div class="control-group">											
                                            <label class="control-label" for="newsName">项目编号</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="newsName" name="newsName" value="<?php echo $value->name; ?>" />
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        <div class="control-group">											
                                            <label class="control-label" for="newsName">项目名称</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="newsName" name="newsName" value="<?php echo $value->name; ?>" />
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="newsCategory">项目类别</label>
                                            <div class="controls">
                                                <select class="input-medium" id="newsCategory" name="newsCategory">
                                                <?php foreach($categories as $category): ?>
                                                    <option value="<?php echo $category->id; ?>"<?php if($value->category_id == $category->id): ?> selected="selected"<?php endif; ?>><?php echo $category->name; ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                                <a href="#" target="_blank">项目类别管理</a>
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="newsCategory">开标室</label>
                                            <div class="controls">
                                                <select class="input-medium" id="newsCategory" name="newsCategory">
                                                <?php foreach($locations as $category): ?>
                                                    <option value="<?php echo $category->id; ?>"<?php if($value->category_id == $category->id): ?> selected="selected"<?php endif; ?>><?php echo $category->name; ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="articleTime">开标时间</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="articleTime" name="articleTime" value="<?php if(!empty($value->time)) echo date('Y-m-d', $value->time); else echo date('Y-m-d', $time) ?>" />
                                            </div> <!-- /controls -->	
				                            <div class="controls">
				                            	<select id="startHours" name="startHours" style="width:60px;">
				                                <?php
				                                if(empty($value->time)) $value->time = $time;
												for($i = 0; $i<24; $i++)
												{
													if($value->time != '0' && intval(date('H', $value->time)) == $i)
													{
														echo "<option value=\"{$i}\" selected=\"selected\">{$i}</option>";
													}
													else
													{
														echo "<option value=\"{$i}\">{$i}</option>";
													}
												}
												?>
				                                </select>
				                            	时
				                            	<select id="startMinutes" name="startMinutes" style="width:60px;">
				                                <?php
												for($i = 0; $i<60; $i++)
												{
													if($value->time != '0' && intval(date('i', $value->time)) == $i)
													{
														echo "<option value=\"{$i}\" selected=\"selected\">{$i}</option>";
													}
													else
													{
														echo "<option value=\"{$i}\">{$i}</option>";
													}
												}
												?>
				                                </select>
				                                分
				                            	<select id="startSeconds" name="startSeconds" style="width:60px;">
				                                <?php
												for($i = 0; $i<60; $i++)
												{
													if($value->time != '0' && intval(date('s', $value->time)) == $i)
													{
														echo "<option value=\"{$i}\" selected=\"selected\">{$i}</option>";
													}
													else
													{
														echo "<option value=\"{$i}\">{$i}</option>";
													}
												}
												?>
				                                </select>
				                                秒
				                            </div>
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="wysisyg">内容介绍</label>
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
				});
				</script>