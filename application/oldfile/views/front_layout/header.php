<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
<title>Francisco - Mendoza Accounting Services</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="tamarillo" />
<!-- favicons -->
<link rel="shortcut icon" href="<?php echo base_url() ?>front_assets/images/templatemo_favicon.ico">
<!-- bootstrap core CSS -->
<link href="<?php echo base_url() ?>front_assets/css/bootstrap.min.css" rel="stylesheet" />
<!-- fancybox CSS -->
<link href="<?php echo base_url() ?>front_assets/css/jquery.lightbox.css" rel="stylesheet" />
<!-- flex slider CSS -->
<link href="<?php echo base_url() ?>front_assets/css/flexslider.css" rel="stylesheet" />
<!-- custom styles for this template -->
<link href="<?php echo base_url() ?>front_assets/css/templatemo_style.css" rel="stylesheet" />
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>
<body>
  
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-push-1 col-sm-6">
                <a href="#" id="templatemo_logo"><img src="<?php echo base_url() ?>front_assets/images/logo.jpg" alt="tamarillo"></a>
            </div>
            <div class="col-md-3 hidden-xs"></div>
            <div class="col-xs-3 col-xs-offset-20 visible-xs">
                <a href="#" id="mobile_menu"><span class="glyphicon glyphicon-align-justify"></span></a>
            </div>
            <div class="col-xs-24 visible-xs" id="mobile_menu_list">
                <ul>
                    <li><?php echo anchor('main', 'Home', $this->uri->segment(2) == '' ? 'class="current"' : '' ) ?></li>
                    <li><?php echo anchor('main/services', 'Services', $this->uri->segment(2) == 'services' ? 'class="current"' : '') ?></li>
                    <li><?php echo anchor('main/gallery', 'Gallery', $this->uri->segment(2) == 'gallery' ? 'class="current"' : '') ?></li>
                    <li><?php echo anchor('main/contacts', 'Contacts', $this->uri->segment(2) == 'contacts' ? 'class="current"' : '') ?></li>
                    <li><?php echo anchor('main/downloads', 'Downloads', $this->uri->segment(2) == 'downloads' ? 'class="current"' : '') ?></li>
                    <li><?php echo anchor('main/clients', 'Clients', $this->uri->segment(2) == 'clients' ? 'class="current"' : '') ?></li>
                </ul>
            </div>
            <div class="col-md-16 col-sm-18 hidden-xs" id="templatemo-nav-bar">
                <ul class="nav navbar-right">
                    <li><?php echo anchor('main', 'Home', $this->uri->segment(2) == '' ? 'class="current"' : '' ) ?></li>
                    <li><?php echo anchor('main/services', 'Services', $this->uri->segment(2) == 'services' ? 'class="current"' : '') ?></li>
                    <li><?php echo anchor('main/gallery', 'Gallery', $this->uri->segment(2) == 'gallery' ? 'class="current"' : '') ?></li>
                    <li><?php echo anchor('main/contacts', 'Contacts', $this->uri->segment(2) == 'contacts' ? 'class="current"' : '') ?></li>
                    <li><?php echo anchor('main/downloads', 'Downloads', $this->uri->segment(2) == 'downloads' ? 'class="current"' : '') ?></li>
                    <li><?php echo anchor('main/clients', 'Clients', $this->uri->segment(2) == 'clients' ? 'class="current"' : '') ?></li>
                </ul>
            </div>
        </div>
    </div>

</header><!-- end of templatemo_header -->




