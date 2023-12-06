<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_menu_list',
        'title' => esc_html__('PXL Menu List', 'basilico' ),
        'icon' => 'eicon-bullet-list',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'basilico' ),
                    'tab'      => 'layout',
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Templates', 'basilico' ),
                            'type'    => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_menu_list-1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_menu_list-2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__( 'Layout 1', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_menu_list-3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__( 'Layout 1', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_menu_list-4.jpg'
                                ],
                                '5' => [
                                    'label' => esc_html__( 'Layout 1', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_menu_list-5.jpg'
                                ],
                            ],
                        )
                    )
                ),
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__( 'Content', 'basilico' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'list',
                            'label' => esc_html__('Items', 'basilico'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'selected_img',
                                    'label' => esc_html__('Image', 'basilico' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'default' => '',
                                    'description' => esc_html__('This is the heading', 'basilico' )
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'default' => esc_html__('This is the heading', 'basilico' )
                                ),
                                array(
                                    'name' => 'sub_title',
                                    'label' => esc_html__('Sub Title', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'price',
                                    'label' => esc_html__('Price', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'default' => esc_html__('$25', 'basilico' )
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Item Link', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'tag_1',
                                    'label' => esc_html__('Show Custom Tag 1 (Optional)', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::SWITCHER,
                                    'return_value' => 'yes',
                                    'default' => 'no'
                                ),
                                array(
                                    'name' => 'tag_1_text',
                                    'label' => esc_html__('Custom Tag 1 Text', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'default' => esc_html__('Recommended', 'basilico'),
                                    'label_block' => true,
                                    'condition' => [
                                        'tag_1' => 'yes'
                                    ]
                                ),
                                array(
                                    'name' => 'tag_1_color',
                                    'label' => esc_html__('Custom Tag 1 Color', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'default' => '#374ccb',
                                    'condition' => [
                                        'tag_1' => 'yes'
                                    ]
                                ),
                                array(
                                    'name' => 'tag_2',
                                    'label' => esc_html__('Show Custom Tag 2 (Optional)', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::SWITCHER,
                                    'return_value' => 'yes',    
                                    'default' => 'no'
                                ),
                                array(
                                    'name' => 'tag_2_text',
                                    'label' => esc_html__('Custom Tag 2 Text', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'default' => esc_html__('Recommended', 'basilico'),
                                    'label_block' => true,
                                    'condition' => [
                                        'tag_2' => 'yes'
                                    ]
                                ),
                                array(
                                    'name' => 'tag_2_color',
                                    'label' => esc_html__('Custom Tag 2 Color', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'default' => '#8560a8',
                                    'condition' => [
                                        'tag_2' => 'yes'
                                    ]
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style',
                    'label' => esc_html__('Style', 'basilico' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'img_position',
                            'label' => esc_html__('Image Position', 'basilico'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options'       => [
                                'df'   => esc_html__('Default', 'basilico'),
                                'absolute left'  => esc_html__('Absolute Left', 'basilico'),
                                'absolute right'  => esc_html__('Absolute Right', 'basilico'),
                            ],
                            'default'       => 'df',
                            'condition' => [
                                'layout' => ['1', '2', '3']
                            ]
                        ),
                        array(
                            'name' => 'heading_color',
                            'label' => esc_html__('Heading Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-menu-list .pxl-menu-item .menu-title' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-menu-list .pxl-menu-item .menu-title a' => 'color: {{VALUE}}; background-image: linear-gradient(transparent calc(100% - 1px), {{VALUE}} 1px);'
                            ],
                        ),
                        array(
                            'name' => 'heading_typography',
                            'label' => esc_html__('Heading Typography', 'basilico' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-menu-list .pxl-menu-item .menu-title',
                        ),
                        array(
                            'name' => 'sub_heading_color',
                            'label' => esc_html__('Sub Heading Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-menu-list .pxl-menu-item .menu-sub-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_heading_typography',
                            'label' => esc_html__('Sub Heading Typography', 'basilico' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-menu-list .pxl-menu-item .menu-sub-title',
                        ),
                        array(
                            'name' => 'price_color',
                            'label' => esc_html__('Price Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-menu-list .pxl-menu-item .menu-price' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'price_typography',
                            'label' => esc_html__('Price Typography', 'basilico' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-menu-list .pxl-menu-item .menu-price',
                        ),
                        array(
                            'name' => 'divider_position',
                            'label' => esc_html__('Divider Position', 'basilico' ),
                            'description' => esc_html__('Vertical deviation from the original position (Unit: px)', 'basilico'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-menu-list .pxl-menu-item .pxl-separator' => 'transform: translateY({{VALUE}}px);',
                            ],
                        ),
                        array(
                            'name' => 'divider_color',
                            'label' => esc_html__('Divider Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-menu-list .pxl-menu-item .pxl-separator' => 'border-color: {{VALUE}}; background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'item_spacing',
                            'label' => esc_html__('Item Space', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 150,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-menu-list .pxl-menu-item + .pxl-menu-item' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    basilico_get_class_widget_path()
);