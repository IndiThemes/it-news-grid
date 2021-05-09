<?php
/**
 *	Customizer Controls for General Settings for the theme
 */
 
function itng_general_customize_register( $wp_customize ) {
	
	$wp_customize->add_section(
		"itng_general_options", array(
			"title"			=>	esc_html__("General", "it-news-grid"),
			"description"	=>	esc_html__("General Settings for the Theme", "it-news-grid"),
			"priority"		=>	5
		)
	);
	
	$wp_customize->add_setting(
        'itng_sidebar_width', array(
            'default'    =>  25,
            'sanitize_callback'  =>  'absint'
        )
    );

    $wp_customize->add_control(
        new itng_Range_Value_Control(
            $wp_customize, 'itng_sidebar_width', array(
	            'label'         =>	esc_html__( 'Sidebar Width', 'it-news-grid' ),
            	'type'          => 'itng-range-value',
            	'section'       => 'itng_general_options',
            	'settings'      => 'itng_sidebar_width',
                'priority'		=>  5,
            	'input_attrs'   => array(
            		'min'            => 25,
            		'max'            => 40,
            		'step'           => 1,
            		'suffix'         => '%', //optional suffix
				),
            )
        )
    );
    
    $wp_customize->add_setting(
	    'itng_site_layout', array(
		    'default'			=>	'box',
		    'sanitize_callback'	=>	'itng_sanitize_select'
	    )
    );
    
    $wp_customize->add_control(
	    'itng_site_layout', array(
		    'label'		=>	__('Site Layout', 'it-news-grid'),
		    'type'		=>	'select',
		    'section'	=>	'itng_general_options',
		    'priority'	=>	10,
		    'choices'	=>	array(
			    'box'	=>	__('Box Layout', 'it-news-grid'),
			    'full'	=>	__('Full Width Layout', 'it-news-grid')
		    )
	    )
    );
}
add_action("customize_register", "itng_general_customize_register");