<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package nm
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() ); ?>

				<!-- Post Navigation Widget -->
				<div class="contentPostNavigation">
							<div class="navigationPostTile">
								<?php $previous_post = get_previous_post();
									
								if (!empty( $previous_post )): ?>
									<div class="postNavigationImage">
										<?php echo get_the_post_thumbnail($previous_post->ID,'medium'); ?>
									</div>
									<div class="postNavigationTitle">
										<a href="<?php echo get_permalink( $previous_post->ID ); ?>">
											<h3><?php echo $previous_post->post_title; ?></h3>
										</a>
									</div>
								<?php endif; ?>
							</div><!-- previous post -->
							
							<div class="navigationPostTile">
								<?php $next_post = get_next_post();
									
								if (!empty( $next_post )): ?>
									<div class="postNavigationImage">
										<?php echo get_the_post_thumbnail($next_post->ID,'medium'); ?>
									</div>
									<div class="postNavigationTitle">
										<a href="<?php echo get_permalink( $next_post->ID ); ?>">
											<h3><?php echo $next_post->post_title; ?></h3>
										</a>
									</div>
								<?php endif; ?>
							</div><!-- next post -->
						</div>
			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</div><!-- Container -->
	</main><!-- #main -->

<?php
get_footer();
