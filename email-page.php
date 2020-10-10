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
 						<?php echo do_shortcode( '[contact-form-7 id="71" title="Contact Me" html_id="contactForm"]' ); ?>
					</div><!-- container -->
				</section>
			</div><!-- #emailpage -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
