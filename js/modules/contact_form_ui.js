
$( function () {


	/* -- Multi Step Form Animarions -- */

	// Initialise
	var $form_set_size = $('#js_form_contact').find('.form-set').length;
	var $active_set = 0;
	var $progress_bar = $('#js_form_contact .form-progress .progress span');
	var $progress;

	// Initialise Form Controls
	$( '#js_form_contact .form-controls .button.prev' ).hide();
	$( '#js_form_contact .form-controls .button.timbuktu_addr' ).hide();

	// Initialise Active Set
	$('#js_form_contact .form-set').eq( $active_set ).slideDown();

	// Progress Bar Function
	function progress_indication(){
		$progress = ( $active_set + 1 ) * ( 100 / $form_set_size );
		$progress_bar.css( 'width', $progress + '%' );
	};
	progress_indication();


	// Animate Required Field Check
	function checkRequiredFields() {
		$requiredFields = $('#js_form_contact .form-set').eq( $active_set ).find('.form-required');

		if ( $requiredFields.length != 0 ) {
			var emptyRequiredFieldIsPresent;
			$requiredFields.each( function ( i, el ) {
				if ( $( el ).val().trim() == "" ) {
					emptyRequiredFieldIsPresent = true;
				}
			} );
			if ( emptyRequiredFieldIsPresent ) {
				$( '#js_form_contact .form-controls .button.next' ).slideUp();
				$( '#js_form_contact .form-controls .button.timbuktu_addr' ).slideUp();
			} else {
				if( $active_set + 1 == $form_set_size ){
					$( '#js_form_contact .form-controls .button.timbuktu_addr' ).slideDown();
				} else {
					$( '#js_form_contact .form-controls .button.next' ).slideDown();
				}
			}
		}
	}
	checkRequiredFields();


	// Controls
	$( '#js_form_contact .form-controls .button:not([type="submit"])' ).on( 'click', function ( event ){

		event.preventDefault();

		// Animate Active Form Set & Form Progress
		if ( $( event.target ).hasClass('next') ){
			if( $active_set < $form_set_size - 1) {
				$('#js_form_contact .form-set').eq( $active_set ).slideUp();
				$active_set = $active_set + 1;
				$('#js_form_contact .form-set').eq( $active_set ).slideDown();
			}
			progress_indication();
		} else if ( $( event.target ).hasClass('prev') ) {
			if( $active_set > 0 ){
				$('#js_form_contact .form-set').eq( $active_set ).slideUp()
				$active_set = $active_set - 1;
				$('#js_form_contact .form-set').eq( $active_set ).slideDown()
			}
			progress_indication();
		}

		// Animate Form Controls
		if( $active_set == 0 ){
			$( '#js_form_contact .form-controls .button.prev' ).slideUp();
		} else if( $active_set == $form_set_size - 1 ){
			$( '#js_form_contact .form-controls .button.next' ).slideUp();
			// required for preventing form submission by bots
			$( '#js_form_contact .form-controls .button.timbuktu_addr' )
				.val( "Submit" )
				.attr( "disabled", false )
				.slideDown();
			$( '#js_form_contact .form-controls .button.timbuktu_addr' ).data( "human", 1 );
		} else {
			$( '#js_form_contact .form-controls .button.next' ).slideDown();
			$( '#js_form_contact .form-controls .button.prev' ).slideDown();
			// required for preventing form submission by bots
			$( '#js_form_contact .form-controls .button.timbuktu_addr' )
				.slideUp()
				.attr( "disabled", true )
				.text( "clear" );
			$( '#js_form_contact .form-controls .button.timbuktu_addr' ).data( "human", 0 );
		}

		// Animate Required Field Function
		checkRequiredFields();

	});

	// Animate Required Field Function on Input Event
	$('#js_form_contact .form-set .form-required').on('input', function() {
		checkRequiredFields();
	});


	/*
	 *	Contextual Inteligence
	 */

	// Stature Based >
		var $stature = $('#js_form_contact .js_stature select').val();


		// Product Age
		function product_age_group(){
			if( $stature == 'enterprise-head' || $stature == 'enterprise-manager' ){
				$( '.js_product_age .enterprise' ).slideDown();
				$( '.js_product_age .startup' ).slideUp();
			} else if ( $stature == 'startup-head' || $stature == 'startup-manager' ){
				$( '.js_product_age .enterprise' ).slideUp();
				$( '.js_product_age .startup' ).slideDown();
			}
		};

		product_age_group();


		// Revenue
		function annual_revenue(){
			if( $stature == 'enterprise-head' || $stature == 'enterprise-manager' ){
				$( '.js_annual_revenue .enterprise' ).slideDown();
				$( '.js_annual_revenue .startup' ).slideUp();
			} else if ( $stature == 'startup-head' || $stature == 'startup-manager' ){
				$( '.js_annual_revenue .enterprise' ).slideUp();
				$( '.js_annual_revenue .startup' ).slideDown();
			}
		};

		annual_revenue();


		// Manager Assitance
		function manager_assistance() {
			if( $stature == 'enterprise-head' || $stature == 'startup-head' ){
				$( '.js_manager_assistance .head' ).slideDown();
				$( '.js_manager_assistance .manager' ).slideUp();
			} else if ( $stature == 'enterprise-manager' || $stature == 'startup-manager' ){
				$( '.js_manager_assistance .head' ).slideUp();
				$( '.js_manager_assistance .manager' ).slideDown();
			}
		}

		manager_assistance();


		// Stature Trigger
		$( '#js_form_contact .js_stature select').on( 'change', function( event ){
			$stature = $(event.target).val();
			product_age_group();
			annual_revenue();
			manager_assistance();
		} );



	// Disable Biggest Problem From Other Problems
		$( '#js_form_contact .js_problems_radio .other' ).hide();
		$( '#js_form_contact .js_problems_checkbox .other' ).hide();

		$( '#js_form_contact .js_problems_radio input[type="radio"]').on( 'change', function(){

			var $checked_item = $( '#js_form_contact .js_problems_radio input[type="radio"]:checked');
			var $checked_index = $( '#js_form_contact .js_problems_radio input[type="radio"]').index( $checked_item );

			// Other Text Field .pt-1
			if ( $checked_item.val() == 'other' ){
				$( '#js_form_contact .js_problems_checkbox input[type="checkbox"]').removeAttr('disabled');
				$( '#js_form_contact .js_problems_radio .other' ).slideDown();
			} else {
				$( '#js_form_contact .js_problems_checkbox input[type="checkbox"]').removeAttr('disabled');
				$( '#js_form_contact .js_problems_checkbox input[type="checkbox"]').eq( $checked_index ).attr('disabled', 'true');
				$( '#js_form_contact .js_problems_radio .other' ).slideUp();
			}

		} );

		// Other Text Field contd.pt-2
		$( '#js_form_contact .js_problems_checkbox input[type="checkbox"]').on( 'change', function(event){

			if ( $(event.target).val() == 'other' && $(event.target).is(':checked') ){
				$( '#js_form_contact .js_problems_checkbox .other' ).slideDown();
			} else if ( $(event.target).val() == 'other' ) {
				$( '#js_form_contact .js_problems_checkbox .other' ).slideUp();
			}

		} );

		// Key Decision Maker toggle {
			$( '#js_form_contact .js_manager_assistance .head .other-decision-maker' ).hide();

			$( '#js_form_contact .js_manager_assistance .head input[type="radio"]' ).on( 'change', function(event){
				if ( $(event.target).val() == "No" && $(event.target).is(':checked') ) {
					$( '#js_form_contact .js_manager_assistance .head .other-decision-maker' ).slideDown();
				} else {
					$( '#js_form_contact .js_manager_assistance .head .other-decision-maker' ).slideUp();
				}
			} );




} );
