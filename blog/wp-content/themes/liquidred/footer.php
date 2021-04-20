<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Liquid_Red
 */

?>

			<div><!-- END : Blog Page -->

		</div> <!-- END : Page Content -->

		<!-- Footer Section -->
		<section class="footer-section fill-off-dark">
			<div class="container">
				<!-- Footer -->
				<div class="footer row">
					<div class="card card-pull-left columns small-12 medium-7 fill-light">
						<img class="logo" src="/img/lazaro-logo.svg">
						<div class="address h3">
							<small class="entity block text-uppercase">Lazaro Advertising PVT. LTD.</small>
							<span class="block">Cognito, #203, 4th E Cross Rd, HRBR Layout 3rd Block, Kalyan Nagar, Bengaluru, Karnataka, India -  560 043</span>
						</div>
						<span class="block">
							<a class="button button-small fill-dark" href="mailto:sonia@lazaro.in" target="_blank">
								<span>Email us</span>
								<img src="/img/button-icon-email.svg">
							</a>
							<a class="button button-small fill-dark" href="https://goo.gl/maps/N9HBr6xL9sn" target="_blank">
								<span>Visit us</span>
								<img src="/img/button-icon-location.svg">
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

	<?php wp_footer(); ?>

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
<script type="text/javascript" src="/js/modules/pageless.js"></script>
<script type="text/javascript" src="/js/modules/video_embed.js"></script>
<script type="text/javascript" src="/js/modules/modal_box.js"></script>
<script type="text/javascript" src="/js/modules/smoothscroll.js"></script>
<script type="text/javascript" src="/js/modules/contact_form_ui.js"></script>
<script type="text/javascript" src="/js/modules/form.js"></script>

<!-- Slick JS -->
<script type="text/javascript" src="/plugins/slick/slick.min.js"></script>
<script type="text/javascript" src="/js/modules/slick_podcast.js"></script>

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

});

</script>

</body>

</html>




</body>
</html>
