<?php
global $wp_registered_sidebars;
$options = [];

if ( ! $wp_registered_sidebars ) {
    $options[''] = esc_html__( 'No sidebars were found', 'elementor' );
} else {
    $options[''] = esc_html__( 'Choose Sidebar', 'elementor' );

    foreach ( $wp_registered_sidebars as $sidebar_id => $sidebar ) {
        $options[ $sidebar_id ] = $sidebar['name'];
    }
}

$default_key = array_keys( $options );
$default_key = array_shift( $default_key );

pxl_add_custom_widget(
    array(
        'name'       => 'pxl_sidebar',
        'title'      => esc_html__( 'PXL Sidebar', 'basilico' ),
        'icon' => 'eicon-nav-menu',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'content_section',
                    'label'    => esc_html__( 'Content', 'basilico' ),
                    'tab'      => 'content',
                    'controls' => array(
                        array(
                            'name' => 'sidebar',
                            'label' => esc_html__( 'Choose Sidebar', 'elementor' ),
                            'type' => Controls_Manager::SELECT,
                            'default' => $default_key,
                            'options' => $options,
                        )
                    ),
                )
            )
        )
    ),
    basilico_get_class_widget_path()
);