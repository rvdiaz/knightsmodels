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
	 <p class="single-price-desktop <?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>
     <div class="share-whishlist-wrapper">
		<div class="product-status">
			<?php 
			if($product->is_in_stock()){
				?>
				<img src="<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/icono-check.svg">
			<?php } else {?>
				<img src="<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/Icono-cerrar.svg">
			<?php }
			?>
			<p class="<?php if($product->is_in_stock()) echo 'stock'; else echo 'outstock'?>">
				<?php 
				 if(apply_filters( 'wpml_current_language', null ) == "en"){
					if($product->is_in_stock())
						echo "In stock";
					else echo "Out of stock";
				}
				elseif ($product->is_in_stock())
						echo "En Inventario";
					else echo "Fuera de inventario";
				?>
			</p>
		</div>
		<?php
        echo do_shortcode('[yith_wcwl_add_to_wishlist]');?>
        <button class="share-product-button" onclick="showSharePopup(event)"><img refpopup="" src="<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/share.png" ></button>
        <div class="share-links">
            <a href="https://www.facebook.com/share.php?u=<?php echo get_permalink( $product->ID );?>" target="_blank"><img src="<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/facebook-share.png" > </a>
            <a href="https://wa.me/?text=<?php echo get_permalink( $product->ID );?>"  target="_blank"><img src="<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/whatsapp.png" ></a>
        </div>
    </div>
    </div> 
<?php

