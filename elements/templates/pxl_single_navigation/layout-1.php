<?php        
if (!is_single()) return false;
?>

<div class="pxl-single-nav">
    <?php basilico()->blog->get_post_nav(); ?>
</div>