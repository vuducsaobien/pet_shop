$(document).ready(function() {	
	
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