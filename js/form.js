
$( function () {

	// $( '#js_form_contact' ).on( 'submit', function ( event ) {
	$( '.timbuktu_addr' ).on( 'click', function ( event ) {

		// preventing form submission by bots
		var isHuman = $( '#js_form_contact .form-controls .timbuktu_addr' )
						.data( "human" );
		if ( ! isHuman ) {
			return;
		}

		event.preventDefault();

		// $( '#js_form_contact input[type="submit"]' ).attr( 'disabled', true ).addClass('sending').val("Sending");
		$( '.timbuktu_addr' ).attr( 'disabled', true ).addClass('sending').val("Sending");

		// $form = $( event.target );
		$form = $( '#js_form_contact' );

		var data = {
			async: true,
			// name: $form.find( '#form_contact_name' ).val(),
			// email: $form.find( '#form_contact_email' ).val(),
			// contact: parseInt( $form.find( '#form_contact_number' ).val(), 10 ),
			stature: $form.find( '[name="stature"]').val(),
			product: $form.find( '[name="product"]').val(),
			decision_maker: $form.find( '[name="decision_maker"]').val(),
			decision_maker_num: $form.find( '[name="decision_maker_num"]').val(),
			revamp_marketing: $form.find( '[name="revamp_marketing"]' ).val(),
			convice_superiors: $form.find( '[name="convice_superiors"]' ).val(),
			product_age: $form.find( '[name="product_age"]' ).val(),
			annual_revenue_enterprise: $form.find( '[name="annual_revenue_enterprise"]' ).val(),
			annual_revenue_startup: $form.find( '[name="annual_revenue_startup"]' ).val(),
			funded: $form.find( '[name="funded"]' ).val(),
			biggest_problem: $form.find( '[name="biggest_problem"]' ).val(),
			biggest_problem_other: $form.find( '[name="biggest_problem_other"]' ).val(),
			other_problem_1: $form.find( '[name="other_problem_1"]' ).prop("checked"),
			other_problem_2: $form.find( '[name="other_problem_2"]' ).prop("checked"),
			other_problem_3: $form.find( '[name="other_problem_3"]' ).prop("checked"),
			other_problem_4: $form.find( '[name="other_problem_4"]' ).prop("checked"),
			other_problem_5: $form.find( '[name="other_problem_5"]' ).prop("checked"),
			other_problem_0: $form.find( '[name="other_problem_0"]' ).prop("checked"),
			other_problem_1_val: $form.find( '[name="other_problem_1"]' ).val(),
			other_problem_2_val: $form.find( '[name="other_problem_2"]' ).val(),
			other_problem_3_val: $form.find( '[name="other_problem_3"]' ).val(),
			other_problem_4_val: $form.find( '[name="other_problem_4"]' ).val(),
			other_problem_5_val: $form.find( '[name="other_problem_5"]' ).val(),
			other_problem_0_val: $form.find( '[name="other_problem_0"]' ).val(),
			other_problem_other: $form.find( '[name="other_problem_other"]' ).val(),
			full_name: $form.find( '[name="full_name"]' ).val(),
			phone_num: $form.find( '[name="phone_num"]' ).val(),
			email_id: $form.find( '[name="email_id"]' ).val(),
			company: $form.find( '[name="company"]' ).val(),
			find_us: $form.find( '[name="find_us"]' ).val(),
		};

		// console.log( data );

		// var urlEndpoint = $form.attr( 'action' );
		// var urlEndpoint = $form.data( 'action' );
		var urlEndpoint = "/server/handle-form-data-160517.php";

		$.ajax( {
			url: urlEndpoint,
			method: 'POST',
			data: data,
			success: function ( responseJSON, status, xhr ) {

				var response;
				try {
					response = JSON.parse( responseJSON );
				} catch ( e ) {
					console.log( e );
					response = responseJSON;
				}
				console.log( 'status :: ' + status );
				console.log( 'response ::' );
				console.log( response );
				// console.log( 'the XHR object ::' );
				// console.log( xhr );

				// FOR NOW
				// if ( ! response.status ) {
				// 	return;
				// }

				// feedback
				/*$( 'h2' ).text( '( LIAR! )' );
				$( 'input' ).prop( 'disabled', true ).addClass( 'block' ).val( 'I SHALL NOT TELL LIES. '.repeat( 9 ) );
				$( 'button[ type="submit" ]' ).prop( 'disabled', true ).text( 'you lied!' );*/

				// $( '#js_form_contact input[type="submit"]' ).addClass('done').val("Thank You");
				$( '.timbuktu_addr' ).addClass('done').val("Thank You");

			}
		} );

	} );

	$( document ).on( "submit", "#js_form_contact", function ( event ) {

		console.log( "you not hueman!" );
		event.preventDefault();

	} );

} );
