<?php
if (!isset($_SESSION['layoutType'])) {
	$_SESSION['layoutType'] = 'legacy';
}
?>
<div id="home-text">
<p style="margin-top: 0;">&quot;Inner Light Crystals&quot; is part of the &quot;Inner Light&quot; partnership, and is to be found in Llechryd, Ceredigion on the west coast of Wales, UK. We have many varieties and formations of crystals for sale,
and currently sell crystals, minerals and Sterling Silver crystal jewellery to
healers and collectors - and in fact to anyone who loves and wants to buy crystals simply to have them in their life!
<br>We hope that YOUR crystal journey is as exciting and fulfilling as ours has been, and continues to be!</p>
<!-- <h3>Privacy Policy</h3>
<p><strong>As of 12 May 2020 we have updated our privacy policy to include Square payment processing. The policy can be found <a href="<?php echo zen_href_link(FILENAME_PRIVACY); ?>">here.</a></strong>
 -->
 <?php if (date('Y-m-d') < '2022-11-30') {?>
 <h2 class="pt-6">Autumn Sale</h2>
 <p>We are having an autumn sale from 1<sup>st</sup> October 2022 until 30<sup>th</sup> November 2022, with 40% off books and 15% off everything else, before postage and packing.</p>
 <?php }?>
<h2 class="pt-6">Deliveries and despatches:</h2>
<h3> IMPORTANT: Non-UK Customers. (15 Mar 2023)</h3>
   <p>Royal Mail has now reinstated all overseas shipping. However, some delays may be experienced whilst any backlog is cleared. So please allow a little longer than usual for delivery.</p>
<h3>Despatches:</h3>
<!-- this code for delayed despatch -->
<?php
if (defined('MJFB_DELAYED_DESPATCH_DATE') && MJFB_DELAYED_DESPATCH_DATE<>"" && strtotime(MJFB_DELAYED_DESPATCH_DATE) > strtotime("now")) {
		echo '<p class="delayedDespatch">'.MJFB_DELAYED_DESPATCH_MESSAGE.'</p>';
	} else {
		echo '<p class="despatchDate">Our next despatch date is ' . mjfb_expected_despatch_date() . '.</p> ';

    }
    if (defined('MJFB_CHRISTMAS_DESPATCH') && MJFB_CHRISTMAS_DESPATCH == 'TRUE') {
        echo '<p class="christmasDespatch">'.MJFB_CHRISTMAS_DESPATCH_MESSAGE.'</p>';
    }
?>
<!-- End Delayed despatch -->
<p>We normally despatch orders once a week on a Thursday for all orders received and paid for by 9pm on the Wednesday before.
</p>
<h3>Deliveries:</h3>
<p>Please bear in mind that deliveries can be affected by local staffing issues, and (in the case
of destinations outside the UK) by the availability of sufficient freight carrying capacity on aircraft. Although every
effort is made to deliver items within the timescales given per your chosen shipping method, at present these cannot be
absolutely guaranteed and so your order may arrive a little later than expected.</p>
<p> </p>

<!--
<p>As the firebreak lockdown in Wales is now over we are once again able to despatch orders. Please note that the 'open' status of our shop will remain under review, and depends upon our ability as a household to remain virus free -
and upon any directives from the Welsh and UK Governments.</p>
<p>Orders are posted once-weekly on THURSDAYS to avoid unnecessary
trips to the Post Office in town. This will apply to all orders that have been received and paid for by midnight
on the day before (Wednesdays). <br>
</p> -->
<h2 id="euroLimit" class="pt-6">Minimum / Maximum order amounts:</h2>
<table id="minmax" class="table">
    <thead>
        <tr>
            <th>Delivery<br>Address</th>
            <th>Mimimum<br>Order</th>
            <th>Maximum<br>Order</th>
        </tr>
    </thead>
    <tbody>
        <tr><td>UK</td><td>&pound;15</td><td>&pound;500</td></tr>
        <tr><td>EU</td><td>&pound;150</td><td>&pound;270</td></tr>
        <tr><td>Rest of world</td><td>&pound;15</td><td>&pound;270</td></tr>
    </tbody>
</table>
<p> </p>
<h2 class="pt-6">Taxes / Import duties:</h2>
<h3>ALL overseas customers please note:</h3>
<ul>
	<li>We are legally bound to declare the value of all goods exported
		outside the UK on Customs Declaration Forms: this is the amount you pay
		for the goods, as shown on your invoice and in accordance with the
		selling price(s) shown in our shop.</li>
	<li>You (the customer) are responsible for the payment of any and all
		import duties / taxes that are currently in effect in the country /
		location of your despatch address. We therefore strongly suggest that
		you check the limits and rates that will be applied in that country
		before placing an order with us: these rates and limits vary widely
		from country to country, and we are not responsible for checking them
		before processing and despatching your order.</li>
	<li>If you do not pay the duties requested by your country of receipt
		and the parcel is returned to us for this reason, you will be
		responsible for both the outward AND inward bound delivery costs:
		these will be deducted from the invoiced sum, and you will be refunded
		the difference (assuming the item(s) are returned to us in the same
		condition in which they were despatched). If the items are not returned 
		to us, NO refund will be issued.</li>
</ul>
</div>


<!--
<P class="alert"><strong><a <?php echo 'href="'. HTTP_SERVER . DIR_WS_CATALOG . 'index.php?main_page=index&amp;cPath=38_1022_1054"'; ?> style="text-decoration: underline"
		onMouseOver="this.style.textDecoration='underline overline'"
		onMouseOut="this.style.textDecoration='underline'">AQUAMARINE
			SALE:</a> </strong> To celebrate our wet summer (!) all our
	<a
		<?php echo 'href="'. HTTP_SERVER . DIR_WS_CATALOG . 'index.php?main_page=index&amp;cPath=38_1022_1054"'; ?> style="text-decoration: underline"
		onMouseOver="this.style.textDecoration='underline overline'"
		onMouseOut="this.style.textDecoration='underline'">aquamarine crystals</a> of &pound;5 upwards are now 20% cheaper until the end of
	November.
</p>
-->
