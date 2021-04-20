<?php

/*
 * Augment the WP-API response for the Posts endpoint
 * Add ACF data
 * Add Thumbnail URL
 */


add_action( 'rest_api_init', 'add_fields_in_post_object' );

function add_fields_in_post_object () {

	register_rest_field( 'post', 'acf', [ 'get_callback' => 'get_post_acf' ] );
	register_rest_field( 'post', 'thumbnail', [ 'get_callback' => 'get_post_thumbnail_url' ] );

}

function get_post_acf ( $object, $field_name, $request ) {

	return get_fields( $object[ 'id' ] );

}

function get_post_thumbnail_url ( $object, $field_name, $request ) {

	return get_the_post_thumbnail_url( $object[ 'id' ], "medium" );

}

/*
 * custom endpoint: /podcasts
 */
// add_action( 'rest_api_init', function () {
// 	register_rest_route( 'wp/v2', '/podcasts', [
// 		'methods' => 'GET',
// 		'callback' => 'get_podcasts',
// 	] );
// } );

// function get_podcasts( $params ) {

// 	$ids = get_posts( [
// 		'numberposts' => -1,
// 		'post_status' => "publish",
// 		'orderby' => 'publish_date',
// 		'order' => 'DESC',
// 		'category_name' => 'podcast',
// 		'meta_query' => [
// 			[
// 				'key' => '_ino_star',
// 				'value' => [ '', '0' ],
// 				'compare' => 'NOT IN'
// 			]
// 		],
// 		'fields' => 'ids'
// 	] );

// 	if ( empty( $ids ) ) {
// 		return null;
// 	}

// 	$podcasts = array_map( function ( $id ) {
// 		return array_merge(
// 			[
// 				'image_thumbnail' => get_the_post_thumbnail_url( $id, "medium" )
// 			],
// 			get_fields( $id )
// 		);
// 	}, $ids );

// 	return $podcasts;

// }
