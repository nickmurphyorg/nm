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
			<header class="entry-header subH">
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
			<?php function hero_images() {
				$paintFull = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
				$urlLarge = $paintFull['0'];
				$paintLarge = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
				$urlMedium = $paintLarge['0'];
				$paintMedium = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
				$urlSmall = $paintMedium['0'];
				?>
				<script type="text/javascript">
					heroLarge = "<?=$urlLarge?>";
					heroMedium = "<?=$urlMedium?>";
					heroSmall = "<?=$urlSmall?>";
				</script>
			<?php }
			add_action( 'wp_footer', 'hero_images' ); ?>
			</div><!-- hero -->
	<?php endif; ?>
</article><!-- #post-## -->
