<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_testimonial_carousel',
        'title' => esc_html__('PXL Testimonial Carousel', 'basilico'),
        'icon' => 'eicon-blockquote',
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
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_testimonial_carousel-1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_testimonial_carousel-2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__( 'Layout 3', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_testimonial_carousel-3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__( 'Layout 4', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_testimonial_carousel-4.jpg'
                                ],
                                '5' => [
                                    'label' => esc_html__( 'Layout 5', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_testimonial_carousel-5.jpg'
                                ],
                                '6' => [
                                    'label' => esc_html__( 'Layout 6', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_testimonial_carousel-6.jpg'
                                ],
                            ],
                            'prefix_class' => 'pxl-testimonial-carousel-layout-',
                        ),
                        
                    ),
                ),
                array(
                    'name' => 'section_list',
                    'label' => esc_html__('Content', 'basilico'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'content_list',
                            'label' => esc_html__('Testimonial Items', 'basilico'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'basilico' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Name', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'position',
                                    'label' => esc_html__('Position', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'testimonial_title',
                                    'label' => esc_html__('Title', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'description' => esc_html('Use for Layout 2', 'basilico'),
                                ),
                                array(
                                    'name' => 'description',
                                    'label' => esc_html__('Description', 'basilico' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                ),
                                array(
                                    'name' => 'rating',
                                    'label' => esc_html__('Rating', 'basilico' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => 'none',
                                    'options' => [
                                        'none' => esc_html__('None', 'basilico' ),
                                        'star1' => esc_html__('1 Star', 'basilico' ),
                                        'star2' => esc_html__('2 Star', 'basilico' ),
                                        'star3' => esc_html__('3 Star', 'basilico' ),
                                        'star4' => esc_html__('4 Star', 'basilico' ),
                                        'star5' => esc_html__('5 Star', 'basilico' ),
                                    ],
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                        array(
                            'name' => 'show_button',
                            'label' => esc_html__('Show Button', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'condition' => [
                                'layout' => '6'
                            ]
                        ),
                        array(
                            'name'        => 'button_link',
                            'label'       => esc_html__( 'Button Link', 'basilico' ),
                            'type'        => \Elementor\Controls_Manager::URL,
                            'placeholder' => esc_html__( 'https://your-link.com', 'basilico' ),
                            'default'     => [
                                'url'         => '#',
                                'is_external' => 'on'
                            ],
                            'condition' => [
                                'layout' => '6',
                                'show_button' => 'true'
                            ]
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
                                'name' => 'dots',
                                'label' => esc_html__('Show Dots', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'dots_color',
                                'label' => esc_html__('Dots Color', 'basilico'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-dots .pxl-swiper-pagination-bullet:before' => 'background-color: {{VALUE}};',
                                    '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-dots .pxl-swiper-pagination-bullet:after' => 'border-color: {{VALUE}};',
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
                                    '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-dots .pxl-swiper-pagination-bullet.swiper-pagination-bullet-active:before' => 'background-color: {{VALUE}};',
                                    '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-dots .pxl-swiper-pagination-bullet.swiper-pagination-bullet-active:after' => 'border-color: {{VALUE}};',
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
                array(
                    'name' => 'style_section',
                    'label' => esc_html__('Style', 'basilico' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'quote_icon_type',
                            'label' => esc_html__('Select Icon Type', 'basilico'),
                            'type' => 'select',
                            'options' => [
                                'text' => esc_html__('Default', 'basilico'),
                                'icon' => esc_html__('Icon', 'basilico'),
                            ],
                            'default' => 'text' 
                        ),
                        array(
                            'name' => 'selected_icon',
                            'label' => esc_html__('Quote Icon', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'quote_icon_type' => 'icon'
                            ]                            
                        ),
                        array(
                            'name' => 'quote_typography',
                            'label' => esc_html__('Icon Typography', 'basilico' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .item-quote-icon',
                            'condition' => [
                                'quote_icon_type' => 'text'
                            ]
                        ),
                        array(
                            'name' => 'quote_color',
                            'label' => esc_html__('Quote Icon Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .item-quote-icon' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__('Background Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Name Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .item-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'testimonial_color',
                            'label' => esc_html__('Title Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .testimonial-title' => 'color: {{VALUE}};',
                            ],
                            'condition' => ['layout' => ['2', '3', '4']]
                        ),
                        array(
                            'name' => 'position_color',
                            'label' => esc_html__('Position Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .item-position' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'description_color',
                            'label' => esc_html__('Description Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .item-desc' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'max_width',
                            'label' => esc_html__('Description Max Width', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 300,
                                    'max' => 1500,
                                ],
                            ],
                            'condition' => ['layout' => '2'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-slide .item-desc' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    basilico_get_class_widget_path()
);