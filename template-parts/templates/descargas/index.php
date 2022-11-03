<?php
 if(get_field('plantilla') == 'descarga'){  
$args= array(
	    'orderby' => 'name',
	    'hide_empty' => false,
	); 
	$all_categories= get_terms('product_cat',$args);
?>
    <div class="descargas-title-container">
        <p class="descargas-title">Descargas</p>
    </div>    
    <div class="descargas-files-container">
            <?php
            foreach ($all_categories as $keycat => $cat) {
                $parent_id=$cat->parent;
                $parent = get_term_by( 'id', $parent_id, 'product_cat' );
                if($parent->name=='inicio'){
                    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
                    $image = wp_get_attachment_url( $thumbnail_id );
            ?>
            <div class="descargas-files-wrapper">
                <div class="descargas-images-wrapper" style="background-image:url(<?php echo $image;?>)">
                    <img src="<?php echo get_field('logo_banner',$cat)?>" alt="<?php echo $cat->name?>">
                    <button class="descargas-dropdown-files" ><img onclick="openAccord(event)" idaccordion="accordion-<?php echo $keycat;?>" src="<?php echo wp_get_upload_dir()["url"]?>/icono-flecha-opciones.png" ></button>
                </div>
                <div class="descargas-files-accordion" id="accordion-<?php echo $keycat;?>">
                    <?php if(get_field('lista_de_carpetas_de_descarga',$cat))
                    foreach (get_field('lista_de_carpetas_de_descarga',$cat) as $key => $filelist) { ?>
                    <button class="descarga-button" onclick="openAccordFile(event)" idfiles="<?php echo $cat->slug;?>-file-<?php echo $key?>">
                        <?php if(get_field('logo_ico_menu_active',$cat)){?>
                            <img src="<?php echo get_field('logo_ico_menu_active',$cat);?>" alt="<?php echo $cat->name;?>">
                        <?php } ?>
                        <?php echo $filelist['titulo_de_carpeta_de_descarga'];?>
                        <img src="<?php echo wp_get_upload_dir()["url"]?>/icono-flecha-opciones-1.png">
                    </button>
                    <div class="descarga-files" id="<?php echo $cat->slug;?>-file-<?php echo $key?>">
                        <?php 
                        foreach ($filelist['lista_de_archivos_de_descarga'] as $files){?>
                            <a class="file-wrapper" download href="<?php echo $files['archivo_de_descarga'];?>">
                                <span class="file-title"><?php echo $files['titulo_archivo_de_descarga'];?></span>
                                <img src="<?php echo $files['imagen_de_idioma'];?>">
                            </a>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php }
    }
?>
        </div>
<?php
do_shortcode('[after-categories-component]');
}   
?>

<style>
    .contact-form-container .contact-group{
        background-image:url("<?php echo wp_get_upload_dir()["url"]?>/Group-62.png");
    }
    .contact-form-container .contact-group-file{
        background-image:url("<?php echo wp_get_upload_dir()["url"]?>/Group-110.png");
    }
    .contact-form-container .contact-group-textarea{
        background-image:url("<?php echo wp_get_upload_dir()["url"]?>/Group-111.png");
    }
    .contact-submit-form input {
        background-image: url("<?php echo wp_get_upload_dir()["baseurl"]?>/2022/10/Rectangle-65.png");
    }
    .contact-group-file input[type=file]::file-selector-button {
        background-image: url("<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/Rectangle-152.png");
    }
    @media (max-width: 1024px){
    .contact-group {
        background-image:url("<?php echo wp_get_upload_dir()["url"]?>/Group-110.png") !important;
    }
  }
</style>
