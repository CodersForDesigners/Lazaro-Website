$(document).ready(function(){

	// refer to [ 1 ]
	$( '.js_slick_podcast_video' ).on( "init", function ( event, slick ) {

		$currentSlide = slick.$slides.get( slick.currentSlide );
		setVideoEmbed( $currentSlide );

	} );

	/*
	 *	Inititalize Slick Corporates
	 */

	 $('.js_slick_podcast_video').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: true,
		// fade: true,
		asNavFor: '.js_slick_podcast_thumbs'
	});

	$('.js_slick_podcast_thumbs').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		asNavFor: '.js_slick_podcast_video',
		arrows: false,
		centerMode: true,
		centerPadding: '0px',
		focusOnSelect: true
	});

	/*
	 [ 1 ]
	   when the carousel is swiped through, ↵
	   we cut off the current video embed ↵
	   and initialize the newly visited one

	   this is so we don't have multiple videos playing simultaneously
	 */
	var previousSlide;
	$( '.js_slick_podcast_video' ).on( "beforeChange", function ( event, slick, currentSlide, nextSlide ) {
		previousSlide = currentSlide;
	} );
	$( '.js_slick_podcast_video' ).on( "afterChange", function ( event, slick, currentSlide ) {

		$slides = slick.$slides;
		$previousSlide = $slides.get( previousSlide );
		$currentSlide = $slides.get( currentSlide );
		unsetVideoEmbed( $previousSlide );
		setVideoEmbed( $currentSlide );

	} );

} );
