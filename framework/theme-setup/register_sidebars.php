<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function itng_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'it-news-grid' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'it-news-grid' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Post Sidebar', 'it-news-grid' ),
			'id'            => 'sidebar-single',
			'description'   => esc_html__( 'This is the sidebar for Post Page. Add widgets here.', 'it-news-grid' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Page Sidebar', 'it-news-grid' ),
			'id'            => 'sidebar-page',
			'description'   => esc_html__( 'This is the sidebar for the Pages. Add widgets here.', 'it-news-grid' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Before Content', 'it-news-grid' ),
			'id'            => 'before-content',
			'description'   => esc_html__( 'This is the sidebar before Content in the Front Page. Add widgets here.', 'it-news-grid' ),
			'before_widget' => '<section id="%1$s" class="widget container %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'After Content', 'it-news-grid' ),
			'id'            => 'after-content',
			'description'   => esc_html__( 'This is the sidebar after Content in the Front Page. Add widgets here.', 'it-news-grid' ),
			'before_widget' => '<section id="%1$s" class="widget container %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar 1', 'it-news-grid' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Footer Sidebar Column 1', 'it-news-grid' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar 2', 'it-news-grid' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Footer Sidebar Column 2', 'it-news-grid' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar 3', 'it-news-grid' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Footer Sidebar Column 3', 'it-news-grid' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar 4', 'it-news-grid' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Footer Sidebar Column 4', 'it-news-grid' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Header Widget Area', 'it-news-grid' ),
			'id'            => 'sidebar-header',
			'description'   => esc_html__( 'Header Sidebar for placing ad ad in the header area.', 'it-news-grid' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
	);
}
add_action( 'widgets_init', 'itng_widgets_init' );