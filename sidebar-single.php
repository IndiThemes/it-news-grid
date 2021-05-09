<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IT News Grid
 */

if ( ! is_active_sidebar( 'sidebar-single' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area col <?php echo itng_sidebar_align($args['page'])[1]; ?>">
	<?php dynamic_sidebar( 'sidebar-single' ); ?>
</aside><!-- #secondary -->
