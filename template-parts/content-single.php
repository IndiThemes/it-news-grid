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
	
	<div class="itng-single-thumb">
		<?php if ( has_post_thumbnail() ): ?>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>
		<?php
		else :
		?>	<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/ph_fp.png'); ?>"></a>
		<?php endif; ?>
	</div>

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
