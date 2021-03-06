<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nm
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<section class="layer window">
		</section>
	<?php endif; ?>
	
	<section class="layer slab high">
		<div class="container">
			<header class="entry-header subHeader">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
				<div class="entry-meta">
					<?php nm_posted_on(); ?>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->
		
			<div class="entry-content">
				<?php the_content(); ?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nm' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
		
			<footer class="entry-footer">
				<?php nm_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div><!-- container -->
	</section>
	
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="hero low">
			<?php
				$urlLarge = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );
				$urlMedium = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'large' );
				$urlSmall = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'medium' );
				?>
				<picture>
					<source media="(min-width: 1024px)" srcset="<?=$urlLarge?>">
					<source media="(min-width: 751px)" srcset="<?=$urlMedium?>">
					<img src="<?=$urlSmall?>">
				</picture>
		</div><!-- hero -->
	<?php endif; ?>
</article><!-- #post-## -->
