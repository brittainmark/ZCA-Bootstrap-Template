<?php 
/*
 * BOOTSTRAP 3.3.0
 *
 * Create a file called "site_specific_styles.php" to contain any changes
 * to base css provided by this template. Place site-specific content
 * between the opening and closing style tags.
 *
 * Refer to https://github.com/lat9/ZCA-Bootstrap-Template/blob/v300/pages/faqs.md for
 * additional information.
 */
?>
<style>
    body {
        font-family: 'Comic Sans MS', 'Comic Sans', Verdana, Arial, sans-serif;
    }
    /* Allow images to reduce in size to fit in product box */
    .img-fluid.listingProductImage {
        min-width: unset;
    }
    /* Pad image on aboutus page*/
    .mega-about img {
        padding-right: 1rem;
    }
    /* Customer services dropdown */
    #CustomerServicesDropdown {
        width: 600px;
        padding: 20px;
        background: #007f7f;
    }
    /* footer bottom menu */
    #footerBottomMenu a:hover {
        font-weight: bold;
        border-radius: 8px;
    }
    /* taglne */
    #tagline {
        font-size:2.5rem;
    }
    /* dropdown on hover */
    .dropdown:hover>.dropdown-menu, .dropdown-submenu:hover>.dropdown-menu {
        display: block;
    }
    /* multi level dropdown */
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu>.dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: 0px;
        margin-left: 0px;
    }
    /* color changes */
    #footerBottomMenu a {
        color: <?php echo ZCA_FOOTER_WRAPPER_TEXT_COLOR; ?>;
    }
    #footerBottomMenu a:hover {
        color: <?php echo ZCA_SIDEBOX_LINK_COLOR_HOVER; ?>;
        background: <?php echo ZCA_SIDEBOX_LINK_BACKGROUND_COLOR_HOVER; ?>;
    }
    h1, h2, h3, h4, h5, h6 {
        color:#1f4f7d;
    }
    .list-quantity {
        color: <?php echo ZCA_BUTTON_LINK_COLOR_HOVER; ?>;
        padding: 0.5rem 0;
    }
    /* Delivery dropdown */
    .dropdown_customer_service {
      background-color: <?php echo ZCA_BODY_BACKGROUND_COLOR; ?>;
      margin: 1rem;
      border-radius: 1rem;
    }
    .dropdown_customer_service h2 {
      color: <?php echo ZCA_HEADER_TABS_TEXT_COLOR; ?>;
      background-color: <?php echo ZCA_HEADER_TABS_COLOR; ?>;
      padding-top: .5rem;
    }
    .dropdown_customer_service p {
        padding: 0 .5rem;
    }
    /* shorten me */
    #indexProductList-content {
        height: 4.5rem;
        overflow: hidden;
    }
    #indexProductList-contentMore a {
        line-height: 1;
    }
    /* extend top margin */
    .pt-6 {
        padding-top:3.5rem;
    }
    /*delayed despatch*/
    .delayedDespatch {
        margin-top: 1rem;
    }
    /*sold out hover*/
    button.button_sold_out_sm, button.button_sold_out {
	border: none;
}
</style>
