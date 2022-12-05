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

    // Get RSS Feed(s)
    include_once( ABSPATH . WPINC . '/feed.php' );
        
    // Get a SimplePie feed object from the specified feed source.
    $rss = fetch_feed( 'https://www.batman-miniaturegame.com/blog-feed.xml');
        
    if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly
        
        // Figure out how many total items there are, but limit it to 5. 
        $maxitems = $rss->get_item_quantity( 5 ); 
        
        // Build an array of all the items, starting with element 0 (first element).
        $rss_items = $rss->get_items( 0, $maxitems );
        
    endif;

?>
    <div class="blog-container blog-list-container">
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
  
<?php // Get RSS Feed(s)
include_once( ABSPATH . WPINC . '/feed.php' );
  
// Get a SimplePie feed object from the specified feed source.
$rss = fetch_feed( 'https://www.batman-miniaturegame.com/blog-feed.xml');
  
if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly
  
    // Figure out how many total items there are, but limit it to 5. 
    $maxitems = $rss->get_item_quantity( 5 ); 
  
    // Build an array of all the items, starting with element 0 (first element).
    $rss_items = $rss->get_items( 0, $maxitems );
  
endif;
?>
  
<ul>
    <?php if ( $maxitems == 0 ) : ?>
        <li><?php _e( 'No items', 'my-text-domain' ); ?></li>
    <?php else : ?>
        <?php // Loop through each feed item and display each item as a hyperlink. ?>
        <?php foreach ( $rss_items as $item ) :
            /* var_dump($item); */
            var_dump($item->get_enclosure()->get_link());
            ?>
            <li>
              
                <a href="<?php echo esc_url( $item->get_permalink() ); ?>"
                    title="<?php printf( __( 'Posted %s', 'my-text-domain' ), $item->get_date('j F Y | g:i a') ); ?>">
                    <?php echo esc_html( $item->get_title() ); ?>
                </a>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>
<?php    
}
