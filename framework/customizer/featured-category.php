<?php
/**
 *	Featured Category Featured Area
 */
 
function itng_featured_category_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'itng-featured-cat', array(
			'title'		=>	__('Featured Category Area', 'it-news-grid'),
			'priority'	=>	10,
			'panel'		=>	'itng-featured-areas'
		)
	);
	
	$wp_customize->add_setting(
		'itng-featured-cat', array(
			'default'		=>	0,
			'sanitize_callback'	=>	'absint'
		)
	);
	
	$wp_customize->add_control(
		new itng_WP_Customize_Category_Control(
			$wp_customize, 'itng-featured-cat', array(
				'label'		=>	__('Category', 'it-news-grid'),
				'description'	=>	__('Category whose posts need to be featured', 'it-news-grid'),
				'priority'		=>	10,
				'section'		=>	'itng-featured-cat'
			)
		)
	);
	
	$wp_customize->add_setting(
		'itng-featured-cat-front-enable', array(
			'default'		=>	'',
			'sanitize_callback'	=>	'itng_sanitize_checkbox'
		)
	);
	
	$wp_customize->add_control(
		'itng-featured-cat-front-enable', array(
			'label'		=>	__('Enable on Front Page', 'it-news-grid'),
			'description'	=>	__('If Front Page is set as blog page, then this setting will override', 'it-news-grid'),
			'type'		=>	'checkbox',
			'priority'	=>	20,
			'section'	=>	'itng-featured-cat',
		)
	);
	
	$wp_customize->add_setting(
		'itng-featured-cat-blog-enable', array(
			'default'		=>	'',
			'sanitize_callback'	=>	'itng_sanitize_checkbox'
		)
	);
	
	$wp_customize->add_control(
		'itng-featured-cat-blog-enable', array(
			'label'		=>	__('Enable on Blog Page', 'it-news-grid'),
			'type'		=>	'checkbox',
			'priority'	=>	30,
			'section'	=>	'itng-featured-cat',
		)
	);
}
add_action('customize_register', 'itng_featured_category_customize_register');