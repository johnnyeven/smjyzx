				<link rel="stylesheet" href="<?php echo base_url('resources/admin/css/jquery-ui.css'); ?>" type="text/css" />
				<h1 class="page-title">
					<i class="icon-home"></i>
					开评标安排管理
				</h1>
				<div class="widget">
                    
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3><?php if(empty($edit)): ?>添加<?php else: ?>修改<?php endif; ?>资料</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
						<form id="edit-profile" class="form-horizontal" action="<?php echo site_url('anpai_list/submit'); ?>" method="post" />
                                    <fieldset>
                                        <input type="hidden" id="edit" name="edit" value="<?php echo $edit; ?>" />
                                        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>" />
                                        <div class="control-group">											
                                            <label class="control-label" for="biaoNumber">项目编号</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="biaoNumber" name="biaoNumber" value="<?php echo $value->number; ?>" />
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        <div class="control-group">											
                                            <label class="control-label" for="biaoName">项目名称</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="biaoName" name="biaoName" value="<?php echo $value->name; ?>" />
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="biaoCategory">项目类别</label>
                                            <div class="controls">
                                                <select class="input-medium" id="biaoCategory" name="biaoCategory">
                                                <?php foreach($categories as $category): ?>
                                                    <option value="<?php echo $category->id; ?>"<?php if($value->category == $category->id): ?> selected="selected"<?php endif; ?>><?php echo $category->name; ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                                <a href="<?php echo site_url('biao_category_list/show'); ?>" target="_blank">项目类别管理</a>
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="biaoUnit">采购单位</label>
                                            <div class="controls">
                                                <input type="text" class="input-xlarge" id="biaoUnit" name="biaoUnit" value="<?php echo $value->unit; ?>" />
                                                <a id="broswer" href="#" target="_blank">可选项</a> | <a href="<?php echo site_url('biao_unit_list/show'); ?>" target="_blank">采购单位管理</a>
                                            </div> <!-- /controls -->
                                            <div class="controls" id="unit_container" style="display:none;margin-top:10px;">
                                            <?php foreach($units as $unit): ?>
                                            <button id="btnSubmit" type="button" class="btn btn-info"><?php echo $unit->name; ?></button>
                                        	<?php endforeach; ?>
                                            </div>
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="biaoLocation">开标室</label>
                                            <div class="controls">
                                                <select class="input-medium" id="biaoLocation" name="biaoLocation">
                                                <?php foreach($locations as $location): ?>
                                                    <option value="<?php echo $location->id; ?>"<?php if($value->location == $location->id): ?> selected="selected"<?php endif; ?>><?php echo $location->name; ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                                <a href="<?php echo site_url('biao_location_list/show'); ?>" target="_blank">开标室管理</a>
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="articleTime">开标时间</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium datepicker" id="articleTime" name="articleTime" value="<?php if(!empty($value->time)) echo date('Y-m-d', $value->time); else echo date('Y-m-d', $time) ?>" />
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
                                            <label class="control-label" for="articleUrl">外部链接</label>
                                            <div class="controls">
                                                <input type="text" class="input-xxlarge" id="articleUrl" name="articleUrl" value="<?php echo $value->url ?>" />
                                                <p class="help-block">一旦填写外部链接，则点击新闻标题直接跳转至外部链接</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="wysisyg">内容介绍</label>
                                            <div class="controls">
                                                <textarea id="wysiwyg" name="wysiwyg" cols="50" rows="20" class="wysiwyg"><?php echo $value->content; ?></textarea>
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
				
                <?php if(empty($edit)): ?>
				<div class="widget widget-table">
				
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3>文章列表(<?php echo $monday; ?> 至 <?php echo $friday; ?>)</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
						<table class="table table-striped table-bordered" id="imgTable">
							<thead>
								<tr>
									<th>日期</th>
									<th>开标时间</th>
									<th>项目名称</th>
									<th>项目编号</th>
									<th>项目类型</th>
									<th>采购单位</th>
									<th>开评标地点</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							
							<tbody>
                            	<?php foreach($result as $key => $row): ?>
								<tr>
									<td><?php echo lang('day' . $key); ?></td>
									<?php if(!empty($row)): ?>
									<td>
										<?php
										for($i=0; $i<count($row); $i++)
										{
											echo date('Y-m-d H:i:s', $row[$i]->start_time) . '<br>';
										}
										?>
									</td>
									<td>
									<?php
									for($i=0; $i<count($row); $i++)
									{
										if(!empty($row[$i]->url))
										{
											$url = $row[$i]->url;
										}
										else
										{
											$url = out_url("bid/show/" . $row[$i]->id);
										}
										echo '<a href="' . $url . '" target="_blank">' . $row[$i]->name . '</a><br>';
									}
									?>
									</td>
									<td>
									<?php
									for($i=0; $i<count($row); $i++)
									{
										echo $row[$i]->number . '<br>';
									}
									?>
									</td>
									<td>
									<?php
									for($i=0; $i<count($row); $i++)
									{
										echo $row[$i]->category_name . '<br>';
									}
									?>
									</td>
									<td>
									<?php
									for($i=0; $i<count($row); $i++)
									{
										echo $row[$i]->unit . '<br>';
									}
									?>
									</td>
									<td>
									<?php
									for($i=0; $i<count($row); $i++)
									{
										echo $row[$i]->location_name . '<br>';
									}
									?>
									</td>
									<td class="action-td">
									<?php for($i=0; $i<count($row); $i++): ?>
										<a href="<?php echo site_url('anpai_list/edit/' . $row[$i]->id); ?>" class="btn btn-small btn-warning">
											<i class="icon-edit"></i>								
										</a>					
										<a href="<?php echo site_url('anpai_list/delete/' . $row[$i]->id); ?>" class="btn btn-small">
											<i class="icon-remove"></i>						
										</a><br>
									<?php endfor; ?>
									</td>
									<?php else: ?>
									<td>&nbsp;</td>
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
                                	<td style="text-align:right;" colspan="8"><?php echo $pagination; ?></td>
                                </tr>
							</tbody>
						</table>
					
					</div> <!-- /widget-content -->
				
				</div>
                <?php endif; ?>
                <script src="<?php echo base_url('resources/js/ckeditor/ckeditor.js'); ?>" language="javascript"></script>
                <script src="<?php echo base_url('resources/admin/js/jquery-ui.js'); ?>" language="javascript"></script>
                <script language="javascript">
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
					$(".datepicker").datepicker();

					$("#btnSubmit").click(function() {
						var url = $("#articleUrl").val();
						if(url && !IsURL(url)) {
							alert('链接格式不正确，请确保链接以http://或者是https://开头');
							return false;
						}
					});

					$("#broswer").click(function() {
						$("#unit_container").slideToggle();
						return false;
					});

					$("#unit_container > button").click(function() {
						var text = $("#biaoUnit").val();
						if(text) {
							$("#biaoUnit").val(text + "," + $(this).text());
						} else {
							$("#biaoUnit").val($(this).text());
						}
					});
				});
				</script>