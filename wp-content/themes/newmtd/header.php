<!doctype html>

<html>

<head>
	<title><?php echo bloginfo('title'); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=163767963737380&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<header id="masthead">
	<div id="main-header" class="row">
		<div class="container">
			<div class="col-sm-12 content-block header">

			</div>
		</div>
	</div>
</header>

<div id="main-menu" class="clearfix">
	<div class="container menu">
		<div class="navbar">
		  <div class="navbar-inner">
		    <?php
			wp_nav_menu( array(
			    'theme_location' => 'mtd_main_menu',
			    'menu_class'	=> 'nav',
			    'container_class' => 'navmenu' ) );
			?>
		  </div>
		</div>
	</div>
</div>

<div class="container clearfix">



