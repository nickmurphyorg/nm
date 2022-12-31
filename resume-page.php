<?php
/**
 * Template Name: Resume Page
 *
 * Static page to a resume.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nm
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div id="resumePage" class="container">
					<div class="resumeView">
						<?php the_content(); ?>
					</div><!-- resumeView -->
				</div><!-- #resumePage -->
			</article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>