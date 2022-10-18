<?php
function woocommerce_product_category( ) {
    $woocommerce_category_id = get_queried_object_id();
	$cat=get_term_by( 'id', $woocommerce_category_id, 'product_cat' );
	if($cat){
        
		?>
       <div class="home-category-wrapper">
            <div class="home-category-image">
                <?php
                $thumbnail_id = get_woocommerce_term_meta( $woocommerce_category_id, 'thumbnail_id', true );
                $image = wp_get_attachment_url( $thumbnail_id );
                ?>
                <img src="<?php echo $image;?>" alt="<?php $cat->name; ?>">
            </div>
            <div class="home-category-logo-container category-wrapper">
                <?php if(get_field('logo_banner',$cat)) {?>
                    <div>
				        <img src="<?php echo get_field('logo_banner',$cat)?>" alt="<?php echo $cat->name?>">
                    </div>
                <?php } ?>
                <div class="category-meta-container">
                    <p class="category-title"><?php echo $cat->name;?></p>
                    <p class="category-description"><?php echo $cat->name;?></p>
                </div>
            </div>
           
        </div>
        <?php
	}
}

add_action( 'woocommerce_before_shop_loop', 'woocommerce_product_category', 1 );