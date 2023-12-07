<?php
if (!class_exists('Basilico_Page_Title')) return;
$titles = basilico()->pagetitle->get_title();
?>

<div class="pxl-pt-wrap layout-3">
    <h1 class="main-title"><span><?php pxl_print_html($titles['title']) ?></span></h1>
</div>