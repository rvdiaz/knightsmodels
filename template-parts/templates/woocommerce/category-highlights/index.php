<?php
add_shortcode( 'category-highlights', 'category_highlights' );

function category_highlights(){
    $woocommerce_category_id = get_queried_object_id();
    $cat=get_term_by( 'id', $woocommerce_category_id, 'product_cat' );
    ?>
    <div class="category-highlights-slider">
        <div class="category-highlights-title-slider">
            <p ><?php _e('Highlights Products', 'knightsmodels');?></p>
        </div>
    <?php
        echo do_shortcode( '[products limit="10" columns="4" category='.$cat->slug.']' );
    ?>
    </div>
    <?php
}
