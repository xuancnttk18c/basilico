<?php
extract($settings);
$circle_size = !empty($settings['circle_size']['size']) ? $settings['circle_size']['size'] : '480';
$item_size = !empty($settings['item_size']['size']) ? $settings['item_size']['size'] : '100';
if(count($tabs_list) > 0){
    ?>
    <div class="pxl-circle-tabs tilt-hover">
        <div class="tabs-icon" data-count="<?php echo esc_attr(count($tabs_list));?>>" data-circle-size="<?php echo esc_attr($circle_size);?>" data-item-size="<?php echo esc_attr($item_size);?>">
            <?php foreach ($tabs_list as $key => $tab) :
                $tab_icon    = isset($tab['tab_icon']) ? $tab['tab_icon'] : [];
                $icon_key = $widget->get_repeater_setting_key( 'tab_icon', 'tabs_list', $key );
                $tabs_icon[$icon_key] = $tab['tab_icon'];
                $widget->add_render_attribute( $icon_key, [
                    'class' => [ 'tab-icon' ],
                    'data-target' => '#' . $element_id.'-'.$tab['_id'],
                ] );
                if($active_tab == $key + 1){
                    $widget->add_render_attribute( $icon_key, 'class', 'active');
                }
                ?>
                <span <?php pxl_print_html($widget->get_render_attribute_string( $icon_key )); ?>>
                    <?php
                    if (!empty($tab_icon['value']))
                        \Elementor\Icons_Manager::render_icon($tab_icon, ['aria-hidden' => 'true', 'class' => 'item-icon pxl-icon'], 'i');
                    ?>
                </span>
            <?php endforeach; ?>
        </div>

        <div class="tabs-content">
            <?php foreach ($tabs_list as $key => $tab):
                $content_key = $widget->get_repeater_setting_key( 'tab_content', 'tabs_list', $key );
                $tabs_content = '';
                $tabs_content = $tab['tab_content'];
                $widget->add_render_attribute( $content_key, [
                    'class' => [ 'tab-content' ],
                    'id' => $element_id.'-'.$tab['_id'],
                ] );
                $widget->add_inline_editing_attributes( $content_key, 'advanced' );
                if($active_tab == $key + 1){
                    $widget->add_render_attribute( $content_key, 'class', 'active');
                }
                ?>
                <div <?php pxl_print_html($widget->get_render_attribute_string( $content_key )); ?>>
                    <h3 class="tab-title">
                        <span><?php echo pxl_print_html($tab['tab_title']); ?></span>
                    </h3>
                    <div><span class="pxl-divider"></span></div>
                    <div class="tab-description">
                        <?php pxl_print_html($tabs_content); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
}
?>