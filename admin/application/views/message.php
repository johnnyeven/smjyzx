<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>后台管理 - 信息</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />    
    
    <link href="<?php echo site_url('resources/admin/css/bootstrap.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo site_url('resources/admin/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet" />
    
    <link href="<?php echo site_url('resources/admin/css/font-awesome.css'); ?>" rel="stylesheet" />
    
    <link href="<?php echo site_url('resources/admin/css/adminia.css'); ?>" rel="stylesheet" /> 
    <link href="<?php echo site_url('resources/admin/css/adminia-responsive.css'); ?>" rel="stylesheet" /> 
    
    <link href="<?php echo site_url('resources/admin/css/pages/login.css'); ?>" rel="stylesheet" /> 

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<?php echo $meta_data; ?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
	
<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 				
			</a>
			
			<a class="brand" href="<?php echo site_url('job_list'); ?>">后台管理</a>
			
			<div class="nav-collapse">
			
				<ul class="nav pull-right">
					
					<li class="">
						
						
					</li>
				</ul>
				
			</div> <!-- /nav-collapse -->
			
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->


<div id="login-container">
	
	
	<div id="login-header">
		
		<h3><?php if($type != MESSAGE_TYPE_SUCCESS): ?>错误<?php endif; ?>信息</h3>
		
	</div> <!-- /login-header -->
	
	<div id="login-content" class="clearfix">
	
        <p><?php echo $return_content; ?></p>
        <h3><?php echo lang($info); ?></h3>
			
	</div> <!-- /login-content -->
	
</div> <!-- /login-wrapper -->

    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo site_url('resources/admin/js/jquery-1.7.2.min.js'); ?>"></script>


<script src="<?php echo site_url('resources/admin/js/bootstrap.js'); ?>"></script>

  </body>
</html>
