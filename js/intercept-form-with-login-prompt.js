
$( function () {





/*
 * ------------------------\
 *  Common event handlers
 * ------------------------|
 */
function onOTPVerified () {
	var loginPrompt = this;
	// Trigger the login event
	loginPrompt.trigger( "login" );
}
function trackConversion ( loginPrompt ) {
	// Track the conversion
	var conversionUrl = $( loginPrompt.triggerElement ).data( "c" ) || loginPrompt.conversionSlug;
	__.utils.trackPageVisit( conversionUrl );
}
function onLogin () {
	var loginPrompt = this;
	// Set cookie ( for a month )
	var ONE_MONTH = 31 * 24 * 60 * 60;
	__.utils.setCookie( "cupid-user", __.user, ONE_MONTH );
	// Record the activity
	__.utils.getAnalyticsId()
		.then( function ( deviceId ) {
			__.user.hasDeviceId( deviceId );
			__.user.isOnWebsite();
			__.user.update();	// the name and email might have been provided somewhere earlier
		} )


	// Show the form again
	loginPrompt.$OTPForm.slideUp( function () {
		loginPrompt.$primaryForm.slideDown();
	} );

	loginPrompt.trigger( "postLogin" );
}



/*
 * ------------------------\
 *  The Login Prompts
 * ------------------------|
 */
var __ = window.__CUPID;
window.__BFS = window.__BFS || { };
var loginPrompts = { };
window.__BFS.loginPrompts = loginPrompts;





/*
 * ----- Login Flow
 */
loginPrompts.contactForm = new __.LoginPrompt( "Contact Form", $( ".js_contact_form_section" ) );
loginPrompts.contactForm.conversionSlug = "contact-form";
loginPrompts.contactForm.$primaryForm = loginPrompts.contactForm.$site.find( ".js_contact_form" );
loginPrompts.contactForm.context = loginPrompts.contactForm.$primaryForm.data( "context" ) || "Form";

loginPrompts.contactForm.triggerFlowOn( "submit", ".js_contact_form" );

loginPrompts.contactForm.on( "requirePhone", function ( event ) {
	this.trigger( "phoneSubmit", event );
} );

// When the phone number is to be submitted
loginPrompts.contactForm.on( "phoneSubmit", function ( event ) {
	var loginPrompt = this;
	// var $form = $( event.target ).closest( "form" );
	var contactBFSForm = window.__BFS.UI.contactForm.bfsFormInstance;

	/*
	 * ----- Prevent interaction with the form
	 */
	contactBFSForm.disable( function ( domForm ) {
		window.__BFS.UI.contactForm.messageEditor.mode.set( "readonly" );
	} );

	// Pull data from the form
	var formData;
	try {
		formData = contactBFSForm.getData();
	}
	catch ( e ) {
		// Reflect back sanitized values to the form
		// setFormData( $form, e );
		// e.forEach( function ( issue ) {
		// 	$( issue.$ ).addClass( "js_error" );
		// } );
		// Prepare the error message
		// var message = e.reduce( function ( message, issue ) {
		// 	return message + "\n"
		// 		+ ( issue.type[ 0 ].toUpperCase() + issue.type.slice( 1 ) );
		// }, "" );
		// message = "Please provide valid information for the following fields:" + message;

		// Report the message
		alert( e.message );
		contactBFSForm.enable( function ( domForm ) {
			window.__BFS.UI.contactForm.messageEditor.mode.set( "design" );
		} );
		return;
	}

	// Reflect back sanitized values to the form
	// setFormData( $form, formData );

	// Get the relevant data
	var phoneNumber = formData.phoneNumber;

	// Create a new (but temporary) Person object
	__.tempUser = new __.Person( phoneNumber, loginPrompt.context );
	__.tempUser.name = formData.name;
	__.tempUser.emailAddress = formData.emailAddress;

		// Set the device id
	__.utils.getAnalyticsId()
		.then( function ( deviceId ) {
			__.tempUser.hasDeviceId( deviceId );
		} )
		// Attempt to find the person in the database
		.then( function () {
			__.tempUser.getFromDB()
				// If the person exists, log in
				.then( function ( person ) {
					if ( person.verification && person.verification.isVerified ) {
						__.user = person;
						__.user.name = formData.name;
						__.user.emailAddress = formData.emailAddress;
						loginPrompt.trigger( "login", person );
					}
					else
						throw person;
				} )
				// If the person don't exist, add the person, and send an OTP
				.catch( function ( person ) {
					if ( person instanceof Error || ! person )
						trackConversion( loginPrompt );
					return __.tempUser.add()
						.then( function () {
							if ( window.__CUPID.policies.requireOTP )
								loginPrompt.trigger( "requireOTP" );
							else {
								__.user = __.tempUser;
								loginPrompt.trigger( "login" );
							}
						} )
						.catch( function () {
							loginPrompt.trigger( "phoneError" );
						} );
				} )
		} );

} );

// When the OTP is required
loginPrompts.contactForm.on( "requireOTP", function ( event, phoneNumber ) {
	var loginPrompt = this;

	__.tempUser.requestOTP( loginPrompt.context )
		.then( function ( otpSessionId ) {
			__.tempUser.otpSessionId = otpSessionId;
			loginPrompt.$primaryForm.slideUp( function () {
				loginPrompt.$OTPForm.slideDown();
			} );
			// Scroll to the top of the form container, and crossfade between the main and OTP form
			// window.scrollTo( { top: loginPrompt.$site.offset().top - 50, behavior: "smooth" } );
			// setTimeout( function () {
			// 	loginPrompt.$site.addClass( "show-otp-form" );
			// }, 250 );
			otpBFSForm.enable();
		} )
		.catch( function ( e ) {
			alert( e.message );
			var contactBFSForm = window.__BFS.UI.contactForm.bfsFormInstance;
			contactBFSForm.enable();
		} )
} );


/*
 *
 * ----- Briefly side-step for a bit to set up the OTP form
 *
 */
var otpBFSForm = new BFSForm( "js_otp_form" );
	var domInputOTP = document.getElementById( "js_form_input_otp" );

otpBFSForm.addField( "otp", domInputOTP, function ( values ) {
	var otp = values[ 0 ].trim();

	if ( otp === "" )
		throw new Error( "Please provide the OTP." );

	return otp;
} );

// Back to the login prompt; set up the "OTPSubmit" handler
loginPrompts.contactForm.on( "OTPSubmit", function onOTPSubmit ( event ) {

	var loginPrompt = this;

	/*
	 * ----- Prevent interaction with the form
	 */
	otpBFSForm.disable();


	var formData;
	try {
		formData = otpBFSForm.getData();
	}
	catch ( e ) {
		// Report the message
		alert( e.message );
		otpBFSForm.enable();
		return;
	}

	__.tempUser.verifyOTP( formData.otp )
		.then( function () {
			__.user = __.tempUser;
			loginPrompt.trigger( "OTPVerified" );
		} )
		.catch( function ( e ) {
			loginPrompt.trigger( "OTPError", e );
		} );

} );

loginPrompts.contactForm.on( "OTPError", function ( e ) {
	alert( e.message );
} );
loginPrompts.contactForm.on( "OTPVerified", onOTPVerified );
// When the user is logged in
loginPrompts.contactForm.on( "login", onLogin );

loginPrompts.contactForm.on( "postLogin", function ( user ) {
	var loginPrompt = this;
	loginPrompt.$primaryForm.trigger( "submit" );
} );




} );
