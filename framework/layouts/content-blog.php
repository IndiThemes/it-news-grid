<?php
/**
 * List Layout for Blog
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IT News Grid
 */
 
 switch($args) :
 	case 'col_3':
 		$cols = 'col-md-6 col-lg-4';
 	break;
 	case 'col_2':
 		$cols = 'col-md-6';
 	break;
 	default:
 		$cols = 'col-md-6 col-lg-4';
 endswitch;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('itng-blog ' . $cols); ?>>
		<div class="itng-card-wrapper">
			<div class="itng-thumb">
				<?php if ( has_post_thumbnail() ): ?>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('itng_blog_thumb'); ?></a>
				<?php endif; ?>
			</div>
			
			<div class="itng-card-content">
				<div class="entry-meta">
					<a href="<?php the_permalink(); ?>"><?php echo get_the_date('j M y'); ?></a>
					<?php
					itng_posted_by();
					?>
				</div><!-- .entry-meta -->
				
				<header class="entry-header">
					<?php
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
					 ?>
				</header><!-- .entry-header -->
				
				<div class="itng_excerpt">
					<?php do_action('itng_blog_excerpt', get_theme_mod( 'itng-blog-excerpt-length', 15 ) ); ?>
				</div>
				
				<div class="blog-footer">
					<div class="itng_cats">
						<?php echo get_the_category_list(', '); ?>
					</div>
					<div class="blog-comments">
						<?php echo get_comments_number(); ?>
					</div>
				</div>
			</div>
		</div>
</article><!-- #post-<?php the_ID(); ?> -->