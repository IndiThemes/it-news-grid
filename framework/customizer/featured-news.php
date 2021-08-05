<?php
/**
 *
 *	Featured News Section - contains a Slider and a Tab with 3 categories
 *
 */
function itng_featured_news_customize_register( $wp_customize ) {
	
	$wp_customize->add_section(
		'itng_featured_news', array(
			'title'		=>	__('Featured News', 'it-news-grid'),
			'priority'	=>	5,
			'panel'		=>	'itng-featured-areas'
		)
	);
	
	$wp_customize->add_setting(
		'itng-featured-news-front-enable', array(
			'default'		=>	'',
			'sanitize_callback'	=>	'itng_sanitize_checkbox'
		)
	);
	
	$wp_customize->add_control(
		'itng-featured-news-front-enable', array(
			'label'		=>	__('Enable on Front Page', 'it-news-grid'),
			'description'	=>	__('If Front Page is set as blog page, then this setting will override', 'it-news-grid'),
			'type'		=>	'checkbox',
			'priority'	=>	10,
			'section'	=>	'itng_featured_news',
		)
	);
	
	$wp_customize->add_setting(
		'itng-featured-news-blog-enable', array(
			'default'		=>	'',
			'sanitize_callback'	=>	'itng_sanitize_checkbox'
		)
	);
	
	$wp_customize->add_control(
		'itng-featured-news-blog-enable', array(
			'label'		=>	__('Enable on Blog Page', 'it-news-grid'),
			'type'		=>	'checkbox',
			'priority'	=>	20,
			'section'	=>	'itng_featured_news',
		)
	);
	
	$wp_customize->add_setting(
		'itng-featured-news-slider-title', array(
			'default'		=>	'Featured News',
			'sanitize_callback'	=>	'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(
		'itng-featured-news-slider-title', array(
			'label'		=>	__('Banner Slider Title', 'it-news-grid'),
			'priority'	=>	28,
			'section'	=>	'itng_featured_news',
		)
	);
	
	$wp_customize->add_setting(
		'itng-featured-news-slider', array(
			'default'		=>	0,
			'sanitize_callback'	=>	'absint'
		)
	);
	
	$wp_customize->add_control(
		new itng_WP_Customize_Category_Control(
			$wp_customize, 'itng-featured-news-slider', array(
				'label'			=>	__('Category for Slider', 'it-news-grid'),
				'description'	=>	__('Category to be shown in Slider', 'it-news-grid'),
				'priority'		=>	30,
				'section'		=>	'itng_featured_news'
			)
		)
	);
	
	$wp_customize->add_setting(
		'itng-featured-news-slider-count', array(
			'default'		=>	3,
			'sanitize_callback'	=>	'absint'
		)
	);
	
	$wp_customize->add_control(
		'itng-featured-news-slider-count', array(
			'label'		=>	__('Number of Posts to show in the Slider', 'it-news-grid'),
			'type'		=>	'number',
			'priority'	=>	31,
			'section'	=>	'itng_featured_news',
		)
	);
	
	$wp_customize->add_control(
		new itng_Separator_Control(
			$wp_customize, 'itng_featured_news_separator', array(
				'settings'	=>	array(),
				'priority'	=>	35,
				'section'	=>	'itng_featured_news'
			)
		)
	);
	
	$wp_customize->add_setting(
		'itng-featured-news-list-title', array(
			'default'		=>	'Most Popular',
			'sanitize_callback'	=>	'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(
		'itng-featured-news-list-title', array(
			'label'		=>	__('Banner Thumbs Title', 'it-news-grid'),
			'priority'	=>	38,
			'section'	=>	'itng_featured_news',
		)
	);
	
	$wp_customize->add_setting(
		'itng-featured-news-list', array(
			'default'		=>	0,
			'sanitize_callback'	=>	'absint'
		)
	);
	
	$wp_customize->add_control(
		new itng_WP_Customize_Category_Control(
			$wp_customize, 'itng-featured-news-list', array(
				'label'			=>	__('Category for the Grid Area', 'it-news-grid'),
				'description'	=>	__('Category to be shown in Grid Area', 'it-news-grid'),
				'priority'		=>	40,
				'section'		=>	'itng_featured_news'
			)
		)
	);
	
	$wp_customize->add_control(
		new itng_Separator_Control(
			$wp_customize, 'itng_featured_news_separator_2', array(
				'settings'	=>	array(),
				'priority'	=>	45,
				'section'	=>	'itng_featured_news'
			)
		)
	);
	
	$wp_customize->add_setting(
		'itng-featured-news-car-title', array(
			'default'		=>	'Trending',
			'sanitize_callback'	=>	'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(
		'itng-featured-news-car-title', array(
			'label'		=>	__('Banner List Title', 'it-news-grid'),
			'priority'	=>	48,
			'section'	=>	'itng_featured_news',
		)
	);
	
	$wp_customize->add_setting(
		'itng-featured-news-carousel', array(
			'default'		=>	0,
			'sanitize_callback'	=>	'absint'
		)
	);
	
	$wp_customize->add_control(
		new itng_WP_Customize_Category_Control(
			$wp_customize, 'itng-featured-news-carousel', array(
				'label'			=>	__('Category for the Carousel', 'it-news-grid'),
				'description'	=>	__('Category to be shown in Carousel', 'it-news-grid'),
				'priority'		=>	50,
				'section'		=>	'itng_featured_news'
			)
		)
	);
}
add_action( 'customize_register', 'itng_featured_news_customize_register' );