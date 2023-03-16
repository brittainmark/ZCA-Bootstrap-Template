<?php
/**
 *  Template - tpl_footer.php
 *
 * My footer menu
 * @copyright Copyright 2003-2020 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: brittainmark 2022 Oct 22 Modified in v1.5.8 $
 */
// MJFB whole file
?>
<!-- BOF My Footer Menu -->
<div id="footerBottomMenu" class="container-flex d-flex rounded">
    <div class="row col-sm-12">
        <div id="footerMenuOne" class="col-sm-6 pull-sm-left" >
            <h4 class="leftBoxHeading rounded">Shop</h4>
            <ul class="navbar-nav">

                <li> <?php echo '<a class="nav-link" href="' . HTTP_SERVER . DIR_WS_CATALOG . '">'; ?><?php echo '<i class="fas fa-home"></i> ' . HEADER_TITLE_CATALOG; ?></a></li>
                <li><?php echo '<a class="nav-link" href="' . zen_href_link(FILENAME_SPECIALS) . '">' . CATEGORIES_BOX_HEADING_SPECIALS . '</a>'; ?></li>
                <li><?php echo '<a class="nav-link" href="' . zen_href_link(FILENAME_PRODUCTS_NEW) . '">' . CATEGORIES_BOX_HEADING_WHATS_NEW . '</a>'; ?><li>
                <li><?php echo '<a class="nav-link" href="' . zen_href_link(FILENAME_PRODUCTS_RESTOCKED) . '">' . CATEGORIES_BOX_HEADING_PRODUCTS_RESTOCKED . '</a>'; ?></li>
                <li><?php echo '<a class="nav-link" href="' . zen_href_link(FILENAME_PRODUCTS_ALL) . '">' . CATEGORIES_BOX_HEADING_PRODUCTS_ALL . '</a>'; ?></li>
            </ul>
        </div>
        <div id="FooterMenueTwo" class="col-sm-6 pull-sm-right">
            <h4 class="leftBoxHeading rounded">Customer Service</h4>
            <ul class="navbar-nav">
        <?php
        if (DEFINE_SHIPPINGINFO_STATUS <= 1) {
            echo '<li><a class="nav-link" href="' . zen_href_link(FILENAME_SHIPPING, '', 'SSL') . '">' . BOX_INFORMATION_SHIPPING . '</a><li>';
        }
        if (DEFINE_CONTACT_US_STATUS <= 1) {
            echo '<li><a class="nav-link" href="' . zen_href_link(FILENAME_CONTACT_US, '', 'SSL') . '">' . BOX_INFORMATION_CONTACT . '</a><li>';
        }
        if (DEFINE_ABOUT_US_STATUS === 1 || DEFINE_ABOUT_US_STATUS === 3){
            echo '<li><a class="nav-link" href="' . zen_href_link(FILENAME_ABOUT_US, '', 'SSL') . '">' . BOX_INFORMATION_ABOUT_US . '</a></li>';
        }
        if (zen_is_logged_in() && !zen_in_guest_checkout()) { 
                 echo '<li><a class="nav-link" href="' . zen_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">' .HEADER_TITLE_MY_ACCOUNT . '</a></li>';
        }
        if (defined('FILENAME_FAQ')) {
            echo '<li> <a class="nav-link " href="' . zen_href_link(FILENAME_FAQ, '', 'SSL') . '">' . BOX_INFORMATION_FAQ . '</a> </li>';
        }
        ?>        
            </ul>
        </div><br class="clearBoth">
    </div>
</div>
<!--EOF  My Footer Menu  -->
