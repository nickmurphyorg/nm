<?php
/**
 * Template Name: Image Split Page
 *
 * This is a dynamic contact page that displays the feature image on the right and content on the left.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nm
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div id="splitPage" class="container">
					<div class="row">
						<h1 class="page-title xl"><?php single_post_title(); ?></h1>
					</div>
					<div class="row two-columns">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="postHero">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php endif; ?>
						<div>
							<?php the_content(); ?>
						</div>
					</div><!-- row -->
				</div><!-- #splitPage -->
			</main><!-- #main -->
		</article>
	</div><!-- #primary -->

<?php get_footer(); ?>
