<?php
// -----
// Since the languages are now loaded via classes, the $locales definition
// needs to be globalized for use in payment-methods (e.g. paypalwpp) and
// other processing.
//
global $locales;
$locales = ['en_GB', 'en_GB.utf8', 'en', 'English_United Kingdom.1252'];
 @setlocale(LC_TIME, $locales);
$define = [
    'BOX_HEADING_LINKS' => '&nbsp;&nbsp;<small>[more]</small>',
    'BOX_HEADING_SHOPPING_CART' => 'Shopping Basket',
    'BOX_INFORMATION_CONDITIONS' => 'Terms &amp; Conditions',
    'BOX_INFORMATION_SHIPPING' => 'Delivery &amp; Returns',
    'BOX_SHOPPING_CART_EMPT' => 'Your basket is empty.',
    'CART_SHIPPING_METHOD_FREE_TEXT','Free Delivery',
    'CART_SHIPPING_METHOD_TEXT' => 'Available Delivery Methods',
    'CART_SHIPPING_QUOTE_CRITERIA' => 'Delivery quotes are based on the address information you selected:',
    'CATEGORY_COMPANY' => 'Company Details (if applicable)',
    'CATEGORY_PERSONAL' => 'Account Holder Details',
    'DATE_FORMAT' => 'd/m/Y',
    'DOB_FORMAT_STRING' => 'dd/mm/yyyy',
    'EMPTY_CART_TEXT_NO_QUOTE' => 'Whoops! Your session has expired ... Please update your basket for Delivery Quote ...',
    'ENTRY_CITY' => 'Town/City:',
    'ENTRY_CITY_ERROR' => 'Your Town/City must contain a minimum of ' . ENTRY_CITY_MIN_LENGTH . ' characters.',
    'ENTRY_DATE_OF_BIRTH_ERROR' => 'Is your birth date correct? Our system requires the date in this format: DD/MM/YYYY (eg 21/05/1970) or this format: YYYY-MM-DD (eg 1970-05-21)',
    'ENTRY_DATE_OF_BIRTH_TEXT' => '* (eg. 21/05/1970 or 1970-05-21)',
    'ENTRY_STATE' => 'County/State:',
    'ENTRY_STATE_ERROR' => 'Your County/State must contain a minimum of ' . ENTRY_STATE_MIN_LENGTH . ' characters.',
    'ENTRY_STATE_ERROR_SELECT' => 'Please select a County/State from the pull down menu.',
    'ENTRY_STATE_TEXT' => '',
    'ENTRY_STREET_ADDRESS' => 'Address Line 1:',
    'ENTRY_STREET_ADDRESS_ERROR' => 'Your Address line 1 must contain a minimum of ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' characters.',
    'FREE_SHIPPING_DESCRIPTION' => 'Free Delivery for orders over %s',
    'ENTRY_TELEPHONE_NUMBER' => 'Telephone/Mobile:<br>(optional)',
    'ENTRY_TELEPHONE_NUMBER_ERROR' => 'Your Telephone/Mobile Number must contain a minimum of ' . ENTRY_TELEPHONE_MIN_LENGTH . ' characters.',
    'ENTRY_TELEPHONE_NUMBER_TEXT' => '',
    'ERROR_TEXT_COUNTRY_DISABLED_PLEASE_CHANGE' => 'Sorry, but we no longer accept billing or delivery addresses in "%s".  Please update this address to continue.',
    'LANGUAGE_CURRENCY' => 'GBP',
    'MORE_INFO_TEXT' => ' See More / To Buy ',
    'PREVNEXT_BUTTON_NEXT' => '[<span class="pg-hide">Next&nbsp;</span>&raquo;]',
    'PREVNEXT_BUTTON_PREV' => '[&laquo;<span class="pg-hide">&nbsp;Prev</span>]',
    'PRODUCT_PRICE_DISCOUNT_PERCENTAGE' => '% ',
    'PRODUCTS_ORDER_QTY_TEXT' => 'Add to Basket: ',
    'SUCCESS_ADDED_TO_CART_PRODUCT' => 'You have successfully added an item to your basket ...',
    'SUCCESS_ADDED_TO_CART_PRODUCTS' => 'You have successfully added items to your basket ...',
    'TABLE_HEADING_ADDRESS_DETAILS' => 'Name and Address Details',
    'TABLE_HEADING_COMMENTS' => 'Delivery Message, Special Instructions or Order Comments',
    'TABLE_HEADING_LOGIN_DETAILS' => 'Create Login Details',
    'TABLE_HEADING_MODEL' => 'Code No.',
    'TABLE_HEADING_SPECIALS_INDEX' => 'Specials',
    'TEXT_CLICK_TO_ENLARGE' => 'Enlarge image',
    'TEXT_DATE_ADDED' => 'This product was added to our catalogue on %s.',
    'TEXT_DATE_AVAILABLE' => 'This order will not be despatched until stock available after %s',
    'TEXT_HEADER_DISCOUNT_PRICES_ACTUAL_PRICE' => 'Multiple Purchases <br> price per item',
    'TEXT_INFO_SORT_BY_PRODUCTS_MODEL' => 'Item Code',
    'TEXT_PRODUCT_COLLECTIONS' => 'Music Samples: ',
    'TEXT_PRODUCT_MODEL' => 'Code No: ',
    'TEXT_PRODUCT_WEIGHT' => 'Delivery Weight: ',
    'TEXT_PRODUCT_WEIGHT_UNIT' => 'Kg',
    'TEXT_SHIPPING_WEIGHT' => 'Kg',
    'PREVNEXT_BUTTON_NEXT' => '[<span class="pg-hide">Next&nbsp;</span>&raquo;]',
    'PREVNEXT_BUTTON_PREV' => '[&laquo;<span class="pg-hide">&nbsp;Prev</span>]',
    'PRODUCT_PRICE_DISCOUNT_PERCENTAGE' => '% ',
    'WARNING_SHOPPING_CART_COMBINED' => 'NOTICE: For your convenience, your current shopping basket has been combined with your basket from your last visit. Please review your shopping basket before checking out.',
];

return $define;
