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
            if(get_field('menu_categorias','option')){
                foreach (get_field('menu_categorias','option') as $category_id) {
                    $cat = get_term_by( 'id', $category_id['id_categoria'], 'product_cat' );
            ?>
            <div class="descargas-files-wrapper">
                <div class="descargas-images-wrapper" style="background-image:url(<?php if(get_field('imagen_slider_categoria',$cat)){ 
                    echo get_field('imagen_slider_categoria',$cat); 
                    } elseif(get_field('imagen_seccion_principal_categoria','option')) {
                    echo get_field('imagen_seccion_principal_categoria','option');} ?>)">
                    <?php if(get_field('logo_banner',$cat)){?>
                        <img src="<?php echo get_field('logo_banner',$cat)?>" alt="<?php echo $cat->name?>">
                    <?php } elseif (get_field('imagen_blanca_categoria','option')){ ?>
                        <img src="<?php echo get_field('imagen_blanca_categoria','option')?>" alt="<?php echo $cat->name?>">
                    <?php } ?>
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