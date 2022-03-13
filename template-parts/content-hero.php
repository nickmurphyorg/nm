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
	<div class="row chip heroPost">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="postHero six columns">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php endif; ?>

		<div class="six columns">
			<header class="entry-header subHeader">
				<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		
				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<h5>
							<?php nm_posted_on(); ?>
						</h5>
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
		</div><!-- six columns -->
	</div><!-- row heroPost -->
</article><!-- #post-## -->
