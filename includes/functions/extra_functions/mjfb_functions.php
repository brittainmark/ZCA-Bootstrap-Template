<?php
/*
 * Function to check the valid country list for shipping methods to check if it is too heavy
 */
function mjfb_valid_shipping_country() {
	$count = 0;
	$modules = MODULE_SHIPPING_INSTALLED;
	if (empty ( $modules ))
		return $count;

	$modules_array = preg_split ( '/;/', $modules );

	for($i = 0, $n = sizeof ( $modules_array ); $i < $n; $i ++) {
		$class = substr ( $modules_array [$i], 0, strrpos ( $modules_array [$i], '.' ) );

		if (is_object ( $GLOBALS [$class] )) {
			if ($GLOBALS [$class]->valid_country) {
				$count ++;
			}
		}
	}

	return $count;
}
/*
 * Function to get the product date expected
 */
function mjfb_get_date_available() {
	global $db;
	/**
	 * return the latest date available of all items in the cart
	 * USAGE: $string=$this->get_date_available()
	 *
	 * mjfb
	 */

	/*
	 * check product code supplied
	 */
	$product_id_list = '';
	if (is_array ( $_SESSION ['cart']->contents )) {
	  foreach($_SESSION ['cart']->contents as $products_id => $data) {
//		while ( list ( $products_id, ) = each ( $_SESSION ['cart']->contents ) ) {
			$product_id_list .= ', ' . ( int ) $products_id ;
		}
	}
	$product_list = substr ( $product_id_list, 2 );
	if ($product_list == '') {
		$date_available = NULL;
	} else {
		/*
		 * find product date available
		 */
		$products_query = "select max(products_date_available) as products_date_available from " . TABLE_PRODUCTS . " where products_id in ( " . $product_list . ") ";

		$products = $db->Execute ( $products_query );

		$date_available = $products->fields ['products_date_available'];

		if ($date_available <= date ( 'Y-m-d H:i:s' )) {
			/*
			 * data Available before today therefore available
			 */

			$date_available = NULL;
		}
	}

	return $date_available;
	/*
	 * end MJFB
	 */
}
/*
 * Function to return next despatch date
 */
function mjfb_expected_despatch_date($check_date = NULL) {
	$after = 0;

	if ($check_date <> NULL && strtotime($check_date) > strtotime('now') ) {
		$date_check = strtotime($check_date);
		$day = date ( 'N' , $date_check );
	} else {
		$day = date ( 'N' );
/*
 * A -ev hour has been entered therefore delivery latest despatch is for previous day
 */
	if (MJFB_DESPATCH_HOUR <= 0) {
		$day = $day + 1;
		$after = 1;
		if (date( 'H') >= 24 + MJFB_DESPATCH_HOUR) {
/*
 * Despatch time is after finish for day
 */
			$day = $day + 1;
			$after = 2;
		}
		if($day > 7) $day -= 7;
	} else if (date ( 'H' ) >= MJFB_DESPATCH_HOUR) {
/*
 * Despatch time is after finish for day
 */

		$day = $day + 1;
		$after = 1;
	}
	$date_check  = strtotime('now');
	}
/*
 * Process array of despatch days
 */
	$delivery = explode (',', MJFB_DESPATCH_DAYS );
	$delivery [] = $delivery [0] + 7;
	foreach ( $delivery as $check ) {
		if ($check >= $day) {
			$addday = $check - $day;
			break;
		}
	}

	$addday += $after;
	return date ( 'j F Y', strtotime (' + ' . $addday . ' days' , $date_check ) );
}
/*
 * get date_available products
 *  copy of zen_get_new_date_range in functions_lookup.php
 */
function mjfb_get_restocked_date_range($time_limit = false) {
	if ($time_limit == false) {
		$time_limit = SHOW_NEW_PRODUCTS_LIMIT;
	}
	// 120 days; 24 hours; 60 mins; 60secs
	$date_range = time() - ($time_limit * 24 * 60 * 60);
	$upcoming_mask_range = time();
	$upcoming_mask = date('Ymd', $upcoming_mask_range);

	// echo 'Now:      '. date('Y-m-d') ."<br>";
	// echo $time_limit . ' Days: '. date('Ymd', $date_range) ."<br>";
	$zc_new_date = date('Ymd', $date_range);
	switch (true) {
		case (SHOW_NEW_PRODUCTS_LIMIT == 0):
			$new_range = '';
			break;
		case (SHOW_NEW_PRODUCTS_LIMIT == 1):
			$zc_new_date = date('Ym', time()) . '01';
//mjfb mod start
			$new_range = ' and p.products_date_available >= ' . $zc_new_date ;
			break;
		default:
			$new_range = ' and p.products_date_available >='  . $zc_new_date ;
//mjfb mod end
	}
/* Mjfb mod start
	if (SHOW_NEW_PRODUCTS_UPCOMING_MASKED == 0) {
		// do nothing upcoming shows in new
	} else {
		// do not include upcoming in new
		$new_range .= " and (p.products_date_available <=" . $upcoming_mask . " or p.products_date_available IS NULL)";
	}
 * Mjfb Mod end
*/
	return $new_range;
}
/*
 * Function to replace. zen_get_products_quantity_min_units_display
 * to not display max if = 1 and 1 left or none left.
 */
function mjfb_zen_get_products_quantity_min_units_display($product_id, $include_break = true, $message_is_for_shopping_cart = false)
{
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
    if ($check_max > 0 and $check_max != 1 and $check_units != 1) {
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