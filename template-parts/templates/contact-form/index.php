<?php

 if(get_field('plantilla') == 'contactForm'){ 
    ?>
    <div class="contact-form-title-container">
        <div class="contact-form-logo">
            <?php if(get_field('logo_sitio_dark','option')){?>
            <img src="<?php echo get_field('logo_sitio_dark','option')?>" alt="knight models">
            <?php } ?>
        </div>
        <div class="contact-form-title">
            <p><?php echo get_the_title(); ?></p>
        </div>
    </div>
<?php
if(apply_filters( 'wpml_current_language', null )=='en')
    echo do_shortcode('[contact-form-7 id="21392" title="Contact Form"]');
else
    echo do_shortcode('[contact-form-7 id="14" title="Formulario de contacto"]');

    do_shortcode('[after-categories-component]');
 }