<?php
	the_custom_logo();
?>
	<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
	<?php
$itng_description = get_bloginfo( 'description', 'display' );
if ( $itng_description || is_customize_preview() ) :
	?>
	<p class="site-description"><?php echo esc_html($itng_description); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
<?php endif; ?>