<?php
/**
 * New Modal for popup_image_additional carousel
 * 
 * BOOTSTRAP v3.6.1
 *
 * @package templateSystem
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * 
 *  Version 3.5.3 brittainm added main page image as carousel
 */
if (!defined('IMAGE_ADDITIONAL_DISPLAY_LINK_EVEN_WHEN_NO_LARGE')) {
    define('IMAGE_ADDITIONAL_DISPLAY_LINK_EVEN_WHEN_NO_LARGE', 'Yes');
}
?>
<!-- Modal -->
<!-- BOOTSTRAP -->
<div class="modal fade bootstrap-slide-modal-lg" tabindex="-1" role="dialog" aria-labelledby="bootStrapImagesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bootStrapImagesModalLabel"><?php echo $products_name; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo TEXT_MODAL_CLOSE; ?>"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <!-- main slider carousel -->
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2" id="slider">
<?php 
require($template->get_template_dir('tpl_bootstrap_images.php',DIR_WS_TEMPLATE, $current_page_base,'modalboxes'). '/tpl_bootstrap_slider_items.php');
?>
                        </div>
                    </div>
                    <!--/main slider carousel-->
                </div>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo TEXT_MODAL_CLOSE; ?></button></div>
        </div>
    </div>
</div>
