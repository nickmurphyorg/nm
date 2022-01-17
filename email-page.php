<?php
/**
 * Template Name: Email Page
 *
 * This is the dynamic email page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nm
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div id="emailpage">
				<section class="layer slab high">
					<div class="container">
						<?php get_template_part( 'template-parts/content-contact'); ?>
					</div><!-- container -->
				</section>
			</div><!-- #emailpage -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
