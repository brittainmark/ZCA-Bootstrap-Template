<?php
/**
 * New separate carousel image items to allow use elsewhere
 * 
 * BOOTSTRAP v3.5.3
 *
 * @package templateSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * 
 *  Version 3.5.3 brittainm added main page image as carousel
 */
?>
                            <div id="productImagesCarousel" class="carousel slide">
                                <!-- main slider carousel items -->
                                <div class="carousel-inner text-center">
<?php
require DIR_WS_MODULES . zen_get_module_directory('main_product_image.php');
$main_image_file = DIR_WS_IMAGES . $products_image ;
?>
<div class="active item carousel-item imagezoom" data-slide-number="0">
    <a href="<?php echo DIR_WS_IMAGES . $products_image?>">
        <?php echo zen_image($products_image_large, $products_name, parameters:'loading="lazy"');?> 
   </a>
</div>
<div class="imageLink" >
    <a href="<?php echo DIR_WS_IMAGES . $products_image?>" id="imageLink" target="_blank">
        <i class="fa-solid fa-up-right-and-down-left-from-center fa-2x" title="open image"></i>
    </a>
</div>
<?php
require DIR_WS_MODULES . zen_get_module_directory('bootstrap_slide_additional_images.php');

if ($flag_show_product_info_additional_images !== '0' && $num_images > 0) {
    if (is_array($carousel_list_box_contents)) {
        for ($row = 0, $rn = count($carousel_list_box_contents); $row < $rn; $row++) {
            $params = '';

            for ($col = 0, $cn = count($carousel_list_box_contents[$row]); $col < $cn; $col++) {
                $r_params = '';
                if (isset($carousel_list_box_contents[$row][$col]['params'])) {
                    $r_params .= ' ' . (string)$carousel_list_box_contents[$row][$col]['params'];
                }
                if (isset($carousel_list_box_contents[$row][$col]['text'])) {
                    echo '<div' . $r_params . '>' . $carousel_list_box_contents[$row][$col]['text'] . '</div>';
                }
            }
        }
    }
?>
                                    <div id="carousel-btn-toolbar" class="btn-toolbar justify-content-between p-3" role="toolbar">
                                        <a class="carousel-control-prev left pt-3" href="#productImagesCarousel" data-slide="prev"><i class="fas fa-chevron-left" title="<?php echo TEXT_SLIDER_IMAGE_PREVIOUS;?>"></i></a>
                                        <a class="carousel-control-next right pt-3" href="#productImagesCarousel" data-slide="next"><i class="fas fa-chevron-right" title="<?php echo TEXT_SLIDER_IMAGE_NEXT;?>"></i></a>
                                    </div>
                                </div>
                                <!-- main slider carousel nav controls -->
                                <script>
                                document.write('<p><?php echo 'Hover over image to enlarge'?></p>');
                                </script>

                                <ul class="carousel-indicators list-inline mx-auto justify-content-center py-3">
<li class="list-inline-item active">
    <script>
    document.write('<a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#productImagesCarousel">');
    document.write('<?php echo zen_image($main_image_file, $products_name, SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT); ?>');
    document.write('</a>');
    </script>
    <noscript>
    <a href="<?php echo $main_image_file;?>" target="_blank">
        <?php echo zen_image($main_image_file, $products_name, SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT); ?> 
    </a>
    </noscript>
</li>
<?php
} else {
    // Used echo to maintain html integrity.
    echo '                                </div>' . "\n";
?>
                                <script>
                                    document.write('<p><?php echo 'Hover over image to enlarge'?></p>');
                                </script>
<?php
    echo '                                    <ul class="carousel-indicators list-inline mx-auto justify-content-center py-3" ></ul>' . "\n";
}

if (PRODUCT_INFO_SHOW_BOOTSTRAP_MODAL_SLIDE !== '2') {
    require DIR_WS_MODULES . zen_get_module_directory('bootstrap_additional_images.php');
}    

if ($flag_show_product_info_additional_images !== '0' && $num_images > 0) {
    if (is_array($list_box_contents) > 0 ) {
        for ($row = 0, $rn = count($list_box_contents); $row < $rn; $row++) {
            $params = '';

            for ($col = 0, $cn = count($list_box_contents[$row]); $col < $cn; $col++) {
                $r_params = '';
                if (isset($list_box_contents[$row][$col]['params'])) {
                    $r_params .= ' ' . (string)$list_box_contents[$row][$col]['params'];
                }
                if (isset($list_box_contents[$row][$col]['text'])) {
                    echo '<li' . $r_params . '>' . $list_box_contents[$row][$col]['text'] .  '</li>';
                }
            }
        }
    }
}
    ?>
                                     </ul>
                            </div>
