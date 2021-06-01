<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package IT News Grid
 */

get_header();
?>

	<main id="primary" class="site-main container <?php echo itng_sidebar_align('single')[0]; ?>">

		<?php
		while ( have_posts() ) :
			the_post();
			
			get_template_part('template-parts/content', 'single');
			
			if ( get_theme_mod('itng_single_navigation_enable') !== "" ) :
				
				the_post_navigation(
					apply_filters( 'itng_single_post_navigation_args', array(
						'prev_text' => __('%title', 'it-news-grid'),
						'next_text' => __('%title', 'it-news-grid'),
					) ) );
			endif;
			
			if ( get_theme_mod('itng_single_related_enable', 1) !== "" ) :
				do_action('itng_related_posts');
			endif;
			
			if (get_theme_mod('itng_single_author_enable', 1) !== "") :
				itng_about_author( $post );
			endif;
			
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
do_action('itng_sidebar', 'single');
get_footer();
