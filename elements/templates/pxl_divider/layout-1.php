<?php
	$style = $widget->get_setting('style', 'style-1');
	$alignment = $widget->get_setting('alignment', 'left');
	$draw = $widget->get_setting('draw', '');
?>

<div class="pxl-widget-divider <?php echo esc_attr($alignment); ?>">
	<?php var_dump($alignment); ?>
	<div class="pxl-divider <?php echo esc_attr($style); ?><?php echo esc_attr($draw) == 'true' ? ' pxl-scroll' : ''; ?>">
		<?php if ($style == 'style-2') : ?>
			<div class="diamond-icon"></div>
		<?php endif; ?>
	</div>
</div>