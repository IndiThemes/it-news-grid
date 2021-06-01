<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IT News Grid
 */

?>
</div><!-- #content-wrapper -->

<?php do_action('itng_after_content'); ?>

<?php do_action('itng_footer'); ?>

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="site-info">
				<?php printf(esc_html__('Theme Designed by %s', 'it-news-grid'), '<a href="https://indithemes.com">IndiThemes</a>'); ?>
				<span class="sep"> | </span>
					<?php echo ( get_theme_mod('itng_footer_text') == '' ) ? ('Copyright &copy; '.date_i18n( esc_html__( 'Y', 'it-news-grid' ) ).' ' . esc_html( get_bloginfo('name') ) . esc_html__('. All Rights Reserved.','it-news-grid')) : esc_html(get_theme_mod('itng_footer_text')); ?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<nav id="menu" class="panel" role="navigation">
	<div class="menu-overlay"></div>
	<div id="panel-top-bar">
		<button class="go-to-bottom"></button>
		<button id="close-menu" class="menu-link"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
	</div>
	
	<?php wp_nav_menu( apply_filters( 'mobile_nav_args', array( 'menu_id'        => 'menu-main',
							  'container'		=> 'ul',
	                          'theme_location' => 'menu-1',
	                          'walker'         => has_nav_menu('menu-1') ? new itng_Mobile_Menu : '',
	                     ) ) ); ?>
	                     
	<button class="go-to-top"></button>
</nav>

<div id="sticky-navigation">
	<div class="nav-wrapper">
		 <div class="container">
	    	
			 <div class="row justify-content-end align-items-center justify-content-between no-gutters">
				 
				 <div class="site-branding col-auto">
					<?php do_action('itng_get_branding'); ?>
		    	</div>
		    	
				<div class="main-navigation col-lg-9" role="navigation">
					<?php get_template_part('framework/header/navigation'); ?>
				</div>
				 
				<button href="#menu" class="menu-link mobile-nav-btn"><i class="fa fa-bars" aria-hidden="true"></i></button>
				
				<button type="button" id="go-to-field" tabindex="-1"></button>
		    	 
			</div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
