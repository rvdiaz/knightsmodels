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
        'category' => array( $cat->slug ),
        'limit' => -1
    );
        $products = wc_get_products( $argsProduct );
    ?>
    <!-- slider pre order -->
     <div class="preorder-list-slider">
        <div class="preorder-banner"> 
        </div>
        <div class="pre-order-slider-item" data-flickity='{"prevNextButtons": false, "pageDots" : true, "contain":true }'>
            <?php foreach ($products as $prod) { 
                if($prod->get_meta('_mpos_enable_preorder')=="yes"){
                    if(get_field('imagen_alta_resolucion',$prod)){
                        
                        $imageurl=get_field('imagen_alta_resolucion',$prod);
                    }elseif (get_field('imagen_alta_resolucion_producto','option')) {
                        $imageurl=get_field('imagen_alta_resolucion_producto','option');
                    }
                ?>
                <div class="preorder-background-image-item" style="background-image: url('<?php echo $imageurl; ?>')">
                    <div class="preorder-info-item">
                        <div class="preorder-category-image">
                             <?php if(get_field('logo_banner',$cat)) {?>
                                <img src="<?php echo get_field('logo_banner',$cat); ?>" alt="<?php echo $cat->name; ?>">
                            <?php } elseif (get_field('imagen_blanca_categoria','option')) {?>
                                <img src="<?php echo get_field('imagen_blanca_categoria','option'); ?>" alt="<?php echo $cat->name; ?>">
                           <?php } ?>
                        </div>
                        <div class="preorder-title-item">
                            <p><?php echo $prod->name; ?></p>
                        </div>
                    </div>
                    <div class="preorder-button-item">
                        <div class="product-add-cart-button-container">
                            <?php echo do_shortcode('[add_to_cart name="Just a Test Product" show_price=false id='.$prod->id.']'); ?>
                        </div>
                    </div>
                    <div class="preorder-gradient-container">
                        <img src="<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/Rectangle-87.png" >
                    </div>
                </div>
            <?php }
        } ?>
        </div>
     </div>
     
     <div class="category-description-container">
        <div class="category-description">
            <?php if(get_field('descripcion_pagina_categoria',$cat)){?>
                <p><?php echo get_field('descripcion_pagina_categoria',$cat)?></p>
            <?php } ?>
        </div>
        <div class="category-description-blog-button">
            <?php if(get_field('boton_slider_categoria','option')){?>
                <button style="background-image: url('<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/button-header-top.png')">
                    <a href="<?php echo get_field('boton_slider_categoria','option')['url'] ?>"><?php echo get_field('boton_slider_categoria','option')['title']; ?></a>
                </button>
            <?php } ?>
        </div>
     </div>

     <!-- subcategories slider -->
     <div class="subcategories-container" style="background-image:url('<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/Rectangle-115.png')">
        <div class="subcategories-title-wrapper">
            <p class="subcategories-title"><?php _e('Afiliations', 'knightsmodels');?></p>
        </div>
        <div class="first-level-subcategories" data-flickity='{ "freeScroll": true, "prevNextButtons": false, "pageDots" : false, "contain":true, "selectedAttraction": 0.01, "friction": 0.15}' >
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
     <input id="first-category-slug" type="hidden" value="<?php echo $cat->slug;?>">

     <!-- filters -->
     <div class="first-level-category-filter">
        <div class="first-level-category-filter-button-container" data-flickity='{ "freeScroll": false, "prevNextButtons": false, "pageDots" : false, "contain":true, "selectedAttraction": 0.01, "friction": 0.15}'>
            <div class="card-product-container-first"></div>
            <button class="first-level-category--filter-button" onclick="first_filters_all(event)"><?php _e('All', 'knightsmodels');?></button>
            <button class="first-level-category--filter-button" onclick="first_filters(event)"><?php _e('Bat-Oferts', 'knightsmodels');?></button>
            <button class="first-level-category--filter-button" onclick="first_filters_recent(event)"><?php _e('News', 'knightsmodels');?></button>
            <button class="first-level-category--filter-button" onclick="first_filters_sales(event)"><?php _e('Best sellers', 'knightsmodels');?></button>
            <div class="card-product-container-first"></div>
        </div>
     </div>

     <!-- slider products -->
     <div class="first-level-category-products-container" data-flickity='{ "freeScroll": true, "prevNextButtons": false, "pageDots" : false, "contain":true, "selectedAttraction": 0.01, "friction": 0.5, "autoPlay": 2000 }'>
        <?php
         $argsProduct = array(
            'category' => array($cat->slug),
            'limit' => 30
        );
            $products = wc_get_products( $argsProduct ); 
            $i=0;?>
        <div class="card-product-container-first">
        </div>
         <?php
    if(count($products) > 10){
        while ($i < count($products)) {
        ?>
        <div class="first-level-products-slider-wrapper">
        <!-- top product -->
            <div class="card-product-container">
                <div class="product-image-container">
                    <a href="<?php echo $products[$i]->get_permalink();?>">
                        <?php echo $products[$i]->get_image('original')?>
                    </a>
                </div>
                <div class="product-title-container">
                    <a class="product-title" href="<?php echo $products[$i]->get_permalink( );?>"><?php echo $products[$i]->name;?></a>
                </div>
                <div class="product-price-wishlist-container">
                    <p class="product-price"><?php echo $products[$i]->get_price_html();?></p>
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
                    <a href="<?php echo $products[$i+1]->get_permalink();?>" target="_blank">
                        <?php echo $products[$i+1]->get_image('original')?>
                    </a>
                </div>
                <div class="product-title-container">
                    <a class="product-title" href="<?php echo $products[$i+1]->get_permalink( );?>" target="_blank"><?php echo $products[$i+1]->name;?></a>
                </div>
                <div class="product-price-wishlist-container">
                    <p class="product-price"><?php echo $products[$i]->get_price_html();?></p>
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
        } 
    } else {
         foreach ($products as $product) {?>
            <div class="card-product-container">
                <div class="product-image-container">
                    <a href="<?php echo $product->get_permalink();?>">
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
    <?php }
}
?>
    </div>
    <div class="first-level-category-all-product-link-container">
        <button style="background-image: url('<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/Group-110.png')">
            <a href="<?php echo get_permalink();?>?cat=all"><?php _e('All products', 'knightsmodels');?></a>
        </button>
    </div>
    
    <!-- blog relation post -->
    <div class="blog-container" style="background-image: url('<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/Rectangle-138.png')">
    <?php if(get_field('video_de_fondo_blog_posts','option')){?>
        <video autoplay muted playsinline loop class="video-background-promotion" id="video-promo">
			<source src="<?php echo get_field('video_de_fondo_blog_posts','option');?>" type="video/mp4">
		</video>
        <?php } ?>
        <div class="blog-wrapper">
            <div class="title-blog-container">
                <p>Bat-Blog</p>
            </div>
            <div class="blog-slider-container" data-flickity='{"prevNextButtons": false, "pageDots" : true, "contain":true, "selectedAttraction": 0.01, "friction": 0.15}'>
                <?php
                if(get_field('lista_de_blog',$cat)){
                foreach (get_field('lista_de_blog',$cat) as $id) {
                    $blog=get_post($id['blog_relacionado']);
                ?>
                <div class="blog-slider-item-container">
                    <div class="blog-image">
                        <?php echo get_the_post_thumbnail( $id['blog_relacionado'], 'medium');?>
                    </div>
                    <div class="blog-info">
                        <p class="blog-title">
                            <?php echo get_the_title($id['blog_relacionado']);?>
                        </p>
                        <p class="blog-date">
                            <?php echo get_the_date('F j, Y',$id['blog_relacionado']);?>
                        </p>
                        <p class="blog-slider-description">
                            <?php echo  get_the_excerpt($id['blog_relacionado']);?>
                        </p>
                    </div>
                    <div class="blog-seemore-button">
                        <a href="<?php echo get_permalink($id['blog_relacionado'])?>"><?php _e('See more', 'knightsmodels');?>...</a>
                    </div>  
                </div>
            <?php 
        }     
        }
    ?>
            </div>
            <div class="blog-page-link">
                <div class="category-description-blog-button">
                    <?php if(get_field('boton_blog_page','option')){?>
                    <button style="background-image: url('<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/button-header-top.png')">
                        <a href="<?php echo get_field('boton_blog_page','option')['url'] ?>"><?php echo get_field('boton_blog_page','option')['title']; ?></a>
                    </button>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php
}