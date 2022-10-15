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
                            <?php echo $product->get_image()?>
                        </div>
                        <div class="product-title-container">
                            <p class="product-title"><?php echo $product->name;?></p>
                        </div>
                        <div class="product-price-wishlist-container">
                            <p class="product-price"><?php echo $product->price.' '.get_woocommerce_currency_symbol();?></p>
                            <button class="add-whislist"><img src="<?php echo wp_get_upload_dir()["url"] ?>/icono-favoritos.svg" alt=""></button>
                        </div>
                        <div class="product-add-cart-button-container">
                            <button class="add-cart-button">Añadir a la cesta</button>
                        </div>
                    </div>
                    <?php  } ?>
            </div> 
		<?php }
					}
    ?>  
    </div>    

 <?php  } ?>