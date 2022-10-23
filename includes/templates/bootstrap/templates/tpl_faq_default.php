<?php
/**
 * tpl_faq_default.php
 *
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: DrByte 2020 Jul 10 Modified in v1.5.8-alpha $
 */
?>
<div id="faq" class="centerColumn">
    
<h1 id="faq-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<div id="faq-defineContent" class="defineContent">
<?php
/**
 * load the html_define for the faq default
 */
  require($define_page);
?>
</div>

<div id="faq-btn-toolbar" class="btn-toolbar my-3" role="toolbar">
<?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?>
</div>

</div>