<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nm
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Search', 'nm' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'nm' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<h2><?php esc_html_e( '&mdash;Your search did not have any results. Simply start typing to search again or view the projects below.', 'nm' ); ?></h2>

		<?php else : ?>

			<p><?php esc_html_e( '&mdash;It seems we can&rsquo;t find what you&rsquo;re looking for. Try searching again or view the projects below.', 'nm' ); ?></p>

		<?php endif; ?>
		
		<?php get_template_part( 'template-parts/content', 'projects' ); ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
