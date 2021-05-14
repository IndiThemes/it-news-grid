<?php
/**
 *	Review, Support and Upsell Section
 */
 
function itng_misc_customize_register( $wp_customize ) {
	
	$wp_customize->add_section(
		'itng-misc', array(
			'title'		=>	__('THEME LINKS', 'it-news-grid'),
			'priority'	=>	40
		)
	);
	
	$wp_customize->add_setting(
		'itng-support', array(
		'default'		=>	'',
		'sanitize_callback'	=>	'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(
		new itng_Custom_Link_Control(
			$wp_customize, 'itng-support', array(
				'label'		=>	__('Mail Us', 'it-news-grid'),
				'description'	=> __('If you have any questions, queries, feedback or suggestions for the theme, we would love to hear from you.', 'it-news-grid'),
				'type'		=>	'itng-link',
				'section'	=>	'itng-misc',
				'settings'	=>'itng-support',
				'priority'	=>	5,
				'input_attrs'	=>	array(
						'url'		=>	'mailto:support@indithemes.com'
				)
			)
		)
	);
	
	$wp_customize->add_setting(
		'itng-review', array(
		'default'		=>	'',
		'sanitize_callback'	=>	'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(
		new itng_Custom_Link_Control(
			$wp_customize, 'itng-review', array(
				'label'		=>	__('<span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span>', 'it-news-grid'),
				'description'	=> __('If you liked the theme, do leave us a glittering review. We would really appreciate it. Thanks!', 'it-news-grid'),
				'type'		=>	'itng-link',
				'section'	=>	'itng-misc',
				'settings'	=>'itng-review',
				'priority'	=>	5,
				'input_attrs'	=>	array(
						'url'		=>	'https://www.wordpress.org'
				)
			)
		)
	);
	
	$wp_customize->add_setting(
		'itng-more', array(
		'default'		=>	'',
		'sanitize_callback'	=>	'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(
		new itng_Custom_Link_Control(
			$wp_customize, 'itng-more', array(
				'label'		=>	__('More Themes', 'it-news-grid'),
				'description'	=> __('Do visit our store at <strong>IndiThemes.com</strong> and check out our other stuff!', 'it-news-grid'),
				'type'		=>	'itng-link',
				'section'	=>	'itng-misc',
				'settings'	=>'itng-more',
				'priority'	=>	5,
				'input_attrs'	=>	array(
						'url'		=>	'https://indithemes.com'
				)
			)
		)
	);
}
add_action('customize_register', 'itng_misc_customize_register');