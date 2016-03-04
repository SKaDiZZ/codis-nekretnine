(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	 $(document).ready(function() {

		/* $('.slajderform').submit(function() {




			 var data = {
				 action: 'update_slides'

			 };

			 $.post(ajaxurl, data, function(response) {
				alert(response);
			 });

			 return false;
		 });


		 */

	 $('.removeslide').click(function(event) {

		event.preventDefault();

		var data = {
			action: 'update_slides',
			remove_from_slider: 'yes',
			slide_id: event.target.id

		};

		var remove_button = $(this);

		$.post(ajaxurl, data, function(response) {
		    remove_button.closest('li').remove();
			$('#update-message').append(response).show().delay(5000).fadeOut();
	   });

		return false;

	 });

 });


})( jQuery );
