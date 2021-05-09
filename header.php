<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package oro
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'it-news-grid' ); ?></a>
	
	<?php
	do_action( 'itng_masthead' );
	
	$layout = get_theme_mod('itng_site_layout', 'box') == 'box' ? 'container' : ''; ?>
	<div id="content-wrapper" class="<?php echo $layout ?> row">
		<?php do_action( 'itng_before_content' ); ?>