$(document).ready(function() {

	// Filter by category
	$('select[name="filter_category"]').on("change", function() {
		var pathname = window.location.pathname;
		let searchParams = new URLSearchParams(window.location.search);
		params = [
			"filter_status",
			"search_field",
			"search_value",
		];

		let link = "";
		$.each(params, function(key, value) {
			if (searchParams.has(value)) {
				link += `${value}=${searchParams.get(value)}&`;
			}
		});

		let filter_category = $(this).val();

		window.location.href = `${pathname}?${link}filter_category=${filter_category}`;
	});
	
	// Sort
	$("a.select-field").click(function(e) {
		e.preventDefault();

		let field 		= $(this).data('field');
		let fieldName 	= $(this).html();
		$("button.btn-active-field").html(fieldName + ' <span class="caret"></span>');
		$inputSearchField.val(field);
	});

	$('.btn-delete').on('click', function() {
		if(!confirm('Bạn có chắc muốn xóa phần tử?'))
			return false;
	});

	// Active Menu Side Bar
	let child_Li = $(`#sidebar-menu li`);
	var parentDiv = [];
	
	child_Li.each((index, val) => {
		parentDiv.push(val.id);
		// console.log(`key = ${index} - param = ${val}`);
	});

	$(parentDiv).each((index, val) => {
		// console.log('val = ' + val);

		if(controllerName == val) {
			let choose = $(`#${val}`);
			choose.addClass('current-page');
			choose.parent().css('display', 'block');
			choose.parent().parent().addClass('active');
		}
	});
	
	
});

function showNotify(element, message, type = 'success') {
    element.notify(message, {
        position: "top center",
        className: type,
    });
}

function callAjax(element, url, type) {
	$.ajax({
		url: url,
		type: "GET",
		dataType: "json",
		success: function (result) {
			console.log(result);
			
			if (result) {
				switch (type) {
					case 'ordering':
						$(".modified-" + result.id).html(result.modified);
						showNotify(element, result.message);
						break;
					case 'status':
						console.log(result);
						
						$(".modified-" + result.id).html(result.modified);
						element.text(result.status.name);
						element.removeClass(element.data('class'));
						element.addClass(result.status.class);
						element.data('class', result.status.class);
						element.attr("href", result.link);
						showNotify(element, result.message);
					case 'select':
						$(".modified-" + result.id).html(result.modified);
						showNotify(element, result.message);
				}
			} else {
				console.log('fail');
			}
		},
	});
}

function allStorage() {

    var archive = [],
        keys = Object.keys(localStorage),
        i = 0, key;

    for (; key = keys[i]; i++) {
        archive.push( key + '=' + localStorage.getItem(key));
    }

	// $.each(archive, function (key, param) {
	// 	console.log(`key = ${key} -- param = ${param}`);
	// });
	console.log('all localStorage = ' + archive);

    return archive;
}

// A.Check Type of Number - Dad
function checkInputOrdering(number, higher) {
    flag = true;
    if (!checkInteger(number)) flag = false;
    if (!checkNumber(number)) flag = false;
    if (!checkNumberHigher(number, higher)) flag = false;
    return flag;
}

// B.Check Type of Number - Child
function checkInteger(number){
    let flag;
    if(number % 1 == 0) {flag = true;}else{flag = false;}
    return flag;
}
function checkNumber(number){
    let flag;
    if($.isNumeric(number)) {flag = true;}else{flag = false;}
    return flag;
}
function checkNumberHigher(number, higher){
    let flag;
    if(number >= higher) {flag = true;}else{flag = false;}
    return flag;
}