<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nm
 */

?>

	<footer id="colophon" class="site-footer">
	<div class="container">
			<div class="row footer-columns">
				<div>
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
				<div class="four columns">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
				<div class="three columns">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div>
				<div class="three columns">
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</div>
			</div>
			<div class="footerLegal">
				<h5>Copyright Nick Murphy 2013-<?php echo date("Y"); ?>, all rights reserved.</h5>
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
