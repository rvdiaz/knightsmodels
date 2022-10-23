<?php
function after_categories_component(){
    $woocommerce_category_id = get_queried_object_id();
	$cat=get_term_by( 'id', $woocommerce_category_id, 'product_cat' );
    ?>
<div class="form-suscribe-container">
    <div class="form-suscriber-wrapper">
        <div class="logo-parent-category">
            <?php
            $parent_cat_id=$cat->parent;
            $parent_cat = get_term_by( 'id', $parent_cat_id, 'product_cat' );
            ?>
            <img src="<?php echo get_field("logo_banner",$parent_cat);?>" alt="<?php echo $parent_cat->name; ?>">
        </div>
        <div class="form-suscriber">

        </div>
    </div>
</div>
<div class="blogs-component-container">
    <div class="blogs-component">
    <div class="breadcrumbs-wrapper">
        <?php if ( function_exists('yoast_breadcrumb') ) { 
            yoast_breadcrumb( '<p class=breadcrumbs>','</p>' );
        }?>
    </div>
    <div class="blogs-container">
       <?php
        foreach (get_field('lista_blogs',$cat) as $blog) {
        ?>
        <div class="blogs-wrapper">
            <p class="blog-question"><?php echo $blog['titulo_blog'];?></p>
            <p class="blog-description"><?php echo $blog['descripcion_blog'];?></p>
        </div>
        <?php 
        }  
         ?>
    </div>
    </div>
</div>
<?php 

} 
add_action( 'woocommerce_after_shop_loop', 'after_categories_component', 1 );

