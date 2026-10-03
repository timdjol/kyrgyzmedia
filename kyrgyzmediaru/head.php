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
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap&subset=cyrillic" rel="stylesheet">
	<meta name="theme-color" content="#000">
	<!-- Custom Browsers Color End -->
	<?php wp_head(); ?>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-75275534-1', 'auto');
		ga('send', 'pageview');

	</script>
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
					<a href="<?php echo get_home_url(); ?>"><img class="ruslogo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="Logo"></a>
				</div>
				<div class="col-md-6"></div>
				<div class="col-md-3">
					<ul class="lang">
						<li><a href="http://covidru.kyrgyzmedia.kg/">Русский</a></li>
						<li><a href="http://covid.kyrgyzmedia.kg/">Кыргызча</a></li>
					</ul>
				</div>
			</div>
		</div>
	
	</header>
