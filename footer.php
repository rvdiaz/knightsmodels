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
	<footer class="footer-page">
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
	</footer><!-- #colophon -->
</div><!-- #page -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<?php wp_footer(); ?>

</body>
</html>
