<?php
/**
 * Module Template - categories_tabs
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * Template stub used to display categories-tabs output
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_categories_tabs.php 3395 2006-04-08 21:13:00Z ajeh $
 */
// MJFB complete rewrite
if (CATEGORIES_TABS_STATUS == '1' ) {
    include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_CATEGORIES_TABS));
?>
<div id="categoriesTabs" class="d-lg-block">
<nav class="navbar navbar-expand-lg h2-nav" id="navCatTabs">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header2" aria-controls="header2" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse hover-dropdown" id="header2">
            <ul class="navbar-nav mr-auto">
                <li class="dropdown nav-link">
                    <a class="nav-item dropdown-toggle" id="categoryDropdown" href ="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo BOX_HEADING_CATEGORIES;?></a>
<?php
    echo $menulist;
 ?>
                </li>
<?php 
    if (DEFINE_SHIPPINGINFO_STATUS <= 1) { 
?>
                <!-- bof customer service -->
                <li class="dropdown  nav-link">
                    <a href="<?php zen_href_link(FILENAME_SHIPPING, '', 'SSL');?>" class="drop">Delivery &amp; Payment</a>
                    <ul class="m-0 p-0 dropdown-menu" aria-labelledby="CustomerServicesDropdown" id="CustomerServicesDropdown">
                        <li>
                            <div class="dropdown_customer_service">
                                <div id="header-shipping">
                                    <h2><?php echo TITLE_SHIPPING; ?></h2>
                                    <p><?php echo TEXT_SHIPPING_INFO; ?></p>
                                </div>
                                <div id="header-confidence">
                                    <h2><?php echo TITLE_CONFIDENCE; ?></h2>
                                    <p class="mega-confidence"><?php echo TEXT_CONFIDENCE; ?></p>
                                    <div id="header-icons">
                                        <?php echo PAYMENT_ICON; ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- eof customer service -->
<?php
    }
// -----
// Check to see that the information sidebox is to be displayed.  If so, bring in the $information
// array from the 'standard' sidebox, with modifications to its class for the offcanvas menu's display.
//
    $information_sidebox = $db->Execute(
        "SELECT *
           FROM " . TABLE_LAYOUT_BOXES . "
          WHERE layout_template = '$template_dir'
            AND layout_box_name = 'information.php'
            AND layout_box_status = 1
          LIMIT 1"
    );
    if (!$information_sidebox->EOF) {
        $information_box = DIR_WS_MODULES . zen_get_module_sidebox_directory('information.php'); 
        if (file_exists($information_box)) {
            $information_sidebox_class = 'dropdown-item';
            require $information_box;
            unset($information_sidebox_class);

            if (count($information) > 0) {
?>                
                <!-- bof information -->
                <li class="nav-link dropdown">
                    <a class="nav-item dropdown-toggle" href="#" id="infoDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo BOX_HEADING_INFORMATION; ?>
                    </a>
                    <div class="dropdown-menu m-0 p-0" aria-labelledby="infoDropdown">
                        <ul class="m-0 p-0">
<?php
                foreach ($information as $next_link) {
?>
                            <li><?php echo $next_link; ?></li>
<?php
                }
?>
                        </ul>
                    </div>
                </li> 
                <!-- eof information -->
<?php
            }
        }
    }
?>
                <!-- bof contact us -->
                 <li class="nav-link">
                    <a href="<?php echo zen_href_link(FILENAME_CONTACT_US, '', 'SSL');?>" class="drop">Contact Us</a>
                    <!-- eof contact us -->
                </li>
            </ul>
        </div>
    </div>
</nav>
</div>
<?php 
} 
