<?php
/* 
 * Observers for mjfb code
 */
class zcObserverMjfbObservers extends base {

    public function __construct() {
        $this->attach(
            $this,
            [
                'NOTIFY_ZEN_GET_BUY_NOW_BUTTON_RETURN',
                'NOTIFY_HEADER_SHOPPING_CART_IN_PRODUCTS_LOOP',
                'NOTIFY_PRODUCT_LISTING_PRODUCT_LIST_PRICE',
            ]
        );
    }

    /**
     * Parse the file details for display on template page
     *
     * @param string $eventID name of the observer event fired
     * @param array $array $download->fields data
     * @param array $data  passed by reference
     */
    protected function updateNotifyZenGetBuyNowButtonReturn(&$class, $eventID, $array, &$data) {
        if ($array['product_is_call'] == '1') {
            $data = '<button class="m-1" id="btnCallPrice">' . $data . '</button>';
        }
    }
    protected function updateNotifyHeaderShoppingCartInProductsLoop(&$class, $eventID, $i, &$productsArray) {
        if ($productsArray[$i]['showMinUnits'] === '') {
            return;
        }
        $productsArray[$i]['showMinUnits'] = $this->mjfb_zen_get_products_quantity_min_units_display($productsArray[$i]['id']);
    }
    
    protected function updateNotifyProductListingProductListPrice(&$class, $eventID, $pId, &$min_max_units) {
        if ($min_max_units === '') {
            return;
        }
        $min_max_units = $this->mjfb_zen_get_products_quantity_min_units_display($pId);
    }
    
    protected function mjfb_zen_get_products_quantity_min_units_display($product_id, $include_break = true, $message_is_for_shopping_cart = false) {
        $result = zen_get_product_details($product_id);

        if ($result->EOF) return '';

        $check_min = $result->fields['products_quantity_order_min'];
        $check_max = $result->fields['products_quantity_order_max'];
        $check_units = $result->fields['products_quantity_order_units'];
        $allows_mixed = $result->fields['products_quantity_mixed'];

        $the_min_units = '';

        if ($check_min != 1 or $check_units != 1) {
            if ($check_min != 1) {
                $the_min_units .= '<span class="qmin">' . PRODUCTS_QUANTITY_MIN_TEXT_LISTING . '&nbsp;' . $check_min . '</span>';
            }

            if ($check_units != 1) {
                $the_min_units .= '<span class="qunit">' . (zen_not_null($the_min_units) ? ' ' : '') . PRODUCTS_QUANTITY_UNIT_TEXT_LISTING . '&nbsp;' . $check_units . '</span>';
            }

            // don't check for mixed if no attributes
            $chk_mix = zen_has_product_attributes((int)$product_id) && $allows_mixed;
            if ($chk_mix === true) {
                $the_min_units .= '<span class="qmix">';
                if (($check_min > 0 || $check_units > 0)) {
                    if ($include_break) {
                        $the_min_units .= '<br>';
                    } else {
                        $the_min_units .= '&nbsp;&nbsp;';
                    }
                    $the_min_units .= ($message_is_for_shopping_cart == false ? TEXT_PRODUCTS_MIX_OFF : TEXT_PRODUCTS_MIX_OFF_SHOPPING_CART);

                } else {
                    if ($include_break) {
                        $the_min_units .= '<br>';
                    } else {
                        $the_min_units .= '&nbsp;&nbsp;';
                    }
                    $the_min_units .= ($message_is_for_shopping_cart == false ? TEXT_PRODUCTS_MIX_ON : TEXT_PRODUCTS_MIX_ON_SHOPPING_CART);
                }
                $the_min_units .= '</span>';
            }
        }
        if ($check_max > 0 and ($check_max != 1 or $check_units != 1)) {
            $the_min_units .= '<span class="qmax">';
            if ($include_break == true) {
                $the_min_units .= ($the_min_units != '' ? '<br>' : '');
            } else {
                $the_min_units .= ($the_min_units != '' ? '&nbsp;&nbsp;' : '');
            }
            $the_min_units .= PRODUCTS_QUANTITY_MAX_TEXT_LISTING . '&nbsp;' . $check_max;
            $the_min_units .= '</span>';
        }

        return $the_min_units;

    }
}
