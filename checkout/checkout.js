"use strict";

var checkout;

document.addEventListener("DOMContentLoaded", function(event) {

	var o = {};
	var willTriggerFormSubmit = 0;

	function validateForm() {
		var nameInput = document.querySelector('#wetail_woocommerce_klarna_invoice_form > input[name=email]');
		var phoneInput = document.querySelector('#wetail_woocommerce_klarna_invoice_form > input[name=phonenumber]');
		if (nameInput.checkValidity() && phoneInput.checkValidity() && phoneInput.value.length > 6) {
			document.getElementById("wetail_form_part_show_after").removeAttribute('hidden');
			phoneInput.setAttribute('onfocus', 'checkout.phoneFocus()');
			willTriggerFormSubmit = 0;
		}

		if (document.getElementById("wetail_form_part_show_after").hasAttribute('hidden')) {
			willTriggerFormSubmit++;
			var flag = willTriggerFormSubmit;
			window.setTimeout(function submit() {
				if (flag == willTriggerFormSubmit) {
					console.log("Only once!!");
					var type = phoneInput.getAttribute('type');
					phoneInput.setAttribute('type', 'text');
					phoneInput.removeAttribute('onfocus');
					document.querySelector("#wetail_woocommerce_klarna_invoice_form input[type=submit][hidden]").click();
					phoneInput.setAttribute('type', type);
					
					willTriggerFormSubmit = 0;
				}
			}, 1000*2 );
			
		}
	}
	function testmode() {
		console.log('testmode');
		document.getElementById("wetail_form_part_show_after").removeAttribute('hidden');
		document.querySelector('#wetail_woocommerce_klarna_invoice_form > input[name=email]').value="mmm@mmm.mm";
		document.querySelector('#wetail_woocommerce_klarna_invoice_form > input[name=phonenumber]').value="1234567";
	}
	testmode();

	o.formChange = function() {
		validateForm();
	}

	o.phoneFocus = function() {
		document.querySelector('#wetail_woocommerce_klarna_invoice_form > input[name=phonenumber]').setAttribute('type', 'number');
	}
	o.phoneBlur = function() {
		document.querySelector('#wetail_woocommerce_klarna_invoice_form > input[name=phonenumber]').setAttribute('type', 'text');
	}
	o.personnummerFocus = function() {
		document.querySelector('#wetail_woocommerce_klarna_invoice_form input[name=personnummer]').setAttribute('type', 'number');
	}
	o.personnummerBlur = function() {
		document.querySelector('#wetail_woocommerce_klarna_invoice_form input[name=personnummer]').setAttribute('type', 'text');
	}
	//onfocus="checkout.personnummerFocus()" 
	//onblur="checkout.personnummerBlur()" 

	o.submit = function() {
		document.querySelector('#wetail_woocommerce_klarna_invoice_form > input[name=phonenumber]').removeAttribute('onfocus');
		document.querySelector('#wetail_woocommerce_klarna_invoice_form input[name=personnummer]').removeAttribute('onfocus');
		document.querySelector("#wetail_woocommerce_klarna_invoice_form input[type=submit][hidden]").click();
		document.querySelector('#wetail_woocommerce_klarna_invoice_form > input[name=phonenumber]').setAttribute('onfocus', 'checkout.phoneFocus()');
		document.querySelector('#wetail_woocommerce_klarna_invoice_form input[name=personnummer]').setAttribute('onfocus', 'checkout.personnummerFocus()');
	}

	checkout = o;
});