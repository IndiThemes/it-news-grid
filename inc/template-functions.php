<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package oro
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function itng_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'itng_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function itng_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'itng_pingback_header' );


/**
 *	Pagination
 */
function itng_get_pagination() {

	$args	=	apply_filters( 'itng_pagination', array(
		'mid_size' => 2,
		'prev_text' => __( '<i class="fas fa-angle-left"></i>', 'it-news-grid' ),
		'next_text' => __( '<i class="fas fa-angle-right"></i>', 'it-news-grid' ),
	) );

	the_posts_pagination($args);

}
add_action('itng_pagination', 'itng_get_pagination');


/**
 *	Function to generate meta data for the posts
 */
 if ( !function_exists('itng_get_metadata') ) {
	 
	function itng_get_metadata() {
		if ( 'post' === get_post_type() ) :
			?>
				<div class="entry-meta">
					<?php
					itng_posted_by();
					itng_posted_on();
					itng_get_post_categories();
					itng_get_comments();
					?>
				</div>
		<?php endif;
	}
}
add_action('itng_metadata', 'itng_get_metadata');

 

/**
 *	Function for post content on Blog Page
 */
 if ( !function_exists('itng_get_blog_excerpt' ) ) {
	 
	 function itng_get_blog_excerpt( $length = 30 ) {
	
		 global $post;
		 $output	=	'';
	
		 if ( isset($post->ID) && has_excerpt($post->ID) ) {
			 $output = $post->post_excerpt;
		 }
	
		 elseif ( isset( $post->post_content ) ) {
			 if ( strpos($post->post_content, '<!--more-->') ) {
				 $output	=	get_the_content('');
			 }
			 else {
				 $output	=	wp_trim_words( strip_shortcodes( $post->post_content ), $length );
			 }
		 }
	
		 $output	=	apply_filters('itng_excerpt', $output);
	
		 echo $output;
	 }
}
 add_action('itng_blog_excerpt', 'itng_get_blog_excerpt', 10, 1);


if ( !function_exists('itng_get_layout') ) {
	function itng_get_layout( $cols = 'col_3' ) {
		 
		$layout	=	'framework/layouts/content';
		 
		get_template_part( $layout, 'blog', $cols );
		 
	}
}
 add_action( 'itng_layout', 'itng_get_layout', 10 );


 /**
  *	Function for 'Read More' link
  */
  function itng_read_more_link() {
	  ?>
	  <div class="read-more title-font"><a href="<?php the_permalink() ?>"><?php apply_filters( 'itng_read_more', _e('Read More', 'it-news-grid') ); ?></a></div>
	  <?php
  }


/**
 *	Function to Enable Sidebar
 */
if ( !function_exists('itng_get_sidebar') ) {
	function itng_get_sidebar( $template ) {
	
	   global $post;
	
	   switch( $template ) {
		   
		    case "blog";
		    if ( is_home() &&
		    	get_theme_mod('itng_blog_sidebar_enable', 1) !== "" ) {
			    get_sidebar(NULL, ['page' => 'blog']);
			}
			break;
		    case "single":
		   		if( is_single() &&
		   		get_theme_mod('itng_single_sidebar_enable', 1) !== "" ) {
					get_sidebar('single', ['page' => 'single']);
				}
			break;
			case "search":
		   		if( is_search() &&
		   		get_theme_mod('itng_search_sidebar_enable', 1) !== "" ) {
					get_sidebar(NULL, ['page' => 'search']);
				}
			break;
			case "archive":
		   		if( is_archive() &&
		   		get_theme_mod('itng_archive_sidebar_enable', 1) !== "" ) {
					get_sidebar(NULL, ['page' => 'archive']);
				}
			break;
			case "page":
				if	( is_page() &&
				!is_front_page() &&
				'' !== get_post_meta($post->ID, 'enable-sidebar', true) ) {
					get_sidebar('page', ['page'	=>	'page']);
				}
			break;
		    default:
		    	get_sidebar();
		}
	}
}
add_action('itng_sidebar', 'itng_get_sidebar', 10, 1);



 /**
  *	Function for Sidebar alignment
  */
if ( !function_exists('itng_sidebar_align') ) {
	function itng_sidebar_align( $template = 'blog' ) {
		
		$align = 'page'	== $template ? get_post_meta( get_the_ID(), 'align-sidebar', true ) : get_theme_mod('itng_' . $template . '_sidebar_layout', 'right');
	
		$align_arr	=	['order-1', 'order-2'];
	
		if ( in_array( $template, ['single', 'blog', 'page', 'search', 'archive'] ) ) {
			return 'right' == $align ? $align_arr : array_reverse($align_arr);
		}
		else {
			return $align_arr;
		}
	}
}


 /**
  *	Function to get Social icons
  */
 function itng_get_social_icons() {
 	get_template_part('social');
 }
 add_action('itng_social_icons', 'itng_get_social_icons');


/**
 *	The About Author Section
 */
if ( !function_exists('itng_about_author') ) {
	
	function itng_about_author( $post ) { ?>
		<div id="author_box" class="row no-gutters">
			<div class="author_avatar col-2">
				<?php echo get_avatar( intval($post->post_author), apply_filters( 'itng_avatar_size', 96 ) ); ?>
			</div>
			<div class="author_info col-10">
				<h4 class="author_name title-font">
					<?php echo get_the_author_meta( 'display_name', intval($post->post_author) ); ?>
				</h4>
				<div class="author_bio">
					<?php echo get_the_author_meta( 'description', intval($post->post_author) ); ?>
				</div>
			</div>
		</div>
	<?php
	}
	
}

 /**
  *	Function to add featured Areas before Content
  */
if ( !function_exists('itng_get_sidebar_before_content') ) {
	function itng_get_sidebar_before_content() {
		
		if ( is_front_page() && is_active_sidebar('before-content') ) :
			?>
			<div id="itng-before-content" class="container">
				<?php
					dynamic_sidebar('before-content');
				?>
			</div>
			<?php
		endif;
	}
}
add_action('itng_before_content', 'itng_get_sidebar_before_content', 50);



/**
*	Function to add Featured Areas After Content
*/
   if ( !function_exists('itng_get_after_content') ) {
function itng_get_after_content() {

	    if ( is_front_page() && is_active_sidebar('after-content') ) :
			?>
			<div id="itng-after-content" class="container">
				<?php
					dynamic_sidebar('after-content');
				?>
			</div>
			<?php
		endif;
   }
}
add_action('itng_after_content', 'itng_get_after_content');


/**
 *	Function for footer section
 */
 if ( function_exists('itng_get_footer') ) {
	 function itng_get_footer() {
		 
		$path 	=	'/framework/footer/footer';
		get_template_part( $path, get_theme_mod( 'itng_footer_cols', 4 ) );
	 }
 }
 add_action('itng_footer', 'itng_get_footer');
   
/**
 *	Function for AJAX request to get meta data of page set as Front Page
**/

/*
add_action('wp_ajax_front_page_meta', 'itng_front_page_ajax');
function itng_front_page_ajax() {
	
	$page_id	=	intval( $_POST['id'] );
	$path		=	get_page_template_slug($page_id);

	echo $path;
	
	wp_die();
	
}
*/


/**
 *	Related Posts of a Single Post
 */
 
function itng_get_related_posts() {
	
	global $post;
	
	$related_args = apply_filters( 'itng_related_posts_args', [
		"posts_per_page"		=>	3,
		"ignore_sticky_posts"	=>	true,
		"post__not_in"			=>	[get_the_ID()],
		"category_name"			=>	get_the_category($post)[0]->slug,
		"orderby"				=> "rand"
	] );
	
	$related_query	=	new WP_Query( $related_args );
	
	if ( $related_query->have_posts() ) : ?>
		<div id="itng_related_posts_wrapper">
			<h3 id="itng_related_posts_title"><?php _e('Related Posts', 'it-news-grid'); ?></h3>
			<div class="itng-related-posts row">
				<?php
					while ( $related_query->have_posts() ) : $related_query->the_post();
			
						get_template_part( 'framework/layouts/content', 'blog' );
						
					endwhile;
				?>
			</div>
		</div>
	<?php
	endif;
	wp_reset_postdata();
}
add_action('itng_related_posts', 'itng_get_related_posts');


/**
 *	ITNG Featured Category
 */
if ( !function_exists('itng_featured_category') ) {
	
	function itng_featured_category() {
		
		if ( empty( get_theme_mod('itng-featured-cat') ) ) {
			return;
		}
		
		if 	( is_front_page() && get_theme_mod( 'itng-featured-cat-front-enable' )
		   || !is_front_page() && is_home() && get_theme_mod( 'itng-featured-cat-blog-enable' ) ) {
			   
			$cat = get_theme_mod('itng-featured-cat', 0);
		
			$args = array(
				'posts_per_page'		=>	4,
				'ignore_sticky_posts'	=>	true,
				'cat'					=>	$cat
			);
			
			$cat_query	=	new WP_Query( $args );
			
			if ( $cat_query->have_posts() ) : ?>
				<div id="itng-featured-cat" class="container">
					<div class="row">
					<?php
					while ( $cat_query->have_posts() ) : $cat_query->the_post(); ?>
					
						<div class="featured-cat-thumb-wrapper col-md-6 col-lg-3">
							<div class="featured-cat-thumb">
								<a href="<?php esc_url( the_permalink() ); ?>">
								<?php if ( has_post_thumbnail() ) :
									the_post_thumbnail('itng_square_thumb');
								else : ?>
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/ph_square.png' ); ?>" alt="<?php echo esc_attr( $post->post_title ); ?>">
								<?php endif; ?>
								<?php the_title( '<h2 class="itng-featured-cat-title">', '</h2>', true ); ?>
								</a>
							</div>
						</div>
						
					<?php
					endwhile; ?>
					</div>
				</div>
				<?php
				endif;
				
			wp_reset_postdata();
		   
		}
	}
}
add_action('itng_before_content', 'itng_featured_category', 20);


/**
 *	Featured Post Markup
 */
if ( !function_exists('itng_featured_post_markup') ) {
	
	function itng_featured_post_markup( $post ) {
		?>
		<a href=<?php echo esc_url( get_the_permalink( $post ) ) ?>>
			<div class="itng-featured-post-thumb">
				<?php
					if (has_post_thumbnail( $post ) ) :
						echo get_the_post_thumbnail( $post, 'itng_800x500');
					else : ?>
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/ph_fp.png' ) ?>" alt="<?php echo esc_attr( get_the_title( $post ) ); ?>">
					<?php
					endif;
				?>
				<p class="itng-featured-post-date"><?php echo esc_html( get_the_date( 'd F, Y', $post ) ) ?></p>
				<h2 class="itng-featured-post-title"><?php echo esc_html( get_the_title( $post ) ); ?></h2>
			</div>
		</a>
	<?php
	}
}


/**
 *	ITNG Featured Post
 */
if ( !function_exists('itng_featured_posts') ) {
	
	function itng_featured_posts() {
		
		if ( empty( get_theme_mod('itng-featured-posts') ) ) {
			return;
		}
		
		if 	( is_front_page() && get_theme_mod( 'itng-featured-posts-front-enable' )
		   || !is_front_page() && is_home() && get_theme_mod( 'itng-featured-posts-blog-enable' ) ) {
			   
			$cat = get_theme_mod('itng-featured-posts', 0);
		
			$args = array(
				'posts_per_page'		=>	3,
				'ignore_sticky_posts'	=>	true,
				'cat'					=>	$cat
			);
			
			$posts = [];
			
			$cat_query	=	new WP_Query( $args );
			
			if ( $cat_query->have_posts() ) : 
				while ( $cat_query->have_posts() ) : $cat_query->the_post();
					
					global $post;
					array_push( $posts, $post );
					
				endwhile;
			endif;
				
			wp_reset_postdata(); ?>
			
			<div id="itng-featured-posts" class="container">
				<div class="row no-gutters">
					
					<div class="itng-featured-post-1 col-lg-8">
						<?php itng_featured_post_markup( $posts[0] ) ?>
					</div>
					
					<div class="col-lg-4">
						<div class="row no-gutters">
							<div class="featured-post-2 col-md-6 col-lg-12"><?php itng_featured_post_markup( $posts[1] ) ?></div>
							<div class="featured-post-3 col-md-6 col-lg-12"><?php itng_featured_post_markup( $posts[2] ) ?></div>
						</div>
					</div>
					
				</div>
			</div>
		<?php
		}
	}
}
add_action('itng_before_content', 'itng_featured_posts', 10);