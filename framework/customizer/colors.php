<?php
/**
 *	CustomColors Control for Theme
 */

function itng_colors_customize_register( $wp_customize ) {
	
	$wp_customize->add_setting(
		'itng-primary-color', array(
			'default'	=>	'#d12223',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'itng-primary-color', array(
				'label'		=>	esc_html__('Primary Color', 'it-news-grid'),
				'section'	=>	'colors',
				'settings'	=>	'itng-primary-color',
				'priority'	=>	30
			)	
		)
	);
	
	$wp_customize->add_setting(
		'itng-sec-color', array(
			'default'	=>	'#F4AC45',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'itng-sec-color', array(
				'label'		=>	esc_html__('Secondary Color', 'it-news-grid'),
				'section'	=>	'colors',
				'settings'	=>	'itng-sec-color',
				'priority'	=>	40
			)	
		)
	);
	
	$wp_customize->add_setting(
		'itng-masthead-bg', array(
			'default'	=>	'#F4AC45',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'itng-masthead-bg', array(
				'label'		=>	esc_html__('Masthead Background', 'it-news-grid'),
				'section'	=>	'colors',
				'settings'	=>	'itng-masthead-bg',
				'priority'	=>	50
			)	
		)
	);
	
}
add_action( 'customize_register', 'itng_colors_customize_register' );