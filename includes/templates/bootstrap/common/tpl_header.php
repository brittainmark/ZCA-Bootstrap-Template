<?php
/**
 * Common Template - tpl_header.php
 *
 * BOOTSTRAP v3.7.0
 *
 *
 * @copyright Copyright 2003-2020 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: DrByte 2020 May 19 Modified in v1.5.7 $
 */
// -----
// Quick return if the header's been disabled.
//
if (!empty($flag_disable_header)) {
    return;
}
?>
<!--bof-header logo and navigation display-->
<div id="headerWrapper" class="mt-2">
<!--bof-navigation display-->
    <div id="navMainWrapper">
        <div id="navMain">
            <nav class="navbar fixed-top mx-3 navbar-expand-lg rounded-bottom"  aria-label="<?= TEXT_HEADER_ARIA_LABEL_NAVBAR; ?>">
<!-- MJFB
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
-->
                <div class="navbar-expand" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
<?php 
if (!$this_is_home_page) { 
// MJFB added strip_tags font awsome and titles to all below.    
?>        
                        <li class="nav-item">
                            <a class="nav-link" href="<?=  HTTP_SERVER . DIR_WS_CATALOG ;?>">
                                <i class="fas fa-home" title="<?= strip_tags(HEADER_TITLE_CATALOG); ?>"></i> <span class="d-none d-md-inline"><?= HEADER_TITLE_CATALOG; ?></span>
                            </a>
                        </li>
<?php
}

if (zen_is_logged_in() && !zen_in_guest_checkout()) { 
?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= zen_href_link(FILENAME_LOGOFF, '', 'SSL'); ?>"><i class="fas fa-sign-out-alt" title="<?= strip_tags(HEADER_TITLE_LOGOFF); ?>"></i> <span class="d-none d-md-inline"><?= HEADER_TITLE_LOGOFF; ?></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>"><i class="fas fa-user" title="<?= strip_tags(HEADER_TITLE_MY_ACCOUNT); ?>"></i> <span class="d-none d-md-inline"><?= HEADER_TITLE_MY_ACCOUNT; ?></span></a>
                        </li>
<?php
} else {
    if (STORE_STATUS === '0') {
?>
                        <li class="nav-item" title="<?= HEADER_TITLE_LOGIN ?>">
                            <a class="nav-link" href="<?= zen_href_link(FILENAME_LOGIN, '', 'SSL') ?>">
                                <i class="fas fa-sign-in-alt" title="<?= strip_tags(HEADER_TITLE_LOGIN); ?>"></i> <span class="d-none d-md-inline"><?= HEADER_TITLE_LOGIN ?></span>
                            </a>
                        </li>
<?php
    }
}

if ($_SESSION['cart']->count_contents() > 0) {
?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= zen_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL'); ?>"> <span class="hidden-xs hdr-cart-total"><?= $currencies->format($_SESSION['cart']->show_total()); ?></span> <i class="fas fa-shopping-basket" title="<?= strip_tags(HEADER_TITLE_CART_CONTENTS); ?>"></i><sup><span class="badge badge-light text-black ml-n2"><?= $_SESSION['cart']->count_contents(); ?></span></sup> <span class="d-none d-md-inline"><?= HEADER_TITLE_CART_CONTENTS; ?></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'); ?>"> <i class="fa fa-check-square" title="<?= strip_tags(HEADER_TITLE_CHECKOUT); ?>"></i> <span class="d-none d-md-inline"><?= HEADER_TITLE_CHECKOUT; ?></span></a>
                        </li>
<?php
}

// MJFB
//require $template->get_template_dir('tpl_offcanvas_menu.php', DIR_WS_TEMPLATE, $current_page_base, 'common') . '/tpl_offcanvas_menu.php';
// MJFB to </UL>
?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= zen_href_link(FILENAME_ADVANCED_SEARCH); ?>"><i class="fa fa-search" title="Search"></i></a>
                        </li>
                    </ul>
<?php
require DIR_WS_MODULES . zen_get_module_sidebox_directory('search_header.php');
?>
                </div>
            </nav>
        </div>
    </div>
<!--eof-navigation display-->

<!--bof-branding display-->
<?php
    // -----
    // Output the div that provides spacing under the navbar.  It's set by
    // tpl_main_page.php and might be an empty string if it's already been
    // output in an active 'Header Position 1' banner.
    //
    echo $navbar_spacer;
?>
    <div id="logoWrapper">
        <div id="logo" class="row align-items-center px-3 pb-3">
<?php
$tagline_banner_section_present = ((SHOW_BANNERS_GROUP_SET2 !== '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET2)) || HEADER_SALES_TEXT !== '');
$sales_text_class = ($tagline_banner_section_present === true) ? 'col-sm-4' : 'col-sm-12';
/* MJFB moved logo lower 
?>
            <div class="<?php echo $sales_text_class; ?>">
                <a id="hdr-img" class="d-block" href="<?php echo zen_href_link(FILENAME_DEFAULT); ?>" aria-label="<?php echo TEXT_HEADER_ARIA_LABEL_LOGO; ?>">
                    <?php echo zen_image($template->get_template_dir(HEADER_LOGO_IMAGE, DIR_WS_TEMPLATE, $current_page_base, 'images') . '/' . HEADER_LOGO_IMAGE, HEADER_ALT_TEXT, HEADER_LOGO_WIDTH, HEADER_LOGO_HEIGHT); ?>
                </a>
            </div>
<?php
 */
if ($tagline_banner_section_present === true) {
?>
            <div id="taglineWrapper" class="col-sm-8 text-center">
<?php
    if (HEADER_SALES_TEXT !== '') {
/* MJFB added image */
        ?>
                <div id="tagline" class="text-center"><a href="<?php echo zen_href_link(FILENAME_DEFAULT); ?>" aria-label="<?php echo TEXT_HEADER_ARIA_LABEL_LOGO; ?>">
                    <?php echo zen_image($template->get_template_dir(HEADER_LOGO_IMAGE, DIR_WS_TEMPLATE, $current_page_base, 'images') . '/' . HEADER_LOGO_IMAGE, HEADER_ALT_TEXT, HEADER_LOGO_WIDTH, HEADER_LOGO_HEIGHT); ?>
                </a><?php echo HEADER_SALES_TEXT;?></div>
<?php
    }

    if (SHOW_BANNERS_GROUP_SET2 !== '' && $banner !== false) {
        // -----
        // Set variables used by the banner-carousel.
        //
        $find_banners = zen_build_banners_group(SHOW_BANNERS_GROUP_SET2);
        $banner_group = 2;
?>
                <div class="zca-banner bannerTwo rounded pt-1">
<?php
        if (ZCA_ACTIVATE_BANNER_TWO_CAROUSEL === 'true') {
            require $template->get_template_dir('tpl_zca_banner_carousel.php', DIR_WS_TEMPLATE, $current_page_base, 'common') . '/tpl_zca_banner_carousel.php';
        } else {
            echo zen_display_banner('static', $banner);
        }
?>
                </div>
<?php
    }
?>
            </div>
<?php
}
// no HEADER_SALES_TEXT or SHOW_BANNERS_GROUP_SET2
?>
        </div>
    </div>
<!--eof-branding display-->
<?php
// Display all header alerts via messageStack:
if ($messageStack->size('header') > 0) {
    echo $messageStack->output('header');
}
if (!empty($_GET['error_message'])) {
    echo zen_output_string_protected(urldecode($_GET['error_message']));
}
if (!empty($_GET['info_message'])) {
    echo zen_output_string_protected($_GET['info_message']);
}
?>
<!--eof-header logo and navigation display-->

<!--bof-optional categories tabs navigation display-->
<?php require $template->get_template_dir('tpl_modules_categories_tabs.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_categories_tabs.php'; ?>
<!--eof-optional categories tabs navigation display-->

<!--bof-header ezpage links-->
<?php
if (EZPAGES_STATUS_HEADER === '1' || (EZPAGES_STATUS_HEADER === '2' && zen_is_whitelisted_admin_ip())) {
    require $template->get_template_dir('tpl_ezpages_bar_header.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_ezpages_bar_header.php';
}
?>
<!--eof-header ezpage links-->
</div>
