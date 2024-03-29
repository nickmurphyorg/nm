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
		<div class="descrip">
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		
				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php nm_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->
		
			<div class="entry-summary">
				<?php the_content('Continue'); ?>
			</div><!-- .entry-summary -->
		</div><!-- descrip -->
	</div><!-- row -->
</article><!-- #post-## -->
