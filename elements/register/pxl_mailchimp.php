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
                                            'size_units' => [ 'px' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .mailchimp-form input:not([type="submit"]):not(type="checkbox")' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                            'name' => 'btn_background',
                                            'label' => esc_html__('Button Background', 'basilico' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .mailchimp-form button, {{WRAPPER}} .mailchimp-form input[type="submit"]' => 'background-color: {{VALUE}} !important;',
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_color',
                                            'label' => esc_html__('Button Color', 'basilico' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .mailchimp-form button' => 'color: {{VALUE}} !important;',
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_icon_color',
                                            'label' => esc_html__('Button Icon Color', 'basilico' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .mailchimp-form button i' => 'color: {{VALUE}} !important;',
                                            ],
                                        ),
                                    )
                                ),
                                array(
                                    'name' => 'mc_style_hover',
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