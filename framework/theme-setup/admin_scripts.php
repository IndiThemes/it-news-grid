<?php
/**
 *	Scripts and Styles for Admin area and Customizer
 */
 
function itng_customize_control_scripts() {
	
	wp_enqueue_script("itng-customize-control-js", esc_url(get_template_directory_uri() . "/assets/js/customize_controls.js"), array(), ITNG_VERSION, true );
	
}
add_action("customize_controls_enqueue_scripts", "itng_customize_control_scripts");


function itng_custom_admin_styles() {
	
	global $pagenow;
	
	$allowed = array('post.php', 'post-new.php', 'customize.php');
	
	if (!in_array($pagenow, $allowed)) {
		return;
	}

    wp_enqueue_style( 'itng-admin-css', esc_url( get_template_directory_uri() . '/assets/theme-styles/css/admin.css' ), array(), ITNG_VERSION );
    
}
add_action( 'admin_enqueue_scripts', 'itng_custom_admin_styles' );
