<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nm
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- Favicon and Webapp -->
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/32.png" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="Nick Murphy">
<meta name="format-detection" content="telephone=no">
<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/300.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/72.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/114.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/120.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/144.png" />
<link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 1)" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/320x460.png">
<link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/640x1096.png">
<link rel="apple-touch-startup-image" media="(device-width: 768px) and (orientation: portrait)" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/768x1004.png">
<link rel="apple-touch-startup-image" media="(device-width: 768px) and (orientation: landscape)" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/1024x768.png">
<link rel="apple-touch-startup-image" media="(device-width: 768px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/1536x2008.png">
<link rel="apple-touch-startup-image" media="(device-width: 768px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/2048x1496.png">

<!-- SEO -->
<meta name="Description" content="Developer / designer specializing in mobile and web.">

<!-- Social Network -->
<meta name="twitter:url" content="https://nickmurphy.org">
<meta name="twitter:creator" content="@nickmurphyorg">
<meta name="twitter:site" content="https://twitter.com/nickmurphyorg">

<!-- Google Analytics -->
<?php include('analyticstracking.php') ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content">
		<?php esc_html_e( 'Skip to content', 'nm' ); ?>
	</a>

	<header id="masthead" class="site-header" role="banner">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="container">
				<a class="homeIcon" href="/" title="Home">
					<img id="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/nm.svg" onerror="this.onerror=null; this.src='<?php echo get_stylesheet_directory_uri(); ?>/images/nm.png'">
				</a>
				<ul itemscope itemtype="https://schema.org/SiteNavigationElement" class="tabbed-navigation" role="menu">
					<li class="workTab" itemprop="name" role="menuitem">
						<a class="text" href="<?php echo get_site_url(); ?>/#work" title="Work" itemprop="url">Work</a>
						<div class="navigationSlide workSlide">
							<div class="navigationOverflowContainer">
								<div class="container">
									<?php get_template_part( 'template-parts/content', 'projects' ); ?>
								</div>
							</div>
						</div>
					</li>
					<li class="blogTab" itemprop="name" role="menuitem">
						<a class="text" href="<?php echo get_site_url(); ?>/blog/blog/" title="Blog" itemprop="url">Blog</a>
						<div class="navigationSlide blogSlide">
							<div class="navigationOverflowContainer">
								<div class="container">
									<?php 
									$latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) ); ?>
								
									<?php if ( $latest_blog_posts->have_posts() ) : while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post(); ?>
												
										<?php get_template_part( 'template-parts/content', 'sample' ); ?>
								
									<?php endwhile; ?>
											
									<?php else : ?>
								
										<?php get_template_part( 'template-parts/content', 'none' ); ?>
								
									<?php endif; ?>
										<a class="spacebar" href="/blog/blog/">Read More</a>
								</div>
							</div>
						</div>
					</li>
					<li class="emailTab" itemprop="name" role="menuitem">
						<a class="text" href="/email/" title="Email" itemprop="url">Email</a>
						<div class="navigationSlide emailSlide">
							<div class="navigationOverflowContainer">
								<div class="container">
									<?php echo do_shortcode( '[contact-form-7 id="71" title="Contact Me" html_id="contactForm"]' ); ?>
								</div>
							</div>
						</div>
					</li>
					<li class="searchTab" itemprop="name" role="menuitem">
						<a class="text" href="/search/" title="Search" itemprop="url">
							<img class="staticMagnifierIcon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/magnifier.svg" onerror="this.onerror=null; this.src='<?php echo get_stylesheet_directory_uri(); ?>/images/magnifier.png'">
							<img class="selectedMagnifierIcon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/magnifier-selected.svg" onerror="this.onerror=null; this.src='<?php echo get_stylesheet_directory_uri(); ?>/images/magnifier-selected.png'">
						</a>
						<div class="navigationSlide searchSlide">
							<div class="navigationOverflowContainer">
								<div class="container">
									<?php get_search_form(); ?>
								</div>
							</div>
						</div>
					</li>
				</ul><!-- navigation -->
			</div><!-- container -->
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
