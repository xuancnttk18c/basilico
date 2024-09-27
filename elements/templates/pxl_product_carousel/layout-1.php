<?php
if (!class_exists('Woocommerce')){
    ?> <h4> <?php echo esc_html__('Please Install Woocommerce!', 'basilico'); ?></h4><?php
    return true;
}
extract($settings);
$query_type = $widget->get_setting('query_type', 'recent_product');
$post_per_page = $widget->get_setting('post_per_page', 8);
$product_ids = $widget->get_setting('product_ids', '');
$categories = $widget->get_setting('taxonomies', '');
$param_args=[];
$posts = Pxl_Woo_Query::instance()->basilico_woocommerce_query($query_type,$post_per_page,$product_ids,$categories,$param_args);
extract($posts);

$arrows = $widget->get_setting('arrows','false');
$arrows_style = $widget->get_setting('arrows_style', 'style-1');
$dots = $widget->get_setting('dots','false');
$product_layout = $widget->get_setting('product_layout', 'layout-1');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1,
    'slide_mode'                    => 'slide',
    'slides_to_show_xxl'            => (float)$widget->get_setting('col_xxl', 4),
    'slides_to_show'                => (float)$widget->get_setting('col_xl', 4),
    'slides_to_show_lg'             => (float)$widget->get_setting('col_lg', 3),
    'slides_to_show_md'             => (float)$widget->get_setting('col_md', 3),
    'slides_to_show_sm'             => (float)$widget->get_setting('col_sm', 2),
    'slides_to_show_xs'             => (float)$widget->get_setting('col_xs', 1),
    'slides_to_scroll'              => (int)$widget->get_setting('slides_to_scroll', 1),
    'slides_gutter'                 => (int)$gutter,
    'center_slide'                  => (bool)$widget->get_setting('center_slide', false),
    'arrow'                         => $arrows,
    'dots'                          => $dots,
    'dots_style'                    => 'bullets',
    'autoplay'                      => (bool)$widget->get_setting('autoplay', false),
    'pause_on_hover'                => (bool)$widget->get_setting('pause_on_hover', false),
    'pause_on_interaction'          => true,
    'delay'                         => (int)$widget->get_setting('autoplay_speed', 5000),
    'loop'                          => (bool)$widget->get_setting('infinite', false),
    'speed'                         => (int)$widget->get_setting('speed', 500)
];

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container products',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
$img_size = !empty( $img_size ) ? $img_size : '486x600';
if ( ! empty( $settings['loadmore_link']['url'] ) ) {
    $widget->add_render_attribute( 'loadmore', 'href', $settings['loadmore_link']['url'] );
    if ( $settings['loadmore_link']['is_external'] ) {
        $widget->add_render_attribute( 'loadmore', 'target', '_blank' );
    }
    if ( $settings['loadmore_link']['nofollow'] ) {
        $widget->add_render_attribute( 'loadmore', 'rel', 'nofollow' );
    }
    $loadmore_text = !empty( $loadmore_text ) ? $loadmore_text : esc_html__( 'Load More', 'basilico' );
    $widget->add_render_attribute( 'loadmore', 'class', 'btn');
}

$data_settings = $item_anm_cls = '';
if ( !empty( $item_animation) ) {

    $item_anm_cls= ' pxl-animate pxl-invisible animated-'.$item_animation_duration;
    $item_animation_delay = !empty($item_animation_delay) ? $item_animation_delay : '150';
    $data_animations = [
        'animation' => $item_animation,
        'animation_delay' => (float)$item_animation_delay
    ];
}
?>
<?php if(!empty($posts) && count($posts)): ?>
<div class="pxl-swiper-slider pxl-product-carousel pxl-shop-<?php echo esc_attr($product_layout); ?>">
    <div class="pxl-swiper-slider-wrap pxl-carousel-inner relative">
        <?php if ($product_layout == 'layout-4') : ?>
            <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><?php echo esc_html('Previous', 'basilico'); ?></div>
        <?php endif; ?>
        <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
            <div class="pxl-swiper-wrapper swiper-wrapper">
                <?php
                while ($query->have_posts()) {
                    $query->the_post();
                    echo '<div class="pxl-swiper-slide swiper-slide">';
                    wc_get_template_part( 'pxl-content-product', esc_attr($product_layout) );
                    echo '</div>';
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <?php if ($product_layout == 'layout-4') : ?>
            <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><?php echo esc_html('Next', 'basilico'); ?></div>
        <?php endif; ?>
        <?php if($arrows !== 'false' && $product_layout != 'layout-4'): ?>
            <div class="pxl-swiper-arrows <?php echo esc_attr($arrows_style);?>">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                    <?php 
                    if ( $settings['arrow_icon_next']['value'] ) 
                        \Elementor\Icons_Manager::render_icon( $settings['arrow_icon_next'], [ 'aria-hidden' => 'true', 'class' => 'pxl-icon'], 'span' );
                    else
                        echo '<span class="pxl-icon pxli-arrow-right"></span>';
                    ?>
                </div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev">
                    <?php 
                    if ( $settings['arrow_icon_previous']['value'] ) 
                        \Elementor\Icons_Manager::render_icon( $settings['arrow_icon_previous'], [ 'aria-hidden' => 'true', 'class' => 'pxl-icon'], 'span' );
                    else
                        echo '<span class="pxl-icon pxli-arrow-left"></span>';
                    ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if($dots !== 'false'): ?>
            <div class="pxl-swiper-dots"></div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>