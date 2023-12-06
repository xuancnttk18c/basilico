<?php
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_circle_tabs',
        'title'      => esc_html__( 'PXL Circle Tabs', 'basilico' ),
        'icon'       => 'eicon-spotify',
        'categories' => array('pxltheme-core'),
        'scripts' => [
          'basilico-tabs',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'basilico' ),
                    'tab'      => 'layout',
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Layout', 'basilico' ),
                            'type'    => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_circle_tabs-1.jpg'
                                ],
                            ],
                            'prefix_class' => 'pxl-circle-tabs-layout-',
                        ),
                    )
                ),
                array(
                    'name'     => 'content_section',
                    'label'    => esc_html__( 'Content', 'basilico' ),
                    'tab'      => 'content',
                    'controls' => array(
                        array(
                            'name' => 'active_tab',
                            'label' => esc_html__( 'Active Tab', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 1,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'tabs_list',
                            'label' => esc_html__('Tabs List', 'basilico'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name'             => 'tab_icon',
                                    'label'            => esc_html__( 'Icon', 'basilico' ),
                                    'type'             => 'icons',
                                    'fa4compatibility' => 'social',
                                    'default'          => [],
                                ),
                                array(
                                    'name' => 'tab_title',
                                    'label' => esc_html__('Title', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'tab_content',
                                    'label' => esc_html__('Enter Content', 'basilico'),
                                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                                    'default' => '',
                                ),
                            ),
                            'title_field' => '{{{ tab_title }}}',
                        ),
                        array(
                            'name'  => 'circle_size',
                            'label' => esc_html__( 'Circle Size (px)', 'basilico' ),
                            'type'  => 'slider',
                            'range' => [
                                'px' => [
                                    'min' => 200,
                                    'max' => 2000,
                                ],
                            ],
                        ),
                        array(
                            'name'  => 'item_size',
                            'label' => esc_html__( 'Icon Item Size (px)', 'basilico' ),
                            'type'  => 'slider',
                            'range' => [
                                'px' => [
                                    'min' => 50,
                                    'max' => 500,
                                ],
                            ],
                        ),
                        array(
                            'name' => 'icon_background',
                            'label' => esc_html__('Icon Background', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle-tabs .tab-icon' => 'background-color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'icon_active_background',
                            'label' => esc_html__('Icon Active Background', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle-tabs .tab-icon.active' => 'background-color: {{VALUE}}; border-color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .tab-title' => 'color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'content_color',
                            'label' => esc_html__('Content Color', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .tab-content' => 'color: {{VALUE}};'
                            ],
                        ),
                    ),
                )
            )
        )
    ),
    basilico_get_class_widget_path()
);