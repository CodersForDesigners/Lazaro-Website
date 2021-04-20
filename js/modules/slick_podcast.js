
// REFER to `video_embed.js` for some of the functions used in this file.

$( function () {

	// get the starred podcasts
	$.ajax( "/blog/wp-json/wp/v2/categories?slug=podcast" )
		.done( function ( response ) {
			var podcastCategoryID = response[ 0 ].id;
			$.ajax( "/blog/wp-json/wp/v2/posts?sticky=true&orderby=date&order=desc&categories=" + podcastCategoryID )
				.done( function ( response ) {

					// set the dimensions for the podcast carousel item
					var numPosts = response.length;
					var $style = $( "<style>" );
					if ( numPosts > 1 ) {
						var padding = ( ( 100 / ( 16 / 9 ) ) / ( numPosts + 2 ) ) - 0.15;
					}
					else {
						padding = 56.1;
					}
					$style = $( "<style>.home-page .podcast-section .podcast .youtube_embed { padding-bottom: " + padding +  "%; }</style>" );
					$( ".slick-podcast" ).append( $style );

					var podcastData = response.map( function ( post ) {
						return {
							acf: post.acf,
							thumbnail: post.thumbnail,
						};
					} );
					buildPodcastCarousel( podcastData );
					// setTimeout( setupPodcastCarousel, 500 );
					setupPodcastCarousel();

				} );
		} )

} );

function buildPodcastCarousel ( podcasts ) {


	var podcastCarouselItemTemplate = $( ".js_template_podcast_carousel_item" ).html();
	var podcastCarouselItems = podcasts.map( function ( podcast ) {

		var podcastCarouselItem = $( podcastCarouselItemTemplate );

		var podcastCarouselItemDataSrc =
			podcastCarouselItem
				.data( "src" )
				.replace( "video_id", podcast.acf.youtube_id )

		podcastCarouselItem.attr( "data-src", podcastCarouselItemDataSrc );
		podcastCarouselItem.attr( "data-name", podcast.acf.youtube_video_name )

		return podcastCarouselItem.get( 0 ).outerHTML;

	} ).join( "" );

	var podcastCarouselThumbnailTemplate = $( ".js_template_podcast_carousel_thumbnail" ).html();
	var podcastCarouselThumbnails = podcasts.map( function ( podcast ) {

		var podcastCarouselThumbnail = $( podcastCarouselThumbnailTemplate );

		var podcastCarouselThumbnailAlt =
			podcastCarouselThumbnail.attr( "alt" ) + podcast.acf.episode_num;

		podcastCarouselThumbnail.attr( "alt", podcastCarouselThumbnailAlt );
		podcastCarouselThumbnail.attr( "src", podcast.thumbnail );

		return podcastCarouselThumbnail.get( 0 ).outerHTML;

	} ).join( "" );

	$( ".js_slick_podcast_video" ).html( podcastCarouselItems );
	$( ".js_slick_podcast_thumbs" ).html( podcastCarouselThumbnails );

}

function setupPodcastCarousel () {

	// refer to [ 1 ]
	// this snippet of code logically makes sense to follow the next one
	// but it doesn't work if it does
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

}
