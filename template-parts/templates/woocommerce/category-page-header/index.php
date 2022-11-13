<?php
add_shortcode( 'woocommerce-product-second-category', 'woocommerce_product_category' );

function woocommerce_product_category( ) {
    $woocommerce_category_id = get_queried_object_id();
	$cat=get_term_by( 'id', $woocommerce_category_id, 'product_cat' );
	if($cat){
		?>
        <div class="home-category-wrapper">
            <div class="home-category-image category-header-image-wrapper">
                <?php
                if(get_field('imagen_slider_categoria',$cat)){
                ?>
                <img src="<?php echo get_field('imagen_slider_categoria',$cat);?>" alt="<?php $cat->name; ?>">
                <?php } elseif (get_field('imagen_seccion_principal_categoria','option')) { ?>
                   <img src="<?php echo get_field('imagen_seccion_principal_categoria','option');?>" alt="<?php $cat->name; ?>">
                <?php } ?>
            </div>
            <div class="home-category-logo-container category-header-meta-wrapper">
                <?php if(get_field('logo_banner',$cat)) {?>
                    <div>
				        <img src="<?php echo get_field('logo_banner',$cat)?>" alt="<?php echo $cat->name?>">
                    </div>
                <?php }elseif (get_field('imagen_blanca_categoria','option')) {?>
                    <div>
                    <img src="<?php echo get_field('imagen_blanca_categoria','option');?>" alt="<?php echo $cat->name?>">
                </div>
               <?php } ?>
                <div class="category-meta-container">
                    <p class="category-title"><?php echo $cat->name;?></p>
                    <?php if(get_field('descripcion_pagina_categoria',$cat)){?>
                        <p class="category-description-text"><?php echo get_field('descripcion_pagina_categoria',$cat)?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php do_shortcode('[category-highlights]'); ?>
        
        <div class="subcategories-container subcategories-container-subcategories" style="background-image:url('<?php echo wp_get_upload_dir()["url"]?>/Rectangle-115.png')"?>
        <div class="shop-views-filter">
            <input type="range" id="filter-views" name="points" min="0" max="2">
            <div class="filter-views-options">
                <button class="one-column"><img src="<?php echo wp_get_upload_dir()["url"]?>/icono-vista-horizontal.svg" alt=""></button>
                <button class="one-column"><img src="<?php echo wp_get_upload_dir()["url"]?>/icono-vista-dos-columnas.svg" alt=""></button>
                <button class="one-column"><img src="<?php echo wp_get_upload_dir()["url"]?>/icono-vista-general.svg" alt=""></button>
            </div>
        </div>
            <div class="subcategories-title-wrapper">
                <p class="subcategories-title">BANDAS</p>
            </div>
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
                    if($parent->slug!='inicio' && $cate->slug!='inicio'){
                    ?>
                    <div class="subcategory-item-wrapper">
                        <a href="<?php echo get_category_link( $cate->term_id ); ?>">
                        <?php 
                        if($cate->term_id !=  $woocommerce_category_id){ 
                            ?>
                            <div class="logo-subcategory-dark">
                                <?php if(get_field('logo_ico_menu',$cate)) {?>
                                    <img src="<?php echo get_field('logo_ico_menu',$cate); ?>" alt="<?php echo $cate->name; ?>">
                                <?php } elseif (get_field('imagen_negra_categoria','option')) { ?>
                                    <img src="<?php echo get_field('imagen_negra_categoria','option'); ?>" alt="<?php echo $cate->name; ?>">
                               <?php } ?>
                            </div>
                        <?php } else {?>
                            <div class="logo-subcategory-dark">
                                <?php if(get_field('logo_ico_menu_active',$cate)) {?>
                                    <img src="<?php echo get_field('logo_ico_menu_active',$cate); ?>" alt="<?php echo $cate->name; ?>">
                                <?php } elseif (get_field('imagen_categoria_activa','option')) {?>
                                    <img src="<?php echo get_field('imagen_categoria_activa','option'); ?>" alt="<?php echo $cate->name; ?>">
                                <?php } ?>
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
                <div class="filter-wrapper">
                    <input id="category-slug" type="hidden" value="<?php echo $cat->slug;?>">
                    <div class="main-filters-container">
                    <button onclick="ordenar_filter(event)" class="main-filter active">Ordenar por</button>
                    <button onclick="rango_filter(event)" class="main-filter">Rango</button>
                    <button onclick="origen_filter(event)" class="main-filter">Origen</button>
                    </div>
                    <div class="secondary-filters-container" >
                    <div id="ordenar-filter" class="secondary-filter">
                        <button class="secondary-filter-button" filter="new" onclick="filter(event)">Nuevo</button>
                        <button class="secondary-filter-button" filter="low" onclick="filter(event)">Precio mas bajo</button>
                        <button class="secondary-filter-button" filter="high" onclick="filter(event)">Precio mas alto</button>
                    </div>
                    <div id="rango-filter" class="secondary-filter">
                        <?php
                        if(get_field('lista_de_opciones_de_rango','option'))
                        foreach (get_field('lista_de_opciones_de_rango','option') as $range) {
                        ?>
                        <button onclick="filterRange(event)" class="secondary-filter-button" min="<?php echo $range['minimo']; ?>" max="<?php echo $range['maximo']; ?>"><?php echo $range['minimo'];?> - <?php echo $range['maximo'];?></button>
                        <?php } ?>
                    </div>
                    <div id="origen-filter" class="secondary-filter">
                        <?php
                           $attribute_terms = get_terms(array(
                            'taxonomy' => 'pa_new',
                            'hide_empty' => true,
                        ));
                         foreach ($attribute_terms as $attr) {
                        ?>
                        <button onclick="filterAttribute(event)" class="secondary-filter-button"><?php echo $attr->name;?></button>
                        <?php   } ?>
                    </div>
                    </div>
                </div>
                <div class="loading-container">
                    <div class="loading-image">
                        <img src="<?php echo wp_get_upload_dir()["url"] ?>/Double-Ring-1s-200px-1.gif" alt="">
                    </div>
                </div>
            </div>
        <?php
    }
}