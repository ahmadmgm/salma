<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage AI Lab
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open();
      global $jws_option;
      $header_absolute = (isset($jws_option['header_absolute']) && $jws_option['header_absolute']) ? ' header_absolute_yes' : ''; ?>  

<div id="page" class="site">
	<header id="masthead" class="site-header<?php echo esc_attr($header_absolute); ?>">
		<div class="site-branding-container">
			<?php jws_header(); ?>
		</div><!-- .site-branding-container -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
