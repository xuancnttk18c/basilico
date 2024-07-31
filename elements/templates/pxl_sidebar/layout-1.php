<?php
$sidebar = $widget->get_settings_for_display('sidebar');
$style   = $widget->get_settings('style');

if ( empty( $sidebar ) ) {
	return;
}
?>
<div id="pxl-sidebar-area" class="pxl-sidebar-area <?php echo esc_attr($style); ?>">
	<?php dynamic_sidebar( $sidebar );?>
</div>