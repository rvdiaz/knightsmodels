<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

?>
<li <?php wc_product_class( '', $product ); ?>>

	<?php
	
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	
	do_action( 'woocommerce_archive_description' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	?>
	<div class="product-title-container">
	<?php
		do_action( 'woocommerce_shop_loop_item_title' );
	?> 
	</div>
	<?php 
	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
    ?>
	<div class="price-whislist-product-wraper">
    <?php
	    do_action( 'woocommerce_after_shop_loop_item_title' );?>
        <div class="share-whishlist-wrapper"><?php
            echo do_shortcode('[yith_wcwl_add_to_wishlist]');?>
            <button class="share-product-button" onclick="showSharePopup(event)"><img refpopup="" src="<?php echo wp_get_upload_dir()["url"] ?>/share.png" ></button>
            <div class="share-links">
                <a href="https://www.facebook.com/share.php?u=<?php echo get_permalink( $product->ID );?>" target="_blank"><img src="<?php echo wp_get_upload_dir()["url"] ?>/facebook-share.png" > </a>
                <a href="https://wa.me/?text=<?php echo get_permalink( $product->ID );?>"  target="_blank"><img src="<?php echo wp_get_upload_dir()["url"] ?>/whatsapp.png" ></a>
            </div>
        </div>
    </div> 
    <?php
	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
</li>

