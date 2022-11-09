<?php
/**
 * knightsmodels functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package knightsmodels
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function knightsmodels_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on knightsmodels, use a find and replace
		* to change 'knightsmodels' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'knightsmodels', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'knightsmodels' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'knightsmodels_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'knightsmodels_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function knightsmodels_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'knightsmodels_content_width', 640 );
}
add_action( 'after_setup_theme', 'knightsmodels_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function knightsmodels_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'knightsmodels' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'knightsmodels' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'knightsmodels_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function knightsmodels_scripts() {
	wp_enqueue_style( 'knightsmodels-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'knightsmodels-style', 'rtl', 'replace' );

	wp_enqueue_script( 'knightsmodels-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'knightsmodels-descargas', get_template_directory_uri() . '/js/descargas.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'knightsmodels-contact', get_template_directory_uri() . '/js/contact-form.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'knightsmodels-header', get_template_directory_uri() . '/js/header.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'knightsmodels-sliders', get_template_directory_uri() . '/js/flickity.pkgd.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'knightsmodels-footer', get_template_directory_uri() . '/js/footer.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'knightsmodels-home', get_template_directory_uri() . '/js/home.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'knightsmodels-woocomerce-filters', get_template_directory_uri() . '/js/woocomerceFilters.js', array(), _S_VERSION, true );
	wp_localize_script( 'knightsmodels-woocomerce-filters', 'ajax', array( 'url' => admin_url( 'admin-ajax.php' ) ) );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'knightsmodels_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/block-register.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/* load category woocomerce header */
require get_template_directory() . '/template-parts/templates/woocommerce/category-page-header/index.php';

/* load category woocomerce footer */
require get_template_directory() . '/template-parts/templates/woocommerce/after-categories/index.php';

/* load category woocomerce first level */
require get_template_directory() . '/template-parts/templates/woocommerce/first-level-category/index.php';

/* load social media block */
require get_template_directory() . '/template-parts/templates/block-social-media/index.php';

/* load content */
require get_template_directory() . '/template-parts/templates/content-template/index.php';

/* load category highlights */
require get_template_directory() . '/template-parts/templates/woocommerce/category-highlights/index.php';


function loop_columns() {
	return 4; // 5 products per row
	}
add_filter('loop_shop_columns', 'loop_columns', 999);

/* add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_add_to_cart_button_text_archives' );  
	
function woocommerce_add_to_cart_button_text_archives() {
	return __( 'Añadir a la cesta', 'woocommerce' );
} */

/* ajax */

/* filter by order */
add_action('wp_ajax_nopriv_filter', 'filter');
add_action('wp_ajax_filter', 'filter');

function filter(){
	$category= $_POST['dataSend']['category'];
	$gol= $_POST['dataSend']['gol'];
	switch ($gol) {
		case 'new':{
			echo do_shortcode( '[products columns="4" category='.$category.' orderby="date" order="ASC" ]' );
			wp_die();	
			break;
		}
		case 'high':{
			echo do_shortcode( '[products columns="4" category='.$category.' orderby="price" order="DESC" ]' );
			wp_die();	
			break;
		}
		case 'low':{
			echo do_shortcode( '[products columns="4" category='.$category.' orderby="price" order="ASC" ]' );
			wp_die();	
			break;
		}
		default:{
			echo "No se encontro ningun item bajo este filtro";
			wp_die();	
			break;
		}
	}
}
/* filter by attributes */
add_action('wp_ajax_nopriv_filterAttribute', 'filterAttribute');
add_action('wp_ajax_filterAttribute', 'filterAttribute');

function filterAttribute(){
	$terms= $_POST['dataSend']['terms'];
	$category= $_POST['dataSend']['category'];
	echo do_shortcode( '[products columns="4" category='.$category.' attribute="new" terms="'.$terms.'" ]' );
	wp_die();	
}

/* filter by range price */
add_action('wp_ajax_nopriv_filterRange', 'filterRange');
add_action('wp_ajax_filterRange', 'filterRange');

function filterRange(){
	$min = $_POST['dataSend']['min'];
	$max = $_POST['dataSend']['max'];
	$category = $_POST['dataSend']['category'];
	$query = array(
        'post_status' => 'publish',
        'post_type' => 'product',
		'product_cat' => $category,
        'meta_query' => array(
        array(
            'key' => '_price',
            'value' => array($min, $max),
            'compare' => 'BETWEEN',
            'type' => 'NUMERIC'
            ),
        ),
    );
    
    $wpquery =new WP_Query($query);
	$list='';
	if($wpquery->have_posts()){
        while ($wpquery->have_posts()){
            $wpquery->the_post();
			$prod=wc_get_product( get_the_ID() );
			$list.='
			<li class="product type-product">
			 '.get_the_post_thumbnail().'
                <h2 class="woocommerce-loop-product__title">'.get_the_title().'</h2>
                <div class="price-whislist-product-wraper">
                    <span class="price">'.$prod->get_price_html().'</span>
                    <div class="share-whishlist-wrapper">'.
					 do_shortcode("[yith_wcwl_add_to_wishlist product_id=".get_the_ID()."]") 
					 .'<button class="share-product-button" onclick="showSharePopup(event)"><img refpopup="" src="'.wp_get_upload_dir()["url"].'/share.png" ></button>
            			<div class="share-links">
                			<a href="https://www.facebook.com/share.php?u='.get_permalink( $product->ID ).'" target="_blank"><img src="'.wp_get_upload_dir()["url"].'/facebook-share.png" > </a>
               				<a href="https://wa.me/?text='. get_permalink( $product->ID ).'"  target="_blank"><img src="'.wp_get_upload_dir()["url"].'/whatsapp.svg" ></a>
            			</div> 
                    </div>
                </div>'.
				do_shortcode("[add_to_cart show_price=false id=".get_the_ID()."]")
            .'</li>
			';
		}
		echo '
		<div class="woocommerce">
            <ul class="products">'.$list.
			'</ul>
		</div>';
		wp_die();	
	} else {
		echo 'No hay resultados encontrados';
		wp_die();	
	} 
}
add_filter( 'wpcf7_form_elements', 'do_shortcode' );