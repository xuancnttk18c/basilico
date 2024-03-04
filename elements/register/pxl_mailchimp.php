<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_mailchimp',
        'title' => esc_html__('PXL Mailchimp', 'basilico'),
        'icon' => 'eicon-email-field',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_opt',
                    'label' => esc_html__('Options', 'basilico'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => esc_html__('Default', 'basilico' ),
                                'style-2'       => esc_html__('Style 2', 'basilico' ),
                            ],
                            'default' => 'style-default',
                        ),
                        array(
                            'name' => 'hide_icon',
                            'label' => esc_html__('Hide Icon?', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'hide_button_text',
                            'label' => esc_html__('Hide Button Text?', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                    ),
                ),
                array(
                    'name' => 'style_input',
                    'label' => esc_html__('Input', 'basilico'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'mc_style_input_tabs',
                            'control_type' => 'tab',
                            'tabs' => array(
                                array(
                                    'name' => 'input_style_normal',
                                    'label' => esc_html__('Normal', 'basilico'),
                                    'controls' => array(
                                        array(
                                            'name' => 'input_background',
                                            'label' => esc_html__('Input Background', 'basilico' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .mailchimp-form input:not([type="submit"]):not(type="checkbox")' => 'background-color: {{VALUE}} !important;',
                                            ],
                                        ),
                                        array(
                                            'name' => 'input_text_color',
                                            'label' => esc_html__('Input Text Color', 'basilico' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .mailchimp-form input:not([type="submit"]):not(type="checkbox"), {{WRAPPER}} .mailchimp-form input:not([type="submit"]):not(type="checkbox")::placeholder' => 'color: {{VALUE}} !important;',
                                            ],
                                        ),
                                        array(
                                            'name' => 'input_border_color',
                                            'label' => esc_html__('Input Border Color', 'basilico' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .mailchimp-form input:not([type="submit"])' => 'border-color: {{VALUE}} !important;',
                                            ],
                                        ),
                                        array(
                                            'name' => 'input_border_radius',
                                            'label' => esc_html__('Input Border Radius', 'basilico' ),
                                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                            'size_units' => [ 'px', 'em' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .mailchimp-form input[type="text"], {{WRAPPER}} .mailchimp-form input[type="password"], {{WRAPPER}} .mailchimp-form input[type="email"], {{WRAPPER}} .mailchimp-form input[type="phone"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    )
                                ),
                                array(
                                    'name' => 'input_style_hover',
                                    'label' => esc_html__('Hover', 'basilico'),
                                    'controls' => array(
                                        array(
                                            'name' => 'input_background_hover',
                                            'label' => esc_html__('Input Background Hover/Focus', 'basilico' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .mailchimp-form input:not(type="submit"):not(type="checkbox"):hover, {{WRAPPER}} .mailchimp-form input:focus' => 'background-color: {{VALUE}} !important;',
                                            ],
                                        ),
                                    )
                                ),
                            )
                        ),
                    ),
                ),
                array(
                    'name' => 'style_button',
                    'label' => esc_html__('Button', 'basilico'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'mc_style_btn_tabs',
                            'control_type' => 'tab',
                            'tabs' => array(
                                array(
                                    'name' => 'btn_style_normal',
                                    'label' => esc_html__('Normal', 'basilico'),
                                    'controls' => array(
                                        array(
                                            'name' => 'typography',
                                            'label' => esc_html__('Button Typography', 'basilico' ),
                                            'type' => \Elementor\Group_Control_Typography::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .mailchimp-form button, {{WRAPPER}} .mailchimp-form input[type="submit"]',
                                        ),
                                        array(
                                            'name' => 'btn_background',
                                            'label' => esc_html__('Background Color', 'basilico' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .mailchimp-form button, {{WRAPPER}} .mailchimp-form input[type="submit"]' => 'background-color: {{VALUE}} !important;',
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_color',
                                            'label' => esc_html__('Text Color', 'basilico' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .mailchimp-form button' => 'color: {{VALUE}} !important;',
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_icon_color',
                                            'label' => esc_html__('Icon Color', 'basilico' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .mailchimp-form button i' => 'color: {{VALUE}} !important;',
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_width',
                                            'label' => esc_html__('Width (px)', 'basilico' ),
                                            'type' => \Elementor\Controls_Manager::NUMBER,
                                            'selectors' => [
                                                '{{WRAPPER}} .mailchimp-form button, {{WRAPPER}} .mailchimp-form input[type="submit"]' => 'width: {{VALUE}}px !important; padding: 0 !important;',
                                            ],
                                            'separator' => 'before'
                                        ),
                                        array(
                                            'name' => 'btn_distance',
                                            'label' => esc_html__('Distance To Input Border (px)', 'basilico' ),
                                            'type' => \Elementor\Controls_Manager::NUMBER,
                                            'selectors' => [
                                                '{{WRAPPER}} .mailchimp-form button, {{WRAPPER}} .mailchimp-form input[type="submit"]' => 'top: {{VALUE}}px; right: {{VALUE}}px; height: calc( var(--input-height) - ({{VALUE}}px * 2) );',
                                            ],
                                            'control_type' => 'responsive',
                                            'condition' => [
                                                'style' => 'style-2'
                                            ]
                                        ),
                                        array(
                                            'name' => 'border_type',
                                            'label' => esc_html__( 'Border Type', 'basilico' ),
                                            'type' => \Elementor\Controls_Manager::SELECT,
                                            'separator' => 'before',
                                            'options' => [
                                                '' => esc_html__( 'None', 'basilico' ),
                                                'solid' => esc_html__( 'Solid', 'basilico' ),
                                                'double' => esc_html__( 'Double', 'basilico' ),
                                                'dotted' => esc_html__( 'Dotted', 'basilico' ),
                                                'dashed' => esc_html__( 'Dashed', 'basilico' ),
                                                'groove' => esc_html__( 'Groove', 'basilico' ),
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .mailchimp-form button, {{WRAPPER}} .mailchimp-form input[type="submit"]' => 'border-style: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'border_width',
                                            'label' => esc_html__( 'Border Width', 'basilico' ),
                                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                            'selectors' => [
                                                '{{WRAPPER}} .mailchimp-form button, {{WRAPPER}} .mailchimp-form input[type="submit"]' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                            'responsive' => true,
                                        ),
                                        array(
                                            'name' => 'border_color',
                                            'label' => esc_html__( 'Border Color', 'basilico' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'default' => '',
                                            'selectors' => [
                                                '{{WRAPPER}} .mailchimp-form button, {{WRAPPER}} .mailchimp-form input[type="submit"]' => 'border-color: {{VALUE}};'
                                            ],
                                            'condition' => [
                                                'border_type!' => '',
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_border_radius',
                                            'label' => esc_html__('Border Radius', 'basilico' ),
                                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                            'size_units' => [ 'px' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .mailchimp-form button, {{WRAPPER}} .mailchimp-form input[type="submit"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                            'control_type' => 'responsive',
                                        ),
                                    )
                                ),
                                array(
                                    'name' => 'btn_style_hover',
                                    'label' => esc_html__('Hover', 'basilico'),
                                    'controls' => array(
                                        array(
                                            'name' => 'btn_hover_background',
                                            'label' => esc_html__('Button Hover Background', 'basilico' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .mailchimp-form button:hover, {{WRAPPER}} .mailchimp-form input[type="submit"]:hover' => 'background-color: {{VALUE}} !important;',
                                            ],
                                        ),
                                    )
                                ),
                            )
                        ),
                    ),
                ),
            ),
        ),
    ),
    basilico_get_class_widget_path()
);