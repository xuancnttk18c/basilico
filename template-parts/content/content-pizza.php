<?php

/**
 * @package Basilico
 */

$archive_readmore = basilico()->get_theme_opt('archive_readmore', '0');
$archive_readmore_text = basilico()->get_theme_opt('archive_readmore_text', esc_html__('Continue reading', 'basilico'));
$post_social_share = basilico()->get_theme_opt('post_social_share', false);
$featured_video = get_post_meta(get_the_ID(), 'featured-video-url', true);
$audio_url = get_post_meta(get_the_ID(), 'featured-audio-url', true);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('pxl-archive-post row'); ?>>
    <?php if (has_post_thumbnail()) { ?>
        <div class="post-featured col-5">
            <div class="post-image">
                <a href="<?php echo esc_url(get_permalink()); ?>">
                    <?php basilico()->blog->get_post_feature(); ?>
                </a>
            </div>
        </div>
    <?php } ?>
    <div class="post-content <?php echo has_post_thumbnail() ? 'col-7' : ''; ?>">
        <?php basilico()->blog->get_archive_meta_luxury(); ?>
        <h2 class="post-title">
            <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
                <?php if (is_sticky()) { ?>
                    <i class="pxli-thumbtack"></i>
                <?php } ?>
                <?php the_title(); ?>
            </a>
        </h2>
        <div class="post-excerpt">
            <?php
            basilico()->blog->get_excerpt(40);
            wp_link_pages(array(
                'before'      => '<div class="page-links">',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ));
            ?>
        </div>
        <?php if ($archive_readmore == '1') : ?>
            <div class="button-share d-flex align-items-center">
                <?php
                if ($archive_readmore == '1') {
                    ?>
                    <div class="post-btn-wrap pxl-button-wrapper col-sm-6">
                        <a class="btn btn-primary" href="<?php echo esc_url(get_permalink()); ?>">
                            <span><?php echo esc_html($archive_readmore_text); ?></span>
                            <i class="zmdi zmdi-long-arrow-right"></i>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
        <?php endif; ?>
    </div>
</article>