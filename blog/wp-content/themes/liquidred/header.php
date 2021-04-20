<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Liquid_Red
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<!-- Viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript">var SETTINGS = { };</script>

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
<link rel="manifest" href="/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#444444">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#444444">

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5JSVKX8');</script>
<!-- END : Google Tag Manager -->

<!-- Fonts -->
<script src="https://use.typekit.net/gth7uom.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>

<!-- Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Slick CSS -->
<link rel="stylesheet" type="text/css" href="/plugins/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="/plugins/slick/slick-theme.css"/>

<!-- jQuery 3 -->
<script type="text/javascript" src="/js/jquery-3.0.0.min.js"></script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5JSVKX8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- END : Google Tag Manager (noscript) -->

<!-- Get Viewport Size -->
<script type="text/javascript">
	function getViewportCategory () {
		var viewportSize
		var w = window.innerWidth;
		if ( w <= 640 ){ viewportSize = "small"; }
		else if ( w > 640 && w <= 1040 ) { viewportSize = "medium"; }
		else if ( w > 1040 && w <= 1380 ) { viewportSize = "large"; }
		else if ( w > 1040 && w <= 1980 ) { viewportSize = "xlarge"; }
		else { viewportSize = "xxlarge"; }
		return viewportSize;
	}
	// var SETTINGS = { };
	SETTINGS.VIEWPORT_SIZE = getViewportCategory();
</script> <!-- END : Get Viewport Size -->


<!--  ★  MARKUP GOES HERE  ★  -->

<div id="page-wrapper" class="page-wrapper fill-red" data-page="blog"><!-- Page Wrapper -->

	<!-- Header Section -->
	<section class="header-section">
		<div class="container">
			<div class="header row">
				<div class="logo columns small-10 medium-3 large-2 large-offset-1">
					<a href="/"><img src="/img/lazaro-icon-gradient.svg"></a>
				</div>
				<div class="menu-toggle columns small-2 medium-0">
					<a class="js_modal_trigger" data-mod-id="menu_mobile" href="#"><img src="/img/icon-menu.svg"></a>
				</div>
				<div class="menu columns small-12 medium-9 large-8 js_menu">
					<a class="h5" data-page-id="home" href="/home">Home</a>
					<a class="h5 <?php echo $viewName == "podcast" ? "active" : "" ?>" data-page-id="podcast" href="/blog/category/podcast">Podcast</a>
					<a class="h5 <?php echo $viewName == "blog" ? "active" : "" ?>" data-page-id="blog" href="/blog/">Blog</a>
					<!-- <a class="h5" data-page-id="work" href="/blog/category/work">Work</a> -->
					<a class="h5" data-page-id="contact" href="/#contact">Contact</a>
				</div>
			</div>
		</div>
	</section> <!-- END : Header Section -->

	<!-- ★ OUTER CONTAINER ★ -->
	<div class="outer-container">

		<!-- Page Content -->
		<div id="page-content">

				<!-- Blog Page -->
				<div class="blog-page">

