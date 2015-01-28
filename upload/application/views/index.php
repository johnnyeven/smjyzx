        <link href="<?php echo base_url('resources/css/index.css'); ?>" rel="stylesheet" type="text/css" />
        <div class="row">
        	<div class="row-item slider" id="slider">
        		<p>没有可以显示的内容</p>
        	</div>
        	<div class="row-item news">
                <div class="row-item-head">
                    <div class="row-item-head-title">
                        <img src="<?php echo base_url('resources/images/index_11.png'); ?>" />
                    </div>
                    <div class="row-item-head-more">
                        <a href="<?php echo site_url('article/lists/6') ?>"><img src="<?php echo base_url('resources/images/more.png'); ?>" /></a>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="row-item-body">
                    <?php if(!empty($news_result)): ?>
                    <ul>
                        <?php for($i=0; $i < count($news_result); $i++): ?>
                        <?php if($i != count($news_result) - 1): ?>
                        <li><span class="list-title" style="width:270px;"><a href="<?php echo site_url('article/show/' . $news_result[$i]->id) ?>"><?php echo $news_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $news_result[$i]->time); ?></span></li>
                        <?php else: ?>
                        <li class="list-last"><span class="list-title" style="width:270px;"><a href="<?php echo site_url('article/show/' . $news_result[$i]->id) ?>"><?php echo $news_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $news_result[$i]->time); ?></span></li>
                        <?php endif; ?>
                        <?php endfor; ?>
                    </ul>
                    <?php else: ?>
                    <p>没有可以显示的内容</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row-item last-item announcement">
                <div class="row-item-head">
                    <div class="row-item-head-title">
                        <img src="<?php echo base_url('resources/images/index_16.png'); ?>" />
                    </div>
                    <div class="row-item-head-more">
                        <a href="<?php echo site_url('article/lists/7') ?>"><img src="<?php echo base_url('resources/images/more.png'); ?>" /></a>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="row-item-body">
                    <?php if(!empty($notification_result)): ?>
                    <ul>
                        <?php for($i=0; $i < count($notification_result); $i++): ?>
                        <?php if($i != count($notification_result) - 1): ?>
                        <li><span class="list-title" style="width:200px;"><a href="<?php echo site_url('article/show/' . $notification_result[$i]->id) ?>"><?php echo $notification_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $notification_result[$i]->time); ?></span></li>
                        <?php else: ?>
                        <li class="list-last"><span class="list-title" style="width:200px;"><a href="<?php echo site_url('article/show/' . $notification_result[$i]->id) ?>"><?php echo $notification_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $notification_result[$i]->time); ?></span></li>
                        <?php endif; ?>
                        <?php endfor; ?>
                    </ul>
                    <?php else: ?>
                    <p>没有可以显示的内容</p>
                    <?php endif; ?>
                </div>
            </div>
        	<div class="clear"></div>
        </div>
        <div class="row banner">
          <object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="960" height="75">
            <param name="movie" value="<?php echo base_url('resources/images/banner2.swf'); ?>" />
            <param name="quality" value="high" />
            <param name="wmode" value="opaque" />
            <param name="swfversion" value="12.0.0.0" />
            <!-- 此 param 标签提示使用 Flash Player 6.0 r65 和更高版本的用户下载最新版本的 Flash Player。如果您不想让用户看到该提示，请将其删除。 -->
            <param name="expressinstall" value="<?php echo base_url('resources/Scripts/expressInstall.swf'); ?>" />
            <!-- 下一个对象标签用于非 IE 浏览器。所以使用 IECC 将其从 IE 隐藏。 -->
            <!--[if !IE]>-->
            <object type="application/x-shockwave-flash" data="<?php echo base_url('resources/images/banner2.swf'); ?>" width="960" height="75">
              <!--<![endif]-->
              <param name="quality" value="high" />
              <param name="wmode" value="opaque" />
              <param name="swfversion" value="12.0.0.0" />
              <param name="expressinstall" value="<?php echo base_url('resources/Scripts/expressInstall.swf'); ?>" />
              <!-- 浏览器将以下替代内容显示给使用 Flash Player 6.0 和更低版本的用户。 -->
              <div>
                <h4>此页面上的内容需要较新版本的 Adobe Flash Player。</h4>
                <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="获取 Adobe Flash Player" width="112" height="33" /></a></p>
              </div>
              <!--[if !IE]>-->
            </object>
            <!--<![endif]-->
          </object>
        </div>
        <div class="row">
          <div class="row-item main-block">
                <div class="row-item-head">
                    <div class="row-item-head-title">
                        <img src="<?php echo base_url('resources/images/index_35.png'); ?>" />
                    </div>
                    <div class="row-item-head-tab">
                        <ul>
                            <li class="current" rel="0">招标公告</li>
                            <li rel="1">更正公告</li>
                            <li rel="2">中标结果</li>
                        </ul>
                    </div>
                    <div class="row-item-head-more">
                        <a href=""><img src="<?php echo base_url('resources/images/more.png'); ?>" /></a>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="row-item-body">
                    <div class="tab-item">
                        <?php if(!empty($part1_1_result)): ?>
                        <ul>
                            <?php for($i=0; $i < count($part1_1_result); $i++): ?>
                            <?php if($i != count($part1_1_result) - 1): ?>
                            <li><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part1_1_result[$i]->id) ?>"><?php echo $part1_1_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part1_1_result[$i]->time); ?></span></li>
                            <?php else: ?>
                            <li class="list-last"><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part1_1_result[$i]->id) ?>"><?php echo $part1_1_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part1_1_result[$i]->time); ?></span></li>
                            <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                        <?php else: ?>
                        <p>没有可以显示的内容</p>
                        <?php endif; ?>
                    </div>

                    <div class="tab-item" style="display:none;">
                        <?php if(!empty($part1_2_result)): ?>
                        <ul>
                            <?php for($i=0; $i < count($part1_2_result); $i++): ?>
                            <?php if($i != count($part1_2_result) - 1): ?>
                            <li><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part1_2_result[$i]->id) ?>"><?php echo $part1_2_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part1_2_result[$i]->time); ?></span></li>
                            <?php else: ?>
                            <li class="list-last"><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part1_2_result[$i]->id) ?>"><?php echo $part1_2_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part1_2_result[$i]->time); ?></span></li>
                            <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                        <?php else: ?>
                        <p>没有可以显示的内容</p>
                        <?php endif; ?>
                    </div>

                    <div class="tab-item" style="display:none;">
                        <?php if(!empty($part1_3_result)): ?>
                        <ul>
                            <?php for($i=0; $i < count($part1_3_result); $i++): ?>
                            <?php if($i != count($part1_3_result) - 1): ?>
                            <li><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part1_3_result[$i]->id) ?>"><?php echo $part1_3_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part1_3_result[$i]->time); ?></span></li>
                            <?php else: ?>
                            <li class="list-last"><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part1_3_result[$i]->id) ?>"><?php echo $part1_3_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part1_3_result[$i]->time); ?></span></li>
                            <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                        <?php else: ?>
                        <p>没有可以显示的内容</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row-item last-item main-block">
                <div class="row-item-head">
                    <div class="row-item-head-title">
                        <img src="<?php echo base_url('resources/images/index_37.png'); ?>" />
                    </div>
                    <div class="row-item-head-tab">
                        <ul>
                            <li class="current" rel="0">采购预公告</li>
                            <li rel="1">采购公告</li>
                            <li rel="2">更正公告</li>
                            <li rel="3">中标结果</li>
                        </ul>
                    </div>
                    <div class="row-item-head-more">
                        <a href=""><img src="<?php echo base_url('resources/images/more.png'); ?>" /></a>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="row-item-body">
                    <div class="tab-item">
                        <?php if(!empty($part2_1_result)): ?>
                        <ul>
                            <?php for($i=0; $i < count($part2_1_result); $i++): ?>
                            <?php if($i != count($part2_1_result) - 1): ?>
                            <li><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part2_1_result[$i]->id) ?>"><?php echo $part2_1_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part2_1_result[$i]->time); ?></span></li>
                            <?php else: ?>
                            <li class="list-last"><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part2_1_result[$i]->id) ?>"><?php echo $part2_1_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part2_1_result[$i]->time); ?></span></li>
                            <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                        <?php else: ?>
                        <p>没有可以显示的内容</p>
                        <?php endif; ?>
                    </div>

                    <div class="tab-item" style="display:none;">
                        <?php if(!empty($part2_2_result)): ?>
                        <ul>
                            <?php for($i=0; $i < count($part2_2_result); $i++): ?>
                            <?php if($i != count($part2_2_result) - 1): ?>
                            <li><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part2_2_result[$i]->id) ?>"><?php echo $part2_2_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part2_2_result[$i]->time); ?></span></li>
                            <?php else: ?>
                            <li class="list-last"><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part2_2_result[$i]->id) ?>"><?php echo $part2_2_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part2_2_result[$i]->time); ?></span></li>
                            <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                        <?php else: ?>
                        <p>没有可以显示的内容</p>
                        <?php endif; ?>
                    </div>

                    <div class="tab-item" style="display:none;">
                        <?php if(!empty($part2_3_result)): ?>
                        <ul>
                            <?php for($i=0; $i < count($part2_3_result); $i++): ?>
                            <?php if($i != count($part2_3_result) - 1): ?>
                            <li><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part2_3_result[$i]->id) ?>"><?php echo $part2_3_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part2_3_result[$i]->time); ?></span></li>
                            <?php else: ?>
                            <li class="list-last"><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part2_3_result[$i]->id) ?>"><?php echo $part2_3_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part2_3_result[$i]->time); ?></span></li>
                            <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                        <?php else: ?>
                        <p>没有可以显示的内容</p>
                        <?php endif; ?>
                    </div>

                    <div class="tab-item" style="display:none;">
                        <?php if(!empty($part2_4_result)): ?>
                        <ul>
                            <?php for($i=0; $i < count($part2_4_result); $i++): ?>
                            <?php if($i != count($part2_4_result) - 1): ?>
                            <li><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part2_4_result[$i]->id) ?>"><?php echo $part2_4_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part2_4_result[$i]->time); ?></span></li>
                            <?php else: ?>
                            <li class="list-last"><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part2_4_result[$i]->id) ?>"><?php echo $part2_4_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part2_4_result[$i]->time); ?></span></li>
                            <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                        <?php else: ?>
                        <p>没有可以显示的内容</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="row">
            <div class="row-item main-block">
                <div class="row-item-head">
                    <div class="row-item-head-title">
                        <img src="<?php echo base_url('resources/images/index_41.png'); ?>" />
                    </div>
                    <div class="row-item-head-tab">
                        <ul>
                            <li class="current" rel="0">交易信息</li>
                            <li rel="1">更正公告</li>
                            <li rel="2">成交信息</li>
                        </ul>
                    </div>
                    <div class="row-item-head-more">
                        <a href=""><img src="<?php echo base_url('resources/images/more.png'); ?>" /></a>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="row-item-body">
                    <div class="tab-item">
                        <?php if(!empty($part3_1_result)): ?>
                        <ul>
                            <?php for($i=0; $i < count($part3_1_result); $i++): ?>
                            <?php if($i != count($part3_1_result) - 1): ?>
                            <li><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part3_1_result[$i]->id) ?>"><?php echo $part3_1_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part3_1_result[$i]->time); ?></span></li>
                            <?php else: ?>
                            <li class="list-last"><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part3_1_result[$i]->id) ?>"><?php echo $part3_1_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part3_1_result[$i]->time); ?></span></li>
                            <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                        <?php else: ?>
                        <p>没有可以显示的内容</p>
                        <?php endif; ?>
                    </div>

                    <div class="tab-item" style="display:none;">
                        <?php if(!empty($part3_2_result)): ?>
                        <ul>
                            <?php for($i=0; $i < count($part3_2_result); $i++): ?>
                            <?php if($i != count($part3_2_result) - 1): ?>
                            <li><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part3_2_result[$i]->id) ?>"><?php echo $part3_2_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part3_2_result[$i]->time); ?></span></li>
                            <?php else: ?>
                            <li class="list-last"><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part3_2_result[$i]->id) ?>"><?php echo $part3_2_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part3_2_result[$i]->time); ?></span></li>
                            <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                        <?php else: ?>
                        <p>没有可以显示的内容</p>
                        <?php endif; ?>
                    </div>

                    <div class="tab-item" style="display:none;">
                        <?php if(!empty($part1_3_result)): ?>
                        <ul>
                            <?php for($i=0; $i < count($part3_3_result); $i++): ?>
                            <?php if($i != count($part3_3_result) - 1): ?>
                            <li><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part3_3_result[$i]->id) ?>"><?php echo $part3_3_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part3_3_result[$i]->time); ?></span></li>
                            <?php else: ?>
                            <li class="list-last"><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part3_3_result[$i]->id) ?>"><?php echo $part3_3_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part3_3_result[$i]->time); ?></span></li>
                            <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                        <?php else: ?>
                        <p>没有可以显示的内容</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row-item last-item main-block">
                <div class="row-item-head">
                    <div class="row-item-head-title">
                        <img src="<?php echo base_url('resources/images/index_42.png'); ?>" />
                    </div>
                    <div class="row-item-head-tab">
                        <ul>
                            <li class="current" rel="0">出让公告</li>
                            <li rel="1">更正公告</li>
                            <li rel="2">出让结果</li>
                        </ul>
                    </div>
                    <div class="row-item-head-more">
                        <a href=""><img src="<?php echo base_url('resources/images/more.png'); ?>" /></a>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="row-item-body">
                    <div class="tab-item">
                        <?php if(!empty($part4_1_result)): ?>
                        <ul>
                            <?php for($i=0; $i < count($part4_1_result); $i++): ?>
                            <?php if($i != count($part4_1_result) - 1): ?>
                            <li><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part4_1_result[$i]->id) ?>"><?php echo $part4_1_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part4_1_result[$i]->time); ?></span></li>
                            <?php else: ?>
                            <li class="list-last"><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part4_1_result[$i]->id) ?>"><?php echo $part4_1_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part4_1_result[$i]->time); ?></span></li>
                            <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                        <?php else: ?>
                        <p>没有可以显示的内容</p>
                        <?php endif; ?>
                    </div>

                    <div class="tab-item" style="display:none;">
                        <?php if(!empty($part4_2_result)): ?>
                        <ul>
                            <?php for($i=0; $i < count($part4_2_result); $i++): ?>
                            <?php if($i != count($part4_2_result) - 1): ?>
                            <li><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part4_2_result[$i]->id) ?>"><?php echo $part4_2_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part4_2_result[$i]->time); ?></span></li>
                            <?php else: ?>
                            <li class="list-last"><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part4_2_result[$i]->id) ?>"><?php echo $part4_2_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part4_2_result[$i]->time); ?></span></li>
                            <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                        <?php else: ?>
                        <p>没有可以显示的内容</p>
                        <?php endif; ?>
                    </div>

                    <div class="tab-item" style="display:none;">
                        <?php if(!empty($part1_3_result)): ?>
                        <ul>
                            <?php for($i=0; $i < count($part4_3_result); $i++): ?>
                            <?php if($i != count($part4_3_result) - 1): ?>
                            <li><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part4_3_result[$i]->id) ?>"><?php echo $part4_3_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part4_3_result[$i]->time); ?></span></li>
                            <?php else: ?>
                            <li class="list-last"><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $part4_3_result[$i]->id) ?>"><?php echo $part4_3_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $part4_3_result[$i]->time); ?></span></li>
                            <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                        <?php else: ?>
                        <p>没有可以显示的内容</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="row">
            <div class="row-item second-block">
                <div class="row-item-head">
                    <div class="row-item-head-title">
                        <img src="<?php echo base_url('resources/images/index_45.png'); ?>" />
                    </div>
                    <div class="row-item-head-more">
                        <a href="<?php echo site_url('bid/lists/28'); ?>"><img src="<?php echo base_url('resources/images/more.png'); ?>" /></a>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="row-item-body">
                    <?php if(!empty($yuyue_result)): ?>
                    <ul>
                        <?php for($i=0; $i < count($yuyue_result); $i++): ?>
                        <?php if($i != count($yuyue_result) - 1): ?>
                        <li><span class="list-title" style="width:400px;"><a href="<?php echo site_url('bid/show/' . $yuyue_result[$i]->id); ?>"><?php echo $yuyue_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $yuyue_result[$i]->time); ?></span></li>
                        <?php else: ?>
                        <li class="list-last"><span class="list-title" style="width:400px;"><a href="<?php echo site_url('bid/show/' . $yuyue_result[$i]->id); ?>"><?php echo $yuyue_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $yuyue_result[$i]->time); ?></span></li>
                        <?php endif; ?>
                        <?php endfor; ?>
                    </ul>
                    <?php else: ?>
                    <p>没有可以显示的内容</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row-item last-item second-block">
                <div class="row-item-head">
                    <div class="row-item-head-title">
                        <img src="<?php echo base_url('resources/images/index_46.png'); ?>" />
                    </div>
                    <div class="row-item-head-more">
                        <a href="<?php echo site_url('bid/lists/29'); ?>"><img src="<?php echo base_url('resources/images/more.png'); ?>" /></a>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="row-item-body">
                    <?php if(!empty($kaibiao_result)): ?>
                    <ul>
                        <?php for($i=0; $i < count($kaibiao_result); $i++): ?>
                        <?php if($i != count($kaibiao_result) - 1): ?>
                        <li><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $kaibiao_result[$i]->id) ?>"><?php echo $kaibiao_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $kaibiao_result[$i]->time); ?></span></li>
                        <?php else: ?>
                        <li class="list-last"><span class="list-title" style="width:400px;"><a href="<?php echo site_url('article/show/' . $kaibiao_result[$i]->id) ?>"><?php echo $kaibiao_result[$i]->name; ?></a></span><span class="list-date"><?php echo date('m-d', $kaibiao_result[$i]->time); ?></span></li>
                        <?php endif; ?>
                        <?php endfor; ?>
                    </ul>
                    <?php else: ?>
                    <p>没有可以显示的内容</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="row">
            <div class="row-item last-item pictures">
                <div class="verticle-item-head">
                    <img src="<?php echo base_url('resources/images/index_50.png'); ?>" />
                </div>
                <div class="verticle-item-body">
                    <div id="picture_wrapper" class="pictures-wrapper">
                    <?php if(!empty($part5_result)): ?>
                        <div id="picture_slider" class="pictures-slider">
                        <?php for($i=0; $i<count($part5_result); $i++): ?>
                            <div class="pictures-item">
                                <?php
                                $pic_array = explode(';', $part5_result[$i]->pic);
                                ?>
                                <a href="<?php echo site_url('article/show/' . $part5_result[$i]->id); ?>"><img class="pictures-container" src="<?php echo $pic_array[0]; ?>" /></a>
                            </div>
                        <?php endfor; ?>
                            <div class="clear"></div>
                        </div>
                    <?php else: ?>
                        <p>没有可以显示的内容</p>
                    <?php endif; ?>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="row">
            <div class="row-item last-item links">
                <div class="row-item-head">
                    <div class="row-item-head-title">
                        <img src="<?php echo base_url('resources/images/index_55.png'); ?>" />
                    </div>
                    <div class="row-item-head-more">
                        <a href="<?php echo site_url('link/show'); ?>"><img src="<?php echo base_url('resources/images/more.png'); ?>" /></a>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="row-item-body">
                    <?php if(!empty($link_result)): ?>
                    <?php foreach($link_result as $row): ?>
                    <div class="links-item">
                        <a href="<?php echo $row->link; ?>"><?php echo $row->name; ?></a>
                    </div>
                    <?php endforeach; ?>
                    <div class="clear"></div>
                    <?php else: ?>
                    <p>没有可以显示的内容</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>

        <script type="text/javascript" src="<?php echo base_url('resources/js/jquery.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resources/js/swfobject.js'); ?>"></script>
        <script type="text/javascript">
        swfobject.registerObject("FlashID2");
        <?php if(!empty($slider_result)): ?>
        <?php
        for($i=0; $i<count($slider_result); $i++)
        {
            if($i < count($slider_result) - 1)
            {
                $pics = explode(';', $slider_result[$i]->pic);
                $pic_list .= $pics[0] . ',';
                $name_list .= $slider_result[$i]->name . ',';
                $url_list .= site_url('article/show/' . $slider_result[$i]->id) . ',';
            }
            else
            {
                $pics = explode(';', $slider_result[$i]->pic);
                $pic_list .= $pics[0];
                $name_list .= $slider_result[$i]->name;
                $url_list .= site_url('article/show/' . $slider_result[$i]->id);
            }
        }
        ?>
        var so = new SWFObject("<?php echo base_url('resources/images/focus.swf'); ?>", "slider", "328", "248", "7", "#ffffff");
        so.addParam('wmode','transparent');
        so.addVariable("picurl","<?php echo $pic_list; ?>");
        so.addVariable("pictext","<?php echo $name_list; ?>");
        so.addVariable("piclink","<?php echo $url_list; ?>");
        so.addVariable("pictime","5");
        so.addVariable("borderwidth","328");
        so.addVariable("borderheight","248");
        so.addVariable("borderw","false");
        so.addVariable("buttondisplay","true");
        so.addVariable("textheight","20");
        so.write("slider");
        <?php endif; ?>
        $(function() {
            $(".row-item-head-tab > ul > li").click(function() {
                $(this).parent().find("> li").removeClass("current");
                $(this).addClass("current");
                var index = parseInt($(this).attr("rel"));
                var tab = $(this).parent().parent().parent().next().find('div.tab-item');
                tab.hide();
                tab.eq(index).show();
            });

            var items = $("#picture_slider > div.pictures-item");
            var width = (items.outerWidth() + 10) * items.length;
            $("#picture_slider").width(width);

            var autoSlide = function() {
                var l = $("#picture_slider").position().left;
                console.log(l);
                if(l <= -width) {
                    $("#picture_slider").css({
                        left: 903
                    });
                } else {
                    $("#picture_slider").css({
                        left: l - 1
                    });
                }
            }

            var timer = setInterval(autoSlide, 20);

            $("#picture_wrapper").mouseover(function() {
                clearInterval(timer);
            }).mouseout(function() {
                timer = setInterval(autoSlide, 20);
            });
        });
        </script>