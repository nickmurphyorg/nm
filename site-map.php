<?php
/**
 * Template Name: Site Map
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nm
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<section class="layer window">
						</section>
					<?php endif; ?>
					<section class="layer slab high">
						<div class="container">
							<header class="entry-header subH">
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							</header><!-- .entry-header -->
					
							<div class="entry-content">
								<?php if ( is_active_sidebar( 'site-map' ) ) : ?>
										<?php dynamic_sidebar( 'site-map' ); ?>
								<?php endif; ?>
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

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
