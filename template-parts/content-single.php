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
	<div class="row">
		<header class="entry-header subHeader">
			<?php the_title( '<h1 class="entry-title xl">', '</h1>' ); ?>
	
			<div class="entry-meta">
				<h5><?php nm_posted_on(); ?></h5>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->
	</div>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="row window">
			<div class="hero">
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
		</div>
	<?php endif; ?>

	<div class="container narrow">
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
	</div><!-- container narrow -->
</article><!-- #post-## -->
