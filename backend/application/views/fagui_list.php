				<link rel="stylesheet" href="<?php echo base_url('resources/admin/css/jquery-ui.css'); ?>" type="text/css" />
                <h1 class="page-title">
					<i class="icon-th-list"></i>
					添加/编辑新闻
				</h1>
                
				<div class="widget widget-table">
										
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3>新闻</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
						<br />
						<div class="tab-content">
							<div class="tab-pane active">
                                <form id="edit-profile" class="form-horizontal" action="<?php echo site_url('fagui_list/submit'); ?>" method="post" />
                                    <fieldset>
                                        <input type="hidden" id="edit" name="edit" value="<?php echo $edit; ?>" />
                                        <input type="hidden" id="articleId" name="articleId" value="<?php echo $article_id; ?>" />
                                        <div class="control-group">											
                                            <label class="control-label" for="articleTitle">新闻标题</label>
                                            <div class="controls">
                                                <input type="text" class="input-xlarge" id="articleTitle" name="articleTitle" value="<?php echo $row->name; ?>" />
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->

                                        <div class="control-group">											
                                            <label class="control-label" for="articleRefer">来源</label>
                                            <div class="controls">
                                                <input type="text" class="input-xlarge" id="articleRefer" name="articleRefer" value="<?php echo $row->refer; ?>" />
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="articleTime">发布时间</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="articleTime" name="articleTime" value="<?php if(!empty($row->time)) echo date('Y-m-d H:i:s', $row->time); else echo date('Y-m-d H:i:s') ?>" />
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="wysisyg">新闻内容</label>
                                            <div class="controls">
                                                <textarea id="wysiwyg" name="wysiwyg" cols="50" rows="20" class="wysiwyg"><?php echo $row->content; ?></textarea>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <br />
                                        
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary">提交</button>
                                        </div> <!-- /form-actions -->
                                    </fieldset>
                                </form>
                            </div>
                        </div>
					
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