<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nm
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<section class="layer postHero low" style="">
			<?php the_post_thumbnail(); ?>
		</section>
	<?php endif; ?>
	<div class="whiteDivide high xxyyxx">
		<div class="container exe">
			<header class="entry-header subH">
				<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		
				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php nm_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->
		
			<div class="entry-content">
				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue', 'nm' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );
				?>
		
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nm' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
		
			<footer class="entry-footer">
				<?php the_tags( '<p>', ' ', '</p>'); ?>
				
			</footer><!-- .entry-footer -->
		</div><!-- container -->
	</div><!-- white divide -->
</article><!-- #post-## -->
