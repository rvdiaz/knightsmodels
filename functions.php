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

/* load search modal */
require get_template_directory() . '/template-parts/templates/modal-search/index.php';



function loop_columns() {
	return 4; // 5 products per row
	}
add_filter('loop_shop_columns', 'loop_columns', 999);

/* filter by order */
add_action('wp_ajax_nopriv_filter', 'filter');
add_action('wp_ajax_filter', 'filter');

function filter(){
	$category= $_POST['dataSend']['category'];
	$gol= $_POST['dataSend']['gol'];
	$page = ( $_POST['dataSend']['page'] ) ? $_POST['dataSend']['page'] : 1;

	switch ($gol) {
		case 'new':{
			filterNew($category,$page);
			break;
		}
		case 'high':{
			filterhigh($category,$page);
			break;
		}
		case 'low':{
			filterlow($category,$page);
			break;
		}
		default:{
			_e('No search results', 'knightsmodels');;
			wp_die();	
			break;
		}
	}
}

function filterNew($category,$page){
	$query = array(
		'posts_per_page' => $posts_per_page,
    	'paged'          => $page,
        'post_status' => 'publish',
        'post_type' => 'product',
		'product_cat' => $category,
		'limit' => 16,
		'paginate'=>true,
		'orderby' => 'date',
    	'order' => 'DESC'
    );

	$wpquery =new WP_Query($query);

	$posts_per_page = get_option( 'posts_per_page' );
	$total = $wpquery->found_posts;

	$itemsPagination=0;
	$division=$total/$posts_per_page;

	if($division >= 1){
		if($total%$posts_per_page > 0)
			$itemsPagination=$division+1;
		else
			$itemsPagination=$division;
	}
	$pagination='';

	$list='';
	if($wpquery->have_posts()){
        while ($wpquery->have_posts()){
            $wpquery->the_post();
			$prod=wc_get_product( get_the_ID() );
			$list.='
			<li class="product type-product range-image">
				<a class="link-attachment-post-thumbnail" href="'.get_permalink( $product->ID ).'" class="woocommerce-loop-product__title">
				'.get_the_post_thumbnail().'
				</a>
			 	<div class="product-title-container">
                	<a href="'.get_permalink( $product->ID ).'" class="woocommerce-loop-product__title">'.get_the_title().'</a>
				</div>
                <div class="price-whislist-product-wraper">
                    <span class="price">'.$prod->get_price_html().'</span>
                    <div class="share-whishlist-wrapper">'.
					 do_shortcode("[yith_wcwl_add_to_wishlist product_id=".get_the_ID()."]") 
					 .'<button class="share-product-button" onclick="showSharePopup(event)"><img refpopup="" src="'.wp_get_upload_dir()["baseurl"].'/2022/11/share.png" ></button>
            			<div class="share-links">
                			<a href="https://www.facebook.com/share.php?u='.get_permalink( $product->ID ).'" target="_blank"><img src="'.wp_get_upload_dir()["baseurl"].'/2022/11/facebook-share.png" > </a>
               				<a href="https://wa.me/?text='. get_permalink( $product->ID ).'"  target="_blank"><img src="'.wp_get_upload_dir()["baseurl"].'/2022/11/whatsapp.svg" ></a>
            			</div> 
                    </div>
                </div>'.
				do_shortcode("[add_to_cart show_price=false id=".get_the_ID()."]")
            .'</li>
			';
		}

		if($itemsPagination != 0){
			$prevDisabled='';
			$nextDisabled='';
			if($page-1==0){
				$prevDisabled='disabled';
			}
			if($page+1>$itemsPagination){
				$nextDisabled='disabled';
			}
			$i=1;
			$pagination='
			<nav class="filter-pagination-container">
				<li class="item-filter-pagination" >
					<button class="paginations-button" '.$prevDisabled.' filter="new" onclick="filter(event)" page="'.($page-1).'"><span><</span>'.__('Prev', 'knightsmodels').'</button>
				</li>
				<ul class="filter-pagination">'
				;
			while ($i <= $itemsPagination) {
				$active='';
				if($i==$page) 
					$active="page-active";
				$pagination.='
				<li class="item-filter-pagination '.$active.'" >
					<button onclick="filter(event)" filter="new" page="'.$i.'">'.$i.'</button>
				</li>
				';
				$i++;
			}
			$pagination.='
			</ul>
				<li class="item-filter-pagination" >
					<button class="paginations-button" '.$nextDisabled.' filter="new" onclick="filter(event)"  page="'.($page+1).'">'.__('Next', 'knightsmodels').'<span>></span></button>
				</li>
			</nav>
			';
		}
		echo '
		<div class="woocommerce">
            <ul class="products">'.$list.
			'</ul>
			'.$pagination.'
		</div>';

		wp_die();	
	} else {?>
		<div class="not-results-container">
			<p>
				<?php _e('No search results', 'knightsmodels'); ?>
			</p>
		</div>
	<?php
		wp_die();	
	} 
}

function filterhigh($category,$page){
	$query = array(
		'posts_per_page' => $posts_per_page,
    	'paged'          => $page,
        'post_status' => 'publish',
        'post_type' => 'product',
		'product_cat' => $category,
		'limit' => 16,
		'paginate'=>true,
		'orderby'        => 'meta_value_num',
		'meta_key'       => '_price',
		'order'          => 'desc'
    );

	$wpquery =new WP_Query($query);

	$posts_per_page = get_option( 'posts_per_page' );
	$total = $wpquery->found_posts;

	$itemsPagination=0;
	$division=$total/$posts_per_page;

	if($division >= 1){
		if($total%$posts_per_page > 0)
			$itemsPagination=$division+1;
		else
			$itemsPagination=$division;
	}
	$pagination='';

	$list='';
	if($wpquery->have_posts()){
        while ($wpquery->have_posts()){
            $wpquery->the_post();
			$prod=wc_get_product( get_the_ID() );
			$list.='
			<li class="product type-product range-image">
				<a class="link-attachment-post-thumbnail" href="'.get_permalink( $product->ID ).'" class="woocommerce-loop-product__title">
			 		'.get_the_post_thumbnail().'
			 	</a>
			 	<div class="product-title-container">
                	<a href="'.get_permalink( $product->ID ).'" class="woocommerce-loop-product__title">'.get_the_title().'</a>
				</div>
                <div class="price-whislist-product-wraper">
                    <span class="price">'.$prod->get_price_html().'</span>
                    <div class="share-whishlist-wrapper">'.
					 do_shortcode("[yith_wcwl_add_to_wishlist product_id=".get_the_ID()."]") 
					 .'<button class="share-product-button" onclick="showSharePopup(event)"><img refpopup="" src="'.wp_get_upload_dir()["baseurl"].'/2022/11/share.png" ></button>
            			<div class="share-links">
                			<a href="https://www.facebook.com/share.php?u='.get_permalink( $product->ID ).'" target="_blank"><img src="'.wp_get_upload_dir()["baseurl"].'/2022/11/facebook-share.png" > </a>
               				<a href="https://wa.me/?text='. get_permalink( $product->ID ).'"  target="_blank"><img src="'.wp_get_upload_dir()["baseurl"].'/2022/11/whatsapp.svg" ></a>
            			</div> 
                    </div>
                </div>'.
				do_shortcode("[add_to_cart show_price=false id=".get_the_ID()."]")
            .'</li>
			';
		}

		if($itemsPagination != 0){
			$prevDisabled='';
			$nextDisabled='';
			if($page-1==0){
				$prevDisabled='disabled';
			}
			if($page+1>$itemsPagination){
				$nextDisabled='disabled';
			}
			$i=1;
			$pagination='
			<nav class="filter-pagination-container">
				<li class="item-filter-pagination" >
					<button class="paginations-button" '.$prevDisabled.' filter="high" onclick="filter(event)" page="'.($page-1).'"><span><</span>'.__('Prev', 'knightsmodels').'</button>
				</li>
				<ul class="filter-pagination">'
				;
			while ($i <= $itemsPagination) {
				$active='';
				if($i==$page) 
					$active="page-active";
				$pagination.='
				<li class="item-filter-pagination '.$active.'" >
					<button onclick="filter(event)" filter="high" page="'.$i.'">'.$i.'</button>
				</li>
				';
				$i++;
			}
			$pagination.='
			</ul>
				<li class="item-filter-pagination" >
					<button class="paginations-button" '.$nextDisabled.' filter="high" onclick="filter(event)"  page="'.($page+1).'">'.__('Next', 'knightsmodels').'<span>></span></button>
				</li>
			</nav>
			';
		}
		echo '
		<div class="woocommerce">
            <ul class="products">'.$list.
			'</ul>
			'.$pagination.'
		</div>';

		wp_die();	
	} else {?>
		<div class="not-results-container">
			<p>
				<?php _e('No search results', 'knightsmodels'); ?>
			</p>
		</div>
	<?php
		wp_die();	
	} 
}

function filterlow($category,$page){
	$query = array(
		'posts_per_page' => $posts_per_page,
    	'paged'          => $page,
        'post_status' => 'publish',
        'post_type' => 'product',
		'product_cat' => $category,
		'limit' => 16,
		'paginate'=>true,
		'orderby'        => 'meta_value_num',
		'meta_key'       => '_price',
		'order'          => 'asc'
    );

	$wpquery =new WP_Query($query);

	$posts_per_page = get_option( 'posts_per_page' );
	$total = $wpquery->found_posts;

	$itemsPagination=0;
	$division=$total/$posts_per_page;

	if($division >= 1){
		if($total%$posts_per_page > 0)
			$itemsPagination=$division+1;
		else
			$itemsPagination=$division;
	}
	$pagination='';

	$list='';
	if($wpquery->have_posts()){
        while ($wpquery->have_posts()){
            $wpquery->the_post();
			$prod=wc_get_product( get_the_ID() );
			$list.='
			<li class="product type-product range-image">
				<a class="link-attachment-post-thumbnail" href="'.get_permalink( $product->ID ).'" class="woocommerce-loop-product__title">
			 		'.get_the_post_thumbnail().'
			 	</a>
			 	<div class="product-title-container">
                	<a href="'.get_permalink( $product->ID ).'" class="woocommerce-loop-product__title">'.get_the_title().'</a>
				</div>
                <div class="price-whislist-product-wraper">
                    <span class="price">'.$prod->get_price_html().'</span>
                    <div class="share-whishlist-wrapper">'.
					 do_shortcode("[yith_wcwl_add_to_wishlist product_id=".get_the_ID()."]") 
					 .'<button class="share-product-button" onclick="showSharePopup(event)"><img refpopup="" src="'.wp_get_upload_dir()["baseurl"].'/2022/11/share.png" ></button>
            			<div class="share-links">
                			<a href="https://www.facebook.com/share.php?u='.get_permalink( $product->ID ).'" target="_blank"><img src="'.wp_get_upload_dir()["baseurl"].'/2022/11/facebook-share.png" > </a>
               				<a href="https://wa.me/?text='. get_permalink( $product->ID ).'"  target="_blank"><img src="'.wp_get_upload_dir()["baseurl"].'/2022/11/whatsapp.svg" ></a>
            			</div> 
                    </div>
                </div>'.
				do_shortcode("[add_to_cart show_price=false id=".get_the_ID()."]")
            .'</li>
			';
		}

		if($itemsPagination != 0){
			$prevDisabled='';
			$nextDisabled='';
			if($page-1==0){
				$prevDisabled='disabled';
			}
			if($page+1>$itemsPagination){
				$nextDisabled='disabled';
			}
			$i=1;
			$pagination='
			<nav class="filter-pagination-container">
				<li class="item-filter-pagination" >
					<button class="paginations-button" '.$prevDisabled.' filter="low" onclick="filter(event)" page="'.($page-1).'"><span><</span>'.__('Prev', 'knightsmodels').'</button>
				</li>
				<ul class="filter-pagination">'
				;
			while ($i <= $itemsPagination) {
				$active='';
				if($i==$page) 
					$active="page-active";
				$pagination.='
				<li class="item-filter-pagination '.$active.'" >
					<button onclick="filter(event)" filter="low" page="'.$i.'">'.$i.'</button>
				</li>
				';
				$i++;
			}
			$pagination.='
			</ul>
				<li class="item-filter-pagination" >
					<button class="paginations-button" '.$nextDisabled.' filter="low" onclick="filter(event)"  page="'.($page+1).'">'.__('Next', 'knightsmodels').'<span>></span></button>
				</li>
			</nav>
			';
		}
		echo '
		<div class="woocommerce">
            <ul class="products">'.$list.
			'</ul>
			'.$pagination.'
		</div>';

		wp_die();	
	} else {?>
		<div class="not-results-container">
			<p>
				<?php _e('No search results', 'knightsmodels'); ?>
			</p>
		</div>
	<?php
		wp_die();	
	} 
}
/* filter by attributes */
add_action('wp_ajax_nopriv_filterAttribute', 'filterAttribute');
add_action('wp_ajax_filterAttribute', 'filterAttribute');

function filterAttribute(){
	$category= $_POST['dataSend']['category'];
	$terms= $_POST['dataSend']['terms'];
	$attr= $_POST['dataSend']['attr'];
	$page = ( $_POST['dataSend']['page'] ) ? $_POST['dataSend']['page'] : 1;

	$query = array(
		'posts_per_page' => $posts_per_page,
    	'paged'          => $page,
        'post_status' => 'publish',
        'post_type' => 'product',
		'product_cat' => $category,
		'limit' => 16,
		'paginate'=>true,
		'tax_query'           => array(
			array(
				'taxonomy'        => $attr,
				'field'           => 'slug',
				'terms'           => $terms,
				'operator'        => 'IN'
			  )
		)
    );

	$wpquery =new WP_Query($query);

	$posts_per_page = get_option( 'posts_per_page' );
	$total = $wpquery->found_posts;

	$itemsPagination=0;
	$division=$total/$posts_per_page;

	if($division >= 1){
		if($total%$posts_per_page > 0)
			$itemsPagination=$division+1;
		else
			$itemsPagination=$division;
	}
	$pagination='';

	$list='';
	if($wpquery->have_posts()){
        while ($wpquery->have_posts()){
            $wpquery->the_post();
			$prod=wc_get_product( get_the_ID() );
			$list.='
			<li class="product type-product range-image">
				<a class="link-attachment-post-thumbnail" href="'.get_permalink( $product->ID ).'" class="woocommerce-loop-product__title">
			 		'.get_the_post_thumbnail().'
			 	</a>
			 	<div class="product-title-container">
                	<a href="'.get_permalink( $product->ID ).'" class="woocommerce-loop-product__title">'.get_the_title().'</a>
				</div>
                <div class="price-whislist-product-wraper">
                    <span class="price">'.$prod->get_price_html().'</span>
                    <div class="share-whishlist-wrapper">'.
					 do_shortcode("[yith_wcwl_add_to_wishlist product_id=".get_the_ID()."]") 
					 .'<button class="share-product-button" onclick="showSharePopup(event)"><img refpopup="" src="'.wp_get_upload_dir()["baseurl"].'/2022/11/share.png" ></button>
            			<div class="share-links">
                			<a href="https://www.facebook.com/share.php?u='.get_permalink( $product->ID ).'" target="_blank"><img src="'.wp_get_upload_dir()["baseurl"].'/2022/11/facebook-share.png" > </a>
               				<a href="https://wa.me/?text='. get_permalink( $product->ID ).'"  target="_blank"><img src="'.wp_get_upload_dir()["baseurl"].'/2022/11/whatsapp.svg" ></a>
            			</div> 
                    </div>
                </div>'.
				do_shortcode("[add_to_cart show_price=false id=".get_the_ID()."]")
            .'</li>
			';
		}

		if($itemsPagination > 1){
			$prevDisabled='';
			$nextDisabled='';
			if($page-1==0){
				$prevDisabled='disabled';
			}
			if($page+1>$itemsPagination){
				$nextDisabled='disabled';
			}
			$i=1;
			$pagination='
			<nav class="filter-pagination-container">
				<li class="item-filter-pagination" >
					<button class="paginations-button" '.$prevDisabled.' slug="'.$terms.'" onclick="filterAttribute(event)" page="'.($page-1).'"><span><</span>'.__('Prev', 'knightsmodels').'</button>
				</li>
				<ul class="filter-pagination">'
				;
			while ($i <= $itemsPagination) {
				$active='';
				if($i==$page) 
					$active="page-active";
				$pagination.='
				<li class="item-filter-pagination '.$active.'" >
					<button onclick="filterAttribute(event)" slug="'.$terms.'" page="'.$i.'">'.$i.'</button>
				</li>
				';
				$i++;
			}
			$pagination.='
			</ul>
				<li class="item-filter-pagination" >
					<button class="paginations-button" '.$nextDisabled.' slug="'.$terms.'" onclick="filterAttribute(event)"  page="'.($page+1).'">'.__('Next', 'knightsmodels').'<span>></span></button>
				</li>
			</nav>
			';
		}
		echo '
		<div class="woocommerce">
            <ul class="products">'.$list.
			'</ul>
			'.$pagination.'
		</div>';

		wp_die();	
	} else {?>
		<div class="not-results-container">
			<p>
				<?php _e('No search results', 'knightsmodels'); ?>
			</p>
		</div>
	<?php
		wp_die();	
	} 
}

/* filter by range price */
add_action('wp_ajax_nopriv_filterRange', 'filterRange');
add_action('wp_ajax_filterRange', 'filterRange');

function filterRange(){
	$min = $_POST['dataSend']['min'];
	$max = $_POST['dataSend']['max'];
	$category = $_POST['dataSend']['category'];

	$page = ( $_POST['dataSend']['page'] ) ? $_POST['dataSend']['page'] : 1;

	$query = array(
		'posts_per_page' => $posts_per_page,
    	'paged'          => $page,
        'post_status' => 'publish',
        'post_type' => 'product',
		'product_cat' => $category,
		'limit' => 16,
		'paginate'=>true,
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

	$posts_per_page = get_option( 'posts_per_page' );
	$total = $wpquery->found_posts;

	$itemsPagination=0;
	$division=$total/$posts_per_page;

	if($division >= 1){
		if($total%$posts_per_page > 0)
			$itemsPagination=$division+1;
		else
			$itemsPagination=$division;
	}
	$pagination='';

	$list='';
	if($wpquery->have_posts()){
        while ($wpquery->have_posts()){
            $wpquery->the_post();
			$prod=wc_get_product( get_the_ID() );
			$list.='
			<li class="product type-product range-image">
				<a class="link-attachment-post-thumbnail" href="'.get_permalink( $product->ID ).'" class="woocommerce-loop-product__title">
			 		'.get_the_post_thumbnail().'
			 	</a>
			 	<div class="product-title-container">
                	<a href="'.get_permalink( $product->ID ).'" class="woocommerce-loop-product__title">'.get_the_title().'</a>
				</div>
                <div class="price-whislist-product-wraper">
                    <span class="price">'.$prod->get_price_html().'</span>
                    <div class="share-whishlist-wrapper">'.
					 do_shortcode("[yith_wcwl_add_to_wishlist product_id=".get_the_ID()."]") 
					 .'<button class="share-product-button" onclick="showSharePopup(event)"><img refpopup="" src="'.wp_get_upload_dir()["baseurl"].'/2022/11/share.png" ></button>
            			<div class="share-links">
                			<a href="https://www.facebook.com/share.php?u='.get_permalink( $product->ID ).'" target="_blank"><img src="'.wp_get_upload_dir()["baseurl"].'/2022/11/facebook-share.png" > </a>
               				<a href="https://wa.me/?text='. get_permalink( $product->ID ).'"  target="_blank"><img src="'.wp_get_upload_dir()["baseurl"].'/2022/11/whatsapp.svg" ></a>
            			</div> 
                    </div>
                </div>'.
				do_shortcode("[add_to_cart show_price=false id=".get_the_ID()."]")
            .'</li>
			';
		}

		if($itemsPagination != 0){
			$prevDisabled='';
			$nextDisabled='';
			if($page-1==0){
				$prevDisabled='disabled';
			}
			if($page+1>$itemsPagination){
				$nextDisabled='disabled';
			}
			$i=1;
			$pagination='
			<nav class="filter-pagination-container">
				<li class="item-filter-pagination" >
					<button class="paginations-button" '.$prevDisabled.' onclick="filterRange(event)" min="'.$min.'" max="'.$max.'" page="'.($page-1).'"><span><</span>'.__('Prev', 'knightsmodels').'</button>
				</li>
				<ul class="filter-pagination">'
				;
			while ($i <= $itemsPagination) {
				$active='';
				if($i==$page) 
					$active="page-active";
				$pagination.='
				<li class="item-filter-pagination '.$active.'" >
					<button onclick="filterRange(event)" min="'.$min.'" max="'.$max.'" page="'.$i.'">'.$i.'</button>
				</li>
				';
				$i++;
			}
			$pagination.='
			</ul>
				<li class="item-filter-pagination" >
					<button class="paginations-button" '.$nextDisabled.' onclick="filterRange(event)" min="'.$min.'" max="'.$max.'" page="'.($page+1).'">'.__('Next', 'knightsmodels').'<span>></span></button>
				</li>
			</nav>
			';
		}
		echo '
		<div class="woocommerce">
            <ul class="products">'.$list.
			'</ul>
			'.$pagination.'
		</div>';

		wp_die();	
	} else {?>
		<div class="not-results-container">
			<p>
				<?php _e('No search results', 'knightsmodels'); ?>
			</p>
		</div>
	<?php
		wp_die();	
	} 
}

/* filter by all product first category */
add_action('wp_ajax_nopriv_firstFilterAll', 'firstFilterAll');
add_action('wp_ajax_firstFilterAll', 'firstFilterAll');

function firstFilterAll(){
	$category = $_POST['dataSend']['category'];
	$argsProduct = array(
		'category' => array($category),
		'post_status' => 'publish',
		'limit' => 30
	);
	$i=0;
	$products = wc_get_products( $argsProduct ); 
	$list1='<div class="card-product-container-first">
	</div>';
	$list2='<div class="card-product-container-first">
	</div>';
	if(count($products)> 0){
		if(count($products) > 10){
			while ($i < intdiv(count($products),2)) {
		$list1.='
		<div class="card-product-container">
			<div class="product-image-container">
				<a href="'.$products[$i]->get_permalink().'">
					'.$products[$i]->get_image().'
				</a>
			</div>
			<div class="product-title-container">
				<a class="product-title" href="'.$products[$i]->get_permalink().'">'.$products[$i]->get_name().'</a>
			</div>
			<div class="product-price-wishlist-container">
				<p class="product-price">'. $products[$i]->get_price_html(). '</p>
				'.do_shortcode("[yith_wcwl_add_to_wishlist product_id=".$products[$i]->id.']').'
			</div>
			<div class="product-add-cart-button-container">
				'. do_shortcode("[add_to_cart show_price=false id=".$products[$i]->id."]").'
			</div>
		</div>';

		$i=$i+1;
		}
		$i=intdiv(count($products),2);
		while($i < count($products)){
		$list2.='
		<div class="card-product-container second-card">
			<div class="product-image-container">
				<a href="'.$products[$i]->get_permalink().'">
					'.$products[$i]->get_image().'
				</a>
			</div>
			<div class="product-title-container">
				<a class="product-title" href="'.$products[$i]->get_permalink().'">'.$products[$i]->get_name().'</a>
			</div>
			<div class="product-price-wishlist-container">
				<p class="product-price">'. $products[$i]->get_price_html(). '</p>
				'.do_shortcode("[yith_wcwl_add_to_wishlist product_id=".$products[$i]->id.']').'
			</div>
			<div class="product-add-cart-button-container">
				'. do_shortcode("[add_to_cart show_price=false id=".$products[$i]->id."]").'
			</div>
		</div>';
		$i=$i+1;
		}
		
		echo '
		<div class="woocommerceq">
			<ul class="productsq">'.$list1.
			'</ul>
		</div>';
		echo '
		<div class="woocommerceq">
			<ul class="productsq">'.$list2.
			'</ul>
		</div>';
		}else {
		foreach ($products as $product) {
		$list1.='
		<div>
			<div class="card-product-container">
                <div class="product-image-container">
					<a href="'.$product->get_permalink().'">
						'.$product->get_image().'
					</a>
				</div>
				<div class="product-title-container">
					<a class="product-title" href="'.$product->get_permalink().'">'.$product->get_name().'</a>
				</div>
				<div class="product-price-wishlist-container">
					<p class="product-price">'. $product->get_price_html(). '</p>
					'.do_shortcode("[yith_wcwl_add_to_wishlist product_id=".$product->id.']').'
				</div>
				<div class="product-add-cart-button-container">
					'. do_shortcode("[add_to_cart show_price=false id=".$product->id."]").'
				</div>
			</div>
		</div>';
		}
		echo '
		<div class="woocommerceq">
			<ul class="productsq">'.$list1.
			'</ul>
		</div>';
	
	}
		wp_die();	
	} else {?>
		<div class="not-results-container">
			<p>
				<?php _e('No search results', 'knightsmodels'); ?>
			</p>
		</div><?php
		wp_die();	
	} 
}

/* filter by recents product first category */
add_action('wp_ajax_nopriv_firstFilterRecent', 'firstFilterRecent');
add_action('wp_ajax_firstFilterRecent', 'firstFilterRecent');

function firstFilterRecent(){
	$category = $_POST['dataSend']['category'];
	$argsProduct = array(
		'category' => array($category),
		'post_status' => 'publish',
		'orderby' => 'date',
    	'order' => 'DESC',
		'limit' => 30
	);
	$i=0;
	$products = wc_get_products( $argsProduct ); 
	$list1='<div class="card-product-container-first">
	</div>';
	$list2='<div class="card-product-container-first">
	</div>';
	if(count($products)> 0){
		if(count($products) > 10){
			while ($i < intdiv(count($products),2)) {
		$list1.='
		<div class="card-product-container">
			<div class="product-image-container">
				<a href="'.$products[$i]->get_permalink().'">
					'.$products[$i]->get_image().'
				</a>
			</div>
			<div class="product-title-container">
				<a class="product-title" href="'.$products[$i]->get_permalink().'">'.$products[$i]->get_name().'</a>
			</div>
			<div class="product-price-wishlist-container">
				<p class="product-price">'. $products[$i]->get_price_html(). '</p>
				'.do_shortcode("[yith_wcwl_add_to_wishlist product_id=".$products[$i]->id.']').'
			</div>
			<div class="product-add-cart-button-container">
				'. do_shortcode("[add_to_cart show_price=false id=".$products[$i]->id."]").'
			</div>
		</div>';

		$i=$i+1;
		}
		$i=intdiv(count($products),2);
		while($i < count($products)){
		$list2.='
		<div class="card-product-container second-card">
			<div class="product-image-container">
				<a href="'.$products[$i]->get_permalink().'">
					'.$products[$i]->get_image().'
				</a>
			</div>
			<div class="product-title-container">
				<a class="product-title" href="'.$products[$i]->get_permalink().'">'.$products[$i]->get_name().'</a>
			</div>
			<div class="product-price-wishlist-container">
				<p class="product-price">'. $products[$i]->get_price_html(). '</p>
				'.do_shortcode("[yith_wcwl_add_to_wishlist product_id=".$products[$i]->id.']').'
			</div>
			<div class="product-add-cart-button-container">
				'. do_shortcode("[add_to_cart show_price=false id=".$products[$i]->id."]").'
			</div>
		</div>';
		$i=$i+1;
		}
		
		echo '
		<div class="woocommerceq">
			<ul class="productsq">'.$list1.
			'</ul>
		</div>';
		echo '
		<div class="woocommerceq">
			<ul class="productsq">'.$list2.
			'</ul>
		</div>';
		}else {
		foreach ($products as $product) {
		$list1.='
		<div>
			<div class="card-product-container">
                <div class="product-image-container">
					<a href="'.$product->get_permalink().'">
						'.$product->get_image().'
					</a>
				</div>
				<div class="product-title-container">
					<a class="product-title" href="'.$product->get_permalink().'">'.$product->get_name().'</a>
				</div>
				<div class="product-price-wishlist-container">
					<p class="product-price">'. $product->get_price_html(). '</p>
					'.do_shortcode("[yith_wcwl_add_to_wishlist product_id=".$product->id.']').'
				</div>
				<div class="product-add-cart-button-container">
					'. do_shortcode("[add_to_cart show_price=false id=".$product->id."]").'
				</div>
			</div>
		</div>';
		}
		echo '
		<div class="woocommerceq">
			<ul class="productsq">'.$list1.
			'</ul>
		</div>';
	
	}
		wp_die();	
	} else {?>
		<div class="not-results-container">
			<p>
				<?php _e('No search results', 'knightsmodels'); ?>
			</p>
		</div><?php
		wp_die();	
	} 
}

/* filter by best sale product first category */
add_action('wp_ajax_nopriv_firstFilterSales', 'firstFilterSales');
add_action('wp_ajax_firstFilterSales', 'firstFilterSales');

function firstFilterSales(){
	$category = $_POST['dataSend']['category'];
	$argsProduct = array(
		'category' => array($category),
		'post_status' => 'publish',
		'orderby'   => 'meta_value_num',
  		'meta_key'  => 'total_sales',
		'limit' => 30
	);
	$i=0;
	$products = wc_get_products( $argsProduct ); 
	$list1='<div class="card-product-container-first">
	</div>';
	$list2='<div class="card-product-container-first">
	</div>';
	if(count($products)> 0){
		if(count($products) > 10){
			while ($i < intdiv(count($products),2)) {
		$list1.='
		<div class="card-product-container">
			<div class="product-image-container">
				<a href="'.$products[$i]->get_permalink().'">
					'.$products[$i]->get_image().'
				</a>
			</div>
			<div class="product-title-container">
				<a class="product-title" href="'.$products[$i]->get_permalink().'">'.$products[$i]->get_name().'</a>
			</div>
			<div class="product-price-wishlist-container">
				<p class="product-price">'. $products[$i]->get_price_html(). '</p>
				'.do_shortcode("[yith_wcwl_add_to_wishlist product_id=".$products[$i]->id.']').'
			</div>
			<div class="product-add-cart-button-container">
				'. do_shortcode("[add_to_cart show_price=false id=".$products[$i]->id."]").'
			</div>
		</div>';

		$i=$i+1;
		}
		$i=intdiv(count($products),2);
		while($i < count($products)){
		$list2.='
		<div class="card-product-container second-card">
			<div class="product-image-container">
				<a href="'.$products[$i]->get_permalink().'">
					'.$products[$i]->get_image().'
				</a>
			</div>
			<div class="product-title-container">
				<a class="product-title" href="'.$products[$i]->get_permalink().'">'.$products[$i]->get_name().'</a>
			</div>
			<div class="product-price-wishlist-container">
				<p class="product-price">'. $products[$i]->get_price_html(). '</p>
				'.do_shortcode("[yith_wcwl_add_to_wishlist product_id=".$products[$i]->id.']').'
			</div>
			<div class="product-add-cart-button-container">
				'. do_shortcode("[add_to_cart show_price=false id=".$products[$i]->id."]").'
			</div>
		</div>';
		$i=$i+1;
		}
		
		echo '
		<div class="woocommerceq">
			<ul class="productsq">'.$list1.
			'</ul>
		</div>';
		echo '
		<div class="woocommerceq">
			<ul class="productsq">'.$list2.
			'</ul>
		</div>';
		}else {
		foreach ($products as $product) {
		$list1.='
		<div>
			<div class="card-product-container">
                <div class="product-image-container">
					<a href="'.$product->get_permalink().'">
						'.$product->get_image().'
					</a>
				</div>
				<div class="product-title-container">
					<a class="product-title" href="'.$product->get_permalink().'">'.$product->get_name().'</a>
				</div>
				<div class="product-price-wishlist-container">
					<p class="product-price">'. $product->get_price_html(). '</p>
					'.do_shortcode("[yith_wcwl_add_to_wishlist product_id=".$product->id.']').'
				</div>
				<div class="product-add-cart-button-container">
					'. do_shortcode("[add_to_cart show_price=false id=".$product->id."]").'
				</div>
			</div>
		</div>';
		}
		echo '
		<div class="woocommerceq">
			<ul class="productsq">'.$list1.
			'</ul>
		</div>';
	
	}
		wp_die();	
	} else {?>
		<div class="not-results-container">
			<p>
				<?php _e('No search results', 'knightsmodels'); ?>
			</p>
		</div><?php
		wp_die();	
	} 
}

/* filter search product modal */
add_action('wp_ajax_nopriv_searchproduct', 'searchproduct');
add_action('wp_ajax_searchproduct', 'searchproduct');

function searchproduct(){
	$name = $_POST['dataSend']['name'];
	$argsProduct = array(
		'limit' => 10,
		'post_status' => 'publish',
    	's' => $name,
		'orderby' => 'rand'
	);
	$i=0;
	$products = wc_get_products( $argsProduct );  

	if(count($products)> 0){
	while ($i < count($products)) {
		$list.='
			<div class="card-product-container">
                <div class="product-image-container">
					<a href="'.$products[$i]->get_permalink().'">
						'.$products[$i]->get_image().'
					</a>
				</div>
				<div class="product-title-container">
					<a class="product-title" href="'.$products[$i]->get_permalink().'">'.$products[$i]->get_name().'</a>
				</div>
				<div class="product-price-wishlist-container">
					<p class="product-price">'. $products[$i]->get_price_html(). '</p>
					'.do_shortcode("[yith_wcwl_add_to_wishlist product_id=".$products[$i]->id.']').'
				</div>
				<div class="product-add-cart-button-container">
					'. do_shortcode("[add_to_cart show_price=false id=".$products[$i]->id."]").'
				</div>
			</div>
			';
			$i++;
		}
		echo '
		<div class="woocommerce-search-result">
            <ul class="products-search-result">'.$list.
			'</ul>
		</div>';
		wp_die();	
	} else {
		?>
		<div class="not-results-container">
			<p>
				<?php _e('No search results', 'knightsmodels'); ?>
			</p>
		</div><?php
		wp_die();	
	}  
}

/* add_filter( 'woocommerce_product_data_store_cpt_get_products_query', 'handle_custom_query_var', 10, 2 );
function handle_custom_query_var( $query, $query_vars ) {
    if ( isset( $query_vars['like_name'] ) && ! empty( $query_vars['like_name'] ) ) {
        $query['s'] = esc_attr( $query_vars['like_name'] );
    }
    return $query;
} */

add_filter( 'wpcf7_form_elements', 'do_shortcode' );

add_filter('woocommerce_show_page_title', 'false');


function change_tabs_order() {
	global $product; 
	$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );
	if ( ! empty( $product_tabs ) ) : ?>
	<div class="single-product-tabs-mobile woocommerce-tabs wc-tabs-wrapper">
		<?php	foreach ( $product_tabs as $key => $product_tab ) { ?>
		<button class="descarga-button" onclick="openAccordFile(event)" idfiles="file-<?php echo $key?>">
			<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
			<img onclick="openAccordFileIcon(event)" src="<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/icono-flecha-opciones-1.png">
		</button>
		<div class="single-product-panel" id="file-<?php echo $key?>">
			<div class="woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
				<?php
				if( $product_tab['title']=="Descargas"){?>
					<div class="descarga-by-single-product">
						<?php if(get_field('descargas',$product->get_id())){
							foreach (get_field('descargas',$product->get_id()) as $item_descarga) { ?>
								<div class="item-descarga-single-product">
									<a class="title-item-descarga-single-product-wrapper" href="<?php echo $item_descarga['documento_descarga']['url'];?>" download>
										<img src="<?php echo $item_descarga['tipo_documento_descarga'];?>">
										<span class="title-item-descarga-single-product" ><?php echo $item_descarga['documento_descarga']['title'];?></span>
									</a>
									<img class="language-item-descarga-single-product" src="<?php echo $item_descarga['idioma_documento_descarga'];?>">
								</div>
							<?php }	
						}?>
					</div>
				<?php }
				elseif ( isset( $product_tab['callback'] ) ) {
					call_user_func( $product_tab['callback'], $key, $product_tab );
				}
				?>
			</div>
		</div>
		<?php } ?>

		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
	</div>
	<?php endif; ?>
	<?php 
}
add_action('woocommerce_before_add_to_cart_quantity', 'change_tabs_order');



remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

function woocommerce_template_loop_product_title() {
    echo '<a href="' . get_permalink() . '" class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</a>'; 
}

function free_shipping_promotion(){
	global $product; 
	?>
	<div class="free-shipping-promotion-container">
		<button onclick="history.back()" class="back-button-shipping-promotion">
			<img src="<?php echo wp_get_upload_dir()["baseurl"]?>/2022/11/icono-flecha.svg">
		</button>
		<?php
		$total_in_cart=WC()->cart->cart_contents_total;
		$free_shipping_settings = get_option('woocommerce_free_shipping_1_settings');
        $amount_for_free_shipping = $free_shipping_settings['min_amount'];
		if($total_in_cart - $amount_for_free_shipping > 0) {
		?>
			<p class="free-shipping-promotion"><strong><?php _e('Free shippings', 'knightsmodels'); ?></strong></p>
		<?php } else {?>
			<p class="free-shipping-promotion"><?php _e('If you add', 'knightsmodels'); ?> <span><?php echo $amount_for_free_shipping - $total_in_cart." "; echo get_woocommerce_currency();?></span> <?php _e('to cart you will get', 'knightsmodels'); ?> <strong> <?php _e('Free shipping', 'knightsmodels'); ?></strong></p>
		<?php } ?>
	</div>
	<div class="gallery-single-mobile" >
		<div class="gallery-single-mobile-slide">
			<?php echo $product->get_image('original');?>
		</div>
		<?php
		$attachment_ids = $product->get_gallery_image_ids();
		foreach ($attachment_ids as $attachment_id) { ?>
			<div class="gallery-single-mobile-slide">
				<?php echo wp_get_attachment_image($attachment_id, 'full'); ?>
			</div>
		<?php }
		?>
	</div>	
	<?php
}
add_action('woocommerce_before_single_product', 'free_shipping_promotion');

add_action('woocommerce_cart_actions', 'woocommerce_empty_cart_button');
function woocommerce_empty_cart_button( $cart ) {global $woocommerce;$cart_url = $woocommerce->cart->get_cart_url();?>
<?php
if(empty($_GET)) {?>
<a class="button emptycart" href="<?php echo $cart_url;?>?empty-cart"><?php _e('Empty cart','knightsmodels'); ?></a>
<?php } else {?>
<a class="button emptycart" href="<?php echo $cart_url;?>&clear-cart=empty-cart"><?php _e('Empty cart','knightsmodels'); ?></a>
<?php } ?>
<?php }
// check for empty-cart get param to clear the cart
add_action( 'init', 'woocommerce_clear_cart_url' );
function woocommerce_clear_cart_url() {
global $woocommerce;

if ( isset( $_GET['empty-cart'] ) ) {
$woocommerce->cart->empty_cart();
}
}