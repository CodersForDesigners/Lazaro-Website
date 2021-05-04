<?php

	// :: ONLY DURING DEVELOPMENT ::
	// debugging
	// ini_set( "display_errors", "On" );
	// ini_set( "error_reporting", E_ALL );

	// get info on the request
	list( $viewName, $viewPath ) = require "server/pageless.php";

	$ver = 'v=20210504_1';

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml"
	prefix="og: http://ogp.me/ns# fb: http://www.facebook.com/2008/fbml">

<head>

	<!-- Page Meta -->
	<meta charset="utf-8">
	<title>Lazaro – Vertically Integrated Brand Consultancy<?php $viewName != "404" ? " | " . $viewName : "" ?></title>
	<meta name="description"
		content="We provide an end-to-end service. You might recognise us as an amalgam of a Brand Consultancy, Marketing Consultancy, Advertising Agency, 360˚ Design Firm, Accredited Media Firm, Film Production Company, Commercial Photography Studio, Web Development Company, Application Development Company, Social Media & Digital Marketing Agency and many more.">
	<meta name="keywords" content="Vertically Integrated, Brand, Consultancy, Design Firm, Advertising Agency">
	<meta name="author" content="Lazaro Advertising">
	<link rel="canonical" href="https://lazaro.in/">

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-5JSVKX8');</script>
	<!-- END : Google Tag Manager -->

	<!-- Viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript">var SETTINGS = { };</script>

	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
	<link rel="manifest" href="favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#444444">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#444444">

	<!-- Open Graph Name Space -->
	<meta property="og:title" content="Lazaro Advertising – We are a Vertically Integrated Brand Consultancy">
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://lazaro.in/">
	<meta property="og:site_name" content="https://lazaro.in/">
	<meta property="og:image" content="https://lazaro.in/social/og-cover-image.png">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="630">
	<meta property="og:image" content="https://lazaro.in/social/og-thumbnail-image.png">
	<meta property="og:image:width" content="310">
	<meta property="og:image:height" content="310">
	<meta property="og:description"
		content="We provide an end-to-end service. You might recognise us as an amalgam of a Brand Consultancy, Marketing Consultancy, Advertising Agency, 360˚ Design Firm, Accredited Media Firm, Film Production Company, Commercial Photography Studio, Web Development Company, Application Development Company, Social Media & Digital Marketing Agency and many more.">

	<!-- Facebook APP ID -->
	<meta property="fb:app_id" content="281078292316914">

	<!-- Twitter Card Data -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@LazaroIndia">
	<meta name="twitter:title" content="We are a Vertically Integrated Brand Consultancy,">
	<meta name="twitter:description" content="We provide an end-to-end service. You might recognise us as an amalgam of a Brand Consultancy, Marketing Consultancy, Advertising Agency, 360˚ Design Firm, Accredited Media Firm, Film Production Company, Commercial Photography Studio, Web Development Company, Application Development Company, Social Media & Digital Marketing Agency and many more.">
	<meta name="twitter:creator" content="@LazaroIndia">

	<!-- Twitter Summary card images must be at least 120x120px -->
	<meta name="twitter:image" content="https://lazaro.in/social/og-thumbnail-image.png">

	<!-- Fonts -->
	<script src="https://use.typekit.net/gth7uom.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>

	<!-- Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Stylesheet -->
	<?php require_once __DIR__ . '/style.php' ?>

	<!-- Slick CSS -->
	<link rel="stylesheet" type="text/css" href="/plugins/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="/plugins/slick/slick-theme.css"/>

	<!-- jQuery 3 -->
	<script type="text/javascript" src="/js/jquery-3.0.0.min.js"></script>

</head>

<body id="body" class="body">

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

<div id="page-wrapper" class="page-wrapper fill-red" data-page="<?php echo $viewName ?>"><!-- Page Wrapper -->

	<?php if( $viewName == "home"){ ?>

		<!-- Animated Headline CSS -->
		<link rel="stylesheet" type="text/css" href="/plugins/animated-headline/css/headline-theme.css"/>

		<!-- Intro Video Section -->
		<section class="intro-video-section">
			<div class="intro-video fill-dark">
				<!-- !NOTE : UPDATE ASPECT RATIOS IN CSS -->
				<video id="intro_video" autoplay="" muted="" loop="" playsinline="" src=""></video>
				<script type="text/javascript">
					var video = document.getElementById('intro_video');
					video.src = "/video/splash/lazaro-intro-"+ SETTINGS.VIEWPORT_SIZE +".mp4";
					// for Android devices enabled with a paranoid security setting
					document.ontouchstart = function () {
						video.play();
						document.ontouchstart = null;
					};
				</script>
			</div>
		</section>

		<!-- Intro Video JS -->
		<script type="text/javascript" src="/js/modules/intro_video.js?<?= $ver ?>"></script>

		<!-- Animated Headline JS -->
		<script type="text/javascript" src="/plugins/animated-headline/js/main.js?<?= $ver ?>"></script>

	<?php } else { ?>

		<!-- Header Section -->
		<section class="header-section">
			<div class="container">
				<div class="header row">
					<div class="logo columns small-10 medium-3 large-2 large-offset-1">
						<a href="/"><img alt="Icon Lazaro" src="/img/lazaro-icon-gradient.svg"></a>
					</div>
					<div class="menu-toggle columns small-2 medium-0">
						<a class="js_modal_trigger" data-mod-id="menu_mobile" href="#"><img alt="Icon Menu" src="/img/icon-menu.svg"></a>
					</div>
					<div class="menu columns small-12 medium-9 large-8 js_menu">
						<a class="h5 <?php echo $viewName == "home" ? "active" : "" ?>" data-page-id="home" href="/home">Home</a>
						<a class="h5 <?php echo $viewName == "podcast" ? "active" : "" ?>" data-page-id="podcast" href="/blog/category/podcast">Podcast</a>
						<a class="h5 <?php echo $viewName == "blog" ? "active" : "" ?>" data-page-id="blog" href="/blog/">Blog</a>
						<!-- <a class="h5 <?php// echo $viewName == "work" ? "active" : "" ?>" data-page-id="work" href="/blog/category/work">Work</a> -->
						<a class="h5 js_nav_button <?php echo $viewName == "contact" ? "active" : "" ?>" data-page-id="contact" href="/#contact">Contact</a>
					</div>
				</div>
			</div>
		</section> <!-- END : Header Section -->

	<?php } ?>



	<!-- ★ OUTER CONTAINER ★ -->
	<div class="outer-container">

		<!-- Page Content -->
		<div id="page-content">

			<?php require $viewPath; ?>

		</div> <!-- END : Page Content -->

		<!-- Footer Section -->
		<section class="footer-section fill-off-dark">
			<div class="container">
				<!-- Footer -->
				<div class="footer row">
					<div class="card card-pull-left columns small-12 medium-7 fill-light">
						<img alt="Lazaro Logo" class="logo" src="/img/lazaro-logo-adv-tm.svg">
						<div class="address h3">
							<small class="entity block text-uppercase">Lazaro Advertising PVT. LTD.</small>
							<span class="block">Cognito, #203, 4th E Cross Rd, HRBR Layout 3rd Block, Kalyan Nagar, Bengaluru, Karnataka, India -  560 043</span>
						</div>
						<span class="block">
							<a class="button button-small fill-dark" href="mailto:sonia@lazaro.in" target="_blank">
								<span>Email us</span>
								<img alt="Icon Email" src="/img/button-icon-email.svg">
							</a>
							<a class="button button-small fill-dark" href="https://goo.gl/maps/N9HBr6xL9sn" target="_blank">
								<span>Visit us</span>
								<img alt="Icon Maps" src="/img/button-icon-location.svg">
							</a>
						</span>
					</div>
					<div class="links columns small-12 medium-4 medium-offset-1 large-3">
						<div class="row">
							<div class="link-set columns small-4 small-offset-1 medium-12 medium-offset-0">
								<span class="h3">Quick Links</span>
								<a class="h5" href="/#what-we-do">What We Do</a>
								<a class="h5" href="/blog/category/podcast/">Podcast</a>
								<a class="h5" href="/blog/">Blog</a>
								<!-- <a class="h5" href="/category/work/">Work</a> -->
								<a class="h5" href="/#contact">Contact</a>
							</div>
							<div class="link-set columns small-5 small-offset-1 medium-12 medium-offset-0">
								<span class="h3">Follow us</span>
								<!-- Social Links -->
								<div class="social">
									<a class="social-icon youtube" href="https://www.youtube.com/channel/UCBacSOKFdPZmaj_G5YlmdHA" target="_blank">YouTube</a>
									<a class="social-icon facebook" href="https://www.facebook.com/lazaroadvertising/" target="_blank">Facebook</a>
									<a class="social-icon instagram" href="https://www.instagram.com/lazaroadvertising/" target="_blank">Instagram</a>
									<a class="social-icon linkedin" href="https://www.linkedin.com/company/lazaro.advertising" target="_blank">LinkedIn</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- END : Footer Section -->

	</div><!-- END : ★ OUTER CONTAINER ★ -->



</div><!-- END : Page Wrapper -->









<!-- ⬇ All Modals below this point ⬇ -->

<div id="modal-wrapper"><!-- Modal Wrapper -->
	<div class="modal-box js_modal_box">

		<!-- Modal Content : Sample -->
		<div class="modal-box-content js_modal_box_content" data-mod-id="sample">
			<div class="container">
				<div class="row">
					<div class="columns small-12">
						<h2><!-- Title Goes Here --></h2>
					</div>
				</div>
				<div class="row">
					<!-- video embed -->
					<div class="columns small-12">
						<div class="youtube_embed" data-src="https://www.youtube.com/embed/lncVHzsc_QA?rel=0&amp;showinfo=0">
							<div class="youtube_load"></div>
							<iframe width="1280" height="720" src="" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="columns small-12">
						<p><!-- Augmented reality chrome network skyscraper Tokyo camera military-grade cardboard footage ablative otaku warehouse Kowloon table tower monofilament. Bicycle girl tower network face forwards towards fetishism corporation tiger-team. Monofilament decay hacker RAF dolphin DIY franchise narrative math-skyscraper realism systemic order-flow corrupted. Math-sentient tube cyber-paranoid order-flow long-chain hydrocarbons Chiba boy. RAF advert narrative dissident car wristwatch soul-delay cardboard nano-neon silent. Wonton soup pistol nano-otaku assault franchise realism RAF denim skyscraper geodesic tube into weathered youtube artisanal grenade. --></p>
					</div>
				</div>
			</div>
		</div><!-- END : Sample -->

		<!-- Modal Content : Sample -->
		<div class="modal-box-content js_modal_box_content" data-mod-id="menu_mobile">
			<div class="container">
				<div class="row">
					<div class="menu-mobile columns small-12 js_mobile_menu_destination">
					</div>
				</div>
			</div>
		</div><!-- END : Sample -->


		<!-- Modal Close Button -->
		<div class="modal-close js_modal_close">&times;</div>
	</div>

</div><!-- END : Modal Wrapper -->

<!--  ☠  MARKUP ENDS HERE  ☠  -->









<!-- JS Modules -->
<script type="text/javascript" src="/plugins/base64/js-base64-v3.6.0.min.js?<?= $ver ?>"></script>
<script type="text/javascript" src="/js/modules/pageless.js?<?= $ver ?>"></script>
<script type="text/javascript" src="/js/modules/video_embed.js?<?= $ver ?>"></script>
<script type="text/javascript" src="/js/modules/modal_box.js?<?= $ver ?>"></script>
<script type="text/javascript" src="/js/modules/smoothscroll.js?<?= $ver ?>"></script>
<script type="text/javascript" src="/js/modules/forms.js?<?= $ver ?>"></script>
<script type="text/javascript" src="/js/contact_form_ui.js?<?= $ver ?>"></script>
<script type="text/javascript" src="/js/modules/cupid/utils.js?<?= $ver ?>"></script>
<script type="text/javascript" src="/js/modules/cupid/user.js?<?= $ver ?>"></script>
<script type="text/javascript" src="/js/modules/phone-country-code.js?<?= $ver ?>"></script>
<script type="text/javascript" src="/js/intercept-form-with-login-prompt.js?<?= $ver ?>"></script>

<!-- Slick JS -->
<script type="text/javascript" src="/plugins/slick/slick.min.js"></script>
<script type="text/javascript" src="/js/modules/slick_podcast.js?<?= $ver ?>"></script>

<script type="text/javascript">

// JAVASCRIPT GOES HERE
$(document).ready(function(){

	/*
	 *
	 * Smooth Scroll Class
	 *
	 */

	$('.js_smooth_scroll').on('click', function( link ) {
		link.preventDefault();

		var linkTo = link.target.getAttribute('href');

		setTimeout( function(){
			document.querySelector( linkTo ).scrollIntoView({ behavior: 'smooth' });
		}, 200);
	});







	/*
	 *
	 * Menu Instance in Mobile Modal
	 *
	 */
	var menu_items = $('.header-section .js_menu').html();
	$('.modal-box .js_mobile_menu_destination').html(menu_items);


	/*
	 *
	 * Tell to Cupid that the user dropped by
	 *
	 */
	$( function () {

		var user = __CUPID.utils.getUser();
		if ( user ) {
			setTimeout( function () {
				__CUPID.utils.getAnalyticsId()
					.then( function ( deviceId ) {
						user.hasDeviceId( deviceId );
						user.isOnWebsite();
					} )
			}, 1500 );
		}

	} );

});

</script>

</body>

</html>
