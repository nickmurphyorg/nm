<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nm
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container">

			<?php
			if ( have_posts() ) : ?>
				<?php if ( is_home() && ! is_front_page() ) : ?>
					<header class="blogIndexHeader row">
						<h1 class="page-title xl"><?php single_post_title(); ?></h1>
					</header>
				<?php endif; ?>

				<?php /* Start the Loop */ 
					$post_index = 0;
					$is_first_page = !is_paged();
				?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php if ( ( $post_index == 0 ) && ($is_first_page) ) : ?>

						<?php get_template_part( 'template-parts/content', 'hero' ); ?>

					<?php else : ?>

						<?php if ( $post_index % 2 == (($is_first_page) ? 1 : 0) ) : ?>
							<!-- row start -->
							<div class="row two-columns">
						<?php endif; ?>

						<!-- Add Standard Post -->
						<div class="chip">
							<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
						</div>

						<?php if ( ($post_index % 2 == (($is_first_page) ? 0 : 1)) || (($post_index + 1) == ($wp_query->post_count)) ) : ?>
							</div>
							<!-- row end -->
						<?php endif; ?>

					<?php endif; ?>

					<?php $post_index++; ?>
				<?php endwhile; ?>

				<div class="row">
					<?php get_template_part( 'template-parts/pagination'); ?>
				</div>
				
			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>
		</div><!-- Container -->

	</main><!-- #main -->

<?php
get_footer();
