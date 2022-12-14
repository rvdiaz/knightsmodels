<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package knightsmodels
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<!-- .entry-header -->
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<?php knightsmodels_post_thumbnail(); 
	
	if(is_product_category()){
		$woocommerce_category_id = get_queried_object_id();
		$cat=get_term_by( 'id', $woocommerce_category_id, 'product_cat' );
		$parent_id=$cat->parent;
		$parent = get_term_by( 'id', $parent_id, 'product_cat' );
		if((($parent->slug!='inicio' && $cat->slug!='inicio') && ($parent->slug!='inicio-en' && $cat->slug!='inicio-en')) || isset($_GET['cat'])){
			do_shortcode('[woocommerce-product-second-category]');
		}
		elseif($cat->slug=='inicio' || $cat->slug=='inicio-en' )	
			$my_home_url = apply_filters( 'wpml_home_url', get_option( 'home' ) );
			wp_redirect($my_home_url);
		}
	?>

	<div class="entry-content">
		<?php
		if(is_product_category() && ($parent->slug=='inicio' || $parent->slug=='inicio-en') && !isset($_GET['cat'])){
			do_shortcode('[categories-first-level]');
		} elseif(get_field('plantilla')=='contenido'){
			do_shortcode('[content]');
		}
		else {
			the_content();
		}
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'knightsmodels' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'knightsmodels' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->


<!------------- Home --------------------------->	

<?php include('templates/home/index.php'); ?>

<!------------- Descargas --------------------------->	

<?php include('templates/descargas/index.php'); ?>

<!------------- Contact Form --------------------------->	

<?php include('templates/contact-form/index.php'); ?>

<!------------- Blog Page --------------------------->	

<?php include('templates/blog-page/index.php'); ?>



