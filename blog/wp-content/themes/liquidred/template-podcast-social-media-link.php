<?php
/**
 * Template Name: Podcast Social Media Link Generator
 */

?>

<style type="text/css">

	.hidden {
		display: none;
	}

</style>

<form class="js_form">

	<label>Your name</label>
	<select name="person_name">
		<option selected>( select )</option>
		<option value="mark">Mark</option>
		<option value="jude">Jude</option>
		<option value="aroushka">Aroushka</option>
		<option value="mario">Mario</option>
		<option value="prashanth">Prashanth</option>
		<option value="aditya">Aditya</option>
		<option value="lazaro">Lazaro</option>
		<option value="test_bot">[ test bot ]</option>
	</select>
	<br>

	<label>YouTube Video Id</label>
	<input type="text" name="youtube_video_id">
	<br>

	<label>Podcast Number ( ex. E001 )</label>
	<input type="text" name="podcast_title">
	<br>

	<label>Social Platform</label>
	<select name="social_plaform">
		<option selected>( select )</option>
		<option value="instagram">Instagram</option>
		<option value="facebook">Facebook</option>
		<option value="whatsapp">WhatsApp</option>
		<option value="linkedin">Linkedin</option>
		<option value="google">Google</option>
		<option value="youtube">YouTube</option>
		<option value="test_platform">[ test platform ]</option>
	</select>
	<br>

	<button type="submit">Create</button>

</form>

<section class="hidden js_url">
	<textarea class="js_url_value"></textarea>
	<br>
	<button class="js_copy_url_to_clipboard">Copy to Clipboard</button>
</section>

<script type="text/javascript">

	var domForm = document.getElementsByClassName( "js_form" )[ 0 ];
	domForm.onsubmit = function ( event ) {

		event.preventDefault();

		var domForm = event.target;

		var data = { };
		data.ck = domForm.person_name.value;
		data.vid = domForm.youtube_video_id.value;
		data.cn = domForm.podcast_title.value;
		data.cs = domForm.social_plaform.value;

		var searchParams = new URLSearchParams( "" );
		for ( let field in data ) {
			searchParams.set( field, data[ field ] );
		}
		var url = "https://lazaro.in/pages/podcast.php?" + searchParams.toString();

		var domGeneratedURL = document.getElementsByClassName( "js_url_value" )[ 0 ];
		domGeneratedURL.textContent = url;
		var domURLSection = document.getElementsByClassName( "js_url" )[ 0 ]
		domURLSection.classList.remove( "hidden" );

	};

	var domCopyURLToClipboard = document.getElementsByClassName( "js_copy_url_to_clipboard" )[ 0 ];
	domCopyURLToClipboard.onclick = function ( event ) {

		var domCopyURLToClipboard = event.target;
		var domGeneratedURL = document.getElementsByClassName( "js_url_value" )[ 0 ];
		domGeneratedURL.select();
		try {
			document.execCommand( "copy" );
			domCopyURLToClipboard.textContent = "Copied!";
			setTimeout( function () {
				domCopyURLToClipboard.textContent = "Copy to Clipboard";
			}, 1500 );
		}
		catch ( e ) {}

	};

</script>
