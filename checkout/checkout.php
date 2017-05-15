<?php

function wetail_woocommerce_invoice_checkout( $atts ) {
	?>
		<form id="wetail_woocommerce_klarna_invoice_form" method="post" class="" action="<?php echo get_site_url(); ?>/?page_id=6">
			<!--<input hidden name="wetail_woocommerce_klarna_invoice_post" value="wetail_woocommerce_klarna_invoice_post" />-->
			<input type="email" name="email" oninput="checkout.formChange()" required />
			<input
				type="text" 
				name="phonenumber" 
				pattern="......." 
				oninput="checkout.formChange()" 
				
				onblur="checkout.phoneBlur()" 
				required title="<?php echo __("Det måste finnas minst 7 siffror.", WETAIL_KLARNA_INVOICE); ?>" 
			/>
			<div id="wetail_form_part_show_after" hidden>
				<input
					type="text" 
					pattern="[0-9]{10}" 
					name="personnummer" 
					required="" 
					onfocus="checkout.personnummerFocus()" 
					onblur="checkout.personnummerBlur()" 
				/>
				<?php
					echo wc_price(WC()->cart->total);
				?>
				<button onclick="checkout.submit()" value="Beställ"/><?php echo __('Beställ', WETAIL_KLARNA_INVOICE); ?></button>
			</div>
			<input type="submit" hidden>
		</form>
	<?php
	wp_enqueue_script('invoice_checkout', plugins_url() . '/klarna-invoice/checkout/checkout.js', array(), '1.0', true);
}
add_shortcode( 'woocommerce_invoice_checkout', 'wetail_woocommerce_invoice_checkout' );

/*
//onmouseenter="checkout.submitFocus()" onmouseleave="checkout.submitBlur()"
//<input type="submit" onmouseenter="checkout.submitFocus()" onmouseleave="checkout.submitBlur()" value="Beställ"/>


onfocus="checkout.phoneFocus()"


*/