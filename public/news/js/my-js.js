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
			let selectValue = $(this).val();
			// console.log('selectValue = ' + selectValue);

			$('div.grand-totall h5').html(string);
			showNotify($('span#fee'), 'Đã Cập nhật Lại Giá Tiền');

			let   value = {
				'fee'             : fee,
				'grand_total'     : grand_total,
				'grand_total_ship': grand_total_ship,
				'selectValue'     : selectValue,
			};

			localStorage.setItem('cart', JSON.stringify(value));

			// Update Fee Cart
			let cart = localStorage.getItem('cart');
			if (cart) {
				let arrtest = JSON.parse(cart);
				$.each(arrtest, function( index, result ) {
					if (index == 'fee') {
						$('span#fee').html(format_price(result));
					}
		
					// console.log(`index = ${index} - result = ${result}`);
				})
			}
		
			// $(this "select").val("val2");
		}
	});

	// Checkout Ship
	let cart = localStorage.getItem('cart');
	if (cart) {
		let arrtest = JSON.parse(cart);
		$.each(arrtest, function( index, result ) {

			if (index == 'fee') {
				$('p#check-out-fee').html('Phí vận chuyển : ' + format_price(result));
				$('span#fee').html(format_price(result));
				$('td#check-out-fee').html('+ ' + format_price(result));
			}

			if (index == 'grand_total_ship') {
				$('td#grand_total_ship').html('= ' + format_price(result));
				let string =  '<h5>Tổng Cộng: ' + format_price(result) + '</h5>';
				$('div.grand-totall h5').html(string);
			}

			if (index == 'selectValue') {
				$('select.shipping_change').val(result);
			}

			console.log(`index = ${index} - result = ${result}`);
		})
	}

	// Coutinue Checkout Button
	let startIdButton = [3, 4, 5, 6];
	$.each(startIdButton, function( index, result ) {
		// console.log(`index = ${index} - result = ${result}`);

		$(`button#payment-${result}`).click(function () {
			if (result == 6) {
				
			}
			let div         = $(`div#payment-${result}`);
			let nextDiv     = $(`div#payment-${result + 1}`);
			let showClass   = div.attr('class');
			let hiddenClass = showClass.replace(' show', '');
			div.removeClass(showClass).addClass(hiddenClass);
			nextDiv.addClass(showClass);
		});

		$(`a#payment-${result}`).click(function (e) {
			e.preventDefault();
			let div         = $(`div#payment-${result}`);
			let prevDiv     = $(`div#payment-${result - 1}`);
			let showClass   = div.attr('class');
			let hiddenClass = showClass.replace(' show', '');
			div.removeClass(showClass).addClass(hiddenClass);
			prevDiv.addClass(showClass);
		});

	})

	// Show Creadit Card
	$("input#creadit_card").click(function(){
		$('div.toHide').show('slow');
		$('input#payment').val(2);
	});
	$("input#cash").click(function(){
		$('div.toHide').hide();
		$('input#payment').val(1);
	});

	// $.each(userInfo, function( index, result ) {
	// 	console.log(`index = ${index} - result = ${result}`);
	// })

	if (login) {
		console.log(userInfo);
		console.log(userInfo.id);
	}



	$('ul#product-attribute').css("list-style-type", "none");

	// allStorage();
});

