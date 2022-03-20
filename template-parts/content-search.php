<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nm
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row one-two-column">
		<div class="squareShot">
			<?php
				the_post_thumbnail( 'thumbnail' );
			?>
		</div><!-- squareShot -->
		<div class="resultTxt">
			<header class="entry-header subH">
				<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		
				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php nm_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->
		
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		
			<footer class="entry-footer">
				<?php nm_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div><!-- resultTxt -->
	</div><!-- row -->
</article><!-- #post-## -->
