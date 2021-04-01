$(document).ready(function() {

	// Ajax Modal get Product Image
	$('.modal_quick_view').click(function (e) {

		e.preventDefault();
		let currentElement = $(this);
		let url = currentElement.attr("href");

		console.log('url = ' + url);
		callAjax(currentElement, url, 'modal');

		
	});

	// add To Cart
	$('.addtocart-btn').click(function (e) {
		e.preventDefault();
		let currentElement = $(this);
		let url            = currentElement.attr("href");
		let quantity       = $('input[name=qtybutton]').val();
		let price          = $('div#product_price').data('price');
		let total_price    = quantity * price;
		if (checkInputOrdering(quantity, 1)) {

			// Get name select Attribute 
			var selectName = [];
			$('select[name^="attribute"]').each(function(key, val) {
				selectName.push($(this).attr('name'));
			});

			let arrAttribID = []; let strAttribID; let arrAttribVal = []; let strAttribVal;

			$.each(selectName, function( index, result ) {
				let select          = $('select[name="'+result+'"]');
				// let product_id      = select.data('product-id');
				let attribute_id    = select.data('attribute-id');
				let attribute_value = select.val();
				arrAttribID.push(attribute_id); 
				arrAttribVal.push(attribute_value);
			})

			strAttribID = arrAttribID.join(','); 
			strAttribVal = arrAttribVal.join(',');

			url = url.replace("quantity", quantity).replace("price", price).replace("total_price", total_price)
			.replace("attribute_id", strAttribID).replace("attribute_value", strAttribVal);

			console.log('url = ' + url);
			callAjax(currentElement, url, 'cart');
		}
	});

	$('select.shipping_change').on("change", function(e) {
		e.preventDefault();
		let fee = parseInt($(this).val());

		if (checkNumber(fee)) {
			let span                = $('span#grand_total span');
			let old_grandTotal_text = span.text();
			let currenciesAsNumbers = parseFloat( old_grandTotal_text.replace(/[^\d\.]/g,'') ) + '000';
			let grand_total         = parseInt(currenciesAsNumbers);
			let grand_total_ship    = grand_total + fee;
			let format              = format_price(grand_total_ship);
			let string              =  '<h5>Tổng Cộng: ' + format + '</h5>';

			$('div.grand-totall h5').html(string);
			showNotify($('div.grand-totall h5'), 'Đã Cập nhật Lại Giá Tiền');
			localStorage.setItem(key,value)
			// $(this "select").val("val2");

			console.log('fee = ' + fee);
			console.log('old_grandTotal_text = ' + old_grandTotal_text);
			console.log('grand_total = ' + grand_total);
			console.log('grand_total_ship = ' + grand_total_ship);
			console.log('format = ' + format);
			// <h5>   $353.00</h5>

		}

	});
	$('ul#product-attribute').css("list-style-type", "none");


	// console.log(`index = ${index} - result = ${result}`);
	// allStorage();
});

