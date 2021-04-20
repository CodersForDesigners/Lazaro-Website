<?php
/**
 * Custom UI components for this theme
 *
 *
 * @package Liquid_Red
 */

/**
 * Prints HTML with information on all the categories
 */
if ( ! function_exists( 'get_category_list' ) ) :
function get_category_list () {

	$categories = get_categories( [
		"hide_empty" => false,
		"include" => [ 2 ],
		// "include" => [ 2, 10, 11 ],
		"orderby" => "include"
	] );
	foreach ( $categories as $category ) {
		$category->url = esc_url( get_category_link( $category->term_id ) );
	}

	// $categories = array_map( function ( $category ) {
	// 	return [
	// 		"slug" => $category->slug,
	// 		"name" => $category->name,
	// 		"count" => $category->count,
	// 	];
	// }, $categories );

	// $categories = array_combine( $categories )


	foreach ( $categories as $category ) { ?>

		<a class="category-icon <?php echo $category->slug; ?>" href="<?php echo $category->url; ?>">
			<div class="cat-i-title h3"><?php echo $category->description; ?></div>
			<div class="cat-i-label h5">Archive <span class="count"><?php echo $category->count; ?></span></div>
		</a>

	<?php }

}
endif;

/*

Lazaro Podcast
Archive

Industry Featurette
Showcase

Case Studies
Portfolio

<a class="category-icon <?php echo $category->slug; ?>" href="<?php echo $category->url; ?>">
	<div class="cat-i-title h3"><?php echo $category->name; ?></div>
	<div class="cat-i-label h5"><?php echo $category->description; ?> <span class="count"><?php echo $category->count; ?></span></div>
</a>

*/

/**
 * Returns markup of either a featured video embed or a featured post for a post
 */
if ( ! function_exists( 'get_featured_media' ) ) :
function get_featured_media () {

	?>

	<div class="post-featured-image">

		<?php
		$featured_video_id = get_field( "youtube_id" );
		$featured_video_name = get_field( "youtube_video_name" ) ?? "";
		if ( ! empty( $featured_video_id ) ) { ?>

			<div class="youtube_embed" data-src="https://www.youtube.com/embed/<?php echo $featured_video_id; ?>?rel=0&amp;showinfo=0&amp;enablejsapi=1&amp;origin=http%3A%2F%2F<?php echo $_SERVER[ 'SERVER_NAME' ]; ?>" data-src="<?php echo $featured_video_name; ?>">
				<div class="youtube_load"></div>
				<iframe width="1280" height="720" src="" frameborder="0" allowfullscreen></iframe>
			</div>

		<?php } else if ( has_post_thumbnail() ) {

			// the_post_thumbnail( "large" );
			the_post_thumbnail();

		} ?>

	</div>

	<?php

}
endif;
