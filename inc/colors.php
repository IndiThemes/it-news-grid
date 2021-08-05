<?php
/**
 *	Function to provide custom colors to the theme
 */
 
function itng_custom_colors() {
	
	$primary_color		=	get_theme_mod( 'itng-primary-color', '#d12223' );
	$secondary_color	=	get_theme_mod( 'itng-sec-color', '#f4ac45' );
	
	$output = '';
	
	$output .= 
	'ins,
	.nav-wrapper,
	#menu,
	#site-navigation ul#menu-desktop ul,
	#itng-featured-news .slider-post-wrapper .posted-on a,
	#itng-featured-news #itng-featured-news-list-container .posted-on a,
	#itng-featured-posts .itng-featured-post-date,
	#colophon,
	[class^=itng-search] form,
	#itng-featured-cat .featured-cat-thumb h2
	{background-color: ' . $primary_color . '}';
	
	
	$output .= 
	'article .entry-meta a,
	article .blog-footer a,
	.nav-links a,
	.widget ul li a,
	#itng-featured-news #itng-featured-news-carousel-container .posted-on a,
	.itng-pagination .nav-links > a
	{color: ' . $primary_color . ' !important}';
	
	$output .= 
	'blockquote
	{border-color: ' . $primary_color . '}';
	
	$output .=
	'button.top-menu-mobile
	{background-color: ' . $secondary_color . ' !important}';
	
	$output .=
	'#footer-sidebar .widget-title
	{color: ' . $secondary_color . ' !important}';
	
	wp_add_inline_style( 'itng-main-style', $output );
	
}
add_action( 'wp_enqueue_scripts', 'itng_custom_colors' );