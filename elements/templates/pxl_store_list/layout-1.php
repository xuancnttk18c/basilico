<?php
$default_settings = [
    'list' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>
<?php if(isset($list) && !empty($list) && count($list)): ?>
<div class="pxl-store-list layout-1">
    <div class="pxl-item-store">
        <?php
        foreach ($list as $key => $value):
            $link = isset($value['link']) ? $value['link'] : '';
            $link_key = $widget->get_repeater_setting_key( 'title', 'value', $key );
            $has_icon = !empty( $value['store_icon'] );
            if ( ! empty( $link['url'] ) ) {
                $widget->add_render_attribute( $link_key, 'href', $link['url'] );
                if ( $link['is_external'] ) {
                    $widget->add_render_attribute( $link_key, 'target', '_blank' );
                }
                if ( $link['nofollow'] ) {
                    $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                }
            }
            $link_attributes = $widget->get_render_attribute_string( $link_key );
            ?>
            <div class="pxl-store d-flex align-items-center justify-content-between">
                <div class="pxl-store-content">
                    <?php
                    if ($has_icon){
                        echo '<div class="pxl-store-icon">';
                        if ($is_new){
                            \Elementor\Icons_Manager::render_icon( $value['store_icon'], [ 'aria-hidden' => 'true' ], 'i' );
                        }else{
                            ?><i class="<?php echo esc_attr($value['store_icon']);?>" aria-hidden="true"></i><?php
                        }
                        echo '</div>';
                    }
                    ?>
                    <div>
                        <h5 class="pxl-store-title"><?php echo esc_attr($value['title']); ?></h5>
                        <span><?php echo esc_attr($value['desc']); ?></span>
                    </div>
                </div>
                <?php if (!empty( $value['link']['url'] ) ) : ?>
                    <a class="pxl-store-btn" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                <?php endif; ?>
                    <i class="zmdi zmdi-check"></i>
                <?php if (!empty( $value['link']['url'] ) ) : ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>