<?php

// -----
// An observer-class to  make changes for the Crystal Bootstrap Template
//
//
class CrystalBootstrapObserver extends base
{

    public function __construct()
    {
        $this->attach($this, [
            'NOTIFY_ZEN_SOLD_OUT_IMAGE',
            ]
                );
    }

    public function update(&$class, $eventID, $p1, &$p2, &$p3, &$p4, &$p5, &$p6)
    {
        global $db;
        switch ($eventID) {
            case 'NOTIFY_ZEN_SOLD_OUT_IMAGE':
                // $p1=[$button_check->fields, ['products_id' => (int)$product_id]]]
                // $p2 = $return_button
                // Delete from product location table
                $p2 = '<span class="text-danger"><strong>' . BUTTON_SOLD_OUT_ALT . '</strong></span>';
                break;
        }
    }
}