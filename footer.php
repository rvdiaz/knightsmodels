<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package knightsmodels
 */

?>
	<?php do_shortcode('[after-categories-component]');?>
	<footer class="footer-page" style="text-align: center;">

		<div class="footer-container">
			<div class="selects-menu-container">
				<div class="list-languages">
					<?php do_action('wpml_add_language_selector'); ?>				
				</div>
			</div>
			<div class="copyright-text">
				<?php if(get_field('copyrights','option')){?>
				<p class="copyrights"><?php echo get_field('copyrights','option');?> </p>
				<?php } ?>
			</div>
		</div>
		<img src="https://knight.informagedevelop.com/wp-content/uploads/2022/11/financiaciones.png" class="img-financiacion"/>
		<div class="loading-container">
        <div class="loading-image">
            <img src="<?php echo wp_get_upload_dir()["baseurl"] ?>/2022/11/Double-Ring-1s-200px-1.gif" alt="">
        </div>
    </div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script>
	if(jQuery('.woocommerce-pagination .page-numbers .prev'))
		jQuery('.woocommerce-pagination .page-numbers .prev').html("<span><</span><?php _e('Prev', 'knightsmodels'); ?>");
	if(jQuery('.woocommerce-pagination .page-numbers .next'))
		jQuery('.woocommerce-pagination .page-numbers .next').html("<?php _e('Next', 'knightsmodels'); ?><span>></span>");
</script>
<?php wp_footer(); ?>

</body>
</html>