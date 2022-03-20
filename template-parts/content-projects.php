<?php
/**
 * Template part for displaying projects from the widget bar.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nm
 */

?>


<?php if ( is_active_sidebar( 'projects' ) ) : ?>
	<ul class="tileHolder">
		<?php dynamic_sidebar( 'projects' ); ?>
	</ul>
<?php endif; ?>
