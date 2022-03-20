<?php
/**
 * Template Name: Split Page
 *
 * This is a dynamic contact page that displays content on the left.
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
					<div class="row one-half-column">
						<div>
							<?php the_content(); ?>
						</div>
					</div>
				</div><!-- #splitPage -->
			</main><!-- #main -->
		</article>
	</div><!-- #primary -->

<?php get_footer(); ?>
