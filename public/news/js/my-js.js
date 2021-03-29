$(document).ready(function() {
	// allStorage();

	// Ajax Modal get Product Image
	$('.modal_quick_view').click(function (e) {

		e.preventDefault();
		let currentElement = $(this);
		let url = currentElement.attr("href");

		console.log('url = ' + url);
		callAjax(currentElement, url, 'modal');

		
	});
	
});

