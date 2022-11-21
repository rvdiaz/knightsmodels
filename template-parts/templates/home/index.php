<?php
    if(get_field('plantilla') == 'inicio'){  
    ?>    
    <div class="home-categories-container">
      <?php
        if(get_field('menu_categorias','option')){
            foreach (get_field('menu_categorias','option') as $category_id) {
                $cat = get_term_by( 'id', $category_id['id_categoria'], 'product_cat' );
                $parent_id=$cat->parent;
		        $parent = get_term_by( 'id', $parent_id, 'product_cat' ); 
        /* get product by category */
        $argsProduct = array(
            'category' => array( $cat->slug ),
            'limit' => -1
        );
            $products = wc_get_products( $argsProduct );
			if(($parent->slug=='inicio' || $parent->slug=='inicio-en') && count($products)>0){
                
		?>
		<div id="home-category-wrapper" class="home-category-wrapper">
            <div class="home-category-image">
                <?php
                if(get_field('imagen_slider_categoria',$cat)){
                ?>
                    <img src="<?php echo get_field('imagen_slider_categoria',$cat);?>" alt="<?php $cat->name; ?>">
                <?php } elseif(get_field('imagen_seccion_principal_categoria','option')){?>
                    <img src="<?php echo get_field('imagen_seccion_principal_categoria','option');?>" alt="<?php echo $cat->name?>">
                <?php } ?>
            </div>
            <div class="home-category-logo-container">
                <?php if(get_field('logo_banner',$cat)) {?>
				    <img src="<?php echo get_field('logo_banner',$cat)?>" alt="<?php echo $cat->name?>">
				<?php } elseif(get_field('imagen_blanca_categoria','option')){ ?>
                    <img src="<?php echo get_field('imagen_blanca_categoria','option')?>" alt="<?php echo $cat->name?>">
                <?php } ?>
            </div>
            <div class="product-add-cart-button-container button-category-container-mobile">
                <a class="add-cart-button" href="<?php echo get_term_link($category_id['id_categoria'],'product_cat'); ?>">
                    <?php echo $cat->name;?>
                </a>
            </div>
        </div>
            <!-- listar productos por categoria -->
            <div class="inicio-category-products-container"  data-flickity='{ "freeScroll": true, "prevNextButtons": false, "pageDots" : false, "contain":true}'>
                <div class="card-product-container-first">
                </div>
                <?php 
                foreach ($products as $product) {
                    ?>
                    <div>
                    </div>
                    <div class="card-product-container">
                        <div class="product-image-container">
                            <a href="<?php echo $product->get_permalink( );?>">
                            <?php echo $product->get_image('original')?>
                            </a>
                        </div>
                        <div class="product-title-container">
                            <a class="product-title" href="<?php echo $product->get_permalink( );?>"><?php echo $product->name;?></a>
                        </div>
                        <div class="product-price-wishlist-container">
                            <p class="product-price"><?php echo $product->get_price_html();?></p>
                            <?php echo do_shortcode('[yith_wcwl_add_to_wishlist product_id='.$product->id.']');?>
                        </div>
                        <div class="product-add-cart-button-container">
                        <?php echo do_shortcode('[add_to_cart show_price=false id='.$product->id.']'); ?>
                        </div>
                    </div>
                    <?php         
                } ?>
                <div class="card-product-container-last">
                </div>
            </div> 
		<?php }
		}
    } 
    ?>  
    </div>    
 <?php  
    }
 ?>