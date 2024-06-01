<?php
 @setlocale(LC_TIME, ['en_GB', 'en_GB.utf8', 'en']); 
$define = [    
    'DATE_FORMAT' => 'd/m/Y',
    'DATE_FORMAT_SHORT' => '%d/%m/%Y',
    'DATE_FORMAT_SPIFFYCAL' => 'dd/MM/yyyy',
    'ENTRY_DATE_OF_BIRTH_ERROR' => '&nbsp;<span class="errorText">(eg. 21/05/1970)</span>',
    'PHP_DATE_TIME_FORMAT' => 'd/m/Y H:i:s',
    'HEADER_ALT_TEXT' => 'Innerlight Crystals',
    'HEADER_LOGO_WIDTH' => '87',
    'HEADER_LOGO_HEIGHT' => '100',
    'HEADER_LOGO_IMAGE' => 'logobw.gif',
    'EMAIL_EXTRA_HEADER_INFO' => 'Inner Light Crystals',
    'EMAIL_FOOTER_COPYRIGHT' => 'Copyright (c) ' . date('Y') . ' <a href="' . zen_href_link(FILENAME_DEFAULT) . '">' . STORE_NAME . '</a>. Powered by <a href="https://www.zen-cart.com" target="_blank">Zen Cart</a>',
    'EMAIL_LOGO_FILENAME' => 'logo.gif',
    'EMAIL_LOGO_HEIGHT' => '160',
    'EMAIL_LOGO_WIDTH' => '139',
    'EMAIL_SPAM_DISCLAIMER' => 'This email is sent in accordance with the US CAN-SPAM Law in effect 01/01/2004. Removal requests can be sent to this address and will be honoured and respected.',
    'OFFICE_EMAIL' => '<strong>Email:</strong>',
    'EMAIL_LOGO_ALT_TITLE_TEXT' => 'Inner Light Crystals Logo',
    'ERROR_ORDER_DOES_NOT_EXIST' => 'Error: Order does not exist.',
];
return $define;
