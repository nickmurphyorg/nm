<?php
/**
 * Template Name: Work Page
 *
 * This is the dynamic projects page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nm
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div id="workpage" class="container">
				<div class="row">
					<h1 class="xl">Work</h1>
				</div>
				<?php get_template_part( 'template-parts/content', 'projects' ); ?>
			</div><!-- #workpage -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
