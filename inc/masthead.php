<?php
	
/**
 *	Search Form
 */
 function itng_get_search() {

	get_template_part('framework/header/search');
 }
 add_action('itng_search', 'itng_get_search');


 /**
  *	Function to add Mobile Navigation
  */
 function itng_navigation() {

 	require get_template_directory() . '/framework/header/navigation.php';

 }
  add_action('itng_get_navigation', 'itng_navigation');
  

 /**
  *	Function for adding Site Branding via action
  */
 function itng_branding() {

 	require get_template_directory() . '/framework/header/branding.php';

 }
 add_action('itng_get_branding', 'itng_branding');
 
 /**
  *	Get Social Icons
  */
 function itng_get_social() {
	 
	if ( !empty( get_theme_mod( 'itng_social_enable', 1 ) ) ) :
		get_template_part('framework/header/social');
	endif;
	 
 }
 add_action('itng_top_bar_area', 'itng_get_social', 5);
 
/**
 *	Get Quick Links Menu
 */
 function itng_quicklinks_menu() {
	 
	if ( !empty( get_theme_mod('itng_top_menu_enable') ) ) :
		get_template_part( 'framework/header/quick-links' );
	endif;
	 
 }
 add_action('itng_top_bar_area', 'itng_quicklinks_menu', 10);
 
/**
 *	Control the Masthead of the theme
 */
function itng_get_masthead() { 
	
	switch ( get_theme_mod('itng_header_style', 'style_1') ) {
	
	case 'style_1' : ?>
	
    <header id="masthead" class="site-header style-1">
	    
	    <?php if ( !empty(get_theme_mod( 'itng_top_bar_enable', 1) ) ) : ?>
	    <div id="itng-top-bar">
		    <div class="container">
			    <div class="row align-items-center">
			    	<?php do_action('itng_top_bar_area'); ?>
			    </div>
		    </div>
	    </div>
	    <?php endif; ?>
	    
        <div id="header-image">
	        <div class="site-branding">
				<?php do_action('itng_get_branding'); ?>
        	</div>
        </div>

		<div class="nav-wrapper">
			 <div class="container">
				 <div class="row align-items-center no-gutters">
					 
					<div id="site-navigation" class="main-navigation col-lg-11" role="navigation">
						<?php get_template_part('framework/header/navigation'); ?>
					</div>
					 
					<button href="#menu" class="menu-link mobile-nav-btn"><i class="fa fa-bars" aria-hidden="true"></i></button>
					
					<button type="button" id="go-to-field" tabindex="-1"></button>
			    	<button id="search-btn" class="ml-auto col-auto"><i class="fa fa-search"></i></button>
			    	<?php do_action('itng_search'); ?>
			    	 
				</div>
			</div>
		</div>
		 
	</header><!-- #masthead -->
	<?php
	break;
	
	case 'style_2' : ?>
	
    <header id="masthead" class="site-header style-2">
	    
	    <?php if ( !empty( get_theme_mod( 'itng_top_bar_enable', 1) ) ) : ?>
	    <div id="itng-top-bar">
		    <div class="container">
			    <div class="row align-items-center">
			    	<?php do_action('itng_top_bar_area'); ?>
			    </div>
		    </div>
	    </div>
	    <?php endif; ?>
	    
	    <div class="container">
		    <div id="logo-ad-area" class="row no-gutters">
			    
			    <div class="site-branding col-md-4">
					<?php do_action('itng_get_branding'); ?>
		    	</div>
		    	
		    	<div class="header-widget-area ml-auto col-md-8">
				    <?php
					    if ( is_active_sidebar( 'sidebar-header' ) ) { ?>
						
							<aside id="header-widget-wrapper" class="widget-area">
								<?php dynamic_sidebar( 'sidebar-header' ); ?>
							</aside><!-- #secondary -->
							
					<?php } ?>
		    	</div>
	    	</div>
    	</div>
	    
		<div class="nav-wrapper">
			 <div class="container">
				 <div class="row no-gutters align-items-center justify-content-between">
					 <div id="site-navigation" class="main-navigation col-auto" role="navigation">
					 	<?php get_template_part('framework/header/navigation'); ?>
					 </div>
					 
					<button href="#menu" class="menu-link mobile-nav-btn"><i class="fa fa-bars" aria-hidden="true"></i></button>
					
					<button type="button" id="go-to-field" tabindex="-1"></button>
			    	<button id="search-btn" class="col-auto"><i class="fa fa-search"></i></button>
			    	 <?php do_action('itng_search'); ?>
			    	 
				</div>
			</div>
		</div>
		 
	</header><!-- #masthead -->
	<?php
	break;
	
	default: ?>
	<header id="masthead" class="site-header style-def">
	    
        <div id="header-image">
	        <div class="site-branding">
				<?php do_action('itng_get_branding'); ?>
	    	</div>
        </div>

		<div class="nav-wrapper">
			 <div class="container">
				 <div class="row justify-content-end align-items-center no-gutters">
					 <?php get_template_part('framework/header/navigation'); ?>
					 
					<button id="mobile-nav-btn" class="menu-link mobile-nav-btn"><i class="fa fa-bars" aria-hidden="true"></i></button>
					
					<button type="button" id="go-to-field" tabindex="-1"></button>
			    	<button id="search-btn"><i class="fa fa-search"></i></button>
			    	 <?php do_action('itng_search'); ?>
			    	 
				</div>
			</div>
		</div>
		 
	</header><!-- #masthead -->
<?php
	}
}
add_action('itng_masthead', 'itng_get_masthead', 10);