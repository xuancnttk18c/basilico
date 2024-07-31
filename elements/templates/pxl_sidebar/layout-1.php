<?php
$sidebar = $this->get_settings_for_display( 'sidebar' );
if ( empty( $sidebar ) ) {
	return;
}
dynamic_sidebar( $sidebar );
?>