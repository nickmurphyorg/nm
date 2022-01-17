<?php
/**
 * Template Name: Resume Page
 *
 * Static page to show my resume.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nm
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div id="resumepage">
				<section class="layer slab">
					<div class="container">
            <?php if ( is_active_sidebar( 'resume' ) ) : ?>
              <div class="resumeView">
                <?php dynamic_sidebar( 'resume' ); ?>
              </div>
            <?php endif; ?>
					</div><!-- container -->
				</section>
			</div><!-- #resumepage -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>