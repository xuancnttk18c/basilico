<?php
$pt_supports = ['post', 'portfolio'];
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_product_list',
        'title'      => esc_html__('PXL Product List', 'basilico'),
        'icon' => 'eicon-slider-push',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__('Layout', 'basilico'),
                    'tab'      => 'layout',
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__('Templates', 'basilico'),
                            'type'    => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'basilico'),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_product_list-1.jpg'
                                ],
                            ],
                            'prefix_class' => 'pxl-product-carousel-layout-'
                        )
                    )
                ),

                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source', 'basilico'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'    => 'query_type',
                            'label'   => esc_html__('Select Query Type', 'basilico'),
                            'type'    => 'select',
                            'default' => 'recent_product',
                            'options' => [
                                'recent_product'   => esc_html__('Recent Products', 'basilico'),
                                'best_selling'     => esc_html__('Best Selling', 'basilico'),
                                'featured_product' => esc_html__('Featured Products', 'basilico'),
                                'top_rate'         => esc_html__('High Rate', 'basilico'),
                                'on_sale'          => esc_html__('On Sale', 'basilico'),
                                'recent_review'    => esc_html__('Recent Review', 'basilico'),
                                'deals'            => esc_html__('Product Deals', 'basilico'),
                                'separate'         => esc_html__('Product separate', 'basilico'),
                            ]
                        ),
                        array(
                            'name'     => 'taxonomies',
                            'label'    => esc_html__('Select Term of Product', 'basilico'),
                            'type'     => 'select2',
                            'multiple' => true,
                            'options'  => pxl_get_product_grid_term_options()
                        ),
                        array(
                            'name'     => 'product_ids',
                            'label'    => esc_html__('Products id (123,124,135...)', 'basilico'),
                            'type'     => 'text',
                            'default'  => '',
                            'condition' => array('query_type' => 'separate')
                        ),
                        array(
                            'name'     => 'post_per_page',
                            'label'    => esc_html__('Post per page', 'basilico'),
                            'type'     => 'text',
                            'default'  => '10'
                        )
                    ),
                ),
            ),
        ),
    ),
    basilico_get_class_widget_path()
);
