<?php
    if(get_field('plantilla') == 'blog'){  
        $args = array(  
            'post_type' => 'blog',
            'post_status' => 'publish',
            'posts_per_page' => 8, 
            'orderby' => 'title', 
            'order' => 'ASC'
        );
        $loop = new WP_Query( $args ); 
?>
    <div class="blog-container">
        <div class="title-blog-container-blog-page">
            <p><?php echo get_the_title(); ?></p>
        </div>
        <div class="blog-slider-container blog-list-page">
            <?php
             while ( $loop->have_posts() ) : $loop->the_post(); 
                $blog=get_post($id['blog_relacionado']);
            ?>
            <div class="blog-slider-item-container">
                <div class="blog-image">
                    <?php echo get_the_post_thumbnail( $id['blog_relacionado'], 'medium');?>
                </div>
                <div class="blog-info">
                    <p class="blog-title">
                        <?php echo get_the_title($id['blog_relacionado']);?>
                    </p>
                    <p class="blog-date">
                        <?php echo get_the_date('F j, Y',$id['blog_relacionado']);?>
                    </p>
                    <p class="blog-slider-description">
                        <?php echo  get_the_excerpt($id['blog_relacionado']);?>
                    </p>
                </div>
                <div class="blog-seemore-button">
                    <a href="<?php echo get_permalink($id['blog_relacionado'])?>"><?php _e('See more', 'knightsmodels');?>...</a>
                </div>  
            </div>
        <?php  
    endwhile;
    wp_reset_postdata(); 
?>
        </div>
    </div>
<?php    
}