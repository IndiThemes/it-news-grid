<?php
/**
 * Controls for the Header Section
 */
 
function itng_header_customize_register( $wp_customize ) {
	 
	$wp_customize->get_section("title_tagline")->panel	=	"itng_header";
	$wp_customize->get_section("header_image")->panel	=	"itng_header";
	//$wp_customize->get_section("widgets-sidebar-header")->panel = "itng_header";
	 
	$wp_customize->add_panel(
		"itng_header", array(
			"title"	=>	esc_html__("Header", 'it-news-grid'),
			"priority"	=>	10
		)
	);
	
	$wp_customize->add_section(
		"itng_header_options", array(
			"title"		=>	esc_html__("Header Options", 'it-news-grid'),
			"panel"		=>	"itng_header",
			"priority"	=>	80
		)
	);
	
	$wp_customize->add_setting(
		"itng_header_style", array(
			"default"			=>	'style_1',
			"sanitize_callback"	=>	"itng_sanitize_radio"
		)
	);
	
	$wp_customize->add_control(
		"itng_header_style", array(
			"label"		=>	esc_html__("Header Styles", 'it-news-grid'),
			"type"		=>	"radio",
			"section"	=>	"itng_header_options",
			"priority"	=>	5,
			"choices"	=>	array(
				'style_1'	=>	esc_html__("Style 1", 'it-news-grid'),
				'style_2'	=>	esc_html__("Style 2", 'it-news-grid'),
			)
		)
	);
	
	$wp_customize->add_setting(
		'itng_header_overlay_opacity', array(
			'default'	=>	30,
			'sanitize_callback'	=>	'absint',
		)
	);
	
	$wp_customize->add_control(
		new itng_Range_Value_Control(
			$wp_customize,
			'itng_header_overlay_opacity', array(
				'label'		=>	__('Overlay Opacity', 'it-news-grid'),
				'type'		=>	'itng-range-value',
				'section'	=>	'itng_header_options',
				'settings'	=>	'itng_header_overlay_opacity',
				'priority'	=>	35,
				'input_attrs'	=>	array(
							'min'	=>	1,
							'max'	=>	100,
							'step'	=>	1,
							'suffix'=>	'%'
				)
			)
		)
	);
	
	$wp_customize->add_setting(
		'itng_sticky_menu_enable', array(
			'default'	=>	'',
			'sanitize_callback'	=> 'itng_sanitize_checkbox'
		)
	);
	
	$wp_customize->add_control(
		'itng_sticky_menu_enable', array(
			'label'		=>	__('Enable Sticky Navigation', 'it-news-grid'),
			'type'		=>	'checkbox',
			'section'	=>	'itng_header_options',
			'priority'	=>	40
		)
	);
	
	$wp_customize->add_setting(
		'itng_header_ad_widget', array(
			'default'	=>	'',
			'sanitize_callback'	=>	'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(
		new itng_Custom_Button_Control (
			$wp_customize, 'itng_header_ad_widget', array(
				'label'		=>	__('Edit Ad Wudget', 'it-news-grid'),
				'type'		=>	'itng-link',
				'section'	=>	'itng_header_options',
				'settings'	=>	'itng_header_ad_widget',
				'priority'	=>	50,
			)
		)
	);
	
	$header_control = $wp_customize->get_control( 'itng_header_ad_widget' );
	
    $header_control->active_callback = function( $control ) {
        $setting = $control->manager->get_setting( 'itng_header_style' );
        if (  $setting->value() == 'style_2' ) {
            return true;
        } else {
            return false;
        }
    };
    
    $wp_customize->add_setting(
		'itng_top_menu_enable', array(
			'default'	=>	1,
			'sanitize_callback'	=>	'itng_sanitize_checkbox'
		)
	);
	
	$wp_customize->add_control(
		'itng_top_menu_enable', array(
			'label'	=>	__('Enable Top Menu', 'it-news-grid'),
			'type'	=>	'checkbox',
			'section'	=>	'itng_social_section',
			'priority'	=>	1
		)
	);
}
 
add_action("customize_register", "itng_header_customize_register");