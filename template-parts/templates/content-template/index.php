<?php 
add_shortcode( 'content', 'content' );

function content(){?>
    <div class="content-page">
        <div class="contact-form-title">
            <p><?php echo get_the_title(); ?></p>
        </div>
        <div class="form-title">
            <p><?php echo get_the_content(); ?></p>
        </div>
    </div>
<?php }
