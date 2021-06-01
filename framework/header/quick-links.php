<?php
/**
 *	Top Menu for Quick Links
 */
 ?>
<div id="top-navigation" class="quick-links col-auto ml-auto" role="navigation">
	
	<button class="top-go-to-end jumper"></button>
	<button type="button" class="top-menu-mobile"><?php _e('Quick Links', 'it-news-grid') ?></button>
	
	<?php
		wp_nav_menu( apply_filters( 'itng_top_menu_args', array(
			'menu_id'        => 'menu-top',
			'depth'			 => '1',
			'fallback_cb'	 => false,
			'theme_location' => 'menu-3',
		) ) );
	?>
	<button class="top-go-to-btn jumper"></button>
</div>