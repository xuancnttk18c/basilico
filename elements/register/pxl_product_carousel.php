<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_product_carousel',
        'title' => esc_html__('PXL Product Carousel', 'basilico' ),
        'icon' => 'eicon-product-categories',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'basilico-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'basilico' ),
                    'tab'      => 'layout',
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'basilico' ),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_product_carousel-1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_product_carousel-2.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source', 'basilico' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'    => 'query_type',
                            'label'   => esc_html__( 'Select Query Type', 'basilico' ),
                            'type'    => 'select',
                            'default' => 'recent_product',
                            'options' => [
                                'recent_product'   => esc_html__( 'Recent Products', 'basilico' ),
                                'best_selling'     => esc_html__( 'Best Selling', 'basilico' ),
                                'featured_product' => esc_html__( 'Featured Products', 'basilico' ),
                                'top_rate'         => esc_html__( 'High Rate', 'basilico' ),
                                'on_sale'          => esc_html__( 'On Sale', 'basilico' ),
                                'recent_review'    => esc_html__( 'Recent Review', 'basilico' ),
                                'deals'            => esc_html__( 'Product Deals', 'basilico' ),
                                'separate'         => esc_html__( 'Product separate', 'basilico' ),
                            ]
                        ),
                        array(
                            'name'     => 'taxonomies',
                            'label'    => esc_html__( 'Select Term of Product', 'basilico' ),
                            'type'     => 'select2',
                            'multiple' => true,
                            'options'  => pxl_get_product_grid_term_options()
                        ),
                        array(
                            'name'     => 'product_ids',
                            'label'    => esc_html__( 'Products id (123,124,135...)', 'basilico' ),
                            'type'     => 'text',
                            'default'  => '',
                            'condition' => array( 'query_type' => 'separate' )
                        ),
                        array(
                            'name'     => 'post_per_page',
                            'label'    => esc_html__( 'Post per page', 'basilico' ),
                            'type'     => 'text',
                            'default'  => '6'
                        )
                    ),
                ),
                array(
                    'name' => 'carousel_setting',
                    'label' => esc_html__('Carousel Settings', 'basilico' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array_merge(
                        basilico_carousel_column_settings(),
                        array(
                            array(
                                'name' => 'slides_to_scroll',
                                'label' => esc_html__('Slides to scroll', 'basilico' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => '1',
                                'options' => [
                                    '1' => '1',
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4',
                                    '5' => '5',
                                    '6' => '6',
                                ],
                            ),
                            array(
                                'name' => 'arrows',
                                'label' => esc_html__('Show Arrows', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'arrows_on_hover',
                                'label' => esc_html__('Show Arrows on Hover', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                                'default' => 'false',
                                'condition' => [
                                    'post_type' => 'post',
                                    'layout_post' => ['post-1'],
                                    'arrows' => 'true'
                                ]
                            ),
                            array(
                                'name' => 'dots',
                                'label' => esc_html__('Show Dots', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'dots_color',
                                'label' => esc_html__('Dots Color', 'basilico'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-dots .pxl-swiper-pagination-bullet:after' => 'background-color: {{VALUE}};',
                                ],
                                'condition' => [
                                    'dots' => "true",
                                ],
                            ),
                            array(
                                'name' => 'dots_color_active',
                                'label' => esc_html__('Active Color', 'basilico'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-dots .pxl-swiper-pagination-bullet.swiper-pagination-bullet-active:after' => 'background-color: {{VALUE}};',
                                ],
                                'condition' => [
                                    'dots' => "true",
                                ],
                            ),
                            array(
                                'name' => 'pause_on_hover',
                                'label' => esc_html__('Pause on Hover', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'autoplay',
                                'label' => esc_html__('Autoplay', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'autoplay_speed',
                                'label' => esc_html__('Autoplay Speed', 'basilico'),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'default' => 5000,
                                'condition' => [
                                    'autoplay' => 'true'
                                ]
                            ),
                            array(
                                'name'         => 'gutter',
                                'label'        => esc_html__('Gutter', 'basilico' ),
                                'type'         => 'number',
                                'control_type' => 'responsive',
                                'default'      => 30
                            ),
                            array(
                                'name' => 'center_slide',
                                'label' => esc_html__('Center Slider', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                                'default' => false
                            ),
                            array(
                                'name' => 'infinite',
                                'label' => esc_html__('Infinite Loop', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'speed',
                                'label' => esc_html__('Animation Speed', 'basilico'),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'default' => 400,
                            ),
                        )
                    ),
                ),
            ),
        ),
    ),
    basilico_get_class_widget_path()
);