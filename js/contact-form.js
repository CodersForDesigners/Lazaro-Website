
$( function () {

	// Set up the namespace
	window.__BFS = window.__BFS || { };
	window.__BFS.UI = window.__BFS.UI || { };
	window.__BFS.UI.contactForm = window.__BFS.UI.contactForm || { };

	/*
	 * ----- Set up the contact form
	 */
	var contactForm = new BFSForm( "js_contact_form" );
	window.__BFS.UI.contactForm.bfsFormInstance = contactForm;
		var domInputName = document.getElementById( "js_form_input_name" );
		var domInputEmail = document.getElementById( "js_form_input_email" );
		var domInputPhoneCountryCode = document.getElementById( "js_form_input_phone_country_code" );
		var domInputPhoneNumber = document.getElementById( "js_form_input_phone" );
		var domInputOrganization = document.getElementById( "js_form_input_organization" );
		var domInputMessage = document.getElementById( "js_form_input_message" );
		var domInputNotifyUpdatesSMS = document.getElementById( "js_form_input_notify_updates_sms" );
		var domInputNotifyUpdatesWhatsApp = document.getElementById( "js_form_input_notify_updates_wa" );

	// Set up the message field using TinyMCE
	tinymce.init( {
		selector: ".js_wysiwyg",
		plugins: "image",
		inline: false,
		toolbar: "undo redo | styleselect | image | bold italic | alignleft aligncenter alignright alignjustify",
		menubar: "edit format insert",
		statusbar: true,
			elementpath: false,
			branding: false,
			resize: true,
		height: 270,
		file_picker_types: "image",
		setup: function ( editor ) {
			// Synchronise the textarea "message" field's value with that of the rich text's
			editor.on( "change", function () {
				$( ".js_wysiwyg" ).val( editor.getContent() )
			} )

			// Store a global reference to the editor
			window.__BFS.UI.contactForm.messageEditor = editor;
		}
	} );


	// Set up the enquiry form's input fields, data validators and data assemblers
		// Name
	contactForm.addField( "name", domInputName, function ( values ) {
		var name = values[ 0 ].trim();

		if ( name === "" )
			throw new Error( "Please provide your name." );

		if ( name.match( /\d/ ) )
			throw new Error( "Please provide a valid name." );

		return name;
	} );

		// Email address
	contactForm.addField( "emailAddress", domInputEmail, function ( values ) {
		var emailAddress = values[ 0 ].trim();

		if ( emailAddress === "" )
			throw new Error( "Please provide your email address." );

		if ( emailAddress.indexOf( "@" ) === -1 )
			throw new Error( "Please provide a valid email address." );

		return emailAddress;
	} );

		// Phone number
	contactForm.addField( "phoneNumber", [ domInputPhoneCountryCode, domInputPhoneNumber ], function ( values ) {
		var phoneCountryCode = values[ 0 ].trim();
		var phoneNumberLocal = values[ 1 ].trim();
		var phoneNumber = phoneCountryCode + phoneNumberLocal;

		if ( phoneNumberLocal.length <= 1 )
			throw new Error( "Please provide a valid phone number." );

		if ( phoneNumberLocal.length > 1 )
			if ( ! (
				phoneNumber.match( /^\+\d[\d\-]+\d$/ )	// this is not a perfect regex, but it's close
				&& phoneNumberLocal.replace( /\D/g, "" ).length > 3
			) )
				throw new Error( "Please provide a valid phone number." );

		return phoneNumber;
	} );

		// Organization / Company
	contactForm.addField( "organization", domInputOrganization, function ( values ) {
		var organization = values[ 0 ].trim();

		// if ( organization.length > 1 )
		// 	if ( organization.replace( /[\s]/g ).length < 1 )
		// 		throw new Error( "Please provide your organization or company name." );

		return organization;
	} );

		// Message
	contactForm.addField( "message", domInputMessage, function ( values ) {
		var message = values[ 0 ].trim();
		var actualTextualContent = $( window.__BFS.UI.contactForm.messageEditor.getContent() ).text().trim();
		if ( ! actualTextualContent.length )
			throw new Error( "Please write a message." );
		return message;
	} );

		// Get Notified of Updates
	contactForm.addField( "receiveCommunicationViaTextMessaging", [ domInputNotifyUpdatesSMS, domInputNotifyUpdatesWhatsApp ], function ( values ) {
		var nonEmptyValues = values.filter( function ( v ) { return v; } );
		var receiveCommunicationViaTextMessaging = nonEmptyValues.length ? nonEmptyValues[ 0 ] : false;
		return receiveCommunicationViaTextMessaging;
	} );


	function showCompleteFormIfConditionsAreMet ( event ) {
		var name = domInputName.value.trim();
		var emailAddress = domInputEmail.value.trim();
		var phoneNumber = domInputPhoneNumber.value.trim();

		var sufficientInputHasBeenProvided = name && emailAddress && phoneNumber;

		if ( ! sufficientInputHasBeenProvided )
			return;

		// Reveal the form in its entirety
		$( contactForm.domForm ).find( ".hide-initially" ).removeClass( "hide-initially" );

		// Un-register this event handler as this is a one-way flow
		$( domInputName ).off( "input", showCompleteFormIfConditionsAreMet );
		$( domInputEmail ).off( "input", showCompleteFormIfConditionsAreMet );
		$( domInputPhoneNumber ).off( "input", showCompleteFormIfConditionsAreMet );
	}
	$( domInputName ).on( "input", showCompleteFormIfConditionsAreMet );
	$( domInputEmail ).on( "input", showCompleteFormIfConditionsAreMet );
	$( domInputPhoneNumber ).on( "input", showCompleteFormIfConditionsAreMet );


	contactForm.submit = function submit ( data ) {

		var __ = window.__CUPID;

		// __.user.name = data.name;
		// __.user.emailAddress = data.emailAddress;

		var additionalData = { };
		if ( data.organization )
			additionalData.organization = data.organization;
		if ( [ "boolean", "string" ].indexOf( typeof data.receiveCommunicationViaTextMessaging ) !== -1 )
			additionalData.receiveCommunicationViaTextMessaging = data.receiveCommunicationViaTextMessaging;

		__.user.appendAdditionalData( additionalData );

		__.user.submitMessage( data.message, "html" );

		__.user.update();

		contactForm.giveFeedback( "We'll get in touch shortly" );

		return Promise.resolve();

	}



	/*
	 * ----- Contact Form submission handler
	 */
	$( document ).on( "submit", ".js_contact_form", function ( event ) {

		/*
		 * ----- Prevent default browser behaviour
		 */
		event.preventDefault();

		/*
		 * ----- Prevent interaction with the form
		 */
		contactForm.disable( function ( domForm ) {
			window.__BFS.UI.contactForm.messageEditor.mode.set( "readonly" );
		} );

		/*
		 * ----- Provide feedback to the user
		 */
		contactForm.giveFeedback( "Sending..." );

		/*
		 * ----- Extract data (and report issues if found)
		 */
		var data;
		try {
			data = contactForm.getData();
		} catch ( error ) {
			alert( error.message )
			console.error( error.message )
			contactForm.enable( function ( domForm ) {
				window.__BFS.UI.contactForm.messageEditor.mode.set( "design" );
			} );
			contactForm.setSubmitButtonLabel();
			return;
		}

		/*
		 * ----- Submit data
		 */
		contactForm.submit( data )
			.then( function ( response ) {
				/*
				 * ----- Provide further feedback to the user
				 */
				contactForm.giveFeedback( "We'll get in touch shortly" );

			} )

	} );

} );
