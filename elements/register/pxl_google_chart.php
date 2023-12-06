<?php
//Register Counter Widget
 pxl_add_custom_widget(
    array(
        'name'       => 'pxl_google_chart',
        'title'      => esc_html__('PXL Google Chart', 'basilico'),
        'icon'       => 'fa fa-pie-chart',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'google-chart',
            'basilico-google-chart',
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
                            'description' => esc_html__('Get data from: https://developers.google.com/chart/interactive/docs/gallery', 'basilico'),
                            'type'         => 'layoutcontrol',
                            'default'      => '1',
                            'options'      => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_google_chart-1.jpg'
                                ],
                            ],
                            'prefix_class' => 'pxl-chart-layout',
                        )
                    ),
                ),
                array(
                    'name' => 'settings_section',
                    'label' => esc_html__('Settings', 'basilico' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'chart_types',
                            'label' => esc_html__('Chart Types', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'Area' => esc_html__( 'Area Charts', 'basilico' ),
                                'Pie' => esc_html__( 'Pie Charts', 'basilico' ),
                                'Line' => esc_html__( 'Line Charts', 'basilico' ),
                                'Combo' => esc_html__( 'Combo Charts', 'basilico' ),
                            ],
                            'default' => 'Area',
                        ),
                        array(
                            'name' => 'chart_data',
                            'label' => esc_html__( 'Chart Data', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::CODE,
                            'language' => 'html',
                            'default' => '["Year", "Sales", "Expenses"],["2013", 1000, 400],["2014", 1170, 460],["2015", 660, 1120],["2016", 1030, 540]'
                        ),
                        array(
                            'name' => 'chart_options',
                            'label' => esc_html__( 'Chart Options', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::CODE,
                            'language' => 'html',
                            'default'  => 'title: "Company Performance", hAxis: { titleTextStyle: {color: "#333"}}, vAxis: {minValue: 0}'
                        ),
                        array(
                            'name' => 'width',
                            'label' => esc_html__( 'Width', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '100%',
                            'description' => esc_html__('Width of chart with % or pixel, default is 100%', 'basilico')
                        ),
                        array(
                            'name' => 'height',
                            'label' => esc_html__( 'Height', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '500px',
                            'description' => esc_html__('Height of chart with pixel, default is 500px', 'basilico')
                        ),
                    ),
                ),
            )
        )
    ),
    basilico_get_class_widget_path()
);