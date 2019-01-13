<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nm
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>
			<div id="pagination">
				<?php
				    global $wp_query;
				
				    $big = 999999999; // need an unlikely integer
				
				    echo paginate_links( array(
				        'base'      => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
				        'format'    => '?paged=%#%',
				        'current'   => max( 1, get_query_var('paged') ),
				        'total'     => $wp_query->max_num_pages,
				        'prev_text' => __('<span class="arrowLeft">&#9668;</span>'),
				        'next_text' => __('<span class="arrowRight">&#9658;</span>')
				    ));
				?>
			</div>
			
		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
