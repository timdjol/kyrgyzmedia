<!DOCTYPE html>
<html lang="ru">

<head>

	<meta charset="utf-8">

	<title><?php bloginfo('name'); ?>|<?php wp_title("", true); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Template Basic Images Start -->
	<meta property="og:image" content="path/to/image.jpg">
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.png">
	<meta name="theme-color" content="#000">
	<!-- Custom Browsers Color End -->
	<?php wp_head(); ?>
	<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-RB61TZ8V5R"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-RB61TZ8V5R');
</script>
</head>

<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-3 logo">
					<a href="<?php echo get_home_url(); ?>"><img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="Logo"></a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 head-title">
					<div class="overlay"></div>
					<h1><?php bloginfo('name'); ?></h1>
					<h3><?php bloginfo('description'); ?></h3>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/mount.jpg" alt="">
				</div>
			</div>
		</div>

	</header>
