<?php
function woocommerce_product_category( ) {
    $woocommerce_category_id = get_queried_object_id();
	$cat=get_term_by( 'id', $woocommerce_category_id, 'product_cat' );
	if($cat){
		?>
        <div class="home-category-wrapper">
            <div class="home-category-image category-header-image-wrapper">
                <?php
                $thumbnail_id = get_woocommerce_term_meta( $woocommerce_category_id, 'thumbnail_id', true );
                $image = wp_get_attachment_url( $thumbnail_id );
                ?>
                <img src="<?php echo $image;?>" alt="<?php $cat->name; ?>">
            </div>
            <div class="home-category-logo-container category-header-meta-wrapper">
                <?php if(get_field('logo_banner',$cat)) {?>
                    <div>
				        <img src="<?php echo get_field('logo_banner',$cat)?>" alt="<?php echo $cat->name?>">
                    </div>
                <?php } ?>
                <div class="category-meta-container">
                    <p class="category-title"><?php echo $cat->name;?></p>
                    <p class="category-description"><?php echo $cat->description;?></p>
                </div>
            </div>
        </div>
        <div class="subcategories-container">
            <div class="subcategories-title-wrapper">
                <p class="subcategories-title">BANDAS</p>
            </div>
            <button onclick="filter_price()">wdwd</button>
            <div class="subcategories-wrapper">
            <div class="subcategory-list-container" data-flickity='{ "freeScroll": true, "prevNextButtons": false, "pageDots" : false, "contain":true}'>
                <div class="card-product-container-first">
                </div>
               <?php $args= array(
	            'orderby' => 'name',
	            'hide_empty' => false
	            ); 
	            $all_categories= get_terms('product_cat',$args); 
		       foreach ($all_categories as $cate) {
                    $parent_id=$cate->parent;
                    $parent = get_term_by( 'id', $parent_id, 'product_cat' );
                    if($parent->name!='inicio' && $cate->name!='inicio'){
                    ?>
                    <div class="subcategory-item-wrapper">
                        <a href="<?php echo get_category_link( $cate->term_id ); ?>">
                        <?php 
                        if($cate->term_id !=  $woocommerce_category_id){ 
                            ?>
                            <div class="logo-subcategory-dark">
                                <img src="<?php echo get_field('logo_ico_menu',$cate); ?>" alt="<?php echo $cate->name; ?>">
                            </div>
                        <?php } else {?>
                            <div class="logo-subcategory-dark">
                                <img src="<?php echo get_field('logo_ico_menu_active',$cate); ?>" alt="<?php echo $cate->name; ?>">
                            </div>
                        <?php } ?>
                        <div class="subcategory-title-wrapper">
                            <p class="subcategory-title <?php if($cate->term_id ==  $woocommerce_category_id) echo "subcategory-title-active";?>"><?php echo $cate->name; ?></p>
                        </div>
                        </a>
                    </div>
                <?php
                 }
                }
                ?>
                <div class="card-product-container-last">
                </div>
            </div>
            </div>
            </div>
            <div class="woocomerce-filters-container">
                <input id="category-slug" type="hidden" value="<?php echo $cat->slug;?>">
                <div class="main-filters-container">
                    <button onclick="ordenar_filter(event)" class="main-filter active">Ordenar por</button>
                    <button onclick="rango_filter(event)" class="main-filter">Rango</button>
                    <button onclick="origen_filter(event)" class="main-filter">Origen</button>
                </div>
                <div class="secondary-filters-container" >
                    <div id="ordenar-filter" class="secondary-filter">
                        <button class="secondary-filter-button">Nuevo</button>
                        <button class="secondary-filter-button">Precio mas bajo</button>
                        <button class="secondary-filter-button">Precio mas alto</button>
                    </div>
                    <div id="rango-filter" class="secondary-filter">
                        <button class="secondary-filter-button">100-200</button>
                        <button class="secondary-filter-button">200-300</button>
                        <button class="secondary-filter-button">300-400</button>
                    </div>
                    <div id="origen-filter" class="secondary-filter">
                        <button class="secondary-filter-button">cuba</button>
                        <button class="secondary-filter-button">USA</button>
                        <button class="secondary-filter-button">Italy</button>
                    </div>
                </div>
            </div>
        <?php
	}
}

add_action( 'woocommerce_before_shop_loop', 'woocommerce_product_category', 1 );