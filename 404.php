<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package nm
 */

get_header();
?>

	<main id="primary" class="site-main content-area">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title xl">
					<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'nm' ); ?>
				</h1>
			</header><!-- .page-header -->

			<div class="page-content row one-half-column">
				<p><?php esc_html_e( 'This content is archived, under construction, or never existed. Visit the homepage to view the latest.', 'nm' ); ?></p>
				<a class="primary" href="<?php echo get_site_url(); ?>">Home</a>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
