<?php
add_shortcode( 'categories-first-level', 'categories_first_level' );

function categories_first_level(){
    $woocommerce_category_id = get_queried_object_id();
	$cat=get_term_by( 'id', $woocommerce_category_id, 'product_cat' );
    $args= array(
        'orderby' => 'name',
        'hide_empty' => false,
        'parent' => $woocommerce_category_id
    ); 
    $all_categories= get_terms('product_cat',$args); 

    $argsProduct = array(
        'category' => array( $cat->slug )
    );
        $products = wc_get_products( $argsProduct );
    ?>
     <div class="preorder-list-slider">
        <div class="pre-order-slider-item" data-flickity='{"prevNextButtons": false, "pageDots" : true, "contain":true}'>
            <?php foreach ($products as $prod) { 
                if($prod->get_meta('_mpos_enable_preorder')){
                    if(get_field('imagen_alta_resolucion',$prod)){
                        $imageurl=get_field('imagen_alta_resolucion',$prod);
                    }elseif (get_field('imagen_alta_resolucion_producto','option')) {
                        $imageurl=get_field('imagen_alta_resolucion_producto','option');
                    }
                ?>
                <div class="preorder-background-image-item" style="background-image: url('<?php echo $imageurl; ?>')">
                    <div class="preorder-info-item">
                        <div class="preorder-category-image">
                             <?php if(get_field('logo_ico_menu',$cat)) {?>
                            <img src="<?php echo get_field('logo_ico_menu',$cat); ?>" alt="<?php echo $cat->name; ?>">
                            <?php } ?>
                        </div>
                        <div class="preorder-title-item">
                            <p><?php echo $prod->name; ?></p>
                        </div>
                    </div>
                    <div class="preorder-button-item">
                        <div class="product-add-cart-button-container">
                            <?php echo do_shortcode('[add_to_cart show_price=false id='.$prod->id.']'); ?>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>
        </div>
     </div>
     <div class="category-description-container">
        <div class="category-description">
            <p><?php echo category_description($woocommerce_category_id);?></p>
        </div>
        <div class="category-description-blog-button">
            <?php if(get_field('boton_slider_categoria','option')){?>
                <a href="<?php echo get_field('boton_slider_categoria','option')['url'] ?>" style="background-image: url('<?php echo wp_get_upload_dir()["url"]?>/button-header-top.png')"><?php echo get_field('boton_slider_categoria','option')['title'] ?></a>
            <?php } ?>
        </div>
     </div>
     <div class="subcategories-container" style="background-image:url('<?php echo wp_get_upload_dir()["url"]?>/Rectangle-115.png')"?>
        <div class="subcategories-title-wrapper">
            <p class="subcategories-title">Afiliaciones</p>
        </div>
        <div class="first-level-subcategories" data-flickity='{ "freeScroll": true, "prevNextButtons": false, "pageDots" : false, "contain":true}' >
             <div class="card-product-container-first">
                </div>
            <?php
            foreach ($all_categories as $cate) {?>
                <div class="subcategory-item-wrapper">
                <a href="<?php echo get_category_link( $cate->term_id ); ?>">
                    <div class="logo-subcategory-dark">
                        <?php if(get_field('logo_ico_menu',$cate)) {?>
                        <img src="<?php echo get_field('logo_ico_menu',$cate); ?>" alt="<?php echo $cate->name; ?>">
                        <?php } elseif (get_field('imagen_negra_categoria','option')) { ?>
                           <img src="<?php echo get_field('imagen_negra_categoria','option'); ?>" alt="<?php echo $cate->name; ?>">
                        <?php } ?>
                    </div>
                    <div class="subcategory-title-wrapper">
                        <p class="subcategory-title"><?php echo $cate->name; ?></p>
                    </div>
                </a>
            </div>
            <?php }
            ?>
        </div>
     </div>
     <div class="first-level-category-products-container" data-flickity='{ "freeScroll": true, "prevNextButtons": false, "pageDots" : false, "contain":true}'>
        <?php
         $argsProduct = array(
            'category' => array($cat->slug));
            $products = wc_get_products( $argsProduct ); 
            $i=0;?>
        <div class="card-product-container-first">
        </div>
        <div class="card-product-container-first">
        </div>
         <?php
        while ($i < count($products)) {
        ?>
        <div class="first-level-products-slider-wrapper">
        <!-- top product -->
            <div class="card-product-container">
                <div class="product-image-container">
                    <a href="<?php echo $products[$i]->get_permalink( );?>" target="_blank">
                        <?php echo $products[$i]->get_image()?>
                    </a>
                </div>
                <div class="product-title-container">
                    <a class="product-title" href="<?php echo $products[$i]->get_permalink( );?>" target="_blank"><?php echo $products[$i]->name;?></a>
                </div>
                <div class="product-price-wishlist-container">
                    <p class="product-price"><?php echo $products[$i]->price.' '.get_woocommerce_currency_symbol();?></p>
                    <?php echo do_shortcode('[yith_wcwl_add_to_wishlist product_id='.$products[$i]->id.']');?>
                </div>
                <div class="product-add-cart-button-container">
                    <?php echo do_shortcode('[add_to_cart show_price=false id='.$products[$i]->id.']'); ?>
                </div>
            </div>
        <!-- bottom product -->
            <?php if($products[$i+1]){ ?>
            <div class="card-product-container second-card">
                <div class="product-image-container">
                    <a href="<?php echo $products[$i+1]->get_permalink( );?>" target="_blank">
                        <?php echo $products[$i+1]->get_image()?>
                    </a>
                </div>
                <div class="product-title-container">
                    <a class="product-title" href="<?php echo $products[$i+1]->get_permalink( );?>" target="_blank"><?php echo $products[$i+1]->name;?></a>
                </div>
                <div class="product-price-wishlist-container">
                    <p class="product-price"><?php echo $products[$i+1]->price.' '.get_woocommerce_currency_symbol();?></p>
                    <?php echo do_shortcode('[yith_wcwl_add_to_wishlist product_id='.$products[$i+1]->id.']');?>
                </div>
                <div class="product-add-cart-button-container">
                    <?php echo do_shortcode('[add_to_cart show_price=false id='.$products[$i+1]->id.']'); ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php 
        $i=$i+2;
    } ?>
    </div>
    <div class="test">
    <?php
    ?>
    </div>
<?php }
 