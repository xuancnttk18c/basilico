<?php
/*
 * Template Name: Layout 1
 * Template Post Type: post
 */
   
get_header();

$pxl_sidebar = basilico()->get_sidebar_args(['type' => 'post', 'content_col' => '8']); // type: blog, post, page, shop, product
$pxl_sidebar_style = basilico()->get_theme_opt('sidebar_style', 'default');
?>
    <div class="container single-layout-1">
        <div class="row <?php echo esc_attr($pxl_sidebar['wrap_class']) ?>">
            <div id="pxl-content-area" class="<?php echo esc_attr($pxl_sidebar['content_class']) ?>">
                <main id="pxl-content-main" class="pxl-content-main">
                    <?php while (have_posts()) {
                        the_post();
                        get_template_part( 'template-parts/content/content-single-luxury', get_post_format() );
                        if (comments_open() || get_comments_number()) {
                            comments_template();
                        }
                    } ?>
                </main>
            </div>
            <?php if ($pxl_sidebar['sidebar_class']) : ?>
                <div id="pxl-sidebar-area" class="<?php echo esc_attr($pxl_sidebar['sidebar_class']); ?> <?php echo esc_attr($pxl_sidebar_style); ?>">
                    <div class="sidebar-sticky-wrap">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer();