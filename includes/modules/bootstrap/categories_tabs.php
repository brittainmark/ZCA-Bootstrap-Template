<?php

/**
 * categories_tabs.php module
 *
 * @package   templateSystem
 * @copyright Copyright 2003-2018 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license   http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version   $Id: Scott C Wilson Sat Aug 25 07:25:23 2018 -0400 Modified in v1.5.6 $
 */
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}
// MJFB complete rewrite
require_once (DIR_WS_CLASSES . 'BootstrapCategoryMenuBuilder.php');
$parent_id = TOPMOST_CATEGORY_PARENT_ID;
$zen_CategoriesUL = new BootstrapCategoryMenuBuilder;

$menulist = $zen_CategoriesUL->buildBootstrapMenu($parent_id, 0, true);
/*
 * remove closing ul and add specials and new arrivals
 */
rtrim($menulist);
if (substr($menulist,-5) === '</ul>') {
    $menulist = substr($menulist, 0, -5);
}
if (SHOW_CATEGORIES_BOX_PRODUCTS_NEW == 'true') {
    // display limits
    //      $display_limit = zen_get_products_new_timelimit();
    $display_limit = zen_get_new_date_range();

    $show_this = $db->Execute("select p.products_id
 from " . TABLE_PRODUCTS . " p
 where p.products_status = 1 " . $display_limit . " limit 1");
    if ($show_this->RecordCount() > 0) {
        $menulist .= "\n" . '<li class="navbar-nav"><a class="dropdown-item" href="' . zen_href_link(FILENAME_PRODUCTS_NEW) . '">' . CATEGORIES_BOX_HEADING_WHATS_NEW . '</a></li>';
    }
}
if (SHOW_CATEGORIES_BOX_SPECIALS == 'true') {
    if (SHOW_CATEGORIES_BOX_SPECIALS == 'true') {
        $show_this = $db->Execute("select s.products_id from " . TABLE_SPECIALS . " s where s.status= 1 limit 1");
        if ($show_this->RecordCount() > 0) {
            $menulist .= "\n" . '<li class="navbar-nav"><a class="dropdown-item" href="' . zen_href_link(FILENAME_SPECIALS) . '">' . CATEGORIES_BOX_HEADING_SPECIALS . '</a></li>';
        }
    }
}
$menulist .= "</ul>\n";
