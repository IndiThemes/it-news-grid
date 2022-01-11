<?php
/**
 * Enqueue scripts and styles.
 */

function itpg_enqueue_fonts() {
	
	$heading_font 	= 'Josefin Sans';
	$heading_weight = 400;
	$body_font 		= 'Lato';
	$body_weight 	= 400;
	
	if ( !empty( get_theme_mod('itpg_gfonts_heading') ) ) {
		$heading_font = get_theme_mod( 'itpg_gfonts_heading', 'Lato' );
		$heading_font = str_replace( ' ', '+', $heading_font );
	}
	
	if ( !empty( get_theme_mod('itpg_gweights_heading') ) ) {
		$heading_weight = get_theme_mod( 'itpg_gweights_heading', 700 );
	}
	
	if (!empty( get_theme_mod('itpg_gfonts_body' ) ) ) {
		$body_font = get_theme_mod('itpg_gfonts_body', 'Lato');
		$body_font = str_replace( ' ', '+', $body_font );
	}
	
	if (!empty( get_theme_mod('itpg_gweights_body' ) ) ) {
		$body_weight = get_theme_mod('itpg_gweights_body', 400);
	}
	
	$fontCall = '';
	$fontCall .= 'https://fonts.googleapis.com/css?family=';
	$fontCall .= $heading_font;
	$fontCall .= ':' . $heading_weight;
	
	if ( $heading_font != $body_font ) {
		$fontCall .= '|' . $body_font;
	}
	
	if ( $heading_weight != $body_weight ) {
		$fontCall .= ':' . $body_weight;
	}
	
	$fontCall .= '&display=swap';
	
	wp_enqueue_style( 'itpg-fonts', esc_url( $fontCall ), array(), ITNG_VERSION);
	
}
add_action( 'wp_enqueue_scripts', 'itpg_enqueue_fonts' );


function itpg_scripts() {
	wp_enqueue_style( 'itpg-style', get_stylesheet_uri(), array(), ITNG_VERSION);
	wp_style_add_data( 'itpg-style', 'rtl', 'replace' );
	
	wp_enqueue_script('jquery-ui-tabs');

	wp_enqueue_style( 'itpg-main-style', esc_url(get_template_directory_uri() . '/assets/theme-styles/css/default.css'), array(), ITNG_VERSION);
	
	wp_enqueue_style( 'bootstrap', esc_url(get_template_directory_uri() . '/assets/bootstrap/bootstrap.css'), array(), ITNG_VERSION);
	
	wp_enqueue_style( 'owl', esc_url(get_template_directory_uri() . '/assets/owl/owl.carousel.css'), array(), ITNG_VERSION);
	
	wp_enqueue_style( 'mag-popup', esc_url(get_template_directory_uri() . '/assets/magnific-popup/magnific-popup.css'), array(), ITNG_VERSION);
	
	wp_enqueue_style( 'font-awesome', esc_url(get_template_directory_uri() . '/assets/fonts/font-awesome.css'), array(), ITNG_VERSION);
	
	wp_enqueue_script( 'big-slide', esc_url(get_template_directory_uri() . '/assets/js/bigSlide.js'), array('jquery'), ITNG_VERSION);
	
	wp_enqueue_script( 'itpg-custom-js', esc_url(get_template_directory_uri() . '/assets/js/custom.js'), array('jquery'), ITNG_VERSION);
	
	wp_enqueue_script( 'owl-js', esc_url(get_template_directory_uri() . '/assets/js/owl.carousel.js'), array('jquery'), ITNG_VERSION);
	
	wp_enqueue_script( 'mag-lightbox-js', esc_url(get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js'), array('jquery'), ITNG_VERSION);

	wp_enqueue_script( 'itpg-navigation', esc_url(get_template_directory_uri() . '/assets/js/navigation.js'), array(), ITNG_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'itpg_scripts' );


/**
 *	Localize Customizer Data to make Theme Settings available in custom.js
 */
 function itng_localize_settings() {
	 
	 $data = array(
		 'stickyNav'	=>	get_theme_mod('itpg_sticky_menu_enable', '')
	 );
	 
	 wp_localize_script( 'itpg-custom-js', 'itng', $data );
	 
 }
 add_action('wp_enqueue_scripts', 'itng_localize_settings');