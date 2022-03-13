<?php
/**
 * The static front page.
 *
 * This is the dynamic front page (homepage).
 * E.g., it overrides the blog post index page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nm
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main homepage" role="main">
				<section id="hero">
					<div class="container">
						<div class="row">
							<div class="seven columns">
								<?php
									$frontpage_id = get_option( 'page_on_front' );
									
									$page_title = get_post_field( 'post_title', $frontpage_id );
									$page_text = get_post_field( 'post_content', $frontpage_id );
								?>
								<h1 class="xl seo-title">
									<?=$page_title?>
								</h1>
								<?=$page_text?>
							</div>
						</div>
					</div><!-- container -->
				</section><!-- hero -->

				<section id="work">
					<div class="container">
						<?php get_template_part( 'template-parts/content', 'projects' ); ?>
					</div><!-- container -->
				</section><!-- work -->
				
				<section id="blog">
					<div class="container">
						<div class="row">
							<h1 class="blogTitle xl">
								<a href="/blog/blog/">Blog</a>
							</h1>
						</div>
							<?php
							$latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) ); 
							$post_index = 0;
							?>
					
							<?php if ( $latest_blog_posts->have_posts() ) : ?>
								<?php while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post(); ?>
									
									<?php if ( $post_index == 0 ) : ?>

										<?php get_template_part( 'template-parts/content', 'hero' ); ?>
					
									<?php else : ?>

										<?php if ($post_index == 1) : ?>
											<div class="row">
										<?php endif; ?>

										<!-- Add New Post -->
										<div class="chip six columns">
											<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
										</div>

										<?php if ($post_index == 2) : ?>
											</div>
										<?php endif; ?>
										
									<?php endif; ?>

									<?php $post_index++; ?>
								<?php endwhile; ?>
								
							<?php else : ?>
					
								<?php get_template_part( 'template-parts/content', 'none' ); ?>
					
							<?php endif; ?>
					</div><!-- container -->
				</section><!-- blogs -->
		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>