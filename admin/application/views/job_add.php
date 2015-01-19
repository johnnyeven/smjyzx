				<link rel="stylesheet" href="<?php echo base_url('resources/admin/css/jquery-ui.css'); ?>" type="text/css" />
                <h1 class="page-title">
					<i class="icon-th-list"></i>
					添加/编辑职位					
				</h1>
                
				<div class="widget widget-table">
										
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3>职位</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
						<br />
						<div class="tab-content">
							<div class="tab-pane active">
                                <form id="edit-profile" class="form-horizontal" action="<?php echo site_url('job_add/submit'); ?>" method="post" />
                                    <fieldset>
                                        <input type="hidden" id="edit" name="edit" value="<?php echo $edit; ?>" />
                                        <input type="hidden" id="jobId" name="jobId" value="<?php echo $job_id; ?>" />
                                        <div class="control-group">											
                                            <label class="control-label" for="jobName">职位名称</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="jobName" name="jobName" value="<?php echo $row->job_name; ?>" />
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="jobCategory">职位类别</label>
                                            <div class="controls">		
                                                <select class="input-medium" id="jobCategory" name="jobCategory">
                                                    <option value="1"<?php if($row->job_category=='1'): ?> selected="selected"<?php endif; ?>>技术类</option>
                                                    <option value="2"<?php if($row->job_category=='2'): ?> selected="selected"<?php endif; ?>>业务类</option>
                                                    <option value="3"<?php if($row->job_category=='3'): ?> selected="selected"<?php endif; ?>>美术类</option>
                                                    <option value="4"<?php if($row->job_category=='4'): ?> selected="selected"<?php endif; ?>>职能类</option>
                                                </select>
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="jobCount">招聘人数</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="jobCount" name="jobCount" value="<?php echo $row->job_count; ?>" />
                                            </div> <!-- /controls -->	
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="jobExp">要求工作经验</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="jobExp" name="jobExp" value="<?php echo $row->job_exp; ?>" />
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="jobEndtime">截止时间</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="jobEndtime" name="jobEndtime" value="<?php if(!empty($row->job_endtime)) echo date('Y-m-d', $row->job_endtime); ?>" />
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="wysisyg">工作内容要求</label>
                                            <div class="controls">
                                                <textarea id="wysiwyg" name="wysiwyg" cols="80" rows="10" class="wysiwyg"><?php echo $row->job_content; ?></textarea>
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
                <script src="<?php echo base_url('resources/admin/js/jquery.wysiwyg.js'); ?>" language="javascript"></script>
                <script src="<?php echo base_url('resources/admin/js/jquery-ui.js'); ?>" language="javascript"></script>
                <script language="javascript">
				$(function() {
					$('#wysiwyg').wysiwyg({
					  controls: {
						 strikeThrough : { visible : true },
						 underline     : { visible : true },
		  
						 separator00 : { visible : true },
		  
						 justifyLeft   : { visible : true },
						 justifyCenter : { visible : true },
						 justifyRight  : { visible : true },
						 justifyFull   : { visible : true },
		  
						 separator01 : { visible : true },
		  
						 indent  : { visible : true },
						outdent : { visible : true },
		  
						 separator02 : { visible : true },
		  
						  subscript   : { visible : true },
						  superscript : { visible : true },
		  
						   separator03 : { visible : true },
			
							undo : { visible : true },
						   redo : { visible : true },
		  
						  separator04 : { visible : true },
		  
						 insertOrderedList    : { visible : true },
						  insertUnorderedList  : { visible : true },
						  insertHorizontalRule : { visible : true },
		  
						  h4mozilla : { visible : true && $.browser.mozilla, className : 'h4', command : 'heading', arguments : ['h4'], tags : ['h4'], tooltip : "Header 4" },
						 h5mozilla : { visible : true && $.browser.mozilla, className : 'h5', command : 'heading', arguments : ['h5'], tags : ['h5'], tooltip : "Header 5" },
						 h6mozilla : { visible : true && $.browser.mozilla, className : 'h6', command : 'heading', arguments : ['h6'], tags : ['h6'], tooltip : "Header 6" },
		  
						 h4 : { visible : true && !( $.browser.mozilla ), className : 'h4', command : 'formatBlock', arguments : ['<H4>'], tags : ['h4'], tooltip : "Header 4" },
						 h5 : { visible : true && !( $.browser.mozilla ), className : 'h5', command : 'formatBlock', arguments : ['<H5>'], tags : ['h5'], tooltip : "Header 5" },
						   h6 : { visible : true && !( $.browser.mozilla ), className : 'h6', command : 'formatBlock', arguments : ['<H6>'], tags : ['h6'], tooltip : "Header 6" },
		  
						   separator07 : { visible : true },
		  
						 cut   : { visible : true },
						 copy  : { visible : true },
						 paste : { visible : true }
						 }
					});
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
					$("#jobEndtime").datepicker();
				});
				</script>