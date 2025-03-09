<?php
/**
 * ZCA Bootstrap Colors
 *
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: init_bc_config.php
 *
 * BOOTSTRAP v3.6.2
 */

// -----
// Wait until an admin is logged in before installing or updating ...
//
if (!isset($_SESSION['admin_id'])) {
    return;
}

// -----
// The ZCA Bootstrap Colors version doesn't necessarily change on each base
// Bootstrap template update, only when one or more configuration settings
// is added, removed or updated.  Initially added for Bootstrap v3.5.2, note that
// its setting might not be the same as the base template's version!
//
define('ZCA_BOOTSTRAP_COLORS_CURRENT_VERSION', '3.6.2');

// -----
// If this is an upgrade (or an initial install), load the installation/upgrade script to (at a minimum)
// get the ZCA_BOOTSTRAP_COLORS_VERSION recorded.
//
if (!defined('ZCA_BOOTSTRAP_COLORS_VERSION') || ZCA_BOOTSTRAP_COLORS_VERSION !== ZCA_BOOTSTRAP_COLORS_CURRENT_VERSION) {
    require DIR_WS_INCLUDES . 'init_includes/init_bc_config_install_or_upgrade.php';
}
// MJFB----
// Add product restocked settings
//
$db->Execute(
    "INSERT IGNORE INTO " . TABLE_CONFIGURATION . "
        (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function, val_function) 
     VALUES
        ('Categories Box - Show Products Restocked Link', 'SHOW_CATEGORIES_BOX_PRODUCTS_RESTOCKED', 'true', 'Show Products Restocked Link in the Categories Box', 19, 13, '2019-04-21 15:58:23', '2019-04-21 15:58:23', NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),', NULL),
        ('Show Restocked Products on Main Page - Category with SubCategories', 'SHOW_PRODUCT_INFO_CATEGORY_PRODUCTS_RESTOCKED', '2', 'Show Restocked Products on Main Page - Category with SubCategories<br />0= off or set the sort order', 24, 70, NULL, '2009-04-15 19:19:20', NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\'), ', NULL),
        ('Show Restocked Products on Main Page', 'SHOW_PRODUCT_INFO_MAIN_PRODUCTS_RESTOCKED', '3', 'Show Restocked Products on Main Page<br />0= off or set the sort order', 24, 65, '2019-04-22 00:00:00', '2009-04-15 19:19:20', NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\'), ', NULL),
        ('Products Restocked Columns per Row', 'SHOW_PRODUCT_INFO_COLUMNS_PRODUCTS_RESTOCKED', '3', 'Featured Products Columns per Row', 24, 96, '2022-10-24 11:25:05', '2009-04-15 19:19:20', NULL, 'zen_cfg_select_option(array(\'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\'), ', NULL),
        ('Show Products Restocked on Main Page', 'SHOW_PRODUCT_INFO_MAIN_PRODUCTS_RESTOCKED', '1', 'Show Featured Products on Main Page<br />0= off or set the sort order', 24, 66, NULL, '2009-04-15 19:19:20', NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\'), ', NULL),
        ('Products Restocked Centerbox', 'MAX_DISPLAY_SEARCH_RESULTS_PRODUCTS_RESTOCKED', '9', 'Number of products to display in the Products Restocked centerbox', 3, 28, '2022-10-21 16:00:18', '2009-04-15 19:19:16', NULL, NULL, '{\"error\":\"TEXT_MAX_ADMIN_DISPLAY_SEARCH_RESULTS_FEATURED_LENGTH\",\"id\":\"FILTER_VALIDATE_INT\",\"options\":{\"options\":{\"min_range\":0}}}'),
        ('Show Products Restocked on Main Page - Errors and Missing Products Page', 'SHOW_PRODUCT_INFO_MISSING_PRODUCTS_RESTOCKED', '2', 'Show Products Restocked on Main Page - Errors and Missing Product<br />0= off or set the sort order', 24, 76, NULL, '2009-04-15 19:19:20', NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\'), ', NULL),
        ('Show Products Restocked - below Product Listing', 'SHOW_PRODUCT_INFO_LISTING_BELOW_PRODUCTS_RESTOCKED', '2', 'Show Products Restocked below Product Listing<br />0= off or set the sort order', 24, 86, NULL, '2009-04-15 19:19:20', NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\'), ', NULL)"
        );
// Add product index listing default
$db->Execute(
    "INSERT IGNORE INTO " . TABLE_CONFIGURATION . "
        (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) 
     VALUES 
        ('Display Product Display Bootstrap Default Sort Order', 'PRODUCT_INDEX_LIST_SORT_DEFAULT', '1', 'What Sort Order Default should be used for Index Products Display?<br />Default= 1 for Products Name<br /><br />1= Products Name<br />2= Products Name Desc<br />3= Price low to high, Products Name<br />4= Price high to low, Products Name<br />5= Model<br />6= Date Added desc<br />7= Date Added<br />8= Product Sort Order', 8, 17, 'zen_cfg_select_option(array(\'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\'), ', now())"
        );
