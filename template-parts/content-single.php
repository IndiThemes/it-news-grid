<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IT News Grid
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	
	
	
	<?php
	if ( 'post' === get_post_type() ) :
		?>
		<div class="entry-meta">
			<?php
			itng_posted_on();
			itng_posted_by();
			?>
		</div><!-- .entry-meta -->
	<?php endif; ?>
	
	<?php if ( has_post_thumbnail() && !empty( get_theme_mod( 'itng_single_featured_enable', 1 ) ) ): ?>
		<div class="itng-single-thumb">
			<figure>
			
				<?php the_post_thumbnail('full'); ?>
				
				<?php if ( !empty( get_theme_mod( 'itng_single_citation_enable', 1 ) ) ) : ?>
					<figcaption class="itng-img-caption"><?php the_post_thumbnail_caption(); ?></figcaption>
				<?php endif; ?>
				
			</figure>
		</div>
	<?php endif; ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'it-news-grid' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'it-news-grid' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php itng_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
