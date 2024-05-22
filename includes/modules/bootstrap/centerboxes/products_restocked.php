<?php
/**
 * products_restocked module - prepares content for display
 *
 * @copyright Copyright 2003-2018 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Pan2020 2019 Mar 27 Modified in v1.5.6b $
 *
 * BOOTSTRAP v3.4.0
 */
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

// initialize vars
$categories_products_id_list = [];
$list_of_products = '';
$restocked_products_query = '';
$display_limit = mjfb_get_restocked_date_range();

if ((($manufacturers_id > 0 && empty($_GET['filter_id'])) || !empty($_GET['music_genre_id']) || !empty($_GET['record_company_id'])) || empty($new_products_category_id)) {
    $restocked_products_query =
        "SELECT p.products_id, p.products_image, pd.products_name, p.master_categories_id
           FROM " . TABLE_PRODUCTS . " p
                LEFT JOIN " . TABLE_PRODUCTS_DESCRIPTION . " pd
                    ON p.products_id = pd.products_id
                   AND pd.language_id = " . (int)$_SESSION['languages_id'] . "
          WHERE p.products_status = 1
            AND p.products_quantity > 0 " . $display_limit;
} else {
    // get all products and cPaths in this subcat tree
    $productsInCategory = zen_get_categories_products_list((($manufacturers_id > 0 && !empty($_GET['filter_id'])) ? zen_get_generated_category_path_rev($_GET['filter_id']) : $cPath), false, true, 0, $display_limit);

    if (is_array($productsInCategory) && count($productsInCategory) > 0) {
        // build products-list string to insert into SQL query
        $list_of_products = implode(',', array_keys($productsInCategory));
        $restocked_products_query =
            "SELECT p.products_id, p.products_image, pd.products_name, p.master_categories_id
               FROM " . TABLE_PRODUCTS . " p
                    LEFT JOIN " . TABLE_PRODUCTS_DESCRIPTION . " pd
                        ON p.products_id = pd.products_id
                       AND pd.language_id = " . (int)$_SESSION['languages_id'] . "
              WHERE p.products_status = 1
                AND p.products_id IN (" . $list_of_products . ")
                AND  p.products_quantity > 0 "  . $display_limit;
    }
}

$num_products_count = 0;
if ($restocked_products_query !== '') {
    $restocked_products = $db->ExecuteRandomMulti($restocked_products_query, MAX_DISPLAY_SEARCH_RESULTS_PRODUCTS_RESTOCKED);
    $num_products_count = $restocked_products->RecordCount();
}

$row = 0;
$col = 0;
$list_box_contents = [];
$title = '';

// show only when 1 or more
if ($num_products_count > 0) {
    while (!$restocked_products->EOF) {
        $restocked_products_id = $restocked_products->fields['products_id'];
        $products_price = zen_get_products_display_price($restocked_products_id);
        if (!isset($productsInCategory[$restocked_products_id])) {
            $productsInCategory[$restocked_products_id] = zen_get_generated_category_path_rev($restocked_products->fields['master_categories_id']);
        }

        $zco_notifier->notify('NOTIFY_MODULES_RESTOCKED_PRODUCTS_B4_LIST_BOX', [], $restocked_products->fields, $products_price);

        $restocked_products_name = $restocked_products->fields['products_name'];
        $restocked_products_link = zen_href_link(zen_get_info_page($restocked_products_id), 'cPath=' . $productsInCategory[$restocked_products_id] . '&products_id=' . $restocked_products_id);

        $restocked_products_image = '';
        if (!($restocked_products->fields['products_image'] === '' && PRODUCTS_IMAGE_NO_IMAGE_STATUS === '0')) {
            $restocked_products_image = '<a href="' . $restocked_products_link . '">' . zen_image(DIR_WS_IMAGES . $restocked_products->fields['products_image'], $restocked_products_name, SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a><br>';
        }
        $list_box_contents[$row][$col] = [
            'params' => ' class="centerBoxContentsRestocked centerBoxContents card mb-3 p-3 text-center"',
            'text' => $restocked_products_image . '<a href="' . $restocked_products_link . '">' . $restocked_products_name . '</a><br>' . $products_price
        ];

        $col++;
        if ($col >= SHOW_PRODUCT_INFO_COLUMNS_PRODUCTS_RESTOCKED) {
            $col = 0;
            $row++;
        }
        $restocked_products->MoveNextRandom();
    }

    if (!empty($new_products_category_id)) {
        $category_title = zen_get_category_name((int)$new_products_category_id, $_SESSION['languages_id']);
        $title = '<h4 id="restockedCenterbox-card-header" class="centerBoxHeading card-header">' . TABLE_HEADING_PRODUCTS_RESTOCKED . ($category_title != '' ? ' - ' . $category_title : '') . '</h4>';
    } else {
        $title = '<h4 id="restockedCenterbox-card-header" class="centerBoxHeading card-header">' . TABLE_HEADING_PRODUCTS_RESTOCKED . '</h4>';
    }
    $zc_show_restocked_product = true;
}
