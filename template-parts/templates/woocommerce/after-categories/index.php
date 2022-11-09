<?php
add_shortcode( 'after-categories-component', 'after_categories_component' );

function after_categories_component(){
    ?>
<div class="form-suscribe-container">
    <div class="form-suscriber-wrapper">
        <div class="logo-parent-category">
            <?php
            if(is_product_category()){
            $woocommerce_category_id = get_queried_object_id();
            $cat=get_term_by( 'id', $woocommerce_category_id, 'product_cat' );
            $parent_cat_id=$cat->parent;
            $parent_cat = get_term_by( 'id', $parent_cat_id, 'product_cat' );
            if($parent_cat->slug!="inicio"){
            if(get_field("logo_banner",$parent_cat)){
            ?>
                <img src="<?php echo get_field("logo_banner",$parent_cat);?>" alt="<?php echo $parent_cat->name; ?>">
            <?php } elseif(get_field('imagen_blanca_categoria','option')) {?>
                <img src="<?php echo get_field('imagen_blanca_categoria','option');?>" alt="knight models">
           <?php }
            } elseif (get_field("logo_banner",$cat)){
                ?>
                    <img src="<?php echo get_field("logo_banner",$cat);?>" alt="<?php echo $parent_cat->name; ?>">
                <?php } elseif(get_field('imagen_blanca_categoria','option')) {?>
                    <img src="<?php echo get_field('imagen_blanca_categoria','option');?>" alt="knight models">
               <?php }
            } elseif (get_field('logo_sitio','option')){
                ?>
                <img src="<?php echo get_field('logo_sitio','option');?>" alt="knight models">
            <?php }  ?>
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
        if(get_field('lista_blogs','option'))
        foreach (get_field('lista_blogs','option') as $count => $blog) {
        ?>
        <div class="blogs-wrapper">
            <button class="blog-question" idref="<?php echo $count;?>">
                <span><?php echo $blog['titulo_blog'];?></span>
                <img src="<?php echo wp_get_upload_dir()['baseurl'].'/2022/11/arrow_forward_ios.png'; ?>" >
            </button>
            <p class="blog-description" id="<?php echo $count;?>"><?php echo $blog['descripcion_blog'];?></p>
        </div>
        <?php 
        }  
         ?>
    </div>
    <?php
        do_shortcode('[social-media]');
    ?>
</div>
<?php 

} 


