<?php
// Register and load the widget
function itng_recent_posts_widget() {
    register_widget( 'itng_recent_posts' );
}
add_action( 'widgets_init', 'itng_recent_posts_widget' );

// Creating the widget
class itng_recent_posts extends WP_Widget {

    function __construct() {
        parent::__construct(

// Base ID of your widget
            'itng_recent_posts',

// Widget name will appear in UI
            esc_html__('ITNG - Recent Posts', 'it-news-grid'),

// Widget description
            array( 'description' => esc_html__( 'This Widget will show Most Recent Posts.', 'it-news-grid' ), )
        );
    }

// Creating widget front-end

    public function widget( $args, $instance ) {

        $title	= apply_filters( 'widget_title', empty( $instance['title'] ) ? __('Recent Posts', 'it-news-grid') : $instance['title'], $instance, $this->id_base );
        $post_count	= isset( $instance['post_count'] ) ? $instance['post_count'] : 4;


                echo $args['before_widget'];
                if ( ! empty( $title ) )
                    echo $args['before_title'] . $title . $args['after_title'];
            
					$widget_args	=	array(
						'posts_per_page'		=>	$post_count,
						'ignore_sticky_posts'	=>	true
					);
					
					$widget_query	=	new WP_Query( $widget_args );
					
					if ( $widget_query->have_posts() ) : ?>
						<div class="itng-widget-posts">
						<?php
		            		while ($widget_query->have_posts() ) : $widget_query->the_post(); ?>
			            		<div class=" itng-widget-post row no-gutters align-items-center">
				            		<div class="itng-widget-post-thumb col-4">
					            		<?php if ( has_post_thumbnail() ): ?>
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('itng_list_thumb'); ?></a>
										<?php
										else :
										?>	<a href="<?php the_permalink(); ?>"><img class="wp-post-image" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/ph_square.png'); ?>"></a>
										<?php endif; ?>
				            		</div>
				            		<div class="itng-widget-post-title col-8">
					            		<a class="itng-widget-post-link" href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a>
						            	<cite class="recent-date"><?php echo get_the_date('d F, Y'); ?></cite>
				            		</div>
			            		</div>
							<?php
							endwhile;
							?>
						</div>
					<?php
					endif;
            
    	   echo $args['after_widget'];

    }

// Widget Backend
    public function form( $instance ) {

        /* Set up some default widget settings. */
       $defaults = array(
           'title'              => '',
		   'post_count'         => 4,
		   'align'				=> 'vertical'
       );
       $instance = wp_parse_args( (array) $instance, $defaults );
         ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'it-news-grid' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
        </p>


        <p>
            <label for="<?php echo $this->get_field_id( 'post_count' ); ?>"><?php _e( 'Number of Posts:', 'it-news-grid' ); ?></label>
            <input id="<?php echo $this->get_field_id( 'post_count' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'post_count' ); ?>" type="number" value="<?php echo esc_attr( $instance['post_count'] ); ?>" />
        </p>

        <?php
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title']              =   ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : __('Recent Posts', 'it-news-grid');
        $instance['post_count']         =   ( ! empty( $new_instance['post_count'] ) ) ? absint($new_instance['post_count']) : 4;
        return $instance;
    }
}
    