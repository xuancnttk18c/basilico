<?php
$bar_color_start = !empty($settings['bar_color_start']) ? $settings['bar_color_start'] : '#36dece';
$bar_color_end = !empty($settings['bar_color_end']) ? $settings['bar_color_end'] : '#43abdf';
?>
<?php if(!empty($settings['percentage_value'])) : ?>
    <div class="pxl-pie-chart layout1">
        <div class="pxl-item-value pxl-percentage" data-size="<?php echo esc_attr($settings['chart_size']['size']); ?>" data-barcolor-start="<?php echo esc_attr($bar_color_start); ?>" data-barcolor-end="<?php echo esc_attr($bar_color_end); ?>" data-track-color="rgba(0,0,0,0)" data-line-width="<?php echo esc_attr($settings['chart_line_width']['size']); ?>" data-line-cap="<?php echo esc_attr($settings['chart_line_cap']); ?>" data-line-cap="<?php echo esc_attr($settings['chart_line_cap']); ?>" data-percent="<?php echo esc_attr($settings['percentage_value']); ?>">
            <div class="pxl-item-divider"></div>
            <?php if(!empty($settings['counter_number'])) : ?>
                <div class="pxl-counter-number">
                    <span class="pxl-counter-value" data-duration="2000" data-to-value="<?php echo esc_attr($settings['counter_number']); ?>" data-delimiter="">1</span>
                    <span class="pxl-counter-suffix"><?php echo esc_attr($settings['counter_suffix']); ?></span>
                </div>
            <?php endif; ?>
        </div>
        <h3 class="pxl-item-title"><span><?php echo pxl_print_html($settings['title']); ?></span></h3>
    </div>
<?php endif; ?>