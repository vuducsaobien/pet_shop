$(document).ready(function() {

	let $btnSearch            = $("button#btn-search");
	let $btnClearSearch       = $("button#btn-clear-search");
	let $selectChangeAttrAjax = $("select.select-ajax");
	let $inputOrdering        = $("input.ordering");
	let $btnStatus            = $(".btn-status");
	let $inputSearchField     = $("input[name  = search_field]");
	let $inputSearchValue     = $("input[name  = search_value]");
	let $selectChangeAttr     = $("select[name = select_change_attr]");

	// Ajax Change Ordering
	$inputOrdering.on("change", function () {
		let $currentElement = $(this);
		let value = $(this).val();
		let $url = $(this).data("url");
		$url = $url.replace("value_new", value);

		if (checkInputOrdering(value, 1)) {
            callAjax($currentElement, $url, 'ordering');
        }

	});

	// Ajax Change Status
	$btnStatus.click(function (e) {
		e.preventDefault();
		let $currentElement = $(this);
		let $url = $currentElement.attr("href");

		callAjax($currentElement, $url, 'status');

		
	});

	// Ajax Change SelectBox Value
	$selectChangeAttrAjax.on("change", function () {
		let $currentElement = $(this);
		let select_value = $(this).val();
		let $url = $(this).data("url");
		$url = $url.replace("value_new", select_value);

		callAjax($currentElement, $url, 'select');
	});
	
	$btnSearch.click(function() {

		var pathname	= window.location.pathname;
		let params 		= ['filter_status'];
		let searchParams= new URLSearchParams(window.location.search);	// ?filter_status=active

		let link		= "";
		$.each( params, function( key, param ) { // filter_status
			if (searchParams.has(param) ) {
				link += param + "=" + searchParams.get(param) + "&" // filter_status=active
			}
		});

		let search_field = $inputSearchField.val();
		let search_value = $inputSearchValue.val();

		if(search_value.replace(/\s/g,"") == ""){
			alert("Nhập vào giá trị cần tìm !!");
		} else {
			window.location.href = pathname + "?" + link + 'search_field='+ search_field + '&search_value=' + search_value;
		}
	});

	$btnClearSearch.click(function() {
		var pathname	= window.location.pathname;
		let searchParams= new URLSearchParams(window.location.search);

		params 			= ['filter_status'];

		let link		= "";
		$.each( params, function( key, param ) {
			if (searchParams.has(param) ) {
				link += param + "=" + searchParams.get(param) + "&"
			}
		});

		window.location.href = pathname + "?" + link.slice(0,-1);
	});

	// $('#lfm').filemanager('image', {url_prefix: '/laravel-filemanager'});
	// $('#lfm').filemanager('image', {prefix: 'admin123/laravel-filemanager'});
	
	$('#lfm').filemanager('image', {prefix: '/laravel-filemanager'});
	// $('#lfm').filemanager('image');

	allStorage();

	// $('.tags').tagsInput({
	// 	'defaultText': '',
	// 	'width': '100%'
	// });
});

