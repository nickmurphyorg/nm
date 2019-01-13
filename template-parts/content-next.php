<?php
/**
 * Piece for displaying the next project page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nm
 */

?>

<?php if ( is_active_sidebar( 'hero' ) ) : ?>
	<section id="nextProject">
		<?php dynamic_sidebar( 'hero' ); ?>
		<div class="container">
			<h3>Next Project</h3>
			<h1></h1>
			<h2></h2>
		</div>
		<?php the_title( '<div class="tt">', '</div>' ); ?>
	</section>
<?php endif; ?>
