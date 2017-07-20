<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width">

	<title><?php bloginfo('name'); ?></title>

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/normalize.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

	<script src="<?php bloginfo('template_url'); ?>/js/modernizr.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<?php wp_head(); ?>

</head>
	<body class="<?php echo the_slug(); ?>">
		<!--[if lt IE 8]><p>You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p><![endif]-->

		<header class="container">
			<div class="row">
				<div class="col-md-4">
					<a class="logo" href="<?php echo get_site_url()?>"><img alt="Logo" src="<?php bloginfo('template_url'); ?>/img/logo.png" /></a>
				</div>
				<div class="col-md-8">
					<div class="navbar navbar-inverse">
						<div class="navbar-header">
							<button data-target="#mobile-navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="#" class="navbar-brand">Menu</a>
						</div>
						<div id="mobile-navbar" class="navbar-collapse collapse">
							<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'nav navbar-nav') ); ?>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div class="container">
			<div class="content">