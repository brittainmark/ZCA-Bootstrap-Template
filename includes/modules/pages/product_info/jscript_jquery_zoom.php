<?php
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
if (PRODUCT_INFO_SHOW_BOOTSTRAP_MODAL_SLIDE !== '2') {
    return;
}
?>
<script src="<?php echo 'jquery.zoom.min.js'?>"></script>
<script>
// add image zoom and image link
    $(document).ready(function(){
        $('.imagezoom').each(function() {
            var zoomImageTarget = $(this),
            zoomImg = zoomImageTarget.find('a').attr('href');
            $(this).zoom({url: zoomImg});
		});
        $('#productImagesCarousel').on('slid.bs.carousel', function() {
            $("#imageLink").attr("href", $("#productImagesCarousel .active").find("a").attr("href"));
        });
    });
    
</script>