<?php
/**
 * @package Basilico
 * Template Name: With Navigation
 * Template Post Type: pxl-portfolio
 */
get_header();
if(class_exists('\Elementor\Plugin')){
    $id = get_the_ID();
    if ( is_singular() && \Elementor\Plugin::$instance->documents->get( $id )->is_built_with_elementor()) {
        $classes = 'elementor-container pxl-page-content';
    } else {
        $classes = 'container';
    }
} else {
    $classes = 'container';
}
?>
<div class="<?php echo esc_attr($classes);?> pxl-content-container container">
    <div class="row">
        <div id="pxl-content-area" class="col-12">
            <main id="pxl-content-main" class="pxl-content-main">
                <?php while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content/content','pxl-portfolio-nav' );
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                } ?>
            </main>
        </div>
    </div>
</div>
<?php get_footer();