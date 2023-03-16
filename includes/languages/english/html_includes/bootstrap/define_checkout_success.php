<p><strong>Thank you for your order.</strong></p>
<!-- this code for delayed despatch -->
<?php
if (defined('MJFB_DELAYED_DESPATCH_DATE') && MJFB_DELAYED_DESPATCH_DATE<>""){

	if(strtotime(MJFB_DELAYED_DESPATCH_DATE) > strtotime("now")) {
		echo "<p class='delayedDespatch'>".MJFB_DELAYED_DESPATCH_MESSAGE."</p>";
	}
}
?>
<!-- End Delayed despatch -->
<p>We will process your order as soon as your payment has cleared. If you paid
by PayPal this should be within 3 working days. <br>
If you asked to collect your order from us we will then e-mail or telephone you
when your order is ready to collect.<br>
If we are despatching your order to you, we will then use the Royal Mail method
you have chosen.
<?php
if (defined('MJFB_DELAYED_DESPATCH_DATE') && MJFB_DELAYED_DESPATCH_DATE == '' || strtotime(MJFB_DELAYED_DESPATCH_DATE) < strtotime('now')) {
	echo 'Assuming your payment has cleared your order will be despatched on or before ' . mjfb_expected_despatch_date($mjfb_products_date) . '. ';
}
?>
If despatch from us is delayed for any reason we will contact
you and let you know, otherwise your order should reach you within a maximum of
7 days in the UK. Overseas Orders are dependent on the delivery method selected. If you order has not reached you within that time, please refer to the
FAQ page, which will tell you what to do next.</p>
