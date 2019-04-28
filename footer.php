<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nm
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<div class="footerFirst two columns">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<div class="footerPosts five columns">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<div class="footerProjects two columns">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
					<div class="footerContact three columns">
						<?php dynamic_sidebar( 'footer-4' ); ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="row">
				<div class="footerLegal twelve columns">
					<h5>Copyright Nick Murphy 2013-<?php echo date("Y"); ?>, all rights reserved. Corporate logos are the copyright of their respective owners. By using this site, you agree to the <a href="/terms-of-service">Terms Of Service</a> and <a href="/privacy-policy">Privacy Policy</a>. The views and opinions expressed on this site do not reflect my employer. <a href="/sitemap">Sitemap</a></h5>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<script type="text/javascript">
    var MTUserId='0ebe100d-0771-43a0-b75c-4d6454b2ed03';
    var MTFontIds = new Array();

    MTFontIds.push("1488880"); // Neue Helvetica® W02 45 Light 
    MTFontIds.push("1488892"); // Neue Helvetica® W02 55 Roman 
    MTFontIds.push("1488904"); // Neue Helvetica® W02 65 Medium 
    (function() {
        var mtTracking = document.createElement('script');
        mtTracking.type='text/javascript';
        mtTracking.async='true';
        mtTracking.src='<?php echo get_stylesheet_directory_uri(); ?>/js/mtiFontTrackingCode.js';

        (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(mtTracking);
    })();
</script>

<?php wp_footer(); ?>

</body>
</html>
