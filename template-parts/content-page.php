<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nm
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if ( has_post_thumbnail() ) : ?>
		<section>
			<div class="layer window projectHero">
				<div class="container">
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->
				</div>
			</div>
		</section>
	<?php endif; ?>
	
	<section class="layer slab high">
		<div class="container">
			
			<?php if ( !has_post_thumbnail() ) : ?>
				<header class="entry-header subHeader">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
			<?php endif; ?>
	
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
				<?php
					edit_post_link(
						sprintf(
							/* translators: %s: Name of current post */
							esc_html__( 'Edit %s', 'nm' ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						),
						'<span class="edit-link">',
						'</span>'
					);
				?>
			</footer><!-- .entry-footer -->
		</div><!-- container -->
	</section><!-- slab -->
	
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
