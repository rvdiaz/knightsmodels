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
				<div class="shipping-zone-container">
					<div class="shipping-country-list">
						<div class="dropdown-coountry-list">
						<?php
							$delivery_zones = WC_Shipping_Zones::get_zones();
							?>
							<div class="country-list-wrapper">
								<span class="shipping-country-text">Estás comprando en</span>
								<button id="country-list-active" onclick="toggledropdown()">
									<span id="country-active-value"><?php echo $delivery_zones[1]['zone_name'];?></span>
									<span><img src="<?php echo wp_get_upload_dir()["url"] ?>/expand_more.png"></span>
								</button>
							</div>
  							<div class="dropdown-content">
							  <?php
								foreach ( $delivery_zones as $key => $the_zone ) {
								?>
								<span onclick="updateCountry(event)" class="countries" value="<?php echo $the_zone['zone_name'];?>"><?php echo $the_zone['zone_name'];?></span>
								<span onclick="updateCountry(event)" class="countries" value="adsdsd">sdsd</span>
								<?php } ?>
  							</div>
						</div>
					</div>
				</div>
				<div class="list-languages">
										
				</div>
			</div>
			<div class="copyright-text">
				<p class="copyrights"><?php echo get_field('copyrights','option');?> </p>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<?php wp_footer(); ?>

</body>
</html>
