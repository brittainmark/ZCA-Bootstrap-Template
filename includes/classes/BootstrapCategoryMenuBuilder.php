<?php
/* 
 * Build a bootstrap drop down menu
 */
require_once (DIR_WS_CLASSES . 'categories_ul_generator.php');

class BootstrapCategoryMenuBuilder extends zen_categories_ul_generator {
    protected $lastName = '';
     public function __construct()
    {
        parent::__construct();
    }
    public function buildBootstrapMenu($parent_id, $level = 0, $submenu=true, $parent_link='')
    {
        $parent_id = (int)$parent_id;
        $level = (int)$level;
        if ($level == 0) {
            $result = sprintf($this->parent_group_start_string, ($submenu==true) ? ' class="m-0 p-0 dropdown-menu" aria-labelledby="categoryDropdown"' : '' );
        } else {
            $result = sprintf($this->parent_group_start_string, ($submenu==true) ? ' class="m-0 p-0 dropdown-menu" aria-labelledby="level' . $level . '-' . $this->lastName . '"' : '' );
        }

        if (($this->data[$parent_id])) {
            foreach($this->data[$parent_id] as $category_id => $category) {
                $category_link = $parent_link . $category_id;
                if (isset($this->data[$category_id])) {
                    // replace none alpa and numerics with _ for valid css id's
                    $lastName = preg_replace('/[^a-zA-Z0-9]/', '_', $category['name']);
                    $this->lastName = $lastName;
                    $result .= sprintf($this->child_start_string, ($submenu==true) ? ' class="dropdown-submenu"' : '');
                    $result .= str_repeat($this->spacer_string, $this->spacer_multiplier * 1) . '<a class= "dropdown-toggle dropdown-item" href="' . zen_href_link(FILENAME_DEFAULT, 'cPath=' . $category_link) . '" id="level' . ($level + 1) . '-' .$this->lastName . '" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                } else {
                    $result .= sprintf($this->child_start_string, '');
                    $result .= str_repeat($this->spacer_string, $this->spacer_multiplier * 1) . '<a class="dropdown-item" href="' . zen_href_link(FILENAME_DEFAULT, 'cPath=' . $category_link) . '">';
                }
                $result .= $category['name'];
                $result .= '</a>';

                if (isset($this->data[$category_id]) && (($this->max_level == '0') || ($this->max_level > $level+1))) {
                    $result .= $this->buildBootstrapMenu($category_id, $level+1, $submenu, $category_link . '_');
                }
                $result .= $this->child_end_string;
            }
        }

        $result .= $this->parent_group_end_string;
        return $result;
    }
}
