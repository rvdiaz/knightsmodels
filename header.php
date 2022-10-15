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
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="header-top-promotion">
			<div class="promotion-container">
				<div class="promotion-text-container">
					<?php if(get_field('texto_promocion','option')){?>
						<p class="promotion-text"><?php echo get_field('texto_promocion','option'); ?></p>
					<?php } ?>
				</div>
				<div class="button-promotion-container">
					<?php if(get_field('boton_promocion','option')){?>
						<a class="button-promocion" href="<?php echo get_field('boton_promocion','option')['link']; ?>"><?php echo get_field('boton_promocion','option')['title']?></a>
					<?php } ?>
					<a class="close-promotion"><img src="<?php echo wp_get_upload_dir()["url"] ?>/Icono-cerrar.png"></a>
				</div>
			</div>
		</div>
		<div class="main-menu">
			<div class="main-menu-top">
				<div class="hamburger">
         			<img src="<?php echo wp_get_upload_dir()["url"] ?>/icono-hamburguesa.png" >
        		</div>
				<div class="hamberguer-menu-desktop">
					<ul class="menu-top-container">
						<?php $args= array(
						'orderby' => 'name',
						'hide_empty' => false,
						); 
						$all_categories= get_terms('product_cat',$args);
						foreach ($all_categories as $cat) {
						$parent_id=$cat->parent;
						$parent = get_term_by( 'id', $parent_id, 'product_cat' );
						if($parent->name=='inicio'){
						?>
						<li class="menu-top-items-container-category">
						<button class="menu-bottom-items">
							<?php if(get_field('logo_ico_menu',$cat)) {?>
							<img src="<?php echo get_field('logo_ico_menu',$cat)?>" alt="<?php echo $cat->name?>">
							<?php } ?>
							<span><?php echo $cat->name; ?></span>
						</button>
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
					<?php if(get_field('logo_sitio','option')){?>
					<img src="<?php echo get_field('logo_sitio','option');?>" alt="knight models">
					<?php } ?>
				</div>
				<div class="submenu-main-menu">
					<button class="search-button"><img src="<?php echo wp_get_upload_dir()["url"]?>/icono-lupa.svg" alt="search"></button>
					<button class="shop-button"><img src="<?php echo wp_get_upload_dir()["url"]?>/icono-cesta-numero.svg" alt="search"></button>
				</div>
			</div>
			<nav class="main-menu-bottom">
				<ul class="menu-bottom-container">
					<?php $args= array(
						'orderby' => 'name',
						'hide_empty' => false,
					); 
					$all_categories= get_terms('product_cat',$args);
					$count=0;
					foreach ($all_categories as $key =>$cat) {
						$parent_id=$cat->parent;
						$parent = get_term_by( 'id', $parent_id, 'product_cat' );
						if($parent->name=='inicio'){
					?>
					<li class="menu-bottom-items-container menu-bottom-items-container-<?php echo $count;?>">
						<button class="menu-main-bottom-items menu-button-<?php echo $count;?>">
							<?php if(get_field('logo_ico_menu',$cat)) {?>
							<img src="<?php echo get_field('logo_ico_menu',$cat)?>" alt="<?php echo $cat->name?>">
							<?php 
						} ?>
							<span><?php echo $cat->name; ?></span>
						</button>
						<div class="dropdown-subcategories">
							<?php
								$argsSubCat= array(
								'taxonomy' => 'product_cat',
								'parent' => $cat->term_id,
								'hide_empty' => false
								); 
								$subCategories = get_categories( $argsSubCat );
								foreach ( $subCategories as $sub ) {
								$thumbnail_id = get_woocommerce_term_meta( $sub->term_id, 'thumbnail_id', true );
								$image = wp_get_attachment_url( $thumbnail_id );
								?>
								<a class="sub-category" href="<?php echo get_category_link( $sub->term_id ); ?>">
									<img src="<?php echo $image;?>" alt="">
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
						<li class="menu-bottom-items-container">
							<button class="menu-main-bottom-items ">
								<a class="menu-bottom-items" href="<?php echo $item['item_menu_a_categoria']['url']?>" class="menu-bottom-items"><?php echo $item['item_menu_a_categoria']['title']; ?></a>
							</button>
						</li>
					<?php } }?>
				</ul>	
			</nav>
		</div>
		
		
	</header><!-- #masthead -->
