<?php
/**
 *	Featured Posts
 */
function itng_featured_posts_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'itng-featured-posts', array(
			'title'		=>	__('Featured Category Area - Grid', 'it-news-grid'),
			'priority'	=>	9,
			'panel'		=>	'itng-featured-areas'
		)
	);
	
	$wp_customize->add_setting(
		'itng-featured-posts', array(
			'default'		=>	0,
			'sanitize_callback'	=>	'absint'
		)
	);
	
	$wp_customize->add_control(
		new itng_WP_Customize_Category_Control(
			$wp_customize, 'itng-featured-posts', array(
				'label'		=>	__('Category', 'it-news-grid'),
				'description'	=>	__('Category whose posts need to be featured', 'it-news-grid'),
				'priority'		=>	10,
				'section'		=>	'itng-featured-posts'
			)
		)
	);
	
	$wp_customize->add_setting(
		'itng-featured-posts-front-enable', array(
			'default'		=>	'',
			'sanitize_callback'	=>	'itng_sanitize_checkbox'
		)
	);
	
	$wp_customize->add_control(
		'itng-featured-posts-front-enable', array(
			'label'		=>	__('Enable on Front Page', 'it-news-grid'),
			'description'	=>	__('If Front Page is set as blog page, then this setting will override', 'it-news-grid'),
			'type'		=>	'checkbox',
			'priority'	=>	20,
			'section'	=>	'itng-featured-posts',
		)
	);
	
	$wp_customize->add_setting(
		'itng-featured-posts-blog-enable', array(
			'default'		=>	'',
			'sanitize_callback'	=>	'itng_sanitize_checkbox'
		)
	);
	
	$wp_customize->add_control(
		'itng-featured-posts-blog-enable', array(
			'label'		=>	__('Enable on Blog Page', 'it-news-grid'),
			'type'		=>	'checkbox',
			'priority'	=>	30,
			'section'	=>	'itng-featured-posts',
		)
	);
}
add_action('customize_register', 'itng_featured_posts_customize_register');