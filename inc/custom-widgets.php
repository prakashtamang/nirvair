<?php
/**
 * nirvair Theme Widget
 *
 * @package nirvair
 */

/**
 * Adds Nirvair_Custom_Service_Widget.
 */
class Nirvair_Custom_Service_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'nirvair_service_widget', // Base ID
			esc_html__( 'Nirvair: Service', 'nirvair' ), // Name
			array( 'description' => esc_html__( 'Nirvair Custom Service Widget', 'nirvair' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		 	echo '<div class="service-item mx-auto mb-5 to-animate">';
            	if (!empty($instance['service_icon'])) :
            		echo '<div class="service-icon d-flex">';
		              echo '<i class="' . $instance['service_icon'] . ' m-auto"></i>';
		            echo '</div>';
            	endif;

            	if (!empty($instance['service_title'])) :
            		echo $args['before_title'] . $instance['service_title'] . $args['after_title'];
            	endif;

            	if (!empty($instance['service_desc'])) :
            		echo '<p>' . $instance['service_desc'] . '</p>';
            	endif;
          echo '</div>';
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$service_title = ! empty( $instance['service_title'] ) ? $instance['service_title'] : esc_html__( '', 'nirvair' );
		$service_icon = ! empty( $instance['service_icon'] ) ? $instance['service_icon'] : esc_html__( '', 'nirvair' );
		$service_desc = ! empty( $instance['service_desc'] ) ? $instance['service_desc'] : esc_html__( '', 'nirvair' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'service_title' ) ); ?>"><?php esc_attr_e( 'Service Title:', 'nirvair' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'service_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'service_title' ) ); ?>" type="text" value="<?php echo esc_attr( $service_title ); ?>" placeholder="Service Title">
		</p>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'service_icon' ) ); ?>"><?php esc_attr_e( 'Service Icon:', 'nirvair' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'service_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'service_icon' ) ); ?>" type="text" value="<?php echo esc_attr( $service_icon ); ?>" placeholder="fas fa-desktop">
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('service_desc'); ?>"><?php _e('Service Description:', 'nirvair'); ?></label>
		<textarea class="widefat" id="<?php echo $this->get_field_id('service_desc'); ?>" name="<?php echo $this->get_field_name('service_desc'); ?>"><?php echo $service_desc; ?></textarea>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['service_title'] = ( ! empty( $new_instance['service_title'] ) ) ? sanitize_text_field( $new_instance['service_title'] ) : '';
		$instance['service_icon'] = ( ! empty( $new_instance['service_icon'] ) ) ? sanitize_text_field( $new_instance['service_icon'] ) : '';
		$instance['service_desc'] = ( ! empty( $new_instance['service_desc'] ) ) ? sanitize_text_field( $new_instance['service_desc'] ) : '';
		return $instance;
	}

} // class Nirvair_Custom_Service_Widget

// register Nirvair_Custom_Service_Widget widget
function register_nirvair_custom_service_widget() {
    register_widget( 'Nirvair_Custom_Service_Widget' );
}
add_action( 'widgets_init', 'register_nirvair_custom_service_widget' );



/**
 * Adds Nirvair_Custom_Testimonial_Widget.
 */
class Nirvair_Custom_Testimonial_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'nirvair_testimonial_widget', // Base ID
			esc_html__( 'Nirvair: Testimonial', 'nirvair' ), // Name
			array( 'description' => esc_html__( 'Nirvair Custom Testimonial Widget', 'nirvair' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['testimonial_text'] ) ) {
			echo '<div class="box-testimony to-animate">';
				echo '<blockquote class="to-animate-2">';
				if (! empty($instance['testimonial_text'])) {
					echo '<p>' . $instance['testimonial_text'] . '</p>';
				}
				echo '</blockquote>';

				if (! empty($instance['testimonial_profile_pic'])) {
				echo '<div class="author to-animate fadeInUp animated">';
					echo '<figure><img src="' . $instance['testimonial_profile_pic'] . '" alt="Person"></figure>';
					if (! empty($instance['testimonial_name'])) {
						echo '<p>' . $instance['testimonial_name'];
						if (! empty($instance['testimonial_company'])) {
							echo '<span class="subtext">' . $instance['testimonial_company'] . '</span>';
						}
						echo '</p>';
					}
				echo '</div>';
				}
			echo '</div>';
		}
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$testimonial_text = ! empty( $instance['testimonial_text'] ) ? $instance['testimonial_text'] : esc_html__( '', 'nirvair' );
		$testimonial_profile_pic = ! empty( $instance['testimonial_profile_pic'] ) ? $instance['testimonial_profile_pic'] : esc_html__( '', 'nirvair' );
		$testimonial_name = ! empty( $instance['testimonial_name'] ) ? $instance['testimonial_name'] : esc_html__( '', 'nirvair' );
		$testimonial_company = ! empty( $instance['testimonial_company'] ) ? $instance['testimonial_company'] : esc_html__( '', 'nirvair' );
		?>

		<p>
		<label for="<?php echo $this->get_field_id('testimonial_text'); ?>"><?php _e('Testimonial Text:', 'nirvair'); ?></label>
		<textarea class="widefat" id="<?php echo $this->get_field_id('testimonial_text'); ?>" name="<?php echo $this->get_field_name('testimonial_text'); ?>"><?php echo $testimonial_text; ?></textarea>
		</p>

		<p>
		<label for="<?= $this->get_field_id( 'testimonial_profile_pic' ); ?>">Image</label>
        <img class="<?= $this->id ?>_img" src="<?= (!empty($instance['testimonial_profile_pic'])) ? $instance['testimonial_profile_pic'] : ''; ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
        <input type="text" class="widefat <?= $this->id ?>_url" name="<?= $this->get_field_name( 'testimonial_profile_pic' ); ?>" value="<?= $instance['testimonial_profile_pic']; ?>" style="margin-top:5px;" />
        <input type="button" id="<?= $this->id ?>" class="button button-primary js_custom_upload_media" value="Upload Image" style="margin-top:5px;" />
		</p>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'testimonial_name' ) ); ?>"><?php esc_attr_e( 'Name:', 'nirvair' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'testimonial_name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'testimonial_name' ) ); ?>" type="text" value="<?php echo esc_attr( $testimonial_name ); ?>">
		</p>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'testimonial_company' ) ); ?>"><?php esc_attr_e( 'Designation:', 'nirvair' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'testimonial_company' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'testimonial_company' ) ); ?>" type="text" value="<?php echo esc_attr( $testimonial_company ); ?>">
		</p>

		
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['testimonial_text'] = ( ! empty( $new_instance['testimonial_text'] ) ) ? sanitize_text_field( $new_instance['testimonial_text'] ) : '';
		$instance['testimonial_profile_pic'] = ( ! empty( $new_instance['testimonial_profile_pic'] ) ) ? sanitize_text_field( $new_instance['testimonial_profile_pic'] ) : '';
		$instance['testimonial_name'] = ( ! empty( $new_instance['testimonial_name'] ) ) ? sanitize_text_field( $new_instance['testimonial_name'] ) : '';
		$instance['testimonial_company'] = ( ! empty( $new_instance['testimonial_company'] ) ) ? sanitize_text_field( $new_instance['testimonial_company'] ) : '';
		return $instance;
	}

} // class Nirvair_Custom_Testimonial_Widget


// Enqueue additional admin scripts
add_action('admin_enqueue_scripts', 'nirvair_wdscript');
function nirvair_wdscript() {
    wp_enqueue_media();
    wp_enqueue_script('ads_script', get_template_directory_uri() . '/js/widget.js', false, '1.0.0', true);
}

// register Nirvair_Custom_Testimonial_Widget widget
function register_nirvair_custom_testimonial_widget() {
    register_widget( 'Nirvair_Custom_Testimonial_Widget' );
}
add_action( 'widgets_init', 'register_nirvair_custom_testimonial_widget' );


/**
 * Adds Nirvair_Custom_Contact_Widget.
 */
class Nirvair_Custom_Contact_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'nirvair_contact_widget', // Base ID
			esc_html__( 'Nirvair: Contact', 'nirvair' ), // Name
			array( 'description' => esc_html__( 'Nirvair Custom Contact Widget', 'nirvair' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$messenger_text = 'facebook';
		$whatsapp_text = 'whatsapp';
		$phone_text = 'phone';
		$envelope_text = 'envelope';

		echo $args['before_widget'];
		if ( ! empty( $instance['contact_title'] ) ) {
			echo '<div class="contact-list text-center to-animate">';
	          if (!empty($instance['contact_icon'])) {
	          	echo '<div class="icon-holder rounded-circle contact-messanger">';
		        	echo '<i class="' . $instance['contact_icon'] . '"></i>';
		        echo '</div>';
	          }
	          echo $args['before_title'] . apply_filters( 'widget_title', $instance['contact_title'] ) . $args['after_title'];
	          if (!empty($instance['contact_detail'])) {
	          	echo '<p class="description">' . $instance['contact_detail'] . '</p>';
	          }
	        echo '</div>';
		}
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$contact_icon = ! empty( $instance['contact_icon'] ) ? $instance['contact_icon'] : esc_html__( '', 'nirvair' );
		$contact_title = ! empty( $instance['contact_title'] ) ? $instance['contact_title'] : esc_html__( '', 'nirvair' );
		$contact_detail = ! empty( $instance['contact_detail'] ) ? $instance['contact_detail'] : esc_html__( '', 'nirvair' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'contact_icon' ) ); ?>"><?php esc_attr_e( 'Contact Icon:', 'nirvair' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'contact_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'contact_icon' ) ); ?>" type="text" value="<?php echo esc_attr( $contact_icon ); ?>" placeholder="fas fa-phone">
		</p>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'contact_title' ) ); ?>"><?php esc_attr_e( 'Contact Title:', 'nirvair' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'contact_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'contact_title' ) ); ?>" type="text" value="<?php echo esc_attr( $contact_title ); ?>">
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('contact_detail'); ?>"><?php _e('Contact Detail:', 'nirvair'); ?></label>
		<textarea class="widefat" id="<?php echo $this->get_field_id('contact_detail'); ?>" name="<?php echo $this->get_field_name('contact_detail'); ?>"><?php echo $contact_detail; ?></textarea>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['contact_icon'] = ( ! empty( $new_instance['contact_icon'] ) ) ? sanitize_text_field( $new_instance['contact_icon'] ) : '';
		$instance['contact_title'] = ( ! empty( $new_instance['contact_title'] ) ) ? sanitize_text_field( $new_instance['contact_title'] ) : '';
		$instance['contact_detail'] = ( ! empty( $new_instance['contact_detail'] ) ) ? sanitize_text_field( $new_instance['contact_detail'] ) : '';
		return $instance;
	}

} // class Nirvair_Custom_Contact_Widget

// register Nirvair_Custom_Contact_Widget widget
function register_nirvair_custom_contact_widget() {
    register_widget( 'Nirvair_Custom_Contact_Widget' );
}
add_action( 'widgets_init', 'register_nirvair_custom_contact_widget' );


/**
 * Adds Nirvair_Related_Post_Widget.
 */
class Nirvair_Related_Post_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'nirvair_related_post_widget', // Base ID
			esc_html__( 'Nirvair: Related Posts', 'nirvair' ), // Name
			array( 'description' => esc_html__( 'Nirvair Custom Related Post Widget', 'nirvair' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
			if (!empty($instance['post_title'])) {
	          	echo $args['before_title'] . $instance['post_title'] . $args['after_title'];
	          }
		 	$orig_post = $post;
			global $post;
			$categories = get_the_category($post->ID);
			if ($categories) {
				$category_ids = array();
				foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

				$query_args=array(
					'category__in' => $category_ids,
					'post__not_in' => array($post->ID),
					'posts_per_page'=> $instance['post_count'], // Number of related posts that will be shown.
					'ignore_sticky_posts'=>1,
					'orderby'   => 'rand',
				);

				$related_post_query = new wp_query( $query_args );
				if( $related_post_query->have_posts() ) {
					echo '<ul>';
					while( $related_post_query->have_posts() ) {
					$related_post_query->the_post();?>

					<li><a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
					<?php
					}
				echo '</ul>';
				}
			}
			$post = $orig_post;
			wp_reset_query();
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$post_title = ! empty( $instance['post_title'] ) ? $instance['post_title'] : esc_html__( '', 'nirvair' );
		$post_count = ! empty( $instance['post_count'] ) ? $instance['post_count'] : esc_html__( '5', 'nirvair' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'post_title' ) ); ?>"><?php esc_attr_e( 'Title:', 'nirvair' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_title' ) ); ?>" type="text" value="<?php echo esc_attr( $post_title ); ?>">
		</p>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'post_count' ) ); ?>"><?php esc_attr_e( 'Number of Post to Show:', 'nirvair' ); ?></label> 
		<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'post_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_count' ) ); ?>" type="number" value="<?php echo esc_attr( $post_count ); ?>" min="1" max="20" size="4">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['post_title'] = ( ! empty( $new_instance['post_title'] ) ) ? sanitize_text_field( $new_instance['post_title'] ) : '';
		$instance['post_count'] = ( ! empty( $new_instance['post_count'] ) ) ? sanitize_text_field( $new_instance['post_count'] ) : '';
		return $instance;
	}

} // class Nirvair_Related_Post_Widget

// register Nirvair_Related_Post_Widget widget
function register_nirvair_custom_related_post_widget() {
    register_widget( 'Nirvair_Related_Post_Widget' );
}
add_action( 'widgets_init', 'register_nirvair_custom_related_post_widget' );
