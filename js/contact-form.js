
$( function () {

	/*
	 * ----- Set up the contact form
	 */
	var contactForm = new BFSForm( "js_contact_form" );
		var domInputName = document.getElementById( "js_form_input_name" );
		var domInputEmail = document.getElementById( "js_form_input_email" );
		var domInputPhoneCountryCode = document.getElementById( "js_form_input_phone_country_code" );
		var domInputPhoneNumber = document.getElementById( "js_form_input_phone" );
		var domInputOrganization = document.getElementById( "js_form_input_organization" );
		var domInputMessage = document.getElementById( "js_form_input_message" );
		var domInputNotifyUpdates = document.getElementById( "js_form_input_notify_updates" );

	// Set up the message field using TinyMCE
	tinymce.init( {
		selector: ".js_wysiwyg",
		plugins: "image",
		inline: false,
		toolbar: "undo redo | styleselect | image | bold italic | alignleft aligncenter alignright alignjustify",
		menubar: "edit format insert",
		file_picker_types: "image",
		setup: function ( editor ) {
			// Synchronise the textarea "message" field's value with that of the rich text's
			editor.on( "change", function () {
				$( ".js_wysiwyg" ).val( editor.getContent() )
			} )

			// Store a global reference to the editor
			window.__BFS = window.__BFS || { };
			window.__BFS.UI = window.__BFS.UI || { };
			window.__BFS.UI.contactForm = window.__BFS.UI.contactForm || { };
			window.__BFS.UI.contactForm.messageEditor = editor;
		}
	} );


	// Set up the enquiry form's input fields, data validators and data assemblers
		// Name
	contactForm.addField( "name", true, domInputName, function ( values, isRequired ) {
		var name = values[ 0 ].trim();

		if ( isRequired )
			if ( name === "" )
				throw new Error( "Please provide your name." );

		if ( name.match( /\d/ ) )
			throw new Error( "Please provide a valid name." );

		return name;
	} );

		// Email address
	contactForm.addField( "emailAddress", true, domInputEmail, function ( values, isRequired ) {
		var emailAddress = values[ 0 ].trim();

		if ( isRequired )
			if ( emailAddress === "" )
				throw new Error( "Please provide your email address." );

		if ( emailAddress.indexOf( "@" ) === -1 )
			throw new Error( "Please provide a valid email address." );

		return emailAddress;
	} );

		// Phone number
	contactForm.addField( "phoneNumber", false, [ domInputPhoneCountryCode, domInputPhoneNumber ], function ( values ) {
		var phoneCountryCode = values[ 0 ].trim();
		var phoneNumberLocal = values[ 1 ].trim();
		var phoneNumber = phoneCountryCode + phoneNumberLocal;

		if ( phoneNumberLocal.length > 1 )
			if ( ! (
				phoneNumber.match( /^\+\d[\d\-]+\d$/ )	// this is not a perfect regex, but it's close
				&& phoneNumberLocal.replace( /\D/g, "" ).length > 3
			) )
				throw new Error( "Please provide a valid phone number." );

		return phoneNumber;
	} );

		// Organization / Company
	contactForm.addField( "organization", false, domInputOrganization, function ( values ) {
		var organization = values[ 0 ].trim();

		if ( organization.length > 1 )
			if ( organization.replace( /[\s]/g ).length < 1 )
				throw new Error( "Please provide your organization or company." );

		return organization;
	} );

		// Message
	contactForm.addField( "message", false, domInputMessage, function ( values ) {
		var message = values[ 0 ].trim();
		return message;
	} );

		// Get Notified of Updates
	contactForm.addField( "receiveCommunicationViaTextMessaging", false, domInputNotifyUpdates, function ( values ) {
		var receiveCommunicationViaTextMessaging = values[ 0 ].trim();
		return receiveCommunicationViaTextMessaging;
	} );

} );
