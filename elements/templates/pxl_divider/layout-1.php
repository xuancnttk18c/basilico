<?php
	$style = $widget->get_setting('style', 'style-1');
	$alignment = $widget->get_setting('alignment', 'left');
?>

<div class="pxl-widget-divider <?php echo esc_attr($alignment); ?>">
	<div class="pxl-divider <?php echo esc_attr($style); ?>">
		<?php if ($style == 'style-2') : ?>
			<div class="diamond-icon"></div>
		<?php endif; ?>
	</div>
</div>