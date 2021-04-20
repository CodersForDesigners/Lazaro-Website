<?php
	// prevent search engines from crawling this page
	header( 'X-Robots-Tag: noindex', true );
?>
<meta name="robots" content="noindex">

<!-- re-direct the user to podcast video -->
<script type="text/javascript">
	location.replace( "https://www.youtube.com/watch?v=<?= $_GET[ 'vid' ] ?>" );
</script>

<?php
// example incoming request
// /pages/podcast.php?vid=WxMdOFyWcUw&cn=testcamp&cs=testsource&ck=testkey1

/* -----
	setup tracking parameters
----- */
$tracking_info = [ ];

// random number to bust cache
$tracking_info[ 'z' ] = rand( 289372387623, 289372397623 );

// Google Measurement Protocol version
$tracking_info[ 'v' ] = 1;

// tracking ID
$tracking_info[ 'tid' ] = 'UA-57124254-12';

// client ID
	// generate a RFC 4122 compliant UUID v4
	// source: https://gist.github.com/dahnielson/508447
$tracking_info[ 'cid' ] = sprintf(
	'%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
	mt_rand(0, 0xffff), mt_rand(0, 0xffff),
	mt_rand(0, 0xffff),
	mt_rand(0, 0x0fff) | 0x4000,
	mt_rand(0, 0x3fff) | 0x8000,
	mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
);

// hit type
$tracking_info[ 't' ] = 'pageview';

// user IP address
$tracking_info[ 'uip' ] = $_SERVER[ 'REMOTE_ADDR' ];

// user agent
$tracking_info[ 'ua' ] = $_SERVER[ 'HTTP_USER_AGENT' ];

// document referrer
// $tracking_info[ 'dr' ] = isset( $_SERVER[ 'HTTP_REFERER' ] ) ?? '';

// document location
$tracking_info[ 'dl' ] = "https://www.youtube.com/watch?v=" . $_GET[ 'vid' ];

// document title
$tracking_info[ 'dt' ] = $_GET[ 'cn' ];

// campaign name
$tracking_info[ 'cn' ] = $_GET[ 'cn' ];

// campaign source
$tracking_info[ 'cs' ] = $_GET[ 'cs' ];

// campaign medium
$tracking_info[ 'cm' ] = 'social';

// campaign keyword
$tracking_info[ 'ck' ] = $_GET[ 'ck' ];





/* -----
	post tracking data to Google Analytics
----- */
$url = 'https://www.google-analytics.com/collect';
$options = [
	'http' => [
		'header'  => 'Content-type: application/x-www-form-urlencoded\r\n',
		'method'  => 'POST',
		'content' => http_build_query( $tracking_info )
	]
];
file_get_contents( $url, false, stream_context_create( $options ) );
