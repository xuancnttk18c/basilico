<?php
/**
 * @package Basilico
 */
$custom_cursor = basilico()->get_theme_opt( 'custom_cursor', false );
?>
</div><!-- #main -->
<?php basilico()->footer->getFooter(); ?>
</div>
<?php //do_action('pxl_anchor_target') 
	basilico_action('anchor_target');
?>
<?php wp_footer(); ?>
<?php if ($custom_cursor) : ?>
	<div class="pxl-cursor"></div>
<?php endif; ?>
</body>
</html>
