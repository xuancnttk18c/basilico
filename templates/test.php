<?php
/* 
 * Template Name: Test
 * Template Post Type: post
 */

get_header();
echo 'hkjdjfkhafjkhasfjhsajkf';

$theme_style = basilico()->get_theme_opt('theme_style', 'default');
$pxl_sidebar = basilico()->get_sidebar_args(['type' => 'post', 'content_col' => '8']); // type: blog, post, page, shop, product
?>
    <div class="container">
        <div class="row <?php echo esc_attr($pxl_sidebar['wrap_class']) ?>">
            <div id="pxl-content-area" class="<?php echo esc_attr($pxl_sidebar['content_class']) ?>">
                <main id="pxl-content-main" class="pxl-content-main">
                    <?php while (have_posts()) {
                        the_post();
                        switch ($theme_style) {
                            case 'pxl-luxury':
                                get_template_part('template-parts/content/content-single-luxury', get_post_format());    
                                break;
                            case 'pxl-pizza':
                                get_template_part('template-parts/content/content-single-pizza', get_post_format());    
                                break;
                            default:
                                get_template_part('template-parts/content/content-single', get_post_format());
                        }
                        if (comments_open() || get_comments_number()) {
                            comments_template();
                        }
                    } ?>
                </main>
            </div>
            <?php if ($pxl_sidebar['sidebar_class']) : ?>
                <div id="pxl-sidebar-area" class="<?php echo esc_attr($pxl_sidebar['sidebar_class']) ?>">
                    <div class="sidebar-sticky-wrap">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer();
