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
}
