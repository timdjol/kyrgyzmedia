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
		<div class="top-head">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="text">Присылайте свои новости, фото и видео WhatsApp <a target="_blank" href="https://api.whatsapp.com/send?phone=996555402155">0555402155</a></div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-3 logo">
					<a href="<?php echo get_home_url(); ?>"><img class="ruslogo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="Logo"></a>
				</div>
				<div class="col-md-3">
						<?php 
						$args = array(
							'show_option_all'    => 'Выберите область',
							'show_count'         => 0,
							'hide_empty'         => 0,
							'hierarchical'       => 2,
							'include'           => array(6, 48, 49, 29, 464, 291, 466)
						); 
						wp_dropdown_categories( $args );?>
					<script>
						var dropdown = document.getElementById("cat");
						function onCatChange() {
							if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
								location.href = "<?php echo get_option('home');
								?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
							}
						}
						dropdown.onchange = onCatChange;
					</script>
				</div>
				<div class="col-md-3 search">
					<?php my_get_search_form(); ?>
				</div>
				<div class="col-md-3">
					<ul class="lang">
						<li><a href="https://ru.kyrgyzmedia.kg/">Русский</a></li>
						<li><a href="https://kyrgyzmedia.kg/">Кыргызча</a></li>
					</ul>
				</div>
			</div>
		</div>
		<nav>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<a href="#" class="toggle-mnu d-xl-none"><span></span></a>
						<?php wp_nav_menu( array( 'theme_location' => 'main-menuru', 'container' => false, ) ); ?>
						<div class="social">
							<div class="labelsoc">Подпишитесь на наши каналы</div>
							<ul class="soc">
							<li><a target="_blank" href="<?php echo $custom_fields['facebook']; ?>"><i class="fa fa-facebook-square"></i></a></li>
							<li><a target="_blank" href="<?php echo $custom_fields['instagram']; ?>>"><i class="fa fa-instagram"></i></a></li>
							<li><a target="_blank" href="<?php echo $custom_fields['youtube']; ?>"><i class="fa fa-youtube"></i></a></li>
							<li><a target="_blank" href="<?php echo $custom_fields['rss']; ?>"><i class="fa fa-rss"></i></a></li>
						</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</header>

	<style>
		.top-head{
			background-color: #074b81;
			text-align: center;
		}
		.top-head .text, .top-head .text a{
			color: #fff;
		}
	</style>

