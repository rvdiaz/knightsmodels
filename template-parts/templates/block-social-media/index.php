<?php
add_shortcode( 'social-media', 'social_media' );

function social_media(){
    ?>
    
    <div class="social-media-container">
        <div class="social-media">
            <?php
            if(get_field('list_redes_sociales','option')){
                foreach (get_field('list_redes_sociales','option') as $red) {
                   ?>
                    <div class="social-media-image-wrapper">
                        <a href="<?php echo $red['enlace_red']; ?>" target="_blank">
                            <img src="<?php echo $red['image_red']; ?>">
                        </a>
                    </div>
                   <?php
                }
            }
            ?>
        </div>
        <div class="footer-links">
            <?php
            $aux=0;
            if(get_field('lista_enlaces_footer_categorias','option')){
                foreach (get_field('lista_enlaces_footer_categorias','option') as $link) { 
                    ?>
                    <a href="<?php echo $link['enlace_footer_categorias']['url'];?>" target="_blank">
                    <?php if($aux!==0){?>
                        <span class="enlace-separator">|</span>
                    <?php } ?>
                        <span><?php echo $link['enlace_footer_categorias']['title'];?></span>
                    </a>
                <?php
                $aux++;
                }
            }
            ?>
        </div>
    </div>

<?php
}
?>

