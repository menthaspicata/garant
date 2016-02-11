jQuery( document ).ready(function() {

	jQuery('.content').wookmark({
		autoResize: true, 
		offset: 10 
	});

	var header_button = jQuery('.header_button');
	var close_button = jQuery('.close_form');
	var contact_form = jQuery('.contact_form');

	header_button.on("click", function() {
		contact_form.toggleClass('active_form');
	});

	close_button.on("click", function() {
		contact_form.toggleClass('active_form');
	});


});