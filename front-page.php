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
				<section class="heroData">
					<?php if ( is_active_sidebar( 'hero' ) ) : ?>
						<?php dynamic_sidebar( 'hero' ); ?>
					<?php endif; ?>
				</section><!-- hero -->
				
				<section id="prjkts" class="">
					<div class="nudge"></div>
					<div class="container">
						<?php get_template_part( 'template-parts/content', 'projects' ); ?>
					</div><!-- container -->
				</section><!-- projects -->
				
				<section id="aboutMe" class="slideWin">
					<div id="aboutText" class="sheet">
						<div class="container">
							<div class="row">
								<div id="meText">
									<?php if ( is_active_sidebar( 'about' ) ) : ?>
										<?php dynamic_sidebar( 'about' ); ?>
									<?php endif; ?>
								</div>
							</div>
						</div><!-- container -->
					</div><!-- about text -->
					<div class="parallax sheetXL">
						<?php function hero_images() {
							$paintFull = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
							$urlLarge = $paintFull['0'];
							$paintLarge = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
							$urlMedium = $paintLarge['0'];
							$paintMedium = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
							$urlSmall = $paintMedium['0'];
							?>
							<script type="text/javascript">
								heroLarge = "<?=$urlLarge?>";
								heroMedium = "<?=$urlMedium?>";
								heroSmall = "<?=$urlSmall?>";
							</script>
						<?php }
						add_action( 'wp_footer', 'hero_images' ); ?>
					</div><!-- bg image -->
				</section><!-- about -->
				
				<section id="blogs" class="">
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
				<ol class="parallax carousel sheet"></ol>
			</div><!-- hero slides -->  
			
		</main><!-- #main -->
	</div><!-- #primary -->
	
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/home.css">
	
<?php get_footer(); ?>