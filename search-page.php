<?php
/**
 * Template Name: Search Page
 *
 * This is the dynamic search page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nm
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div id="searchpage">
				<section class="layer slab high">
					<div class="container">
						<?php get_search_form(); ?>
					</div><!-- container -->
				</section>
			</div><!-- #searchpage -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
