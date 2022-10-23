<?php
$define = [
    'TEXT_INFORMATION' => '<p>If you were placing an order, please login and your shopping basket will be restored. You may then go back to the checkout and complete your final purchases.</p><p>If you had completed an order and wish to review it' . (DOWNLOAD_ENABLED == 'true' ? ', or had a download and wish to retrieve it' : '') . ', please go to your <a href="' . zen_href_link(FILENAME_ACCOUNT) . '">My Account</a> page to view your order.</p>',
];

return $define;
