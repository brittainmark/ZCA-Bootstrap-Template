<div id="cartInstructionsDisplay" class="content">When the
	minimum/maximum purchase requirements have been met and you are ready
	to proceed with your purchase, click the Checkout button below.
	Shipping costs etc. will be presented on subsequent pages, before
	payment is finalised..</div>
<h3 class="cvs"> IMPORTANT: Non-UK Customers. (11 Jan 2023)</h3>
   <p>Royal Mail has temporarily suspended overseas shipping. If your order is urgent, please e-mail us with your postal address and details of the items you want (giving the item code number and quantity required). We will then look at other methods of shipping and get back to you with alternative shipping costs and payment methods. Any changes to this situation will be notified here. We are sorry for any inconvenience caused!</p>

<!-- mjfb this code for delayed despatch -->
<?php
if (defined('MJFB_DELAYED_DESPATCH_DATE') && MJFB_DELAYED_DESPATCH_DATE != "" && strtotime(MJFB_DELAYED_DESPATCH_DATE) > strtotime('now')) {
    echo '<p class="delayedDespatch">' . MJFB_DELAYED_DESPATCH_MESSAGE . '</p>';
} else {
    echo '<p class="despatchDate">Our next despatch date is ' . mjfb_expected_despatch_date();
    if (defined('MJFB_CHRISTMAS_DESPATCH') && MJFB_CHRISTMAS_DESPATCH == 'TRUE') {
        echo '<br> <span class="christmasDespatch">' . MJFB_CHRISTMAS_DESPATCH_MESSAGE . '</span>';
    }
    echo '.</p> ';
}
?>
<!-- End Delayed despatch -->
<!-- mjfb This code for Item date available -->
<?php
/*
 * Mjfb begin
 */
$mjfb_date_available = mjfb_get_date_available();
if ($mjfb_date_available != NULL) {
    echo '<p id="productDateAvailable" class="docProduct centeredContent">' . sprintf(TEXT_DATE_AVAILABLE, zen_date_long($mjfb_date_available)) . '</p>';
    echo '<br class="clearBoth">';
}
/*
 * Mjfb end
 */

?>
<!-- End Item date available -->