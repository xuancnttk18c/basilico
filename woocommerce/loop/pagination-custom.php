<?php

defined( 'ABSPATH' ) || exit;
 
$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );  
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
$format  = isset( $format ) ? $format : '';

$pagination_type = isset( $pagination_type ) ? $pagination_type : basilico()->get_theme_opt('shop_archive_pagin_type', '');
$pagination_style = basilico()->get_theme_opt('archive_pagination_style', 'style-df');
 
$class = isset( $class ) ? $class : '';
if( !empty($page_base_url) )
	$shop_base_url = $page_base_url;
else
	$shop_base_url = basilico()->woo->get_shop_active_filters_url();
 
$base  = esc_url_raw( add_query_arg( 'product-page', '%#%', $shop_base_url ) );

?>

<nav class="woocommerce-pagination <?php echo esc_attr( $pagination_type ); ?> <?php echo esc_attr( $pagination_style ); ?> <?php echo esc_attr( $class ); ?>" data-type="<?php echo esc_attr( $pagination_type ); ?>">
	<?php if ( $pagination_type == 'loadmore' ) :  
		$limit = isset( $limit ) ? $limit : basilico()->get_theme_opt('shop_archive_product_per_page', 9);
		$limit = isset( $_GET['product_per_page'] ) ? wc_clean( $_GET['product_per_page'] ) : $limit;
		$total_posts = isset( $total_posts ) ? $total_posts : wc_get_loop_prop( 'total' );

		$next_found = 0;
		$current_show = $limit * $current;
		if( $total_posts > 0 ){
			if($total_posts > ($current_show + $limit))
				$next_found = $limit;
			elseif($total_posts > $current_show)
				$next_found = $total_posts - $current_show;
			 
		}
		?>
		<?php if ( $total > $current ): ?>
			<?php 
			$load_more_url = add_query_arg( 'product-page', $current + 1, $shop_base_url ); 
			$loadmore_text = isset( $loadmore_text ) ? $loadmore_text : esc_html__( 'Load more', 'basilico' );
			?>
			<button data-url="<?php echo esc_url( $load_more_url ); ?>" class="pxl-loadmore pxl-shop-load-more pxl-load-more btn-alt">
				<span class="btn-text"><?php echo pxl_print_html($loadmore_text); ?> (<?php echo esc_html($next_found) ?>)</span>
				<span class="pxl-btn-icon pxli-spinner"></span>
			</button>
		<?php endif; ?>
	<?php elseif($pagination_type == 'infinite'): ?>
		<?php if ( $total > $current ): ?>
			<?php $load_more_url = add_query_arg( 'product-page', $current + 1, $shop_base_url ); ?>
			<span data-url="<?php echo esc_url( $load_more_url ); ?>" class="pxl-shop-infinite-btn pxl-shop-load-more spinner-box">
				<span class="circle-border">
					<span class="circle-core"></span>
				</span>
			</span>
		<?php endif; ?>
	<?php elseif($pagination_type == 'btn-all'): ?>
		<?php if ( $total_posts > $limit ): ?>
			<?php 
			$load_more_url = add_query_arg( 'product-page', 2, $shop_base_url ); 
			$btn_all_text = isset( $btn_all_text ) ? $btn_all_text : esc_html__( 'All Results', 'basilico' );
			$next_found = $total_posts - $limit;
			?>
			<button data-url="<?php echo esc_url( $load_more_url ); ?>" class="pxl-load-all pxl-shop-load-more pxl-load-more btn-alt">
				<span class="btn-text"><?php echo pxl_print_html($btn_all_text); ?> (<?php echo esc_html($next_found) ?>)</span>
				<span class="pxl-btn-icon pxli-spinner"></span>
			</button>
		<?php endif; ?>
	<?php else: ?>
		<?php if ( $total > 1 ) : ?>
			<?php
			echo paginate_links(
				apply_filters(
					'woocommerce_pagination_args',
					array(  
						'base'      => $base,
						'format'    => $format,
						'add_args'  => false,
						'current'   => max( 1, $current ),
						'total'     => $total,
						'prev_text' => is_rtl() ? esc_html__( 'Next', 'basilico' ).'<span class="pxl-icon lnir lnir-chevron-right"></span>' : '<span class="pxl-icon lnir lnir-chevron-left"></span>'.esc_html__( 'Prev', 'basilico' ),
        				'next_text' => is_rtl() ? '<span class="pxl-icon lnir lnir-chevron-left"></span>'.esc_html__( 'Prev', 'basilico' ) : esc_html__( 'Next', 'basilico' ).'<span class="pxl-icon lnir lnir-chevron-right"></span>',
						'type'      => 'plain',
						'end_size'  => 3,
						'mid_size'  => 3,
					)
				)
			);
			?>
		<?php endif; ?>
	<?php endif; ?>
</nav>
