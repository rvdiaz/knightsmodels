<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;
?>
<div class="price-whislist-product-wraper">
	<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>
     <div class="share-whishlist-wrapper">
		<div class="product-status">
			<img src="<?php echo wp_get_upload_dir()["url"]?>/icono-check.svg" alt="">
			<p><?php echo $product->get_stock_status();?></p>
		</div>
		<?php
        echo do_shortcode('[yith_wcwl_add_to_wishlist]');?>
        <button class="share-product-button" onclick="showSharePopup(event)"><img refpopup="" src="<?php echo wp_get_upload_dir()["url"] ?>/share.png" ></button>
        <div class="share-links">
            <a href="https://www.facebook.com/share.php?u=<?php echo get_permalink( $product->ID );?>" target="_blank"><img src="<?php echo wp_get_upload_dir()["url"] ?>/facebook-share.png" > </a>
            <a href="https://wa.me/?text=<?php echo get_permalink( $product->ID );?>"  target="_blank"><img src="<?php echo wp_get_upload_dir()["url"] ?>/whatsapp.png" ></a>
        </div>
    </div>
    </div> 
<?php

