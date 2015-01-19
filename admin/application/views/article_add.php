
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
                                <form id="edit-profile" class="form-horizontal" action="<?php echo site_url('article_add/submit'); ?>" method="post" />
                                    <fieldset>
                                        <input type="hidden" id="edit" name="edit" value="<?php echo $edit; ?>" />
                                        <input type="hidden" id="articleId" name="articleId" value="<?php echo $article_id; ?>" />
                                        <div class="control-group">											
                                            <label class="control-label" for="articleTitle">新闻标题</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="articleTitle" name="articleTitle" value="<?php echo $row->article_title; ?>" />
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="wysisyg">新闻内容</label>
                                            <div class="controls">
                                                <textarea id="wysiwyg" name="wysiwyg" cols="80" rows="10" class="wysiwyg"><?php echo $row->article_content; ?></textarea>
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
				});
				</script>