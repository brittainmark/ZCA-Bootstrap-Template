<?php
/**
 * Module Template
 * 
 * BOOTSTRAP v1.0.BETA
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_listing_display_order.php 3369 2006-04-03 23:09:13Z drbyte $
 */
// MJFb whole file
?>
<?php
// NOTE: to remove a sort order option add an HTML comment around the option to be removed
?>

<div id="listingDisplayOrderSorter" class="mb-3">
    <label for="disp-order-sorter"><?php echo TEXT_INFO_SORT_BY; ?></label>
<?php
$parameters = '';
if (empty($cPath) === false) {
    $parameters = "cPath=" . $cPath;
}
echo zen_draw_form('sorter_form', zen_href_link($_GET['main_page'], $parameters), 'get');
echo zen_draw_hidden_field('main_page', $_GET['main_page']);
if (empty($cPath) === false) {
    echo zen_draw_hidden_field('cPath', $cPath);
}
//  echo zen_draw_hidden_field('disp_order', $_GET['disp_order']);
echo zen_hide_session_id();
?>
        <select name="sort" onchange="this.form.submit();" id="disp-order-sorter" class="custom-select">
<?php
if (!isset($_GET['sort']) && PRODUCT_LISTING_DEFAULT_SORT_ORDER != '') {
    $_GET['sort'] = PRODUCT_LISTING_DEFAULT_SORT_ORDER;
} 
$sort = $_GET['sort'];
if ($sort != PRODUCT_LISTING_DEFAULT_SORT_ORDER && PRODUCT_LISTING_DEFAULT_SORT_ORDER != '') {
?>
            <option value="<?php echo PRODUCT_LISTING_DEFAULT_SORT_ORDER; ?>" ><?php echo PULL_DOWN_ALL_RESET; ?></option>
<?php 
} // reset to store default  
$value = array_search('PRODUCT_LIST_NAME',$column_list) + 1;
?>
            <option value="<?php echo $value . 'a' ?>" <?php echo ($sort == $value . 'a' ? 'selected="selected"' : ''); ?>><?php echo TEXT_INFO_SORT_BY_PRODUCTS_NAME; ?></option>
            <option value="<?php echo $value . 'd' ?>" <?php echo ($sort == $value . 'd' ? 'selected="selected"' : ''); ?>><?php echo TEXT_INFO_SORT_BY_PRODUCTS_NAME_DESC; ?></option>
<?php
$value = array_search('PRODUCT_LIST_PRICE',$column_list) + 1;
?>
            <option value="<?php echo $value . 'a' ?>" <?php echo ($sort == $value . 'a' ? 'selected="selected"' : ''); ?>><?php echo TEXT_INFO_SORT_BY_PRODUCTS_PRICE; ?></option>
            <option value="<?php echo $value . 'd' ?>" <?php echo ($sort == $value . 'd' ? 'selected="selected"' : ''); ?>><?php echo TEXT_INFO_SORT_BY_PRODUCTS_PRICE_DESC; ?></option>
 <?php
 $value = array_search('PRODUCT_LIST_MODEL',$column_list) + 1;
 ?>
            <option value="<?php echo $value . 'a' ?>" <?php echo ($sort == $value . 'a' ? 'selected="selected"' : ''); ?>><?php echo TEXT_INFO_SORT_BY_PRODUCTS_MODEL; ?></option>
            <option value="<?php echo $value . 'd' ?>" <?php echo ($sort == $value . 'd' ? 'selected="selected"' : ''); ?>><?php echo TEXT_INFO_SORT_BY_PRODUCTS_MODEL_DESC; ?></option>
<?php
$value = array_search('PRODUCT_LIST_QUANTITY',$column_list) + 1;
?>
            <option value="<?php echo $value . 'd' ?>" <?php echo ($sort == $value . 'd' ? 'selected="selected"' : ''); ?>><?php echo TEXT_INFO_SORT_BY_PRODUCTS_QUANTITY_DESC; ?></option>
            <option value="<?php echo $value . 'a' ?>" <?php echo ($sort == $value . 'a' ? 'selected="selected"' : ''); ?>><?php echo TEXT_INFO_SORT_BY_PRODUCTS_QUANTITY; ?></option>
        </select>
<?php
echo '</form>';
?>
</div>