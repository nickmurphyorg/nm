<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package nm
 */

get_header(); ?>

	<div id="primary" class="content-area high">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found container">
				<header class="page-header">
					<h1 class="xl">
						<?php esc_html_e( '404', 'nm' ); ?>
					</h1>
				</header><!-- .page-header -->

				<div class="page-content fouro">
					
					<h3><?php esc_html_e( '&mdash; The page you are looking for is no longer available, try searching or browse my projects below.', 'nm' ); ?></h3>

					<?php get_template_part( 'template-parts/content', 'projects' ); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
