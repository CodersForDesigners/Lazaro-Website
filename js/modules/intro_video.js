$(document).ready(function(){


	/*
	 *
	 *	Window Resize Update Video Banner
	 *
	 */

	 function reset () {

		var currentViewportSize = getViewportCategory();
		if ( SETTINGS.VIEWPORT_SIZE != currentViewportSize ) {

			var video = document.getElementById('intro_video');
			video.src = "/video/splash/lazaro-intro-"+ currentViewportSize +".mp4";

		}
		SETTINGS.VIEWPORT_SIZE = currentViewportSize;

	 }

	window.addEventListener(
		"resize",
		function () {

			var animationFrameId = null;
			var timeoutId = null;

			// \/ optimization
			// leveraging both a throttle/debounce and an animation frame
			return function ( event ) {

				if ( timeoutId ) {
					window.clearTimeout( timeoutId );
					timeoutId = null;
				}
				timeoutId = window.setTimeout( function () {

					if ( animationFrameId ) {
						window.cancelAnimationFrame( animationFrameId );
						animationFrameId = null;
					}
					animationFrameId = window.requestAnimationFrame( reset );

				}, 51 );
			};

		}(),
		true
	);
	/* -- END : Window Resize -- */



	/*
	 *
	 *	On Scroll - Exit Fullscreen
	 *
	 */

	function exit_fullscreen(){
		var breakpoint = SETTINGS.VIEWPORT_SIZE;
		if ( breakpoint == 'large' || breakpoint == 'xlarge' || breakpoint == 'xxlarge') {
			
			var w_top = window.scrollY || document.body.scrollTop;
			var e_pos = $('#what-we-do').offset().top;

			var e_top = e_pos - w_top;

			if ( e_top <= 10 ){
				$('#page-wrapper').addClass('scrolled');
				$('#page-wrapper').addClass('flow');
			} else if ( e_top >= 11 ) { 
				$('#page-wrapper').removeClass('scrolled');
				$('#page-wrapper').removeClass('flow');
			}

		}
	}
	exit_fullscreen();

	$(window).on('scroll', function() {
		exit_fullscreen();
	});





	

});