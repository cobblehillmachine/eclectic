<?php
/**
 * Pagination - Show numbered pagination for catalog pages.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.2
 */

/*
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wp_query;

if ( $wp_query->max_num_pages <= 1 ) {
	return;
}
?>
<nav class="woocommerce-pagination">
	<?php
		echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
			'base'         => esc_url( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
			'format'       => '',
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'total'        => $wp_query->max_num_pages,
			'prev_text'    => '&larr;',
			'next_text'    => '&rarr;',
			'type'         => 'list',
			'end_size'     => 3,
			'mid_size'     => 3
		) ) );
	?>
</nav>
*/


 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
global $wp_query;

 
 
if ( $wp_query->max_num_pages <= 1 )
    return;
?>
 
<?php if (!is_shop()) { ?>
	
	<nav class="woocommerce-pagination woo-pagination">
    <?php
 
        echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
            'base'          => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
            'format'        => '',
            'current'       => max( 1, get_query_var('paged') ),
            'total'         => $wp_query->max_num_pages,
            'prev_text'     => '&larr;',
            'next_text'     => '&rarr;',
            'type'          => 'list',
            'end_size'      => 3,
            'mid_size'      => 3
        ) ) );
    ?>
 
 
<?php if (is_paged()) : ?> 
    <div class="button wg-view-all wg-view-right"><a href="../../?view=all">View All</a></div>
    <?php else: ?>
    <div class="wg-view-all wg-view-right"><a href="?view=all">View All</a></div>
    <?php endif; ?>
 
    </nav>
	
<?php } ?>

