<?php
/*
 * get the about us page from the main site
 *

$filename = "/home/lotus/public_html/innerlightcrystals/aboutus.php";
$input = @file_get_contents ( $filename ) or die ( 'Could not access file: $filename' );
$regexp = "<body>(.*)<\/body>";
if (preg_match_all ( "/$regexp/siU", $input, $matches )) {
	$replace[0]='/<!--(.*)-->/Uis';
	$replace[1]='/<\?(.*)\?>/Uis';
	foreach ( $matches [0] as $str ) {

		echo  preg_replace($replace, '', $str);
	}
}
*/
?>
<div class="dropdown_aboutus">
  <h2><?php echo TITLE_ABOUT_US;?></h2>
  <p class="mega-about"><?php echo TEXT_ABOUT_US;?></p>
  <img src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/'.ABOUT_US_IMAGE ?>"   class="imgshadow_light aboutus-image" alt="about us"  />
  <div class="clearBoth"></div>
</div>