<?php
$sidebar = $this->get_settings_for_display( 'sidebar' );
if ( empty( $sidebar ) ) {
	return;
}
?>
<div class="pxl-sidebar-area" id="pxl-sidebar-area">
	<?php dynamic_sidebar( $sidebar );?>
</div>