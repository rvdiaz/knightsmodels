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
        <div class="shop-views-filter">
            <input type="range" id="filter-views" name="points" min="0" max="2">
            <div class="filter-views-options">
                <button class="one-column"><img src="<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/icono-vista-horizontal.svg" ></button>
                <button class="one-column"><img src="<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/icono-vista-dos-columnas.svg"></button>
                <button class="one-column"><img src="<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/icono-vista-general.svg"></button>
            </div>
        </div>
        <div class="filter-general-container">
            <div class="subcategories-container subcategories-container-subcategories" style="background-image:url('<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/Rectangle-115.png')">
                <div class="subcategories-title-wrapper">
                    <p class="subcategories-title"><?php _e('bands', 'knightsmodels');?></p>
                </div>
                <div class="subcategories-wrapper">
                    <div class="subcategory-list-container" data-flickity='{ "freeScroll": true, "prevNextButtons": false, "pageDots" : false, "contain":true, "selectedAttraction": 0.01, "friction": 0.15}'>
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
                            if(($parent->slug!='inicio' && $cate->slug!='inicio') && ($parent->slug!='inicio-en' && $cate->slug!='inicio-en')){
                            ?>
                            <div class="subcategory-item-wrapper">
                                <a href="<?php echo get_category_link( $cate->term_id ); ?>">
                                <?php 
                                if($cate->term_id !=  $woocommerce_category_id){ 
                                    ?>
                                    <div class="logo-subcategory-dark">
                                        <?php if(get_field('logo_ico_menu',$cate)) {
                                        /*   echo file_get_contents(get_field('logo_ico_menu',$cate););  */
                                            ?>
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
                    <button onclick="ordenar_filter(event)" class="main-filter active"><?php _e('Order by', 'knightsmodels');?></button>
                    <button onclick="rango_filter(event)" class="main-filter"><?php _e('Range', 'knightsmodels');?></button>
                    <button onclick="origen_filter(event)" class="main-filter"><?php _e('Origin', 'knightsmodels');?></button>
                    </div>
                    <div class="secondary-filters-container" >
                    <div id="ordenar-filter" class="secondary-filter">
                        <button class="secondary-filter-button" filter="new" onclick="filter(event)"><?php _e('New', 'knightsmodels');?></button>
                        <button class="secondary-filter-button" filter="low" onclick="filter(event)"><?php _e('Lower price', 'knightsmodels');?></button>
                        <button class="secondary-filter-button" filter="high" onclick="filter(event)"><?php _e('Higher price', 'knightsmodels');?></button>
                    </div>
                    <div id="rango-filter" class="secondary-filter">
                        <?php
                            $attribute_terms = get_terms(array(
                            'taxonomy' => 'pa_rango',
                            'hide_empty' => true
                        ));
                            foreach ($attribute_terms as $attr) {
                                $argsProducts= array(
                                    'post_type'           => 'product',
                                    'post_status'         => 'publish',
                                    'posts_per_page'  => -1,
                                    'tax_query'           => array(
                                        array(
                                          'taxonomy'        => 'product_cat',
                                          'field'           => 'slug',
                                          'terms'           => $cat->slug,
                                          'operator'        => 'IN',
                                        ),
                                        array(
                                          'taxonomy'        => 'pa_rango',
                                          'field'           => 'slug',
                                          'terms'           => $attr->slug,
                                          'operator'        => 'IN'
                                        ),
                                      )
                                );
                                $prods=wc_get_products( $argsProducts ); 
                                if(count($prods)>0){
                        ?>
                             <button onclick="filterAttribute(event)" class="secondary-filter-button" attr="pa_rango" slug="<?php echo $attr->slug;?>"><?php echo $attr->name;?></button>
                        <?php   } 
                    } ?>
                    </div>
                    <div id="origen-filter" class="secondary-filter">
                        <?php
                            $attribute_terms = get_terms(array(
                            'taxonomy' => 'pa_origen',
                            'hide_empty' => true
                        ));
                            foreach ($attribute_terms as $attr) {
                                $argsProducts= array(
                                    'post_type'           => 'product',
                                    'post_status'         => 'publish',
                                    'posts_per_page'  => -1,
                                    'tax_query'           => array(
                                        array(
                                          'taxonomy'        => 'product_cat',
                                          'field'           => 'slug',
                                          'terms'           => $cat->slug,
                                          'operator'        => 'IN',
                                        ),
                                        array(
                                          'taxonomy'        => 'pa_origen',
                                          'field'           => 'slug',
                                          'terms'           => $attr->slug,
                                          'operator'        => 'IN'
                                        ),
                                      )
                                );
                                $prods=wc_get_products( $argsProducts ); 
                                if(count($prods)>0){
                        ?>
                            <button onclick="filterAttribute(event)" class="secondary-filter-button" attr="pa_origen" slug="<?php echo $attr->slug;?>"><?php echo $attr->name;?></button>
                        <?php   } 
                    } ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}