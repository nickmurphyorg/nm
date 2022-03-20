<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package nm
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="error-404 not-found container">
				<header class="page-header">
					<h1 class="xl">
						<?php esc_html_e( '404', 'nm' ); ?>
					</h1>
				</header><!-- .page-header -->

				<div class="page-content row one-half-column">
					<div>
						<p>This content is archived, under construction, or never existed. Visit the homepage to view the latest.</p>
						<a class="primary" href="<?php echo get_site_url(); ?>">Home</a>
					</div>
				</div><!-- .page-content -->
			</div><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
