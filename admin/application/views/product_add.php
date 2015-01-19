
                <h1 class="page-title">
					<i class="icon-th-list"></i>
					添加/修改产品
				</h1>
                
				<div class="widget widget-table">
										
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3>产品</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
						<br />
						<div class="tab-content">
							<div class="tab-pane active">
                                <form id="edit-profile" class="form-horizontal" action="<?php echo site_url('product_add/submit'); ?>" method="post" />
                                    <fieldset>
                                        <input type="hidden" id="edit" name="edit" value="<?php echo $edit; ?>" />
                                        <input type="hidden" id="productId" name="productId" value="<?php echo $product_id; ?>" />
                                        <div class="control-group">											
                                            <label class="control-label" for="productName">产品名称</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="productName" name="productName" value="<?php echo $row->product_name; ?>" />
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="wysisyg">产品介绍</label>
                                            <div class="controls">
                                                <textarea id="wysiwyg" name="wysiwyg" cols="80" rows="10" class="wysiwyg" style="width:400px;"><?php echo $row->product_content; ?></textarea>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="productIOSDownload">IOS版下载地址</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="productIOSDownload" name="productIOSDownload" value="<?php echo $row->product_ios_download; ?>" />
                                                <p class="help-block">如果没有IOS版请留空</p>
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="productAndroidDownload">Android版下载地址</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="productAndroidDownload" name="productAndroidDownload" value="<?php echo $row->product_android_download; ?>" />
                                                <p class="help-block">如果没有Android版请留空</p>
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="logoUrl">上传LOGO</label>
                                            <div class="controls">
                                                <input name="logoUrl" type="file" id="logoUrl" size="20" class="input-medium" />
                                                <input type="button" name="btnLogoUpload" id="btnLogoUpload" value="上传" onclick="javascript:contentPicUpload('logoUrl', 'logoPicPathContent', 'productLogoUrl')" class="btn btn-primary" />
                                                <input name="productLogoUrl" type="hidden" id="productLogoUrl" value="<?php echo $row->product_logo_url; ?>" />
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        <div id="logoPicPathContent" class="control-group">
                                        <?php
                                        if(!empty($row->product_logo_url))
										{
											echo "<img src=\"{$row->product_logo_url}\" />";
										}
										?>
                                        </div>
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="imageUrl">上传宣传图片</label>
                                            <div class="controls">
                                                <input name="imageUrl" type="file" id="imageUrl" size="20" class="input-medium" />
                                                <input type="button" name="btnImageUpload" id="btnImageUpload" value="上传" onclick="javascript:contentPicUpload('imageUrl', 'imagePicPathContent', 'productImageUrl', 'append', 4)" class="btn btn-primary" />
                                                <input name="productImageUrl" type="hidden" id="productImageUrl" value="<?php echo $row->product_image_url; ?>" />
                                                <p class="help-block">只显示最新上传的前四张</p>
                                            </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        <div id="imagePicPathContent" class="control-group">
                                        <?php
                                        if(!empty($row->product_image_url))
										{
											$urlImage = explode(";", $row->product_image_url);
											foreach($urlImage as $url)
											{
												echo "<img src=\"{$url}\" />";
											}
										}
										?>
                                        </div>
                                        
                                        <div class="control-group">											
                                            <label class="control-label" for="productSort">排序</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="productSort" name="productSort" value="<?php echo $row->product_sort; ?>" />
                                                <p class="help-block">在官网上显示的顺序，从小到大</p>
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
                <script src="<?php echo base_url('resources/admin/js/uploader/ajaxfileupload.js'); ?>" language="javascript"></script>
                <script src="<?php echo base_url('resources/admin/js/upload.js'); ?>" language="javascript"></script>
                <script src="<?php echo base_url('resources/admin/js/jquery.resizeimg.js'); ?>" language="javascript"></script>
                <script src="<?php echo base_url('resources/admin/js/jquery.wysiwyg.js'); ?>" language="javascript"></script>
                <script language="javascript">
				$(function() {
					$("#imgTable img").resizeImg({w: 300, h: 150});
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