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
                'NOTIFY_HEADER_START_CHECKOUT_SHIPPING',
                'NOTIFY_HEADER_START_CHECKOUT_CONFIRMATION',
                'NOTIFY_HEADER_START_DOCUMENT_GENERAL_INFO',
                'NOTIFY_HEADER_START_DOCUMENT_PRODUCT_INFO',
                'NOTIFY_HEADER_START_PRODUCT_FREE_SHIPPING_INFO',
                'NOTIFY_HEADER_START_PRODUCT_INFO',
                'NOTIFY_HEADER_START_PRODUCT_MUSIC_INFO',
                'NOTIFY_INFORMATION_SIDEBOX_ADDITIONS',
                'NOTIFY_ORDER_INVOICE_CONTENT_READY_TO_SEND',
                'NOTIFY_PRODUCT_LISTING_QUERY_STRING',
                'NOTIFY_SEARCH_REAL_ORDERBY_STRING',
                'NOTIFY_SEARCH_WHERE_STRING',
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

    protected function updateNotifyHeaderStartDocumentGeneralInfo(&$class, $eventID) {
        //redirect if wrong type handeler
        $this->redirectIncorrectTypeHandler();
    }

    protected function updateNotifyHeaderStartDocumentProductInfo(&$class, $eventID) {
        //redirect if wrong type handeler
        $this->redirectIncorrectTypeHandler();
    }

    protected function updateNotifyHeaderStartProductInfo(&$class, $eventID) {
        //redirect if wrong type handeler
        $this->redirectIncorrectTypeHandler();
    }

    protected function updateNotifyHeaderStartProductMusicInfo(&$class, $eventID) {
        //redirect if wrong type handeler
        $this->redirectIncorrectTypeHandler();
    }

    protected function updateNotifyHeaderStartProductFreeShippingInfo(&$class, $eventID) {
        //redirect if wrong type handeler
        $this->redirectIncorrectTypeHandler();
    }

    protected function updateNotifyInformationSideboxAdditions(&$class, $eventID, $not_used, &$information)
    {
        //add faq to information side box
        global $information_classes;
        $information[] = '<a class="' . $information_classes . '" href="' . zen_href_link(FILENAME_FAQ) . '">' . BOX_INFORMATION_FAQ . '</a>';
    }

    protected function updateNotifyProductListingQueryString(&$class, $eventID, $default, $listing_sql, $where_str, &$order_by)
    {
        // sort sold products to end and master category product to front.
        $cPath = $_GET['cPath'] ?? TOPMOST_CATEGORY_PARENT_ID;
        $cPath_array = zen_parse_category_path($cPath);
        $current_category_id = $cPath_array[(count($cPath_array) - 1)];

        $order = (int)($_GET['disp_order'] ?? 8);
        switch ($order) {
            case 1:
                $order_by = " ORDER BY IF (p.products_quantity = 0, 1, 0) ASC, IF (p.master_categories_id = $current_category_id,  0, 1) ASC, pd.products_name";
                break;
            case 2:
                $order_by = " ORDER BY IF (p.products_quantity = 0, 1, 0) ASC, IF (p.master_categories_id = $current_category_id,  0, 1) ASC, pd.products_name DESC";
                break;
            case 3:
                $order_by = ' ORDER BY IF (p.products_quantity = 0, 1, 0) ASC, p.products_price_sorter, pd.products_name';
                break;
            case 4:
                $order_by = ' ORDER BY IF (p.products_quantity = 0, 1, 0) ASC, p.products_price_sorter DESC, pd.products_name';
                break;
            case 5:
                $order_by = " ORDER BY IF (p.products_quantity = 0, 1, 0) ASC, IF (p.master_categories_id = $current_category_id,  0, 1) ASC, p.products_model";
                break;
            case 6:
                $order_by = " ORDER BY p.products_date_added DESC, IF (p.products_quantity = 0, 1, 0) ASC, IF (p.master_categories_id = $current_category_id,  0, 1) ASC, pd.products_name";
                break;
            case 7:
                $order_by = " ORDER BY p.products_date_added, IF (p.products_quantity = 0, 1, 0) ASC, IF (p.master_categories_id = $current_category_id, 0, 1) ASC, pd.products_name";
                break;
            case 8:
            case 0:
                if (empty($order_by)) {
                    $order_by = " ORDER BY IF (p.products_quantity = 0, 1, 0) ASC, p.products_sort_order, IF (p.master_categories_id = $current_category_id,  0, 1) ASC, pd.products_name ";
                } else if (str_contains($order_by, 'IF (p.products_quantity') === false) {
                    $order_by = ' ORDER BY IF (p.products_quantity = 0, 1, 0) ASC,' . substr($order_by, 9);
                }
                break;
            default:
                $order_by = " ORDER BY IF (p.products_quantity = 0, 1, 0) ASC, p.products_sort_order, IF (p.master_categories_id = $current_category_id,  0, 1) ASC, pd.products_name ";
                break;
        }
    }

    protected function updateNotifySearchRealOrderbyString(&$class, $eventID, $not_used, &$order_by)
    {
        if (empty($order_by)) {
            $order_by = ' ORDER BY IF (p.products_quantity = 0, 1, 0) ASC, pd.products_name ';
        } else if (str_contains($order_by, 'IF (p.products_quantity') === false) {
            $order_by = ' ORDER BY IF (p.products_quantity = 0, 1, 0) ASC,' . substr($order_by, 9);
        }
    }

    protected function updateNotifySearchWhereString(&$class, $eventID, $keywords, &$where_str, $keyword_search_fields)
    {
        if (!defined('EXCLUDE_SORT_CATEGORIES') || preg_match('#^[0-9 \,]+$#' , EXCLUDE_SORT_CATEGORIES) === 0) {
            return;
        }
        if (!empty($where_str)) {
            $where_str .=  ' AND';
        }
        $where_str .= ' p.master_categories_id NOT IN (' . EXCLUDE_SORT_CATEGORIES . ')';
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

    protected function redirectIncorrectTypeHandler(){
        $product_id = $_GET['products_id'] ?? 0;
        $page = $_GET['main_page'];
        $parameters = '';
        if ($product_id === 0) {
            // no product specfied
            $_GET['main_page'] = '';
            //redirect to home page or category if present
            $parameters = $this->getParameters();
            zen_redirect(zen_href_link(FILENAME_DEFAULT, $parameters));
        }
        $type_handler = zen_get_info_page($product_id);
        if ($type_handler !== $page) {
            // incorrect type handeler redirect to correct type handler
            unset($_GET['main_page']);
            $parameters = $this->getParameters();
            zen_redirect(zen_href_link($type_handler, $parameters));
        }
    }

    protected function getParameters() : string {
        $parameters = '';
        foreach ($_GET as $key => $value) {
            if (empty($value) === false) {
                $parameters = '&' . $key . '=' . $value;
            }
        }
        $parameters = substr($parameters, 1);
        return $parameters;
    }
    /*
     * Delayed despatch processing
     */
    protected function updateNotifyHeaderStartCheckoutSuccess(&$class, $eventID, $p1, &$p2, &$p3) {
        global $db, $mjfb_products_date;
        $orders_id = $_POST['order_number_created'] ?? 0;
        $mjfb_products_available_query = 'SELECT max(products_date_available) as products_date' .
            ' FROM ' . TABLE_PRODUCTS . ' p'.
                                ' INNER JOIN '. TABLE_ORDERS_PRODUCTS . ' op'.
                                ' ON p.products_id = op.products_id'.
            ' WHERE orders_id = :ordersID';
        $mjfb_products_available_query = $db->bindVars($mjfb_products_available_query, ':ordersID', $orders_id, 'integer');
        $mjfb_products_available = $db->Execute($mjfb_products_available_query);
        if (!$mjfb_products_available->EOF) {
            $mjfb_products_date = $mjfb_products_available->fields['products_date'];
        } else {
            $mjfb_products_date = NULL;
        }
    }
    protected function updateNotifyHeaderStartCheckoutShipping(&$class, $eventID, $p1, &$p2, &$p3) {
        // Set post to session comment if session comment has been previously set and post is empty
        if (empty($_POST['action']) && empty($_POST['comments']) && !empty($_SESSION['comments'])) {
            $_POST['comments'] = $_SESSION['comments'];
        }
        //may need next function as well
        //$this->updateNotifyHeaderStartCheckoutConfirmation(&$class, $eventID, $p1, &$p2, &$p3);
    }
    protected function updateNotifyHeaderStartCheckoutConfirmation(&$class, $eventID, $p1, &$p2, &$p3) {
        /*
         * Add the availability date to the session comments
         */
        $mjfb_date_available = mjfb_get_date_available();
        $mjfb_string = TEXT_DATE_AVAILABLE;
        $mjfb_string = '/' . str_ireplace('%s', '.*[0-9]{4}', $mjfb_string) . '/';
        if ($mjfb_date_available !== null) {
            /*
             * future availability date add comment
             */
            if (isset($_POST['comments']) && $_POST['comments'] != '') {
                if (preg_match($mjfb_string, $_POST['comments']) === 1) {
                    /*
                     * comment present including future availability. Replace future availability comment in case date has changed
                     */
                    $_POST['comments'] = preg_replace($mjfb_string, sprintf(TEXT_DATE_AVAILABLE, zen_date_long($mjfb_date_available)), $_POST['comments']);
                } else {
                    /*
                     * comments present but not this one so place at start of comments
                     */
                    $_POST['comments'] = sprintf(TEXT_DATE_AVAILABLE, zen_date_long($mjfb_date_available)) . "\n" . $_POST['comments'];

                                           }
            } else {
                /*
                 * no existing comments
                 */
                $_POST['comments'] = sprintf(TEXT_DATE_AVAILABLE, zen_date_long($mjfb_date_available)) . "\n";
                $_SESSION['comments'] = $_POST['comments'];
            }
        } elseif (isset($_POST['comments'])) {
            /*
             * if comment has been removed and there were no other comments unset comment
             */
            if (preg_match($mjfb_string, $_POST['comments']) === 1) {
                $_POST['comments'] = trim(preg_replace($mjfb_string, "", $_POST['comments']));
                $_SESSION['comments'] = $_POST['comments'];
                if ($_POST['comments'] == '') {
                    unset($_POST['comments']);
                    unset($_SESSION['comments']);
                }
            }
        }
    }
    protected function updateNotifyOrderInvoiceContentReadyToSend(&$class, $eventID, $p1, &$p2, &$p3) {
        /*
         * Add the delayed despatch date to the email being sent with the order
         */
        $mjfb_date_available = mjfb_get_date_available();
        if ($mjfb_date_available !== NULL) {
            /*
             * Product available in the future add note to email
             */
            $p3['PAYMENT_METHOD_FOOTER'] .= "\n\n" . '<p id="productDateAvailable" class="docProduct centeredContent">' . sprintf(TEXT_DATE_AVAILABLE, zen_date_long($mjfb_date_available)) . '</p>' . "\n\n" . '<br class="clearBoth" />';
            $p2 .= sprintf(TEXT_DATE_AVAILABLE, zen_date_long($mjfb_date_available)) . "\n\n";
            /*
             * check for delayed despatch
             */
            if (defined('MJFB_DELAYED_DESPATCH_DATE') && MJFB_DELAYED_DESPATCH_DATE != "" && strtotime(MJFB_DELAYED_DESPATCH_DATE) > strtotime('now')) {
                if (strtotime(MJFB_DELAYED_DESPATCH_DATE) > strtotime($mjfb_date_available)) {
                    /*
                     * delayed despatch after date available
                     */
                    $despatchdate = mjfb_expected_despatch_date(MJFB_DELAYED_DESPATCH_DATE);
                } else {
                    $despatchdate = mjfb_expected_despatch_date($mjfb_date_available);
                }
            } else {
                /*
                 * no delayed despatch use date available
                 */
                $despatchdate = mjfb_expected_despatch_date($mjfb_date_available);
            }
        } else if (defined('MJFB_DELAYED_DESPATCH_DATE') && MJFB_DELAYED_DESPATCH_DATE !== '' && strtotime(MJFB_DELAYED_DESPATCH_DATE) > strtotime('now')) {
            /*
             * no future availability use delayed despatch date is set
             */
            $despatchdate = mjfb_expected_despatch_date(MJFB_DELAYED_DESPATCH_DATE);
        } else {
            /*
             * use today to calculate expected despatch date
             */
            $despatchdate = mjfb_expected_despatch_date();
        }
        /*
         * add expected despatch date to email text (p2) and html array (p3)
         */

        $start = strpos($p1['text_email'], EMAIL_TEXT_INVOICE_URL);
        $p2 = substr($p1['text_email'], 0, $start) . EMAIL_TEXT_EXPECTED_DESPATCH . ' ' . $despatchdate . "\n" . substr($p1['text_email'], $start);
        $p3['INTRO_EXPECTED_DESPATCH'] = EMAIL_TEXT_EXPECTED_DESPATCH . ' ' . $despatchdate;
    }
}
