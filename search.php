<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package IT News Grid
 */

get_header();
?>

	<main id="primary" class="site-main <?php echo itng_sidebar_align('search')[0]; ?>">

		<?php if ( have_posts() ) : ?>
			
			<header class="page-header col-12">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'it-news-grid' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->
		
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				do_action('itng_layout', get_theme_mod('itng_search_layout', 'col_3'));

			endwhile;

			the_posts_pagination( apply_filters( 'itng_posts_pagination_args', array(
				'class'	=>	'itng-pagination',
				'prev_text'	=> '<i class="fa fa-angle-left"></i>',
				'next_text'	=> '<i class="fa fa-angle-right"></i>'
			) ) );
			
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
do_action('itng_sidebar', 'search');
get_footer();
