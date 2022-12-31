<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nm
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

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
<?php
	$nm_description = get_bloginfo( 'description', 'display' );
	if ( $nm_description || is_customize_preview() ) :
	?>
		<meta name="Description" content="<?php echo $nm_description;?>">
<?php endif; ?>

<!-- Social Network -->
<meta name="twitter:url" content="https://nickmurphy.org">
<meta name="twitter:creator" content="@nick___murphy">
<meta name="twitter:site" content="https://twitter.com/nick___murphy">

<?php include('analytics.php') ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content">
		<?php esc_html_e( 'Skip to content', 'nm' ); ?>
	</a>

	<header id="masthead" class="site-header">
		<nav id="site-navigation" class="main-navigation">
			<div class="container">
				<?php
				the_custom_logo(); ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>

				<button class="menu-toggle menuButton navigation" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'nm' ); ?></button>
				
				<!-- SEO Meta
				ul itemscope itemtype="https://schema.org/SiteNavigationElement" role="menu"
				li itemprop="name" role="menuitem"
				a itemprop="url" -->
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</div><!-- container -->
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
