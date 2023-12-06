<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_banner_carousel',
        'title' => esc_html__('PXL Banner Carousel', 'basilico'),
        'icon' => 'eicon-post-slider',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'swiper',
            'basilico-swiper',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__('Layout', 'basilico' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Layout', 'basilico' ),
                            'type'    => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_banner_carousel-1.jpg'
                                ],
                            ],
                        ),
                        
                    ),
                ),
                array(
                    'name' => 'section_banners',
                    'label' => esc_html__('Banner Settings', 'basilico'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'banners',
                            'label' => esc_html__('', 'basilico'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name'        => 'item_background',
                                    'label'       => esc_html__('Item Background', 'basilico'),
                                    'type'        => 'media',
                                    'label_block' => true,
                                ),
                                array(
                                    'name'        => 'item_img',
                                    'label'       => esc_html__('Item Image', 'basilico'),
                                    'type'        => 'media',
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'title_text',
                                    'label' => esc_html__('Title', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'default' => esc_html__('This is the heading', 'basilico'),
                                    'placeholder' => esc_html__('Enter your title', 'basilico'),
                                    'rows' => 3,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'description_text',
                                    'label' => esc_html__('Description', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'default' => esc_html__('Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'basilico'),
                                    'placeholder' => esc_html__('Enter your description', 'basilico'),
                                    'rows' => 6,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'button_text',
                                    'label' => esc_html__('Button Text', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name'        => 'link',
                                    'label'       => esc_html__( 'Custom Link', 'basilico' ),
                                    'type'        => 'url',
                                    'placeholder' => esc_html__( 'https://your-link.com', 'basilico' ),
                                    'default'     => [
                                        'url'         => '#',
                                        'is_external' => 'on'
                                    ],
                                ),
                                array(
                                    'name' => 'nav_text',
                                    'label' => esc_html__('Navigation Text', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                            ),
                        ),
                        array(
                            'name' => 'heading_color',
                            'label' => esc_html__('Heading Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-banner-carousel .item-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__('Description Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-banner-carousel .item-description' => 'color: {{VALUE}};',
                            ],
                        ),
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
                                'name' => 'nav',
                                'label' => esc_html__('Show Navigation', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
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