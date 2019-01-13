<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package nm
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main whiteout high" role="main">
			<div class="container">
				<?php if ( have_posts() ) : ?>
		
					<header class="page-header result">
						<h1>Search</h1>
						<h2 class="page-title"><?php printf( esc_html__( '&mdash; %s', 'nm' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
					</header><!-- .page-header -->
		
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
		
						<?php
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );
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
			</div><!-- container -->
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
