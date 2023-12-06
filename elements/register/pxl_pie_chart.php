<?php
//Register Counter Widget
 pxl_add_custom_widget(
    array(
        'name'       => 'pxl_pie_chart',
        'title'      => esc_html__('PXL Pie Chart', 'basilico'),
        'icon' => 'far fa-chart-pie-alt',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'pie-chart',
            'pxl-pie-chart',
            'jquery-numerator',
            'basilico-counter',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'basilico' ),
                    'tab'      => 'layout',
                    'controls' => array(
                        array(
                            'name'         => 'layout',
                            'label'        => esc_html__( 'Templates', 'basilico' ),
                            'type'         => 'layoutcontrol',
                            'default'      => '1',
                            'options'      => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_pie_chart-1.jpg'
                                ],
                            ],
                            'prefix_class' => 'pxl-counter-layout',
                        ) 
                    ),
                ),
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__('Content', 'basilico'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'basilico'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'percentage_value',
                            'label' => esc_html__('Percentage Value', 'basilico'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'min' => 1,
                            'max' => 100,
                            'step' => 1,
                            'default' => 50,
                        ),
                        array(
                            'name' => 'chart_size',
                            'label' => esc_html__('Chart Size', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 190,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1170,
                                ],
                            ],
                        ),
                        array(
                            'name' => 'counter_number',
                            'label' => esc_html__('Counter Number', 'basilico'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 100,
                            'condition' => [
                                'layout' => ['1','2'],
                            ],
                        ),
                        array(
                            'name' => 'counter_suffix',
                            'label' => esc_html__('Counter Suffix', 'basilico'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                            'condition' => [
                                'layout' => ['1','2'],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_title',
                    'label' => esc_html__('Title', 'basilico'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pie-chart .pxl-item-title' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-pie-chart .pxl-item-title span' => 'text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'basilico' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pie-chart .pxl-item-title',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_percentage',
                    'label' => esc_html__('Percentage', 'basilico'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'bar_color_start',
                            'label' => esc_html__('Bar Color Start', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#36dece',
                        ),
                        array(
                            'name' => 'bar_color_end',
                            'label' => esc_html__('Bar Color End', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#43abdf',
                        ),
                        array(
                            'name' => 'track_color',
                            'label' => esc_html__('Track Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pie-chart .pxl-item-divider' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'chart_line_width',
                            'label' => esc_html__('Chart Line Width', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 18,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pie-chart .pxl-item-divider' => 'border-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'chart_line_cap',
                            'label' => esc_html__('Chart Line Cap', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'square' => 'Square',
                                'round' => 'Round',
                            ],
                            'default' => 'square',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_counter',
                    'label' => esc_html__('Counter', 'basilico'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'counter_color',
                            'label' => esc_html__('Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pie-chart .pxl-counter-number' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'counter_typography',
                            'label' => esc_html__('Typography', 'basilico' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pie-chart .pxl-counter-number',
                        ),
                    ),
                ),
            )
        )
    ),
    basilico_get_class_widget_path()
);