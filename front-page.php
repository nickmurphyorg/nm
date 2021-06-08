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
		<main id="main" class="site-main" role="main">
			<div id="slate" class="high">
				<section id="work">
					<div class="nudge"></div>
					<div class="container">
						<?php get_template_part( 'template-parts/content', 'projects' ); ?>
					</div><!-- container -->
				</section><!-- work -->
				
				<section id="about" class="slideWindow">
					<div id="aboutText">
						<div class="container">
							<div class="row">
								<div id="meText" class="six columns">
									<?php
										$frontpage_id = get_option( 'page_on_front' );
										
										$page_title = get_post_field( 'post_title', $frontpage_id );
										$page_text = get_post_field( 'post_content', $frontpage_id );
									?>
									<h6><?=$page_title?></h6>
									<div class="textWidget"><?=$page_text?></div>
								</div>
							</div>
						</div><!-- container -->
					</div><!-- about text -->
					<div class="parallax sheetXL">
						<?php 
							$frontpage_id = get_option( 'page_on_front' );
							
							if (has_post_thumbnail($frontpage_id)) {
								$urlLarge = wp_get_attachment_url( get_post_thumbnail_id($frontpage_id), 'full' );
								$urlMedium = wp_get_attachment_url( get_post_thumbnail_id($frontpage_id), 'large' );
								$urlSmall = wp_get_attachment_url( get_post_thumbnail_id($frontpage_id), 'medium' );
								?>
								<picture>
									<source media="(min-width: 1024px)" srcset="<?=$urlLarge?>">
									<source media="(min-width: 751px)" srcset="<?=$urlMedium?>">
									<img src="<?=$urlSmall?>" alt="Nick">
								</picture>
						<?php } ?>
					</div><!-- bg image -->
				</section><!-- about -->
				
				<section id="blog">
					<div class="container">
						<div class="row">
							<h6><a href="/blog/blog/">Blog</a></h6>
						</div>
						<div class="row">
							<?php 
							// the query
							$latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) ); ?>
					
							<?php if ( $latest_blog_posts->have_posts() ) : while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post(); ?>
									
								<?php get_template_part( 'template-parts/content', 'home' ); ?>
					
							<?php endwhile; ?>
								
								
							<?php else : ?>
					
								<?php get_template_part( 'template-parts/content', 'none' ); ?>
					
							<?php endif; ?>
						</div>
					</div><!-- container -->
				</section><!-- blogs -->
			</div><!-- slate -->
			
			<div id="heroText" class="sheet mid">
				<div class="container">
					<div class="row">
						<div class="twelve columns">
							<h3 class="tick"></h3>
							<ol class="titles"></ol>
							<ol class="subtitles"></ol>
						</div>
					</div><!-- row -->
				</div><!-- container -->
			</div><!-- hero text -->
			
			<div id="heroSlides" class="sheet low">
				<?php if ( is_active_sidebar( 'hero' ) ) : ?>
					<?php dynamic_sidebar( 'hero' ); ?>
				<?php endif; ?>
			</div><!-- hero slides -->  
			
		</main><!-- #main -->
	</div><!-- #primary -->
	
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/home.css">
	
<?php get_footer(); ?>