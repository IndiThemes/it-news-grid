<?php
/**
 *	Customizer Controls for Sidebar
**/

function itng_sidebr_customize_register( $wp_customize ) {

	$wp_customize->add_panel(
		"itng_layouts_panel", array(
			"title"			=>	esc_html__("Layouts", 'it-news-grid'),
			"description"	=>	esc_html__("Layout Settings for the Theme", 'it-news-grid'),
			"priority"		=>	20
		)
	);

	$wp_customize->add_section(
		"itng_blog", array(
			"title"			=>	esc_html__("Blog Page", 'it-news-grid'),
			"description"	=>	esc_html__("Control the Layout Settings for the Blog Page", 'it-news-grid'),
			"priority"		=>	10,
			"panel"			=>	"itng_layouts_panel"
		)
	);

	$wp_customize->add_setting(
		'itng_blog_layout', array(
			'default'	=>	'col_3',
			'sanitize_callback'	=>	'itng_sanitize_select'
		)
	);

	$wp_customize->add_control(
		'itng_blog_layout', array(
			'label'		=>	__('Blog Layout', 'it-news-grid'),
			'type'		=>	'select',
			'section'	=>	'itng_blog',
			'priority'	=>	3,
			'choices'	=>	array(
				'col_2'		=>	__('2 Columns', 'it-news-grid'),
				'col_3'		=>	__('3 Columns', 'it-news-grid')
			)
		)
	);

	$wp_customize->add_setting(
		"itng_blog_sidebar_enable", array(
			"default"			=>	"",
			"sanitize_callback"	=>	"itng_sanitize_checkbox"
		)
	);

	$wp_customize->add_control(
		"itng_blog_sidebar_enable", array(
			"label"		=>	esc_html__("Enable Sidebar for Blog Page.", 'it-news-grid'),
			"type"		=>	"checkbox",
			"section"	=>	"itng_blog",
			"priority"	=>	5
		)
	);



	$wp_customize->add_setting(
     "itng_blog_sidebar_layout", array(
       "default"  => "right",
       "sanitize_callback"  => "itng_sanitize_radio",
     )
   );

   $wp_customize->add_control(
	   new itng_Image_Radio_Control(
		   $wp_customize, "itng_blog_sidebar_layout", array(
			   "label"		=>	esc_html__("Blog Layout", 'it-news-grid'),
			   "type"		=>	"itng-image-radio",
			   "section"	=> "itng_blog",
			   "settings"	=> "itng_blog_sidebar_layout",
			   "priority"	=> 10,
			   "choices"	=>	array(
					"left"		=>	array(
						"name"	=>	esc_html__("Left Sidebar", 'it-news-grid'),
						"image"	=>	esc_url(get_template_directory_uri() . "/assets/images/left-sidebar.png")
					),
					"right"		=>	array(
						"name"	=>	esc_html__("Right Sidebar", 'it-news-grid'),
						"image"	=>	esc_url(get_template_directory_uri() . "/assets/images/right-sidebar.png")
					)
			   )
		   )
	   )
   );

    $sidebar_controls = array_filter( array(
        $wp_customize->get_control( 'itng_blog_sidebar_layout' ),
    ) );
    foreach ( $sidebar_controls as $control ) {
        $control->active_callback = function( $control ) {
            $setting = $control->manager->get_setting( 'itng_blog_sidebar_enable' );
            if (  $setting->value() ) {
                return true;
            } else {
                return false;
            }
        };
    }

    $wp_customize->add_setting(
	    'itng-blog-excerpt-length', array(
		    'default'			=>	15,
		    'sanitize_callback'	=>	'absint'
	    )
    );

    $wp_customize->add_control(
	    'itng-blog-excerpt-length', array(
		    'label'		=>	__('Excerpt Length', 'it-news-grid'),
		    'description'	=>	__('This works for Blog, Archives, and Search page', 'it-news-grid'),
		    'type'		=>	'number',
		    'section'	=>	'itng_blog',
		    'priority'	=>	13
	    )
    );

	$wp_customize->add_section(
		"itng_single", array(
			"title"			=>	esc_html__("Single Post", 'it-news-grid'),
			"description"	=>	esc_html__("Control the Layout Settings for the Single Post Page", 'it-news-grid'),
			"priority"		=>	20,
			"panel"			=>	"itng_layouts_panel"
		)
	);

	$wp_customize->add_setting(
		"itng_single_featured_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"itng_sanitize_checkbox"
		)
	);

	$wp_customize->add_control(
		"itng_single_featured_enable", array(
			"label"		=>	esc_html__("Enable Featured Image", 'it-news-grid'),
			"type"		=>	"checkbox",
			"section"	=>	"itng_single",
			"priority"	=>	3
		)
	);

	$wp_customize->add_setting(
		"itng_single_sidebar_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"itng_sanitize_checkbox"
		)
	);

	$wp_customize->add_control(
		"itng_single_sidebar_enable", array(
			"label"		=>	esc_html__("Enable Sidebar for Posts", 'it-news-grid'),
			"type"		=>	"checkbox",
			"section"	=>	"itng_single",
			"priority"	=>	5
		)
	);

	$wp_customize->add_setting(
     "itng_single_sidebar_layout", array(
       "default"  => "right",
       "sanitize_callback"  => "itng_sanitize_radio",
     )
   );

   $wp_customize->add_control(
	   new itng_Image_Radio_Control(
		   $wp_customize, "itng_single_sidebar_layout", array(
			   "label"		=>	esc_html__("Single Post Layout", 'it-news-grid'),
			   "type"		=>	"itng-image-radio",
			   "section"	=> "itng_single",
			   "Settings"	=> "itng_single_sidebar_layout",
			   "priority"	=> 10,
			   "choices"	=>	array(
					"left"		=>	array(
						"name"	=>	esc_html__("Left Sidebar", 'it-news-grid'),
						"image"	=>	esc_url(get_template_directory_uri() . "/assets/images/left-sidebar.png")
					),
					"right"		=>	array(
						"name"	=>	esc_html__("Right Sidebar", 'it-news-grid'),
						"image"	=>	esc_url(get_template_directory_uri() . "/assets/images/right-sidebar.png")
					)
			   )
		   )
	   )
   );

   $sidebar_controls = array_filter( array(
        $wp_customize->get_control( 'itng_single_sidebar_layout' ),
    ) );
    foreach ( $sidebar_controls as $control ) {
        $control->active_callback = function( $control ) {
            $setting = $control->manager->get_setting( 'itng_single_sidebar_enable' );
            if (  $setting->value() ) {
                return true;
            } else {
                return false;
            }
        };
    }

    $wp_customize->add_setting(
		"itng_single_citation_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"itng_sanitize_checkbox"
		)
	);

	$wp_customize->add_control(
		"itng_single_citation_enable", array(
			"label"		=>	esc_html__("Enable Image Citations in Posts", 'it-news-grid'),
			"type"		=>	"checkbox",
			"section"	=>	"itng_single",
			"priority"	=>	15
		)
	);

   $wp_customize->add_setting(
		"itng_single_navigation_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"itng_sanitize_checkbox"
		)
	);

	$wp_customize->add_control(
		"itng_single_navigation_enable", array(
			"label"		=>	esc_html__("Enable Post Navigation", 'it-news-grid'),
			"type"		=>	"checkbox",
			"section"	=>	"itng_single",
			"priority"	=>	15
		)
	);

	$wp_customize->add_setting(
		"itng_single_related_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"itng_sanitize_checkbox"
		)
	);

	$wp_customize->add_control(
		"itng_single_related_enable", array(
			"label"		=>	esc_html__("Enable Related Posts Section", 'it-news-grid'),
			"type"		=>	"checkbox",
			"section"	=>	"itng_single",
			"priority"	=>	20
		)
	);

	$wp_customize->add_setting(
		"itng_single_author_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"itng_sanitize_checkbox"
		)
	);

	$wp_customize->add_control(
		"itng_single_author_enable", array(
			"label"		=>	esc_html__("Enable Author Box", 'it-news-grid'),
			"type"		=>	"checkbox",
			"section"	=>	"itng_single",
			"priority"	=>	25
		)
	);

	$wp_customize->add_section(
		"itng_search", array(
			"title"			=>	esc_html__("Search Page", 'it-news-grid'),
			"description"	=>	esc_html__("Layout Settings for the Search Page", 'it-news-grid'),
			"priority"		=>	30,
			"panel"			=>	"itng_layouts_panel"
		)
	);

	$wp_customize->add_setting(
		'itng_search_layout', array(
			'default'			=>	'col_3',
			'sanitize_callback'	=>	'itng_sanitize_select'
		)
	);

	$wp_customize->add_control(
		'itng_search_layout', array(
			'label'		=>	__('Search Page Layout', 'it-news-grid'),
			'type'		=>	'select',
			'section'	=>	'itng_search',
			'priority'	=>	3,
			'choices'	=>	array(
				'col_2'		=>	__('2 Columns', 'it-news-grid'),
				'col_3'		=>	__('3 Columns', 'it-news-grid')
			)
		)
	);

	$wp_customize->add_setting(
		"itng_search_sidebar_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"itng_sanitize_checkbox"
		)
	);

	$wp_customize->add_control(
		"itng_search_sidebar_enable", array(
			"label"		=>	esc_html__("Enable Sidebar for Search Page", 'it-news-grid'),
			"type"		=>	"checkbox",
			"section"	=>	"itng_search",
			"priority"	=>	5
		)
	);

	$wp_customize->add_setting(
     "itng_search_sidebar_layout", array(
       "default"  => "right",
       "sanitize_callback"  => "itng_sanitize_radio",
     )
   );

   $wp_customize->add_control(
	   new itng_Image_Radio_Control(
		   $wp_customize, "itng_search_sidebar_layout", array(
			   "label"		=>	esc_html__("Arc Page Layout", 'it-news-grid'),
			   "type"		=>	"itng-image-radio",
			   "section"	=> "itng_search",
			   "Settings"	=> "itng_search_sidebar_layout",
			   "priority"	=> 10,
			   "choices"	=>	array(
					"left"		=>	array(
						"name"	=>	esc_html__("Left Sidebar", 'it-news-grid'),
						"image"	=>	esc_url(get_template_directory_uri() . "/assets/images/left-sidebar.png")
					),
					"right"		=>	array(
						"name"	=>	esc_html__("Right Sidebar", 'it-news-grid'),
						"image"	=>	esc_url(get_template_directory_uri() . "/assets/images/right-sidebar.png")
					)
			   )
		   )
	   )
   );

   $sidebar_controls = array_filter( array(
        $wp_customize->get_control( 'itng_search_sidebar_layout' ),
    ) );
    foreach ( $sidebar_controls as $control ) {
        $control->active_callback = function( $control ) {
            $setting = $control->manager->get_setting( 'itng_search_sidebar_enable' );
            if (  $setting->value() ) {
                return true;
            } else {
                return false;
            }
        };
    }

   $wp_customize->add_section(
		"itng_archive", array(
			"title"			=>	esc_html__("Archives", 'it-news-grid'),
			"description"	=>	esc_html__("Layout Settings for the Archives", 'it-news-grid'),
			"priority"		=>	40,
			"panel"			=>	"itng_layouts_panel"
		)
	);

	$wp_customize->add_setting(
		'itng_archive_layout', array(
			'default'	=>	'col_3',
			'sanitize_callback'	=>	'itng_sanitize_select'
		)
	);

	$wp_customize->add_control(
		'itng_archive_layout', array(
			'label'		=>	__('Blog Layout', 'it-news-grid'),
			'type'		=>	'select',
			'section'	=>	'itng_archive',
			'priority'	=>	3,
			'choices'	=>	array(
				'col_2'		=>	__('2 Columns', 'it-news-grid'),
				'col_3'		=>	__('3 Columns', 'it-news-grid')
			)
		)
	);

	$wp_customize->add_setting(
		"itng_archive_sidebar_enable", array(
			"default"			=>	1,
			"sanitize_callback"	=>	"itng_sanitize_checkbox"
		)
	);

	$wp_customize->add_control(
		"itng_archive_sidebar_enable", array(
			"label"		=>	esc_html__("Enable Sidebar for Archives", 'it-news-grid'),
			"type"		=>	"checkbox",
			"section"	=>	"itng_archive",
			"priority"	=>	5
		)
	);

	$wp_customize->add_setting(
     "itng_archive_sidebar_layout", array(
       "default"  => "right",
       "sanitize_callback"  => "itng_sanitize_radio",
     )
   );

   $wp_customize->add_control(
	   new itng_Image_Radio_Control(
		   $wp_customize, "itng_archive_sidebar_layout", array(
			   "label"		=>	esc_html__("Archives Layout", 'it-news-grid'),
			   "type"		=>	"itng-image-radio",
			   "section"	=> "itng_archive",
			   "Settings"	=> "itng_archive_sidebar_layout",
			   "priority"	=> 10,
			   "choices"	=>	array(
					"left"		=>	array(
						"name"	=>	esc_html__("Left Sidebar", 'it-news-grid'),
						"image"	=>	esc_url(get_template_directory_uri() . "/assets/images/left-sidebar.png")
					),
					"right"		=>	array(
						"name"	=>	esc_html__("Right Sidebar", 'it-news-grid'),
						"image"	=>	esc_url(get_template_directory_uri() . "/assets/images/right-sidebar.png")
					)
			   )
		   )
	   )
   );

   $sidebar_controls = array_filter( array(
        $wp_customize->get_control( 'itng_search_sidebar_layout' ),
    ) );
    foreach ( $sidebar_controls as $control ) {
        $control->active_callback = function( $control ) {
            $setting = $control->manager->get_setting( 'itng_search_sidebar_enable' );
            if (  $setting->value() ) {
                return true;
            } else {
                return false;
            }
        };
    }
}
add_action("customize_register", "itng_sidebr_customize_register");
