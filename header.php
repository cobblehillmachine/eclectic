<?php 
/**
 * @package WordPress
 * @subpackage Eclectic
 */
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="IE ie8"> <![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="IE ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!--[if IE 8 ]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
<title><?php echo site_global_description(); ?></title>
<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<!-- <link rel="shortcut icon" href="<?php echo get_site_url(); ?>/favicon.ico"> -->
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link rel="icon" href="<?php bloginfo('siteurl'); ?>/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="<?php bloginfo('siteurl'); ?>/favicon.ico" type="image/x-icon" />
<?php wp_head(); ?>
<script src="//use.typekit.net/dgk2xqk.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60923419-1', 'auto');
  ga('send', 'pageview');

</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJmcrw6EmdKVALN1tj50wbIZK7wfDvd28"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/masonry.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/instafeedly.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/retina.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/imagesLoaded.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/cookie.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/general.js"></script>

</head>
<body <?php body_class(); ?>>
	<div class="body-wrapper">

		<header class="header">
			<a href="/cart">
				<div class="cart">
					
					
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/cart-icon.png" data-at2x="<?php echo get_template_directory_uri(); ?>/assets/images/cart-icon@2x.png">
				</div>
			</a>
			<div class="mobile-nav mobile">
				<div class="main-nav logo">
					<a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/eclectic-logo@2x.jpg"></a>
				</div>
				<div class="main-nav">
					<?php wp_nav_menu(array('menu' => 'Main Nav - Part 1')) ?>
					<?php wp_nav_menu(array('menu' => 'Main Nav - Part 2')) ?>
				</div>
			</div>
			<div class="desktop-nav desktop">
				<div class="main-nav left">
					<?php wp_nav_menu(array('menu' => 'Main Nav - Part 1')) ?>
				</div>
				<div class="main-nav logo">
					<a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/eclectic-logo.jpg" ></a>
				</div>
				<div class="main-nav right">
					<?php wp_nav_menu(array('menu' => 'Main Nav - Part 2')) ?>
				</div>
			</div>
		</header>	
		
		<div class="main-container" role="main">

