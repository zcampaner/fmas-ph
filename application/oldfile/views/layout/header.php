<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<title>FMAS | </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<!-- The styles -->
	<link id="bs-css" href="<?php echo base_url() ?>assets/css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>


	<link href="<?php echo base_url() ?>assets/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/charisma-app.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='<?php echo base_url() ?>assets/css/fullcalendar.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>assets/css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='<?php echo base_url() ?>assets/css/chosen.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>assets/css/uniform.default.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>assets/css/colorbox.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>assets/css/jquery.cleditor.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>assets/css/jquery.noty.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>assets/css/noty_theme_default.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>assets/css/elfinder.min.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>assets/css/elfinder.theme.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>assets/css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>assets/css/opa-icons.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>assets/css/uploadify.css' rel='stylesheet'>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
		
</head>

<body>
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"> 
					<span>FMAS</span>
				</a>
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> admin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">Profile</a></li>
						<li class="divider"></li>
						<li><?php echo anchor('dashboard/logout', 'Logout') ?></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
			</div>
		</div>
	</div>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Main</li>
						<li>
							<?php echo anchor('dashboard/view_users', '<i class="icon-home"></i><span class="hidden-tablet"> Users</span>', 'class="ajax-link"') ?>
						</li>
						<li>
							<?php echo anchor('dashboard/add_content', '<i class="icon-home"></i><span class="hidden-tablet"> Posts</span>', 'class="ajax-link"') ?>
						</li>
						<li>
							<?php echo anchor('dashboard/view_albums', '<i class="icon-home"></i><span class="hidden-tablet"> Gallery</span>', 'class="ajax-link"') ?>
						</li>
						<li>
							<?php echo anchor('dashboard/view_downloads', '<i class="icon-home"></i><span class="hidden-tablet"> Downloadables</span>', 'class="ajax-link"') ?>
						</li>
						<li>
							<?php echo anchor('dashboard/view_clients', '<i class="icon-home"></i><span class="hidden-tablet"> Clients</span>', 'class="ajax-link"') ?>
						</li>
						
						
						
					</ul>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<?php echo anchor('dashboard', 'Home') ?><span class="divider">/</span>
					</li>
					
				</ul>
			</div>