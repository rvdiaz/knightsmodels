<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package knightsmodels
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
	
	<?php wp_head(); ?>

	<style>
    .contact-form-container .contact-group{
        background-image:url("<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/Group-62.png");
    }

    .contact-form-container .contact-group-textarea{
        background-image:url("<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/Group-111.png");
    }

    .contact-group-file input[type=file]::file-selector-button {
        background-image: url("<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/Rectangle-152.png");
    }

    .product-add-cart-button-container .product_type_simple,
    .products .product_type_simple,
    .button-category-container-mobile .add-cart-button,
	.product .single_add_to_cart_button,
	.wishlist-items-wrapper .add_to_cart_button,
	.cart-collaterals .checkout-button,
	.woocommerce-checkout .woocommerce-checkout-payment .button,
	.single-product .outofstock .alert_container .stock_alert_button,
	.contact-submit-form input,
	#yith-wcwl-form .wishlist_table .product-add-to-cart a{
        background-image: url('<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/Rectangle-65.png') !important;
    }
	.form-suscriber .submit-input {
		background-image: url('<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/icono-enviar.png') !important;
	}
    @media (max-width: 1024px){
    .contact-group {
        background-image:url("<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/Group-110.png") !important;
    }
	.category-highlights-slider {
		background-image:url("<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/Rectangle-115-1.png") !important;
	}
	.wishlist-items-wrapper .add_to_cart_button {
		background-image: none !important;
	}
  }
</style>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
<div class="modal-container-overflow <?php if(!is_product_category() && !is_front_page()) echo "modal-container-overlow-index"?>">
</div>
	<header id="masthead" class="site-header">
		<div class="message-notification-container">
			<span id="message-notification">Producto agregado</span>
		</div>
		<?php if(!isset($_COOKIE['showPromo'])) {?>
		<div class="header-top-promotion" style="background-image: url('<?php echo wp_get_upload_dir()["baseurl"] ?>/2022/11/header-top-background.png');">
			<div class="promotion-container">
				<div class="promotion-text-container">
					<?php if(get_field('texto_promocion','option')){?>
						<p class="promotion-text"><?php echo get_field('texto_promocion','option'); ?></p>
					<?php } ?>
				</div>
				<div class="button-promotion-container">
					<?php if(get_field('boton_promocion','option')){?>
						<a class="button-promocion" style="background-image: url('<?php echo wp_get_upload_dir()["baseurl"] ?>/2022/11/button-header-top.png')" href="<?php echo get_field('boton_promocion','option')['link']; ?>"><?php echo get_field('boton_promocion','option')['title']?></a>
					<?php } ?>
					<a class="close-promotion"><img src="<?php echo wp_get_upload_dir()["baseurl"] ?>/2022/11/Icono-cerrar.png"></a>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="<?php if(is_product_category() || is_front_page()) echo "main-menu"; else echo "main-menu-dark";?>">
			<div class="main-menu-top">
				<div class="hamburger">
         			<img src="<?php echo wp_get_upload_dir()["baseurl"] ?>/2022/11/icono-hamburguesa.png" >
        		</div>
				<div class="hamberguer-menu-desktop">
					<div class="hamberguer-menu-mobile-topside main-menu-top">
						<div class="close-hamburger">
							<img src="<?php echo wp_get_upload_dir()["baseurl"] ?>/2022/11/Icono-cerrar.png" >
						</div>
						<div class="logo-main-menu">
							<?php $my_home_url = apply_filters( 'wpml_home_url', get_option( 'home' ) );?>
							<a href="<?php echo $my_home_url;?>">
							<?php if(get_field('logo_sitio','option')){?>
							<img src="<?php echo get_field('logo_sitio','option');?>" alt="knight models">
							<?php } ?>
							</a>
						</div>
						<div class="submenu-main-menu">
							<a class="shop-button" href="<?php echo wc_get_cart_url();?>">
								<img src="<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/icono-cesta-numero.svg" alt="<?php _e('cart', 'knightsmodels');?>">
								<span class="cart-items-total"><?php echo WC()->cart->get_cart_contents_count();?></span>
							</a>
						</div>
					</div>
					<ul class="menu-top-container">
						<?php
						if(get_field('menu_categorias','option')){
							foreach (get_field('menu_categorias','option') as $category_id) {
								$cat = get_term_by( 'id', $category_id['id_categoria'], 'product_cat' );
						?>
						<li class="menu-top-items-container-category">
							<div class="menu-top-category-container-mobile">
								<div class="main-image-category-mobile">
									<?php 
									$thumbnail_id_cat = get_woocommerce_term_meta( $category_id['id_categoria'], 'thumbnail_id', true );
									$image_cat = wp_get_attachment_url( $thumbnail_id_cat);
									?>
									<?php if($image_cat) {?>
										<img src="<?php echo $image_cat; ?>" alt="<?php echo $cat->name?>">
									<?php }elseif (get_field('imagen_seccion_principal_categoria','option')) {?>
										<img src="<?php echo get_field('imagen_seccion_principal_categoria','option'); ?>" alt="<?php echo $cat->name?>">
									<?php } ?>
								</div>
								<a  href="<?php echo get_term_link($category_id['id_categoria'],'product_cat'); ?>">
									<div class="image-category-mobile-container">
										<?php if(get_field('logo_banner',$cat)) {?>
											<img src="<?php echo get_field('logo_banner',$cat)?>" alt="<?php echo $cat->name?>">
										<?php } elseif (get_field('imagen_blanca_categoria','option')) {?>
											<img src="<?php echo get_field('imagen_blanca_categoria','option')?>" alt="<?php echo $cat->name?>">
										<?php } ?>
									</div>
								</a>
							</div>
						</li>
						<?php }
						}
						if(get_field('menu','option')){
						foreach (get_field('menu','option') as $item) {	
						?>
						<li class="menu-top-items-container">
							<a class="menu-bottom-items" href="<?php echo $item['menu_item']['url']?>" class="menu-bottom-items"><?php echo $item['menu_item']['title']; ?></a>
						</li>
						<?php } 
						}
						if(get_field('menu_despues_categoria','option')){
						foreach (get_field('menu_despues_categoria','option') as $item) {
						?>
						<li class="menu-top-items-container-aftercategory">
							<a class="menu-bottom-items" href="<?php echo $item['item_menu_a_categoria']['url']?>" class="menu-bottom-items"><?php echo $item['item_menu_a_categoria']['title']; ?></a>
						</li>
					<?php } }?>
					</ul>	
				</div>
				<div class="logo-main-menu">
					<?php $my_home_url = apply_filters( 'wpml_home_url', get_option( 'home' ) );?>
					<a href="<?php echo $my_home_url;?>">
					<?php if(get_field('logo_sitio','option')){?>
					<img src="<?php echo get_field('logo_sitio','option');?>" alt="knight models">
					<?php } ?>
					</a>
				</div>
				<div class="submenu-main-menu">
					<button class="search-button search-button-action"><img src="<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/icono-lupa.svg" alt="<?php _e('search', 'knightsmodels');?>"></button>
					<?php if(get_field('wishlist_page','option')){?>
					<a class="search-button" href="<?php echo get_field('wishlist_page','option');?>"><img src="<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/icons8-bookmark-24.png" alt="<?php _e('whishlist', 'knightsmodels');?>"></a>
					<?php } ?>
					<a class="shop-button" href="<?php echo wc_get_cart_url();?>">
						<img src="<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/icono-cesta-numero.svg" alt="<?php _e('cart', 'knightsmodels');?>">
						<span class="cart-items-total"><?php echo WC()->cart->get_cart_contents_count();?></span>
					</a>
				</div>
				<?php echo do_shortcode( '[modal-search]'); ?>
			</div>
			<nav class="main-menu-bottom">
				<ul class="menu-bottom-container">
					<?php $args= array(
						'orderby' => 'name',
						'hide_empty' => false,
					); 
					$count=0;
					if(get_field('menu_categorias','option')){
						foreach (get_field('menu_categorias','option') as $category_id) {
							$cat = get_term_by( 'id', $category_id['id_categoria'], 'product_cat' );
					?>
					<li class="menu-bottom-items-container menu-bottom-items-container-<?php echo $count;?>">
						<a class="menu-main-bottom-items menu-button-<?php echo $count;?>" href="<?php echo get_category_link( $cat->term_id ); ?>">
							<?php if(get_field('logo_ico_menu_active',$cat)) {?>
								<img src="<?php echo get_field('logo_ico_menu_active',$cat)?>" alt="<?php echo $cat->name?>">
							<?php }elseif (get_field('imagen_icono_menu','option')) {?>
								<img src="<?php echo get_field('imagen_icono_menu','option')?>" alt="<?php echo $cat->name?>">
							<?php } ?>
							<span><?php echo $cat->name; ?></span>
						</a>
						<div class="dropdown-subcategories">
							<?php
								$argsSubCat= array(
								'taxonomy' => 'product_cat',
								'parent' => $cat->term_id,
								'hide_empty' => false
								); 
								$subCategories = get_categories( $argsSubCat );
								foreach ( $subCategories as $sub ) {
								?>
								<a class="sub-category" href="<?php echo get_category_link( $sub->term_id ); ?>">
								<?php if(get_field('logo_banner',$sub)) {?>
				    				<img src="<?php echo get_field('logo_banner',$sub)?>" alt="<?php echo $cat->sub?>">
								<?php }elseif (get_field('imagen_blanca_categoria','option')) {?>
									<img src="<?php echo get_field('imagen_blanca_categoria','option');?>" alt="<?php echo $cat->sub?>">
								<?php } ?>
									<span><?php echo $sub->name;?></span>
								</a>
								<?php } ?>
  							</div>
					</li>
					
						<?php 
						$count++;	
					}
						}
						if(get_field('menu_despues_categoria','option')){
							foreach (get_field('menu_despues_categoria','option') as $item) {
						?>
						<li class="menu-bottom-items-container menu-bottom-items-container-<?php echo $count;?>">
							<button class="menu-main-bottom-items menu-button-<?php echo $count;?>">
								<a class="menu-bottom-items" href="<?php echo $item['item_menu_a_categoria']['url']?>" class="menu-bottom-items"><?php echo $item['item_menu_a_categoria']['title']; ?></a>
							</button>
						</li>
					<?php 
					$count++;	
					} 
				}?>
				</ul>	
			</nav>
		</div>
		<?php
		?>
	</header><!-- #masthead -->