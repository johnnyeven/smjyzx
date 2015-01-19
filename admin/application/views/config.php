				<h1 class="page-title">
					<i class="icon-th-list"></i>
					修改配置					
				</h1>
                
				<div class="widget widget-table">
										
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3>配置</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
						<br />
						<div class="tab-content">
							<div class="tab-pane active">
                                <form id="edit-profile" class="form-horizontal" action="<?php echo site_url('config/submit'); ?>" method="post" />
                                    <fieldset>
                                        <input type="hidden" id="configId" name="configId" value="<?php echo $row->config_id; ?>" />
                                        <div class="control-group">											
                                            <label class="control-label" for="jobName">网页标题前缀</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="configTitle" name="configTitle" value="<?php echo $row->config_title; ?>" />
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="jobCount">底部版权信息</label>
                                            <div class="controls">
                                            	<textarea id="configFooter" name="configFooter" cols="80" rows="10" style="width:400px;"><?php echo $row->config_footer; ?></textarea>
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