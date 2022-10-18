<?php
    if(get_field('plantilla') == 'inicio'){  
    ?>    
    <div class="home-categories-container">
        <!-- listar categorias -->
        <?php $args= array(
	    'orderby' => 'name',
	    'hide_empty' => false,
	    ); 
	    $all_categories= get_terms('product_cat',$args);
		foreach ($all_categories as $cat) {
		$parent_id=$cat->parent;
		$parent = get_term_by( 'id', $parent_id, 'product_cat' );

        /* get product by category */

        $argsProduct = array(
            'category' => array( $cat->slug )
        );
        $products = wc_get_products( $argsProduct );
        /* ----- */

			if($parent->name=='inicio' && count($products)>0){
		?>
		<div id="home-category-wrapper" class="home-category-wrapper">
            <div class="home-category-image">
                <?php
                $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
                $image = wp_get_attachment_url( $thumbnail_id );
                ?>
                <img src="<?php echo $image;?>" alt="<?php $cat->name; ?>">
            </div>
            <div class="home-category-logo-container">
                <?php if(get_field('logo_banner',$cat)) {?>
				    <img src="<?php echo get_field('logo_banner',$cat)?>" alt="<?php echo $cat->name?>">
				<?php } ?>
            </div>
            <div class="product-add-cart-button-container button-category-container-mobile">
                <button class="add-cart-button"><?php echo $cat->name;?></button>
            </div>
        </div>
            <!-- listar productor por categoria -->
            <div class="inicio-category-products-container" data-flickity='{ "freeScroll": true, "prevNextButtons": false, "pageDots" : false, "contain":true}'>
                <div class="card-product-container-first">
                </div>
                <?php 
                foreach ($products as $product) {
                    ?>
                    <div class="card-product-container">
                        <div class="product-image-container">
                            <a href="<?php echo $product->get_permalink( );?>" target="_blank">
                            <?php echo $product->get_image()?>
                            </a>
                        </div>
                        <div class="product-title-container">
                            <a class="product-title" href="<?php echo $product->get_permalink( );?>" target="_blank"><?php echo $product->name;?></a>
                        </div>
                        <div class="product-price-wishlist-container">
                            <p class="product-price"><?php echo $product->price.' '.get_woocommerce_currency_symbol();?></p>
                            <?php echo do_shortcode('[yith_wcwl_add_to_wishlist product_id='.$product->id.']');?>
                        </div>
                        <div class="product-add-cart-button-container">
                        <button onclick="add_to_cart_wc(event)" id_product="<?php echo $product->id;?>" class="add-cart-button">Añadir a la cesta</button>
                        </div>
                    </div>
                    <?php  } ?>
                <div class="card-product-container-last">
                </div>
            </div> 
		<?php }
					}
    ?>  
    </div>    

 <?php  } ?>