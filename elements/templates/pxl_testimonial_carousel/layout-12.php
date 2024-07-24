<?php
$default_settings = [
    'content_list' => [],
];

$settings = array_merge($default_settings, $settings);
extract($settings);

$dots = $widget->get_setting('dots', 'false');

$pagination_style = basilico()->get_theme_opt('swiper_pagination_style', 'style-df');

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
    'slides_gutter'                 => 0,
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


$widget->add_render_attribute('carousel', [
    'class'         => 'pxl-swiper-container overflow-hidden',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
?>
<?php if (isset($content_list) && !empty($content_list) && count($content_list)) : ?>
<div class="pxl-swiper-slider pxl-testimonial-carousel layout-<?php echo esc_attr($settings['layout']) ?>">
    <div class="pxl-swiper-slider-wrap pxl-carousel-inner relative d-flex">
        <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><?php echo esc_html('Previous', 'basilico'); ?></div>
        <div <?php pxl_print_html($widget->get_render_attribute_string('carousel')); ?>>
            <?php if ($quote_icon_type == 'icon' && !empty($settings['selected_icon']['value'])) { ?>
                <div class="icon-wrapper">
                    <?php \Elementor\Icons_Manager::render_icon($settings['selected_icon'], ['aria-hidden' => 'true', 'class' => 'item-quote-icon pxl-icon'], 'i'); ?>
                </div>
            <?php } ?>
            <?php if ($quote_icon_type == 'text') { ?>
                <div class="item-quote-icon">“</div>
            <?php } ?>
            <div class="pxl-swiper-wrapper swiper-wrapper">
                <?php foreach ($content_list as $key => $value) :
                    $image       = isset($value['image']) ? $value['image'] : [];
                    $title       = isset($value['title']) ? $value['title'] : '';
                    $position    = isset($value['position']) ? $value['position'] : '';
                    $testimonial_title = isset($value['testimonial_title']) ? $value['testimonial_title'] : '';
                    $description = isset($value['description']) ? $value['description'] : '';
                    $thumbnail = '';
                    if (!empty($image['id'])) {
                        $img = pxl_get_image_by_size(array(
                            'attach_id'  => $image['id'],
                            'thumb_size' => 'full',
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail = $img['thumbnail'];
                    }
                    ?>
                    <div class="pxl-swiper-slide swiper-slide">
                        <div class="item-inner row">
                            <div class="item-image col-4" style="background-image: url(<?php echo esc_attr($image['id']) ? esc_url($image['url']) : ''; ?>); "></div>
                            <div class="item-content col-8">
                                <?php if (!empty($testimonial_title)) { ?>
                                    <h4 class="testimonial-title"><span><?php echo esc_html($testimonial_title); ?></span></h4>
                                <?php } ?>
                                <?php if (!empty($description)) : ?>
                                    <div class="item-desc"><?php echo pxl_print_html($description); ?></div>
                                <?php endif; ?>
                                <?php if (!empty($value['rating']) && $value['rating'] != 'none') : ?>
                                    <div class="item-rating-star">
                                        <div class="item-rating <?php echo esc_attr($value['rating']); ?>">
                                            <i class="pxli pxli-star1"></i>
                                            <i class="pxli pxli-star1"></i>
                                            <i class="pxli pxli-star1"></i>
                                            <i class="pxli pxli-star1"></i>
                                            <i class="pxli pxli-star1"></i>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($title)) : ?>
                                    <h4 class="item-title"><span><?php echo esc_html($title); ?></span></h4>
                                <?php endif; ?>
                                <?php if (!empty($description)) : ?>
                                    <div class="item-position"><?php echo esc_html($position); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><?php echo esc_html('Next', 'basilico'); ?></div>
        <?php if ($dots !== 'false') : ?>
            <div class="pxl-swiper-dots <?php echo esc_attr($pagination_style); ?>"></div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>