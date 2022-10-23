<?php
$define = [
    'EMAIL_WELCOME' => 'Welcome to <strong>' . STORE_NAME . '</strong>.','EMAIL_CONTACT' => 'For help with any of our online services, please email us: <a href="mailto:' . STORE_OWNER_EMAIL_ADDRESS . '">' . STORE_OWNER_EMAIL_ADDRESS . "</a>\n\n",
    'EMAIL_TEXT' => 'You now have an account with ' . STORE_NAME . ' providing:' . "\n\n<ul>" . '<li><strong>Order History</strong> - View order details.</li>' . "\n\n" . '<li><strong>Permanent Basket</strong> - Products you add to your basket will remain there until removed or purchased.</li>' . "\n\n" . '<li><strong>Address Book</strong> - Define additional addresses (for example to send a gift).</li>' . "\n\n" . '<li><strong>Product Reviews</strong> - Share your opinion on our products with other customers.</li>' . "\n\n</ul>",
    'EMAIL_GV_CLOSURE' => "\n" . 'Sincerely,' . "\n\n" . STORE_OWNER . "\nStore Owners\n\n". '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">' . HTTP_SERVER . DIR_WS_CATALOG ."</a>\n\n",
];

return $define;
