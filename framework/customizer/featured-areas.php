<?php
/**
 *	Featured Areas Panel
 */
function itng_featured_areas_customize_register( $wp_customize ) {
	
	$wp_customize->add_panel(
		'itng-featured-areas', array(
			'title'		=>	__('Featured Areas', 'it-news-grid'),
			'priority'	=>	30
		)
	);
	
}
add_action('customize_register', 'itng_featured_areas_customize_register');